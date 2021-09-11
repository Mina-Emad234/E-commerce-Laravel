@extends('layouts.site')

@section('content')

    <nav data-depth="3" class="breadcrumb-bg">
        <div class="container no-index">
            <div class="breadcrumb">

                <ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{route('home')}}">
                            <span itemprop="name">{{__("site/site.home")}}</span>
                        </a>
                        <meta itemprop="position" content="1">
                    </li>
                    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="36-mini-speaker.html">
                            <span itemprop="name">{{__("site/site.err_call")}}</span>
                        </a>
                        <meta itemprop="position" content="3">
                    </li>
                </ol>

            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="card" style="width: 800px; margin: 30px auto;">
            <div class="card-header text-black-100 bg-danger" style="font-size: 32px">
                 {{__("site/site.err")}}
            </div>
            <div class="card-body">
                <h2 class="card-title">{{__("site/site.err_msg_call")}}</h2>
                <a href="{{route('home')}}" class="btn btn-primary">{{__("site/site.home")}}</a>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>

    </script>

@stop

