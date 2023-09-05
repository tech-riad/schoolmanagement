@extends($adminTemplate.'.admin.layouts.app')

@section('content')

<div class="page-body" id="all">
    @include($adminTemplate.'.webadmin.webadminnav')
    <div class="card new-table">
        <div class="card-header">
            <div class="wrapper-page-title">
                <div class="page-btn">
                    <a class="btn btn-info" href="{{route('page.edit' ,$page->id)}}">Edit</a>
                </div>
                <div class="page-title-ele">
                    <h4><b>{!! $page->title !!}</b></h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            <section class="AtAGlance section_gaps">

                <div class="AtAGlanceContent">
                    {!! $page->content !!}
                </div>


            </section>
        </div>
        


    </div>

</div>

@endsection


@push('js')
<script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);

        });



    $('#tablist li a, .nav-item  a').removeClass('active')
    $('#myTabContent nav').removeClass('show').removeClass('active')

    @if($page -> id == 1)
    $('#about-tab, .abouthistory').addClass('active');
    $("#about").addClass('active').addClass('show');
    @elseif($page -> id == 2)
    $('#about-tab, .aboutwhystudy').addClass('active');
    $("#about").addClass('active').addClass('show');
    @elseif($page -> id == 3)
    $('#about-tab, .aboutinfrastructure').addClass('active');
    $("#about").addClass('active').addClass('show');
    @elseif($page -> id == 4)
    $('#about-tab, .aboutachievement').addClass('active');
    $("#about").addClass('active').addClass('show');
    @elseif($page -> id == 5)
    $('#cocur-tab, .sports').addClass('active');
    $("#cocur").addClass('active').addClass('show');
    @elseif($page -> id == 6)
    $('#cocur-tab, .tours').addClass('active');
    $("#cocur").addClass('active').addClass('show');
    @elseif($page -> id == 7)
    $('#cocur-tab, .scouts').addClass('active');
    $("#cocur").addClass('active').addClass('show');
    @endif

</script>

@endpush
