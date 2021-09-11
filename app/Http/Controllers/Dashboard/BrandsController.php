<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\BrandsRequest;
use App\Http\Requests\Dashboard\MainCategoriesRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * brand CRUD
 * Class BrandsController
 * @package App\Http\Controllers\Dashboard
 */
class BrandsController extends Controller
{
    protected $model;

    /**
     * using repository design pattern
     * BrandsController constructor.
     * @param Brand $brand
     */
    public function __construct(Brand $brand)
    {
        $this->model = new Repository($brand);
    }

    public function index()
    {
            $brands = $this->model->index();
            return view('dashboard.brands.index', compact('brands'));
    }

    public function create(){
            return view('dashboard.brands.create');
    }

    public function store(BrandsRequest $request){
        try {

            DB::beginTransaction();
            setStatus($request);
            if($request->has('photo')){
                $fileName = uploadImage('brands',$request->photo);
            }
            $brand=$this->model->create($request->except('_token'));
            $brand->name=$request->name;
            $brand->photo=$fileName;
            $brand->save();
            DB::commit();
                return redirect()->route('admin.brands')->with(['success' => __('admin/dashboard.brand_success_create_msg')]);
            }catch (\Exception $ex) {
//         return $ex;
            DB::rollBack();
            return redirect()->back()->withInput()->with(['error' => __('admin/dashboard.category_error_create_msg')]);
        }
    }

    public function edit($id){
        $brand = $this->model->show($id);
        if(!$brand)
            return redirect()->route('admin.brands')->with(['error' => __('admin/dashboard.edit_category_edit_err_msg')]);
        return view('dashboard.brands.edit', compact('brand'));
    }

    public function update($id,BrandsRequest $request){
       try {
           $brand = $this->model->show($id);
           if(!$brand)
               return redirect()->route('admin.brands')->with(['error' => __('admin/dashboard.edit_category_edit_err_msg')]);
           setStatus($request);
           DB::beginTransaction();
           if($request->has('photo')){
               $fileName = uploadImage('brands',$request->photo);
               $image = Str::after($brand->photo, 'images/');
               $image = base_path('public/assets/images/' . $image);
               unlink($image);
               Brand::where('id', $id)
                   ->update([
                       'photo' => $fileName,
                   ]);
           }
           $this->model->update($request->except('_token','id','photo'),$id);
            $brand->name=$request->name;
            $brand->save();
           DB::commit();
               return redirect()->route('admin.brands')->with(['success' => __('admin/dashboard.brand_updated_success_msg')]);
        }catch (\Exception $ex) {
//         return $ex;
           DB::rollBack();
           return redirect()->back()->with(['error' => __('admin/dashboard.category_error_msg')]);
        }
    }

    public function destroy($id){

    try{
        $brand = $this->model->show($id);
        if(!$brand)
            return redirect()->route('admin.brands')->with(['error' => __('admin/dashboard.edit_category_edit_err_msg')]);
        $image = Str::after($brand->photo, 'images/');
        $image = base_path('public/assets/images/' . $image);
        unlink($image);
        if($brand->translate('en')) {
            $brand->translate('en')->delete();
            $this->model->delete($id);
        }else{
            $this->model->delete($id);
        }
        return redirect()->back()->with(['success'=>__('admin/dashboard.index_brand_destroy_success_msg')]);
    }catch (\Exception $ex) {
        //         return $ex;
        return redirect()->back()->with(['error'=>__('admin/dashboard.index_brand_destroy_err_msg')]);
        }
    }

}
