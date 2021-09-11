<?php

use App\Models\Category;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

    define('PAGINATION_COUNT',10); //for pagination

    /**
     * return right to left css & js files when using Arabic language
     * this function used when calling style sheet
     *
     * @return string
     */

    function getFolder(){
       return  app()->getLocale()==='ar'?"css-rtl":"css";
    }

    /**
     * used in nav bar
     * all languages to use in navbar blade
     *
     * @return mixed
     */

    function getLanguages(){
        return $languages=LaravelLocalization::getSupportedLocales();
    }

    /**
     * check if checkbox used in the form's value is null
     * value value equal zero checkbox checked
     *
     * @param $request
     * @return mixed
     */

    function setStatus($request){
        if (!$request->has('status')) {
            return $request->request->add(['is_active'=>\App\Http\Enumeration\StatusType::statusFalse]);
        }else{
            return $request->request->add(['is_active'=>\App\Http\Enumeration\StatusType::statusTrue]);
        }
    }

    /**
     * check if value or requested ID not exists in database table
     * return back & not complete transaction
     *
     * @param $request
     * @return \Illuminate\Http\RedirectResponse
     */

    function checkValue($request){
        if ($request->has('parent_id')){
            $parentId=\App\Models\Category::find($request->parent_id);
                if(!$parentId)
                    return redirect()->back();
        }
    }

    /**
     * store image in folder
     *
     * @param $folder
     * @param $image
     * @return mixed
     */
    function uploadImage($folder,$image){
        $image->store('/',$folder);
        return $image->hashName();
    }


