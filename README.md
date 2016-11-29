# EventPHP
Usage

```php
$e = new \App\Event();//start global event 

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

```
