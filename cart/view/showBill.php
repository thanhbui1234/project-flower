<?php
    include "../model/functions.php";
    session_start();
?>
<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Xác nhận đơn hàng</h2>
            <h3 class="section-subheading text-muted">
                Shop X uy tín số 1 thế giới
            </h3>
        </div>
        <div class="row align-items-stretch mb-5">
            <table class="table shadow p-3 mb-5 bg-body rounded  table-condensed table-bordered ">
            <tr>
                <th id="bill_field">Khách hàng: </th>
                <th><input id="bill_input" type="text" value="<?php if(isset($_SESSION['user_fullName'])) echo $_SESSION['user_fullName'];?>"></th>
            </tr>
            <tr>
                <th id="bill_field">Số điện thoại: </th>
                <th><input id="bill_input" type="text" value="<?php if(isset($_SESSION['phone'])) echo $_SESSION['phone'];?>"></th>
            </tr>
            <tr>
                <th id="bill_field">Email: </th>
                <th><input id="bill_input" type="text" value="<?php if(isset($_SESSION['email'])) echo $_SESSION['email'];?>"></th>
            </tr>
            <tr>
                <th id="bill_field">Địa chỉ: </th>
                <th><input id="bill_input" type="text" value="<?php if(isset($_SESSION['address'])) echo $_SESSION['address'];?>"></th>
            </tr>
            </table>
            
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
                </tr>
            </thead>
            <tbody> 
                    <?php $id = 0;$total=0;?>
                    <?php foreach($_SESSION['cart'] as $cart):?>
                        <?php $id+=1;?>
                        <tr>
                            <td><?php echo $id?></td>
                            <td><?php echo $cart[0]?></td>
                            <td><img width="50" src="<?php echo $cart[1]?>" alt=""></td>
                            <td><?php echo $cart[2]?>$</td>
                            <td>- <?php echo $cart[3]?>$</td>
                            <td><?php echo $cart[4]?></td>
                            <td><?php echo $cart[5]?>$</td>
                        </tr>
                        <?php $total+=$cart[5];?>
                    <?php endforeach?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="6">Total:</th> 
                    <th colspan="1"><?php echo $total;?> $</th>
                </tr>
            </tfoot>
            </table>
        </div>
            <div class="text-center">
                <form action="/project-flower/cart/cart.php?act=submit" method="POST">
                <button class="btn btn-primary btn-xl text-uppercase " id="submitButton" name="login" type="submit">
                    Xác nhận
                </button>
                </form>
            </div>
        </form>
    </div>
</section>