@extends('layouts.app')
@section('head')
@endsection
@section('content')
    <section class="our-error bgc-f7">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-center">
                    <div class="error_page footer_apps_widget">
                        <img class="img-fluid" src="@yield('image')" alt="error.png">
                        <div class="erro_code"><h1>@yield('title')</h1></div>
                        <p>@yield('message')</p>
                    </div>
                    <a href="{{ url('/') }}" class="btn btn_error btn-thm">{{ __("Go back to homepage") }}</a>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer')
@endsection
