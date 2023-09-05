@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="page-body">
        @include($adminTemplate.'.teachers.teachernav')

        <div class="card new-table">
            <div class="card-body">
                <h6>Student Id Card</h6>
                <hr>
                <form id="teacher-form" method="GET">
                    <div class="form-row">
                        <div class="col">
                            <label for="">Select Branch</label>
                            <select name="branch_id" id="" class="form-control">
                                <option value="">Select Branch</option>
                                @foreach ($branches as $branch)
                                    <option value="{{$branch->id}}">{{$branch->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="">Select Designations</label>
                            <select name="designation_id" id="" class="form-control">
                                <option value="">Select Designation</option>
                                @foreach ($designations as $designation)
                                    <option value="{{$designation->id}}">{{$designation->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row py-2 mt-3">
                        <div class="col-sm-6" style="display: flex">
                            <br>
                            <button type="submit" id="btn-submit" class="btn btn-primary"> <i class="fas fa-arrow-circle-down"></i>
                                Proccess</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div id="preload" style="margin-top: 10px">

        </div>

        <div>
            <div class="card new-table" id="table-card" style="display: none">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Teacher Id Card List</h4>
                            <p class="card-description"> Get Teacher Id Card </p>
                        </div>
                    </div>

                    <table id="customTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script>


            $('#teacher-form').submit(function(e) {
                e.preventDefault();
                var form = $(this);
                var url = "{{ route('attendance.teacher.get-teachers') }}";

                $.ajax({
                    type: 'GET',
                    url: url,
                    data: form.serialize(),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $('#table-card').css('display', 'block');
                        let html = '';

                        if (data.length > 0) {
                            $.each(data, function(i, value) {

                                let viewBtn = `<a class="btn btn-info" href="/teacher/id-card/view/${value.id}"><i class="fa fa-eye"></i></a>`;
                                let dwnBtn = `<a class="btn btn-primary" href="/teacher/id-card/download-card/${value.id}"><i class="fa fa-arrow-down"></i></a>`;
                                html += `<tr>
                                            <td>${value.id_no}</td>
                                            <td>${value.name}</td>
                                            <td>${value.gender}</td>
                                            <td>${value.mobile_number}</td>
                                            <td>${viewBtn} ${dwnBtn}</td>
                                        </tr>`;

                            });
                        }
                        else{
                            html += `<tr>
                                        <td colspan="6"><p class="text-center text-danger">No Data Found!</p></td>
                                        </tr>
                                    `;
                        }

                        $('tbody').html(html);
                        $('#customTable').DataTable();
                    }
                });
            });
</script>
@endpush
