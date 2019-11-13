<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    $sOBContents = ob_get_contents();
    ob_end_clean();
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " pa_experience"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " pa_experience"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
 <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__logo.png">
<?php
header("X-XSS-Protection: 1; mode=block");
?>
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}

?>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_userSweetAlertDisplayed = false;
 </SCRIPT>
 <SCRIPT type="text/javascript">
  var sc_blockCol = '<?php echo $this->Ini->Block_img_col; ?>';
  var sc_blockExp = '<?php echo $this->Ini->Block_img_exp; ?>';
  var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax; ?>';
  var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax; ?>';
  var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax; ?>';
  var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax; ?>';
  var sc_ajaxMsgTime = 2;
  var sc_img_status_ok = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_ok; ?>';
  var sc_img_status_err = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_err; ?>';
  var sc_css_status = '<?php echo $this->Ini->Css_status; ?>';
  var sc_img_mupload_pending = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_mupload_pending; ?>';
  var sc_img_mupload_finished = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_mupload_finished; ?>';
 </SCRIPT>
        <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
<input type="hidden" id="sc-mobile-lock" value='true' />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_sweetalert.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/sweetalert2.all.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/polyfill.min.js"></SCRIPT>
 <script type="text/javascript" src="../_lib/lib/js/frameControl.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
<style type="text/css">
.sc-button-image.disabled {
	opacity: 0.25
}
.sc-button-image.disabled img {
	cursor: default !important
}
</style>
 <style type="text/css">
  .fileinput-button-padding {
   padding: 3px 10px !important;
  }
  .fileinput-button {
   position: relative;
   overflow: hidden;
   float: left;
   margin-right: 4px;
  }
  .fileinput-button input {
   position: absolute;
   top: 0;
   right: 0;
   margin: 0;
   border: solid transparent;
   border-width: 0 0 100px 200px;
   opacity: 0;
   filter: alpha(opacity=0);
   -moz-transform: translate(-300px, 0) scale(4);
   direction: ltr;
   cursor: pointer;
  }
 </style>
<link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/css/select2.min.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/js/select2.full.min.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
  <?php 
  if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
  { 
  ?> 
  <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
  <?php 
  } 
  ?> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_performing_arts_i/form_performing_arts_i_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_performing_arts_i_mob_sajax_js.php");
?>
<script type="text/javascript">
if (document.getElementById("id_error_display_fixed"))
{
 scCenterFixedElement("id_error_display_fixed");
}
var posDispLeft = 0;
var posDispTop = 0;
var Nm_Proc_Atualiz = false;
function findPos(obj)
{
 var posCurLeft = posCurTop = 0;
 if (obj.offsetParent)
 {
  posCurLeft = obj.offsetLeft
  posCurTop = obj.offsetTop
  while (obj = obj.offsetParent)
  {
   posCurLeft += obj.offsetLeft
   posCurTop += obj.offsetTop
  }
 }
 posDispLeft = posCurLeft - 10;
 posDispTop = posCurTop + 30;
}
var Nav_permite_ret = "<?php if ($this->Nav_permite_ret) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_permite_ava = "<?php if ($this->Nav_permite_ava) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_binicio     = "<?php echo $this->arr_buttons['binicio']['type']; ?>";
var Nav_bavanca     = "<?php echo $this->arr_buttons['bavanca']['type']; ?>";
var Nav_bretorna    = "<?php echo $this->arr_buttons['bretorna']['type']; ?>";
var Nav_bfinal      = "<?php echo $this->arr_buttons['bfinal']['type']; ?>";
function nav_atualiza(str_ret, str_ava, str_pos)
{
<?php
 if (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)
 {
     echo " return;";
 }
 else
 {
?>
 if ('S' == str_ret)
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
?>
 }
 if ('S' == str_ava)
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
?>
 }
<?php
  }
?>
}
function nav_liga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' == sImg.substr(sImg.length - 4))
 {
  sImg = sImg.substr(0, sImg.length - 4);
 }
 sImg += sExt;
}
function nav_desliga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' != sImg.substr(sImg.length - 4))
 {
  sImg += '_off';
 }
 sImg += sExt;
}
<?php

include_once('form_performing_arts_i_mob_jquery.php');

?>
var applicationKeys = "";
applicationKeys += "ctrl+shift+right";
applicationKeys += ",";
applicationKeys += "ctrl+shift+left";
applicationKeys += ",";
applicationKeys += "ctrl+right";
applicationKeys += ",";
applicationKeys += "ctrl+left";
applicationKeys += ",";
applicationKeys += "alt+q";
applicationKeys += ",";
applicationKeys += "escape";
applicationKeys += ",";
applicationKeys += "ctrl+enter";
applicationKeys += ",";
applicationKeys += "ctrl+s";
applicationKeys += ",";
applicationKeys += "ctrl+delete";
applicationKeys += ",";
applicationKeys += "f1";
applicationKeys += ",";
applicationKeys += "ctrl+shift+c";

var hotkeyList = "";

function execHotKey(e, h) {
    var hotkey_fired = false;
  switch (true) {
    case (["ctrl+shift+right"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_fim");
      break;
    case (["ctrl+shift+left"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ini");
      break;
    case (["ctrl+right"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ava");
      break;
    case (["ctrl+left"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ret");
      break;
    case (["alt+q"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_sai");
      break;
    case (["escape"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_cnl");
      break;
    case (["ctrl+enter"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_inc");
      break;
    case (["ctrl+s"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_alt");
      break;
    case (["ctrl+delete"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_exc");
      break;
    case (["f1"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_webh");
      break;
    case (["ctrl+shift+c"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_copy");
      break;
    default:
      return true;
  }
  if (hotkey_fired) {
        e.preventDefault();
        return false;
    } else {
        return true;
    }
}
</script>
<script type="text/javascript" src="../_lib/lib/js/hotkeys.inc.js"></script>
<script type="text/javascript" src="../_lib/lib/js/hotkeys_setup.js"></script>
<script type="text/javascript" src="../_lib/lib/js/frameControl.js"></script>
<script type="text/javascript">
function process_hotkeys(hotkey)
{
  if (hotkey == "sys_format_fim") {
    if (typeof scBtnFn_sys_format_fim !== "undefined" && typeof scBtnFn_sys_format_fim === "function") {
      scBtnFn_sys_format_fim();
        return true;
    }
  }
  if (hotkey == "sys_format_ini") {
    if (typeof scBtnFn_sys_format_ini !== "undefined" && typeof scBtnFn_sys_format_ini === "function") {
      scBtnFn_sys_format_ini();
        return true;
    }
  }
  if (hotkey == "sys_format_ava") {
    if (typeof scBtnFn_sys_format_ava !== "undefined" && typeof scBtnFn_sys_format_ava === "function") {
      scBtnFn_sys_format_ava();
        return true;
    }
  }
  if (hotkey == "sys_format_ret") {
    if (typeof scBtnFn_sys_format_ret !== "undefined" && typeof scBtnFn_sys_format_ret === "function") {
      scBtnFn_sys_format_ret();
        return true;
    }
  }
  if (hotkey == "sys_format_sai") {
    if (typeof scBtnFn_sys_format_sai !== "undefined" && typeof scBtnFn_sys_format_sai === "function") {
      scBtnFn_sys_format_sai();
        return true;
    }
  }
  if (hotkey == "sys_format_cnl") {
    if (typeof scBtnFn_sys_format_cnl !== "undefined" && typeof scBtnFn_sys_format_cnl === "function") {
      scBtnFn_sys_format_cnl();
        return true;
    }
  }
  if (hotkey == "sys_format_inc") {
    if (typeof scBtnFn_sys_format_inc !== "undefined" && typeof scBtnFn_sys_format_inc === "function") {
      scBtnFn_sys_format_inc();
        return true;
    }
  }
  if (hotkey == "sys_format_alt") {
    if (typeof scBtnFn_sys_format_alt !== "undefined" && typeof scBtnFn_sys_format_alt === "function") {
      scBtnFn_sys_format_alt();
        return true;
    }
  }
  if (hotkey == "sys_format_exc") {
    if (typeof scBtnFn_sys_format_exc !== "undefined" && typeof scBtnFn_sys_format_exc === "function") {
      scBtnFn_sys_format_exc();
        return true;
    }
  }
  if (hotkey == "sys_format_webh") {
    if (typeof scBtnFn_sys_format_webh !== "undefined" && typeof scBtnFn_sys_format_webh === "function") {
      scBtnFn_sys_format_webh();
        return true;
    }
  }
  if (hotkey == "sys_format_copy") {
    if (typeof scBtnFn_sys_format_copy !== "undefined" && typeof scBtnFn_sys_format_copy === "function") {
      scBtnFn_sys_format_copy();
        return true;
    }
  }
    return false;
}

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

  var i, iTestWidth, iMaxLabelWidth = 0, $labelList = $(".scUiLabelWidthFix");
  for (i = 0; i < $labelList.length; i++) {
    iTestWidth = $($labelList[i]).width();
    sTestWidth = iTestWidth + "";
    if ("" == iTestWidth) {
      iTestWidth = 0;
    }
    else if ("px" == sTestWidth.substr(sTestWidth.length - 2)) {
      iTestWidth = parseInt(sTestWidth.substr(0, sTestWidth.length - 2));
    }
    iMaxLabelWidth = Math.max(iMaxLabelWidth, iTestWidth);
  }
  if (0 < iMaxLabelWidth) {
    $(".scUiLabelWidthFix").css("width", iMaxLabelWidth + "px");
  }
<?php
if (!$this->NM_ajax_flag && isset($this->NM_non_ajax_info['ajaxJavascript']) && !empty($this->NM_non_ajax_info['ajaxJavascript']))
{
    foreach ($this->NM_non_ajax_info['ajaxJavascript'] as $aFnData)
    {
?>
  <?php echo $aFnData[0]; ?>(<?php echo implode(', ', $aFnData[1]); ?>);

<?php
    }
}
?>
 });

   $(window).on('load', function() {
   });
 if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
  
 };

 function toggleBlock(e) {
  var block = e.data.block,
      block_id = $(block).attr("id");
      block_img = $("#" + block_id + " .sc-ui-block-control");

  if (1 >= block.rows.length) {
   return;
  }

  show_block[block_id] = !show_block[block_id];

  if (show_block[block_id]) {
    $(block).css("height", "100%");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockCol));
  }
  else {
    $(block).css("height", "");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockExp));
  }

  for (var i = 1; i < block.rows.length; i++) {
   if (show_block[block_id])
    $(block.rows[i]).show();
   else
    $(block.rows[i]).hide();
  }

  if (show_block[block_id]) {
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
?>
<body class="scFormPage" style="<?php echo $remove_margin . $str_iframe_body; ?>">
<?php

if (isset($_SESSION['scriptcase']['form_performing_arts_i']['error_buffer']) && '' != $_SESSION['scriptcase']['form_performing_arts_i']['error_buffer'])
{
    echo $_SESSION['scriptcase']['form_performing_arts_i']['error_buffer'];
}

?>
<div id="idJSSpecChar" style="display: none;"></div>
<script type="text/javascript">
function NM_tp_critica(TP)
{
    if (TP == 0 || TP == 1 || TP == 2)
    {
        nmdg_tipo_crit = TP;
    }
}
</script> 
<?php
 include_once("form_performing_arts_i_mob_js0.php");
?>
<script type="text/javascript"> 
 function setLocale(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_idioma_novo.value = sLocale;
 }
 function setSchema(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_schema_f.value = sLocale;
 }
var scInsertFieldWithErrors = new Array();
<?php
foreach ($this->NM_ajax_info['fieldsWithErrors'] as $insertFieldName) {
?>
scInsertFieldWithErrors.push("<?php echo $insertFieldName; ?>");
<?php
}
?>
$(function() {
	scAjaxError_markFieldList(scInsertFieldWithErrors);
});
 </script>
<form  name="F1" method="post" 
               action="form_performing_arts_i_mob.php" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['insert_validation']; ?>">
<?php
}
?>
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>">
<input type="hidden" name="script_case_session" value="<?php  echo $this->form_encode_input(session_id()); ?>">
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>">
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" />
<input type="hidden" name="login" value="<?php  echo $this->form_encode_input($this->login) ?>">
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_performing_arts_i_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_performing_arts_i_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute; z-index: 1000" id="id_error_display_table_frame">
<table class="scFormErrorTable scFormToastTable">
<tr><?php if ($this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><td style="padding: 0px" rowspan="2"><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top"></td><?php } ?><td class="scFormErrorTitle scFormToastTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><?php if (!$this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top">&nbsp;<?php } ?><?php echo $this->Ini->Nm_lang['lang_errm_errt'] ?></td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</td></tr></table></td></tr>
<tr><td class="scFormErrorMessage scFormToastMessage"><span id="id_error_display_table_text"></span></td></tr>
</table>
</div>
<div style="display: none; position: absolute; z-index: 1000" id="id_message_display_frame">
 <table class="scFormMessageTable" id="id_message_display_content" style="width: 100%">
  <tr id="id_message_display_title_line">
   <td class="scFormMessageTitle" style="height: 20px"><?php
if ('' != $this->Ini->Msg_ico_title) {
?>
<img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_title; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmessageclose", "_scAjaxMessageBtnClose()", "_scAjaxMessageBtnClose()", "id_message_display_close_icon", "", "", "float: right", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<span id="id_message_display_title" style="vertical-align: middle"></span></td>
  </tr>
  <tr>
   <td class="scFormMessageMessage"><?php
if ('' != $this->Ini->Msg_ico_body) {
?>
<img id="id_message_display_body_icon" src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_body; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<span id="id_message_display_text"></span><div id="id_message_display_buttond" style="display: none; text-align: center"><br /><input id="id_message_display_buttone" type="button" class="scButton_default" value="Ok" onClick="_scAjaxMessageBtnClick()" ></div></td>
  </tr>
 </table>
</div>
<?php
$msgDefClose = isset($this->arr_buttons['bmessageclose']) ? $this->arr_buttons['bmessageclose']['value'] : 'Ok';
?>
<script type="text/javascript">
var scMsgDefTitle = "<?php echo $this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl']; ?>";
var scMsgDefButton = "Ok";
var scMsgDefClose = "<?php echo $msgDefClose; ?>";
var scMsgDefClick = "close";
var scMsgDefScInit = "<?php echo $this->Ini->page; ?>";
</script>
<?php
if ($this->record_insert_ok)
{
?>
<script type="text/javascript">
if (typeof sc_userSweetAlertDisplayed === "undefined" || !sc_userSweetAlertDisplayed) {
    _scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmi']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
}
sc_userSweetAlertDisplayed = false;
</script>
<?php
}
if ($this->record_delete_ok)
{
?>
<script type="text/javascript">
if (typeof sc_userSweetAlertDisplayed === "undefined" || !sc_userSweetAlertDisplayed) {
    _scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmd']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
}
sc_userSweetAlertDisplayed = false;
</script>
<?php
}
?>
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0 >
 <tr>
  <td>
  <div class="scFormBorder">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " pa_experience"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " pa_experience"; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"><?php echo date($this->dateDefaultFormat()); ?></div>
</div></td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (F1)", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-8", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "sc-unique-btn-9", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');</script><?php } ?>
</td></tr> 
<tr><td>
<?php
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; text-align: center; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['training_examination']))
    {
        $this->nm_new_label['training_examination'] = "Please give details on other training/examination experiences you have had other than schooling? ";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $training_examination = $this->training_examination;
   $sStyleHidden_training_examination = '';
   if (isset($this->nmgp_cmp_hidden['training_examination']) && $this->nmgp_cmp_hidden['training_examination'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['training_examination']);
       $sStyleHidden_training_examination = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_training_examination = 'display: none;';
   $sStyleReadInp_training_examination = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['training_examination']) && $this->nmgp_cmp_readonly['training_examination'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['training_examination']);
       $sStyleReadLab_training_examination = '';
       $sStyleReadInp_training_examination = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['training_examination']) && $this->nmgp_cmp_hidden['training_examination'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="training_examination" value="<?php echo $this->form_encode_input($training_examination) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_training_examination_line" id="hidden_field_data_training_examination" style="<?php echo $sStyleHidden_training_examination; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_training_examination_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_training_examination_label"><span id="id_label_training_examination"><?php echo $this->nm_new_label['training_examination']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['php_cmp_required']['training_examination']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['php_cmp_required']['training_examination'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php
$training_examination_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($training_examination));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["training_examination"]) &&  $this->nmgp_cmp_readonly["training_examination"] == "on") { 

 ?>
<input type="hidden" name="training_examination" value="<?php echo $this->form_encode_input($training_examination) . "\">" . $training_examination_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_training_examination" class="sc-ui-readonly-training_examination css_training_examination_line" style="<?php echo $sStyleReadLab_training_examination; ?>"><?php echo $this->form_encode_input($training_examination_val); ?></span><span id="id_read_off_training_examination" class="css_read_off_training_examination" style="white-space: nowrap;<?php echo $sStyleReadInp_training_examination; ?>">
 <textarea  class="sc-js-input scFormObjectOdd css_training_examination_obj" style="white-space: pre-wrap;" name="training_examination" id="id_sc_field_training_examination" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $training_examination; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_training_examination_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_training_examination_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['technical_skills']))
    {
        $this->nm_new_label['technical_skills'] = "Please state any performance or production technical skills you have had?";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $technical_skills = $this->technical_skills;
   $sStyleHidden_technical_skills = '';
   if (isset($this->nmgp_cmp_hidden['technical_skills']) && $this->nmgp_cmp_hidden['technical_skills'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['technical_skills']);
       $sStyleHidden_technical_skills = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_technical_skills = 'display: none;';
   $sStyleReadInp_technical_skills = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['technical_skills']) && $this->nmgp_cmp_readonly['technical_skills'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['technical_skills']);
       $sStyleReadLab_technical_skills = '';
       $sStyleReadInp_technical_skills = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['technical_skills']) && $this->nmgp_cmp_hidden['technical_skills'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="technical_skills" value="<?php echo $this->form_encode_input($technical_skills) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_technical_skills_line" id="hidden_field_data_technical_skills" style="<?php echo $sStyleHidden_technical_skills; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_technical_skills_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_technical_skills_label"><span id="id_label_technical_skills"><?php echo $this->nm_new_label['technical_skills']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['php_cmp_required']['technical_skills']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['php_cmp_required']['technical_skills'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php
$technical_skills_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($technical_skills));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["technical_skills"]) &&  $this->nmgp_cmp_readonly["technical_skills"] == "on") { 

 ?>
<input type="hidden" name="technical_skills" value="<?php echo $this->form_encode_input($technical_skills) . "\">" . $technical_skills_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_technical_skills" class="sc-ui-readonly-technical_skills css_technical_skills_line" style="<?php echo $sStyleReadLab_technical_skills; ?>"><?php echo $this->form_encode_input($technical_skills_val); ?></span><span id="id_read_off_technical_skills" class="css_read_off_technical_skills" style="white-space: nowrap;<?php echo $sStyleReadInp_technical_skills; ?>">
 <textarea  class="sc-js-input scFormObjectOdd css_technical_skills_obj" style="white-space: pre-wrap;" name="technical_skills" id="id_sc_field_technical_skills" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $technical_skills; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_technical_skills_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_technical_skills_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['interest_hobbies']))
    {
        $this->nm_new_label['interest_hobbies'] = "What are your interests/hobbies outside of theatre?  ";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $interest_hobbies = $this->interest_hobbies;
   $sStyleHidden_interest_hobbies = '';
   if (isset($this->nmgp_cmp_hidden['interest_hobbies']) && $this->nmgp_cmp_hidden['interest_hobbies'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['interest_hobbies']);
       $sStyleHidden_interest_hobbies = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_interest_hobbies = 'display: none;';
   $sStyleReadInp_interest_hobbies = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['interest_hobbies']) && $this->nmgp_cmp_readonly['interest_hobbies'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['interest_hobbies']);
       $sStyleReadLab_interest_hobbies = '';
       $sStyleReadInp_interest_hobbies = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['interest_hobbies']) && $this->nmgp_cmp_hidden['interest_hobbies'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="interest_hobbies" value="<?php echo $this->form_encode_input($interest_hobbies) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_interest_hobbies_line" id="hidden_field_data_interest_hobbies" style="<?php echo $sStyleHidden_interest_hobbies; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_interest_hobbies_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_interest_hobbies_label"><span id="id_label_interest_hobbies"><?php echo $this->nm_new_label['interest_hobbies']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['php_cmp_required']['interest_hobbies']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['php_cmp_required']['interest_hobbies'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["interest_hobbies"]) &&  $this->nmgp_cmp_readonly["interest_hobbies"] == "on") { 

 ?>
<input type="hidden" name="interest_hobbies" value="<?php echo $this->form_encode_input($interest_hobbies) . "\">" . $interest_hobbies . ""; ?>
<?php } else { ?>
<span id="id_read_on_interest_hobbies" class="sc-ui-readonly-interest_hobbies css_interest_hobbies_line" style="<?php echo $sStyleReadLab_interest_hobbies; ?>"><?php echo $this->form_encode_input($this->interest_hobbies); ?></span><span id="id_read_off_interest_hobbies" class="css_read_off_interest_hobbies" style="white-space: nowrap;<?php echo $sStyleReadInp_interest_hobbies; ?>">
 <input class="sc-js-input scFormObjectOdd css_interest_hobbies_obj" style="" id="id_sc_field_interest_hobbies" type=text name="interest_hobbies" value="<?php echo $this->form_encode_input($interest_hobbies) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_interest_hobbies_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_interest_hobbies_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['professional_goal']))
    {
        $this->nm_new_label['professional_goal'] = "Please tell us your professional goals";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $professional_goal = $this->professional_goal;
   $sStyleHidden_professional_goal = '';
   if (isset($this->nmgp_cmp_hidden['professional_goal']) && $this->nmgp_cmp_hidden['professional_goal'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['professional_goal']);
       $sStyleHidden_professional_goal = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_professional_goal = 'display: none;';
   $sStyleReadInp_professional_goal = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['professional_goal']) && $this->nmgp_cmp_readonly['professional_goal'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['professional_goal']);
       $sStyleReadLab_professional_goal = '';
       $sStyleReadInp_professional_goal = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['professional_goal']) && $this->nmgp_cmp_hidden['professional_goal'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="professional_goal" value="<?php echo $this->form_encode_input($professional_goal) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_professional_goal_line" id="hidden_field_data_professional_goal" style="<?php echo $sStyleHidden_professional_goal; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_professional_goal_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_professional_goal_label"><span id="id_label_professional_goal"><?php echo $this->nm_new_label['professional_goal']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['php_cmp_required']['professional_goal']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['php_cmp_required']['professional_goal'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php
$professional_goal_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($professional_goal));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["professional_goal"]) &&  $this->nmgp_cmp_readonly["professional_goal"] == "on") { 

 ?>
<input type="hidden" name="professional_goal" value="<?php echo $this->form_encode_input($professional_goal) . "\">" . $professional_goal_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_professional_goal" class="sc-ui-readonly-professional_goal css_professional_goal_line" style="<?php echo $sStyleReadLab_professional_goal; ?>"><?php echo $this->form_encode_input($professional_goal_val); ?></span><span id="id_read_off_professional_goal" class="css_read_off_professional_goal" style="white-space: nowrap;<?php echo $sStyleReadInp_professional_goal; ?>">
 <textarea  class="sc-js-input scFormObjectOdd css_professional_goal_obj" style="white-space: pre-wrap;" name="professional_goal" id="id_sc_field_professional_goal" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $professional_goal; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_professional_goal_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_professional_goal_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_professional_goal_dumb = ('' == $sStyleHidden_professional_goal) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_professional_goal_dumb" style="<?php echo $sStyleHidden_professional_goal_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_1"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">BA Production applicants only</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['info']))
    {
        $this->nm_new_label['info'] = "info";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $info = $this->info;
   $sStyleHidden_info = '';
   if (isset($this->nmgp_cmp_hidden['info']) && $this->nmgp_cmp_hidden['info'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['info']);
       $sStyleHidden_info = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_info = 'display: none;';
   $sStyleReadInp_info = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['info']) && $this->nmgp_cmp_readonly['info'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['info']);
       $sStyleReadLab_info = '';
       $sStyleReadInp_info = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['info']) && $this->nmgp_cmp_hidden['info'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="info" value="<?php echo $this->form_encode_input($info) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_info_line" id="hidden_field_data_info" style="<?php echo $sStyleHidden_info; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_info_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_info css_info_line" style="<?php echo $sStyleReadLab_info; ?>"><?php echo $this->form_encode_input($this->info); ?></span><span id="id_read_off_info" class="css_read_off_info" style="<?php echo $sStyleReadInp_info; ?>"><span id="id_ajax_label_info"><?php echo $info?></span>
</span><input type="hidden" name="info" value="<?php echo $this->form_encode_input($info); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_info_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_info_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_info_dumb = ('' == $sStyleHidden_info) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_info_dumb" style="<?php echo $sStyleHidden_info_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_2"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['youtube']))
    {
        $this->nm_new_label['youtube'] = "Youtube";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $youtube = $this->youtube;
   $sStyleHidden_youtube = '';
   if (isset($this->nmgp_cmp_hidden['youtube']) && $this->nmgp_cmp_hidden['youtube'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['youtube']);
       $sStyleHidden_youtube = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_youtube = 'display: none;';
   $sStyleReadInp_youtube = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['youtube']) && $this->nmgp_cmp_readonly['youtube'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['youtube']);
       $sStyleReadLab_youtube = '';
       $sStyleReadInp_youtube = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['youtube']) && $this->nmgp_cmp_hidden['youtube'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="youtube" value="<?php echo $this->form_encode_input($youtube) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_youtube_line" id="hidden_field_data_youtube" style="<?php echo $sStyleHidden_youtube; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_youtube_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_youtube_label"><span id="id_label_youtube"><?php echo $this->nm_new_label['youtube']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["youtube"]) &&  $this->nmgp_cmp_readonly["youtube"] == "on") { 

 ?>
<input type="hidden" name="youtube" value="<?php echo $this->form_encode_input($youtube) . "\">" . $youtube . ""; ?>
<?php } else { ?>
<span id="id_read_on_youtube" class="sc-ui-readonly-youtube css_youtube_line" style="<?php echo $sStyleReadLab_youtube; ?>"><?php echo $this->form_encode_input($this->youtube); ?></span><span id="id_read_off_youtube" class="css_read_off_youtube" style="white-space: nowrap;<?php echo $sStyleReadInp_youtube; ?>">
 <input class="sc-js-input scFormObjectOdd css_youtube_obj" style="" id="id_sc_field_youtube" type=text name="youtube" value="<?php echo $this->form_encode_input($youtube) ?>"
 size=50 maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_youtube_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_youtube_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['other_links']))
    {
        $this->nm_new_label['other_links'] = "Other Links";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $other_links = $this->other_links;
   $sStyleHidden_other_links = '';
   if (isset($this->nmgp_cmp_hidden['other_links']) && $this->nmgp_cmp_hidden['other_links'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['other_links']);
       $sStyleHidden_other_links = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_other_links = 'display: none;';
   $sStyleReadInp_other_links = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['other_links']) && $this->nmgp_cmp_readonly['other_links'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['other_links']);
       $sStyleReadLab_other_links = '';
       $sStyleReadInp_other_links = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['other_links']) && $this->nmgp_cmp_hidden['other_links'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="other_links" value="<?php echo $this->form_encode_input($other_links) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_other_links_line" id="hidden_field_data_other_links" style="<?php echo $sStyleHidden_other_links; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_other_links_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_other_links_label"><span id="id_label_other_links"><?php echo $this->nm_new_label['other_links']; ?></span></span><br>
<?php
$other_links_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($other_links));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["other_links"]) &&  $this->nmgp_cmp_readonly["other_links"] == "on") { 

 ?>
<input type="hidden" name="other_links" value="<?php echo $this->form_encode_input($other_links) . "\">" . $other_links_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_other_links" class="sc-ui-readonly-other_links css_other_links_line" style="<?php echo $sStyleReadLab_other_links; ?>"><?php echo $this->form_encode_input($other_links_val); ?></span><span id="id_read_off_other_links" class="css_read_off_other_links" style="white-space: nowrap;<?php echo $sStyleReadInp_other_links; ?>">
 <textarea  class="sc-js-input scFormObjectOdd css_other_links_obj" style="white-space: pre-wrap;" name="other_links" id="id_sc_field_other_links" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $other_links; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_other_links_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_other_links_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_other_links_dumb = ('' == $sStyleHidden_other_links) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_other_links_dumb" style="<?php echo $sStyleHidden_other_links_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_3"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_3"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_3" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">Supporting Documents</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['file_upload']))
    {
        $this->nm_new_label['file_upload'] = "Supporting Documents";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $file_upload = $this->file_upload;
   $sStyleHidden_file_upload = '';
   if (isset($this->nmgp_cmp_hidden['file_upload']) && $this->nmgp_cmp_hidden['file_upload'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['file_upload']);
       $sStyleHidden_file_upload = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_file_upload = 'display: none;';
   $sStyleReadInp_file_upload = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['file_upload']) && $this->nmgp_cmp_readonly['file_upload'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['file_upload']);
       $sStyleReadLab_file_upload = '';
       $sStyleReadInp_file_upload = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['file_upload']) && $this->nmgp_cmp_hidden['file_upload'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="file_upload" value="<?php echo $this->form_encode_input($file_upload) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_file_upload_line" id="hidden_field_data_file_upload" style="<?php echo $sStyleHidden_file_upload; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_file_upload_line" style="vertical-align: top;padding: 0px"><span id="id_sc_mucontrol_file_upload">
<span class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_add_files'] ?></span>
 <input type="file" title="<?php echo $this->Ini->Nm_lang['lang_add_files'] ?>" name="file_upload[]" id="id_sc_field_file_upload" multiple  />
</span>
<span title="<?php echo $this->Ini->Nm_lang['lang_start_upload'] ?>" class="btn btn-primary start fileinput-button-padding scButton_default scButtonMultiUploadSend" id="id_sc_submit_file_upload">
 <span><?php echo $this->Ini->Nm_lang['lang_start_upload'] ?></span>
</span>
</span>
<br style="clear: both" />
<div id="id_sc_dragdrop_file_upload" class="scFormDataDragNDrop"><?php echo $this->Ini->Nm_lang['lang_errm_mu_dragfile'] ?></div>
<input type="hidden" name="ul_info_file_upload" />
<div id="id_img_loader_file_upload" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_file_upload" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /><div id="id_sc_loaded_file_upload"><?php if (isset($this->NM_ajax_info['fldList']['file_upload']['mulHtml'])) { echo $this->NM_ajax_info['fldList']['file_upload']['mulHtml']; } ?></div>
<div id="id_sc_upload_done_file_upload">
<?php
if (isset($GLOBALS['erro_incl']) && 1 == $GLOBALS['erro_incl'] && isset($this->ul_info_file_upload) && '' != $this->ul_info_file_upload)
{
    $aTmpUploads = explode('@scl@', $this->ul_info_file_upload);
    foreach ($aTmpUploads as $i => $aTmpUploadInfo)
    {
        $aTmpUploadParts = explode('@sci@', $aTmpUploadInfo);
?>
<table id='id_sc_fileok_file_upload_<?php echo $i + 1; ?>' style='border-collapse: collapse; border-width: 0'><tr><td style='padding: 0'><img src='<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_mupload_finished; ?>' style='border-width: 0' title='<?php echo $this->Ini->Nm_lang['lang_upload_completed'] ?>' /></td><td class='sc_ui_mu_status_file_upload' style='padding: 1px 5px 1px 2px; white-space: nowrap'><?php echo $aTmpUploadParts[1]; ?>&nbsp;<a href='javascript:scJQMultiUploadCancel_file_upload("<?php echo $i + 1; ?>")'><img src='<?php echo $this->Ini->path_icones ?>/scriptcase__NM__trash.gif' style='border-width: 0; vertical-align: middle'></a></td><td style='padding: 1px 5px'><?php echo $this->Ini->Nm_lang['lang_errm_mu_complete'] ?></td></tr></table></div>
<?php
    }
}
?>
</div>
<div id="id_sc_upload_todo_file_upload"></div>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_file_upload_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_file_upload_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "sc-unique-btn-10", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "sc-unique-btn-11", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + S)", "sc-unique-btn-12", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');</script><?php } ?>
</td></tr> 
</table> 
</div> 
</td> 
</tr> 
</table> 

<div id="id_debug_window" style="display: none; position: absolute; left: 50px; top: 50px"><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>

</form> 
<?php
      $Tzone = ini_get('date.timezone');
      if (empty($Tzone))
      {
?>
<script> 
  _scAjaxShowMessage({title: '', message: "<?php echo $this->Ini->Nm_lang['lang_errm_tz']; ?>", isModal: false, timeout: 0, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: true, showBodyIcon: false, isToast: false, toastPos: ""});
</script> 
<?php
      }
?>
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0,1,2,3);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
</script> 
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['masterValue']);
?>
}
<?php
    }
}
?>
function updateHeaderFooter(sFldName, sFldValue)
{
  if (sFldValue[0] && sFldValue[0]["value"])
  {
    sFldValue = sFldValue[0]["value"];
  }
}
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_performing_arts_i_mob");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_performing_arts_i_mob");
 parent.scAjaxDetailHeight("form_performing_arts_i_mob", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_performing_arts_i_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_performing_arts_i_mob", <?php echo $sTamanhoIframe; ?>);
 }
</script>
<?php
    }
}
?>
<?php
if (isset($this->NM_ajax_info['displayMsg']) && $this->NM_ajax_info['displayMsg'])
{
    $isToast   = isset($this->NM_ajax_info['displayMsgToast']) && $this->NM_ajax_info['displayMsgToast'] ? 'true' : 'false';
    $toastType = $isToast && isset($this->NM_ajax_info['displayMsgToastType']) ? $this->NM_ajax_info['displayMsgToastType'] : '';
?>
<script type="text/javascript">
_scAjaxShowMessage({title: scMsgDefTitle, message: "<?php echo $this->NM_ajax_info['displayMsgTxt']; ?>", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: <?php echo $isToast ?>, toastPos: "", type: "<?php echo $toastType ?>"});
</script>
<?php
}
?>
<?php
if ('' != $this->scFormFocusErrorName)
{
?>
<script>
scAjaxFocusError();
</script>
<?php
}
?>
<script type='text/javascript'>
bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
function scLigEditLookupCall()
{
<?php
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['sc_modal'])
{
?>
  parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
elseif ($this->lig_edit_lookup)
{
?>
  opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
?>
}
if (bLigEditLookupCall)
{
  scLigEditLookupCall();
}
<?php
if (isset($this->redir_modal) && !empty($this->redir_modal))
{
    echo $this->redir_modal;
}
?>
</script>
<?php
if ($this->nmgp_form_empty) {
?>
<script type="text/javascript">
scAjax_displayEmptyForm();
</script>
<?php
}
?>
<script type="text/javascript">
	function scBtnFn_sys_format_hlp() {
		if ($("#sc_b_hlp_t").length && $("#sc_b_hlp_t").is(":visible")) {
			window.open('<?php echo $this->url_webhelp; ?>', '', 'resizable, scrollbars'); 
			 return;
		}
	}
	function scBtnFn_sys_format_sai() {
		if ($("#sc_b_sai_t.sc-unique-btn-1").length && $("#sc_b_sai_t.sc-unique-btn-1").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-2").length && $("#sc_b_sai_t.sc-unique-btn-2").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-3").length && $("#sc_b_sai_t.sc-unique-btn-3").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-7").length && $("#sc_b_sai_t.sc-unique-btn-7").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-8").length && $("#sc_b_sai_t.sc-unique-btn-8").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-9").length && $("#sc_b_sai_t.sc-unique-btn-9").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
	}
	function scBtnFn_sys_format_inc() {
		if ($("#sc_b_new_b.sc-unique-btn-4").length && $("#sc_b_new_b.sc-unique-btn-4").is(":visible")) {
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_b.sc-unique-btn-5").length && $("#sc_b_ins_b.sc-unique-btn-5").is(":visible")) {
			nm_atualiza ('incluir');
			 return;
		}
		if ($("#sc_b_new_b.sc-unique-btn-10").length && $("#sc_b_new_b.sc-unique-btn-10").is(":visible")) {
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_b.sc-unique-btn-11").length && $("#sc_b_ins_b.sc-unique-btn-11").is(":visible")) {
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_b.sc-unique-btn-6").length && $("#sc_b_upd_b.sc-unique-btn-6").is(":visible")) {
			nm_atualiza ('alterar');
			 return;
		}
		if ($("#sc_b_upd_b.sc-unique-btn-12").length && $("#sc_b_upd_b.sc-unique-btn-12").is(":visible")) {
			nm_atualiza ('alterar');
			 return;
		}
	}
</script>
<script type="text/javascript">
$(function() {
 $("#sc-id-mobile-in").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("in");
 });
 $("#sc-id-mobile-out").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("out");
 });
});
function scMobileDisplayControl(sOption) {
 $("#sc-id-mobile-control").val(sOption);
 nm_atualiza("recarga_mobile");
}
</script>
<?php
       if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'])
       {
?>
<span id="sc-id-mobile-out"><?php echo $this->Ini->Nm_lang['lang_version_web']; ?></span>
<?php
       }
?>
<iframe id="sc-id-download-iframe" name="sc_name_download_iframe" style="display: none"></iframe>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i_mob']['buttonStatus'] = $this->nmgp_botoes;
?>
<script type="text/javascript">
   function sc_session_redir(url_redir)
   {
       if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')
       {
           window.parent.sc_session_redir(url_redir);
       }
       else
       {
           if (window.opener && typeof window.opener.sc_session_redir === 'function')
           {
               window.close();
               window.opener.sc_session_redir(url_redir);
           }
           else
           {
               window.location = url_redir;
           }
       }
   }
</script>
</body> 
</html> 
