 
 <style>
 #dWeeks{
 display: none;
 }
 
 </style>
<form id="systemWindow" role="form">
<center><h4><i class="icon-key icon-large"></i>Lincense Window</h4></center>
<hr />
<div id="ac"> 
<input type="hidden" name="action" value="systemWindow" />
   <span>Lincense Mode : </span>  <input type="radio" name="mode" value="Trial" onchange="demo();" style="width:25px; height:20px;" id="trial"/>
    Trial  <input type="radio" name="mode"  style="width:25px; height:20px;" onchange="demo();" value="No" id="purchased"  checked />
    One-Off  
<br>
 <div id="dWeeks">
<span>Number of Weeks : </span>
<select name="days" style="width:215px; height:25px; margin-left:-5px;" >
<option></option>
<option value="0008">1 week</option>
<option value="0016">2 weeks</option>
<option value="0034">4 weeks</option>
<option value="0064">8 weeks</option>
<option value="0080">10 weeks</option>
</select><br>
 </div>
<span></span> <br>
<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:157px;"><i class="icon icon-save icon-large"></i> Generate Key</button>
</div>
<br />
<div id="add-bottom" class="alert hide" style="margin:20px 0 0;"></div>
</div>
</form>
<script src="software/js/beedy.js" type="text/javascript"></script> 