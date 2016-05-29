<?php
include("banner.php");
?>

<?php
include("header.php");
?>
<?php
//If variables are set 
if(isset($_POST['submit'])&&isset($_POST['doctor_id'])){

            //storing the values
            $doctor_id=$_POST['doctor_id'];
           
            

            //if values are not empty
            if(!empty($doctor_id)){
        //connect to the database
    $link = mysql_connect("localhost", "root", "") or die("Could not connect: " . mysql_error());
    //select database
    mysql_select_db("health") or die (mysql_error());
    //Creating the Query
     $sql="DELETE FROM doctor WHERE doctor_id = $doctor_id";
     //Running the Query
     $result=mysql_query($sql);
    //Check if Query has run successfully
    $doctor_list = "SELECT * FROM doctor";
    
    $doc_result_details = mysql_query($doctor_list, $health) or die(mysql_error());
    $doc_row_result_details = mysql_fetch_assoc($doc_result_details);
    $doc_totalRows_result_details = mysql_num_rows($doc_result_details); 
                    
    if($result){
        echo "<h1> Deletion Complete for id $doctor_id !!</h1>";
    }
    //Printing the mysql error
    else{
        echo mysql_error();
    }
}else{
    echo "<h3>PLease enter the id</h3>";
}
    
}
?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Admin-Delete Doctor</title>
  <link rel="stylesheet" href="css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  <section class="container">
    <div class="login">        


        <div align="center">
      <h1>Delete Doctor</h1>
      <form action="doctor_delete.php" method="POST">

    

        <label for="doctor_id">Doctor_id</label></p>
        <input id="doctor_id" name="doctor_id" placeholder="01" required="" type="text"></p>   
        
       



      
    
    <input class="button" name="submit" id="submit" tabindex="5" value="Delete!" type="submit">   
   
</form>
        </div>
    </div>
  </section>
</body>
</html>
