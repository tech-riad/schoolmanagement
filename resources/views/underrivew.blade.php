<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

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
    <div class="main">
      <div class="container">
        <div class="expire-wrapper">
          <div class="icon-wrapper">
            <i class="fa-solid fa-circle-minus"></i>
          </div>
          <h2 class="expire-title">YOUR APPLICATION IS UNDER REVIEW</h2>
            @if(Session::has('message'))
            <p class="expire-pera">{!! Session::get('message') !!}</p>
            @endif
            <p  class="expire-pera"> Please be with us, we will get back soon<br/>
                        (Please Contact with Administrator)</p>
         <!-- <div class="check-main">
            <div class="check-wrapper">
                <i class="fa-solid fa-check"></i>
                <span class="span">Apps for every device</span>
              </div>
              <div class="check-wrapper">
                <i class="fa-solid fa-check"></i>
                <span class="span">Rafer friends, get 30 days free</span>
              </div>
              <div class="check-wrapper">
                <i class="fa-solid fa-check"></i>
                <span class="span">145+ location worldwide</span>
              </div>
              <div class="check-wrapper">
                <i class="fa-solid fa-check"></i>
                <span class="span">24/7 customer support</span>
              </div>
         </div> -->

         
        </div>
      </div>
    </div>
  </body>
</html>
