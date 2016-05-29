<?php
@include ("include/header1.php");
?>
<?php
//If variables are set 
if(isset($_POST['submit'])&&isset($_POST['name'])
    &&isset($_POST['email'])
    &&isset($_POST['username'])
    &&isset($_POST['password'])){

            //storing the values
            $name=$_POST['name'];
            $email=$_POST['email'];
            $username=$_POST['username'];
            $password=$_POST['password'];

            //if values are not empty
            if(!empty($name)&&!empty($email)&&!empty($username)&&!empty($password)){
        //connect to the database
    $link = mysql_connect("localhost", "root", "") or die("Could not connect: " . mysql_error());
    //select database
    mysql_select_db("health") or die (mysql_error());
    //Creating the Query
     $sql="INSERT INTO `user`(`name`, `email`, `username`, `password`) VALUES ('$name','$email','$username','$password');";
     //Running the Query
    $result=mysql_query($sql);
    //Check if Query has run successfully
    if($result){
        echo "<h3>Thank you for registering !!</h3>";
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
<div  class="form">
 <form action="register.php" method="POST">
    
   
   <p class="contact"><label for="name">Name</label></p>
    <input id="name" name="name" placeholder="First and last name" required="" tabindex="1" type="text">
        
        <p class="contact"><label for="email">Email</label></p>
        <input id="email" name="email" placeholder="example@domain.com" required="" type="email">   
        <p class="contact"><label for="username">Create a username</label></p>
        <input id="username" name="username" placeholder="username" required="" tabindex="2" type="text">
        
        <p class="contact"><label for="password">Create a password</label></p>
        <input type="password" id="password" name="password" required="" type="text">
    
    <input class="buttom" name="submit" id="submit" tabindex="5" value="Sign me up!" type="submit">   
</form>
</div>
<?php

?>
<?php
@include ("include/footer.php");
?>