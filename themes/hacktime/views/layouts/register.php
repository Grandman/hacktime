<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Hacktime</title>
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/angular.min.js"></script>
    <script type="text/javascript">
        window.onload = function(){
            (function(){
                var date = new Date();
                if (date.getMinutes() < 10)
                    var time = date.getHours()+':'+"0" +date.getMinutes();
                else
                    var time = date.getHours()+':'+date.getMinutes();
                document.getElementById('time').innerHTML = time;
                window.setTimeout(arguments.callee, 1000);
            })();

            (function(){
                var date = new Date();
                document.getElementById('day').innerHTML = date.toLocaleDateString();
                window.setTimeout(arguments.callee, 1000);
            })();
        };

    </script>
</head>
<body>
<div class="row">
    <div class="col-md-5 logo">
        <a href="/"><img src="<?php echo Yii::app()->theme->baseUrl;?>/img/logo.png"></a>
    </div>
    <div class="col-md-2 text-center">
        <div id="line"></div>
        <div id="time"></div>
        <div id="day"></div>
    </div>
</div>
<div class="container-fluid reg-content">
    <div class="row">
    <div class="col-md-offset-4 col-md-4 reg-form">
        <h1 class="text-center">Добро пожаловать в систему</h1>
        <br>
        <form role="form">
            <div class="input-group form-group reg-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                <input type="text" class="form-control" placeholder="Логин">
            </div>

            <div class="input-group form-group reg-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                <input type="text" class="form-control" placeholder="Пароль">
            </div>
            <div class="form-group text-center reg-btn"> <button type="submit" class="btn btn-success">Войти</button></div>

        </form>
        <h1 class="text-center">Если у вас нет аккаунта</h1>
        <br>
        <p class="text-center">
            <a href="index.php?/user/register" type="submit" class="btn btn-success reg-link">Зарегистироваться</a>
        </p>
        <div class="text-center reg-image">
            <img src="<?php echo Yii::app()->theme->BaseUrl; ?>/img/logo-pic.png">
        </div>
    </div>

</div>

    </div>
<div class="row footer">
    <div class="col-md-2">
        <div class="copyright">
            HackTime
        </div>
    </div>
</div>
</body>
</html>