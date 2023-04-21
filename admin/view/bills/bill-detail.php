<div class="mx-4">
                <h1>HÓA ĐƠN SỐ<?php echo $_GET['id']?></h1>
                <div class="row align-items-stretch mb-5">
                <table class="table shadow p-3 mb-5 bg-body rounded  table-condensed table-bordered ">
                <tr>
                    <th id="bill_field">Khách hàng: </th>
                    <th><?php echo $billInf['0']['customer'];?></th>
                </tr>
                <tr>
                    <th id="bill_field">Số điện thoại: </th>
                    <th><?php echo $billInf['0']['phone'];?></th>
                </tr>
                <tr>
                    <th id="bill_field">Email: </th>
                    <th><?php echo $billInf['0']['email'];?></th>
                </tr>
                <tr>
                    <th id="bill_field">Địa chỉ: </th>
                    <th><?php echo $billInf['0']['address'];?></th>
                </tr>
                <tr>
                    <th id="bill_field">Ngày đặt hàng: </th>
                    <th><?php echo $billInf['0']['date'];?></th>
                </tr>
                <tr>
                    <th id="bill_field">Trạng thái đơn hàng: </th>
                    <th><?php if($billInf['0']['status'] == 'No_confirm') echo 'Chưa xác nhận';
                            else if($billInf['0']['status'] == 'confirmed')  echo 'Đã giao hàng';
                            else echo 'Đang giao hàng'; ?></th>
                </tr>
                </table>
                <table class="table shadow p-3 mb-5 bg-body rounded  table-condensed table-bordered ">
                <thead class="headTable">
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Giá</th>
                        <th>Giảm giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody> 
                        
                        <?php foreach($products as $product){ ?>
                        <?php extract($product);?>
                            <tr>
                                <td><?php echo $productName?></td>
                                <td><img width="50" src="<?php echo $image?>" alt=""></td>
                                <td><?php echo $price?>$</td>
                                <td>- <?php echo ($price*$deal)/100;?>$</td>
                                <td><?php echo $amount?></td>
                                <td><?php echo $sum?>$</td>
                            </tr>
                        <?php }?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="5">Total:</th> 
                        <th colspan="1"><?php echo $billInf['0']['total'];?> $</th>
                    </tr>
                </tfoot>          
        </div>
        
        <script src="layout/js/products.js"></script>