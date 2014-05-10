<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Bootstrap 101 Template</title>
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/angular.min.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row" >
        <div class="col-md-3"><?php $this->widget('application.extensions.ProjectList.ProjectList'); ?></div>
        <div class="col-md-6">
            <?php echo $content; ?></div>
        <div class="col-md-3">Завершено</div>
    </div>
</div>



<script type="text/javascript">
    window.onload = function(){
        (function(){
            var date = new Date();
            hours =  date.getHours();
            if (date.getMinutes() < 10)
                var time = date.getHours()+':'+"0" +date.getMinutes();
            else
                var time = date.getHours()+':'+date.getMinutes();
            document.getElementById('time').innerHTML = time;
            window.setTimeout(arguments.callee, 1000);
        })();
        (function(){
            var date = new Date();
            if ((date.getUTCMonth() + 1 ) < 10)
                document.getElementById('day').innerHTML = date.getDate() + "/" + 0 +(date.getUTCMonth() + 1 ) + "/" + date.getFullYear();
            else
                document.getElementById('day').innerHTML = date.getDate() + "/" +(date.getUTCMonth() + 1 ) + "/" + date.getFullYear();
            window.setTimeout(arguments.callee, 1000);
        })();
        $(".project").hover(function() {
            $(this).stop().animate({ backgroundColor: "#000000"}, 400);
        },function() {
            $(this).stop().animate({ backgroundColor: "#ffffff" }, 400);
        });
    };
</script>
</body>
</html>