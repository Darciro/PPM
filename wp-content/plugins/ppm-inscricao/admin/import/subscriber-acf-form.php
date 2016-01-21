<?php
class Subscriber_ACF_Form {

	public function __construct() {
		$this->register_form();
	}

	public function register_form() {
		if( function_exists('acf_add_local_field_group') ):

		acf_add_local_field_group(array (
			'key' => 'group_5626bb910ae55',
			'title' => 'Formulário de inscrição',
			'fields' => array (
				array (
					'key' => 'field_5626c012c0802',
					'label' => __( 'Inscrição', 'ppm-inscricao' ),
					'name' => 'inscricao',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'min' => 1,
					'max' => '',
					'layout' => 'block',
					'button_label' => __( 'Nova inscrição', 'ppm-inscricao' ),
					'sub_fields' => array (
						array (
							'key' => 'field_5626bb9814569',
							'label' => __( 'Modalidades', 'ppm-inscricao' ),
							'name' => 'modalidades',
							'type' => 'select',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'choices' => array (
								'Criação' => __( 'Criação', 'ppm-inscricao' ),
								'Produção' => __( 'Produção', 'ppm-inscricao' ),
								'Convergência' => __( 'Convergência', 'ppm-inscricao' ),
							),
							'default_value' => array (
							),
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 0,
							'ajax' => 0,
							'placeholder' => '',
							'disabled' => 0,
							'readonly' => 0,
						),
						array (
							'key' => 'field_5626c03dc0803',
							'label' => __( 'Categorias de criação', 'ppm-inscricao' ),
							'name' => 'categorias_de_criacao',
							'type' => 'select',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => array (
								array (
									array (
										'field' => 'field_5626bb9814569',
										'operator' => '==',
										'value' => 'Criação',
									),
								),
							),
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'choices' => array (
								'Melhor Autor' => __( 'Melhor Autor', 'ppm-inscricao' ),
								'Melhor Instrumentista' => __( 'Melhor Instrumentista', 'ppm-inscricao' ),
								'Melhor Cantor' => __( 'Melhor Cantor', 'ppm-inscricao' ),
								'Melhor Cantora' => __( 'Melhor Cantora', 'ppm-inscricao' ),
								'Melhor	Arranjador' => __( 'Melhor Arranjador', 'ppm-inscricao' ),
								'Melhor	Artista Hip Hop & Rap' => __( 'Melhor Artista Hip Hop & Rap', 'ppm-inscricao' ),
								'Melhor	Artista	Gospel' => __( 'Melhor Artista Gospel', 'ppm-inscricao' ),
								'Melhor	Artista	Instrumental' => __( 'Melhor Artista Instrumental', 'ppm-inscricao' ),
								'Melhor	Artista	Rock & Blues' => __( 'Melhor Artista Rock & Blues', 'ppm-inscricao' ),
								'Melhor	Artista	Metal & Hardcore' => __( 'Melhor Artista Metal & Hardcore', 'ppm-inscricao' ),
								'Melhor	Artista	Groove & Pop' => __( 'Melhor Artista Groove & Pop', 'ppm-inscricao' ), 
								'Melhor	Artista	Raiz Sertaneja' => __( 'Melhor Artista Raiz Sertaneja', 'ppm-inscricao' ), 
								'Melhor	Artista	MPB' => __( 'Melhor Artista MPB', 'ppm-inscricao' ), 
								'Melhor	Artista	Folclore e Cultura Popular' => __( 'Melhor Artista Folclore e Cultura Popular', 'ppm-inscricao' ),
								'Melhor	Artista	Samba e Choro' => __( 'Melhor Artista Samba e Choro', 'ppm-inscricao' ),
							),
							'default_value' => array (
							),
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 0,
							'ajax' => 0,
							'placeholder' => '',
							'disabled' => 0,
							'readonly' => 0,
						),
						array (
							'key' => 'field_5626d2f421b80',
							'label' => __( 'Categorias de produção', 'ppm-inscricao' ),
							'name' => 'categorias_de_producao',
							'type' => 'select',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => array (
								array (
									array (
										'field' => 'field_5626bb9814569',
										'operator' => '==',
										'value' => 'Produção',
									),
								),
							),
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'choices' => array (
								'Melhor Editora' => __( 'Melhor Editora', 'ppm-inscricao' ),
								'Melhor Produtor Artístico' => __( 'Melhor Produtor Artístico', 'ppm-inscricao' ),
								'Melhor Produtor Executivo' => __( 'Melhor Produtor Executivo', 'ppm-inscricao' ),
								'Melhor Selo ou Gravadora' => __( 'Melhor Selo ou Gravadora', 'ppm-inscricao' ),
								'Melhor Técnico de Gravação' => __( 'Melhor Técnico de Gravação', 'ppm-inscricao' ),
								'Melhor Técnico de Mixagem' => __( 'Melhor Técnico de Mixagem', 'ppm-inscricao' ),
								'Melhor Técnico de Masterização' => __( 'Melhor Técnico de Masterização', 'ppm-inscricao' ),
								'Melhor	Designer' => __( 'Melhor Designer', 'ppm-inscricao' ),
								'Melhor	Fotógrafo' => __( 'Melhor Fotógrafo', 'ppm-inscricao' ),
								'Melhor Agência de Comunicação Digital' => __( 'Melhor Agência de Comunicação Digital', 'ppm-inscricao' ),
								'Melhor	Diretor de Vídeo Clips' => __( 'Melhor Diretor de Vídeo Clips', 'ppm-inscricao' ),
								'Melhor Produtor de Evento' => __( 'Melhor Produtor de Evento', 'ppm-inscricao' ),
								'Melhor	Escritório de Agenciamento de Artistas' => __( 'Melhor Escritório de Agenciamento de Artistas', 'ppm-inscricao' ),
								'Melhor	Estúdio de Gravação e Mixagem' => __( 'Melhor Estúdio de Gravação e Mixagem', 'ppm-inscricao' ),
								'Melhor	Estúdio de Masterização' => __( 'Melhor Estúdio de Masterização', 'ppm-inscricao' ),
							),
							'default_value' => array (
							),
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 0,
							'ajax' => 0,
							'placeholder' => '',
							'disabled' => 0,
							'readonly' => 0,
						),
						array (
							'key' => 'field_5626d33421b81',
							'label' => __( 'Categorias de convergência', 'ppm-inscricao' ),
							'name' => 'categorias_de_convergencia',
							'type' => 'select',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => array (
								array (
									array (
										'field' => 'field_5626bb9814569',
										'operator' => '==',
										'value' => 'Convergência',
									),
								),
							),
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'choices' => array (
								'Melhor Distribuidora Digital' => __( 'Melhor Distribuidora Digital', 'ppm-inscricao' ),
								'Melhor	Plataforma de Crowdfunding e LiveFunding' => __( 'Melhor Plataforma de Crowdfunding e LiveFunding', 'ppm-inscricao' ),
								'Melhor Festival de Música' => __( 'Melhor Festival de Música', 'ppm-inscricao' ),
								'Melhor Start Up' => __( 'Melhor Start Up', 'ppm-inscricao' ),
								'Melhor	DJ' => __( 'Melhor DJ', 'ppm-inscricao' ),
								'Melhor	Casa Noturna' => __( 'Melhor Casa Noturna', 'ppm-inscricao' ),
								'Melhor	Projeto Cultural Musical' => __( 'Melhor Projeto Cultural Musical', 'ppm-inscricao' ),
								'Melhor	Canal de Divulgação de Música [ Facebook, Twitter, Instagran, Blog]' => __( 'Melhor Canal de Divulgação de Música [ Facebook, Twitter, Instagran, Blog]', 'ppm-inscricao' ),
								'Melhor	WebTV' => __( 'Melhor WebTV', 'ppm-inscricao' ),
								'Melhor Web Rádio' => __( 'Melhor Web Rádio', 'ppm-inscricao' ),
								'Melhor Rádio Pública' => __( 'Melhor Rádio Pública', 'ppm-inscricao' ),
								'Melhor Rádio Privada' => __( 'Melhor Rádio Privada', 'ppm-inscricao' ),
								'Melhor Programa	de Rádio' => __( 'Melhor Programa de Rádio', 'ppm-inscricao' ),
								'Melhor Canal de Youtube' => __( 'Melhor Canal de Youtube', 'ppm-inscricao' ),
								'Melhor	Plataforma Digital' => __( 'Melhor Plataforma de Negócio', 'ppm-inscricao' ),
								'Melhor	Lojas Digital e E-Commerce de Música' => __( 'Melhor Lojas Digital e E-Commerce de Música', 'ppm-inscricao' ),
							),
							'default_value' => array (
							),
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 0,
							'ajax' => 0,
							'placeholder' => '',
							'disabled' => 0,
							'readonly' => 0,
						),
						array (
							'key' => 'field_56479199e6920',
							'label' => __( 'Inscrição em nome de terceiros [ Artista | Autor | Profissional da Música | Empresa | Projeto e/ou Empreendimento Musical]', 'ppm-inscricao' ),
							'name' => 'inscricao_terceiros',
							'type' => 'true_false',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'message' => __( 'Selecione essa opção se deseja inscrever outra pessoa', 'ppm-inscricao' ),
							'default_value' => 0,
						),
						array (
							'key' => 'field_5647943da2c58',
							'label' => __( 'Nome do inscrito', 'ppm-inscricao' ),
							'name' => 'nome_terceiro',
							'type' => 'text',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => array (
								array (
									array (
										'field' => 'field_56479199e6920',
										'operator' => '==',
										'value' => '1',
									),
								),
							),
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
							'readonly' => 0,
							'disabled' => 0,
						),
						array (
							'key' => 'field_5626c074c0804',
							'label' => __( 'Links para avaliação', 'ppm-inscricao' ),
							'name' => 'links_para_avaliacao',
							'type' => 'repeater',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'min' => 1,
							'max' => 3,
							'layout' => 'block',
							'button_label' => __( 'Novo link', 'ppm-inscricao' ),
							'sub_fields' => array (
								array (
									'key' => 'field_5626c0e71f4bc',
									'label' => 'Link',
									'name' => 'link',
									'type' => 'url',
									'instructions' => __( 'Não serão aceitos links provenientes do Facebook', 'ppm-inscricao' ),
									'required' => 1,
									'conditional_logic' => 0,
									'wrapper' => array (
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'default_value' => '',
									'placeholder' => 'http://',
								),
							),
						),
					),
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'inscricao',
					),
				),
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'inscricao',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => 1,
			'description' => '',
		));
		
		endif;
	}

}