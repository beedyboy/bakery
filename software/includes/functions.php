<?php

 

function beedy_goto($location = NULL)
{
	if($location != NULL)
	{
		header("Location: {$location}");
		exit;
		}
		}
		
	
function output_message($message="")
{
	if(!empty($message))
	{
		return "<p class=\"message\"> {$message} </p>";
			}
	else
	{
		
		return "";
		}
	}


function include_layout_template($path="",$template="")
{
	if(($path=="") AND ($template!=NULL)):
	include($template);
	
	else:
	include($path.$template);
	
	endif;
	}

function createRandomPassword() {
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWxYZ023456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '' ;
    while ($i <= 7) {

        $num = rand() % 33;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;

    }
    return $pass;
}
//$finalcode=createRandomPassword();
 
 
?>

