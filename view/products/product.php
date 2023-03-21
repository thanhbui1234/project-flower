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

        <?php if(empty($showproduct)){}?>
            <?php 
            foreach ($showproduct as $products){ ?>
                <div class="item">
                <a style="text-decoration:none" href="index.php?act=aboutproducts&id=<?php echo $products['id']?>">
                    <img width="25" src="./admin/uploads/<?php echo $products['image'] ?>">
                    <p style="text-align:center; ">
                        <?php echo $products['name'] ?>

                    </p>


                </a>

            </div>


            <?php
            }      
            ?>
            

        </div>
        <h3 class="text-danger">Danh sách sản phẩm</h3>

        <div class="row mt-5">
            <?php if (empty($showproduct)) {}?>
            <?php

            foreach ($showproduct as $products) {
                // $upimg = "uploads/" . $products['image'];
                
                $giamgia=$products['price']-($products['price']/100*$products['deal']);
                ?>
                <div class="col-lg-4 col-sm-6 mb-4">
                    

                <!-- Portfolio item 1-->
                <div class="portfolio-item">
                    <a class="portfolio-link" href="index.php?act=aboutproducts&id=<?php echo $products['id'] ?>">


                        <img class="img-fluid bg-white " src="./admin/uploads/<?php echo $products['image'] ?>"  alt="" style="width: 450px; text-align:center" />
  </a>
                    <div class="portfolio-caption">

                        <a class="text-decoration-none" href="index.php?act=aboutproducts&id=<?php echo $products['id']?>">
                            <div class="portfolio-caption-heading"><?php echo $products['name'] ?>
                            </div>
                        </a>
                        <div class="portfolio-caption-subheading text-muted">
                            <del><?php echo $products['price'] . "$" ?></del>
                        </div>
                        <div class="portfolio-caption-subheading text-muted">
                            <?php echo $giamgia . "$"

    ?>

                        </div>
                        <div class="portfolio-caption-subheading text-muted">
                            <p style="color: red;"><?php echo "Khuyến mãi:" . $products['deal'] . "%" ?></p>

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