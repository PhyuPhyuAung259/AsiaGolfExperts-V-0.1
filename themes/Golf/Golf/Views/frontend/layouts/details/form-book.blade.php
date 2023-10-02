<div class="mb-4">
    <div class="bravo_single_book_wrap">
        <div id="bravo_event_book_app" class="bravo_single_book " v-cloak>
            <div class="border border-color-7 rounded mb-5">
                <div class="border-bottom">
                    <div class="p-4">
                        <span class="font-size-14">{{ __("From") }}</span>
                        <span class="font-size-24 text-gray-6 font-weight-bold ml-1">
                        {{ $row->display_price }}
                    </span>
                    </div>
                </div>
                <div class="nav-enquiry" v-if="is_form_enquiry_and_book">
                    <div class="enquiry-item active">
                        <span>{{ __("Book") }}</span>
                    </div>
                    <div class="enquiry-item" data-toggle="modal" data-target="#enquiry_form_modal">
                        <span>{{ __("Enquiry") }}</span>
                    </div>
                </div>
                <div class="form-book" :class="{'d-none':enquiry_type!='book'}">
                    <div class="p-4">
                        <span class="d-block text-gray-1 font-weight-normal mb-0 text-left">{{ __("Start Date") }}</span>
                        <div class="mb-2">
                            <div class="border-bottom border-width-2 border-color-1 position-relative" data-format="{{get_moment_date_format()}}">
                                <div @click="openStartDate" class="font-size-14 start_date d-flex align-items-center w-auto height-40 shadow-none font-weight-bold form-control hero-form bg-transparent border-0 flatpickr-input p-0">
                                    @{{start_date_html}}
                                </div>
                                <input type="text" class="start_date" ref="start_date" style="height: 1px;visibility: hidden;position: absolute;bottom: 0;width: 100%;">
                            </div>
                        </div>
                        <div class="mb-2" >
                            <div class="position-relative">
                                <div class="d-flex align-items-center w-auto height-40 font-size-16 shadow-none font-weight-bold form-control hero-form bg-transparent border-0 flatpickr-input p-0">
                                    {{ __("Tee Time") }}
                                </div>
                                <select v-model="time_slot_selected" class="form-control">
                                    <option :value="slot.time" v-for="(slot,index) in time_slot" v-html="slot.time" :key="index"></option>
                                </select>
                            </div>
                        </div>
                        <div >
                            <div class="mb-2">
                                <div class="position-relative">
                                    <div class="d-flex align-items-center w-auto height-40 font-size-16 shadow-none font-weight-bold form-control hero-form bg-transparent border-0 flatpickr-input p-0">
                                        {{ __("Player") }}
                                    </div>
                                    <select v-model="max_guest" class="form-control" @click="changeGuest()">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="position-relative">
                                    <div class="d-flex align-items-center w-auto height-40 font-size-16 shadow-none font-weight-bold form-control hero-form bg-transparent border-0 flatpickr-input p-0">
                                        {{ __("Rate Includes / Notes:") }}
                                    </div>
                                    @if(!empty( $notes = setting_item("golf_rate_include_note")))
                                        @php $notes = json_decode($notes,true) @endphp
                                        <div class="note font-size-14">
                                            @foreach($notes as $note)
                                                <div><i class="fa fa-check-square-o" aria-hidden="true"></i> {{ $note['name'] }}</div>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="options mt-2 font-size-14 d-flex flex-column" v-if="max_guest.length">
                                        <label v-for="(row,idx) in cart_type_select" :key="idx">
                                            <input :checked="idx==0" type="radio" class="" name="cart_type_selected" :value="idx" @click="changeCartType(idx)"> @{{ row.name }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="position-relative">
                                    <div class="d-flex align-items-center w-auto height-40 font-size-16 shadow-none font-weight-bold form-control hero-form bg-transparent border-0 flatpickr-input p-0">
                                        {{ __("Hole") }}
                                    </div>
                                    <table class="table none-mgb font-size-14">
                                        <thead>
                                        <tr>
                                            <td><i class="fa fa-user" title="Player"></i></td>
                                            <td>{{ __("Rate") }}</td>
                                            <td>{{ __("Cart") }}</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(row, idx) in price_rows" :key="idx">
                                            <td>@{{ row.player }}</td>
                                            <td class="teetimerate">@{{ row.rate_html }}</td>
                                            <td class="golfcartfee">@{{ row.cart_html }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="mb-4 border-bottom border-width-2 border-color-1 pb-1" v-if="extra_price.length">
                                <h4 class="flex-center-between mb-1 font-size-16 text-dark font-weight-bold">{{__('Extra prices:')}}</h4>
                                <div class="mb-2" v-for="(type,index) in extra_price">
                                    <div class="extra-price-wrap d-flex justify-content-between">
                                        <div class="flex-grow-1">
                                            <label><input type="checkbox" v-model="type.enable"> @{{type.name}}</label>
                                            <div class="render" v-if="type.price_type">(@{{type.price_type}})</div>
                                        </div>
                                        <div class="flex-shrink-0">@{{type.price_html}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2" v-if="buyer_fees.length">
                                <div class="extra-price-wrap d-flex justify-content-between" v-for="(type,index) in buyer_fees">
                                    <div class="flex-grow-1">
                                        <label>@{{type.type_name}}
                                            <i class="icofont-info-circle" v-if="type.desc" data-toggle="tooltip" data-placement="top" :title="type.type_desc"></i>
                                        </label>
                                        <div class="render" v-if="type.price_type">(@{{type.price_type}})</div>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="unit" v-if='type.unit == "percent"'>
                                            @{{ type.price }}%
                                        </div>
                                        <div class="unit" v-else>
                                            @{{ formatMoney(type.price) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="form-section-total mb-4  list-unstyled  pb-1" v-if="total_price > 0">
                                <li>
                                    <label>{{__("Total")}}</label>
                                    <span class="price">@{{total_price_html}}</span>
                                </li>
                                <li v-if="is_deposit_ready">
                                    <label for="">{{__("Pay now")}}</label>
                                    <span class="price">@{{pay_now_price_html}}</span>
                                </li>
                            </ul>
                        </div>
                        <div v-html="html"></div>
                        <div class="text-center">
                            <button class="btn btn-primary d-flex align-items-center justify-content-center  height-60 w-100 mb-xl-0 mb-lg-1 transition-3d-hover font-weight-bold" @click="doSubmit($event)" :class="{'disabled':onSubmit,'btn-success':(step == 2),'btn-primary':step == 1}" name="submit">
                                <span class="stop-color-white">{{__("Book Now")}}</span>
                                <i v-show="onSubmit" class="fa fa-spinner fa-spin ml-1"></i>
                            </button>
                            <div class="alert-text mt-3 text-left" v-show="message.content" v-html="message.content" :class="{'danger':!message.type,'success':message.type}"></div>
                        </div>
                    </div>
                </div>
                <div class="form-send-enquiry" v-show="enquiry_type=='enquiry'">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#enquiry_form_modal">
                        {{ __("Contact Now") }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@include("Booking::frontend.global.enquiry-form",['service_type'=>'golf'])
