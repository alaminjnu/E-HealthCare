<?php
include("banner.php");
?>

<?php
include("header.php");
?>
<?php
//If variables are set 
if(isset($_POST['submit'])&&isset($_POST['user_id'])
    &&isset($_POST['name'])
    &&isset($_POST['email'])
    &&isset($_POST['username'])
    &&isset($_POST['password'])
    &&isset($_POST['access_level'])){

            //storing the values
            $user_id=$_POST['user_id'];
            $name=$_POST['name'];
            $email=$_POST['email'];
            $username=$_POST['username'];
            $password=$_POST['password'];
    /* @var $hospital type */
            $access_level=$_POST['access_level'];
            
            

            //if values are not empty
            if(!empty($user_id)&&!empty($name)&&!empty($email)&&!empty($username)&&!empty($password)&&!empty($access_level)){
        //connect to the database
    $link = mysql_connect("localhost", "root", "") or die("Could not connect: " . mysql_error());
    //select database
    mysql_select_db("health") or die (mysql_error());
    //Creating the Query
     $sql="INSERT INTO user(`user_id`, `name`,`email`, `username`,`password`,`access_level`) VALUES ($user_id,'$name','$email','$username','$password',$access_level);";
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
    echo "<h1>PLease enter all the informations</h1>";
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
  <title>Admin-Add User</title>
  <link rel="stylesheet" href="css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  <section class="container">
    <div class="login">
         <div align="center">
      <h1>Add user</h1>
      <form action="user_add.php" method="POST">

    

        <!--<label for="user_id">User_id</label></p>
        <input id="user_id" name="user_id" placeholder="01" required="" type="text"></p> -->  
        
        <label for="name">Name</label></p>
        <input id="name" name="name" placeholder="name" required="" tabindex="2" type="text"></p>
        
        <label for="email">E-mail</label></p>
        <input  id="email" name="email" required="" type="text"></p>



        <label for="username">Username</label></p>
        <input id="username" name="username" required="" type="text"></p>

        <label for="password">Password</label></p>
        <input id="password" name="password" placeholder="password" required="" type="text"></p>  

        <label for="access_level">Access_Level(User=1,Admin=2)</label></p>
        <input id="access_level" name="access_level" placeholder="acess level" required="" type="text"></p> 
 
    
    <input class="button" name="submit" id="submit" tabindex="5" value="InSert Data!" type="submit">   
   
</form>
         </div>   
    </div>
  </section>
</body>
</html>
