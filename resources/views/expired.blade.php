<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Domain expire page</title>


    <style>
        *{
    margin:0;
    padding:0;
    box-sizing:border-box;
}
.main {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    background: #e5e5e5;

}

.expire-wrapper {
    display: flex;
    flex-direction: column;
    width: 420px;
    margin: auto;
}

.icon-wrapper i {
    font-size: 4rem;
    color: #bb2828;
}

.icon-wrapper {
    text-align: center;
}

h2.expire-title {
    text-align: center;
    font-size: 2rem;
    color: red;
    margin-top: 10px;
}

p.expire-pera {
    text-align: center;
    font-size: 18px;
    color: #404040;
    margin-top: 10px;
}
.check-main {
    margin-left: 6rem;
    display: flex;
    flex-direction: column;
    gap: 10px;
}
.check-wrapper {
    display: flex;
    align-items: center;
    gap: 10px;
}

.check-wrapper i {
    font-size: 18px;
    color: green;
}

span.span {
    font-size: 18px !important;
    color: #262626;
}

.down-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 2rem;
}

.down-icon i {
    font-size: 3rem;
}
.btn-wrapper-bottom {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 15px;
}

@media (max-width:480px) {
    .expire-wrapper{
        width: 100%;
        align-items: center;
    }
    .check-main{
        margin-left: 2rem;
    }

}
    </style>
  </head>
  <body>
    @php
        $maymentMethod = App\Helper\Helper::institutePaymentMethod();
    @endphp
    <div class="main">
      <div class="container">
        <div class="expire-wrapper">
          <div class="icon-wrapper">
            <i class="fa-solid fa-circle-minus"></i>
          </div>
          <h2 class="expire-title">YOUR PAYMENT DATE IS EXPIRED</h2>
            @if(Session::has('message'))
            <p class="expire-pera">{!! Session::get('message') !!}</p>
            @endif
            <p  class="expire-pera">Please pay as soon as possible to continue your website & application</p>

          <div class="down-icon" style="color: rgb(165, 20, 20);"><i class="fa-solid fa-down-long"></i></div>
          @if ($maymentMethod == 'online')
          <div class="btn-wrapper-bottom">
              <a href="#">
                  <form action="{{route('pay-with-shurjo')}}" method="POST">
                    @csrf
                    <button class="btn btn-danger px-4 py-2 bold" >Pay Now</button>
                </form>
            </a>
        </div>
        @else
            <h4 class="text-center mt-2">Please Contact With Admin</h4>
        @endif
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){

        });
    </script>
  </body>
</html>
