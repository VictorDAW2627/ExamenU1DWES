<?php 

namespace Examen\Ejercicio1;

error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once("Inventario.php");
include_once("Producto.php");



$datosDeEntrada = [ ["id" => 1, "nombre" => "Portátil Gaming", "precio" => 1199.99, "stock" => 10, "categoria" => "Electrónica"], 
["id" => 2, "nombre" => "Ratón Inalámbrico", "precio" => 45.50, "stock" => 3, "categoria" => "Electrónica"], 
["id" => 3, "nombre" => "Teclado Mecánico", "precio" => 89.90, "stock" => 0, "categoria" => "Electrónica"], 
["id" => 4, "nombre" => "Silla de Oficina", "precio" => 150.00, "stock" => 7, "categoria" => "Muebles"], 
["id" => 5, "nombre" => "Cafetera Express", "precio" => 79.95, "stock" => 12, "categoria" => "Electrodomésticos"] ];

$inventario = new Inventario();
for ($i=0; $i < count($datosDeEntrada); $i++) {
    $producto = new Producto($datosDeEntrada[$i]["id"], $datosDeEntrada[$i]["nombre"], $datosDeEntrada[$i]["precio"], $datosDeEntrada[$i]["stock"], $datosDeEntrada[$i]["categoria"]);
    $inventario->añadeProducto($producto);
}
$productos = $inventario->__get("productos");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inventario</title>
    <link rel="stylesheet" href="examen.css">
</head>
<body>
    <h1>Panel de Inventario</h1>
    <div>
        <h3>Total Stock</h3>
        <p><?=$inventario->valorTotal()?>€</p>
    </div>
    <div>
        <h3>Categorías</h3>
        <p><?=$inventario->obtenerCategorias()?></p>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Categoria</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i=0; $i < count($productos); $i++) { 
                echo "<tr>";
                $producto = $productos[$i];
                echo "<td>".$producto->__get("id")."</td>";
                echo "<td>".$producto->__get("nombre")."</td>";
                echo "<td>".$producto->__get("categoria")."</td>";
                echo "<td>".$producto->__get("precio")."</td>";
                echo "<td>".$producto->__get("stock")."</td>";
                echo "<td>".$producto->__get("estado")."</td>";
                echo "</tr>";
            }?>
        </tbody>
    </table>
</body>
</html>