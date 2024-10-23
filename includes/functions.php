<?php
require_once __DIR__ . '/../config/database.php';

function sanitizeInput($input){
    return htmlspecialchars(strip_tags(trim($input)));
}


function agg_vehiculo($placa,$dueño,$modelo,$color,$marca){
    global $tasksCollection;
    $resultado = $tasksCollection -> insertOne([
        'placa'=> sanitizeInput($placa),
        'dueño'=> sanitizeInput($dueño),
        'modelo'=> sanitizeInput($modelo),
        'color'=> sanitizeInput($color),
        'marca'=> sanitizeInput($marca),
        //'hora de salida'=> new MongoDB\BSON\UTCDateTime(strtontime($horaSalida)*1000)
    ]);
    return $resultado -> getInsertedId();
}
function obtenerVehiculo(){
    global $tasksCollection;
    return $tasksCollection->find();
}
function obtenerVehiculoPorId($id){
    global $tasksCollection;
    return $tasksCollection-> findOne(['_id'=> new MongoDB\BSON\ObjectId($id)]);
}
function editarVehiculo($id,$placa,$dueño,$modelo,$color,$marca){
    global $tasksCollection;
    $resultado = $tasksCollection -> updateOne(
        ['_id' => new MongoDB\BSON\ObjectId($id)],
        ['set' => [
            'placa'=> sanitizeInput($placa),
            'dueño'=> sanitizeInput($dueño),
            'modelo'=> sanitizeInput($modelo),
            'color'=> sanitizeInput($color),
            'marca'=> sanitizeInput($marca),
           // 'hora de salida'=> new MongoDB\BSON\UTCDateTime(strtotime($horaSalida)*1000)
        ]]
        );
        return $resultado -> getModifiedCount();
}
function eliminarVehiculo($id){
    global $tasksCollection;
    $resultado = $tasksCollection-> deleteOne(['_id'=> new MongoDB\BSON\ObjectId($id)]);
    return $resultado->getDeletedCount();
}