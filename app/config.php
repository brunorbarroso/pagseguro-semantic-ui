<?php namespace App;

/*
* Configurations PagSeguro
*/

class Config {
    
    public $config;

    public function __construct(){
        $this->config['pagseguro']['mode'] = 'sandbox'; //sandbox or production
        $this->config['pagseguro']['cdn_image'] = 'https://stc.pagseguro.uol.com.br';
        $this->config['pagseguro']['sandbox']['credentials']['email'] = "brunobinfo@gmail.com";
        $this->config['pagseguro']['sandbox']['credentials']['token'] = "BC5CAB0441F64E3F999DC95444C9696F";
        $this->config['pagseguro']['sandbox']['sessionURL'] = "https://ws.sandbox.pagseguro.uol.com.br/v2/sessions";
        $this->config['pagseguro']['sandbox']['transactionsURL'] = "https://ws.sandbox.pagseguro.uol.com.br/v2/transactions"; 
        $this->config['pagseguro']['sandbox']['javascriptURL'] = "https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js";			
        $this->config['pagseguro']['production']['credentials']['email'] = "brunobinfo@gmail.com";
        $this->config['pagseguro']['production']['credentials']['token'] = "D05E5A7E80CB42D6985A3F37A6B878E5";
        $this->config['pagseguro']['production']['sessionURL'] = "https://ws.pagseguro.uol.com.br/v2/sessions";
        $this->config['pagseguro']['production']['transactionsURL'] = "https://ws.pagseguro.uol.com.br/v2/transactions"; 
        $this->config['pagseguro']['production']['javascriptURL'] = "https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js";
    }

}