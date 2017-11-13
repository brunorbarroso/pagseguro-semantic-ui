<?php namespace App;

/*
* Configurations PagSeguro
*/

class Config {
    
    protected $config = array();

    public function __construct(){
        $this->setConfig();
    }

    public function setConfig(){
        $this->config['pagseguro']['mode'] = $_ENV['MODE_PAGSEGURO']; //sandbox or production
        $this->config['pagseguro']['cdn_image'] = 'https://stc.pagseguro.uol.com.br';
        $this->config['pagseguro']['sandbox']['credentials']['email'] = $_ENV['EMAIL_PAGSEGURO_SANDBOX'];
        $this->config['pagseguro']['sandbox']['credentials']['token'] = $_ENV['TOKEN_PAGSEGURO_SANDBOX'];
        $this->config['pagseguro']['sandbox']['sessionURL'] = "https://ws.sandbox.pagseguro.uol.com.br/v2/sessions";
        $this->config['pagseguro']['sandbox']['transactionsURL'] = "https://ws.sandbox.pagseguro.uol.com.br/v2/transactions"; 
        $this->config['pagseguro']['sandbox']['javascriptURL'] = "https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js";			
        $this->config['pagseguro']['production']['credentials']['email'] = $_ENV['TOKEN_PAGSEGURO'];;
        $this->config['pagseguro']['production']['credentials']['token'] = $_ENV['TOKEN_PAGSEGURO_SANDBOX'];
        $this->config['pagseguro']['production']['sessionURL'] = "https://ws.pagseguro.uol.com.br/v2/sessions";
        $this->config['pagseguro']['production']['transactionsURL'] = "https://ws.pagseguro.uol.com.br/v2/transactions"; 
        $this->config['pagseguro']['production']['javascriptURL'] = "https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js";
    }

    public function getConfig(){
        return $this->config;
    }

}