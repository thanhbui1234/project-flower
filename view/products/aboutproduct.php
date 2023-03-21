<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <?php if(empty($showaboutproducts)) ?>
        <?php $giamgia = $showaboutproducts['price'] - ($showaboutproducts['price'] / 100 * $showaboutproducts['deal']) ?>


        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img width="500" src="./admin/uploads/<?php echo $showaboutproducts['image'] ?> ">
            </div>
            <div class="col-md-6">

                <h1 class="display-5 fw-bolder"><?php echo $showaboutproducts['name'] ?></h1>
                <div class="fs-5 mb">
                    <span style="margin-right: 4px;"><?php echo "Giá:" . "$giamgia" ."$" ?></span>
                    <span><del><?php echo $showaboutproducts['price'] ?></del>
                </div>
                <div class="fs-5 mb-5">
                    <span style="color: red"><?php echo "Khuyến mãi:". $showaboutproducts['deal']."%" ?></span> <span>
                </div>

                <p class="lead"><?php echo $showaboutproducts['description'] ?></p>
                <div class="d-flex">
                    <input class="form-control text-center me-3" id="inputQuantity" type="number" value="1"
                        style="max-width: 4rem" />
                    <button class="btn btn-outline-dark flex-shrink-0" type="button">
                        <i class="bi-cart-fill me-1"></i>
                        Mua ngay
                    </button>
                    <button style="margin-left: 8px;" class="btn btn-outline-dark flex-shrink-0" type="button">
                        <i class="bi-cart-fill me-1"></i>
                        Thêm vào giỏ hàng
                    </button>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- Related items section-->
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Danh sách sản phẩm</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
            foreach ($showproduct as $products) {
                $giamgia=$products['price']-($products['price']/100*$products['deal']);
            ?>
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Sale badge-->
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale
                    </div>
                    <!-- Product image-->
                    <a style="text-decoration:none"
                        href="index.php?act=aboutproducts&id=<?php echo $products['id']?>"><img width="250px"
                            src="./admin/uploads/<?php echo $products['image'] ?>">

                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"><?php echo $products['name'] ?></h5>
                    </a>
                    <p><del><?php echo $products['price'] ?> </del></p>
                    <p><?php echo $giamgia . "$"?> </p>
                    <p style="color: red;"><?php echo "Khuyến mãi:". $products['deal']."%" ?> </p>
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