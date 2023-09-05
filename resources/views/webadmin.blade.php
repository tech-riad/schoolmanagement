@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div  class="main-panel">

        @include($adminTemplate.'.webadmin.webadminnav')
        <div>
            <div class="card new-table">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Sessions List</h4>
                            <p class="card-description"> Session wise assigned Classes </p>
                        </div>
                        <button type="button" class="btn btn-primary mr-2" style="width: 125px;height: 34px;"
                            data-toggle="modal" data-target="#exampleModal">Add
                            Session
                        </button>
                    </div>
                    <div class="content-wrapper text-primary">
                        <table id="customTable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th> Session </th>
                                    <th> Assign Classes </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>





    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $('#customTable').DataTable();
        });
    </script>

    <script>
        function editsession(id){
            $.ajax({
                url         : '/academic/session/edit/'+id,
                type        : 'GET',
                success     : function(data){
                    console.log(data);
                    $("#session_id").val(data.id);
                    $("#titles").val(data.title);
                    $("#updateModal").modal('show');
                }
            });
        }
    </script>

    <script>
        function deleteBtn(){
            let text = "Are you sure?\nYou want to delete this data?.";
            if (confirm(text) == true) {
              $("#deleteForm").submit();
            }
        }
    </script>
@endsection
