@extends($adminTemplate.'.admin.layouts.app')

@section('content')
<div class="page-body">
    @include($adminTemplate.'.webadmin.webadminnav')
    <div>
        <div class="card new-table">
            <div class="card">
                <div class="card-header">
                    <h4>Color</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>


                        </div>
                        <a href="" class="btn btn-primary mr-2" style="width:
                        175px;height: 34px;">Add New Color</a>
                    </div>

                    <div class="content-wrapper text-primary">
                        <table id="customTable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Section Name</th>
                                    <th>Color</th>
                                    <th>Background Color</th>
                                    <th>Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($color as $item)
                                <tr>
                                    <td>{{@$item->frontsection->name}}</td>
                                    <td>{{@$item->color}}</td>
                                    <td>{{@$item->background_color}}</td>
                                    <td>
                                        <a href="javascript:void(0)" onclick="editClass({{$item->id}})"
                                            class="btn btn-primary btn-sm
                                            p-1"><i style="margin-left: 0.3125rem;" class="fa-solid fa-pen-to-square"></i></a>
                                    </td>
                                </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--Edit  Modal --}}

{{-- edit modal start --}}
<div class="modal fade" id="classeditmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border: 1px solid #7c9ff5;">
            <div class="modal-header" style="border:1px solid #dfdfdf">
                <h5 class="modal-title" id="exampleModalLabel">Update Class</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('color.update')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="front_section_id" class="form-label">Section Name</label>

                            <input type="text" class="form-control front_section_id" name="front_section_id" id="" disabled>
                            {{-- <select name="front_section_id" id="front_section_id" class="form-control" disabled>
                                <option value="">select</option>
                                @foreach($color as $fs)
                                <option value="{{$fs->id}}">{{$fs->frontsection->name ?? ''}}</option>
                                @endforeach
                            </select> --}}
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="color" class="col-form-label">Color:</label>
                        <input type="text" class="form-control color" name="color" id="" >
                        <input type="text" class="form-control color_id" name="color_id" id="" hidden >
                    </div>
                    <div class="form-group">
                        <label for="background_color" class="col-form-label">Background color:</label>
                        <input type="text" class="form-control" name="background_color" id="background_color">
                    </div>
                    <div class="modal-footer" style="border-top: none;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
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

    $('#color-tab').addClass('active');

    

    function editClass(id){
        $.ajax({
            url     : '/webadmin/color/edit/'+id,
            type    : 'Get',
            success : function(data){
                // console.log(data);
                $(".front_section_id").val(data.frontsection.name);
                $(".color").val(data.color);
                $("#background_color").val(data.background_color);
                $(".color_id").val(data.id);
                $("#classeditmodal").modal('show');
                
            }
        });
    }
</script>
    
</script>
@endpush
