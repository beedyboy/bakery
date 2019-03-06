<?php
#**************************************************************************
#  openSIS is a free student information system for public and non-public 
#  schools from Open Solutions for Education, Inc. web: www.os4ed.com
#
#  openSIS is  web-based, open source, and comes packed with features that 
#  include student demographic info, scheduling, grade book, attendance, 
#  report cards, eligibility, transcripts, parent portal, 
#  student portal and more.   
#
#  Visit the openSIS web site at http://www.opensis.com to learn more.
#  If you have question regarding this system or the license, please send 
#  an email to info@os4ed.com.
#
#  This program is released under the terms of the GNU General Public License as  
#  published by the Free Software Foundation, version 2 of the License. 
#  See license.txt.
#
#  This program is distributed in the hope that it will be useful,
#  but WITHOUT ANY WARRANTY; without even the implied warranty of
#  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#  GNU General Public License for more details.
#
#  You should have received a copy of the GNU General Public License
#  along with this program.  If not, see <http://www.gnu.org/licenses/>.
#
#***************************************************************************************
function DateInput($value,$name,$title='',$div=true,$allow_na=true)
{
	if(Preferences('HIDDEN')!='Y')
		$div = false;

	if(AllowEdit() && !$_REQUEST['_openSIS_PDF'])
	{
		if($value=='' || $div==false)
			return PrepareDate($value,"_$name",$allow_na).($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
		else
			return "<DIV id='div$name'><div onclick='javascript:addHTML(\"".str_replace('"','\"',PrepareDate($value,"_$name",$allow_na,array('Y'=>1,'M'=>1,'D'=>1))).($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'')."\",\"div$name\",true)'>".(($value!='')?ProperDate($value):'-').($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'').'</div></DIV>';
	}
	else
		return (($value!='')?ProperDate($value):'-').($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
}
function DateInput2($value,$name,$selectid,$title='',$div=true,$allow_na=true)
{
	if(Preferences('HIDDEN')!='Y')
		$div = false;

	if(AllowEdit() && !$_REQUEST['_openSIS_PDF'])
	{
		if($value=='' || $div==false)
			return PrepareDate2($value,"_$name",$selectid,$allow_na).($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
		else
			return "<DIV id='div$name'><div onclick='javascript:addHTML(\"".str_replace('"','\"',PrepareDate2($value,"_$name",$selectid,$allow_na,array('Y'=>1,'M'=>1,'D'=>1))).($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'')."\",\"div$name\",true)'>".(($value!='')?ProperDate($value):'-').($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'').'</div></DIV>';
	}
	else
		return (($value!='')?ProperDate($value):'-').($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
}
function SearchDateInput($day,$month,$year,$allow_day,$allow_month,$allow_year)
{
	$dt='';
	
	if($allow_day == 'Y')
	{
		$dt.='<select name="'.$day.'" id="'.$day.'">';
		$dt.='<option value="">Day</option>';
		for($i=1; $i<=31; $i++)
		{
			if($i < 10)
				$i='0'.$i;
				
			$dt.='<option value="'.$i.'">'.$i.'</option>';
		}
		$dt.='</select>';
	}
	
	
	if($allow_month == 'Y')
	{
		$dt.='<select name="'.$month.'" id="'.$month.'">';
		$dt.='<option value="">Month</option><option value="01">January</option><option value="02">February</option><option value="03">March</option><option value="04">April</option><option value="05">May</option><option value="06">June</option><option value="07">July</option><option value="08">August</option><option value="09">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option>';
		$dt.='</select>';
	}
	
	
	if($allow_year == 'Y')
	{
		$dt.='<select name="'.$year.'" id="'.$year.'">';
		$dt.='<option value="">Year</option>';
		for($i=1930; $i<=2030; $i++)
		{
			$dt.='<option value="'.$i.'">'.$i.'</option>';
		}
		$dt.='</select>';
	}
	
	return $dt;	
}
function DateInput_for_EndInput($value,$name,$title='',$div=true,$allow_na=true)
{
	if(Preferences('HIDDEN')!='Y')
		$div = false;

	if(AllowEdit() && !$_REQUEST['_openSIS_PDF'])
	{
		if($value=='' || $div==false)
			return PrepareDate_for_EndInput($value,"_$name",$allow_na).($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
		else
			return "<DIV id='div$name'><div onclick='javascript:addHTML(\"".str_replace('"','\"',PrepareDate_for_EndInput($value,"_$name",true,array('Y'=>1,'M'=>1,'D'=>1))).($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'')."\",\"div$name\",true)'>".(($value!='')?ProperDate($value):'-').($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'').'</div></DIV>';
	}
	else
		return (($value!='')?ProperDate($value):'-').($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
}

function TextInput($value,$name,$title='',$options='',$div=true)
{
    
	if(Preferences('HIDDEN')!='Y')
		$div = false;

	// mab - support array style $option values
	if(AllowEdit() && !$_REQUEST['_openSIS_PDF'])
	{
		$value = str_replace("'",'&#39;',str_replace('"','&rdquo;',$value));
		$value1 = is_array($value) ? $value[1] : $value;
		$value = is_array($value) ? $value[0] : $value;

		if(strpos($options,'size')===false && $value!='')
			$options .= ' size='.strlen($value);
		elseif(strpos($options,'size')===false)
			$options .= ' size=10';

                if(strstr($value,'\\')!='')
                $div=false;        
		if((trim($value)=='' || $div==false))
                    return "<INPUT type=text id=$name name=$name ".(($value || $value==='0')?"value=\"$value\"":'')." $options>".($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
		else
                {

			return "<DIV id='div$name'><div onclick='javascript:addHTML(\"<INPUT type=text id=input$name name=$name ".(($value || $value==='0')?"value=\\\"".str_replace('"','&rdquo;',$value)."\\\"":'')." $options>".($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'')."\",\"div$name\",true); document.getElementById(\"input$name\").focus();'>".(($value!='')?str_replace('"','&rdquo;',$value1):'-').($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').'</small>':'').'</div></DIV>';       
	
                }
        }
	else
        {
                $value = str_replace("'",'&#39;',str_replace('"','&rdquo;',$value));
		return (((is_array($value)?$value[1]:$value)!='')?(is_array($value)?$value[1]:$value):'-').($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
        }
}
function TextInputCusId($value,$name,$title='',$options='',$div=true,$ex_id='')
{
	if(Preferences('HIDDEN')!='Y')
		$div = false;

	// mab - support array style $option values
	if(AllowEdit() && !$_REQUEST['_openSIS_PDF'])
	{
		$value = str_replace("'",'&#39;',str_replace('"','&rdquo;',$value));
		$value1 = is_array($value) ? $value[1] : $value;
		$value = is_array($value) ? $value[0] : $value;

		if(strpos($options,'size')===false && $value!='')
			$options .= ' size='.strlen($value);
		elseif(strpos($options,'size')===false)
			$options .= ' size=10';

		if((trim($value)=='' || $div==false))
			return "<INPUT type=text name=$name ".(($value || $value==='0')?"value=\"$value\"":'')." $options>".($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
		else
                {
                        if($ex_id=='')
			return "<DIV id='div$name'><div onclick='javascript:addHTML(\"<INPUT type=text id=input$name name=$name ".(($value || $value==='0')?"value=\\\"".str_replace('"','&rdquo;',$value)."\\\"":'')." $options>".($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'')."\",\"div$name\",true); document.getElementById(\"input$name\").focus();'>".(($value!='')?str_replace('"','&rdquo;',$value1):'-').($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').'</small>':'').'</div></DIV>';
                        else
                        return "<DIV id='div$name'><div onclick='javascript:addHTML(\"<INPUT type=text id=$ex_id name=$name ".(($value || $value==='0')?"value=\\\"".str_replace('"','&rdquo;',$value)."\\\"":'')." $options>".($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'')."\",\"div$name\",true); document.getElementById(\"$ex_id\").focus();'>".(($value!='')?str_replace('"','&rdquo;',$value1):'-').($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').'</small>':'').'</div></DIV>';    
                }
	}
	else
		return (((is_array($value)?$value[1]:$value)!='')?(is_array($value)?$value[1]:$value):'-').($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
}

function TextInput_mail($value,$name,$title='',$options='',$div=true)
{
	if(Preferences('HIDDEN')!='Y')
		$div = false;

	// mab - support array style $option values
	if(!$_REQUEST['_openSIS_PDF'])
	{
		$value = str_replace("'",'&#39;',str_replace('"','&rdquo;',$value));
		$value1 = is_array($value) ? $value[1] : $value;
		$value = is_array($value) ? $value[0] : $value;

		if(strpos($options,'size')===false && $value!='')
			$options .= ' size='.strlen($value);
		elseif(strpos($options,'size')===false)
			$options .= ' size=10';


			return "<INPUT id=$name type=text name=$name ".(($value || $value==='0')?"value=\"$value\"":'')." $options>".($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
	}
	else
		return (((is_array($value)?$value[1]:$value)!='')?(is_array($value)?$value[1]:$value):'-').($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
}
function TextInput_mod_a($value,$name,$title='',$options='',$div=true)
{
	if(Preferences('HIDDEN')!='Y')
		$div = false;

	// mab - support array style $option values
	if(AllowEdit() && !$_REQUEST['_openSIS_PDF'])
	{
		$value = str_replace("'",'&#39;',str_replace('"','&rdquo;',$value));
		$value1 = is_array($value) ? $value[1] : $value;
		$value = is_array($value) ? $value[0] : $value;

		if(strpos($options,'size')===false && $value!='')
			$options .= ' size='.strlen($value);
		elseif(strpos($options,'size')===false)
			$options .= ' size=10';

		if((trim($value)=='' || $div==false))
			return "<INPUT type=text name=$name ".(($value || $value==='0')?"value=\"$value\"":'')." id=$name ".(($value || $value==='0')?"value=\"$value\"":'')." $options>".($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
		else
			return "<DIV id='div$name'><div onclick='javascript:addHTML(\"<INPUT type=text id=input$name name=$name ".(($value || $value==='0')?"value=\\\"".str_replace('"','&rdquo;',$value)."\\\"":'')." $options>".($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'')."\",\"div$name\",true); document.getElementById(\"input$name\").focus();'>".(($value!='')?str_replace('"','&rdquo;',$value1):'-').($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').'</small>':'').'</div></DIV>';
	}
	else
		return (((is_array($value)?$value[1]:$value)!='')?(is_array($value)?$value[1]:$value):'-').($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
}




function TextAreaInput($value,$name,$title='',$options='',$div=true)
{
	if(Preferences('HIDDEN')!='Y')
		$div = false;

	if(AllowEdit() && !$_REQUEST['_openSIS_PDF'])
	{
		$value = str_replace("'",'&#39;',str_replace('"','&rdquo;',$value));

		if(strpos($options,'cols')===false)
			$options .= ' cols=30';
		if(strpos($options,'rows')===false)
			$options .= ' rows=4';
		$rows = substr($options,strpos($options,'rows')+5,2)*1;
		$cols = substr($options,strpos($options,'cols')+5,2)*1;

		if($value=='' || $div==false)
			return "<TEXTAREA name=$name $options>$value</TEXTAREA>".($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
		else
			return "<DIV id='div$name'><div onclick='javascript:addHTML(\"<TEXTAREA id=textarea$name name=$name $options>".ereg_replace("[\n\r]",'\u000D\u000A',str_replace("\r\n",'\u000D\u000A',str_replace("'","&#39;",$value)))."</TEXTAREA>".($title!=''?"<BR><small>".str_replace("'",'&#39;',(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':''))."</small>":'')."\",\"div$name\",true); document.getElementById(\"textarea$name\").value=unescape(document.getElementById(\"textarea$name\").value);'><TABLE class=LO_field ><TR><TD>".((substr_count($value,"\r\n")>$rows)?'<DIV style="overflow:auto; height:'.(15*$rows).'px; width:'.($cols*10).'; padding-right: 16px;">'.nl2br($value).'</DIV>':'<DIV style="overflow:auto; width:300; padding-right: 16px;">'.nl2br($value).'</DIV>').'</TD></TR></TABLE>'.($title!=''?'<BR><small>'.str_replace("'",'&#39;',(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'')).'</small>':'').'</div></DIV>';
	}
	else
		return (($value!='')?nl2br($value):'-').($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
}



function TextAreaInputInputFinalGrade($value,$name,$title='',$options='',$div=true)
{
	if(Preferences('HIDDEN')!='Y')
		$div = false;

	if(AllowEdit() && !$_REQUEST['_openSIS_PDF'])
	{
		$value = str_replace("'",'&#39;',str_replace('"','&rdquo;',$value));

		if(strpos($options,'cols')===false)
			$options .= ' cols=30';
		if(strpos($options,'rows')===false)
			$options .= ' rows=4';
		$rows = substr($options,strpos($options,'rows')+5,2)*1;
		$cols = substr($options,strpos($options,'cols')+5,2)*1;

		if($value=='' || $div==false)
			return "<TEXTAREA name=$name $options>$value</TEXTAREA>".($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
		else
			return "<DIV id='div$name'><div onclick='javascript:addHTML(\"<TEXTAREA id=textarea$name name=$name $options>".ereg_replace("[\n\r]",'\u000D\u000A',str_replace("\r\n",'\u000D\u000A',str_replace("'","&#39;",$value)))."</TEXTAREA>".($title!=''?"<BR><small>".str_replace("'",'&#39;',(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':''))."</small>":'')."\",\"div$name\",true); document.getElementById(\"textarea$name\").value=unescape(document.getElementById(\"textarea$name\").value);'><TABLE class=LO_field ><TR><TD>".((substr_count($value,"\r\n")>$rows)?'<DIV style="overflow:auto; height:'.(15*$rows).'px; width:'.($cols*10).'; padding-right: 16px;">'.nl2br($value).'</DIV>':'<DIV style="overflow:auto; width:300; padding-right: 16px;">'.nl2br($value).'</DIV>').'</TD></TR></TABLE>'.($title!=''?'<BR><small>'.str_replace("'",'&#39;',(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'')).'</small>':'').'</div></DIV>';
	}
	else
		return (($value!='')?nl2br($value):'-').($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
}




function CheckboxInput($value,$name,$title='',$checked='',$new=false,$yes='Yes',$no='No',$div=true,$extra='')
{

if($checked)
{
    if(strpos($name,'STANDARD_GRADE_SCALE'))
        return '<IMG SRC=assets/check.gif height=15>';
}
	// $checked has been deprecated -- it remains only as a placeholder
	if(Preferences('HIDDEN')!='Y')
		$div = false;

	if($div==false || $new==true)
	{
		if($value && $value!='N')
			$checked = 'CHECKED';
		else
			$checked = '';
	}

	if(AllowEdit() && !$_REQUEST['_openSIS_PDF'])
	{
		if($new || $div==false)
			return "<INPUT type=checkbox name=$name  value=Y $checked $extra>".($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
		else
			return "<DIV id='div$name'><div onclick='javascript:addHTML(\"<INPUT type=hidden name=$name  value=\\\"\\\"><INPUT type=checkbox name=$name ".(($value)?'checked':'')." value=Y ".str_replace('"','\"',$extra).">".($title!=''?'<BR><small>'.str_replace("'",'&#39;',(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'')).'</small>':'')."\",\"div$name\",true)'>".($value?$yes:$no).($title!=''?"<BR><small>".str_replace("'",'&#39;',(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':''))."</small>":'')."</div></DIV>";
	}
	else
		return ($value?$yes:$no).($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
}


function CheckboxInput_grade($value,$name,$title='',$checked='',$new=false,$yes='Yes',$no='No',$div=true,$extra='')
{

if($checked)
{
    if(strpos($name,'STANDARD_GRADE_SCALE'))
        return '<IMG SRC=assets/check.gif height=15>';
}
	// $checked has been deprecated -- it remains only as a placeholder
	if(Preferences('HIDDEN')!='Y')
		$div = false;

	if($div==false || $new==true)
	{
		if($value && $value!='N')
			$checked = 'CHECKED';
		else
			$checked = '';
	}

	if(AllowEdit() && !$_REQUEST['_openSIS_PDF'])
	{
		if($new || $div==false)
			return "<INPUT type=checkbox name=$name id=$name value=Y $checked $extra>".($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
		else
			return "<DIV id='div$name'><div onclick='javascript:addHTML(\"<INPUT type=hidden name=$name  value=\\\"\\\"><INPUT type=checkbox   id=$name  name=$name ".(($value)?'checked':'')." value=Y ".str_replace('"','\"',$extra).">".($title!=''?'<BR><small>'.str_replace("'",'&#39;',(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'')).'</small>':'')."\",\"div$name\",true)'>".($value?$yes:$no).($title!=''?"<BR><small>".str_replace("'",'&#39;',(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':''))."</small>":'')."</div></DIV>";
	}
	else
		return ($value?$yes:$no).($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
}

function CheckboxInput_exam($value,$name,$title='',$checked='',$new=false,$yes='Yes',$no='No',$div=true,$extra='')
{

if($checked)
{
    if(strpos($name,'STANDARD_GRADE_SCALE'))
        return '<IMG SRC=assets/check.gif height=15>';
}
	// $checked has been deprecated -- it remains only as a placeholder
	if(Preferences('HIDDEN')!='Y')
		$div = false;

	if($div==false || $new==true)
	{
		if($value && $value!='N')
			$checked = 'CHECKED';
		else
			$checked = '';
	}

	if(AllowEdit() && !$_REQUEST['_openSIS_PDF'])
	{
		if($new || $div==false)
			return "<INPUT type=checkbox name=$name id=$name value=Y $checked  $extra>".($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
		else
			return "<DIV id='div$name'><div onclick='javascript:addHTML(\"<INPUT type=hidden name=$name  value=\\\"\\\"><INPUT type=checkbox id=$name  name=$name ".(($value)?'checked':'')." value=Y ".str_replace('"','\"',$extra).">".($title!=''?'<BR><small>'.str_replace("'",'&#39;',(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'')).'</small>':'')."\",\"div$name\",true)'>".($value?$yes:$no).($title!=''?"<BR><small>".str_replace("'",'&#39;',(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':''))."</small>":'')."</div></DIV>";
	}
	else
		return ($value?$yes:$no).($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
}




function CheckboxInput_var_sch($value,$name,$title='',$checked='',$new=false,$yes='Yes',$no='No',$div=true,$extra='')
{

if($checked)
{
    if(strpos($name,'STANDARD_GRADE_SCALE'))
        return '<IMG SRC=assets/check.gif height=15>';
}
	// $checked has been deprecated -- it remains only as a placeholder
	if(Preferences('HIDDEN')!='Y')
		$div = false;

	if($div==false || $new==true)
	{
		if($value && $value!='N')
			$checked = 'CHECKED';
		else
			$checked = '';
	}

	if(AllowEdit() && !$_REQUEST['_openSIS_PDF'])
	{
		if($new || $div==false)
			return "<INPUT type=checkbox name=$name  value=Y $checked $extra>".($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
		else
			return "<DIV id='div$name'><div onclick='javascript:addHTML(\"<INPUT type=hidden name=$name  value=\\\"\\\"><INPUT type=checkbox  id=$name name=$name ".(($value)?'checked':'')." value=Y ".str_replace('"','\"',$extra).">".($title!=''?'<BR><small>'.str_replace("'",'&#39;',(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'')).'</small>':'')."\",\"div$name\",true)'>".($value?$yes:$no).($title!=''?"<BR><small>".str_replace("'",'&#39;',(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':''))."</small>":'')."</div></DIV>";
	}
	else
		return ($value?$yes:$no).($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
}

function CheckboxInputMod($value,$name,$title='',$checked='',$new=false,$yes='Yes',$no='No',$div=true,$extra='')
{
  
	// $checked has been deprecated -- it remains only as a placeholder
	if(Preferences('HIDDEN')!='Y')
		$div = false;

	if($div==false || $new==true)
	{
		if($value && $value!='N')
			$checked = 'CHECKED';
		else
			$checked = '';
	}

	if(AllowEdit() && !$_REQUEST['_openSIS_PDF'])
	{
		if($new || $div==false)
			return "<INPUT type=checkbox  onclick=set_check_value(this,\"".$name."\"); id=$name  name=$name value=Y $checked $extra>".($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
		else
			return "<DIV id='div$name'><div onclick='javascript:addHTML(\"<INPUT type=checkbox  onclick=set_check_value(this,\\\"$name\\\"); id=$name  name=$name ".(($value)?'checked':'')." value=Y ".str_replace('"','\"',$extra).">".($title!=''?'<BR><small>'.str_replace("'",'&#39;',(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'')).'</small>':'')."\",\"div$name\",true)'>".($value?$yes:$no).($title!=''?"<BR><small>".str_replace("'",'&#39;',(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':''))."</small>":'')."</div></DIV>";
	}
	else
		return ($value?$yes:$no).($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
}

//for calendar date
function CheckboxInput_Calendar($value,$name,$title='',$checked='',$new=false,$yes='Yes',$no='No',$div=true,$extra='')
{
	// $checked has been deprecated -- it remains only as a placeholder
	
	if( $new==true)
	{
		if($value && $value!='N')
			$checked = 'CHECKED';
		else
			$checked = '';
	}

	if(AllowEdit() && !$_REQUEST['_openSIS_PDF'])
	{
		if($new || $div==false)
			return "<INPUT type=checkbox name=$name value=Y $checked $extra>".($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
		else
			return "<DIV id='div$name'><div onclick='javascript:addHTML(\"<INPUT type=hidden name=$name value=\\\"\\\"><INPUT type=checkbox name=$name ".(($value)?'checked':'')." value=Y ".str_replace('"','\"',$extra).">".($title!=''?'<BR><small>'.str_replace("'",'&#39;',(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'')).'</small>':'')."\",\"div$name\",true)'>".($value?$yes:$no).($title!=''?"<BR><small>".str_replace("'",'&#39;',(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':''))."</small>":'')."</div></DIV>";
	}
	else
		return ($value?$yes:$no).($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
}





function CheckboxInputWithID($value,$name,$id,$title='',$checked='',$new=false,$yes='Yes',$no='No',$div=true,$extra='')
{
	// $checked has been deprecated -- it remains only as a placeholder
	if(Preferences('HIDDEN')!='Y')
		$div = false;

	if($div==false || $new==true)
	{
		if($value && $value!='N')
			$checked = 'CHECKED';
		else
			$checked = '';
	}

	if(AllowEdit() && !$_REQUEST['_openSIS_PDF'])
	{
		if($new || $div==false)
			return "<INPUT type=checkbox name=$name id=$id value=Y $checked $extra>".($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
		else
			return "<DIV id='div$name'><div onclick='javascript:addHTML(\"<INPUT type=hidden name=$name value=\\\"\\\"><INPUT type=checkbox name=$name ".(($value)?'checked':'')." value=Y ".str_replace('"','\"',$extra).">".($title!=''?'<BR><small>'.str_replace("'",'&#39;',(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'')).'</small>':'')."\",\"div$name\",true)'>".($value?$yes:$no).($title!=''?"<BR><small>".str_replace("'",'&#39;',(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':''))."</small>":'')."</div></DIV>";
	}
	else
		return ($value?$yes:$no).($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
}
function SelectInput($value,$name,$title='',$options,$allow_na='N/A',$extra='',$div=true)
{
   
	if(Preferences('HIDDEN')!='Y')
		$div = false;

	// mab - support array style $option values
	// mab - append current val to select list if not in list
        
	if ($value!='' && !$options[$value])
		$options[$value] = array($value,'<FONT color=red>'.$value.'</FONT>');

	if(AllowEdit() && !$_REQUEST['_openSIS_PDF'])
	{
		if($value!='' && $div)
		{
			$return = "<DIV id='div$name'><div onclick='javascript:addHTML(\"";
			$extra = str_replace('"','\"',$extra);
		}

		$return .= "<SELECT name=$name $extra >";
		if($allow_na!==false)
		{
			if($value!='' && $div)
				$return .= '<OPTION value=\"\">'.$allow_na;
			else
				$return .= '<OPTION value="">'.$allow_na;
		}
                
		if(count($options))
		{
			foreach($options as $key=>$val)
			{
                            
				settype($key,'string');
				if($value!='' && $div)
					$return .= "<OPTION value=\\\"".str_replace("'",'&#39;',$key)."\\\" ".(($value==$key && (!($value==false && ($value!==$key)) || ($value==='0' && $key===0)))?'SELECTED':'').">".str_replace("'",'&#39;',(is_array($val)?$val[0]:$val));
				else
					$return .= "<OPTION value=\"$key\" ".(($value==$key && !($value==false && $value!==$key))?'SELECTED':'').">".(is_array($val)?$val[0]:$val);
			}
		}
		$return .= "</SELECT>";
               
		if($title!='')
			$return .= '<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'<FONT>':'').'</small>';
		if($value!='' && $div)
			$return .="\",\"div$name\",true)'>".(is_array($options[$value])?$options[$value][1]:$options[$value]).($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'').'</div></DIV>';
	}
	else
		$return = (((is_array($options[$value])?$options[$value][1]:$options[$value])!='')?(is_array($options[$value])?$options[$value][1]:$options[$value]):($allow_na!==false?($allow_na?$allow_na:'-'):'-')).($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');

	return $return;
}
function SelectInputDisabledMsg($value,$name,$title='',$options,$allow_na='N/A',$extra='',$div=true,$msg)
{
	if(Preferences('HIDDEN')!='Y')
		$div = false;

	// mab - support array style $option values
	// mab - append current val to select list if not in list
        
	if ($value!='' && !$options[$value])
		$options[$value] = array($value,'<FONT color=red>'.$value.'</FONT>');

	if(AllowEdit() && !$_REQUEST['_openSIS_PDF'])
	{
		if($value!='' && $div)
		{
			$return = "<DIV id='div$name'><div onclick='show_this_msg(\"".$msg."\");javascript:addHTML(\"";
			$extra = str_replace('"','\"',$extra);
		}

		$return .= "<SELECT name=$name $extra disabled>";
		if($allow_na!==false)
		{
			if($value!='' && $div)
				$return .= '<OPTION value=\"\">'.$allow_na;
			else
				$return .= '<OPTION value="">'.$allow_na;
		}
                
		if(count($options))
		{
			foreach($options as $key=>$val)
			{
                            
				settype($key,'string');
				if($value!='' && $div)
					$return .= "<OPTION value=\\\"".str_replace("'",'&#39;',$key)."\\\" ".(($value==$key && (!($value==false && ($value!==$key)) || ($value==='0' && $key===0)))?'SELECTED':'').">".str_replace("'",'&#39;',(is_array($val)?$val[0]:$val));
				else
					$return .= "<OPTION value=\"$key\" ".(($value==$key && !($value==false && $value!==$key))?'SELECTED':'').">".(is_array($val)?$val[0]:$val);
			}
		}
		$return .= "</SELECT>";
               
		if($title!='')
			$return .= '<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'<FONT>':'').'</small>';
		if($value!='' && $div)
			$return .="\",\"div$name\",true)'>".(is_array($options[$value])?$options[$value][1]:$options[$value]).($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'').'</div></DIV>';
	}
	else
		$return = (((is_array($options[$value])?$options[$value][1]:$options[$value])!='')?(is_array($options[$value])?$options[$value][1]:$options[$value]):($allow_na!==false?($allow_na?$allow_na:'-'):'-')).($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');

	return $return;
}
function SelectInputForCal($value,$name,$title='',$options,$allow_na='N/A',$extra='',$div=true)
{
	if(Preferences('HIDDEN')!='Y')
		$div = false;

	// mab - support array style $option values
	// mab - append current val to select list if not in list
	if ($value!='' && !$options[$value])
		$options[$value] = array($value,'<FONT color=red>'.$value.'</FONT>');

	
		if($value!='' && $div)
		{
			$return = "<DIV id='div$name'><div onclick='javascript:addHTML(\"";
			$extra = str_replace('"','\"',$extra);
		}

		$return .= "<SELECT name=$name $extra>";
		if($allow_na!==false)
		{
			if($value!='' && $div)
				$return .= '<OPTION value=\"\">'.$allow_na;
			else
				$return .= '<OPTION value="">'.$allow_na;
		}
		if(count($options))
		{
			foreach($options as $key=>$val)
			{
				settype($key,'string');
				if($value!='' && $div)
					$return .= "<OPTION value=\\\"".str_replace("'",'&#39;',$key)."\\\" ".(($value==$key && (!($value==false && ($value!==$key)) || ($value==='0' && $key===0)))?'SELECTED':'').">".str_replace("'",'&#39;',(is_array($val)?$val[0]:$val));
				else
					$return .= "<OPTION value=\"$key\" ".(($value==$key && !($value==false && $value!==$key))?'SELECTED':'').">".(is_array($val)?$val[0]:$val);
			}
		}
		$return .= "</SELECT>";
		if($title!='')
			$return .= '<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'<FONT>':'').'</small>';
		if($value!='' && $div)
			$return .="\",\"div$name\",true)'>".(is_array($options[$value])?$options[$value][1]:$options[$value]).($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'').'</div></DIV>';
	

	return $return;
}
function SelectInput_for_EndInput($value,$name,$title='',$options,$type_id='',$allow_na='N/A',$extra='',$div=true)
{
	if(Preferences('HIDDEN')!='Y')
		$div = false;

	// mab - support array style $option values
	// mab - append current val to select list if not in list
	if ($value!='' && !$options[$value])
		$options[$value] = array($value,'<FONT color=red>'.$value.'</FONT>');

	if(AllowEdit() && !$_REQUEST['_openSIS_PDF'])
	{
		if($value!='' && $div)
		{
			$return = "<DIV id='div$name'><div onclick='javascript:addHTML(\"";
			$extra = str_replace('"','\"',$extra);
		}

                    $onchange=str_replace('"','\"',"onchange=javascript:if(this.value==\"$type_id\")window.open(\"ForWindow.php?modname=$_REQUEST[modname]&modfunc=detail&student_id=".UserStudentID()."&drop_code=$type_id\",\"blank\",\"width=500,height=300\");");
                if($value!='' && $div)		
                    $return .= "<SELECT name=$name $extra  $onchange>";
                else
		$return .= "<SELECT name=$name $extra  onchange=javascript:if(this.value==\"$type_id\")window.open(\"ForWindow.php?modname=$_REQUEST[modname]&modfunc=detail&student_id=".UserStudentID()."&drop_code=$type_id\",\"blank\",\"width=500,height=300\");>";
		if($allow_na!==false)
		{
			if($value!='' && $div)
				$return .= '<OPTION value=\"\">'.$allow_na;
			else
				$return .= '<OPTION value="">'.$allow_na;
		}
		if(count($options))
		{
			foreach($options as $key=>$val)
			{
				settype($key,'string');
				if($value!='' && $div)
					$return .= "<OPTION value=\\\"".str_replace("'",'&#39;',$key)."\\\" ".(($value==$key && (!($value==false && ($value!==$key)) || ($value==='0' && $key===0)))?'SELECTED':'').">".str_replace("'",'&#39;',(is_array($val)?$val[0]:$val));
				else{
				$return .= "<OPTION value=\"$key\" ".(($value==$key && !($value==false && $value!==$key))?'SELECTED':'')." >".(is_array($val)?$val[0]:$val);
					
			}
			}
		}
		$return .= "</SELECT>";
		if($title!='')
			$return .= '<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'<FONT>':'').'</small>';
		if($value!='' && $div)
			$return .="\",\"div$name\",true)'>".(is_array($options[$value])?$options[$value][1]:$options[$value]).($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'').'</div></DIV>';
	}
	else
		$return = (((is_array($options[$value])?$options[$value][1]:$options[$value])!='')?(is_array($options[$value])?$options[$value][1]:$options[$value]):($allow_na!==false?($allow_na?$allow_na:'-'):'-')).($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');

	return $return;
}



function NoInput($value,$title='')
{
	return ($value!=''?$value:'-').($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
}


function TextInputSchool($value,$name,$title='',$options='',$div=true)
{
	if(Preferences('HIDDEN')!='Y')
		$div = false;

	// mab - support array style $option values
	if(AllowEdit() && !$_REQUEST['_openSIS_PDF'])
	{
		$value = str_replace("'",'&#39;',str_replace('"','&rdquo;',$value));
		$value1 = is_array($value) ? $value[1] : $value;
		$value = is_array($value) ? $value[0] : $value;

		if(strpos($options,'size')===false && $value!='')
			$options .= ' size='.strlen($value);
		elseif(strpos($options,'size')===false)
			$options .= 'type=\'text\' class=\"cell_wide\"';

		if((trim($value)=='' || $div==false))
			return "<INPUT type=text name=$name ".(($value || $value==='0')?"value=\"$value\"":'')." $options>".($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
		else
			return "<DIV id='div$name'><div onclick='javascript:addHTML(\"<INPUT type=text id=input$name name=$name ".(($value || $value==='0')?"value=\\\"".str_replace('"','&rdquo;',$value)."\\\"":'')." $options>".($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'')."\",\"div$name\",true); document.getElementById(\"input$name\").focus();'>".(($value!='')?str_replace('"','&rdquo;',$value1):'-').($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').'</small>':'').'</div></DIV>';
	}
	else
		return (((is_array($value)?$value[1]:$value)!='')?(is_array($value)?$value[1]:$value):'-').($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
}



function ModTextInput($value,$name,$title='',$options='',$div=true)
{
	
	// mab - support array style $option values
	if(AllowEdit() && !$_REQUEST['_openSIS_PDF'])
	{
		$value = str_replace("'",'&#39;',str_replace('"','&rdquo;',$value));
		$value1 = is_array($value) ? $value[1] : $value;
		$value = is_array($value) ? $value[0] : $value;

		if(strpos($options,'size')===false && $value!='')
			$options .= ' size='.strlen($value);
		elseif(strpos($options,'size')===false)
			$options .= ' size=10';

		if((trim($value)=='' || $div==false))
			return "<INPUT type=text name=$name ".(($value || $value==='0')?"value=\"$value\"":'')." $options>".($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
		else
			return "<INPUT type=text name=$name ".(($value || $value==='0')?"value=\"$value\"":'')." $options>".($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
	}
	else
		return (((is_array($value)?$value[1]:$value)!='')?(is_array($value)?$value[1]:$value):'-').($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
}


function TextInputWrap($value,$name,$title='',$options='',$div=true, $wrap='')
{
	if(Preferences('HIDDEN')!='Y')
		$div = false;

	// mab - support array style $option values
	if(AllowEdit() && !$_REQUEST['_openSIS_PDF'])
	{
		$value = str_replace("'",'&#39;',str_replace('"','&rdquo;',$value));
		$value1 = is_array($value) ? $value[1] : $value;
		$value = is_array($value) ? $value[0] : $value;


		if(strpos($options,'size')===false && $value!='')
			$options .= ' size='.strlen($value);
		elseif(strpos($options,'size')===false)
			$options .= ' size=10';
		else
		$options .= ' size=10 class=cell_floating';
		
		

		if((trim($value)=='' || $div==false))
			return "<INPUT type=text name=$name ".(($value || $value==='0')?"value=\"$value\"":'')." $options>".($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
		else
			return "<DIV id='div$name' STYLE='word-wrap:break-word; width:".$wrap."px; overflow:auto'><div onclick='javascript:addHTML(\"<INPUT type=text id=input$name name=$name ".(($value || $value==='0')?"value=\\\"".str_replace('"','&rdquo;',$value)."\\\"":'')." $options>".($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'')."\",\"div$name\",true); document.getElementById(\"input$name\").focus();'>".(($value!='')?str_replace('"','&rdquo;',$value1):'-').($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').'</small>':'').'</div></DIV>';
	}
	else
		return (((is_array($value)?$value[1]:$value)!='')?(is_array($value)?$value[1]:$value):'-').($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
}


function TextAreaInputWrap($value,$name,$title='',$options='',$div=true, $wrap='')
{
	if(Preferences('HIDDEN')!='Y')
		$div = false;
		
	
	if(AllowEdit() && !$_REQUEST['_openSIS_PDF'])
	{
		$value = str_replace("'",'&#39;',str_replace('"','&rdquo;',$value));

		if(strpos($options,'cols')===false)
			$options .= ' cols=70';
		if(strpos($options,'rows')===false)
			$options .= ' rows=8';
		$rows = substr($options,strpos($options,'rows')+5,2)*1;
		$cols = substr($options,strpos($options,'cols')+5,2)*1;

		if($value=='' || $div==false)
			return "<TEXTAREA name=$name $options >$value</TEXTAREA>".($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
		else
			return "<DIV id='div$name' STYLE='word-wrap:break-word; '><div onclick='javascript:addHTML(\"<TEXTAREA id=textarea$name name=$name $options >".ereg_replace("[\n\r]",'\u000D\u000A',str_replace("\r\n",'\u000D\u000A',str_replace("'","&#39;",$value)))."</TEXTAREA>".($title!=''?"<BR><small>".str_replace("'",'&#39;',(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':''))."</small>":'')."\",\"div$name\",true); document.getElementById(\"textarea$name\").value=unescape(document.getElementById(\"textarea$name\").value);'><TABLE class=LO_field ><TR><TD>".((substr_count($value,"\r\n")>$rows)?'<DIV style="overflow:auto; height:'.(15*$rows).'px; width:'.($cols*10).'; padding-right: 16px;">'.nl2br($value).'</DIV>':'<DIV style="overflow:auto; width:300; padding-right: 16px;">'.nl2br($value).'</DIV>').'</TD></TR></TABLE>'.($title!=''?'<BR><small>'.str_replace("'",'&#39;',(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'')).'</small>':'').'</div></DIV>';
	}
	else
		return (($value!='')?nl2br($value):'-').($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
}
function StandardTextAreaInput($value,$name,$title='',$options='',$div=true)
{
	if(Preferences('HIDDEN')!='Y')
		$div = false;

	if(AllowEdit() && !$_REQUEST['_openSIS_PDF'])
	{
		$value = str_replace("'",'&#39;',str_replace('"','&rdquo;',$value));

		if(strpos($options,'cols')===false)
			$options .= ' cols=30';
		if(strpos($options,'rows')===false)
			$options .= ' rows=4';
		$rows = substr($options,strpos($options,'rows')+5,2)*1;
		$cols = substr($options,strpos($options,'cols')+5,2)*1;

		if($value=='' || $div==false)

                    return "<TEXTAREA name=$name id=$name $options>$value</TEXTAREA>".($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
		else
			return "<DIV id='div$name'><div onclick='javascript:addHTML(\"<TEXTAREA id=textarea$name name=$name $options>".ereg_replace("[\n\r]",'\u000D\u000A',str_replace("\r\n",'\u000D\u000A',str_replace("'","&#39;",$value)))."</TEXTAREA>".($title!=''?"<BR><small>".str_replace("'",'&#39;',(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':''))."</small>":'')."\",\"div$name\",true); document.getElementById(\"textarea$name\").value=unescape(document.getElementById(\"textarea$name\").value);'><TABLE class=LO_field ><TR><TD>".((substr_count($value,"\r\n")>$rows)?'<DIV style="overflow:auto; height:'.(15*$rows).'px; width:'.($cols*10).'; padding-right: 16px;">'.nl2br($value).'</DIV>':'<DIV style="overflow:auto; width:100; padding-right: 16px;">'.nl2br($value).'</DIV>').'</TD></TR></TABLE>'.($title!=''?'<BR><small>'.str_replace("'",'&#39;',(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'')).'</small>':'').'</div></DIV>';
	}
	else
		return (($value!='')?nl2br($value):'-').($title!=''?'<BR><small>'.(strpos(strtolower($title),'<font ')===false?'<FONT color='.Preferences('TITLES').'>':'').$title.(strpos(strtolower($title),'<font ')===false?'</FONT>':'').'</small>':'');
}
function DateInputAY($value,$name,$counter=1,$div_visibility=false)
{
	

	if(AllowEdit() && !$_REQUEST['_openSIS_PDF'])
	{
		if($value!='')
                {
                $month_names=array('JAN','FEB','MAR','APR','MAY','JUN','JUL','AUG','SEP','OCT','NOV','DEC');
                $show="value='$value'";
                $date_sep=explode('-',$value);
                $monthVal="value='".$month_names[$date_sep[1]-1]."'";

                $yearVal="value='$date_sep[0]'";
                $dayVal="value='$date_sep[2]'";
                $display="";
                
                }
                else
                {
                $show="";
                $date_sep="";
                $monthVal="";
                $yearVal="";
                $dayVal="";   
                $display="";
                
                }
                
                if($value!='')
                {
                    if($div_visibility==false)
                     return  '<table cellspacing="0" cellpadding="0"><tr><td><div id="date_div_'.$counter.'" style="display: inline" >'.ProperDateAY($value).'</div><input type=text id="date_'.$counter.'" '.$show.'  style="display:none" readonly></td><td>&nbsp; </td><td><a onClick="init('.$counter.',2);"><img src="assets/calendar.gif"  /></a><input type=hidden '.$monthVal.' id="monthSelect'.$counter.'" name="month_'.$name.'" ><input type=hidden '.$dayVal.'  id="daySelect'.$counter.'"   name="day_'.$name.'"><input type=hidden '.$yearVal.'  id="yearSelect'.$counter.'" name="year_'.$name.'" ></td></tr></table>';
                    else
                      return  '<table cellspacing="0" cellpadding="0"><tr><td><input type=text id="date_'.$counter.'" '.$show.'  readonly></td><td>&nbsp; </td><td><a onClick="init('.$counter.',1);"><img src="assets/calendar.gif"  /></a><input type=hidden '.$monthVal.' id="monthSelect'.$counter.'" name="month_'.$name.'" ><input type=hidden '.$dayVal.'  id="daySelect'.$counter.'"   name="day_'.$name.'"><input type=hidden '.$yearVal.'  id="yearSelect'.$counter.'" name="year_'.$name.'" ></td></tr></table>';      
                }
                else
                return  '<table cellspacing="0" cellpadding="0"><tr><td><input type=text id="date_'.$counter.'" '.$show.'  readonly></td><td>&nbsp; </td><td><a onClick="init('.$counter.',1);"><img src="assets/calendar.gif"  /></a><input type=hidden '.$monthVal.' id="monthSelect'.$counter.'" name="month_'.$name.'" ><input type=hidden '.$dayVal.'  id="daySelect'.$counter.'"   name="day_'.$name.'"><input type=hidden '.$yearVal.'  id="yearSelect'.$counter.'" name="year_'.$name.'" ></td></tr></table>';    
                
	}
	else
		return ProperDateAY($value);
}
function DateInputAY_red($value,$name,$counter=1,$cp_id)
{
	

	if(AllowEdit() && !$_REQUEST['_openSIS_PDF'])
	{
		if($value!='')
                {
                $month_names=array('JAN','FEB','MAR','APR','MAY','JUN','JUL','AUG','SEP','OCT','NOV','DEC');
                $show="value='$value'";
                $date_sep=explode('-',$value);
                $monthVal="value='".$month_names[$date_sep[1]-1]."'";

                $yearVal="value='$date_sep[0]'";
                $dayVal="value='$date_sep[2]'";
                $display="";
                
                }
                else
                {
                $show="";
                $date_sep="";
                $monthVal="";
                $yearVal="";
                $dayVal="";   
                $display="";
                
                }
                
                if($value!='')
                {
                         $student_id=UserStudentID();                     
                               $qr=  DBGet(DBQuery('select end_date from student_enrollment where student_id='.$student_id.' order by id desc limit 0,1'));

                           $stu_end_date=$qr[1]['END_DATE'];
                           $qr1=  DBGet(DBQuery('select end_date from course_periods where COURSE_PERIOD_ID='.$cp_id.''));
                        
                            $cr_end_date=$qr1[1]['END_DATE'];
            if(strtotime($cr_end_date) > strtotime($stu_end_date) && $stu_end_date!='')
                                                  {
             return  '<table cellspacing="0" cellpadding="0"><tr><td><div id="date_div_'.$counter.'" style="display: inline" ><FONT color=red>'.ProperDateAY($value).'</FONT></div><input type=text id="date_'.$counter.'" '.$show.'  style="display:none" readonly></td><td>&nbsp; </td><td><a onClick="init('.$counter.',2);"><img src="assets/calendar.gif"  /></a><input type=hidden '.$monthVal.' id="monthSelect'.$counter.'" name="month_'.$name.'" ><input type=hidden '.$dayVal.'  id="daySelect'.$counter.'"   name="day_'.$name.'"><input type=hidden '.$yearVal.'  id="yearSelect'.$counter.'" name="year_'.$name.'" ></td></tr></table>';
                
                                                  }
                                                  else
                                                  {
                                               return  '<table cellspacing="0" cellpadding="0"><tr><td><div id="date_div_'.$counter.'" style="display: inline" >'.ProperDateAY($value).'</div><input type=text id="date_'.$counter.'" '.$show.'  style="display:none" readonly></td><td>&nbsp; </td><td><a onClick="init('.$counter.',2);"><img src="assets/calendar.gif"  /></a><input type=hidden '.$monthVal.' id="monthSelect'.$counter.'" name="month_'.$name.'" ><input type=hidden '.$dayVal.'  id="daySelect'.$counter.'"   name="day_'.$name.'"><input type=hidden '.$yearVal.'  id="yearSelect'.$counter.'" name="year_'.$name.'" ></td></tr></table>';
                 
                                                  }
                     return  '<table cellspacing="0" cellpadding="0"><tr><td><div id="date_div_'.$counter.'" style="display: inline" >'.ProperDateAY($value).'</div><input type=text id="date_'.$counter.'" '.$show.'  style="display:none" readonly></td><td>&nbsp; </td><td><a onClick="init('.$counter.',2);"><img src="assets/calendar.gif"  /></a><input type=hidden '.$monthVal.' id="monthSelect'.$counter.'" name="month_'.$name.'" ><input type=hidden '.$dayVal.'  id="daySelect'.$counter.'"   name="day_'.$name.'"><input type=hidden '.$yearVal.'  id="yearSelect'.$counter.'" name="year_'.$name.'" ></td></tr></table>';
                }
                     else
                return  '<table cellspacing="0" cellpadding="0"><tr><td><input type=text id="date_'.$counter.'" '.$show.'  readonly></td><td>&nbsp; </td><td><a onClick="init('.$counter.',1);"><img src="assets/calendar.gif"  /></a><input type=hidden '.$monthVal.' id="monthSelect'.$counter.'" name="month_'.$name.'" ><input type=hidden '.$dayVal.'  id="daySelect'.$counter.'"   name="day_'.$name.'"><input type=hidden '.$yearVal.'  id="yearSelect'.$counter.'" name="year_'.$name.'" ></td></tr></table>';    
                
	}
	else
		return ProperDateAY($value);
}

?>