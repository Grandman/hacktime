<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo CHtml::encode(Yii::app()->name); ?></title>
    <link rel="stylesheet" href="<? echo Yii::app()->theme->baseUrl; ?>/css/style.css">
    <script type="text/javascript" src="<? echo Yii::app()->theme->baseUrl; ?>/jquery-1.7.min.js"></script>
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
</head>
<body>
<div id="header">
    <div id="logo"></div>
    <div id="date">
        <div id="line"></div>
        <div id="time"></div>
        <div id="day"></div>
    </div>
    <div id="profile"></div>
</div>
<div id="container">
    <div id="separation"></div>
    <?php $this->widget('application.extensions.ProjectList.ProjectList'); ?>

    <?php echo $content; ?>
    <div id="sidebar-right">
        <div id="title-completed">Завершено</div>
        <div id="stolb">
            <div id="when">Сегодня</div>
            <div class="completed"><div class="tt">5:33</div><div clas="zz">&nbsp;&nbsp;&nbsp;<strike style="color: #ea7a5d;">Код для дерева</strike></div></div>
            <div class="completed"><div class="tt">5:15</div><div clas="zz">&nbsp;&nbsp;&nbsp;<strike style="color: #2ecc71;">Поспать</strike></div></div>
        </div>
    </div>
</div>
<div id="footer"></div>
</div>
</body>
</html>