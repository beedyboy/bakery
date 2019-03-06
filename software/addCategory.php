<?php
 
include_once('classes/functions.php'); 
?> 
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
 
<form id="addSubCategory" role="form">
<center><h4><i class="icon-plus-sign icon-large"></i> Add Sub-Category  </h4></center>
<hr />
<div id="ac"> 
<input type="hidden" name="action" value="addSubCategory" />
<span>Main Category : </span>
<select name="main" style="width:215px; height:35px; margin-left:-5px;" required>
<option>--Select One--</option>
<option value="C">Continental</option>
<option value="L">Local Dishes</option> 
<option value="D">Drinks</option> 
<option value="S">Soup</option> 
</select>
<br>
<span>Sub Category: </span><input type="text" style="width:215px; height:25px;" name="sub" required ><br> 
 <span></span> <br>
<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:157px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
<br />
<div id="add-bottom" class="alert hide" style="margin:20px 0 0;"></div>
</div>
</form>
<?php include('footer.php');?>