        <div class="mx-4">
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
                            <th>Tổng đơn</th>
                            <th>Action</th>
                        </tr>        
                    </thead>
                    <tbody>        
                        <?php if (empty($bills)) { ?>
                        <tr>
                            <td class=" text-xl-center text-warning" colspan="10">Không có đơn hàng cần xử lý</td>
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
                            <td><?php echo $total?>$</td>
                            <td class="action_prod">
                                <a href="index.php?act=bills&&id=<?php echo $id ?>" >
                                    <button class="btn btn-success" name="confirmBill">Xác nhận</button>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>        
                    </tbody>        
                </table>
        
        </div>
        
        <script src="/project-flower/admin/layout/js/products.js"></script>