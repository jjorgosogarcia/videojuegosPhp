<?php


class ManageGame {
    private $bd = null;
    private $tabla = "juego";
    
    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }
    
    function getList($pagina=1, $orden="", $nrpp=Constant::NRPP){
        $ordenPredeterminado = "$orden, nombre, genero, plataforma";
        if($orden==="" || $orden === null){
            $ordenPredeterminado = "nombre, genero, plataforma";
        }
         $registroInicial = ($pagina-1)*$nrpp;
         $this->bd->select($this->tabla, "*", "1=1", array(), $ordenPredeterminado , "$registroInicial, $nrpp");
         $r=array();
         while($fila =$this->bd->getRow()){
             $game = new Game();
             $game->set($fila);
             $r[]=$game;
         }
         return $r;
    }
    
    function get($ID){
        $parametros = array();
        $parametros['ID'] = $ID;
        $this->bd->select($this->tabla, "*", "id_juego=:ID", $parametros);
        $fila=$this->bd->getRow();
        $game = new Game();
        $game->set($fila);
        return $game;
    }
    
    function delete($Code){
        $parametros = array();
        $parametros['id_juego'] = $Code;
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    function erase(Game $game){
        return $this->delete($game);
    }
    
    function set(Game $game, $pkCode){
        $parametros = $game->getArray();
        $parametrosWhere = array();
        $parametrosWhere["id_juego"] = $pkCode;
        return $this->bd->update($this->tabla, $parametros, $parametrosWhere);
    }
    


    function insert(Game $game){
        $parametros = $game->getArray();
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
