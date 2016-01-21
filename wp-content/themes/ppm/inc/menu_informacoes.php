<div class="panel-info">
    <div class="panel-heading">
        <h4 class="panel-title"><i class=" icon-map-marker"></i><?php _e( 'Informações', 'ppm_lang' ); ?></h4>
    </div>
    <!-- List group -->
    <div class="list-group">
        <a href="<?php echo home_url(); ?>/os-vencedores-por-categoria" class="list-group-item <?php if( is_page( 'os-vencedores-por-categoria' ) || is_page( 'the-winners-by-category' ) ){ echo ''; }; ?>"><?php _e( 'Os Vencedores por categoria', 'ppm_lang' ); ?></a>
        <a href="<?php echo home_url(); ?>/galeria-de-fotos" class="list-group-item <?php if( is_page( 'galeria-de-fotos' ) || is_page( 'photo-gallery' ) ){ echo ''; }; ?>"><?php _e( 'Galeria de fotos', 'ppm_lang' ); ?></a>
        <a href="<?php echo home_url(); ?>/category/reportagens" class="list-group-item <?php if( is_page( 'reportagens' ) || is_page( 'press' ) ){ echo ''; }; ?>">Press</a>
        <a href="<?php echo home_url(); ?>/todos-os-depoimentos" class="list-group-item <?php if( is_page( 'depoimentos' ) || is_page( 'testimonials' ) ){ echo ''; }; ?>"><?php _e( 'Depoimentos', 'ppm_lang' ); ?></a>
        <a href="<?php echo home_url(); ?>/todos-os-talkshows" class="list-group-item <?php if( is_page( 'talkshows' ) ){ echo ''; }; ?>">Workshops</a>
        <a href="<?php echo home_url(); ?>/cerimonia-de-premiacao" class="list-group-item <?php if( is_page( 'cerimonia-de-premiacao' ) || is_page( 'awards-ceremony' ) ){ echo ''; }; ?>"><?php _e( 'Cerimônia de premiação', 'ppm_lang' ); ?></a>
    </div>            

</div>