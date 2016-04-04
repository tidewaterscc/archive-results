<?php

error_reporting(E_ALL);

$ul = '<ul>';
function listgen($dir) {
	$ignore = array('.', '..', '.git', '.settings', '.project', '.buildpath', '.gitignore');
	$arr = scandir($dir);
	$li = '';
	foreach($arr as $i => $k) {
		if (in_array($k, $ignore)) continue;

		$li .= '<li><a href="'. $dir . DIRECTORY_SEPARATOR . $k.'">' . $k . "</a></li>\n";
		if (is_dir($dir . DIRECTORY_SEPARATOR . $k)) {
			$li .= '<ul>' . listgen($dir . DIRECTORY_SEPARATOR . $k) . '</ul>';
		}
	}
	return $li;
}
echo $ul . listgen('.') . '</ul>';
