(function($){

	$(window).load( function(){

		console.log('Fired!');
		$('[data-key="ppm_tipopessoa"]').find('label:first-child span').addClass('checked');
		$('[data-key="ppm_tipopessoa"]').find('label:first-child input').attr('checked', 'checked');
		$('[data-key="ppm_cnpj"]').find('input').attr('data-required', '0');
		$('div[data-key="ppm_cnpj"]').addClass('hidden');
		// $('.userpro-field.userpro-field-ppm_cnpj').hide();

		$('[data-key="ppm_tipopessoa"] input[type="radio"]').change(function () {
			console.log( this.value );
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

	} );

})(jQuery);