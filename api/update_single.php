<?php include_once "../base.php";

$table=$_POST['table'];
$db=ucfirst($table);

// 以傳送過來的資料、代入資料表名，取得第1列的資料
$row=$$db->find(1);
// 再將資料表名塞入第1列資料中
$row[$table]=$_POST[$table];
// 將$row陣列的資料存入資料庫中
$$db->save($row);
to("../backend.php?do=".$table);