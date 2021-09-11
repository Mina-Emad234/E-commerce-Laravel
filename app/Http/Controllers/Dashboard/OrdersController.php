<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\ProductOrder;
use Illuminate\Http\Request;

/**
 * get & delete orders
 * Class OrdersController
 * @package App\Http\Controllers\Dashboard
 */
class OrdersController extends Controller
{
    public function index()
    {
         $orders = Order::with('user')->orderBy('id','desc')->paginate(PAGINATION_COUNT);
         return view('dashboard.orders.index',compact('orders'));
    }
    public function indexProducts()
    {
        $orders = ProductOrder::with('user')->with('product')->orderBy('id','desc')->paginate(PAGINATION_COUNT);
        return view('dashboard.orders.index-product',compact('orders'));
    }
    public function deleteOrder($id)
    {
        try {
        $order=Order::find($id);
        $order->delete();
            return redirect()->back()->with(['success'=>__('admin/dashboard.order_success_delete')]);
        }catch (\Exception $ex) {
            //         return $ex;
            return redirect()->back()->with(['error'=>__('admin/dashboard.order_error_delete')]);
        }
    }
    public function deleteProductOrder($id)
    {
        try {
            $order = ProductOrder::find($id);
            $order->delete();
            return redirect()->back()->with(['success'=>__('admin/dashboard.product_order_success_delete')]);
        }catch (\Exception $ex) {
            //         return $ex;
            return redirect()->back()->with(['error'=>__('admin/dashboard.product_order_error_delete')]);
        }
    }
}
