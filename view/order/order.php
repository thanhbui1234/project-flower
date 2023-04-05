<section class="container ">

    <!-- Tab items -->
    <div class="tabs">

        <div class="tab-item shadow active">
            <h3 class="">Chờ thanh toán
                <?php if (!empty($dataWaitAccpetOrder)) {echo '(' . count($dataWaitAccpetOrder) . ')';}?>

            </h3>
        </div>
        <div class="tab-item shadow">
            <h3 class="">Đang giao</h3>
        </div>
        <div class="tab-item shadow">
            <h3 class="">Hoàn thành</h3>
        </div>
        <div class="tab-item shadow">
            <h3 class="">Đã hủy</h3>
        </div>
        <div class="line"></div>
    </div>

    <!-- Tab content -->
    <div class="tab-content">

        <div id="bill-wailting" class="tab-pane active  ">
            <section class="shadow px-lg-4">
                <?php if (empty($dataWaitAccpetOrder)) {?>
                <div class="d-flex  justify-content-center">
                    <div class=" ">
                        <img width="230" src="/../project-flower/layout/assets/emptyBill.png" alt="">
                        <p class="m-5 ">Chưa có đơn hàng</p>

                    </div>

                </div>

                <?php } else {?>
                <?php foreach ($dataWaitAccpetOrder as $wailOrder) {extract($wailOrder)?>
                <div class="d-flex flex-column mb-lg-5 ">


                    <span class="d-flex gap-5  justify-content-end ">
                        <p class="text-danger fs-5">Chờ thanh toán</p>
                    </span>

                    <hr>

                    <?php selectAboutBill($id)?>
                    <?php foreach ($dataAboutBill as $bills) {extract($bills)?>
                    <div class="d-flex mb-5">
                        <span class="position-relative">
                            <img width="100" src="/../<?php echo $image ?>" alt="">
                            <p class=" position-absolute bottom-0 end-0">x<?php echo $amount ?></p>

                        </span>

                        <p><?php echo $productName ?></p>


                        </p>


                    </div>

                    <?php }?>
                    <hr>
                    <span class="d-flex gap-5  justify-content-end ">
                        <p class="mt-4">Số tiền phải trả :</p>
                        <p class="text-danger fs-1"><?php echo $total ?>$</p>
                    </span>

                    <span class="d-flex gap-5  justify-content-end  ">
                        <button style="background-color: #D8D8D8; width: 150px;" class="btn px-2 border"
                            disabled>Chờ</button>
                        <button data-id='<?php echo $id ?>' style="width:150px"
                            class="btn btn-danger  border btn-cancel  ">Hủy đơn
                            hàng</button>
                    </span>


                </div>


                <?php }}?>




            </section>
        </div>
        <div class="tab-pane">

            <section class="shadow px-lg-4">
                <p>React makes it painless to create interactive UIs. Design simple views for each state in your
                    application, and React will efficiently update and render just the right components when your data
                    changes.</p>
            </section>
        </div>
        <div class="tab-pane">

            <section class="shadow px-lg-4">

            </section>
        </div>

        <div id="" class="tab-pane   ">
            <?php showCancelBill()?>
            <section class="shadow px-lg-4">
                <?php if (empty($dataCancellBill)) {?>
                <div class="d-flex  justify-content-center">
                    <div class=" ">
                        <img width="230" src="/../project-flower/layout/assets/emptyBill.png" alt="">
                        <p class="m-5 ">Chưa có đơn hàng</p>

                    </div>

                </div>

                <?php } else {?>
                <?php foreach ($dataCancellBill as $cancelBill) {extract($cancelBill)?>
                <div class="d-flex flex-column mb-lg-5 ">


                    <span class="d-flex gap-5  justify-content-end ">
                        <p class="text-danger fs-5">Đã hủy</p>
                    </span>

                    <hr>

                    <?php selectCancelBill($id)?>
                    <?php foreach ($dataAboutBillCancel as $bills) {extract($bills)?>
                    <div class="d-flex mb-5">
                        <span class="position-relative">
                            <img width="100" src="/../<?php echo $image ?>" alt="">
                            <p class=" position-absolute bottom-0 end-0">x<?php echo $amount ?></p>

                        </span>

                        <p><?php echo $productName ?></p>


                        </p>


                    </div>

                    <?php }?>
                    <hr>
                    <span class="d-flex gap-5  justify-content-end ">
                        <p class="mt-4">Số tiền phải trả :</p>
                        <p class="text-danger fs-1"><?php echo $total ?>$</p>
                    </span>

                    <span class="d-flex gap-5  justify-content-end  ">
                        <button data-id='<?php echo $id ?>' style="width:150px" class="btn btn-white  border ">Mua
                            lại</button>
                    </span>


                </div>


                <?php }}?>




            </section>
        </div>
    </div>

</section>


<script src="./js/order.js"></script>