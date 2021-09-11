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
                            <span itemprop="name">{{__("site/site.callback")}}</span>
                        </a>
                        <meta itemprop="position" content="3">
                    </li>
                </ol>

            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="card" style="width: 800px; margin: 30px auto;">
            <div class="card-header" style="font-size: 32px">
                {{__("site/site.success")}}
            </div>
            <div class="card-body">
                <h2 class="card-title"></h2>
                <a href="{{route('home')}}" class="btn btn-primary">{{__("site/site.home")}}</a>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script>

    </script>

@stop

