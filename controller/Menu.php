<?php

include_once "DB.php";

class Menu extends DB{

    function __construct(){
        parent::__construct('menu');
    }

    function backend(){
        // 先撈主選單main_id=0
        $rows=$this->all(['main_id'=>0]);
        // 再撈每個主選單的次選單數，存到$row['subs]、再塞到$rows
        foreach($rows as $idx=>$row){
            $row['subs']=$this->count(['main_id'=>$row['id']]);
            $rows[$idx]=$row;
        }

        $view=[
            'header'=>'選單管理',
            'table'=>$this->table,
            'rows'=>$rows,
            'addBtn'=>'新增主選單',
            'modal'=>"./view/modal/menu.php",   
            'updateModal'=>"./view/modal/subMenu.php",
            'updateBtn'=>"編輯次選單"     
            
        ];
        return $this->view('./view/backend/menu.php', $view);
    }

    // [??SYU??] 將資料塞進陣列的做法不懂。塞入的資料能不能少一層
    function show(){
        // 先取得主選單資料存在$rows
        $rows=$this->all(['main_id'=>0]);
        foreach($rows as $idx=>$row){
            // 再依每個主選單，找出其次選單，塞進陣列
            $row['subs']=$this->all(['main_id'=>$row['id']]);
            $rows[$idx]=$row;
        }
        return $rows;
    }

}

