<?php
/*
Plugin Name: Easy Banners
Plugin URI: http://www.bannersky.com/html/easy-banners-for-wordpress.html
Description: Manage ad banners quickly with this simple interface.
Version: 1.4
Author: bannersky
Author URI: http://www.bannersky.com/
*/

if (!class_exists("EasyBanners")){
	class EasyBanners{
		
		var $table_name = '';
		var $init = 0;
		
		function EasyBanners(){
			//constructor
			
			global $table_prefix;
	
			$this->table_name = $table_prefix."easy_banners";
		}
		function Init(){
			//create table
			if ($this->CreateBannerTable() == false){
				return false;
			}
			$this->init = 1;
			
			return true;
		}
		function addHeader() {
			echo "<script type = 'text/javascript' src = '".get_bloginfo('wpurl')."/wp-content/plugins/easy-banners/javascript/handlers.js'></script>\n";
		}
		
		/**
		 * Creates banner table
		 */
		function CreateBannerTable() {
			
			$rs = @mysql_query("SHOW TABLES LIKE '$this->table_name'");
			$exists = @mysql_fetch_row($rs);
			if ( !$exists ) {
				$sql = "CREATE TABLE ".$this->table_name." (
						`id` int(11) NOT NULL auto_increment,      
						`name` varchar(250) default NULL,
						`imageURL` varchar(500), 
						`link` varchar(500), 
						`type` varchar(10) DEFAULT 'IMG',
						`target` varchar(10) DEFAULT '',       
						`width` smallint(6) DEFAULT 0,  
						`height` smallint(6) DEFAULT 0,
						`position` varchar(10) NOT NULL default 'RIGHT',
						PRIMARY KEY (`id`)
						);
						";
				@mysql_query($sql);
				return true;
			}
			return false;
		}
		/**
		 * insert new banner
		 */
		 function InsertBanner($name, $imageURL, $link, $type, $target, $width, $height, $position = 'RIGHT'){
		 	if (strpos($type, 'IMG')  === false && strrpos($type, 'SWF')  === false && strrpos($type, 'ADS')  === false){
				return;
			}
			$imageURL = str_replace("'", '"', $imageURL);
			$sqlString = "INSERT INTO $this->table_name(name, imageURL, link, type, target, width, height, position)".
			             "VALUES('$name', '$imageURL', '$link', '$type', '$target', $width, $height, '$position')";
			@mysql_query($sqlString);
		 }
	 
		 /**
		 * delete from banner table
		 */
		 function DeleteBanner($id){
		 	
			$sqlString = "DELETE FROM $this->table_name WHERE id = $id";
			@mysql_query($sqlString);
		 }
		 /**
		 * update banner
		 */
		 function UpdateBanner($id, $imageURL, $link, $type, $target, $width, $height, $position = 'RIGHT'){
		 	$imageURL = str_replace("'", '"', $imageURL);
			$sqlString = "UPDATE $this->table_name SET imageURL = '$imageURL', ".
						 "link = '$link', target = '$target', width = $width, height = $height, position  = '$position' WHERE id = $id";
			//echo $sqlString;
			@mysql_query($sqlString);
		 }
		 /**
		 * check banner name
		 */
		 function CheckBannerName($name){
			$sql = "SELECT COUNT(*) AS num FROM $this->table_name WHERE  name like '$name'";
			$rs = @mysql_query($sql);
			$numRS = @mysql_fetch_assoc($rs);

			if ($numRS['num'] > 0){
				return false;
			}
			return true;
		 }
		  /**
		 * check banner source url
		 */
		 function CheckBannerSource($srcURL, $is4Update = false, $oldID = 0){
		 	if ($is4Update == true){
				$sql = "SELECT COUNT(*) AS num FROM $this->table_name WHERE  imageURL like '$srcURL' AND id <> $oldID";
				//echo $sql;
			}else{
				$sql = "SELECT COUNT(*) AS num FROM $this->table_name WHERE  imageURL like '$srcURL'";
			}
			$rs = @mysql_query($sql);
			$numRS = @mysql_fetch_assoc($rs);

			if ($numRS['num'] > 0){
				return false;
			}
			return true;
		 }

		 function printAdminPage(){
			$easyBannerPath  = str_replace('\\','/',dirname(__FILE__));
		 	$msg = "";
		 	$task = '';
			$Error = true;
			$homeURL = get_option('home');
			
			
			if (isset($_POST['task'])){
				$task = $_POST['task'];
			}

			if ($task == 'INSERT_NEW' || $task == 'UPDATE_OLD'){
				$name = $_POST['name'];
				$srcURL = $_POST['srcURL'];
				$linkURL = $_POST['linkURL'];
				$openTarget = $_POST['openTarget'];
				$bannerType = $_POST['bannerType'];
				$bannerPosition = $_POST['bannerPos'];
				$width = $_POST['width'];
				$height = $_POST['height'];
				
				$name = trim($name);
				$name = str_replace("'", "\'", $name);
				$srcURL = trim($srcURL);
				$srcURL = str_replace($homeURL, "", $srcURL);
				$linkURL = trim($linkURL);
				$openTarget = trim($openTarget);
				$bannerType = trim($bannerType);
				if (is_numeric($width) == false){
					$width = 0;
				}
				if (is_numeric($height) == false){
					$height = 0;
				}
				
				
				$chk2Return = "";
				
				if ($name == ""){
					$msg .= "The Banner Name can't be NULL. ";
					$Error = false;
				}
				if ($srcURL == ""){
					$msg .= "The Banner Source URL of '$name' can't be NULL. ";
					$Error = false;
				}else if (strpos($srcURL, "'") !== false){
					$msg .= "The Banner Source URL of '$name' can't include any '. ";
					$Error = false;
				}
				if($bannerType == 'IMG'){ 
					if ($linkURL == ""){
						$msg .= "The Link to URL of '$name' can't be NULL .";
						$Error = false;
					}else if (strpos($linkURL, "'") !== false){
						$msg .= "The Link to URL of '$name' can't include any '. ";
						$Error = false;
					}
				}else if($bannerType == 'SWF'){
					$linkURL = "";
				}else if ($bannerType == 'ADS'){
					$linkURL = "";
				}
				
				if ($Error == false){
					//
				}else{
					//check if name, srcurl exist

					if ($Error == true && $task == 'INSERT_NEW'){
						if ($this->CheckBannerName($name) == false){
							$msg .= "Insert failed. The banner name: \"$name\" existed already.";
							$Error = false;
						}
						if ($bannerType != 'ADS'){
							if ($this->CheckBannerSource($srcURL) == false){
								$msg .= "Insert failed. The source url: \"$srcURL\" existed already.";
								$Error = false;
							}
						}
						if ($Error == true){
							$this->InsertBanner($name, $srcURL, $linkURL, $chk2Return.$bannerType, $openTarget, $width, $height, $bannerPosition);
							$msg = "New banner inserted!";
							
							//unsert post
							unset($_POST);
						}
					}else if ($Error == true && $task == 'UPDATE_OLD'){
						$oldID = $_POST['bannerID'];
						if (is_numeric($oldID) == false){
							$msg = "Update failed. Invalid banner ID.";
							$Error = false;
						}else if ($this->CheckBannerSource($srcURL, true, $oldID) == false){
							$msg .= "Update failed. The source url: \"$srcURL\" existed already.";
							$Error = false;
						}						
						if ($Error == true){
							$this->UpdateBanner($oldID, $srcURL, $linkURL, $bannerType, $openTarget, $width, $height, $bannerPosition);
							$msg = "Banner '$name' updated!";	
							
							//unsert post
							unset($_POST);				
						}
					}
				}
			}else if ($task == 'DELETE_OLD'){
				$oldID = $_POST['bannerID'];
				if (is_numeric($oldID) == false){
					$msg = "Delete failed. Invalid banner ID.";
					$Error = false;
				}
				if ($Error == true){
					$sql = "SELECT * FROM $this->table_name WHERE id = $oldID";
					$rs = @mysql_query($sql);
					$row = @mysql_fetch_assoc($rs);
					$name = $row['name'];
					
					$this->DeleteBanner($oldID);
					$msg = "Banner '$name' deleted!";					
				}
			}
			//display all
			$sql = "SELECT * FROM $this->table_name";
			$rs = @mysql_query($sql);
			?>
            <?php $this->addHeader(); ?>
            <div id = "icon-options-general" class = "icon32"></div>
			<h1>Easy Banners</h1>
			
           <?php if ($msg) {
		   ?>
		    <div align = "center" class = "updated fade">
            	<font color = "<?php if($Error == false){ echo '#FF0000';} else { echo '#0000FF';} ?>">
                	<b><?php echo $msg ?></b>
                </font>
                </div>
            <hr />
			<?php } // end if ?>
			
            <h3>Installed banners</h3>
            <p>
            	Developed by <a href="http://www.bannersky.com" target="_blank">www.bannersky.com</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="http://www.bannersky.com/html/easy-banners-for-wordpress.html" target="_blank">Help</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="http://www.bannersky.com/contact" target="_blank">Contact Us</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="http://www.bannersky.com/donate" target="_blank">Donate</a>
            </p>
            <table class="widefat" width="100%">
              <thead><tr valign="top">
                <th width="2%">ID</th>
                <th width="12%">Name</th>
                <th width="4%">Type</th>
                <th width="4%">Width</th>
                <th width="4%">Height</th>
                <th width="4%">Position</th>
                <th width="28%">Source URL</th>
                <th width="27%">Link to URL</th>
                <th width="10%">Open Target</th>
                <th width="5%">Action</th>
              </tr></thead>
			  <tbody>
              <?php
			  		$iItem = 0;
			  		while ( $row = @mysql_fetch_assoc($rs) ) {
						$iItem++;
			  ?>
              <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
              <tr valign="top">
                <td class="topright">
					<?php echo $row['id']; ?>
                    <input type="hidden" name="bannerID" id="bannerID" value="<?php echo $row['id']; ?>" />
                </td>
                <td class="topright">
					<?php echo $row['name']; ?>
                    <input type="hidden" name="name" id="name" value="<?php echo $row['name']; ?>" />
                </td>
                <td class="topright">
                	<?php 
						if ($row['type'] == 'SWF'){
							echo 'Flash'; 
						}else if ($row['type'] == 'IMG'){
							echo 'Image';
						}else if ($row['type'] == 'ADS'){
							echo 'Adsense';
						}
					?>
                    <input type="hidden" name="bannerType" id="bannerType" value="<?php echo $row['type']; ?>" />
                </td>
                <td class="topright">
                    <input type="text" name="width" id="widthUpdate<?php echo $row['id']; ?>" value="<?php echo $row['width']; ?>" size="4" maxlength="4"/>
                </td>
                <td class="topright">
                    <input type="text" name="height" id="heightUpdate<?php echo $row['id']; ?>" value="<?php echo $row['height']; ?>" size="4" maxlength="4"/>
                </td>
				<td class="topright">
                    <select name="bannerPos" id="bannerPos" autocomplete="off">
                    <option value="RIGHT"  <?php if ($row['position'] == 'RIGHT') echo 'selected="selected"'; ?>>RIGHT</option>
                    <option value="HEADER" <?php if ($row['position'] == 'HEADER') echo 'selected="selected"'; ?>>HEADER</option>
                    <option value="LEFT" <?php if ($row['position'] == 'LEFT') echo 'selected="selected"'; ?>>LEFT</option>
                    </select>
                </td>
                <td class="topright">
       <textarea name="srcURL" id="srcURL" cols="45" rows="<?php if ($row['type'] == 'ADS') echo '10'; else echo '5'; ?> "><?php echo trim($row['imageURL']); ?></textarea>
                </td>
                <td class="topright">
                	<?php 
						if ($row['type'] == 'IMG'){
					?>
                	<textarea name="linkURL" id="linkURL" cols="25" rows="5"><?php echo $row['link']; ?></textarea>
                    <?php }else{ ?>
                    <input type="hidden" name="linkURL" id="linkURL" value="" />
                    <?php } ?>
                </td>
                <td class="topright">
					<?php if ($row['type'] == 'IMG'){ ?>
                        <select name="openTarget" id="openTarget">
                        <option value="_blank" <?php if ($row['target'] == '_blank') echo 'selected="selected"'; ?>>new window</option>
                        <option value="_self" <?php if ($row['target'] == '_self') echo 'selected="selected"'; ?>>same window</option>
                        </select>
                    <?php }else{ ?>
                        <input type="hidden" name="openTarget" id="openTarget" value="" />
                    <?php } ?>
                </td>
                <td class="top"><label>
                  <div align="left">
                  	<input type="hidden" name="task" id="task" value=""/>
              		<input type="button" name="Update" id="Update" value="Update" class="button-secondary" onclick="this.form.task.value='UPDATE_OLD';this.form.submit();" style="width: 70px;"/>
             		<br />
               <!--  <input type="button" name="Delete" id="Delete" value="Delete" class="button-secondary" onclick="this.form.task.value='DELETE_OLD';this.form.submit();"  style="width: 70px;"/>-->
                    </div>
                </label></td>
              </tr>
              </form>
              <?php
			  		}//end of while ( $row = @mysql_fetch_assoc($rs) ) {

			  ?>
			</tbody>
            </table>
            <br />
            
			<hr />
            <h3>Add New Banner</h3>


            <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
            <table class="widefat" style="width: 50%;">
              <tr valign="top">
                <th width="25%" class="botright"><label for="name">Name</label></th>
                <td width="25%" class="bottom">
                <input type="text" name="name" id="name" size="55" maxlength="250" value="<?php echo @$_POST['name'];?>" />
                </td>
              </tr>
              <tr valign="top">
                <th class="botright"><label for="bannerType">Type</label></th>
                <td class="bottom">
                <select name="bannerType" id="bannerType" onchange="onAddTypeChange(this)" autocomplete="off" >
                <option value="IMG" selected="selected">Image</option>
                <option value="SWF">Flash</option>
                <option value="ADS">Adsense</option>
                </select>
                </td>
              </tr>
              <tr valign="top">
                <th width="25%" class="botright"><label for="name">Width</label></th>
                <td width="25%" class="bottom">
                <input type="text" name="width" id="widthAdd" size="55" maxlength="4" value="<?php echo @$_POST['width'];?>" />
                </td>
              </tr>
              <tr valign="top">
                <th width="25%" class="botright"><label for="name">Height</label></th>
                <td width="25%" class="bottom">
                <input type="text" name="height" id="heightAdd" size="55" maxlength="4" value="<?php echo @$_POST['height'];?>" />
                </td>
              </tr>
              <tr valign="top">
                <th class="botright"><label for="bannerPos">Banner Position</label></th>
                <td class="bottom">
                <select name="bannerPos" id="bannerPos" autocomplete="off">
                <option value="RIGHT"  selected="selected">RIGHT</option>
                <option value="HEADER">HEADER</option>
                <option value="LEFT">LEFT</option>
                </select>
                </td>
              </tr>
              <tr valign="top">
                <th class="botright"><label for="srcURL">Banner Source URL</label><br />
                <span id="imagePreviewWindow" style="display:block">
				<img src="<?php echo WP_PLUGIN_URL; ?>/easy-banners/images/spacer.gif" width="72" id="proxy" name="proxy" alt="Thumbnail" title="Thumbnail" border="0" align="top" style="padding-top: 10px;">
                </span>
				</th>
                <td class="bottom">
                <textarea name="srcURL" id="srcURL_addnew" onChange="f=document.getElementById('srcURL_addnew');document.images.proxy.src=f.value;" cols="45" rows="5"><?php echo @$_POST['srcURL'];?></textarea>
                <span id="shoeMediaLibraryList" style="display:block">
				<?php show_media_library('image') ?>
                </span>
				<span id="shoeMediaLibraryListOnlySWF" style="display:none">
				<?php show_media_library('swf') ?>
                </span>
				</td>
				
              </tr>
              <tr valign="top">
                <th class="botright">
                	<span id="addLinkToURLDesc" style="display:block"><label for="linkURL">Link to URL</label></span>                </th>
                <td class="bottom">
                	<span id="addLinkToURText" style="display:block"><textarea name="linkURL" id="linkURL" cols="45" rows="5"><?php echo @$_POST['linkURL'];?></textarea></span>
                </td>
              </tr>
              <tr valign="top">
                <th class="botright">
                	<span id="addLinkToTargetDesc" style="display:block"><label for="openTarget">Open Target</label></span>                </th>
                <td class="bottom">
               		<span id="addLinkToTargetText" style="display:block">
                    	<select name="openTarget" id="openTarget" autocomplete="off">
                    	<option value="_blank" selected="selected">new window</option>
                   	 	<option value="_self">same window</option>
                    	</select>
                	</span>
                </td>
              </tr>
              <tr valign="top">
                <td width="20%" colspan="2" style="padding:3px;">
                	<div align="center">
                    <input type="hidden" name="task" id="task" value="INSERT_NEW" />
              		<input class="button-primary" type="Submit" name="Insert" id="Insert" value="Submit" /><br />
					</div>
                </td>
              </tr>
            </table>
            </form>
            <br />
            <br />
            <?php
			
		 }//end of function
		 
	}//end of class EasyBanners{
}

if (class_exists("EasyBanners")) {
	$hl_EasyBanners = new EasyBanners();
}

//Initialize the admin panel
if (!function_exists("EasyBanners_ap")) {
	function EasyBanners_ap() {
		global $hl_EasyBanners;
		if (!isset($hl_EasyBanners)) {
			return;
		}
		if (function_exists('add_options_page')) {
			add_options_page('Easy Banners', 'Easy Banners', 9, basename(__FILE__), array(&$hl_EasyBanners, 'printAdminPage'));
		}
	}	
}
if (isset($hl_EasyBanners)) {
	add_action('admin_menu', 'EasyBanners_ap');
	add_action('activate_easy-banners/easy-banners.php', array(&$hl_EasyBanners, 'Init'));
}

function wp_easy_banner_single_show($atts, $content = null){
	global $hl_EasyBanners;
	global $wpdb;
	
	$homeURL = get_option('home');
	$atts = shortcode_atts(array('id' => '0'), $atts);
	$id = $atts['id'];
	
	if ($id == 0 || $id == ''){
		return "";
	}
	$sql = "SELECT * FROM $hl_EasyBanners->table_name WHERE `id` = ".$id;
	$obj = $wpdb->get_results($sql);
	$inf = $obj[0];
	$src2Show = "";
	
	if ($inf->type == 'SWF') :
		if (strpos($inf->imageURL, $homeURL) === false){
			if (substr($inf->imageURL, 0, 1) == '/'){
				$flashURL = $homeURL.$inf->imageURL;
			}else{
				$flashURL = $homeURL.'/'.$inf->imageURL;
			}
		}else{
			$flashURL = $inf->imageURL;
		}
		$flashURLnoTitle = trim($flashURL, '.swf');
		$src2Show = '<script type="text/javascript">
						 AC_FL_RunContent( \'codebase\',\'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0\',\'width\',\''.$inf->width.'\',\'height\',\''.$inf->height.'\',
						 \'src\',\''.$flashURLnoTitle.'\',\'quality\',\'high\',
						 \'pluginspage\',\'http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash\',
						 \'movie\',\''.$flashURLnoTitle.'\' ); //end AC code
					 </script>
					 <noscript>
					 <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="'.$inf->width.'" height="'.$inf->height.'">
					 <param name="movie" value="'.$flashURL.'" />
					 <param name="quality" value="high" />
					 <embed src="'.$flashURL.'" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="'.$inf->width.'" height="'.$inf->height.'"></embed>
					 </object>
					 </noscript>';
	elseif ($inf->type == 'IMG') :
		if ($inf->link){
			$src2Show = '<a href="'.$inf->link.'" target="'.$inf->target.'"><img src="'.get_home_url().$inf->imageURL.'" width="'.$inf->width.'" height="'.$inf->height.'" alt="'.$inf->name.'" /></a>';
		}else{
			$src2Show = '<img src="'.get_home_url().$inf->imageUR.'" width="'.$inf->width.'" height="'.$inf->height.'" alt="'.$inf->name.'" />';
		}
	elseif($inf->type == 'ADS') :
		$src2Show = $inf->imageURL;
	endif;
	
	return $src2Show;
}

function wp_easy_banner_display($position = 'RIGHT', $nameOfClass = 'sideimg', $readMore = 'read more>>') {
	
	global $hl_EasyBanners;
	global $wpdb;

	$sql = "SELECT * FROM $hl_EasyBanners->table_name WHERE position = '$position'";
	
	$rs = @mysql_query($sql);
	while ( $row = @mysql_fetch_assoc($rs) ) {
		$iItem++;
	?>
<div class = "<?php echo $nameOfClass ?>">
	<?php 
		if ($row['type'] == 'SWF'){ 
			$pos = strrpos($row['imageURL'], '.');
			if ($pos !== false){
				$title = substr($row['imageURL'], 0, $pos);
			}else{
				$title = $row['imageURL'];
			}
   ?>
	<script type = "text/javascript">
	AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version = 9,0,28,0','width','300','height','250','src','<?php echo $title; ?>','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version = ShockwaveFlash','movie','<?php echo $title; ?>' ); //end AC code
</script><noscript>
				<object classid = "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase = "http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version = 9,0,28,0" width = "300" height = "250">
	  <param name = "movie" value = "<?php echo $row['imageURL']; ?>" />
	  <param name = "quality" value = "high" />
	  <embed src = "<?php echo $row['imageURL']; ?>" quality = "high" pluginspage = "http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version = ShockwaveFlash" type = "application/x-shockwave-flash" width = "300" height = "250"></embed>
	</object>
	</noscript>
			<?php 
			}else if ($row['type'] == 'IMG') { 
				if ($row['link']){
			?>
				<a href = "<?php echo get_home_url().$row['link']; ?>" target = "<?php echo $row['target']; ?>">
                    <img src = "<?php echo get_home_url().$row['imageURL']; ?>" width="<?php echo $row['width']; ?>" height="<?php echo $row['height']; ?>" alt="<?php echo $row['name']; ?>.'"/>
                </a>
            <?php
				}else{
			?>
            	<img src = "<?php echo get_home_url().$row['imageURL']; ?>" width="<?php echo $row['width']; ?>" height="<?php echo $row['height']; ?>" alt="<?php echo $row['name']; ?>.'"/>
			<?php
				}
				if ($readMore != ''){
			?>
        	<p><?php echo $row['name']; ?>&nbsp;&nbsp;&nbsp;<a href = "<?php echo $row['link']; ?>"><?php echo $readMore ?></a></p>
            <?php
				}
			?>
		<?php }else if ($row['type'] == 'ADS') { ?>
        
			<?php echo $row['imageURL']; ?>
        
		<?php } ?>
</div>
<?php
	}//end of while ( $row = @mysql_fetch_assoc($rs) ) {
}//endo of function
function wp_easy_banner_add_flash_js(){
	global $hl_EasyBanners;
	global $wpdb;
	
	$sql = "SELECT COUNT(*) AS countv FROM $hl_EasyBanners->table_name WHERE `type` = 'SWF'";
	$obj = $wpdb->get_results($sql);
	
	if ($obj[0]->countv > 0){
		$siteurl = get_option('siteurl');
		$url = $siteurl . '/wp-content/plugins/' . basename(dirname(__FILE__)) . '/javascript/AC_RunActiveContent.js';
		echo "<script language=\"javascript\">AC_FL_RunContent = 0;</script>\n";
		echo "<script src=\"$url\" language=\"javascript\"></script>\n";
	}
}

// additions to improve layout
function admin_register_head() {
	$siteurl = get_option('siteurl');
	$url = $siteurl . '/wp-content/plugins/' . basename(dirname(__FILE__)) . '/css/style.css';
	echo "<link rel = 'stylesheet' type = 'text/css' href = '$url' />\n";
}
add_action('admin_head', 'admin_register_head');
	
function show_media_library($type='image') {
	$dir =  '';
	
	if ($type == 'image'){
		$script="e = document.getElementById('clicklist');f=document.getElementById('srcURL_addnew'); if (e.selectedIndex != 0) { document.images.proxy.src=e.options[e.selectedIndex].value; f.value=e.options[e.selectedIndex].value; }else{ document.images.proxy.src=''; f.value=''; }";
		$clicklist = '<select id = "clicklist" name = "clicklist" onChange = "'. $script . '">';
	}else if ($type == 'swf'){
		$script="e = document.getElementById('clicklistSWF');f=document.getElementById('srcURL_addnew');if (e.selectedIndex != 0) { f.value=e.options[e.selectedIndex].value;}else{ f.value=''; }";
		$clicklist = '<select id = "clicklistSWF" name = "clicklistSWF" onChange = "'. $script . '">';
	}
	
	$clicklist .= '<option>Optional: Select a file from WP "uploads" folder...</option>';
	if ($type == 'image'){
		$filelist = listfiles($dir,'jpg,png,gif,jpeg');
	}else if ($type == 'swf'){
		$filelist = listfiles($dir,'swf');
	}
	for ($i = 0; $i < count($filelist); $i++) {
		$filename = $urlprefix . $filelist[$i];
		$shortname = substr($filename,strrpos($filename,'/')+1);
		$clicklist.= "\t<option value = '$filename'>$shortname</option>\n";
	}
	$clicklist.= '</select><br />';
	echo $clicklist;
}


function listfiles($dir,$spec) { 
	//change this if you're not looking in WP uploads:
	$rootdir=WP_CONTENT_DIR.'/uploads';
	$urlprefix=get_bloginfo('wpurl').'/wp-content/uploads';
	$specString = $spec;

	$spec = explode(',',$spec);
	$filelist = array();
	$opendir = opendir($rootdir . '/' . $dir); 
	while ($filename = readdir($opendir)) { 
		if (($filename == ".") || ($filename == ".."))  { continue;}
		
		$ext = substr($filename,strrpos($filename,'.')+1);
		if (in_array($ext,$spec)) { $filelist[] = $urlprefix . $dir . '/'. $filename;}			
		// recurse if this is a directory:
		if ( is_dir($rootdir .'/' . $dir . '/'. $filename )) {  $filelist = array_merge( $filelist,listfiles($dir.'/'.$filename, $specString) );}
	}
	// don't let the door hit you on the way out:
	closedir($opendir); 
	sort($filelist);
	return $filelist;
}


	
// quick debug
function ddprint_r($x) {
	echo "<pre>";
	print_r($x);
	echo "</pre>";
	}
	
	
add_shortcode('esbsingle', 'wp_easy_banner_single_show');
add_action('wp_head', 'wp_easy_banner_add_flash_js');

?>