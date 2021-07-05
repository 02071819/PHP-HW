<?php
include "./class/databaseFinal.php";
include "./class/score.php";
$score = new Score();
$data = $score->getAllScore();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1px">
    <a href="./FinalHW.php">新增</a>

        <!-- 欄位名稱 -->
        <tr>
            <td>姓名</td>
            <td>英文</td>
            <td>數學</td>
            <td>中文</td>
            <td>Delete</td>
        </tr>
        <!-- 表格資料 -->
        <?php foreach ($data as $row) : ?>
            <tr>
                <td><?php echo $row["score_name"] ?></td>
                <td><?= $row["English"] ?></td>
                <td><?php echo $row["Math"] ?></td>
                <td><?= $row["Chinese"] ?></td>
                <td>
                    <a href="deleteHW.php?id=<?= $row["id"] ?>">刪除</a>
                </td>
            </tr>
        <?php endforeach; ?>
    
    </table>
</body>

</html>