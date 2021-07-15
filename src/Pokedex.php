<?php


    namespace Kokuga\BasicPokeapi;


    use Symfony\Component\HttpClient\HttpClient;
    use Symfony\Contracts\HttpClient\HttpClientInterface;

    class Pokedex
    {
        private HttpClientInterface $client;

        public function __construct()
        {
            $this->client = HttpClient::createForBaseUri('https://pokeapi.co/api/v2/');
        }

        public function getPokemon(): array
        {

            $response = $this->client->request('GET', 'pokemon/25');

            if (200 != $response->getStatusCode()) {
                throw new \RuntimeException('Error from Pokeapi.co');
            } else {
                return $response->toArray();

            }
            return $column;

        }

        public function getCleanPokemon(): array
        {
            $data = $this->getPokemon();
            $column = array_intersect_key($data, ['name' => NULL, 'id'=> NULL, 'weight'=> NULL, 'base_experience'=> NULL]);
            $column['image'] = $data['sprites']['front_default'];
            return $column;
        }

    }
