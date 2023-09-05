@extends('teacherpanel.layout.app')
@section('content')

<div class="main-panel">
    <div class="card new-table">
        <div class="card-header">
            <div class="card-title float-left">
                <h6 style="color: black">Homework List</h6>
            </div>

            <a class="btn btn-primary  float-right" href="{{route('teacherpanel.homework.create')}}">Add New
                Homework</a>
        </div>
        <div class="card-body">
            
                <table id="customTable" class="table table-striped table-bordered " >
                    <thead>
                        <tr>
                            <th style="width: 40px;">File</th>
                            <th style="width: 40px;">Title</th>
                            <th style="width: 800px;">Description</th>
                            <th style="width: 40px;">Published Date</th>
                            <th style="width: 40px;">Submit Date</th>
                            <th style="width: 40px;">Session</th>
                            <th style="width: 40px;">Section</th>
                            <th style="width: 40px;">Group</th>
                            <th style="width: 40px;">Class</th>
                            <th style="width: 40px;">Shift</th>
                            <th style="width: 40px;">Version</th>
                            <th class="text-center" style="width: 20px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($homework as $homework)
                        <tr>
                            <td class="column">
                                @php
                                $getImg = json_decode($homework->filename);
                                @endphp
                                @foreach ($getImg as $item)
                                <img src="{{asset($item)}}"  alt="" class="" style="height: 90px; width:90px;">
                                @endforeach
                            </td>
                            <td>{{$homework->title}}</td>
                            <td>{!! Str::limit($homework->content, 30) !!}</td>
                            <td>{{$homework->published_date}}</td>
                            <td>{{$homework->submit_date}}</td>
                            <td>{{$homework->session_id}}</td>
                            <td>{{$homework->section_id}}</td>
                            <td>{{$homework->group_id}}</td>
                            <td>{{$homework->class_id}}</td>
                            <td>{{$homework->shift_id}}</td>
                            <td>{{$homework->group_id}}</td>
                            <td>
                                <a href="{{route('teacherpanel.homework.edit', $homework->id)}}"
                                    class="btn btn-success p-2"><i style="margin-left: 0.3125rem;"
                                        class="fa-solid fa-pen-to-square"></i></a>
                                <form class="deleteForm" hidden
                                    action="{{route('teacherpanel.homework.destory', $homework->id)}}" method="POST">

                                    @csrf
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

@endsection

@push('js')
<script>
    $(document).ready(function() {
        $('#customTable').DataTable();
    });
    $(".deleteBtn").click(function () {
    $(".deleteForm").submit();
    });

    
</script>
@endpush
