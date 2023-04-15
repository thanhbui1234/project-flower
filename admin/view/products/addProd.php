<form class="container" action="#" enctype="multipart/form-data" method="POST">
    <div class="form-group">
        <label for="exampleInputEmail1">Tên sản phẩm</label>
        <input type="text" name="prod_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
    </div>
    <h3 class="text-danger text-lg"> <?php echo isset($errProduct['name']) ? $errProduct['name'] : ''; ?>
    </h3>

    <div class="form-group">
        <label class="border btn btn-success" for="img"> Thêm hình ảnh</label>
        <!-- <td><img width="100" src="../../uploads//<?php echo $image ?>" alt=""></td> -->
        <input hidden name="prod_img" type="file" id="img">
    </div>
    <h3 class="text-danger text-lg"> <?php echo isset($errProduct['img']) ? $errProduct['img'] : ''; ?></h3>
    <br>

    <div class="form-group">
        <label for="exampleInputPassword1">Giá</label>
        <input name="prod_price" type="text" class="form-control" id="exampleInputPassword1">
    </div>
    <h3 class="text-danger text-lg"> <?php echo isset($errProduct['price']) ? $errProduct['price'] : ''; ?></h3>
    <h3 class="text-danger text-lg"> <?php echo isset($errProduct['prod_price_num']) ? $errProduct['prod_price_num'] : ''; ?>
    </h3>
    <br>

    <div class="form-group">
        <label for="exampleInputPassword1">Giảm giá</label>
        <input name="prod_deal" type="number" min="0" max="100" step="5" value="0" class="form-control" id="exampleInputPassword1">


    </div>
    <br>

    <div class="form-group">
        <select name="prod_category" id="select" class="form-select" aria-label="Default select example">
            <option value="default" selected>Loại sản phẩm</option>

            <?php foreach ($dataCategories as $category) {
                extract($category) ?>
                <option value="<?php echo $id ?>"><?php echo $name ?></option>
            <?php } ?>


        </select>
    </div>
    <h3 class="text-danger text-lg"> <?php echo isset($errProduct['category']) ? $errProduct['category'] : ''; ?></h3>
    <br>


    <div class="form-group">
        <label for="exampleInputPassword1">Mô tả</label>
        <textarea class="form-control" name="prod_desc" id="" cols="30" rows="10"></textarea>
    </div>
    <br>


    <div class="form-group">
        <label for="exampleInputPassword1">Số lượng</label> <br>
        <input type="text" name="prod_amount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
        <h3 class="text-danger text-lg"> <?php echo isset($errProduct['amount']) ? $errProduct['amount'] : ''; ?></h3>
    </div>
    <br>

    <div class="form-group">
        <label for="exampleInputEmail1">Tag sản phẩm ( tìm kiếm )</label>
        <input type="text" name="prod_tag" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
    </div>
    <br>




    <br> <button type="submit" name="addProd" class="btn btn-primary">Thêm sản phẩm</button>
</form>