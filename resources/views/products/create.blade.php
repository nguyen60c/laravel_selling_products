@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Add new product</h2>
        <div class="lead">
            Add new product.
        </div>

        <div class="container mt-4">

            <form method="POST" action="{{ route('products.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input value="{{ old('title') }}" type="text" class="form-control" name="title" placeholder="Title"
                        required>

                    @if ($errors->has('title'))
                        <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input value="{{ old('description') }}" type="text" class="form-control" name="description"
                        placeholder="Description" required>

                    @if ($errors->has('description'))
                        <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" name="price" placeholder="price" required
                        value="{{ old('price') }}" />

                    @if ($errors->has('price'))
                        <span class="text-danger text-left">{{ $errors->first('body') }}</span>
                    @endif
                </div>

                <div class="form-outline mb-3">
                    <input type="file" name="img_src" class="form-control" />
                </div>

                <button type="submit" class="btn btn-primary">Save role</button>
                <a href="{{ route('products.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection
