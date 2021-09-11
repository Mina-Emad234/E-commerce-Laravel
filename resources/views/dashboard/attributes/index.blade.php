@extends('layouts.admin')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">{{__('admin/dashboard.index_attr')}}</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('admin/dashboard.index_category_dashboard')}}</a>
                                </li>
                                <li class="breadcrumb-item active">{{__('admin/dashboard.index_attr')}} </li>
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
                                    <h4 class="card-title">{{__('admin/dashboard.index_all_attr')}}</h4>
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
                                    <div>
                                    <a href="{{route('admin.attributes.create')}}"
                                            class="btn btn-primary float-right mr-5 mb-4" style="margin-top: 20px">{{__('admin/dashboard.index_add_attr')}}</a>
                                    </div>
                                </div>

                                @include('dashboard.includes.alerts.success')
                                @include('dashboard.includes.alerts.errors')

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered">
                                            <thead class="">
                                            <tr>
                                                <th>{{__('admin/dashboard.index_attr_name')}} </th>
                                                <th>{{__('admin/dashboard.index_category_category_operations')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($attributes)
                                                @foreach($attributes as $attribute)
                                                    <tr>
                                                        <td>{{$attribute -> name}}</td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">

                                                                <a href="{{route('admin.attributes.edit',$attribute -> id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">{{__('admin/dashboard.index_category_category_operations_edit')}}</a>

                                                                <a href="{{route('admin.attributes.delete',$attribute -> id)}}"
                                                                    class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">{{__('admin/dashboard.index_category_category_operations_delete')}}</a>





                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset


                                            </tbody>
                                        </table>


                                    </div>
                                    <div class="d-flex justify-content-center">
                                        {!! $attributes->appends(['sort' => 'science-stream'])->links() !!}
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@stop
