<?php
function job_portal_setup() {
	load_theme_textdomain( 'job-portal',get_template_directory() . '/languages' );
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	
	register_nav_menus( array(
		'primary'    => esc_html__( 'Top Menu', 'job-portal' ),
	) );	
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	// repeat the following 11 lines for each format you want


	// Add theme support for Custom header.		
	add_theme_support( 'custom-header', apply_filters( 'job_portal_custom_header_args', array(
		 'default-image'         => get_template_directory_uri() . '/assets/images/header-img.jpeg',
		'default-text-color'     => '000000',
		'width'                  => 1250,
		'height'                 => 250,
		'flex-height'            => true,
		/*'wp-head-callback'       => 'job_portal_header_style',*/
		'header-text'			=>true,
	) ) );
	// This theme styles the visual editor to resemble the theme style.
   	add_editor_style( array( 'css/editor-style.css', job_portal_font_url() ) );
	add_theme_support( 'custom-background', apply_filters( 'job_portal_custom_background_args', array(
	'default-color' => 'f5f5f5',
	) ) );
	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
		'flex-height' => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
}
add_action( 'after_setup_theme', 'job_portal_setup' );

// Filter for search form.
add_filter('get_search_form', 'job_portal_search_form');
function job_portal_search_form($html) {
	if(is_front_page()):
	 $html = '<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	 <form action="'.esc_url(home_url()).'" role="search" method="get" id="searchformtop">
	 <input placeholder="'.esc_attr(get_theme_mod('search_header_placeholder','What are you looking for?')).'" name="s" id="s" type="text" required=""></form>
            </div>                        
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <button class="btn btn-primary search-button" type="button" onclick="jQuery(\'#searchformtop\').submit();">'.esc_html(get_theme_mod('search_header_search_btn_text','Search')).'</button>
        </div>';
	endif;
 return $html;
}
// action for content width set.
function job_portal_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'job_portal_content_width', 640 );
}
add_action( 'after_setup_theme', 'job_portal_content_width', 0 );

// theme font url set here
function job_portal_font_url() {
	$customizable_font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'job-portal' ) ) {
		$customizable_font_url = add_query_arg( 'family', urlencode( 'Montserrat:300,400,700,900,300italic,400italic,700italic' ), "//fonts.googleapis.com/css" );
	}

	return $customizable_font_url;
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function job_portal_widgets_init() {
	register_sidebar( array(
		'name'          		=> esc_html__( 'Sidebar', 'job-portal' ),
		'id'            		=> 'sidebar-1',
		'romana_description'   	=> esc_html__( 'Add widgets here to appear in your sidebar.', 'job-portal' ),
		'before_widget' 		=> '<aside id="%1$s" class="widget %2$s" data-aos="fade-up">',
		'after_widget'  		=> '</aside>',
		'before_title'  		=> '<div class="sidebar-title"><h4>',
		'after_title'   		=> '</h4> </div>',
	) );
	register_sidebar( array(
		'name'          		=> __( 'Footer 1', 'job-portal' ),
		'id'            		=> 'footer-1',
		'romana_description'	=> esc_html__( 'Add widgets here to appear in your footer.', 'job-portal' ),
		'before_widget' 		=> '<div id="%1$s" class="%2$s footer-item">',
		'after_widget'  		=> '</div>',
		'before_title'  		=> '<div class="footer-item-heading"><h5>',
		'after_title'   		=> '</h5></div>',
	) );
	register_sidebar( array(
		'name'          		=> esc_html__( 'Footer 2', 'job-portal' ),
		'id'            		=> 'footer-2',
		'romana_description'   	=> esc_html__( 'Add widgets here to appear in your footer.', 'job-portal' ),
		'before_widget' 		=> '<div id="%1$s" class="%2$s footer-item">',
		'after_widget'  		=> '</div>',
		'before_title'  		=> '<div class="footer-item-heading"><h5>',
		'after_title'   		=> '</h5></div>',
	) );
	register_sidebar( array(
		'name'          		=> esc_html__( 'Footer 3', 'job-portal' ),
		'id'            		=> 'footer-3',
		'romana_description'   	=> esc_html__( 'Add widgets here to appear in your footer.', 'job-portal' ),
		'before_widget' 		=> '<div id="%1$s" class="%2$s footer-item">',
		'after_widget'  		=> '</div>',
		'before_title'  		=> '<div class="footer-item-heading"><h5>',
		'after_title'   		=> '</h5></div>',
	) );
	register_sidebar( array(
		'name'          		=> esc_html__( 'Footer 4', 'job-portal' ),
		'id'            		=> 'footer-4',
		'romana_description'   	=> esc_html__( 'Add widgets here to appear in your footer.', 'job-portal' ),
		'before_widget' 		=> '<div id="%1$s" class="%2$s footer-item">',
		'after_widget'  		=> '</div>',
		'before_title'  		=> '<div class="footer-item-heading"><h5>',
		'after_title'   		=> '</h5></div>',
	) );
}
add_action( 'widgets_init', 'job_portal_widgets_init' );

// Filter for logo layout
add_filter('get_custom_logo','job_portal_logo_class');
function job_portal_logo_class($logo_html)
{
	$logo_html = str_replace('width=', 'original-width=', $logo_html);
	$logo_html = str_replace('height=', 'original-height=', $logo_html);
	$logo_html = str_replace('class="custom-logo"', 'class="img-responsive logo-fixed"', $logo_html);	
	$logo_html = str_replace('class="custom-logo-link"', 'class="img-responsive logo-fixed"', $logo_html);
	return $logo_html;
}

// Filter with excerpt length
function job_portal_excerpt_length( $length ) {
	 if ( is_admin() ) { return $length;  }
	if(is_front_page()){ return 20; }
	return absint(get_theme_mod('blog_post_content_limit', 40));
}
add_filter( 'excerpt_length', 'job_portal_excerpt_length', 999 );
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 */
function job_portal_excerpt_more( $link ) {
	if ( is_admin() ) {		return $link;	}	
	if (!get_theme_mod( 'blog_post_readmore',false ) ) {		
		$link = sprintf( '</p><p><a href="%1$s" class="blog-read-more">%2$s</a></p>',
			esc_url( get_permalink( get_the_ID() ) ),
			/* translators: %s: Name of current post */
			esc_html__( 'Read More', 'job-portal' )
		);
	}
	return $link;
}
add_filter( 'excerpt_more', 'job_portal_excerpt_more' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function job_portal_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url(get_bloginfo( 'pingback_url' )) );
	}
}
add_action( 'wp_head', 'job_portal_pingback_header' );

add_action( 'admin_menu', 'job_portal_admin_menu');
function job_portal_admin_menu( ) {
    add_theme_page( esc_html__('Pro Feature','job-portal'), esc_html__('Job Portal Pro','job-portal'), 'manage_options', 'job-portal-pro-buynow', 'job_portal_pro_buy_now', 300 ); 
  
}
function job_portal_pro_buy_now(){ ?>  
  <div class="job_portal_pro_version">
  <a href="<?php echo esc_url('https://piperthemes.com/wordpress-themes/job-portal-pro/'); ?>" target="_blank">
    <img src ="<?php echo esc_url(get_template_directory_uri().'/assets/images/job-portal-pro-feature.png') ?>" width="70%" height="auto" />
  </a>
</div>
<?php }
// Hook into Forminator form submission

function handle_message_submission() {
    if (isset($_POST['send_message'])) {

        // Sanitize and validate inputs
        $sender_id = get_current_user_id();  // Automatically get current user ID
        $receiver_id = isset($_POST['receiver_id']) ? intval($_POST['receiver_id']) : 0;  // Receiver ID
        $msg_data = isset($_POST['msg_data']) ? sanitize_textarea_field($_POST['msg_data']) : '';  // Message Content
        $msg_time = current_time('mysql');  // Current timestamp for the message

        // Validate required fields
        if ($receiver_id > 0 && !empty($msg_data)) {
            global $wpdb;

            // Insert the data into the 'message' table
            $inserted = $wpdb->insert(
                'message',  // Your table name
                array(
                    'sender_id'   => $sender_id,
                    'receiver_id' => $receiver_id,
                    'msg_time'    => $msg_time,
                    'msg_data'    => $msg_data,
                ),
                array(
                    '%d',  // sender_id (integer)
                    '%d',  // receiver_id (integer)
                    '%s',  // msg_time (string)
                    '%s',  // msg_data (string)
                )
            );

            // Check if the data was inserted successfully
            if ($inserted) {
                // Optionally add a success message (can be displayed in the template)
                echo '<p>Your message has been sent successfully!</p>';
            } else {
                echo '<p>There was an error sending your message. Please try again.</p>';
            }
        } else {
            echo '<p>Please make sure all fields are filled out correctly.</p>';
        }
    }
}
add_action('wp_head', 'handle_message_submission');  // Add function to `wp_head` action hook
// Function to save jobseeker data to the database
function save_jobseeker_data() {
    // Check if the form is submitted
    if (isset($_POST['submit_jobseeker'])) {
        
        // Sanitize the form data to prevent malicious input
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $password = sanitize_text_field($_POST['password']);
        $phone_no = sanitize_text_field($_POST['phone_no']);
        $address = sanitize_textarea_field($_POST['address']);
        $skills = sanitize_text_field($_POST['skills']);
        
        // Hash the password before storing it securely
        $hashed_password = wp_hash_password($password);

        // Prepare the data to be inserted into the database
        global $wpdb;
        $table_name = 'jobseekers';  // Direct table name without prefix

        // Prepare data array for the database insert
        $data = array(
            'name' => $name,
            'email' => $email,
            'password' => $hashed_password,
            'phone_no' => $phone_no,
            'address' => $address,
            'skills' => $skills
        );

        // Insert the data into the database
        $inserted = $wpdb->insert($table_name, $data);

        // Check for errors and display a success/error message
        if ($inserted) {
            echo '<p>Registration successful!</p>'; // Success message
        } else {
            echo '<p>There was an error during registration. Please try again.</p>'; // Error message
        }
    }
}

// Hook the function into WordPress to process the form submission
add_action('wp_footer', 'save_jobseeker_data'); // Adjusted to 'wp_footer' to process after the page is loaded

function save_job_posting_to_database() {
    if (isset($_POST['submit_job_posting'])) {
        // Sanitize and validate inputs
        $jobid = isset($_POST['jobid']) ? sanitize_text_field($_POST['jobid']) : '';
        $companyid = isset($_POST['companyid']) ? sanitize_text_field($_POST['companyid']) : '';
        $job_title = isset($_POST['job_title']) ? sanitize_text_field($_POST['job_title']) : '';
        $description = isset($_POST['description']) ? sanitize_textarea_field($_POST['description']) : '';
        $job_type = isset($_POST['job_type']) ? sanitize_text_field($_POST['job_type']) : '';
        $salary = isset($_POST['salary']) ? sanitize_text_field($_POST['salary']) : '';

        // Validate required fields
        if (!empty($jobid) && !empty($companyid) && !empty($job_title) && !empty($description) && !empty($job_type) && !empty($salary)) {
            global $wpdb;

            // Directly reference the 'jobposting' table (no prefix)
            $table_name = 'jobposting';  // Table name without prefix

            // Prepare the data for insertion into the database
            $data = array(
                'jobid' => $jobid,
                'companyid' => $companyid,
                'job_title' => $job_title,
                'description' => $description,
                'job_type' => $job_type,
                'salary' => $salary,
            );

            // Insert the data into the 'jobposting' table
            $inserted = $wpdb->insert(
                $table_name,  // Directly use the table name
                $data,        // The data to insert
                array(
                    '%d',  // jobid (integer)
                    '%d',  // companyid (integer)
                    '%s',  // job_title (string)
                    '%s',  // description (string)
                    '%s',  // job_type (string)
                    '%d',  // salary (integer)
                )
            );

            // Check if the data was inserted successfully
            if ($inserted) {
                echo '<p>Job posting submitted successfully!</p>';
            } else {
                // Log the error to help debug
                $error = $wpdb->last_error;
                echo '<p>Error: There was an issue submitting the job posting.</p>';
                if ($error) {
                    echo '<p>Database Error: ' . $error . '</p>';
                }
            }
        } else {
            echo '<p>Please make sure all fields are filled out correctly.</p>';
        }
    }
}

// Hook the function to WordPress to ensure it's executed
add_action('wp_footer', 'save_job_posting_to_database');

function save_job_application_to_database() {
    if (isset($_POST['submit_job_application'])) {
        // Sanitize and validate inputs
        $app_id = isset($_POST['app_id']) ? intval($_POST['app_id']) : 0;
        $jobseeker_id = isset($_POST['jobseeker_id']) ? intval($_POST['jobseeker_id']) : 0;
        $job_id = isset($_POST['job_id']) ? intval($_POST['job_id']) : 0;
        $date = isset($_POST['date']) ? sanitize_text_field($_POST['date']) : '';
        $coverletter = isset($_POST['coverletter']) ? sanitize_textarea_field($_POST['coverletter']) : '';
        $status = isset($_POST['status']) ? sanitize_text_field($_POST['status']) : '';

        // Validate required fields
        if (!empty($app_id) && !empty($jobseeker_id) && !empty($job_id) && !empty($date) && !empty($coverletter) && !empty($status)) {
            global $wpdb;

            // Directly reference the 'application' table (correct table name)
            $table_name = 'application';  // Correct table name

            // Prepare the data for insertion into the database
            $data = array(
                'app_id' => $app_id,
                'jobseeker_id' => $jobseeker_id,
                'job_id' => $job_id,
                'date' => $date,
                'coverletter' => $coverletter,
                'status' => $status,
            );

            // Data types according to your database schema
            $data_format = array(
                '%d',  // app_id (integer)
                '%d',  // jobseeker_id (integer)
                '%d',  // job_id (integer)
                '%s',  // date (string, it will be in datetime format)
                '%s',  // coverletter (string)
                '%s',  // status (string)
            );

            // Insert the data into the 'application' table
            $inserted = $wpdb->insert(
                $table_name,  // Use the correct table name
                $data,        // The data to insert
                $data_format  // Data format types
            );

            // Check if the data was inserted successfully
            if ($inserted) {
                echo '<p>Job application submitted successfully!</p>';
            } else {
                // Log the error to help debug
                $error = $wpdb->last_error;
                echo '<p>Error: There was an issue submitting the job application.</p>';
                if ($error) {
                    echo '<p>Database Error: ' . $error . '</p>';
                } else {
                    echo '<p>No error message from the database, check the SQL query manually.</p>';
                }

                // Optionally, log the error details
                error_log('Error inserting job application: ' . $wpdb->last_error);
                error_log('SQL Query: ' . $wpdb->last_query);
            }
        } else {
            echo '<p>Please make sure all fields are filled out correctly.</p>';
        }
    }
}

// Hook the function to WordPress to ensure it's executed
add_action('wp_footer', 'save_job_application_to_database');
function save_company_details_to_database() {
    if (isset($_POST['submit_company_details'])) {
        // Sanitize and validate inputs
        $companyid = isset($_POST['companyid']) ? intval($_POST['companyid']) : 0;
        $c_name = isset($_POST['c_name']) ? sanitize_text_field($_POST['c_name']) : '';
        $c_email = isset($_POST['c_email']) ? sanitize_email($_POST['c_email']) : '';
        $password = isset($_POST['password']) ? sanitize_text_field($_POST['password']) : '';
        $phone_no = isset($_POST['phone_no']) ? sanitize_text_field($_POST['phone_no']) : '';
        $address = isset($_POST['address']) ? sanitize_textarea_field($_POST['address']) : '';
        $industry = isset($_POST['industry']) ? sanitize_text_field($_POST['industry']) : '';

        // Validate required fields
        if (!empty($companyid) && !empty($c_name) && !empty($c_email) && !empty($password) && !empty($phone_no) && !empty($address) && !empty($industry)) {
            global $wpdb;

            // Reference the 'company' table (no prefix)
            $table_name = 'company';  // Table name without prefix

            // Prepare the data for insertion into the database
            $data = array(
                'companyid' => $companyid,
                'c_name' => $c_name,
                'c_email' => $c_email,
                'password' => $password,
                'phone_no' => $phone_no,
                'address' => $address,
                'industry' => $industry,
            );

            // Data types according to your database schema
            $data_format = array(
                '%d',  // companyid (integer)
                '%s',  // c_name (string)
                '%s',  // c_email (string)
                '%s',  // password (string)
                '%s',  // phone_no (string)
                '%s',  // address (string)
                '%s',  // industry (string)
            );

            // Insert the data into the 'company' table
            $inserted = $wpdb->insert(
                $table_name,  // Directly use the table name
                $data,        // The data to insert
                $data_format  // Data format types
            );

            // Check if the data was inserted successfully
            if ($inserted) {
                echo '<p>Company details submitted successfully!</p>';
            } else {
                // Log the error to help debug
                $error = $wpdb->last_error;
                echo '<p>Error: There was an issue submitting the company details.</p>';
                if ($error) {
                    echo '<p>Database Error: ' . $error . '</p>';
                } else {
                    echo '<p>No error message from the database, check the SQL query manually.</p>';
                }

                // Optionally, log the error details
                error_log('Error inserting company details: ' . $wpdb->last_error);
                error_log('SQL Query: ' . $wpdb->last_query);
            }
        } else {
            echo '<p>Please make sure all fields are filled out correctly.</p>';
        }
    }
}

// Hook the function to WordPress to ensure it's executed
add_action('wp_footer', 'save_company_details_to_database');

function save_interview_details_to_database() {
    if (isset($_POST['submit_interview_details'])) {
        // Sanitize and validate inputs
        $interview_id = isset($_POST['interview_id']) ? intval($_POST['interview_id']) : 0;
        $interview_date = isset($_POST['interview_date']) ? sanitize_text_field($_POST['interview_date']) : '';
        $interview_status = isset($_POST['interview_status']) ? sanitize_text_field($_POST['interview_status']) : '';
        $interviewer = isset($_POST['interviewer']) ? sanitize_text_field($_POST['interviewer']) : '';

        // Validate required fields
        if (!empty($interview_id) && !empty($interview_date) && !empty($interview_status) && !empty($interviewer)) {
            global $wpdb;

            // Reference the 'interview' table (no prefix)
            $table_name = 'interview';  // Table name without prefix

            // Prepare the data for insertion into the database
            $data = array(
                'interview_id' => $interview_id,
                'interview_date' => $interview_date,
                'interview_status' => $interview_status,
                'interviewer' => $interviewer,
            );

            // Data types according to your database schema
            $data_format = array(
                '%d',  // interview_id (integer)
                '%s',  // interview_date (string, in datetime format)
                '%s',  // interview_status (string)
                '%s',  // interviewer (string)
            );

            // Insert the data into the 'interview' table
            $inserted = $wpdb->insert(
                $table_name,  // Directly use the table name
                $data,        // The data to insert
                $data_format  // Data format types
            );

            // Check if the data was inserted successfully
            if ($inserted) {
                echo '<p>Interview details submitted successfully!</p>';
            } else {
                // Log the error to help debug
                $error = $wpdb->last_error;
                echo '<p>Error: There was an issue submitting the interview details.</p>';
                if ($error) {
                    echo '<p>Database Error: ' . $error . '</p>';
                } else {
                    echo '<p>No error message from the database, check the SQL query manually.</p>';
                }

                // Optionally, log the error details
                error_log('Error inserting interview details: ' . $wpdb->last_error);
                error_log('SQL Query: ' . $wpdb->last_query);
            }
        } else {
            echo '<p>Please make sure all fields are filled out correctly.</p>';
        }
    }
}

// Hook the function to WordPress to ensure it's executed
add_action('wp_footer', 'save_interview_details_to_database');


include get_template_directory().'/inc/enqueues.php';
include get_template_directory().'/inc/theme-customization.php';
include get_template_directory().'/inc/theme-default-setup.php';
include get_template_directory().'/inc/class-tgm-plugin-activation.php';
