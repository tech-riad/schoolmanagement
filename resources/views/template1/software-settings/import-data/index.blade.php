@extends($adminTemplate.'.admin.layouts.app')
@push('css')
    <style>
        tr { height: 40px;padding-top: 0px;padding-bottom: 0px; }
    </style>
@endpush
@section('content')
    <div class="main-panel" id="message-id">
        @include($adminTemplate.'.software-settings.software-settings-nav')
        <div>
            <div class="card new-table">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Import Data</h4>
                            </div>
                        </div>

                        <div class="mt-3">
                            <table class="table">
                                <tbody>
                                    @foreach($response as $item)
                                    <tr>
                                        @foreach($item as $data)
                                            <td>{{$data['name']}}</td>
                                            <td>
                                            @if($data['count'] == 0)
                                                <p style="color: red">{{$data['count']}}</p>
                                            @else
                                                <p style="color: blue">{{$data['count']}}</p>
                                            @endif
                                            </td>
                                            <td>
                                            @if($data['count'] == 0)
                                                <form action="{{route('data-seed')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="name" value="{{$data['name']}}">
                                                    <input type="hidden" name="asc_model" value="{{$data['asc_model']}}">
                                                    <button class="btn btn-info" type="submit"><i class="fa fa-arrow-up"></i></button>
                                                </form>
                                            @endif
                                            </td>
                                        @endforeach
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
@endsection
@push('js')
    <script>
        $(document).ready(function () {
            $('#customTable').DataTable();
        });
        $(".deleteBtn").click(function () {
            $(".deleteForm").submit();
        });

        $('#home').removeClass('show').removeClass('active');
        $('#setting').addClass('show').addClass('active');


    </script>
@endpush
