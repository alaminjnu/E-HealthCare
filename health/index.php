<?php
@session_start();
include("include/banner.php");
?>

<?php
include("include/header.php");
?>

<div class="body">
    <div id="featured">
        <h3>Welcome to E-health Care!</h3>
        <p>This website will help you find hospitals,diagnostics,ambulances in Bangladesh. you also get some important tips about your health.you can find some important link like <b style="color:#F00">BLOOD</b>
        <p>If you're having problems with this site, then don't hesitate to ask. <a href="#"></a> </p>
        <input type="button" value="Read more" onClick="parent.location='about.html';"/>
    </div>
    <ul class="blog">
        <li>
            <div>
                <a href="blog.html"><img src="images/health-tips.png" alt=""/></a>
                <p>Here you can take some tips about maintaining a sound health. Hope it will help you.</p>
                <a href="blog.html">Click to read more</a>
            </div>
        </li>
        <li>
            <div>
                <a href="blog.html"><img src="images/linklogo.jpg" alt=""/></a>
                <p>Need blood??????? Need blood??????? Need blood??????? Need blood??????? Need blood??????? Need blood????</p>
                <a href="blog.html">Click to read more</a>
            </div>
        </li>
        <li>
            <div>
                <a href="blog.html"><img src="images/add.jpg" alt=""/></a>
                <p>40% discount !!40% discount!!40% discount!!on every medicine.Get a Hurry!!! all are good at quality...</p>
                <a href="blog.html">Click to read more</a>
            </div>
        </li>
    </ul>
</div>

<?php
include("include/footer.php");
?>