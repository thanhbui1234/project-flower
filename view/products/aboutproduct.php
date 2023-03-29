<?php $id=$_GET['id']; ?>

<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">

        <?php if (empty($showaboutproducts))
        ?>
        <?php $giamgia = $showaboutproducts['price'] - ($showaboutproducts['price'] / 100 * $showaboutproducts['deal']) ?>
        <form action="/project-flower/cart/cart.php" method="POST">

            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img width="500" src="./admin/uploads/<?php echo $showaboutproducts['image'] ?> ">
                </div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder"><?php echo $showaboutproducts['name']; ?></h1>
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
                                    <input name="amount" class="form-control text-center " id="inputQuantity" type="text" step="none" min='1' value="1" style="max-width: 4rem" />
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
        <h2 class="fw-bolder mb-4">Bình luận</h2> <br>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"> </div>

        <div class="abcxyz">

            <div class="content">
                <?php if (empty($showcmt)) ?>
                <?php foreach ($showcmt as $cmt) { ?>
                    <div class="comment-text">
                        <div class="cmt">
                            <div class="comments" style="  display: flex; margin-top: 48px">

                                <div class="image" style="margin-right: 24px;">
                                    <?php echo empty($cmt['image']) ? "<img class='imgprofile'  src='/../project-flower/layout/assets/img/avtDefault.jpg' alt=''><br>" : "<img  class='imgprofile'  src='/../project-flower/admin/uploads/$cmt[image]' alt=''><br>"; ?>
                                </div>
                                <div class="text-content-cmt" style="margin-top: 24px;">

                                    <h6><?php echo $cmt['name'] ?></h6>
                                    <p>(ID: <?php echo $cmt['userName'] ?>)</p>

                                    <p class="nam">Nội dung: <?php echo $cmt['content'] ?></p>
                                    <p><span><svg style="width: 20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
                                            </svg></span> <?php echo $cmt['date'] ?> </p> <br>
                                </div>
                            </div>
                        </div>

                        <div class="cmt2">

                        </div>
                    </div>

                <?php
                } ?>
            </div>
        </div>

    </div>


</section>

<form style="text-align:center" action="binhluan.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="" id="">
    <input type="text" name="noidung">
    <input type="submit" name="submit">
</form>


</head>

<body>

    

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