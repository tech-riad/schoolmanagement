@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="page-body">
        @include($adminTemplate.'.student.studentnav')
        <div>
            <div class="card new-table">
                <div class="card">
                    <div class="card-body">
                        <h6>Student Birthday Wish</h6>
                        <hr>

                        <form action="{{route('student.birthday-wish.index')}}" method="post">
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
                        
                        <form action="{{route('student.birthday-wish.sendMessage')}}" method="post">
                            @csrf
                            <table class="table table-bordered table-responsive" style="width:100%; padding:10px">
                                <thead>
                                    <tr>
                                        <th style="width:30%">Name</th>
                                        <th style="width:30%">Email</th>
                                        <th style="width:30%">Phone</th>
                                        <th style="width:30%">Date Of Birth</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($students->count())
                                        @foreach ($students as $s)
                                            <tr>
                                                <td style="width:30%">{{$s->name}}</td>
                                                <td style="width:30%">{{$s->email}}</td>
                                                <td style="width:30%">{{$s->mobile_number}}</td>
                                                <td style="width:30%">{{$s->dob}}</td>
                                            </tr>

                                            <input type="hidden" name="student_id[]" value="{{$s->id}}">
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" class="text-center">No student Found</td>
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
