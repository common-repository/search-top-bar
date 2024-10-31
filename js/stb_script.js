;(function($){
jQuery(document).ready(function (){

  var theme = jlgstb_settings.theme;
  //general
  var status = jlgstb_settings.status;
  var background = jlgstb_settings.background;
  var height = jlgstb_settings.height;
  var padding = jlgstb_settings.padding;
  //search bar
  var sb_visibility = jlgstb_settings.sb_visibility;
  var sb_style = jlgstb_settings.sb_style;
  var sb_height = jlgstb_settings.sb_height;
  var sb_button_bg = jlgstb_settings.sb_button_bg;
  var sb_button_txt = jlgstb_settings.sb_button_txt;
  var sb_button_txt_color = jlgstb_settings.sb_button_txt_color;
  var sb_txt_field = jlgstb_settings.sb_txt_field;
  var sb_field_bg = jlgstb_settings.sb_field_bg;
  var sb_field_txt_color = jlgstb_settings.sb_field_txt_color;
  //information bar
  var inf_phone_icon = jlgstb_settings.inf_phone_icon;
  var inf_phone_txt = jlgstb_settings.inf_phone_txt;
  var inf_email_icon = jlgstb_settings.inf_email_icon;
  var inf_email_txt = jlgstb_settings.inf_email_txt;
  var inf_icons_size = jlgstb_settings.inf_icons_size;
  var inf_icons_color = jlgstb_settings.inf_icons_color;
  var inf_txt_size = jlgstb_settings.inf_txt_size;
  var inf_txt_color = jlgstb_settings.inf_txt_color;

  /* --- search bar settings --- */

  if (sb_visibility == "")sb_visibility="1";
  if (sb_height <25 || sb_height>1000)sb_height=40;
  if (sb_button_txt == "")sb_button_txt='Search';
  if (sb_button_txt_color == 0)sb_button_txt_color='#fff';
  if (sb_button_bg == 0)sb_button_bg='#1e73be';
  if (sb_txt_field == "")sb_txt_field="Type to Search...";
  if (sb_field_txt_color == 0)sb_field_txt_color='#888';
  if (sb_field_bg == 0)sb_field_bg='#fff';

  $('body').append('<style>#jlg_search_field::placeholder{color:'+sb_field_txt_color+'}</style>')

  var js_sb_style="";
  if (sb_style=="style-1"||sb_style==""||sb_style==null)js_sb_style="jlg-sb-style-1";
  else js_sb_style="jlg-sb-style-2";

  var js_sb_column="";
  if ((inf_phone_txt==null||inf_phone_txt=="")&&(inf_email_txt==null||inf_email_txt=="")){
    js_sb_column="jlg_column_12";
  }
  else js_sb_column="jlg_column_22";

  var js_sb_search_bar="";
  if (sb_visibility=='1'){
    var js_sb_search_bar = '<div id="jlg-top-search" class="'+js_sb_column+' '+js_sb_style+'">'
    +'<form id="jlg_search_bar" role="search" method="get" action="#">'
  	+'<input id="jlg_search_field"  style="height:'+sb_height+'px;background:'+sb_field_bg+';  color:'+sb_field_txt_color+'"  type="search" placeholder="'+sb_txt_field+'" value="" name="s" />'
  	+'<input style="height:'+sb_height+'px;background:'+sb_button_bg+'; color:'+sb_button_txt_color+'" type="submit" value="'+sb_button_txt+'" />'
    +'</form>'
    +'</div>';
  }

  /* --- information bar --- */

  if (inf_icons_size<0||inf_icons_size>1000)inf_icons_size=15;
  if (inf_icons_color == 0)inf_icons_color='#000';
  if (inf_txt_size<0||inf_txt_size>1000)inf_txt_size=15;
  if (inf_txt_color == 0)inf_txt_color='#000';

  var js_inf_phone_icon="";
  var js_inf_display_phone="";
  if (inf_phone_txt==null||inf_phone_txt==""){
    inf_phone_txt="";
    js_inf_display_phone="style='display:none;'";
  }else{
    if (inf_phone_icon=="phone-1")js_inf_phone_icon="&#xf095;";
    else if (inf_phone_icon=="phone-2") js_inf_phone_icon="&#xf3cd;";
    else js_inf_phone_icon="&#xf10b;";
  }

  var js_inf_email_icon="";
  var js_inf_display_email="";
  if (inf_email_txt==null||inf_email_txt==""){
    inf_email_txt="";
    js_inf_display_email="style='display:none;'";
  }else{
    if (inf_email_icon=="email-1")js_inf_email_icon="&#xf0e0;";
    else if (inf_email_icon=="email-2")js_inf_email_icon="&#xf2b6;";
    else js_inf_email_icon="&#xf1d8;";
  }

  var js_inf_column="";
  if (sb_visibility!='1')js_inf_column="jlg_column_11";
  else js_inf_column="jlg_column_21";

  var js_inf_information_bar="";
  if ((inf_phone_txt!=null&&inf_phone_txt!="")||(inf_email_txt!=null&&inf_email_txt!="")){
    var js_inf_information_bar = '<div id="jlg-top-information" class="'+js_inf_column+'">'
    +'<div class="jlg_inf_data" '+js_inf_display_phone+'><span class="fas" style="font-family:\'Font Awesome 5 Free\'!important;font-weight: 900!important;font-size:'+inf_icons_size+'px;color:'+inf_icons_color+';">'+js_inf_phone_icon+'</span>'
    +'<span style="font-size:'+inf_txt_size+'px;color:'+inf_txt_color+';">'+inf_phone_txt+'</span></div>'
    +'<div class="jlg_inf_data" '+js_inf_display_email+'><span class="far" style="font-family:\'Font Awesome 5 Free\'!important;font-weight: 400!important;font-size:'+inf_icons_size+'px;color:'+inf_icons_color+';">'+js_inf_email_icon+'</span>'
    +'<span style="font-size:'+inf_txt_size+'px;color:'+inf_txt_color+';">'+inf_email_txt+'</span></div></div>';
  }

  /*general settings*/
  if (background == 0)background='#fff';
  if (height <30 || height>1000)height=50;
  if (status == "")status="1";

  if (status=='1'){//active

    if (theme=='Divi'){
      var divi_main_header = document.querySelector("#main-header");
      var divi_top_header = document.querySelector("#top-header");

      if (divi_main_header!=null)divi_main_header.style.marginTop = height+'px';
      if (divi_top_header!=null)divi_top_header.style.marginTop = height+'px';

      jQuery(window).scroll(function() {
        if (divi_main_header!=null)divi_main_header.style.marginTop = '0px';
        if (divi_top_header!=null)divi_top_header.style.marginTop = '0px';
      });
      jQuery(window).scroll(function () {
       if ($(this).scrollTop()  <= 0 ){
         if (divi_main_header!=null)divi_main_header.style.marginTop = height+'px';
         if (divi_top_header!=null)divi_top_header.style.marginTop = height+'px';
       }
     });
   }else if (theme=='Sydney'){
     var sydney_main_header = document.querySelector("#masthead");
     if (sydney_main_header!=null)sydney_main_header.style.marginTop = height+'px';
     jQuery(window).scroll(function() {if (sydney_main_header!=null)sydney_main_header.style.marginTop = '0px';});
     jQuery(window).scroll(function () {
      if ($(this).scrollTop()  <= 0 ){
        if (sydney_main_header!=null)sydney_main_header.style.marginTop = height+'px';
      }
    });
  }

    jQuery('<div id="jlg_sb" style="height:'+height+'px; background:'+background+';padding-left:'+padding+'px; padding-right:'+padding+'px;">'
    +js_inf_information_bar
    +js_sb_search_bar
    +'</div>').prependTo('body');
  }
});
})(jQuery);
