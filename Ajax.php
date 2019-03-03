<?php
include 'includes/dbh.inc.php';
date_default_timezone_set('Europe/Berlin');
    if(isset($_POST['data'])){
        $datetime =date('Y/m/d', time());
        $calories = $_POST['data'];
        $DailyWeight = $_POST['data2'];
        $sql = "INSERT INTO dailystats (date, DailyWeight, calories) VALUES ('$datetime', '$DailyWeight','$calories')";
        $result = mysqli_query($conn, $sql);
        echo $datetime;
    }

    if(isset($_POST['getData'])){
        $DataCalories = array();
        $DataWeight = array();
        $sql = "SELECT * FROM dailystats";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            array_push($DataCalories, $row['calories']);
            array_push($DataWeight, $row['DailyWeight']);

        }
        $Data = [$DataCalories, $DataWeight];
        echo json_encode($Data);
    }    

    if(isset($_POST['Calories'])){
        $FoodName = $_POST['FoodName'];
        $Calories = $_POST['Calories'];
        $Protein = $_POST['Protein'];
        $Carbohydrates = $_POST['Carbohydrates'];
        $Fat = $_POST['Fat'];

        $sql = "INSERT INTO foodlist (FoodName, Calories, Protein, Carbohydrates, Fat) VALUES ('$FoodName', '$Calories','$Protein', '$Carbohydrates', '$Fat')";
        $result = mysqli_query($conn, $sql);
        echo $FoodName;
    }    

    if(isset($_POST['getFood'])){
        $Foodlist = array();
        $sql = "SELECT * FROM foodlist";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            $FoodObject = new stdClass();

            $FoodObject->FoodName = $row['FoodName'];
            $FoodObject->Calories = $row['Calories'];
            $FoodObject->Protein = $row['Protein'];
            $FoodObject->Carbohydrates = $row['Carbohydrates'];
            $FoodObject->Fat = $row['Fat'];

            array_push($Foodlist, $FoodObject);
        }
        echo json_encode($Foodlist);
    }

    if(isset($_POST['Day'])){

        $DayArray = $_POST['dayProfile'];
        
        

    }