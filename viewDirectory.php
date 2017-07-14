<?php

// iterate through directory, and store results in to an array
$dir = "/";
$dh  = opendir($dir);
while (false !== ($filename = readdir($dh))) {
    $files[] = $filename;
}

// sort results A-Z
sort($files);

// output in to an unordered list of hyperlinks
echo "<ul>\n";
foreach ($files as $k => $v) {
    echo "<li><a href=\"".$v."\">".$v."</a> ";
    if (file_exists($v)) {
    	echo date ("[n/j H:i]", filemtime($v));
	}
	echo "</li>\n";
}
echo "</ul>\n";

?>