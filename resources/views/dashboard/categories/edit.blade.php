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
                                @else
                                    <li class="breadcrumb-item"><a href="{{route('admin.maincategories','main')}}">{{__('admin/dashboard.index_category_maincategory')}} </a></li>
                                @endif
                                <li class="breadcrumb-item active"> {{__('admin/dashboard.index_category_category_operations_edit')}} {{$category -> name}}
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
                                    @if(isset($type) && $type == 'sub')
                                    <h4 class="card-title" id="basic-layout-form">{{__('admin/dashboard.edit_category_subcategory_edit')}}</h4>
                                    @else
                                    <h4 class="card-title" id="basic-layout-form">{{__('admin/dashboard.edit_category_category_edit')}}</h4>
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
                                              action="{{route('admin.maincategories.update',$category -> id)}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <input name="id" value="{{$category -> id}}" type="hidden">

                                            <div class="form-group">
                                                <div class="text-center">
                                                    <img
                                                        src=""
                                                        class="rounded-circle  height-150" alt=" {{__('admin/dashboard.edit_category_category_img')}}">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label> {{__('admin/dashboard.edit_category_category_img')}} </label>
                                                <label id="projectinput7" class="file center-block">
                                                    <input type="file" id="file" name="">
                                                    <span class="file-custom"></span>
                                                </label>
                                                @error('')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="form-body">

                                                <h4 class="form-section"><i class="ft-home"></i> {{__('admin/dashboard.edit_category_category_dat')}} </h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">{{__('admin/dashboard.index_category_category_name')}} </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{$category -> name}}"
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
                                                                   value="{{$category->slug}}"
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
                                                                <option disabled>{{__('admin/dashboard.index_category_parent_category_choose')}}</option>
                                                                @foreach(\App\Models\Category::parent()->get() as $_category)
                                                                    <option value="{{$_category->id}}" @if($_category->id == $category->parent_id) selected @endif @if($_category->id==$category->id) disabled @endif>{{$_category->name}}</option>
                                                                    @foreach( \App\Models\Category::with('subCats')->where('parent_id', "!=", null)->where('parent_id', $_category->id)->get() as $sub)
                                                                        <option value="{{$sub->id}}" @if($sub->id == $category->parent_id) selected @endif @if($sub->id==$category->id) disabled @endif>&emsp;{{$sub->name}}&emsp;</option>
                                                                        @foreach( \App\Models\Category::with('subCats')->where('parent_id', "!=", null)->where('parent_id', $sub->id)->get() as $subsub)
                                                                            <option value="{{$subsub->id}}" @if($subsub->id == $category->parent_id) selected @endif @if($subsub->id==$category->id) disabled @endif>&emsp;&emsp;{{$subsub->name}}&emsp;&emsp;</option>
                                                                            @foreach(\App\Models\Category::with('subCats')->where('parent_id', "!=", null)->where('parent_id', $subsub->id)->get() as $subsubsub)
                                                                                <option value="{{$subsubsub->id}}" @if($subsubsub->id == $category->parent_id) selected @endif @if($subsub->id==$category->id) disabled @endif>&emsp;&emsp;&emsp;{{$subsubsub->name}}&emsp;&emsp;&emsp;</option>
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
                                                                   @if($category -> is_active == 1)checked @endif/>
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
                                                <i class="la la-check-square-o"></i> {{__('admin/dashboard.index_tag_update')}}
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
