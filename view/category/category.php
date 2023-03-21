<section class="page-section bg-light" id="portfolio">
    <div class="container">



        <h3 class="text-danger">Danh mục</h3>

        <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,

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
        </div>


        <div class="row mt-5">
            <?php if (empty($loadcategory)) {
    ;
}
?>
            <?php
foreach ($loadcategory as $category) {
    $category['id'];
    $giamgia = $category['price'] - ($category['price'] / 100 * $category['deal']);
    ?>
            <div class="col-lg-4 col-sm-6 mb-4">

                <!-- Portfolio item 1-->
                <div class="portfolio-item">
                    <a class="portfolio-link" href="index.php?act=aboutproducts&id=<?php echo $category['id'] ?>">

                        <img class="img-fluid bg-white " src="/../project-flower/layout/assets/img/productDemo/a1.png"
                            alt="" />
                    </a>
                    <div class="portfolio-caption">

                        <a class="text-decoration-none" href="#">
                            <div class="portfolio-caption-heading"><?php echo $category['name'] ?>
                            </div>
                        </a>
                        <div class="portfolio-caption-subheading text-muted">
                            <del><?php echo $category['price'] . "$" ?></del>
                        </div>
                        <div class="portfolio-caption-subheading text-muted">
                            <?php echo $giamgia . "$"

    ?>

                        </div>
                        <div class="portfolio-caption-subheading text-muted">
                            <p style="color: red;"><?php echo "Khuyến mãi:" . $category['deal'] . "%" ?></p>

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
        <a class="mx-3 fs-1" href="index.php?page=1">1</a>
        <a class="mx-3 fs-1" href="index.php?page=1">2</a>
        <a class="mx-3 fs-1" href="index.php?page=1">3</a>

    </div>

</section>