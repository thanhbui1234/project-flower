        <div class="mx-4">
            <form action="#" method="post" class="">
                <table class="table shadow p-3 mb-5 bg-body rounded table-condensed table-bordered  ">
                    <thead class="headTable">
                        <tr>
                            <th><input id="selectAllBoxes" type="checkbox"></th>
                            <th>ID</th>
                            <th>Tên khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Ngày đặt hàng</th>
                            <th>Trạng thái</th>
                            <th>Chi tiết hóa đơn</th>
                            <th>Action</th>
                        </tr>        
                    </thead>
                    <tbody>        
                        <?php if (empty($bills)) { ?>
                        <tr>
                            <td class=" text-xl-center text-warning" colspan="10">EMPTY</td>
                        </tr>
                        <?php } ?>
        
        
                        <?php foreach ($bills as $bill) {
                            extract($bill) ?>
                        <tr>
                            <td><input class="selectAllBoxesChild" name="checkBoxArr[]" value="<?php echo $id ?>"
                                    type="checkbox"></td>
                            <td><?php echo $id ?></td>
                            <td><?php echo $customer ?></td>
                            <td><?php echo $phone ?></td>
                            <td><?php echo $date ?></td>
                            <td><?php if($status == 'No_confirm') echo 'Chưa xác nhận';
                            else if($status == 'confirmed')  echo 'Đã giao hàng';
                            else echo 'Đang giao hàng'; ?>
                            </td>
                            <td><a href="index.php?act=bill-detail&&id=<?php echo $id ?>">Xem chi tiết</a></td>
                            <td class="action_prod">
                                <a class="btn btn-success" href="index.php?act=bills&id=<?php echo $id ?>" name="confirmBill">Xác nhận</a>
                                <a class="deleteBill" data-id="<?php echo $id ?>">
                                    <button class="btn btn-danger">Xóa</button>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>        
                    </tbody>
        
                </table>
            </form>
        
        </div>
        
        <script src="layout/js/products.js"></script>