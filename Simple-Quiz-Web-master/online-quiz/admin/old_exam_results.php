<?php
include "header_old_exam_results.php";
include "../connection.php";

if(!isset($_SESSION["username"]) && !isset($_SESSION['user_role']) && in_array($_SESSION['user_role'], array('admin', 'teacher')))
{
    ?>
<script type="text/javascript">
window.location = "../../login system admin/login_form.php";
</script>
<?php
}

$selected = $_GET["selected_tag"] ?? "";

$user_id = $_SESSION["user_id"];
?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Tất cả kết quả thi</h1>
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
                        <center>
                            <h1 style="margin-bottom: 10px;">Bảng kết quả thi</h1>
                        </center>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Chủ đề</label>
                            </div>
                            <select class="custom-select" id="select-cate">
                                <option value="" <?= empty($selected) ? 'selected' : '' ?>>Choose...</option>
                                <?php
                                
                                $res=mysqli_query($link,"select * from exam_category");
                                

                                while($row=mysqli_fetch_array($res)) {
                                ?>
                                    <option <?= $selected == $row["id"] ? 'selected' : '' ?> value="<?= $row["id"] ?>"><?= $row["describe"] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            </div>
                        <br>
                        <button onclick="location.href='export_pdf.php?selected=<?= $selected ?>'">
                            <div class="button-text">Xuất bảng kết quả<div>
                        </button>


                        <?php
                        $count=0;
                        if (empty($selected)) {
                            $res=mysqli_query($link,"select r.username, c.describe, r.total_question, r.correct_answer, r.wrong_answer, r.exam_time from exam_results r join exam_category c on r.exam_type = c.id order by r.id desc");
                        } else {
                            // echo "select r.username, c.describe, r.total_question, r.correct_answer, r.wrong_answer, r.exam_time from exam_results r join exam_category c on r.exam_type = c.id where c.id = $selected order by r.id desc";
                            $res=mysqli_query($link,"select r.username, c.describe, r.total_question, r.correct_answer, r.wrong_answer, r.exam_time from exam_results r join exam_category c on r.exam_type = c.id where c.id = $selected order by r.id desc");
                        }
                        $count=mysqli_num_rows($res);

                        if($count==0)
                        {
                            ?>
                        <center>
                            <h1>Không có kết quả nào</h1>
                        </center>
                        <?php
}
else{
    echo "<table class='table table-bordered'>";
    echo "<tr style='background-color:#059862; color:white;'>";
    echo "<th style='text-align:center;'>"; echo "Tên tài khoản"; echo "</th>";
    echo "<th style='text-align:center;'>"; echo "Chủ đề thi"; echo "</th>";
    echo "<th style='text-align:center;'>";echo "Tổng câu hỏi"; echo "</th>";
    echo "<th style='text-align:center;'>";echo "Đáp án đúng"; echo "</th>";
    echo "<th style='text-align:center;'>"; echo "Đáp án sai";echo "</th>";
    echo "<th style='text-align:center;'>"; echo "Thời gian làm bài";echo "</th>";
    echo "</tr>";

    while($row=mysqli_fetch_array($res))
    {
        echo "<tr>";
        echo "<td style='text-align:center;'>"; echo $row["username"]; echo "</td>";
        echo "<td style='text-align:center;'>"; echo $row["describe"]; echo "</td>";
        echo "<td style='text-align:center;'>";echo $row["total_question"]; echo "</td>";
        echo "<td style='text-align:center;'>";echo $row["correct_answer"]; echo "</td>";
        echo "<td style='text-align:center;'>"; echo $row["wrong_answer"];echo "</td>";
        echo "<td style='text-align:center;'>"; echo $row["exam_time"];echo "</td>";
        echo "</tr>";
    }
    

    echo "</table>";

}

?>

                    </div>
                </div>

            </div>
            <!--/.col-->


        </div>
    </div><!-- .animated -->
</div><!-- .content -->


<script>
    document.getElementById("select-cate").addEventListener('change', function(e) {
        const cate_id = e.target.value

        location.href = `?selected_tag=${cate_id}`
    })
</script>