<?php
/**
 * Handle Dynamic Assets
 *
 * @package Builder
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class ET_Dynamic_Assets
 */
class ET_Dynamic_Assets {

	/**
	 * Hold the class instance.
	 *
	 * @var null
	 */
	private static $_instance = null;

	/**
	 * Is the current request cachable.
	 *
	 * @var null
	 */
	private static $_is_cachable_request = null;

	/**
	 * TB template ids.
	 *
	 * @var array
	 */
	private $_tb_template_ids = array();

	/**
	 * Post ID.
	 *
	 * @var null
	 */
	private $_post_id = null;

	/**
	 * Object ID.
	 *
	 * @var null
	 */
	private $_object_id = null;

	/**
	 * Post content.
	 *
	 * @var null
	 */
	private $_post_content = null;

	/**
	 * All content.
	 *
	 * @var null
	 */
	private $_all_content = null;

	/**
	 * Folder Name.
	 *
	 * @var null
	 */
	private $_folder_name = null;

	/**
	 * Cache Directory Path.
	 *
	 * @var null
	 */
	private $_cache_dir_path = null;

	/**
	 * Cache Directory URL.
	 *
	 * @var null
	 */
	private $_cache_dir_url = null;

	/**
	 * Product directory.
	 *
	 * @var null
	 */
	private $_product_dir = null;

	/**
	 * `style.css` handle of the Theme.
	 *
	 * @var string
	 */
	public $theme_style_css_handle = '';

	/**
	 * Resource owners.
	 *
	 * @var string[]
	 */
	private $_owners = array(
		'divi',
		'extra',
		'builder',
	);

	/**
	 * Resource owner.
	 *
	 * @var null
	 */
	private $_owner = null;

	/**
	 * Suffix used for files on custom post types.
	 *
	 * @var null
	 */
	private $_cpt_suffix = null;

	/**
	 * Check if RTL is used.
	 *
	 * @var bool
	 */
	public $is_rtl = false;

	/**
	 * Suffix used for files on RTL websites.
	 *
	 * @var null
	 */
	private $_rtl_suffix = null;

	/**
	 * Assets for all shortcode modules.
	 *
	 * @var null
	 */
	public $module_shortcode_assets = null;

	/**
	 * Cached list of shortcodes saved in post meta.
	 *
	 * @var array
	 */
	private $_early_shortcodes = array();

	/**
	 * Cached list of attributes saved in post meta.
	 *
	 * @var array
	 */
	private $_early_attributes = array();

	/**
	 * List of shortcodes to process for data collection.
	 *
	 * @var array
	 */
	private $_processed_shortcodes = array();

	/**
	 * Missed shortcodes detected by late detection.
	 *
	 * @var array
	 */
	private $_missed_shortcodes = array();

	/**
	 * All shortcodes.
	 *
	 * @var array
	 */
	private $_all_shortcodes = array();

	/**
	 * Check whether to use late detection mechanism in other areas.
	 *
	 * @var bool
	 */
	private $_need_late_generation = false;

	/**
	 * Keep track of processed files.
	 *
	 * @var array
	 */
	private $_processed_files = array();

	/**
	 * Is page builder used.
	 *
	 * @var array
	 */
	private $_page_builder_used = false;

	/**
	 * Whether animations are found during late detection.
	 *
	 * @var string
	 */
	private $_late_animation_style = '';

	/**
	 * Whether custom gutters are found during late detection.
	 *
	 * @var array
	 */
	private $_late_custom_gutters = array();

	/**
	 * Gutter widths found during late detection.
	 *
	 * @var array
	 */
	private $_late_gutter_width = array();

	/**
	 * Whether parallax is found during late detection.
	 *
	 * @var bool
	 */
	private $_late_use_parallax = false;

	/**
	 * Whether specialty sections are found during late detection.
	 *
	 * @var bool
	 */
	private $_late_use_specialty = false;

	/**
	 * Whether sticky options are found during late detection.
	 *
	 * @var bool
	 */
	private $_late_use_sticky = false;

	/**
	 * Whether motion effects are found during late detection.
	 *
	 * @var bool
	 */
	private $_late_use_motion_effect = false;

	/**
	 * Whether fullwidth sections are found during late detection.
	 *
	 * @var bool
	 */
	private $_late_is_fullwidth = false;

	/**
	 * Whether custom icons are found during late detection.
	 *
	 * @var bool
	 */
	private $_late_custom_icon = false;

	/**
	 * Whether lightbox use is found during late detection.
	 *
	 * @var bool
	 */
	private $_late_show_in_lightbox = false;

	/**
	 * Whether blog modules set to 'show content' are found during late detection.
	 *
	 * @var bool
	 */
	private $_late_show_content = false;

	/**
	 * Whether fitvids should be enqueued.
	 *
	 * @var array
	 */
	private $_enqueue_fitvids = array();

	/**
	 * Whether comments should be enqueued.
	 *
	 * @var array
	 */
	private $_enqueue_comments = array();

	/**
	 * Whether jquery mobile should be enqueued.
	 *
	 * @var array
	 */
	private $_enqueue_jquery_mobile = array();

	/**
	 * Whether jquery hashchange should be enqueued.
	 *
	 * @var array
	 */
	private $_enqueue_jquery_hashchange = array();

	/**
	 * Whether magnific popup should be enqueued.
	 *
	 * @var array
	 */
	private $_enqueue_magnific_popup = array();

	/**
	 * Whether easy pie chart should be enqueued.
	 *
	 * @var array
	 */
	private $_enqueue_easypiechart = array();

	/**
	 * Whether salvattore should be enqueued.
	 *
	 * @var array
	 */
	private $_enqueue_salvattore = array();

	/**
	 * Whether motion effects scrtipts should be enqueued.
	 *
	 * @var array
	 */
	private $_enqueue_motion_effecs = array();

	/**
	 * Whether sticky scripts should be enqueued.
	 *
	 * @var array
	 */
	private $_enqueue_sticky = array();

	/**
	 * Used global modules.
	 *
	 * @var array
	 */
	private $_global_modules = array();

	/**
	 * Used builder global presets.
	 *
	 * @var array
	 */
	private $_presets_attributes = array();

	/**
	 * Dynamic Enqueued Assets list.
	 *
	 * @var null
	 */
	private $_enqueued_assets = array();

	/**
	 * Constructor
	 */
	private function __construct() {
		$this->ensure_cache_directory_exists();
		$this->init_hooks();
	}

	/**
	 * Ensure cache directory exists.
	 */
	public function ensure_cache_directory_exists() {
		// Create the base cache directory, if not exists already.
		$cache_dir = et_core_cache_dir()->path;

		et_()->ensure_directory_exists( $cache_dir );
	}

	/**
	 * Initialize ET_Dynamic_Assets class.
	 */
	public static function init() {
		if ( null === self::$_instance ) {
			self::$_instance = new ET_Dynamic_Assets();
		}

		return self::$_instance;
	}

	/**
	 * Init hooks.
	 */
	public function init_hooks() {
		add_action( 'wp', array( $this, 'initial_setup' ), 999 );

		// Enqueue early assets.
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_dynamic_assets' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_dynamic_scripts_early' ) );

		// Enqueue scripts and generate assets if late shortcodes or attributes are detected.
		add_action( 'wp_footer', array( $this, 'process_late_detection_and_output' ) );
		add_action( 'wp_footer', array( $this, 'enqueue_dynamic_scripts_late' ) );

		// Add script that loads fallback .css during blog module ajax pagination.
		add_action( 'wp_footer', array( $this, 'maybe_inject_fallback_dynamic_assets' ) );
		// If a late file was generated, we grab it in the footer and then inject it into the header.
		add_action( 'et_dynamic_late_assets_generated', array( $this, 'maybe_inject_late_dynamic_assets' ), 0 );
	}

	/**
	 * Initial setup.
	 */
	public function initial_setup() {
		// Don't do anything if it's not needed.
		if ( ! $this->should_initiate() ) {
			return;
		}

		global $post;

		if ( $this->is_taxonomy() ) {
			$this->_object_id = intval( get_queried_object()->term_id );
		} elseif ( ! empty( $post->ID ) ) {
			$this->_object_id = intval( $post->ID );
		} elseif ( is_search() ) {
			$this->_object_id = -1;
		}

		$this->_folder_name = $this->get_folder_name();

		// Don't process Dynamic CSS logic if it's not needed or can't be processed.
		if ( ! $this->is_cachable_request() ) {
			return;
		}

		$this->_post_id           = ! empty( $post ) ? intval( $post->ID ) : -1;
		$this->_tb_template_ids   = $this->get_theme_builder_template_ids();
		$this->_post_content      = ! empty( $post ) ? $post->post_content : '';
		$this->_all_content       = $this->get_all_content();
		$this->_cache_dir_path    = et_core_cache_dir()->path;
		$this->_cache_dir_url     = et_core_cache_dir()->url;
		$this->_product_dir       = et_is_builder_plugin_active() ? ET_BUILDER_PLUGIN_URI : get_template_directory_uri();
		$this->_cpt_suffix        = et_builder_post_is_of_custom_post_type( $this->_post_id ) && et_pb_is_pagebuilder_used( $this->_post_id ) && ! et_is_builder_plugin_active() ? '_cpt' : '';
		$this->is_rtl             = is_rtl();
		$this->_rtl_suffix        = $this->is_rtl ? '_rtl' : '';
		$this->_page_builder_used = is_singular() ? et_pb_is_pagebuilder_used( $this->_post_id ) : false;

		// Create asset directory, if it does not exist.
		$ds       = DIRECTORY_SEPARATOR;
		$file_dir = "{$this->_cache_dir_path}{$ds}{$this->_folder_name}{$ds}";

		et_()->ensure_directory_exists( $file_dir );

		// If cached shortcodes exist, grab them from the post meta.
		if ( $this->metadata_exists( '_et_dynamic_cached_shortcodes' ) ) {
			$this->_early_shortcodes = $this->metadata_get( '_et_dynamic_cached_shortcodes' );
		}

		// If cached attributes exist, grab them from the post meta.
		if ( $this->metadata_exists( '_et_dynamic_cached_attributes' ) ) {
			$this->_early_attributes = $this->metadata_get( '_et_dynamic_cached_attributes' );
		}

		// If there are no cached shortcodes, parse the post content to retrieve used shortcodes.
		if ( empty( $this->_early_shortcodes ) ) {
			$this->_early_shortcodes = $this->get_early_shortcodes( $this->_all_content );

			// Cache the found shortcodes in post meta.
			$this->metadata_set( '_et_dynamic_cached_shortcodes', $this->_early_shortcodes );

		}

		// If dynamic asset files do not exist, generate them.
		$files = (array) glob( "{$this->_cache_dir_path}/{$this->_folder_name}/et*-dynamic*" );

		if ( empty( $files ) ) {
			$this->generate_dynamic_assets();
		}
	}

	/**
	 * Check if current page is a taxonomy page.
	 *
	 * @return boolean
	 * @since 4.10.0
	 */
	public function is_taxonomy() {
		return is_tax() || is_category() || is_tag();
	}

	/**
	 * Get cache directory name for the current page.
	 *
	 * @return string
	 * @since 4.10.0
	 */
	public function get_folder_name() {
		$folder_name = $this->_object_id;

		if ( $this->is_taxonomy() ) {
			$queried     = get_queried_object();
			$taxonomy    = sanitize_key( $queried->taxonomy );
			$folder_name = "{$taxonomy}/" . $this->_object_id;
		} elseif ( is_search() ) {
			$folder_name = 'search';
		} elseif ( is_author() ) {
			$author_id   = intval( get_queried_object_id() );
			$folder_name = "author/{$author_id}";
		} elseif ( is_archive() ) {
			$folder_name = 'archive';
		} elseif ( is_home() ) {
			$folder_name = 'home';
		} elseif ( is_404() ) {
			$folder_name = 'notfound';
		}

		return $folder_name;
	}

	/**
	 * Get dynamic assets of a page.
	 *
	 * @return array|void
	 * @since 4.10.0
	 */
	public function get_dynamic_assets_files() {
		if ( ! $this->is_cachable_request() ) {
			return;
		}

		$dynamic_assets_files = array();

		$files = (array) glob( "{$this->_cache_dir_path}/{$this->_folder_name}/et*-dynamic*" );

		if ( empty( $files ) ) {
			return array();
		}

		foreach ( $files as $file ) {
			$file_path              = et_()->normalize_path( $file );
			$dynamic_assets_files[] = et_()->path( $this->_cache_dir_url, $this->_folder_name, basename( $file_path ) );
		}

		return $dynamic_assets_files;
	}

	/**
	 * Check to see if Dynamic Assets ia applicable to current page request.
	 *
	 * @return bool.
	 * @since 4.10.0
	 */
	public function is_cachable_request() {
		if ( is_null( self::$_is_cachable_request ) ) {
			self::$_is_cachable_request = true;

			// Bail if the request is invalid.
			if ( ! self::_is_valid_request() ) {
				self::$_is_cachable_request = false;
				return self::$_is_cachable_request;
			}

			// Bail if this is not a front-end page request.
			if ( ! et_should_generate_dynamic_assets() ) {
				self::$_is_cachable_request = false;
				return self::$_is_cachable_request;
			}

			// Bail if Dynamic CSS is disabled.
			if ( ! et_use_dynamic_css() ) {
				self::$_is_cachable_request = false;
				return self::$_is_cachable_request;
			}

			// Bail if the page has no designated cache folder and is not cachable.
			if ( ! $this->_folder_name ) {
				self::$_is_cachable_request = false;
				return self::$_is_cachable_request;
			}
		}

		return self::$_is_cachable_request;
	}

	/**
	 * Check to see if we should initiate initial class logic.
	 *
	 * @return bool.
	 * @since 4.10.0
	 */
	public function should_initiate() {
		// Bail if this is not a front-end or builder page request.
		if ( ! et_builder_is_frontend_or_builder() ) {
			return false;
		}

		// Bail if Dynamic CSS and Dynamic JS are both disabled.
		if ( ! et_use_dynamic_css() && et_disable_js_on_demand() ) {
			return false;
		}

		return true;
	}

	/**
	 * Get the handle of current theme's style.css handle.
	 *
	 * @since 4.10.0
	 */
	public function get_style_css_handle() {
		global $shortname;

		$child_theme_suffix  = is_child_theme() ? '-parent' : '';
		$inline_style_suffix = et_core_is_inline_stylesheet_enabled() ? '-inline' : '';

		if ( 'divi' === $shortname ) {
			$product_prefix = 'divi-style';
		} elseif ( 'extra' === $shortname ) {
			$product_prefix = 'extra-style';
		} else {
			$product_prefix = 'divi-builder-style';
		}

		$handle = 'divi-builder-style' === $product_prefix . $inline_style_suffix ? $product_prefix : $product_prefix . $child_theme_suffix . $inline_style_suffix;

		return $handle;
	}

	/**
	 * Enqueues the assets needed for the modules that are present on the page.
	 *
	 * @since 4.10.0
	 */
	public function enqueue_dynamic_assets() {
		$dynamic_assets = $this->get_dynamic_assets_files();

		if ( empty( $dynamic_assets ) || ! et_use_dynamic_css() ) {
			return;
		}

		$body = [];
		$head = [];

		$base_url  = et_core_cache_dir()->url;
		$base_path = et_core_cache_dir()->path;

		foreach ( $dynamic_assets as $dynamic_asset ) {
			global $shortname;

			// Ignore empty files.
			$abs_file = str_replace( $base_url, $base_path, $dynamic_asset );
			if ( 0 === et_()->WPFS()->size( $abs_file ) ) {
				continue;
			}

			$type     = pathinfo( wp_parse_url( $dynamic_asset, PHP_URL_PATH ), PATHINFO_EXTENSION );
			$filename = pathinfo( wp_parse_url( $dynamic_asset, PHP_URL_PATH ), PATHINFO_FILENAME );
			$filepath = et_()->path( $this->_cache_dir_path, $this->_folder_name, "{$filename}.{$type}" );

			// Bust PHP's stats cache for the resource file to ensure we get the latest timestamp.
			clearstatcache( true, $filepath );

			$filetime    = filemtime( $filepath );
			$version     = $filetime ? $filetime : ET_BUILDER_PRODUCT_VERSION;
			$is_late     = false !== strpos( $filename, 'late' );
			$is_critical = false !== strpos( $filename, 'critical' );
			$is_css      = 'css' === $type;
			$late_slug   = true === $is_late ? '-late' : '';

			if ( 'divi' === $shortname ) {
				$style_prefix = 'divi';
			} elseif ( 'extra' === $shortname ) {
				$style_prefix = 'extra';
			} else {
				$style_prefix = 'divi-builder';
			}

			$deps   = array( $this->get_style_css_handle() );
			$handle = $style_prefix . '-dynamic' . $late_slug;

			if ( wp_style_is( $handle ) ) {
				continue;
			}

			$in_footer = false !== strpos( $dynamic_asset, 'footer' );

			$asset = (object) [
				'type'      => $type,
				'src'       => $dynamic_asset,
				'deps'      => $deps,
				'in_footer' => $is_css ? 'all' : $in_footer,
			];

			if ( $is_critical ) {
				$body[ $handle ] = $asset;
			} else {
				$head[ $handle ] = $asset;
			}
		}

		$css_handle = '';

		// enqueue head styles.
		foreach ( $head as $handle => $asset ) {
			$is_css           = 'css' === $asset->type;
			$enqueue_function = $is_css ? 'wp_enqueue_style' : 'wp_enqueue_script';
			$css_handle       = $is_css ? $handle : $css_handle;

			$enqueue_function(
				$handle,
				$asset->src,
				$asset->deps,
				$version,
				$asset->in_footer
			);
		}

		if ( ! empty( $body ) ) {
			$this->_enqueued_assets = (object) [
				'head' => $head,
				'body' => $body,
			];

			$cache_dir = et_core_cache_dir();
			$path      = $cache_dir->path;
			$url       = $cache_dir->url;
			$styles    = '';

			foreach ( $this->_enqueued_assets->body as $handle => $asset ) {
				$file    = str_replace( $url, $path, $asset->src );
				$styles .= et_()->WPFS()->get_contents( $file );
			}

			if ( empty( $css_handle ) ) {
				// If no Dynamic CSS file was enqued, append the critical CSS to the last enqueued stylesheet.
				global $wp_styles;
				$css_handle = end( $wp_styles->queue );
			}

			wp_add_inline_style( $css_handle, $styles );
			add_filter( 'style_loader_tag', [ $this, 'defer_head_style' ], 10, 4 );
		}
	}

	/**
	 * Print deferred styles in the head.
	 *
	 * @since 4.10.0
	 *
	 * @param string $tag    The link tag for the enqueued style.
	 * @param string $handle The style's registered handle.
	 * @param string $href   The stylesheet's source URL.
	 * @param string $media  The stylesheet's media attribute.
	 *
	 * @return string
	 */
	public function defer_head_style( $tag, $handle, $href, $media ) {
		if ( empty( $this->_enqueued_assets->head[ $handle ] ) ) {
			// Ignore assets not enqueued by this class.
			return $tag;
		}

		return sprintf(
			"<link rel='preload' id='%s-css' href='%s' as='style' media='%s' onload=\"%s\" />\n",
			$handle,
			$href,
			$media,
			"this.onload=null;this.rel='stylesheet'"
		);
	}

	/**
	 * Generates asset files to be combined on the front-end.
	 *
	 * @param array  $assets_data Assets Data.
	 * @param string $suffix      Additional file name suffix.
	 *
	 * @return void
	 * @since 4.10.0
	 */
	public function generate_dynamic_assets_files( $assets_data = array(), $suffix = '' ) {
		global $wp_filesystem;

		if ( ! $this->is_cachable_request() ) {
			return;
		}

		$tb_ids                  = '';
		$current_tb_template_ids = $this->_tb_template_ids;
		$late_suffix             = '';
		$file_contents           = '';

		if ( $this->_need_late_generation ) {
			$late_suffix = '-late';
		}

		if ( ! empty( $current_tb_template_ids ) ) {
			foreach ( $current_tb_template_ids as $key => $value ) {
				$current_tb_template_ids[ $key ] = 'tb-' . $value;
			}
			$tb_ids = '-' . implode( '-', $current_tb_template_ids );
		}

		$ds            = DIRECTORY_SEPARATOR;
		$file_dir      = "{$this->_cache_dir_path}{$ds}{$this->_folder_name}{$ds}";
		$maybe_post_id = is_singular() ? '-' . $this->_post_id : '';
		$suffix        = empty( $suffix ) ? '' : "-{$suffix}";
		$file_name     = "et-{$this->_owner}-dynamic{$tb_ids}{$maybe_post_id}{$late_suffix}{$suffix}.css";
		$file_path     = et_()->normalize_path( "{$file_dir}{$file_name}" );
		$lock_file     = wp_tempnam( $file_name );

		// Iterate over all the asset data to generate dynamic asset files.
		foreach ( $assets_data as $file_type => $data ) {
			$file_contents .= implode( "\n", array_unique( $data['content'] ) );
		}

		if ( file_exists( $file_path ) ) {
			return;
		}

		// Try to create a temporary directory which we'll use as a pseudo file lock.
		if ( file_exists( $lock_file ) ) {
			$wp_filesystem->put_contents( $lock_file, '' );

			// Create the static resource file.
			$asset_created = $wp_filesystem->put_contents( $file_path, $file_contents, FS_CHMOD_FILE );

			if ( ! $asset_created ) {
				// There's no point in continuing.
				return;
			} else {
				// Remove the temporary file.
				unlink( $lock_file );
			}
		}
	}

	/**
	 * Inject fallback assets when needed.
	 * We don't know what content might appear on blog module pagination.
	 * Fallback .css is injected on these pages.
	 *
	 * @return void
	 * @since 4.10.0
	 */
	public function maybe_inject_fallback_dynamic_assets() {
		if ( ! $this->is_cachable_request() ) {
			return;
		}

		preg_match_all( '/show_content="\w+"/', $this->_all_content, $show_content_values );

		$show_content = et_check_if_particular_value_is_on( $show_content_values[0] ) || $this->_late_show_content;

		if ( in_array( 'et_pb_blog', $this->_all_shortcodes, true ) && $show_content ) {
			$assets_path   = et_get_dynamic_assets_path( true );
			$fallback_file = "{$assets_path}/css/_fallback{$this->_cpt_suffix}{$this->_rtl_suffix}.css";

			// Inject the fallback assets into `<head>`.
			?>
		<script type="application/javascript">
			(function() {
				var fallback_styles = <?php echo wp_json_encode( $fallback_file ); ?>;
				var pagination_link = document.querySelector('.et_pb_ajax_pagination_container .wp-pagenavi a,.et_pb_ajax_pagination_container .pagination a');

				if (pagination_link && fallback_styles.length) {
					pagination_link.addEventListener('click', function (event) {
						if (0===document.querySelectorAll('link[href="' + fallback_styles + '"]').length) {
							var link  = document.createElement('link');
							link.rel  = "stylesheet";
							link.id   = 'et-dynamic-fallback-css';
							link.href = fallback_styles;

							document.getElementsByTagName('head')[0].appendChild(link);
						}
					});
				}
			})();
		</script>
			<?php
		}
	}

	/**
	 * Inject late dynamic assets when needed.
	 * If late .css files exist, we need to grab them and
	 * inject them in the head.
	 *
	 * @return void
	 * @since 4.10.0
	 */
	public function maybe_inject_late_dynamic_assets() {
		if ( ! $this->is_cachable_request() ) {
			return;
		}

		$_owner              = 'all' === $this->_owner ? '*' : $this->_owner;
		$late_assets         = array();
		$late_files          = (array) glob( "{$this->_cache_dir_path}/{$this->_folder_name}/et-{$_owner}-dynamic*late*" );
		$style_handle        = $this->get_style_css_handle();
		$inline_style_suffix = et_core_is_inline_stylesheet_enabled() ? '-inline' : '';

		if ( ! empty( $late_files ) ) {
			foreach ( (array) $late_files as $file ) {
				$file_path       = et_()->normalize_path( $file );
				$late_asset_url  = esc_url_raw( et_()->path( $this->_cache_dir_url, $this->_folder_name, basename( $file_path ) ) );
				$late_asset_size = filesize( $file_path );

				if ( $late_asset_size ) {
					array_push( $late_assets, $late_asset_url );
				}
			}
		}

		// Don't inject empty files.
		if ( ! $late_assets ) {
			return;
		}

		// Inject the late assets into `<head>`.
		?>
		<script type="application/javascript">
			(function() {
				var file     = <?php echo wp_json_encode( $late_assets ); ?>;
				var handle   = document.getElementById('<?php echo esc_html( $style_handle . $inline_style_suffix . '-css' ); ?>');
				var location = handle.parentNode;

				if (0===document.querySelectorAll('link[href="' + file + '"]').length) {
					var link  = document.createElement('link');
					link.rel  = 'stylesheet';
					link.id   = 'et-dynamic-late-css';
					link.href = file;

					location.insertBefore(link, handle.nextSibling);
				}
			})();
		</script>
		<?php
	}

	/**
	 * Merges global assets and shortcodes assets and
	 * sends the list to generate_dynamic_assets_files() for file generation.
	 *
	 * @return void
	 * @since 4.10.0
	 */
	public function generate_dynamic_assets() {
		if ( ! $this->is_cachable_request() ) {
			return;
		}

		$split_global_data = [];

		if ( $this->_need_late_generation ) {
			$this->_processed_shortcodes = $this->_missed_shortcodes;
			$global_assets_list          = $this->get_late_global_assets_list();
		} else {
			$this->_presets_attributes   = $this->get_preset_attributes( $this->_all_content );
			$this->_processed_shortcodes = $this->_early_shortcodes;
			$global_assets_list          = $this->get_global_assets_list();
			/**
			 * Filters the Above The Fold shortcodes.
			 *
			 * @since 4.10.0
			 *
			 * @param array $shortcodes Above The Fold shortcodes.
			 * @param string $content Theme Builder / Post Content.
			 */
			$atf_shortcodes = apply_filters( 'et_dynamic_assets_modules_atf', [], $this->_all_content );

			/**
			 * Filters whether Content can be split in Above The Fold / Below The Fold.
			 *
			 * @since 4.10.0
			 *
			 * @param bool|object $content Builder Post Types.
			 */
			$content = apply_filters( 'et_dynamic_assets_content', false );

			if ( false !== $content ) {
				$split_global_data = $this->split_global_assets_data( $content );
			}
		}

		$shortcode_assets_list = $this->get_shortcode_assets_list();
		if ( empty( $split_global_data ) ) {
			$assets_data = $this->get_assets_data( array_merge( $global_assets_list, $shortcode_assets_list ) );
			$this->generate_dynamic_assets_files( $assets_data );
		} else {
			$btf_shortcode_assets_list = $shortcode_assets_list;
			$atf_shortcode_assets_list = [];

			foreach ( $atf_shortcodes as $shortcode ) {
				if ( isset( $shortcode_assets_list[ $shortcode ] ) ) {
					$atf_shortcode_assets_list[ $shortcode ] = $shortcode_assets_list[ $shortcode ];
					unset( $btf_shortcode_assets_list[ $shortcode ] );
				}
			}

			$atf_assets_data = $this->get_assets_data( array_merge( $split_global_data->atf, $atf_shortcode_assets_list ) );
			// Gotta reset this or else `get_assets_data` not going to return the correct set...
			$this->_processed_files = [];
			$btf_assets_data        = $this->get_assets_data( array_merge( $split_global_data->btf, $btf_shortcode_assets_list ) );

			$this->generate_dynamic_assets_files( $atf_assets_data, 'critical' );
			$this->generate_dynamic_assets_files( $btf_assets_data );
		}
	}

	/**
	 * Generate late assets if needed.
	 *
	 * @since 4.10.0
	 */
	public function process_late_detection_and_output() {
		// Late detection.
		$this->get_late_shortcodes();
		$this->get_late_attributes();

		// Late assets determination.
		if ( $this->_need_late_generation ) {
			$this->generate_dynamic_assets();

			/**
			 * Fires after late detected assets are generated.
			 *
			 * @since 4.10.0
			 */
			do_action( 'et_dynamic_late_assets_generated' );
		}
	}

	/**
	 * Get shortcode assets data.
	 *
	 * @param array $asset_list Assets list.
	 *
	 * @return array
	 * @since 4.10.0
	 */
	public function get_assets_data( $asset_list = array() ) {
		global $wp_filesystem;

		$assets_data           = array();
		$newly_processed_files = array();
		$files_with_url        = array( 'signup', 'icons_base', 'icons_base_social', 'icons_all' );

		foreach ( $asset_list as $asset => $asset_data ) {
			foreach ( $asset_data as $file_type => $files ) {
				$files = (array) $files;

				foreach ( $files as $file ) {
					// Make sure same file's content is not loaded more than once.
					if ( in_array( $file, $this->_processed_files, true ) ) {
						continue;
					}

					array_push( $newly_processed_files, $file );

					$file_content = $wp_filesystem->get_contents( $file );

					if ( in_array( basename( $file, '.css' ), $files_with_url, true ) ) {
						$file_content = preg_replace( '/#dynamic-product-dir/i', $this->_product_dir, $file_content );
					}

					$file_content = trim( $file_content );

					if ( empty( $file_content ) ) {
						continue;
					}

					$assets_data[ $file_type ]['assets'][]  = $asset;
					$assets_data[ $file_type ]['content'][] = $file_content;

					if ( $this->is_rtl ) {
						$file_rtl = str_replace( ".${file_type}", "-rtl.{$file_type}", $file );

						if ( file_exists( $file_rtl ) ) {
							$file_content_rtl = $wp_filesystem->get_contents( $file_rtl );

							$assets_data[ $file_type ]['assets'][]  = "{$asset}-rtl";
							$assets_data[ $file_type ]['content'][] = $file_content_rtl;
						}
					}
				}
			}
		}

		$this->_processed_files = $this->get_unique_array_values( $this->_processed_files, $newly_processed_files );

		return $assets_data;
	}

	/**
	 * Gets a list of global asset files.
	 *
	 * @return array
	 * @since 4.10.0
	 */
	public function get_global_assets_list() {
		if ( ! $this->is_cachable_request() ) {
			return array();
		}

		$assets_prefix = et_get_dynamic_assets_path();
		$assets_list   = array();
		$dynamic_icons = et_use_dynamic_icons();

		// Load the icon font needed based on the icons being used.
		$use_all_icons = false;

		$social_icons_deps = array(
			'et_pb_social_media_follow',
			'et_pb_team_member',
		);

		$use_social_icons = $this->check_for_dependency( $social_icons_deps, $this->_processed_shortcodes );

		if ( 'on' !== $dynamic_icons || $this->check_if_attribute_exits( 'icon', $this->_all_content ) ) {
			$use_all_icons = true;
		}

		if ( $use_all_icons ) {
			$assets_list['et_icons_all'] = array(
				'css' => "{$assets_prefix}/css/icons_all.css",
			);
		} elseif ( $use_social_icons ) {
			$assets_list['et_icons_social'] = array(
				'css' => "{$assets_prefix}/css/icons_base_social.css",
			);
		} else {
			$assets_list['et_icons_base'] = array(
				'css' => "{$assets_prefix}/css/icons_base.css",
			);
		}

		// Only include the following assets on post feeds and posts that aren't using the builder.
		if ( ( is_single() && ! $this->_page_builder_used ) || ( is_home() && ! is_front_page() ) || ! is_singular() ) {
			$assets_list['et_post_formats'] = array(
				'css' => array(
					"{$assets_prefix}/css/post_formats{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/slider_base{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/slider_controls{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/overlay{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/audio_player{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/video_player{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/wp_gallery{$this->_cpt_suffix}.css",
				),
			);
		}

		// Load posts styles on posts and post feeds.
		if ( ! is_page() ) {
			$assets_list['et_posts'] = array(
				'css' => "{$assets_prefix}/css/posts{$this->_cpt_suffix}.css",
			);
		}

		if ( $this->is_rtl ) {
			$assets_list['et_divi_shared_conditional_rtl'] = array(
				'css' => "{$assets_prefix}/css/shared-conditional-style{$this->_cpt_suffix}-rtl.css",
			);
		}

		// Check for custom gutter widths.
		preg_match_all( '/gutter_width="\w+"/', $this->_all_content, $matches );
		preg_match_all( '/specialty="\w+"/', $this->_all_content, $specialty_values );

		$page_custom_gutter = is_singular() ? intval( get_post_meta( $this->_post_id, '_et_pb_gutter_width', true ) ) : array();
		$customizer_gutter  = intval( et_get_option( 'gutter_width', '3' ) );
		$default_gutters    = array_merge( (array) $page_custom_gutter, (array) $customizer_gutter );
		$no_of_gutters      = substr_count( $this->_all_content, 'use_custom_gutter' );
		$preset_gutter_val  = ! empty( $this->_presets_attributes['use_custom_gutter'] ) && 'on' === $this->_presets_attributes['use_custom_gutter'] ?
								(array) $this->_presets_attributes['gutter_width'] : array();
		$specialty_used     = et_check_if_particular_value_is_on( $specialty_values[0] );

		if ( $no_of_gutters > count( $matches[0] ) && ! in_array( 'gutter_width="3"', $matches[0], true ) ) {
			array_push( $matches[0], 'gutter_width="3"' );
		}

		// Here we are combining the custom gutters in the page with Default gutters and then keeping only the unique gutters.
		$gutter_widths = $this->get_unique_array_values( et_get_content_gutter_widths( $matches[0] ), $default_gutters, $preset_gutter_val );
		$gutter_length = count( $gutter_widths );

		$grid_items_deps = array(
			'et_pb_filterable_portfolio',
			'et_pb_fullwidth_portfolio',
			'et_pb_portfolio',
			'et_pb_gallery',
			'et_pb_blog',
			'et_pb_sidebar',
			'et_pb_shop',
		);

		$grid_items_used = $this->check_for_dependency( $grid_items_deps, $this->_processed_shortcodes );

		if ( ! empty( $gutter_widths ) ) {
			$assets_list = array_merge( $assets_list, $this->get_gutters_asset_list( $gutter_length, $gutter_widths, $specialty_used, $grid_items_used ) );
		}

		// Load WooCommerce css when WooCommerce is active.
		if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
			$assets_list['et_divi_woocommerce_modules'] = array(
				'css' => array(
					"{$assets_prefix}/css/woocommerce{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/woocommerce_shared{$this->_cpt_suffix}.css",
				),
			);
		}

		// Load PageNavi css when PageNavi is active.
		if ( is_plugin_active( 'wp-pagenavi/wp-pagenavi.php' ) ) {
			$assets_list['et_divi_wp_pagenavi'] = array(
				'css' => "{$assets_prefix}/css/wp-page_navi{$this->_cpt_suffix}.css",
			);
		}

		$show_in_lightbox = $this->check_if_attribute_exits( 'show_in_lightbox', $this->_all_content );

		if ( $show_in_lightbox ) {
			$assets_list['et_jquery_magnific_popup'] = array(
				'css' => "{$assets_prefix}/css/magnific_popup.css",
			);
		}

		$has_animation_style = $this->check_if_attribute_exits( 'animation_style', $this->_all_content );

		// Load animation assets if any module uses animations.
		if ( $has_animation_style || in_array( 'et_pb_circle_counter', $this->_processed_shortcodes, true ) ) {
			$assets_list['animations'] = array(
				'css' => "{$assets_prefix}/css/animations{$this->_cpt_suffix}.css",
			);
		}

		$sticky_used = $this->check_if_attribute_exits( 'sticky_position', $this->_all_content );

		if ( $sticky_used ) {
			$assets_list['sticky'] = array(
				'css' => "{$assets_prefix}/css/sticky_elements{$this->_cpt_suffix}.css",
			);
		}

		/**
		 * Use this filter to add additional assets to the global asset list.
		 *
		 * @param array $asset_list Current global assets on the list.
		 *
		 * @since 4.10.0
		 */
		$assets_list = apply_filters( 'et_global_assets_list', $assets_list );

		return $assets_list;
	}

	/**
	 * Gets a list of global asset files during late detection.
	 *
	 * @return array
	 * @since 4.10.0
	 */
	public function get_late_global_assets_list() {
		if ( ! $this->is_cachable_request() ) {
			return array();
		}

		$assets_prefix   = et_get_dynamic_assets_path();
		$assets_list     = array();
		$grid_items_used = '';

		if ( $this->_late_custom_icon ) {
			$assets_list['et_icons_all'] = array(
				'css' => "{$assets_prefix}/css/icons_all.css",
			);
		}

		$gutter_length = count( $this->_late_custom_gutters );
		$gutter_widths = $this->get_unique_array_values( et_get_content_gutter_widths( $this->_late_gutter_width ) );

		$grid_items_deps = array(
			'et_pb_filterable_portfolio',
			'et_pb_fullwidth_portfolio',
			'et_pb_portfolio',
			'et_pb_gallery',
			'et_pb_blog',
			'et_pb_sidebar',
			'et_pb_shop',
		);

		$grid_items_used = $this->check_for_dependency( $grid_items_deps, $this->_processed_shortcodes );

		if ( ! empty( $gutter_widths ) ) {
			$assets_list = array_merge( $assets_list, $this->get_gutters_asset_list( $gutter_length, $gutter_widths, $this->_late_use_specialty, $grid_items_used ) );
		}

		if ( $this->_late_show_in_lightbox ) {
			$assets_list['et_jquery_magnific_popup'] = array(
				'css' => "{$assets_prefix}/css/magnific_popup.css",
			);
		}

		if ( $this->_late_animation_style ) {
			$assets_list['animations'] = array(
				'css' => "{$assets_prefix}/css/animations{$this->_cpt_suffix}.css",
			);
		}

		if ( $this->_late_use_sticky ) {
			$assets_list['sticky'] = array(
				'css' => "{$assets_prefix}/css/sticky_elements{$this->_cpt_suffix}.css",
			);
		}

		/**
		 * Use this filter to add additional assets to the late global asset list.
		 *
		 * @param array $asset_list Current late global assets on the list.
		 *
		 * @since 4.10.2
		 */
		$assets_list = apply_filters( 'et_late_global_assets_list', $assets_list );

		return $assets_list;
	}


	/**
	 * Generate gutters CSS file list.
	 *
	 * @param integer $gutter_length number of gutter widths used.
	 * @param array   $gutter_widths array of gutter widths used.
	 * @param bool    $specialty are specialty sections used.
	 * @param bool    $grid_items are grid modules used.
	 * @return array  $assets_list of gutter assets
	 * @since 4.10.0
	 */
	public function get_gutters_asset_list( $gutter_length, $gutter_widths, $specialty = false, $grid_items = false ) {
		$temp_widths      = $gutter_widths;
		$gutter_length    = count( $gutter_widths );
		$specialty_suffix = $specialty ? '_specialty' : '';
		$assets_prefix    = et_get_dynamic_assets_path();
		$assets_list      = array();

		// Put default gutter `3` at beginning, otherwise it would mess up the layout.
		if ( in_array( '3', $temp_widths, true ) ) {
			$gutter_widths = array_diff( $temp_widths, [ '3' ] );
			array_unshift( $gutter_widths, '3' );
		}

		for ( $i = 0; $i < $gutter_length; $i++ ) {
			$assets_list[ 'et_divi_gutters' . $gutter_widths[ $i ] ] = array(
				'css' => "{$assets_prefix}/css/gutters" . $gutter_widths[ $i ] . "{$this->_cpt_suffix}.css",
			);

			$assets_list[ 'et_divi_gutters' . $gutter_widths[ $i ] . "{$specialty_suffix}" ] = array(
				'css' => "{$assets_prefix}/css/gutters" . $gutter_widths[ $i ] . "{$specialty_suffix}{$this->_cpt_suffix}.css",
			);

			if ( $grid_items ) {
				$assets_list[ 'et_divi_gutters' . $gutter_widths[ $i ] . '_grid_items' ] = array(
					'css' => "{$assets_prefix}/css/gutters" . $gutter_widths[ $i ] . "_grid_items{$this->_cpt_suffix}.css",
				);

				$assets_list[ 'et_divi_gutters' . $gutter_widths[ $i ] . "{$specialty_suffix}_grid_items" ] = array(
					'css' => "{$assets_prefix}/css/gutters" . $gutter_widths[ $i ] . "{$specialty_suffix}_grid_items{$this->_cpt_suffix}.css",
				);
			}
		}

		return $assets_list;
	}

	/**
	 * Gets a list of asset files and can be useful for getting all Divi module shortcodes.
	 *
	 * @param bool $used_shortcodes if shortcodes are used.
	 *
	 * @return array
	 * @since 4.10.0
	 */
	public function get_shortcode_assets_list( $used_shortcodes = true ) {
		$assets_prefix    = et_get_dynamic_assets_path();
		$specialty_suffix = '';
		$shortcode_list   = array();

		preg_match_all( '/specialty="\w+"/', $this->_all_content, $specialty_values );

		$specialty_used = et_check_if_particular_value_is_on( $specialty_values[0] ) || $this->_late_use_specialty;

		if ( $specialty_used ) {
			$specialty_suffix = '_specialty';
		}

		$assets_list = array(
			// Structure elements.
			'et_pb_section'               => array(
				'css' => array(
					"{$assets_prefix}/css/section{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/row{$this->_cpt_suffix}.css",
					// Some fullwidth section modules use the et_pb_row class.
				),
			),
			'et_pb_row'                   => array(
				'css' => "{$assets_prefix}/css/row{$this->_cpt_suffix}.css",
			),
			'et_pb_column'                => array(),

			'et_pb_row_inner'             => array(
				'css' => "{$assets_prefix}/css/row{$this->_cpt_suffix}.css",
			),

			// Module elements.
			'et_pb_accordion'             => array(
				'css' => array(
					"{$assets_prefix}/css/accordion{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/toggle{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_audio'                 => array(
				'css' => array(
					"{$assets_prefix}/css/audio{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/audio_player{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_counter'               => array(
				'css' => "{$assets_prefix}/css/counter{$this->_cpt_suffix}.css",
			),
			'et_pb_blog'                  => array(
				'css' => array(
					"{$assets_prefix}/css/blog{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/posts{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/post_formats{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/overlay{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/audio_player{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/video_player{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/slider_base{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/slider_controls{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/wp_gallery{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_blurb'                 => array(
				'css' => array(
					"{$assets_prefix}/css/blurb{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/legacy_animations{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_button'                => array(
				'css' => "{$assets_prefix}/css/button{$this->_cpt_suffix}.css",
			),
			'et_pb_circle_counter'        => array(
				'css' => "{$assets_prefix}/css/circle_counter{$this->_cpt_suffix}.css",
			),
			'et_pb_code'                  => array(
				'css' => "{$assets_prefix}/css/code{$this->_cpt_suffix}.css",
			),
			'et_pb_comments'              => array(
				'css' => array(
					"{$assets_prefix}/css/comments{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/comments_shared{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_contact_form'          => array(
				'css' => array(
					"{$assets_prefix}/css/contact_form{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/forms{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/forms{$specialty_suffix}{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/fields{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_countdown_timer'       => array(
				'css' => "{$assets_prefix}/css/countdown_timer{$this->_cpt_suffix}.css",
			),
			'et_pb_cta'                   => array(
				'css' => "{$assets_prefix}/css/cta{$this->_cpt_suffix}.css",
			),
			'et_pb_divider'               => array(
				'css' => "{$assets_prefix}/css/divider{$this->_cpt_suffix}.css",
			),
			'et_pb_filterable_portfolio'  => array(
				'css' => array(
					"{$assets_prefix}/css/filterable_portfolio{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/portfolio{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/grid_items{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/overlay{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_fullwidth_code'        => array(
				'css' => "{$assets_prefix}/css/fullwidth_code{$this->_cpt_suffix}.css",
			),
			'et_pb_fullwidth_header'      => array(
				'css' => "{$assets_prefix}/css/fullwidth_header{$this->_cpt_suffix}.css",
			),
			'et_pb_fullwidth_image'       => array(
				'css' => array(
					"{$assets_prefix}/css/fullwidth_image{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/overlay{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_fullwidth_map'         => array(
				'css' => array(
					"{$assets_prefix}/css/map{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/fullwidth_map{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_fullwidth_menu'        => array(
				'css' => array(
					"{$assets_prefix}/css/menus{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/fullwidth_menu{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/header_animations.css",
					"{$assets_prefix}/css/header_shared{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_fullwidth_portfolio'   => array(
				'css' => array(
					"{$assets_prefix}/css/fullwidth_portfolio{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/grid_items{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/overlay{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/slider_controls{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_fullwidth_post_slider' => array(
				'css' => array(
					"{$assets_prefix}/css/post_slider{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/fullwidth_post_slider{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/slider_modules{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/slider_base{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/slider_controls{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/posts{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_fullwidth_post_title'  => array(
				'css' => array(
					"{$assets_prefix}/css/post_title{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/fullwidth_post_title{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_fullwidth_slider'      => array(
				'css' => array(
					"{$assets_prefix}/css/fullwidth_slider{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/slider_modules{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/slider_base{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/slider_controls{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_gallery'               => array(
				'css' => array(
					"{$assets_prefix}/css/gallery{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/overlay{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/grid_items{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/slider_base{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/slider_controls{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/magnific_popup.css",
				),
			),
			'gallery'                     => array(
				'css' => array(
					"{$assets_prefix}/css/wp_gallery{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/magnific_popup.css",
					"{$assets_prefix}/css/overlay{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_image'                 => array(
				'css' => array(
					"{$assets_prefix}/css/image{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/overlay{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_login'                 => array(
				'css' => array(
					"{$assets_prefix}/css/login{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/forms{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/forms{$specialty_suffix}{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/fields{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_map'                   => array(
				'css' => "{$assets_prefix}/css/map{$this->_cpt_suffix}.css",
			),
			'et_pb_menu'                  => array(
				'css' => array(
					"{$assets_prefix}/css/menu{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/menus{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/header_animations.css",
					"{$assets_prefix}/css/header_shared{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_number_counter'        => array(
				'css' => "{$assets_prefix}/css/number_counter{$this->_cpt_suffix}.css",
			),
			'et_pb_portfolio'             => array(
				'css' => array(
					"{$assets_prefix}/css/portfolio{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/grid_items{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/overlay{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_post_slider'           => array(
				'css' => array(
					"{$assets_prefix}/css/post_slider{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/posts{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/slider_modules{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/slider_base{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/slider_controls{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_post_nav'              => array(
				'css' => "{$assets_prefix}/css/post_nav{$this->_cpt_suffix}.css",
			),
			'et_pb_post_title'            => array(
				'css' => "{$assets_prefix}/css/post_title{$this->_cpt_suffix}.css",
			),
			'et_pb_pricing_tables'        => array(
				'css' => "{$assets_prefix}/css/pricing_tables{$this->_cpt_suffix}.css",
			),
			'et_pb_search'                => array(
				'css' => "{$assets_prefix}/css/search{$this->_cpt_suffix}.css",
			),
			'et_pb_shop'                  => array(
				'css' => array(
					"{$assets_prefix}/css/shop{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/overlay{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_sidebar'               => array(
				'css' => array(
					"{$assets_prefix}/css/sidebar{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/widgets_shared{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_signup'                => array(
				'css' => array(
					"{$assets_prefix}/css/signup{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/forms{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/forms{$specialty_suffix}{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/fields{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_slider'                => array(
				'css' => array(
					"{$assets_prefix}/css/slider{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/slider_modules{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/slider_base{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/slider_controls{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_social_media_follow'   => array(
				'css' => "{$assets_prefix}/css/social_media_follow{$this->_cpt_suffix}.css",
			),
			'et_pb_tabs'                  => array(
				'css' => "{$assets_prefix}/css/tabs{$this->_cpt_suffix}.css",
			),
			'et_pb_team_member'           => array(
				'css' => array(
					"{$assets_prefix}/css/team_member{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/legacy_animations{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_testimonial'           => array(
				'css' => "{$assets_prefix}/css/testimonial{$this->_cpt_suffix}.css",
			),
			'et_pb_text'                  => array(
				'css' => "{$assets_prefix}/css/text{$this->_cpt_suffix}.css",
			),
			'et_pb_toggle'                => array(
				'css' => "{$assets_prefix}/css/toggle{$this->_cpt_suffix}.css",
			),
			'et_pb_video'                 => array(
				'css' => array(
					"{$assets_prefix}/css/video{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/video_player{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_video_slider'          => array(
				'css' => array(
					"{$assets_prefix}/css/video_slider{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/video_player{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/slider_base{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/slider_controls{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_wc_additional_info'    => array(
				'css' => array(
					"{$assets_prefix}/css/woo_additional_info{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_wc_add_to_cart'        => array(
				'css' => array(
					"{$assets_prefix}/css/woo_add_to_cart{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_wc_breadcrumb'         => array(
				'css' => array(
					"{$assets_prefix}/css/woo_breadcrumb{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_wc_cart_notice'        => array(
				'css' => array(
					"{$assets_prefix}/css/woo_cart_notice{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_wc_description'        => array(
				'css' => array(
					"{$assets_prefix}/css/woo_description{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_wc_gallery'            => array(
				'css' => array(
					"{$assets_prefix}/css/gallery{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/overlay{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/slider_base{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/slider_controls{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_wc_images'             => array(
				'css' => array(
					"{$assets_prefix}/css/image{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/overlay{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/woo_images{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_wc_meta'               => array(
				'css' => array(
					"{$assets_prefix}/css/woo_meta{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_wc_price'              => array(
				'css' => array(
					"{$assets_prefix}/css/woo_price{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_wc_rating'             => array(
				'css' => array(
					"{$assets_prefix}/css/woo_rating{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_wc_related_products'   => array(
				'css' => array(
					"{$assets_prefix}/css/woo_related_products_upsells{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_wc_upsells'            => array(
				'css' => array(
					"{$assets_prefix}/css/woo_related_products_upsells{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_wc_reviews'            => array(
				'css' => array(
					"{$assets_prefix}/css/woo_reviews{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_wc_stock'              => array(
				'css' => array(
					"{$assets_prefix}/css/woo_stock{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_wc_tabs'               => array(
				'css' => array(
					"{$assets_prefix}/css/tabs{$this->_cpt_suffix}.css",
					"{$assets_prefix}/css/woo_tabs{$this->_cpt_suffix}.css",
				),
			),
			'et_pb_wc_title'              => array(
				'css' => array(
					"{$assets_prefix}/css/woo_title{$this->_cpt_suffix}.css",
				),
			),
		);

		/**
		 * This filter can be used to force loading of a certain Divi module in case their custom one relies on its styles.
		 *
		 * @since 4.10.0
		 */
		$required_assets = apply_filters(
			'et_required_module_assets',
			array()
		);

		if ( $used_shortcodes ) {
			foreach ( $assets_list as $asset => $asset_data ) {
				if ( ! in_array( $asset, $this->_processed_shortcodes, true ) && ! in_array( $asset, $required_assets, true ) ) {
					unset( $assets_list[ $asset ] );
				}
			}
		}

		return $assets_list;
	}

	/**
	 * Adds global modules' content (if any) on top of post content so that
	 * that all shortcodes can be properly registered.
	 *
	 * @param string $content The post content.
	 *
	 * @return string
	 * @since 4.10.0
	 */
	public function maybe_add_global_modules_content( $content ) {
		preg_match_all( '@global_module="(\d+)"@', $content, $matches );

		$global_modules = $this->get_unique_array_values( $matches[1], $this->_global_modules );

		// If there are no global modules `$matches[1]` would be an empty array.
		if ( ! empty( $global_modules ) ) {
			foreach ( $global_modules as $global_post_id ) {
				$global_module = get_post( $global_post_id );

				$content .= $global_module->post_content;
			}
		}

		return $content;
	}

	/**
	 * Early shortcode detection.
	 * Retrieves list of shortcodes from the post and theme builder content.
	 *
	 * @param string $content The post content.
	 *
	 * @return array
	 *
	 * @see strip_shortcodes() for used regex
	 *
	 * @since 4.10.0
	 */
	public function get_early_shortcodes( $content ) {
		$shortcodes        = array_keys( $this->get_shortcode_assets_list( false ) );
		$processed_content = $this->maybe_add_global_modules_content( $content );

		preg_match_all( '@\[([^<>&/\[\]\x00-\x20=]++)@', $processed_content, $matches );

		return array_intersect( $shortcodes, array_unique( $matches[1] ) );
	}

	/**
	 * Get the post IDs of active Theme Builder templates.
	 *
	 * @return array
	 * @since 4.10.0
	 */
	public function get_theme_builder_template_ids() {
		$tb_layouts   = et_theme_builder_get_template_layouts();
		$template_ids = array();

		// Extract layout ids used in current request.
		if ( ! empty( $tb_layouts ) ) {
			if ( $tb_layouts[ ET_THEME_BUILDER_HEADER_LAYOUT_POST_TYPE ]['override'] ) {
				if ( ! empty( $tb_layouts[ ET_THEME_BUILDER_HEADER_LAYOUT_POST_TYPE ]['enabled'] ) ) {
					$template_ids[] = intval( $tb_layouts[ ET_THEME_BUILDER_HEADER_LAYOUT_POST_TYPE ]['id'] );
				}
			}
			if ( $tb_layouts[ ET_THEME_BUILDER_BODY_LAYOUT_POST_TYPE ]['override'] ) {
				if ( ! empty( $tb_layouts[ ET_THEME_BUILDER_BODY_LAYOUT_POST_TYPE ]['enabled'] ) ) {
					$template_ids[] = intval( $tb_layouts[ ET_THEME_BUILDER_BODY_LAYOUT_POST_TYPE ]['id'] );
				}
			}
			if ( $tb_layouts[ ET_THEME_BUILDER_FOOTER_LAYOUT_POST_TYPE ]['override'] ) {
				if ( ! empty( $tb_layouts[ ET_THEME_BUILDER_FOOTER_LAYOUT_POST_TYPE ]['enabled'] ) ) {
					$template_ids[] = intval( $tb_layouts[ ET_THEME_BUILDER_FOOTER_LAYOUT_POST_TYPE ]['id'] );
				}
			}
		}

		return $template_ids;
	}

	/**
	 * Get post content from Theme Builder templates.
	 * Combine it with the post content from the current post.
	 *
	 * @return string
	 * @since 4.10.0
	 */
	public function get_all_content() {
		$all_content  = '';
		$tb_layouts   = et_theme_builder_get_template_layouts();
		$template_ids = [];

		if ( ! empty( $tb_layouts ) ) {
			if ( $tb_layouts[ ET_THEME_BUILDER_HEADER_LAYOUT_POST_TYPE ]['override'] ) {
				if ( ! empty( $tb_layouts[ ET_THEME_BUILDER_HEADER_LAYOUT_POST_TYPE ]['enabled'] ) ) {
					$template_ids[] = intval( $tb_layouts[ ET_THEME_BUILDER_HEADER_LAYOUT_POST_TYPE ]['id'] );
				}
			}

			if ( $tb_layouts[ ET_THEME_BUILDER_BODY_LAYOUT_POST_TYPE ]['override'] ) {
				if ( ! empty( $tb_layouts[ ET_THEME_BUILDER_BODY_LAYOUT_POST_TYPE ]['enabled'] ) ) {
					$template_ids[] = intval( $tb_layouts[ ET_THEME_BUILDER_BODY_LAYOUT_POST_TYPE ]['id'] );
				}
			}

			$template_ids[] = 'content';

			if ( $tb_layouts[ ET_THEME_BUILDER_FOOTER_LAYOUT_POST_TYPE ]['override'] ) {
				if ( ! empty( $tb_layouts[ ET_THEME_BUILDER_FOOTER_LAYOUT_POST_TYPE ]['enabled'] ) ) {
					$template_ids[] = intval( $tb_layouts[ ET_THEME_BUILDER_FOOTER_LAYOUT_POST_TYPE ]['id'] );
				}
			}
		}

		// Ensure post content is always present.
		$template_ids = empty( $template_ids ) ? [ 'content' ] : $template_ids;

		// $template_ids will be in the following order, (assuming each are present):
		// header, body, footer.
		// so, as we loop through them, were intentionally appending the
		// post content so that it's appended right after the body layout,
		// making the final order of the $all_content as follows:
		// header, body, post content, footer.
		foreach ( $template_ids as $key => $template_id ) {
			if ( 'content' === $template_id ) {
				$all_content .= $this->_post_content;
			} else {
				$template     = get_post( $template_id );
				$all_content .= $template->post_content;
			}
		}

		return $all_content;
	}

	/**
	 * Check if current request is valid.
	 *
	 * @return bool
	 * @since 4.10.0
	 */
	protected function _is_valid_request() {
		$is_valid          = false;
		$active_theme      = wp_get_theme()->get( 'Name' );
		$is_builder_active = et_is_builder_plugin_active();

		$parent_theme = wp_get_theme( get_template() )->get( 'Name' );

		if ( $is_builder_active
			|| in_array( strtolower( $active_theme ), $this->_owners, true )
			|| in_array( strtolower( $parent_theme ), $this->_owners, true ) ) {

			if ( $is_builder_active ) {
				$this->_owner = 'builder';
			} elseif ( $parent_theme ) {
				$this->_owner = strtolower( $parent_theme );
			} else {
				$this->_owner = strtolower( $active_theme );
			}

			$is_valid = true;
		}

		return $is_valid;
	}

	/**
	 * Merge multiple arrays and returns an array with unique values.
	 *
	 * @since 4.10.0
	 */
	public function get_unique_array_values() {
		$merged_array = array();

		foreach ( func_get_args() as $array_of_value ) {
			if ( empty( $array_of_value ) ) {
				continue;
			}

			$merged_array = array_merge( $merged_array, $array_of_value );
		}

		return array_values( array_unique( $merged_array ) );
	}

	/**
	 * Shortcode late detection.
	 * Get shortcodes from the feature manager that might have been missed
	 * during early detection.
	 *
	 * @param string $content Post content.
	 *
	 * @since 4.10.0
	 */
	public function get_late_shortcodes( $content = '' ) {
		$module_use_detection     = ET_Builder_Module_Use_Detection::instance();
		$late_shortcodes          = $module_use_detection->get_modules_used();
		$this->_missed_shortcodes = array_diff( $late_shortcodes, $this->_early_shortcodes );
		$this->_all_shortcodes    = array_merge( $this->_missed_shortcodes, $this->_early_shortcodes );

		if ( $this->_missed_shortcodes ) {
			$this->_need_late_generation = true;

			$this->metadata_set( '_et_dynamic_cached_shortcodes', $this->_all_shortcodes );
		}
	}

	/**
	 * Get module attributes used from the feature manager.
	 *
	 * @param array $detected_attributes Detected shortcode attributes.
	 *
	 * @since 4.10.0
	 */
	public function get_late_attributes( $detected_attributes = array() ) {
		$late_attributes = ET_Builder_Module_Use_Detection::instance()->get_module_attr_values_used();

		if ( empty( $this->_presets_attributes ) ) {
			$this->_presets_attributes = $this->get_preset_attributes( $this->_all_content );
		}

		$late_attributes = array_merge( $late_attributes, $this->_presets_attributes );

		if ( $this->_early_attributes !== $late_attributes ) {
			$this->_need_late_generation = true;

			$this->metadata_set( '_et_dynamic_cached_attributes', $late_attributes );
		}

		foreach ( $late_attributes as $attribute => $value ) {
			if ( ! is_array( $value ) ) {
				$value = (array) $value;
			}

			switch ( $attribute ) {
				case 'gutter_width':
					$this->_late_gutter_width = ! empty( $value ) ? $value : (array) 3;
					break;

				case 'animation_style':
					$this->_late_animation_style = ! empty( $value );
					break;

				case 'sticky_position':
					$this->_late_use_sticky = ! empty( $value );
					break;

				case 'specialty':
					$this->_late_use_specialty = ! empty( $value ) && in_array( 'on', $value, true );
					break;

				case 'use_custom_gutter':
					$this->_late_custom_gutters = ! empty( $value ) ? $value : array();
					break;

				case 'font_icon':
				case 'button_icon': // Intentional fallthrough.
				case 'hover_icon': // Intentional fallthrough.
				case 'scroll_down_icon': // Intentional fallthrough.
					$this->_late_custom_icon = ! empty( $value );
					break;

				case 'show_in_lightbox':
					$this->_late_show_in_lightbox = ! empty( $value ) && in_array( 'on', $value, true );
					break;

				case 'fullwidth':
					$this->_late_is_fullwidth = ! empty( $value ) && in_array( 'on', $value, true );
					break;

				case 'show_content':
					$this->_late_show_content = ! empty( $value ) && in_array( 'on', $value, true );
					break;

				case 'scroll_vertical_motion_enable':
				case 'scroll_horizontal_motion_enable': // Intentional fallthrough.
				case 'scroll_fade_enable': // Intentional fallthrough.
				case 'scroll_scaling_enable': // Intentional fallthrough.
				case 'scroll_rotating_enable': // Intentional fallthrough.
				case 'scroll_blur_enable': // Intentional fallthrough.
					$this->_late_use_motion_effect = ! empty( $value );
					break;

				default:
					break;
			}
		}
	}

	/**
	 * Check if metadata exists.
	 *
	 * @param string $key Meta key to check against.
	 *
	 * @return boolean
	 * @since 4.10.0
	 */
	public function metadata_exists( $key ) {
		if ( is_singular() ) {
			return metadata_exists( 'post', $this->_post_id, $key );
		}

		$folder_name      = $this->get_folder_name();
		$metadata_manager = ET_Builder_Dynamic_Assets_Feature::instance();
		$metadata_cache   = $metadata_manager->cache_get( $key, $folder_name );

		return ! empty( $metadata_cache );
	}

	/**
	 * Get saved metadata.
	 *
	 * @param string $key Meta key to get data for.
	 *
	 * @return array
	 * @since 4.10.0
	 */
	public function metadata_get( $key ) {
		if ( is_singular() ) {
			return metadata_exists( 'post', $this->_post_id, $key ) ? get_post_meta( $this->_post_id, $key, true ) : '';
		}

		$folder_name      = $this->get_folder_name();
		$metadata_manager = ET_Builder_Dynamic_Assets_Feature::instance();

		return $metadata_manager->cache_get( $key, $folder_name );
	}

	/**
	 * Set metadata.
	 *
	 * @param string $key Meta key to set data for.
	 * @param array  $value The data to be set.
	 *
	 * @return void
	 * @since 4.10.0
	 */
	public function metadata_set( $key, $value ) {
		if ( is_singular() ) {
			update_post_meta( $this->_post_id, $key, $value );
			return;
		}

		$folder_name      = $this->get_folder_name();
		$metadata_manager = ET_Builder_Dynamic_Assets_Feature::instance();

		$metadata_manager->cache_set( $key, $value, $folder_name );
	}

	/**
	 * Checks if a list of dependencies exist in the content.
	 *
	 * @param array $needles  Shortcodes to detect.
	 * @param array $haystack All shortcodes.
	 *
	 * @since 4.10.0
	 */
	public function check_for_dependency( $needles = array(), $haystack = array() ) {
		$detected = false;

		foreach ( $needles as $needle ) {
			if ( in_array( $needle, $haystack, true ) ) {
				$detected = true;
			}
		}

		return $detected;
	}

	/**
	 * Enqueue early dynamic JavaScript files.
	 *
	 * @since 4.10.0
	 */
	public function enqueue_dynamic_scripts_early() {
		$this->enqueue_dynamic_scripts();
	}

	/**
	 * Enqueue late dynamic JavaScript files.
	 *
	 * @since 4.10.0
	 */
	public function enqueue_dynamic_scripts_late() {
		$this->enqueue_dynamic_scripts( 'late' );
	}

	/**
	 * Enqueue dynamic JavaScript files.
	 *
	 * @param string $request_type whether early or late request.
	 *
	 * @since 4.10.0
	 */
	public function enqueue_dynamic_scripts( $request_type = 'early' ) {
		if ( ! et_builder_is_frontend_or_builder() ) {
			return;
		}

		$current_shortcodes = 'late' === $request_type ? $this->_missed_shortcodes : $this->_early_shortcodes;

		// Handle fitvids script.
		if ( ! $this->_enqueue_fitvids ) {
			$fitvids_deps = array(
				'et_pb_blog',
				'et_pb_slider',
				'et_pb_video',
				'et_pb_slide_video',
				'et_pb_menu',
				'et_pb_fullwidth_menu',
				'et_pb_code',
				'et_pb_fullwidth_code',
			);

			$this->_enqueue_fitvids = $this->check_for_dependency( $fitvids_deps, $current_shortcodes );

			if ( ( is_single() && ! $this->_page_builder_used ) || ( is_home() && ! is_front_page() ) || ! is_singular() ) {
				$this->_enqueue_fitvids = true;
			}

			if ( $this->_enqueue_fitvids || et_disable_js_on_demand() ) {
				wp_enqueue_script( 'fitvids', ET_BUILDER_URI . '/feature/dynamic-assets/assets/js/jquery.fitvids.js', array( 'jquery' ), ET_CORE_VERSION, true );
			}
		}

		// Handle comments script.
		if ( ! $this->_enqueue_comments ) {
			$comments_deps = array(
				'et_pb_comments',
			);

			$this->_enqueue_comments = $this->check_for_dependency( $comments_deps, $current_shortcodes );

			if ( $this->_enqueue_comments && comments_open() || et_disable_js_on_demand() ) {
				wp_enqueue_script( 'comment-reply' );
			}
		}

		// Handle jQuery mobile script.
		if ( ! $this->_enqueue_jquery_mobile ) {
			$jquery_mobile_deps = array(
				'et_pb_portfolio',
				'et_pb_slider',
				'et_pb_video_slider',
				'et_slide',
				'et_tabs',
			);

			$this->_enqueue_jquery_mobile = $this->check_for_dependency( $jquery_mobile_deps, $current_shortcodes );

			if ( $this->_enqueue_jquery_mobile || et_disable_js_on_demand() ) {
				wp_enqueue_script( 'jquery-mobile', ET_BUILDER_URI . '/feature/dynamic-assets/assets/js/jquery.mobile.js', array( 'jquery' ), ET_CORE_VERSION, true );
			}
		}

		// Handle jQuery hashchange script.
		if ( ! $this->_enqueue_jquery_hashchange ) {
			$jquery_hashchange_deps = array(
				'et_pb_gallery',
				'et_pb_fullwidth_header',
				'et_pb_filterable_portfolio',
				'et_pb_tabs',
			);

			$this->_enqueue_jquery_hashchange = $this->check_for_dependency( $jquery_hashchange_deps, $current_shortcodes );

			if ( $this->_enqueue_jquery_hashchange || et_disable_js_on_demand() ) {
				wp_enqueue_script( 'hashchange', ET_BUILDER_URI . '/feature/dynamic-assets/assets/js/hashchange.js', array( 'jquery' ), ET_CORE_VERSION, true );
			}
		}

		// Handle magnific popup script.
		if ( ! $this->_enqueue_magnific_popup ) {
			$magnific_popup_deps = array(
				'et_pb_gallery',
				'gallery',
				'et_pb_wc_gallery',
			);

			if (
				$this->check_for_dependency( $magnific_popup_deps, $current_shortcodes ) ||
				$this->check_if_attribute_exits( 'show_in_lightbox', $this->_all_content ) ||
				$this->_late_show_in_lightbox
			) {
				$this->_enqueue_magnific_popup = true;
			}

			if ( $this->_enqueue_magnific_popup || et_disable_js_on_demand() ) {
				wp_enqueue_script( 'magnific-popup', ET_BUILDER_URI . '/feature/dynamic-assets/assets/js/magnific-popup.js', array( 'jquery' ), ET_CORE_VERSION, true );
			}
		}

		// Handle easy pie chart script.
		if ( ! $this->_enqueue_easypiechart ) {
			$easypiechart_deps = array(
				'et_pb_blog',
				'et_pb_circle_counter',
				'et_pb_number_counter',
			);

			$this->_enqueue_easypiechart = $this->check_for_dependency( $easypiechart_deps, $current_shortcodes );

			if ( $this->_enqueue_easypiechart || et_disable_js_on_demand() ) {
				wp_enqueue_script( 'easypiechart', ET_BUILDER_URI . '/feature/dynamic-assets/assets/js/easypiechart.js', array( 'jquery' ), ET_CORE_VERSION, true );
			}
		}

		// Handle salvattore script.
		if ( ! $this->_enqueue_salvattore ) {
			$salvattore_deps = array(
				'et_pb_blog',
				'et_pb_portfolio',
				'et_pb_fullwidth_portfolio',
				'et_pb_filterable_portfolio',
				'et_pb_gallery',
			);

			$this->_enqueue_salvattore = $this->check_for_dependency( $salvattore_deps, $current_shortcodes );

			if ( $this->_enqueue_salvattore || et_disable_js_on_demand() ) {
				wp_enqueue_script( 'salvattore', ET_BUILDER_URI . '/feature/dynamic-assets/assets/js/salvattore.js', array(), ET_CORE_VERSION, true );
			}
		}

		// Motion Effects and Sticky Options mused be enqueued in wp_footer so that we have all localized data,
		// so we need to process these during late detection only.
		if ( 'late' === $request_type ) {
			// Handle motion effects script.
			$motion_effects_deps = array(
				'scroll_vertical_motion_enable',
				'scroll_horizontal_motion_enable',
				'scroll_fade_enable',
				'scroll_scaling_enable',
				'scroll_rotating_enable',
				'scroll_blur_enable',
			);

			foreach ( $motion_effects_deps as $motion_effects_dep ) {
				if ( $this->check_if_attribute_exits( $motion_effects_dep, $this->_all_content ) ) {
					$this->_enqueue_motion_effecs = true;
					break;
				}
			}

			if ( $this->_late_use_motion_effect ) {
				$this->_enqueue_motion_effecs = true;
			}

			if ( $this->_enqueue_motion_effecs || et_disable_js_on_demand() ) {
				wp_enqueue_script( 'et-builder-modules-script-motion', ET_BUILDER_URI . '/feature/dynamic-assets/assets/js/motion-effects.js', array( 'jquery' ), ET_CORE_VERSION, true );

				wp_localize_script(
					'et-builder-modules-script-motion',
					'et_pb_motion_elements',
					ET_Builder_Element::$_scroll_effects_fields
				);
			}

			// Handle sticky script.
			if ( $this->check_if_attribute_exits( 'sticky_position', $this->_all_content ) || $this->_late_use_sticky ) {
				$this->_enqueue_sticky = true;
			}

			if ( $this->_enqueue_sticky || et_disable_js_on_demand() ) {
				wp_enqueue_script( 'et-builder-modules-script-sticky', ET_BUILDER_URI . '/feature/dynamic-assets/assets/js/sticky-elements.js', array( 'jquery' ), ET_CORE_VERSION, true );

				wp_localize_script(
					'et-builder-modules-script-sticky',
					'et_pb_sticky_elements',
					ET_Builder_Element::$sticky_elements
				);
			}
		}
	}

	/**
	 * Get attributes from presets used within the $content.
	 *
	 * @param string $content content to look for preset ids in.
	 *
	 * @since 4.10.0
	 */
	public function get_preset_attributes( $content ) {
		preg_match_all( '/_module_preset="[a-z0-9][a-z0-9-]*[a-z0-9]"/', $content, $presets );

		$presets_ids         = et_get_non_default_preset_ids( $presets[0] );
		$all_builder_presets = et_get_option( 'builder_global_presets', (object) array(), '', true );
		$presets_attributes  = array();

		foreach ( $all_builder_presets as $module => $module_presets ) {
			foreach ( $module_presets->presets as $key => $value ) {
				if ( in_array( $key, $presets_ids, true ) ) {
					$presets_attributes = array_merge( $presets_attributes, (array) $value->settings );
				}
			}
		}

		return $presets_attributes;
	}

	/**
	 * Check for available attributes.
	 *
	 * @param string $attribute Attribute to check.
	 * @param string $content to search for attribute in.
	 *
	 * @since 4.10.0
	 */
	public function check_if_attribute_exits( $attribute, $content ) {
		$preset_attributes = array();

		if ( ! empty( $this->_presets_attributes ) ) {
			$preset_attributes = array_keys( $this->_presets_attributes );
		}

		return preg_match( '/' . $attribute . '=".+"/', $content ) || in_array( $attribute, $preset_attributes, true );
	}

	/**
	 * Get custom global asset list.
	 *
	 * @param string $content post content.
	 *
	 * @since 4.10.0
	 *
	 * @return array
	 */
	public function get_custom_global_assets_list( $content ) {
		// Save the current values of some properties.
		$all_content    = $this->_all_content;
		$all_shortcodes = $this->_all_shortcodes;

		if ( '' === $content ) {
			$this->_all_shortcodes = [];
		}

		// Since `get_global_assets_list` has no parameters, the only way to run it on custom content
		// is to change `_all_content` and `_all_shortcodes`. The current values were previosly saved.
		// and will be restored right after the method call.
		$this->_all_content    = $content;
		$list                  = $this->get_global_assets_list();
		$this->_all_content    = $all_content;
		$this->_all_shortcodes = $all_shortcodes;

		return $list;
	}

	/**
	 * Get global assets data.
	 *
	 * @param string $content post content.
	 *
	 * @return array
	 *
	 * @since 4.10.0
	 */
	public function split_global_assets_data( $content ) {
		/**
		 * Filters whether Required Assets should be considered Above The Fold.
		 *
		 * @since 4.10.0
		 *
		 * @param bool $include Whether to consider Required Assets Above The Fold or not.
		 */
		$atf_includes_required = apply_filters( 'et_dynamic_assets_atf_includes_required', false );

		$required    = $atf_includes_required ? [] : array_keys( $this->get_custom_global_assets_list( '' ) );
		$content_atf = ! empty( $content->atf ) ? $content->atf : '';
		$atf         = $this->get_custom_global_assets_list( $content_atf );
		$all         = $this->get_global_assets_list();
		$assets      = $all;
		$has_btf     = ! empty( $content->btf );

		$atf = array_keys( $atf );
		$all = array_keys( $all );

		$icon_set   = false;
		$icons_sets = array(
			'et_icons_base',
			'et_icons_social',
			'et_icons_all',
		);

		foreach ( $icons_sets as $set ) {
			if ( in_array( $set, $all, true ) ) {
				$icon_set = $set;
				break;
			}
		}

		if ( false !== $icon_set ) {
			$replace = function ( $value ) use ( $icon_set, $icons_sets ) {
				return in_array( $value, $icons_sets, true ) ? $icon_set : $value;
			};
			$atf     = array_values( array_unique( array_map( $replace, $atf ) ) );
			if ( ! empty( $required ) ) {
				$required = array_values( array_unique( array_map( $replace, $required ) ) );
			}
		}

		if ( empty( $required ) ) {
			$atf = array_flip( $atf );
		} else {
			$atf = array_flip( array_diff( $atf, $required ) );
		}

		$atf_assets = [];
		$btf_assets = [];

		foreach ( $assets as $key => $asset ) {
			$has_css     = isset( $asset['css'] );
			$is_required = isset( $required[ $key ] );
			$is_atf      = isset( $atf[ $key ] );
			$is_atf      = $is_atf || ( $atf_includes_required && $is_required );
			$force_defer = $has_btf && isset( $asset['maybe_defer'] );

			// In order for a (global) asset to be considered Above The Fold:
			// 1.0 It needs to include a CSS section (some of the assets are JS only).
			// 2.0 It needs to be used in the ATF Content.
			// 2.1 Or is a required asset (as in always used, doesn't depends on content) and
			// required assets are considered ATF (configurable behaviour via WP filter)
			// 3.0 It needs not be marked as `maybe_defer`, which are basically required assets
			// that will be deferred if the page has Below The Fold Content.
			if ( $has_css && $is_atf && ! $force_defer ) {
				$atf_assets[ $key ]['css'] = $asset['css'];
				unset( $asset['css'] );
			}

			// Some assets are CSS only (no JS), hence if they considered ATF by the previous code
			// there will be nothing else to do for them when processing BTF Content.
			if ( ! empty( $asset ) ) {
				$btf_assets[ $key ] = $asset;
			}
		}

		return (object) [
			'atf' => $atf_assets,
			'btf' => $btf_assets,
		];
	}
}

ET_Dynamic_Assets::init();
