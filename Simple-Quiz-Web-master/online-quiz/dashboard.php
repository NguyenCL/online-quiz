<?php

session_start(); // bắt đầu phiên làm việc

include "connection.php";
include "header-exam.php";

// để cho khi chưa đăng nhập mà vẫn bấm vào link được
if(!isset($_SESSION["username"])) // kiểm tra xem biến $_SESSION["username"] đã được đặt hay chưa
{
    ?>
<script type="text/javascript">
window.location = "login.php"; // chuyển hương đến trang login
</script>
<?php
}
$exam_cate = $_SESSION["exam_category"];
$get_metric_query = mysqli_query($link, "SELECT metric FROM exam_category where id=$exam_cate");

// lấy ma trận đề thi
$metric = mysqli_fetch_all($get_metric_query, MYSQLI_ASSOC)[0]["metric"];
$metric = explode(",", $metric);

$res=mysqli_query($link,"(SELECT id FROM questions WHERE category=$exam_cate AND level='easy' ORDER BY RAND() LIMIT $metric[0])
UNION
(SELECT id FROM questions WHERE category=$exam_cate AND level='medium' ORDER BY RAND() LIMIT $metric[1])
UNION
(SELECT id FROM questions WHERE category=$exam_cate AND level='hard' ORDER BY RAND() LIMIT $metric[2])");
$result_array = mysqli_fetch_all($res, MYSQLI_ASSOC);
$num_questions = mysqli_num_rows($res);

$_SESSION["total_question"] = $num_questions;
$values_array = array_column($result_array, 'id');

?>

<div class="tableOption">

    <!-- Start editing -->
    <br>
    <div class="timez" id="countdowntimer" style="display: block; float:left; margin-left:10px"></div>

    <br>
    <div class="timemin">
        <div style="float:right; font-weight: bold;">Số câu: &nbsp;</div>
        <div id="current_que" style="float:right; font-weight: bold;">0</div>
        <div style="float:right; font-weight: bold;"> &nbsp;/ &nbsp;</div>

        <div id="total_que" style="float:right; font-weight: bold;">20</div>

    </div>

    <div id="load_questions"></div>

    <div class="button-container">
        <input type="button" class="buttonprev" id="btnPrev" value="Câu trước" onclick="load_previous();">&nbsp;
        <input type="button" class="buttonnext" id="btnNext" value="Câu tiếp theo" onclick="load_next();">
    </div>


    <!-- end editing -->
</div>



<script type="text/javascript">
// function load_total_que() {
//     var xmlhttp = new XMLHttpRequest(); // XMLHttpRequest để tương tác với máy chủ
//     xmlhttp.onreadystatechange = function() {
//         // nếu trạng thái của yêu cầu là 4 và trạng thái HTTP là 200, 
//         if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//             // nội dung phản hồi sẽ được gán vào phần tử HTML có id là "total_que"
//             totalQuestion = xmlhttp.responseText;
//             document.getElementById("total_que").innerHTML = totalQuestion;
//         }
//     };
//     // một yêu cầu HTTP GET được tạo để tải nội dung từ tệp PHP "load_total_que.php"
//     xmlhttp.open("GET", "forajax/load_total_que.php", true);
//     xmlhttp.send(null); // hàm send(null) dùng để gửi yêu cầu đến máy chủ 
// }

var i = 0
var valuesArray = <?php echo json_encode($values_array); ?>;
var totalQuestion = <?= $num_questions ?>;

var id = 0;  // khởi tạo biến questionno và gán bằng 1
load_questions(); // gọi hàm load_questions(questionno) để tải câu hỏi đầu tiên

// Hàm load_questions(questionno) được sử dụng để gửi yêu cầu Ajax đến một trang PHP để lấy câu hỏi từ CSDL
// Tham số questionno được truyền vào để chỉ định số thứ tự của câu hỏi được yêu cầu
function load_questions() {
    if (i == 0) {
        document.getElementById('btnPrev').style.display = 'none'
    }

    id = valuesArray[i];

    // đưa giá trị của biến questionno vào phần tử HTML có id là "current_que"
    // và hiển thị số câu hỏi hiện tại trên giao diện
    document.getElementById("current_que").innerHTML = i+1;
    // XMLHttpRequest để gửi yêu cầu HTTP đến server và nhận lại kết quả từ server mà không cần tải lại trang
    var xmlhttp = new XMLHttpRequest(); 
    xmlhttp.onreadystatechange = function() { // theo dõi trạng thái của đối tượng XMLHttpRequest
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { // kiểm tra trạng thái của XMLHttpRequest
            if (xmlhttp.responseText == "over") { // nếu phản hồi trả về là "over"
                // window.location = "result.php"; // chuyển hướng đến trang kết quả 
            } else { // nếu không phản hồi over thì hiển thị câu hỏi tiếp theo
                document.getElementById("load_questions").innerHTML = xmlhttp.responseText;
                // load_total_que(); // hiển thị số lượng câu hỏi
                document.getElementById("total_que").innerHTML = totalQuestion;
            }

        }
    };
    // sử dụng xmlhttp để tạo một yêu cầu GET HTTP đến tệp load_questions.php nằm trong thư mục forajax trên server
    xmlhttp.open("GET", "forajax/load_questions.php?id=" + id, true);
    // chuỗi kết hợp của địa chỉ tệp và tham số questionno để truy vấn thông tin câu hỏi cần tải
    // true để bật chế độ bất đồng bộ cho yêu cầu GET
    xmlhttp.send(null); // hàm send(null) dùng để gửi yêu cầu đến máy chủ 
}

//Hàm radioclick được sử dụng để lưu câu trả lời của ngdùng vào session khi họ chọn câu trả lời cho một câu hỏi trắc nghiệm.
function radioclick(radiovalue, id) { // radiovalue là câu trả lời được chọn, questionno là stt câu hỏi
   
    // hàm sử dụng đối tượng XMLHttpRequest để gửi yêu cầu đến trang save_answer_in_session.php
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

        }
    };
    // sử dụng xmlhttp để tạo một yêu cầu GET HTTP đến tệp save_answer_in_session.php nằm trong thư mục forajax trên server
    xmlhttp.open("GET", "forajax/save_answer_in_session.php?id=" + id + "&value1=" + radiovalue, true);
    // true để bật chế độ bất đồng bộ cho yêu cầu GET
    xmlhttp.send(null); // hàm send(null) dùng để gửi yêu cầu đến máy chủ 

}

// Hàm load_previous được sử dụng để tải câu hỏi trước
function load_previous() {
    if (i == totalQuestion - 1) {
        document.getElementById('btnNext').value = 'Câu tiếp theo';
        document.getElementById('btnNext').className = 'buttonnext';
    }

    i -= 1; // giảm questionno xuống 1
    if (i == 0) {
        document.getElementById('btnPrev').style.display = 'block';
    }
    load_questions(); // load câu hỏi vừa được tính
}

// Hàm load_previous được sử dụng để tải câu hỏi sau
function load_next() {
    document.getElementById('btnPrev').style.display = "block";
    if (i === totalQuestion - 1) {
        window.location = "result.php";
    } else {
        if (i === totalQuestion - 2) {
            // câu kế cuối
            document.getElementById('btnNext').value = 'Kết thúc';
            document.getElementById('btnNext').className = 'buttonend';
        }
        
        i += 1; // lấy câu tiếp theo
        load_questions(); // load câu hỏi vừa được tính
    }


}
</script>