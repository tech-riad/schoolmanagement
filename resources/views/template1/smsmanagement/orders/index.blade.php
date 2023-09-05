@extends($adminTemplate.'.admin.layouts.app')
@section('content')

<div class="main-panel">
    @include($adminTemplate.'.smsmanagement.topmenu_sms_management')
    <div class="card new-table">
        <div class="card-header">
            <div class="card-title float-left">
                <h6 style="color: black">Packages</h6>
            </div>
        </div>
        <div class="card-body">
            <div class="card-header">
                <p>Package List</p>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Title</th>
                        <th>Total Sms</th>
                        <th>Sms Rate</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($packages as $package)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$package->title}}</td>
                        <td>{{$package->total_sms}}</td>
                        <td>{{$package->sms_rate}}</td>
                        <td>{{$package->amount}}</td>
                        <td>
                            <form action="{{route('sms.orders.store')}}" method="POST">
                                @csrf
                                <input type="hidden" name="package_id" value="{{$package->id}}">
                                <button type="submit" class="btn btn-info"><i class="fa fa-cart-shopping"></i> Order</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <div class="card-body">
            <div class="card-header">
                <p>Order List</p>
            </div>
                <table id="customTable" class="table table-striped table-bordered " >
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th >Date</th>
                            <th>Title</th>
                            <th>Total Sms</th>
                            <th>Amount</th>
                            <th >status</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$order->created_at->toDateString()}}</td>
                            <td>{{$order->package->title}}</td>
                            <td>{{$order->package->total_sms}}</td>
                            <td>{{$order->package->amount}}</td>
                            <td>
                                @if ($order->status == 'pending')
                                    <div class="badge badge-danger">{{$order->status}}</div>
                                @else
                                    <div class="badge badge-success">{{$order->status}}</div>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>

@endsection

@push('js')
<script>
    $(document).ready(function() {
        $('#customTable').DataTable();
    });



</script>
@endpush
