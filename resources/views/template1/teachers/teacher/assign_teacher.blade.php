@extends($adminTemplate.'.admin.layouts.app')
@push('css')
<link rel="stylesheet" href="{{asset('assets/vendors/chosen/chosen.css')}}">
<style>
       .select2-results__option{
            background: white;
        }

</style>
@endpush
@section('content')
    <div class="main-panel">
        @include($adminTemplate.'.teachers.teachernav')
        <div>
            <div class="card new-table">
                <div class="card">
                    <div class="card-body">
                        <h6>Assign Class Teacher</h6>
                        <hr>
                        <form action="{{ route('assign_teacher.store') }}" method="post">
                            @csrf
                            <div>
                                <div class="row" id="table">
                                    <div class="col">
                                        <label> Select Teacher</label>
                                        <select name="teacher_id" class="form-control chosen-select">
                                            <option>Select Teacher</option>
                                            @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="">Select Section</label>
                                        <select name="section_id" id="section_id" class="form-control chosen-select" >
                                            <option value="">select</option>
                                            @foreach ($sections as $section)
                                                <option value="{{$section->id}}">{{$section->class->name}}{{$section->shift->name != 'N/A' ? '-'.$section->shift->name : ''}}{{$section->name != 'N/A' ? '-'.$section->name : ''}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3 float-end">
                                <i class="mdi mdi-content-save-settings"></i>
                                Save
                            </button>
                        </form>
                    </div>
                    <div class="card mt-2">
                        <div class="card-header">
                            <h6>Teacher Assign List</h6>
                        </div>
                        <div class="card-body">
                            <table id="customTable" class="table table-striped table-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;">SL</th>
                                        <th style="text-align:center;">Name</th>
                                        <th style="text-align:center;">designation</th>
                                        <th style="text-align:center;">Class</th>
                                        <th style="text-align:center;">Section</th>
                                        <th style="text-align:center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=0; @endphp
                                    @foreach ($assign_teacher as $teacher)
                                        <tr>
                                            <td style="width:0%; text-align:center;">{{ ++$i }}</td>
                                            <td style="width:20%">{{ $teacher->teacher->name }}</td>
                                            <td  style="width:10%; text-align:center">{{ $teacher->teacher->designation->title }}</td>
                                            <td style="width:10%; text-align:center">{{ $teacher->ins_class->name }} - {{ $teacher->ins_class->code }}</td>
                                            <td style="width:10%; text-align:center">{{ $teacher->section ? $teacher->section->name : 'Null' }}</td>
                                            <td  style="width:10%; text-align:center">
                                                <a class="" href="{{ route('teacher.edit', ['id' => $teacher->id]) }}"
                                                    data-toggle="tooltip" data-placement="right"
                                                    title="Update Teacher Record">
                                                    <i class="mdi mdi-pencil-box" style="font-size: 31px"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{asset('assets/vendors/chosen/chosen.jquery.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#customTable').DataTable();
            $(".chosen-select").chosen();

        });
    </script>
@endpush
