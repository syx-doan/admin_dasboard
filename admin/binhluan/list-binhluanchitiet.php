<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Bình luận</h6>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nội dung</th>
                        <th>Ngày bình luận</th>
                        <th>Người bình luận</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <?php $id_detail = 0;

                foreach ($loadblct as $comment_detail) {
                    extract($comment_detail);
                    $xoabl = "index.php?act=xoabl&id=" . $id_comment;
                    echo '
                        <tbody>
                        <tr>
                        <td>' . $id_detail++ . '</td>
                            <td>' . $content . '</td>
                            <td>' . $ngaybinhluan . '</td>
                            <td>' . $fullname . '</td>
                            <td>
                                <a href="' . $xoabl . '"> <i class="fa fa-trash"> xóa</i></a>
                            </td>
                        </tr>
                    </tbody>
                        ';
                };
                ?>

            </table>
        </div>
    </div>
</div>