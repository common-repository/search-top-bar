<?php

function jlgstb_admin_menu() {
  add_menu_page('Search Top Bar', 'Search Top Bar', 'administrator', __FILE__, 'jlgstb_settingspage', 'dashicons-search');
}

function jlgstb_register_settings() {
  register_setting( 'jlgstb_settings-group', 'jlgstb_settings' );
  //general
  add_settings_section( 'jlgstb-section-general', 'General', '', '__FILE__' );
  add_settings_field( 'jlgstb-status', 'Plugin Status', 'jlgstb_status_cb', '__FILE__', 'jlgstb-section-general' );
  add_settings_field( 'jlgstb-background', 'Top Bar Background', 'jlgstb_background_cb', '__FILE__', 'jlgstb-section-general' );
  add_settings_field( 'jlgstb-height', 'Top Bar Height', 'jlgstb_height_cb', '__FILE__', 'jlgstb-section-general' );
  add_settings_field( 'jlgstb-padding', 'Padding Left/Right', 'jlgstb_padding_cb', '__FILE__', 'jlgstb-section-general' );
  //search bar
  add_settings_section( 'jlgstb-section-sb', 'Search Bar', '', '__FILE__' );
  add_settings_field( 'jlgstb-sb-visibility', 'Visibility', 'jlgstb_sb_visibility_cb', '__FILE__', 'jlgstb-section-sb' );
  add_settings_field( 'jlgstb-sb-style', 'Search Bar Style', 'jlgstb_sb_style_cb', '__FILE__', 'jlgstb-section-sb' );
  add_settings_field( 'jlgstb-sb-height', 'Search Bar Height', 'jlgstb_sb_height_cb', '__FILE__', 'jlgstb-section-sb' );
  add_settings_field( 'jlgstb-sb-txt-button', 'Button Text', 'jlgstb_sb_txt_button_cb', '__FILE__', 'jlgstb-section-sb' );
  add_settings_field( 'jlgstb-sb-txt-button-color', 'Button Text Color', 'jlgstb_sb_txt_button_color_cb', '__FILE__', 'jlgstb-section-sb' );
  add_settings_field( 'jlgstb-sb-bg-button', 'Button Background Color', 'jlgstb_sb_bg_button_cb', '__FILE__', 'jlgstb-section-sb' );
  add_settings_field( 'jlgstb-sb-txt-field', 'Field Text', 'jlgstb_sb_txt_field_cb', '__FILE__', 'jlgstb-section-sb' );
  add_settings_field( 'jlgstb-sb-txt-field-color', 'Field Text Color', 'jlgstb_sb_txt_field_color_cb', '__FILE__', 'jlgstb-section-sb' );
  add_settings_field( 'jlgstb-sb-bg-field', 'Field Background Color', 'jlgstb_sb_bg_field_cb', '__FILE__', 'jlgstb-section-sb' );
  //information bar
  add_settings_section( 'jlgstb-section-inf', 'Information Bar', '', '__FILE__' );
  add_settings_field( 'jlgstb-inf-phone-icon', 'Phone Icon Style', 'jlgstb_inf_phone_icon_cb', '__FILE__', 'jlgstb-section-inf' );
  add_settings_field( 'jlgstb-inf-phone-txt', 'Phone Number', 'jlgstb_inf_phone_txt_cb', '__FILE__', 'jlgstb-section-inf' );
  add_settings_field( 'jlgstb-inf-email-icon', 'Email Icon Style', 'jlgstb_inf_email_icon_cb', '__FILE__', 'jlgstb-section-inf' );
  add_settings_field( 'jlgstb-inf-email-txt', 'Email Address', 'jlgstb_inf_email_txt_cb', '__FILE__', 'jlgstb-section-inf' );
  add_settings_field( 'jlgstb-inf-icons-size', 'Icons Size', 'jlgstb_inf_icons_size_cb', '__FILE__', 'jlgstb-section-inf' );
  add_settings_field( 'jlgstb-inf-icons-color', 'Icons Color', 'jlgstb_inf_icons_color_cb', '__FILE__', 'jlgstb-section-inf' );
  add_settings_field( 'jlgstb-inf-txt-size', 'Text Size', 'jlgstb_inf_txt_size_cb', '__FILE__', 'jlgstb-section-inf' );
  add_settings_field( 'jlgstb-inf-txt-color', 'Text Color', 'jlgstb_inf_txt_color_cb', '__FILE__', 'jlgstb-section-inf' );
}

/********************************* FIELDS **********************************/
//general
function jlgstb_status_cb() {
  $options = (array) get_option('jlgstb_settings');
  $opt = esc_attr( $options['jlgstb-status'] );
  if ($opt=='') $opt='1';?>
  <div><input type="radio" name="jlgstb_settings[jlgstb-status]" value='1' <?php checked('1' == $opt, true);?>>Active</div>
  <div><input type="radio" name="jlgstb_settings[jlgstb-status]" value='2' <?php checked('2' == $opt, true);?>>Inactive</div>
<?php
}
function jlgstb_background_cb() {
  $options = (array) get_option('jlgstb_settings');
  $opt = esc_attr( $options['jlgstb-background'] );
  if ($opt=="")$opt="rgba(255,255,255,1)";
  echo '<input type="text" class="jlg_color_field" data-default-color="#fff" name="jlgstb_settings[jlgstb-background]" value="' . sanitize_text_field($opt) . '"/>';
}
function jlgstb_height_cb() {
  $options = (array) get_option('jlgstb_settings');
  $opt = esc_attr( $options['jlgstb-height'] );
  if ($opt<30 || $opt>1000)$opt=50;
  echo "<input type='number' name='jlgstb_settings[jlgstb-height]' min='30' max='1000' value='$opt'/>px";
}
function jlgstb_padding_cb() {
  $options = (array) get_option('jlgstb_settings');
  $opt = esc_attr( $options['jlgstb-padding'] );
  if ($opt<0 || $opt>1000 || $opt=="")$opt=70;
  echo "<input type='number' name='jlgstb_settings[jlgstb-padding]' min='0' max='1000' value='$opt'/>px";
}
//search bar
function jlgstb_sb_visibility_cb() {
  $options = (array) get_option('jlgstb_settings');
  $opt = esc_attr( $options['jlgstb-sb-visibility'] );
  if ($opt=='') $opt='1';?>
  <div><input type="radio" name="jlgstb_settings[jlgstb-sb-visibility]" value='1' <?php checked('1' == $opt, true);?>>Show</div>
  <div><input type="radio" name="jlgstb_settings[jlgstb-sb-visibility]" value='2' <?php checked('2' == $opt, true);?>>Hidden</div>
  <?php
}
function jlgstb_sb_style_cb() {
  $options = (array) get_option('jlgstb_settings');
  $opt = esc_attr( $options['jlgstb-sb-style'] );
  if($opt=='')$opt=plugins_url( 'img/img-style1.JPG', dirname(__FILE__));
  if($opt=="style-1")$opt=plugins_url( 'img/img-style1.JPG', dirname(__FILE__));
  if($opt=="style-2")$opt=plugins_url( 'img/img-style2.JPG', dirname(__FILE__))?>
  <select name="jlgstb_settings[jlgstb-sb-style]" onchange="jQuery('#imageToSwap').attr('src', this.options[this.selectedIndex].value);" class='jlg_style_select'>
      <option value="<?php echo plugins_url( 'img/img-style1.JPG', dirname(__FILE__))?>" <?php if($opt == plugins_url( 'img/img-style1.JPG', dirname(__FILE__))){ echo 'selected'; }?>>Style 1 - oval</option>
      <option value="<?php echo plugins_url( 'img/img-style2.JPG', dirname(__FILE__))?>" <?php if($opt == plugins_url( 'img/img-style2.JPG', dirname(__FILE__))){ echo 'selected'; }?>>Style 2 - square</option>
  </select>
  <?php
  echo '<br><br>Example:<br><br><img id="imageToSwap" src="'.$opt.'" width=400px > ';
}
function jlgstb_sb_height_cb() {
  $options = (array) get_option('jlgstb_settings');
  $opt = esc_attr( $options['jlgstb-sb-height'] );
  if ($opt<25 || $opt>1000)$opt=40;
  echo "<input type='number' name='jlgstb_settings[jlgstb-sb-height]' min='25' max='1000' value='$opt'/>px";
}
function jlgstb_sb_url_to_style($opt){
  if ($opt==plugins_url( 'img/img-style2.JPG', dirname(__FILE__)))$opt="style-2";
  else $opt="style-1";
  return $opt;
}
function jlgstb_sb_bg_button_cb() {
  $options = (array) get_option('jlgstb_settings');
  $opt = esc_attr( $options['jlgstb-sb-bg-button'] );
  if ($opt=="")$opt="#1e73be";
  echo '<input type="text" class="jlg_color_field" data-default-color="#1e73be" name="jlgstb_settings[jlgstb-sb-bg-button]" value="' . sanitize_text_field($opt) . '"/>';
}
function jlgstb_sb_txt_button_cb() {
  $options = (array) get_option('jlgstb_settings');
  $opt = esc_attr( $options['jlgstb-sb-txt-button'] );
  echo "<input type='text' class='jlg_input_text' placeholder='Search' name='jlgstb_settings[jlgstb-sb-txt-button]' value='$opt' />";
}
function jlgstb_sb_txt_button_color_cb() {
  $options = (array) get_option('jlgstb_settings');
  $opt = esc_attr( $options['jlgstb-sb-txt-button-color'] );
  if ($opt=="")$opt="#fff";
  echo '<input type="text" class="jlg_color_field" data-default-color="#fff" name="jlgstb_settings[jlgstb-sb-txt-button-color]" value="' . sanitize_text_field($opt) . '"/>';
}
function jlgstb_sb_txt_field_cb() {
  $options = (array) get_option('jlgstb_settings');
  $opt = esc_attr( $options['jlgstb-sb-txt-field'] );
  echo "<input type='text' class='jlg_input_text' placeholder='Type to Search...' name='jlgstb_settings[jlgstb-sb-txt-field]' value='$opt' />";
}
function jlgstb_sb_bg_field_cb() {
  $options = (array) get_option('jlgstb_settings');
  $opt = esc_attr( $options['jlgstb-sb-bg-field'] );
  if ($opt=="")$opt="#fff";
  echo '<input type="text" class="jlg_color_field" data-default-color="#fff" name="jlgstb_settings[jlgstb-sb-bg-field]" value="' . sanitize_text_field($opt) . '"/>';
}
function jlgstb_sb_txt_field_color_cb() {
  $options = (array) get_option('jlgstb_settings');
  $opt = esc_attr( $options['jlgstb-sb-txt-field-color'] );
  if ($opt=="")$opt="#888";
  echo '<input type="text" class="jlg_color_field" data-default-color="#888" name="jlgstb_settings[jlgstb-sb-txt-field-color]" value="' . sanitize_text_field($opt) . '"/>';
}

//Information bar
function jlgstb_inf_phone_icon_cb(){
  $options = (array) get_option('jlgstb_settings');
  $opt = esc_attr( $options['jlgstb-inf-phone-icon'] );
  if($opt=='')$opt="phone-1";?>
  <select class='fas' name="jlgstb_settings[jlgstb-inf-phone-icon]" class='jlg_icon_select'>
    <option value="phone-1" <?php if($opt == 'phone-1'){ echo 'selected'; }?> class='fas'>&#xf095;</option>
    <option value="phone-2" <?php if($opt == 'phone-2'){ echo 'selected'; }?> class='fas'>&#xf3cd;</option>
    <option value="phone-3" <?php if($opt == 'phone-3'){ echo 'selected'; }?> class='fas'>&#xf10b;</option>
  </select>
  <?php
}
function jlgstb_inf_phone_txt_cb() {
  $options = (array) get_option('jlgstb_settings');
  $opt = esc_attr( $options['jlgstb-inf-phone-txt'] );
  echo "<input type='text' class='jlg_input_text' placeholder='(201) 555 55 55' name='jlgstb_settings[jlgstb-inf-phone-txt]' value='$opt' />";
}
function jlgstb_inf_email_icon_cb() {
  $options = (array) get_option('jlgstb_settings');
  $opt = esc_attr( $options['jlgstb-inf-email-icon'] );
  if($opt=='')$opt="email-1";?>
  <select class='far' name="jlgstb_settings[jlgstb-inf-email-icon]" class='jlg_icon_select'>
    <option value="email-1" <?php if($opt == 'email-1'){ echo 'selected'; }?> class='far'>&#xf0e0;</option>
    <option value="email-2" <?php if($opt == 'email-2'){ echo 'selected'; }?> class='far'>&#xf2b6;</option>
    <option value="email-3" <?php if($opt == 'email-3'){ echo 'selected'; }?> class='far'>&#xf1d8;</option>
  </select>
  <?php
}
function jlgstb_inf_email_txt_cb() {
  $options = (array) get_option('jlgstb_settings');
  $opt = esc_attr( $options['jlgstb-inf-email-txt'] );
  echo "<input type='text' class='jlg_input_text' placeholder='my_email@domain.com' name='jlgstb_settings[jlgstb-inf-email-txt]' value='$opt' />";
}
function jlgstb_inf_icons_size_cb() {
  $options = (array) get_option('jlgstb_settings');
  $opt = esc_attr( $options['jlgstb-inf-icons-size'] );
  if ($opt<=0 || $opt>1000)$opt=15;
  echo "<input type='number' name='jlgstb_settings[jlgstb-inf-icons-size]' min='0' max='1000' value='$opt' />px";
}
function jlgstb_inf_icons_color_cb() {
  $options = (array) get_option('jlgstb_settings');
  $opt = esc_attr( $options['jlgstb-inf-icons-color'] );
  if ($opt=="")$opt="rgba(0,0,0,1)";
  echo '<input type="text" class="jlg_color_field" data-default-color="rgba(0,0,0,1)" name="jlgstb_settings[jlgstb-inf-icons-color]" value="' . sanitize_text_field($opt) . '"/>';
}
function jlgstb_inf_txt_size_cb() {
  $options = (array) get_option('jlgstb_settings');
  $opt = esc_attr( $options['jlgstb-inf-txt-size'] );
  if ($opt<=0 || $opt>1000)$opt=15;
  echo "<input type='number' name='jlgstb_settings[jlgstb-inf-txt-size]' min='0' max='1000' value='$opt' />px";
}
function jlgstb_inf_txt_color_cb() {
  $options = (array) get_option('jlgstb_settings');
  $opt = esc_attr( $options['jlgstb-inf-txt-color'] );
  if ($opt=="")$opt="rgba(0,0,0,1)";
  echo '<input type="text" class="jlg_color_field" data-default-color="rgba(0,0,0,1)" name="jlgstb_settings[jlgstb-inf-txt-color]" value="' . sanitize_text_field($opt) . '"/>';
}
/**************************************************************************/

//Settings Page
function jlgstb_settingspage() {?>
  <div class="wrap">
    <h2 class="jlg_admin_title">Search Top Bar Options</h2>
    <form class="jlg_admin_form" action="options.php" method="POST">
      <?php settings_fields( 'jlgstb_settings-group' ); ?>
      <?php do_settings_sections( '__FILE__'); ?>
      <?php submit_button(); ?>
    </form>
  </div>
<?php
}

function jlgstb_set_fields(){
  $options = (array) get_option('jlgstb_settings');
  $theme = "".wp_get_theme();

  //array
  $jlgstb_settings = array(
    'theme'           => $theme,
    //general
    'status'          => esc_attr( $options['jlgstb-status'] ),
    'background'      => esc_attr( $options['jlgstb-background'] ),
    'height'          => esc_attr( $options['jlgstb-height'] ),
    'padding'         => esc_attr( $options['jlgstb-padding'] ),
    //search bar
    'sb_visibility'   => esc_attr( $options['jlgstb-sb-visibility'] ),
    'sb_style'        => jlgstb_sb_url_to_style(esc_attr( $options['jlgstb-sb-style'] )),
    'sb_height'       => esc_attr( $options['jlgstb-sb-height'] ),
    'sb_button_bg'    => esc_attr( $options['jlgstb-sb-bg-button'] ),
    'sb_button_txt'   => esc_attr( $options['jlgstb-sb-txt-button'] ),
    'sb_button_txt_color' => esc_attr( $options['jlgstb-sb-txt-button-color'] ),
    'sb_txt_field'    => esc_attr( $options['jlgstb-sb-txt-field'] ),
    'sb_field_bg'     => esc_attr( $options['jlgstb-sb-bg-field'] ),
    'sb_field_txt_color' => esc_attr( $options['jlgstb-sb-txt-field-color'] ),
    //information bar
    'inf_phone_icon'  => esc_attr( $options['jlgstb-inf-phone-icon'] ),
    'inf_phone_txt'   => esc_attr( $options['jlgstb-inf-phone-txt'] ),
    'inf_email_icon'  => esc_attr( $options['jlgstb-inf-email-icon'] ),
    'inf_email_txt'   => esc_attr( $options['jlgstb-inf-email-txt'] ),
    'inf_icons_size'  => esc_attr( $options['jlgstb-inf-icons-size'] ),
    'inf_icons_color' => esc_attr( $options['jlgstb-inf-icons-color'] ),
    'inf_txt_size'    => esc_attr( $options['jlgstb-inf-txt-size'] ),
    'inf_txt_color'   => esc_attr( $options['jlgstb-inf-txt-color'] ),
  );
  return $jlgstb_settings;
}
?>
