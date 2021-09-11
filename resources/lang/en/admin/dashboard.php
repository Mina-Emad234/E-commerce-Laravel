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

    'total_sales'=>'Total Sales',
    'total_request'=>'Total Request',
    'total_products'=>'Total Product',
    'total_clients'=>'Total Clients',
    'new_request'=>'New Requests',
    'request_number'=>'Request Number',
    'client'=>'Client',
    'price'=>'Price',
    'request_status'=>'Request Status',
    'total'=>'Total',
    'last_review'=>'Last Reviews',
    'product'=>'Product',
    'review'=>'Review',

    ###################################### End dashboard content keys #####################################

    ###################################### Start sidebar keys #######################################

    'settings'=>'Settings',
    'shipping_methods'=>'Shipping Methods',
    'free_shipping'=>'Free Shipping',
    'internal_shipping'=>'Local Shipping',
    'external_shipping'=>'Outer Shipping',
    'index_category_view_maincategory'=>'View all',
    'index_category_add_maincategory'=>'Add Main category',
    "index_category_add_subcategory"=>"add new subcategory",
    ''=>'',

    ###################################### End sidebar keys #######################################

    ###################################### start Admin Header keys #######################################
    'admin_edit_profile'=>'ُEdit Profile',
    'admin_logout'=>'Logout',
    ''=>'',
    ''=>'',
    ###################################### End Admin Header keys #######################################

    ###################################### Start shipping form keys #######################################

    'main'=>'Main Page',
    'shipping_method'=>'Shipping Methods',
    'shipping_edit'=>'Edit shipping Method',
    'edit_shipping_data'=>'Shipping Data',
    'edit_shipping_name'=>'Shipping Name',
    'edit_shipping_value'=>'Shipping Value',
    'edit_shipping_save'=>'Save',
    'shipping_required'=>'Required Field',
    'shipping_numeric'=>'This Field MUST be numeric',
    'shipping_success_msg'=>'Shipping data updated Successfully',
    'shipping_error_msg'=>'something is wrong with data',
    ''=>'',
    ''=>'',

    ###################################### End shipping form keys #######################################

    ###################################### Start edit profile keys ######################################
    "profile_edit"=>"Edit Profile",
    "edit_profile_name"=>"Full Name",
    "edit_profile_email"=>"Email",
    "edit_profile_current_pass"=>"Current password",
    "edit_profile_new_password"=>"New Password",
    "edit_profile_confirm_password"=>"Confirm Password",
    "edit_profile_save"=>"Update",
    "profile_current_pass_validation"=>"Incorrect Password",
    "edit_profile_field_required"=>"Field Required",
    "edit_profile_validate_email"=>"Invalid Email",
    "edit_profile_email_unique"=>"this email must be UNIQUE",
    "edit_profile_current_pass_require"=>"Please enter your current password if you want to update your password",
    "edit_profile_confirm_pass"=>"Confirmed password doesn't match your new password",
    "edit_profile_min_pass_validation"=>"Password should contain at least 8 characters",
    "edit_profile_new_pass_require"=>"Please Enter your new password",
    "profile_success_msg"=>"Profile updated successfully",
    'profile_error_msg'=>'something is wrong with data',
    ###################################### End edit profile keys ######################################

    /*******************************
     * Categories & products Keys  *
     *******************************/

    ###################################### Start index category keys ######################################

    "index_category_maincategory"=>"Main category",
    "index_category_dashboard"=>"Dashboard",
    "index_category_allcategory"=>"All Categories",
    "index_category_category_name"=>"Category",
    "index_category_category_slug"=>"Slug",
    "index_category_category_status"=>"Status",
    "index_category_category_img"=>"Image",
    "index_category_category_operations"=>"Operations",
    "index_category_category_operations_edit"=>"Edit",
    "index_category_category_operations_delete"=>"Delete",
    "index_category_category_active"=>"Active",
    "index_category_category_inactive"=>"Inactive",
    "index_category_destroy_success_msg"=>"Main category deleted successfully",
    "index_category_destroy_err_msg"=>"some thing is wrong on delete this Main category",


    ####################################### End index category keys #######################################

    ###################################### Start create & edit category keys ######################################
    "edit_category_edit_err_msg"=>"this id doesn't exists",
    "edit_category_category_edit"=>"Edit Main Category",
    "edit_category_category_img"=>"Category image",
    "edit_category_category_dat"=>"Category data",
    "category_success_msg"=>"Category updated successfully",
    "category_error_msg"=>"something is wrong with data",
    "edit_profile_slug_unique"=>"Slug is already & must be unique",
    "category_success_create_msg"=>"new category has been created successfully",
    "category_error_create_msg"=>"something is wrong with data you enter",
    "index_category_parent_category"=>"Parent Category",
    "index_category_subcategory"=>"Subcategories",
    "index_category_category_operations_add"=>"Add",
    "parent_category_required"=>"please choose parent category",
    "parent_category_exists"=>"this parent category isn't exists",
    "index_category_parent_category_choose"=>"Choose one",
    "edit_category_subcategory_edit"=>"Edit sub category",
    ""=>"",
    ####################################### End create & edit category keys #######################################

    ###################################### End create & edit brand keys ######################################

    "index_brand"=>"Brands",
    "index_add_brand"=>"Add New Brand",
    "index_brands"=>"Brands",
    "index_all_brands"=>"All Brands",
    "index_brand_name"=>"Brand Name",
    "index_brand_img"=>"Brand Image",
    "brand_data"=>"Brand Data",
    "brand_img_required"=>"Brand Image is required",
    "brand_img_mimes"=>"file extension isn't allowed",
    "brand_success_create_msg"=>"New Brand has been added successfully",
    "edit_brand"=>"Edit Brand",
    "brand_updated_success_msg"=>"brand updated successfully",
    "index_brand_destroy_success_msg"=>"Brand has been deleted successfully",
    "index_brand_destroy_err_msg"=>"some thing is wrong on delete this Brand",

    ###################################### End create & edit brand keys ######################################

    ###################################### Start tag keys ######################################

    "index_tag"=>"Tags",
    "index_add_tag"=>"Add New Tag",
    "index_all_tags"=>"All Tags",
    "index_tag_name"=>"Tag Name",
    "tag_data"=>"Tag Data",
    "tag_success_create_msg"=>"Tag has been Added successfully",
    "tag_updated_success_msg"=>"Tag has been updates successfully",
    "index_tag_destroy_success_msg"=>"Tag has been deleted successfully",
    "index_tag_destroy_err_msg"=>"some thing is wrong on delete this Tag",
    "edit_tag"=>"Edit tag",
    "index_tag_update"=>"Update",
    ""=>"",
    ""=>"",
    ""=>"",

    ###################################### End tag keys ######################################

    ###################################### Start product keys ######################################

    "index_pro"=>"products",
    "index_add_pro"=>"Add New Product",
    "index_pro_name"=>"Product Name",
    "index_pro_data"=>"Product Data",
    "index_pro_desc"=>"Product Description",
    "index_pro_short_desc"=>"Short Description",
    "index_choose_tag"=>"Choose Tag",
    "brand"=>"Brand",
    "index_choose_brand"=>"Choose Brand",
    "index_all_pro"=>"All products",
    "index_pro_price"=>"Price",
    "pro_prev"=>"Previous",
    "pro_next"=>"Next",
    "pro_save"=>"Save",
    "pro_price_data"=>"Product price Data",
    "pro_price"=>'Price',
    "pro_special_price"=>"Special Price",
    "pro_price_type"=>"Special Price Type",
    "pro_price_precent"=>"percent",
    "pro_price_fixed"=>"Fixed",
    "pro_start"=>"Special Price Start Date",
    "pro_end"=>"Special Price End Date",
    "pro_inventory"=>"Product Inventory",
    "pro_code"=>"sku",
    "pro_stock"=>"Manage Stock",
    "pro_stock_available"=>"Available Stock",
    "pro_stock_notavailable"=>"Non Available Stock",
    "pro_status"=>"Product Status",
    "pro_status_available"=>"Available",
    "pro_status_notavailable"=>"Non Available",
    "pro_qty"=>"Quantity",
    "pro_img"=>"Product Image",
    //////////////////// validation messages //////////////////////
    "pro_success"=>"Product has been Added successfully",
    "pro_desc_max"=>"Product description must not be greater than 1800 characters",
    "pro_short_desc_max"=>"Product description must not be greater than 500 characters",
    "pro_brand_exists"=>"this Brand is not exists",
    "pro_min"=>"Product Price must not be greater than 8 Numbers",
    "pro_req"=>"This Field is required if you fill Special Price Field",
    "pro_sku_min"=>"Sku must not be less than 3 characters",
    "pro_sku_max"=>"Sku must not be greater than 8 characters",
    "pro_qty_req"=>"Quantity required when Manage stock is Available",
    "pro_cat_exists"=>"This category doesn't exist",
    "pro_end_date"=>"End date must be after start date",
    //////////////////// update section /////////////////////////////
    "index_pro_update_product"=>"Update Product",
    "index_pro_update_price"=>"Update Price",
    "index_pro_update_inv"=>"Update Inventory",
    "index_pro_update_img"=>"Update Images",
    "index_pro_update_general"=>"Update General Information",
    "pro_update_msg_success"=>"Product Updated Successfully",
    "pro_delete_img_success"=>"Image Deleted Successfully",
    "category_error_delete_img"=>"some thing is wring on deleting this image",
    ////////////////// delete section /////////////////////
    "pro_delete_success"=>"Product Deleted Successfully",
    "pro_delete_err"=>"some thing is wring on deleting this Product",
    "pro_restore_success"=>"Product Restored Successfully",
    "pro_restore_err"=>"some thing is wring on Restoring this Product",
    "index_pro_restore"=>"Restore",
    ###################################### End Product keys ######################################

    ###################################### Start attributes keys ######################################

    "index_attr"=>"Product Attributes",
    "index_add_attr"=>"Add New Attribute",
    "index_all_attr"=>"All Attributes",
    "index_attr_name"=>"Attribute Name",
    "attr_data"=>"Attribute Data",
    "attr_success_create_msg"=>"Attribute has been Added Successfully",
    "attr_updated_success_msg"=>"Attribute has been Updated Successfully",
    "edit_attr"=>"Edit Attribute",
    "attr_validation_unique"=>"Attribute must be Unique",
    "attr_validation_max"=>"Attribute must not be greater than 100 characters",
    "attr_destroy_success_msg"=>"Attribute has been deleted successfully",
    "attr_destroy_err_msg"=>"some thing is wrong on delete this Attribute",

    ###################################### End attributes keys ######################################


    ###################################### Start options keys ######################################

    "pro_option"=>"Option Name",
    "pro_options"=>"Product Attribute Option",
    "pro_option_price"=>"Option Price",
    "option_validation_max"=>"Option must not be greater than 100 characters",
    "pro_option_exists"=>"This Attribute doesn't exist",
    "pro_option_min"=>"Price must not be Negative",
    "pro_option_success"=>"Product option Created Successfully Add another option if you want",
    "index_pro_update_option"=>"Update Option",
    "pro_option_data"=>"Option Data",
    "pro_addition_option_data"=>"Add Additional Option",
    "pro_option_update_success"=>"Option has Been Updated Successfully",
    "pro_option_delete_success"=>"Option has Been Deleted Successfully",
    "index_option_destroy_err_msg"=>"some thing is wrong on delete this Option",
    ""=>"",


    ###################################### End options keys ######################################


    ###################################### Start slider keys ######################################

    "slider"=>"Slider",
    "slider_index"=>"Slider Images",
    "slider_data"=>"Slider Data",
    "slider_upload_img"=>"Upload Image",
    "slider_img"=>"Slider Image",
    "slider_success"=>"Images Uploaded Successfully",
    "slider_delete_img_success"=>"Slider Image Deleted Successfully",
    ""=>"",
    ""=>"",
    ""=>"",


    ###################################### End slider keys ######################################


    ###################################### Start roles keys ######################################

    "index_role"=>"Roles & permissions",
    "index_add_role"=>"Add role",
    "index_all_role"=>"All Roles & Permissions",
    "index_roles"=>"Roles",
    "index_edit_role"=>"Edit role",
    "index_data_role"=>"Roles data",
    "role_success_create_msg"=>"Role has been added successfully",
    "role_updated_success_msg"=>"Role has been updated successfully",
    "index_user_role"=>"Users Permissions",
    "index_add_user_role"=>"Add user role",
    "index_data_user_role"=>"User roles data",
    "user_role"=>"Role",
    "choose_user_role"=>"Choose role",
    "user_pass"=>"Password",
    "index_all_roles"=>"All roles",
    "admin_success_create_msg"=>"Admin has been added successfully",
    ""=>"",

    ###################################### End roles keys ######################################


    ###################################### Start orders keys ######################################

    "orders"=>"Orders",
    "product_orders"=>"product orders",
    "all_orders"=>"All orders",
    "all_product_orders"=>"All product orders",
    "paid"=>"Paid",
    "unpaid"=>"Unpaid",
    "customer_name"=>"Customer name",
    "customer_phone"=>"Customer phone",
    "total_pay"=>"Total",
    "status"=>"Status",
    "order_success_delete"=>"Order has been deleted successfully",
    "order_error_delete"=>"there is an error on deleting order",
    "product_order_success_delete"=>"Product' order has been deleted successfully",
    "product_order_error_delete"=>"there is an error on deleting product order",
    "qty"=>"Quantity",
    ""=>"",
   ,

    ###################################### End orders keys ######################################



];
