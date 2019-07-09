<?php
$targetFolder = $_SERVER['DOCUMENT_ROOT'].'/web/reviera/storage/app/public';
$linkfolder = $_SERVER['DOCUMENT_ROOT'].'/web/reviera/public/storage';
symlink($targetFolder,$linkfolder);
echo 'Success';
?>