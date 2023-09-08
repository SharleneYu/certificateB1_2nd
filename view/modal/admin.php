<h3 class='cent'>管理者帳號管理</h3>

<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <table  style="margin:auto">
        <tr >
            <td>帳號：</td>
            <td><input type="text" name="acc" ></td>
        </tr>
        <tr >
            <td>密碼：</td>
            <td><input type="password" name="pw" ></td>
        </tr>
        <tr >
            <td>確認密碼：</td>
            <td><input type="password" name="pw2" ></td>
        </tr>
    </table>
    <div class='cent'>
        <input type="hidden" name="table" value='admin'>
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>