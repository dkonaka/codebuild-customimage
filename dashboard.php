<?php
error_reporting(E_ALL);

session_start();
include_once "config.inc.php";
if(isset($_SESSION['name'])==""){
  header("Location: index.php");
}

$name = $_SESSION['name'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class='bg-light'>
<div class="container mt-4">
  <div class="col-md-6 mx-auto mt-4">
    <div class="jumbotron">

         
<?php
echo "<h2>Hello ".$name."</h2>";

?>
    </div>
 <?php
echo "<select name='' id='categories' class='form-control'>";
echo" <option value='' default>Choose state</option>";

$sth1 = $conn->prepare("SELECT * FROM weather LIMIT 100");
                $sth1->execute();
                while($row1 = $sth1->fetch(PDO::FETCH_ASSOC)){
                $state = $row1['state_name'];
               echo" <option value='$state' name='$state' id=''>$state</option>";
                }



echo "</select>";
?>
<div class="jumbotron" id="output">
            
            </div>
  <a class='btn btn-secondary btn-lg ' href='logout.php' >LogOut</a>
  </div>
        



</div>


<script
			  src="https://code.jquery.com/jquery-3.4.1.js"
			  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
			  crossorigin="anonymous"></script>

  <script>
    $('document').ready(function(){
      
  $("#categories").change(function(){
    var sub_categories = $(this).val();
    //alert(sub_categories);
   
    $.ajax({
      url: "action.php",
      method: "POST", 
      data: {sub_categories},
      success: function(data){
       
        $("#output").html(data);
      }
    })
    
  })
    })
  </script>
</body>
</html>
