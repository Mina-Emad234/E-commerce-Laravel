<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AttributesRequest;
use App\Http\Requests\Dashboard\TagsRequest;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Tag;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * attributes CRUD
 * Class AttributesController
 * @package App\Http\Controllers\Dashboard
 */
class AttributesController extends Controller
{
    protected $model;

    /**
     * using repository design pattern
     * AttributesController constructor.
     * @param Attribute $attribute
     */
    public function __construct(Attribute $attribute)
    {
        $this->model = new Repository($attribute);
    }
    public function index()
    {
        $attributes = $this->model->index();
        return view('dashboard.attributes.index', compact('attributes'));
    }

    public function create(){
        return view('dashboard.attributes.create');
    }

    public function store(AttributesRequest $request){
        try {

            DB::beginTransaction();

            $attribute=$this->model->create([]);
            $attribute->name=$request->name;
            $attribute->save();
            DB::commit();
            return redirect()->route('admin.attributes')->with(['success' => __('admin/dashboard.attr_success_create_msg')]);
        }catch (\Exception $ex) {
//         return $ex;
            DB::rollBack();
            return redirect()->back()->withInput()->with(['error' => __('admin/dashboard.category_error_create_msg')]);
        }
    }

    public function edit($id){
        $attribute = $this->model->show($id);
        if(!$attribute)
            return redirect()->route('admin.attributes')->with(['error' => __('admin/dashboard.edit_category_edit_err_msg')]);
        return view('dashboard.attributes.edit', compact('attribute'));
    }

    public function update($id,AttributesRequest $request){
        try{

            $attribute = $this->model->show($id);
            if (!$attribute)
                return redirect()->route('admin.attributes')->with(['error' => __('admin/dashboard.edit_category_edit_err_msg')]);;
            DB::beginTransaction();
            $attribute->update($request->except('_token','id'));
            $attribute->name=$request->name;
            $attribute->save();
            DB::commit();
            return redirect()->route('admin.attributes')->with(['success' => __('admin/dashboard.attr_updated_success_msg')]);
        }catch (\Exception $ex) {
//            return $ex;
            DB::rollBack();
            return redirect()->back()->with(['error' => __('admin/dashboard.category_error_msg')]);
        }
    }

    public function destroy($id){

        try{
        $attribute = $this->model->show($id);
        if (!$attribute)
            return redirect()->route('admin.attributes')->with(['error' => __('admin/dashboard.edit_category_edit_err_msg')]);
        if($attribute->translate('en') != null) {
            $attribute->translate('en')->delete;
            $this->model->delete($id);
        }else{
            $this->model->delete($id);
        }
        return redirect()->back()->with(['error'=>__('admin/dashboard.attr_destroy_success_msg')]);
        }catch (\Exception $ex) {
            //         return $ex;
            return redirect()->back()->with(['error'=>__('admin/dashboard.attr_destroy_err_msg')]);
        }
    }
}
