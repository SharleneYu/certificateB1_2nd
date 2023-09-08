<?php include_once "../base.php";

$table=$_POST['table'];
$db=ucfirst($table);

$data=[];

// 如果有img需要處理，把傳送過來的圖片資料存到$data['img]中、再存到upload的資料夾中
if(!empty($_FILES['img']['tmp_name'])){
    $data['img']=$_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'], "../upload/".$data['img']);
}

switch($table){
    case 'title':
        $data['text']=$_POST['text'];
        $data['sh']=0;
        break;
    case 'admin':
        $data['acc']=$_POST['acc'];
        $data['pw']=$_POST['pw'];
        break;
    case 'menu':
        // 這裡存的是主目錄，所以main_id不設定，資料庫會自動給0
        $data['text']=$_POST['text'];
        $data['href']=$_POST['href'];
        $data['sh']=1;
        break;
    
    default:
        // 其他的資料表有：
        if(isset($_POST['text'])){
            $data['text']=$_POST['text'];
        }
        $data['sh']=1;
}

// 利用可變變數，將ucfirst($table)。如$table=title就會變成$Title
$$db->save($data);
// 回到後台功能頁
to("../backend.php?do=".$table);


