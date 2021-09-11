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

                                @if(isset($type) && $type == 'sub')
                                    <li class="breadcrumb-item"><a href="{{route('admin.maincategories','sub')}}">{{__('admin/dashboard.index_category_subcategory')}} </a></li>
                                    <li class="breadcrumb-item active">{{__('admin/dashboard.index_category_add_subcategory')}} </li>
                                @else
                                    <li class="breadcrumb-item"><a href="{{route('admin.maincategories','main')}}">{{__('admin/dashboard.index_category_maincategory')}} </a></li>
                                    <li class="breadcrumb-item active">{{__('admin/dashboard.index_category_add_maincategory')}} </li>
                                @endif
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
                                    @if(isset($type) && $type == 'sub')
                                    <h4 class="card-title" id="basic-layout-form">{{__('admin/dashboard.index_category_add_subcategory')}}</h4>
                                    @else
                                    <h4 class="card-title" id="basic-layout-form">{{__('admin/dashboard.index_category_add_maincategory')}}</h4>
                                    @endif
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
                                        <form class="form"
                                              action="{{route('admin.maincategories.store')}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf



{{--                                            <div class="form-group">--}}
{{--                                                <label> {{__('admin/dashboard.edit_category_category_img')}} </label>--}}
{{--                                                <label id="projectinput7" class="file center-block">--}}
{{--                                                    <input type="file" id="file" name="">--}}
{{--                                                    <span class="file-custom"></span>--}}
{{--                                                </label>--}}
{{--                                                @error('')--}}
{{--                                                <span class="text-danger">{{$message}}</span>--}}
{{--                                                @enderror--}}
{{--                                            </div>--}}

                                            <div class="form-body">

                                                <h4 class="form-section"><i class="ft-home"></i> {{__('admin/dashboard.edit_category_category_dat')}} </h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">{{__('admin/dashboard.index_category_category_name')}} </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('name')}}"
                                                                   name="name">
                                                            @error("name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6 ">
                                                        <div class="form-group">
                                                            <label for="slug"> {{__('admin/dashboard.index_category_category_slug')}} </label>
                                                            <input type="text" id="slug"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('slug')}}"
                                                                   name="slug">

                                                            @error("slug")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                    @if(isset($type) && $type == 'sub')
                                                    <div class="row">
                                                        <div class="col-md-12 form-group">
                                                            <label for="parent_category">{{__('admin/dashboard.index_category_parent_category')}} </label>
                                                            <select class="form-control select2" id="parent_category" name="parent_id">
                                                                <option value="0" selected disabled>{{__('admin/dashboard.index_category_parent_category_choose')}}</option>
                                                                    @foreach(\App\Models\Category::parent()->get() as $category)
                                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                                        @foreach( \App\Models\Category::with('subCats')->where('parent_id', "!=", null)->where('parent_id', $category->id)->get() as $sub)
                                                                        <option value="{{$sub->id}}">&emsp;{{$sub->name}}&emsp;</option>
                                                                            @foreach( \App\Models\Category::with('subCats')->where('parent_id', "!=", null)->where('parent_id', $sub->id)->get() as $subsub)
                                                                            <option value="{{$subsub->id}}">&emsp;&emsp;{{$subsub->name}}&emsp;&emsp;</option>
                                                                                @foreach(\App\Models\Category::with('subCats')->where('parent_id', "!=", null)->where('parent_id', $subsub->id)->get() as $subsubsub)
                                                                                <option value="{{$subsubsub->id}}">&emsp;&emsp;&emsp;{{$subsubsub->name}}&emsp;&emsp;&emsp;</option>
                                                                                @endforeach
                                                                            @endforeach
                                                                        @endforeach
                                                                    @endforeach
                                                            </select>
                                                            @error("parent_id")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                @endif

                                                    <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox" value="1"
                                                                   name="status"
                                                                   id="switcheryColor4"
                                                                   class="switchery" data-color="success"
                                                                   checked />
                                                            <label for="switcheryColor4"
                                                                   class="card-title ml-1">{{__('admin/dashboard.index_category_category_status')}}</label>

                                                            @error("status")
                                                            <span class="text-danger"> </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> {{__('admin/dashboard.index_category_category_operations_add')}}
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
