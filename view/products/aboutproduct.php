<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <?php $giamgia = $spct['price'] - ($spct['price'] / 100 * $spct['deal']) ?>


        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img width="500" src="/../project-flower/layout/assets/img/productDemo/a2.png" alt=""></div>
            <div class="col-md-6">

                <h1 class="display-5 fw-bolder"><?php echo $spct['name'] ?></h1>
                <div class="fs-5 mb">
                    <span style="margin-right: 4px;"><?php echo "Giá:" . "$giamgia" ."$" ?></span> <span><del><?php echo $spct['price'] ?></del>
                </div>
                <div class="fs-5 mb-5">
                    <span style="color: red"><?php echo "Khuyến mãi:". $spct['deal']."%" ?></span> <span>
                </div>

                <p class="lead"><?php echo $spct['description'] ?></p>
                <div class="d-flex">
                    <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                    <button class="btn btn-outline-dark flex-shrink-0" type="button">
                        <i class="bi-cart-fill me-1"></i>
                        Mua ngay
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
            foreach ($showhome as $show) {
                $giamgia=$show['price']-($show['price']/100*$show['deal']);
            ?>
<div class="col mb-5">
                <div class="card h-100">
                    <!-- Sale badge-->
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                    <!-- Product image-->
                    <a href="#"><img width="230" src="/../project-flower/layout/assets/img/productDemo/a2.png" alt=""></a>
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder"><?php echo $show['name'] ?></h5>
                            <!-- Product reviews-->
                            <div class="d-flex justify-content-center small text-warning mb-2">
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>
                            <!-- Product price-->

                            <p><del><?php echo $show['price'] ?> </del></p>
                            <p><?php echo $giamgia . "$"?> </p>
                            <p style="color: red;"><?php echo "Khuyến mãi:". $show['deal']."%" ?> </p>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Mua ngay</a></div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>

        </div>
    </div>
</section>