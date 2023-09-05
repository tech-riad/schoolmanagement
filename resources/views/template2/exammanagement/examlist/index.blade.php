@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="page-body">
        @include($adminTemplate.'.exammanagement.topmenu_exammanagement')

        <div>
            <div class="card new-table">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title" style="color:black">Exams</div>
                        <a href="{{route('exam-management.exam.create')}}" class="btn btn-primary" ><i class="fa fa-plus"></i> Add New</a>
                    </div>

                    <div class="card-body">
                        <table id="customTable" class="table  table-bordered table-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width:text-align:center">SL</th>
                                    <th style="width:text-align:center">Exam Name</th>
                                    <th style="width:text-align:center">Start Date</th>
                                    <th style="width:text-align:center">End Date</th>
                                    <th style="width:text-align:center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=0; @endphp
                                @foreach ($exams as $exam)
                                    <tr>
                                        <td style="text-align:center">{{ ++$i }}</td>
                                        <td style="text-align:center; width:30%">{{ $exam->name }}</td>
                                        <td style="text-align:center; width:10%">{{ $exam->start_date }}</td>
                                        <td style="text-align:center; width:20%">{{ $exam->end_date }}</td>
                                        <td style="text-align:center; width:30%">
                                            <a class="btn btn-info"
                                                href="{{ route('exam-management.exam.edit', ['id' => $exam->id]) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a class="btn btn-danger" href="{{ route('exam-management.exam.destroy',  $exam->id) }}">
                                                <i class="fa fa-trash"></i>
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
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('#customTable').DataTable();


            $('#setting').addClass('active');
            $('#setting_menu').show();
        });
    </script>
@endpush
