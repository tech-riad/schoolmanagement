@extends('parentportal.layout.app')
@push('css')
    <link rel="stylesheet" href="{{asset('assets/vendors/callender/callender.css')}}">
    <style>
        #calendar{
            max-width: 1100px;
            margin: 0 auto;
        }
    </style>
@endpush

@section('content')

<div  class="main-panel">
        <nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navigation">
                @include('parentportal.topmenu_dairyandtask')
                </div>
            </div>
        </nav>
        <!-- Calender -->
        <div>
            <div class="card new-table">
                <div class="card-header">
                    <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Weekday & Holiday Setup</h4>
                    <a href="" class="btn btn-primary float-right" id="markHoliday">Mark As Holiday</a>
                </div>
                <div class="card-body">


                    <div id='calendar'></div>
                </div>
            </div>
        </div>
</div>

@endsection

@push('js')
    <script src="{{asset('assets/vendors/callender/callender.js')}}"></script>
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });



            let holidayBtn = $('.fc-event-title').text();
            console.log(holidayBtn);

            var calendarEl = document.getElementById('calendar');

            getCallenderData();
            function getCallenderData(){

                const link = "{{route('attendance.holiday.get-holiday')}}";
                $.ajax({
                    type: 'GET',
                    dataType: "json",
                    url: link,
                    success:function(data){
                        console.log(data);
                        showCallender(data);
                    }
                });
            }


            function showCallender(events){

                var calendar = new FullCalendar.Calendar(calendarEl, {
                                initialDate: '2022-09-12',
                                editable: false,
                                selectable: true,
                                businessHours: true,
                                dayMaxEvents: false, // allow "more" link when too many events
                                events:events,
                                select:function(selectionInfo){
                                    selectCallender(selectionInfo);
                                },
                                eventClick:function(event){
                                    const id = event.event.id;
                                    const link = "{{url('attendance/holiday/delete-holiday')}}";

                                    if(confirm("Are you sure to delete it!")){
                                        $.ajax({
                                            type: 'GET',
                                            dataType: "json",
                                            url: link,
                                            data:{
                                                id
                                            },
                                            success:function(data){
                                                getCallenderData();
                                            }
                                        });
                                    }


                                }
                            });

                calendar.render();
            }

            //select event
            function selectCallender(event){

                console.log(event);

                if(event.jsEvent.shiftKey === true){
                    let start = event.start;
                    let end = event.end;

                    let start_month = (start.getMonth() + 1).toString().padStart(2, "0");
                    let start_day   = start.getDate().toString().padStart(2, "0");

                    let end_month = (end.getMonth() + 1).toString().padStart(2, "0");
                    let end_day   = end.getDate().toString().padStart(2, "0");

                    let start_date = formatDate(start_day,start_month,start.getFullYear());
                    let end_date = formatDate(end_day,end_month,end.getFullYear());

                    let data = {start_date,end_date};
                    postCallenderData(data);
                }
                else{
                    var title = prompt('Enter Title:');

                    if(title){
                        let start = event.start;
                        let end = event.end;

                        let start_month = (start.getMonth() + 1).toString().padStart(2, "0");
                        let start_day   = start.getDate().toString().padStart(2, "0");

                        let end_month = (end.getMonth() + 1).toString().padStart(2, "0");
                        let end_day   = end.getDate().toString().padStart(2, "0");

                        let start_date = formatDate(start_day,start_month,start.getFullYear());
                        let end_date = formatDate(end_day,end_month,end.getFullYear());

                        let data = {start_date,end_date,title};

                        postCallenderData(data);
                    }
                }




            }

            //format date
            function formatDate(date,month,year){
                return `${year}-${month}-${date}`;
            }


            // function post data
            function postCallenderData(data){
                const link = "{{route('attendance.holiday.post-holiday')}}";
                $.ajax({
                    type: 'POST',
                    dataType: "json",
                    url: link,
                    data:{
                        data
                    },
                    success:function(data){
                        getCallenderData();
                    }
                });
            }

        });
    </script>
@endpush
