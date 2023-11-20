{{-- Extend your main layout --}}
@extends('layouts.app')

{{-- Section for page heading --}}
@section('page-heading', 'Add New Product')

{{-- Main content section --}}
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            {{-- Display validation errors, if any --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Start of product creation form --}}
            <form action="{{ route('products.store') }}" method="POST">
                @csrf {{-- CSRF token for form security --}}

                {{-- Field for Product Name --}}
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" value="{{ old('name') }}" required>
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                {{-- Field for Product SKU --}}
                <div class="form-group">
                    <label for="sku">SKU</label>
                    <input type="text" class="form-control {{ $errors->has('sku') ? 'is-invalid' : '' }}" id="sku" name="sku" value="{{ old('sku') }}" required>
                    @if ($errors->has('sku'))
                        <div class="invalid-feedback">{{ $errors->first('sku') }}</div>
                    @endif
                </div>

                {{-- Field for Product Price --}}
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" step="0.01" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" id="price" name="price" value="{{ old('price') }}" required>
                    @if ($errors->has('price'))
                        <div class="invalid-feedback">{{ $errors->first('price') }}</div>
                    @endif
                </div>

                {{-- Field for Product Cost --}}
                <div class="form-group">
                    <label for="cost">Cost</label>
                    <input type="number" step="0.01" class="form-control {{ $errors->has('cost') ? 'is-invalid' : '' }}" id="cost" name="cost" value="{{ old('cost') }}">
                    @if ($errors->has('cost'))
                        <div class="invalid-feedback">{{ $errors->first('cost') }}</div>
                    @endif
                </div>

                {{-- Field for Product Quantity --}}
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" id="quantity" name="quantity" value="{{ old('quantity') }}" required>
                    @if ($errors->has('quantity'))
                        <div class="invalid-feedback">{{ $errors->first('quantity') }}</div>
                    @endif
                </div>

                {{-- Field for Product Description --}}
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description" name="description">{{ old('description') }}</textarea>
                    @if ($errors->has('description'))
                        <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                    @endif
                </div>

                {{-- Field for selecting Product Category --}}
                {{-- Make sure to pass $categories (as an array or collection of category objects) to this view --}}
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}" id="category_id" name="category_id">
                        <option value="">Select a Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('category_id'))
                        <div class="invalid-feedback">{{ $errors->first('category_id') }}</div>
                    @endif
                </div>

                {{-- Field for selecting Product Supplier --}}
                {{-- Make sure to pass $suppliers (as an array or collection of supplier objects) to this view --}}
                <div class="form-group">
                    <label for="supplier_id">Supplier</label>
                    <select class="form-control {{ $errors->has('supplier_id') ? 'is-invalid' : '' }}" id="supplier_id" name="supplier_id">
                        <option value="">Select a Supplier</option>
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('supplier_id'))
                        <div class="invalid-feedback">{{ $errors->first('supplier_id') }}</div>
                    @endif
                </div>

                {{-- Submit Button --}}
                <button type="submit" class="btn btn-primary">Save Product</button>
            </form>
        </div>
    </div>
@endsection
