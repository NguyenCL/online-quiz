<?php
include "../connection.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cate_id = $_POST['id'];
    $current_status = $_POST['currentStatus'];
    // đảo ngược trạng thái: true => false, false => true
    $reverse_status = $current_status ? false : true;

    mysqli_query($link,"update exam_category set status='$reverse_status' where id=$cate_id") or die(mysqli_error($link));

    echo true;
}