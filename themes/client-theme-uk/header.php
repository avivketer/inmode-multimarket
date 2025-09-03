<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package inmode
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100..900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick.min.css" rel="stylesheet" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick-theme.min.css" rel="stylesheet" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php 
 $theme_options_options = get_option( 'theme_options_option_name' ); // Array of All Options
 $address_0 = $theme_options_options['address_0']; // Address
 $phone_number_1 = $theme_options_options['phone_number_1']; // Phone number
 $email_address_2 = $theme_options_options['email_address_2']; // Email address
 $facebook_url_3 = $theme_options_options['facebook_url_3']; // Facebook Url
 $instagram_url_4 = $theme_options_options['instagram_url_4']; // Instagram Url
 $linkedin_url_5 = $theme_options_options['linkedin_url_5']; // LinkedIn Url
 $youtube_url_6 = $theme_options_options['youtube_url_6']; // Youtube Url
 $tiktok_url_7 = $theme_options_options['tiktok_url_7'];
 $pinterest_url_8 = $theme_options_options['pinterest_url_8'];
?>

<div id="page" class="site">
	<header id="masthead" class="site-header">

		<div class="container-fluid">
			<div class="row pt-3 mob-hide ">
				<div class="col-sm-6 d-flex ps-5"> 

					 <?php wp_nav_menu(
							array(
								'theme_location' => 'menu-3',
								'menu_id'        => 'social',
								'menu_class'	 => 'd-flex'
					));?>
					 <ul class="socail links">
						<?php if($facebook_url_3!=""){ ?>
						<li><a href="<?php echo $facebook_url_3;?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<?php }
						if($instagram_url_4!=""){?>
						<li><a href="<?php echo $instagram_url_4;?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						<?php }
						if($linkedin_url_5!=""){?>
						<li><a href="<?php echo $linkedin_url_5;?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
						<?php }
						if($youtube_url_6!=""){?>
						<li><a href="<?php echo $youtube_url_6;?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
						<?php }
						if( $tiktok_url_7!=""){?>
						<li><a href="<?php echo $tiktok_url_7;?>"><img src="/wp-content/uploads/2025/03/tik-tok.png" class="logo_social"></a></li>
						<?php }
						if($pinterest_url_8!=""){?>
						<li><a href="<?php echo $pinterest_url_8;?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
						<?php }
						?>
					</ul>
				</div>
				
				<div class="col-sm-6 d-flex justify-content-end align-items-center pe-5">
					<?php wp_nav_menu(
							array(
								'theme_location' => 'menu-2',
								'menu_id'        => 'top-menu',
								'menu_class'	 => 'd-flex'
							));?>
							<button type="button" class="btn btn-search " data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
						
				</div>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg">
                  <div class="container-fluid align-items-start">
                    <div class="navbar-brand d-md-block m-md-auto"><?php 
					            the_custom_logo();
					            if ( is_front_page() && is_home() ) :
						        ?>
						            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        						<?php else :?>
						            <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
        						<?php endif;
                					$inmode_description = get_bloginfo( 'description', 'display' );
                					if ( $inmode_description || is_customize_preview() ) :
                						?>
						                <p class="site-description"><?php echo $inmode_description;?></p>
					                <?php endif; ?></div>
                    <div class="d-md-none">
                        <button class="navbar-toggler ml-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </span>
                        </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <?php wp_nav_menu(
    							array(
    								'theme_location' => 'menu-6',
    								'menu_id'        => 'mobile-menu',
    								'menu_class'	 => 'mob-menu'
    							));?>
                		<div class="row">
                		    <div class="col-6">
                		         <ul class="socail links">
                						<?php if($facebook_url_3!=""){ ?>
                						<li><a href="<?php echo $facebook_url_3;?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                						<?php }
                						if($instagram_url_4!=""){?>
                						<li><a href="<?php echo $instagram_url_4;?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                						<?php }
                						if($linkedin_url_5!=""){?>
                						<li><a href="<?php echo $linkedin_url_5;?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                						<?php }
                						if($youtube_url_6!=""){?>
                						<li><a href="<?php echo $youtube_url_6;?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                						<?php }?>
                					</ul>
                		    </div>
                		    <div class="col-6">
                		         <?php wp_nav_menu(
                							array(
                								'theme_location' => 'menu-3',
                								'menu_id'        => 'social',
                								'menu_class'	 => 'd-flex '
                					));?>
                				
                		    </div>
                		</div>
                  </div>
                  </div>
                  </div>
                </nav>
		<div class="nav-bar mob-hide nav_provider">
			<div class="container-fluid">
				<div class="row nav-bg main_m  align-items-center justify-content-center">
					<div class="col-sm-2 ps-5">
					    <button class="provider-menu btn btn-provider">Providers</button>
					</div>
					<div class="col-sm-8">
						<nav class="navbar navbar-expand pr_menu ml-auto" style="display:none;">  
						    <?php wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
									'menu_class'	 => 'd-flex justify-content-center'
								));?>
    						
  						</nav>
					</div>
					<div class="col-sm-2 d-flex justify-content-end pe-5">
					    <a href="/find-a-provider/" class="btn btn-provider btn1" style="opacity:0">Find A Provider</a>
					</div>
				</div>
			</div>
		</div>
		<div class="nav-bar mob-hide main_m  nav_patient">
			<div class="container-fluid">
				<div class="row justify-content-center align-item-center nav-bg">
					<div class="col-sm-2 ps-5">
					    <button class="patient-menu btn btn-provider">Patients</button>
					</div>
					<div class="col-sm-8">
						<nav class="navbar navbar-expand pt_menu hide" style="display:none;">  
						    <?php wp_nav_menu(
								array(
									'theme_location' => 'menu-5',
									'menu_id'        => 'provider-menu',
									'menu_class'	 => 'd-flex '
								));?>
    						
  						</nav>
					</div>
					<div class="col-sm-2">
					</div>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
