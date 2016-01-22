(function($){

	$(window).load( function(){
		// console.log( ppmSettings );

		$(document).ready(function() {
			$('[id^=detail-]').hide();
			$('.toggle').click(function() {
				$input = $( this );
				$target = $('#'+$input.attr('data-toggle'));
				$target.slideToggle();

				if($input.find('.col-xs-2 i').attr('class')=="fa fa-chevron-down pull-right")
				{
					$input.find('.col-xs-2 i').removeClass('fa-chevron-down');
					$input.find('.col-xs-2 i').addClass('fa-chevron-up');
				}
				else
				{
					$input.find('.col-xs-2 i').removeClass('fa-chevron-up');
					$input.find('.col-xs-2 i').addClass('fa-chevron-down');
				}

			});
		});

		$('[data-key="ppm_tipopessoa"]').find('label:first-child span').addClass('checked');
		$('[data-key="ppm_tipopessoa"]').find('label:first-child input').attr('checked', 'checked');
		$('[data-key="ppm_cnpj"]').find('input').attr('data-required', '0');
		$('div[data-key="ppm_cnpj"]').addClass('hidden');
		// $('.userpro-field.userpro-field-ppm_cnpj').hide();

		if( $('.english-body').length ){
			$('div[data-key="ppm_tipopessoa"]').addClass('hidden');
			$('[data-key="user_login"]').find('span.userpro-tip').attr('original-title', 'Name used to log into the system. It can not contain spaces or special characters.');
		}

		$('[data-key="ppm_tipopessoa"] input[type="radio"]').change(function () {
			if( this.value == 'Pessoa Jurídica' ){
				$('[data-key="ppm_cpf"]').find('input').attr('data-required', '0');
				$('[data-key="ppm_cnpj"]').find('input').attr('data-required', '1');
				$('div[data-key="ppm_cpf"]').addClass('hidden');
				$('div[data-key="ppm_cnpj"]').removeClass('hidden');
			}else{
				$('[data-key="ppm_cpf"]').find('input').attr('data-required', '1');
				$('[data-key="ppm_cnpj"]').find('input').attr('data-required', '0');
				$('div[data-key="ppm_cpf"]').removeClass('hidden');
				$('div[data-key="ppm_cnpj"]').addClass('hidden');
			}
		})

		if( !$('.english-body').length ){
			$('[data-key="ppm_cpf"]').find('input').on('keydown', function(){
				$(this).mask('999.999.999-99');
			})
		}

		$('[data-key="ppm_cnpj"]').find('input').on('keydown', function(){
			$(this).mask('99.999.999/99999-99');
		})

		$('#print-btn').on('click', function(){
			window.print();
		})

		$('.fancybox').fancybox({
	          helpers: {
	              title : {
	                  type : 'float'
	              }
	          }
	      });

		if( $('.english-body').length && $('.userpro').length ){
			$('.userpro').fadeTo('fast', 1);
		}

	} );

	// Not wait for load
	if( $('.english-body').length &&  $('.userpro').length ){

		$('.userpro').children().each(function () {
		    $(this).html( $(this).html().replace('Detalhes da Conta','Acount details') );
		    $(this).html( $(this).html().replace('Nome de usuário','Username') );
		    $(this).html( $(this).html().replace('Nome Completo','Full name') );
		    $(this).html( $(this).html().replace('Senha','Password') );
		    $(this).html( $(this).html().replace('Confirme sua senha','Confirm password') );
		    $(this).html( $(this).html().replace('Detalhes do Perfil','Profile details') );
		    $(this).html( $(this).html().replace('Tipo de pessoa','Person type') );
		    $(this).html( $(this).html().replace('Atividade','Activity') );
		    $(this).html( $(this).html().replace('CPF','ID') );
		    $(this).html( $(this).html().replace('País','Country') );
		    $(this).html( $(this).html().replace('Estado','State') );
		    $(this).html( $(this).html().replace('Cidade','City') );
		    $(this).html( $(this).html().replace('Telefone','Phone') );
		    $(this).html( $(this).html().replace('Empresa onde trabalha','Working company') );
		    $(this).html( $(this).html().replace('Perfis Sociais','Social profiles') );
		    $(this).html( $(this).html().replace('Selecione seu país','Select your Country') );
		});

		// $(this).html( $(this).html().replace('Pessoa Jurídica','Legal person') );
		// $(this).html( $(this).html().replace('Pessoa Física','Individual') );
	}

	// $('.page-votation')
	/*$('.melhor-autor').each( function(){
		var $clone = $( this ).clone();
		$( this ).remove();
		$clone.appendTo('#melhor-autor')
	} );*/

	function cloneChoices(choice){
		if( choice !== 'melhor-plataforma-digital' ){
			$('.' + choice).each( function(){
				var $clone = $( this ).clone();
				$( this ).remove();
				$clone.appendTo('#' + choice);
				$clone.addClass('cat-choice');
				// console.log( $('.' + choice).find('input[type=radio]').val()  );
			} )
		}else{
			$('.melhor-plataforma-digital').each( function(){
				var $clone = $( this ).clone();
				$( this ).remove();
				$clone.appendTo('#melhor-plataforma-de-neg--cio');
			} )
		}
	}

	function clearChoices(choice){
		$('.cat-choice').each(function (i, el) {
			// console.log( i, $(this).find('input[type=radio]').val() );
			if( !$(this).find('p').length ){
				$(this).addClass('hidden');
			}
		})
	}

	$.each(ppmSettings.creationChoices, function(index, value) {
		// console.log(index, value);
		cloneChoices(value);
	});
	cloneChoices('melhor-plataforma-digital');
	clearChoices();


	$('#confirmation-btn').on( 'click', function(){
		var form = $('#votation-form');
		var choices = form.find('input[type=radio]:checked');
		var choicesChecked = $(choices).map(function() {
			$('#confirmation-modal .modal-body').append('<div><strong>' + $(this).data('cat-name') + '</strong><br/>' + this.value + '</div><br/>')

			// console.log( this.value );
			// console.log( $(this).attr('name') );
		}).get();
	});

})(jQuery);