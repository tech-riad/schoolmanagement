@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="main-panel">
        @include($adminTemplate.'.student.studentnav')
        <div>
            <form action="{{ isset($uploadAdmission) ? route('admission.uploadstore') : route('admission.store') }}"
                method="post">
                @csrf
                <div class="card new-table mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h6>Student Admission</h6>
                            <div>
                                @include('custom-blade.search-student')
                                @if (isset($uploadAdmission))
                                @else
                                    <div class="row py-2">
                                        <div class="col-sm-6">
                                            <label for="">Number Of Row</label>
                                            <input type="number" id="table_number" class="form-control " required>

                                        </div>
                                        <div class="col-sm-6">
                                            <br>
                                            <span type="submit" onclick="increase()"
                                                class="btn btn-primary mt-1 btn-lg">Proccess</span>
                                        </div>
                                    </div>
                                @endif
                            </div>


                        </div>
                    </div>
                </div>

                <div class="card new-table">
                    <div class="card">
                        <div class="card-body">


                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            <div class="form-check py-0 my-0">
                                                <input type="checkbox" class="form-check-input" checked id="checkAll">
                                                <label class="form-check-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th scope="col">Roll No.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Gander</th>
                                        <th scope="col">Religion</th>
                                        <th scope="col">Father's Name</th>
                                        <th scope="col">Mother's Name</th>
                                        <th scope="col">Mobile No</th>
                                        <th></th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @if (isset($uploadAdmission))
                                        @foreach ($uploadAdmission as $key => $ad)
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" checked
                                                            name="check[]" id="exampleCheck1" value="{{ $key }}">
                                                        <label class="form-check-label" for="exampleCheck1"></label>
                                                    </div>
                                                </td>


                                                <td><input type="text" class="form-control" value="{{ $ad->roll_no }}"
                                                        name="roll_no[]" id="roll_no_{{ $key }}"
                                                        placeholder="Roll Number"></td>
                                                <td><input type="text" class="form-control" value="{{ $ad->name }}"
                                                        name="name[]" id="name_{{ $key }}" placeholder="Name">
                                                </td>

                                                <td> 
                                                    <select name="gender[]" id="gender_{{ $key }}"
                                                        class="form-control" required>
                                                        <option value="" selected disabled>select a gender</option>
                                                        <option value="male" {{$ad->gender == "Male" ? 'selected':''}}>Male</option>
                                                        <option value="female" {{$ad->gender == "Female" ? 'selected':''}}>Female</option>
                                                    </select>
                                                </td>
                                                <td> <select name="religion[]" id="religion_{{ $key }}"
                                                        class="form-control" required>
                                                        <option value="" selected disabled>select a religion</option>
                                                        <option value="isalm"  {{$ad->religion == "Islam" ? 'selected':''}}>Islam</option>
                                                        <option value="hinduism" {{$ad->religion == "Hinduism" ? 'selected':''}}>Hinduism</option>
                                                    </select>
                                                </td>
                                                <td><input type="text" class="form-control"
                                                        value="{{ $ad->father_name }}" name="father_name[]"
                                                        id="father_name_{{ $key }}" placeholder="Father Name">
                                                </td>
                                                <td><input type="text" class="form-control"
                                                        value="{{ $ad->mother_name }}" name="mother_name[]"
                                                        id="mother_name_{{ $key }}" placeholder="Mother Name">
                                                </td>
                                                <td><input type="text" class="form-control"
                                                        value="{{ $ad->mobile_number }}" name="mobile_number[]"
                                                        id="mobile_number_{{ $key }}"
                                                        placeholder="Mobile Number"></td>
                                                <td><button type="button" tabindex="-1"
                                                        class="btn btn-info btn-xs delete" title="Delete This Row"
                                                        onclick="removeRow(this)"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('js')
    <script>
        $('input[type="checkbox"]').change(function() {
            var checked = $(this).is(':checked');
            var input = $(this).closest('tr').find('input[type="text"]');
            var select = $(this).closest('tr').find('select,input');
            input.prop('required', checked)
            select.prop('required', checked)
        })

        $('#session_id').attr("required", "true");
        $('#section_id').attr("required", "true");




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
            html += '<td><input type="text" class="form-control" name="roll_no[]" id="roll_no_' + $i +
                '" placeholder="Roll Number"></td>'
            html += '<td><input type="text" class="form-control" name="name[]" id="name_' + $i +
                '" placeholder="Name"></td>'

            html += '    <td> <select name="gender[]" id="gender_' + $i + '" class="form-control" required>'
            html += '            <option value="n/a" >select a gender</option>'
            @foreach ($gender as $gr)
                html += '            <option value="{{ $gr->name }}">{{ $gr->name }}</option>'
            @endforeach
            html += '        </select>'
            html += '    </td>'
            html += '    <td> <select name="religion[]" id="religion_' + $i + '" class="form-control" required>'
            html += '        <option value="n/a" >select a religion</option>'
            @foreach ($religion as $rl)
                html += '            <option value="{{ $rl->name }}">{{ $rl->name }}</option>'
            @endforeach
            html += '    </select>'
            html += '</td>'
            html += '<td><input type="text" class="form-control" name="father_name[]" id="father_name_' + $i +
                '" placeholder="Father Name"></td>'
            html += '<td><input type="text" class="form-control" name="mother_name[]" id="mother_name_' + $i +
                '" placeholder="Mother Name"></td>'
            html += '<td><input type="text" class="form-control" name="mobile_number[]" id="mobile_number_' + $i +
                '" placeholder="Mobile Number" ></td>'
            html +=
                '<td><button type="button" tabindex="-1" class="btn btn-info btn-xs delete" title="Delete This Row" onclick="removeRow(this)"><i class="fa fa-trash"></i></button></td>'
            html += '</tr>'
            $('tbody').append(html);

        }

        function removeRow(el) {
            $(el).parents("tr").remove()
        }
        $("#checkAll").click(function() {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>
@endpush
