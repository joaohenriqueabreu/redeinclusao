<?php
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
//header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
header('Content-Type: text/xml, charset=UTF-8; encoding=UTF-8');
header("Content-Type: application/force-download");
header("Content-Type: application/download");;
header("Content-Disposition: attachment; filename=".$arquvio."_".date('Y_m_d-h-i-s').".xls");
header("Pragma: no-cache");
?>

<?php echo $content_for_layout ?>