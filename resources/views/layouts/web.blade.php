<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Information -->
    <meta name="description"
          content="{{ isset($meta_des) ? $meta_des : ($settingGeneral->meta_des ? $settingGeneral->meta_des : 'Shaiya is a Private Server Free to Download and Free to Play Online 3D MMORPG where the humans and elves alliance must battle their dark enemies.') }}">
    <meta name="keywords"
          content="{{ isset($meta_keywords) ? $meta_keywords : ($settingGeneral->meta_keywords ? $settingGeneral->meta_keywords : 'shaiya, shaiya, shaiya server, shaiya episode 5, shaiya ep5, shaiya private server, shaiya best server, shaiya 2021') }}">
    <title>{{ $settingGeneral->title }}{{ isset($title) ? (' | '.$title) : '' }}</title>

    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="/home/default.css">
    <link type="text/css" rel="stylesheet" href="/home/style.css">
    <link type="text/css" rel="stylesheet" href="/home/news.css">
    <link type="text/css" rel="stylesheet" href="/home/lightview.css">
    <link href="/home/css" rel="stylesheet">
    <link href="/home/css(1)" rel="stylesheet">

    <link href="{{ asset('css/iframe-adminltev3.css') }}" rel="stylesheet" />

    <link rel="shortcut icon" href="{{ $settingGeneral->url_ico ? url($settingGeneral->url_ico->url) : url('/img/favicon.ico') }}">

    <!-- Scripts -->
    <script src="/home/sdk.js" async="" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/home/jquery.js"></script>
</head>
<body class="theme_havoc" data-new-gr-c-s-check-loaded="14.1008.0" data-gr-ext-installed="" style="background-image: url('{{ $settingGeneral->url_background ? url($settingGeneral->url_background->url) : url('/images/whole_bg.jpg') }}');">

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0&appId=1959420410745275&autoLogAppEvents=1" nonce="6dZIvi5U"></script>

<div class="lv_window" style="display: none; top: 264px; left: 614px;">
    <div class="lv_skin">
        <div class="lv_shadow">
            <canvas height="1000" width="1000"></canvas>
        </div>
        <div class="lv_bubble" data-lv-fx-placement="0">
            <canvas height="1000" width="1000"></canvas>
        </div>
        <div class="lv_side_buttons_underneath" style="display: none;">
            <div class="lv_side lv_side_left" style="display: none;">
                <div class="lv_side_button lv_side_button_previous"></div>
            </div>
            <div class="lv_side lv_side_right" style="display: none;">
                <div class="lv_side_button lv_side_button_next"></div>
            </div>
        </div>
        <div class="lv_spinner_wrapper" style="display: none;"></div>
    </div>
    <div class="lv_content"></div>
    <div class="lv_title_caption" style="display: none;">
        <div class="lv_title_caption_slide">
            <div class="lv_title"></div>
            <div class="lv_caption"></div>
        </div>
    </div>
    <div class="lv_inner_previous_next_overlays">
        <div class="lv_button lv_button_inner_previous_overlay"></div>
        <div class="lv_button lv_button_inner_next_overlay" style="display: none;"></div>
    </div>
    <div class="lv_button_top_close close_lightview" style="display: none;"></div>
    <div class="lv_controls_relative" style="display: none;">
        <div class="lv_slider">
            <div class="lv_slider_icon lv_slider_previous">
                <div class="lv_icon"></div>
            </div>
            <div class="lv_slider_numbers">
                <div class="lv_slider_slide"></div>
            </div>
            <div class="lv_slider_icon lv_slider_next">
                <div class="lv_icon"></div>
            </div>
            <div class="lv_slider_icon lv_slider_slideshow">
                <div class="lv_icon lv_slider_next"></div>
            </div>
        </div>
    </div>
</div>
<div class="lv_overlay" style="display: none; background-color: rgb(0, 0, 0);"></div>
<div id="tooltip"></div>
<div id="fb-root" class=" fb_reset">
    <div style="position: absolute; top: -10000px; width: 0px; height: 0px;">
        <div></div>
    </div>
</div>
<script async="" defer="" crossorigin="anonymous" src="/home/sdk(1).js" nonce="2uFPet9m"></script>
<link type="text/css" rel="stylesheet" href="/home/owl.carousel.css">

<script type="text/javascript" src="/home/jquery-3.js"></script>
<script type="text/javascript" src="/home/owl.carousel.js"></script>

<header id="header" class="header">
    <div class="header-inner">
        <div class="logo_holder">
            <h1><a href="/" class="logo" title="Welcome to Shaiya" style="background-image: url('{{ $settingGeneral->url_logo ? url($settingGeneral->url_logo->url) : url('/images/shaiya_logo.png') }}');">Shaiya</a></h1>
        </div>

        <div class="navigation border_box self_clear">
            <ul class="nav_menu left_area">


                <li><a href="{{ route('home') }}" direct="0" class="nav_item type-menu"><span>TRANG CHỦ<i>TRANG CHỦ</i></span></a>
                </li>


                <li><a href="{{ route('server-info') }}" target="_blank" direct="0" class="nav_item type-menu"><span>SERVER INFO<i>SERVER INFO</i></span></a>
                </li>


                <li><a href="{{ route('top-rank') }}" direct="0" class="nav_item type-menu"><span>TOP RANK<i>TOP RANK</i></span></a>
                </li>


            </ul>
            <ul class="nav_menu right_area">


                <li><a href="{{ route('chien-tich') }}" direct="0" class="nav_item type-menu"><span>CHIẾN TÍCH<i>CHIẾN TÍCH</i></span></a>
                </li>

                <li><a href="{{ route('download') }}" direct="0" class="nav_item type-menu"><span>DOWNLOAD<i>DOWNLOAD</i></span></a>
                </li>


                <li><a href="{{ $settingGeneral->url_fanpage }}" direct="0" class="nav_item type-menu"><span>CỘNG ĐỒNG<i>CỘNG ĐỒNG</i></span></a>
                </li>

            </ul>
        </div>

    </div>
</header>

<div id="slider_container" class="slider_container anti_blur" style="display:block!important;margin-top: -150px;margin-bottom: 48px;">
    <div id="slider">
        <iframe id="ytplayer" type="text/html" width="560" height="315"
                src="https://www.youtube.com/embed/9b8KL9rcqmU"
                frameborder="0" allowfullscreen>
        </iframe>
        <div class="fluxslider"><div class="surface" style="position: relative"><div class="images loading" style="position: relative; overflow: hidden; min-height: 100px;"><div class="image1" style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-image: none;"><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div><div class="image" style="width: 100%; height: 100%; background-image: none; transition-duration: 600ms; transition-timing-function: ease-in; transition-property: opacity; opacity: 0;"></div></div><div class="image2" style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px;"></div></div></div></div></div>
</div>

<div class="main_b_holder">
    <div class="body_content">
        <div class="body_effects">
            <div class="body-border top-left-to-right"></div>
            <div class="body-border left-top-to-bottom"></div>
            <div class="body-border right-top-to-bottom"></div>
            <div class="body-border bottom-left-to-right"></div>
            <div class="mainside-bg border_box"></div>
            <div class="sidebar-bg border_box"></div>
        </div>

        @yield('content')

        @include('layouts.nav')

        <div class="clear"></div>
    </div>
</div>

<div id="footer" class="footer">
    <div class="footer-inner inner-2 border_box self_clear">
        <div class="footer-left">
            <ul class="footer_nav">
                <li><a class="nav_item nav_active">&nbsp; &nbsp; &nbsp;</a></li>
                <li><a href="{{ route('home') }}" direct="0" class="nav_item nav_active">Trang Chủ</a></li>
                <li><a href="{{ route('home') }}" direct="0" class="nav_item">Giới Thiệu</a></li>
                <li><a href="{{ route('huong-dan') }}" direct="0" class="nav_item">Hướng Dẫn</a></li>
                <li><a href="{{ route('quy-dinh') }}" direct="0" class="nav_item">Quy Định SỬ Dụng</a></li>
                <li><a href="{{ route('nap-the') }}" direct="0" class="nav_item">Liên Hệ</a></li>
            </ul>
        </div>
        <div class="footer-right">
            <div class="footer_copyright vertical_center overflow_ellipsis">
                <span>Copyright ©  <a href="/">Shaiya2.com.vn</a> 2021.</span>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="/home/scripts.js"></script>
{{--<script type="text/javascript" src="/home/jquery.fancybox.min.js"></script>--}}

<script src="/home/swfobject.js"></script>
<script src="/home/spinners.min.js"></script>
<script src="/home/lightview.js"></script>

<div class="lv_controls_top" style="display: none;">
    <div class="lv_top_middle" style="display: none;">
        <div class="lv_top_button lv_top_previous">
            <div class="lv_icon"><span style="">Prev</span></div>
        </div>
        <div class="lv_top_button lv_top_slideshow">
            <div class="lv_icon"></div>
        </div>
        <div class="lv_top_button lv_top_next">
            <div class="lv_icon"><span style="">Next</span></div>
        </div>
    </div>
</div>
<div class="lv_controls_top_close" style="display: none;">
    <div class="lv_controls_top_close_button"></div>
</div>
<div class="lv_thumbnails" style="display: none;">
    <div class="lv_thumbnails_slider">
        <div class="lv_thumbnails_slide"></div>
    </div>
</div>
<div class="lv_controls_top_close" style="display: none;">
    <div class="lv_controls_top_close_button"></div>
</div>
</body>
</html>
