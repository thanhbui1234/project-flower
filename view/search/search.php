<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase"></h2>

        </div>


        <?php if (empty($dataSearch)) {?>
        <section>
            <h3 class="text-center text-danger">Không có thông tin về sản phẩm này</h3>
        </section>

        <?php } else {?>
        <div class="row">
            <?php foreach ($dataSearch as $search) {extract($search)?>

            <?Php $giamgia = $price - ($price / 100 * $deal);?>


            <div class="col-lg-4 col-sm-6 mb-4">
                <!-- Portfolio item 1-->


                <div class="portfolio-item">
                    <a class="portfolio-link" href="./index.php?act=aboutproducts&id=<?php echo $id ?>">

                        <img class="img-fluid bg-white" src="/../project-flower/admin/uploads/<?php echo $image ?>"
                            alt="<?php echo $name ?>" />
                    </a>
                    <div class="portfolio-caption">

                        <a class="text-decoration-none" href="./index.php?act=aboutproducts&id=<?php echo $id ?>">
                            <div class="portfolio-caption-heading"><?php echo $name ?>
                            </div>
                        </a>
                        <div class="portfolio-caption-subheading text-muted">
                            <span class="fs-3 text-danger"><?php echo $giamgia . '$' ?>
                                <span style="background-color: pink; font-size:15px; padding: 2px ; margin-left: 15px "
                                    class="  rounded">
                                    <?php echo '-' . $deal . '%' ?>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>

            </div>
            <?php }?>

        </div>
        <?php }?>
    </div>
    <div id="paging" class=" mt-5">


    </div>

</section>