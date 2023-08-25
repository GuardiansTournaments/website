<?php     
$targetFolder = $_SERVER['DOCUMENT_ROOT'].'/AcademyLeague/storage/app/public';     
$linkFolder = $_SERVER['DOCUMENT_ROOT'].'/public/storage';     

symlink($targetFolder,$linkFolder);     
echo 'Symlink process successfully';