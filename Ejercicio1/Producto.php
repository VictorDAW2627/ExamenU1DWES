<?php

namespace Examen\Ejercicio1;

class Producto
{
    private int $id;
    private string $nombre;
    private float $precio;
    private int $stock;
    private string $categoria;
    private string $estado;

    public function __construct($id = null, $nombre = "", $precio = 0, $stock = 0, $categoria = "")
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->stock = $stock;
        $this->categoria = $categoria;
        if ($this->stock <= 0) {
            $this->estado = "Agotado";
        } elseif ($this->stock <= 3) {
            $this->estado = "Stock bajo";
        } else {
            $this->estado = "Disponible";
        }
    }
    public function __set($atributo, $valor)
    {
        if ($atributo === "id") {
            $this->id = $valor;
        } elseif ($atributo === "nombre") {
            $this->nombre = $valor;
        } elseif ($atributo === "precio") {
            $this->precio = $valor;
        } elseif ($atributo === "stock") {
            $this->stock = $valor;
            if ($this->stock <= 0) {
                $this->estado = "Agotado";
            } elseif ($this->stock <= 3) {
                $this->estado = "Stock bajo";
            } else {
                $this->estado = "Disponible";
            }
        } elseif ($atributo === "categoria") {
            $this->categoria = $valor;
        }
    }

    public function __get($atributo)
    {
        if ($atributo === "id") {
            return $this->id;
        } elseif ($atributo === "nombre") {
            return $this->nombre;
        } elseif ($atributo === "precio") {
            return $this->precio;
        } elseif ($atributo === "stock") {
            return $this->stock;
        } elseif ($atributo === "categoria") {
            return $this->categoria;
        } elseif ($atributo==="estado") {
            return $this->estado;
        }
    }

    public function toString() {
        $producto = "";
        $producto .= $this->__get("id").",";
        $producto .= $this->__get("nombre").",";
        $producto .= $this->__get("precio").",";
        $producto .= $this->__get("stock").",";
        $producto .= $this->__get("categoria").",";
        $producto .= $this->__get("estado");
        return $producto;
    }

}

?>