<?php

namespace App\Http\Controllers\Site;

use App\Events\NewOrder;
use App\Http\Controllers\Controller;
use App\Http\Services\MyFatoorahServices;
use App\Models\Order;
use App\Models\ProductOrder;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;

class PaymentController extends Controller
{

    private $fatoorahservice;
    /**
     * PaymentController constructor.
     * @param MyFatoorahServices $fatoorahservice
     */
    public function __construct(MyFatoorahServices $fatoorahservice)
    {
        $this->fatoorahservice=$fatoorahservice;
    }

    /**
     * payment process
     * @param Request $request
     * @return false|\Illuminate\Http\RedirectResponse|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function processPayment(Request $request)
    {
        if(! $request->has('product1')){
            return redirect()->back();
        }
        $data=[
            'NotificationOption' => 'Lnk',
            'InvoiceValue'       => $request->price,
            'CustomerName'       => auth()->user()->name,
            'DisplayCurrencyIso' => 'KWD',
            'CustomerMobile'     => auth()->user()->mobile,
            'CustomerEmail'      => 'email@example.com',
            'CallBackUrl'        => 'http://store.test:7882/'.app()->getLocale().'/callback',
            'ErrorUrl'           => 'http://store.test:7882/'.app()->getLocale().'/callbackerror',
            'Language'           => 'en',

        ];

         $this->setProductOrderSession($request);
        return $this->fatoorahservice->sendPayment($data);

    }

    /**
     * success callback
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function paymentCallBack(Request $request)
    {
//       return $request;
        $data=[];
        $data['key']=$request->paymentId;
        $data['keyType']='paymentId';
        $response = $this->fatoorahservice->getPaymentStatus($data);
        DB::beginTransaction();
        $this->saveProductOrder($request);
        $order =  $this->fatoorahservice->saveOrder($response ['Data']['InvoiceValue'],$request->paymentId);
        $this->fatoorahservice->saveTransaction($order,$request->paymentId);
        DB::commit();
        event(new NewOrder($order));
        return view('front.callback-success');
    }

    /**
     * save product name & quantity which got from request inside session
     * @param \Illuminate\Http\Request $request
     */
    public function setProductOrderSession(Request $request)
    {
        for ($i=1;$i<=$request->itemCount;$i++)
        {
            $request->session()->put('product',$request->input('product'.$i));
            $request->session()->put('qty',$request->input('qty'.$i));
        }
    }

    /**
     * save product order
     * @param Illuminate\Http\Request $request
     */
    public function saveProductOrder(Request $request){
        $pro_order =new ProductOrder();
        $pro_order -> user_id=auth()->user()->id;
        $pro_order->product_id=$request->session()->get('product');
        $pro_order->quantity=$request->session()->get('qty');
        $pro_order->save();
    }

    /**
     * error callback
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function paymentError()
    {
        return view('front.callback-error');
    }



}
