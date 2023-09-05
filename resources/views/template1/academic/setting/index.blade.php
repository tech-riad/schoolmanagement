@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="main-panel">
        @include($adminTemplate.'.academic.academicnav')
        <div class="card new-table">
            <div class="card-header">
                <h6>Setting</h6>
            </div>
            <div class="card-body">
                <table id="customTable" class="table table-bordered table-responsive" style="width:100%; padding:10px">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>School Name</th>
                            <th>Admit Content</th>
                            <th>Id Card Content</th>
                            <th>Transfer Certificate Content</th>
                            <th>Testimonial Content</th>
                            <th>QR Code</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($setting as $set)
                        <tr>
                            <td><img style="height: 65px;width: 65px; border-radius:50%;" src="{{asset('uploads/schoolInfo/'.$set->image)}}" alt=""></td>
                            <td>{{$set->school_name}}</td>
                            <td>{!! Str::limit($set->admit_content,20)!!}</td>
                            <td>{!! Str::limit($set->id_card_content,20)!!}</td>
                            <td>{!! Str::limit($set->transfer_certificate_content,20)!!}</td>
                            <td>{!! Str::limit($set->testimonial_content,20)!!}</td>
                            <td>{{$set->qrcode}}</td>
                            <td>
                                <a class="btn btn-success" href="{{route('academic.setting.edit',$set->id)}}">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
@endsection