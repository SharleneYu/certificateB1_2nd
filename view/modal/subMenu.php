<!-- 先從伺服器端取得資料，供前端讓AJAX運用 -->
<?php 
include_once "../../base.php";

// 再撈次選單 ('main_id'=>$_GET['id'])
$subs=$Menu->all(['main_id'=>$_GET['id']]);
?>

<h3 class='cent'>編輯次選單管理</h3>

<hr>

<form action="./api/subMenu.php" method="post" enctype="multipart/form-data">

    <table style="width:70%;margin:auto" id="submenu">
    <table  style="width:70%; margin:auto" id="addRow">
        <tr >
            <td>次選單名稱：</td>
            <td>選單連結網址</td>
            <td>刪除</td>
        </tr>
        <?php 
             foreach($subs as $sub){ 
        ?>

        <tr >
            <td><input type="text" name="text[<?=$sub['id'];?>]" value="<?=$sub['text'];?>"></td>
            <td><input type="text" name="href[<?=$sub['id'];?>]" value="<?=$sub['href'];?>"></td>
            <td><input type="checkbox" name="del[<?=$sub['id'];?>]" value="<?=$sub['id'];?>"></td>
        </tr>

        <?php 
            }
        ?>


    </table>
    <div class='cent'>
        <input type="hidden" name="table" value='menu'>
        <input type="hidden" name="main_id" value="<?=$_GET['id'];?>">
        <input type="submit" value="修改確定">
        <input type="reset" value="重置">
        <input type="button" value="更多次選單" onclick="more()">
    </div>
</form>

<script>
    function more(){
        let addRow=`
        <tr >
            <td><input type="text" name="text2[]" ></td>
            <td><input type="text" name="href2[]" ></td>
        
        </tr>`
        $("#addRow").append(addRow);
    }
</script>