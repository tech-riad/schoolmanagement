@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="page-body">
        @include($adminTemplate.'.teachers.teachernav')
        <div>
            <div class="card new-table">
                <div class="card">
                    <div class="card-body">
                        <h6>Teacher Birthday Wish</h6>
                        <hr>

                        <form action="{{route('teacher.birthday-wish.index')}}" method="post">
                            @csrf
                            <div class="row p-2 mb-3">
                                <div class="col-sm-4"> <label>Date</label>
                                    <input type="date" class="form-control" name="dob" value="<?php echo date(@$date ?? 'Y-m-d') ?>" id="dob">
                                </div>
    
                                <div class="col-sm-3">
                                   <button class="btn btn-primary p-2" style="margin-top: 33px;" type="submit">Search</button>
                                </div>
    
                            </div>
                        </form>

                        <form action="{{route('teacher.birthday-wish.sendMessage')}}" method="POST">
                        @csrf
                        <table class="table table-bordered table-responsive" style="width:100%; padding:10px">
                            <thead>
                                <tr>
                                    <td style="width:30%">Name</td>
                                    <td style="width:30%">Email</td>
                                    <td style="width:30%">Phone</td>
                                    <td style="width:30%">Date Of Birth</td>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($teachers->count())
                                    @foreach ($teachers as $t)
                                    <tr>
                                        <td style="width:30%">{{$t->name}}</td>
                                        <td style="width:30%">{{$t->email}}</td>
                                        <td style="width:30%">{{$t->mobile_number}}</td>
                                        <td style="width:30%">{{$t->date_of_birth}}</td>
                                    </tr>

                                    <input type="hidden" name="teacher_id[]" value="{{$t->id}}">
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center">No Teacher Found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                        <h6 class="mt-4">Send Message</h6>
                        <hr>
                            <div class="form-group">
                                <label for="">Message <small class="text-danger">You have to use :NAME short code carefully.</small></label>
                                <textarea name="message" class="form-control" id="" cols="30" rows="10">Happy birthday to you Dear :NAME, and thanks for making me look like the normal one!</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"> <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                     Send Message</button>
                            </div>
                        </form>
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
