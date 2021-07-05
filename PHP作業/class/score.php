<?php
// 一、屬性
class Score
{
    public $dbConnect;
    public $id;
    public $hwName;
    public $hwChinese;
    public $hwMath;
    public $hwEnglish;

    // 二、自動執行建構式
    public function __construct()
    {
        $db = new DatabaseFinal();
        $this->dbConnect = $db->getConnection();
    }
    // 三、方法
    // 1.讀取所有city表格資料
    public function getAllScore()
    {
        $sql = "SELECT * FROM student";
        $getData = $this->dbConnect->prepare($sql);
        $getData->execute();
        $data = $getData->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    // 2.新增資料
    public function create()
    {
        $sql = "INSERT INTO student(score_name,Chinese,Math,English)
        VALUES(:score_name,:Chinese,:Math,:English)";
        $addData = $this->dbConnect->prepare($sql);
        $addData->bindParam(":score_name", $this->hwName);
        $addData->bindParam(":Chinese", $this->hwChinese);
        $addData->bindParam(":Math", $this->hwMath);
        $addData->bindParam(":English", $this->hwEnglish);
        // 執行sql指令 同時回傳是否執行成功的布林值
        $result = $addData->execute();
        return $result;
    }
    // 3.根據url的id參數讀取單一筆要編輯的資料
    // public function getOnescore()
    // {
    //     $sql = "SELECT * FROM student WHERE id = :id";
    //     $getOneCity = $this->dbConnect->prepare($sql);
    //     $getOneCity->bindParam(":id", $this->id);
    //     $getOneCity->execute();
    //     $data = $getOneScore->fetchAll(PDO::FETCH_ASSOC);
    //     // 讀出來的該筆資料存到屬性當中
    //     $this->hwName = $data["score-name"];
    //     $this->hwChinese = $data["Chinese"];
    //     $this->hwMath = $data["Math"];
    //     $this->hwEnglish = $data["English"];
    // }
    // 4.更新資料
    // public function update()
    // {
    //     $sql = "UPDATE student
    //     SET city_name = :city_name,
    //         population = :population,
    //         country_code = :country_code
    //         WHERE id = :id";
    //     $updateData = $this->dbConnect->prepare($sql);
    //     $updateData->bindParam(":city_name", $this->city_name);
    //     $updateData->bindParam(":population", $this->population);
    //     $updateData->bindParam(":country_code", $this->country_code);
    //     $updateData->bindParam(":id", $this->id);

    //     $result = $updateData->execute();
    //     return $result;
    // }

    //5.刪除資料
    public function deleteHW(){
        $sql="DELETE FROM student WHERE id = :id";
        $deleteData = $this->dbConnect->prepare($sql);
        $deleteData->bindParam(":id", $this->id);
        $result=$deleteData->execute();
        return $result;
    }
}
?>