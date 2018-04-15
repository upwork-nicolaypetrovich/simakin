<?php
// start of the session
session_start();
// removes comments from admin menu
add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
	remove_menu_page( 'edit-comments.php' );
}
add_action( 'init', 'remove_comment_support', 100 );
function remove_comment_support() {
	remove_post_type_support( 'post', 'comments' );
	remove_post_type_support( 'page', 'comments' );
}
function mytheme_admin_bar_render() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu( 'comments' );
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );
// registering styles and scripts
add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );
function theme_name_scripts() {
	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.min.css' );
	wp_enqueue_style( 'nm_style', get_template_directory_uri() . '/css/nm_style.css' );
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.min.js', array(), '1.0.0', true );
	wp_enqueue_style( 'slick-style', get_template_directory_uri() . '/css/slick.css' );
	wp_enqueue_script( 'slick-scripts', get_template_directory_uri() . '/js/slick.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/custom.js', array(), '1.0.0', true );
}

function rename_post_formats($translation, $text, $context, $domain) {
    $names = array(
        'Aside' => 'Журнал',
        'Video' => 'Видео',
        'Standard' => 'Стандарт',
        'Quote' => 'Запись'
    );
    if ($context == 'Post format') {
        $translation = str_replace(array_keys($names), array_values($names), $text);
    }
    return $translation;
}
add_filter('gettext_with_context', 'rename_post_formats', 10, 4);

function simakin_setup()
{
   add_theme_support('post-formats',[
      'quote',
		'video',
		'aside',
	]);
}
add_action('after_setup_theme', 'simakin_setup');



// registering navigation
register_nav_menus( array(
	'top'         => 'Верхнее Меню',
	'bottom'      => 'Нижнее Меню',
	'information' => 'Меню Информации'
) );
// registering image dimensions
add_theme_support( 'post-thumbnails' );
add_image_size( 'archive-main', 783, 388, true );
add_image_size( 'related-grid', 250, 158, true );
add_image_size( 'icon', 39, 42, true );
add_image_size( 'rew-photo', 60, 65, true );
add_image_size( 'review-photo', 60, 61, true );
add_image_size( 'search-new-posts', 248, 156, true );
add_image_size( 'page-author', 783 );
// marking search results
function mark_search_results( $question, $string ) {
	return str_replace( $question, "<mark>" . $question . "</mark>", $string );
}
// counter function
function update_counter( $id ) {
	$count = get_post_meta( $id, 'counter', true );
	update_post_meta( $id, 'counter', ++ $count );
}
// changing http links to https
function https_converter( $str ) {
	return str_replace( "http:", "https:", $str );
}
// get related posts
function get_related_posts( $id ) {
	$tags = wp_get_post_tags( $id );
	if ( $tags ) {
		$args = array(
			'tag__in'          => array( $tags[0]->term_id ),
			'post__not_in'     => array( $id ),
			'posts_per_page'   => 5,
			'caller_get_posts' => 1
		);
		return new WP_Query( $args );
	} else {
		return false;
	}
}
// form information sending
function send_email_to_admin() {
	if ( isset( $_POST['test'] ) && $_POST['test'] == '' ) {
		//print_r($_POST); die;
		$message = '';
		if ( isset( $_POST['name'] ) ) {
			$message .= 'Имя: ' . $_POST['name'] . "\n\r";
		}
		if ( isset( $_POST['email'] ) ) {
			$message .= 'E-mail: ' . $_POST['email'] . "\n\r";
		}
		if ( isset( $_POST['theme'] ) ) {
			$message .= 'Тема: ' . $_POST['theme'] . "\n\r";
		}
		if ( isset( $_POST['message'] ) ) {
			$message .= 'Сообщение: ' . $_POST['message'] . "\n\r";
		}
		$headers = 'From: Письмо с блога <comercial@lival.pt>' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
		wp_mail( get_option( 'admin_email' ), 'Письмо с блога', $message, $headers );
		$_SESSION['popup'] = true;
	}
	wp_redirect( "/" );
	exit();
}
add_action( 'admin_post_nopriv_contact_form', 'send_email_to_admin' );
add_action( 'admin_post_contact_form', 'send_email_to_admin' );
// ajax post loading
function true_load_posts() {
	$args                = unserialize( stripslashes( $_POST['query'] ) );
	$args['paged']       = $_POST['page'] + 1;
	$args['post_status'] = 'publish';
	query_posts( $args );
	get_template_part( 'archive', 'grid' );
	die();
}
add_action( 'wp_ajax_loadmore', 'true_load_posts' );
add_action( 'wp_ajax_nopriv_loadmore', 'true_load_posts' );
// add_action( 'init', function() {
//   ps_register_shortcode_ajax( 'ps_get_survey_form', 'ps_get_survey_form' );
// } );
// function ps_register_shortcode_ajax( $callable, $action ) {
//   if ( empty( $_POST['action'] ) || $_POST['action'] != $action )
//     return;
//   call_user_func( $callable );
// }
// function ps_get_survey_form() {
//   global $wp_embed;
//     echo do_shortcode( '[uptolike]' );
//     //echo do_shortcode( '[poll id="1"]' );
//     //die();
// }
// search query redefine
function serach_func( $query ) {
	//echo $_SERVER['REQUEST_URI'];
	if ( strpos( $_SERVER['REQUEST_URI'], '?s=' ) ) {
		$query->set( 'posts_per_page', 100 );
		return;
	}
}
add_action( 'pre_get_posts', 'serach_func' );
// ajax archive loading
function true_load_archive() {
	$GLOBALS['articles_ajax'] = true;
	get_template_part( 'page2', 'grid' );
	die();
}
add_action( 'wp_ajax_loadarchive', 'true_load_archive' );
add_action( 'wp_ajax_nopriv_loadarchive', 'true_load_archive' );
// check allowed archive categories
function checkAllowedCat( $id ) {
	if ( $GLOBALS['articles_ajax'] ) {
		return true;
	} else {
		if ( in_array( $id, array( 2, 3, 4, 7 ) ) ) {
			return true;
		} else {
			return false;
		}
	}
}
// adding theme customization
add_action( 'customize_register', function ( $wp_customize ) {
	/* HEADER SECTION */
	
	$wp_customize->add_section(
		'header',
		array(
			'title'       => 'Шапка',
			'description' => 'Заголовок шапки сайта',
			'priority'    => 1,
		)
	);
	
	$wp_customize->add_setting(
		'head1',
		array( 'default' => '' )
	);
	$wp_customize->add_control(
		'head1',
		array(
			'label'   => 'Заговолок',
			'section' => 'header',
			'type'    => 'text',
		)
	);
	
	/* END HEADER SECTION */
	
	
	// footer section
	$wp_customize->add_section(
		'footer',
		array(
			'title'       => 'Контакты',
			'description' => 'Контактная информация и прочее',
			'priority'    => 2,
		)
	);
	$wp_customize->add_setting(
		'sn1',
		array( 'default' => '' )
	);
	$wp_customize->add_control(
		'sn1',
		array(
			'label'   => 'вКонтакте',
			'section' => 'footer',
			'type'    => 'text',
		)
	);
	$wp_customize->add_setting(
		'sn2',
		array( 'default' => '' )
	);
	$wp_customize->add_control(
		'sn2',
		array(
			'label'   => 'Однокласники',
			'section' => 'footer',
			'type'    => 'text',
		)
	);
	$wp_customize->add_setting(
		'sn3',
		array( 'default' => '' )
	);
	$wp_customize->add_control(
		'sn3',
		array(
			'label'   => 'Facebook',
			'section' => 'footer',
			'type'    => 'text',
		)
	);
	$wp_customize->add_setting(
		'sn4',
		array( 'default' => '' )
	);
	$wp_customize->add_control(
		'sn4',
		array(
			'label'   => 'Google+',
			'section' => 'footer',
			'type'    => 'text',
		)
	);
	$wp_customize->add_setting(
		'sn5',
		array( 'default' => '' )
	);
	$wp_customize->add_control(
		'sn5',
		array(
			'label'   => 'Twitter',
			'section' => 'footer',
			'type'    => 'text',
		)
	);
	$wp_customize->add_setting(
		'sn6',
		array( 'default' => '' )
	);
	$wp_customize->add_control(
		'sn6',
		array(
			'label'   => 'Телеграм',
			'section' => 'footer',
			'type'    => 'text',
		)
	);
	$wp_customize->add_setting(
		'sn7',
		array( 'default' => '' )
	);
	$wp_customize->add_control(
		'sn7',
		array(
			'label'   => 'YouTube',
			'section' => 'footer',
			'type'    => 'text',
		)
	);
	$wp_customize->add_setting(
		'copyrights',
		array( 'default' => '<i class="fa fa-copyright"></i>Дмитрий Симакин, 2007–2017.<br class="visible-xs"> Все права защищены.' )
	);
	$wp_customize->add_control(
		'copyrights',
		array(
			'label'   => 'Copyrights',
			'section' => 'footer',
			'type'    => 'textarea',
		)
	);
	// courses section
	$wp_customize->add_section(
		'kur',
		array(
			'title'       => 'Настройки Публикаций',
			'description' => 'Настройки старницы курсов и закрепелние поста на главной',
			'priority'    => 99,
		)
	);
	$wp_customize->add_setting(
		'kurid',
		array( 'default' => '' )
	);
	$wp_customize->add_control(
		'kurid',
		array(
			'label'   => 'ID Айди Курса',
			'section' => 'kur',
			'type'    => 'text',
		)
	);
	$wp_customize->add_setting(
		'mpostid',
		array( 'default' => '' )
	);
	$wp_customize->add_control(
		'mpostid',
		array(
			'label'   => 'ID Айди Поста',
			'section' => 'kur',
			'type'    => 'text',
		)
	);
	$wp_customize->add_setting(
		'ccount1',
		array( 'default' => '' )
	);
	$wp_customize->add_control(
		'ccount1',
		array(
			'label'   => 'Счетчик посещений курса',
			'section' => 'kur',
			'type'    => 'text',
		)
	);
	$wp_customize->add_setting(
		'ccount2',
		array( 'default' => '' )
	);
	$wp_customize->add_control(
		'ccount2',
		array(
			'label'   => 'Счетчик покупок курса',
			'section' => 'kur',
			'type'    => 'text',
		)
	);

	// footer section
	$wp_customize->add_section(
		'popup',
		array(
			'title'       => 'Попап',
			'description' => 'Настройки попапов',
			'priority'    => 3,
		)
	);
	$wp_customize->add_setting(
		'pu11',
		array( 'default' => 'Извините!' )
	);
	$wp_customize->add_control(
		'pu11',
		array(
			'label'   => 'Заголовок',
			'section' => 'popup',
			'type'    => 'text',
		)
	);
	$wp_customize->add_setting(
		'pu12',
		array( 'default' => 'Страница находится в разработке.' )
	);
	$wp_customize->add_control(
		'pu12',
		array(
			'label'   => 'Текст',
			'section' => 'popup',
			'type'    => 'text',
		)
	);
} );
// widgets programming
// registering sidebars
register_sidebar( array( 'name' => 'Правая Колонка', 'id' => "sidebar-right" ) );
register_sidebar( array( 'name' => 'Область Под Статьей', 'id' => "sidebar-single" ) );
// widget of social tabs
class Dima_Widget_Social extends WP_Widget {
	public function __construct() {
		$widget_ops = array(
			'classname'   => 'dima_widget_social',
			'description' => 'Виджет для социальных сетей',
		);
		parent::__construct( 'dima_widget_social', 'Социальные Сети', $widget_ops );
	}
	public function widget( $args, $instance ) {
		include 'widgets/social.php';
	}
	public function form( $instance ) {
		$title  =
			! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Я в социальных сетях:', 'text_domain' );
		$vk     = ! empty( $instance['vk'] ) ? $instance['vk'] : esc_html__( 'код виджета1', 'text_domain' );
		$ok     = ! empty( $instance['ok'] ) ? $instance['ok'] : esc_html__( 'код виджета2', 'text_domain' );
		$fb     = ! empty( $instance['fb'] ) ? $instance['fb'] : esc_html__( 'код виджета3', 'text_domain' );
		$google = ! empty( $instance['google'] ) ? $instance['google'] : esc_html__( 'код виджета4', 'text_domain' );
		$tw     = ! empty( $instance['tw'] ) ? $instance['tw'] : esc_html__( 'код виджета5', 'text_domain' );
		include 'widgets/social_admin.php';
	}
	public function update( $new_instance, $old_instance ) {
		$instance           = array();
		$instance['title']  = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['vk']     = ( ! empty( $new_instance['vk'] ) ) ? $new_instance['vk'] : '';
		$instance['ok']     = ( ! empty( $new_instance['ok'] ) ) ? $new_instance['ok'] : '';
		$instance['fb']     = ( ! empty( $new_instance['fb'] ) ) ? $new_instance['fb'] : '';
		$instance['google'] = ( ! empty( $new_instance['google'] ) ) ? $new_instance['google'] : '';
		$instance['tw']     = ( ! empty( $new_instance['tw'] ) ) ? $new_instance['tw'] : '';
		return $instance;
	}
}
add_action( 'widgets_init',
	create_function( '', 'return register_widget("Dima_Widget_Social");' )
);
// widget of social tabs
class Dima_Widget_Submits extends WP_Widget {
	public function __construct() {
		$widget_ops = array(
			'classname'   => 'dima_widget_submits',
			'description' => 'Виджет для подписок',
		);
		parent::__construct( 'dima_widget_submits', 'Подписки', $widget_ops );
	}
	public function widget( $args, $instance ) {
		include 'widgets/submits.php';
	}
	public function form( $instance ) {
		$title  = ! empty( $instance['title'] ) ? $instance['title'] :
			esc_html__( 'Следить за новыми материалами через:', 'text_domain' );
		$title2 = ! empty( $instance['title2'] ) ? $instance['title2'] :
			esc_html__( 'Подписаться на рассылку новостей:', 'text_domain' );
		$title3 = ! empty( $instance['title3'] ) ? $instance['title3'] :
			esc_html__( 'Активировать WebPush уведомления:', 'text_domain' );
		$push   = ! empty( $instance['push'] ) ? $instance['push'] :
			esc_html__( 'Хотите первым узнавать новости блога?<br>Активируйте подписку на уведомления.',
				'text_domain' );
		include 'widgets/submits_admin.php';
	}
	public function update( $new_instance, $old_instance ) {
		$instance           = array();
		$instance['title']  = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['title2'] = ( ! empty( $new_instance['title2'] ) ) ? strip_tags( $new_instance['title2'] ) : '';
		$instance['title3'] = ( ! empty( $new_instance['title3'] ) ) ? strip_tags( $new_instance['title3'] ) : '';
		$instance['push']   = ( ! empty( $new_instance['push'] ) ) ? strip_tags( $new_instance['push'] ) : '';
		return $instance;
	}
}
add_action( 'widgets_init',
	create_function( '', 'return register_widget("Dima_Widget_Submits");' )
);
class Dima_Widget_Submits_Single extends WP_Widget {
	public function __construct() {
		$widget_ops = array(
			'classname'   => 'dima_widget_submits_single',
			'description' => 'Виджет для подписок под статью',
		);
		parent::__construct( 'dima_widget_submits_single', 'Подписки под статью', $widget_ops );
	}
	public function widget( $args, $instance ) {
		include 'widgets/submits_single.php';
	}
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] :
			esc_html__( 'Следить за новыми материалами через:', 'text_domain' );
		$text  = ! empty( $instance['text'] ) ? $instance['text'] :
			esc_html__( 'Подписаться на рассылку новостей:', 'text_domain' );
		include 'widgets/submits_single_admin.php';
	}
	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['text']  = ( ! empty( $new_instance['text'] ) ) ? strip_tags( $new_instance['text'] ) : '';
		return $instance;
	}
}
add_action( 'widgets_init',
	create_function( '', 'return register_widget("Dima_Widget_Submits_Single");' )
);
// add widgets bond
// Register and load the widget
function wpb_load_widget() {
	register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );
class wpb_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'wpb_widget',
			__( 'Акции от партнеров', 'wpb_widget_domain' ),
			array( 'description' => __( 'Акции от партнеров виджет', 'wpb_widget_domain' ), )
		);
	}
	public function widget( $args, $instance ) {
		echo '<div class="sb-cont advertising-block">';
		$title = apply_filters( 'widget_title', $instance['title'] );
		if ( ! empty( $title ) ) {
			echo '<h5 class="h5">' . $title . '</h5>';
		}
		include 'widgets/PromotionsFromPartners.php';
		echo '</div>';
	}
	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = __( 'New title', 'wpb_widget_domain' );
		}
		?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
                   name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
                   value="<?php echo esc_attr( $title ); ?>"/>
        </p>
		<?php
	}
	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
}
// add widgets
class Dima_Widget_Add extends WP_Widget {
	public function __construct() {
		$widget_ops = array(
			'classname'   => 'dima_widget_add',
			'description' => 'Виджет для рекламного блока партнерок',
		);
		parent::__construct( 'dima_widget_add', 'Реклама с Партнерок', $widget_ops );
	}
	public function widget( $args, $instance ) {
		include 'widgets/add.php';
	}
	public function form( $instance ) {
		$add = ! empty( $instance['add'] ) ? $instance['add'] : esc_html__( 'код партнерки', 'text_domain' );
		include 'widgets/add_admin.php';
	}
	public function update( $new_instance, $old_instance ) {
		$instance        = array();
		$instance['add'] = ( ! empty( $new_instance['add'] ) ) ? $new_instance['add'] : '';
		return $instance;
	}
}
add_action( 'widgets_init',
	create_function( '', 'return register_widget("Dima_Widget_Add");' )
);
class Dima_Widget_Add_Banner extends WP_Widget {
	public function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'scripts' ) );
		$widget_ops = array(
			'classname'   => 'dima_widget_add_banner',
			'description' => 'Виджет для рекламного блока через свой баннер',
		);
		parent::__construct( 'dima_widget_add_banner', 'Рекламный Баннер', $widget_ops );
	}
	public function widget( $args, $instance ) {
		include 'widgets/add_banner.php';
	}
	public function form( $instance ) {
		$link =
			! empty( $instance['link'] ) ? $instance['link'] : esc_html__( 'https://www.youtube.com', 'text_domain' );
		$add  = ! empty( $instance['add'] ) ? $instance['add'] : '';
		include 'widgets/add_banner_admin.php';
	}
	public function update( $new_instance, $old_instance ) {
		$instance         = array();
		$instance['link'] = ( ! empty( $new_instance['link'] ) ) ? strip_tags( $new_instance['link'] ) : '';
		$instance['add']  = ( ! empty( $new_instance['add'] ) ) ? $new_instance['add'] : '';
		return $instance;
	}
	public function scripts() {
		wp_enqueue_script( 'media-upload' );
		wp_enqueue_media();
		wp_enqueue_script( 'our_admin', get_template_directory_uri() . '/js/admin.js', array( 'jquery' ) );
	}
}
add_action( 'widgets_init',
	create_function( '', 'return register_widget("Dima_Widget_Add_Banner");' )
);

