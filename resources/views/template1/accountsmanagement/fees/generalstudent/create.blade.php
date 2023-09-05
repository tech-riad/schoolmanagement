@extends($adminTemplate.'.admin.layouts.app')

@section('content')
<div class="main-panel">
@include($adminTemplate.'.accountsmanagement.topmenu_accountsmanagement')
    <form action="{{ isset($fees)? route('fees.general.update',$fees->id) : route('fees.general.store') }}" method="post">
        @csrf
        <div class="card new-table">
        <div class="card-header">
                    <h5 class="text-primary">Regular Fees Add</h5>
                </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        @if(isset($fees))
                        @method('PUT')
                        @endif

                        @include('custom-blade.search-student')
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="fees_type_id">Fees Type</label>
                                    <div>
                                        <select class="custom-select" id="fees_type_id" name="fees_type_id" required>

                                            <option selected>Select Fee Type</option>
                                            @foreach ($feesType as $feesType)
                                            <option value="{{$feesType->id}}"
                                                @if (isset($fees))
                                                    {{($fees->feesType->id == $feesType->id)? 'selected': ''}}
                                                @endif
                                            >{{$feesType->type}}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                </div>
                            </div>
                            <!--  -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" required name="title" value="{{$fees->title ?? @old('title')}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="Date" class="form-control" id="date" required name="date" value="{{$fees->date ?? date('Y-m-d')}}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="month">Month</label>
                                    <select name="month" class="form-control" id="">
                                        @foreach ($months as $key => $month)
                                            <option value="{{$key}}">{{$month}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="due_date">Due Date</label>
                                    <input type="date" class="form-control" id="due_date" required name="due_date" value="{{$fees->due_date ?? date('Y-m-d')}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">

                                <label for="">Number Of Row</label>
                                <input type="number" id="table_number" class="form-control " required>
                                <br>
                                <span type="submit" onclick="increase()"
                                    class="btn btn-primary mt-1 btn-lg">Proccess</span>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="card new-table mb-3">
            <div class="card">
                <div class="card-body">
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <div class="form-check py-0 my-0">
                                            <input type="checkbox" class="form-check-input" checked id="checkAll">
                                            <label class="form-check-label" for="checkAll"></label>
                                        </div>
                                    </th>
                                    <th scope="col">Head</th>
                                    <th scope="col">Amount</th>

                                    <th></th>
                                </tr>
                            </thead>


                            <tbody>
                                @if (isset($uploadAdmission))
                                @foreach ($uploadAdmission as $key => $ad)
                                @if(isset($fees))
                                @method('PUT')
                                @endif

                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" checked name="check[]"
                                                id="exampleCheck1" value="{{ $key }}">
                                            <label class="form-check-label" for="exampleCheck1"></label>
                                        </div>
                                    </td>


                                    <td><input type="text" class="form-control" value="{{ $ad->head }}" name="head[]"
                                            id="head_{{ $key }}" placeholder="Roll Number">
                                    </td>
                                    <td><input type="text" class="form-control" value="{{ $ad->amount }}"
                                            name="amount[]" id="amount_{{ $key }}" placeholder="amount">
                                    </td>


                                    <td><button type="button" tabindex="-1" class="btn btn-info btn-xs delete"
                                            title="Delete This Row" onclick="removeRow(this)"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        <br>
                        @if(isset($fees))
                        <button type="submit" class="btn btn-primary">Update</button>
                        @else
                        <button type="submit" class="btn btn-primary">Submit</button>
                        @endif



                    </div>


                </div>
            </div>
        </div>
    </form>


</div>
@endsection

@push('js')
<script>
    $('input[type="checkbox"]').change(function () {
        var checked = $(this).is(':checked');
        var input = $(this).closest('tr').find('input[type="text"]');
        var select = $(this).closest('tr').find('select,input');
        input.prop('required', checked)
        select.prop('required', checked)
    })



    function increase() {
        var table_number = $('#table_number').val();
        if (table_number > 0) {
            $('tbody').html('')
            for (let i = 0; i < table_number; i++) {
                increaseto(i)
            }
        }
    }

    function increaseto($i) {
        let html;
        html += '<tr>'
        html +=
            '<td><div class="form-check"><input type="checkbox" class="form-check-input"  checked name="check[]" id="exampleCheck1" value="' +
            $i + '"><label class="form-check-label" for="exampleCheck1"></label></div></td>'
        html += '<td><input type="text" class="form-control" name="head[]" id="head_' + $i +
            '" placeholder="Head"></td>'
        html += '<td><input type="text" class="form-control" name="amount[]" id="amount_' + $i +
            '" placeholder="Amount"></td>'


        html +=
            '<td><button type="button" tabindex="-1" class="btn btn-info btn-xs delete" title="Delete This Row" onclick="removeRow(this)"><i class="fa fa-trash"></i></button></td>'
        html += '</tr>'
        $('tbody').append(html);

    }

    function removeRow(el) {
        $(el).parents("tr").remove()
    }
    $("#checkAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

    $("#accounts_setting").addClass('active');
    $('#settings-nav').removeClass('d-none');

</script>
@endpush
