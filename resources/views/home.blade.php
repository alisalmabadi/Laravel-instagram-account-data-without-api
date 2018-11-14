<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta id="token" name="token" content="{{csrf_token()}}">
        <title>Get Instagram Account Data without api</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 32px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .load{
                   display:    block;
            position:   absolute;
            z-index:    8888000;
            top:        0;
            left:       0;
            height:     100%;
            width:      100%;
            background:rgba(255, 255, 255, 0.55)  url(images/loading-pic.gif)
            50% 30%
            no-repeat;
            }
        </style>
    </head>
    <body>
        <div class="load" style="display:none;"> </div>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Enter your instagram Username
                </div>

                <div class="links">
                  <input type="text" class="form-control" id="username">
                  <br>
                  <button type="button" class="btn btn-success" id="getdata" >GET User Data</button>
                </div>
            </div>
        </div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.all.min.js"></script>
        <script type="text/javascript">
            $('#getdata').click(function(){
                var username= $('#username').val();
                if(username==''){
                    Swal('Oops...','type somthing! dont let it blank!','error');
                }else{
                    $('.load').show();
				$.post('{{route('senddata')}}',{_token: $('#token').attr('content') , username: username},function(data){
                    $('.load').hide();
                    Swal({ title:'followers: '+data[0]  +'<br>'+ 'followings: '+data[1]+'<br>'+ 'posts: '+data[2] + '<br>'+'<img src='+data[3]+' >',text:'username: '+username  });
                });
            }
            });
        </script>
      
    </body>
</html>
