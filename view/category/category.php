<section class="page-section bg-light" id="portfolio">
    <div class="container">








        <div class="row mt-5">
            <?php if (empty($loadcategory)) {
    echo "
   <section>
            <h3 class='text-center text-danger'>Không có thông tin về sản phẩm này</h3>
        </section>
    ";
} else {

    foreach ($loadcategory as $category) {
        $category['id'];
        $giamgia = $category['price'] - ($category['price'] / 100 * $category['deal']);
        ?>
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="portfolio-item">
                    <a class="portfolio-link" href="index.php?act=aboutproducts&id=<?php echo $category['id'] ?>">

                        <img class="img-fluid bg-white " src="./admin/uploads/<?php echo $category['image'] ?>" alt=""
                            style="width: 450px; text-align:center" />
                    </a>
                    <div class="portfolio-caption">

                        <a class="text-decoration-none" href="index.php?act=aboutproducts&id=<?php echo $category['id'] ?>">
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
}}?>





        </div>
    </div>




</section>