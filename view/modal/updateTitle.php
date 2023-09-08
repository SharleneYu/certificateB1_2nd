<h3 class="cent">更新標題區圖片</h3>
<form action="./api/chgImg.php" method="post" enctype="multipart/form-data">
    <table >
        <tr>
            <td>標題區圖片：</td>
            <td><input type="file" name="img"></td>
        </tr>
        
    </table>
    <div>
        <input type="hidden" name="table" value='title'>
        <input type="hidden" name="id" value='<?=$_GET['id'];?>'>
        <input type="submit" value="更新圖片">
        <input type="reset" value="重置">
    </div>
</form>