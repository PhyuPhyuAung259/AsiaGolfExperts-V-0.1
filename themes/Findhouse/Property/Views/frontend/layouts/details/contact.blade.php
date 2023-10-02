<form action="{{ route('agent.contact') }}" method="POST" class="agent_contact_form">
    @csrf
    <ul class="sasw_list mb0">
        <li class="search_area">
            <div class="form-group">
                <input type="text" class="form-control"  placeholder="{{ __('Your Name') }}" name="name">
            </div>
        </li>
        <li class="search_area">
            <div class="form-group">
                <input type="number" class="form-control"  placeholder="{{ __('Phone') }}" name="phone">
            </div>
        </li>
        <li class="search_area">
            <div class="form-group">
                <input type="email" class="form-control" id="email" placeholder="{{ __('Email') }}" name="email">
            </div>
        </li>
        <li class="search_area">
            <div class="form-group">
                <textarea id="form_message" name="message" class="form-control required" rows="5" placeholder="{{ __('Your Message') }}"></textarea>
            </div>
        </li>
        <li>
            <input type="hidden" name="vendor_id" value="{{ $row->user->id }}">
            <input type="hidden" name="object_id" value="{{ $row->id }}">
            <input type="hidden" name="object_model" value="property">
        </li>
        <li>
            <div class="search_option_button">
                <button type="submit" class="btn btn-block btn-thm">{{ __('Contact') }}</button>
            </div>
        </li>
    </ul>
    <div class="form-mess"></div>
</form>
