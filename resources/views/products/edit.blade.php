@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Update product</h2>
        <div class="lead">
            Edit product.
        </div>

        <div class="container mt-4">

            <form method="POST" action="{{ route('products.update', $post->id) }}">
                @method('patch')
                @csrf

                {{-- Title --}}
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input value="{{ $product->title }}" type="text" class="form-control" name="title"
                        placeholder="Title" required>

                    @if ($errors->has('title'))
                        <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                    @endif
                </div>

                {{-- Description --}}
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input value="{{ $product->description }}" type="text" class="form-control" name="description"
                        placeholder="Description" required>

                    @if ($errors->has('description'))
                        <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                    @endif
                </div>

                {{-- Price --}}
                <div class="mb-3">
                    <label for="description" class="form-label">Price</label>
                    <input value="{{ $product->price }}" type="number" class="form-control" name="price"
                        placeholder="price" required>

                    @if ($errors->has('price'))
                        <span class="text-danger text-left">{{ $errors->first('price') }}</span>
                    @endif
                </div>

                {{-- Quantity --}}
                <div class="mb-3">
                    <label for="description" class="form-label">Quantity</label>
                    <input value="{{ $product->quantity }}" type="number" class="form-control" name="quantity"
                        placeholder="quantity" required>

                    @if ($errors->has('quantity'))
                        <span class="text-danger text-left">{{ $errors->first('quantity') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    @if ($msg = Session::get('success'))
                        <img src="images/{{ Session::get('image') }}" />
                    @endif
                    <img src="images/{{ $product->img_product_src }}" alt="">

                    @if ($errors->has('img_product_src'))
                        <span class="text-danger text-left">{{ $errors->first('img_product_src') }}</span>
                    @endif
                </div>


                <button type="submit" class="btn btn-primary">Save changes</button>
                <a href="{{ route('products.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection
