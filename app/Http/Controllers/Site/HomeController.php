<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $data=[];
        $data['sliders']=Slider::get(['image']);
        $data['categories']=Category::parent()->select('id','slug')->with(['subCats'=>function($q) {
            $q->select('id', 'parent_id', 'slug');
            $q->with(['subCats' => function ($qq){
            $qq->select('id', 'parent_id', 'slug');
        }]);
        }])->get();
        $data['products'] = Product::latest()->get();
        return view('front.home',$data);
    }
}
