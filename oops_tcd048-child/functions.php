<?php //子テーマで利用する関数を書く

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

// グローバルナビで現在地にクラスを付与する
function make_menu_current( $classes, $item ) {
	//現在表示している投稿の投稿タイプ名が「worksかつ詳細ページ」の場合
    if ( get_post_type() === 'news' && is_single() )  {
        $classes[] = 'current-menu-news';
	} 
	//現在表示している投稿の投稿タイプ名が「post(この場合ブログ)かつ詳細ページ」の場合
	elseif( get_post_type() === 'review' && is_single() )  {
			$classes[] = 'current-menu-members';
	}
	elseif( get_post_type() === 'post' && is_single() )  {
		$classes[] = 'current-menu-column';
	}
	elseif( get_post_type() === 'post' && is_category() )  {
		$classes[] = 'current-menu-column';
	}
    $classes = array_unique( $classes );
    return $classes;
}
add_filter( 'nav_menu_css_class', 'make_menu_current', 10, 2 );

// WordPress管理画面の「投稿」を「コラム」に変更する
function Change_menulabel() {
	global $menu;
	global $submenu;
	$name = 'コラム';
	$menu[5][0] = $name;
	$submenu['edit.php'][5][0] = $name.'一覧';
	$submenu['edit.php'][10][0] = '新しい'.$name;
}
function Change_objectlabel() {
	global $wp_post_types;
	$name = 'コラム';
	$labels = &$wp_post_types['post']->labels;
	$labels->name = $name;
	$labels->singular_name = $name;
	$labels->add_new = _x('追加', $name);
	$labels->add_new_item = $name.'の新規追加';
	$labels->edit_item = $name.'の編集';
	$labels->new_item = '新規'.$name;
	$labels->view_item = $name.'を表示';
	$labels->search_items = $name.'を検索';
	$labels->not_found = $name.'が見つかりませんでした';
	$labels->not_found_in_trash = 'ゴミ箱に'.$name.'は見つかりませんでした';
}
add_action( 'init', 'Change_objectlabel' );
add_action( 'admin_menu', 'Change_menulabel' );