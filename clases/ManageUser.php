<?php

class ManageUser {
    private $bd = null;
    private $tabla = "cliente";
    
    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }
    
    function getList($pagina=1, $orden="", $nrpp=Constant::NRPP){
        $ordenPredeterminado = "$orden, nombre, apellidos";
        if($orden==="" || $orden === null){
            $ordenPredeterminado = "nombre, apellidos";
        }
         $registroInicial = ($pagina-1)*$nrpp;
         $this->bd->select($this->tabla, "*", "1=1", array(), $ordenPredeterminado , "$registroInicial, $nrpp");
         $r=array();
         while($fila =$this->bd->getRow()){
            $game = new User();
            $game->set($fila);
            $r[]=$game;
         }
         return $r;
    }
    
    function get($ID){
        $parametros = array();
        $parametros['ID'] = $ID;
        $this->bd->select($this->tabla, "*", "id_cliente=:ID", $parametros);
        $fila=$this->bd->getRow();
        $game = new User();
        $game->set($fila);
        return $game;
    }
    
    function delete($Code){
        $parametros = array();
        $parametros['id_cliente'] = $Code;
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    function erase(User $user){
        return $this->delete($user);
    }
    
    function set(User $game, $pkCode){
        $parametros = $game->getArray();
        $parametrosWhere = array();
        $parametrosWhere["id_cliente"] = $pkCode;
        return $this->bd->update($this->tabla, $parametros, $parametrosWhere);
    }
    
    function insert(User $user){
        $parametros = $user->getArray();
        return $this->bd->insert($this->tabla, $parametros, false);
    }
    
    function getValuesSelect(){
        $this->bd->query($this->tabla, "id_cliente, nombre", array(), "nombre");
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
