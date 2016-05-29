<?php
include("banner.php");
?>

<?php
include("header.php");
?>
<?php
//If variables are set 
if(isset($_POST['submit'])&&isset($_POST['doctor_id'])
    &&isset($_POST['expertness'])
    &&isset($_POST['doctor_name'])
    &&isset($_POST['chamber'])
    &&isset($_POST['qualification'])
    &&isset($_POST['hospital'])
    &&isset($_POST['visit'])){

            //storing the values
            $doctor_id=$_POST['doctor_id'];
            $expertness=$_POST['expertness'];
            $doctor_name=$_POST['doctor_name'];
            $chamber=$_POST['chamber'];
            $qualification=$_POST['qualification'];
    /* @var $hospital type */
            $hospital=$_POST['hospital'];
            $visit=$_POST['visit'];
            

            //if values are not empty
            if(!empty($doctor_id)&&!empty($expertness)&&!empty($doctor_name)&&!empty($chamber)&&!empty($qualification)&&!empty($hospital)&&!empty($visit)){
        //connect to the database
    $link = mysql_connect("localhost", "root", "") or die("Could not connect: " . mysql_error());
    //select database
    mysql_select_db("health") or die (mysql_error());
    //Creating the Query
     $sql="INSERT INTO doctor(`doctor_id`, `expertness`,`doctor_name`, `chamber`,`qualification`,`hospital`,`visit`) VALUES ($doctor_id,'$expertness','$doctor_name','$chamber','$qualification','$hospital',$visit);";
     //Running the Query
    $result=mysql_query($sql);
    //Check if Query has run successfully
    if($result){
        echo "<h1>Insertion Completed !!</h1>";
    }
    //Printing the mysql error
    else{
        echo mysql_error();
    }
}else{
    echo "<h3>PLease enter all the informations</h3>";
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
  <title>Admin-Add Doctor</title>
  <link rel="stylesheet" href="css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  <section class="container">
    <div class="login">
        
        <div align="center">
      <h1>Add Doctor</h1>
      <form action="doctor_add.php" method="POST">

    

        <!--<label for="doctor_id">Doctor_id</label></p>
        <input id="doctor_id" name="doctor_id" placeholder="01" required="" type="text"></p> -->  
        
        <label for="expertness">Create Expertness</label></p>
        <input id="expertness" name="expertness" placeholder="expertness" required="" tabindex="2" type="text"></p>
        
        <label for="doctor_name">Create a Name</label></p>
        <input  id="doctor_name" name="doctor_name" required="" type="text"></p>



        <label for="chamber">Create an Chamber</label></p>
        <input id="chamber" name="chamber" required="" type="text"></p>

        <label for="qualification">qualification</label></p>
        <input id="qualification" name="qualification" placeholder="MBBS" required="" type="text"></p>  

        <label for="hospital">hospital</label></p>
        <input id="hospital" name="hospital" placeholder="hos" required="" type="text"></p> 


        <label for="visit">visit</label></p>
        <input id="visit" name="visit" placeholder="visit" required="" type="text"></p> 



      
    
    <input class="button" name="submit" id="submit" tabindex="5" value="InSert Data!" type="submit">   
   
</form>
        </div>
    </div>
  </section>
</body>
</html>
