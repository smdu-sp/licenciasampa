<?php
/**
 * Functions and definitions.
 *
 * @link https://livecomposerplugin.com/themes/
 *
 * @package LC Blank
 */

// Delcare Header/Footer compatibility.
define( 'DS_LIVE_COMPOSER_HF', true );
define( 'DS_LIVE_COMPOSER_HF_AUTO', false );

// Content Width ( WP requires it and LC uses is to figure out the wrapper width ).
if ( ! isset( $content_width ) ) {
	$content_width = 1180;
}

if ( ! function_exists( 'lct_theme_setup' ) ) {

	/**
	 * Basic theme setup.
	 */
	function lct_theme_setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Enable Post Thumbnails ( Featured Image ).
		add_theme_support( 'post-thumbnails' );

		// Enable support for HTML5 markup.
		add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form' ) );
	}
} add_action( 'after_setup_theme', 'lct_theme_setup' );

/**
 * Load JS and CSS files.
 */
function lct_load_scripts()
{
	// Bootstrap
	wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css', false, '5.2.0', 'all');
	
	// Estilo Padrão
	wp_enqueue_style( 'lct-base-style', get_stylesheet_uri(), array(), '1.0' );
	
	// Dashicons
	wp_enqueue_style( 'dashicons' );
	
	// Personalização
	wp_enqueue_style( 'acessivel', '/css/acessivel.css', false, '1.0', 'all');
	wp_enqueue_style( 'default', '/css/default.css', false, '1.7', 'all');
	wp_enqueue_style( 'menus', '/css/menus.css', false, '1.2', 'all');
	wp_enqueue_style( 'botoes', '/css/botoes.css', false, '1.1', 'all');
	wp_enqueue_style( 'paginas_ajuda', '/css/ajuda.css', false, '1.1', 'all');
	wp_enqueue_style( 'breadcrumb', '/css/breadcrumb.css', false, '1.0', 'all');
	wp_enqueue_style( 'cadastro', '/css/cadastro.css', false, '1.0', 'all');

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js' );

}

add_action( 'wp_enqueue_scripts', 'lct_load_scripts' );

if ( ! defined( 'DS_LIVE_COMPOSER_VER' ) ) {

	/**
	 * Admin Notice
	 */
	function lct_notification() {
	?>
		<div class="error">
			<p><?php printf( __( '%sLive Composer%s plugin is %srequired%s and has to be active for this theme to function.', 'lc-blank' ), '<a target="_blank" href="https://wordpress.org/plugins/live-composer-page-builder/">', '</a>', '<strong>', '</strong>' ); ?></p>
		</div>
	<?php }
	add_action( 'admin_notices', 'lct_notification' );
}

/**
 * Proper <title> for header.php - Pass your seperator in header.php. Default: '|'
*/
function lct_title( $sep ) {
	the_title();
	echo ' ' . $sep . ' ';
	bloginfo( 'name ' );
}

// Query no DB
function getDados(string $tabela, array $condicoes = [])
{
	global $wpdb;
	$where = "1 = 1";

	foreach ($condicoes as $coluna=>$valor) {
		$where = $where . " AND $coluna = '$valor'";
	}

	$query =  	<<<SQL
					SELECT * FROM {$tabela}
					WHERE %s;
				SQL;
	$prepare = $wpdb->prepare($query, $where);
	$resultados = $wpdb->get_results($prepare, OBJECT);

	foreach($resultados as $resultado) {
		foreach ($condicoes as $coluna=>$valor) {
			unset($resultado->$coluna);
		}
	}
	
	return $resultados;
}

// Aproxima largura em porcentagem para grid de 12 colunas
function calculaCol($pct)
{
	$col = $pct / 100 * 12;
	$col = (int) round($col, 0);

	if ($col < 1) {
		$col = 1;
	}

	if ($col > 12) {
		$col = 12;
	}
	
	return $col;
}

// Shortcodes
// Adiciona o botão "Voltar" em todas as páginas, exceto na página principal
add_shortcode('shortcodeBotaoVoltar', 'shortcodeBotaoVoltar');

function shortcodeBotaoVoltar() {
	
require_once "modulo-botao-voltar.php";

return ob_get_clean();
}
