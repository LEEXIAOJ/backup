<?php
function backUp($fileSrc){
	if(!is_file($fileSrc))
		die("BackUp Error:".$fileSrc." is not a file, can't backup!");
	$typeOs = strtoupper(substr(PHP_OS, 0, 3));
	if($typeOs === "WIN")
		$path = str_replace("/", "\\", $fileSrc);
	if($typeOs === "LIN")
		$path = str_replace("\\", "/", $fileSrc);
	$pathName = substr($path, 0, strripos($path, "."));
	$exet = strrchr($path, '.');
	$fileName = $pathName.$exet;
	if(!$exet)
		$fileDst = $pathName.".bak";
	else	
		$fileDst = $pathName.".bak".$exet;
	if($handle = opendir(dirname($fileName))){
		while (false !== ($file = readdir($handle))) {
			if ($file == $fileDst) {
				echo $fileSrc." has bakeuped";
				}
			}
		}
	$file = file_get_contents($fileName);
	$fileDst = fopen($fileDst,"w");
	var_dump($fileDst);
	if(fwrite($fileDst, $file)){
		echo "backuped ok";
	}
}
backUp(__FILE__);	

