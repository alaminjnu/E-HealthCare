<?php
require_once('connections/health.php');

mysql_select_db("health") or die(mysql_error());
$query_expertise = "SELECT distinct facility FROM service";
$facilities = mysql_query($query_expertise) or die(mysql_error());
$row_facilities = mysql_fetch_assoc($facilities);
/* @var $totalRows_facilities type */
$totalRows_facilities = mysql_num_rows($facilities);
?>
<?php
include("include/banner.php");
?>
<script>
    function get_area()
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
                document.getElementById("area_list").innerHTML=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","list2/list_area.php?facility="+document.getElementById("facilities").value,true);
        // "&doctor_name="+document.getElementById("doctor_lists").value+
        // "&hospital="+document.getElementById("hospital_lists").value,true);
        xmlhttp.send();
    }

    function get_answer()
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
                document.getElementById("full_information").innerHTML=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","list2/answer.php?facility="+document.getElementById("facilities").value+
            // "&doctor_name="+document.getElementById("doctor_lists").value+
        //"&aDate="+document.getElementById("appoint_date").value+
            "&area="+document.getElementById("area_lists").value,true);

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
                <legend>Services Query</legend>
                <div align="center">          
                    <ul>
                        <li>
                            <label for="facilities">Facilities:</label>


                            <select name="facilities" id="facilities" 
                                    required="required" onchange="get_area(this.value);">
                                <option value="0" label="===SELECT Facilities==="> ===SELECT Facilities===</option>
                                    <?php do { ?>
                         <option value="<?php echo $row_facilities['facility'] ?>"<?php if (!(strcmp($row_facilities['facility'], $row_facilities['facility'])))  ?>>
    <?php echo $row_facilities['facility'] ?>
                                    </option>

                                <?php
                                } while ($row_facilities = mysql_fetch_assoc($facilities));
                                $rows = mysql_num_rows($facilities);
                                if ($rows > 0) {
                                    mysql_data_seek($facilities, 0);
                                    $row_facilities = mysql_fetch_assoc($facilities);
                                }
                                ?>
                            </select>

                            </font>
                        </li>
                            <li>
                            <label for="area_list">Area:</label>
                            <font id="area_list"> 
                            <select id="area_list" name="area_list">
                                <option value="0">===NONE===</option>
                            </select>
                            </font>
                        </li>

                        <li>
                            <div align="center">

                                <input type="button" name="full_information" value="Show Result"
                                       id="button1" tabindex="4" onclick="get_answer();">
                            </div>

                        </li>
                    </ul>
            </fieldset>
        </form>
<div id="fare_query_result">
            <fieldset class="signup_fieldset">
                <legend id="legend">Services QUERY RESULT</legend>
                <div id="full_information">
                    Give All Information About Your service.
                </div>
            </fieldset>
        </div>
    </div>

</div>

<?php
include("include/footer.php");
?>