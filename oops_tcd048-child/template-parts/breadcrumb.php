<?php
global $author, $post;
?>
		<ul class="p-breadcrumb c-breadcrumb u-clearfix" itemscope itemtype="http://schema.org/BreadcrumbList">
			<li class="p-breadcrumb__item c-breadcrumb__item c-breadcrumb__item--home" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="item"><span itemprop="name">HOME</span></a>
				<meta itemprop="position" content="1" />
			</li>
			<?php if ( is_author() ) : ?>
			<li class="p-breadcrumb__item c-breadcrumb__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name"><?php echo esc_html( get_the_author_meta( 'display_name', get_query_var( 'author' ) ) ); ?></span><meta itemprop="position" content="2" /></li>
			<?php elseif ( is_category() ) : ?>
			<li class="p-breadcrumb__item c-breadcrumb__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				<a href="<?php echo esc_url( get_post_type_archive_link( 'post' ) ); ?>" itemprop="item">
					<span itemprop="name"><?php _e( 'コラム', 'tcd-w' ); ?></span>
				</a>
				<meta itemprop="position" content="2" />
			</li>
			 <?php $cat = get_queried_object(); ?>
			 <?php $i=3; if($cat -> parent != 0): ?>
			 <?php $ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' )); ?>
			 <?php foreach($ancestors as $ancestor): ?>
			 <li class="p-breadcrumb__item c-breadcrumb__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="<?php echo get_category_link($ancestor); ?>"><span itemprop="name"><?php echo get_cat_name($ancestor); ?></span></a><meta itemprop="position" content="<?php echo $i; ?>" /></li>
			 <?php $i++; endforeach; ?>
			 <?php endif; ?>
			 <li class="p-breadcrumb__item c-breadcrumb__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name"><?php echo $cat -> cat_name; ?></span><meta itemprop="position" content="<?php echo $i; ?>" /></li>
			<?php elseif ( is_search() ) : ?>
			<li class="p-breadcrumb__item c-breadcrumb__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name"><?php _e( 'Search result', 'tcd-w' ); ?></span><meta itemprop="position" content="2" /></li>
			<?php elseif ( is_year() ) : ?>
			<li class="p-breadcrumb__item c-breadcrumb__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name"><?php echo esc_html( get_the_time( __( 'Y', 'tcd-w' ), $post ) ); ?></span><meta itemprop="position" content="2" /></li>
			<?php elseif ( is_month() ) : ?>
			<li class="p-breadcrumb__item c-breadcrumb__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name"><?php echo esc_html( get_the_time( __( 'F, Y', 'tcd-w' ), $post ) ); ?></span><meta itemprop="position" content="2" /></li>
			<?php elseif ( is_day() ) : ?>
			<li class="p-breadcrumb__item c-breadcrumb__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name"><?php echo esc_html( get_the_time( __( 'F jS, Y', 'tcd-w' ), $post ) ); ?></span><meta itemprop="position" content="2" /></li>
			<?php elseif ( is_home() ) : ?>
			<li class="p-breadcrumb__item c-breadcrumb__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name"><?php _e( 'コラム', 'tcd-w' ); ?></span><meta itemprop="position" content="2" /></li>
			<?php elseif ( is_post_type_archive( 'news' ) || is_singular( 'news' ) ) : ?>
			<li class="p-breadcrumb__item c-breadcrumb__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				<a href="<?php echo esc_url( get_post_type_archive_link( 'news' ) ); ?>" itemprop="item">
					<span itemprop="name"><?php _e( 'News', 'tcd-w' ); ?></span>
				</a>
				<meta itemprop="position" content="2" />
			</li>
			<?php if ( is_singular( 'news' ) ) : ?>
			<li class="p-breadcrumb__item c-breadcrumb__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name"><?php echo strip_tags( get_the_title( $post->ID ) ); ?></span><meta itemprop="position" content="3" /></li>
			<?php endif; ?>
			<?php elseif ( is_post_type_archive( 'review' ) || is_singular( 'review' ) ) : ?>
			<li class="p-breadcrumb__item c-breadcrumb__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				<a href="<?php echo esc_url( get_post_type_archive_link( 'review' ) ); ?>" itemprop="item">
					<span itemprop="name"><?php _e( 'メンバー紹介' ); ?></span>
				</a>
				<meta itemprop="position" content="2" />
			</li>
			<?php if ( is_singular( 'review' ) ) : ?>
			<li class="p-breadcrumb__item c-breadcrumb__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name"><?php echo strip_tags( get_the_title( $post->ID ) ); ?></span><meta itemprop="position" content="3" /></li>
			<?php endif; ?>
			<?php elseif ( is_page() ) : ?>
			<li class="p-breadcrumb__item c-breadcrumb__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name"><?php echo strip_tags( get_the_title( $post->ID ) ); ?></span><meta itemprop="position" content="2" /></li>
			<?php elseif ( is_singular( 'post' ) ) : ?>
			<li class="p-breadcrumb__item c-breadcrumb__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				<a href="<?php echo esc_url( get_post_type_archive_link( 'post' ) ); ?>" itemprop="item">
					<span itemprop="name"><?php _e( 'コラム', 'tcd-w' ); ?></span>
				</a>
				<meta itemprop="position" content="2" />
			</li>
			<li class="p-breadcrumb__item c-breadcrumb__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				<?php 
				$categories = get_the_category();
				foreach ( $categories as $key => $category ) :
					if ( 0 !== $key ) {
						echo ', ';
					}
				?>
				<a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>" itemprop="item">
					<span itemprop="name"><?php echo esc_html( $category->name ); ?></span>
				</a>
				<?php endforeach; ?>
				<meta itemprop="position" content="3" />
			</li>
			<li class="p-breadcrumb__item c-breadcrumb__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name"><?php echo strip_tags( get_the_title( $post->ID ) ); ?></span><meta itemprop="position" content="4" /></li>
			<?php elseif ( is_404() ) : ?>
			<li class="p-breadcrumb__item c-breadcrumb__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name"><?php _e( "Sorry, but you are looking for something that isn't here.", 'tcd-w' ); ?></span><meta itemprop="position" content="2" /></li>
			<?php endif; ?>
		</ul>
