<?php

error_reporting(E_ALL);

$ul = '<ul>';
function listgen($dir) {
	$ignoreDir = array('.', '..', '.git', '.settings', '.project', '.buildpath', '.gitignore');
	$ignoreFileExt = array('.xls');
	$arr = scandir($dir);
	$li = '';
	foreach($arr as $i => $k) {
		if (in_array($k, $ignoreDir)) continue;
		if (in_array(substr($k, stripos($k, '.')), $ignoreFileExt)) continue;
		
		$id = str_replace(' ', '_', $k);
		$href = (preg_match('/\.\w{3,4}$/', $k)) ? $dir . DIRECTORY_SEPARATOR . $k : '#' . $id;

		$li .= '<li><a id="'.$id.'" href="'. $href .'">' . $k . "</a></li>\n";
		if (is_dir($dir . DIRECTORY_SEPARATOR . $k)) {
			$li .= '<ul>' . listgen($dir . DIRECTORY_SEPARATOR . $k) . '</ul>';
		}
	}
	return $li;
}
echo $ul . listgen('.') . '</ul>';
