<form action="{{route('convert_to_quote')}}" method="POST">
    @csrf
<td>

    <div class="input-group">
        <span class="input-group-text">$</span>
        <div class="form-floating">
          <input type="number" name="price" class="form-control price price-input" id="example-group1-floating3" name="example-group1-floating3">
          <label for="example-group1-floating3">Tariff</label>
        </div>
      </div>
                  {{-- <button class="check-price btn btn-sm btn-outline-primary mt-2"
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
</button> --}}
</td>
<td>
    <div class="btn-group">
        <input type="hidden" class="lead_id lead-id-input" name="lead_id" value="{{$lead->id ?? ''}}">
        {{-- <button type="submit" class="btn btn-sm btn-alt-primary" data-bs-toggle="tooltip" title="Convert to Quote">
          Convert To Quote <i class="fa fa-dollar"></i>
        </button> --}}
    </form>
