<?php
/*
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
//Put id of the fields which you want to exclude from email, seperated by comma ',' i.e. submit,phone,email,etc..
$exclude='submit';
//Enter any text if you want to send along with the email.
// use \n for new line
$message='message';
//Add from email address here i.e. noreply@your_domain_name.com
$from='email';
//enter subject for the email
$subject='subject';
//Enter the email address where this mail will be sent
$to='adeep8961@gmail.com';
$exclude_list=explode(',', $exclude);
//The results that will be returned
$output='';
if(isset($_POST))
{
	if($message!='')
	{
		$message.="\n";
	}
	foreach($_POST as $key=>$value)
	{
		if(!in_array($key, $exclude_list))
		{
			$message.="{$key} : {$value} \n";
		}
	}
	$headers = "From: {$from}" . "\r\n" ;
	if(mail($to, $subject, $message, $headers))
	{
		$output='Your message has been sent.';
	}
	else
	{
		$output='Something wrong has happened. Please contact server administrator for further details';
	}
}
else
{
	$output='Invalid Request';
}
echo $output;
?>