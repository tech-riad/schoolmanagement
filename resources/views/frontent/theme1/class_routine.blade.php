@extends('frontent.theme1.layouts.web')

@section('content')
<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------  
    START StudentList PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->

<section class="StudentList section_gaps">

    <div class="container">

        <div class="row">

            <div class="col-lg-12">

                <div class="HeaderPart text-center">
                    <h2>Class Routine</h2>
                </div>

                <div class="StudentListHeader">

                    <div class="row">

                        <div class="col-lg-4">
                           <div class="form-control">
                            <select name="section_id" class="form-control" id="section_id" required>
                                <option value="">Select Section</option>
                                @foreach ($sections as $section)
                                    <option value="{{$section->id}}">{{@$section->class->name != 'N/A' ? @$section->class->name : ''}}{{@$section->shift->name != 'N/A' ? '-'. @$section->shift->name : ''}}{{@$section->name != 'N/A' ? '-'. @$section->name : '' }}</option>
                                @endforeach
                            </select>
                           </div>
                           <br>
                           <a href="" id="search" style="text-align: center" class="btn btn-info"><i class="fa fa-search"></i> Search Routine</a>
                        </div>
                    </div>

                </div>

            </div>

            <!-- StudentListHeader -->
            <div class="StudentListContent">

                <h4>Showing Results For <span>Class-THREE-General-GOLAP, Group-General (10 Students)</span></h4>

                <!-- ClassRoutine -->
                <div class="ClassRoutine">

                    <h5>Class Routine: TEN-General-GOLAP</h5>

                    <div class="table-responsive">

                        <table class="table table-striped">

                            <thead>
                                <tr id="trr">
                                    <td>Day</td>
                                    <td>1st Period</td>
                                    <td>2nd Period</td>
                                    <td>3rd Period</td>
                                    <td>4th period</td>
                                    <td>5th period</td>
                                    <td>6th period</td>
                                </tr>
                            </thead>
    
                            <tbody>
                                {{-- @if (isset($routine->section_id)==1) --}}
                                @foreach ($routine as $r)
                                <tr>
                                    <td>{{$r->day ?? '' }}</td>
                                    <td>{{$r->day ?? '' }}</td>
                                    <td>{{$r->day ?? '' }}</td>
                                    <td>{{$r->day ?? '' }}</td>
                                    <td>{{$r->day ?? '' }}</td>
                                    <td>{{$r->day ?? '' }}</td>
                                    <td>{{$r->day ?? '' }}</td>
                                    <td>{{$r->day ?? '' }}</td>
                                </tr>
                                @endforeach
                                {{-- @else
                                    
                                @endif --}}
                                
    
                                
    
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

@push('js')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('#search').click(function(e){

                e.preventDefault();
                let section_id = $('#section_id').val();

                $.get("{{route('web.getRoutine')}}",
                {
                    section_id
                },
                function(data){
                    let thead    = '<td class="text-center">Day</td>';
                    let tbody    = '';
                    let sub    = '';
                    $.each(data.periods,function(i,v){
                        thead +=  `<td class="text-center">${v.period_name}</td>`;
                    });


                    $.each(data.day,function(i,v){



                        tbody += `
                                    <tr>
                                        <td>${i}</td>
                                        ${v.map((item) => {

                                            if(item == null){
                                                return `<td class="text-center"></td>`;
                                            }
                                            else{
                                                return `<td class="text-center">
                                                        <div class="badge badge-primary">
                                                            ${item}
                                                        </div>
                                                    </td>`;
                                            }

                                        })}
                                    </tr>
                                `;

                    });



                    $('#trr').html(thead);
                    $('tbody').html(tbody);
                });

            });

            function chunk(array){
                const chunkSize = 6;
                for (let i = 0; i < array.length; i += chunkSize) {
                    const chunk = array.slice(i, i + chunkSize);
                    return chunk;
                }
            }

        });
    </script>
@endpush
