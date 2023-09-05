@extends($adminTemplate.'.admin.layouts.app')

@section('content')
<div class="page-body">
@include($adminTemplate.'.student.studentnav')
<div class="card new-table mb-3">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{route('admission.upload.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <lable>Upload Excel File</lable>
                            <input type="file" class="form-control" id="formFile" name="files_excel" />
                            @error('files_excel')
                            <span class="alert text-danger p-0" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Uploads</button>
                        </div>
                    </form>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Download Sample</label><br>
                        <a href="{{asset('student_reg_sample.xlsx')}}" target="_new"
                            class="btn btn-primary">Download</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
    $('#class_id').change(function () {
        var class_id = $(this).val();
        console.log(class_id, 'class_id')
        $.ajax({
            url: '/student/getShiftbyClass/' + class_id,
            type: 'GET',
            success: function (data) {
                data.map(function (val, index) {
                    console.log(val, index);
                    $("#shift_id").append(`<option value='${val.id}'>${val.name}</option>`);
                })
            }
        });
    })

    $('#shift_id').change(function () {
        var class_id = $('#class_id').val();
        var shift_id = $(this).val();

        $.ajax({
            url: '/student/getCatSecGro/' + class_id + '/' + shift_id,
            type: 'GET',
            success: function (data) {
                data.category.map(function (val, index) {
                    $("#category_id").append(
                        `<option value='${val.id}'>${val.name}</option>`);
                })
                data.section.map(function (val, index) {
                    $("#section_id").append(
                        `<option value='${val.id}'>${val.name}</option>`);
                })
                data.group.map(function (val, index) {
                    $("#group_id").append(`<option value='${val.id}'>${val.name}</option>`);
                })
            }
        });
    });

</script>
@endpush
