@extends($adminTemplate.'.admin.layouts.app')

@section('content')
<div class="main-panel" id="subject-id">
    @include($adminTemplate.'.academic.academicnav')
    <nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 mt-2 py-1 mb-2 nested-menu shadow-sm rounded">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav navbar-nav-hover ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('classes.show',$id)}}" id="nav-hov">
                            Shifts
                        </a>
                    </li>

                    <li class="nav-item {{Request::is('academic/class/category*')?'active':''}}">
                        <a class="nav-link" href="{{route('category.index',$id)}}" id="nav-hov">
                            Categories
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('section.index',$id)}}" id="nav-hov">
                            Sections
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('group.index',$id)}}" id="nav-hov">
                            Groups
                        </a>
                    </li>

                    <li class="nav-item {{Request::is('academic/class/subject*')?'custom_nav':''}}">
                        <a class="nav-link" href="{{route('subject.list',$id)}}" id="nav-hov">
                            Subject
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('genGrade.index',$id)}}" id="nav-hov">
                            General Grades
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('testGrade.index',$id)}}" id="nav-hov">
                            Class Test Grade
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="card new-table">
        <div class="card-body p-0 px-2">
            <div class="tab-content" id="pills-tabContent">
                <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Class Name : <span class="h3" style="color: #154A77;font-size:20px;">{{$class_name->name}}</span></h4>
                {{-- category start --}}
                <div class="tab-pane fade show active" id="pills-category" role="tabpanel"
                    aria-labelledby="pills-category-tab">
                    <div class="d-flex mb-3 justify-content-between">
                        <div class="mt-3">
                            <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Subject List</h4>
                        </div>
                        <a class="btn btn-primary py-2"  href="{{route('subject.index',$id)}}">Subject Add <i class="fa fa-plus"></i></a>
                    </div>

                    <table id="customTable1" class="table  table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Subject Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subjectTypeData as $key => $type)
                            <tr>
                                <td> {{ $key }} </td>
                                <td>
                                @foreach($type as $subject)
                                    <div class="badge badge-primary">{{$subject->subject->sub_name}} ({{$subject->subject->sub_code}})</div>
                                @endforeach
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                {{-- catagory end --}}

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

    $(document).ready(function () {
        $('#customTable1').DataTable();
    });
    $(document).ready(function () {
        $('#customTable2').DataTable();
    });
    $(document).ready(function () {
        $('#customTable3').DataTable();
    });

</script>
@endpush
