<?php

require_once 'vendor/autoload.php';
$document = new \PhpOffice\PhpWord\TemplateProcessor('./template-utp.docx');

$uploadDir = __DIR__;
$outputFile = 'utp.docx';

//Загрузка файла
$uploadFile = $uploadDir . '\\' . basename($_FILES['file']['name']);
move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile);

$name = $_POST['name'];
$head = $_POST['head'];
$dateStart = $_POST['dateStart'];
$dateEnd = $_POST['dateEnd'];
$type = $_POST['type'];
$lvl = $_POST['lvl'];
$file = $_POST['file'];


$document->setValue('name', $name);
$document->setValue('head', $head);
$document->setValue('dateStart', $dateStart);
$document->setValue('dateEnd', $dateEnd);
$document->setValue('type', $type);
$document->setValue('lvl', $lvl);
$document->setImageValue('file', array('path' => $uploadFile, 'width' => 120, 'height' => 120, 'ratio' => false));

$document->saveAs($outputFile);

// Имя скачиваемого файла
$downloadFile = $outputFile;

// Контент-тип означающий скачивание
header("Content-Type: application/octet-stream");

// Размер в байтах
header("Accept-Ranges: bytes");

// Размер файла
header("Content-Length: ".filesize($downloadFile));

// Расположение скачиваемого файла
header("Content-Disposition: attachment; filename=".$downloadFile);  

// Прочитать файл
readfile($downloadFile);

//Удалить файлы
unlink($uploadFile);
unlink($outputFile);
