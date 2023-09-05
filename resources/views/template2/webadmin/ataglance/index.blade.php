@extends($adminTemplate.'.admin.layouts.app')

@section('content')
      <div class="page-body" id="marks-id">
        <div id="glance-id">
 @include($adminTemplate.'.webadmin.webadminnav')
        <div>
            <div class="card new-table">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">At A Glance</h4>

                            </div>
                           
                        </div>

                        <div class="">
                            <table id="customTable" class="table table-striped table-bordered  table-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Content</th>
                                        <th width='10%' class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($ataglance as $key => $at)
                                <tr>
                                    
                                      <td>{!! Str::limit($at->content, 300) !!}</td>
                                      <td>
                                        <a href="{{route('ataglance.edit', $at->id)}}" class="btn btn-primary p-2"><i style="margin-left: 0.3125rem;" class="fa-solid fa-pen-to-square"></i></a>
                                        

                                        <a href="{{route('ataglance.destory', $at->id)}}" class="btn btn-sm btn-danger p-2 deleteBtn"><i style="margin-left: 0.3125rem;" class="fa-solid fa-trash"></i></a>
                                        

                                        

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

    $('.at_a_glance').addClass('active');
    $(".home").addClass('active');
</script>
@endpush
