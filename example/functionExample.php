<?php
$e = new Event();//inicia o interpretador de eventos globais

function test(){
  global $e;
  $e->on('pedidoFinalizado', function($codigo, $valor) {
      $r = $valor+=0;
      echo $r . "\n";
  });
}

$e->trigger('pedidoFinalizado', [4, 10]);
