@extends($adminTemplate.'.admin.layouts.app')

@section('content')

<div class="page-body">
    @include($adminTemplate.'.accountsmanagement.topmenu_accountsmanagement')
    <div class="card new-table">
        @if (isset($chart_of_accounts))
        <div class="card-header">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif


            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @endif
            <div class="card-header">
                <h5 class="text-primary">Edit::Chart Of Accounts</h5>
            </div>
            <div class="card-body">
                <form action="{{route('chart-of-account.update',$chart_of_accounts->id)}}" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-lg-4">
                            <label>Head</label>
                            <input type="text" value="{{$chart_of_accounts->acc_head}}" name="acc_head" class="form-control">
                        </div>
                        <div class="col-lg-4">
                            <label>Head Bangla</label>
                            <input type="text" value="{{$chart_of_accounts->acc_head_bangla}}" name="acc_head_bangla" class="form-control">
                        </div>
                        <div class="col-lg-4">
                            <label>Account Code</label>
                            <input type="text" value="{{$chart_of_accounts->acc_code}}" name="acc_code" class="form-control">
                        </div>
                        
                        
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg-4">
                            <label>Account Code BN</label>
                            <input type="text" value="{{$chart_of_accounts->acc_code_bn}}" name="acc_code_bn" class="form-control">

                        </div>
                        <div class="col-lg-4">
                            <label>Account Level</label>
                            <select name="acc_level" id="acc_level" class="form-control">
                                <option selected value="{{$chart_of_accounts->acc_level}}">{{$chart_of_accounts->acc_level}}</option>
                                <option value="0">Level 0</option>
                                <option value="1">Level 1</option>
                                <option value="2">Level 2</option>
                                <option value="3">Level 3</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label>Parent Id</label>
                            <select name="parent_id" id="parent_id" class="form-control">
                                <option selected value="{{$chart_of_accounts->parent_id}}">{{$chart_of_accounts->parent_id}}</option>
                            <option value="0">None</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mt-2"> <i class="fa fa-arrow-circle-down"></i>
                            Update</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function () {
        $('#customTable').DataTable();
    });

    $(document).ready(function () {

        $('#acc_level').change(function () {
            let level = $(this).val();
            $.ajax({
                url: '/getparent/' + level,
                type: 'Get',
                success: function (data) {
                    console.log(data);
                    let html = "<option value='0'>None</option>"
                    data.map(function (d) {
                        html += `<option value='${d.id}'>${d.acc_head}</option>`
                    })
                    $('#parent_id').html(html)
                }
            });

        })

    });

</script>

@endpush