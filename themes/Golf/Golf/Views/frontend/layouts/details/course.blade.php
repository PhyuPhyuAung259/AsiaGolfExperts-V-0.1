@if(!empty($row->course_details))
    <div class="list-attributes border-bottom py-4 club-facilities attr-19">
        <h3 class="font-size-21 font-weight-bold text-dark mb-4">
            {{ __("Course Details") }}
        </h3>
        <ul class="list-group list-group-borderless list-group-horizontal list-group-flush no-gutters row">
            @foreach($row->course_details as $key=>$course)
                <li class="col-md-6 mb-3 list-group-item item club-valet term-106">
                    <i class="mr-2 font-size-16 text-primary flaticon-favorites icon-default"></i>
                    <strong>{{$course['title']}}</strong> : {{$course['content']}}
                </li>
            @endforeach
        </ul>
    </div>
@endif
