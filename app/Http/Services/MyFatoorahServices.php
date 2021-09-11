<?php


namespace App\Http\Services;


use App\Models\Order;
use App\Models\ProductOrder;
use App\Models\Transaction;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;


class MyFatoorahServices
{
    private $base_url;
    private $headers;
    private $request_client;
    /*
     * get client interface
     */
    public function __construct(Client $request_client)
    {
        $this->request_client=$request_client;
        $this->base_url= env('fatoorah_base_url');
        $this->headers=[
            'Content-Type' => 'application/json',
            'authorization'=>'Bearer ' . env('fatoorah_token')
        ];
    }

    /**
     * use interface to make request
     * return request inside response
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @param $url
     * @param $method
     * @param $process
     * @param array $data
     * @return false|\Illuminate\Http\RedirectResponse|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */

    public function buildRequest($url, $method, $process,$data=[])
    {
        $request= new Request($method,$this->base_url . '/' . $url,$this->headers);
        if(!$data)
            return false;
        $response = $this->request_client->send($request,[
            'json' => $data,
        ]);
        if ($response->getStatusCode() != 200){
            return false;
        }
        $response = json_decode($response->getBody(),true);
        if($process == 'pay') {
            return redirect()->away($response['Data']['InvoiceURL']);
        }else{
            return $response;
        }
    }

    /**
     * send payment to payment gate
     * @param $data
     * @return false|\Illuminate\Http\RedirectResponse|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function sendPayment($data)
    {
        return $response=$this->buildRequest('v2/SendPayment','POST','pay',$data);
    }

    /**
     * get payment status
     * @param $data
     * @return false|\Illuminate\Http\RedirectResponse|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getPaymentStatus($data)
    {
        return $response=$this->buildRequest('v2/getPaymentStatus','POST','callback',$data);
    }

    /**
     * save product name & quantity which gotten from request
     * @param \Illuminate\Http\Request $request
     */
    public function saveProductOrder(\Illuminate\Http\Request $request)
    {
//        return $request;
        for ($i=1;$i<=$request->itemCount;$i++)
        {

                $order =new ProductOrder();
                $order -> user_id=auth()->user()->id;
                $order->product_id=$request->input('product'.$i);
                $order->quantity=$request->input('qty'.$i);
                $order->save();

        }
    }

    /**
     * save payment order
     * @param $amount
     * @param $PaymentMethodId
     * @return mixed
     */

    public function saveOrder($amount, $PaymentMethodId)
    {
        return Order::create([
            'customer_id' => auth()->id(),
            'customer_phone' => auth()->user()->mobile,
            'customer_name' => auth()->user()->name,
            'total' => $amount,
            'locale' => 'en',
            'payment_method' => $PaymentMethodId,  // you can use enumeration here as we use before for best practices for constants.
            'status' => Order::PAID,
        ]);

    }

    /**
     * save payment transaction
     * @param Order $order
     * @param $PaymentId
     * @return mixed
     */
    public function saveTransaction(Order $order, $PaymentId)
    {
        return Transaction::create([
            'order_id' => $order->id,
            'transaction_id' => $PaymentId,
            'payment_method' => $order->payment_method,
        ]);
    }
}
