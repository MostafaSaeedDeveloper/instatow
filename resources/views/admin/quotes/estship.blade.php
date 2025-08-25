    {{-- <a href="#">Look on CD</a><br> --}}
 <button class="check-price btn btn-sm btn-outline-primary mt-2"
    data-id="{{ $quote->id }}"
    data-name="{{ $quote->customer->name }}"
    data-from-city="{{ $quote->from_city }}"
    data-from-state="{{ $quote->from_state }}"
    data-from-zip="{{ $quote->from_zip }}"
    data-from-country="{{ $quote->from_country }}"
    data-to-city="{{ $quote->to_city }}"
    data-to-state="{{ $quote->to_state }}"
    data-to-zip="{{ $quote->to_zip }}"
    data-to-country="{{ $quote->to_country }}">
    Check Price
</button>


    {{-- <a href="#">Similar Offers</a> --}}
