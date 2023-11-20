@extends('layouts.app')

@section('page-heading', 'Inventory')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Inventory List</h6>
        </div>
        <div class="card-body">
            {{-- Add a link to add a new inventory item --}}
            <a href="{{--{{ route('inventory.create') }}--}}" class="btn btn-primary mb-3">Add New Item</a>

            {{-- Display a table of inventory items --}}
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                   {{-- @foreach ($inventoryItems as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>${{ number_format($item->price, 2) }}</td>
                            <td>
                                <a href="{{ route('inventory.show', $item->id) }}" class="btn btn-success btn-sm">View</a>
                                <a href="{{ route('inventory.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                --}}{{-- Add a form to delete the inventory item --}}{{--
                                <form action="{{ route('inventory.destroy', $item->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach--}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
