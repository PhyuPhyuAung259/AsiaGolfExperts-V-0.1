@extends('layouts.app')
@push('css')
@endpush
@section('content')
    <section class="pt-40 pb-40 bg-light-2 @if($layout == 'grid') d-none @endif">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h1 class="text-30 fw-600">{{setting_item_with_lang("event_page_search_title")}}</h1>
                    </div>
                    <div class="bg-white rounded-4 mt-30">
                        @include('Event::frontend.layouts.search.form-search')
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('Event::frontend.layouts.search.list-item', ['style_layout' => $layout])
@endsection

@push('js')
    <script type="text/javascript" src="{{ asset('module/event/js/event.js?_ver='.config('app.asset_version')) }}"></script>
@endpush
