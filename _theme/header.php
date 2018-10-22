<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eaze-starter
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
	// Get the logo from Customizer
	$logo = get_custom_logo();
?>
<div class="off-canvas-wrapper">
	<div class="off-canvas position-left" id="offCanvas" data-off-canvas>
		<!-- Your menu or Off-canvas content goes here -->
		<div class="grid-x">
			<div class="cell small-12">
				<div class="site-logo">
				<?php
					if( $logo ):
						echo $logo;
					else:
				?>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/inc/eaze-giphy/assets/images/eaze-logo.svg">
				<?php 
					endif;
				?>
				</div>
			</div>
			<div class="cell small-12">
				<nav id="site-navigation" class="main-navigation">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					) );
					?>
				</nav>
				<!-- #site-navigation -->
			</div>
			<div class="cell small-12">
				<div class="cta-links">
					<a href="#">Sign Up</a>
					<a href="#">Login</a>
				</div>
			</div>
		</div>
	</div>
	<div class="off-canvas-content" data-off-canvas-content>
		<!-- Your page content lives here -->
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'eaze-starter' ); ?></a>
			
			<header id="masthead" class="site-header">
				<div class="site-branding">
					<div class="grid-container fluid">
						<div class="grid-x grid-padding-x align-middle align-justify">

							<div class="cell small-4">
								<button type="button" data-toggle="offCanvas" class="menu-btn">
									<img src="<?php echo get_stylesheet_directory_uri() . '/inc/eaze-giphy/assets/images/menu-icon.svg'; ?>">
								</button>
								<a class="enter-delivery-address" href="#">
									<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										 width="12px" height="18px" viewBox="0 0 12 18" enable-background="new 0 0 12 18" xml:space="preserve">
									<path fill="none" stroke="#000000" stroke-width="1.5" d="M6,16.634c0.816-1.265,1.6-2.55,2.35-3.854
										c0.349-0.611,0.674-1.205,0.974-1.775C10.55,8.666,11.25,6.842,11.25,5.87c0-2.824-2.348-5.12-5.25-5.12
										c-2.904,0-5.25,2.296-5.25,5.12c0,0.972,0.7,2.796,1.927,5.134c0.3,0.57,0.625,1.164,0.975,1.775
										C4.399,14.085,5.183,15.371,6,16.634z M7.75,6c0,0.966-0.783,1.75-1.75,1.75C5.034,7.75,4.25,6.966,4.25,6S5.034,4.25,6,4.25
										C6.967,4.25,7.75,5.034,7.75,6z"/>
									</svg>
									<span>Enter delivery address</span>
								</a>
							</div>

							<div class="cell small-4">
								<div class="site-logo">								
									<?php
										if( $logo ):
											echo $logo;
										else:
									?>
											<img src="<?php echo get_stylesheet_directory_uri(); ?>/inc/eaze-giphy/assets/images/eaze-logo.svg">
									<?php 
										endif;
										?>
								</div>
							</div>

							<div class="cell small-4">
								<a class="login-link" href="#">Log In</a>
								<button type="button" class="button shop-button">
									<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										 width="12px" height="16px" viewBox="0 0 12 16" enable-background="new 0 0 12 16" xml:space="preserve">
									<path d="M3.358,11.104c0.337,0.924,0.91,1.715,1.765,2.133c1.03,0.508,2.245,0.152,2.961-0.405c1.062-0.827,1.48-2.386,1.518-4.338
										c0.01-0.649-0.119-1.288,0.09-1.786c0.114-0.294,0.376-0.506,0.688-0.556c0.5-0.062,0.975,0.232,1.146,0.708
										c0.115,0.365,0.186,0.743,0.209,1.125c0.129,1.204,0.032,2.421-0.284,3.59c-0.388,1.43-1.076,2.49-2.033,3.257
										c-0.517,0.414-1.112,0.72-1.75,0.899c-0.765,0.236-1.567,0.318-2.363,0.242c-1.518-0.179-2.58-0.943-3.395-1.877
										c-0.815-0.934-1.4-2.173-1.706-3.59c-0.316-1.466-0.246-3.333,0.09-4.788c0.475-2.072,1.43-3.886,2.96-4.973
										c0.57-0.428,1.25-0.685,1.96-0.74C6.796-0.07,7.758,0.79,8.219,1.912c0.495,1.201,0.387,2.916-0.015,4.219
										c-0.368,1.155-0.997,2.21-1.84,3.081C5.54,10.088,4.505,10.74,3.358,11.104z M5.786,4.554C5.853,3.838,5.85,2.85,5.352,2.604
										C5.107,2.512,4.835,2.528,4.604,2.649c-0.48,0.237-0.795,0.804-1.017,1.35C3.05,5.329,2.785,7.298,2.929,9.014
										c1.513-0.809,2.65-2.265,2.851-4.457L5.786,4.554z"/>
									</svg>
										<span>Shop</span>
								</button>
							</div>

						</div>
					</div>
				</div><!-- .site-branding -->
			</header><!-- #masthead -->



			<div id="content" class="site-content">
				<div class="grid-container">
					<div class="grid-x grid-padding-x">
