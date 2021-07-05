<?php
include "./class/databaseFinal.php";
include "./class/score.php";
$score = new Score();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final</title>
</head>

<body>
    <a href="./FinalHOME.php">回首頁</a>
    <!-- POST傳值 -->
    <form action="FinalHW.php" method="post">
        <p>
            <label for="score-name">姓名</label>
            <input type="text" class="form-control" name="score-name" id="score-name" required>
        </p>
        <p>
            <label for="Chinese">中文</label>
            <input type="text" class="form-control" name="Chinese" id="Chinese">
        </p>
        <p>
            <label for="Math">數學</label>
            <input type="text" class="form-control" name="Math" id="Math">
        </p>
        <p>
            <label for="English">英文</label>
            <input type="text" class="form-control" name="English" id="English">
        </p>

        <button type="submit" name="submit" class="btn btn-outline-info">送出</button>
    </form>

    <?php
    // 檢查是否有按下送出按鈕
    if (isset($_POST["submit"])) {
        // 1.把各輸入框的資料設定到$city物件中對應的屬性
        $score->hwName = $_POST["score-name"];
        $score->hwChinese = $_POST["Chinese"];
        $score->hwMath = $_POST["Math"];
        $score->hwEnglish = $_POST["English"];
        // 2.呼叫$city物件中的新增資料的方法
        if ($score->create()) {
            echo '<div class="alert alert-warning my-3" role="alert">
          新增成功
          </div>';
        } else {
            echo '<div class="alert alert-secondary my-3" role="alert">
            稍後再試
           </div>';
        }
    }
    include "./layout/footer.php";
    ?>

<script>
$(document).ready(function(){
$('#example').DataTable();
});
</script>
</body>
</html>