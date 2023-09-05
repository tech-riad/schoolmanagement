@extends($adminTemplate.'.admin.layouts.app')
@push('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.css">
@endpush
@section('content')
<div class="main-panel" id="child-of">
    @include($adminTemplate.'.accountsmanagement.topmenu_accountsmanagement')
    <div class="card new-table">

            <div class="card-header">
                <h5 class="text-primary">Chart Of Accounts</h5>
            </div>
            <div class="card-body">
                <form action="{{route('chart-of-account.store')}}" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-lg-4">
                            <label>Head</label>
                            <input type="text" value="" id="acc_head" name="acc_head" class="form-control">
                        </div>
                        <div class="col-lg-4">
                            <label>Head Bangla</label>
                            <input type="text" value="" name="acc_head_bangla" class="form-control">
                        </div>

                        <div class="col-lg-4">
                            <label>Account Code</label>
                            <input type="text" value="" id="acc_code" name="acc_code" class="form-control">
                        </div>



                    </div>
                    <div class="row mt-2">
                        <div class="col-lg-4">
                            <label>Account Code BN</label>
                            <input type="text" value="" name="acc_code_bn" class="form-control">

                        </div>
                        <div class="col-lg-4">
                            <label>Account Level</label>
                            <select name="acc_level" id="acc_level" class="form-control">
                                <option value="0">Level 0</option>
                                <option value="1">Level 1</option>
                                <option value="2">Level 2</option>
                                <option value="3">Level 3</option>
                            </select>
                        </div>


                        <div class="col-lg-4">
                            <label>Parent Id</label>
                            <select name="parent_id" id="parent_id" class="form-control">
                                <option value="0">None</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mt-2"> <i class="fa fa-arrow-circle-down"></i>
                            Save</button>
                    </div>
                </form>
            </div>


        <div class="card new-table">
            <div class="card-header">
                <h5 class="text-primary">Chart Of Accounts List</h5>
            </div>
            <div class="card-body">
                <div class="dd">
                    <ol class="dd-list">

                        @foreach ($chart_of_accounts as $item)
                        <li class="dd-item" data-id="{{$item->id}}">
                                <div class="item_actions float-right">
                                    <a href="{{route('chart-of-account.edit',$item->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    <a id="delete" href="{{route('chart-of-account.destroy',$item->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></a>
                                </div>
                                <div class="dd-handle">{{$item->acc_head}}</div>
                                @if(!$item->childs->isEmpty())
                                    <ol class="dd-list">
                                        @foreach($item->childs as $childItem)
                                            <li class="dd-item" data-id="{{$childItem->id}}">
                                                <div class="item_actions float-right">
                                                    <a href="{{route('chart-of-account.edit',$childItem->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                    <a id="delete" href="{{route('chart-of-account.destroy',$childItem->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></a>
                                                </div>
                                                <div class="dd-handle">{{$childItem->acc_head}}</div>
                                                @if(!$childItem->childs->isEmpty())
                                                <ol class="dd-list">
                                                    @foreach ($childItem->childs as $children)
                                                        <li class="dd-item" data-id="{{$children->id}}">
                                                            <div class="item_actions float-right">
                                                                <a href="{{route('chart-of-account.edit',$children->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                                <a id="delete" href="{{route('chart-of-account.destroy',$children->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></a>
                                                            </div>
                                                            <div class="dd-handle">{{$children->acc_head}}</div>
                                                        </li>
                                                    @endforeach
                                                </ol>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ol>
                                @endif
                        </li>
                        @endforeach

                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@push('js')


<script src="//cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.js"></script>

<script>
    $(document).ready(function () {
        $('#customTable').DataTable();
    });

    $(document).ready(function () {


        $('.dd').nestable({maxDepth:3 });
        $('.dd').on('change',function (e){
           console.log(JSON.stringify($('.dd').nestable('serialize')));
           $.post('{{route('chart-of-account.order')}}',{
               order: JSON.stringify($('.dd').nestable('serialize')),
               _token : '{{csrf_token()}}'
           },function (data){
               console.log(data);
               toastr.success('Order Updated :)');
           });
        });

        $('.edit').on('click', function () {
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();
            console.log(data);

            $('#editModal').modal('show');
        });

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

        });

        $("#acc_head").keyup(function() {
            var Text = $(this).val();
            Text = Text.toLowerCase()
             .replace(/ /g, '-')
             .replace(/[^\w-]+/g, '');
            $("#acc_code").val(Text);
        });

    });


    $('#settings-nav').removeClass('d-none');
    $("#accounts_setting").addClass('active');
</script>

@endpush
