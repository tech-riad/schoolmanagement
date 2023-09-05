@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="main-panel" id="marks-id">
        @include($adminTemplate.'.exammanagement.topmenu_exammanagement')

        <div>
            <div class="card new-table">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Marks</h4>
                                <p class="card-description">Update Marks </p>
                            </div>
                            
                        </div>
                        
                        <div class="content-wrapper text-primary">
                            <table id="customTable" class="table table-striped table-bordered table-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Class</th>
                                        <th>Roll</th>
                                        <th>Marks</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @php $i=0; @endphp
                                    @foreach ($teachers as $teacher)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $teacher->name }}</td>
                                            <td>{{ $teacher->branch->title }}</td>
                                            <td>{{ @$teacher->designation->title }}</td>
                                            <td>{{ $teacher->mobile_number }}</td>
                                            <td>
                                                <a class="" href="{{ route('teacher.edit',['id' => $teacher->id]) }}" data-toggle="tooltip" data-placement="right" title="Update Teacher Record">
                                                    <i class="mdi mdi-pencil-box" style="font-size: 31px"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        $(document).ready(function() {
            $('#customTable').DataTable();
        });
    </script>
@endsection