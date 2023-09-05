<input type="hidden" name="class_id" id="class_id">
<input type="hidden" name="shift_id" id="shift_id">
<div class="row py-2" id="all-row-py-2">
    <div class="col-sm-2"> <label for="session_id"> Session</label>
        <select name="academic_year_id" id="session_id" class="form-control">
            <option value="">Select</option>
            @foreach ($academic_years as $academic_year)
                <option value="{{ $academic_year->id }}">{{ $academic_year->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-2"> <label for="class_id">Class</label>
        <select name="class_id" id="class_id" class="form-control class_id">
            <option value="100">Select Class</option>
        </select>
    </div>
    <div class="col-sm-2"> <label for="category_id">Select Category</label>
        <select name="category_id" id="category_id" class="form-control category_id">
            <option value="">Select Category</option>

        </select>
    </div>


    <div class="col-sm-2"> <label for="group_id">Select Group</label>
        <select name="group_id" id="group_id" class="form-control group_id">
            <option value="">Select Group</option>
        </select>
    </div>

    <div class="col-sm-2"> <label for="group_id">Select Exam</label>
        <select name="exam_id" id="exam_id" class="form-control exam_id">
            <option value="">Select Exam</option>
            @foreach ($exams as $exam)
                <option value="{{ $exam->id }}">{{ $exam->name }}</option>
            @endforeach
        </select>
    </div>
</div>


@push('js')
    <script>

        $('#session_id').change(function(){

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

                $('.class_id').html(html);
            });
        });

        $('.class_id').change(function(){

            let class_id = $(this).val();

            $.get("{{route('student.get-categories-groups')}}",
            {
                class_id
            },
            function(data){
                let categories = '<option value="">Select Category</option>';
                let groups     = '<option value="">Select Group</option>';

                data.categories.map(function(item){
                    categories += `<option value="${item.id}">${item.name}</option>`;
                });

                data.groups.map(function(item){
                    groups += `<option value="${item.id}">${item.name}</option>`;
                });

                $('.category_id').html(categories);
                $('.group_id').html(groups);
            });
        });
    </script>
@endpush
