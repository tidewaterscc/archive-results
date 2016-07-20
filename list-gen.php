<?php

error_reporting(E_ALL);

$ul = '<ul class="results-list">';
function listgen($dir, $nested = false) {
	$ignoreFileExt = array(
		'.xls', 
		'.ods'
	);
	$ignoreFile = array(
		'.', '..', 
		'.git', 
		'.settings', 
		'.project', 
		'.buildpath', 
		'.gitignore',
		'images',
		'stylesheets',
		'javascripts',
		'Winter4_05-06_PAX.txt',
		'Winter4_05-06_CLASS.txt',
		'11-06_Joy1.html',
		'11-06_2-Day_Results.html',
		'W4-0607-Final_files',
		'W4-0607-Final.html',
		'VCASC_01_071507.htm',
		'Joyfund-Sunday.html',
		'Joyfund-Saturday.html',
		'VAC_Top16_Shootout.html',
		'VAC_2008_Combined_RAW.html',
		'VAC_2008_Combined_PAX.html',
		'VAC_2008_Combined_Class.html',
		'TSCC_Summer_2008_files',
		'TSCC_Summer_2008.html',
		'summer series_8_sum.htm',
		'summer series_8_raw.htm',
		'summer series_8_pax.htm',
		'2009_Season_Results_CLASS.pdf',
		'session3.htm',
		'session2.htm',
		'session1.htm',
		'overall.htm',
		'event_2.html',
		'd1.html',
		'd2.html',
		'2010PAX.htm',
		'2010OVERALL.htm',
		'points.htm',
		'09-September-21-2014-prelim.html',
		'live-results'
	);
	$customReplace = array(
		'/_event_\d_all/' => ''
	);
	$arr = scandir($dir);
	if (!$nested) arsort($arr);
	$li = '';
	foreach($arr as $i => $k) {
		if (in_array($k, $ignoreFile)) continue;
		if (in_array(substr($k, stripos($k, '.')), $ignoreFileExt)) continue;
		
		$id = str_replace(' ', '_', $k);
		$href = (preg_match('/\.\w{3,4}$/', $k)) ? $dir . DIRECTORY_SEPARATOR . $k : '#' . $id;

		$li .= '<li><a id="'.$id.'" href="'. $href .'">' . $k . "</a></li>\n";
		if (is_dir($dir . DIRECTORY_SEPARATOR . $k)) {
			$li .= '<ul>' . listgen($dir . DIRECTORY_SEPARATOR . $k, true) . '</ul>';
		}
	}
	return $li;
}
echo $ul . listgen('.') . '</ul>';
