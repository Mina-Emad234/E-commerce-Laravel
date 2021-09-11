<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\BrandsRequest;
use App\Http\Requests\Dashboard\TagsRequest;
use App\Models\Tag;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * tags CRUD
 * Class TagsController
 * @package App\Http\Controllers\Dashboard
 */
class TagsController extends Controller
{
    protected $model;

    public function __construct(Tag $tag)
    {
        $this->model = new Repository($tag);
    }
    public function index()
    {
        $tags = $this->model->index();
        return view('dashboard.tags.index', compact('tags'));
    }

    public function create(){
        return view('dashboard.tags.create');
    }

    public function store(TagsRequest $request){
        try {

            DB::beginTransaction();

            $tag=$this->model->create($request->only('slug'));
            $tag->name=$request->name;
            $tag->save();
            DB::commit();
            return redirect()->route('admin.tags')->with(['success' => __('admin/dashboard.tag_success_create_msg')]);
        }catch (\Exception $ex) {
//         return $ex;
            DB::rollBack();
            return redirect()->back()->withInput()->with(['error' => __('admin/dashboard.category_error_create_msg')]);
        }
    }

    public function edit($id){
        $tag=$this->model->show($id);
        if (!$tag)
            return redirect()->route('admin.tags')->with(['error' => __('admin/dashboard.edit_category_edit_err_msg')]);
        return view('dashboard.tags.edit', compact('tag'));
    }

    public function update($id,TagsRequest $request){
        try {
            $tag=$this->model->show($id);
            if (!$tag)
                return redirect()->route('admin.tags')->with(['error' => __('admin/dashboard.edit_category_edit_err_msg')]);
            DB::beginTransaction();

            $tag->update($request->except('_token','id'));
            $tag->name=$request->name;
            $tag->save();
            DB::commit();
            return redirect()->route('admin.tags')->with(['success' => __('admin/dashboard.tag_updated_success_msg')]);
        }catch (\Exception $ex) {
//            return $ex;
            DB::rollBack();
            return redirect()->back()->with(['error' => __('admin/dashboard.category_error_msg')]);
        }
    }

    public function destroy($id){

        try{
            $tag=$this->model->show($id);
            if (!$tag)
                return redirect()->route('admin.tags')->with(['error' => __('admin/dashboard.edit_category_edit_err_msg')]);
        if($tag->translate('en')) {
            $tag->translate('en')->delete();
            $this->model->delete($id);
        }else{
            $this->model->delete($id);
        }
            return redirect()->back()->with(['success'=>__('admin/dashboard.index_tag_destroy_success_msg')]);
        }catch (\Exception $ex) {
            //         return $ex;
            return redirect()->back()->with(['error'=>__('admin/dashboard.index_tag_destroy_err_msg')]);
        }
    }

}
