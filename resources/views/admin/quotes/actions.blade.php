        <a href="{{route('convert_to_order', $quote->id)}}" class="btn btn-sm btn-alt-success" data-bs-toggle="tooltip" title="Convert To Order">
          <i class="fa fa-check"></i>
        </a>
        <a href="{{route('quotes.edit', $quote->id)}}" class="btn btn-sm btn-alt-primary" data-bs-toggle="tooltip" title="Edit">
          <i class="fa fa-pencil-alt"></i>
        </a>
        <a href="#" class="btn btn-sm btn-alt-danger delete-btn" data-bs-toggle="tooltip" title="Delete">
            <i class="fa fa-trash-alt"></i>
          </a>
        <form class="delete_form" action="{{route('quotes.destroy', $quote->id)}}" method="POST">
            @method('DELETE')
            @csrf
    </form>
