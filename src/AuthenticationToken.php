<?php

namespace Mjbezer\BBBoleto;

use GuzzleHttp\Psr7\Header;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;


class AutneticationToken 
{

    /**
     * Metodo responsável por retorno tokem de acesso à API de geração de Boleto Banco do Brasil
     * 
     * @param array $data
     * 
     * @return response $response 
     * 
     */

    public function getToken($data)
    {

        $request  =  Http::post('https://oauth.sandbox.bb.com.br/oauth/token',[
        'Header'=>'Content-Type=application/json',
        'json' => [
                'client_id'     => $data['client_id'],
                'client_secret' => $data['client_secret']
                ]      
        ]);

    }
}
