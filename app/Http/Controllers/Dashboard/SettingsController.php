<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ShippingRequest;
use App\Models\Setting;
use App\Models\SettingTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * edit & update shipping setting
 * Class SettingsController
 * @package App\Http\Controllers\Dashboard
 */
class SettingsController extends Controller
{
    public function editShippingMethods($type){

//        return Setting::all();

//        get free shipping

       if ($type == "free")
            $shippingMethod=Setting::where('key','free_shipping_label')->first();

//        get local shipping
       elseif ($type == "local") $shippingMethod=Setting::where('key','local_shipping_label')->first();

//        get outer shipping
        elseif ($type == "outer")
            $shippingMethod=Setting::where('key','outer_shipping_label')->first();

//        in case of trying enter from link
        else
            $shippingMethod=Setting::where('key','free_shipping_label')->first();

        return view('dashboard.settings.shippings.edit',compact('shippingMethod'));
    }


    public function updateShippingMethods(ShippingRequest $request,$id){
//        return $request;
     try {
         $shipping_method = Setting::find($id);
         DB::beginTransaction();
         $shipping_method->update([
             'plain_value' => $request->plain_value
         ]);

//         $shipping_method->translation('en')->value = $request->value;
         $shipping_method->value = $request->value;
         $shipping_method->save();
         DB::commit();
         return redirect()->back()->with(['success'=>__('admin/dashboard.shipping_success_msg')]);
     }catch (\Exception $ex){
//         return $ex;
         DB::rollBack();
         return redirect()->back()->with(['error'=>__('admin/dashboard.shipping_error_msg')]);
     }

    }
}
