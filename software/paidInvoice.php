 <?php
 
include_once('classes/functions.php'); 
?> 
<style>
#result {
	height:20px;
	font-size:16px;
	font-family:Arial, Helvetica, sans-serif;
	color:#333;
	padding:5px;
	margin-bottom:10px;
	background-color:#FFFF99;
}
#country{
	border: 1px solid #999;
	background: #EEEEEE;
	padding: 5px 10px;
	box-shadow:0 1px 2px #ddd;
    -moz-box-shadow:0 1px 2px #ddd;
    -webkit-box-shadow:0 1px 2px #ddd;
}
.suggestionsBox {
	position: absolute;
	left: 10px;
	margin: 0;
	width: 268px;
	top: 40px;
	padding:0px;
	background-color: #000;
	color: #fff;
}
.suggestionList {
	margin: 0px;
	padding: 0px;
}
.suggestionList ul li {
	list-style:none;
	margin: 0px;
	padding: 6px;
	border-bottom:1px dotted #666;
	cursor: pointer;
}
.suggestionList ul li:hover {
	background-color: #FC3;
	color:#000;
}
ul.search {
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
	color:#FFF;
	padding:0;
	margin:0;
}

.load{
background-image:url(loader.gif);
background-position:right;
background-repeat:no-repeat;
}

#suggest {
	position:relative;
}
.combopopup{
	padding:3px;
	width:268px;
	border:1px #CCC solid;
}

</style>	
 
 
<form id="viewSearchedInvoice" role="form">
 
<hr />
<div id="ac">  
<span>Invoice: </span><input type="text" style="width:215px; height:25px;"  value="" name="invoice_number" id="country" onkeyup="suggestReceipt2(this.value);" onblur="fill2();" autocomplete="on"  required ><br> 
 <span></span> 
 <br>
 <div class="suggestionsBox" id="suggestions" style="display: none;">
        <div class="suggestionList" id="suggestionsList"> &nbsp; </div>
      </div>
  <div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:157px;"><i class="icon icon-save icon-large"></i> View Invoice</button>
</div>
<br />
<div id="add-bottom" class="alert hide" style="margin:20px 0 0;"></div>
</div>
</form>
 <script src="js/beedy.js" type="text/javascript"></script>  
 <script src="js/beedyScript.js" type="text/javascript"></script>  