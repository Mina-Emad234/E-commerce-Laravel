<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\InventoryRequest;
use App\Http\Requests\Dashboard\OptionRequest;
use App\Http\Requests\Dashboard\ProductImageRequest;
use App\Http\Requests\Dashboard\ProductPriceRequest;
use App\Http\Requests\Dashboard\ProductsRequest;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Option;
use App\Models\Product;
use App\Models\Tag;
use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

/**
 * product CRUD
 * Class ProductsController
 * @package App\Http\Controllers\Dashboard
 */
class ProductsController extends Controller
{
    //////////////////////// index blade function///////////////////
    public function index()
    {
        $products = Product::select('id', 'slug', 'price', 'is_active','created_at')->withTrashed()->orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        return view('dashboard.products.general.index', compact('products'));
    }

    ################################# Start create product #####################################


    public function createGeneral(Request $request)
    {
        $data = [];
        $data['brands'] = Brand::active()->select('id')->get();
        $product = $request->session()->get('product');
        return view('dashboard.products.general.create', $data, compact('product'));
    }
    /**
     * using session to make multi step form
     * create general product section
     * @param ProductsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeGeneral(ProductsRequest $request)
    {
        try {
        DB::beginTransaction();
        setStatus($request);
        if (empty($request->session()->get('product'))) {
            $product = new Product();
            $product->fill($request->all());
            $product->name = $request->name;
            $product->description = $request->description;
            $product->short_description = $request->short_description;
            $request->session()->put('product', $product);
            DB::commit();
            return redirect()->route('admin.products.general.create-price');
        } else {
            $product = $request->session()->get('product');
            $product->fill($request->all());
            $product->name = $request->name;
            $product->description = $request->description;
            $product->short_description = $request->short_description;
            $request->session()->put('product', $product);
            DB::commit();
            return redirect()->route('admin.products.general.create-price');
        }
        }catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->withInput()->with(['error' => __('admin/dashboard.category_error_create_msg')]);
        }
    }

     ########################## price section creation ####################

    public function createGeneralPrice(Request $request)
    {
        $product = $request->session()->get('product');
        return view('dashboard.products.general.create-price', compact('product'));
    }

    public function storeGeneralPrice(ProductPriceRequest $request)
    {
        try {
        $product = $request->session()->get('product');

        $product->fill($request->only(['price','special_price','special_price_type','special_price_start','special_price_end']));

        $request->session()->put('product', $product);
        return redirect()->route('admin.products.general.create-inventory');
                }catch (\Exception $ex) {
//         return $ex;
            DB::rollBack();
            return redirect()->back()->withInput()->with(['error' => __('admin/dashboard.category_error_create_msg')]);
        }
    }

    ########################## inventory section creation ####################

    public function createGeneralInventory(Request $request)
    {
        $data=[];
        $data['tags'] = Tag::select('id')->get();
        $data['categories'] = Category::active()->select('id')->get();
        $product = $request->session()->get('product');
        return view('dashboard.products.general.create-inventory', $data,compact('product'));
    }

    public function storeGeneralInventory(InventoryRequest $request)
    {
        try {
        DB::beginTransaction();
        $product = $request->session()->get('product');
        $product->fill($request->except('_token'));
       $product->save();
        $product->categories()->attach($request->categories);
        if ($request->has('tags')){
            $product->tags()->attach($request->tags);
        }
            $request->session()->forget('product');
        DB::commit();
        return redirect()->route('admin.products.general.create-images');
                }catch (\Exception $ex) {
//            return $ex;
            DB::rollBack();
            return redirect()->back()->withInput()->with(['error' => __('admin/dashboard.category_error_create_msg')]);
        }
        }


    ############### upload image & save image on DB section #########


    public function createGeneralImages()
    {
        return view('dashboard.products.general.create-images');
    }

    /**
     * save images in folder
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function saveImages(Request $request)
    {

        try {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();

            $file = uploadImage('products', $file);
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
     * save images in DB & remove images which not exists in DB
     * @param ProductImageRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function endGeneralImages(ProductImageRequest $request)
    {
        try{
            DB::beginTransaction();
            $product=Product::orderBy('id','desc')->first();
            foreach ($request->document as $image) {
                    $photo = $product->images()->create([
                        'image' => $image
                    ]);
                }

            DB::commit();

            return redirect()->route('admin.products.create-options');
        }catch (\Exception $ex) {
//            return $ex;
            DB::rollBack();
            return redirect()->back()->withInput()->with(['error' => __('admin/dashboard.category_error_create_msg')]);
        }
    }

    public function fileDestroy(Request $request)
    {
        $filename =  $request->filename;
        if (file_exists('assets/images/products/'.$filename)) {
            unlink('assets/images/products/'.$filename);
        }
        return $filename;
    }

   ################# product options creation section #########################

    public function createOption()
    {
        $data=[];
        $data['attributes'] = Attribute::select('id')->get();
        return view('dashboard.products.general.create-options', $data);
    }

    public function storeGeneralOption(OptionRequest $request)
    {
        try {
            DB::beginTransaction();
            $product=Product::orderBy('id','desc')->first();
            $option=$product->options()->create($request->only(['attribute_id','price']));
            $option->name = $request->name;
            $option->save();
            DB::commit();
                return redirect()->route('admin.products.create-options')->with(['success' => __('admin/dashboard.pro_option_success')]);
        }catch (\Exception $ex) {
//            return $ex;
            DB::rollBack();
            return redirect()->back()->withInput()->with(['error' => __('admin/dashboard.category_error_create_msg')]);
        }
    }
    public function successOption(){
        return redirect()->route('admin.products')->with(['success' => __('admin/dashboard.pro_success')]);
    }

    ################################# End create product #####################################

    ################################# Start update product #####################################


         ################# general product update section ##################
    public function editGeneral($id)
    {
        $product=Product::find($id);
            if(!$product)
                return redirect()->back()->with(['error'=>__('admin/dashboard.edit_category_edit_err_msg')]);
        $data = [];
        $data['brands'] = Brand::active()->select('id')->get();
        return view('dashboard.products.update.update', $data,compact('product'));
    }

    public function updateGeneral($id,ProductsRequest $request)
    {
        try {
        $product=Product::find($id);
        if(!$product)
                return redirect()->back()->with(['error'=>__('admin/dashboard.edit_category_edit_err_msg')]);
            setStatus($request);
            DB::beginTransaction();
                $product->update($request->all());
                $product->name = $request->name;
                $product->description = $request->description;
                $product->short_description = $request->short_description;
                $product->save();
                DB::commit();
            return redirect()->route('admin.products')->with(['success'=>__('admin/dashboard.pro_update_msg_success')]);
        }catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->withInput()->with(['error' => __('admin/dashboard.category_error_create_msg')]);
        }
    }

    #################  product price update section ##################

    public function editGeneralPrice($id)
    {
        $product=Product::find($id);
        if(!$product)
            return redirect()->back()->with(['error'=>__('admin/dashboard.edit_category_edit_err_msg')]);
        $date=[];
        $date['datestart'] = date("Y-m-d",strtotime($product->special_price_start));
        $date['dateend'] = date("Y-m-d",strtotime($product->special_price_end));

        return view('dashboard.products.update.update-price',$date, compact('product'));
    }

    public function updateGeneralPrice($id,ProductPriceRequest $request)
    {
        try {
            $product=Product::find($id);
            if(!$product)
                return redirect()->back()->with(['error'=>__('admin/dashboard.edit_category_edit_err_msg')]);

            $product->update($request->only(['price','special_price','special_price_type','special_price_start','special_price_end']));

            return redirect()->route('admin.products')->with(['success'=>__('admin/dashboard.pro_update_msg_success')]);
        }catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->withInput()->with(['error' => __('admin/dashboard.category_error_create_msg')]);
        }
    }

    ################# product inventory update section ##################

    public function editGeneralInventory($id)
    {
        $product=Product::find($id);
        if(!$product)
            return redirect()->back()->with(['error'=>__('admin/dashboard.edit_category_edit_err_msg')]);

        $data=[];
         $data['tags'] = Tag::select('id')->get();
         $data['categories'] = Category::active()->select('id')->get();
          $data['product_categories']=$product->categories;
         $data['product_tags']=$product->tags;
        return view('dashboard.products.update.update-inventory', $data , compact('product'));
    }

    public function updateGeneralInventory($id,InventoryRequest $request)
    {
        $product=Product::find($id);
        if(!$product)
            return redirect()->back()->with(['error'=>__('admin/dashboard.edit_category_edit_err_msg')]);
        try {
            DB::beginTransaction();
            $product->fill($request->except('_token','id'));
            $product->save();
            $product->categories()->attach($request->categories);
            if ($request->has('tags')){
                $product->tags()->attach($request->tags);
            }
            DB::commit();
            return redirect()->route('admin.products')->with(['success'=>__('admin/dashboard.pro_update_msg_success')]);
        }catch (\Exception $ex) {
//            return $ex;
            DB::rollBack();
            return redirect()->back()->withInput()->with(['error' => __('admin/dashboard.category_error_create_msg')]);
        }
    }

    ################# product image update section ##################
    public function editGeneralImages($id)
    {
         $product=Product::select('id')->with('images')->find($id);
        if(!$product)
            return redirect()->back()->with(['error'=>__('admin/dashboard.edit_category_edit_err_msg')]);
         $images = $product->images;
        return view('dashboard.products.update.update-images',compact('product','images'));
    }

    public function deleteImages($image_id)
    {
        try{
            $image=Image::find($image_id);
            if(!$image)
                return redirect()->back()->with(['error'=>__('admin/dashboard.edit_category_edit_err_msg')]);
            $img = Str::after($image->image, 'images/');
            $img = base_path('public/assets/images/products/' . $img);
            unlink($img);
            $image->delete();
            return redirect()->back()->with(['success'=>__('admin/dashboard.pro_delete_img_success')]);
        }catch (\Exception $ex) {
        DB::rollBack();
        return redirect()->back()->withInput()->with(['error' => __('admin/dashboard.category_error_delete_img')]);
        }
}

    /**
     * update images & delete images which not exists in DB
     * @param $id
     * @param ProductImageRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function updateGeneralImages($id,ProductImageRequest $request)
    {
        try{
            $product=Product::with('images')->find($id);
            if(!$product)
                return redirect()->back()->with(['error'=>__('admin/dashboard.edit_category_edit_err_msg')]);

            DB::beginTransaction();
            foreach ($request->document as $image) {
                $photo =   $product->images()->create([
                    'image'=>$image,
                ]);
            }
            DB::commit();
            return redirect()->route('admin.products')->with(['success' => __('admin/dashboard.pro_update_msg_success')]);

        }catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->withInput()->with(['error' => __('admin/dashboard.category_error_create_msg')]);
        }
    }

    ################# product options update section ##################

    public function editAddOption($id)
    {
        $data=[];
        $data['product']=Product::find($id);
        if(!$data['product'])
            return redirect()->back()->with(['error'=>__('admin/dashboard.edit_category_edit_err_msg')]);
        $data['options']=Option::with('attribute')->where('product_id',$id)->orderBy('id','desc')->get();
        $data['attributes'] = Attribute::select('id')->get();
        return view('dashboard.products.update.update-options', $data);
    }

    public function addOption($id,OptionRequest $request)
    {
        try {
            DB::beginTransaction();
            $product=Product::with('options')->find($id);
            if(!$product)
                return redirect()->back()->with(['error'=>__('admin/dashboard.edit_category_edit_err_msg')]);
            $option=$product->options()->create($request->only(['attribute_id','price']));
            $option->name = $request->name;
            $option->save();
            DB::commit();
            return redirect()->route('admin.products.edit-add-options',$product->id)->with(['success' => __('admin/dashboard.pro_option_success')]);
        }catch (\Exception $ex) {
//            return $ex;
            DB::rollBack();
            return redirect()->back()->withInput()->with(['error' => __('admin/dashboard.category_error_create_msg')]);
        }
    }
    public function editOption($id,$optionId)
    {
        $data=[];
        $data['product']=Product::find($id);
        if(!$data['product'])
            return redirect()->back()->with(['error'=>__('admin/dashboard.edit_category_edit_err_msg')]);

        $data['option']=Option::find($optionId);
        if(!$data['option'])
            return redirect()->back()->with(['error'=>__('admin/dashboard.edit_category_edit_err_msg')]);
        $data['attributes'] = Attribute::select('id')->get();
        return view('dashboard.products.update.update-specific-option', $data);
    }

    public function updateOption($id,$optionId,OptionRequest $request)
    {
        try {
            DB::beginTransaction();
        $product=Product::find($id);
        if(!$product)
            return redirect()->back()->with(['error'=>__('admin/dashboard.edit_category_edit_err_msg')]);

        $option=Option::find($optionId);
            if(!$option)
                return redirect()->back()->with(['error'=>__('admin/dashboard.edit_category_edit_err_msg')]);
            $option->update($request->only(['attribute_id','price']));
            $option->name = $request->name;
            $option->save();
            DB::commit();
            return redirect()->route('admin.products.edit-add-options',$product->id)->with(['success' => __('admin/dashboard.pro_option_update_success')]);
        }catch (\Exception $ex) {
//            return $ex;
            DB::rollBack();
            return redirect()->back()->withInput()->with(['error' => __('admin/dashboard.category_error_create_msg')]);
        }
    }
    public function deleteOption($id,$optionId){

        try{
            $product=Product::find($id);
            if(!$product)
                return redirect()->back()->with(['error'=>__('admin/dashboard.edit_category_edit_err_msg')]);

            $option=Option::find($optionId);
            if(!$option)
                return redirect()->back()->with(['error'=>__('admin/dashboard.edit_category_edit_err_msg')]);

            if($option->translate('en')) {
                $option->translate('en')->delete();
                $option->delete();
            }else{
                $option->delete();
            }
            return redirect()->route('admin.products.edit-add-options',$product->id)->with(['success' => __('admin/dashboard.pro_option_delete_success')]);
        }catch (\Exception $ex) {
            //         return $ex;
            return redirect()->back()->with(['error'=>__('admin/dashboard.index_option_destroy_err_msg')]);
        }
    }
    ################################# End update product #####################################

    ################################# Start soft delete & restore product #####################################
    public function deleteProduct($id){

        try{
            $product=Product::find($id);
            if(!$product)
                return redirect()->back()->with(['error'=>__('admin/dashboard.edit_category_edit_err_msg')]);


            if($product->translate('en')) {
                $product->translate('en')->delete();
                $product->delete();
            }else{
                $product->delete();
            }
            return redirect()->route('admin.products')->with(['success' => __('admin/dashboard.pro_delete_success')]);
        }catch (\Exception $ex) {
            //         return $ex;
            return redirect()->back()->with(['error'=>__('admin/dashboard.pro_delete_err')]);
        }
    }
    public function restoreProducts($id)
    {
    try{
        $product=Product::withTrashed()->find($id);
        if(!$product)
            return redirect()->back()->with(['error'=>__('admin/dashboard.edit_category_edit_err_msg')]);


        $product->restore();

        return redirect()->back()->with(['error'=>__('admin/dashboard.pro_restore_success')]);
        }catch (\Exception $ex) {
        //         return $ex;
    return redirect()->back()->with(['error'=>__('admin/dashboard.pro_restore_err')]);
    }
    }
    ################################ End soft delete & restore product ####################################

}

