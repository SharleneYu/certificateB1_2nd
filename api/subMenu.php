<?php include_once "../base.php";
// 傳值過來的會有UPDATE用$_POST['text'] & $_POST['href']；或新增的$_POST['text2'] & $_POST['href2']

// update 或刪除 (資料庫原有資料)
if(isset($_POST['text'])){
    // 陣列中的key就設計為是資料id
    foreach($_POST['text'] as $id=>$text){
        if(isset($_POST['del']) && in_array($id, $_POST['del'])){
            $Menu->del($id);
        // 不是刪除就是update。先撈出資料，text & href
        }else{
            $row=$Menu->find($id);
            $row['text']=$text;
            $row['href']=$_POST['href']['id'];
            $Menu->save($row);
        }
    }
}

// add
if(isset($_POST['text2'])){
    foreach($_POST['text2'] as $idx=>$text){
        if($text!=''){
            $Menu->save([
                'text'=>$text,
                'href'=>$_POST['href2'][$idx],
                'sh'=>1,
                'main_id'=>$_POST['main_id']
            ]);
        }

    }
}

to("../backend.php?do=".$_POST['table']);
