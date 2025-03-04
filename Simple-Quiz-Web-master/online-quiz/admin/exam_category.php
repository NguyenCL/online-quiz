<?php
include "header.php";
include "../connection.php";

if(!isset($_SESSION["username"]) && !isset($_SESSION['user_role']) && in_array($_SESSION['user_role'], array('admin', 'teacher')))
{
    ?>
<script type="text/javascript">
window.location = "../../login system admin/login_form.php";
</script>
<?php
}


?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Chủ đề thi</h1>
            </div>
        </div>
    </div>

</div>

<div class="content mt-3">
    <div class="animated fadeIn">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form name="forml" action="" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header"><strong>Chủ đề</strong></div>
                                    <div class="card-body card-block">
                                        <div class="form-group"><label for="company" class=" form-control-label">Chủ đề
                                                mới</label><input type="text" name="examname" placeholder="Nhập chủ đề"
                                                class="form-control"></div>
                                        <div class="form-group"><label for="num_question" class=" form-control-label">Số lượng câu hỏi </label><input type="text" placeholder="Số lượng câu hỏi"
                                                class="form-control" name="num_question"></div>
                                        <div class="form-group"><label for="vat" class=" form-control-label">Thời
                                                gian làm bài</label><input type="text" placeholder="Nhập thời gian"
                                                class="form-control" name="examtime"></div>

                                        <div class="form-group"><label for="metric" class=" form-control-label">Ma trận đề thi</label><input type="text" placeholder="(dễ, vừa, khó)"
                                                class="form-control" name="metric"></div>

                                        <div class="form-group"><label for="company" class=" form-control-label">Logo
                                            </label><input type="file" name="logoi" class="form-control"
                                                style="padding-bottom: 35px;"></div>
                                        <div class="form-group">
                                            <input type="submit" name="submitl" value="Thêm chủ đề"
                                                class="btn btn-success">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Chủ đề đã được thêm</strong>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">STT</th>
                                                    <th scope="col">Chủ đề</th>
                                                    <th scope="col">Thời gian</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Chỉnh sửa</th>
                                                    <th scope="col">Xoá chủ đề</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php 
                                                $count=0;
                                                $user_id = $_SESSION["user_id"];
                                                if ($user_role === "admin") {
                                                    $res=mysqli_query($link,"select * from exam_category");
                                                } else {
                                                    $res=mysqli_query($link,"select * from exam_category where user_created = $user_id");
                                                }
                                            while($row=mysqli_fetch_array($res))
                                            {
                                                $count=$count+1;
                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $count; ?></th>
                                                    <td><?php echo $row["describe"]; ?></td>
                                                    <td><?php echo $row["exam_time_in_minutes"]; ?></td>

                                                    <?php
                                                    echo "<td>";

                                                    if ($row['status']) {
                                                        echo "<span class='badge badge-sucess'>Active</span>";
                                                    } else echo "<span class='badge badge-danger'>Inactive</span>";

                                                    echo "</td>";
                                                    ?>
                                                    <td><a href="edit_exam.php?id=<?php echo $row["id"]; ?>"> Chỉnh sửa
                                                        </a>
                                                    </td>
                                                    <td><a href="delete.php?id=<?php echo $row["id"]; ?>">Xoá</a>
                                                    </td>

                                                </tr>
                                                <?php
                                            }
                                            ?>



                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <!--/.col-->


        </div>
    </div><!-- .animated -->
</div><!-- .content -->



<?php 
if(isset($_POST["submitl"])){
    $status = $user_role === 'admin' ? 1 : 0;
    
    $tm=md5 (time());

    //logo
    $fnm1=$_FILES["logoi"]["name"];
    $dst1="./logoimg/".$tm.$fnm1;
    $dst_db = "logoimg/".$tm.$fnm1;
    move_uploaded_file($_FILES["logoi"]["tmp_name"],$dst1);

    mysqli_query($link,"insert into exam_category value(NULL,'$_POST[examtime]', $_POST[num_question], '$_POST[metric]', '$dst_db', '$_POST[examname]', $user_id, $status)") or die(mysqli_error($link));

    ?>
<script type="text/javascript">
if (role === 'admin') {
    alert("Thêm chủ đề thành công");
} else {
    alert("Chủ đề của bạn đang chờ duyệt!")
}

window.location.href = window.location.href;
</script>
<?php

}

?>