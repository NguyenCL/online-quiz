<?php
session_start();
include "../connection.php";

$id="";
$question="";
$question_img = "";
$opt1="";
$opt2="";
$opt3="";
$opt4="";
$answer="";
$count=0;
$ans="";

$queno=$_GET["id"];

if(isset($_SESSION["answer"][$queno]))
{
    $ans=$_SESSION["answer"][$queno];
}
// echo("select * from questions where category='$_SESSION[exam_category]' && id=$_GET[id]");
$res=mysqli_query($link, "select * from questions where id=$queno");
// $res=mysqli_query($link, "select * from questions where category='$_SESSION[exam_category]' && id=$_GET[id]");

$count = $_SESSION['total_question']; 

if($count==0)
{
    echo "over";
}
else{
    while($row=mysqli_fetch_array($res)){
        // random các lựa chọn
        $options = array($row["opt1"], $row["opt2"], $row["opt3"], $row["opt4"]);
        shuffle($options);
        
        $id=$row["id"];
        $question=$row["question"];
        $question_img=$row["img_url"];
        $opt1 = $options[0];
        $opt2 = $options[1];
        $opt3 = $options[2];
        $opt4 = $options[3];
    }
    ?>
<br>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css\question.css">


</head>

<body>
    <table class="tablez">
        <tr>
            <td class="tdz" colspan="2">
                <?php echo "Câu hỏi: ".$question;?>
            </td>
        </tr>
        <?php // chổ chỉnh tỉ lệ
            if ($question_img) {
                ?>
                <tr>
                    <td style="text-align:center" colspan="2">
                        <?= "<img style='width:90%; height:20rem' src='admin/". $question_img ."' />" ?>
                    </td>
                </tr>
                <?php
            }
        ?>
    </table>

    <!-- table questions -->
    <table style="margin-left:10px;">

        <!-- op1 -->
        <tr>

            <td>
                <label class="option">
                    <!-- Dấu chám radio -->
                    <input type="radio" name="r1" id="r1" value="<?php echo $opt1;?>"
                        onclick="radioclick(this.value,<?php echo $id ?>)" <?php
            if($ans==$opt1){
                echo "checked";
            } 
            ?>>

                    <!-- Câu trả lời -->
                    <?php
            if(strpos($opt1,'images/')!==false){
                ?>
                    <img src="admin/<?php echo $opt1; ?>" height="30" width="30">

                    <?php
            }
            else{
                echo $opt1;
            }
            
            ?>
                </label>

            </td>
        </tr>

        <!-- op2 -->
        <tr>
            <td>
                <label class="option">

                    <input type="radio" name="r1" id="r1" value="<?php echo $opt2;?> "
                        onclick="radioclick(this.value,<?php echo $id ?>)" <?php
            if($ans==$opt2){
                echo "checked";
            } 
            ?>>

                    <?php
            if(strpos($opt2,'images/')!==false){
                ?>
                    <img src="admin/<?php echo $opt2; ?>" height="30" width="30">

                    <?php
            }
            else{
                echo $opt2;
            }
            
            ?>
                </label>
            </td>

        </tr>

        <!-- op3 -->
        <tr>
            <td>
                <label class="option">

                    <input type="radio" name="r1" id="r1" value="<?php echo $opt3;?>"
                        onclick="radioclick(this.value,<?php echo $id ?>)" <?php
            if($ans==$opt3){
                echo "checked";
            } 
            ?>>


                    <?php
            if(strpos($opt3,'images/')!==false){
                ?>
                    <img src="admin/<?php echo $opt3; ?>" height="30" width="30">

                    <?php
            }
            else{
                echo $opt3;
            }
            
            ?>
                </label>
            </td>
        </tr>

        <!-- op4 -->
        <tr>
            <td>
                <label class="option">

                    <input type="radio" name="r1" id="r1" value="<?php echo $opt4;?>"
                        onclick="radioclick(this.value,<?php echo $id ?>)" <?php
        if($ans==$opt4){
            echo "checked";
        } 
        ?>>

                    <?php
        if(strpos($opt4,'images/')!==false){
            ?>
                    <img src="admin/<?php echo $opt4; ?>" height="30" width="30">

                    <?php
        }
        else{
            echo $opt4;
        }
        
        ?>
                </label>
            </td>
        </tr>

    </table>
</body>

</html>
<!-- table a question -->

<?php

}
?>