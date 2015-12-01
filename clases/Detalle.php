<?php

class Detalle {
    
    private $num_detalle, $num_factura, $id_juego, $cantidad, $precio;
    
    function __construct($num_detalle=null, $num_factura=null, $id_juego=null, 
            $cantidad=null, $precio=null) {
        $this->num_detalle = $num_detalle;
        $this->num_factura = $num_factura;
        $this->id_juego = $id_juego;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
    }
    
    public function getNum_detalle() {
        return $this->num_detalle;
    }

    public function getNum_factura() {
        return $this->num_factura;
    }

    public function getId_juego() {
        return $this->id_juego;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setNum_detalle($num_detalle) {
        $this->num_detalle = $num_detalle;
    }

    public function setNum_factura($num_factura) {
        $this->num_factura = $num_factura;
    }

    public function setId_juego($id_juego) {
        $this->id_juego = $id_juego;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    //3º getJson
    public function getJson() {
        $r = '{';
        foreach ($this as $indice => $valor) {
            $r .= '"' . $indice . '":"' . $valor . '",';
        }
        $r = substr($r, 0, -1);
        $r .='}';
        return $r;
    }

    //4º set genérico    
    function set($valores, $inicio = 0) {
        $i = 0;
        foreach ($this as $indice => $valor) {
            $this->$indice = $valores[$i + $inicio];
            $i++;
        }
    }

    public function __toString() {
        $r = '';
        foreach ($this as $key => $valor) {
            $r .= "$valor ";
        }
        return $r;
    }

    public function getArray($valores = true) {
        $array = array();
        foreach ($this as $key => $valor) {
            if ($valores === true) {
                $array[$key] = $valor;
            } else {
                $array[$key] = null;
            }
        }
        return $array;
    }

    function read() {
        foreach ($this as $key => $valor) {
            $this->$key = Request::req($key);
        }
    }

}
