<?php 

namespace Examen\Ejercicio1;

class Inventario
{
    private array $productos;

    public function __construct(array $productos = []){
        $this->productos = $productos;
    }

    public function __get($atributo){
        if ($atributo==="productos") {
            return $this->productos;
        }
    }

    public function __set($atributo, array $valor){
        if ($atributo==="productos") {
            $this->productos = $valor;
        }
    }

    public function añadeProducto(Producto $producto) {
        array_push($this->productos, $producto);
    }

    public function productosDisponibles() {
        $productos = $this->productos;
        $prodDisponibles=[];
        for ($i=0; $i < count($productos); $i++) {
            $producto = $productos[$i];
            if ($producto->__get("estado")==="Disponible") {
                array_push($prodDisponibles, $productos[$i]);
            }
        }
        return $prodDisponibles;
    }

    public function valorTotal() {
        $productos = $this->productos;
        $valorTotal=0;
        for ($i=0; $i < count($productos); $i++) { 
            $producto = $productos[$i];
            $valorTotal+=$producto->__get("precio")*$producto->__get("stock");
        }
        return $valorTotal;
    }

    public function buscaID($id){
        $productos = $this->productos;
        for ($i=0; $i < count($productos); $i++) { 
            $producto = $productos[$i];
            if ($producto->__get("id")===$id) {
                return $producto;
            }
        }
        return false;
    }

    public function obtenerNombres(){
        $productos = $this->productos;
        $nombres = [];
        for ($i=0; $i < count($productos); $i++) { 
            $producto = $productos[$i];
            array_push($nombres, $producto->__get("nombre"));
        }
        return implode(",", $nombres);
    }

    public function obtenerCategorias(){
        $productos = $this->productos;
        $categorias = [];
        for ($i=0; $i < count($productos); $i++) { 
            $producto = $productos[$i];
            if (!in_array($producto->__get("categoria"), $categorias) ) {
                array_push($categorias, $producto->__get("categoria"));
            }
            
        }
        return implode(",", $categorias);
    }
}


?>