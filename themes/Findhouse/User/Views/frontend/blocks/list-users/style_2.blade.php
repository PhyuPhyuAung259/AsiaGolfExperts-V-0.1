
<section id="our-agents" class="our-agents pt40 pb15">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-title mb30">
                    @if($title)
                        <h2>{{clean($title)}}</h2>
                    @endif
                    <p>
                    @if($desc)
                    {{clean($desc)}}.
                @endif. <a class="float-right" href="{{route('agent.search')}}">{{ __('View All') }}<span class="flaticon-next"></span></a></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="our_agents_home6_slider">
                    @foreach($rows as $row)

                    <div class="item">
                        <div class="our_agent">
                            <div class="thumb bg_img_placeholder our_agent_bg_img_styl_1"  style="background-image:url({{$row->getAvatarUrl()}})">

                                <div class="overylay">
                                    @php
                                    $socialUser = $row->user_social;

                                    if(!empty($socialUser))
                                        $socialUser = json_decode($socialUser,true);

                                    if(empty($socialUser) or !is_array($socialUser))
                                        $socialUser = [];

                                    @endphp
                                    @if(count($socialUser) > 0)
                                    <ul class="social_icon">
                                        @foreach($socialUser as $socialUserItem)
                                            {{-- {!! $socialItem['code'] !!} --}}
                                            <li class="list-inline-item"><a href="{{ $socialUserItem['link'] }}"><i class="{{ $socialUserItem['code'] }}" target="_blank"></i></a></li>
                                        @endforeach
                                    </ul>
                                @endif

                                </div>
                            </div>
                            <div class="details">
                                <h4>{{clean($row->display_name)}}</h4>
                                <p>{{clean($row->role_name)}}</p>
                            </div>
                        </div>
                    </div>
                     @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
