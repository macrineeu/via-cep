<?php

namespace Macrineeu\ViaCepService;

use GuzzleHttp\Client;

class ConsultaCep
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * Search CEP in ViaCep
     * @param string $cep
     * @return object
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function consultarCEP(string $cep): object
    {
        try {
            $cep = preg_replace('/\D/', '', $cep);
            $response = $this->client->get("https://viacep.com.br/ws/{$cep}/json/");

            $data = json_decode($response->getBody()->getContents());

            if (isset($data->erro)) {
                return (object) [
                    'message' => 'CEP não localizado'
                ];
            }

            return (object) $data;
        } catch (\Exception $e) {
            return (object) [
                'message' => 'Erro ao buscar CEP'
            ];
        }
    }
}