<form id="form_updateProd" class="container" action="#" enctype="multipart/form-data" method="POST">

    <?php foreach ($dataProdUpdate as $product) {
        extract($product) ?>

        <div class="form-group">
            <label for="exampleInputEmail1">Tên sản phẩm</label>
            <input type="text" value="<?php echo $name ?>" name="prod_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
        </div>
        <h3 class="text-danger text-lg"> <?php echo isset($errUpdate['name']) ? $errUpdate['name'] : ''; ?>
        </h3>

        <div class="form-group">
            <label class="border btn btn-success" for="img"> Thay đổi hình ảnh</label>
            <td><img width="100px" src="../../uploads/<?php echo $image ?>" alt=""></td>
            <input hidden name="prod_img" type="file" id="img">
        </div>
        <h3 class="text-danger text-lg"> <?php echo isset($errUpdate['img']) ? $errUpdate['img'] : ''; ?></h3>
        <br>

        <div class="form-group">
            <label for="exampleInputPassword1">Giá</label>
            <input value="<?php echo $price ?>" name="prod_price" type="text" class="form-control" id="exampleInputPassword1">
        </div>
        <h3 class="text-danger text-lg"> <?php echo isset($errUpdate['price']) ? $errUpdate['price'] : ''; ?></h3>
        </h3>
        <br>

        <div class="form-group">
            <label for="exampleInputPassword1">Giảm giá</label>
            <input value="<?php echo $deal ?>" name="prod_deal" type="number" min="0" max="100" step="5" value="0" class="form-control" id="exampleInputPassword1">


        </div>
        <br>

        <div class="form-group">
            <label for="exampleInputPassword1">Danh mục</label><br>
            <select name="prod_category" id="select" class="form-select" aria-label="Default select example">

                <?php selectCategory($category) ?>

                <?php foreach ($dataNameCate as $nameCate) { ?>
                    <option value="<?php echo $category ?>"><?php echo $nameCate['name'] ?></option>

                    <?php selectDifferentCategory($nameCate['name']) ?>

                    <?php foreach ($dataDifferentCategory as $differentCate) { ?>
                        <option value="<?php echo $differentCate['id'] ?>"><?php echo $differentCate['name'] ?></option>
                    <?php } ?>

                <?php } ?>

            </select>
        </div>
        <h3 class="text-danger text-lg"> <?php echo isset($errUpdate['category']) ? $errUpdate['category'] : ''; ?></h3>
        <br>


        <div class="form-group">
            <label for="exampleInputPassword1">Mô tả</label>
            <textarea class="form-control" name="prod_desc" id="" cols="30" rows="10"><?php echo $description ?></textarea>
        </div>
        <br>


        <div class="form-group">
            <label for="exampleInputPassword1">Số lượng</label> <br>
            <input value="<?php echo $amount ?>" type="text" name="prod_amount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
        <h3 class="text-danger text-lg"> <?php echo isset($errUpdate['amount']) ? $errUpdate['amount'] : ''; ?></h3>
        </div>
        <br>

        <div class="form-group">
            <label for="exampleInputEmail1">Tag sản phẩm ( tìm kiếm )</label>
            <input value="<?php echo $tag ?>" type="text" name="prod_tag" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
        </div>
        <br>


        <br> <button type="submit" name="updateProd" class="btn btn-primary">Update sản phẩm</button>

    <?php } ?>
</form>