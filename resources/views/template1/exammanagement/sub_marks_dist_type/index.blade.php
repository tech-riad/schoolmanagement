@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="main-panel" id="marks-id">
        @include($adminTemplate.'.exammanagement.topmenu_exammanagement')

        <div>
            <div class="card new-table">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Short Code</h4>
                        </div>
                        <a href="{{ route('exam-management.setting.marks-dist-type.create') }}" class="btn btn-primary mr-2"><i class="fa fa-plus"></i> Add New </a>
                    </div>
                    <div class="card-body">

                        <table id="customTable" class="table table-bordered e" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Title</th>
                                    <th>Details</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($types as $item)
                               <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{@$item->title}}</td>
                                <td>{{@$item->details}}</td>
                                <td>
                                    <a href="{{route('exam-management.setting.marks-dist-type.edit', $item->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>

                                    <a href="{{route('exam-management.setting.marks-dist-type.destroy', $item->id)}}" class="btn btn-danger deleteBtn"><i class="fa fa-trash"></i></a>
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
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('#customTable').DataTable();
            $('#setting_menu').show();
        });
    </script>
@endpush
