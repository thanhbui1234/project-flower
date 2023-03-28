<?php
if (isset($_GET['successUpdate'])) {
    echo "<script>Swal.fire(
  'Cap nhat thanh cong',
  '',
  'success'
)</script>";
}

?>



<div class="row mx-5 ">

    <div class="col">
        <form method="post" id="form-addCategories" class="" action="#">

            <div class="form-group">
                <label for="exampleInputEmail1"></label>
                <input type="text" class="form-control" name="category" placeholder="Category...">

            </div>

            <input class="btn btn-primary" value="Thêm Loại" name="addCategory" type="submit">


        </form>

        <?php if (isset($_GET['update'])) {?>
        <?php showDataUpdate()?>



        <form method="post" class="mt-5" action="#">


            <div class="form-group">
                <label for="exampleInputEmail1"></label>
                <?php foreach ($dataUpdateCate as $updateCate) {?>
                <input type="text" value="<?php echo $updateCate['name'] ?>" class="form-control" name="category2"
                    aria-describedby="emailHelp" placeholder="">
                <?php }?>

            </div>
            <?php updateCate()?>


            <div class="d-flex justify-content-between">
                <button type="submit" name="updateCategory" id="add_category" class="btn btn-primary">Chỉnh
                    sửa</button>


                <a href="index.php?act=categories" name="cancelUpdate" id="add_category"
                    class="btn btn-primary btn-danger">Hủy
                </a>


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


                <?php foreach ($dataCategories as $categories) {
    extract($categories)?>

                <tr>
                    <td> <?php echo $id ?></td>
                    <td><?php echo $name ?></td>
                    <td><a class="btn btn-success" href="index.php?act=categories&update=<?php echo $id ?>">UPDATE</a>
                        <a class="delete_categories" data-id="<?php echo $id ?>"><button
                                class="btn btn-danger">DELETE</button></a>
                    </td>

                </tr>

                <?php }?>
            </tbody>

        </table>
    </div>
</div>
<script>
const formUpdateCate = document.querySelector('#formUpdateCate');
formUpdateCate.addEventListener('submit', (e) => {
    var category2 = document.querySelector('input[name="category2"]');
    if (category2.value == '') {
        e.preventDefault();
    }



})
</script>
<script src="layout/js/categories.js"></script>