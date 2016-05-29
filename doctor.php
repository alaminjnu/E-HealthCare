<?php
if (!isset($_SESSION)) {
    session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) {
    // For security, start by assuming the visitor is NOT authorized. 
    $isValid = False;

    // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
    // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
    if (!empty($UserName)) {
        // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
        // Parse the strings into arrays. 
        $arrUsers = Explode(",", $strUsers);
        $arrGroups = Explode(",", $strGroups);
        if (in_array($UserName, $arrUsers)) {
            $isValid = true;
        }
        // Or, you may restrict access to only certain users based on their username. 
        if (in_array($UserGroup, $arrGroups)) {
            $isValid = true;
        }
        if (($strUsers == "") && true) {
            $isValid = true;
        }
    }
    return $isValid;
}

$MM_restrictGoTo = "login.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("", $MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {
    $MM_qsChar = "?";
    $MM_referrer = $_SERVER['PHP_SELF'];
    if (strpos($MM_restrictGoTo, "?"))
        $MM_qsChar = "&";
    if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0)
        $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
    $MM_restrictGoTo = $MM_restrictGoTo . $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
    header("Location: " . $MM_restrictGoTo);
    exit;
}
?>
<?php
require_once('connections/health.php');

mysql_select_db("health") or die(mysql_error());
$query_expertise = "SELECT distinct expertness FROM doctor";
$expertise = mysql_query($query_expertise) or die(mysql_error());
$row_expertise = mysql_fetch_assoc($expertise);
$totalRows_expertise = mysql_num_rows($expertise);
?>
<?php
include("include/banner.php");
?>
<script>
    

    function get_location()
    {
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState===4 && xmlhttp.status===200)
            {
                document.getElementById("location_list").innerHTML=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","list/list_location.php?expertness="+document.getElementById("expertise").value,true);
        // "&doctor_name="+document.getElementById("doctor_lists").value+
        // "&hospital="+document.getElementById("hospital_lists").value,true);
        xmlhttp.send();
    }

    function get_result()
    {
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState===4 && xmlhttp.status===200)
            {
                document.getElementById("full_info").innerHTML=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","list/result.php?expertness="+document.getElementById("expertise").value+
            // "&doctor_name="+document.getElementById("doctor_lists").value+
        "&aDate="+document.getElementById("appoint_date").value+
            "&location="+document.getElementById("location_lists").value,true);

        xmlhttp.send();
    }
</script>
<?php
include("include/header.php");
?>
<div id="container">
    <div id="formFull">
        <?php
        if (isset($_GET['error'])) {
            echo "<h3 style='color:red text-align:center'>".$_GET['error']."</h3>";
        }
        ?>
        <form class="searchForm" name="form1" method="post">
            <fieldset>
                <legend>Doctor's Query</legend>
                <div align="center">          
                    <ul>
                        <li>
                            <label for="appoint_date">Appointment Date:</label>
                            <select name="appoint_date" id="appoint_date">
                                <option value="0">===SELECT APPOINTMENT DATE===</option>
                                <?php
                                for ($i = 1; $i <= 5; $i++) {
                                    $bookingTime = mktime(0, 0, 0, date("m"), date("d") + $i, date("Y"));
                                    ?>
                                    <option value="<?php echo date("d-m-Y", $bookingTime); ?>">
                                    <?php echo date("d-m-Y", $bookingTime); ?>
                                    </option>
<?php } ?>
                            </select>
                        </li>

                        <li>
                            <label for="expertise">Expertise:</label>


                            <select name="expertise" id="expertise" 
                                    required="required" onchange="get_location(this.value);">
                                <option value="0" label="===SELECT Expertise==="> ===SELECT Expertise===</option>
                                    <?php do { ?>
                                    <option value="<?php echo $row_expertise['expertness'] ?>"<?php if (!(strcmp($row_expertise['expertness'], $row_expertise['expertness'])))  ?>>
    <?php echo $row_expertise['expertness'] ?>
                                    </option>

                                <?php
                                } while ($row_expertise = mysql_fetch_assoc($expertise));
                                $rows = mysql_num_rows($expertise);
                                if ($rows > 0) {
                                    mysql_data_seek($expertise, 0);
                                    $row_expertise = mysql_fetch_assoc($expertise);
                                }
                                ?>
                            </select>

                            </font>
                        </li>
                        

                        <li>
                            <label for="location_list">Location:</label>
                            <font id="location_list"> 
                            <select id="location_list" name="location_list">
                                <option value="0">===NONE===</option>
                            </select>
                            </font>
                        </li>

                        <li>
                            <div align="center">

                                <input type="button" name="full_info" value="Show Result"
                                       id="button1" tabindex="4" onclick="get_result()">
                            </div>

                        </li>
                    </ul>
            </fieldset>
        </form>
        <div id="fare_query_result">
            <fieldset class="signup_fieldset">
                <legend id="legend">DOCTOR'S QUERY RESULT</legend>
                <div id="full_info">
                    Give All Information About Your doctor
                </div>
            </fieldset>
        </div>
    </div>

</div>
</div>

<?php
include("include/footer.php");
?>