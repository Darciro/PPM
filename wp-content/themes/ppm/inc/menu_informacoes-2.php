<div class="panel-info posit">
    <div class="panel-heading">
        <h4 class="panel-title"><i class=" icon-map-marker"></i><?php _e( 'Informações', 'ppm_lang' ); ?></h4>                  
    </div>
    <div class="list-group">
        <?php if( is_page('categorias') || is_page('categories') ): ?>
        <a href="<?php echo home_url() ?>/categorias#criacao" class="list-group-item"><?php _e( 'Criação', 'ppm_lang' ); ?></a>
        <a href="<?php echo home_url() ?>/categorias#producao" class="list-group-item"><?php _e( 'Produção', 'ppm_lang' ); ?></a>
        <a href="<?php echo home_url() ?>/categorias#convergencia" class="list-group-item"><?php _e( 'Convergência', 'ppm_lang' ); ?></a>
        <?php endif; ?>
        <a href="<?php echo home_url() ?>/premio-profissionais-da-musica#panel-1" class="list-group-item"><?php _e( 'Data do Evento', 'ppm_lang' ); ?></a>
        <a href="<?php echo home_url() ?>/premio-profissionais-da-musica#panel-2" class="list-group-item"><?php _e( 'Compre seu Ingresso', 'ppm_lang' ); ?></a>
        <a href="<?php echo home_url() ?>/premio-profissionais-da-musica#panel-3" class="list-group-item"><?php _e( 'Como Chegar', 'ppm_lang' ); ?></a>
        <a href="<?php echo home_url() ?>/perguntas-frequentes" class="list-group-item"><?php _e( 'Quem pode votar?', 'ppm_lang' ); ?></a>
        <a href="<?php echo home_url() ?>/perguntas-frequentes" class="list-group-item"><?php _e( 'Etapas de votação', 'ppm_lang' ); ?></a>
        <a href="<?php echo home_url() ?>/perguntas-frequentes" class="list-group-item"><?php _e( 'Quantos serão Pré-Selecionados pelos Profissionais previamente cadastrados em cada categoria?', 'ppm_lang' ); ?></a>
        <a href="<?php echo home_url() ?>/perguntas-frequentes" class="list-group-item"><?php _e( 'Quantos serão Selecionados, em cada categoria, pelo público em geral, artistas e profissionais da música previamente cadastrados?', 'ppm_lang' ); ?></a>
        <a href="<?php echo home_url() ?>/perguntas-frequentes" class="list-group-item"><?php _e( 'Dos Prazos Gerais de Votação', 'ppm_lang' ); ?></a>
    </div>
</div>