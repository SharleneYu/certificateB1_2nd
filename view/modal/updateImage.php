<h3 class="cent">更新動畫圖片</h3>
<form action="./api/chgImg.php" method="post" enctype="multipart/form-data">
    <table >
        <tr>
            <td>動畫圖片：</td>
            <td><input type="file" name="img"></td>
        </tr>
        
    </table>
    <div>
        <input type="hidden" name="table" value='image'>
        <input type="hidden" name="id" value='<?=$_GET['id'];?>'>
        <input type="submit" value="更新動畫">
        <input type="reset" value="重置">
    </div>
</form>