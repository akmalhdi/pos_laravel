@extends("app")
@section("content")
    <h2 class="title mt-2">
        Data Users
    </h2>
    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('user.create')}}"
        class="btn btn-primary btn-sm mt-3"><i class="bi bi-plus-circle"></i> Add</a>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Username</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        @foreach ($users as $i => $u)
            <tr>
                <td>{{$i+1}}</td>
                <td>{{$u->name}}</td>
                <td>{{$u->email}}</td>
                <td>
                    <a href="{{route('user.edit', $u->id)}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</a>
                    <form action="{{route('user.destroy', $u->id)}}" method="post" onsubmit="return confirm('are u sure to delete this?')" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i> Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
