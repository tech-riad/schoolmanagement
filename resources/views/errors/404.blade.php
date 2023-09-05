<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Error page </title>


    <style>
        .main{
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #d1d1d1;
        }
        .error-wrapper{
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: auto;
            width: 500px;
           
        }
        .err-icon{
            font-size: 6rem;
        }
        .err-icon i{
            color: gray;
        }
        .err-title{
            font-size: 4rem;
    color: #4a4a4a;
        }
        h3.err-sub-title {
    font-size: 3rem;
    color: #4a4a4a;
}
        .err-pera{
            text-align: center;
    font-size: 18px;
    color: #383838;
        }
        @media (max-width:768px) {
            .error-wrapper{
                width: 100%;
                text-align: center;
            }
            .err-icon{
            font-size: 5rem;
        }
        .err-icon i{
            color: gray;
        }
        .err-title{
            font-size: 3rem;
    color: #4a4a4a;
        }
        h3.err-sub-title {
    font-size: 2rem;
    color: #4a4a4a;
}
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="container">
            <div class="error-wrapper">
            <div class="err-icon"><i class="fa-regular fa-face-frown-open"></i></div>
                <h2 class="err-title">404</h2>
                <h3 class="err-sub-title">Content not found</h3>
                <!-- <p class="err-pera">Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, est odio! Qui, inventore?</p> -->
                <a class="mt-2" href="/">
                    <button class="btn btn-primary px-4">Go to home</button>
                </a>
            </div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>