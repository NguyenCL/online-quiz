<?php
include "header_approve_cate.php";
include "../connection.php";

if(!isset($_SESSION["username"]) && !isset($_SESSION['user_role']) && in_array($_SESSION['user_role'], array('admin', 'teacher')))
{
    ?>
<script type="text/javascript">
window.location = "../../login system admin/login_form.php";
</script>
<?php
}

if ($user_role !== "admin") {
    ?>
    <script type="text/javascript">
        window.location = "./exam_category.php";
    </script>
    <?php
}

?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Duyệt Chủ đề</h1>
            </div>
        </div>
    </div>

</div>

<div class="content mt-3">
    <div class="animated fadeIn">
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">ID Chủ Đề</th>
            <th scope="col">Tên Chủ Đề</th>
            <th scope="col">Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $count = 0;
            $res=mysqli_query($link,"select * from exam_category");

            while($row=mysqli_fetch_array($res))
            {
                $count++;
            ?>
                <tr>
                    <th scope="row"><?= $count ?></th>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['describe'] ?></td>
                    <td>
                        <?= $row['status'] ?
                        "<button onclick='changeStatus(". $row['id'] . ", 1)' class='btn btn-success rounded'>Active</button>" :
                        "<button onclick='changeStatus(". $row['id'] . ", 0)' class='btn btn-danger rounded'>Inactive</button>" ?>
                    </td>
                </tr>
            <?php
            }
            ?>
            
        </tbody>
    </table>

    </div><!-- .animated -->
</div><!-- .content -->

<script>

function changeStatus(id, currentStatus) {
    $.ajax({
        type:"post",
        url:"../forajax/change_status_cate.php",
        data: 
        {  
           'id': id,
           'currentStatus': currentStatus
        },
        success: function (response) 
        {
            if (response) {
                alert('Cập nhật trạng thái thành công...')
                location.reload(); 
            } else {
                alert('Có sai sót, thử lại sau!!')
            }
        }
    });
}

</script>