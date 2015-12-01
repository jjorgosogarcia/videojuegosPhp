<?php

class Factura {
    
    private $num_factura, $id_cliente, $fecha;
    
    function __construct($num_factura=null, $id_cliente=null, $fecha=null){
        $this->num_factura = $num_factura;
        $this->id_cliente = $id_cliente;
        $this->fecha = $fecha;
    }

    public function getNum_factura() {
        return $this->num_factura;
    }

    public function getId_cliente() {
        return $this->id_cliente;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setNum_factura($num_factura) {
        $this->num_factura = $num_factura;
    }

    public function setId_cliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
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
