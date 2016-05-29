<?php
require_once('../Connections/health.php');
// *** Validate request to login to this site.
@session_start();
?>
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

$facility = $_GET['facility'];
$area = $_GET['area'];

$query_result_details = "SELECT *
FROM service
WHERE facility = '" . $facility . "'
AND area='" . $area . "'";

$result_details = mysql_query($query_result_details, $health) or die(mysql_error());
$row_result_details = mysql_fetch_assoc($result_details);
$totalRows_result_details = mysql_num_rows($result_details);
?>
<table border='1px solid' width='450'>
    <thead>
        <tr>
            <th>Details of Service</th>
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
                            Facility: <?php echo $row_result_details['facility']; ?></span></br></br>
                            Area: <?php echo $row_result_details['area']; ?> </br></br>
                            Name: <?php echo $row_result_details['name']; ?> </br></br>
                            Contact: <?php echo $row_result_details['contact']; ?> </br></br>
                            Address: <?php echo $row_result_details['address']; ?> </br></br>
                            
                             <form action="list2/answer.php" method="GET">
                                 <input type="hidden" name="area" value="<?php echo $row_result_details['area']; ?>">
                                 <input type="hidden" name="facility" value="<?php echo $row_result_details['facility']; ?>">
                                 
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