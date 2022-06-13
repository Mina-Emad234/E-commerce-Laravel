<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Pagination Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the paginator library to build
    | the simple pagination links. You are free to change them to anything
    | you want to customize your views to better match your application.
    |
    */

    ###################################### Start dashboard content keys #####################################

    'total_sales'=>'إجمالي المبيعات',
    'total_request'=>'إجمالي الطلبات',
    'total_products'=>'عدد المنتجات',
    'total_clients'=>'عدد العملاء',
    'new_request'=>'تأحدث الطلبا',
    'request_number'=>'رقم الطلب',
    'client'=>'العميل',
    'price'=>'السعر',
    'request_status'=>'حالة الطلب',
    'total'=>'إجمالي',
    'last_review'=>'التقيمات الأخيرة',
    'product'=>'المنتج',
    'review'=>'التقييم',

    ###################################### End dashboard content keys #####################################

    ###################################### Start sidebar keys #######################################

    'settings'=>'الإعدادات',
    'shipping_methods'=>'طرق التوصيل',
    'free_shipping'=>'توصيل مجاني',
    'internal_shipping'=>'توصيل داخلي',
    'external_shipping'=>'توصيل خارجي',
    'index_category_view_maincategory'=>'عرض الكل',
    'index_category_add_maincategory'=>'إضافة قسم جديد',
    'index_category_add_subcategory'=>'إضافة قسم فرعي جديد',
    'index_category_category_operations_add'=>'إضافة',

    ''=>'',

    ###################################### End sidebar keys #######################################

    ###################################### start Admin Header keys #######################################
    'admin_edit_profile'=>'تعديل الملف الشخصي',
    'admin_logout'=>'تسجيل الخروج',
    ''=>'',
    ###################################### End Admin Header keys #######################################

    ###################################### Start shipping form keys #######################################

    'main'=>'الصفحة الرئيسية',
    'shipping_method'=>'طرق التوصيل',
    'shipping_edit'=>'تحرير طرق التوصيل',
    'edit_shipping_data'=>'بيانات طرق التوصيل',
    'edit_shipping_name'=>'الاسم',
    'edit_shipping_value'=>'القيمة',
    'edit_shipping_save'=>'حفظ',
    'shipping_required'=>'إملأ الحقل',
    'shipping_numeric'=>'هذا الحقل يقبل قيم رقمية فقط',
    'shipping_success_msg'=>'تم تحديث البيانات بنجاح',
    'shipping_error_msg'=>'حدث خطأ أثناء تحديث البيانات',
    ''=>'',
    ''=>'',

    ###################################### End shipping form keys #######################################

    ###################################### Start edit profile keys ######################################
    "profile_edit"=>"تحرير الملف الشخصي",
    "edit_profile_name"=>"الاسم",
    "edit_profile_email"=>"البريد الالكتروني",
    "edit_profile_current_pass"=>"كلمة المرور الحالية",
    "edit_profile_new_password"=>"كلمة المرور الجديدة",
    "edit_profile_confirm_password"=>"تأكيد كلمة المرور",
    "edit_profile_save"=>"تحديث",
    "profile_current_pass_validation"=>"كلمة المرور غير صحيحة",
    "edit_profile_field_required"=>"إملأ الحقل",
    "edit_profile_validate_email"=>"البريد الالكتروني غير صحيح",
    "edit_profile_email_unique"=>"هذا البريد موجود بالفعل",
    "edit_profile_current_pass_require"=>"أدخل كلمة المرور الحالية إذا كنت ىترغب في تغيير كلمة المرور",
    "edit_profile_confirm_pass"=>"كلمة المرور غير متطابقة",
    "edit_profile_min_pass_validation"=>"يجب أن تحتوي كلمة المرور على 8 أحرف على الأقل",
    "edit_profile_new_pass_require"=>"من فضلك أدخل كلمة المرور الجديدة",
    "profile_success_msg"=>"تم تحديث الملف الشخصي بنجاح",
    'profile_error_msg'=>'حدث خطأ أثناء إدخال البيانات',
    ###################################### End edit profile keys ######################################

    /*******************************
     * Categories & products Keys  *
     *******************************/

    ###################################### Start index categories keys ######################################

    "index_category_maincategory"=>"الأقسام الرئيسية",
    "index_category_dashboard"=>"الصفحة الرئيسية",
    "index_category_allcategory"=>"كل الاقسام",
    "index_category_category_name"=>"اسم القسم",
    "index_category_category_slug"=>"الاسم بالرابط",
    "index_category_category_status"=>"الحالة",
    "index_category_category_img"=>"صورة القسم",
    "index_category_category_operations"=>"الاجراءات",
    "index_category_category_operations_edit"=>"تحديث",
    "index_category_category_operations_delete"=>"حذف",
    "index_category_category_active"=>"مفعل",
    "index_category_category_inactive"=>"غير مفعل",
    "index_category_destroy_success_msg"=>"تم حذف القسم بنجاح",
    "index_category_destroy_err_msg"=>"هناك خطأ حدث أثناء حذف البيانات",

    ####################################### End index categories keys #######################################

    ###################################### Start edit categories keys ######################################
    "edit_category_edit_err_msg"=>"هذا المعرف غير موجود",
    "edit_category_category_edit"=>"تحديث القسم الرئيسي",
    "edit_category_category_img"=>"صورة القسم",
    "edit_category_category_dat"=>"بيانات القسم",
    "category_success_msg"=>"تم تحديث بيانات القسم بنجاح",
    "category_error_msg"=>"حدث خطأ أثناء إدخال البيانات",
    "edit_profile_slug_unique"=>"الاسم بالرابط موجود بالفعل",
    "category_success_create_msg"=>"تم إضافة قسم جديد بنجاح",
    "category_error_create_msg"=>"حدث خطأ أثناء إدخال البيانات",
    "index_category_parent_category"=>"القسم الرتيسي",
    "index_category_subcategory"=>"الأقسام الفرعية",
    "parent_category_required"=>"أختر القسم الرئيس",
    "parent_category_exists"=>"هذا القسم غير موجود",
    "index_category_parent_category_choose"=>"قم بتحديد إختيارك ",
    "edit_category_subcategory_edit"=>"تحديث القسم الفرعي",
    ""=>"",

    ####################################### End edit categories keys #######################################

    ###################################### Start create & edit brands keys ######################################
    "index_brand"=>"الماركات التجارية",
    "index_add_brand"=>"إضافة ماركة تجارية",
    "index_brands"=>"الماركات التجارية",
    "index_all_brands"=>"كل الماركات التجارية",
    "index_brand_name"=>"اسم الماركة التجارية",
    "index_brand_img"=>"صورة الماركة التجارية",
    "brand_data"=>"بيانات الماركات التجارية",
    "brand_img_required"=>"صورة الماركة التجارية مطلوبة",
    "brand_img_mimes"=>"هذا الملف غير مسموح به",
    "brand_success_create_msg"=>"تم إضافة ماركة تجارية بنجاح",
    "edit_brand"=>"تحديث الماركة التجارية",
    "brand_updated_success_msg"=>"تم تحديث الماركة التجارية بنجاح بنجاح",
    "index_brand_destroy_success_msg"=>"تم حذف الماركة التجارية بنجتح",
    "index_brand_destroy_err_msg"=>"هناك خطأ حدث أثناء حذف البيانات",
    ###################################### end create & edit brands keys ######################################

    ###################################### Start tag keys ######################################

    "index_tag"=>"العلامات الدلالية",
    "index_add_tag"=>"إضافة علامة دلالية",
    "index_all_tags"=>"كل العلامات الدلالية",
    "index_tag_name"=>"اسم العلامة الدلالية",
    "tag_data"=>"بيانات العلامة الدلالية",
    "tag_success_create_msg"=>"تم إضافة علامة دلالية جديدة بنجاح",
    "tag_updated_success_msg"=>"تم تحديث علامة دلالية  بنجاح",
    "index_tag_destroy_success_msg"=>"تم حذف العلامة الدلالية بنجاح",
    "index_tag_destroy_err_msg"=>"حدث خطأ في البيانات أثناء حذف العلامة الدلالية",
    "edit_tag"=>"تعديل العلامة الدلالية",
    "index_tag_update"=>"تحديث",
    ""=>"",
    ""=>"",
    ""=>"",

    ###################################### end tag keys ######################################


    ###################################### Start product keys ######################################

    "index_pro"=>"المنتجات",
    "index_add_pro"=>"إضافة منتج",
    "index_pro_name"=>"اسم المنتج",
    "index_pro_data"=>"بيانات المنتج",
    "index_pro_desc"=>"وصف المنتج",
    "index_pro_short_desc"=>"وصف موجز للمنتج",
    "index_choose_tag"=>"إختر علامة دلالية",
    "brand"=>"العلامة التجارية",
    "index_choose_brand"=>"إختر علامة تجارية",
    "index_all_pro"=>"كل المنتجات",
    "index_pro_price"=>"السعر",
    "pro_prev"=>"السابق",
    "pro_next"=>"التالي",
    "pro_save"=>"حفظ",
    "pro_price_data"=>"بيانات سعر المنتج",
    "pro_price"=>'السعر',
    "pro_special_price"=>"سعر خاص",
    "pro_price_type"=>"نوع السعر الخاص",
    "pro_price_precent"=>"نسبة مئوية",
    "pro_price_fixed"=>"ثابت",
    "pro_start"=>"تاريخ بداية السعر الخاص",
    "pro_end"=>"تاريخ إنتهاء السعر الخاص",
    "pro_inventory"=>"تخزين المنتج",
    "pro_code"=>"كود المنتج",
    "pro_stock"=>"إدارة التخزين",
    "pro_stock_available"=>"التخزين متاح",
    "pro_stock_notavailable"=>"التخزين غير متاح",
    "pro_status"=>"حالة المنتج",
    "pro_status_available"=>"متاح",
    "pro_status_notavailable"=>"غير متاح",
    "pro_qty"=>"الكمية",
    "pro_img"=>"صورة المنتج",
    //////////////////// validation messages //////////////////////
    "pro_success"=>"تم إضافة منتج بنجاح",
    "pro_desc_max"=>"وصف المنتج يجب ألا يزيد عن 1800 حرف",
    "pro_short_desc_max"=>"الوصف الموجز المنتج يجب ألا يزيد عن 500 حرف",
    "pro_brand_exists"=>"هذه العلامة التجارية ليست موجودى",
    "pro_min"=>"سعر المنتج يجب ألا يزيد عن 8 أرقام",
    "pro_req"=>"الحقل مطلوب عند إدخال السعر الخاص",
    "pro_sku_min"=>"الكود يجب ألا يقل عن 3 أحرف",
    "pro_sku_max"=>"الكود يجب ألا يزيد عن 8 أحرف",
    "pro_qty_req"=>"الكمية مطلوبة عند إدخال حقل إدارة التخزين",
    "pro_cat_exists"=>"هذا القسم غير موجود",
    "pro_end_date"=>"تاريخ إنتهاء السعر الخاص يجب أن يأتي بع تاريخ إبتداء السعر الخاص",
    //////////////////// update section /////////////////////////////
    "index_pro_update_product"=>"تحديث المنتج",
    "index_pro_update_price"=>"تحديث السعر",
    "index_pro_update_inv"=>"تحديث المخزن",
    "index_pro_update_img"=>"تحديث الصور",
    "index_pro_update_general"=>"تحديث المنتج",
    "pro_update_msg_success"=>"تم تحديث المنتج بنجاح",
    "pro_delete_img_success"=>"تم حذف صورة المنتج بنجاح",
    "category_error_delete_img"=>"حدث خطأ ما أثناء حذف صورة المنتج",
    ////////////////// delete section /////////////////////
    "pro_delete_success"=>"تم حذف المنتج بنجاح",
    "pro_delete_err"=>"حدث خطأ ما أثناء حذف المنتج",
    "pro_restore_success"=>"تم إسترجاع المنتج بنجاح",
    "pro_restore_err"=>"حدث خطأ ما أثناء إسترجاع المنتج",
    "index_pro_restore"=>"إسترجاع",

    ###################################### end product keys ######################################

    ###################################### Start attributes keys ######################################

    "index_attr"=>"خصائص المنتج",
    "index_add_attr"=>"إضافة خاصية جديدة",
    "index_all_attr"=>"كل الخصائص",
    "index_attr_name"=>"اسم الخاصية",
    "attr_data"=>"بيانات الخاصية",
    "attr_success_create_msg"=>"تم إضافة خاصية جديدة بنجاح",
    "attr_updated_success_msg"=>"تم تحديث هذه الخاصية بنجاح",
    "edit_attr"=>"تحرير الخاصية",
    "attr_validation_unique"=>"هذه الخاصية موجودة من قبل",
    "attr_validation_max"=>"اسم الخاصية يجب ألا يزيد عن 100 حرف",
    "attr_destroy_success_msg"=>"تم حذف الخاصية بنجاح",
    "attr_destroy_err_msg"=>"حدث خطأ في البيانات أثناء حذف الخاصية",

    ###################################### end attributes keys ######################################


    ###################################### Start options keys ######################################

    "pro_option"=>"اسم القيمة",
    "pro_options"=>"قيم المنتجات",
    "pro_option_price"=>"السعر",
    "option_validation_max"=>"القيمة يجب ألا تزيد عن 100 حرف",
    "pro_option_exists"=>"هذه الخاصية ليست موجودة",
    "pro_option_min"=>"السعر يجب ألا يكون قيمة سالبة",
    "pro_option_success"=>"تم إضافة القيمة بنجاح ويمكنك إضافة المزيد من القيم",
    "index_pro_update_option"=>"تحديث القيمة",
    "pro_option_data"=>"بيانات القيمة",
    "pro_addition_option_data"=>"إضافة المزيد من القيم",
    "pro_option_update_success"=>"تم تحديث القيمة بنجاح",
    "pro_option_delete_success"=>"تم حذف القيمة بنجاح",
    "index_option_destroy_err_msg"=>"حدذ خطأ ما أثناء حذف القيم",
    ""=>"",

    ###################################### end options keys ######################################


    ###################################### Start slider keys ######################################

    "slider"=>"سلايدر",
    "slider_index"=>"صور الاسلايدر",
    "slider_data"=>"بيانات الاسلايدر",
    "slider_upload_img"=>"رفع الصورة",
    "slider_img"=>"صورة السلايدر",
    "slider_success"=>"تم رفع الصورة بنجاح",
    "slider_delete_img_success"=>"ام حذف الصورة بنجاح",
    ""=>"",
    ""=>"",
    ""=>"",


    ###################################### End slider keys ######################################

    ###################################### Start roles keys ######################################

    "index_role"=>"الصلاحيات",
    "index_add_role"=>"إضافة صلاحية",
    "index_all_role"=>"كل الصلاحيات",
    "index_roles"=>"الصلاحيات",
    "index_edit_role"=>"تحديث الصلاحية",
    "index_data_role"=>"بيانات الصلاحية",
    "role_success_create_msg"=>"تم إضافة صلاحية بنجاح",
    "role_updated_success_msg"=>"تم تحديث صلاحية بنجاح",
    "index_user_role"=>"صلاحيات المستخدم",
    "index_add_user_role"=>"إضافة صلاحية للمستخدم",
    "index_data_user_role"=>"بيانات صلاحيات المستخدم",
    "user_role"=>"الصلاحية",
    "choose_user_role"=>"إختر الصلاحية",
    "user_pass"=>"كلمة المرور",
    "index_all_roles"=>"كل الصلاحيات",
    "admin_success_create_msg"=>"تم إضافة مستخدم لوحة التحكم بنجاح",
    ""=>"",

    ###################################### End roles keys ######################################


    ###################################### Start orders keys ######################################

    "orders"=>"الطلبات",
    "product_orders"=>"طلبات المنتجات",
    "all_orders"=>"كل الطلبات",
    "all_product_orders"=>"كل طلبات المنتجات",
    "paid"=>"مدفوع",
    "unpaid"=>"غير مدفوع",
    "customer_name"=>"اسم العميل",
    "customer_phone"=>"هاتف العميل",
    "total_pay"=>"إجمالي المدفوع",
    "status"=>"الحالة",
    "order_success_delete"=>"ام حذف الطلبات بنجاح",
    "order_error_delete"=>"حدث خطأ أثناء حذف الطلبات",
    "product_order_success_delete"=>"ام حذف طلبات المنتجات بنجاح",
    "product_order_error_delete"=>"حدث خطأ أثناء حذف طلبات المنتجات",
    "qty"=>"الكمية",
    ""=>"",


    ###################################### End orders keys ######################################




];
