<?php
/**
 * Name: Panel Profile
 * GitHub URI: https://github.com/greenhouse47
 * Description: Panel Profile User
 * Author: Albert Sukmono
 * Twitter: @greenbox_id
 * Author website: http://www.greenboxindonesia.com
 */

/*---------------------------------------------------
register settings
----------------------------------------------------*/
function theme_settings_init(){
register_setting( 'theme_settings', 'theme_settings' );
wp_enqueue_style("panel_style", get_template_directory_uri()."/boxfunctions/panel/css/panel.css", false, "1.0", "all");
wp_enqueue_script("panel_script", get_template_directory_uri()."/boxfunctions/panel/js/panel_script.js", false, "1.0");
}
 
/*---------------------------------------------------
add settings page to menu
----------------------------------------------------*/
function add_settings_page() {
add_menu_page( __( 'Green Panel' .' Beta' ), __( 'Green' .' Panel' ), 'manage_options', 'settings', 'theme_settings_page');
}
 
/*---------------------------------------------------
add actions
----------------------------------------------------*/
add_action( 'admin_init', 'theme_settings_init' );
add_action( 'admin_menu', 'add_settings_page' );

/* ----------------------------------------------------------
Declare vars
-----------------------------------------------------------*/
$themename = "Greenhouse Beta";
$shortname = "greenhouse";
 
/* ---------------------------------------------------------
Declare options
----------------------------------------------------------- */
 
$theme_options = array (
 
array( "name" => $themename." Options",
"type" => "title"),
 
/* ---------------------------------------------------------
Profile User section
----------------------------------------------------------- */
array( "name" => "Profile User",
"type" => "section"),
array( "type" => "open"),

array( "name" => "Your Company/ Organization",
"desc" => "You can input your address company in her.",
"id" => $shortname."_company",
"type" => "text",
"std" => "Greenboxindonesia"),

array( "name" => "Your Country",
"desc" => "You can input your country life in her.",
"id" => $shortname."_country",
"type" => "text",
"std" => "Indonesia"),

array( "name" => "Your Email",
"desc" => "You can input your Email in her.",
"id" => $shortname."_email",
"type" => "text",
"std" => "info@gb.co.id"),

array( "name" => "Yout Contact",
"desc" => "You can input your contact company in her.",
"id" => $shortname."_contact",
"type" => "text",
"std" => "+62800000000"),
 
array( "type" => "close"),

/*---------------------------------------------------------
Social Media
---------------------------------------------------------*/
array( "name" => "Social Media",
"type" => "section"), 
array( "type" => "open"),
	
array( "name" => "Facebook Page",
"desc" => "Insert The Full URL Location Of Your Social Account <br /><em>*leave blank if not use</em>",
"id" => $shortname."_facebook",
"type" => "text",
"std" => "http://www.facebook.com/greenboxindonesia"),

array( "name" => "Github",
"desc" => "Insert The Full URL Location Of Your Social Account <br /><em>*leave blank if not use</em>",
"id" => $shortname."_github",
"type" => "text",
"std" => "https://github.com/greenboxindonesia"),

array( "name" => "Twitter",
"desc" => "Insert The Full URL Location Of Your Social Account <br /><em>*leave blank if not use</em>",
"id" => $shortname."_twitter",
"type" => "text",
"std" => "http://www.twitter.com/greenbox_id"),
	 
array( "type" => "close"),

/*---------------------------------------------------------
Google Analytics
---------------------------------------------------------*/
array( "name" => "Google Analytics",
"type" => "section"), 
array( "type" => "open"),
	
array( "name" => "Google Analytic Code",
"desc" => "This code will be added to the footer before the &lt;/body&gt; closing tag. To get the code visi <a href='https://www.google.com/analytics/' target='_blank'>Google Analytics</a>",
"id" => $shortname."_analytics",
"type" => "textarea",
"std" => "<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-39293146-1', 'hmi.or.id');
  ga('send', 'pageview');

</script>"
),
	 
array( "type" => "close"),

);

/*---------------------------------------------------
Theme Panel Output
----------------------------------------------------*/
function theme_settings_page() {
    global $themename,$theme_options;
    $i=0;
    $message=''; 
    if ( 'save' == $_REQUEST['action'] ) {
      
        foreach ($theme_options as $value) {
            update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
      
        foreach ($theme_options as $value) {
            if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
        $message='saved';
    }
    else if( 'reset' == $_REQUEST['action'] ) {
          
        foreach ($theme_options as $value) {
            delete_option( $value['id'] ); }
        $message='reset';        
    }
  
    ?>
    <div class="wrap options_wrap">
        <div id="icon-options-general"></div>
        <h2><?php _e( ' Greenhouse Themes Panel Beta I' ) //your admin panel title ?></h2>
        <?php
        if ( $message=='saved' ) echo '<div class="updated settings-error" id="setting-error-settings_updated"> 
        <p>'.$themename.' settings saved.</strong></p></div>';
        if ( $message=='reset' ) echo '<div class="updated settings-error" id="setting-error-settings_updated"> 
        <p>'.$themename.' settings reset.</strong></p></div>';
        ?>
        <ul>
            <li>View Documentation |</li>
            <li>Visit Support |</li>
            <li><a href="https://github.com/greenboxindonesia" target="_blank">Theme version 1.0</a></li>
        </ul>
        <div class="content_options">
            <form method="post">
  
            <?php foreach ($theme_options as $value) {
          
                switch ( $value['type'] ) {
              
                    case "open": ?>
                    <?php break;
                  
                    case "close": ?>
                    </div>
                    </div><br />
                    <?php break;
                  
                    case "title": ?>
                    <div class="message">
                        <p>To easily use the <?php echo $themename;?> theme options, you can use the options below.</p>
                    </div>
                    <?php break;
                  
                    case 'text': ?>
                    <div class="option_input option_text">
                    <label for="<?php echo $value['id']; ?>">
                    <?php echo $value['name']; ?></label>
                    <input id="" type="<?php echo $value['type']; ?>" name="<?php echo $value['id']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
                    <small><?php echo $value['desc']; ?></small>
                    <div class="clearfix"></div>
                    </div>
                    <?php break;
                  
                    case 'textarea': ?>
                    <div class="option_input option_textarea">
                    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
                    <textarea name="<?php echo $value['id']; ?>" rows="" cols=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
                    <small><?php echo $value['desc']; ?></small>
                    <div class="clearfix"></div>
                    </div>
                    <?php break;
                  
                    case 'select': ?>
                    <div class="option_input option_select">
                    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
                    <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                    <?php foreach ($value['options'] as $option) { ?>
                            <option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option>
                    <?php } ?>
                    </select>
                    <small><?php echo $value['desc']; ?></small>
                    <div class="clearfix"></div>
                    </div>
                    <?php break;
                  
                    case "checkbox": ?>
                    <div class="option_input option_checkbox">
                    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
                    <?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
                    <input id="<?php echo $value['id']; ?>" type="checkbox" name="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> /> 
                    <small><?php echo $value['desc']; ?></small>
                    <div class="clearfix"></div>
                    </div>
                    <?php break;
                  
                    case "section": 
                    $i++; ?>
                    <div class="input_section">
                    <div class="input_title">
                         
                        <h3><img src="<?php echo get_template_directory_uri();?>/img/setting.png" alt="">&nbsp;<?php echo $value['name']; ?></h3>
                        <span class="submit"><input name="save<?php echo $i; ?>" type="submit" class="button-primary" value="Save changes" /></span>
                        <div class="clearfix"></div>
                    </div>
                    <div class="all_options">
                    <?php break;
                     
                }
            }?>
          <input type="hidden" name="action" value="save" />
          </form>
          <form method="post">
              <p class="submit">
              <input name="reset" type="submit" value="Reset" />
              <input type="hidden" name="action" value="reset" />
              </p>
          </form>
        </div>
        <div class="footer-credit">
            <p>© Create by <a title="Greenhouse Project" href="http://www.greenboxindonesia.com" target="_blank" >Greenboxindonesia</a> |  News & Update Development on <a title="Greenhouse Project" href="http://news.greenbox.web.id" target="_blank" >Official Blog Greenboxindonesia</a></p>
        </div>
    </div>
    <?php
}
?>
