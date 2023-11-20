{{-- Extend your main layout --}}
@extends('layouts.app')

{{-- Section for page heading --}}
@section('page-heading', 'Product Details')

{{-- Main content section --}}
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Product Details</h6>
        </div>
        <div class="card-body">
            {{-- Display product details --}}
            <h4>Name: {{ $product->name }}</h4>
            <p>SKU: {{ $product->sku }}</p>
            <p>Price: ${{ number_format($product->price, 2) }}</p>
            <p>Cost: ${{ number_format($product->cost, 2) }}</p>
            <p>Quantity: {{ $product->quantity }}</p>
            <p>Description: {{ $product->description }}</p>

            {{-- Display product category and supplier (if available) --}}
            <p>Category: {{ $product->category ? $product->category->name : 'N/A' }}</p>
            <p>Supplier: {{ $product->supplier ? $product->supplier->name : 'N/A' }}</p>

            {{-- Link to go back to the product list --}}
            <a href="{{ route('products.index') }}" class="btn btn-primary">Back to Product List</a>
        </div>
    </div>
@endsection
