<input type="hidden" name="class_id" id="class_id">
<input type="hidden" name="shift_id" id="shift_id">
<div class="row py-2" id="all-row-py-2">
    <div class="col-sm-3"> <label for="session_id"> Academic Year</label>
        <select name="academic_year_id" id="session_id" class="form-control">
            <option value="">Select</option>
            @foreach ($academic_years as $academic_year)
            <option value="{{ $academic_year->id }}">{{ $academic_year->title }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-sm-3"> <label for="section_id">Section</label>
        <select name="section_id" id="section_id" class="form-control chosen-select">
            <option value="">Select Section</option>
        </select>
    </div>

    <div class="col-sm-3"> <label for="category_id">Select Category</label>
        <select name="category_id" id="category_id" class="form-control" required>
            <option value="">Select Category</option>
        </select>
    </div>

    <div class="col-sm-3"> <label for="group_id">Select Group</label>
        <select name="group_id" id="group_id" class="form-control" required>
            <option value="">Select Group</option>
        </select>
    </div>

</div>


@push('js')
    <script>




        $('#session_id').change(function(){
            let session_id = $(this).val();
            $('.chosen-select').chosen("destroy");

            $.get("{{route('student.get-sections')}}",
            {
                session_id
            },
            function(data){
                let html = '<option value="" selected hidden>Select Section</option>';

                if(data){
                    $.each(data,function(i,item){
                        html += `<option value="${item.id}">${item.class}${item.shift != 'N/A' ? '-'+ item.shift : ''}${item.name != 'N/A' ? '-'+ item.name : ''}</option>`;
                    });
                }

                $('#section_id').html(html);
                $('.chosen-select').chosen();


            });
        });

        $('#section_id').change(function(){
            let section_id = $(this).val();
            $.get("{{route('student.get-class-shift')}}",
            {
                section_id
            },
            function(data){
                $('#class_id').val(data.class_id);
                $('#shift_id').val(data.shift_id);
                getCategoryGroup(data.class_id,data.shift_id);
                getsubjectByClass(data.class_id);
            });
        });

        //Get Category && Group
        function getCategoryGroup(class_id,shift_id){

            $.ajax({
                url: '/student/getCatSecGro/' + class_id + '/' + shift_id,
                type: 'GET',
                success: function(data) {
                    let category = '<option hidden value="">Select Category</option>';
                    let group    = '<option hidden value="">Select Group</option>';

                    data.category.map(function(val, index) {
                        category += `<option ${val.name == 'N/A' ? 'selected hidden' : ''} value='${val.id}'>${val.name != 'N/A' ? val.name : 'No Category In This Class'}</option>`;
                    });

                    data.group.map(function(val, index) {
                        group += `<option ${val.name == 'N/A' ? 'selected hidden' : ''} value='${val.id}'>${val.name != 'N/A' ? val.name : 'No Group In This Class'}</option>`;
                    });
                    $('#category_id').html(category);
                    $('#group_id').html(group);
                }
            });
        }


        function getsubjectByClass(class_id){
            $.ajax({
                    type: 'GET',
                    url: '/academic/number-sheet/subjectbyclassid/'+class_id,
                    success: function(data){
                        if($("#subject")){
                            data.subjects.map(function(val,index){
                                var items = `<option value='${val.sub_name}'>${val.sub_name}</option>`;
                                $("#subject_id").append(items);
                            });
                        }
                    }
                });
        }
    </script>
@endpush
