<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function productBySlug($slug)
    {
        $date=[];
        $date['category'] = Category::where('slug',$slug)->first();
        if ($date['category'])
            $date['products']=$date['category']->products;
        return view('front.products',$date);
    }
}
