<!-- <?php if (isset($_GET['message'])) {
            echo "<script>
    Swal.fire(
        'Good job!',
        'Cập nhật thành công',
        'success'
      )
    </script>";
        } ?> -->
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
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Gía</th>
                    <th>Giảm giá</th>
                    <th>Danh mục</th>
                    <th>Ngày nhập</th>
                    <th>Mô tả</th>
                    <th>Trạng thái</th>
                    <th>Lượt xem</th>
                    <th>Action</th>
                </tr>

            </thead>
            <tbody>

                <?php if (empty($dataProducts)) { ?>
                <tr>
                    <td class=" text-xl-center text-warning" colspan="10">EMPTY</td>
                </tr>
                <?php } ?>


                <?php foreach ($dataProducts as $product) {
                    extract($product) ?>

                <tr>
                    <td><input class="selectAllBoxesChild" name="checkBoxArr[]" value="<?php echo $id ?>"
                            type="checkbox"></td>
                    <td><?php echo $id ?></td>
                    <td><?php echo $name ?></td>
                    <td><img width="50" src="/../project-flower/admin/uploads/<?php echo $image ?>" alt=""></td>
                    <td><?php echo $price ?>$</td>
                    <td><?php echo $deal ?>%</td>
                    <?php selectNameCategory($category)?>
                    <?php foreach($dataNameCategory as $NameCategory) { ?>
                    <td><?php echo $NameCategory['name']?></td>
                    <?php }?>
                    <td><?php echo $date ?></td>
                    <td><?php echo substr($description, 0, 50) ?>...</td>
                    <td>
                        <?php
                                if($amount > 0) {
                                    echo 'Còn hàng';
                                } else {
                                    echo 'Hết hàng';
                                }
                            ?>
                    </td>
                    <td><?php echo $view ?></td>
                    <td class="action_prod">
                        <a class="btn btn-success" href="index.php?act=update_prod&&id=<?php echo $id ?>">UPDATE</a>
                        <a class="deleteProd" data-id="<?php echo $id ?>">
                            <button class="btn btn-danger">Xóa</button>
                        </a>
                    </td>
                </tr>

                <?php } ?>


            </tbody>

        </table>
    </form>

</div>

<script src="layout/js/products.js"></script>
<script src="layout/js/checkbox.js"></script>