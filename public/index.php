<?php
    require_once __DIR__ . '/../vendor/autoload.php';
    use Kokuga\BasicPokeapi\Pokedex;


    $pokedex = new Pokedex();


    header('Content-Type: application/json');

    echo json_encode($pokedex->getAllPokemons('offset=0&limit=20'));
