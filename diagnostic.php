<?php
include("include/banner.php");
?>
<?php
include("include/header.php");
?>
 
     <div id="body">
  <div class="containerhos">
    <div class="photoplaceholder"> <img src="images/05.jpg" width="330" height="200" alt="Doctor Image"> </div>
    <div class="query">
      <form name="form1" method="post" action="diagnosticresult.html">
        <fieldset>
          <legend>Diagnostic's Query</legend>
            <ul>
              <li>
                <label for="area">Area :</label>
                <select name="area" id="area">
                   <option>==Choose==</option>
                </select>
              </li>
                <li>
                  <label for="diagnostic">Diagnostic :</label>
                  <select name="diagnostic" id="diagnostic">
                     <option>==Choose==</option>
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