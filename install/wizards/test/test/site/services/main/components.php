<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if(
!CopyDirFiles(
	$_SERVER["DOCUMENT_ROOT"].WIZARD_RELATIVE_PATH."/site/as_components",
	$_SERVER["DOCUMENT_ROOT"].BX_PERSONAL_ROOT."/components",
	$rewrite = true,
	$recursive = true,
	$delete_after_copy = false
) ) {echo "Error CopyDirFiles as_components"; die();}
?>
