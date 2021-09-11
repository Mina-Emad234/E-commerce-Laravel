@extends('layouts.admin')
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('admin/dashboard.index_category_dashboard')}} </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.products')}}">
                                        {{__('admin/dashboard.index_pro')}} </a>
                                </li>
                                <li class="breadcrumb-item active">   {{__('admin/dashboard.index_add_pro')}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> {{__('admin/dashboard.index_add_pro')}} </h4>
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
                                    <div class="card-body">
                                        <div class="form-body">
                                            <form class="form"
                                                  action="{{route('admin.products.store-options')}}"
                                                  method="POST"
                                                  enctype="multipart/form-data">
                                                @csrf

                                                <div class="form-body">
                                                    <h4 class="form-section"><i class="ft-home"></i>   {{__('admin/dashboard.pro_options')}} </h4>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> {{__('admin/dashboard.index_attr_name')}}
                                                                </label>
                                                                <select name="attribute_id" class="select2 form-control">
                                                                    <option value="" selected disabled>{{__('admin/dashboard.index_category_parent_category_choose')}}</option>

                                                                @if($attributes && $attributes -> count() > 0)
                                                                        @foreach($attributes as $attribute)
                                                                            <option
                                                                                value="{{$attribute -> id }}">{{$attribute -> name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                                @error('attribute_id')
                                                                <span class="text-danger"> {{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> {{__('admin/dashboard.pro_option')}}
                                                                </label>
                                                                <input type="text" id="sku"
                                                                       class="form-control"
                                                                       placeholder="  "
                                                                       value="{{old('name')}}"
                                                                       name="name">
                                                                @error("name")
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> {{__('admin/dashboard.pro_option_price')}}
                                                                </label>
                                                                <input type="number" id="sku"
                                                                       class="form-control"
                                                                       placeholder="  "
                                                                       value="{{old('price')}}"
                                                                       name="price">
                                                                @error("price")
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">



                                                </div>


                                                <div class="form-actions">
                                                    <button type="button" class="btn btn-warning mr-1"
                                                            onclick="history.back();">
                                                        <i class="ft-x"></i>{{__('admin/dashboard.pro_prev')}}
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="la la-check-square-o"></i>{{__('admin/dashboard.pro_save')}}
                                                    </button>
                                                    <a class="btn btn-primary mr-1" href="{{route('admin.products.success-options')}}">
                                                        <i class="ft-x"></i>{{__('admin/dashboard.pro_next')}}
                                                    </a>
                                                </div>
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

@stop

@section('script')

    <script>
        $(document).on('change','#manageStock',function(){
            if($(this).val() == 1 ){
                $('#qtyDiv').show();
            }else{
                $('#qtyDiv').hide();
            }
        });
    </script>
@stop
