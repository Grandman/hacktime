<?php
/* @var $this ProjectsController */
/* @var $model Tasks */
/* @var $form CActiveForm */
    $form = $this->beginWidget('CActiveForm', array(
    'id'=>'addform',
    'enableAjaxValidation'=>true,
    'action'=>Yii::app()->createUrl('tasks/fast'),
));
?>

        <div class="add">
        <?php echo $form->textField($model, "name",array('id'=>'searchbar')); ?>
        <?php echo $form->error($model,'name'); ?>
        <?php echo $form->textField($model, "description",array('value'=>'Быстрая задача','hidden' => 'hidden')); ?>
        <?php echo $form->textField($model,'projects_id',array('hidden'=>'hidden')); ?>
        <?php echo $form->textField($model,'priority',array('value'=>'0','hidden'=>'hidden')); ?>
        <?php echo $form->textField($model,'owner_id',array('value'=>'0','hidden'=>'hidden')); ?>

    <?php
    echo CHtml::submitButton('ok',array(
        'ajax'=>array(
            'type'=>'POST',
            'url'=>Yii::app()->createUrl('tasks/fast'),
            'success'=>'function(data) {$("#task_list").html(data)}',
        )
    ));?>
            <?php $this->endWidget(); ?>
</div>


<div id="task_list">
<?php $this->renderPartial('_fast_list',array('tasks'=>$tasks)); ?>
</div>
<script src="<?php echo Yii::app()->theme->baseUrl?>/js/drag_drop.js"></script>