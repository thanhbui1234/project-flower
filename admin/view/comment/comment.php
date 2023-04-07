 <?php if (isset($_GET['message'])) {
    echo "<script>
            Swal.fire(
                'Good job!',
                'Cập nhật thành công',
                'success'
              )
            </script>";
}?>
 <div class="mx-4">
     <form action="#" method="post" class="">



         <div class="d-flex flex-row gap-2  ">
             <select name="option" class="form-select form-select-sm form-control w-25 mb-4" id="selectAllprod"
                 aria-label="Default select example">
                 <option selected>Chức năng</option>
                 <!-- <option value="in_stock">Còn hàng</option>
                        <option value="out_of_stock">Hết hàng</option>
                        <option value="clone">Tạo bản sao</option> -->
                 <option value="delete">Xóa</option>

             </select>

             <button id="apply_prod" type="submit" name="apply" class="btn btn-google h-25 "> Apply </button>


         </div>
         <table class="table shadow p-3 mb-5 bg-body rounded table-condensed table-bordered  ">
             <thead class="headTable">
                 <tr>
                     <th><input id="selectAllBoxes" type="checkbox"></th>
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
                     <td><input class="selectAllBoxesChild" name="checkBoxArr[]" value="<?php echo $cmt['id'] ?>"
                             type="checkbox"></td>
                     <td><?php echo $cmt['id'] ?></td>
                     <td><?php echo $cmt['userName'] ?></td>
                     <td><?php echo $cmt['name'] ?></td>
                     <td><?php echo $cmt['content'] ?></td>
                     <a href="sss">
                         <td><?php echo $cmt['date'] ?></td>
                     </a>
                     <td style=""><?php echo $cmt['trangthai'] ?></td>





                     <td class="action_prod">
                         <a class="btn btn-success" href="index.php?act=updatecmt2&id=<?php echo $cmt['id'] ?>">OK</a>
                         <a class="btn btn-dark" href="index.php?act=updatecmt1&id=<?php echo $cmt['id'] ?>">Huỷ</a>
                         <a onclick="return confirm('Có chắc chắn muốn xoá không')" class="btn btn-danger"
                             href="index.php?act=delcmt&id=<?php echo $cmt['id'] ?>">Xoá</a>
                     </td>
                 </tr>

                 <?php }?>


             </tbody>

         </table>
     </form>

 </div>

 <script src="layout/js/comment.js"></script>