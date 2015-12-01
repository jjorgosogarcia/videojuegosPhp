<?php

class ManageDetalle {
    
    private $bd = null;
    private $tabla = "detalle";
    
    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }
    
    function getList($pagina=1, $orden="", $nrpp=Constant::NRPP){
        $ordenPredeterminado = "$orden, num_factura, id_juego";
        if($orden==="" || $orden === null){
            $ordenPredeterminado = "num_factura, id_juego";
        }
         $registroInicial = ($pagina-1)*$nrpp;
         $this->bd->select($this->tabla, "*", "1=1", array(), $ordenPredeterminado , "$registroInicial, $nrpp");
         $r=array();
         while($fila =$this->bd->getRow()){
             $detalle = new Detalle();
             $detalle->set($fila);
             $r[]=$detalle;
         }
         return $r;
    }
    
    function get($ID){
        $parametros = array();
        $parametros['ID'] = $ID;
        $this->bd->select($this->tabla, "*", "num_detalle=:ID", $parametros);
        $fila=$this->bd->getRow();
        $detalle = new Detalle();
        $detalle->set($fila);
        return $detalle;
    }
    
    function delete($Code){
        $parametros = array();
        $parametros['num_detalle'] = $Code;
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    function erase(Detalle $detalle){
        return $this->delete($detalle);
    }
    
    function set(Detalle $detalle, $pkCode){
        $parametros = $detalle->getArray();
        $parametrosWhere = array();
        $parametrosWhere["num_detalle"] = $pkCode;
        return $this->bd->update($this->tabla, $parametros, $parametrosWhere);
    }
    
    function insert(Detalle $detalle){
        $parametros = $detalle->getArray();
        return $this->bd->insert($this->tabla, $parametros, false);
    }
    
    function getValuesSelect(){
        $this->bd->query($this->tabla, "id_juego, nombre", array(), "nombre");
        $array = array();
        while($fila=$this->bd->getRow()){
            $array[$fila[0]] = $fila[1];
        }
        return $array;
    }
    
    function count($condicion="1 = 1", $parametros = array()){
        return $this->bd->count($this->tabla, $condicion, $parametros);
    }
    
}

    

