@extends($adminTemplate.'.admin.layouts.app')
@push('css')

@endpush
@section('content')
    <div class="main-panel">
       @include($adminTemplate.'.software-settings.software-settings-nav')
        <div class="card new-table">
            <div class="card-header">
                <h6>System Theme</h6>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        @foreach($templates as $template)
                            <div class="col-md-3">
                                <div class="card">
                                    <img class="card-img-top" style="height:200px;" src="{{asset($template->thumbnail)}}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title" style="color: #0a0a0a">{{$template->name}}</h5>
                                        <a href="javascript:void(0)" class="btn btn-primary mt-3 save-btn" {{@$ins_template->template_id == $template->id ? 'hidden' : ''}} onclick="updateTheme({{$template->id}})"><i class="fa fa-save"></i>Save Theme</a>
                                        <h4 class="bg-primary text-white mt-3 p-2 text-center {{@$ins_template->template_id == $template->id ? 'd-block' : 'd-none'}} selectedmsg-{{$template->id}}" style="border-radius:5px;">Selected</h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function updateTheme(id){
           // console.log(id);
           var selectedMsg = $(".selectedmsg-"+id+"");
            $.ajax({
                url     : '/software-settings/system-theme/themeUpdate/'+id,
                type    : 'GET',
                success : function(data){
                    console.log(data);
                    toastr.success('Website Template Updated :)');
                    selectedMsg.removeClass('d-none');
                    selectedMsg.closest('div').find('.save-btn').hide();
                }  
            });
        }
    </script>
@endpush