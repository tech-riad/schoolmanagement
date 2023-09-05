@extends('frontent.theme1.layouts.web')

@section('content')
<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------  
    START Governing PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- ClassRoutine -->

<section class="Governing section_gaps">

    <div class="container">

        <div class="row">

            <div class="col-lg-12">

                <div class="ClassRoutine">

                    <h2 class="text-center">পরিচালনা পর্ষদ</h2>

                    <table class="table table-striped">

                        <thead>

                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Name</th>
                                <th scope="col">Designation</th>
                            </tr>

                        </thead>

                        <tbody>
                            @foreach ($committees as $key => $committee)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$committee->name ?? ''}}</td>
                                <td>{{$committee->designation->title ?? ''}}</td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------  
    START Footer PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->
@endsection
