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
                                <li class="breadcrumb-item active">  {{__('admin/dashboard.index_pro_data')}}
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
                                    <h4 class="card-title" id="basic-layout-form">   {{__('admin/dashboard.index_pro_update_inv')}} </h4>
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
                                                  action="{{route('admin.products.general.update-inventory',$product->id)}}"
                                                  method="POST"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$product->id}}">
                                                <div class="form-body">

                                                    <h4 class="form-section"><i class="ft-home"></i>   {{__('admin/dashboard.pro_inventory')}} </h4>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> {{__('admin/dashboard.pro_code')}}
                                                                </label>
                                                                <input type="text" id="sku"
                                                                       class="form-control"
                                                                       placeholder="  "
                                                                       value="{{$product->sku}}"
                                                                       name="sku">
                                                                @error("sku")
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="projectinput1">{{__('admin/dashboard.pro_stock')}}
                                                                </label>
                                                                <select name="manage_stock" class="select2 form-control" id="manageStock">
                                                                        <option value="1" @if($product->manage_stock == 1) selected @endif>{{__('admin/dashboard.pro_stock_available')}}</option>
                                                                        <option value="0" @if($product->manage_stock == 0) selected @endif>{{__('admin/dashboard.pro_stock_notavailable')}}  </option>
                                                                </select>
                                                                @error('manage_stock')
                                                                <span class="text-danger"> {{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">



                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1">{{__('admin/dashboard.pro_status')}}
                                                                </label>
                                                                <select name="in_stock" class="select2 form-control" >
                                                                        <option value="1"  @if($product->in_stock == 1) selected @endif>{{__('admin/dashboard.pro_status_available')}}</option>
                                                                        <option value="0"  @if($product->in_stock == 0) selected @endif>{{__('admin/dashboard.pro_status_notavailable')}} </option>
                                                                </select>
                                                                @error('in_stock')
                                                                <span class="text-danger"> {{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6" style="display:none"  id="qtyDiv">
                                                            <div class="form-group">
                                                                <label for="projectinput1">{{__('admin/dashboard.pro_qty')}}
                                                                </label>
                                                                <input type="text" id="sku"
                                                                       class="form-control"
                                                                       placeholder="  "
                                                                       value="{{$product->qty}}"
                                                                       name="qty">
                                                                @error("qty")
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> {{__('admin/dashboard.index_category_category_name')}}
                                                                </label>
                                                                <select name="categories[]" class="select2 form-control" multiple>
                                                                    @if($categories && $categories -> count() > 0)
                                                                        @foreach($categories as $category)
                                                                            <option
                                                                                    value="{{$category -> id }}"
                                                                                    @foreach ($product_categories as $cat)
                                                                                {{$category -> id == $cat ->pivot ->category_id? 'selected':''}} @endforeach>{{$category -> name}}</option>
                                                                            @endforeach
                                                                    @endif
                                                                </select>
                                                                @error('categories.0')
                                                                <span class="text-danger"> {{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="projectinput1">{{__('admin/dashboard.index_tag')}}
                                                                </label>
                                                                <select name="tags[]" class="select2 form-control" multiple>
                                                                    <optgroup label="{{__('admin/dashboard.index_choose_tag')}} ">
                                                                        @if($tags && $tags -> count() > 0)
                                                                            @foreach($tags as $tag)
                                                                                    <option
                                                                                        value="{{$tag -> id }}"
                                                                                        @foreach($product_tags as $_tag)
                                                                                        {{$tag -> id == $_tag ->pivot-> tag_id? 'selected':''}} @endforeach>{{$tag -> name}}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    </optgroup>
                                                                </select>
                                                                @error('tags')
                                                                <span class="text-danger"> {{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>



                                                </div>


                                                <div class="form-actions">
                                                    <button type="button" class="btn btn-warning mr-1"
                                                            onclick="history.back();">
                                                        <i class="ft-x"></i>{{__('admin/dashboard.pro_prev')}}
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="la la-check-square-o"></i>{{__('admin/dashboard.pro_save')}}
                                                    </button>
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
        $(function(){
            if($("#manageStock").val() == 1 ){
                $('#qtyDiv').show();
            }else{
                $('#qtyDiv').hide();
            }
        });
        $(document).on('change','#manageStock',function(){
            if($(this).val() == 1 ){
                $('#qtyDiv').show();
            }else{
                $('#qtyDiv').hide();
            }
        });

    </script>
@stop
