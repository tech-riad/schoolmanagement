@extends($adminTemplate.'.admin.layouts.app')
@push('css')
    <style>
        tr { height: 40px;padding-top: 0px;padding-bottom: 0px; }
    </style>
@endpush
@section('content')
    <div class="page-body" id="category-id">
        @include($adminTemplate.'.academic.academicnav')


        <div class="card new-table">
            <div class="card">
                <div class="card-header">
                    <h4>Subject Type List</h4>
                    <a href="{{route('subject-type.create')}}" class="btn btn-primary float-right"><i class="fa fa-plus"></i>Add new</a>
                </div>
                <div class="card-body p-0 px-2">
                    <table class="table table-bordered" id="customTable">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Subject</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($subjectTypes as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->is_common}}</td>
                                <td>
                                    <a href="{{route('subject-type.edit', $item->id)}}" class="btn btn-success p-2"><i  class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="{{route('subject-type.destroy', $item->id)}}" class="btn btn-danger p-2"><i  class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <style>
        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link,
        .nav-pills .nav-link {
            background-color: transparent !important;
            border: 0px solid !important
        }

    </style>

    {{-- group edit modal end --}}
@endsection
@push('js')
<script>
    $(document).ready(function () {
        $('#customTable').DataTable();
    });

</script>


@endpush
