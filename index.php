<?php require 'vendor/autoload.php';

use \App\App;

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$app = new App();
$meta = $app->metadata();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/semantic.min.css"> 
    <script type="text/javascript" src="<?php echo $meta['javascriptURL']; ?>"></script>
  
</head>
<body>
<div class="ui raised very padded text container segment">
    <div class="ui ignored error message" style="display: none">
      <p></p>
    </div>
    <div class="ui form">
      <h4 class="ui dividing header">Dados do comprador</h4>
      <div class="field">
        <div class="fields">  
          <div class="twelve wide field">
            <label>Nome completo</label>
              <input type="text" name="shipping[first-name]" placeholder="nome completo">
          </div>
          <div class="five wide field">
            <label>Data de Nascimento</label>
            <input type="text" name="shipping[address]" class="placeholder" id="placeholder" placeholder="xx/xx/xxxx">
          </div>
        </div>
      </div>
      <div class="field">
        <div class="fields">         
          <div class="twelve wide field">
            <label>CPF</label>
            <input type="text" name="shipping[address-2]" class="cpf" placeholder="xxx.xxx.xxx-xx">
          </div>
          <div class="ten wide field">
            <div class="fields">
                <div class="five wide field">
                  <label>DDD</label>
                  <input type="text" name="shipping[address]" class="ddd" placeholder="xxx">
                </div>
                <div class="twelve wide field">
                  <label>Telefone</label>
                  <input type="text" name="shipping[address]" class="phone" placeholder="x.xxxx-xxxx">
                </div>
            </div>
          </div>
        </div>
      </div>
      <h4 class="ui dividing header">Endereço do comprador</h4>
      <div class="field">
        <div class="fields">
          <div class="five wide field">
            <label>CEP</label>
            <div class="ui icon input zipcode ">
              <input type="text" name="cep" class="cep" id="cep" placeholder="xxxxx-xxx">
              <i class="inverted circular search link icon searchzipcode"></i>
            </div>
          </div>
          <div class="twelve wide field">
            <label>Endereço</label>
            <input type="text" name="logradouro" placeholder="rua, avenida, etc.">
          </div>
          <div class="four wide field">
            <label>Número</label>
            <input type="text" name="numero" placeholder="número">
          </div>
        </div>
      </div>
      <div class="two fields">
        <div class="field">
          <label>Estado</label>
          <select name="uf" class="ui fluid dropdown">
            <option value="">Escolha...</option>
            <option value="a">Acre</option>
            <option value="a">Alagoas</option>
            <option value="a">Amapá</option>
            <option value="a">Amazonas</option>
            <option value="a">Bahia</option>
            <option value="CE">Ceará</option>
            <option value="a">Distrito Federal</option>
            <option value="a">Espírito Santo</option>
            <option value="a">Goiás</option>
            <option value="a">Maranhão</option>
            <option value="a">Mato Grosso</option>
            <option value="a">Mato Grosso do Sul</option>
            <option value="a">Minas Gerais</option>
            <option value="a">Pará</option>
            <option value="a">Paraíba</option>
            <option value="a">Paraná</option>
            <option value="a">Pernambuco</option>
            <option value="a">Piauí</option>
            <option value="a">Rio de Janeiro</option>
            <option value="a">Rio Grande do Norte</option>
            <option value="a">Rio Grande do Sul</option>
            <option value="a">Rondônia</option>
            <option value="a">Roraima</option>
            <option value="a">Santa Catarina</option>
            <option value="a">São Paulo</option>
            <option value="a">Sergipe</option>
            <option value="a">Tocantins</option>
          </select>
        </div>
        <div class="field">
          <label>Cidade</label>
          <select name="cidade" class="ui fluid dropdown">
            <option value="">Escolha...</option>
            <option value="Maracanaú">Maracanaú</option>
            <option value="Fortaleza">Fortaleza</option>
            <option value="a">Madalena</option>
          </select>
        </div>
        <div class="field">
          <label>Bairro</label>
          <input type="text" name="bairro" placeholder="bairro">
        </div>
      </div>
      <div class="field">
          <label>Complemento</label>
          <textarea rows="2" name="complemento" placeholder="Complemento"></textarea>
      </div>    
    
      <div id="formspayment">
        <div class="ui pointing menu">
          <a class="creditcard item active" data-tab="creditcard">Crédito</a>
          <a class="debit item" data-tab="debit">Débito</a>
          <a class="boleto item" data-tab="boleto">Boleto</a>
        </div>
        <div class="ui active tab segment" data-tab="creditcard">
          <div class="fields">
              <div class="ten wide field">
                <label>Nome Impresso no Cartão</label>
                <input type="text" name="shipping[address-2]" placeholder="Nome Impresso">
              </div>
              <div class="ten wide field">
                <label>Número</label>
                <input type="text" name="card[number]" maxlength="16" placeholder="Número">
              </div>
          </div>
          <div class="fields">
            <div class="three wide field">
              <label>CVC</label>
              <input type="text" name="card[cvc]" maxlength="3" placeholder="CVC">
            </div>
            <div class="seven wide field">
              <label>Data de Expiração</label>
              <div class="two fields">
                <div class="field">
                  <select class="ui fluid search dropdown" name="card[expire-month]">
                    <option value="">Mês</option>
                    <option value="1">Janeiro</option>
                    <option value="2">Fevereiro</option>
                    <option value="3">Março</option>
                    <option value="4">Abril</option>
                    <option value="5">Maio</option>
                    <option value="6">Junho</option>
                    <option value="7">Julho</option>
                    <option value="8">Agosto</option>
                    <option value="9">Setembro</option>
                    <option value="10">Outubro</option>
                    <option value="11">Novembro</option>
                    <option value="12">Dezembro</option>
                  </select>
                </div>
                <div class="field">
                <select class="ui fluid search dropdown" name="card[expire-month]">
                    <option value="">Ano</option>
                    <option value="1">2017</option>
                    <option value="2">2018</option>
                    <option value="3">2019</option>
                    <option value="4">2020</option>
                    <option value="5">2021</option>
                    <option value="6">2022</option>
                    <option value="7">2023</option>
                    <option value="8">2024</option>
                    <option value="9">2025</option>
                    <option value="10">2026</option>
                    <option value="11">2027</option>
                    <option value="12">2028</option>
                    <option value="12">2029</option>
                    <option value="12">2030</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="six wide field">
              <label>Parcelas</label>
              <select class="ui fluid search dropdown" name="card[expire-month]">
                    <option value="">Sem dados do cartão</option>
                  </select>
            </div>
          </div>
          <button class="generate ui button green">Salvar e Realizar Pagamento</button>
        </div>
        <div class="ui tab segment" data-tab="debit">
          <div class="field">
              <label>Lista de bancos</label>
              <div class="ui selection dropdown">
                <input type="hidden" name="card[type]">
                <div class="default text">Escolha...</div>
                <i class="dropdown icon"></i>
                <div class="menu">
                  <div class="item" data-value="mastercard">
                    <img src="https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/68x30/bb.png">
                    Banco do Brasil
                  </div>
                  <div class="item" data-value="visa">
                    <img src="https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/68x30/banrisul.png">
                    Barinsul
                  </div>
                  <div class="item" data-value="american">
                    <img src="https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/68x30/bradesco.png">
                    Bradesco
                  </div>
                  <div class="item" data-value="discover">
                    <img src="https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/68x30/itau.png">
                    Itaú
                  </div>
                </div>
              </div>
          </div>
          <button class="generate ui button green">Salvar e Acessar o Banco</button>
        </div>
        <div class="ui tab segment" data-tab="boleto">
            <button class="generate ui button green">Salvar e Gerar Boleto</button>
        </div>
      </div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="https://semantic-ui.com/dist/semantic.min.js"></script>
<script src="assets/js/semantic.js"></script>
<script src="assets/js/jquery.mask.js"></script>
<script src="assets/js/validation_form.js"></script>

<!-- Adicionando Javascript -->
<script type="text/javascript" >

    var valueTotal = 99.00;
        var paymentMethod = "eft";

        $(document).ready(function(){

            PagSeguroDirectPayment.setSessionId('<?php echo $meta['sessionId'] ?>');
            $(".formspayment .creditcard").hide();
            $(".formspayment .debit").hide();
            $(".formspayment .boleto").hide();
            setFormsPayments( valueTotal );

        });

        var setError = function( msg ){
            $('.error-order').html( msg );
            $('.error-order').show();
            setTimeout(function(){
                $('.error-order').hide();
            }, 6000);
        };

        var setSuccess = function( msg ){
            $('.alert-order').html( msg );
            $('.alert-order').show();
            setTimeout(function(){
                $('.alert-order').hide();
            }, 60000);
        };

        $('.choice-payment li a').on('click', function(){
            paymentMethod = $(this).data('formpayment');
        });

        $('.confirm-card').on('click', function () {
            if( $("input[name=cardNumber]").val().length > 0 && $("input[name=cardCvv]").val().length > 0 && $("input[name=cardExpirationMonth]").val().length > 0 && $("input[name=cardExpirationYear]").val().length > 0){
                $('.data-client').show();
                $(this).hide();
            } else {
                setError( "Favor, preencher os campos acima para avançar!" );
            }
        });

        $('#creditCardPaymentButton').on('click', function () { sendPayment('creditcard') });
        $('#debitPaymentButton').on('click', function () { sendPayment('debit') });
        $('#boletoButton').on('click', function () { sendPayment('boleto') });

        $("select[name=installmentQuantity]").on('change', function () {
            $("input[name=installmentValue]").val( $( ".list-parcel option:selected" ).data('valueparcel') );
            $("input[name=extraAmount]").val( $( ".list-parcel option:selected" ).data('extraamount') );
        });

        var getParcelCreditCard = function(){
            PagSeguroDirectPayment.getInstallments({
                amount: valueTotal,
                brand: $( "input[name=creditCardBrandName]" ).val(),
                maxInstallmentNoInterest: 2,
                    success: function(response) {
                        $("#creditcard .list-parcel select").html("<option>Selecione</option>")
                        var parcels = response.installments[$("input[name=creditCardBrandName]").val()];
                        $.each(parcels, function (idx, itm) {
                            $("#creditcard .list-parcel select").append("<option value="+itm.quantity+" data-valueParcel='"+itm.installmentAmount+"' data-extraAmount='"+itm.totalAmount+"'>"+itm.quantity+'x de R$ '+ itm.installmentAmount+' - Total R$ '+itm.totalAmount+"</option>");
                            console.log('parcelas', itm.quantity+'x de R$ '+ itm.installmentAmount+' - Total R$ '+itm.totalAmount)
                        });
                }, error: function(response){
                    setError("Não foi possível liberar as parcelas. Dados do cartão inválido.");
                }
            });
        };

        var getBrandCreditCard = function() {
            PagSeguroDirectPayment.getBrand({
                cardBin: $("input[name=cardNumber]").val(),
                success: function (response) {
                    if(typeof response.brand.bin !== 'undefined'){
                        $( "input[name=creditCardBrand]" ).val( response.brand.bin );
                        $( "input[name=creditCardBrandName]" ).val( response.brand.name );
                    }
                }, error: function(response){
                    setError("Não foi possível identificar a bandeira do cartão. Dados do cartão inválido.");
                }
            });
        };

        var createTokenCreditCard = function(){
            PagSeguroDirectPayment.createCardToken({
                cardNumber: $("input[name=cardNumber]").val(),
                cvv: $("input[name=cardCvv]").val(),
                brand: $("input[name=creditCardBrand]").val(),
                expirationMonth: $("input[name=cardExpirationMonth]").val(),
                expirationYear: $("input[name=cardExpirationYear]").val(),
                success: function(response) {
                    if(typeof response.card.token !== 'undefined' && response.card.token.length > 0 ){
                        $( "input[name=creditCardToken]" ).val( response.card.token );
                        getParcelCreditCard();
                        console.log('token cc', response.card.token)
                    }
                }, error: function(response){
                    setError("Dados do cartão inválido.");
                    console.log('erro ao tentar gerar o token do cartão de crédito', response)
                }
            });
        };

        $("li .creditcard").on('click', function(){ setHash() });

        $("input[name=cardCvv]").keyup(function() {
            if($("input[name=cardCvv]").val().length >= 3 ) {
                if($("input[name=cardNumber]").val()==''){
                    setError( "Preencha o número do cartao." );
                } else if($("input[name=cardExpirationMonth]").val()=='' && $("input[name=cardExpirationYear]").val()==''){
                    setError( "Preencha a data do cartão" );
                }
                if( $("input[name=cardNumber]").val().length > 0 && $("input[name=cardCvv]").val().length > 0 && $("input[name=cardExpirationMonth]").val().length > 0 && $("input[name=cardExpirationYear]").val().length > 0){
                    createTokenCreditCard();
                    getBrandCreditCard();
                } else {
                    setError("Preencha os dados acima.")
                }
            }
        });

        var setHash = function(){
            var senderHash = PagSeguroDirectPayment.getSenderHash();
            if( senderHash.length > 0 ) {
                $( "input[name=senderHash]" ).val( senderHash );
            }
        };

        var setFormsPayments = function( valueTotal ) {
            PagSeguroDirectPayment.getPaymentMethods({ 
                    amount: valueTotal,
                    success: function(response) { 
                        setHash();
                        $.each( response.paymentMethods, function(idx, item){
                            $('#content').append("(" +item.name + ")" + item.name+"<br>")
                            if( item.name == 'BOLETO' ) {
                                $("li .boleto").show();
                            } else if( item.name == 'ONLINE_DEBIT' ) {
                                $("li .debit").show();
                                $.each(item.options, function(idx, itm){
                                    $("#debit .list-bank ul").append("<li data-bank='"+itm.name+"' class='bank-flag "+itm.name+"'><img src='https://stc.pagseguro.uol.com.br"+itm.images.MEDIUM.path+"' /></li>");
                                });
                                $("#debit .list-bank li").on('click', function(){
                                    $("input[name=eftName]").val( $(this).data('bank') )
                                });
                            } else if( item.name == 'CREDIT_CARD' ) {
                                $("li .creditcard").show();
                                $.each(item.options, function(idx, itm){
                                    //Exibindo os cartões de crédito
                                    $("#creditcard .list-card ul").append("<li dataBank='"+itm.name+"' class='bank-flag "+itm.name+"'><img src='https://stc.pagseguro.uol.com.br"+itm.images.MEDIUM.path+"' /></li>");
                                })
                            }
                        } )
                    }
            });
        };
    
        var getDataOrder = function () {
            var dataCard = {};
            dataCard = {paymentMethod:paymentMethod,
                receiverEmail:'brunobinfo@gmail.com',
                itemId1:'0001',
                itemDescription1:'Viagem Para Testar o Checkout',
                itemAmount1:valueTotal,
                itemQuantity1:1,
                reference:'REF1234',
                senderEmail:'c44686989928226966923@sandbox.pagseguro.com.br',
                senderHash:$("input[name=senderHash]").val()
            };

            if( paymentMethod == 'creditcard' ) {
                dataCard.senderName=$("#creditcard input[name=creditCardHolderName]").val();
                dataCard.senderAreaCode=$("#creditcard input[name=creditCardHolderAreaCode]").val()
                dataCard.senderPhone=$("#creditcard input[name=creditCardHolderPhone]").val()
                dataCard.senderCPF=$("#creditcard input[name=creditCardHolderCPF]").val();
                dataCard.shippingAddressStreet=$("input[name=billingAddressStreet]").val();
                dataCard.shippingAddressNumber=$("input[name=billingAddressNumber]").val();
                dataCard.shippingAddressComplement=$("input[name=billingAddressComplement]").val();
                dataCard.shippingAddressDistrict=$("input[name=billingAddressDistrict]").val();
                dataCard.shippingAddressPostalCode=$("input[name=billingAddressPostalCode]").val();
                dataCard.shippingAddressCity=$("input[name=billingAddressCity]").val();
                dataCard.shippingAddressState=$("input[name=billingAddressState]").val();
                dataCard.shippingAddressCountry=$("input[name=billingAddressCountry]").val();
                dataCard.extraAmount = Number((Number($("input[name=extraAmount]").val()).toFixed(2)-valueTotal)).toFixed(2);
                dataCard.creditCardToken=$("input[name=creditCardToken]").val();
                dataCard.installmentQuantity=$("select[name=installmentQuantity]").val();
                dataCard.installmentValue=$('input[name=installmentValue]').val();
                dataCard.creditCardHolderName=$("input[name=creditCardHolderName]").val();
                dataCard.creditCardHolderCPF=$("input[name=creditCardHolderCPF]").val();
                dataCard.creditCardHolderBirthDate=$("input[name=creditCardHolderBirthDate]").val();
                dataCard.creditCardHolderAreaCode=$("input[name=creditCardHolderAreaCode]").val();
                dataCard.creditCardHolderPhone=$("input[name=creditCardHolderPhone]").val();
                dataCard.billingAddressStreet=$("input[name=billingAddressStreet]").val();
                dataCard.billingAddressNumber=$("input[name=billingAddressNumber]").val();
                dataCard.billingAddressComplement=$("input[name=billingAddressComplement]").val();
                dataCard.billingAddressDistrict=$("input[name=billingAddressDistrict]").val();
                dataCard.billingAddressPostalCode=$("input[name=billingAddressPostalCode]").val();
                dataCard.billingAddressCity=$("input[name=billingAddressCity]").val();
                dataCard.billingAddressState=$("input[name=billingAddressState]").val();
                dataCard.billingAddressCountry=$("input[name=billingAddressCountry]").val();

                if( $("select[name=installmentQuantity]").val() > 1 ){
                    dataCard.noInterestInstallmentQuantity=$("select[name=installmentQuantity]").val()
                }
            }

            if( paymentMethod == 'eft' ) {
                dataCard.bankName=$("input[name=eftName]").val();
                dataCard.senderName=$("#debit input[name=creditCardHolderName]").val();
                dataCard.senderAreaCode=$("#debit input[name=creditCardHolderAreaCode]").val()
                dataCard.senderPhone=$("#debit input[name=creditCardHolderPhone]").val()
                dataCard.senderCPF=$("#debit input[name=creditCardHolderCPF]").val();
                dataCard.shippingAddressStreet=$("#debit input[name=shippingAddressStreet]").val();
                dataCard.shippingAddressNumber=$("#debit input[name=shippingAddressNumber]").val();
                dataCard.shippingAddressComplement=$("#debit input[name=shippingAddressComplement]").val();
                dataCard.shippingAddressDistrict=$("#debit input[name=shippingAddressDistrict]").val();
                dataCard.shippingAddressPostalCode=$("#debit input[name=shippingAddressPostalCode]").val();
                dataCard.shippingAddressCity=$("#debit input[name=shippingAddressCity]").val();
                dataCard.shippingAddressState=$("#debit input[name=shippingAddressState]").val();
                dataCard.shippingAddressCountry=$("#debit input[name=shippingAddressCountry]").val();
            }

            if( paymentMethod == 'boleto' ) {
                dataCard.senderCPF=$("#boleto input[name=creditCardHolderCPF]").val();
                dataCard.senderName=$("#boleto input[name=creditCardHolderName]").val();
                dataCard.senderAreaCode=$("#boleto input[name=creditCardHolderAreaCode]").val()
                dataCard.senderPhone=$("#boleto input[name=creditCardHolderPhone]").val()
                dataCard.shippingAddressStreet=$("#boleto input[name=shippingAddressStreet]").val();
                dataCard.shippingAddressNumber=$("#boleto input[name=shippingAddressNumber]").val();
                dataCard.shippingAddressComplement=$("#boleto input[name=shippingAddressComplement]").val();
                dataCard.shippingAddressDistrict=$("#boleto input[name=shippingAddressDistrict]").val();
                dataCard.shippingAddressPostalCode=$("#boleto input[name=shippingAddressPostalCode]").val();
                dataCard.shippingAddressCity=$("#boleto input[name=shippingAddressCity]").val();
                dataCard.shippingAddressState=$("#boleto input[name=shippingAddressState]").val();
                dataCard.shippingAddressCountry=$("#boleto input[name=shippingAddressCountry]").val();
            }

            return dataCard;
        };

        var setRedirect = function( url ){
            setTimeout(function(){
                window.location = url;
            }, 3000);
        };

        var sendPayment = function ( type = 'debit' ) {
                var data = getDataOrder();
                var error = false
                $.each(data, function(idx, itm){
                    if(itm == ''){
                        error = true
                    }
                })

                if( error == true ) {
                    setError( "Preencha todos os campos para finalizar o pagamento." );
                } else {
                    $.ajax({
                        method: "POST",
                        url: "index.php/payment",
                        data: data,
                        beforeSend: function() {
                            setSuccess("Aguarde... Estamos processando seu pagamento.");
                        },
                        success: function(response){
                            msg = JSON.parse(response);
                            if( msg.error ) {
                                var messageError = "";
                                $.each(msg.error, function(idx, itm){
                                    messageError = messageError + ' ' + itm.message
                                });
                                setError( messageError );
                            }
                        },
                    })
                    .done(function( msg ) {
                        data = JSON.parse(msg);
                        if( type == 'debit' ) {
                            setSuccess("Você será redirecionado em alguns minutos para a página do seu banco. Aguarde...");
                            setRedirect( data.paymentLink );
                        } else if( type == 'creditcard' ) {
                            setSuccess("Olá, "+data.sender.name+"! Seu pagamento foi recebido no total de R$ "+data.grossAmount+". Seu código de transação é "+data.code);
                        } else if( type == 'boleto' ) {
                            setSuccess("Seu boleto está sendo gerando. Aguarde...");
                            setRedirect( data.paymentLink );
                        }
                    });
                }
        };

    </script>
</html>