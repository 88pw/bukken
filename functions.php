<?php

// カスタム投稿タイプの追加

function create_post_type() {

  $options = [  // supports のパラメータを設定する配列（初期値だと title と editor のみ投稿画面で使える）
    'title',  // 記事タイトル
    'editor',  // 記事本文
    'thumbnail',  // アイキャッチ画像
    'revisions'  // リビジョン
  ];

  register_post_type( 'hotel',  // カスタム投稿名
    array(
      'label' => '物件一覧',  // 管理画面の左メニューに表示されるテキスト
      'public' => true,  // 投稿タイプをパブリックにするか否か
      'has_archive' => true,  // アーカイブを有効にするか否か
      'show_in_rest' => true, //APIから取得できるようにするか
      'menu_position' => 5,  // 管理画面上でどこに配置するか今回の場合は「投稿」の下に配置
      'supports' => $options,  // 投稿画面でどのmoduleを使うか的な設定
      'taxonomies' => array( 'area' ),
    )
  );
}

$area = array(
'label' => '物件エリア',
'public' => true,
'show_ui' => true,
'hierarchical' => true,
'show_in_rest' => true,
'show_admin_column'=>true
);
$madori = array(
'label' => '間取り',
'public' => true,
'show_ui' => true,
'hierarchical' => true,
'show_in_rest' => true,
'show_admin_column'=>true
);
$type = array(
'label' => 'タイプ',
'public' => true,
'show_ui' => true,
'hierarchical' => true,
'show_in_rest' => true,
'show_admin_column'=>true
);
$state = array(
'label' => '契約状況',
'public' => true,
'show_ui' => true,
'hierarchical' => true,
'show_in_rest' => true,
'show_admin_column'=>true
);
$obaject_type = array(
  'hotel'
);
register_taxonomy('area',$obaject_type,$area);
register_taxonomy('madori',$obaject_type,$madori);
register_taxonomy('type',$obaject_type,$type);
register_taxonomy('state',$obaject_type,$state);

add_action( 'init', 'create_post_type' ); // アクションに上記関数をフックします
// add_theme_support( 'post-thumbnails' ); // アイキャッチ画像を全投稿で共通して使えるように



/*----------------------------------------------------------
  Restapi内でカテゴリー名・タグ名を取得
----------------------------------------------------------*/
//カテゴリ名を取得する関数を登録
add_action( 'rest_api_init', 'register_state_name' );
  function register_state_name() {
      register_rest_field( 'hotel',
        'state_name',
          array(
            'get_callback'    => 'get_state_name'
          )
      );
      register_rest_field( 'hotel',
        'madori_name',
          array(
            'get_callback'    => 'get_madori_name'
          )
      );
  }
  function get_state_name( $object ) {
    $states = object;
    $state = get_term( $object['state'][0], 'state', ARRAY_A );
    $states = $object['state'][0] ? $state['name'] : "";
    return $states;
  }
  function get_madori_name( $object ) {
    $madoris = object;
    $madori = get_term( $object['madori'][0], 'madori', ARRAY_A );
    $madoris = $object['madori'][0] ? $madori['name'] : "";
    return $madoris;
  }



/*----------------------------------------------------------
  initial
----------------------------------------------------------*/
register_nav_menus();// メニュー機能init
add_theme_support('post-thumbnails');// サムネイル機能init
/*----------------------------------------------------------
  bagfix
----------------------------------------------------------*/
// AdvancedCustomFieldのGooglemap表示
function my_acf_google_map_api( $api ){
  $api['key'] = 'AIzaSyDsJ-SzT-_l_jXygNh8JoNuTpbgstZyQWs';
  return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
/*----------------------------------------------------------
  updates
----------------------------------------------------------*/
// WPのメジャーアップデート、マイナーアップデート自動更新
add_filter( 'allow_major_auto_core_updates', '__return_true' );
add_filter( 'allow_minor_auto_core_updates', '__return_true' );
// プラグインの自動更新
add_filter( 'auto_update_plugin', '__return_true' );
/*----------------------------------------------------------
  headclean
----------------------------------------------------------*/
// WPjQuery読み込み拒否
function stop_wp_jq() {
//if ( !is_admin() ) {  wp_deregister_script('jquery'); }
}
add_action('init', 'stop_wp_jq');
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );// WPの絵文字機能読み込み拒否
remove_action( 'wp_print_styles', 'print_emoji_styles' ); // WPの絵文字機能読み込み拒否
remove_action( 'wp_head', 'feed_links', 2 ); //サイト全体のフィード
remove_action( 'wp_head', 'feed_links_extra', 3 ); //その他のフィード
remove_action( 'wp_head', 'rsd_link' ); //Really Simple Discoveryリンク
remove_action( 'wp_head', 'wlwmanifest_link' ); //Windows Live Writerリンク
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); //前後の記事リンク
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 ); //ショートリンク
remove_action( 'wp_head', 'rel_canonical' ); //canonical属性
remove_action( 'wp_head', 'wp_generator' ); //WPバージョン
/*----------------------------------------------------------
  サイドバー登録
----------------------------------------------------------*/
if (function_exists('register_sidebar')) {
    register_sidebar(array(
      'name' => 'サイドバー',
      'id' => 'sidebar',
      'description' => 'サイドバーウィジェット',
      'before_widget' => '<div class="widget">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget__title title__normal">',
      'after_title' => '</h3>',
   ));
}


?>