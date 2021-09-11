<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    public function index()
    {
        $products = auth()->user()->wishLists()->latest()->get();
        return view('front.wishlists',compact('products'));
    }

    public function store(){
        if (! auth()->user()-> wishListsHas(request('productId'))){
            auth()->user()->wishLists()->attach(request('productId'));
            return response()->json(['status'=>true,'wished'=>true]);
        }
        return response()->json(['status'=>true,'wished'=>false]);
    }
    public function destroy()
    {
        auth()->user()->wishLists()->detach(request('productId'));
    }
}
