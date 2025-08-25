<form action="{{route('convert_to_quote')}}" method="POST">
    @csrf
<td><input type="number" class="price" name="price" style="width: 80px">$ <br Recommended Price: $0</td>
<td>
    <div class="btn-group">
        <input type="hidden" class="lead_id" name="lead_id" value="{{$lead->id}}">
        {{-- <button type="submit" class="btn btn-sm btn-alt-primary" data-bs-toggle="tooltip" title="Convert to Quote">
          Convert To Quote <i class="fa fa-dollar"></i>
        </button> --}}
    </form>
