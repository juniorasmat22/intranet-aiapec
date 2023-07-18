<?php
require __DIR__ . '/Cargador.php';
Cargador::cargar();
session_start();
$despachador=new solicitud\Despachador();
$despachador->despachar();
