@extends('layouts.app')
@section('head')

@endsection
@section('content')
    <!-- Inner Page Breadcrumb -->
    <section class="inner_page_breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="breadcrumb_content">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url(app_get_locale('/')) }}">{{ __("Home") }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __("Plan") }}</li>
                        </ol>
                        <h1 class="breadcrumb_title">{{ __("Plan") }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pricing-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @include('admin.message')
                    @include('User::frontend.plan.list')
                </div>
            </div>

        </div>
    </section>
@endsection
@section('footer')
@endsection
