<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <h3 class="text-danger">Top 10 sản phẩm bán chạy nhất</h3>

        <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 100,

                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    }
                }
            })
        });
        </script>
        <div class="owl-carousel owl-theme mt-5">

            <?php if (empty($showproducts)) {}?>
            <?php
foreach ($showproducts as $product) {?>
            <div class="item">
                <a style="text-decoration:none" href="index.php?act=aboutproducts&id=<?php echo $product['id'] ?>">
                    <img width="25" src="./admin/uploads/<?php echo $product['image'] ?>">
                    <p style="text-align:center; ">
                        <?php echo $product['name'] ?>

                    </p>


                </a>

            </div>


            <?php
}
?>


        </div>
        <h3 class="text-danger">Danh sách sản phẩm</h3>

        <div class="row mt-5">
            <?php if (empty($showproducts)) {}?>
            <?php

foreach ($showproducts as $products) {
    // $upimg = "uploads/" . $products['image'];

    $giamgia = $products['price'] - ($products['price'] / 100 * $products['deal']);
    ?>
            <div class="col-lg-4 col-sm-6 mb-4">


                <!-- Portfolio item 1-->
                <div class="portfolio-item">
                    <a class="portfolio-link" href="index.php?act=aboutproducts&id=<?php echo $products['id'] ?>">


                        <img class="img-fluid bg-white " src="./admin/uploads/<?php echo $products['image'] ?>" alt=""
                            style="width: 450px; text-align:center" />
                    </a>
                    <div class="portfolio-caption">

                        <a class="text-decoration-none"
                            href="index.php?act=aboutproducts&id=<?php echo $products['id'] ?>">
                            <div class="portfolio-caption-heading"><?php echo $products['name'] ?>
                            </div>
                        </a>
                        <div class="portfolio-caption-subheading text-muted">
                            <span class="fs-3 text-danger"><?php echo $giamgia . '$' ?>
                                <span style="background-color: pink; font-size:15px; padding: 2px ; margin-left: 15px "
                                    class="  rounded">
                                    <?php echo '-' . $products['deal'] . '%' ?>
                                </span>
                            </span>
                        </div>



                    </div>
                </div>
            </div>
            <?php
}
?>



        </div>
    </div>


    <div id="paging" class="d-flex justify-content-center mt-5">
        <?php for ($i = 1; $i <= $countPage; $i++) {
    echo "<a class='mx-3 fs-1' href='index.php?page=$i'>$i</a>";

}?>


    </div>

</section>