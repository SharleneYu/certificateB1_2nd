<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">校園映像資料管理</p>
    <form method="post" action="./api/update.php">
        <table width=100% class="cent">
            <tbody>
                <tr class="yel">
                    <td width="50%">校園映像資料圖片</td>
                    <td width="15%">顯示</td>
                    <td width="15%">刪除</td>
                    <td></td>
                </tr>
                <?php
                foreach($rows as $row){
                ?>
                <tr>
                    <td>
                        <img src="./upload/<?=$row['img'];?>" style="width:100px; height:68px;" >    
                    </td>
                    <td>
                        <input type="checkbox" name="sh[<?=$row['id'];?>]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>>
                    </td>
                    <td>
                        <input type="checkbox" name="del[<?=$row['id'];?>]" value="<?=$row['id'];?>">
                    </td>
                    <input type="hidden" name="id[<?=$row['id'];?>]" value=[<?=$row['id'];?>]>
                    <td>
                        <input type="button" value="<?=$updateBtn;?>" onclick="op('#cover','#cvr','<?=$updateModal;?>?id=<?=$row['id'];?>')">
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