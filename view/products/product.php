

<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <h3 class="text-danger">Top 10 sản phẩm hot pro</h3>

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
            <!-- <div class="item">
                <a href="index.php?act=aboutproduct=" .$id>
                    <img width="25" src="/../project-flower/layout/assets/img/productDemo/a2.png" alt="">
                    <p style="text-align:center">
                        nuoc hoa
                    </p>


                </a>

            </div> -->
            
        </div>


        <div class="row mt-5">
            <?php if(empty($showproduct)){}?>
            <?php
            foreach ($showproduct as $products) {
                $upimg = "upload/" . $products['image'];
                $giamgia=$products['price']-($products['price']/100*$products['deal']);
                ?>
                <div class="col-lg-4 col-sm-6 mb-4">
                    
                <!-- Portfolio item 1-->
                <div class="portfolio-item">
                    <a class="portfolio-link" href="index.php?act=aboutproducts&id=<?php echo $products['id']?>" >

                        <img class="img-fluid bg-white " src="/../project-flower/layout/assets/img/productDemo/a1.png" alt="" />
                    </a>
                    <div class="portfolio-caption">

                        <a class="text-decoration-none" href="#">
                            <div class="portfolio-caption-heading"><?php echo $products['name'] ?>
                            </div>
                        </a>
                        <div class="portfolio-caption-subheading text-muted">
                        <del><?php echo $products['price'] ."$" ?></del>
                        </div>
                        <div class="portfolio-caption-subheading text-muted">
                        <?php echo $giamgia . "$"
                        
                        
                        
                        ?>
                        
                        </div>
                        <div class="portfolio-caption-subheading text-muted">
                        <p  style="color: red;" ><?php echo "Khuyến mãi:". $products['deal']."%" ?></p>
                        
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



<!-- Team-->
<section class="page-section bg-light" id="team">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
            <h3 class="section-subheading text-muted">
                Lorem ipsum dolor sit amet consectetur.
            </h3>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="/../project-flower/layout/assets/img/team/1.jpg" alt="..." />
                    <h4>Parveen Anand</h4>
                    <p class="text-muted">Lead Designer</p>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Twitter Profile"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="/../project-flower/layout/assets/img/team/2.jpg" alt="..." />
                    <h4>Diana Petersen</h4>
                    <p class="text-muted">Lead Marketer</p>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen Twitter Profile"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="/../project-flower/layout/assets/img/team/3.jpg" alt="..." />
                    <h4>Larry Parker</h4>
                    <p class="text-muted">Lead Developer</p>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Twitter Profile"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="/../project-flower/layout/assets/img/team/3.jpg" alt="..." />
                    <h4>Larry Parker</h4>
                    <p class="text-muted">Lead Developer</p>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Twitter Profile"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="/../project-flower/layout/assets/img/team/3.jpg" alt="..." />
                    <h4>Larry Parker</h4>
                    <p class="text-muted">Lead Developer</p>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Twitter Profile"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <p class="large text-muted">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut
                    eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam
                    corporis ea, alias ut unde.
                </p>
            </div>
        </div>
    </div>
</section>

