@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="page-body" id="marks-id">
    @include($adminTemplate.'.accountsmanagement.topmenu_accountsmanagement')

    <div>
        <div class="card new-table">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h4 style="color:rgba(0, 0, 0, 0.5)">Fees Type</h4>
                    </div>
                    <div class="card-action">
                        <a href="{{Route('feestype.create')}}" class="btn btn-primary mr-2"><i class="fa fa-plus"></i> Add Fees Type</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="customTable" class="table table-striped table-bordered table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 40px;">ID</th>

                                <th style="width: 40px;">Type</th>
                                <th style="width: 20px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($feesType as $feesType)

                            <tr>
                                <td>{{$feesType->id}}</td>

                                <td>{{$feesType->type}}</td>
                                <td>
                                    <a href="{{route('feestype.edit', $feesType->id)}}" class="btn btn-success">Edit</a>
                                    <form class="deleteForm" hidden action="{{route('feestype.destory', $feesType->id)}}" method="POST">

                                    @csrf
                                    </form>
                                    <a href="javascript:void(0)" class="btn btn-danger deleteBtn">Delete</a>
                                </td>



                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    </div>
@endsection
@push('js')
<script>

$(document).ready(function () {
        $('#customTable').DataTable();
        $("#accounts_setting").addClass('active');
        $('#settings-nav').removeClass('d-none');
    });

    $(".deleteBtn").click(function () {
        $(".deleteForm").submit();
    });

</script>
@endpush

