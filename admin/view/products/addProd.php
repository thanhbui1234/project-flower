<form class="container" action="#" enctype="multipart/form-data" method="POST" onsubmit="return check()">
    <div class="form-group">
        <label for="exampleInputEmail1">Tên sản phẩm</label>
        <input type="text" name="prod_name" id="productName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
    </div>

    <div class="form-group">
        <label class="border btn btn-success" for="img"> Thêm hình ảnh</label>
        <input hidden name="prod_img" type="file" id="img">
    </div>
    <br>
    <div class="form-group">
        <label for="exampleInputPassword1">Giá</label>
        <input name="prod_price" id="productPrice" type="text" class="form-control" id="exampleInputPassword1">
    </div>
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
    <br>


    <div class="form-group">
        <label for="exampleInputPassword1">Mô tả</label>
        <textarea class="form-control" name="prod_desc" id="" cols="30" rows="10"></textarea>
    </div>
    <br>


    <div class="form-group">
        <label for="exampleInputPassword1">Số lượng</label> <br>
        <input type="text" name="prod_amount" id="productAmount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
    </div>
    <br>

    <div class="form-group">
        <label for="exampleInputEmail1">Tag sản phẩm ( tìm kiếm )</label>
        <input type="text" name="prod_tag" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
    </div>
    <br>




    <br> <input type="submit" name="addProd" value="Thêm sản phẩm" class="btn btn-primary">
</form>
<script type="text/javascript">
    var cate = document.getElementById("productCate");
    console.log(cate.value);
    function check(){
        var name = document.getElementById("productName");
        var price = document.getElementById("productPrice");
        var amount = document.getElementById("productAmount");
        var cate = document.getElementById("select");
        if(!isNaN(name.value)||name.value.length==0){
            alert('Tên sản phẩm không hợp lệ!');
            return false;
        }
        else if(isNaN(price.value)||price.value<=0){
            alert('Giá sản phẩm không hợp lệ!');
            return false;
        }
        else if(cate.value=="default"){
            alert('Loại sản phẩm không hợp lệ!');
            return false;
        }
        else if(isNaN(amount.value)||amount.value<=0){
            alert('Số lượng sản phẩm không hợp lệ!');
            return false;
        }
        else return true;
    }
</script>