@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="page-body" id="marks-id">
        @include($adminTemplate.'.accountsmanagement.topmenu_accountsmanagement')

        <div>
            <div class="card new-table">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title float-left">
                            <div>
                                <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Scholarship</h4>
                            </div>

                        </div>
                        <a href="{{ Route('scholarship.create') }}" class="btn btn-primary mr-2 float-right"
                            style="width: 175px;height: 34px;"><i class="fa fa-plus"></i> Add New</a>
                    </div>
                    <div class="card-body">
                        <table id="customTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Note</th>
                                    <th>Student</th>
                                    <th>Fees Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($scholarships as $scholarship)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $scholarship->note }}</td>
                                        <td>{{ $scholarship->student->name }}</td>
                                        <td>{{ @$scholarship->fees_type->type }}</td>
                                        <td>
                                            <a href="" data-id="{{$scholarship->id}}" class="btn btn-info view-btn"><i class="fa fa-eye"></i></a>
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
    <!-- Modal -->
    <div class="modal fade" id="scholarship-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Scholarship Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Month</th>
                                <th>Discount</th>
                            </tr>
                        </thead>
                        <tbody id="modal-tbody">
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('#customTable').DataTable();
            $("#accounts_setting").addClass('active');
            $('#settings-nav').removeClass('d-none');

            $(document).on('click','.view-btn',function(e){
                e.preventDefault();
                $('#scholarship-modal').modal('show');

                let scholarship_id = $(this).data('id');

                $.get("{{route('scholarship.get-scholarship-details')}}",{
                    scholarship_id
                },function(data){
                   let html = '';
                   data.map(function(item){
                        html += `<tr>
                                    <td>${item.fees.title}</td>
                                    <td>${getMonthName(item.month)}</td>
                                    <td>${item.discount}</td>
                                </tr>`;
                   });
                   $('#modal-tbody').html(html);
                });
            });

            function getMonthName(monthNumber) {
                const date = new Date();
                date.setMonth(monthNumber - 1);

                return date.toLocaleString('en-US', { month: 'long' });
            }
        });
    </script>
@endpush
