<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('seo')
    <title>@yield('title')</title>
    <link href="{{ asset('css/boostrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="{{ asset('js/boostrap.js') }}"></script>
    @yield('style')



    <style type="text/css">

        /* ============ desktop view ============ */
        @media all and (min-width: 992px) {

            .dropdown-menu li {
                position: relative;
            }

            .dropdown-menu .submenu {
                display: none;
                position: absolute;
                left: 100%;
                top: -7px;
            }

            .dropdown-menu .submenu-left {
                right: 100%;
                left: auto;
            }

            .dropdown-menu > li:hover {
                background-color: #f1f1f1
            }

            .dropdown-menu > li:hover > .submenu {
                display: block;
            }
        }

        /* ============ desktop view .end// ============ */

        /* ============ small devices ============ */
        @media (max-width: 991px) {

            .dropdown-menu .dropdown-menu {
                margin-left: 0.7rem;
                margin-right: 0.7rem;
                margin-bottom: .5rem;
            }

        }

        /* ============ small devices .end// ============ */

    </style>


    <script type="text/javascript">
        //	window.addEventListener("resize", function() {
        //		"use strict"; window.location.reload();
        //	});


        document.addEventListener("DOMContentLoaded", function () {


            /////// Prevent closing from click inside dropdown
            document.querySelectorAll('.dropdown-menu').forEach(function (element) {
                element.addEventListener('click', function (e) {
                    e.stopPropagation();
                });
            })


            // make it as accordion for smaller screens
            if (window.innerWidth < 992) {

                // close all inner dropdowns when parent is closed
                document.querySelectorAll('.navbar .dropdown').forEach(function (everydropdown) {
                    everydropdown.addEventListener('hidden.bs.dropdown', function () {
                        // after dropdown is hidden, then find all submenus
                        this.querySelectorAll('.submenu').forEach(function (everysubmenu) {
                            // hide every submenu as well
                            everysubmenu.style.display = 'none';
                        });
                    })
                });

                document.querySelectorAll('.dropdown-menu a').forEach(function (element) {
                    element.addEventListener('click', function (e) {

                        let nextEl = this.nextElementSibling;
                        if (nextEl && nextEl.classList.contains('submenu')) {
                            // prevent opening link if link needs to open dropdown
                            e.preventDefault();
                            console.log(nextEl);
                            if (nextEl.style.display == 'block') {
                                nextEl.style.display = 'none';
                            } else {
                                nextEl.style.display = 'block';
                            }

                        }
                    });
                })
            }
            // end if innerWidth

        });
        // DOMContentLoaded  end
    </script>
</head>

<body>
<div class="header">
    <div class="header-1">
        <div class="header-1__content container middle">
            @yield('logo')
            <div class="lang">
                <img width="15" height="15" src="{{ asset('images/vietnam.png') }}" alt="">
                <h5>Việt Nam</h5>
            </div>
            <div class="contact">
                <div class="contact__content">
                    <img width="15" height="15" src="{{ asset('images/pin.svg') }}"
                         alt="">
                    <a href="">Địa chỉ mua hàng</a> |
                    <img class="align-middle" width="15" height="15"
                         src="{{ asset('images/email.svg') }}" alt="">
                    <a href="{{ route('contact') }}">Liên hệ</a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-2">
        <div class="header-2__content w-100">
            <h6 class="text-center">Free Shipping on Parcel Orders $49+ <a href="">Chi tiết</a></h6>
        </div>
        <div class="bd-example container">
            <?php
                $location = \App\Models\MenuLocation::where('location', 1)->first();

                if(!empty($location->location)){
                    $headerMenu = \Harimayco\Menu\Facades\Menu::get($location->menu_id);
                }

            ?>
            <div class="" style="height: 100%; width: 100%">
                <nav class="navbar navbar-expand-lg ">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="/">
                            <img src="{{asset('/images/logo.png')}}" alt="">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                @if(!empty($headerMenu) && isset($headerMenu))
                                    @foreach($headerMenu as $menu)
                                        @if($menu['child'])
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="{{$menu['link']}}"
                                                   data-bs-toggle="dropdown"
                                                   aria-expanded="true" role="button">
                                                    {{$menu['label']}}
                                                </a>
                                                @if( $menu['child'] )
                                                    <ul class="dropdown-menu">
                                                        @foreach($menu['child'] as $child)
                                                            @if($child['child'])
                                                                <li>
                                                                    <a class="dropdown-item" href="{{$child['link']}}">
                                                                        {{$child['label']}} &raquo;</a>
                                                                    <ul class="submenu dropdown-menu">
                                                                        @foreach($child['child'] as $child1)
                                                                            <li>
                                                                                <a class="dropdown-item"
                                                                                   href="{{$child1['link']}}"></a>
                                                                                @if($child1['child'])
                                                                                    <ul class="submenu dropdown-menu">
                                                                                        @foreach($child1['child'] as $child2)
                                                                                            <li>
                                                                                                <a class="dropdown-item"
                                                                                                   href="{{$child2['link']}}">{{$child2['label']}}</a>
                                                                                                @if($child2['child'])
                                                                                                    <ul class="submenu dropdown-menu">
                                                                                                        @foreach($child2['child'] as $child3)
                                                                                                            <li>
                                                                                                                <a class="dropdown-item"
                                                                                                                   href="{{$child3['link']}}">{{$child3['label']}}</a>
                                                                                                                @if($child3['child'])
                                                                                                                    <ul class="submenu dropdown-menu">

                                                                                                                    </ul>
                                                                                                                @endif
                                                                                                            </li>
                                                                                                        @endforeach
                                                                                                    </ul>
                                                                                                @else
                                                                                                    <li><a class="custom-nav"
                                                                                                           href="{{$child2['link']}}"> {{$child2['label']}} </a></li>
                                                                                                @endif
                                                                                            </li>
                                                                                        @endforeach
                                                                                    </ul>
                                                                                @else
                                                                                    <li><a class="custom-nav"
                                                                                           href="{{$child1['link']}}"> {{$child1['label']}} </a></li>
                                                                                @endif
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </li>
                                                            @else
                                                                <li><a class="custom-nav"
                                                                       href="{{$child['link']}}"> {{$child['label']}} </a></li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @else
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle"
                                                   href="{{$menu['link']}}">{{$menu['label']}} </a>
                                            </li>
                                        @endif

                                    @endforeach
                                @endif
                            </ul>
                            <div class="header-3  menu-web ">
                                <div class="search">
                                    <form action="{{ route('action-search') }}" method="GET">
                                    <div class="form-search">
                                        <input type="text" placeholder="Tìm kiếm" name="search">
                                        <button type="submit">
                                            <img src="{{ asset('images/search-icon.svg') }}" alt="tag">
                                        </button>
                                    </div>
                                </form>
                                <button class="cart">
                                    <a href="{{ route('product.cart') }}" class="text-center">
                                        <img src="{{ asset('images/cart.png') }}" alt="tag">
                                    </a>
                                </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </nav>
                <div class="menu-display">
                    <ul id="nav">
                        <li class="banner">
                            <a class="navbar-brand" href="/">
                                <img src="{{asset('/images/logo.png')}}" alt="">
                            </a>
                        </li>
                        @if(!empty($headerMenu) && isset($headerMenu))
                            @foreach($headerMenu as $menu)
                                <li>
                                    <a href="{{$menu['link']}}">{{$menu['label']}}</a>
                                    @if( $menu['child'] )
                                        <ul>
                                            @foreach($menu['child'] as $child1)
                                                <li>
                                                    <a href="{{$child1['link']}}">{{$child1['label']}}</a>
                                                    @if( $child1['child'] )
                                                        <ul>
                                                            @foreach( $child1['child'] as $child2)
                                                                <li>
                                                                    <a href="{{$child2['link']}}">{{$child2['label']}}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        @endif
                    </ul>
                    <div class="header-3  menu-web " style="margin-right: 0px auto;">
                        <div class="search">
                            <form action="{{ route('action-search') }}" method="GET">
                                <div class="form-search">
                                    <input type="text" placeholder="Tìm kiếm" name="search">
                                    <button type="submit">
                                        <img src="{{ asset('images/search-icon.svg') }}" alt="tag">
                                    </button>
                                </div>
                            </form>
                            <button class="cart">
                                <a href="{{ route('product.cart') }}" class="text-center">
                                    <img src="{{ asset('images/cart.png') }}" alt="tag">
                                </a>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @yield('breadcrumb')
</div>
</body>
