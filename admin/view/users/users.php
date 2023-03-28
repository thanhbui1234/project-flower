<section id="table" class="container">
    <table class="table shadow p-3 mb-5 bg-body rounded table-condensed table-bordered ">

        <thead>
            <tr>
                <th>ID</th>
                <th>Họ tên</th>
                <th>Tên đăng nhập</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Ảnh đại diện</th>
                <th>Địa chỉ</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody id="tbody">
            <tr>
                <?php if (empty($dataAllUsers)) {
    echo '<td class="text-center text-danger" colspan="8">Empty</td>';
}?>
                <?php foreach ($dataAllUsers as $user) {extract($user)?>
                <td><?php echo $id ?></td>
                <td> <?php echo $name ?></td>
                <td><?php echo $userName ?></td>
                <td><?php echo $phone ?></td>
                <td><?php echo $email ?></td>
                <td class="text-center
                "><img width="50" src="/../project-flower/admin/uploads/<?php echo $image ?>" alt=""></td>
                <td><?php echo $address ?></td>
                <td class="btnDelete"><button data-id='<?php echo $id ?>' class="btn btn-danger">Xóa</button></td>
            </tr>
            <?php }?>
        </tbody>

    </table>

</section>


<script src="layout/js/user.js"></script>