<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item active"><a href="{{route('admin.dashboard')}}"><i class="la la-mouse-pointer"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">{{__('admin/dashboard.index_category_dashboard')}} </span></a>
            </li>
            @can('main_categories')
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{__('admin/dashboard.index_category_maincategory')}}</span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Category::parent()->count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.maincategories','main')}}"
                                          data-i18n="nav.dash.ecommerce"> {{__('admin/dashboard.index_category_view_maincategory')}} </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.maincategories.create','main')}}" data-i18n="nav.dash.crypto">{{__('admin/dashboard.index_category_add_maincategory')}} </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{__('admin/dashboard.index_category_subcategory')}}   </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Category::child()->count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.maincategories','sub')}}"
                                          data-i18n="nav.dash.ecommerce">{{__('admin/dashboard.index_category_view_maincategory')}}</a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.maincategories.create','sub')}}" data-i18n="nav.dash.crypto">
                            {{__('admin/dashboard.index_category_add_subcategory')}} </a>
                    </li>
                </ul>
            </li>
            @endcan

            @can('brands')
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{__('admin/dashboard.index_brand')}}   </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Brand::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.brands')}}"
                                          data-i18n="nav.dash.ecommerce">{{__('admin/dashboard.index_category_view_maincategory')}}</a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.brands.create')}}" data-i18n="nav.dash.crypto">
                            {{__('admin/dashboard.index_add_brand')}} </a>
                    </li>
                </ul>
            </li>
            @endcan
            @can('tags')
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{__('admin/dashboard.index_tag')}}   </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Tag::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.tags')}}"
                                          data-i18n="nav.dash.ecommerce">{{__('admin/dashboard.index_category_view_maincategory')}}</a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.tags.create')}}" data-i18n="nav.dash.crypto">
                            {{__('admin/dashboard.index_add_tag')}} </a>
                    </li>
                </ul>
            </li>
            @endcan
            @can('products')
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{__('admin/dashboard.index_pro')}}   </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Product::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.products')}}"
                                          data-i18n="nav.dash.ecommerce">{{__('admin/dashboard.index_category_view_maincategory')}}</a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.products.general.create')}}" data-i18n="nav.dash.crypto">
                            {{__('admin/dashboard.index_add_pro')}} </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.attributes')}}" data-i18n="nav.dash.crypto">
                            <span class="menu-title" data-i18n="nav.dash.main">{{__('admin/dashboard.index_attr')}}   </span>
                            <span
                                class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Attribute::count()}}</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{__('admin/dashboard.orders')}}</span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Order::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.orders')}}"
                                          data-i18n="nav.dash.ecommerce"> {{__('admin/dashboard.index_category_view_maincategory')}} </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.products_orders')}}" data-i18n="nav.dash.crypto">{{__('admin/dashboard.product_orders')}} </a>
                    </li>
                </ul>
            </li>
            @endcan
            @can('roles')
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{__('admin/dashboard.index_role')}}   </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Role::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.roles')}}"
                                          data-i18n="nav.dash.ecommerce">{{__('admin/dashboard.index_category_view_maincategory')}}</a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.roles.create')}}" data-i18n="nav.dash.crypto">
                            {{__('admin/dashboard.index_add_role')}} </a>
                    </li>
                </ul>
            </li>
            @endcan
            @can('users')
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{__('admin/dashboard.index_user_role')}}   </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Admin::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.users')}}"
                                          data-i18n="nav.dash.ecommerce">{{__('admin/dashboard.index_category_view_maincategory')}}</a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.users.create')}}" data-i18n="nav.dash.crypto">
                            {{__('admin/dashboard.index_add_user_role')}} </a>
                    </li>
                </ul>
            </li>
            @endcan

            @can('settings')
            <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.templates.main">{{__('admin/dashboard.settings')}}</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="#" data-i18n="nav.templates.vert.main">{{__('admin/dashboard.shipping_methods')}}</a>
                        <ul class="menu-content">
                            <li><a class="menu-item" href="{{route('edit.shipping.methods','free')}}"
                                   data-i18n="nav.templates.vert.classic_menu">{{__('admin/dashboard.free_shipping')}}</a>
                            </li>
                            <li><a class="menu-item" href="{{route('edit.shipping.methods','local')}}">{{__('admin/dashboard.internal_shipping')}}</a>
                            </li>
                            <li><a class="menu-item" href="{{route('edit.shipping.methods','outer')}}"
                                   data-i18n="nav.templates.vert.compact_menu">{{__('admin/dashboard.external_shipping')}}</a>
                            </li>
                        </ul>

                    <li><a class="menu-item" href="#" data-i18n="nav.templates.vert.main">{{__('admin/dashboard.slider')}}</a>
                        <ul class="menu-content">
                            <li><a class="menu-item" href="{{route('admin.sliders.create-images')}}"
                                   data-i18n="nav.templates.vert.classic_menu">{{__('admin/dashboard.slider_index')}}</a>
                            </li>
                        </ul>
                    </li>
                    @endcan




        </ul>
        </ul>
    </div>
</div>
