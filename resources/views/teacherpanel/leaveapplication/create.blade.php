@extends('teacherpanel.layout.app')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
            <div class="card new-table">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <div>
                            <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Leave Application Create</h4>
                            {{-- <p class="card-description"> Teachers attendance record list here, </p> --}}
                        </div>
                        {{-- data-toggle="modal" data-target="#exampleModal" --}}
                        <a href="{{ route('teacherpanel.application.index') }}" class="btn btn-primary mr-2"
                            style="width: 175px;height: 34px;">Application List
                            <i class="fa fa-list"></i>
                        </a>
                    </div>
                    <div class="content-wrapper text-primary">
                        <form id="teacher-form" action="{{ !isset($application) ? route('teacherpanel.application.store') : route('teacherpanel.application.update',$application->id)}}" method="POST">
                            @csrf
                            @isset($application)
                                @method('PUT')
                            @endisset
                            <div class="form-row">
                                <div class="col-md-4">
                                    <label for="">Application Templates</label>
                                    <select class="form-control" id="template_id" name="template_id">
                                        <option selected hidden value="all">Select Template</option>
                                        @foreach ($templates as $template)
                                          <option value="{{$template->id}}" @selected(@$application->template_id == $template->id ? true : false) >{{$template->title}}</option>  
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="">To date</label>
                                    <input type="date" value="{{ @$application->to_date ?? date('Y-m-d') }}" name="to_date"
                                        class="form-control" id="" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="">From Date</label>
                                    <input type="date" value="{{ @$application->from_date ?? date('Y-m-d') }}" class="form-control" name="from_date" id="from_date" required>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3 mt-3">
                                        <label for="application" class="form-label">Application</label>
                                        <textarea id="application" name="application" type="text" class="form-control" rows="10" placeholder="Select Template First"
                                        class="@error('application') is-invalid @enderror">{{@$application->application}}</textarea>
            
                                        @error('application')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection

@push('javascript')
    <script>
        $(document).ready(function() {
            $("#template_id").change(function(){
                var temp_id = $(this).val();
                $.ajax({
                    url     : '/teacherpanel/leave-application/template-details/'+temp_id,
                    type    : 'GET',
                    success : function(data){
                        $("#application").empty();
                        $("#application").text(data.application);
                    }
                });
            });
        });
    </script>
@endpush
