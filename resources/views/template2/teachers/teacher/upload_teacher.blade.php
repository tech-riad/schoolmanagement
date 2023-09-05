@extends($adminTemplate.'.admin.layouts.app')

@section('content')
<div class="page-body">
    @include($adminTemplate.'.teachers.teachernav')
     <div class="card new-table mb-3">
         <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('teacher.upload.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="">Upload Excel File</label>
                                <input class="form-control" type="file" name="files_excel" id="">
                                @error('files_excel')
                                    <span class="alert text-danger p-0" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Download Sample</label><br>
                            <a href="{{asset('teacher_sample.xlsx')}}" target="_new"
                            class="btn btn-primary">Download</a>
                        </div>
                    </div>
                </div>
            </div>
         </div>
     </div>
 </div>
@endsection

@section('javascript')
     <script>

$('input[type="checkbox"]').change(function(){
  var checked = $(this).is(':checked');
  var input = $(this).closest('tr').find('input[type="text"]');
  var select = $(this).closest('tr').find('select,input');
  input.prop('required', checked)
  select.prop('required', checked)
})
</script>
@stop

