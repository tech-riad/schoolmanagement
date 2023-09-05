@extends('frontent.theme1.layouts.web')

@section('content')
@php
    $sessions = \App\Models\Session::all();
    $classes = \App\Models\InsClass::all();
    $exams = \App\Models\Exam::all();
@endphp
<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------  
    START StudentList PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->

<section class="StudentList section_gaps">

    <div class="container">

        <div class="row">

            <div class="col-lg-12">

                <div class="HeaderPart text-center">
                    <h2>Exam Routine</h2>
                </div>

                <div class="StudentListHeader">

                    <form action="{{route('web.exam_routine')}}" method="post">
                        @csrf
                        <div class="row">

                            <div class="col-lg-3">
                                
                                <select name="session">
                                    @foreach ($sessions as $session)
                                       <option value="{{$session->id}}" @selected(@$routine->session->id == $session->id)>{{$session->title}}</option> 
                                    @endforeach
                                </select>
    
                            </div>

                            
    
                            <div class="col-lg-3">
                                
                                <select name="class">
                                    <option value="select">Select Once</option> 
                                    @foreach ($classes as $class)
                                       <option value="{{$class->id}}" @selected(@$routine->class->id == $class->id)>{{$class->name}}</option> 
                                    @endforeach
                                </select>
    
                            </div>
    
                            <div class="col-lg-3">
    
                                <select name="exam">
                                    <option value="select">Select Once</option> 
                                    @foreach ($exams as $exam)
                                      <option value="{{$exam->id}}" @selected(@$routine->exam->id == $exam->id)>{{$exam->name}}</option>  
                                    @endforeach
                                </select>
    
                            </div>
    
                            <div class="col-lg-3">
    
                                <button type="submit" class="bg">Submit</button>
    
                            </div>
    
                        </div>
                    </form>

                </div>

            </div>

            <!-- StudentListHeader -->
            <div class="StudentListContent">
                
                <h4>Showing Results For <span>{{@$routine->session->title}}-{{@$routine->class->name}}-{{@$routine->exam->name}}</span></h4>

                <!-- ClassRoutine -->
                <div class="ClassRoutine">

                    <h5>Class Routine: {{@$routine->class->name}}</h5>

                    <div class="table-responsive">

                        <table class="table table-striped">

                            <thead>
    
                              <tr>
                                <th class="fst" scope="col">
                                    <h4>Date & Time</h4>
                                </th>
                                <th class="fst" scope="col"><h4>Subject</h4></th>

                                <th class="fst" scope="col">
                                    <h4>Date & Time</h4>
                                </th>
                                <th  class="fst" scope="col"><h4>Subject</h4></th>
                              </tr>
    
                            </thead>
    
                            <tbody>
                                @if (isset($routine))
                                @foreach ($routine->subjects as $key => $s)

                                @if (($key + 1) % 2 != 0)
                                    <tr style="border:1px solid;">
                                @endif
                                    <td>{{date('d/m/Y', strtotime($s->pivot->date)) }} - {{date('h:i a', strtotime($s->pivot->start_time))}}</td>
                                    <td>{{$s->sub_name ?? '' }}</td>

                                @if (($key + 1) % 2 == 0)
                                </tr>
                                @endif

                                @endforeach
                                @else
                                <tr>
                                    <td colspan="6">No Routine Found</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------  
    START Footer PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->
@endsection