@extends($adminTemplate.'.admin.layouts.app')
@push('css')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <style>
        #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
        #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
        #sortable li span { position: absolute; margin-left: -1.3em; }
    </style>
@endpush
@section('content')
    <div class="main-panel">
        @include($adminTemplate.'.academic.academicnav')
        <div class="card new-table">
            <div class="card-header">
                <h6>Subject List</h6>
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-plus"></i>Add Subject</a>

            </div>
            <div class="card-body">
                <table id="customTable" class="table table-bordered table-responsive" style="width:100%; padding:10px">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="sortable">

                    @foreach($subjects as $subject)
                        <tr class="subject-list" data-id="{{$subject->id}}">
                            <td>{{$loop->iteration}}</td>
                            <td style="width:774px">{{$subject->sub_name}}</td>
                            <td style="width:275px">{{$subject->sub_code}}</td>
                            <td>
                                <a href="#" data-id="{{$subject->id}}" data-name="{{$subject->sub_name}}" data-code="{{$subject->sub_code}}"  class="btn btn-info ml-2 edit-btn"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>

    {{--    modal--}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Subject Create</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('subject.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Subject Name</label>
                            <input type="text" class="form-control" name="name" id="" required>
                        </div>
                        <div class="form-group">
                            <label for="">Subject Code</label>
                            <input type="text" class="form-control" name="code" id="" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--    modal--}}

    {{-- edit modal --}}
    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eedit-modalLabel">Subject Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('subject.update')}}" method="POST">
                    @csrf
                    <input type="hidden" name="sub_id" id="sub_id">
                    <div class="form-group">
                        <label for="">Subject Name</label>
                        <input type="text" class="form-control" name="name" id="sub_name" required>
                    </div>
                    <div class="form-group">
                        <label for="">Subject Code</label>
                        <input type="text" class="form-control" name="code" id="sub_code" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Update</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
    {{-- edit modal --}}
@endsection
@push('js')

    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(document).ready(function(){
           $('#settings-nav').removeClass('d-none');
           // $('#customTable').DataTable();

            $( "#sortable" ).sortable({
                placeholder: "highlight",
                update: function() {
                    sendOrderToServer();
                }
            });

            function sendOrderToServer(){

                var order = [];
                var path = "{{route('academic.subject.order-subject')}}";

                $('.subject-list').each(function(index,element) {
                    order.push({
                        id: $(this).attr('data-id'),
                        position: index+1
                    });
                });

                $.get(path,{order},function (data){
                    toastr.success('Subjects Order Updated :)');
                });

            }

            //edit button
            $('.edit-btn').click(function(){

                $('#edit-modal').modal('show');

                let id = $(this).data('id');
                let name = $(this).data('name');
                let code = $(this).data('code');

                $('#sub_id').val(id);
                $('#sub_name').val(name);
                $('#sub_code').val(code);

            });
        });
    </script>
@endpush
