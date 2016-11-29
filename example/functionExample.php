<?php

$e = new \EventPHP\Event();//inicia o interpretador de eventos globais

function test(){
  global $e;
  $e->on('pedidoFinalizado', function($codigo, $valor) {
      $r = $valor+=5;
      echo "codigo:".$codigo.", valor:".$r . "\n";
  });
}

test();
$e->trigger('pedidoFinalizado', [4, 10]);
