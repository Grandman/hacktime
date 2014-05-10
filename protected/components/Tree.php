<?php

class Tree {
    private $k=0;
    private $start = false;
    private $data;

    public function __construct($data) {
        $this->data = $data;
    }
    public function Generate(){
        $tree = array();
        foreach ($this->data as $row) {
            if($row->parent_id==null) {$k=0;} else $k=$row->parent_id;
            $tree[(int) $k][] = $row;
        }
        return $this->treePrint($tree);
    }

    private function treePrint($tree, $parent_id=0) {
        if (empty($tree[$parent_id]))
            return "beda";
        $str = '';
        foreach ($tree[$parent_id] as $row) {
            $str .= $this->GenLvl($row);
            if (isset($tree[$row['id']])) {$this->k++;
                $str .= $this->treePrint($tree, $row['id']); $this->k--;}
        }
        return $str;
    }

    //Генерация уровня
    private function GenLvl($row) {
        $checked ="";

        if($row->completed == 1)
        {
            $checked = "checked";
        }
        $checkbox = CHtml::form().CHtml::checkBox(
                "close_task[{$row->id}]", $checked,array(
                    'uncheckValue'=>0,
                    'ajax'=>array(
                        'type'=>'POST',
                        'url'=>Yii::app()->createUrl('tasks/close'),
                        'success'=>"function(data) {var l=$('lal');
                        l.attr('checked', !l.is(':checked'));}",
                    ),
                    'return'=>true
                )
            ).CHtml::endForm();
        $checkbox2="<form id='addform' action='".Yii::app()->createUrl('tasks/close')."' method='post'>
        <input {$checked} type='checkbox' value='{$row->completed}' name='close_task[{$row['id']}'>
        </form>";

        //TODO вынести стили в отдельный файлик
        $manage="<div class='project-list-mng'>
        <span class='glyphicon glyphicon-pencil'></span>
        <span class='glyphicon glyphicon-remove'></span></div>";
        //<span class='glyphicon glyphicon-indent-left'></span></div>";

        $res="<li class='list-group-item'><a class='project' href= '".Yii::app()->createUrl("tasks/view",array('id'=>$row['id']))."'>";
        if($this->start==true){
            $lvl='';
            for($i=0;$i<$this->k;$i++) {
                $lvl.="-";
            }
            return $res.$lvl.$checkbox.$row['name']."</a>".$manage."</li>";}
        else {$this->start=true; return $res.$checkbox.$row['name']."</a>";}
    }
}