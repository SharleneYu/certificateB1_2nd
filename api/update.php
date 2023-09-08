<?php include_once "../base.php";
// 從title.php傳值過來的資料有：$_POST['text'][]、$_POST['sh']、$_POST['del'][]

$table=$_POST['table'];
$db=ucfirst($table);
$rows='';

switch($table){
    case 'admin':
        $rows=$_POST['acc'];
        break;

    case 'image':
    case 'mvim':
        $rows=$_POST['id'];
        break;

    default:
        $rows=$_POST['text'];
}

// 透過傳值過來的內容，判斷要刪除的[]、更改的sh或sh[]
foreach($rows as $id=>$row){
    // 判斷有沒有del[]、以及當筆資料id是否在$_POST['del']中，有則del、無則update
    if(isset($_POST['del']) && in_array($id, $_POST['del'])){
        $$db->del($id);
    }else{
        $data=$$db->find($id);

        switch($table){
            case "title":
                // tilte資料表只有1欄位透過傳值處理，所以$row裡只有text；show單選。
                $data['text']=$row;
                $data['sh']=($_POST['sh']==$id)?1:0;
            break;
            case "admin":
                $data['acc']=$row;
                $data['pw']=$_POST['pw'][$id];
            break;
            case "menu":
                $data['text']=$row;
                $data['href']=$_POST['href'][$id];
                $data['sh']=(isset($_POST['sh']) && in_array($id, $_POST['sh'])?1:0);
            break;
            default:
                // 若有text，是ad或menu；若無text，是mvim或image
                if(isset($_POST['text'])){
                    $data['text']=$row;
                }else{
                    $data['sh']=(isset($_POST['sh']) && in_array($id, $_POST['sh'])?1:0);
                }
        }
        $$db->save($data);
    }
}
to("../backend.php?do=".$table);