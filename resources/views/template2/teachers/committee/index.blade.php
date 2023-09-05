@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="page-body">
        @include($adminTemplate.'.teachers.teachernav')
        <div>
            <div class="card new-table">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title float-left">
                            <h6 style="color: black">Committee List</h6>
                        </div>
                        <div>
                           <a href="{{ route('committee.export') }}" class="btn btn-success float-right"><i class="fa fa-file-excel"></i>
                            Export Excell</a>
                        <a href="{{ route('committee.create') }}" class="btn btn-primary mr-2 float-right"> <i class="fa fa-plus"></i> Add New</a>  
                        </div>
                       
                    </div>
                    <div class="card-body">
                        <table id="customTable" class="table table-bordered table-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="text-align:center">SL</th>
                                    <th style="text-align:center">Id No</th>
                                    <th style="text-align:center">Name</th>
                                    <th style="text-align:center">Image</th>
                                    <th style="text-align:center">Designation</th>
                                    <th style="text-align:center">Mobile number</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=0; @endphp
                                @foreach ($staffs as $staff)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td style="text-align:center;">
                                            <a class="" href="{{ route('teacher.edit',['id' => $staff->id]) }}"  title="Update Committee Record">{{ $staff->id_no }}</a>
                                        </td>
                                        <td style="width:30%">{{ $staff->name }}</td>
                                        <td style="width:20%; text-align:center;">
                                            <img style="width: 60px!important;height: 60px!important;" src="{{@$staff->photo ? asset($staff->photo):Helper::default_image()}}" alt="">
                                        </td>
                                        <td style="width:20%; text-align:center;">{{ $staff->designation->title }}</td>
                                        <td style="width:20%; text-align:center;">{{ $staff->mobile_number }}</td>
                                        {{-- <td>
                                            <a class="" href="{{ route('teacher.edit',['id' => $staff->id]) }}" data-toggle="tooltip" data-placement="right" title="Update Teacher Record">
                                                <i class="mdi mdi-pencil-box" style="font-size: 31px"></i>
                                            </a>
                                        </td> --}}
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
