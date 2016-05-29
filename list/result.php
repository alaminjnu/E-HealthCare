<?php
require_once('../Connections/health.php');
// *** Validate request to login to this site.
@session_start();
?>
<?php
if (isset($_GET['go_to'])) {
    @session_start();
    $username = $_GET['user_name'];
    $doc_id = $_GET['doctor_id'];
    $date = $_GET['aDate'];
    $doctor_name = $_GET['doctor_name'];
    $qualification = $_GET['qualification'];
    $location = $_GET['location'];
    $hospital = $_GET['hospital'];
    $visit = $_GET['visit'];
    $user_id = $_SESSION['user_id'];
    //check if the doctor has any appointment left
    include '../connections/health.php';
    $Query = "SELECT count(`doctor_id`) as `total_reservation` 
                                FROM `reservation` WHERE  `doctor_id`=$doc_id 
                                AND `date`='$date'";
    //Run the Query
    $result = mysql_query($Query) or die(mysql_error());
    $row = mysql_fetch_assoc($result);
    $Total_reservation = $row['total_reservation'];
    //Check if the reservation left
    if ($Total_reservation != 2&&$Total_reservation<2) {
        //Query to check if the user has already reserved
        $Query = "SELECT * FROM `reservation` 
                                    WHERE `user_id`=$user_id AND `doctor_id`=$doc_id AND `date`='$date'";
        //Run the Query
        $result = mysql_query($Query) or die(mysql_error());
        //Check if the user has reserved or not
        if (mysql_num_rows($result) == 0) {
            //cleann the output
            ob_clean();
            //redirect the page
            header("Location: http://localhost/health/printing/index.php?doctor_id=$doc_id&user_name=$username&doctor_name=$doctor_name&qualification=$qualification&hospital=$hospital&location=$location&visit=$visit&aDate=$date");
        }
        //print the error messege if the user is registered
        else {
            ob_clean();
            header("Location: http://localhost/health/doctor.php?error=YOU ARE ALREADY REGISTERED..");
        }
    }
    //error messege if there is no rreservation left
    else {
        ob_clean();
        header("Location: http://localhost/health/doctor.php?error=NO RESERVATION LEFT. TRY ANOTHER..");
    }
}
?>

<style>
    b{
        color: red;
    }
</style>
<?php
if (!function_exists("GetSQLValueString")) {

    function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {
        if (PHP_VERSION < 6) {
            $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
        }

        $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

        switch ($theType) {
            case "text":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "long":
            case "int":
                $theValue = ($theValue != "") ? intval($theValue) : "NULL";
                break;
            case "double":
                $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
                break;
            case "date":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "defined":
                $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
                break;
        }
        return $theValue;
    }

}

mysql_select_db($database_health, $health);

$expertness = $_GET['expertness'];
//$doctor_name = $_GET['doctor_name'];
//$hospital = $_GET['hospital'];
$location = $_GET['location'];
$date = $_GET['aDate'];

$query_result_details = "SELECT *
FROM doctor
WHERE expertness = '" . $expertness . "'
AND chamber='" . $location . "'";
//AND doctor_name = '".$doctor_name."'
//AND hospital = '".$hospital."'
$result_details = mysql_query($query_result_details, $health) or die(mysql_error());
$row_result_details = mysql_fetch_assoc($result_details);
$totalRows_result_details = mysql_num_rows($result_details);
?>

<table border='1px solid' width='450'>
    <thead>
        <tr>
            <th>Details of Doctor</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($totalRows_result_details > 0) {
            do {
                ?>
                <tr>
                    <td>
                        <span>
                            Expertness: <?php echo $row_result_details['expertness']; ?></span></br></br>
                        Doctor id: <?php echo $row_result_details['doctor_id']; ?></br></br>
                        <?php $doc_id = $row_result_details['doctor_id']; ?>
                        Doctor Name: <?php echo $row_result_details['doctor_name']; ?></br></br>
                        location: <?php echo $row_result_details['chamber']; ?> </br></br>
                        Qualification: <?php echo $row_result_details['qualification']; ?></br></br> 
                        Hospital: <?php echo $row_result_details['hospital']; ?></br></br>
                        Visit: <?php
                echo $row_result_details['visit'];
                echo "Taka Only";
                        ?></br></br>
                        date:<?php echo $date; ?>

                        <form action="list/result.php" method="GET">
                            <input type="hidden" name="user_name" value="<?php echo $row_result_details['doctor_name']; ?>">
                            <input type="hidden" name="doctor_id" value="<?php echo $doc_id; ?>">
                            <input type="hidden" name="aDate" value="<?php echo $date; ?>">
                            <input type="hidden" name="doctor_name" value="<?php echo $row_result_details['doctor_name']; ?>">
                            <input type="hidden" name="qualification" value="<?php echo $row_result_details['qualification']; ?>">
                            <input type="hidden" name="location" value="<?php echo $row_result_details['chamber']; ?>">
                            <input type="hidden" name="hospital" value="<?php echo $row_result_details['hospital']; ?>">
                            <input type="hidden" name="visit" value="<?php echo $row_result_details['visit']; ?>">
                            <input type="submit" name="go_to" value="Get Appoinment">
                        </form>

                    </td>
                </tr>
            <?php } while ($row_result_details = mysql_fetch_assoc($result_details));
            ?>
            <?php
        } else {
            echo "Nothing Can Found";
        }
        ?>
    </tbody>
</table>