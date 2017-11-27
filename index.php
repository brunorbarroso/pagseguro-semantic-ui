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
    <div class="ui ignored success message" style="display: none">
      <p></p>
    </div>
    <div class="ui form">
      <h4 class="ui dividing header">Dados do comprador</h4>
      <div class="field">
        <div class="fields">  
          <div class="twelve wide field">
            <label>Nome completo</label>
              <input type="text" name="fullname" placeholder="nome completo">
          </div>
          <div class="five wide field">
            <label>Data de Nascimento</label>
            <input type="text" name="creditCardHolderBirthDate" class="placeholder" id="placeholder" placeholder="xx/xx/xxxx">
          </div>
        </div>
      </div>
      <div class="field">
        <div class="fields">         
          <div class="twelve wide field">
            <label>CPF</label>
            <input type="text" name="creditCardHolderCPF" class="cpf" placeholder="xxx.xxx.xxx-xx">
          </div>
          <div class="ten wide field">
            <div class="fields">
                <div class="five wide field">
                  <label>DDD</label>
                  <input type="text" name="creditCardHolderAreaCode" class="ddd" placeholder="xxx">
                </div>
                <div class="twelve wide field">
                  <label>Telefone</label>
                  <input type="text" name="creditCardHolderPhone" class="phone" placeholder="x.xxxx-xxxx">
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
              <input type="text" name="shippingAddressPostalCode" class="cep" id="cep" placeholder="xxxxx-xxx">
              <i class="inverted circular search link icon searchzipcode"></i>
            </div>
          </div>
          <div class="twelve wide field">
            <label>Endereço</label>
            <input type="text" name="shippingAddressStreet" placeholder="rua, avenida, etc.">
          </div>
          <div class="four wide field">
            <label>Número</label>
            <input type="text" name="shippingAddressNumber" placeholder="número">
          </div>
        </div>
      </div>
      <div class="two fields">
        <div class="field">
          <label>Estado</label>
          <select name="shippingAddressState" id="estados" class="ui fluid dropdown">
            <option value="">Escolha...</option>
          </select>
        </div>
        <div class="field">
          <label>Cidade</label>
          <select name="shippingAddressCity" id="cidades" class="ui fluid dropdown">
            <option value="">Escolha...</option>
          </select>
        </div>
        <div class="field">
          <label>Bairro</label>
          <input type="text" name="shippingAddressDistrict" placeholder="bairro">
        </div>
        <input type="hidden" name="shippingAddressCountry" value="BR">
      </div>
      <div class="field">
          <label>Complemento</label>
          <textarea rows="2" name="shippingAddressComplement" placeholder="Complemento"></textarea>
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
                <input type="text" name="creditCardHolderName" placeholder="Nome Impresso">
              </div>
              <div class="ten wide field">
                <label>Número</label>
                <input type="text" name="cardNumber" maxlength="16" placeholder="Número">
              </div>
          </div>
          <div class="fields">
            <div class="three wide field">
              <label>CVC</label>
              <input type="text" name="cardCvv" maxlength="3" placeholder="CVC">
            </div>
            <div class="seven wide field">
              <label>Data de Expiração</label>
              <div class="two fields">
                <div class="field">
                  <select class="ui fluid search dropdown" name="cardExpirationMonth">
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
                    <select class="ui fluid search dropdown" name="cardExpirationYear">
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
                <select class="ui fluid search dropdown" name="installmentQuantity">
                    <option value="">Sem dados do cartão</option>
                </select>
                <input type="hidden" name="installmentValue">
                <input type="hidden" name="extraAmount">
                <input type="hidden" name="creditCardToken" id="creditCardToken"  />
                <input type="hidden" name="creditCardBrand" id="creditCardBrand"  />
                <input type="hidden" name="creditCardBrandName" id="creditCardBrandName"  />
            </div>
          </div>
          <button class="generate ui button green" id="creditCardPaymentButton">Salvar e Realizar Pagamento</button>
        </div>
        <div class="ui tab segment" data-tab="debit">
          <div class="field">
              <label>Lista de bancos</label> 
                <div class="ui selection dropdown">
                    <input type="hidden" name="bankDebit">
                    <div class="default text">Escolha...</div>
                    <i class="dropdown icon"></i>
                    <div class="menu list-bank"></div>
              </div>

          </div>
          <input type="hidden" name="eftName" />
          <button class="generate ui button green" id="debitPaymentButton">Salvar e Acessar o Banco</button>
        </div>
        <div class="ui tab segment" data-tab="boleto">
            <input type="hidden" name="senderHash" id="senderHash"  />
            <button class="generate ui button green" id="boletoButton">Salvar e Gerar Boleto</button>
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
            $("div").find("[data-tab='creditcard']").hide()
            $("div").find("[data-tab='debit']").hide()
            $("div").find("[data-tab='boleto']").hide()
            setFormsPayments( valueTotal );
        });

        var setError = function( msg ){
            $('.error.message').html( msg );
            $('.error.message').show();
            setTimeout(function(){
                $('.error.message').hide();
            }, 6000);
        };

        var setSuccess = function( msg ){
            $('.success.message').html( msg );
            $('.success.message').show();
            setTimeout(function(){
                $('.success.message').hide();
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
        $('#debitPaymentButton').on('click', function () { sendPayment('eft') });
        $('#boletoButton').on('click', function () { sendPayment('boleto') });

        $("select[name=installmentQuantity]").on('change', function () {
            $("input[name=installmentValue]").val( $("select[name=installmentQuantity] option:selected").data('valueparcel') );
            $("input[name=extraAmount]").val( $("select[name=installmentQuantity] option:selected").data('extraamount') );
        });

        var getParcelCreditCard = function(){
            PagSeguroDirectPayment.getInstallments({
                amount: valueTotal,
                brand: $( "input[name=creditCardBrandName]" ).val(),
                maxInstallmentNoInterest: 2,
                    success: function(response) {
                        $("<option>Escolha...</option>").appendTo("select[name=installmentQuantity]");
                        var parcels = response.installments[$("input[name=creditCardBrandName]").val()];
                        $.each(parcels, function (idx, itm) {
                            $("<option value="+itm.quantity+" data-valueParcel='"+itm.installmentAmount+"' data-extraAmount='"+itm.totalAmount+"'>"+itm.quantity+'x R$ '+ itm.installmentAmount+' - Total R$ '+itm.totalAmount+"</option>").appendTo("select[name=installmentQuantity]");
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
                expirationMonth: $("select[name=cardExpirationMonth]").val(),
                expirationYear: $("select[name=cardExpirationYear] option:selected").text(),
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
                } else if($("select[name=cardExpirationMonth]").val()=='' && $("select[name=cardExpirationYear] option:selected").text()==''){
                    setError( "Preencha a data do cartão" );
                }
                if( $("input[name=cardNumber]").val().length > 0 && $("input[name=cardCvv]").val().length > 0 && $("select[name=cardExpirationMonth]").val().length > 0 && $("select[name=cardExpirationYear] option:selected").text().length > 0){
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
                            if( item.name == 'BOLETO' ) {
                                $("div").find("[data-tab='boleto']").removeAttr("style");
                            } else if( item.name == 'ONLINE_DEBIT' ) {
                                $("div").find("[data-tab='debit']").removeAttr("style");
                                $.each(item.options, function(idx, itm){
                                    $("<div class='item' data-value='"+itm.name+"'><img src='https://stc.pagseguro.uol.com.br"+itm.images.MEDIUM.path+"'>"+itm.displayName+"</div>").appendTo(".list-bank");
                                });
                                $("input[name=bankDebit]").on('change', function(){
                                    $("input[name=eftName]").val( $(this).val() )
                                })
                            } else if( item.name == 'CREDIT_CARD' ) {
                                $("div").find("[data-tab='creditcard']").removeAttr("style");
                            }
                        })
                    }
            });
        };
    
        var getDataOrder = function (type) {
            var dataCard = {};

            dataCard = {
                paymentMethod: type,
                receiverEmail:'brunobinfo@gmail.com',
                itemId1:'0001',
                itemDescription1:'Viagem Para Testar o Checkout',
                itemAmount1:valueTotal,
                itemQuantity1:1,
                reference:'REF1237',
                senderEmail:'c44686989928226966923@sandbox.pagseguro.com.br',
                senderHash:$("input[name=senderHash]").val()
            };

            dataCard.senderName=$("input[name=fullname]").val()
            dataCard.senderAreaCode=$("input[name=creditCardHolderAreaCode]").val().replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-')
            dataCard.senderPhone=$("input[name=creditCardHolderPhone]").val().replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-')
            dataCard.senderCPF=$("input[name=creditCardHolderCPF]").val().replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-')

            dataCard.shippingAddressStreet=$("input[name=shippingAddressStreet]").val()
            dataCard.shippingAddressNumber=$("input[name=shippingAddressNumber]").val()
            dataCard.shippingAddressComplement=$("textarea[name=shippingAddressComplement]").val()
            dataCard.shippingAddressDistrict=$("input[name=shippingAddressDistrict]").val()
            dataCard.shippingAddressPostalCode=$("input[name=shippingAddressPostalCode]").val().replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-')
            dataCard.shippingAddressCity=$("select[name=shippingAddressCity]").val()
            dataCard.shippingAddressState=$("select[name=shippingAddressState]").val()
            dataCard.shippingAddressCountry=$("input[name=shippingAddressCountry]").val()
            
            dataCard.billingAddressStreet=$("input[name=shippingAddressStreet]").val()
            dataCard.billingAddressNumber=$("input[name=shippingAddressNumber]").val().replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-')
            dataCard.billingAddressComplement=$("textarea[name=shippingAddressComplement]").val();
            dataCard.billingAddressDistrict=$("input[name=shippingAddressDistrict]").val();
            dataCard.billingAddressPostalCode=$("input[name=shippingAddressPostalCode]").val().replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-')
            dataCard.billingAddressCity=$("select[name=shippingAddressCity]").val();
            dataCard.billingAddressState=$("select[name=shippingAddressState]").val();
            dataCard.billingAddressCountry=$("input[name=shippingAddressCountry]").val();

            if( type == "creditcard" ) {

                dataCard.extraAmount = Number((Number($("input[name=extraAmount]").val()).toFixed(2)-valueTotal)).toFixed(2);
                dataCard.creditCardToken=$("input[name=creditCardToken]").val();
                dataCard.installmentQuantity=$("select[name=installmentQuantity]").val();
                dataCard.installmentValue=$('input[name=installmentValue]').val();
                dataCard.creditCardHolderName=$("input[name=creditCardHolderName]").val();
                dataCard.creditCardHolderCPF=$("input[name=creditCardHolderCPF]").val().replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-')
                dataCard.creditCardHolderBirthDate=$("input[name=creditCardHolderBirthDate]").val();
                dataCard.creditCardHolderAreaCode=$("input[name=creditCardHolderAreaCode]").val().replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-')
                dataCard.creditCardHolderPhone=$("input[name=creditCardHolderPhone]").val().replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-')

                if( $("select[name=installmentQuantity]").val() > 1 ){
                    dataCard.noInterestInstallmentQuantity=$("select[name=installmentQuantity]").val()
                }
            }

            if( type == "eft" ) {
                dataCard.bankName=$("input[name=eftName]").val();
            }

            return dataCard;
        };

        var setRedirect = function( url ){
            setTimeout(function(){
                window.location = url;
            }, 3000);
        };

        var sendPayment = function ( type = 'debit' ) {
                var data = getDataOrder(type);
                console.log('data', data)
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