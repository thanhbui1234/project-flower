<!-- click hủy xóa form update -->
<?php if (isset($_POST['cancelUpdate'])) {
    header('location: /project-flower/admin/index.php?act=categories');
}?>

<div class="row mx-5 ">

    <div class="col">
        <form method="post" id="form-addCategories" class="" action="#">

            <div class="form-group">
                <label for="exampleInputEmail1"></label>
                <input type="text" class="form-control" name="category" placeholder="">


            </div>

            <input class="btn btn-primary" value="Thêm Loại" name="addCategory" type="submit">


        </form>

        <?php if (isset($_GET['update'])) {?>
        <form method="post" class="mt-5" action="#">

            <div class="form-group">
                <label for="exampleInputEmail1"></label>
                <input type="text" value="n uoc hoa" class="form-control" name="category22" aria-describedby="emailHelp"
                    placeholder="">


            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" name="updateCategory" id="add_category" class="btn btn-primary">Chỉnh
                    sửa</button>

                <button type="submit" name="cancelUpdate" id="add_category" class="btn btn-primary btn-danger">Hủy
                </button>

            </div>


        </form>

        <?php }?>

    </div>


    <?php showCategories()?>
    <div class="col">
        <table class="table table-bordered  mt-3">
            <thead>
                <tr>
                    <th id="id">ID</th>
                    <th>Loại sản phẩm</th>
                    <th>Chức năng</th>


                </tr>
            </thead>
            <tbody>


                <?php foreach ($dataCategories as $categories) {extract($categories)?>

                <tr>
                    <td> <?php echo $id ?></td>
                    <td><?php echo $name ?></td>
                    <td><a class="btn btn-success" href="index.php?act=categories&&update=1">UPDATE</a>
                        <a class="delete_categories" data-id="<?php echo $id ?>"><button
                                class="btn btn-danger">DELETE</button></a>
                    </td>

                </tr>

                <?php }?>
            </tbody>

        </table>
    </div>
</div>

<script src="layout/js/categories.js"></script>