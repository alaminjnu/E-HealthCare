<?php
include("banner.php");
?>

<?php
include("header.php");
?>
<?php
//If variables are set 
if(isset($_POST['submit'])&&isset($_POST['service_id'])
    &&isset($_POST['facility'])
    &&isset($_POST['area'])
    &&isset($_POST['name'])
    &&isset($_POST['contact'])
    &&isset($_POST['address'])){

            //storing the values
            $service_id=$_POST['service_id'];
            $facility=$_POST['facility'];
            $area=$_POST['area'];
            $name=$_POST['name'];
            $contact=$_POST['contact'];
    /* @var $hospital type */
            $address=$_POST['address'];
            
            

            //if values are not empty
            if(!empty($service_id)&&!empty($facility)&&!empty($area)&&!empty($name)&&!empty($contact)&&!empty($address)){
        //connect to the database
    $link = mysql_connect("localhost", "root", "") or die("Could not connect: " . mysql_error());
    //select database
    mysql_select_db("health") or die (mysql_error());
    //Creating the Query
     $sql="INSERT INTO service(`service_id`, `facility`,`area`, `name`,`contact`,`address`) VALUES ($service_id,'$facility','$area','$name','$contact','$address');";
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
  <title>Admin-Add Service</title>
  <link rel="stylesheet" href="css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  <section class="container">
    <div class="login">
         <div align="center">
      <h1>Add Service</h1>
      <form action="service_add.php" method="POST">

    

       <!-- <label for="service_id">Service_id</label></p>
        <input id="service_id" name="service_id" placeholder="01" required="" type="text"></p> -->  
        
        <label for="facility">Facility</label></p>
        <input id="facility" name="facility" placeholder="Facility" required="" tabindex="2" type="text"></p>
        
        <label for="area">Area</label></p>
        <input  id="area" name="area" required="" type="text"></p>

        
        <label for="name">Name</label></p>
        <input id="name" name="name" required="" type="text"></p>

        <label for="contact">Contact</label></p>
        <input id="contact" name="contact" placeholder="Phone" required="" type="text"></p>  

        <label for="address">Address</label></p>
        <input id="address" name="address" placeholder="Address" required="" type="text"></p> 
 
    
    <input class="button" name="submit" id="submit" tabindex="5" value="InSert Data!" type="submit">   
   
</form>
         </div>
    </div>
  </section>
</body>
</html>
