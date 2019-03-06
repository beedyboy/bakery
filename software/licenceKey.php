<style>
 
	
#activate { 
	 font-family:Georgia, "Times New Roman", Times, serif;
	font-weight:bold;
	padding-right: 10px;
	border:3px solid #005581;
	border-radius:18px 18px 0 0;
	-moz-border-radius:18px 18px 0 0;
	-webkit-border-radius:18px 18px 0 0;
	font-size:19px;
	font-weight: normal;
}
#Lincenceresult
 {
	position: absolute;
	 height:35px;
	 color:#FFF;
	z-index: 1;
	 font-family:Georgia, "Times New Roman", Times, serif;
	font-weight:bold;
	background:#005581;
	font-size:19px;
	font-weight: normal;
}

#AddManageAdminContainer
 {
	position: absolute;
	width: 100%;
	background: #006994;
	height: 330px;
	z-index: 1;
	font-family: Georgia, "Times New Roman", Times, serif;
	font-weight: bold;
	left: 20%;
	top: 200px;
	border: 3px solid #005581;
	border-radius: 18px 18px 0 0;
	-moz-border-radius: 18px 18px 0 0;
	-webkit-border-radius: 18px 18px 0 0;
	font-size: 19px;
	font-weight: normal;
}

 


 #AddManageAdminContainer th
{
	background:#005581;
	color:#FFF;}
	
#AddManageAdminContainer tr{
		background:#BAD8F3 ;}
		
		
		</style>
        
   
 

 <div id="AddManageAdminContainer">
   <h1>Smartshopper Activation Window</h1>
  <span> Version (1.0)</span>
                   <hr>
				   
<form id="activateKey" method="post"> 
<input type="hidden" name="action" value="activateKey" />

<div id="ac">
<span>Insert Key: </span><input type="text" style="width:215px; height:30px;" name="name" placeholder="Lincense Key" Required/><br>

<br />  
<button id="activate" class="btn btn-success btn-block btn-large" style="width:100%;">Activate</button>
 
<div id="add-bottom" class="alert hide" style="margin:20px 0 0;"></div>
</div>
</form>

<?php include('footer.php');?>
       
            <div id="Lincenceresult">   </div>
 </div>
            