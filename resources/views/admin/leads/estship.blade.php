    {{-- <a href="#">Look on CD</a><br> --}}
 <button class="check-price btn btn-sm btn-outline-primary mt-2"
    data-id="{{ $lead->id }}"
    data-name="{{ $lead->customer->name }}"
    data-from-city="{{ $lead->from_city }}"
    data-from-state="{{ $lead->from_state }}"
    data-from-zip="{{ $lead->from_zip }}"
    data-from-country="{{ $lead->from_country }}"
    data-to-city="{{ $lead->to_city }}"
    data-to-state="{{ $lead->to_state }}"
    data-to-zip="{{ $lead->to_zip }}"
    data-to-country="{{ $lead->to_country }}">
    Check Price
</button>


    {{-- <a href="#">Similar Offers</a> --}}
