<?php
session_start();
include "../connection.php";

$startingQuestionNo = 1; // Đặt giá trị khởi đầu
$res = mysqli_query($link, "SELECT * FROM questions WHERE question_no >= $startingQuestionNo ORDER BY id LIMIT 20");
$count = mysqli_num_rows($res);

if ($count == 0) {
    echo "over";
} else {
    while ($row = mysqli_fetch_array($res)) {
        $question_no[] = $row["question_no"];
        $question[] = $row["question"];
        $opt1[] = $row["opt1"];
        $opt2[] = $row["opt2"];
        $opt3[] = $row["opt3"];
        $opt4[] = $row["opt4"];
        $startingQuestionNo++; // Tăng giá trị để lấy câu hỏi tiếp theo
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Add your CSS styles if needed -->
</head>

<body>

    <!-- Add your existing HTML content here -->

    <!-- Hiển thị tất cả 20 câu hỏi -->
    <?php for ($i = 0; $i < $count; $i++) : ?>
        <div>
            <?php
            echo "Câu " . $question_no[$i] . ": " . $question[$i] . "<br>";
            echo "A. " . $opt1[$i] . "<br>";
            echo "B. " . $opt2[$i] . "<br>";
            echo "C. " . $opt3[$i] . "<br>";
            echo "D. " . $opt4[$i] . "<br>";
            ?>
        </div>
    <?php endfor; ?>

    <!-- Add your existing HTML content here -->

</body>

</html>
