@extends($adminTemplate.'.admin.layouts.app')
@push('css')
    <style>
        tr { height: 40px;padding-top: 0px;padding-bottom: 0px; }
    </style>
@endpush
@section('content')

<div class="main-panel" id="marks-id">
    @include($adminTemplate.'.smsmanagement.topmenu_sms_management')


    {{-- <div class="card new-table">
        <div class="card-body">
            <h6>Student Admit Card</h6>
            <hr>
            
        </div>
    </div> --}}

    <div class="card new-table">
        <div class="card-header">
            <div class="card-title float-left">
                <h6 style="color: #009FFF">SMS History</h6>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('sms.smshistory')}}" method="Get">
                @csrf
                <div class="row py-2">
                    <div class="col-md-3">
                        <label for="">History Type</label>
                        <select class="form-control" name="type" id="type">
                            <option value="all">All</option>
                            <option value="App\Models\Student">Student</option>
                            <option value="App\Models\Teacher">Teacher</option>
                        </select>
                    </div>
                    <div class="col-md-3" style="padding-top: 2rem !important">
                        <button type="submit" id="btn-submit" class="btn btn-primary"> <i class="fas fa-arrow-circle-down"></i>
                            Proccess</button>
                    </div>
                </div>
            </form>
                <table id="customTable" class="table table-striped table-bordered table-responsive" >
                    <thead>
                        <tr>
                            
                            <th style="width: 40px;">Name</th>
                            <th style="width: 40px;">ID</th>
                            {{-- <th style="width: 40px;">Type</th> --}}
                            <th style="width: 800px;">Description</th>
                            <th style="width: 40px;">Date</th>
                            <th class="text-center" style="width: 20px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($histories as $item)
                            <tr>
                                <td>{{$item->source->name}}</td>
                                <td>{{$item->source->id_no}}</td>
                                <td>{{Str::of($item->description)->words(10, ' ....')}}</td>
                                <td>{{$item->created_at}}</td>
                                <td><a class="btn btn-sm btn-danger p-2" href="{{route('sms.historydelete',$item->id)}}"><i style="margin-left: 0.3125rem;" class="fa-solid fa-trash"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
