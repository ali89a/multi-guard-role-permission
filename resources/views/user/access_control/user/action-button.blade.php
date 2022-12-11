<!-- <div class="dropdown">
    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
        <i data-feather="more-vertical"></i>
    </button>
    <div class="dropdown-menu">
        <form action="{{route('user.users.destroy',$user->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <a class="dropdown-item" href="{{route('user.users.edit',$user->id)}}">
                <i data-feather="edit-2" class="mr-50"></i>
                <span>Edit</span>
            </a>
            <a class="dropdown-item confirm-text" type="submit">
                <i data-feather="trash" class="mr-50"></i>
                <span>Delete</span>
            </a>
        </form>
    </div>
</div> -->
<div class="text-center">
    <a href="{{ route('user.users.show',$user->id)}}" title="Show">
        <i class="fas fa-eye mr-50"></i>
    </a>
    <a title="Edit" href="{{route('user.users.edit',$user->id)}}">
        <i class="fas fa-edit"></i>
    </a>
</div>