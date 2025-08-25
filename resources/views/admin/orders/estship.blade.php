    {{-- <a href="#">Look on CD</a><br> --}}
 <button class="check-price btn btn-sm btn-outline-primary mt-2"
    data-id="{{ $order->id }}"
    data-name="{{ $order->customer->name }}"
    data-from-city="{{ $order->from_city }}"
    data-from-state="{{ $order->from_state }}"
    data-from-zip="{{ $order->from_zip }}"
    data-from-country="{{ $order->from_country }}"
    data-to-city="{{ $order->to_city }}"
    data-to-state="{{ $order->to_state }}"
    data-to-zip="{{ $order->to_zip }}"
    data-to-country="{{ $order->to_country }}">
    Check Price
</button>


    {{-- <a href="#">Similar Offers</a> --}}
