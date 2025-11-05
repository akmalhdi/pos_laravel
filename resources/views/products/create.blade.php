@extends('app')
@section('content')

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $er)
                <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                    <strong>Alert!</strong> {{ $er }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="" class="form-label">Category</label>
                    <select name="category_id" id="" class="form-control">
                        <option value="">Select One</option>
                        @foreach ($categories as $c)
                            <option value="{{ $c->id }}">
                                {{ $c->category_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Price</label>
                    <input type="number" placeholder="Input Product Price" class="form-control" name="product_price">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Status</label><br>
                    <input type="radio" id="is_active_1" name="is_active" value="1"> Publish
                    <input type="radio" id="is_active_0" name="is_active" value="0"> Draft
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Photo</label>
                    <input type="file" class="form-control" name="product_photo">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" placeholder="Input Product Name" class="form-control" name="product_name">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Description</label>
                    <textarea name="product_description" id="" style="height: 197px;" class="form-control" placeholder="Input Product Description"></textarea>
                </div>
            </div>

        </div>

        <div class="d-flex justify-content-center my-2">
            <button type="submit" class="btn btn-primary btn-sm me-3"><i class="bi bi-check-lg"></i> Save</button>
            <a href="{{ route('product.index') }}" class="btn btn-primary btn-sm"><i
                    class="bi bi-arrow-counterclockwise"></i> Back</a>
        </div>
    </form>

@endsection
