@extends('layouts.app')
@section('head')
    {{-- <link href="{{ asset('dist/frontend/module/news/css/news.css?_ver='.config('app.version')) }}" rel="stylesheet">
    <link href="{{ asset('dist/frontend/css/app.css?_ver='.config('app.version')) }}" rel="stylesheet"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/daterange/daterangepicker.css") }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/fotorama/fotorama.css") }}" />
@endsection
@section('content')
<section class="blog_post_container bgc-f7">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                @include('News::frontend.layouts.details.news-breadcrumb')
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                @if($row->count() > 0)
                    <div class="main_blog_post_content">
                        @include('News::frontend.layouts.details.news-detail')
                    </div>
                    <div class="row related-news">
						@include('News::frontend.layouts.details.news-related')
					</div>
                @else
                    <div class="alert alert-danger">
                        {{__("Sorry, but nothing matched your search terms. Please try again with some different keywords.")}}
                    </div>
                @endif
            </div>
            <div class="col-lg-4 col-xl-4">
                @include('News::frontend.layouts.details.news-sidebar')
            </div>
        </div>
    </div>
</section>
@endsection

 
  