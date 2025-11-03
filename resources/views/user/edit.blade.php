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

    <h2 class="title mt-2">
        Edit User
    </h2>

    <form action="{{route('user.update', $user->id)}}" method="post" >
        @csrf
        @method('PUT')
        <div class="my-3">
            <label for="" class="form-label">Username</label>
            <input type="text" name="name" id="" class="form-control" value="{{$user ? $user->name : old('name')}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="email" name="email" id="" class="form-control" value="{{$user ? $user->email : old('email')}}">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input type="password" name="password" id="" class="form-control" >
        </div>
        <div class="d-flex justify-content-start my-2">
            <button type="submit" class="btn btn-primary btn-sm me-3"><i class="bi bi-pencil"></i> Update</button>
            <a href="{{route('user.index')}}" class="btn btn-primary btn-sm"><i class="bi bi-backspace"></i> Back</a>
        </div>
        </form>

@endsection
