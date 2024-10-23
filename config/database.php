<?php
require_once __DIR__ . '/../vendor/autoload.php';

$mongoClient = new MongoDB\Client("mongodb+srv://iberico:#=T#&}X-rBs-5n=@vehiculo.f1kpf.mongodb.net/?retryWrites=true&w=majority&appName=Vehiculo");
$database = $mongoClient-> selectDatabase('vehiculo');
$tasksCollection = $database -> vehiculo ;