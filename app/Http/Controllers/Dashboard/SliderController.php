<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ProductImageRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * create & update slider images
 * Class SliderController
 * @package App\Http\Controllers\Dashboard
 */
class SliderController extends Controller
{
    public function createSliderImages()
    {
        $images =Slider::orderBy('id', 'DESC')->get();
        return view('dashboard.slider.slider', compact('images'));
    }

    /**
     * save image in folder
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function saveSliderImages(Request $request)
    {

        try {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();

            $file = uploadImage('sliders', $file);
            return response()->json([
                'name' => $file,
                'original_name' => $filename
            ]);


        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->withInput()->with(['error' => __('admin/dashboard.category_error_create_msg')]);
        }
    }

    /**
     * save image in DB
     * delete images that not exists in DB
     * @param ProductImageRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function endSliderImages(ProductImageRequest $request)
    {
        try{
            DB::beginTransaction();
            foreach ($request->document as $image) {
                $photo = Slider::create([
                    'image' => $image
                ]);
            }

            DB::commit();
            sleep(1);

            $path=public_path('assets/images/sliders');
             $scan = array_slice(scandir($path),2);
             $files =Slider::pluck('image');
            $all=[];
            foreach ($files as $file){
                 $all[]=$file;
            }
            $diffs =  array_diff($scan, $all);
            foreach($diffs as $diff) {
                $file_d = base_path('public/assets/images/sliders/' . $diff);
                if (!is_dir($file_d)) {
                    unlink($file_d);
                }
            }
            return redirect()->route('admin.sliders.create-images')->with(['success'=>__('admin/dashboard.slider_success')]);
        }catch (\Exception $ex) {
//            return $ex;
            DB::rollBack();
            return redirect()->back()->with(['error' => __('admin/dashboard.category_error_create_msg')]);
        }
    }
    public function deleteSliderImages($id)
    {
        try{
            $image=Slider::find($id);
            if(!$image)
                return redirect()->back()->with(['error'=>__('admin/dashboard.edit_category_edit_err_msg')]);
            $img = Str::after($image->image, 'images/');
            $img = base_path('public/assets/images/sliders/' . $img);
            unlink($img);
            $image->delete();
            return redirect()->back()->with(['success'=>__('admin/dashboard.slider_delete_img_success')]);
        }catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->withInput()->with(['error' => __('admin/dashboard.category_error_delete_img')]);
        }
    }
}
