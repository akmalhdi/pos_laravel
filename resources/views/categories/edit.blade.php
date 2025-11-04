@extends('app')
@section('content')

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $er)
                <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                <strong>Alert!</strong> {{$er}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        </ul>
    @endif

    <form action="{{route('category.update', $edit->id)}}" method="post" >
        @csrf
        @method('PUT')
        <div class="my-3">
            <label for="" class="form-label">Name</label>
            <input type="text" name="category_name" id="" class="form-control" value="{{$edit->category_name ?? ''}}">
        </div>
        <div class="d-flex justify-content-start my-2">
            <button type="submit" class="btn btn-primary btn-sm me-3"><i class="bi bi-pencil"></i> Save Change</button>
            <a href="{{route('category.index')}}" class="btn btn-primary btn-sm"><i class="bi bi-arrow-counterclockwise"></i> Back</a>
        </div>
        </form>

@endsection
