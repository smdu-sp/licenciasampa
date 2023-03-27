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

// Constantes usadas em todo o site
if ( get_page_by_path( 'botoes' ) ) {
	define ( 'ID_BOTOES', get_page_by_path( 'botoes', OBJECT, 'page' )->ID );
}
define( 'PATH_ROOT', get_template_directory() . '/' );
define( 'PATH_AVISOS', PATH_ROOT . 'avisos/' );
define( 'PATH_INTERNAS', PATH_ROOT . 'paginas-internas/' );
define( 'PATH_ASSETS', ABSPATH . 'assets/' );
define( 'PATH_SVG', PATH_ASSETS . 'svg/' );

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
	// App do Vue
	$host = $_SERVER['HTTP_HOST'];
	if($host === 'localhost') {
		wp_register_script( 'vue-app', 'http://localhost:5173/src/main.js',  array( 'acf-input' ) );
	
		wp_enqueue_script(( 'vue-app' ));
	
		add_filter( 'script_loader_tag', 'script_module', 10, 3 );
	
		function script_module( $tag, $handle, $src ) {
			if ( 'vue-app' === $handle ) {
				$tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
			}
	
			return $tag;
		}
	}
	
	// Bootstrap
	wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css', false, '5.2.0', 'all');
	
	// Estilo Padrão
	wp_enqueue_style( 'lct-base-style', get_stylesheet_uri(), array(), '1.0' );
	
	// Dashicons
	wp_enqueue_style( 'dashicons' );
	
	// Personalização
	wp_enqueue_style( 'default', '/css/default.css', false, '2.0', 'all');


	
	// Páginas internas
	if ( ! is_front_page() ) {
		wp_enqueue_style( 'breadcrumb', '/css/breadcrumb.css', false, '1.0', 'all');
		wp_enqueue_style( 'paginas-internas', '/css/paginas-internas.css', false, '1.0', 'all');
	}

	if ( is_page( 'mapa-do-site')) {
		wp_enqueue_style( 'mapa', '/css/mapa.css', false, '1.0', 'all');
	}
	
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

// Registrar menus
function registrar_menus()
  {
      register_nav_menus(
          array
          (
              'acess-menu' => __( 'Menu de Acessibilidade' ),
              'nav-menu' => __( 'Menu Navegação do Header' ),
              'footer-menu' => __( 'Menu do Rodapé' ),
          )
      );
}

add_action( 'init', 'registrar_menus' );

function adicionar_meta()
{
	$argsGrupo = array(
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

	$argsTitulo = array(
		'type'		=> 'string', // Validate and sanitize the meta value as a string.
		// Default: 'string'.  
		// In 4.7 one of 'string', 'boolean', 'integer', 'number' must be used as 'type'. 
		'description'    => 'Título alternativo para utilização no índice de páginas', // Shown in the schema for the meta key.
		'single'        => true, // Return a single value of the type. Default: false.
		'show_in_rest'    => true, // Show in the WP REST API response. Default: false.
		'supports' => [
			'custom-fields'
		],
	);

	$argsDescricao = array(
		'type'		=> 'string', // Validate and sanitize the meta value as a string.
		// Default: 'string'.  
		// In 4.7 one of 'string', 'boolean', 'integer', 'number' must be used as 'type'. 
		'description'    => 'Descrição a ser usada no índice de páginas', // Shown in the schema for the meta key.
		'single'        => true, // Return a single value of the type. Default: false.
		'show_in_rest'    => true, // Show in the WP REST API response. Default: false.
		'supports' => [
			'custom-fields'
		],
	);

	$argsPriorizar = array(
		'type'		=> 'boolean', // Validate and sanitize the meta value as a string.
		// Default: 'string'.  
		// In 4.7 one of 'string', 'boolean', 'integer', 'number' must be used as 'type'. 
		'description'    => 'Assuntos importantes do site, que devem ser exibidos ao topo da lista', // Shown in the schema for the meta key.
		'single'        => true, // Return a single value of the type. Default: false.
		'show_in_rest'    => true, // Show in the WP REST API response. Default: false.
		'supports' => [
			'custom-fields'
		],
	);

	$argsExcluirMapa = array(
		'type'		=> 'boolean', // Validate and sanitize the meta value as a string.
		// Default: 'string'.  
		// In 4.7 one of 'string', 'boolean', 'integer', 'number' must be used as 'type'. 
		'description'    => 'Página deve ser excluída do Mapa do Site?', // Shown in the schema for the meta key.
		'single'        => true, // Return a single value of the type. Default: false.
		'show_in_rest'    => true, // Show in the WP REST API response. Default: false.
		'supports' => [
			'custom-fields'
		],
	);

	register_meta('post', 'grupo', $argsGrupo);
	register_meta('post', 'titulo', $argsTitulo);
	register_meta('post', 'descricao', $argsDescricao);
	register_meta('post', 'priorizar', $argsPriorizar);
	register_meta('post', 'excluir_mapa', $argsExcluirMapa);
}

adicionar_meta();

// Aumenta limite de páginas buscadas
function aumentar_per_page( $params ) {
	$limitePaginas = 200;

	if ( isset( $params ) AND isset( $params[ 'per_page' ] ) ) {
		$params[ 'per_page' ][ 'maximum' ] = $limitePaginas;
	}

	return $params;
}

add_filter( 'rest_page_collection_params', 'aumentar_per_page' );

// Inserção do arquivo SVG dentro do HTML, para permitir
// alteração dos atributos e estilização
function carregar_svg( $filename ) {
	$arquivo = PATH_SVG . $filename;

	// Permitir apenas URLs relativas
	if ( str_contains( $filename, '/' ) || str_contains( $filename, '\\' ) ) {
		if( str_starts_with( $filename, '/' ) || str_starts_with( $filename, '\\' ) ) {
			$arquivo = ABSPATH . mb_substr($filename, 1);
		} else {
			return '';
		}
	}	

	if ( file_exists( $arquivo ) ) {
		return file_get_contents( $arquivo );
	}

	return '';
}

// Utilizar shortcode para exibir ícones SVG nos rótulos dos menus
if ( ! has_filter( 'wp_nav_menu', 'do_shortcode' ) ) {
    add_filter( 'wp_nav_menu', 'shortcode_unautop' );
    add_filter( 'wp_nav_menu', 'do_shortcode', 11 );
}

add_shortcode( 'icone', 'shortcode_icone' );

function shortcode_icone ( $atts ) {
	$arquivo = $atts['svg'] . '.svg';
	return carregar_svg( $arquivo );
}
