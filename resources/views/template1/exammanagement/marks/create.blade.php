@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="main-panel" id="marks-id">
        @include($adminTemplate.'.exammanagement.topmenu_exammanagement')

        <div>
            <div class="card new-table">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)"> Input Marks Create</h4>
                        <a href="{{route('exam-management.marks.index')}}" class="btn btn-dark"><i class="fa fa-arrow-left"></i>Back</a>
                    </div>

                        <div class="card-body">
                            <form id="student-form" action="" method="post">
                            @include('custom-blade.search-student2')
                                <div class="card d-none"  id="subject-list">
                                    <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <p>Pending</p>
                                            <div id="pending-subjects">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <p>Done</p>
                                            <div id="done-subjects">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3"><i class="fa fa-arrow-down"></i>Process</button>
                            </form>

                            <form action="{{route('exam-management.marks.download-excel')}}" method="POST">
                                @csrf
                                <input type="hidden" name="class_id" id="class_ids" >
                                <input type="hidden" name="subject_id" id="subject_ids">
                                <button id="dwn-excel" class="btn btn-success float-right mb-2 d-none" type="submit"><i class="fa fa-file-excel"></i>Download Excel</button>
                            </form>

                            <form action="{{route('exam-management.marks.store')}}" method="POST">
                                @csrf
                                <div class="student-list mt-3"></div>
                                <button type="submit" class="btn btn-primary mt-3 d-none" id="save-btn"><i class="fa fa-save"></i>Save</button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {



            //student form submit
            $('#student-form').submit(function(e) {
                e.preventDefault();
                var form = $(this);
                var url = "{{route('exam-management.marks.get-students')}}";
                var class_id = $('.class_id').val();
                // var subject_id = $('#subject_id').val();
                var subject_id = $("input[name='subject_id']:checked").val();

                $('#class_ids').val(class_id);
                $('#subject_ids').val(subject_id);

                $.ajax({
                    type: 'GET',
                    url: url,
                    data: form.serialize(),
                    contentType: false,
                    processData: false,
                    success:function (data){

                        $('#save-btn').removeClass('d-none');

                        let thList = '';
                        $.each(data.mark_dists,function (i,v){
                            thList += `<th>${v.sub_mark_dist_type.title} (${v.mark}-${v.pass_mark})</th>`;
                        });

                        //students loop
                        let tRow = '';
                        $.each(data.students,function (idx,val){
                            let tbodyRow = '';

                            if(data.mark_dists != null){
                                $('#dwn-excel').removeClass('d-none');
                                $.each(val.mark_dists,function (index,value){

                                    tbodyRow += `<td>
                                                    <input type="hidden" name="mark_dist_details_id-${val.id}[]" value="${value.id}" >
                                                    <input type="text"  name="mark_dist_detail-${val.id}[]"  class="form-control mark_dist_details_id-${value.id}" >
                                                </td>`;
                                });
                            }
                            else{
                                $('#dwn-excel').addClass('d-none');
                                tbodyRow += `<td>
                                                <h4 class="text-danger">Mark Dist Not Found</h4>
                                            </td>`;
                            }


                            tRow += `<tr class="tbody">
                                        <td>${idx+1}</td>
                                        <td>${val.id_no}</td>
                                        <td>${val.name}</td>
                                        <td>${val.roll_no}</td>

                                        <input type="hidden" class="student_id" name="student_id[]" value="${val.id}" >
                                        <input type="hidden" name="class_id" value="${class_id}">
                                        <input type="hidden" name="subject_id" value="${subject_id}">
                                        ${tbodyRow}
                                    </tr>`;
                        });

                        let table = `<table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Student Id</th>
                                                <th>Student Name</th>
                                                <th>Roll No</th>

                                                ${thList}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            ${tRow}
                                        </tbody>
                                    </table>`;
                        $('.student-list').html(table);
                        getMarksInput(class_id,subject_id);

                    }
                });



            });

            //get marks input for edit and update
            function getMarksInput(class_id,subject_id){

                $.get("{{route('exam-management.marks.get-marks')}}",{
                    class_id,
                    subject_id
                },function (data){
                    console.log(data);
                    if(data){
                        $('input[name="student_id[]"]').map(function(idx, elem) {
                            let studentId = $(elem).val();
                            let result = data.filter(( item ) => {
                                return item.student_id == studentId;
                            });
                            $.each(result,function (i,v){
                                $(elem).closest('tr').find(`.mark_dist_details_id-${v.sub_marks_dist_details_id}`).val(v.marks);
                            });
                        }).get();
                        $('#save-btn').html("<i class='fa fa-save'></i>Update");
                    }
                    else{
                        $('#save-btn').html("<i class='fa fa-save'></i>Save");
                    }

                });
            }

            //get Subjects
            $('.class_id').change(function(){

                let class_id = $(this).val();

                $.get("{{ route('exam-management.marks.get-subjects') }}",{class_id},
                    function(data){
                        // if(data){
                        //     $('#subject-list').removeClass('d-none');
                        // }
                        if(data.length == 0){
                            $('#subject-list').addClass('d-none');
                            toastr.error("No Subject Found");
                        }
                        else{
                            $('#subject-list').removeClass('d-none');

                            let doneSubjects = data.filter((item)=> item.status == 'done');
                            let pendingSubjects = data.filter((item)=> item.status == 'pending');

                            let doneHtml = '';
                            $.each(doneSubjects,function (idx,val){
                                doneHtml += `<div class="form-check form-check-inline d-flex">
                                          <input class="form-check-input" type="radio" name="subject_id" id="inlineRadio1${val.id}" value="${val.id}">
                                          <label class="form-check-label" for="inlineRadio1${val.id}">${val.sub_name}</label>
                                        </div>`
                            });
                            $('#done-subjects').html(doneHtml);

                            let pendingHtml = '';
                            $.each(pendingSubjects,function (idx,val){
                                pendingHtml += `<div class="form-check form-check-inline d-inline-flex">
                                              <input class="form-check-input" type="radio" name="subject_id" id="inlineRadio1${val.id}" value="${val.id}">
                                              <label class="form-check-label" for="inlineRadio1${val.id}">${val.sub_name}</label>
                                            </div>`;
                            });
                            $('#pending-subjects').html(pendingHtml);

                        }




                    });
            });

            // function sliceIntoChunks(arr, chunkSize) {
            //     const res = [];
            //     for (let i = 0; i < arr.length; i += chunkSize) {
            //         const chunk = arr.slice(i, i + chunkSize);
            //         res.push(chunk);
            //     }
            //     return res;
            // }

        });
    </script>
@endpush
