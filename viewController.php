<?php

/**
 * @package Produtos-MVC+POO 
 * @author Gabriel Alves Reis
 * 
 * Diretório Pai - raiz do site
 * Arquivo - viewController.php
 */

require_once 'lib/Application.php';
$Application = new Application();
$Application->dispatch();
