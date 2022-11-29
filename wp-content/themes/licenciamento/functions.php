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
	wp_enqueue_style( 'default', '/css/default.css', false, '2.0', 'all');

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

// Resgatar campos para gerar formulários
function carregarFormulario(string $formNome) {
	$tabelaCampos = "form_campos";
	$tabelaOptions = "form_options";
	$condicoes = ["form_nome" => "$formNome"];
	$campos = getDados($tabelaCampos, $condicoes);
	
	foreach ($campos as $campo) {
		$objAtributos = json_decode($campo->attr);
		$strAtributos = "";

		foreach ($objAtributos as $atributo => $valor) {
			$strAtributos = $strAtributos . "$atributo=\"$valor\" ";
		}

		$campo->attr = $strAtributos;

		if ($campo->tipo === 'select') {
			$condicoesOptions = $condicoes + ["campo_nome" => $campo->campo_nome];
			$campo->options = getDados($tabelaOptions, $condicoesOptions);
		}
	}

	return $campos;
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
add_shortcode('shortcodeBotaoLogin', 'shortcodeBotaoLogin');

function shortcodeBotaoVoltar() {
	
require_once "modulo-botao-voltar.php";

return ob_get_clean();
}

function shortcodeBotaoLogin() {
	
require_once "modulo-botao-login.php";

return ob_get_clean();
}

function adicionar_meta()
{
	$object_type = 'post'; // The object type. 
	// For custom post types, this is 'post', for custom comment types, this is 'comment'.

	$args1 = array(
		'type'		=> 'string', // Validate and sanitize the meta value as a string.
		// Default: 'string'.  
		// In 4.7 one of 'string', 'boolean', 'integer', 'number' must be used as 'type'. 
		'description'    => 'Tipo da página', // Shown in the schema for the meta key.
		'single'        => true, // Return a single value of the type. Default: false.
		'show_in_rest'    => true, // Show in the WP REST API response. Default: false.
		'supports' => [
			'custom-fields'
		],
	);

	register_meta($object_type, 'grupo', $args1);
}

adicionar_meta();
