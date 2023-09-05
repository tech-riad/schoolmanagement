@extends($adminTemplate.'.admin.layouts.app')

@section('content')
<div class="main-panel">
    @include($adminTemplate.'.webadmin.webadminnav')
    <div>
        <div class="card new-table">
            <div class="card">
                <div class="card-header">
                    <h4>User Message</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>


                        </div>
                        {{-- <a href="{{ route('getintouch.create') }}" class="btn btn-primary mr-2" style="width:
                        175px;height: 34px;">Add New Link</a> --}}
                    </div>

                    <div class="content-wrapper text-primary">
                        <table id="customTable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">SL</th>
                                    <th style="width: 20px;">Name</th>
                                    <th style="width: 20px;">Email</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th style="width: 20px;">Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php  $i=0 ?>
                                @foreach ($messages as $m)
                                <?php $i++ ?>
                                <tr>
                                    <td>{{@$i}}</td>
                                    <td>{{@$m->name}}</td>
                                    <td>{{@$m->email}}</td>
                                    <td>{!! @$m->message !!}</td>
                                    <td>
                                        @if ($m->status == 1)
                                        <span class="badge badge-primary">Read</span>
                                        @else
                                        <span class="badge badge-danger">Unread</span>
                                        @endif
                                    </td>
                                    <td>
                                            <button type="button" class="btn btn-primary status" data-id="{{$m->id}}" value="1"   name="status" data-toggle="modal"
                                                data-target="#exampleModal">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        <form class="deleteForm" action="{{route('contact-us.destroy', $m->id)}}" hidden
                                            method="POST">

                                            @csrf
                                            @method('get')

                                        </form>
                                        <a href="javascript:void(0)" class="btn btn-danger deleteBtn p-2"><i
                                                style="margin-left: 0.3125rem;" class="fa-solid fa-trash"></i></a>
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

{{-- Modal --}}


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="CustomeInput">

                    <span><h4 style="display:inline-block; width:90px;">Name :</h4> {{@$m->name}}</span>
                    

                </div>

                <div class="CustomeInput">
                    <span for="email"><h4 style="display:inline-block; width:90px;">Email :</h4>{{@$m->email}}</span>
                    

                </div>

                <div class="CustomeInput">

                    <span><h4 style="display:inline-block; width:90px;">Message :</h4> {{@$m->message}}</span>

                    

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>

        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    $(document).ready(function () {
        $('#customTable').DataTable();
    });

    $(".deleteBtn").click(function () {
        $(".deleteForm").submit();
    });

    

    $(document).on('click','.status',function(e){
        e.preventDefault();
        let message_id = $(this).data("id");
        
        
        $.get("{{route('contact-us.update')}}",{
            message_id
        },
        function(data){
            console.log(data);
        });
        });
   
        
        $("#contact-tab").addClass('active');
        $("#contact").addClass('show');
        $("#contact").addClass('active');
        $("#user_message").addClass('active');
        $("#home").hide();
</script>
@endpush
