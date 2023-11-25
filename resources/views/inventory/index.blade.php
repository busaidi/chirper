{{-- Extend your main layout --}}
@extends('layouts.app')

{{-- Section for page heading --}}
@section('page-heading', 'Inventory')

{{-- Main content section --}}
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Aluminum Profiles</h6>
        </div>
        <div class="card-body">
            {{-- Display a table of aluminum profiles --}}
            <div class="table-responsive">
                <table class="table table-bordered" id="aluminumProfilesTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SKU</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Color</th>
                        <th>Quantity</th>
                        <th>Order</th>
                        <th>Available</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{-- Static demo data for aluminum profiles --}}
                    @php
                        $aluminumProfiles = [
                            [
                                'sku' => 'ALU123',
                                'code' => 'AP001',
                                'name' => 'Aluminum Profile 1',
                                'color' => 'Silver',
                                'quantity' => 50,
                                'order' => 10,
                                'available' => 40,
                            ],
                            [
                                'sku' => 'ALU456',
                                'code' => 'AP002',
                                'name' => 'Aluminum Profile 2',
                                'color' => 'Black',
                                'quantity' => 30,
                                'order' => 5,
                                'available' => 25,
                            ],
                            // Add more profiles here...
                        ];
                    @endphp

                    {{-- Loop through static demo data for aluminum profiles --}}
                    @foreach ($aluminumProfiles as $profile)
                        <tr>
                            <td>{{ $profile['sku'] }}</td>
                            <td>{{ $profile['code'] }}</td>
                            <td>{{ $profile['name'] }}</td>
                            <td>{{ $profile['color'] }}</td>
                            <td>{{ $profile['quantity'] }}</td>
                            <td>{{ $profile['order'] }}</td>
                            <td>{{ $profile['available'] }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Hardware</h6>
        </div>
        <div class="card-body">
            {{-- Display a table of hardware items --}}
            <div class="table-responsive">
                <table class="table table-bordered" id="hardwareTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SKU</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Color</th>
                        <th>Quantity</th>
                        <th>Order</th>
                        <th>Available</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{-- Static demo data for hardware items --}}
                    @php
                        $hardwareItems = [
                            [
                                'sku' => 'HW789',
                                'code' => 'HW001',
                                'name' => 'Hardware Item 1',
                                'color' => 'Silver',
                                'quantity' => 20,
                                'order' => 8,
                                'available' => 12,
                            ],
                            [
                                'sku' => 'HW987',
                                'code' => 'HW002',
                                'name' => 'Hardware Item 2',
                                'color' => 'Bronze',
                                'quantity' => 40,
                                'order' => 15,
                                'available' => 25,
                            ],
                            // Add more hardware items here...
                        ];
                    @endphp

                    {{-- Loop through static demo data for hardware items --}}
                    @foreach ($hardwareItems as $item)
                        <tr>
                            <td>{{ $item['sku'] }}</td>
                            <td>{{ $item['code'] }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['color'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>{{ $item['order'] }}</td>
                            <td>{{ $item['available'] }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
