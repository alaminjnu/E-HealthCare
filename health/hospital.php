<?php
include("include/banner.php");
?>
<?php
include("include/header.php");
include("include/config.php");

?>
<div id="body">
  <div class="containerhos">
    <div class="photoplaceholder"> <img src="images/02.jpg" width="330" height="200" alt="Doctor Image"> </div>
    <div class="query">
      <form name="form1" method="post" action="hospitalsresult.html">
        <fieldset>
          <legend>Hospital's Query</legend>
          <ul>
           <li>
             <label for="area">Area :</label>
            	 <!-- <select name="area" id="area">
            	  	 <option>==Choose==</option>
                 </select>-->
                 <?php
                 $query = "SELECT * FROM hospital";
                 $result = mysql_query ($query)  or die ("Error in query: $query. ".mysql_error());
                 echo "<select>";
                 while ($row = mysql_fetch_array($result))
                 {
                  echo "<option value=".$row['location'].">".$row['location']."</option>";
                }
                echo "</select>";
                ?>
              </li>
              <li>
                <label for="hospital">Hospital :</label>
                <?php
                $query = "SELECT * FROM hospital";
                $result = mysql_query ($query)  or die ("Error in query: $query. ".mysql_error());
                echo "<select>";
                while ($row = mysql_fetch_array($result))
                {
                  echo "<option value=".$row['name'].">".$row['name']."</option>";
                }
                echo "</select>";
                ?>
              </select>
            </li>
            <li>
              <input type="submit" name="search" id="search" value="Submit">
            </li>
          </ul>
        </fieldset>
      </form>
    </div>
  </div>
</div>


<?php
include("include/footer.php");
?>