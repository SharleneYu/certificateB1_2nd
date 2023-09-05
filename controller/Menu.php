<?php

include_once "DB.php";

class Menu extends DB{

    function __construct(){
        parent::__construct('menu');
    }

    function backend(){
        $view=[
            'header'=>'選單管理',
            'table'=>$this->table,
            'rows'=>$this->all(),
            'addBtn'=>'新增主選單',
            'modal'=>"./view/modal/menu.php"          
        ];
        return $this->view('./view/backend/menu.php', $view);
    }


}

