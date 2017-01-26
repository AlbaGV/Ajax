<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tipo

 */
class Raza {

  private $idraza;
  private $nombreraza;

  function __construct($idraza, $nombreraza) {
    $this->idraza = $idraza;
    $this->nombreraza = $nombreraza;
  }

  public function getIdRaza() {
    return $this->idraza;
  }

  public function getNombreRaza() {
    return $this->nombreraza;
  }


 
  public static function getListRaza() {
    
    require_once 'conexion.php';
    $conexion = canino::conectar();
 
    $seleccion = "SELECT idraza, nombreraza 
			FROM raza
			ORDER BY nombreraza";
    $consulta = $conexion->query($seleccion);

    $listadoRaza = [];
//Creo un nuevo objeto 
    while ($registro = $consulta->fetchObject()) {
       $listadoRaza[] = new Raza($registro->idraza, $registro->nombreraza);
               
               
    }
   
    return  $listadoRaza;
  }

}
