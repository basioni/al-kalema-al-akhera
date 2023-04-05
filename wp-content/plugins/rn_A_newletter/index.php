<?php
/*
Plugin Name: email_mob_newsletter
Plugin URI: http://own-source.com
Description: full email mob system
Version: 1.0
Author: Rona Onnaz
Author URI: shiny_rony89@yahoo.com
License: GPL2

Copyright YEAR  Rona Onnaz  (email : shiny_rony89@yahoo.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
	
*/


function rn_A_email_newsletter(){

if (isset($_POST["check"])&&$_POST["check"]=="Y"){
if ($_POST["email"]==""&&$_POST["mob"]==""){
echo '<script>alert("للاشتراك يجب ادخال احد هذه الحقول");</script>';
}
else{

$to = "masr@alkelmaalakhira.com";
$subject = "هنا مشترك جديد في الموقع";
$message = "بيانات المشترك الجديد:
البريد الإلكتروني:".$_POST['email']."
رقم الموبايل:".$_POST['mob'];

mail($to,$subject,$message);

echo '<script>alert("لقد تم اشتراكك في موقعنا و سيصلك احدث الاخبار علي بريدك الألكتروني");</script>';
}

}

$string="<form method='post'><table>
<tr><td id='title' colspan='2'> للاشتراك في موقعنا يرجي ادخال احد الحقول التالية او جميعها </td></tr>
<tr><td>
البريد الإلكتروني:</td><td><input type='text' name='email'></td></tr>";
$string.="<tr><td>رقم الموبايل:</td><td><input style='' type='text' name='mob'></td></tr>";
$string.="<tr><td colspan='2'><input type='submit' name='submit' value='اشتراك'><input type='hidden' name='check' value='Y'></td></tr>
</table></form>
";
return $string;
}
add_shortcode('email_newsletter','rn_A_email_newsletter');
?>