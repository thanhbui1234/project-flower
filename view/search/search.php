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
            <div class="col-lg-4 col-sm-6 mb-4">
                <!-- Portfolio item 1-->

                <?php foreach ($dataSearch as $search) {extract($search)?>
                <div class="portfolio-item">
                    <a class="portfolio-link" href="./index.php?act=about_product&id=id">

                        <img class="img-fluid" src="/../project-flower/layout/assets/img/productDemo/a1.png" alt="" />
                    </a>
                    <div class="portfolio-caption">

                        <a class="text-decoration-none" href="./index.php?act=about_product&id=1">
                            <div class="portfolio-caption-heading">ten san pham
                            </div>
                        </a>
                        <div class="portfolio-caption-subheading text-muted">
                            111111 VND
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>

        </div>
        <?php }?>
    </div>
    <div id="paging" class=" mt-5">


    </div>

</section>