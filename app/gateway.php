<?php namespace App;

use App\Config;

/*
* Checkout transparent with PagSeguro
*/

class Gateway {

    protected $credentials;
    protected $mode = 'sandbox';
    protected $config = array();
    protected $sessionId;
    protected $order = array();

    public function __construct( $mode = 'sandbox' ) {
        $this->setMode( $mode );
        $this->setCredentials();
    }

    public function setMode( $mode ) {
        $this->mode = $mode;
    }

    public function getMode() {
        return $this->mode;
    }

    public function setCredentials(){
        $this->config = new Config();
        $this->config = $this->config->getConfig();
        $this->credentials = $this->config['pagseguro'][$this->getMode()]['credentials'];
    }

    public function getCredentials() {
        return $this->credentials;
    }

    private function getEnviromentData( $key ) {
        if( isset( $this->config['pagseguro'][$key] ) )
            return $this->config['pagseguro'][$key];

        return $this->config['pagseguro'][$this->getMode()][$key];
    }

    public function getSessionURL() {
        return $this->getEnviromentData('sessionURL');
    }

    public function getTransactionsURL() {
        return $this->getEnviromentData('transactionsURL');
    }

    public function getJavascriptURL() {
        return $this->getEnviromentData('javascriptURL');
    }

    public function getCDNimage(){
        return $this->getEnviromentData('cdn_image');
    }

    public function setSession(){
        $url = $this->getSessionURL();
        $params = $this->getCredentials();
        $session = $this->parseXMLtoJson( $this->request( $url, $params ) );
        $this->sessionId = $session['id']; 
    }

    public function getSession(){
        return $this->sessionId;
    }

    public function setOrder( $order ){
        $this->order = array_merge( $this->getCredentials(), $order );
    }

    public function getOrder(){
        return $this->order;
    }

    public function request( $url, $params ){
        $fields = http_build_query( $params );
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch,CURLOPT_POST,count($params));
        curl_setopt($ch,CURLOPT_POSTFIELDS,$fields);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public function payment( $order ){
        
        $this->setOrder( $order );
        return $this->parseXMLtoJson( 
                        $this->request( 
                            $this->getTransactionsURL(), 
                            $this->getOrder() 
                        )
                );
    }

    public function parseXMLtoJson( $xmlstring ){
        $xml = simplexml_load_string($xmlstring, "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        return json_decode($json,TRUE);
    }
    
}