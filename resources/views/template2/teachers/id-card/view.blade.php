@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="page-body">
        @include($adminTemplate.'.academic.academicnav')

        <div class="card new-table">
            <div class="card-header">
                {{$teacher->name}}
            </div>
            <div class="card-body">

                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-6 float-left">
                                    <div style="margin: 0px 38px" class="std-img d-flex flex-column align-items-center">
                                        <img width="120" src="{{asset($teacher->photo?? Helper::default_image()) }}" alt="">
                                    </div>
                                    <p class="text-center">{{$teacher->name}}</p>

                                </div>
                                <div class="col-md-6 float-right">
                                    <table >
                                        <tbody>
                                            <tr>
                                                <td>Teacher Id</td>
                                                <td></td>
                                                <td>:&nbsp</td>
                                                <td>{{$teacher->id_no}}</td>
                                            </tr>
                                            <tr>
                                                <td>Designation</td>
                                                <td></td>
                                                <td>:&nbsp</td>
                                                <td>{{$teacher->designation->title}}</td>
                                            </tr>
                                            <tr>
                                                <td>Branch</td>
                                                <td></td>
                                                <td>:&nbsp</td>
                                                <td>{{$teacher->branch->title}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('teacher.id-card.download',$teacher->id)}}" style="margin-top: 20px" class="btn btn-success"><i class="fa fa-download"></i></a>

            </div>
        </div>

    </div>
@endsection

@push('js')
<script>

</script>
@endpush
