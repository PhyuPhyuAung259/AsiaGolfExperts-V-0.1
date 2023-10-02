@php use Themes\Golf\Golf\Models\Golf; @endphp
@extends('admin.layouts.app')

@section ('content')
    @php $services  = [];
    $dayOfWeek = [
            1 => __('Monday'),
            2 => __('Tuesday'),
            3 => __('Wednesday'),
            4 => __('Thursday'),
            5 => __('Friday'),
            6 => __('Saturday'),
            7 => __('Sunday'),
            8 => __('All'),
    ];
@endphp
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{__("Golf Availability Calendar")}}</h1>
        </div>
        @include('admin.message')
        <div class="panel">
            <div class="panel-body">
                <div class="filter-div d-flex justify-content-between ">
                    <div class="col-left">
                        <form method="get" action="" class="filter-form filter-form-left d-flex flex-column flex-sm-row" role="search">
                            <input type="text" name="s" value="{{ Request()->s }}" placeholder="{{__('Search by name')}}" class="form-control">
                            <button class="btn-info btn btn-icon btn_search " type="submit">{{__('Search')}}</button>
                        </form>
                        <div>
                            @if($rows->total() > 0)
                                <span class="count-string">{{ __("Showing :from - :to of :total Golf",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()]) }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-right">
                        <a href="#" data-toggle="modal" data-target="#bravo_modal_bulk_edit" class="btn btn-primary">{{__('Bulk Edit')}}</a>

                    </div>
                </div>
            </div>
        </div>
        @if(count($rows))
            <div class="panel">
                <div class="panel-title"><strong>{{__('Availability')}}</strong></div>
                <div class="panel-body no-padding" style="background: #f4f6f8;padding: 0px 15px;">
                    <div class="row">
                        <div class="col-md-3" style="border-right: 1px solid #dee2e6;">
                            <ul class="nav nav-tabs  flex-column vertical-nav" id="items_tab"  role="tablist">
                                @foreach($rows as $k=>$item)
                                    <li class="nav-item event-name ">
                                        <a class="nav-link" data-id="{{$item->id}}" data-toggle="tab" href="#calendar-{{$item->id}}" title="{{$item->title}}" >#{{$item->id}} - {{$item->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-9" style="background: white;padding: 15px;">
                            <div id="dates-calendar" class="dates-calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-warning">{{__("No Golf found")}}</div>
        @endif
        <div class="d-flex justify-content-center">
            {{$rows->appends($request->query())->links()}}
        </div>
    </div>
    <div id="bravo_modal_calendar" class="modal fade">
        <div class="modal-dialog modal-lg  modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Date Information')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="row form_modal_calendar form-horizontal" novalidate onsubmit="return false">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('Date Ranges')}}</label>
                                <input readonly type="text" class="form-control has-daterangepicker">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('Status')}}</label>
                                <br>
                                <label><input true-value=1 false-value=0 type="checkbox" v-model="form.active"> {{__('Available for booking?')}}</label>
                            </div>
                        </div>
                        <div class="col-md-12" v-if="ticket_types">
                            <div v-for="(type,index) in ticket_types">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label>{{__("Name")}}</label>
                                            <input type="text" readonly class="form-control" v-model="ticket_types[index].name">
                                        </div>
                                        <div class="col-md-3">
                                            <label>{{__("Number")}}</label>
                                            <input type="text" v-model="ticket_types[index].number" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label>{{__("Price")}}</label>
                                            <input type="text" v-model="ticket_types[index].price" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" v-else>
                            <div class="form-group">
                                <label >{{__('Price')}}</label>
                                <input type="text" v-model="form.price" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >{{__('Cart price')}}</label>
                                        <input type="text" v-model="form.cart_price" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >{{__('Cart sharing cart')}}</label>
                                        <input type="text" v-model="form.cart_sharing_price" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Tee time</th>
                                    <th>Price</th>
                                    <th>Cart price</th>
                                    <th>Sharing cart price</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(slot,index) in form.time_slot">
                                    <td><input class="form-control" type="text" placeholder="00:00" v-model="form.time_slot[index].time"></td>
                                    <td><input class="form-control" type="number" placeholder="Leave empty for default" v-model="form
                                        .time_slot[index]
                                        .price"></td>
                                    <td><input class="form-control" type="number" placeholder="Leave empty for default" v-model="form.time_slot[index].cart_price"></td>
                                    <td><input class="form-control" type="number" placeholder="Leave empty for default" v-model="form.time_slot[index].cart_sharing_price"></td>
                                    <td><span class="btn btn-warning btn-sm" @click="deleteSlot(index)"><i class="fa fa-trash"></i></span></td>
                                </tr>
                                </tbody>
                            </table>
                            <span class="btn btn-info btn-sm" @click="appendSlot">Add</span>
                        </div>
                    </form>
                    <div v-if="lastResponse.message">
                        <br>
                        <div  class="alert" :class="!lastResponse.status ? 'alert-danger':'alert-success'">@{{ lastResponse.message }}</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                    <button type="button" class="btn btn-primary" @click="saveForm">{{__('Save changes')}}</button>
                </div>
            </div>
        </div>
    </div>
    <div id="bravo_modal_bulk_edit" class="modal fade">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable " role="document">
            <div class="modal-content bg-info text-white">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Bulk change')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="row form_modal_calendar form-horizontal" novalidate onsubmit="return false">
                        <div>
                            <div class="d-flex">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('Date Ranges')}}</label>
                                        <input readonly type="text" class="form-control has-daterangepicker2">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('Status')}}</label>
                                        <br>
                                        <label><input true-value=1 false-value=0 type="checkbox" v-model="form.active"> {{__('Available for booking?')}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(!empty($rows))
                            <div class="col-md-12 overflow-auto" style="max-height: 150px">
                                <div class="form-group">
                                    <label for="">{{__('Which service do you want edit?')}}</label>
                                    <br>
                                    @foreach($rows as $row)
                                        <div class="form-controls">
                                            <label><input type="radio"  v-model="form.service_id" value="{{$row->id}}" @click="loadDataService('{{$row->id}}')">{{$row->title}}</label>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        @endif
                        <div>
                            @if(!empty($dayOfWeek))
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">{{__('Which days were affected by the change?')}}</label>
                                        <br>
                                        @foreach($dayOfWeek as $item=>$value)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" v-model="form.day_of_week_select" value="{{ $item }}" id="dayOfWeek{{ $item }}">
                                                <label class="form-check-label" for="dayOfWeek{{ $item }}">{{$value}}</label>
                                            </div>
                                                <?php
                                                $openHours[$item]= [
                                                    'name'=>$value,
                                                    'enable'=>0,
                                                    'from'=>'',
                                                    'to'=>''
                                                ]
                                                ;?>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label >{{__('Price')}}</label>
                                    <input type="text" v-model="form.price" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >{{__('Cart price')}}</label>
                                            <input type="text" v-model="form.cart_price" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >{{__('Cart sharing cart')}}</label>
                                            <input type="text" v-model="form.cart_sharing_price" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                    <div class="row">
                                        <div class="col" v-for="(slot,index) in time_slots" :key="index">
                                            <label >
                                                <input
                                                    type="checkbox"
                                                    v-model="form.time_slot"
                                                    :value="slot"
                                                >
                                                @{{ slot }}</label>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </form>

                </div>
                <div v-if="lastResponse.message.length>0">
                    <br>
                    <div class="alert" :class="!lastResponse.status ? 'alert-danger':'alert-success'">@{{ lastResponse.message }}</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                    <button type="button" class="btn btn-primary" @click="saveForm">{{__('Save changes')}}</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{asset('libs/fullcalendar-4.2.0/core/main.css')}}">
    <link rel="stylesheet" href="{{asset('libs/fullcalendar-4.2.0/daygrid/main.css')}}">
    <link rel="stylesheet" href="{{asset('libs/daterange/daterangepicker.css')}}">

    <style>
        .event-name{
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
        }
        .tooltip.show {

        }
    </style>
@endpush

@push('js')
    <script src="{{asset('libs/daterange/moment.min.js')}}"></script>
    <script src="{{asset('libs/daterange/daterangepicker.min.js?_ver='.config('app.asset_version'))}}"></script>
    <script src="{{asset('libs/fullcalendar-4.2.0/core/main.js')}}"></script>
    <script src="{{asset('libs/fullcalendar-4.2.0/interaction/main.js')}}"></script>
    <script src="{{asset('libs/fullcalendar-4.2.0/daygrid/main.js')}}"></script>

    <script>
        var bravo_booking_i18n = {
            no_date_select: '{{__('Please select Start and End date')}}',
            no_date_of_week_select: '{{__('please select days were affected by the change')}}',
            no_target_select: '{{__('Please select target')}}',
            no_price: '{{__('Please add price')}}',
            no_guest_select:'{{__('Please select at least one guest')}}',

        };
        var time_slots = {!! json_encode((new Golf())->generateTimeSlots()) !!}
        var calendarEl,calendar,lastId,formModal;
        $('#items_tab').on('show.bs.tab',function (e) {
            calendarEl = document.getElementById('dates-calendar');
            lastId = $(e.target).data('id');
            if(calendar){
                calendar.destroy();
            }
            calendar = new FullCalendar.Calendar(calendarEl, {
                buttonText:{
                    today:  '{{ __('Today') }}',
                },
                plugins: [ 'dayGrid' ,'interaction'],
                header: {},
                selectable: true,
                selectMirror: false,
                allDay:false,
                editable: false,
                eventLimit: true,
                defaultView: 'dayGridMonth',
                firstDay: daterangepickerLocale.first_day_of_week,
                events:{
                    url:"{{route('golf.admin.availability.loadDates')}}",
                    extraParams:{
                        id:lastId,
                    }
                },
                loading:function (isLoading) {
                    if(!isLoading){
                        $(calendarEl).removeClass('loading');
                    }else{
                        $(calendarEl).addClass('loading');
                    }
                },
                select: function(arg) {
                    formModal.show({
                        start_date:moment(arg.start).format('YYYY-MM-DD'),
                        end_date:moment(arg.end).format('YYYY-MM-DD'),
                    });
                },
                eventClick:function (info) {
                    var form = Object.assign({},info.event.extendedProps);
                    form.start_date = moment(info.event.start).format('YYYY-MM-DD');
                    form.end_date = moment(info.event.start).format('YYYY-MM-DD');
                    if(!form.time_slot){
                        form.time_slot = [];
                    }
                    formModal.show(form);
                },
                eventRender: function (info) {
                    $(info.el).find('.fc-title').html(info.event.title);
                    $(info.el).find('.fc-content').attr("data-html","true").attr("title",info.event.title).tooltip({ boundary: 'window' })
                }
            });
            calendar.render();
        });

        $('.event-name:first-child a').trigger('click');

        formModal = new Vue({
            el:'#bravo_modal_calendar',
            data:{
                lastResponse:{
                    status:null,
                    message:''
                },
                form:{
                    id:'',
                    price:'',
                    cart_price:'',
                    cart_sharing_price:'',
                    time_slot:[],
                    start_date:'',
                    end_date:'',
                    active:0
                },
                formDefault:{
                    id:'',
                    price:'',
                    start_date:'',
                    cart_price:'',
                    cart_sharing_price:'',
                    time_slot:[],
                    end_date:'',
                    active:0
                },
                ticket_types:[

                ],
                ticket_type_item:{
                    name:'',
                    desc:'',
                    number:'',
                    price:'',
                },
                time_slots: time_slots,
                onSubmit:false,
                default_slot:{
                    time:'',
                    price:'',
                    cart_price:'',
                    cart_sharing_price:''
                }
            },
            methods:{
                show:function (form) {
                    $(this.$el).modal('show');
                    this.lastResponse.message = '';
                    this.onSubmit = false;

                    if(typeof form !='undefined'){
                        this.form = Object.assign({},form);
                        console.log(form)
                        if(typeof this.form.ticket_types == 'object'){
                            this.ticket_types = this.form.ticket_types;
                        }else{
                            this.ticket_types = '';
                        }
                        if(form.start_date){
                            var drp = $('.has-daterangepicker').data('daterangepicker');
                            drp.setStartDate(moment(form.start_date).format(bookingCore.date_format));
                            drp.setEndDate(moment(form.end_date).format(bookingCore.date_format));
                        }
                    }
                },
                hide:function () {
                    $(this.$el).modal('hide');
                    this.form = Object.assign({},this.formDefault);
                    this.ticket_types = '';
                },
                saveForm:function () {
                    this.form.target_id = lastId;
                    var me = this;
                    me.lastResponse.message = '';
                    if(this.onSubmit) return;

                    if(!this.validateForm()) return;

                    this.onSubmit = true;
                    this.form.ticket_types = this.ticket_types;
                    $.ajax({
                        url:'{{route('golf.admin.availability.store')}}',
                        data:this.form,
                        dataType:'json',
                        method:'post',
                        success:function (json) {
                            if(json.status){
                                if(calendar)
                                    calendar.refetchEvents();
                                me.hide();
                            }
                            me.lastResponse = json;
                            me.onSubmit = false;
                        },
                        error:function (e) {
                            me.onSubmit = false;
                        }
                    });
                },
                validateForm:function(){
                    if(!this.form.start_date) return false;
                    if(!this.form.end_date) return false;

                    return true;
                },
                appendSlot:function(){
                    if(typeof this.form.time_slot == 'undefined'){
                        this.form.time_slot = [];
                    }
                    this.form.time_slot.push(Object.assign({},this.default_slot))
                },
                deleteSlot:function(index){
                    this.form.time_slot.splice(index,1)
                }
            },
            created:function () {
                var me = this;
                this.$nextTick(function () {
                    $('.has-daterangepicker').daterangepicker({ "locale": {"format": bookingCore.date_format}})
                        .on('apply.daterangepicker',function (e,picker) {
                            console.log(picker);
                            me.form.start_date = picker.startDate.format('YYYY-MM-DD');
                            me.form.end_date = picker.endDate.format('YYYY-MM-DD');
                        });

                    $(me.$el).on('hide.bs.modal',function () {

                        this.form = Object.assign({},this.formDefault);
                        this.ticket_types = [];

                    });

                })
            },
            mounted:function () {
                // $(this.$el).modal();
            }
        });
        formModalBulkEdit = new Vue({
            el: '#bravo_modal_bulk_edit',
            data: {
                lastResponse: {
                    status: null,
                    message: ''
                },

                form: {
                    service_id: '',
                    price: '',
                    cart_price: '',
                    cart_sharing_price: '',
                    start_date: '',
                    end_date: '',
                    active: 0,
                    day_of_week_select: [],
                    time_slot:[],

                },
                formDefault: {
                    service_id: '',
                    price: '',
                    cart_price: '',
                    cart_sharing_price: '',
                    start_date: '',
                    end_date: '',
                    active: 0,
                    day_of_week_select: [],
                    time_slot:[],

                },
                time_slots: time_slots,

                onSubmit: false,
                loadPersonTypes: false,
            },
            mounted() {
            },
            watch: {
            },
            methods: {
                addItem(event) {
                    let number = $('.btn-add-item').closest(".form-group-item-avaiable").find(".g-items .item:last-child").data("number");
                    if (number === undefined) number = 0;
                    else number++;
                    let extra_html = $('.btn-add-item').closest(".form-group-item-avaiable").find(".g-more").html();
                    extra_html = extra_html.replace(/__name__=/gi, "name=");
                    extra_html = extra_html.replace(/__number__/gi, number);
                    $('.btn-add-item').closest(".form-group-item-avaiable").find(".g-items").append(extra_html);
                },
                removeItem(event){
                    $(event.target).closest(".item").remove();
                },
                show: function (form) {
                    $(this.$el).modal('show');
                    this.lastResponse.message = '';
                    this.onSubmit = false;

                    if(typeof form !='undefined'){
                        this.form = Object.assign({},form);
                        if(typeof this.form.ticket_types == 'object'){
                            this.ticket_types = this.form.ticket_types;
                        }else{
                            this.ticket_types = '';
                        }
                        if(form.start_date){
                            var drp = $('.has-daterangepicker').data('daterangepicker');
                            drp.setStartDate(moment(form.start_date).format(bookingCore.date_format));
                            drp.setEndDate(moment(form.end_date).format(bookingCore.date_format));
                        }
                    }
                },
                hide: function () {
                    var me= this;
                    $(this.$el).modal('hide');
                    me.form = Object.assign({}, this.formDefault);
                    me.lastResponse.message = '';
                    me.ticket_types = '';
                },
                saveForm: function () {
                    var me = this;
                    me.lastResponse.message = '';
                    if (this.onSubmit) return;

                    if (!this.validateForm()) return;

                    this.onSubmit = true;
                    $.ajax({
                        url: '{{route('golf.availability.storeBulkEdit')}}',
                        data: this.form,
                        dataType: 'json',
                        method: 'post',
                        success: function (json) {
                            me.lastResponse = json;
                            if (json.status) {
                                if (calendar)
                                    calendar.refetchEvents();
                                me.hide();
                            }
                            me.onSubmit = false;
                        },
                        error: function (e) {
                            me.onSubmit = false;
                        }
                    });
                },
                validateForm: function () {
                    if (!this.form.start_date) {
                        this.lastResponse.status = 0;
                        this.lastResponse.message = bravo_booking_i18n.no_date_select
                        return false;
                    }

                    if (!this.form.end_date) {
                        this.lastResponse.status = 0;
                        this.lastResponse.message = bravo_booking_i18n.no_date_select
                        return false;
                    }

                    if (!this.form.price && this.form.ticket_types.length == 0) {
                        this.lastResponse.status = 0;
                        this.lastResponse.message = bravo_booking_i18n.no_price
                        return false;
                    }

                    if (this.form.service_id.length <= 0) {
                        this.lastResponse.status = 0;
                        this.lastResponse.message = bravo_booking_i18n.no_target_select
                        return false;
                    }
                    if (this.form.day_of_week_select.length <= 0) {
                        this.lastResponse.status = 0;
                        this.lastResponse.message = bravo_booking_i18n.no_date_of_week_select
                        return false;
                    }
                    return true;
                },
                loadDataService:function(id){
                    var me = this;
                    me.lastResponse.message = '';
                    if (this.onSubmit) return;

                    this.form.ticket_types = this.ticket_types =[];
                    this.onSubmit = true;
                    this.loadTicketType = false;
                    $.ajax({
                        url: '{{route('golf.admin.availability.loadDataService')}}',
                        data: {id:id},
                        dataType: 'json',
                        method: 'post',
                        success: function (json) {
                            if (json.status) {
                                me.form.price = json.price;
                                me.form.cart_price = json.cart_price;
                                me.form.cart_sharing_price = json.cart_sharing_price;
                            }
                            me.onSubmit = false;
                            me.loadTicketType = true;
                        },
                        error: function (e) {
                            me.onSubmit = false;
                        }
                    });
                }

            },
            created: function () {
                var me = this;
                this.$nextTick(function () {
                    var opt = {locale:{"format": bookingCore.date_format}};
                    if (typeof  daterangepickerLocale == 'object') {
                        opt.locale = _.merge(daterangepickerLocale,opt.locale);
                    }

                    $('.has-daterangepicker2').daterangepicker(opt)
                        .on('apply.daterangepicker', function (e, picker) {
                            me.form.start_date = picker.startDate.format('YYYY-MM-DD');
                            me.form.end_date = picker.endDate.format('YYYY-MM-DD');
                        });
                    $(me.$el).on('hide.bs.modal', function () {
                        this.form = Object.assign({}, this.formDefault);
                        me.lastResponse.message = '';
                        // this.person_types = [];
                    });
                })

            },
            mounted: function () {
                var me = this;
                // $(this.$el).modal();
                $(this.$el).on('hide.bs.modal', function () {
                    me.form = Object.assign({}, me.formDefault);
                    me.lastResponse.message = '';
                    me.ticket_types = '';
                });
            }
        })

    </script>
@endpush
