<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">

        <?php if(empty($showaboutproducts)) ?>
        <?php $giamgia = $showaboutproducts['price'] - ($showaboutproducts['price'] / 100 * $showaboutproducts['deal']) ?>
    <form action="/project-flower/cart/cart.php" method="POST" >

        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img width="500" src="./admin/uploads/<?php echo $showaboutproducts['image'] ?> ">
            </div>
            <div class="col-md-6">
                <h1 class="display-5 fw-bolder"><?php echo $showaboutproducts['name'] ?></h1>
                <div class="fs-5 mb">
                    <span style="margin-right: 4px;"><?php echo "Giá:" . "$giamgia" . "$" ?></span>
                    <span><del><?php echo $showaboutproducts['price'] ?></del>
                </div>
                <div class="fs-5 mb-5">
                    <span style="color: red"><?php echo "Khuyến mãi:" . $showaboutproducts['deal'] . "%" ?></span>
                    <span>
                </div>
                <p class="lead"><?php echo $showaboutproducts['description'] ?></p>

                <div class="d-flex">
                    <input type="text" name="name" value="<?php echo $showaboutproducts['name'] ?>" hidden>
                    <input type="text" name="image" value="/../project-flower/layout/assets/img/productDemo/a2.png" hidden>
                    <input type="text" name="price" value="<?php echo $showaboutproducts['price'] ?>" hidden>
                    <input type="text" name="deal" value="<?php echo $showaboutproducts['deal'] ?>" hidden>
                    <div class="">
                    <div class="d-flex gap-lg-5 mb-lg-4">
                        <h3 class="">Số lượng</h3>
                        <div class="d-flex">
                            <button id="subtract" class="btn border">-</button>
                            <input name="amount" class="form-control text-center " id="inputQuantity" type="text" step="none" min='1'
                                value="1" style="max-width: 4rem" />
                            <button id="add" class="btn border ">+</button>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-outline-dark flex-shrink-0" value="Thêm vào giỏ hàng" name="add_cart">
                </div>
            </div>
        </div>
    </form>
    </div>
</section>
<!-- Related items section-->
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Danh sách sản phẩm</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
foreach ($showproduct as $products) {
    $giamgia = $products['price'] - ($products['price'] / 100 * $products['deal']);
    ?>
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Sale badge-->
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale
                    </div>
                    <!-- Product image-->
                    <a style="text-decoration:none"
                        href="index.php?act=aboutproducts&id=<?php echo $products['id'] ?>"><img width="250px"
                            src="./admin/uploads/<?php echo $products['image'] ?>">

                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"><?php echo $products['name'] ?></h5>
                    </a>
                    <p><del><?php echo $products['price'] ?> </del></p>
                    <p><?php echo $giamgia . "$" ?> </p>
                    <p style="color: red;"><?php echo "Khuyến mãi:" . $products['deal'] . "%" ?> </p>
                </div>
            </div>

        </div>
    </div>
    <?php
}
?>

    </div>
    </div>
</section>

<script>
var subtract = document.querySelector('#subtract')
var add = document.querySelector('#add')
var inputQuantity = document.querySelector('#inputQuantity');

add.addEventListener('click', (e) => {
    inputQuantity.value++;

})

subtract.addEventListener('click', (e) => {
    inputQuantity.value--;
    if (inputQuantity.value <= 0) {
        inputQuantity.value = 1;
    }

})
</script>