@extends("app")
@section("content")
    <h2 class="title mt-2">
        Data Categories
    </h2>
    <div class="d-flex justify-content-end mb-2">
        <a href="{{route("category.create")}}"
        class="btn btn-primary btn-sm mt-3"><i class="bi bi-plus-circle"></i> Add</a>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Category Name</th>
            <th>Actions</th>
        </tr>
        @foreach ($categories as $i => $c)
            <tr>
                <td>{{$i+1}}</td>
                <td>{{$c->category_name	}}</td>
                <td>
                    <a href="{{route('category.edit', $c->id)}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</a>
                    <form action="{{route('category.destroy', $c->id)}}" method="post" onsubmit="return confirm('are u sure to delete this?')" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i> Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
