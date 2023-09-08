<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">管理者帳號管理</p>
    <form method="post" action="./api/update.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td  width="45%">帳號</td>
                    <td  width="45%">密碼</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>
                <?php
                foreach($rows as $row){
                ?>
                <tr>
                    <td width="45%">
                        <input type="text" name="acc[<?=$row['id'];?>]" value="<?=$row['acc'];?>" style="width:95%">
                    </td>
                    <td width="45%">
                    <input type="text" name="pw[<?=$row['id'];?>]" value="<?=str_repeat("*",strlen($row['pw']));?>" style="width:95%">                    </td>
                    <td>
                        <input type="checkbox" name="del[<?=$row['id'];?>]" value="<?=$row['id'];?>">
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>


        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <input type="hidden" name="table" value='<?=$table?>'>
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','<?=$modal;?>')" value="<?=$addBtn;?>"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>