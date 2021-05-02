<?php
ob_end_clean();

$file = __DIR__ . '/file.avi';

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=' . basename($file));
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($file));

readfile($file);
exit();