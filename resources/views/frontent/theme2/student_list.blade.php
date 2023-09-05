@extends('frontent.theme2.layouts.web')

@section('content')
    <!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
        START Marquee PART
    --------------------------------------------------------------------------------------------------------------------------------------------------- -->




    <!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
        START StudentList PART
    --------------------------------------------------------------------------------------------------------------------------------------------------- -->

    <section id="about-page" class="StudentList pt-70 pb-110">

        <div class="container">

            <div class="row">

                <div class="col-lg-12">

                    <div class="HeaderPart text-center">
                        <h2>Student List</h2>
                    </div>
                    @php
                        $class_id = app('request')->input('class_id');
                        $group_id = app('request')->input('group_id');
                        //dd($class_id);
                    @endphp
                    <div class="card">
                        <div class="card-body">
                            <div class="StudentListHeader" style=" padding:5px" >
                                <form action="{{ route('web.student_list') }}">
                                    <div class="row">
        
                                        <div class="col-lg-4">
                                            <select class="form-control" name="class_id" id="class_id">
                                                <option value="" selected>Choose a Class</option>
                                                @foreach ($classes as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $class_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
        
                                        <div class="col-lg-4">
                                            <select class="form-control" name="group_id" id="group_id">
                                                <option value="" selected>Select a Group</option>
        
                                            </select>
                                        </div>
        
                                        <div class="col-lg-4">
                                            <button type="submit" id="searchBtn" class="btn btn-adnc-serc">Submit</button>
                                        </div>
        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- StudentListHeader -->
               

            </div>

            
            <div class="StudentListContent">
                <!-- ClassRoutine -->
                
                   
                        <div class="ClassRoutine">
                            <h4 class="pb-3">Showing Results For <span id="showing-result"></span></h4>
                            @if (@$students)
                                <h5>Total Student Found ({{ @$students->count() }})</h5>
                            @endif
    
                            <div class="table-responsive">
    
                                <table class="table table-striped">
    
                                    <thead>
                                        <tr>
    
                                            <th scope="col">ID</th>
                                            <th scope="col">Photo</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">Father's Name</th>
                                            <th scope="col">Mother's Name</th>
    
                                        </tr>
    
                                    </thead>
                                    <tbody id="student-all">
    
                                    </tbody>
    
                                </table>
    
                            </div>
    
                        </div>
                    </div>
                </div>
    </section>
@endsection

@push('js')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            //class change
            $('#class_id').change(function(e) {
                e.preventDefault();
                let class_id = $(this).val();
                $.ajax({
                    url: '/getgroup',
                    type: 'GET',
                    data: {
                        class_id
                    },
                    success: function(data) {
                        let html = '<option>Select Group</option>';
                        data.map(function(item) {
                            html += `<option value="${item.id}">${item.name}</option>`;
                        });
                        $('#group_id').html(html);
                    }
                });
            });



            $('#searchBtn').click(function(e) {
                e.preventDefault();
                let class_id = $('#class_id').val();
                let group_id = $('#group_id').val();

                $.ajax({
                    url: '/getstudent',
                    type: 'get',
                    data: {
                        class_id,
                        group_id,
                    },

                    success: function(data) {
                        let html = '';

                        $.each(data, function(index, val) {
                            let studentImage = '';
                            if (!val.photo && val.gender === 'Female') {
                                studentImage =
                                    `<img width="60" src="{{ Helper::default_image_female() }}" alt="${val.name}">`;
                            } else if (!val.photo && val.gender === 'Male') {
                                studentImage =
                                    `<img width="60" src="{{ Helper::default_image_male() }}" alt="${val.name}">`;
                            } else {
                                studentImage =
                                    `<img width="60" src="{{ Config::get('app.s3_url') }}${val.photo}" alt="${val.name}">`;
                            }


                            html += `<tr>
                                    <td>${val.id_no}</td>
                                    <td class="StudentImg">
                                        <div class="img">
                                            ${studentImage}
                                        </div>
                                    </td>
                                    <td>${val.name}</td>
                                    <td>${val.gender}</td>
                                    <td>${val.father_name}</td>
                                    <td>${val.mother_name}</td>
                                    <td></td>
                                </tr>`;
                        });

                        $('#student-all').html(html);

                    }

                });
            })


        });
    </script>
@endpush
