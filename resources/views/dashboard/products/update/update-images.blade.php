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
                                <li class="breadcrumb-item active">   {{__('admin/dashboard.index_pro_data')}}
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
                                    <h4 class="card-title" id="basic-layout-form">  {{__('admin/dashboard.index_pro_update_img')}} </h4>
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


                                        <form action="{{ route('admin.products.update-db',$product->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                                    <div class="form-group">
                                                        <label for="document">{{__('admin/dashboard.pro_img')}}</label>
                                                        <div class="needsclick dropzone" id="document-dropzone">

                                                        </div>
                                                    </div>



                                                    <div>
                                                        <button type="button" class="btn btn-warning mr-1 p-1"
                                                                onclick="history.back();">
                                                            <i class="ft-x"></i>{{__('admin/dashboard.pro_prev')}}
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="la la-check-square-o"></i> {{__('admin/dashboard.pro_save')}}
                                                        </button>
                                                    </div>
                                        </form>

                                        <table
                                            class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead class="">
                                            <tr>
                                                <th>{{__('admin/dashboard.pro_img')}}</th>
                                                <th>{{__('admin/dashboard.index_category_category_operations')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($images)
                                                @foreach($images as $image)
                                                    <tr>
                                                        <td> <img style="width: 150px; height: 100px;" src="{{asset('assets/images/products/'. $image -> image)}}" alt="{{$product -> name . " Image"}}"></td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">

                                                                <a href="{{route('admin.products.general.delete-images',$image -> id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">{{__('admin/dashboard.index_category_category_operations_delete')}}</a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset


                                            </tbody>
                                        </table>




                                </div>
                            </div>
                        </div>
                    </div>
                <!-- // Basic form layout section end -->
                    </div>
                </section>
            </div>
        </div>
    </div>

@stop

@section('script')

    <script type="text/javascript">
        var uploadedDocumentMap = {}
        Dropzone.options.documentDropzone = {
            url: '{{ route("admin.products.images.store") }}',
            maxFilesize: 2, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
                uploadedDocumentMap[file.name] = response.name
            },
            removedfile: function (file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedDocumentMap[file.name]
                }
                $('form').find('input[name="document[]"][value="' + name + '"]').remove()
            },
            init: function () {
                @if(isset($project) && $project->document)
                var files =
                    {!! json_encode($project->document) !!}
                    for (var i in files) {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
                }
                @endif
            }
        }
    </script>
@stop
