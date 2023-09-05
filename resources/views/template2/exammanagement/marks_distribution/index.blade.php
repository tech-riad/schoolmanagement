@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="page-body" id="marks-id">
        @include($adminTemplate.'.exammanagement.topmenu_exammanagement')

        <div>
            <div class="card new-table">
                <div class="card-body">
                    <p>
                        <a class="btn btn-primary mb-3" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-arrow-down"></i> Setup Mark Distribution
                        </a>
                    </p>
                    {{-- mark dist setup start--}}
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            <div class="card-body">
                                @include('custom-blade.search-student2')
                            </div>
                            <form action="{{ route('exam-management.setting.marks-dist.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="class_id" >
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Marks Type</th>
                                            <th>Total Mark</th>
                                            <th>Pass Mark</th>
                                            <th>Take</th>
                                            <th>Grace</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <tr>
                                            <td>
                                                <select name="subject_id[]" id="subject_id"
                                                        class="form-control col-md-12 subject_id-1">
                                                    <option value="">Select Subject</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" name="total_mark[]" class="form-control" required>
                                            </td>
                                            <td>
                                                <input type="number" name="pass_mark[]" class="form-control" required>
                                            </td>
                                            <td>
                                                <input type="number" value="100" name="take[]" class="form-control" required>
                                            </td>
                                            <td>
                                                <input type="number" name="grace[]" class="form-control" required>
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-info add-row"><i class=" fa fa-plus"></i> </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select  id="sub_marks_dist_type_id"
                                                         class="form-control sub_marks_dist_type_id">
                                                    <option value="">Select Type</option>
                                                    @foreach ($types as $item)
                                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" placeholder="Mark" class="form-control mark" required>
                                            </td>
                                            <td>
                                                <input type="number" placeholder="Passmark" class="form-control pass-mark"
                                                       required>
                                            </td>
                                            <td colspan="3">
                                                <a href="" class="btn btn-dark marks-plus"><i class=" fa fa-plus"></i> </a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary mt-3"><i class="fa fa-save"></i>Submit</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
                {{-- mark dist setup end--}}
                <div class="card-header">
                    <p>Mark DIstribution List</p>
                </div>
                <form action="" id="student-form">
                    <div class="form-row mt-3">
                        <div class="col">
                            <label for="">Academic Year</label>
                            <select name="year_id" class="form-control" id="year_id" required>
                                <option value="">Select Session</option>
                                @foreach($academic_years as $session)
                                    <option value="{{$session->id}}">{{$session->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="ins_class_id">Class</label>
                            <select name="ins_class_id" id="ins_class_id" class="form-control ins_class_id" required>
                                <option value="100">Select Class</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mt-2"><i class="fa fa-arrow-down"></i>Process</button>
                    </div>
                </form>

                <table class="table table-bordered d-none" id="mark-dist-table">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Subject/Short Code</th>
                        <th>Total Mark</th>
                        <th>Pass Mark</th>
                        <th>Take</th>
                        <th>Grace</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="mark-dist-list">

                    </tbody>
                </table>


                </div>


            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            var loader = `<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin:auto;background:#fff;display:block;" width="31px" height="31px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                        <circle cx="50" cy="50" fill="none" stroke="#e15b64" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
                            <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
                        </circle>
                        </svg>`;
            //change class id
            $('.class_id').change(function (){
               let  class_id = $(this).val();
               $("[name='class_id']").val(class_id);
            });

            //get class
            $('#year_id').change(function(){
                let session_id = $(this).val();
                $.get("{{route('student.get-classes')}}",
                    {
                        session_id
                    },
                    function(data){
                        let html = '<option>Select Class</option>';
                        data.map(function(item){
                            html += `<option value="${item.id}">${item.name}</option>`;
                        });
                        $('.ins_class_id').html(html);
                    });
            });
            //student form submit
            $('#student-form').submit(function(e) {
                e.preventDefault();
                var form = $(this);
                var url = "{{route('exam-management.get-subjects')}}";
                $('#preload').html(loader);

                $.ajax({
                    type: 'GET',
                    url: url,
                    data: form.serialize(),
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $('#mark-dist-table').removeClass('d-none');

                        let html = '';

                        if(data.length > 0){
                            $.each(data,function (i,v){
                                let trow = '';


                                let btn = '<a href="{{ route('exam-management.setting.marks-dist.edit',100) }}" class="btn btn-info"><i class=" fa fa-edit"></i> </a>';
                                let editBtn = btn.replace(100,v.id);

                                v.details.map(function (item){
                                   trow += `<tr>

                                               <td>
                                                   <i class="fa fa-arrow-right"></i> ${item.sub_mark_dist_type.title}
                                               </td>
                                               <td>
                                                   ${item.mark}
                                               </td>
                                               <td>
                                                   ${item.pass_mark}
                                               </td>
                                           </tr>`;
                                });


                                html += `  <tr>
                                            <td rowspan="${v.details.length + 1}">${i+1}</td>
                                            <td>
                                                ${v.subject.sub_name}
                                            </td>
                                            <td>
                                                ${v.total_mark}
                                            </td>
                                            <td>
                                                ${v.pass_mark}
                                            </td>
                                            <td>
                                                ${v.take}
                                            </td>
                                            <td>
                                                ${v.grace}
                                            </td>
                                            <td>
                                                ${editBtn}
                                            </td>
                                        </tr>
                                        ${trow}
                                        `;
                            });
                        }
                        else{
                            html += `<tr>
                                        <td colspan="7" class="text-danger text-center">No Data Found</td>
                                     </tr>`;
                        }

                        $('#mark-dist-list').html(html);



                    }
                });
            });

            $('#customTable').DataTable();
            $("#setting").addClass('active');
            $("#marks-dist").addClass('active');
            $("#setting_menu").show();
            localStorage.removeItem("index");

            $(document).on('click', '.marks-plus', function(e) {

                let subject_id = $(this).closest('tr').prev().find("[name='subject_id[]']").val();
                e.preventDefault();
                let html = `<tr>
                                <td>
                                    <select name="dist_type_id_${subject_id}[]" id="sub_marks_dist_type_id" class="form-control sub_marks_dist_type_id">
                                        <option value="">Select Type</option>
                                        @foreach ($types as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="mark-${subject_id}[]" placeholder="Mark" class="form-control mark" required>
                                </td>
                                <td>
                                    <input type="text" name="pass_mark-${subject_id}[]"  placeholder="Passmark" class="form-control pass-mark" required>
                                </td>
                                <td colspan="3">
                                    <a href=""  class="btn btn-danger marks-minus"><i class=" fa fa-minus"></i> </a>
                                </td>
                            </tr>`;
                $(this).closest('tr').after(html);
            });




            //type on change
            /*
            $(document).on('change','.sub_marks_dist_type_id',function(){
                let type_id = $(this).val();
                $(this).closest('tr').find('.mark').attr('name', `mark-${type_id}[]`);
                $(this).closest('tr').find('.pass-mark').attr('name', `pass-mark-${type_id}[]`);
            });*/




            //new row add
            let index = 1;

            $(document).on('click', '.add-row', function(e) {

                index++;
                e.preventDefault();
                let html = `     <tr>
                                    <td>
                                        <select name="subject_id[]" id="subject_id" class="form-control col-md-12 subject_id-${index}">
                                            <option value="">Select Subject</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" name="total_mark[]" class="form-control" required>
                                    </td>
                                    <td>
                                        <input type="text" name="pass_mark[]" class="form-control" required>
                                    </td>
                                    <td>
                                        <input type="text" value="100" name="take[]" class="form-control" required>
                                    </td>
                                    <td>
                                        <input type="text" name="grace[]" class="form-control" required>
                                    </td>
                                    <td>
                                    <a href="" class="btn btn-danger delete-row"><i class=" fa fa-trash"></i> </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select id="sub_marks_dist_type_id" class="form-control sub_marks_dist_type_id">
                                            <option value="">Select</option>
                                            @foreach ($types as $item)
                                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" placeholder="mark" class="form-control mark" required>
                                    </td>
                                    <td>
                                        <input type="text"  placeholder="passmark" class="form-control pass-mark" required>
                                    </td>
                                    <td colspan="3">
                                        <a href=""  class="btn btn-dark marks-plus"><i class=" fa fa-plus"></i> </a>
                                    </td>
                                </tr>`;
                $('tbody').append(html);

                //set index
                localStorage.setItem("index", index);

                let class_id = $('.class_id').val();


               $.get("{{ route('get-subjects-by-class') }}",{class_id},
                function(data){
                    let html = '<option value="">Select Subject</option>';
                    data.map(function(item){
                        html += `<option value="${item.subject.id}">${item.subject.sub_name}</option>`;
                    });
                    $(`.subject_id-${index}`).html(html);
                });

                $(document).on('change',`.subject_id-${index}`,function(){
                   let subject_id = $(this).val();
                   $(this).closest('tr').next().find('.sub_marks_dist_type_id').attr('name', `dist_type_id_${subject_id}[]`);

                   $(this).closest('tr').next().find('.mark').attr('name', `mark-${subject_id}[]`);
                   $(this).closest('tr').next().find('.pass-mark').attr('name', `pass_mark-${subject_id}[]`);
                });


            });


            $(document).on('change','.subject_id-1',function(){
                let subject_id = $(this).val();
                $(this).closest('tr').next().find('.sub_marks_dist_type_id').attr('name', `dist_type_id_${subject_id}[]`);

                $(this).closest('tr').next().find('.mark').attr('name', `mark-${subject_id}[]`);
                $(this).closest('tr').next().find('.pass-mark').attr('name', `pass_mark-${subject_id}[]`);
            });



            //get subjects by class

            $('.class_id').change(function(){

               let class_id = $(this).val();

               $.get("{{ route('get-subjects-by-class') }}",{class_id},
                function(data){
                        console.log(data);
                    let html = '<option value="">Select Subject</option>';
                    data.map(function(item){
                        html += `<option value="${item.subject.id}">${item.subject.sub_name}</option>`;
                    });
                    $('.subject_id-1').html(html);
                });
            });



            $(document).on('click', '.delete-row', function(e) {
                e.preventDefault();
                $(this).closest('tr').next().remove();
                $(this).closest('tr').remove();
            });
            $(document).on('click', '.marks-minus', function(e) {
                e.preventDefault();
                $(this).closest('tr').remove();
            });


        });
    </script>
@endpush
