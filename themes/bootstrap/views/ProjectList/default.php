<div id='sidebar-left'>
    <div id='buttons'>
        <img src='<?php echo Yii::app()->theme->baseUrl; ?>/img/add.png' style='margin-right: 20px;'>
        <img src='<?php echo Yii::app()->theme->baseUrl; ?>/img/index-icon.png' style='margin-right: 10px;'>
        <img src='<?php echo Yii::app()->theme->baseUrl; ?>/img/stickers.png' style='margin-right: 10px;'>
        <a href="<?php echo Yii::app()->createUrl("tasks/fast") ?>"><img src='<?php echo Yii::app()->theme->baseUrl; ?>/img/reminder.png' style='margin-right: 10px;'></a>
    </div>
    <div id='projects' style="width: 262px">
        <div id='title-project' >
            Проекты <a class="btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><img src='<?php echo Yii::app()->theme->baseUrl; ?>/img/arrow.png' ></a></div>
        <div class="nav-collapse collapse in">
        <ul class="">
        <?php echo $list; ?>
        </ul>
            <a href="#"><span class='glyphicon glyphicon-plus'></span>Добавить проект</a>
        </div>
    </div>
</div>

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/project_list.js"></script>
