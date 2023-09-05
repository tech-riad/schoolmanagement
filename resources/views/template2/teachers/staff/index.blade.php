@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="page-body" id="marks-id">
        @include($adminTemplate.'.teachers.teachernav')
        <div>
            <div class="card new-table">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title float-left">
                            <h6 style="color: black">Staff List</h6>
                        </div>
                        <div>
                            <a href="{{ route('teacher.staff.export') }}" class="btn btn-success float-right"><i class="fa fa-file-excel"></i>
                                Export Excell</a>
                            <a href="{{ route('teacher.staff.create') }}" class="btn btn-primary mr-2 float-right" ><i class="fa fa-plus"></i> Add New</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="customTable" class="table table-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Id No</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Designation</th>
                                    <th>Mobile number</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=0; @endphp
                                @foreach ($staffs as $staff)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>
                                            <a class="" href="{{ route('teacher.edit',['id' => $staff->id]) }}"  title="Update Teacher Record">{{ $staff->id_no }}</a>
                                        </td>
                                        <td>{{ $staff->name }}</td>
                                        <td>
                                            <img style="width: 60px!important;height: 60px!important;" src="{{@$staff->photo ? asset($staff->photo):Helper::default_image()}}" alt="">
                                        </td>
                                        <td>{{ $staff->designation->title }}</td>
                                        <td>{{ $staff->mobile_number }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('#customTable').DataTable();
        });
    </script>
@endpush
