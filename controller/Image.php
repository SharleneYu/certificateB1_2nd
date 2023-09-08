<?php

include_once "DB.php";

class Image extends DB{

    function __construct(){
        parent::__construct('image');
    }

    function backend(){
        $view=[
            'header'=>'校園映像資料管理',
            'table'=>$this->table,
            'rows'=>$this->paginate(3),
            'links'=>$this->links(),
            'addBtn'=>'新增校映象圖片',
            'modal'=>"./view/modal/image.php",  
            'updateModal'=>"./view/modal/updateimage.php",
            'updateBtn'=>"更新圖片"      
        
        ];
        return $this->view('./view/backend/image.php', $view);
    }


}

