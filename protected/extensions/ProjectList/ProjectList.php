<?php

class ProjectList extends CWidget {
    private $k=0;
    private $start = false;
    public function run() {
        //TODO ограничения по id пользователей
        $projects = Projects::model()->findAll();

        $tree = array();
        foreach ($projects as $row) {
            if($row->parent_id==null) {$k=0;} else $k=$row->parent_id;
            $tree[(int) $k][] = $row;
        }
        $list=$this->treePrint($tree);

        $this->render('default', array('list'=>$list));

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
        //TODO вынести стили в отдельный файлик
        $manage="<div class='project-list-mng'>
        <span class='glyphicon glyphicon-pencil'></span>
        <span class='glyphicon glyphicon-remove'></span></div>";
        //<span class='glyphicon glyphicon-indent-left'></span></div>";

        $res="<li class='list-group-item'><a class='project' href= '".Yii::app()->createUrl("Projects/view",array('id'=>$row['id']))."'>";
        if($this->start==true){
            $lvl='';
            for($i=0;$i<$this->k;$i++) {
                $lvl.="-";
            }
            return $res.$lvl.$row['name']."</a>".$manage."</li>";}
        else {$this->start=true; return $res.$row['name']."</a>".$manage;}
    }
}