$('.ui.dropdown').dropdown();
$('.ui.checkbox').checkbox();
$('#context1 .menu .item')
  .tab({
    context: $('#context1')
  })
;
$('#formspayment .menu .item')
  .tab({
    // special keyword works same as above
    context: 'parent'
  })
;
$('.generate').on('click', function(){
  $(this).removeClass('green')
  $(this).addClass('loading')
})
$('.searchzipcode').on('click', function(){
  pesquisacep( $("input[name=shippingAddressPostalCode]").val() )
})

function limpa_formulário_cep() {
          //Limpa valores do formulário de cep.
          $("input[name=shippingAddressStreet]").val("")
          $("input[name=shippingAddressCity]").val("")
          $("input[name=shippingAddressState]").val("")
          $("input[name=shippingAddressNumber]").val("")
          $("input[name=shippingAddressDistrict]").val("")
          $("textarea[name=shippingAddressComplement]").val("")
          $('.zipcode').removeClass('loading')
  }

  function meu_callback(conteudo) {
      if (!("erro" in conteudo)) {
          //Atualiza os campos com os valores.
          $("input[name=shippingAddressStreet]").val(conteudo.logradouro)
          $("select[name=shippingAddressState]").val(conteudo.uf).change()    
          $("input[name=shippingAddressDistrict]").val(conteudo.bairro);
          $("textarea[name=shippingAddressComplement]").val(conteudo.complemento)
          setTimeout(function() {
            $("select[name=shippingAddressCity]").val(conteudo.localidade).change()  
          }, 500);
      } //end if.
      else {
          //CEP não Encontrado.
          limpa_formulário_cep();
          $('.error.message').show()
          $('.error.message').html("<p>CEP não encontrado.</p>")
      }
  }
      
  function pesquisacep(valor) {

      //Nova variável "cep" somente com dígitos.
      var cep = valor.replace(/\D/g, '');

      //Verifica se campo cep possui valor informado.
      if (cep != "") {

          //Expressão regular para validar o CEP.
          var validacep = /^[0-9]{8}$/;

          //Valida o formato do CEP.
          if(validacep.test(cep)) {

              //Preenche os campos com "..." enquanto consulta webservice.
              $("input[name=shippingAddressStreet]").val("...")
              $("input[name=shippingAddressCity]").val("...")
              $("input[name=shippingAddressState]").val("...")
              $("input[name=shippingAddressDistrict]").val("...")
              $("textarea[name=shippingAddressComplement]").val("...")
              $('.zipcode').addClass('loading')

              //Cria um elemento javascript.
              var script = document.createElement('script');

              //Sincroniza com o callback.
              script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

              //Insere script no documento e carrega o conteúdo.
              document.body.appendChild(script);

              setTimeout(function() {
                $('.zipcode').removeClass('loading')
              }, 500);

          } //end if.
          else {
              //cep é inválido.
              limpa_formulário_cep();
              $('.error.message').show()
              $('.error.message').html("<p>Formato de CEP inválido.</p>")
          }
      } //end if.
      else {
          //cep sem valor, limpa formulário.
          limpa_formulário_cep();
      }
  };

  $('.cep').mask('00000-000');
  $('.ddd').mask('(00)');
  $('.phone').mask('0.0000-0000');
  $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
  $('.cpf').mask('000.000.000-00', {reverse: true});

  $.getJSON('assets/estados_cidades.json', function (data) {
    var items = [];
    var options = '<option value="">Escolha um estado</option>';	
    $.each(data, function (key, val) {
        options += '<option value="' + val.sigla + '">' + val.nome + '</option>';
    });
    
    $("#estados").html(options);				
    
    $("#estados").change(function () {				
    
        var options_cidades = '';
        var str = "";					
        
        $("#estados option:selected").each(function () {
            str += $(this).text();
        });
        
        $.each(data, function (key, val) {
            if(val.nome == str) {							
                $.each(val.cidades, function (key_city, val_city) {
                    options_cidades += '<option value="' + val_city + '">' + val_city + '</option>';
                });							
            }
        });
        
        $("#cidades").html(options_cidades);
        
    }).change();		

});