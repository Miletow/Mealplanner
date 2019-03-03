<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<script src="js/graph.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/style.css">

</head>
<body>
        <nav class="navbar navbar-expand-sm bg-light">

                <!-- Links -->
                <ul class="navbar-nav">
                  <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Link 1</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Link 2</a>
                  </li> -->
                  <li class="nav-item">
                    <a id="welcomeMsg" class="nav-link" ></a>
                  </li>
               
                </ul>
                <ul class="navbar-nav ml-auto">
                <?php
                if(!isset($_SESSION['u_first'])){
                        echo '<li class="nav-item">
                            <a id="LoginB" class="modalButton nav-link">Login</a>
                        </li>';
                        
                }else{
                  
                  echo
                  '<form method="POST" action="includes/logout.inc.php"><li class="nav-item">
                           <button type="submit" name="logoutSubmit" class="modalButton nav-link">Logout</button>
                        </li>
                        
                        </form>';
                }
                  ?>
                </ul>
              
              </nav>
    
<br>


<div class="container">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">4</a></li>
  </ul>
</div>
    <div id="PageOne" class="mx-auto w-50 p-5 bg-light ">
    <p>BMI</p>
            <div class="form-group">
                    <label for="usr">Weight:</label>
                    <input type="text" class="form-control" id="weight">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Height:</label>
                    <input type="text" class="form-control" id="height">
                  </div>
                  <button type="button" class="btn btn-success" id="Submit">Submit</button>
                  
            <p style="margin-top: 10px" id="test1"></p>

                  <div style="margin-top: 10px" class="progress">
                        <div class="progress-bar" style="width:0%"></div> 
                      </div><a style="float:right"> BMI > 25% = Fat</a>

            <p id="BMI"></p>
            <p id="test2"></p>

        </div>
        <div id="PageTwo" class="mx-auto w-50 p-5 bg-light ">
              <div class="form-group">
                    <label for="usr">Daily calories:</label>
                    <input type="text" class="form-control" id="calories">
                    <label for="usr">Daily weight:</label>
                    <input type="text" class="form-control" id="DailyWeight">
                    <button type="button" class="btn btn-success" id="SubmitCalories">Submit</button>

                  </div>
                  <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                  <div id="chartContainer2" style="height: 370px; width: 100%;"></div>

<!-- <span id="timeToRender"></span> -->
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        </div>
        <div id="PageThree" class="mx-auto w-50 p-5 bg-light ">
        <p>Meal Planner</p>

        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#CollapseAddtoDB" aria-expanded="false" aria-controls="collapseExample">
    Add food to database
  </button><button class="btn btn-primary ml-3" type="button" data-toggle="collapse" data-target="#CollapseCreateDay" aria-expanded="false" aria-controls="collapseExample">
    Create Day Profile
  </button>
  <div class="collapse mt-2" id="CollapseAddtoDB">
        <label for="usr">Add food to database, Values per 100Gram</label>
                    <input type="text" class="form-control" placeholder="Name" id="foodName">
                    <input type="text" class="form-control" placeholder="Calories" id="foodCalories">
                    <input type="text" class="form-control" placeholder="Protein" id="foodProtein">
                    <input type="text" class="form-control" placeholder="Carbohydrates" id="foodCarbohydrates">
                    <input type="text" class="form-control" placeholder="Fat" id="foodFat">
              <button type="button" class="btn btn-success" id="AddtoDB">Add</button>
</div>
              <!-- <button type="button" class="btn btn-success" id="CreateDay">Create Day Profile</button> -->

              
  <div style="margin-top:10px;" class="collapse" id="CollapseCreateDay">
       <div class="Meals" id="Meals">
       <div class="Meal">
        <p>Meal 1:</p>
        <select class="form-control col-md-5 foodSelect d-inline"  name="" id="foodSelect">
        </select> 
        <input type="text" class="form-control col-md-5 d-inline Amount" placeholder="Amount">
        </div>

        </div>
        <button type="button" class="btn btn-success mt-2" id="CreateDay">Create Day Profile</button>
        <button type="button" class="btn btn-warning mt-2" id="AddIngredient">Add Ingredient</button>
        <button type="button" class="btn btn-warning mt-2" id="AddMeal">Add Meal</button>
        
        <br>
        <br>
        <a class="font-weight-bold mr-4" id="DailyCalories">Calories</a>
        <a class="font-weight-bold mr-4" id="DailyProtein">Protein</a>
        <a class="font-weight-bold mr-4" id="DailyCarbohydrates">Carbohydrates</a>
        <a class="font-weight-bold mr-4" id="DailyFat">Fat</a>
  </div>
        </div>
        <div id="PageFour" class="mx-auto w-50 p-5 bg-light ">
        <div style="height: 100px; background-color: rgba(255,0,0,0.1);">
          <div class="h-100 d-inline-block" style="width: 110px; background-color: lightgray;">Day 1</div>
        </div>
        <div style="height: 100px; background-color: rgba(255,0,0,0.1);">
          <div class="h-100 d-inline-block" style="width: 110px; background-color: lightgray;">Day 1</div>
          <div class="h-100 d-inline-block" style="width: 120px; background-color: lightgray;">Day 2</div>
          <div class="h-100 d-inline-block" style="width: 120px; background-color: lightgray;">Day 3</div>
          <div class="h-100 d-inline-block" style="width: 120px; background-color: lightgray;">Day 4</div>
          <div class="h-100 d-inline-block" style="width: 120px; background-color: lightgray;">Day 5</div>
          <div class="h-100 d-inline-block" style="width: 120px; background-color: lightgray;">Day 6</div>
          <div class="h-100 d-inline-block" style="width: 120px; background-color: lightgray;">Day 7</div>
        </div>
        <!-- <div style="height: 100px; background-color: rgba(255,0,0,0.1);">
          <div class="h-100 d-inline-block" style="width: 110px; background-color: lightgray;">Day 1</div>
          <div class="h-100 d-inline-block" style="width: 120px; background-color: lightgray;">Day 2</div>
          <div class="h-100 d-inline-block" style="width: 120px; background-color: lightgray;">Day 3</div>
          <div class="h-100 d-inline-block" style="width: 120px; background-color: lightgray;">Day 4</div>
          <div class="h-100 d-inline-block" style="width: 120px; background-color: lightgray;">Day 5</div>
          <div class="h-100 d-inline-block" style="width: 120px; background-color: lightgray;">Day 6</div>
          <div class="h-100 d-inline-block" style="width: 120px; background-color: lightgray;">Day 7</div>
        </div> -->
        </div>

       
    
</head>
<body>



<div id="id01" class="modal">
  
  <form method="POST" class="modal-content animate" action="includes/login.inc.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uid" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="pwd" required>
        
      <button class="modalButton" type="submit" name="loginSubmit">Login</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>


<?php

  if(isset($_SESSION['id'])){
?>
<script>
var name = '<?php echo $_SESSION['u_first']; ?>';
$(document).ready(function(){
  $("#welcomeMsg").html("Welcome "+ name);
});
</script>

<?php
}
?>

<script>


</script>
</body>

<script src="js/app.js"></script>
</html>