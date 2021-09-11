<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\MainCategoriesRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * mainCategories & subCategories CRUD
 * Class MainCategoriesController
 * @package App\Http\Controllers\Dashboard
 */
class MainCategoriesController extends Controller
{
    public function index($type)
    {
        if ($type == 'sub') {
            $categories = Category::child()->orderBy('id', 'desc')->paginate(PAGINATION_COUNT);
            return view('dashboard.categories.index', compact('categories','type'));
        }else{
            $categories = Category::parent()->orderBy('id', 'desc')->paginate(PAGINATION_COUNT);
            return view('dashboard.categories.index', compact('categories'));
        }
    }
    public function create($type){
        if ($type == 'sub') {
            return view('dashboard.categories.create',compact('type'));
        }else{
            return view('dashboard.categories.create');
        }
    }
    public function store(MainCategoriesRequest $request){
        try {
//            return $request;
            checkValue($request);
            DB::beginTransaction();


            setStatus($request);

            $category=Category::create($request->except('_token'));
            $category->name=$request->name;
            $category->save();
            DB::commit();
            if($request->has('parent_id')) {
                return redirect()->route('admin.maincategories', 'sub')->with(['success' => __('admin/dashboard.category_success_create_msg')]);
            }else {
                return redirect()->route('admin.maincategories', 'main')->with(['success' => __('admin/dashboard.category_success_create_msg')]);
            }
            }catch (\Exception $ex) {
//         return $ex;
                DB::rollBack();
                return redirect()->back()->withInput()->with(['error' => __('admin/dashboard.category_error_create_msg')]);
        }
    }

    public function edit($type,$id){
       $category=Category::find($id);
        if ($type == 'sub') {
            if (!$category)
                return redirect()->route('admin.maincategories','sub')->with(['error' => __('admin/dashboard.edit_category_edit_err_msg')]);
            $categories = Category::orderBy('id', 'desc')->paginate(PAGINATION_COUNT);
            return view('dashboard.categories.edit', compact('category','type','categories'));
        }else{
            if (!$category)
                return redirect()->route('admin.maincategories','main')->with(['error' => __('admin/dashboard.edit_category_edit_err_msg')]);
            return view('dashboard.categories.edit', compact('category'));
        }
    }

    public function update($id,MainCategoriesRequest $request){
       try {

           $category=Category::find($id);
           DB::beginTransaction();
           checkValue($request);
           setStatus($request);
           $category->update($request->all());
           $category->name=$request->name;
           $category->save();
           DB::commit();
           if($request->has('parent_id')) {
               return redirect()->route('admin.maincategories', 'sub')->with(['success' => __('admin/dashboard.category_success_msg')]);
           }else {
               return redirect()->route('admin.maincategories', 'main')->with(['success' => __('admin/dashboard.category_success_msg')]);
           }
        }catch (\Exception $ex) {
//         return $ex;
           DB::rollBack();
           return redirect()->back()->with(['error' => __('admin/dashboard.category_error_msg')]);
        }
    }

    public function destroy($id){
    try {
        $category = Category::find($id);
        if (!$category)
            return redirect()->back()->with(['error' => __('admin/dashboard.edit_category_edit_err_msg')]);
        if ($category->translate('en') != null) {
        $category->translate('en')->delete();
        $category->delete();
        }else{
        $category->delete();
        }
        return redirect()->back()->with(['error'=>__('admin/dashboard.index_category_destroy_success_msg')]);
    }catch (\Exception $ex) {
        //         return $ex;
        return redirect()->back()->with(['error'=>__('admin/dashboard.index_category_destroy_err_msg')]);
        }
    }

}
