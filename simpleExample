<?php

$e = new Event();
$e->on('pedidoFinalizado', function($codigo, $valor) {
    $r = $valor+=1;
    echo $r . "\n";
});

$e = new Event();
$e->on('pedidoFinalizado', function($codigo, $valor) {
    $r = $valor+=2;
    echo $r . "\n";
});


$e = new Event();
$e->on('pedidoFinalizado', function($codigo, $valor) use ($teste) {
    $r = $valor+=3;
    echo $r . "\n";
});



$e->on('pedidoFinalizado', function($codigo, $valor) use ($e){
    $r = $valor+=10;
    $e->trigger('pedidoCancelado', ['b001']);
    echo $r . "\n";
});




$e->on('pedidoFinalizado', function($codigo, $valor) {
    $r = $valor+=0;
    echo $r . "\n";
});


$e->on('pedidoCancelado', function($codigo) {
    
    echo "Cancelado ".$codigo."\n";
});


$e->trigger('pedidoFinalizado', [4, 10]);
