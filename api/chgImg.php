<?php include_once "../base.php";

$table=$_POST['table'];
$id=$_POST['id'];
$db=ucfirst($table);

$row=$$db->find($id);

// 是否有上傳成功(有tmp_name)：
if(!empty($_FILES['img']['tmp_name'])){
    $row['img']=$_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'], "../upload/".$_FILES['img']['tmp_name']);
}

$$db->save($row);
to("../backend.php?do=".$table);
