<?php
include "header_add_edit_exam_quest.php";

include "../connection.php";

if(!isset($_SESSION["username"]) && !isset($_SESSION['user_role']) && in_array($_SESSION['user_role'], array('admin', 'teacher')))
{
    ?>
<script type="text/javascript">
window.location = "../../login system admin/login_form.php";
</script>
<?php
}


if (isset($_SESSION["message"])) {
    echo "<script>alert('".$_SESSION["message"]."')</script>";
    unset($_SESSION['message']); // Xóa thông báo sau khi đã hiển thị
}


$user_id = $_SESSION["user_id"];
$id=$_GET["id"];
$exam_category_name='';
$res = mysqli_query($link,"select * from exam_category where id=$id");

while($row=mysqli_fetch_array($res))
{
    $exam_category_name=$row["describe"];
    $exam_category_id=$row["id"];
    $user_created = $row['user_created'];
}

?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Thêm câu hỏi cho <?php echo "<font color='red'>" .$exam_category_name. "</font>"; ?></h1>
            </div>
        </div>
    </div>

</div>
<!-- chổ up code vô-->
<div class="content mt-3">
    <div class="animated fadeIn">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body d-flex justify-content-end">
                        <button type="button" data-toggle="modal" data-target="#modalUpload" class="btn btn-info rounded">Thêm nhiều</button>

                        <!-- Modal upload file -- START -- -->
                        <div class="modal fade" id="modalUpload" role="dialog" aria-labelledby="modalUploadTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalUploadLongTitle">Upload File Câu Hỏi</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <div class="d-flex flex-row justify-content-between">
                                                <div>File mẫu</div>
                                                <div>
                                                    <a class="text-success" href="assets/instruct_exam.xlsx">download here</a>
                                                </div>
                                            </div>

                                            <hr />

                                            <form method="POST" name="formFile" action="actions/upload_instruct_exam.php" enctype="multipart/form-data">
                                                <input type="hidden" name="category_id" value="<?= $id ?>">
                                                <div>Upload file</div>
                                                <div class="mt-2">
                                                    <input type="file" name="excel_file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" />
                                                </div>
                                                <div class="text-center mt-2">
                                                    <input type="submit" name="submit_file" class="btn btn-warning rounded" value="Tải lên file" />
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger rounded" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal upload file -- END -- -->
                    </div>
                </div>
            </div>
        </div>

<style>
.modal-backdrop {
  z-index: -1;
}
</style>
<!-- chổ up code vô-->
<div class="content mt-3">
    <div class="animated fadeIn">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body">
                        <form name="forml" action="" method="post" enctype="multipart/form-data">
                            <!-- Quest text -->
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header"><strong>Thêm câu hỏi loại văn bản</strong></div>
                                    <div class="card-body card-block">
                                        <div class="form-group"><label for="company" class=" form-control-label">
                                                Câu hỏi
                                            </label><input type="text" name="question" placeholder="Thêm câu hỏi"
                                                class="form-control"></div>

                                        <div class="form-group"><label for="company" class=" form-control-label">Câu hỏi có ảnh
                                            </label><input type="file" name="question_img" class="form-control"
                                                style="padding-bottom: 35px;"></div>

                                        <!-- op1 -->
                                        <div class="form-group"><label for="company" class=" form-control-label">Lựa
                                                chọn 1
                                            </label><input type="text" name="opt1" placeholder="Thêm lựa chọn"
                                                class="form-control"></div>

                                        <!-- op2 -->
                                        <div class="form-group"><label for="company" class=" form-control-label">Lựa
                                                chọn 2
                                            </label><input type="text" name="opt2" placeholder="Thêm lựa chọn"
                                                class="form-control"></div>

                                        <!-- op3 -->
                                        <div class="form-group"><label for="company" class=" form-control-label">Lựa
                                                chọn 3
                                            </label><input type="text" name="opt3" placeholder="Thêm lựa chọn"
                                                class="form-control"></div>

                                        <!-- op4 -->
                                        <div class="form-group"><label for="company" class=" form-control-label">Lựa
                                                chọn 4
                                            </label><input type="text" name="opt4" placeholder="Thêm lựa chọn"
                                                class="form-control"></div>

                                        <!-- Answer -->
                                        <div class="form-group"><label for="company" class=" form-control-label">Câu đáp
                                                án
                                            </label><input type="text" name="answer" placeholder="Thêm đáp án"
                                                class="form-control"></div>

                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Exam level</label>
                                            <select name="level" class="form-control">
                                                <option value="easy">EASY</option>
                                                <option value="medium">MEDIUM</option>
                                                <option value="hard">HARD</option>
                                            </select>
                                        </div>

                                        <!-- Add Quest -->
                                        <div class="form-group">
                                            <input type="submit" name="submitl" value="Thêm câu hỏi"
                                                class="btn btn-success">
                                        </div>
                                    </div>
                                </div>
                                <!-- </form> -->
                            </div>

                            <!-- Quest images -->
                            <div class="col-lg-6">
                                <!-- <form name="form2" action="" method="post" enctype="multipart/form-data"> -->
                                <div class="card">
                                    <div class="card-header"><strong>Thêm câu hỏi loại hình ảnh</strong></div>
                                    <div class="card-body card-block">
                                        <div class="form-group"><label for="company" class=" form-control-label"> Câu
                                                hỏi
                                            </label><input type="text" name="fquestion" placeholder="Thêm câu hỏi"
                                                class="form-control"></div>

                                        <div class="form-group"><label for="company" class=" form-control-label">Câu hỏi có ảnh
                                            </label><input type="file" name="fquestion_img" class="form-control"
                                                style="padding-bottom: 35px;"></div>

                                        <!-- op1 -->
                                        <div class="form-group"><label for="company" class=" form-control-label">Lựa
                                                chọn 1
                                            </label><input type="file" name="fopt1" class="form-control"
                                                style="padding-bottom: 35px;"></div>

                                        <!-- op2 -->
                                        <div class="form-group"><label for="company" class=" form-control-label">Lựa
                                                chọn 2
                                            </label><input type="file" name="fopt2" class="form-control"
                                                style="padding-bottom: 35px;"></div>

                                        <!-- op3 -->
                                        <div class="form-group"><label for="company" class=" form-control-label">Lựa
                                                chọn 3
                                            </label><input type="file" name="fopt3" class="form-control"
                                                style="padding-bottom: 35px;"></div>

                                        <!-- op4 -->
                                        <div class="form-group"><label for="company" class=" form-control-label">Lựa
                                                chọn 4
                                            </label><input type="file" name="fopt4" class="form-control"
                                                style="padding-bottom: 35px;"></div>


                                        <!-- Answer -->
                                        <div class="form-group"><label for="company" class=" form-control-label">Câu đáp
                                                án
                                            </label><input type="file" name="fAnswer" class="form-control"
                                                style="padding-bottom: 35px;"></div>

                                        <div class="form-group">
                                            <select name="level_url" class="form-control">
                                                <option value="easy">EASY</option>
                                                <option value="medium">MEDIUM</option>
                                                <option value="hard">HARD</option>
                                            </select>
                                        </div>

                                        <!-- Add Quest -->
                                        <div class="form-group">
                                            <input type="submit" name="submit2" value="Thêm câu hỏi"
                                                class="btn btn-success">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
            <!--/.col-->


        </div>


        <!-- Box Questions in bottom -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>
                                    Câu hỏi
                                </th>
                                <th>
                                    Câu hỏi ảnh ?
                                </th>
                                <th>
                                    Độ khó
                                </th>
                                <th>
                                    Lựa chọn 1
                                </th>
                                <th>
                                    Lựa chọn 2
                                </th>
                                <th>
                                    Lựa chọn 3
                                </th>
                                <th>
                                    Lựa chọn 4
                                </th>
                                <th>
                                    Đáp án
                                </th>
                                <th>Chỉnh sửa</th>
                                <th>Xoá câu hỏi</th>
                            </tr>


                            <?php
                    // check role
                    $res=mysqli_query($link,"select * from questions where category = '$exam_category_id' order by id desc ");
                    $manage_permission = false;
                    $is_cate_owner = $user_created === $user_id;

                    while($row=mysqli_fetch_array($res))//order by asc
                    {
                        $is_question_owner = $row['user_created'] === $user_id;

                        if ($_SESSION["user_role"] === "admin" || $is_cate_owner || $is_question_owner) {
                            // user is admin or category owner or question owner
                            $manage_permission = true;
                        }
                        
                        echo "<tr>";

                        //echo "<td>";
                        //echo $row["id"];
                        //echo $row["question_no"];
                        //echo "</td>";

                        echo "<td>";
                        echo $row["question"];
                        echo "</td>";
                        echo "<td>";
                        echo !empty($row["img_url"]) ? 'có ảnh' : 'không có';
                        echo "</td>";
                        echo "<td>";
                        echo $row["level"];
                        echo "</td>";

                        // image 1
                        echo "<td>";
                        if(strpos($row["opt1"],'opt_images')!==false)
                            {
                            ?>
                            <img src="<?php echo $row["opt1"];?> " height="50" width="50">
                            <?php
                            }
                            else
                            {
                            echo $row["opt1"];
                            }
                        echo "</td>";

                           
                        // image 2
                        echo "<td>";
                        if(strpos($row["opt2"],'opt_images')!==false)
                            {
                            ?>
                            <img src="<?php echo $row["opt2"];?> " height="50" width="50">
                            <?php
                            }
                            else
                            {
                            echo $row["opt2"];
                            }
                            echo "</td>";



                        // image 3
                        echo "<td>";
                        if(strpos($row["opt3"],'opt_images')!==false)
                            {
                            ?>
                            <img src="<?php echo $row["opt3"];?> " height="50" width="50">
                            <?php
                            }
                            else
                            {
                            echo $row["opt3"];
                            }
                            echo "</td>";

                       // image 4
                        echo "<td>";
                        if(strpos($row["opt4"],'opt_images')!==false)
                            {
                            ?>
                            <img src="<?php echo $row["opt4"];?> " height="50" width="50">
                            <?php
                            }
                        else
                            {
                            echo $row["opt4"];
                            }
                        echo "</td>";
                            
                            //answers
                        echo "<td>";
                        if(strpos($row["answer"],'opt_images')!==false)
                            {
                        ?>
                            <img src="<?php echo $row["answer"];?> " height="50" width="50">
                        <?php
                            }
                        else
                            {
                                echo $row["answer"];
                            }
                        echo "</td>";
                                
                            //Edit text && image
                        if ($manage_permission) {
                        echo "<td>";
                            if(strpos($row["opt4"],'opt_images')!==false)
                            {
                            ?>
                            <a href="edit_option_images.php?id=<?php echo $row["id"];?>&idl=<?php echo $id;?>">Chỉnh
                                sửa</a>
                            <?php
                            }
                            else
                            {
                                ?>
                            <a href="edit_option.php?id=<?php echo $row["id"];?>&idl=<?php echo $id;?>">Chỉnh sửa</a>
                            <?php
                            }
                            echo "</td>";

                            // Delete
                        echo "<td>";
                            ?>
                            <a href=" delete_option.php?id=<?php echo $row["id"];?>&idl=<?php echo $id; ?>">Xoá</a>
                            <?php
                        echo "</td>";
                        } else {
                            echo "<td colspan=2></td>";
                        }
                        echo "</tr>";
                            }
                            ?>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->


<!-- PHP của submit text -->
<?php 
require_once('./actions/convert_string_to_slug.php');
if(isset($_POST["submitl"])){
    // $loop=0;

    // $count=0;

    // $res=mysqli_query($link,"select * from questions where category='$exam_category_id' order by id asc") or die(mysqli_error($link));

    // $count=mysqli_num_rows($res);

    // if($count==0)
    // {


    // }
    // else{

    //     while($row=mysqli_fetch_array($res))
    //     {
    //         $loop=$loop+1;
    //         mysqli_query($link,"update questions set question_no='$loop' where id=$row[id]");
    //     }
    // }

    $tm=md5 (time());
    $question_img=convertStringToSlug($_FILES["question_img"]["name"]);
    $dst_db = null;
    if ($question_img !== "") {
        $dst="./opt_images/".$tm.$question_img;
        $dst_db = "opt_images/".$tm.$question_img;
        move_uploaded_file($_FILES["question_img"]["tmp_name"],$dst);
    }

    // $loop=$loop+1;
    mysqli_query($link,"insert into questions (id, question, img_url, opt1, opt2, opt3, opt4, answer, category, level, user_created) values(NULL,'$_POST[question]', '$dst_db','$_POST[opt1]','$_POST[opt2]','$_POST[opt3]','$_POST[opt4]','$_POST[answer]','$exam_category_id', '$_POST[level]', $user_id)")
    or die(mysqli_error($link));

    ?>
<script type="text/javascript">
alert("Thêm câu hỏi thành công");
window.location.href = window.location.href;
</script>
<?php
}
?>

<!-- submit của images -->
<?php 

if(isset($_POST["submit2"])){
    // $loop=0;

    // $count=0;

    // $res=mysqli_query($link,"select * from questions where category='$exam_category_id' order by id asc") or die(mysqli_error($link));

    // $count=mysqli_num_rows($res);

    // if($count==0)
    // {


    // }
    // else{

    //     while($row=mysqli_fetch_array($res))
    //     {
    //         $loop=$loop+1;
    //         mysqli_query($link,"update questions set question_no='$loop' where id=$row[id]");
    //     }
    // }
    
    // $loop=$loop+1;
    
    $tm=md5 (time());

    // question image
    $fquestion_img = convertStringToSlug($_FILES["fquestion_img"]["name"]);
    
    $f_img_url = null;
    if ($fquestion_img !== "") {
        $f_ques="./opt_images/".$tm.$fquestion_img;
        $f_img_url = "opt_images/".$tm.$fquestion_img;
        move_uploaded_file($_FILES["fquestion_img"]["tmp_name"],$f_ques);
    }

    // fopt1
    $fnm1=convertStringToSlug($_FILES["fopt1"]["name"]);
    $dst1="./opt_images/".$tm.$fnm1;
    $dst_db = "opt_images/".$tm.$fnm1;
    move_uploaded_file($_FILES["fopt1"]["tmp_name"],$dst1);

    // fopt2
    $fnm2=convertStringToSlug($_FILES["fopt2"]["name"]);
    $dst2="./opt_images/".$tm.$fnm2;
    $dst_db2 = "opt_images/".$tm.$fnm2;
    move_uploaded_file($_FILES["fopt2"]["tmp_name"],$dst2);

    // fopt3
    $fnm3=convertStringToSlug($_FILES["fopt3"]["name"]);
    $dst3="./opt_images/".$tm.$fnm3;
    $dst_db3 = "opt_images/".$tm.$fnm3;
    move_uploaded_file($_FILES["fopt3"]["tmp_name"],$dst3);

    // fopt4
    $fnm4=convertStringToSlug($_FILES["fopt4"]["name"]);
    $dst4="./opt_images/".$tm.$fnm4;
    $dst_db4 = "opt_images/".$tm.$fnm4;
    move_uploaded_file($_FILES["fopt4"]["tmp_name"],$dst4);

    // fAnswer
    $fnm5=convertStringToSlug($_FILES["fAnswer"]["name"]);
    $dst5="./opt_images/".$tm.$fnm5;
    $dst_db5 = "opt_images/".$tm.$fnm5;
    move_uploaded_file($_FILES["fAnswer"]["tmp_name"],$dst5);

    mysqli_query($link,"insert into questions (id, question, img_url, opt1, opt2, opt3, opt4, answer, category, level, user_created) values(NULL,'$_POST[fquestion]', '$f_img_url','$dst_db','$dst_db2','$dst_db3','$dst_db4','$dst_db5','$exam_category_id', '$_POST[level_url]', $user_id)")
    or die(mysqli_error($link));

    ?>
<script type="text/javascript">
alert("Thêm câu hỏi thành công");
window.location.href = window.location.href;
</script>
<?php

}

?>