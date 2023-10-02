<!-- Inner Page Breadcrumb -->
<section class="inner_page_breadcrumb" @if(!empty($bg_image_url)) style="background-image: url('{{ $bg_image_url }}'); background-size: cover" @endif >
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="breadcrumb_content">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url(app_get_locale(false, '/')) }}">{{ __("Home") }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $title ?? '' }}</li>
                    </ol>
                    <h1 class="breadcrumb_title">{{ $title ?? '' }}</h1>
                </div>
            </div>
        </div>
    </div>
</section>
