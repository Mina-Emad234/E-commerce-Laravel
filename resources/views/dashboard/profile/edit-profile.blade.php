@extends('layouts.admin')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">{{__('admin/dashboard.main')}} </a>
                                </li>

                                <li class="breadcrumb-item active">{{__('admin/dashboard.profile_edit')}}
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
                                    <h4 class="card-title" id="basic-layout-form">{{auth()->user()->name}}</h4>
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
                                        <form class="form" action="{{route('update.profile')}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <input type="hidden" name="id" value="{{$admin -> id}}">




                                            <div class="form-body">

                                                <h4 class="form-section"><i class="ft-home"></i>{{__('admin/dashboard.edit_shipping_data')}} </h4>


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{__('admin/dashboard.edit_profile_name')}} </label>
                                                            <input type="text" value="{{$admin -> name}}" id="name"
                                                                   class="form-control"
                                                                   name="name">
                                                            @error("name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput2"> {{__('admin/dashboard.edit_profile_email')}} </label>
                                                            <input type="email" value="{{$admin -> email}}" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="email">
                                                            @error("email")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="projectinput3"> {{__('admin/dashboard.edit_profile_current_pass')}} </label>
                                                                <input type="password" value="{{old('current_password')}}" id="name"
                                                                       class="form-control"
                                                                       name="current_password">
                                                                @error("current_password")
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="projectinput4"> {{__('admin/dashboard.edit_profile_new_password')}} </label>
                                                                <input type="password" value="{{old('password')}}" id="name"
                                                                       class="form-control"
                                                                       placeholder="  "
                                                                       name="password">
                                                                @error("password")
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="projectinput5"> {{__('admin/dashboard.edit_profile_confirm_password')}} </label>
                                                                <input type="password" value="{{old('password_confirmation')}}" id="name"
                                                                       class="form-control"
                                                                       placeholder="  "
                                                                       name="password_confirmation">
                                                            </div>
                                                        </div>
                                                    </div>

                                            </div>




                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{__('admin/dashboard.edit_profile_save')}}
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
