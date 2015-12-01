<?php

class ManageFactura {

    private $bd = null;
    private $tabla = "factura";
    
    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }
    
    function getList($pagina=1, $orden="", $nrpp=Constant::NRPP){
        $ordenPredeterminado = "$orden, fecha, id_cliente";
        if($orden==="" || $orden === null){
            $ordenPredeterminado = "fecha, id_cliente";
        }
         $registroInicial = ($pagina-1)*$nrpp;
         $this->bd->select($this->tabla, "*", "1=1", array(), $ordenPredeterminado , "$registroInicial, $nrpp");
         $r=array();
         while($fila =$this->bd->getRow()){
             $factura = new Factura();
             $factura->set($fila);
             $r[]=$factura;
         }
         return $r;
    }
    
    function getList2($id=""){
         $this->bd->select($this->tabla, "*", "id_cliente=$id", array(), "fecha");
         $r=array();
         while($fila =$this->bd->getRow()){
             $factura = new Factura();
             $factura->set($fila);
             $r[]=$factura;
         }
         return $r;
    }
    
    function get($ID){
        $parametros = array();
        $parametros['ID'] = $ID;
        $this->bd->select($this->tabla, "*", "num_factura=:ID", $parametros);
        $fila=$this->bd->getRow();
        $factura = new Factura();
        $factura->set($fila);
        return $factura;
    }
    
    function delete($Code){
        $parametros = array();
        $parametros['num_factura'] = $Code;
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    function erase(Factura $factura){
        return $this->delete($factura);
    }
    
    function set(Factura $factura, $pkCode){
        $parametros = $factura->getArray();
        $parametrosWhere = array();
        $parametrosWhere["num_factura"] = $pkCode;
        return $this->bd->update($this->tabla, $parametros, $parametrosWhere);
    }
    
    function insert(Factura $factura){
        $parametros = $factura->getArray();
        return $this->bd->insert($this->tabla, $parametros, true);
    }
    
    function getValuesSelect(){
        $this->bd->query($this->tabla, "num_factura, id_cliente", array(), "fecha");
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

    


