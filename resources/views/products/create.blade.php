@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Add New Product</h1>

        <form method="POST" action="{{ route('products.store') }}">
            @csrf

            {{-- Products Section --}}
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Product Details</h6>
                </div>
                <div class="card-body">
                    {{-- Fields for product details --}}
                    <div class="form-group">
                        <label for="name">Product Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="sku">SKU:</label>
                        <input type="text" class="form-control" id="sku" name="sku" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>

                    {{-- Product Type Dropdown --}}
                    <div class="form-group">
                        <label for="product_type_id">Product Type:</label>
                        <select class="form-control" id="product_type_id" name="product_type_id" required>
                            <option value="">Select a Type</option>
                            @foreach ($productTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Category Dropdown --}}
                    <div class="form-group">
                        <label for="category_id">Category:</label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            <option value="">Select a Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>

            {{-- Product Pricing Rules Section --}}
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Product Pricing Rules</h6>
                </div>
                <div class="card-body">
                    {{-- Fields for product pricing rules --}}
                    <div class="form-group">
                        <label for="base_price">Base Price:</label>
                        <input type="number" class="form-control" id="base_price" name="base_price">
                    </div>
                    <div class="form-group">
                        <label for="color_price">Color Price:</label>
                        <input type="number" class="form-control" id="color_price" name="color_price">
                    </div>
                    <div class="form-group">
                        <label for="crimping_price">Crimping Price:</label>
                        <input type="number" class="form-control" id="crimping_price" name="crimping_price">
                    </div>
                    <div class="form-group">
                        <label for="min_length">Minimum Length:</label>
                        <input type="number" class="form-control" id="min_length" name="min_length">
                    </div>
                    <div class="form-group">
                        <label for="max_length">Maximum Length:</label>
                        <input type="number" class="form-control" id="max_length" name="max_length">
                    </div>
                    <div class="form-group">
                        <label for="min_qty">Minimum Quantity:</label>
                        <input type="number" class="form-control" id="min_qty" name="min_qty">
                    </div>
                    <div class="form-group">
                        <label for="max_qty">Maximum Quantity:</label>
                        <input type="number" class="form-control" id="max_qty" name="max_qty">
                    </div>
                    <div class="form-group">
                        <label for="weight_price">Price per Kilogram:</label>
                        <input type="number" class="form-control" id="weight_price" name="weight_price">
                    </div>
                    <div class="form-group">
                        <label for="weight_per_meter_price">Price per Kilogram per Meter:</label>
                        <input type="number" class="form-control" id="weight_per_meter_price" name="weight_per_meter_price">
                    </div>
                    <div class="form-group">
                        <label for="bar_length_price">Price per Kilogram per Meter for Bar Length:</label>
                        <input type="number" class="form-control" id="bar_length_price" name="bar_length_price">
                    </div>
                </div>
            </div>

            {{-- Product Variations Section --}}
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Product Variations</h6>
                </div>
                <div class="card-body">
                    {{-- Fields for product variations (Assuming single variation for simplicity) --}}
                    <div class="form-group">
                        <label for="variation_name">Variation Name:</label>
                        <input type="text" class="form-control" id="variation_name" name="variation_name">
                    </div>
                    <div class="form-group">
                        <label for="variation_value">Variation Value:</label>
                        <input type="text" class="form-control" id="variation_value" name="variation_value">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
