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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("SPAA Application form"); } else { echo strip_tags("Basic Information"); } ?></TITLE>
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
<?php
$miniCalendarFA  = $this->jqueryFAFile('calendar');
if ('' != $miniCalendarFA) {
?>
<style type="text/css">
.css_read_off_dateofbirth button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_submitted button {
	background-color: transparent;
	border: 0;
	padding: 0
}
</style>
<?php
}
?>
<style type="text/css">
	.sc.switch {
		position: relative;
		display: inline-flex;
	}

	.sc.switch span {
		display: inline-block;
		margin-right: 5px;
	}

	.sc.switch span {
		background: #DFDFDF;
		width: 22px;
		height: 14px;
		display: block;
		position: relative;
		top: 0px;
		left: 0;
		border-radius: 15px;
		padding: 0 3px;
		transition: all .2s linear;
		box-shadow: 0px 0px 2px rgba(164, 164, 164, 0.8) inset;
	}

	.sc.switch span:before {
		content: '\2713';
		display: inline-block;
		color: white;
		font-size: 10px;
		z-index: 0;
		position: absolute;
		top: 0;
		left: 4px;
	}

	.sc.switch span:after {
		content: '';
		background: white;
		width: 12px;
		height: 12px;
		display: block;
		position: absolute;
		top: 1px;
		left: 1px;
		border-radius: 15px;
		transition: all .2s linear;
		z-index: 1;
	}

	.sc.switch input {
		margin-right: 10px;
		cursor: pointer;
		z-index: 2;
		position: absolute;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		opacity: 0;
		margin: 0;
		padding: 0;
	}

	.sc.switch input:disabled + span {
		opacity: 0.35;
	}

	.sc.switch input:checked + span {
		background: #66AFE9;
	}

	.sc.switch input:checked + span:after {
		left: calc(100% - 1px);
		transform: translateX(-100%);
	}

	.sc.radio {
		position: relative;
		display: inline-flex;
	}

	.sc.radio span {
		display: inline-block;
		margin-right: 5px;
	}

	.sc.radio span {
		background: #ffffff;
		border: 1px solid #66AFE9;
		width: 12px;
		height: 12px;
		display: block;
		position: relative;
		top: 0px;
		left: 0;
		border-radius: 15px;
		transition: all .2s;
		box-shadow: 0px 0px 2px rgba(164, 164, 164, 0.8) inset;
	}

	.sc.radio span:after {
		content: '';
		background: #66AFE9;
		width: 12px;
		height: 12px;
		display: block;
		position: absolute;
		top: 0;
		left: 0;
		border-radius: 15px;
		transition: all .2s;
		z-index: 1;
		transform: scale(0);
	}

	.sc.radio input {
		cursor: pointer;
		z-index: 2;
		position: absolute;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		opacity: 0;
		margin: 0;
		padding: 0;
	}

	.sc.radio input:disabled + span {
		opacity: 0.35;
	}

	.sc.radio input:checked + span {
		background: #66AFE9;
	}

	.sc.radio input:checked + span:after {
		transform: translateX(-100%);
		transform: scale(1);
	}
</style>
<link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/css/select2.min.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/js/select2.full.min.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>application_form/application_form_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = true;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("application_form_mob_sajax_js.php");
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

 function nm_field_disabled(Fields, Opt) {
  opcao = "<?php if ($GLOBALS["erro_incl"] == 1) {echo "novo";} else {echo $this->nmgp_opcao;} ?>";
  if (opcao == "novo" && Opt == "U") {
      return;
  }
  if (opcao != "novo" && Opt == "I") {
      return;
  }
  Field = Fields.split(";");
  for (i=0; i < Field.length; i++)
  {
     F_temp = Field[i].split("=");
     F_name = F_temp[0];
     F_opc  = (F_temp[1] && ("disabled" == F_temp[1] || "true" == F_temp[1])) ? true : false;
     if (F_name == "venue_id")
     {
        $('select[name="venue_id"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="venue_id"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="venue_id"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "audition_id")
     {
        $('select[name="audition_id"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="audition_id"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="audition_id"]').removeClass("scFormInputDisabled");
        }
     }
  }
 } // nm_field_disabled
<?php

include_once('application_form_mob_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

  sc_form_onload();

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
?>
<body class="scFormPage" style="<?php echo $remove_margin . $str_iframe_body; ?>">
<?php

if (isset($_SESSION['scriptcase']['application_form']['error_buffer']) && '' != $_SESSION['scriptcase']['application_form']['error_buffer'])
{
    echo $_SESSION['scriptcase']['application_form']['error_buffer'];
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
 include_once("application_form_mob_js0.php");
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
               action="application_form_mob.php" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['application_form_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['application_form_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute; z-index: 1000" id="id_error_display_table_frame">
<table class="scFormErrorTable scFormToastTable">
<tr><?php if ($this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><td style="padding: 0px" rowspan="2"><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top"></td><?php } ?><td class="scFormErrorTitle scFormToastTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><?php if (!$this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top">&nbsp;<?php } ?>Error: required field missing!</td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
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
_scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmi']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
</script>
<?php
}
if ($this->record_delete_ok)
{
?>
<script type="text/javascript">
_scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmd']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<link rel="stylesheet" href="https://bootswatch.com/4/journal/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style>
.header {
    margin-top:10px;
    left: 0;
    top: 0;
    width: 100%;
    background-color: #FFF;
    color: #9E1F62;
    text-align: center;
    margin-bottom: 5px;
    border-bottom: 2px solid #d0d0d0;
   
}
  .header h2{
   font-weight:normal;
   #padding-top:25px;
   }
  
  .sc.switch span {
    width: 40px;
    height: 24px;
  }
  .sc.switch span::before {
    font-size: 16px;
  }
  
  .sc.switch span::after {
    width: 22px;
    height: 22px;
  }
  
  .sc.radio span {
    margin-top: 3px;
    width: 18px;
    height: 18px;
}
  .radio label {
   margin-right: 10px;
}
   
</style>

<div class="header">
  <p><img src="http://resources.spaa.ae/images/logo.png" style="height:100px; width:auto;" alt="SPAA">
   
    <h2 id="typography" class="text-primary">Sharjah Performing Arts Academy</h2>
  <h4 id="typography" class="text-primary">Application Management System</h4>
   
</div> 
<blockquote class="blockquote">
  <p class="mb-0">Please supply basic information and create your login.</p>
  
</blockquote></td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-8", "", "");?>
 
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">Audition & Course</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['venue_id']))
   {
       $this->nm_new_label['venue_id'] = "Audition Venue";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $venue_id = $this->venue_id;
   $sStyleHidden_venue_id = '';
   if (isset($this->nmgp_cmp_hidden['venue_id']) && $this->nmgp_cmp_hidden['venue_id'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['venue_id']);
       $sStyleHidden_venue_id = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_venue_id = 'display: none;';
   $sStyleReadInp_venue_id = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['venue_id']) && $this->nmgp_cmp_readonly['venue_id'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['venue_id']);
       $sStyleReadLab_venue_id = '';
       $sStyleReadInp_venue_id = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['venue_id']) && $this->nmgp_cmp_hidden['venue_id'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="venue_id" value="<?php echo $this->form_encode_input($this->venue_id) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_venue_id_line" id="hidden_field_data_venue_id" style="<?php echo $sStyleHidden_venue_id; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_venue_id_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_venue_id_label"><span id="id_label_venue_id"><?php echo $this->nm_new_label['venue_id']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['php_cmp_required']['venue_id']) || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['php_cmp_required']['venue_id'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["venue_id"]) &&  $this->nmgp_cmp_readonly["venue_id"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_venue_id']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_venue_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_venue_id']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_venue_id'] = array(); 
}
if ($this->venue_id != "")
{ 
   $this->nm_clear_val("venue_id");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_venue_id']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_venue_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_venue_id']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_venue_id'] = array(); 
    }

   $old_value_dateofbirth = $this->dateofbirth;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dateofbirth = $this->dateofbirth;

   $nm_comando = "SELECT id, venue_name  FROM venue  Where id = '$this->venue_id' ORDER BY venue_name";

   $this->dateofbirth = $old_value_dateofbirth;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_venue_id'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
} 
   $x = 0; 
   $venue_id_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->venue_id_1))
          {
              foreach ($this->venue_id_1 as $tmp_venue_id)
              {
                  if (trim($tmp_venue_id) === trim($cadaselect[1])) { $venue_id_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->venue_id) === trim($cadaselect[1])) { $venue_id_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="venue_id" value="<?php echo $this->form_encode_input($venue_id) . "\">" . $venue_id_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_venue_id();
   $x = 0 ; 
   $venue_id_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->venue_id_1))
          {
              foreach ($this->venue_id_1 as $tmp_venue_id)
              {
                  if (trim($tmp_venue_id) === trim($cadaselect[1])) { $venue_id_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->venue_id) === trim($cadaselect[1])) { $venue_id_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($venue_id_look))
          {
              $venue_id_look = $this->venue_id;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_venue_id\" class=\"css_venue_id_line\" style=\"" .  $sStyleReadLab_venue_id . "\">" . $this->form_encode_input($venue_id_look) . "</span><span id=\"id_read_off_venue_id\" class=\"css_read_off_venue_id\" style=\"white-space: nowrap; " . $sStyleReadInp_venue_id . "\">";
   echo " <span id=\"idAjaxSelect_venue_id\"><select class=\"sc-js-input scFormObjectOdd css_venue_id_obj\" style=\"\" id=\"id_sc_field_venue_id\" name=\"venue_id\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->venue_id) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->venue_id)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_venue_id_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_venue_id_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['audition_id']))
   {
       $this->nm_new_label['audition_id'] = "Audition Date";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $audition_id = $this->audition_id;
   $sStyleHidden_audition_id = '';
   if (isset($this->nmgp_cmp_hidden['audition_id']) && $this->nmgp_cmp_hidden['audition_id'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['audition_id']);
       $sStyleHidden_audition_id = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_audition_id = 'display: none;';
   $sStyleReadInp_audition_id = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['audition_id']) && $this->nmgp_cmp_readonly['audition_id'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['audition_id']);
       $sStyleReadLab_audition_id = '';
       $sStyleReadInp_audition_id = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['audition_id']) && $this->nmgp_cmp_hidden['audition_id'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="audition_id" value="<?php echo $this->form_encode_input($this->audition_id) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_audition_id_line" id="hidden_field_data_audition_id" style="<?php echo $sStyleHidden_audition_id; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_audition_id_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_audition_id_label"><span id="id_label_audition_id"><?php echo $this->nm_new_label['audition_id']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['php_cmp_required']['audition_id']) || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['php_cmp_required']['audition_id'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["audition_id"]) &&  $this->nmgp_cmp_readonly["audition_id"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_audition_id']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_audition_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_audition_id']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_audition_id'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_audition_id']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_audition_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_audition_id']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_audition_id'] = array(); 
    }

   $old_value_dateofbirth = $this->dateofbirth;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dateofbirth = $this->dateofbirth;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT id, audition_title + ' on ' + str_replace (convert(char(10),audition_date,102), '.', '-') + ' ' + convert(char(8),audition_date,20)  FROM audition  where id = '$this->audition_id' ORDER BY audition_date, audition_title";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT id, concat(audition_title, ' on ', audition_date)  FROM audition  where id = '$this->audition_id' ORDER BY audition_date, audition_title";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT id, audition_title&' on '&audition_date  FROM audition  where id = '$this->audition_id' ORDER BY audition_date, audition_title";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT id, audition_title||' on '||audition_date  FROM audition  where id = '$this->audition_id' ORDER BY audition_date, audition_title";
   }
   else
   {
       $nm_comando = "SELECT id, audition_title||' on '||audition_date  FROM audition  where id = '$this->audition_id' ORDER BY audition_date, audition_title";
   }

   $this->dateofbirth = $old_value_dateofbirth;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_audition_id'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $audition_id_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->audition_id_1))
          {
              foreach ($this->audition_id_1 as $tmp_audition_id)
              {
                  if (trim($tmp_audition_id) === trim($cadaselect[1])) { $audition_id_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->audition_id) === trim($cadaselect[1])) { $audition_id_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="audition_id" value="<?php echo $this->form_encode_input($audition_id) . "\">" . $audition_id_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_audition_id();
   $x = 0 ; 
   $audition_id_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->audition_id_1))
          {
              foreach ($this->audition_id_1 as $tmp_audition_id)
              {
                  if (trim($tmp_audition_id) === trim($cadaselect[1])) { $audition_id_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->audition_id) === trim($cadaselect[1])) { $audition_id_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($audition_id_look))
          {
              $audition_id_look = $this->audition_id;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_audition_id\" class=\"css_audition_id_line\" style=\"" .  $sStyleReadLab_audition_id . "\">" . $this->form_encode_input($audition_id_look) . "</span><span id=\"id_read_off_audition_id\" class=\"css_read_off_audition_id\" style=\"white-space: nowrap; " . $sStyleReadInp_audition_id . "\">";
   echo " <span id=\"idAjaxSelect_audition_id\"><select class=\"sc-js-input scFormObjectOdd css_audition_id_obj\" style=\"\" id=\"id_sc_field_audition_id\" name=\"audition_id\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->audition_id) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->audition_id)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_audition_id_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_audition_id_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['course_id']))
   {
       $this->nm_new_label['course_id'] = "Application for";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $course_id = $this->course_id;
   $sStyleHidden_course_id = '';
   if (isset($this->nmgp_cmp_hidden['course_id']) && $this->nmgp_cmp_hidden['course_id'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['course_id']);
       $sStyleHidden_course_id = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_course_id = 'display: none;';
   $sStyleReadInp_course_id = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['course_id']) && $this->nmgp_cmp_readonly['course_id'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['course_id']);
       $sStyleReadLab_course_id = '';
       $sStyleReadInp_course_id = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['course_id']) && $this->nmgp_cmp_hidden['course_id'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="course_id" value="<?php echo $this->form_encode_input($this->course_id) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_course_id_line" id="hidden_field_data_course_id" style="<?php echo $sStyleHidden_course_id; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_course_id_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_course_id_label"><span id="id_label_course_id"><?php echo $this->nm_new_label['course_id']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['php_cmp_required']['course_id']) || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['php_cmp_required']['course_id'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["course_id"]) &&  $this->nmgp_cmp_readonly["course_id"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_course_id']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_course_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_course_id']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_course_id'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_course_id']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_course_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_course_id']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_course_id'] = array(); 
    }

   $old_value_dateofbirth = $this->dateofbirth;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dateofbirth = $this->dateofbirth;

   $accept_tnc_val_str = "''";
   if (!empty($this->accept_tnc))
   {
       if (is_array($this->accept_tnc))
       {
           $Tmp_array = $this->accept_tnc;
       }
       else
       {
           $Tmp_array = explode(";", $this->accept_tnc);
       }
       $accept_tnc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $accept_tnc_val_str)
          {
             $accept_tnc_val_str .= ", ";
          }
          $accept_tnc_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT id, name  FROM programs  ORDER BY name";

   $this->dateofbirth = $old_value_dateofbirth;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_course_id'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $course_id_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->course_id_1))
          {
              foreach ($this->course_id_1 as $tmp_course_id)
              {
                  if (trim($tmp_course_id) === trim($cadaselect[1])) { $course_id_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->course_id) === trim($cadaselect[1])) { $course_id_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="course_id" value="<?php echo $this->form_encode_input($course_id) . "\">" . $course_id_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_course_id();
   $x = 0 ; 
   $course_id_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->course_id_1))
          {
              foreach ($this->course_id_1 as $tmp_course_id)
              {
                  if (trim($tmp_course_id) === trim($cadaselect[1])) { $course_id_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->course_id) === trim($cadaselect[1])) { $course_id_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($course_id_look))
          {
              $course_id_look = $this->course_id;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_course_id\" class=\"css_course_id_line\" style=\"" .  $sStyleReadLab_course_id . "\">" . $this->form_encode_input($course_id_look) . "</span><span id=\"id_read_off_course_id\" class=\"css_read_off_course_id\" style=\"white-space: nowrap; " . $sStyleReadInp_course_id . "\">";
   echo " <span id=\"idAjaxSelect_course_id\"><select class=\"sc-js-input scFormObjectOdd css_course_id_obj\" style=\"\" id=\"id_sc_field_course_id\" name=\"course_id\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_course_id'][] = ''; 
   echo "  <option value=\"\"> </option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->course_id) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->course_id)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_course_id_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_course_id_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_course_id_dumb = ('' == $sStyleHidden_course_id) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_course_id_dumb" style="<?php echo $sStyleHidden_course_id_dumb; ?>"></TD>
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
       <TD align="" valign="" class="scFormBlockFont">Applicant Information</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['firstname']))
    {
        $this->nm_new_label['firstname'] = "First name";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $firstname = $this->firstname;
   $sStyleHidden_firstname = '';
   if (isset($this->nmgp_cmp_hidden['firstname']) && $this->nmgp_cmp_hidden['firstname'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['firstname']);
       $sStyleHidden_firstname = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_firstname = 'display: none;';
   $sStyleReadInp_firstname = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['firstname']) && $this->nmgp_cmp_readonly['firstname'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['firstname']);
       $sStyleReadLab_firstname = '';
       $sStyleReadInp_firstname = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['firstname']) && $this->nmgp_cmp_hidden['firstname'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="firstname" value="<?php echo $this->form_encode_input($firstname) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_firstname_line" id="hidden_field_data_firstname" style="<?php echo $sStyleHidden_firstname; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_firstname_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_firstname_label"><span id="id_label_firstname"><?php echo $this->nm_new_label['firstname']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['php_cmp_required']['firstname']) || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['php_cmp_required']['firstname'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["firstname"]) &&  $this->nmgp_cmp_readonly["firstname"] == "on") { 

 ?>
<input type="hidden" name="firstname" value="<?php echo $this->form_encode_input($firstname) . "\">" . $firstname . ""; ?>
<?php } else { ?>
<span id="id_read_on_firstname" class="sc-ui-readonly-firstname css_firstname_line" style="<?php echo $sStyleReadLab_firstname; ?>"><?php echo $this->form_encode_input($this->firstname); ?></span><span id="id_read_off_firstname" class="css_read_off_firstname" style="white-space: nowrap;<?php echo $sStyleReadInp_firstname; ?>">
 <input class="sc-js-input scFormObjectOdd css_firstname_obj" style="" id="id_sc_field_firstname" type=text name="firstname" value="<?php echo $this->form_encode_input($firstname) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_firstname_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_firstname_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['lastname']))
    {
        $this->nm_new_label['lastname'] = "Last name";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $lastname = $this->lastname;
   $sStyleHidden_lastname = '';
   if (isset($this->nmgp_cmp_hidden['lastname']) && $this->nmgp_cmp_hidden['lastname'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['lastname']);
       $sStyleHidden_lastname = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_lastname = 'display: none;';
   $sStyleReadInp_lastname = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['lastname']) && $this->nmgp_cmp_readonly['lastname'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['lastname']);
       $sStyleReadLab_lastname = '';
       $sStyleReadInp_lastname = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['lastname']) && $this->nmgp_cmp_hidden['lastname'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="lastname" value="<?php echo $this->form_encode_input($lastname) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_lastname_line" id="hidden_field_data_lastname" style="<?php echo $sStyleHidden_lastname; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_lastname_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_lastname_label"><span id="id_label_lastname"><?php echo $this->nm_new_label['lastname']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['php_cmp_required']['lastname']) || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['php_cmp_required']['lastname'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["lastname"]) &&  $this->nmgp_cmp_readonly["lastname"] == "on") { 

 ?>
<input type="hidden" name="lastname" value="<?php echo $this->form_encode_input($lastname) . "\">" . $lastname . ""; ?>
<?php } else { ?>
<span id="id_read_on_lastname" class="sc-ui-readonly-lastname css_lastname_line" style="<?php echo $sStyleReadLab_lastname; ?>"><?php echo $this->form_encode_input($this->lastname); ?></span><span id="id_read_off_lastname" class="css_read_off_lastname" style="white-space: nowrap;<?php echo $sStyleReadInp_lastname; ?>">
 <input class="sc-js-input scFormObjectOdd css_lastname_obj" style="" id="id_sc_field_lastname" type=text name="lastname" value="<?php echo $this->form_encode_input($lastname) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_lastname_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_lastname_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_lastname_dumb = ('' == $sStyleHidden_lastname) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_lastname_dumb" style="<?php echo $sStyleHidden_lastname_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_2"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">Demographics</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['nationality']))
   {
       $this->nm_new_label['nationality'] = "Nationality (listed by country)";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nationality = $this->nationality;
   $sStyleHidden_nationality = '';
   if (isset($this->nmgp_cmp_hidden['nationality']) && $this->nmgp_cmp_hidden['nationality'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nationality']);
       $sStyleHidden_nationality = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nationality = 'display: none;';
   $sStyleReadInp_nationality = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nationality']) && $this->nmgp_cmp_readonly['nationality'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nationality']);
       $sStyleReadLab_nationality = '';
       $sStyleReadInp_nationality = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nationality']) && $this->nmgp_cmp_hidden['nationality'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="nationality" value="<?php echo $this->form_encode_input($this->nationality) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nationality_line" id="hidden_field_data_nationality" style="<?php echo $sStyleHidden_nationality; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nationality_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nationality_label"><span id="id_label_nationality"><?php echo $this->nm_new_label['nationality']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['php_cmp_required']['nationality']) || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['php_cmp_required']['nationality'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nationality"]) &&  $this->nmgp_cmp_readonly["nationality"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_nationality']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_nationality'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_nationality']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_nationality'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_nationality']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_nationality'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_nationality']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_nationality'] = array(); 
    }

   $old_value_dateofbirth = $this->dateofbirth;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dateofbirth = $this->dateofbirth;

   $accept_tnc_val_str = "''";
   if (!empty($this->accept_tnc))
   {
       if (is_array($this->accept_tnc))
       {
           $Tmp_array = $this->accept_tnc;
       }
       else
       {
           $Tmp_array = explode(";", $this->accept_tnc);
       }
       $accept_tnc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $accept_tnc_val_str)
          {
             $accept_tnc_val_str .= ", ";
          }
          $accept_tnc_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT id, country_name  FROM countries  ORDER BY country_name";

   $this->dateofbirth = $old_value_dateofbirth;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_nationality'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $nationality_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->nationality_1))
          {
              foreach ($this->nationality_1 as $tmp_nationality)
              {
                  if (trim($tmp_nationality) === trim($cadaselect[1])) { $nationality_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->nationality) === trim($cadaselect[1])) { $nationality_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="nationality" value="<?php echo $this->form_encode_input($nationality) . "\">" . $nationality_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_nationality();
   $x = 0 ; 
   $nationality_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->nationality_1))
          {
              foreach ($this->nationality_1 as $tmp_nationality)
              {
                  if (trim($tmp_nationality) === trim($cadaselect[1])) { $nationality_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->nationality) === trim($cadaselect[1])) { $nationality_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($nationality_look))
          {
              $nationality_look = $this->nationality;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_nationality\" class=\"css_nationality_line\" style=\"" .  $sStyleReadLab_nationality . "\">" . $this->form_encode_input($nationality_look) . "</span><span id=\"id_read_off_nationality\" class=\"css_read_off_nationality\" style=\"white-space: nowrap; " . $sStyleReadInp_nationality . "\">";
   echo " <span id=\"idAjaxSelect_nationality\"><select class=\"sc-js-input scFormObjectOdd css_nationality_obj\" style=\"\" id=\"id_sc_field_nationality\" name=\"nationality\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_nationality'][] = ''; 
   echo "  <option value=\"\"> </option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->nationality) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->nationality)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nationality_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nationality_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['dateofbirth']))
    {
        $this->nm_new_label['dateofbirth'] = "Date of birth";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dateofbirth = $this->dateofbirth;
   $sStyleHidden_dateofbirth = '';
   if (isset($this->nmgp_cmp_hidden['dateofbirth']) && $this->nmgp_cmp_hidden['dateofbirth'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dateofbirth']);
       $sStyleHidden_dateofbirth = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dateofbirth = 'display: none;';
   $sStyleReadInp_dateofbirth = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dateofbirth']) && $this->nmgp_cmp_readonly['dateofbirth'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dateofbirth']);
       $sStyleReadLab_dateofbirth = '';
       $sStyleReadInp_dateofbirth = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dateofbirth']) && $this->nmgp_cmp_hidden['dateofbirth'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dateofbirth" value="<?php echo $this->form_encode_input($dateofbirth) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_dateofbirth_line" id="hidden_field_data_dateofbirth" style="<?php echo $sStyleHidden_dateofbirth; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dateofbirth_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_dateofbirth_label"><span id="id_label_dateofbirth"><?php echo $this->nm_new_label['dateofbirth']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['php_cmp_required']['dateofbirth']) || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['php_cmp_required']['dateofbirth'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?><span class="scFormPopupBubble" style="display: inline-block"><span class="scFormPopupTrigger"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "return false;", "return false;", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span><table class="scFormPopup"><tbody><?php
if (isset($_SESSION['scriptcase']['reg_conf']['html_dir']) && $_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'") {
?>
<tr><td class="scFormPopupTopRight scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopLeft scFormPopupCorner"></td></tr><tr><td class="scFormPopupRight"></td><td class="scFormPopupContent">Type only number in ddmmyyyy format or <br/>Select the date from calender. </td><td class="scFormPopupLeft"></td></tr><tr><td class="scFormPopupBottomRight scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomLeft scFormPopupCorner"></td></tr><?php
} else {
?>
<tr><td class="scFormPopupTopLeft scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopRight scFormPopupCorner"></td></tr><tr><td class="scFormPopupLeft"></td><td class="scFormPopupContent">Type only number in ddmmyyyy format or <br/>Select the date from calender. </td><td class="scFormPopupRight"></td></tr><tr><td class="scFormPopupBottomLeft scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomRight scFormPopupCorner"></td></tr><?php
}
?>
</tbody></table></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dateofbirth"]) &&  $this->nmgp_cmp_readonly["dateofbirth"] == "on") { 

 ?>
<input type="hidden" name="dateofbirth" value="<?php echo $this->form_encode_input($dateofbirth) . "\">" . $dateofbirth . ""; ?>
<?php } else { ?>
<?php
    $old_dateofbirth = $this->dateofbirth;
    nmgp_Form_Datas($this->dateofbirth, $this->field_config['dateofbirth']['date_format'], $this->field_config['dateofbirth']['date_sep']);
?>
<span id="id_read_on_dateofbirth" class="css_dateofbirth_line" style="<?php echo $sStyleReadLab_dateofbirth; ?>"><?php echo $this->form_encode_input($this->dateofbirth); ?></span><span id="id_read_off_dateofbirth" class="css_read_off_dateofbirth" style="<?php echo $sStyleReadInp_dateofbirth; ?>"><?php
    $this->dateofbirth = $old_dateofbirth;
?>
<?php
    $s_date_info_pos  = strtolower(str_replace('aaaa', 'yyyy', $this->field_config['dateofbirth']['date_format']));
    $i_date_pos_day   = strpos($s_date_info_pos, 'dd');
    $i_date_pos_month = strpos($s_date_info_pos, 'mm');
    $i_date_pos_year  = strpos($s_date_info_pos, 'yyyy');
    $i_arr_date_pos   = array($i_date_pos_day => 'd', $i_date_pos_month => 'm', $i_date_pos_year => 'y');
    ksort($i_arr_date_pos);
    $old_dateofbirth = $this->dateofbirth;
    nmgp_Form_Datas($this->dateofbirth, $this->field_config['dateofbirth']['date_format'], $this->field_config['dateofbirth']['date_sep']);
?>
<?php
    foreach ($i_arr_date_pos as $IX => $Part_date)
    {
        if ($Part_date == "d")
        {
?>
<span style="display: inline-block"><select class="sc-js-input scFormObjectOdd css_dateofbirth_obj" style="" name="dateofbirth_dia" id="id_sc_field_dateofbirth_dia">
  <option value="01"<?php  if (substr($this->dateofbirth, $i_date_pos_day, 2) == "01") { echo " selected" ;} ?>>01</option>
  <option value="02"<?php  if (substr($this->dateofbirth, $i_date_pos_day, 2) == "02") { echo " selected" ;} ?>>02</option>
  <option value="03"<?php  if (substr($this->dateofbirth, $i_date_pos_day, 2) == "03") { echo " selected" ;} ?>>03</option>
  <option value="04"<?php  if (substr($this->dateofbirth, $i_date_pos_day, 2) == "04") { echo " selected" ;} ?>>04</option>
  <option value="05"<?php  if (substr($this->dateofbirth, $i_date_pos_day, 2) == "05") { echo " selected" ;} ?>>05</option>
  <option value="06"<?php  if (substr($this->dateofbirth, $i_date_pos_day, 2) == "06") { echo " selected" ;} ?>>06</option>
  <option value="07"<?php  if (substr($this->dateofbirth, $i_date_pos_day, 2) == "07") { echo " selected" ;} ?>>07</option>
  <option value="08"<?php  if (substr($this->dateofbirth, $i_date_pos_day, 2) == "08") { echo " selected" ;} ?>>08</option>
  <option value="09"<?php  if (substr($this->dateofbirth, $i_date_pos_day, 2) == "09") { echo " selected" ;} ?>>09</option>
  <option value="10"<?php  if (substr($this->dateofbirth, $i_date_pos_day, 2) == "10") { echo " selected" ;} ?>>10</option>
  <option value="11"<?php  if (substr($this->dateofbirth, $i_date_pos_day, 2) == "11") { echo " selected" ;} ?>>11</option>
  <option value="12"<?php  if (substr($this->dateofbirth, $i_date_pos_day, 2) == "12") { echo " selected" ;} ?>>12</option>
  <option value="13"<?php  if (substr($this->dateofbirth, $i_date_pos_day, 2) == "13") { echo " selected" ;} ?>>13</option>
  <option value="14"<?php  if (substr($this->dateofbirth, $i_date_pos_day, 2) == "14") { echo " selected" ;} ?>>14</option>
  <option value="15"<?php  if (substr($this->dateofbirth, $i_date_pos_day, 2) == "15") { echo " selected" ;} ?>>15</option>
  <option value="16"<?php  if (substr($this->dateofbirth, $i_date_pos_day, 2) == "16") { echo " selected" ;} ?>>16</option>
  <option value="17"<?php  if (substr($this->dateofbirth, $i_date_pos_day, 2) == "17") { echo " selected" ;} ?>>17</option>
  <option value="18"<?php  if (substr($this->dateofbirth, $i_date_pos_day, 2) == "18") { echo " selected" ;} ?>>18</option>
  <option value="19"<?php  if (substr($this->dateofbirth, $i_date_pos_day, 2) == "19") { echo " selected" ;} ?>>19</option>
  <option value="20"<?php  if (substr($this->dateofbirth, $i_date_pos_day, 2) == "20") { echo " selected" ;} ?>>20</option>
  <option value="21"<?php  if (substr($this->dateofbirth, $i_date_pos_day, 2) == "21") { echo " selected" ;} ?>>21</option>
  <option value="22"<?php  if (substr($this->dateofbirth, $i_date_pos_day, 2) == "22") { echo " selected" ;} ?>>22</option>
  <option value="23"<?php  if (substr($this->dateofbirth, $i_date_pos_day, 2) == "23") { echo " selected" ;} ?>>23</option>
  <option value="24"<?php  if (substr($this->dateofbirth, $i_date_pos_day, 2) == "24") { echo " selected" ;} ?>>24</option>
  <option value="25"<?php  if (substr($this->dateofbirth, $i_date_pos_day, 2) == "25") { echo " selected" ;} ?>>25</option>
  <option value="26"<?php  if (substr($this->dateofbirth, $i_date_pos_day, 2) == "26") { echo " selected" ;} ?>>26</option>
  <option value="27"<?php  if (substr($this->dateofbirth, $i_date_pos_day, 2) == "27") { echo " selected" ;} ?>>27</option>
  <option value="28"<?php  if (substr($this->dateofbirth, $i_date_pos_day, 2) == "28") { echo " selected" ;} ?>>28</option>
  <option value="29"<?php  if (substr($this->dateofbirth, $i_date_pos_day, 2) == "29") { echo " selected" ;} ?>>29</option>
  <option value="30"<?php  if (substr($this->dateofbirth, $i_date_pos_day, 2) == "30") { echo " selected" ;} ?>>30</option>
  <option value="31"<?php  if (substr($this->dateofbirth, $i_date_pos_day, 2) == "31") { echo " selected" ;} ?>>31</option>
</select>
<br><span class="scFormDataHelpOdd"><?php echo $this->Ini->Nm_lang['lang_othr_date_days']; ?></span></span><?php
        }
        if ($Part_date == "m")
        {
?>
<span style="display: inline-block"><select class="sc-js-input scFormObjectOdd css_dateofbirth_obj" style="" name="dateofbirth_mes" id="id_sc_field_dateofbirth_mes">
  <option value="01"<?php  if (substr($this->dateofbirth, $i_date_pos_month, 2) == "01") { echo " selected" ;} ?>>01</option>
  <option value="02"<?php  if (substr($this->dateofbirth, $i_date_pos_month, 2) == "02") { echo " selected" ;} ?>>02</option>
  <option value="03"<?php  if (substr($this->dateofbirth, $i_date_pos_month, 2) == "03") { echo " selected" ;} ?>>03</option>
  <option value="04"<?php  if (substr($this->dateofbirth, $i_date_pos_month, 2) == "04") { echo " selected" ;} ?>>04</option>
  <option value="05"<?php  if (substr($this->dateofbirth, $i_date_pos_month, 2) == "05") { echo " selected" ;} ?>>05</option>
  <option value="06"<?php  if (substr($this->dateofbirth, $i_date_pos_month, 2) == "06") { echo " selected" ;} ?>>06</option>
  <option value="07"<?php  if (substr($this->dateofbirth, $i_date_pos_month, 2) == "07") { echo " selected" ;} ?>>07</option>
  <option value="08"<?php  if (substr($this->dateofbirth, $i_date_pos_month, 2) == "08") { echo " selected" ;} ?>>08</option>
  <option value="09"<?php  if (substr($this->dateofbirth, $i_date_pos_month, 2) == "09") { echo " selected" ;} ?>>09</option>
  <option value="10"<?php  if (substr($this->dateofbirth, $i_date_pos_month, 2) == "10") { echo " selected" ;} ?>>10</option>
  <option value="11"<?php  if (substr($this->dateofbirth, $i_date_pos_month, 2) == "11") { echo " selected" ;} ?>>11</option>
  <option value="12"<?php  if (substr($this->dateofbirth, $i_date_pos_month, 2) == "12") { echo " selected" ;} ?>>12</option>
</select>
<br><span class="scFormDataHelpOdd"><?php echo $this->Ini->Nm_lang['lang_othr_date_mnth']; ?></span></span><?php
        }
        if ($Part_date == "y")
        {
?>
<span style="display: inline-block"><select class="sc-js-input scFormObjectOdd css_dateofbirth_obj" style="" name="dateofbirth_ano" id="id_sc_field_dateofbirth_ano">
<?php
  $Combo_ano_ini = 1960;
  $Combo_ano_end = date('Y') + -15;
  for ($I_ano = $Combo_ano_ini; $I_ano <= $Combo_ano_end; $I_ano++)
  {
?>
  <option value="<?php echo $I_ano; ?>"<?php  if (substr($this->dateofbirth, $i_date_pos_year, 4) == $I_ano) { echo " selected" ;} ?>><?php echo $I_ano; ?></option>
<?php
  }
?>
</select>
<br><span class="scFormDataHelpOdd"><?php echo $this->Ini->Nm_lang['lang_othr_date_year']; ?></span></span><?php
        }
    }
?>
<span style="display: inline-block"><input type="hidden" id="id_sc_dummy_dateofbirth" /><br>&nbsp;</span><?php
$tmp_form_data = $this->field_config['dateofbirth']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
     $this->dateofbirth = $old_dateofbirth;
?>
<?php  } ?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dateofbirth_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dateofbirth_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['gender']))
    {
        $this->nm_new_label['gender'] = "Gender";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $gender = $this->gender;
   $sStyleHidden_gender = '';
   if (isset($this->nmgp_cmp_hidden['gender']) && $this->nmgp_cmp_hidden['gender'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['gender']);
       $sStyleHidden_gender = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_gender = 'display: none;';
   $sStyleReadInp_gender = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['gender']) && $this->nmgp_cmp_readonly['gender'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['gender']);
       $sStyleReadLab_gender = '';
       $sStyleReadInp_gender = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['gender']) && $this->nmgp_cmp_hidden['gender'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="gender" value="<?php echo $this->form_encode_input($gender) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_gender_line" id="hidden_field_data_gender" style="<?php echo $sStyleHidden_gender; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_gender_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_gender_label"><span id="id_label_gender"><?php echo $this->nm_new_label['gender']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['php_cmp_required']['gender']) || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['php_cmp_required']['gender'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["gender"]) &&  $this->nmgp_cmp_readonly["gender"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_gender']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_gender'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_gender']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_gender'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_gender']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_gender'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_gender']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_gender'] = array(); 
    }

   $old_value_dateofbirth = $this->dateofbirth;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dateofbirth = $this->dateofbirth;

   $accept_tnc_val_str = "''";
   if (!empty($this->accept_tnc))
   {
       if (is_array($this->accept_tnc))
       {
           $Tmp_array = $this->accept_tnc;
       }
       else
       {
           $Tmp_array = explode(";", $this->accept_tnc);
       }
       $accept_tnc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $accept_tnc_val_str)
          {
             $accept_tnc_val_str .= ", ";
          }
          $accept_tnc_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT id, name  FROM lookup_gender  ORDER BY id";

   $this->dateofbirth = $old_value_dateofbirth;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_gender'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $gender_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->gender_1))
          {
              foreach ($this->gender_1 as $tmp_gender)
              {
                  if (trim($tmp_gender) === trim($cadaselect[1])) { $gender_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->gender) === trim($cadaselect[1])) { $gender_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="gender" value="<?php echo $this->form_encode_input($gender) . "\">" . $gender_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_gender();
   $x = 0 ; 
   $gender_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->gender_1))
          {
              foreach ($this->gender_1 as $tmp_gender)
              {
                  if (trim($tmp_gender) === trim($cadaselect[1])) { $gender_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->gender) === trim($cadaselect[1])) { $gender_look .= $cadaselect[0]; } 
          $x++; 
   }
   $x = 0; 
   echo "<span id=\"id_read_on_gender\" class=\"css_gender_line\" style=\"" .  $sStyleReadLab_gender . "\">" . $this->form_encode_input($gender_look) . "</span><span id=\"id_read_off_gender\" class=\"css_read_off_gender css_gender_line\" style=\"" . $sStyleReadInp_gender . "\">";
   echo "<div id=\"idAjaxRadio_gender\" class=\"css_gender_line\" style=\"display: inline-block\">\r\n";
   $y = 0 ; 
   echo "<table cellspacing=0 cellpadding=0 border=0>\r\n";
   echo " <tr>\r\n";
   while (!empty($todo[$x])) 
   {
          $cadaradio = explode("?#?", $todo[$x]) ; 
          if ($cadaradio[1] == "@ ") {$cadaradio[1]= trim($cadaradio[1]); } ; 
          if ($y == 1)
          {
              echo " </tr>\r\n";
              echo " <tr>\r\n";
              $y = 0;
          }
          echo "  <td class=\"scFormDataFontOdd css_gender_line\">\r\n";
          echo "      <div class=\"sc radio\">";
          $tempOptionId = "id-opt-gender-" . $x;
          echo "    <input id=\"" . $tempOptionId . "\" type=radio name=\"gender\" value=\"$cadaradio[1]\" class=\"sc-ui-radio-gender sc-ui-radio-gender\"";
          if (trim($this->gender) === trim($cadaradio[1])) 
          { 
              echo " checked" ; 
          } 
          if (strtoupper($cadaradio[2]) == "S") 
          { 
              if (empty($this->gender)) 
              { 
                  echo " checked" ; 
              } 
          } 
          echo "  onClick=\"" . $sCheckInsert . "\" >" ; 
          echo "<span></span>";
          echo "<label for=\"" . $tempOptionId . "\">" . $cadaradio[0] . "</label>";
          echo "      </div>";
          $x++ ; 
          $y++ ; 
          echo "  </font></td>\r\n";
   } 
   echo " </tr>\r\n";
   echo "</table>";
   echo "</div>\r\n";
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_gender_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_gender_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['resident']))
    {
        $this->nm_new_label['resident'] = "Are you a resident of UAE?";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $resident = $this->resident;
   $sStyleHidden_resident = '';
   if (isset($this->nmgp_cmp_hidden['resident']) && $this->nmgp_cmp_hidden['resident'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['resident']);
       $sStyleHidden_resident = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_resident = 'display: none;';
   $sStyleReadInp_resident = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['resident']) && $this->nmgp_cmp_readonly['resident'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['resident']);
       $sStyleReadLab_resident = '';
       $sStyleReadInp_resident = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['resident']) && $this->nmgp_cmp_hidden['resident'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="resident" value="<?php echo $this->form_encode_input($resident) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_resident_line" id="hidden_field_data_resident" style="<?php echo $sStyleHidden_resident; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_resident_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_resident_label"><span id="id_label_resident"><?php echo $this->nm_new_label['resident']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['php_cmp_required']['resident']) || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['php_cmp_required']['resident'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["resident"]) &&  $this->nmgp_cmp_readonly["resident"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_resident']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_resident'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_resident']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_resident'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_resident']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_resident'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_resident']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_resident'] = array(); 
    }

   $old_value_dateofbirth = $this->dateofbirth;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dateofbirth = $this->dateofbirth;

   $accept_tnc_val_str = "''";
   if (!empty($this->accept_tnc))
   {
       if (is_array($this->accept_tnc))
       {
           $Tmp_array = $this->accept_tnc;
       }
       else
       {
           $Tmp_array = explode(";", $this->accept_tnc);
       }
       $accept_tnc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $accept_tnc_val_str)
          {
             $accept_tnc_val_str .= ", ";
          }
          $accept_tnc_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT id, name  FROM lookup_yes_no  ORDER BY id desc";

   $this->dateofbirth = $old_value_dateofbirth;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_resident'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $resident_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->resident_1))
          {
              foreach ($this->resident_1 as $tmp_resident)
              {
                  if (trim($tmp_resident) === trim($cadaselect[1])) { $resident_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->resident) === trim($cadaselect[1])) { $resident_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="resident" value="<?php echo $this->form_encode_input($resident) . "\">" . $resident_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_resident();
   $x = 0 ; 
   $resident_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->resident_1))
          {
              foreach ($this->resident_1 as $tmp_resident)
              {
                  if (trim($tmp_resident) === trim($cadaselect[1])) { $resident_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->resident) === trim($cadaselect[1])) { $resident_look .= $cadaselect[0]; } 
          $x++; 
   }
   $x = 0; 
   echo "<span id=\"id_read_on_resident\" class=\"css_resident_line\" style=\"" .  $sStyleReadLab_resident . "\">" . $this->form_encode_input($resident_look) . "</span><span id=\"id_read_off_resident\" class=\"css_read_off_resident css_resident_line\" style=\"" . $sStyleReadInp_resident . "\">";
   echo "<div id=\"idAjaxRadio_resident\" class=\"css_resident_line\" style=\"display: inline-block\">\r\n";
   $y = 0 ; 
   echo "<table cellspacing=0 cellpadding=0 border=0>\r\n";
   echo " <tr>\r\n";
   while (!empty($todo[$x])) 
   {
          $cadaradio = explode("?#?", $todo[$x]) ; 
          if ($cadaradio[1] == "@ ") {$cadaradio[1]= trim($cadaradio[1]); } ; 
          if ($y == 1)
          {
              echo " </tr>\r\n";
              echo " <tr>\r\n";
              $y = 0;
          }
          echo "  <td class=\"scFormDataFontOdd css_resident_line\">\r\n";
          echo "      <div class=\"sc radio\">";
          $tempOptionId = "id-opt-resident-" . $x;
          echo "    <input id=\"" . $tempOptionId . "\" type=radio name=\"resident\" value=\"$cadaradio[1]\" class=\"sc-ui-radio-resident sc-ui-radio-resident\"";
          if (trim($this->resident) === trim($cadaradio[1])) 
          { 
              echo " checked" ; 
          } 
          if (strtoupper($cadaradio[2]) == "S") 
          { 
              if (empty($this->resident)) 
              { 
                  echo " checked" ; 
              } 
          } 
          echo "  onClick=\"" . $sCheckInsert . "\" >" ; 
          echo "<span></span>";
          echo "<label for=\"" . $tempOptionId . "\">" . $cadaradio[0] . "</label>";
          echo "      </div>";
          $x++ ; 
          $y++ ; 
          echo "  </font></td>\r\n";
   } 
   echo " </tr>\r\n";
   echo "</table>";
   echo "</div>\r\n";
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_resident_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_resident_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_resident_dumb = ('' == $sStyleHidden_resident) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_resident_dumb" style="<?php echo $sStyleHidden_resident_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_3"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_3"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_3" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">New Login</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['email']))
    {
        $this->nm_new_label['email'] = "Email";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $email = $this->email;
   $sStyleHidden_email = '';
   if (isset($this->nmgp_cmp_hidden['email']) && $this->nmgp_cmp_hidden['email'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['email']);
       $sStyleHidden_email = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_email = 'display: none;';
   $sStyleReadInp_email = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['email']) && $this->nmgp_cmp_readonly['email'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['email']);
       $sStyleReadLab_email = '';
       $sStyleReadInp_email = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['email']) && $this->nmgp_cmp_hidden['email'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="email" value="<?php echo $this->form_encode_input($email) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_email_line" id="hidden_field_data_email" style="<?php echo $sStyleHidden_email; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_email_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_email_label"><span id="id_label_email"><?php echo $this->nm_new_label['email']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['php_cmp_required']['email']) || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['php_cmp_required']['email'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?><span class="scFormPopupBubble" style="display: inline-block"><span class="scFormPopupTrigger"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "return false;", "return false;", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span><table class="scFormPopup"><tbody><?php
if (isset($_SESSION['scriptcase']['reg_conf']['html_dir']) && $_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'") {
?>
<tr><td class="scFormPopupTopRight scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopLeft scFormPopupCorner"></td></tr><tr><td class="scFormPopupRight"></td><td class="scFormPopupContent"><p>SPAA will send confirmation details to this email address. <br>To change your email please click on your name in the top navigation bar</P></td><td class="scFormPopupLeft"></td></tr><tr><td class="scFormPopupBottomRight scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomLeft scFormPopupCorner"></td></tr><?php
} else {
?>
<tr><td class="scFormPopupTopLeft scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopRight scFormPopupCorner"></td></tr><tr><td class="scFormPopupLeft"></td><td class="scFormPopupContent"><p>SPAA will send confirmation details to this email address. <br>To change your email please click on your name in the top navigation bar</P></td><td class="scFormPopupRight"></td></tr><tr><td class="scFormPopupBottomLeft scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomRight scFormPopupCorner"></td></tr><?php
}
?>
</tbody></table></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["email"]) &&  $this->nmgp_cmp_readonly["email"] == "on") { 

 ?>
<input type="hidden" name="email" value="<?php echo $this->form_encode_input($email) . "\">" . $email . ""; ?>
<?php } else { ?>
<span id="id_read_on_email" class="sc-ui-readonly-email css_email_line" style="<?php echo $sStyleReadLab_email; ?>"><?php echo $this->form_encode_input($this->email); ?></span><span id="id_read_off_email" class="css_read_off_email" style="white-space: nowrap;<?php echo $sStyleReadInp_email; ?>">
 <input class="sc-js-input scFormObjectOdd css_email_obj" style="" id="id_sc_field_email" type=text name="email" value="<?php echo $this->form_encode_input($email) ?>"
 size=50 maxlength=60 alt="{datatype: 'text', maxLength: 60, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_email_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_email_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['password']))
    {
        $this->nm_new_label['password'] = "Password";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $password = $this->password;
   $sStyleHidden_password = '';
   if (isset($this->nmgp_cmp_hidden['password']) && $this->nmgp_cmp_hidden['password'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['password']);
       $sStyleHidden_password = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_password = 'display: none;';
   $sStyleReadInp_password = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['password']) && $this->nmgp_cmp_readonly['password'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['password']);
       $sStyleReadLab_password = '';
       $sStyleReadInp_password = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['password']) && $this->nmgp_cmp_hidden['password'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="password" value="<?php echo $this->form_encode_input($password) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_password_line" id="hidden_field_data_password" style="<?php echo $sStyleHidden_password; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_password_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_password_label"><span id="id_label_password"><?php echo $this->nm_new_label['password']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['php_cmp_required']['password']) || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['php_cmp_required']['password'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["password"]) &&  $this->nmgp_cmp_readonly["password"] == "on") { ?>
<input type="hidden" name="password" value="">
<?php } else { ?>
<span id="id_read_on_password" class="sc-ui-readonly-password css_password_line" style="<?php echo $sStyleReadLab_password; ?>"><?php echo $this->form_encode_input($this->password); ?></span><span id="id_read_off_password" class="css_read_off_password" style="white-space: nowrap;<?php echo $sStyleReadInp_password; ?>"><input class="sc-js-input scFormObjectOdd css_password_obj" style="" id="id_sc_field_password" type=password autocomplete="off" name="password" value="" 
 size=50 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_password_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_password_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['confirm_password']))
    {
        $this->nm_new_label['confirm_password'] = "Confirm Password";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $confirm_password = $this->confirm_password;
   $sStyleHidden_confirm_password = '';
   if (isset($this->nmgp_cmp_hidden['confirm_password']) && $this->nmgp_cmp_hidden['confirm_password'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['confirm_password']);
       $sStyleHidden_confirm_password = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_confirm_password = 'display: none;';
   $sStyleReadInp_confirm_password = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['confirm_password']) && $this->nmgp_cmp_readonly['confirm_password'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['confirm_password']);
       $sStyleReadLab_confirm_password = '';
       $sStyleReadInp_confirm_password = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['confirm_password']) && $this->nmgp_cmp_hidden['confirm_password'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="confirm_password" value="<?php echo $this->form_encode_input($confirm_password) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_confirm_password_line" id="hidden_field_data_confirm_password" style="<?php echo $sStyleHidden_confirm_password; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_confirm_password_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_confirm_password_label"><span id="id_label_confirm_password"><?php echo $this->nm_new_label['confirm_password']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['php_cmp_required']['confirm_password']) || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['php_cmp_required']['confirm_password'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["confirm_password"]) &&  $this->nmgp_cmp_readonly["confirm_password"] == "on") { ?>
<input type="hidden" name="confirm_password" value="">
<?php } else { ?>
<span id="id_read_on_confirm_password" class="sc-ui-readonly-confirm_password css_confirm_password_line" style="<?php echo $sStyleReadLab_confirm_password; ?>"><?php echo $this->form_encode_input($this->confirm_password); ?></span><span id="id_read_off_confirm_password" class="css_read_off_confirm_password" style="white-space: nowrap;<?php echo $sStyleReadInp_confirm_password; ?>"><input class="sc-js-input scFormObjectOdd css_confirm_password_obj" style="" id="id_sc_field_confirm_password" type=password autocomplete="off" name="confirm_password" value="" 
 size=50 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_confirm_password_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_confirm_password_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_confirm_password_dumb = ('' == $sStyleHidden_confirm_password) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_confirm_password_dumb" style="<?php echo $sStyleHidden_confirm_password_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_4"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_4"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_4" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">Confirmation & Declaration</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['accept_tnc']))
   {
       $this->nm_new_label['accept_tnc'] = "T&C";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $accept_tnc = $this->accept_tnc;
   $sStyleHidden_accept_tnc = '';
   if (isset($this->nmgp_cmp_hidden['accept_tnc']) && $this->nmgp_cmp_hidden['accept_tnc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['accept_tnc']);
       $sStyleHidden_accept_tnc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_accept_tnc = 'display: none;';
   $sStyleReadInp_accept_tnc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['accept_tnc']) && $this->nmgp_cmp_readonly['accept_tnc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['accept_tnc']);
       $sStyleReadLab_accept_tnc = '';
       $sStyleReadInp_accept_tnc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['accept_tnc']) && $this->nmgp_cmp_hidden['accept_tnc'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="accept_tnc" value="<?php echo $this->form_encode_input($this->accept_tnc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->accept_tnc_1 = explode(";", trim($this->accept_tnc));
  } 
  else
  {
      if (empty($this->accept_tnc))
      {
          $this->accept_tnc_1= array(); 
          $this->accept_tnc= "";
      } 
      else
      {
          $this->accept_tnc_1= $this->accept_tnc; 
          $this->accept_tnc= ""; 
          foreach ($this->accept_tnc_1 as $cada_accept_tnc)
          {
             if (!empty($accept_tnc))
             {
                 $this->accept_tnc.= ";"; 
             } 
             $this->accept_tnc.= $cada_accept_tnc; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_accept_tnc_line" id="hidden_field_data_accept_tnc" style="<?php echo $sStyleHidden_accept_tnc; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_accept_tnc_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_accept_tnc_label"><span id="id_label_accept_tnc"><?php echo $this->nm_new_label['accept_tnc']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['php_cmp_required']['accept_tnc']) || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['php_cmp_required']['accept_tnc'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["accept_tnc"]) &&  $this->nmgp_cmp_readonly["accept_tnc"] == "on") { 

$accept_tnc_look = "";
 if ($this->accept_tnc == "Yes") { $accept_tnc_look .= "I agree" ;} 
 if (empty($accept_tnc_look)) { $accept_tnc_look = $this->accept_tnc; }
?>
<input type="hidden" name="accept_tnc" value="<?php echo $this->form_encode_input($accept_tnc) . "\">" . $accept_tnc_look . ""; ?>
<?php } else { ?>

<?php

$accept_tnc_look = "";
 if ($this->accept_tnc == "Yes") { $accept_tnc_look .= "I agree" ;} 
 if (empty($accept_tnc_look)) { $accept_tnc_look = $this->accept_tnc; }
?>
<span id="id_read_on_accept_tnc" class="css_accept_tnc_line" style="<?php echo $sStyleReadLab_accept_tnc; ?>"><?php echo $this->form_encode_input($accept_tnc_look); ?></span><span id="id_read_off_accept_tnc" class="css_read_off_accept_tnc css_accept_tnc_line" style="<?php echo $sStyleReadInp_accept_tnc; ?>"><?php echo "<div id=\"idAjaxCheckbox_accept_tnc\" style=\"display: inline-block\" class=\"css_accept_tnc_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_accept_tnc_line"><?php $tempOptionId = "id-opt-accept_tnc" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-accept_tnc sc-ui-checkbox-accept_tnc" name="accept_tnc[]" value="Yes"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['Lookup_accept_tnc'][] = 'Yes'; ?>
<?php  if (in_array("Yes", $this->accept_tnc_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">I agree</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_accept_tnc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_accept_tnc_text"></span></td></tr></table></td></tr></table> </TD>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-9", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_b", "", "Submit", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-10", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['run_iframe'] != "R")
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
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0,1,2,3,4);

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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("application_form_mob");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("application_form_mob");
 parent.scAjaxDetailHeight("application_form_mob", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("application_form_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("application_form_mob", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['sc_modal'])
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
		if ($("#sc_b_sai_t.sc-unique-btn-6").length && $("#sc_b_sai_t.sc-unique-btn-6").is(":visible")) {
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
		if ($("#sc_b_new_b.sc-unique-btn-9").length && $("#sc_b_new_b.sc-unique-btn-9").is(":visible")) {
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_b.sc-unique-btn-10").length && $("#sc_b_ins_b.sc-unique-btn-10").is(":visible")) {
			nm_atualiza ('incluir');
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
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['application_form_mob']['buttonStatus'] = $this->nmgp_botoes;
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
