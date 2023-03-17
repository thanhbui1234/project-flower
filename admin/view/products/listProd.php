<div class="mx-4">
    <form action="#" method="post" class="">



        <div class="d-flex flex-row gap-2  ">
            <select name="option" class="form-select form-select-sm form-control w-25 mb-4" id="selectAllprod"
                aria-label="Default select example">
                <option selected>Chức năng</option>
                <option value="public">Public</option>
                <option value="private">Private</option>
                <option value="clone">Tạo bản sao</option>
                <option value="delete">Xóa</option>

            </select>

            <button id="apply_prod" type="submit" name="apply" class="btn btn-google h-25 "> Apply </button>


        </div>
        <table class="table shadow p-3 mb-5 bg-body rounded  table-condensed table-bordered  ">
            <thead class="headTable">
                <tr>
                    <th> <input id="selectAllBoxes" type="checkbox"></th>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Loại sản phẩm</th>
                    <th>Gía</th>
                    <th>Hỉnh ảnh</th>
                    <th>Nội Dung</th>
                    <th>Trạng thái</th>
                    <th>Giảm giá </th>
                    <th>Action </th>

                </tr>

            </thead>
            <tbody>


                <tr>


                <tr>
                    <td><input class="selectAllBoxesChild" name="checkBoxArr[]" value="<?php echo $id ?>"
                            type="checkbox">
                    </td>
                    <td> 1</td>
                    <td> ten san pham </td>
                    <td>loai san pham </td>
                    <td> gia </td>
                    <td class="d-flex justify-content-center pb-2"><img width="55"
                            src="/../project-flower/layout/assets/img/productDemo/a1.png" alt=""></td>

                    <td class="content"> Noi dung san pham</td>
                    <td></td>
                    <td>10 % </td>
                    <td class="action_prod"> <a class="btn btn-success"
                            href="index.php?act=update_prod&&id=10">UPDATE</a>
                        <a class="deleteProd" data-id="10"><button class="btn btn-danger">Xóa</button></a>
                    </td>

                </tr>


                </tr>
            </tbody>

        </table>
    </form>

</div>