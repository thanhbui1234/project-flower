<?php $id = $_GET['id']?>
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">

        <?php if (empty($showaboutproducts)) {;
}
?>
        <?php $giamgia = $showaboutproducts['price'] - ($showaboutproducts['price'] / 100 * $showaboutproducts['deal'])?>
        <form action="/project-flower/cart/cart.php" method="POST">
            .<input hidden type="text" name="idProduct" value="<?php echo $id;?>">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img width="500" src="./admin/uploads/<?php echo $showaboutproducts['image'] ?> ">
                </div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder"><?php echo $showaboutproducts['name'] ?></h1>
                    <div class="fs-5 mb">
                        <span style="margin-right: 4px;"><?php echo "Giá:" . "$giamgia" . "$" ?></span>
                        <span><del><?php echo $showaboutproducts['price'] ?>$</del>
                    </div>
                    <div class="fs-5 mb-5">
                        <span style="color: red"><?php echo "Khuyến mãi:" . $showaboutproducts['deal'] . "%" ?></span>
                        <span>
                    </div>
                    <p class="lead"><?php echo $showaboutproducts['description'] ?></p>

                    <div class="d-flex">
                        <input type="text" name="name" value="<?php echo $showaboutproducts['name'] ?>" hidden>
                        <input type="text" name="image"
                            value="/project-flower/admin/uploads/<?php echo $showaboutproducts['image'] ?>" hidden>
                        <input type="text" name="price" value="<?php echo $showaboutproducts['price'] ?>" hidden>
                        <input type="text" name="deal" value="<?php echo $showaboutproducts['deal'] ?>" hidden>
                        <div class="">
                            <div class="d-flex gap-lg-5 mb-lg-4">
                                <h3 class="">Số lượng</h3>
                                <div class="d-flex">
                                    <button id="subtract" class="btn border" type="button">-</button>
                                    <input name="amount" class="form-control text-center " id="inputQuantity"
                                        type="text" step="none" min='1' value="1" style="max-width: 4rem" />
                                    <button id="add" class="btn border " type="button">+</button>
                                </div>
                            </div>
                            <div id="alertBox" style="display:none;"
                                class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Không đủ hàng!</strong> Xin lỗi quý khách, hiện tại chỉ còn
                                <?php echo $showaboutproducts['amount'] ?> sản phẩm.
                            </div>
                            <input id="amountLeft" type="text" hidden
                                value="<?php echo $showaboutproducts['amount'] ?>">
                            <input id="button_add_cart1" type="submit" class="btn btn-outline-dark flex-shrink-0"
                                value="Thêm vào giỏ hàng" name="add_cart" onclick="return confirmAdd()">
                            <input id="button_add_cart2" type="submit" class="btn btn-outline-dark flex-shrink-0"
                                value="Mua ngay" name="add_cart">
                        </div>
                    </div>


                </div>
        </form>
    </div>
</section>
<!-- Related items section-->
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <div style=" border-radius: 5px;">

        </div>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"> </div>



    </div>


</section>

<section
    style="padding: 30px 0; background-color: #FFFFFF; box-shadow: 0 -1px 6px 1px rgba(0, 0, 0, 0.1);background-color: #FFFFFF;"
    class="content-item" id="comments">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <?php
if (!empty($_SESSION['userId'])) {

    ?>
                <form style="margin-bottom: 30px;" action="" method="post" enctype="multipart/form-data">
                    <h3 style=" font-weight: 400; font-size: 20px; color: #555555; margin: 10px 0 15px; padding: 0;">Nội
                        dung bình luận</h3>
                    <textarea style="height: 150px;" name="noidung" cols="105" rows="10" required></textarea>
                    <input type="hidden" name="" id="">
                    <div>
                        <div>
                            <div class="form-group">
                                <label class="btn btn-outline-dark flex-shrink-0" for="img"
                                    style="padding: 14px 20px;border-radius: 8px;margin-top: 7px;"> Thêm hình
                                    ảnh</label>
                                <!-- <td><img width="100" src="../../uploads//<?php echo $image ?>" alt=""></td> -->
                                <input class="brg" hidden name="prod_img" type="file" id="img">

                                <label class="btn btn-outline-dark flex-shrink-0" for="submit"
                                    style="padding: 14px 20px;border-radius: 8px;margin-top: 7px;"> Gửi bình
                                    luận</label>
                                <input class="brg" hidden name="submit" type="submit" id="submit">
                            </div>
                        </div>


                        <div>
                            <?php

} else {?>
                            <div>
                                <h3>Bạn cần <a href="http://localhost/project-flower/login/login.php">đăng nhập</a> để
                                    bình luận</h3>
                            </div>

                            <?php

}
?>

                            <!-- COMMENT 1 - START -->
                            <?php

foreach ($showcmt as $cmt) {
    if ($cmt['status'] == 2) {?>
                            <div style=" border-top: 2px dashed #DDDDDD;padding: 20px 0;margin-top: 48px; width: 300px"
                                class="media">
                                <div class="border-top: 2px dashed #DDDDDD;">
                                    <a style="" class="pull-left" href="#"><img
                                            style="margin-right: 24px;max-width: 50px;height:50px;border-radius: 30px;"
                                            class="media-object"
                                            src="/../project-flower/admin/uploads/<?php echo $cmt['image'] ?>"
                                            alt=""></a>
                                    <h4 style="" class="media-heading"><?php echo $cmt['name'] ?></h4>
                                    <p style="font-size: 10px;">(ID: <?php echo $cmt['userName'] ?>)</p>
                                    <p style="font-size: 20px;"><?php echo $cmt['content'] ?></p>
                                    <p style="font-size: 12px;"><span><svg style="width: 20"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
                                            </svg></span> <?php echo $cmt['date'] ?> </p> <br>

                                    <img style="width:300px; margin-bottom:48px" class="media-object"
                                        src="/../project-flower/admin/uploads/<?php echo $cmt['img'] ?>" alt="">

                                </div>
                                <?php

    }
    ?>


                                <?php

}
?>




                            </div>
                        </div>
                    </div>
</section>

<script>
var subtract = document.querySelector('#subtract')
var add = document.querySelector('#add')
var inputQuantity = document.querySelector('#inputQuantity');
var button_add_cart1 = document.querySelector('#button_add_cart1');
var button_add_cart2 = document.querySelector('#button_add_cart2');
var amount = document.querySelector('#amountLeft');
var alertBox = document.querySelector('#alertBox');
function confirmAdd(){
if(isNaN(inputQuantity.value)||inputQuantity.value<=0) {
    if(confirm('Vui lòng nhập số lượng đúng!')===true)
    return false;
    else return false;
}else return true;
}
add.addEventListener('click', (e) => {
    inputQuantity.value++;
    if (Number(inputQuantity.value) > Number(amount.value)) {
        alertBox.style.display = "block";
        button_add_cart1.disabled = true;
        button_add_cart2.disabled = true;
    }
})
subtract.addEventListener('click', (e) => {
    inputQuantity.value--;
    if (inputQuantity.value <= 0) {
        inputQuantity.value = 1;
    }
    if (Number(inputQuantity.value) <= Number(amount.value)) {
        alertBox.style.display = "none";
        button_add_cart1.disabled = false;
        button_add_cart2.disabled = false;
    }
})
</script>