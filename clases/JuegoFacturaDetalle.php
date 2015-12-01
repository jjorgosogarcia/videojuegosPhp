<?php


class JuegoFacturaDetalle {
    private $juego, $detalle, $factura, $cliente;
    
    function __construct(Game $juego, Detalle $detalle, Factura $factura, User $cliente) {
        $this->juego = $juego;
        $this->detalle = $detalle;
        $this->factura = $factura;
        $this->cliente = $cliente;
    }

    function getJuego() {
        return $this->juego;
    }

    function getFactura() {
        return $this->factura;
    }

    function getDetalle() {
        return $this->detalle;
    }

    function getCliente() {
        return $this->cliente;
    }
    
    function setJuego(Game $juego) {
        $this->juego = $juego;
    }

    function setFactura(Factura $factura) {
        $this->factura = $factura;
    }

    function setDetalle(Detalle $detalle) {
        $this->detalle = $detalle;
    }
    
    function setCliente(User $cliente) {
        $this->cliente = $cliente;
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
