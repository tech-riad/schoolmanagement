@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="page-body">
        @include($adminTemplate.'.exammanagement.topmenu_exammanagement')

        <div>
            <div class="card new-table">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title" style="color:black">Exams</div>
                        <a href="{{route('exam-management.exam.index')}}" class="btn btn-dark" ><i class="fa fa-arrow-left"></i> Back</a>
                    </div>

                    <div class="card-body">
                        <form action="{{isset($exam) ? route('exam-management.exam.update',$exam->id):route('exam-management.exam.store')}}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="col">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control  @error('name') is-invalid @enderror" value="{{ $exam->name ?? old('name') }}" name="name">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-row mt-2">
                                <div class="col">
                                    <label for="">Start Date</label>
                                    <input type="date" class="form-control @error('start_date') is-invalid @enderror" value="{{ $exam->start_date ?? old('start_date') }}" name="start_date">
                                    @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="">End Date</label>
                                    <input type="date" class="form-control @error('end_date') is-invalid @enderror" value="{{ $exam->end_date ?? old('end_date') }}" name="end_date">
                                    @error('end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-3"><i class="fa fa-save"></i>
                                    @isset($exam)
                                        Update
                                    @else
                                        Submit
                                    @endisset
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('#setting').addClass('active');
            $('#setting_menu').show();
        });
    </script>
@endpush
