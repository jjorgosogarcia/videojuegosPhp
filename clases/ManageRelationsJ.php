<?php

class ManageRelationsJ {

    private $bd = null;
    
    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }
    
     function getListJuegoDetalleFactura($condicion = null, $parametros = array()){
        if($condicion === null){
            $condicion = "";
        }else{
            $condicion = "where $condicion";
        }
        $sql = "select ju.*, de.*, fa.*, cl.* from detalle de 
                    left join juego ju on ju.id_juego = de.id_juego 
                    left join factura fa on fa.num_factura = de.num_factura 
                    left join cliente cl on fa.id_cliente = cl.id_cliente  
                $condicion ORDER BY cl.email, fa.fecha desc ";
        
         $this->bd->send($sql, $parametros);
         $r=array();
         $contador = 0;
         while($fila =$this->bd->getRow()){
             $juego = new Game();
             $juego->set($fila);
             $detalle = new Detalle();
             $detalle->set($fila, 8);
             $factura = new Factura();
             $factura->set($fila,13); 
             $cliente = new User();
             $cliente->set($fila, 16);
             $r[$contador]["juego"]=$juego;
             $r[$contador]["factura"]=$factura;
             $r[$contador]["detalle"]=$detalle;
             $r[$contador]["cliente"]=$cliente;
             $contador++;
         }
         return $r;
    }
    
}
