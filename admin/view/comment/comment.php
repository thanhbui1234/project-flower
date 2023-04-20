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
                <th>Hình ảnh</th>
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
                <td> <a href="/project-flower/index.php?act=aboutproducts&id=<?php echo $cmt['product'] ?>">
                        <?php echo $cmt['name'] ?></a></td>
                <td><?php echo $cmt['content'] ?></td>
                <td><?php echo $cmt['date'] ?></td>
                <td><?php if ($cmt['status'] == "2") {
        echo '<div style="color: green">đã duyệt</div> ';
    } else {

        echo '<div style="color: red">chưa duyệt</div> ';
    }?></td>
                <td>
                    <a class="pull-left" href="#"><img style="width: 50px;margin-left:40px; margin-bottom:48px"
                            class="media-object" src="/../project-flower/admin/uploads/<?php echo $cmt['img'] ?>"
                            alt=""></a>
                </td>

                <td class="action_prod">
                    <?php echo $cmt['status'] == 1
    ? "<a class='btn btn-success px-4 ' href='index.php?act=updatecmt&id=$cmt[id]'>Duyệt</a> "
    : '   <button disabled class="btn btn-dark   ">Đã duyệt</button>' ?>



                    <button class=" btn-delete btn btn-danger" data-id='<?php echo $cmt['id'] ?>'>Xoá</button>
                </td>
            </tr>



            <?php }?>


        </tbody>

    </table>
    </form>


</div>

<script>
const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'm-2 border border-white',
        cancelButton: 'm-2 btn btn-danger'
    },
    buttonsStyling: false
})

const btnAll = document.querySelectorAll('.btn-delete');

btnAll.forEach((btn) => {

    var idData = btn.getAttribute('data-id');

    btn.onclick = () => {
        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: "<a class='btn btn-success' href='index.php?act=comment&delete=" +
                idData + "'>Yes deleit</a>",
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        })

    }

})
</script>