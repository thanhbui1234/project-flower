<?php
// include "./cart/model/functions.php";
session_start();
if (isset($_GET['del_id']) && $_GET['del_id'] >= 0) {
    array_splice($_SESSION['cart'], $_GET['del_id'], 1);
}
getCart();
if (isset($_GET['del_cart']) && $_GET['del_cart'] == 1) {
    unset($_SESSION['cart']);
    $_SESSION['cart'] = [];
}
?>

<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Giỏ hàng</h2>
            <h3 class="section-subheading text-muted">
                Shop X uy tín số 1 thế giới
            </h3>
        </div>
        <div class="row align-items-stretch mb-5 d-flex justify-content-center">

            <?php if (empty($_SESSION['cart'])) {?>

            <img style="width: 250px;" height="" class="" src="/project-flower/layout/assets/cart.png" alt="">
            <h4 class="text-center text-black-50">Giỏ hàng của bạn còn trống</h4>
            <a href="/project-flower/" style="width: 150px;" class="p-lg-2 mt-4 btn btn-danger">Mua ngay</a>
            <?php } else {?>
            <table class="table shadow p-3 mb-5 bg-body rounded  table-condensed table-bordered ">
                <thead class="headTable">
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Giá</th>
                        <th>Giảm giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $id = 0;
    $total = 0;?>
                    <?php foreach ($_SESSION['cart'] as $cart): ?>
                    <?php $id += 1;?>
                    <tr>
                        <td><?php echo $id ?></td>
                        <td><?php echo $cart[0] ?></td>
                        <td><img width="50" src="<?php echo $cart[1] ?>" alt=""></td>
                        <td><?php echo $cart[2] ?>$</td>
                        <td>- <?php echo $cart[3] ?>$</td>
                        <td><?php echo $cart[4] ?></td>
                        <td><?php echo $cart[5] ?>$</td>
                        <td class="action_prod">
                            <a class="deleteProd" href="../cart/cart.php?del_id=<?php echo ($id - 1) ?>">
                                <button class="btn btn-danger" type="submit">Xóa</button>
                            </a>
                        </td>
                    </tr>
                    <?php $total += $cart[5];?>
                    <?php endforeach?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="6">Total:</th>
                        <th colspan="2"><?php echo $total; ?> $</th>
                    </tr>
                </tfoot>
            </table>

        </div>
        <div class="text-center">
            <a href="/project-flower/cart/cart.php?act=createBill">
                <button class="btn btn-primary btn-xl text-uppercase " id="submitButton" name="" type="">
                    Xác nhận đặt hàng
                </button>
            </a>
            <a href="/project-flower/index.php">
                <button class="btn btn-primary btn-xl text-uppercase " id="submitButton" name="" type="">
                    Tiếp tục mua hàng
                </button>
            </a>
            <a href="/project-flower/cart/cart.php?del_cart=1">
                <button class="btn btn-primary btn-xl text-uppercase " id="submitButton" name="del_cart" type="button">
                    Hủy đặt hàng
                </button>
            </a>
        </div>
        <?php }?>
        </form>
    </div>
</section>