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
  pesquisacep( $("input[name=cep]").val() )
})

function limpa_formulário_cep() {
          //Limpa valores do formulário de cep.
          $("input[name=logradouro]").val("")
          $("input[name=cidade]").val("")
          $("input[name=uf]").val("")
          $("input[name=numero]").val("")
          $("input[name=bairro]").val("")
          $("textarea[name=complemento]").val("")
          $('.zipcode').removeClass('loading')
  }

  function meu_callback(conteudo) {
      if (!("erro" in conteudo)) {
          //Atualiza os campos com os valores.
          $("input[name=logradouro]").val(conteudo.logradouro)
          $("select[name=cidade]").val(conteudo.localidade).change()
          $("select[name=uf]").val(conteudo.uf).change()
          $("input[name=bairro]").val(conteudo.bairro);
          $("textarea[name=complemento]").val(conteudo.complemento)
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
              $("input[name=logradouro]").val("...")
              $("input[name=cidade]").val("...")
              $("input[name=uf]").val("...")
              $("input[name=bairro]").val("...")
              $("textarea[name=complemento]").val("...")
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
  $('.ddd').mask('(000)');
  $('.phone').mask('0.0000-0000');
  $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
  $('.cpf').mask('000.000.000-00', {reverse: true});