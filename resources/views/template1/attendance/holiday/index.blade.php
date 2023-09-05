@extends($adminTemplate.'.admin.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/callender/callender.css') }}">
    <style>
        #calendar {
            max-width: 1100px;
            margin: 0 auto;
        }
        
    </style>
@endpush
@section('content')
    <div class="main-panel">

        @include($adminTemplate.'.attendance.partials.attendancenav')
        <div>
            <div class="card new-table">
                <div class="card-header">
                    <h6 class="float-left">Weekday & Holiday Setup</h6>
                </div>
                <div class="card-body">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>

    </div>

    {{-- tooltip --}}
@endsection

@push('js')
    <script src="{{ asset('assets/vendors/callender/callender.js') }}"></script>
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            getCallenderData();
            function getCallenderData() {

                const link = "{{ route('attendance.holiday.get-holiday') }}";
                $.ajax({
                    type: 'GET',
                    dataType: "json",
                    url: link,
                    success: function(data) {
                        showCallender(data);
                    }
                });
            }

            function showCallender(events){

                const date = new Date();
                let day = date.getDate();
                let month = date.getMonth() + 1;
                let year = date.getFullYear();

                let currentDate = `${year}-${month}-${day}`;

                var calendarEl = document.getElementById('calendar');

                var calendar = new FullCalendar.Calendar(calendarEl, {
                        initialDate: currentDate,
                        editable: false,
                        selectable: true,
                        businessHours: true,
                        dayMaxEvents: false, // allow "more" link when too many events
                        events: events,
                        select: function(event) {

                            if (event.jsEvent.shiftKey === true) {
                                    let start = event.startStr;
                                    let data = {
                                        start,
                                        title:"Weekday",
                                        color:"red"
                                    };

                                    var event = calendar.addEvent(data);
                                    console.log(event);
                                    postCallenderData(data);
                            }
                            else {
                                var title = prompt('Enter Title:');

                                if (title) {
                                    let start = event.startStr;
                                    let data = {
                                        start,
                                        title
                                    };
                                    calendar.addEvent(data);
                                    postCallenderData(data);
                                }
                            }
                        },

                        eventClick: function(event) {
                            const id = event.event.id;
                            const link = "{{ url('attendance/holiday/delete-holiday') }}";

                            if (confirm("Are you sure to delete it!")) {
                                $.ajax({
                                    type: 'GET',
                                    dataType: "json",
                                    url: link,
                                    data: {
                                        id
                                    },
                                    success: function(data) {
                                        var event = calendar.getEventById(id);
                                        event.remove();
                                    }
                                });
                            }


                        }


                });

                calendar.render();


            }


            function postCallenderData(data) {
                const link = "{{ route('attendance.holiday.post-holiday') }}";
                $.ajax({
                    type: 'POST',
                    dataType: "json",
                    url: link,
                    data: {
                        data
                    },
                    success: function(data) {

                    }
                });
            }

        });

        $(".setting").closest('li').addClass('custom_nav');
        $("#setting-item").removeClass('d-none');
    </script>
@endpush
