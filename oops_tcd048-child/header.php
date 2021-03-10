<?php
$options = get_desing_plus_option();
$header_fix = $options['header_fix']; // ヘッダーバーの表示位置
$mobile_header_fix = $options['mobile_header_fix']; // ヘッダーバーの表示位置（スマホ）
$header_class = '';
if ( wp_is_mobile() ) {
	if ( 'type2' == $mobile_header_fix ) { 
		$header_class .= ' is-fixed is-active'; 
	}
} else {
	if ( is_front_page() ) {
		$header_class .= ' l-header--large'; 
	}
	if ( 'type2' == $header_fix ) { 
		$header_class .= ' is-fixed'; 
	}
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head<?php if ( $options['use_ogp'] ) { echo ' prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#"'; } ?>>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="description" content="<?php seo_description(); ?>">
<meta name="viewport" content="width=<?php echo is_no_responsive() ? '1280' : 'device-width'; ?>">
<?php if ( $options['use_ogp'] ) { ogp(); } ?>
<?php wp_head(); ?>
</head>
<body>
<?php if ($options['use_load_icon']) : ?>
<div id="site_loader_overlay">
	<div id="site_loader_animation" class="c-load--<?php echo esc_attr( $options['load_icon'] ); ?>">
		<?php if ( 'type3' === $options['load_icon'] ) : ?>
  	<i></i><i></i><i></i><i></i>
		<?php endif; ?>
 	</div>
</div>
<div id="site_wrap">
<?php endif; ?>
<header id="js-header" class="l-header<?php echo esc_attr( $header_class ); ?>">
	<div class="l-header__inner">
		<?php
		if(is_front_page()){ $thisTag = 'h1'; }else{ $thisTag = 'div'; }
		if ( wp_is_mobile() ) : 
			if ( $options['header_logo_image_mobile'] ) :
		?>
		<<?php echo $thisTag; ?> class="p-logo l-header__logo<?php if ( $options['header_logo_image_mobile_retina'] ) { echo ' l-header__logo--retina'; } ?>">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo wp_get_attachment_url( $options['header_logo_image_mobile'] ); ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
		</<?php echo $thisTag; ?>>
		<?php
			else :
		?>
		<<?php echo $thisTag; ?> class="l-header__logo p-logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="font-size: <?php echo esc_attr( $options['logo_font_size_mobile'] ); ?>px;"><?php bloginfo( 'name' ); ?></a>
		</<?php echo $thisTag; ?>>
		<?php
			endif;
		else : 
			if ( $options['header_logo_image'] ) :
		?>
		<<?php echo $thisTag; ?> class="p-logo l-header__logo<?php if ( $options['header_logo_image_retina'] ) { echo ' l-header__logo--retina'; } ?>">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo wp_get_attachment_url( $options['header_logo_image'] ); ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
		</<?php echo $thisTag; ?>>
		<?php 
			else :
		?>
		<<?php echo $thisTag; ?> class="p-logo l-header__logo l-header__logo--text">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="font-size: <?php echo esc_attr( $options['logo_font_size'] ); ?>px;"><?php bloginfo( 'name' ); ?></a>
		</<?php echo $thisTag; ?>>
		<?php
			endif;
		endif; 
		?>
<?php
if ( is_front_page() ) :
	if ( has_nav_menu( 'global_front' ) ) : 
?>
		<a href="#" id="js-menu-button" class="p-menu-button c-menu-button"></a>
<?php
		wp_nav_menu( array(
			'container' => 'nav',
			'menu_class' => 'p-global-nav u-clearfix',
			'menu_id' => 'js-global-nav',
			'theme_location' => 'global_front',
			'link_after' => '<span></span>'
		) );
	endif;
else :
	if ( has_nav_menu( 'global_sub' ) ) : 
?>
		<a href="#" id="js-menu-button" class="p-menu-button c-menu-button"></a>
<?php
		wp_nav_menu( array(
			'container' => 'nav',
			'menu_class' => 'p-global-nav u-clearfix',
			'menu_id' => 'js-global-nav',
			'theme_location' => 'global_sub',
			'link_after' => '<span></span>'
		) );
	endif;
endif;
?>
<?php if(is_singular('news')) {
	$current =”current”;
}
?>
	</div>
</header>
