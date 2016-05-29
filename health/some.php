<?php
include("include/config.php") ?>

  <?php

   $query = "SELECT doctor_name FROM doctor" ;
    $result = mysql_query($query);
    echo'<select name="Name">';
    while($row = mysql_fetch_assoc( $result )) {
    echo '<option value="'.$row['doctor_name'].'">' . $row['doctor_name'] . '</option>';
    }
    echo '</select>';
    ?>

     use somehting like this

PHP Code:
    $sql = mysql_query("SELECT DISTINCT id, name FROM products");

    while($row = mysql_fetch_assoc($sql))
    { 
        $dd .= "<option value='{$row['id']}'>{$row['name']}</option>";
    } 
Then just echo out $dd in your html.
HTML Code:

<select name="products" style="width: 222px;">
<? echo $dd; ?>
</select>

