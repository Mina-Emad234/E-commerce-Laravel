@extends('layouts.admin')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">{{__('admin/dashboard.index_pro')}}</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('admin/dashboard.index_category_dashboard')}}</a>
                                </li>
                                <li class="breadcrumb-item active">{{__('admin/dashboard.index_pro')}} </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{__('admin/dashboard.index_all_pro')}}</h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                @include('dashboard.includes.alerts.success')
                                @include('dashboard.includes.alerts.errors')

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard" style="position: relative !important; overflow: auto !important;">
                                        <table
                                            class="table display nowrap table-striped table-bordered scroll-horizontal" >
                                            <thead class="">
                                            <tr>
                                                <th>{{__('admin/dashboard.index_pro_name')}} </th>
                                                <th>{{__('admin/dashboard.index_category_category_slug')}} </th>
                                                <th>{{__('admin/dashboard.index_category_category_status')}}</th>
                                                <th>{{__('admin/dashboard.index_pro_price')}}</th>
                                                <th>{{__('admin/dashboard.index_category_category_operations')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($products)
                                                @foreach($products as $product)
                                                    <tr>
                                                        <td>{{$product -> name}}</td>
                                                        <td>{{$product -> slug}}</td>
                                                        <td>{{$product -> getActive()}}</td>
                                                        <td>{{$product -> price}}</td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">


                                                                @if(\App\Models\Product::find($product->id))
                                                                <a href="{{route('admin.products.general.edit',$product -> id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">{{__('admin/dashboard.index_pro_update_product')}}</a>
                                                                 <a href="{{route('admin.products.general.edit-price',$product -> id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">{{__('admin/dashboard.index_pro_update_price')}} </a>
                                                                <a href="{{route('admin.products.general.edit-inventory',$product -> id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">{{__('admin/dashboard.index_pro_update_inv')}} </a>
                                                                <a href="{{route('admin.products.general.edit-images',$product -> id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">{{__('admin/dashboard.index_pro_update_img')}} </a>
                                                                <a href="{{route('admin.products.edit-add-options',$product -> id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">{{__('admin/dashboard.index_pro_update_option')}} </a>
                                                                <a href="{{route('admin.products.delete-product',$product -> id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">{{__('admin/dashboard.index_category_category_operations_delete')}}</a>
                                                                @endif
                                                                @if(!\App\Models\Product::find($product->id))
                                                                 <a href="{{route('admin.products.restore-product',$product -> id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">{{__('admin/dashboard.index_pro_restore')}} </a>
                                                                    @endif





                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset


                                            </tbody>
                                        </table>


                                    </div>
                                    <div class="d-flex justify-content-center">
                                        {!! $products->appends(['sort' => 'science-stream'])->links() !!}
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
    </script>
@stop
