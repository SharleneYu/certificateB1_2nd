<h3 class='cent'>新增最新消息資料</h3>

<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <table >
        <tr>
            <td>最新消息資料</td>
            <td>
                <textarea name="text" style="width:300px; height:150px;"></textarea>
            </td>
        </tr>

    </table>
    <div>
        <input type="hidden" name="table" value='news'>
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>