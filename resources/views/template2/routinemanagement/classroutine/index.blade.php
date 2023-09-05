@extends($adminTemplate.'.admin.layouts.app')
@push('css')
    <style>
        table td{
            font-size: 14px;
        }
    </style>
@endpush
@section('content')
    <div class="page-body">
        @include($adminTemplate.'.routinemanagement.routineNav')
        <div>
            <div class="card new-table">
                <div class="card-header">
                    <div class="card-title float-left">
                        <h6 style="color: black" >Class Routine</h6>
                    </div>
                    <a href="{{route('classroutine.create')}}" class="btn btn-primary float-right"> <i class="fa fa-plus"></i> Add New</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="section_id">Section</label>
                                        <select name="section_id" class="form-control" id="section_id" required>
                                            <option value="">Select Section</option>
                                            @foreach (@$sections as $section)
                                                <option value="{{@$section->id}}">{{@$section->class->name}}-{{@$section->shift->name}}-{{@$section->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <a href="" id="search" style="text-align: center" class="btn btn-info"><i class="fa fa-search"></i> Search Routine</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card new-table">
            <div class="card-body">
                <div class="card-header">Class Routine</div>
                <table class="table">
                    <thead>
                        <tr id="trr">
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                </form>
            </div>
        </div>
    </div>
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

                $.post("{{route('classroutine.get-routine')}}",
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
