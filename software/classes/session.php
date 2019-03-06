<?php
 
class Session
{
	
	public $loggedin=false;
	public $name;
	public $lastname;
	public $position;  
	public $user_id = 0;
	public $user_name;
	public $area_privilege;
	public $adminId;

	public $lastActivity;
	
	
	public $companyName;
	public $address;
	public $companyContact;
	public $companyEmail;
	public $companyPhoneNum;
	public $logo;
	public $version;
	
	
	 function __construct()
	{ if(!isset($_SESSION)){
	session_start();
}	
		$this->check_login(); 
		}
	
	
	public function is_logged_in()
	{
		return $this->loggedin;
		
		}
	
	
	 public  function Login($user, $user_name, $name, $user_id)
	{
			 if($user)
			 {
				 $this->user_name = $_SESSION['user_name'] = $user_name;
				$this->name = $_SESSION['name'] = $name; 
				 $this->user_id = $_SESSION['user_id'] = $user_id;	 
				}
				 $this->loggedin =  true;
				 
			 }
 		 
		 
	
	
	public  function UserPosition($user, $position)
	{
			 if($user)
			 {
				 $this->position = $_SESSION['position'] = $position;
				
 		 }
	}
	
	
	
	 public function setApplicantId($applicantId)
	 {
		 $this->applicantId = $_SESSION['applicantId'] = $applicantId;	
	 }
	
	
	
	private function check_login()
	
	{
		if(isset($_SESSION['user_name']))
		{
			$this->lastActivity = $_SESSION['lastActivity'];
			$this->user_name = $_SESSION['user_name'];
			 $this->position = $_SESSION['position'];
			 $this->user_id = $_SESSION['user_id'];
			 $this->companyName = $_SESSION['companyName'];
			 $this->companyEmail = $_SESSION['companyEmail'];
			 $this->companyPhoneNum = $_SESSION['companyPhoneNum'];
			 $this->address = $_SESSION['address'];
			$this->version = $_SESSION['version'];
			$this->name = $_SESSION['name']; 
			$this->loggedin = true;
			 
			}
		
		else
		{
		$this->user_name = "guest";
			//$_SESSION['companyName'] = $this->companyName  = "Point of Sale";
			//unset($this->user_name);
			$this->loggedin = false;
			 	}
		
		}
	
	public function setCompanyName($val){
	
	$_SESSION['companyName'] = $val;
	}
	public function setCompanyContact($val, $val2, $val3){
	
	$_SESSION['companyEmail'] = $val;
	$_SESSION['companyPhoneNum'] = $val2;
	$_SESSION['address'] = $val3;
	}
	public function setVersion($val){
	
	$_SESSION['version'] = $val;
	}

	public function setLastActivity($lastActivity){
		$this->lastActivity = $_SESSION['lastActivity'] = $lastActivity;
	}
	
	public function logout()
	{
		unset($_SESSION['user_name']);
		unset($this->user_name);
		
		unset($_SESSION['user_id']);
		unset($this->user_id);
		
		unset($_SESSION['version']);
		unset($this->version);
		
		unset($_SESSION['companyName']);
		unset($this->companyName);
		
		unset($_SESSION['companyEmail']);
		unset($this->companyEmail);
		
		unset($_SESSION['companyPhoneNum']);
		unset($this->companyPhoneNum);
		
		unset($_SESSION['address']);
		unset($this->address); 
		
		unset($_SESSION['name']);
		unset($this->name); 
		 
		$this->loggedin = false;
		return true;
		}
	
	
	
	
	
	
	
	
	
	
	}




?>