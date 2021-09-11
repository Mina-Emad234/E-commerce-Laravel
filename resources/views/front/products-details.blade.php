@extends('layouts.site')

@section('content')

    <div id="wrapper-site">

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
                            <a itemprop="item" href="">
                                <span itemprop="name">{{$product -> name}}</span>
                            </a>
                            <meta itemprop="position" content="3">
                        </li>
                    </ol>

                </div>
            </div>
        </nav>


        <div class="no-index">
            <div id="content-wrapper">

                <section id="main" itemscope="" itemtype="https://schema.org/Product">
                    <div class="product-detail-top">
                        <div class="container">
                            <div class="row main-productdetail" data-product_layout_thumb="list_thumb"
                                 style="position: relative;">
                                <div class="col-lg-5 col-md-4 col-xs-12 box-image">
                                    <section class="page-content" id="content">
                                        <div class="images-container list_thumb">
                                            <div class="product-cover">
                                                <img class="js-qv-product-cover img-fluid"
                                                     src="{{asset('assets/images/products/' . $product -> images[0] -> image ?? '')}}"
                                                     alt="" title="" style="width:100%;" itemprop="image">
                                                <div class="layer hidden-sm-down" data-toggle="modal"
                                                     data-target="#product-modal">
                                                    <i class="fa fa-expand"></i>
                                                </div>
                                            </div>

                                            <div class="js-qv-mask mask only-product">
                                                <div class="row">
                                                    @isset($product -> images)
                                                        @foreach($product -> images as $image)
                                                            <div class="item thumb-container col-md-6 col-xs-12 pt-30">
                                                                <img class="img-fluid thumb js-thumb  selected "
                                                                     data-image-medium-src="{{asset('assets/images/products/' . $image -> image)}}"
                                                                     data-image-large-src="{{asset('assets/images/products/' . $image -> image)}}"
                                                                     src="{{asset('assets/images/products/' . $image -> image)}}"
                                                                     alt="" title="" itemprop="image">
                                                            </div>
                                                        @endforeach
                                                    @endisset
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>

                                <div class="col-lg-7 col-md-8 col-xs-12 mt-sm-20">
                                    <div class="product-information">
                                        <div class="product-actions">
                                            <form action="{{--route('products.reviews.store',$product -> id )--}}"
                                                  method="post" id="add-to-cart-or-refresh" class="row">
                                                @csrf
                                                <input type="hidden" name="id_product" value="{{$product -> id }}"
                                                       id="product_page_product_id">

                                                <div class="productdetail-right col-12 col-lg-6 col-md-6">
                                                    <div class="product-reviews">
                                                        <div id="product_comments_block_extra">
                                                            <div class="comments_note">
                                                                <span>Review: </span>
                                                                <div class="star_content clearfix">
                                                                    <div class="star star_on"></div>
                                                                    <div class="star star_on"></div>
                                                                    <div class="star star_on"></div>
                                                                    <div class="star star_on"></div>
                                                                    <div class="star star_on"></div>
                                                                </div>
                                                            </div>

                                                            <div class="comments_advices">
                                                                <a href="#" class="comments_advices_tab"><i
                                                                        class="fa fa-comments"></i>Read reviews (1)</a>
                                                                <a class="open-comment-form" data-toggle="modal"
                                                                   data-target="#new_comment_form" href="#"><i
                                                                        class="fa fa-edit"></i>Write your review</a>
                                                            </div>
                                                        </div>
                                                        <!--  /Module NovProductComments -->
                                                    </div>

                                                    <h1 class="detail-product-name"
                                                        itemprop="name">{{$product -> name}}</h1>
                                                    <div
                                                        class="group-price d-flex justify-content-start align-items-center">
                                                        <div class="product-prices">
                                                            <div class="product-price " itemprop="offers" itemscope=""
                                                                 itemtype="https://schema.org/Offer">
                                                                <div class="current-price">
                                                                    <span itemprop="price"
                                                                          class="price">{{$product -> special_price ?? $product -> price }}</span>
                                                                    @if($product -> special_price)
                                                                        <span
                                                                            class="regular-price">{{$product -> price}}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="tax-shipping-delivery-label">
                                                                Tax included
                                                            </div>
                                                        </div>

                                                    </div>


                                                    <div class="in_border end">

                                                        <div class="sku">
                                                            <label class="control-label">Sku:</label>
                                                            <span itemprop="sku"
                                                                  content="demo_1">{{$product -> sku ?? '--'}}</span>
                                                        </div>
                                                        <div class="pro-cate">
                                                            <label class="control-label">{{__("site/site.cats")}}</label>

                                                            @isset($product -> categories)
                                                                <div>
                                                                    @foreach($product -> categories as $category )
                                                                        <span><a
                                                                                href="{{route('category',$category -> slug )}}"
                                                                                title="Computer &amp; Networking">{{$category -> name}}</a></span>
                                                                    @endforeach
                                                                </div>
                                                            @endisset
                                                        </div>
                                                        <div class="pro-tag">
                                                            <label class="control-label">{{__("site/site.tags")}}</label>
                                                            @isset($product -> tags)
                                                                <div>
                                                                    @foreach($product -> tags as $tag )
                                                                        <span><a href="">{{$tag -> name}}</a></span>
                                                                    @endforeach
                                                                </div>
                                                            @endisset
                                                        </div>
                                                    </div>


                                                    <div id="_desktop_productcart_detail">
                                                        <div class="product-add-to-cart in_border">
                                                            <div class="add">
                                                            <form
                                                                action=""
                                                                method="post" class="formAddToCart">
                                                                @csrf
                                                                <input type="hidden" name="id_product"
                                                                       value="{{$product -> id}}">
                                                                <a class="btn btn-primary add-to-cart cart-addition" data-product-id="{{$product -> id}}" data-product-slug="{{$product -> slug}}" href="#"
                                                                   data-button-action="add-to-cart">  <div class="icon-cart">
                                                                        <i class="shopping-cart"></i>
                                                                    </div><span>{{__("site/site.add_cart")}}</span></a>
                                                            </form>
                                                            </div>

                                                            <a class="addToWishlist  wishlistProd_22" href="#"
                                                               data-product-id="{{$product -> id}}"
                                                            >
                                                                <i class="fa fa-heart"></i>
                                                                <span>Add to Wishlist</span>
                                                            </a>


                                                            <div class="clearfix"></div>

                                                            <div id="product-availability" class="info-stock mt-20">
                                                                <label class="control-label">{{__("site/site.availability")}} </label>
                                                                {{$product -> in_stock ? 'in stock' : 'out of stock'}}
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <input class="product-refresh ps-hidden-by-js" name="refresh"
                                                           type="submit" value="Refresh">

                                                </div>
                                                <div class="productdetail-left col-12 col-lg-6 col-md-6">


                                                    <div class="product-quantity">
                                                        <span class="control-label">{{__("site/site.qty")}} </span>
                                                        <div class="qty">
                                                            <input type="text" name="qty" id="quantity_wanted" value="1"
                                                                   class="input-group" min="1">
                                                        </div>
                                                    </div>


                                                    <div class="product-variants in_border">
                                                        @if(isset($product_attributes) && count($product_attributes) > 0 )
                                                            @foreach($product_attributes as $attribute)
                                                                <div class="product-variants-item">
                                                                    <span
                                                                        class="control-label">{{$attribute -> name}} : </span>
                                                                    @if(isset($attribute -> options) && count($attribute -> options) > 0 )
                                                                        <select id="group_1" data-product-attribute="1"
                                                                                name="{{$attribute -> name}}">
                                                                            @foreach($attribute -> options as $option)
                                                                                <option value="1" title="S"
                                                                                        selected="selected">
                                                                                    {{$option -> name}}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    @endif

                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="product-detail-bottom">
                        <div class="container">

                            <section class="relate-product product-accessories clearfix">
                                <h3 class="h5 title_block">{{__("site/site.related")}}<span class="sub_title">Hand-picked arrivals from the best designer</span>
                                </h3>
                                @if( isset($related_products) && count($related_products) > 0 )
                                    @foreach($related_products as $_product)
                                <div class="products product_list grid owl-carousel owl-theme" data-autoplay="true"
                                     data-autoplaytimeout="6000" data-loop="true" data-items="5" data-margin="0"
                                     data-nav="true" data-dots="false" data-items_mobile="2">

                                    <div class="item  text-center">
                                        <div class="product-miniature js-product-miniature item-two first_item"
                                             data-id-product="{{$_product -> id }}" data-id-product-attribute="60" itemscope=""
                                             itemtype="http://schema.org/Product">
                                            <div class="product-cat-content">
                                                <div class="category-title">
                                                <div class="product-title" itemprop="name"><a
                                                        href="{{route('product.details',$_product -> slug)}}">{{$_product -> name}}</a></div>

                                            </div>
                                            <div class="thumbnail-container">

                                                <a href="{{route('product.details',$_product -> slug)}}"
                                                   class="thumbnail product-thumbnail two-image">
                                                    <img class="img-fluid image-cover"
                                                         src="{{asset('assets/images/products/' .$_product -> images[0] -> image ?? '')}}"
                                                         alt=""
                                                         data-full-size-image-url="{{asset('assets/images/products/' .$product -> images[0] -> image ?? '')}}"
                                                         width="600" height="600">
                                                    <img class="img-fluid image-secondary"
                                                         src="{{asset('assets/images/products/' .$_product -> images[0] -> image ?? '')}}"
                                                         alt=""
                                                         data-full-size-image-url="{{asset('assets/images/products/' .$_product -> images[0] -> image ?? '')}}"
                                                         width="600" height="600">
                                                </a>

                                            </div>
                                            <div class="product-description">
                                                <div class="product-groups">
                                                    <div class="product-group-price">
                                                        <div class="product-price-and-shipping">
                                                             <span itemprop="price"
                                                                   class="price">{{$_product -> special_price ?? $_product -> price }}</span>
                                                            @if($_product -> special_price)
                                                                <span
                                                                    class="regular-price">{{$_product -> price}}</span>
                                                            @endif

                                                        </div>
                                                    </div>
                                                    <div class="product-comments">
                                                        <div class="star_content">
                                                            <div class="star"></div>
                                                            <div class="star"></div>
                                                            <div class="star"></div>
                                                            <div class="star"></div>
                                                            <div class="star"></div>
                                                        </div>
                                                        <span>0 review</span>
                                                    </div>
                                                </div>
                                                <div class="product-buttons d-flex justify-content-start"
                                                     itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">

                                                    <a class="addToWishlist  wishlistProd_22" href="#"
                                                       data-product-id="{{$_product -> id}}"
                                                    >
                                                        <a href="#" class="quick-view hidden-sm-down"
                                                           data-product-id="{{$_product -> id}}">
                                                            <i class="fa fa-search"></i><span> Quick view</span>
                                                        </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    @endforeach
                                @endif
                            </section>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    @include('front.includes.not-logged')
    @include('front.includes.alert')   <!-- we can use only one with dynamic text -->
@stop

@section('scripts')
    <script>
        $(document).on('click', '.quick-view', function () {
            $('.quickview-modal-product-details-' + $(this).attr('data-product-id')).css("display", "block");
        });
        $(document).on('click', '.close', function () {
            $('.quickview-modal-product-details-' + $(this).attr('data-product-id')).css("display", "none");

            $('.not-loggedin-modal').css("display", "none");
            $('.alert-modal').css("display", "none");
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '.addToWishlist', function (e) {
            e.preventDefault();

            @guest()
            $('.not-loggedin-modal').css('display', 'block');
            @endguest


            $.ajax({
                type: 'post',
                url: "{{Route('wishlist.store')}}",
                data: {
                    'productId': $(this).attr('data-product-id'),
                },
                success: function (data) {
                    if (data.wished)
                        if(data.wished)
                            $('.alert-modal').css('display','block').find(".modal-body").text({{__("site/site.add_pro")}});
                        else
                            $('.alert-modal').css('display','block').find(".modal-body").text({{__("site/site.added")}});
                }
            });
        });
        $(document).on('click', '.cart-addition', function (e) {
            e.preventDefault();
            @guest()
            $('.not-loggedin-modal').css('display', 'block');
            @endguest

            $.ajax({
                type: 'post',
                url: "{{Route('site.cart.add')}}",
                data: {
                    'product_id': $(this).attr('data-product-id'),
                    'product_slug' : $(this).attr('data-product-slug'),
                },
                success: function (data) {
                    if(data.added)
                        $('.cart-products-count').text(parseInt($('.cart-products-count').text()) + 1);

                    if (data.added === 'exceed'){
                        $('.alert-modal').css('display', 'block').find(".modal-body").text({{__("site/site.exceeded")}});
                    }
                    }
            });
        });
    </script>

@stop

