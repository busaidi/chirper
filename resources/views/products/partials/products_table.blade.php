{{-- Partial view for product table --}}
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{ $productTypeName }}</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable-{{ $typeId }}" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>SKU</th>
                    <th>Description</th>
                    <th>Product Type</th>
                    <th>Category</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($products->where('type.name', $productTypeName) as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->sku }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->type->name }}</td>
                        <td>{{ $product->category->name }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No products found in {{ $productTypeName }}.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
