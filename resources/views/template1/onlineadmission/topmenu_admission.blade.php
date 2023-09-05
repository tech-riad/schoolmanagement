
<nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav navbar-nav-hover mr-auto">
                <li class="nav-item {{Request::is('online-admission/add-subject/index') ? 'active':''}}">
                    <a class="nav-link" href="{{ route('online-admission.add-subject.index') }}" id="nav-hov">
                        Add Subject
                    </a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('online-admission.add-subject.index') }}" id="nav-hov">
                        Exam Setting
                    </a>
                </li>
                <li class="nav-item {{Request::is('online-admission/marks-setup/index') ? 'active':''}}">
                    <a class="nav-link" href="{{ route('online-admission.marks-setup.index') }}" id="nav-hov">
                        Marks Setup
                    </a>
                </li>
                <li class="nav-item {{Request::is('online-admission/marks-input') ? 'active':''}}" >
                    <a class="nav-link" href="{{ route('online-admission.marks-input.index') }}" id="nav-hov">
                        Marks Input
                    </a>
                </li>
                
                <li class="nav-item menu {{Request::is('online-admission/admission-result') ? 'active':''}}" >
                    <a class="nav-link" href="{{ route('online-admission.admission-result.index') }}" id="nav-hov">
                        Results
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="tab-content p-0" id="myTabContent">
    <nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mt-2 mb-2 nested-menu shadow-sm rounded tab-pane fade show active" id="home">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav navbar-nav-hover ml-auto " id="tablist">

                    <li class="nav-item">
                        <a class="nav-link " href="" id="session">
                            Add Session
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link Class" href="" id="nav-hov">
                            Add Class
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link marks-setup" id="nav-hov">
                            Marks Setup
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link exam-setting" id="exam-setting">
                            Exam Setting
                        </a>
                    </li>

                    
                </ul>
            </div>
        </div>
    </nav>

    
</div>

@push('js')
<script>
    $(document).ready(function(){
        $('#myTabContent nav').removeClass('hide').removeClass('active')
    })


    $('#add-subject').click(function(){
       
        $('#myTabContent nav').show().removeClass('active')
       
    })



   
    
</script>
    
@endpush