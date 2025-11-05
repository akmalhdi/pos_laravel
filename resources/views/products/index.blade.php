@extends("app")
@section("content")
@section('title', 'Master Data Product')
    <div class="d-flex justify-content-start mb-2">
        <a href="{{route('product.create')}}"
        class="btn btn-primary btn-sm mt-3"><i class="bi bi-plus-circle"></i> Add</a>
    </div>
    <table class="table table-bordered">
        <tr class="text-center">
            <th>No</th>
            <th>Category</th>
            <th>Name</th>
            <th>Photo</th>
            <th>Description</th>
            <th>Price</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        @foreach ($datas as $i => $data)
            <tr>
                <td>{{$i+1}}</td>
                <td>{{$data->category->category_name}}</td>
                <td>{{$data->product_name}}</td>
                <td><img width="100" src="{{asset('storage/' . $data->product_photo)}}" alt="{{$data->product_name}}"></td>
                <td>{{$data->product_description}}</td>
                <td>{{$data->product_price}}</td>
                <td>{{$data->is_active}}</td>
                <td>
                    <a href="{{route('product.edit', $data->id)}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</a>
                    <form action="{{route('product.destroy', $data->id)}}" method="post" onsubmit="return confirm('are u sure to delete this?')" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i> Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
