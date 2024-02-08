<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

// require_once CB_THEME_DIR . '/inc/lc-noblog.php';
require_once CB_THEME_DIR . '/inc/cb-utility.php';
// require_once CB_THEME_DIR . '/inc/lc-posttypes.php';
// require_once CB_THEME_DIR . '/inc/lc-form.php';
require_once CB_THEME_DIR . '/inc/cb-blocks.php';

// Remove unwanted SVG filter injection WP
remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');



// Remove comment-reply.min.js from footer
function remove_comment_reply_header_hook()
{
    wp_deregister_script('comment-reply');
}
add_action('init', 'remove_comment_reply_header_hook');

add_action('admin_menu', 'remove_comments_menu');
function remove_comments_menu()
{
    remove_menu_page('edit-comments.php');
}

add_filter('theme_page_templates', 'child_theme_remove_page_template');
function child_theme_remove_page_template($page_templates)
{
    // unset($page_templates['page-templates/blank.php'],$page_templates['page-templates/empty.php'], $page_templates['page-templates/fullwidthpage.php'], $page_templates['page-templates/left-sidebarpage.php'], $page_templates['page-templates/right-sidebarpage.php'], $page_templates['page-templates/both-sidebarspage.php']);
    unset($page_templates['page-templates/blank.php'],$page_templates['page-templates/empty.php'], $page_templates['page-templates/left-sidebarpage.php'], $page_templates['page-templates/right-sidebarpage.php'], $page_templates['page-templates/both-sidebarspage.php']);
    return $page_templates;
}
add_action('after_setup_theme', 'remove_understrap_post_formats', 11);
function remove_understrap_post_formats()
{
    remove_theme_support('post-formats', array( 'aside', 'image', 'video' , 'quote' , 'link' ));
}

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(
        array(
            'page_title' 	=> 'Site-Wide Settings',
            'menu_title'	=> 'Site-Wide Settings',
            'menu_slug' 	=> 'theme-general-settings',
            'capability'	=> 'edit_posts',
        )
    );
}

function widgets_init()
{
    // register_sidebar(
    //     array(
    //         'name'          => __('Footer Col 1', 'cb-kingswood2024'),
    //         'id'            => 'footer-1',
    //         'description'   => __('Footer Col 1', 'cb-kingswood2024'),
    //         'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
    //         'after_widget'  => '</div>',
    //     )
    // );

    register_nav_menus(array(
        'primary_nav' => __('Primary Nav', 'cb-kingswood2024'),
        'footer_menu1' => __('Footer Menu 1', 'cb-kingswood2024'),
        'footer_menu2' => __('Footer Menu 2', 'cb-kingswood2024'),
    ));


    unregister_sidebar('hero');
    unregister_sidebar('herocanvas');
    unregister_sidebar('statichero');
    unregister_sidebar('left-sidebar');
    unregister_sidebar('right-sidebar');
    unregister_sidebar('footerfull');
    unregister_nav_menu('primary');

    add_theme_support('disable-custom-colors');
    add_theme_support(
        'editor-color-palette',
        array(
            array(
                'name'  => 'Blue 200',
                'slug'  => 'primary-200',
                'color' => '#047bdc',
            ),
            array(
                'name'  => 'Blue 400',
                'slug'  => 'primary-400',
                'color' => '#045bb9',
            ),
            array(
                'name'  => 'Blue 900',
                'slug'  => 'primary-900',
                'color' => '#022f69',
            ),
            array(
                'name'  => 'Orange 400',
                'slug'  => 'secondary-400',
                'color' => '#ff9305',
            )
        )
    );
}
add_action('widgets_init', 'widgets_init', 11);


remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');

//Custom Dashboard Widget
add_action('wp_dashboard_setup', 'register_cb_dashboard_widget');
function register_cb_dashboard_widget()
{
    wp_add_dashboard_widget(
        'cb_dashboard_widget',
        'Chillibyte',
        'cb_dashboard_widget_display'
    );
}

function cb_dashboard_widget_display()
{
    ?>
<div style="display: flex; align-items: center; justify-content: space-around;">
    <img style="width: 50%;"
        src="<?= get_stylesheet_directory_uri().'/img/cb-full.jpg'; ?>">
    <a class="button button-primary" target="_blank" rel="noopener nofollow noreferrer"
        href="mailto:hello@www.chillibyte.co.uk/">Contact</a>
</div>
<div>
    <p><strong>Thanks for choosing Chillibyte!</strong></p>
    <hr>
    <p>Got a problem with your site, or want to make some changes & need us to take a look for you?</p>
    <p>Use the link above to get in touch and we'll get back to you ASAP.</p>
</div>
<?php
}


// add_filter('wpseo_breadcrumb_links', function( $links ) {
//     global $post;
//     if ( is_singular( 'post' ) ) {
//         $t = get_the_category($post->ID);
//         $breadcrumb[] = array(
//             'url' => '/guides/',
//             'text' => 'Guides',
//         );

//         array_splice( $links, 1, -2, $breadcrumb );
//     }
//     return $links;
// }
// );

// remove discussion metabox
function cc_gutenberg_register_files()
{
    // script file
    wp_register_script(
        'cc-block-script',
        get_stylesheet_directory_uri() .'/js/block-script.js', // adjust the path to the JS file
        array( 'wp-blocks', 'wp-edit-post' )
    );
    // register block editor script
    register_block_type('cc/ma-block-files', array(
        'editor_script' => 'cc-block-script'
    ));
}
add_action('init', 'cc_gutenberg_register_files');

function understrap_all_excerpts_get_more_link($post_excerpt)
{
    if (is_admin() || ! get_the_ID()) {
        return $post_excerpt;
    }
    return $post_excerpt;
}

//* Remove Yoast SEO breadcrumbs from Revelanssi's search results
add_filter('the_content', 'wpdocs_remove_shortcode_from_index');
function wpdocs_remove_shortcode_from_index($content)
{
    if (is_search()) {
        $content = strip_shortcodes($content);
    }
    return $content;
}



// GF really is pants.
/**
 * Change submit from input to button
 *
 * Do not use example provided by Gravity Forms as it strips out the button attributes including onClick
 */
function wd_gf_update_submit_button($button_input, $form)
{
    //save attribute string to $button_match[1]
    preg_match("/<input([^\/>]*)(\s\/)*>/", $button_input, $button_match);

    //remove value attribute (since we aren't using an input)
    $button_atts = str_replace("value='" . $form['button']['text'] . "' ", "", $button_match[1]);

    // create the button element with the button text inside the button element instead of set as the value
    return '<button ' . $button_atts . '><span>' . $form['button']['text'] . '</span></button>';
}
add_filter('gform_submit_button', 'wd_gf_update_submit_button', 10, 2);


function cb_theme_enqueue()
{
    $the_theme = wp_get_theme();
    
    // wp_enqueue_style('lightbox-stylesheet', get_stylesheet_directory_uri() . '/css/lightbox.min.css', array(), $the_theme->get('Version'));
    wp_enqueue_style('slick-stylesheet', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css', array(), $the_theme->get('Version'));
    wp_enqueue_style('slick-stylesheet', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css', array(), $the_theme->get('Version'));
    wp_enqueue_script('slick-scripts', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array('jquery'), '1.8.1', true);
    // wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js', array(), null, true);
    wp_enqueue_style('glightbox-stylesheet', get_stylesheet_directory_uri() . '/css/glightbox.min.css', array(), $the_theme->get('Version'));
    wp_enqueue_script('glightbox-scripts', get_stylesheet_directory_uri() . '/js/glightbox.min.js', array(), null, true);
    wp_enqueue_style('aos-style', "https://unpkg.com/aos@2.3.1/dist/aos.css", array());
    wp_enqueue_script('aos', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), null, true);
    // wp_enqueue_script('parallax', get_stylesheet_directory_uri() . '/js/parallax.min.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'cb_theme_enqueue');


// DIVIDE BUY //
add_shortcode( 'divide_buy', function() {
  ob_start();
?>
    <!--To add credit page to your website please open index.html and copy the content from the line no 12 to 353 on your credit-page file. Please make sure there is no syntactical mistake. -->
    <!--Credit page code start from here-->
    <style type="text/css">
      @import url("https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap");

      .entry-title.main_title {
        display: none;
      }

      .creditwebpage_layout * {
        font-family: "Poppins", sans-serif;
      }

      .creditwebpage_layout h2 {
        font-size: 24px !important;
        color: #002f6d !important;
        font-weight: 700 !important;
      }

      .creditwebpage_layout .why-use-dividebuy {
        color: #002f6d !important;
        font-size: 16px !important;
        font-weight: 500 !important;
      }

      .creditwebpage_layout .FAQs {
        font-size: 18px;
        font-weight: 600;
        color: #002f6d;
      }

      .creditwebpage_layout .answer p,
      .creditwebpage_layout .answer {
        font-size: 15px;
        color: #002f6d;
        font-weight: 400;
      }

      .creditwebpage_layout p {
        font-size: 12px;
        color: #002f6d;
        font-weight: 500;
      }

      .db-credit-py-4 {
        padding-bottom: 1.5rem !important;
      }

      .db-credit-pb-4,
      .db-credit-py-4 {
        padding-bottom: 1.5rem !important;
      }

      .db-credit-pt-4,
      .db-credit-py-4 {
        padding-top: 1.5rem !important;
      }

      .db-credit-container {
        max-width: 1140px;
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
      }

      .db-credit-row {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
      }

      .db-credit-justify-content-center {
        -ms-flex-pack: center !important;
        justify-content: center !important;
      }

      .db-credit-mb-5 {
        margin-bottom: 3rem !important;
      }

      .db-credit-text-center {
        text-align: center !important;
      }

      .db-credit-col {
        -ms-flex-preferred-size: 0;
        flex-basis: 0;
        -ms-flex-positive: 1;
        flex-grow: 1;
        max-width: 100%;
        position: relative;
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
      }

      .db-credit-mb-4,
      .db-credit-my-4 {
        margin-bottom: 1.5rem !important;
      }

      .db-credit-col-sm-12 {
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        max-width: 100%;
        position: relative;
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
      }

      .db-credit-mb-2,
      .db-credit-my-2 {
        margin-bottom: 0.5rem !important;
      }

      .db-credit-mt-3,
      .db-credit-my-3 {
        margin-top: 1rem !important;
      }

      @media screen and (max-width: 767px) {
        .db-credit-col {
          -ms-flex-preferred-size: 0;
          flex-basis: auto;
          -ms-flex-positive: 1;
          flex-grow: 1;
          max-width: 160px;
          position: relative;
          width: 100%;
          padding-right: 15px;
          padding-left: 15px;
        }
      }
    </style>
    <div class="creditwebpage_layout">
      <div style="display: none">
        <h1>Credit Web page</h1>
      </div>
      <section class="cwp_single_image db-credit-py-4">
        <div class="db-credit-container">
          <div class="db-credit-row db-credit-justify-content-center">
            <div class="">
              <img
                src="https://s3.eu-west-2.amazonaws.com/resources.dividebuy.co.uk/credit-webpage/dividebuy-logotype-full-colour-rgb.jpg"
                style="max-width: 200px"
              />
            </div>
          </div>
        </div>
      </section>
      <section class="cwp_small_icon_grid db-credit-py-4">
        <div class="db-credit-container">
          <h2 class="db-credit-mb-5 db-credit-text-center">
            Why use DivideBuy?
          </h2>
          <div class="db-credit-row db-credit-justify-content-center">
            <div class="db-credit-col">
              <div class="db-credit-text-center db-credit-mb-4">
                <img
                  src="https://s3.eu-west-2.amazonaws.com/resources.dividebuy.co.uk/credit-webpage/APR.png"
                  title="Interest free instalments"
                  alt="Interest free instalments"
                  style="width: 60px"
                />
                <h3 class="db-credit-mt-3 why-use-dividebuy">
                  Interest free instalments
                </h3>
              </div>
            </div>
            <div class="db-credit-col">
              <div class="db-credit-text-center db-credit-mb-4">
                <img
                  src="https://s3.eu-west-2.amazonaws.com/resources.dividebuy.co.uk/credit-webpage/No-Footprint.png"
                  title="Check eligibility, no effect on credit score"
                  alt="Check eligibility, no effect on credit score"
                  style="width: 60px"
                />
                <h3 class="db-credit-mt-3 why-use-dividebuy">
                  Check eligibility, no effect on credit score
                </h3>
              </div>
            </div>
            <div class="db-credit-col">
              <div class="db-credit-text-center db-credit-mb-4">
                <img
                  src="https://s3.eu-west-2.amazonaws.com/resources.dividebuy.co.uk/credit-webpage/Repayment-Auto.png"
                  title="Repayment automatic"
                  alt="Repayment automatic"
                  style="width: 60px"
                />
                <h3 class="db-credit-mt-3 why-use-dividebuy">
                  Repayment automatic
                </h3>
              </div>
            </div>
            <div class="db-credit-col">
              <div class="db-credit-text-center db-credit-mb-4">
                <img
                  src="https://s3.eu-west-2.amazonaws.com/resources.dividebuy.co.uk/credit-webpage/Instant-Decision.png"
                  title="Quick and easy"
                  alt="Quick and easy"
                  style="width: 60px"
                />
                <h3 class="db-credit-mt-3 why-use-dividebuy">Quick and easy</h3>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="cwp_small_icon_grid db-credit-py-4">
        <div class="db-credit-container">
          <h2 class="db-credit-mb-5 db-credit-text-center">
            Spread the Cost, Interest Free
          </h2>
          <div class="db-credit-row db-credit-justify-content-center">
            <div class="db-credit-col">
              <div class="db-credit-text-center db-credit-mb-4">
                <img
                  src="https://s3.eu-west-2.amazonaws.com/resources.dividebuy.co.uk/credit-webpage/Shopping-Basket.png"
                  title="Add items to your basket"
                  alt="Add items to your basket"
                  style="width: 60px"
                />
                <h3 class="db-credit-mt-3 why-use-dividebuy">
                  Add items to your basket
                </h3>
              </div>
            </div>
            <div class="db-credit-col">
              <div class="db-credit-text-center db-credit-mb-4">
                <img
                  src="https://s3.eu-west-2.amazonaws.com/resources.dividebuy.co.uk/credit-webpage/icons.png"
                  title="Go to checkout and select DivideBuy"
                  alt="Go to checkout and select DivideBuy"
                  style="width: 60px"
                />
                <h3 class="db-credit-mt-3 why-use-dividebuy">
                  Go to checkout and select DivideBuy
                </h3>
              </div>
            </div>
            <div class="db-credit-col">
              <div class="db-credit-text-center db-credit-mb-4">
                <img
                  src="https://s3.eu-west-2.amazonaws.com/resources.dividebuy.co.uk/credit-webpage/My-Application.png"
                  title="Provide some personal details. If you are approved get instant credit decision"
                  alt="Provide some personal details. If you are approved get instant credit decision"
                  style="width: 60px"
                />
                <h3 class="db-credit-mt-3 why-use-dividebuy">
                  Provide some personal details. If you are approved get instant
                  credit decision
                </h3>
              </div>
            </div>
            <div class="db-credit-col">
              <div class="db-credit-text-center db-credit-mb-4">
                <img
                  src="https://s3.eu-west-2.amazonaws.com/resources.dividebuy.co.uk/credit-webpage/Pay-Now.png"
                  title="Pay first instalment"
                  alt="Pay first instalment"
                  style="width: 60px"
                />
                <h3 class="db-credit-mt-3 why-use-dividebuy">
                  Pay first instalment
                </h3>
              </div>
            </div>
            <div class="db-credit-col">
              <div class="db-credit-text-center db-credit-mb-4">
                <img
                  src="https://s3.eu-west-2.amazonaws.com/resources.dividebuy.co.uk/credit-webpage/Shipping.png"
                  title="Your goods are on their way"
                  alt="Your goods are on their way"
                  style="width: 60px"
                />
                <h3 class="db-credit-mt-3 why-use-dividebuy">
                  Your goods are on their way
                </h3>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="cwp_faqs db-credit-py-4">
        <div class="db-credit-container">
          <h2 class="db-credit-mb-5 db-credit-text-center">FAQs</h2>
          <div class="db-credit-row">
            <div class="db-credit-col-sm-12">
              <div class="db-credit-mb-4">
                <h3 class="db-credit-mb-2 FAQs">
                  Are there limits on how much I can spend?
                </h3>
                <div class="answer">
                  <p>
                    DivideBuy interest free credit is available on
                    products/services from £50 to £6000. Credit is available
                    from 2 to 12 months. Credit <br />
                    offered is set by the retailer.
                  </p>
                </div>
              </div>
            </div>
            <div class="db-credit-col-sm-12">
              <div class="db-credit-mb-4">
                <h3 class="db-credit-mb-2 FAQs">
                  Who can apply for DivideBuy interest free credit?
                </h3>
                <div class="answer">
                  <ul>
                    <li>Applicants must be aged between 18 and 75</li>
                    <li>Be a permanent UK resident</li>
                    <li>Have a valid debit or credit card</li>
                    <li>Have a valid UK mobile number</li>
                    <li>Have a valid email address</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="db-credit-col-sm-12">
              <div class="db-credit-mb-4">
                <h3 class="db-credit-mb-2 FAQs">
                  Will a credit check be performed?
                </h3>
                <div class="answer">
                  <p>
                    Yes. A credit check is performed to assess your eligibility
                    and affordability. DivideBuy also has a quick check service
                    so you can <br />
                    assess your eligibility for DivideBuy credit that will not
                    affect your credit file.
                  </p>
                </div>
              </div>
            </div>
            <div class="db-credit-col-sm-12">
              <div class="db-credit-mb-4">
                <h3 class="db-credit-mb-2 FAQs">
                  How do I make my monthly payments?
                </h3>
                <div class="answer">
                  <p>
                    Payment is collected via a Continuous Payment Authority
                    (CPA). This method uses your long card number, expiry date
                    and threedigit CV2. Payments will be collected automatically
                    on the date your instalment is due.
                  </p>
                </div>
              </div>
            </div>
            <div class="db-credit-col-sm-12">
              <div class="db-credit-mb-4">
                <h3 class="db-credit-mb-2 FAQs">
                  Can I request delivery to an address other than my home
                  address?
                </h3>
                <div class="answer">
                  <p>
                    To guard against fraudulent applications, we are only able
                    to deliver goods to your home address.
                  </p>
                </div>
              </div>
            </div>
            <div class="db-credit-col-sm-12">
              <div class="db-credit-mb-4">
                <h3 class="db-credit-mb-2 FAQs">
                  What if I would like to cancel/ return my order?
                </h3>
                <div class="answer">
                  <p>
                    The first step is to contact the retailer directly to cancel
                    your order. If you have already received your order, you’ll
                    need to arrange for it to be returned using the retailer’s
                    returns process. The retailer will then contact us to
                    confirm your order has been returned, so we can issue a
                    refund and cancel your credit agreement.
                  </p>
                </div>
              </div>
            </div>
            <div class="db-credit-col-sm-12">
              <div class="db-credit-mb-4">
                <h3 class="db-credit-mb-2 FAQs">
                  My application was declined. Now what?
                </h3>
                <div class="answer">
                  <p>
                    We’re sorry that your application was declined.
                    Unfortunately, we have no influence over the credit decision
                    and we’re unable to find out why your <br />
                    application was denied. DivideBuy is not permitted to share
                    application information with us.
                  </p>
                </div>
              </div>
            </div>
            <div class="db-credit-col-sm-12">
              <div class="db-credit-mb-4">
                <h3 class="db-credit-mb-2 FAQs">
                  Who can I contact if I need help?
                </h3>
                <div class="answer">
                  <p>
                    For any questions related to
                    <a href="https://dividebuy.co.uk/" role="link">DivideBuy</a>
                    interest free credit please contact DivideBuy by visiting
                    www.dividebuy.co.uk. For a full list of FAQs please
                    <a href="https://dividebuy.co.uk/faqs/" role="link"
                      >click here</a
                    >.
                  </p>
                </div>
              </div>
            </div>
            <div class="db-credit-col-sm-12">
              <div class="db-credit-mb-4">
                <h3 class="db-credit-mb-2 FAQs">
                  Are there any fees or charges?
                </h3>
                <div class="answer">
                  <p>
                    No. There are no APR or hidden charges. We do reserve the
                    right to add late payment fees to your account in the event
                    of you missing payments. This is all explained in your
                    credit agreement before you electronically sign at the
                    checkout process.
                  </p>
                </div>
              </div>
            </div>
            <div class="db-credit-col-sm-12">
              <div class="db-credit-mb-4">
                <h3 class="db-credit-mb-2 FAQs">
                  How can I manage my DivideBuy account?
                </h3>
                <div class="answer">
                  <p>
                    To manage your account and make payments, you can log in
                    <a href="https://accounts.dividebuy.co.uk/" role="link"
                      >accounts.dividebuy.co.uk</a
                    >
                  </p>
                </div>
              </div>
            </div>
            <div class="db-credit-col-sm-12">
              <div class="db-credit-mb-4">
                <h3 class="db-credit-mb-2 FAQs">
                  What if I need to change my delivery address from my billing
                  address?
                </h3>
                <div class="answer">
                  <p>
                    DivideBuy will need to approve any deliveries to addresses
                    other than the application/billing address. Without their
                    approval, we will not be able to ship to a different address
                    as fraud prevention measures apply. To have goods delivered
                    to another address, once you have placed your order and paid
                    a first instalment, you need to contact DivideBuy directly
                    who will then notify us of the <br />
                    changes.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="ccwp_ontent db-credit-py-4" style="background: #ffffff">
        <div class="db-credit-container">
          <div class="db-credit-text-center">
            <h2 style="text-align: center">How can I contact DivideBuy?</h2>
            <p>&nbsp;</p>
            <p style="text-align: center">
              <strong
                >Email:
                <a href="mailto:hello@dividebuy.co.uk" role="link"
                  >hello@dividebuy.co.uk</a
                >
              </strong>
              <br />
              <strong
                >Or via the DivideBuy live chat facility at
                dividebuy.co.uk</strong
              >
            </p>
          </div>
        </div>
      </section>
      <section class="ccwp_ontent db-credit-py-4" style="background: #f5f5f5">
        <div class="db-credit-container">
          <div class="db-credit-text-center">
            <p>
              <img
                loading="lazy"
                class="wp-image-2737 aligncenter"
                src="https://s3.eu-west-2.amazonaws.com/resources.dividebuy.co.uk/credit-webpage/dividebuy-logotype-full-colour-rgb.jpg"
                alt=""
                width="100"
                height="26"
              />
            </p>
            <p style="text-align: center">
              Zopa Embedded Finance Limited t/a DivideBuy credit agreements are not regulated by the Financial Conduct Authority and do not fall under the jurisdiction of the Financial Ombudsman Service. Credit is available to permanent UK residents aged 18+, subject to status, any missed payments may affect your ability to obtain credit from DivideBuy and other lenders. Please spend responsibly.

Zopa Embedded Finance Limited registered at First Floor, Brunswick Court, Brunswick Street, Newcastle-under-Lyme, ST5 1HH. Company number 14602085.
<br><br>
Copyright © 2023 Zopa Embedded Finance. All Rights Reserved.
            </p>
          </div>
        </div>
      </section>
    </div>
    <!--Credit page code end from here-->
<?php
return ob_get_clean();
});


// black thumbnails - fix alpha channel
/**
 * Patch to prevent black PDF backgrounds.
 *
 * https://core.trac.wordpress.org/ticket/45982
 */
// require_once ABSPATH . 'wp-includes/class-wp-image-editor.php';
// require_once ABSPATH . 'wp-includes/class-wp-image-editor-imagick.php';

// // phpcs:ignore PSR1.Classes.ClassDeclaration.MissingNamespace
// final class ExtendedWpImageEditorImagick extends WP_Image_Editor_Imagick
// {
//     /**
//      * Add properties to the image produced by Ghostscript to prevent black PDF backgrounds.
//      *
//      * @return true|WP_error
//      */
//     // phpcs:ignore PSR1.Methods.CamelCapsMethodName.NotCamelCaps
//     protected function pdf_load_source()
//     {
//         $loaded = parent::pdf_load_source();

//         try {
//             $this->image->setImageAlphaChannel(Imagick::ALPHACHANNEL_REMOVE);
//             $this->image->setBackgroundColor('#ffffff');
//         } catch (Exception $exception) {
//             error_log($exception->getMessage());
//         }

//         return $loaded;
//     }
// }

// /**
//  * Filters the list of image editing library classes to prevent black PDF backgrounds.
//  *
//  * @param array $editors
//  * @return array
//  */
// add_filter('wp_image_editors', function (array $editors): array {
//     array_unshift($editors, ExtendedWpImageEditorImagick::class);

//     return $editors;
// });?>