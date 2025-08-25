        <a href="{{route('leads.edit', $lead->id)}}" class="btn btn-sm btn-alt-primary" data-bs-toggle="tooltip" title="Edit">
          <i class="fa fa-pencil-alt"></i>
        </a>
        <a href="#" class="btn btn-sm btn-alt-danger delete-btn" data-bs-toggle="tooltip" title="Delete">
            <i class="fa fa-trash-alt"></i>
          </a>
        <form class="delete_form" action="{{route('leads.destroy', $lead->id)}}" method="POST">
            @method('DELETE')
            @csrf
    </form>
