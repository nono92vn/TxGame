<?php

/**
 * Twenty Twenty-Four functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Twenty Twenty-Four
 * @since Twenty Twenty-Four 1.0
 */

/**
 * Register block styles.
 */

if (!function_exists('twentytwentyfour_block_styles')) :
    /**
     * Register custom block styles
     *
     * @since Twenty Twenty-Four 1.0
     * @return void
     */
    function twentytwentyfour_block_styles()
    {

        register_block_style(
            'core/details',
            array(
                'name'         => 'arrow-icon-details',
                'label'        => __('Arrow icon', 'twentytwentyfour'),
                /*
				 * Styles for the custom Arrow icon style of the Details block
				 */
                'inline_style' => '
				.is-style-arrow-icon-details {
					padding-top: var(--wp--preset--spacing--10);
					padding-bottom: var(--wp--preset--spacing--10);
				}

				.is-style-arrow-icon-details summary {
					list-style-type: "\2193\00a0\00a0\00a0";
				}

				.is-style-arrow-icon-details[open]>summary {
					list-style-type: "\2192\00a0\00a0\00a0";
				}',
            )
        );
        register_block_style(
            'core/post-terms',
            array(
                'name'         => 'pill',
                'label'        => __('Pill', 'twentytwentyfour'),
                /*
				 * Styles variation for post terms
				 * https://github.com/WordPress/gutenberg/issues/24956
				 */
                'inline_style' => '
				.is-style-pill a,
				.is-style-pill span:not([class], [data-rich-text-placeholder]) {
					display: inline-block;
					background-color: var(--wp--preset--color--base-2);
					padding: 0.375rem 0.875rem;
					border-radius: var(--wp--preset--spacing--20);
				}

				.is-style-pill a:hover {
					background-color: var(--wp--preset--color--contrast-3);
				}',
            )
        );
        register_block_style(
            'core/list',
            array(
                'name'         => 'checkmark-list',
                'label'        => __('Checkmark', 'twentytwentyfour'),
                /*
				 * Styles for the custom checkmark list block style
				 * https://github.com/WordPress/gutenberg/issues/51480
				 */
                'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
            )
        );
        register_block_style(
            'core/navigation-link',
            array(
                'name'         => 'arrow-link',
                'label'        => __('With arrow', 'twentytwentyfour'),
                /*
				 * Styles for the custom arrow nav link block style
				 */
                'inline_style' => '
				.is-style-arrow-link .wp-block-navigation-item__label:after {
					content: "\2197";
					padding-inline-start: 0.25rem;
					vertical-align: middle;
					text-decoration: none;
					display: inline-block;
				}',
            )
        );
        register_block_style(
            'core/heading',
            array(
                'name'         => 'asterisk',
                'label'        => __('With asterisk', 'twentytwentyfour'),
                'inline_style' => "
				.is-style-asterisk:before {
					content: '';
					width: 1.5rem;
					height: 3rem;
					background: var(--wp--preset--color--contrast-2, currentColor);
					clip-path: path('M11.93.684v8.039l5.633-5.633 1.216 1.23-5.66 5.66h8.04v1.737H13.2l5.701 5.701-1.23 1.23-5.742-5.742V21h-1.737v-8.094l-5.77 5.77-1.23-1.217 5.743-5.742H.842V9.98h8.162l-5.701-5.7 1.23-1.231 5.66 5.66V.684h1.737Z');
					display: block;
				}

				/* Hide the asterisk if the heading has no content, to avoid using empty headings to display the asterisk only, which is an A11Y issue */
				.is-style-asterisk:empty:before {
					content: none;
				}

				.is-style-asterisk:-moz-only-whitespace:before {
					content: none;
				}

				.is-style-asterisk.has-text-align-center:before {
					margin: 0 auto;
				}

				.is-style-asterisk.has-text-align-right:before {
					margin-left: auto;
				}

				.rtl .is-style-asterisk.has-text-align-left:before {
					margin-right: auto;
				}",
            )
        );
    }
endif;

add_action('init', 'twentytwentyfour_block_styles');

/**
 * Enqueue block stylesheets.
 */

if (!function_exists('twentytwentyfour_block_stylesheets')) :
    /**
     * Enqueue custom block stylesheets
     *
     * @since Twenty Twenty-Four 1.0
     * @return void
     */
    function twentytwentyfour_block_stylesheets()
    {
        /**
         * The wp_enqueue_block_style() function allows us to enqueue a stylesheet
         * for a specific block. These will only get loaded when the block is rendered
         * (both in the editor and on the front end), improving performance
         * and reducing the amount of data requested by visitors.
         *
         * See https://make.wordpress.org/core/2021/12/15/using-multiple-stylesheets-per-block/ for more info.
         */
        wp_enqueue_block_style(
            'core/button',
            array(
                'handle' => 'twentytwentyfour-button-style-outline',
                'src'    => get_parent_theme_file_uri('assets/css/button-outline.css'),
                'ver'    => wp_get_theme(get_template())->get('Version'),
                'path'   => get_parent_theme_file_path('assets/css/button-outline.css'),
            )
        );
    }
endif;

add_action('init', 'twentytwentyfour_block_stylesheets');

/**
 * Register pattern categories.
 */

if (!function_exists('twentytwentyfour_pattern_categories')) :
    /**
     * Register pattern categories
     *
     * @since Twenty Twenty-Four 1.0
     * @return void
     */
    function twentytwentyfour_pattern_categories()
    {

        register_block_pattern_category(
            'page',
            array(
                'label'       => _x('Pages', 'Block pattern category'),
                'description' => __('A collection of full page layouts.'),
            )
        );
    }
endif;

add_action('init', 'twentytwentyfour_pattern_categories');

function my_custom_language_sort($languages)
{
    // Sort menu language
    usort($languages, function ($a, $b) {
        return strcmp($a['name'], $b['name']);
    });
    // echo $languages;
    return $languages;
}
add_filter('pll_the_languages', 'my_custom_language_sort', $priority = 10);

// Create menu language-switch of Polylang
function my_lang_menu_with_pages_shortcode()
{
    $output = '';

    if (function_exists('pll_the_languages')) {
        $args = [
            'show_flags'                => 1,
            'show_names'                => 1,
            'echo'                      => 1,
            'dropdown'                  => 1,
            'hide_if_empty'             => 1,
            'hide_current'              => 0,
            'raw'                       => 1,
            'display_names_as'          => 'name',
            'force_home'                => 1,
            'hide_if_no_translation'    => 0,
            'post_id'                   => 1,
        ];

        // Get languages and current language
        $languages = pll_the_languages($args);
        $current_lang = pll_current_language();
    }
    $output  = '<ul class="list-language">';
    $output .= '<button type="button" class="btn btnMenu" aria-haspopup="true" aria-expanded="false">
				</button>';
    $output .= '<ul class="dropdown-menu language-menu">';
    foreach ($languages as $language) {
        $output .= '<li class="lang-flag">';
        $output .= '<a class="dropdown-item" href="' . $language['url'] . '">';
        $output .= $language['flag'];
        $output .=  $language['name'];
        $output .= '</a>';
        $output .= '</li>';
    }
    $output .= '</ul>';
    $output .= '</ul>';
    foreach ($languages as $language) {
        $active_class = ($language['slug'] === $current_lang) ? 'active' : '';
        if ($active_class == 'active') {
            // $output .= '<li class="' . $active_class . '">';
            // $output .= '<a href="' . $language['url'] . '"/a>';
            $page_args = array(
                'post_type'   => 'page', // Adjust as needed
                'post_status' => 'publish',
                'lang'        => $language['slug'], // Filter by language
                'orderby'     => 'menu_order',
                'order'       => 'ASC'
            );

            $page_query = new WP_Query($page_args);
            if ($page_query->have_posts()) {
                $output .= '<ul class= "list-active">';
                while ($page_query->have_posts()) {
                    $page_query->the_post();
                    $output .= '<li class="item-active"><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                }
                wp_reset_postdata();
                $output .= '</ul>';
            }
        }
        $output .= '</li>';
    }
    $output .= '<div class="hamburger">';
    $output .= '<span class="bar"></span>';
    $output .= '<span class="bar"></span>';
    $output .= '<span class="bar"></span>';
    $output .= '</div>';

    // Wrap the menu in your desired HTML structure
    $output = '<ul class="my-lang-menu-with-pages">' . $output . '</ul>';
    return $output;
}
// Register the shortcode
add_shortcode('my_lang_menu_with_pages', 'my_lang_menu_with_pages_shortcode');

// Add css
function my_custom_enqueue_styles()
{
    wp_enqueue_style('my-custom-style', get_stylesheet_directory_uri() . '/txgame-theme/custom-style.css');
}
add_action('wp_enqueue_scripts', 'my_custom_enqueue_styles');

// Add js
function my_custom_enqueue_script()
{
    wp_enqueue_script('my-custom-script', get_stylesheet_directory_uri() . '/txgame-theme/custom-script.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'my_custom_enqueue_script');

// Add bootstrap
function my_bootstrap_scripts()
{
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/txgame-theme/bootstrap-5.3.2-dist/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/txgame-theme/bootstrap-5.3.2-dist/js/bootstrap.min.js', array('jquery'), '4.6.2', true); // Adjust version accordingly
}
add_action('wp_enqueue_scripts', 'my_bootstrap_scripts');