<?php

class Game {

    private $id_juego, $caratula, $nombre, $genero, $descripcion, $plataforma, $precio,
            $stock;

    function __construct($id_juego = null, $caratula = null, $nombre = null, 
            $genero = null, $descripcion = null, $plataforma = null, 
            $precio = null, $stock = null) {
        $this->id_juego = $id_juego;
        $this->caratula = $caratula;
        $this->nombre = $nombre;
        $this->genero = $genero;
        $this->descripcion = $descripcion;
        $this->plataforma = $plataforma;
        $this->precio = $precio;
        $this->stock = $stock;
    }

    function getId_juego() {
        return $this->id_juego;
    }

    function setId_juego($id_juego) {
        $this->id_juego = $id_juego;
    }
    
    public function getCaratula() {
        return $this->caratula;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getGenero() {
        return $this->genero;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getPlataforma() {
        return $this->plataforma;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getStock() {
        return $this->stock;
    }

    public function setCaratula($caratula) {
        $this->caratula = $caratula;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setGenero($genero) {
        $this->genero = $genero;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setPlataforma($plataforma) {
        $this->plataforma = $plataforma;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function setStock($stock) {
        $this->stock = $stock;
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
