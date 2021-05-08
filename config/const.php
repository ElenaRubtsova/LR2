<?php
$maxsize1 = 10485760;
$maxsize2 = 31457280;
ini_set('upload_max_filesize', $maxsize2);
$filetypes1 = array('doc','docx','pdf');
$filetypes2 = array('ppt','pptx','pdf');
$mimetypes1 = array('application/msword','application/vnd.openxmlformats-officedocument.wordprocessingml.document','application/pdf');
$mimetypes2 = array('application/vnd.ms-powerpoint','application/vnd.openxmlformats-officedocument.presentationml.presentation','application/pdf');