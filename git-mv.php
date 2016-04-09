<?php

for ($year = 1998; $year < 2017; $year++) {
    $dir = __DIR__ . '/' . $year;
    $files = scandir($dir);
    foreach ($files as $file) {
        $pattern = '/^(\d{2})\-(\d{2})\.(\w{3,4})$/';
        if (preg_match($pattern, $file, $matches)) {
            $fileExt = $matches[3];
            $intMonth = $matches[1];
            $txtMonth = date('F', strtotime("$year-$intMonth-01"));
            $newFilename = "$intMonth-$txtMonth.$fileExt";
            echo "Renaming $file to $newFilename\n";
            //system("git mv $dir/$file $dir/$newFilename");
            print_r($matches);
            echo "\n";
        }
        $pattern = '/^(\d{2})(\d{2})(\d{2})([a-zA-Z_\-0-9]*)\.(htm|html)$/';
        if (preg_match($pattern, $file, $matches)) {
            $intMonth = $matches[2];
            $intDay = $matches[3];
            $fileAttr = $matches[4];
            $fileExt = $matches[5];
            $txtMonth = date('F', strtotime("$year-$intMonth-$intDay"));
            $newFilename = "$intMonth-$txtMonth-$intDay-$year$fileAttr.$fileExt";
            echo "Renaming $file to $newFilename\n";
            system("git mv $dir/$file $dir/$newFilename");
            print_r($matches);
            echo "\n";
        }
    }
}