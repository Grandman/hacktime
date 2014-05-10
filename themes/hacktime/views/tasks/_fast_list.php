<?php
echo <<<HTML
<style>
        [draggable] {
            -moz-user-select: none;
            -khtml-user-select: none;
            -webkit-user-select: none;
            user-select: none;
            /* Required to make elements draggable in old WebKit */
            -khtml-user-drag: element;
            -webkit-user-drag: element;
            cursor: move;
        }

        }
</style>
HTML;
?>
<?php
foreach ($tasks as $task)
{
    echo "<div class=\"remind\" id=\"remind_id{$task->id}\" x-lvl-draggable='true'>
				<img src=\"" . Yii::app()->theme->baseUrl . "/img/no.png\">
				<div class=\"inremind\"  >{$task->name}</div>
			</div>";

}
