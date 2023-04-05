<?PHP
require_once('pclzip.lib.php');
$archive = new PclZip('forum1.zip');
if ($archive->extract() == 0) {
die("Error : ".$archive->errorInfo(true));
}
?>
