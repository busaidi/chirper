{{-- Extend your main layout which includes SB Admin 2 --}}
@extends('layouts.app')

{{-- Section for page heading --}}
@section('page-heading', 'Products')

{{-- Main content section --}}
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Products</h1>
        <p class="mb-4">Overview of all products categorized by type.</p>

        {{-- Include the partial view for each product type --}}
        @php $productTypes = ['Aluminum Profile', 'Hardware', 'Aluminum Thermal Break']; @endphp
        @foreach($productTypes as $index => $type)
            @include('products.partials.products_table', ['productTypeName' => $type, 'typeId' => $index])
        @endforeach

    </div>
@endsection

{{-- Optional: Include DataTables JavaScript at the bottom of this view --}}
@push('scripts')
    <script>
        $(document).ready(function() {
            // Initialize DataTables for each table
            $('table[id^="dataTable-"]').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true
            });
        });
    </script>
@endpush
