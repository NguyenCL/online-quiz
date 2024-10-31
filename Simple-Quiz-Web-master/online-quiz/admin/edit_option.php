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

$id = $_GET["id"];
$idl=$_GET["idl"];

$question="";
$opt1="";
$opt2="";
$opt3="";
$opt4="";
$answer="";
$level="easy";


$res=mysqli_query($link,"select * from questions where id=$id");
while($row=mysqli_fetch_array($res))
{
    $question=$row["question"];
    $question_img = $row["img_url"];
    $opt1=$row["opt1"];
    $opt2=$row["opt2"];
    $opt3=$row["opt3"];
    $opt4=$row["opt4"];
    $answer=$row["answer"];
    $level = $row["level"];
}

?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Cập nhật câu hỏi loại văn bản</h1>
            </div>
        </div>
    </div>

</div>

<div class="content mt-3">
    <div class="animated fadeIn">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body">

                        <!-- Quest text -->
                        <div class="col-lg-12">
                            <form name="forml" action="" method="post" enctype="multipart/form-data">
                                <div class="card">
                                    <div class="card-header"><strong>Cập nhật</strong></div>
                                    <div class="card-body card-block">
                                        <div class="form-group"><label for="company" class=" form-control-label">Cập
                                                nhật câu hỏi
                                            </label><input type="text" name="question" placeholder="câu hỏi"
                                                class="form-control" value="<?php echo $question; ?>"></div>

                                        <div class="form-group">
                                            <?php
                                                if ($question_img) {
                                            ?>
                                                    <img src="<?= $question_img ?>" class="p-2 border rounded mx-auto" 
                                                    style="display: block; width: 300px"/>
                                                    <br>
                                            <?php
                                                }
                                            ?>
                                            <label for="company" class=" form-control-label">Câu hỏi có ảnh
                                            </label><input type="file" name="question_img" class="form-control"
                                                style="padding-bottom: 35px;">
                                        </div>

                                        <!-- op1 -->
                                        <div class="form-group"><label for="company" class=" form-control-label">Cập
                                                nhật lựa chọn 1
                                            </label><input type="text" name="opt1" placeholder="Lựa chọn 1"
                                                class="form-control" value="<?php echo $opt1; ?>"></div>

                                        <!-- op2 -->
                                        <div class="form-group"><label for="company" class=" form-control-label">Cập
                                                nhật lựa chọn 2
                                            </label><input type="text" name="opt2" placeholder="Lựa chọn 2"
                                                class="form-control" value="<?php echo $opt2; ?>"></div>

                                        <!-- op3 -->
                                        <div class="form-group"><label for="company" class=" form-control-label">Cập
                                                nhật lựa chọn 3
                                            </label><input type="text" name="opt3" placeholder="Lựa chọn 3"
                                                class="form-control" value="<?php echo $opt3; ?>"></div>

                                        <!-- op4 -->
                                        <div class="form-group"><label for="company" class=" form-control-label">Cập
                                                nhật lựa chọn 4
                                            </label><input type="text" name="opt4" placeholder="Lựa chọn 4"
                                                class="form-control" value="<?php echo $opt4; ?>"></div>

                                        <!-- Answer -->
                                        <div class="form-group"><label for="company" class=" form-control-label">Cập
                                                nhật đáp án
                                            </label><input type="text" name="answer" placeholder="Câu trả lời"
                                                class="form-control" value="<?php echo $answer; ?>"></div>

                                        <!-- dropdown select -->
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Exam level</label>
                                            <select name="level" class="form-control">
                                            <?php
                                                // dropdown values
                                                $level_arr = ['easy', 'medium', 'hard'];
                                                foreach( $level_arr as $lv ) {
                                                    if ($lv === $level) {
                                                        // if value same as data in db => select default
                                                        echo "<option selected value='". $lv ."'>". strtoupper($lv) ."</option>";
                                                    } else {
                                                        echo "<option value='". $lv ."'>". strtoupper($lv) ."</option>";
                                                    }
                                                }
                                            ?>
                                            </select>
                                        </div>

                                        <!-- Add Quest -->
                                        <div class="form-group">
                                            <input type="submit" name="submitl" value="Cập nhật câu hỏi"
                                                class="btn btn-success">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!--/.col-->


        </div>
    </div><!-- .animated -->
</div><!-- .content -->


<?php
if(isset($_POST["submitl"]))
{
    mysqli_query($link,"update questions set level='$_POST[level]',question='$_POST[question]',opt1='$_POST[opt1]',opt2='$_POST[opt2]',opt3='$_POST[opt3]',opt4='$_POST[opt4]',answer='$_POST[answer]' where id=$id");

    $question_img=$_FILES["question_img"]["name"];
    $tm=md5 (time());

    // question image
    if ($question_img != "") {
        $f_ques="./opt_images/".$tm.$question_img;
        $f_img_url = "opt_images/".$tm.$question_img;
        move_uploaded_file($_FILES["question_img"]["tmp_name"],$f_ques);
        mysqli_query($link,"update questions set img_url='$f_img_url' where id=$id") or die(mysqli_error($link));
    }
?>
<script type="text/javascript">
alert("Cập nhật câu hỏi thành công");
window.location = "add_edit_quest.php?id=<?php echo $idl ?>";
</script>
<?php
}
?>