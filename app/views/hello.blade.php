<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>Mango</title>
    <link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <style>
        @import url(//fonts.googleapis.com/css?family=Lato:700);

        html,body {
            font-family:'Lato', sans-serif;
            text-align:center;
            color: #999;
        }

        .welcome {
            width: 100%;
            height: 250px;
            background-color: rgb(39, 174, 96);
            color: #fff;
            padding-top: 18px;
        }
        .welcome h1{
            font-size: 60px;
            margin-top: 20px;
            padding-bottom: 20px;
        }

        a,a:hover, a:visited {
            text-decoration:none;
        }

        .introduce . h2 ,.introduce h3 {
            margin-top: 40px;
        }

        h1 {
            font-size: 32px;
            margin: 16px 0 0 0;
        }
        .icon{
            font-size: 10em;
        }
        .footer{
            position: fixed;
            bottom: 0;
            width: 100%;
            padding: 14px 0;
            background-color: #000;
        }
        .footer a{
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="welcome">
        <h1>Mango</h1>
        <h3>为健忘症患者而生</h3>
        <h3>为不想带手机患者而生</h3>
    </div>
    <div class="introduce">
        <h2>
            核心定位
        </h2>
        <h3>
            利用云、智能手机的优势，解决忘记带手机的问题
        </h3>
        <div>
            <a href="http://github.com/mangofire/mango" title="view on github">
                <span class="icon ion-social-github"></span>
            </a>
        </div>
    </div>
    <div class="footer">
            <a href="/api/">API</a>
    </div>

    <script type="text/javascript">
    function Switch(){
        $(".icon").animate({'font-size': "12em"}, 600);
        $(".icon").animate({'font-size': "10em"}, 600);
    }
    $(document).ready(function(){
        var Id;
        $(".icon").hover(function(e){
            Switch();
            Id = setInterval('Switch()',1200);
        },
        function(e){
            clearInterval(Id);
        });
    });
    </script>
</body>
</html>
