<?php namespace App;

use App\Config;

/*
* Checkout transparent with PagSeguro
*/

class App {
    
    protected $config = array();
    protected $data = array();

    public function __construct(){
        $config = new Config();
        $this->config = $config->getConfig();
    }

    public function metadata()
    {
        $app = new \App\Gateway( $this->config['pagseguro']['mode'] );
        $app->setSession();
        $this->data['sessionId'] = $app->getSession();
        $this->data['javascriptURL'] = $app->getJavascriptURL();
        $this->data['cdn_pagseguro_img'] = $app->getCDNimage();
        return $this->data;
    }
    
    /**
     * @return mixed
     */
    public function payment( $fields )
    {
        if ( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {

            $app = new \App\Gateway( $this->config['pagseguro']['mode'] );
            $order = $fields;
            $orderExtra = array('paymentMode'=>'default',
                                'currency'=>'BRL',
                                'notificationURL'=>$_ENV['URL_NOTIFICATION']);
    
            $order = array_merge($order, $orderExtra);
            $orderNew = array();
            
    
            foreach($order as $idx => $od){
                if( $idx == 'itemQuantity' 
                    || $idx == 'noInterestInstallmentQuantity' 
                    || $idx == 'creditCardHolderAreaCode' 
                    || $idx == 'senderAreaCode'
                    || $idx == 'shippingAddressNumber'
                    || $idx == 'itemId'
                    || $idx == 'installmentQuantity' ){
                    $od = (int)$od;
                } else if( $idx == 'installmentValue' || $idx == 'itemAmount1' ) {
                    $od = sprintf("%01.2f", (float)(string)$od);
                }
    
                $orderNew = array_merge($orderNew, array($idx=>$od));
            }
            
            //print json_encode( array('status'=>'success', 'message'=>json_encode( $app->payment( $orderNew ) ) ) );
            print json_encode( $app->payment( $orderNew ) );
    
        } else {
            print json_encode( array('status'=>'error', 'message'=>'nao é requisição ajax' ) );
        }
    
    }

}