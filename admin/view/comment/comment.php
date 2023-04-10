<div class="mx-4">

    <table class="table shadow p-3 mb-5 bg-body rounded table-condensed table-bordered  ">
        <thead class="headTable">
            <tr>

                <th>ID</th>
                <th>User bình luận</th>
                <th>Tên sản phẩm</th>
                <th>Nội dung</th>
                <th>Ngày bình luận</th>
                <th>Trạng thái</th>
                <th>Action</th>
            </tr>

        </thead>
        <tbody>

            <?php if (empty($showcmt)) {?>
            <tr>
                <td class=" text-xl-center text-warning" colspan="10">Chưa có bình luận</td>
            </tr>
            <?php }?>


            <?php
$stt = 0;
foreach ($showcmt as $cmt) {
    $stt++;
    ?>

<tr>

<td><?php echo $cmt['id'] ?></td>
<td><?php echo $cmt['userName'] ?></td>
<td><?php echo $cmt['name'] ?></td>
<td><?php echo $cmt['content'] ?></td>
<td><?php echo $cmt['date'] ?></td>
<td><?php if ($cmt['status'] == "2") {
echo '<div style="color: green">đã duyệt</div> ';
} else {

echo '<div style="color: red">chưa duyệt</div> ';
}?></td>
<td>
    <a class="pull-left" href="#"><img style="width:100px; margin-bottom:48px" class="media-object"
            src="/../project-flower/admin/uploads/<?php echo $cmt['img'] ?>" alt=""></a>
</td>







<td class="action_prod">

    <a class="btn btn-success" href="index.php?act=updatecmt&id=<?php echo $cmt['id'] ?>">Duyệt</a>
    <button class=" btn-delete btn btn-danger" data-id='<?php echo $cmt['id'] ?>'>Xoá</button>
</td>
</tr>



            <?php }?>


        </tbody>

    </table>
    </form>

</div>

<script src="layout/js/comment.js"></script>