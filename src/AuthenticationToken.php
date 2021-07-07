<?php

namespace Mjbezer\BBBoleto;

use GuzzleHttp\Psr7\Header;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class AuthenticationToken 
{

     /**
     * @var $environmentSetup
     * para instancia o objeto EnvironmentSetup
     * 
     */

    private $environmentSetup;

     /**
     * @var $callbackSetup
     * para instancia o objeto CallbackSetup
     * 
     */

    private $callbackSetup;


    /**
     * metodo construtor
     * 
     * @return void 
     * 
     */

    public function __construct()
    {
        $this->environmentSetup = new EnvironmentSetup();
        $this->callbackSetup    = new CallbackUrlSetup();
    }

    /**
     * Metodo responsável por retorno do code de autorização de acesso à API para geração do Token de acesso
     *  
     * @param array $data
     * 
     * @return array $response 
     *  
     */

    public function getAuthorize($data)
    {

        $environment = $this->environmentSetup->setup();

        $url  = $environment->getAuthorizeUrl();
      
        $request = Http::get($url.'?response_type=code&redirect_uri='.$this->callbackSetup->setup().'&client_id='.$data['client_id'].'&scope=consultas-financeiras.extratos&state=132644');
        
        $response  =  json_decode($request,true);
        return $response;

    }

    public function consumeApi($query)
    {
      

    }
}
