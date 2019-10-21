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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Basic Information"); } else { echo strip_tags("Basic Information"); } ?></TITLE>
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_member_applicant/form_member_applicant_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = true;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_member_applicant_mob_sajax_js.php");
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

include_once('form_member_applicant_mob_jquery.php');

?>

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
?>
<body class="scFormPage" style="<?php echo $remove_margin . $str_iframe_body; ?>">
<?php

if (isset($_SESSION['scriptcase']['form_member_applicant']['error_buffer']) && '' != $_SESSION['scriptcase']['form_member_applicant']['error_buffer'])
{
    echo $_SESSION['scriptcase']['form_member_applicant']['error_buffer'];
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
 include_once("form_member_applicant_mob_js0.php");
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
               action="form_member_applicant_mob.php" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['insert_validation']; ?>">
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
<input type="hidden" name="login" value="<?php  echo $this->form_encode_input($this->login) ?>">
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_member_applicant_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_member_applicant_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute; z-index: 1000" id="id_error_display_table_frame">
<table class="scFormErrorTable scFormToastTable">
<tr><?php if ($this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><td style="padding: 0px" rowspan="2"><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top"></td><?php } ?><td class="scFormErrorTitle scFormToastTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><?php if (!$this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top">&nbsp;<?php } ?>Error: equired field missing!</td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
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
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="75%">
 <tr>
  <td>
  <div class="scFormBorder">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "Basic Information"; } else { echo "Basic Information"; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"></div>
</div></td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-10", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-11", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-12", "", "");?>
 
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['empty_filter'] = true;
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

    <TD class="scFormDataOdd css_firstname_line" id="hidden_field_data_firstname" style="<?php echo $sStyleHidden_firstname; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_firstname_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_firstname_label"><span id="id_label_firstname"><?php echo $this->nm_new_label['firstname']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['php_cmp_required']['firstname']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['php_cmp_required']['firstname'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
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

    <TD class="scFormDataOdd css_lastname_line" id="hidden_field_data_lastname" style="<?php echo $sStyleHidden_lastname; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_lastname_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_lastname_label"><span id="id_label_lastname"><?php echo $this->nm_new_label['lastname']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['php_cmp_required']['lastname']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['php_cmp_required']['lastname'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
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
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['middlename']))
    {
        $this->nm_new_label['middlename'] = "Middle name(s)";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $middlename = $this->middlename;
   $sStyleHidden_middlename = '';
   if (isset($this->nmgp_cmp_hidden['middlename']) && $this->nmgp_cmp_hidden['middlename'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['middlename']);
       $sStyleHidden_middlename = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_middlename = 'display: none;';
   $sStyleReadInp_middlename = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['middlename']) && $this->nmgp_cmp_readonly['middlename'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['middlename']);
       $sStyleReadLab_middlename = '';
       $sStyleReadInp_middlename = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['middlename']) && $this->nmgp_cmp_hidden['middlename'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="middlename" value="<?php echo $this->form_encode_input($middlename) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_middlename_line" id="hidden_field_data_middlename" style="<?php echo $sStyleHidden_middlename; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_middlename_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_middlename_label"><span id="id_label_middlename"><?php echo $this->nm_new_label['middlename']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["middlename"]) &&  $this->nmgp_cmp_readonly["middlename"] == "on") { 

 ?>
<input type="hidden" name="middlename" value="<?php echo $this->form_encode_input($middlename) . "\">" . $middlename . ""; ?>
<?php } else { ?>
<span id="id_read_on_middlename" class="sc-ui-readonly-middlename css_middlename_line" style="<?php echo $sStyleReadLab_middlename; ?>"><?php echo $this->form_encode_input($this->middlename); ?></span><span id="id_read_off_middlename" class="css_read_off_middlename" style="white-space: nowrap;<?php echo $sStyleReadInp_middlename; ?>">
 <input class="sc-js-input scFormObjectOdd css_middlename_obj" style="" id="id_sc_field_middlename" type=text name="middlename" value="<?php echo $this->form_encode_input($middlename) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_middlename_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_middlename_text"></span></td></tr></table></td></tr></table> </TD>
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

    <TD class="scFormDataOdd css_dateofbirth_line" id="hidden_field_data_dateofbirth" style="<?php echo $sStyleHidden_dateofbirth; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dateofbirth_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_dateofbirth_label"><span id="id_label_dateofbirth"><?php echo $this->nm_new_label['dateofbirth']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['php_cmp_required']['dateofbirth']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['php_cmp_required']['dateofbirth'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?><span class="scFormPopupBubble" style="display: inline-block"><span class="scFormPopupTrigger"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "return false;", "return false;", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
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






<?php $sStyleHidden_dateofbirth_dumb = ('' == $sStyleHidden_dateofbirth) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_dateofbirth_dumb" style="<?php echo $sStyleHidden_dateofbirth_dumb; ?>"></TD>
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
       <TD align="" valign="" class="scFormBlockFont">Address and Contact Details</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['address']))
    {
        $this->nm_new_label['address'] = "Address (line 1)";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $address = $this->address;
   $sStyleHidden_address = '';
   if (isset($this->nmgp_cmp_hidden['address']) && $this->nmgp_cmp_hidden['address'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['address']);
       $sStyleHidden_address = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_address = 'display: none;';
   $sStyleReadInp_address = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['address']) && $this->nmgp_cmp_readonly['address'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['address']);
       $sStyleReadLab_address = '';
       $sStyleReadInp_address = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['address']) && $this->nmgp_cmp_hidden['address'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="address" value="<?php echo $this->form_encode_input($address) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_address_line" id="hidden_field_data_address" style="<?php echo $sStyleHidden_address; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_address_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_address_label"><span id="id_label_address"><?php echo $this->nm_new_label['address']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['php_cmp_required']['address']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['php_cmp_required']['address'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["address"]) &&  $this->nmgp_cmp_readonly["address"] == "on") { 

 ?>
<input type="hidden" name="address" value="<?php echo $this->form_encode_input($address) . "\">" . $address . ""; ?>
<?php } else { ?>
<span id="id_read_on_address" class="sc-ui-readonly-address css_address_line" style="<?php echo $sStyleReadLab_address; ?>"><?php echo $this->form_encode_input($this->address); ?></span><span id="id_read_off_address" class="css_read_off_address" style="white-space: nowrap;<?php echo $sStyleReadInp_address; ?>">
 <input class="sc-js-input scFormObjectOdd css_address_obj" style="" id="id_sc_field_address" type=text name="address" value="<?php echo $this->form_encode_input($address) ?>"
 size=50 maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_address_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_address_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['address1']))
    {
        $this->nm_new_label['address1'] = "Address (line 2)";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $address1 = $this->address1;
   $sStyleHidden_address1 = '';
   if (isset($this->nmgp_cmp_hidden['address1']) && $this->nmgp_cmp_hidden['address1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['address1']);
       $sStyleHidden_address1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_address1 = 'display: none;';
   $sStyleReadInp_address1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['address1']) && $this->nmgp_cmp_readonly['address1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['address1']);
       $sStyleReadLab_address1 = '';
       $sStyleReadInp_address1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['address1']) && $this->nmgp_cmp_hidden['address1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="address1" value="<?php echo $this->form_encode_input($address1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_address1_line" id="hidden_field_data_address1" style="<?php echo $sStyleHidden_address1; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_address1_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_address1_label"><span id="id_label_address1"><?php echo $this->nm_new_label['address1']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["address1"]) &&  $this->nmgp_cmp_readonly["address1"] == "on") { 

 ?>
<input type="hidden" name="address1" value="<?php echo $this->form_encode_input($address1) . "\">" . $address1 . ""; ?>
<?php } else { ?>
<span id="id_read_on_address1" class="sc-ui-readonly-address1 css_address1_line" style="<?php echo $sStyleReadLab_address1; ?>"><?php echo $this->form_encode_input($this->address1); ?></span><span id="id_read_off_address1" class="css_read_off_address1" style="white-space: nowrap;<?php echo $sStyleReadInp_address1; ?>">
 <input class="sc-js-input scFormObjectOdd css_address1_obj" style="" id="id_sc_field_address1" type=text name="address1" value="<?php echo $this->form_encode_input($address1) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_address1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_address1_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['town']))
    {
        $this->nm_new_label['town'] = "Town";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $town = $this->town;
   $sStyleHidden_town = '';
   if (isset($this->nmgp_cmp_hidden['town']) && $this->nmgp_cmp_hidden['town'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['town']);
       $sStyleHidden_town = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_town = 'display: none;';
   $sStyleReadInp_town = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['town']) && $this->nmgp_cmp_readonly['town'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['town']);
       $sStyleReadLab_town = '';
       $sStyleReadInp_town = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['town']) && $this->nmgp_cmp_hidden['town'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="town" value="<?php echo $this->form_encode_input($town) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_town_line" id="hidden_field_data_town" style="<?php echo $sStyleHidden_town; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_town_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_town_label"><span id="id_label_town"><?php echo $this->nm_new_label['town']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['php_cmp_required']['town']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['php_cmp_required']['town'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["town"]) &&  $this->nmgp_cmp_readonly["town"] == "on") { 

 ?>
<input type="hidden" name="town" value="<?php echo $this->form_encode_input($town) . "\">" . $town . ""; ?>
<?php } else { ?>
<span id="id_read_on_town" class="sc-ui-readonly-town css_town_line" style="<?php echo $sStyleReadLab_town; ?>"><?php echo $this->form_encode_input($this->town); ?></span><span id="id_read_off_town" class="css_read_off_town" style="white-space: nowrap;<?php echo $sStyleReadInp_town; ?>">
 <input class="sc-js-input scFormObjectOdd css_town_obj" style="" id="id_sc_field_town" type=text name="town" value="<?php echo $this->form_encode_input($town) ?>"
 size=50 maxlength=60 alt="{datatype: 'text', maxLength: 60, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_town_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_town_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['county']))
    {
        $this->nm_new_label['county'] = "County";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $county = $this->county;
   $sStyleHidden_county = '';
   if (isset($this->nmgp_cmp_hidden['county']) && $this->nmgp_cmp_hidden['county'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['county']);
       $sStyleHidden_county = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_county = 'display: none;';
   $sStyleReadInp_county = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['county']) && $this->nmgp_cmp_readonly['county'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['county']);
       $sStyleReadLab_county = '';
       $sStyleReadInp_county = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['county']) && $this->nmgp_cmp_hidden['county'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="county" value="<?php echo $this->form_encode_input($county) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_county_line" id="hidden_field_data_county" style="<?php echo $sStyleHidden_county; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_county_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_county_label"><span id="id_label_county"><?php echo $this->nm_new_label['county']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['php_cmp_required']['county']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['php_cmp_required']['county'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["county"]) &&  $this->nmgp_cmp_readonly["county"] == "on") { 

 ?>
<input type="hidden" name="county" value="<?php echo $this->form_encode_input($county) . "\">" . $county . ""; ?>
<?php } else { ?>
<span id="id_read_on_county" class="sc-ui-readonly-county css_county_line" style="<?php echo $sStyleReadLab_county; ?>"><?php echo $this->form_encode_input($this->county); ?></span><span id="id_read_off_county" class="css_read_off_county" style="white-space: nowrap;<?php echo $sStyleReadInp_county; ?>">
 <input class="sc-js-input scFormObjectOdd css_county_obj" style="" id="id_sc_field_county" type=text name="county" value="<?php echo $this->form_encode_input($county) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_county_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_county_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['postcode']))
    {
        $this->nm_new_label['postcode'] = "Postcode";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $postcode = $this->postcode;
   $sStyleHidden_postcode = '';
   if (isset($this->nmgp_cmp_hidden['postcode']) && $this->nmgp_cmp_hidden['postcode'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['postcode']);
       $sStyleHidden_postcode = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_postcode = 'display: none;';
   $sStyleReadInp_postcode = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['postcode']) && $this->nmgp_cmp_readonly['postcode'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['postcode']);
       $sStyleReadLab_postcode = '';
       $sStyleReadInp_postcode = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['postcode']) && $this->nmgp_cmp_hidden['postcode'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="postcode" value="<?php echo $this->form_encode_input($postcode) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_postcode_line" id="hidden_field_data_postcode" style="<?php echo $sStyleHidden_postcode; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_postcode_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_postcode_label"><span id="id_label_postcode"><?php echo $this->nm_new_label['postcode']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['php_cmp_required']['postcode']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['php_cmp_required']['postcode'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["postcode"]) &&  $this->nmgp_cmp_readonly["postcode"] == "on") { 

 ?>
<input type="hidden" name="postcode" value="<?php echo $this->form_encode_input($postcode) . "\">" . $postcode . ""; ?>
<?php } else { ?>
<span id="id_read_on_postcode" class="sc-ui-readonly-postcode css_postcode_line" style="<?php echo $sStyleReadLab_postcode; ?>"><?php echo $this->form_encode_input($this->postcode); ?></span><span id="id_read_off_postcode" class="css_read_off_postcode" style="white-space: nowrap;<?php echo $sStyleReadInp_postcode; ?>">
 <input class="sc-js-input scFormObjectOdd css_postcode_obj" style="" id="id_sc_field_postcode" type=text name="postcode" value="<?php echo $this->form_encode_input($postcode) ?>"
 size=50 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_postcode_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_postcode_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['country']))
   {
       $this->nm_new_label['country'] = "Country";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $country = $this->country;
   $sStyleHidden_country = '';
   if (isset($this->nmgp_cmp_hidden['country']) && $this->nmgp_cmp_hidden['country'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['country']);
       $sStyleHidden_country = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_country = 'display: none;';
   $sStyleReadInp_country = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['country']) && $this->nmgp_cmp_readonly['country'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['country']);
       $sStyleReadLab_country = '';
       $sStyleReadInp_country = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['country']) && $this->nmgp_cmp_hidden['country'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="country" value="<?php echo $this->form_encode_input($this->country) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_country_line" id="hidden_field_data_country" style="<?php echo $sStyleHidden_country; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_country_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_country_label"><span id="id_label_country"><?php echo $this->nm_new_label['country']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['php_cmp_required']['country']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['php_cmp_required']['country'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["country"]) &&  $this->nmgp_cmp_readonly["country"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_country']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_country'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_country']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_country'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_country']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_country'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_country']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_country'] = array(); 
    }

   $old_value_dateofbirth = $this->dateofbirth;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dateofbirth = $this->dateofbirth;

   $disability_val_str = "''";
   if (!empty($this->disability))
   {
       if (is_array($this->disability))
       {
           $Tmp_array = $this->disability;
       }
       else
       {
           $Tmp_array = explode(";", $this->disability);
       }
       $disability_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $disability_val_str)
          {
             $disability_val_str .= ", ";
          }
          $disability_val_str .= "'$Tmp_val_cmp'";
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_country'][] = $rs->fields[0];
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
   $country_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->country_1))
          {
              foreach ($this->country_1 as $tmp_country)
              {
                  if (trim($tmp_country) === trim($cadaselect[1])) { $country_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->country) === trim($cadaselect[1])) { $country_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="country" value="<?php echo $this->form_encode_input($country) . "\">" . $country_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_country();
   $x = 0 ; 
   $country_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->country_1))
          {
              foreach ($this->country_1 as $tmp_country)
              {
                  if (trim($tmp_country) === trim($cadaselect[1])) { $country_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->country) === trim($cadaselect[1])) { $country_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($country_look))
          {
              $country_look = $this->country;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_country\" class=\"css_country_line\" style=\"" .  $sStyleReadLab_country . "\">" . $this->form_encode_input($country_look) . "</span><span id=\"id_read_off_country\" class=\"css_read_off_country\" style=\"white-space: nowrap; " . $sStyleReadInp_country . "\">";
   echo " <span id=\"idAjaxSelect_country\"><select class=\"sc-js-input scFormObjectOdd css_country_obj\" style=\"\" id=\"id_sc_field_country\" name=\"country\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_country'][] = ''; 
   echo "  <option value=\"\"> </option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->country) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->country)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_country_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_country_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['telephone']))
    {
        $this->nm_new_label['telephone'] = "Telephone";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $telephone = $this->telephone;
   $sStyleHidden_telephone = '';
   if (isset($this->nmgp_cmp_hidden['telephone']) && $this->nmgp_cmp_hidden['telephone'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['telephone']);
       $sStyleHidden_telephone = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_telephone = 'display: none;';
   $sStyleReadInp_telephone = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['telephone']) && $this->nmgp_cmp_readonly['telephone'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['telephone']);
       $sStyleReadLab_telephone = '';
       $sStyleReadInp_telephone = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['telephone']) && $this->nmgp_cmp_hidden['telephone'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="telephone" value="<?php echo $this->form_encode_input($telephone) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_telephone_line" id="hidden_field_data_telephone" style="<?php echo $sStyleHidden_telephone; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_telephone_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_telephone_label"><span id="id_label_telephone"><?php echo $this->nm_new_label['telephone']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["telephone"]) &&  $this->nmgp_cmp_readonly["telephone"] == "on") { 

 ?>
<input type="hidden" name="telephone" value="<?php echo $this->form_encode_input($telephone) . "\">" . $telephone . ""; ?>
<?php } else { ?>
<span id="id_read_on_telephone" class="sc-ui-readonly-telephone css_telephone_line" style="<?php echo $sStyleReadLab_telephone; ?>"><?php echo $this->form_encode_input($this->telephone); ?></span><span id="id_read_off_telephone" class="css_read_off_telephone" style="white-space: nowrap;<?php echo $sStyleReadInp_telephone; ?>">
 <input class="sc-js-input scFormObjectOdd css_telephone_obj" style="" id="id_sc_field_telephone" type=text name="telephone" value="<?php echo $this->form_encode_input($telephone) ?>"
 size=50 maxlength=11 alt="{datatype: 'text', maxLength: 11, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_telephone_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_telephone_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['mobile']))
    {
        $this->nm_new_label['mobile'] = "Mobile";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $mobile = $this->mobile;
   $sStyleHidden_mobile = '';
   if (isset($this->nmgp_cmp_hidden['mobile']) && $this->nmgp_cmp_hidden['mobile'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['mobile']);
       $sStyleHidden_mobile = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_mobile = 'display: none;';
   $sStyleReadInp_mobile = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['mobile']) && $this->nmgp_cmp_readonly['mobile'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['mobile']);
       $sStyleReadLab_mobile = '';
       $sStyleReadInp_mobile = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['mobile']) && $this->nmgp_cmp_hidden['mobile'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="mobile" value="<?php echo $this->form_encode_input($mobile) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_mobile_line" id="hidden_field_data_mobile" style="<?php echo $sStyleHidden_mobile; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_mobile_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_mobile_label"><span id="id_label_mobile"><?php echo $this->nm_new_label['mobile']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['php_cmp_required']['mobile']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['php_cmp_required']['mobile'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["mobile"]) &&  $this->nmgp_cmp_readonly["mobile"] == "on") { 

 ?>
<input type="hidden" name="mobile" value="<?php echo $this->form_encode_input($mobile) . "\">" . $mobile . ""; ?>
<?php } else { ?>
<span id="id_read_on_mobile" class="sc-ui-readonly-mobile css_mobile_line" style="<?php echo $sStyleReadLab_mobile; ?>"><?php echo $this->form_encode_input($this->mobile); ?></span><span id="id_read_off_mobile" class="css_read_off_mobile" style="white-space: nowrap;<?php echo $sStyleReadInp_mobile; ?>">
 <input class="sc-js-input scFormObjectOdd css_mobile_obj" style="" id="id_sc_field_mobile" type=text name="mobile" value="<?php echo $this->form_encode_input($mobile) ?>"
 size=50 maxlength=11 alt="{datatype: 'text', maxLength: 11, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_mobile_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_mobile_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
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

    <TD class="scFormDataOdd css_email_line" id="hidden_field_data_email" style="<?php echo $sStyleHidden_email; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_email_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_email_label"><span id="id_label_email"><?php echo $this->nm_new_label['email']; ?></span><span class="scFormPopupBubble" style="display: inline-block"><span class="scFormPopupTrigger"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "return false;", "return false;", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span><table class="scFormPopup"><tbody><?php
if (isset($_SESSION['scriptcase']['reg_conf']['html_dir']) && $_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'") {
?>
<tr><td class="scFormPopupTopRight scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopLeft scFormPopupCorner"></td></tr><tr><td class="scFormPopupRight"></td><td class="scFormPopupContent"><p>LSC will send confirmation details to this email address. <br>To change your email please click on your name in the top navigation bar</P></td><td class="scFormPopupLeft"></td></tr><tr><td class="scFormPopupBottomRight scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomLeft scFormPopupCorner"></td></tr><?php
} else {
?>
<tr><td class="scFormPopupTopLeft scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopRight scFormPopupCorner"></td></tr><tr><td class="scFormPopupLeft"></td><td class="scFormPopupContent"><p>LSC will send confirmation details to this email address. <br>To change your email please click on your name in the top navigation bar</P></td><td class="scFormPopupRight"></td></tr><tr><td class="scFormPopupBottomLeft scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomRight scFormPopupCorner"></td></tr><?php
}
?>
</tbody></table></span></span><br><span id="id_ajax_label_email"><?php echo $email?></span>
<input type="hidden" name="email" value="<?php echo $this->form_encode_input($email); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_email_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_email_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_email_dumb = ('' == $sStyleHidden_email) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_email_dumb" style="<?php echo $sStyleHidden_email_dumb; ?>"></TD>
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
       <TD align="" valign="" class="scFormBlockFont">Student Equality and Support</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['copy_text']))
    {
        $this->nm_new_label['copy_text'] = "Encouragement to Disclose";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $copy_text = $this->copy_text;
   $sStyleHidden_copy_text = '';
   if (isset($this->nmgp_cmp_hidden['copy_text']) && $this->nmgp_cmp_hidden['copy_text'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['copy_text']);
       $sStyleHidden_copy_text = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_copy_text = 'display: none;';
   $sStyleReadInp_copy_text = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['copy_text']) && $this->nmgp_cmp_readonly['copy_text'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['copy_text']);
       $sStyleReadLab_copy_text = '';
       $sStyleReadInp_copy_text = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['copy_text']) && $this->nmgp_cmp_hidden['copy_text'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="copy_text" value="<?php echo $this->form_encode_input($copy_text) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_copy_text_line" id="hidden_field_data_copy_text" style="<?php echo $sStyleHidden_copy_text; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_copy_text_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_copy_text_label"><span id="id_label_copy_text"><?php echo $this->nm_new_label['copy_text']; ?></span></span><br><span id="id_ajax_label_copy_text"><?php echo $copy_text?></span>
<input type="hidden" name="copy_text" value="<?php echo $this->form_encode_input($copy_text); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_copy_text_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_copy_text_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_copy_text_dumb = ('' == $sStyleHidden_copy_text) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_copy_text_dumb" style="<?php echo $sStyleHidden_copy_text_dumb; ?>"></TD>
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
       <TD align="" valign="" class="scFormBlockFont">Demographics</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['sex']))
   {
       $this->nm_new_label['sex'] = "Gender";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sex = $this->sex;
   $sStyleHidden_sex = '';
   if (isset($this->nmgp_cmp_hidden['sex']) && $this->nmgp_cmp_hidden['sex'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sex']);
       $sStyleHidden_sex = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sex = 'display: none;';
   $sStyleReadInp_sex = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sex']) && $this->nmgp_cmp_readonly['sex'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sex']);
       $sStyleReadLab_sex = '';
       $sStyleReadInp_sex = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sex']) && $this->nmgp_cmp_hidden['sex'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="sex" value="<?php echo $this->form_encode_input($this->sex) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_sex_line" id="hidden_field_data_sex" style="<?php echo $sStyleHidden_sex; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sex_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_sex_label"><span id="id_label_sex"><?php echo $this->nm_new_label['sex']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['php_cmp_required']['sex']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['php_cmp_required']['sex'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sex"]) &&  $this->nmgp_cmp_readonly["sex"] == "on") { 

$sex_look = "";
 if ($this->sex == "Male") { $sex_look .= "Male" ;} 
 if ($this->sex == "Female") { $sex_look .= "Female" ;} 
 if ($this->sex == "Other") { $sex_look .= "Other" ;} 
 if (empty($sex_look)) { $sex_look = $this->sex; }
?>
<input type="hidden" name="sex" value="<?php echo $this->form_encode_input($sex) . "\">" . $sex_look . ""; ?>
<?php } else { ?>
<?php

$sex_look = "";
 if ($this->sex == "Male") { $sex_look .= "Male" ;} 
 if ($this->sex == "Female") { $sex_look .= "Female" ;} 
 if ($this->sex == "Other") { $sex_look .= "Other" ;} 
 if (empty($sex_look)) { $sex_look = $this->sex; }
?>
<span id="id_read_on_sex" class="css_sex_line"  style="<?php echo $sStyleReadLab_sex; ?>"><?php echo $this->form_encode_input($sex_look); ?></span><span id="id_read_off_sex" class="css_read_off_sex" style="white-space: nowrap; <?php echo $sStyleReadInp_sex; ?>">
 <span id="idAjaxSelect_sex"><select class="sc-js-input scFormObjectOdd css_sex_obj" style="" id="id_sc_field_sex" name="sex" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_sex'][] = ''; ?>
 <option value=""></option>
 <option  value="Male" <?php  if ($this->sex == "Male") { echo " selected" ;} ?>>Male</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_sex'][] = 'Male'; ?>
 <option  value="Female" <?php  if ($this->sex == "Female") { echo " selected" ;} ?>>Female</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_sex'][] = 'Female'; ?>
 <option  value="Other" <?php  if ($this->sex == "Other") { echo " selected" ;} ?>>Other</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_sex'][] = 'Other'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sex_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sex_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['ethnicity']))
   {
       $this->nm_new_label['ethnicity'] = "Ethnicity";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ethnicity = $this->ethnicity;
   $sStyleHidden_ethnicity = '';
   if (isset($this->nmgp_cmp_hidden['ethnicity']) && $this->nmgp_cmp_hidden['ethnicity'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ethnicity']);
       $sStyleHidden_ethnicity = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ethnicity = 'display: none;';
   $sStyleReadInp_ethnicity = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ethnicity']) && $this->nmgp_cmp_readonly['ethnicity'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ethnicity']);
       $sStyleReadLab_ethnicity = '';
       $sStyleReadInp_ethnicity = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ethnicity']) && $this->nmgp_cmp_hidden['ethnicity'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="ethnicity" value="<?php echo $this->form_encode_input($this->ethnicity) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ethnicity_line" id="hidden_field_data_ethnicity" style="<?php echo $sStyleHidden_ethnicity; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ethnicity_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ethnicity_label"><span id="id_label_ethnicity"><?php echo $this->nm_new_label['ethnicity']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['php_cmp_required']['ethnicity']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['php_cmp_required']['ethnicity'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ethnicity"]) &&  $this->nmgp_cmp_readonly["ethnicity"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_ethnicity']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_ethnicity'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_ethnicity']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_ethnicity'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_ethnicity']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_ethnicity'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_ethnicity']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_ethnicity'] = array(); 
    }

   $old_value_dateofbirth = $this->dateofbirth;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dateofbirth = $this->dateofbirth;

   $disability_val_str = "''";
   if (!empty($this->disability))
   {
       if (is_array($this->disability))
       {
           $Tmp_array = $this->disability;
       }
       else
       {
           $Tmp_array = explode(";", $this->disability);
       }
       $disability_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $disability_val_str)
          {
             $disability_val_str .= ", ";
          }
          $disability_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT id, name  FROM ethnicity  ORDER BY name";

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_ethnicity'][] = $rs->fields[0];
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
   $ethnicity_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->ethnicity_1))
          {
              foreach ($this->ethnicity_1 as $tmp_ethnicity)
              {
                  if (trim($tmp_ethnicity) === trim($cadaselect[1])) { $ethnicity_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->ethnicity) === trim($cadaselect[1])) { $ethnicity_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="ethnicity" value="<?php echo $this->form_encode_input($ethnicity) . "\">" . $ethnicity_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_ethnicity();
   $x = 0 ; 
   $ethnicity_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->ethnicity_1))
          {
              foreach ($this->ethnicity_1 as $tmp_ethnicity)
              {
                  if (trim($tmp_ethnicity) === trim($cadaselect[1])) { $ethnicity_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->ethnicity) === trim($cadaselect[1])) { $ethnicity_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($ethnicity_look))
          {
              $ethnicity_look = $this->ethnicity;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_ethnicity\" class=\"css_ethnicity_line\" style=\"" .  $sStyleReadLab_ethnicity . "\">" . $this->form_encode_input($ethnicity_look) . "</span><span id=\"id_read_off_ethnicity\" class=\"css_read_off_ethnicity\" style=\"white-space: nowrap; " . $sStyleReadInp_ethnicity . "\">";
   echo " <span id=\"idAjaxSelect_ethnicity\"><select class=\"sc-js-input scFormObjectOdd css_ethnicity_obj\" style=\"\" id=\"id_sc_field_ethnicity\" name=\"ethnicity\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_ethnicity'][] = ''; 
   echo "  <option value=\"\"> </option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->ethnicity) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->ethnicity)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ethnicity_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ethnicity_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
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

    <TD class="scFormDataOdd css_nationality_line" id="hidden_field_data_nationality" style="<?php echo $sStyleHidden_nationality; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nationality_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nationality_label"><span id="id_label_nationality"><?php echo $this->nm_new_label['nationality']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['php_cmp_required']['nationality']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['php_cmp_required']['nationality'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nationality"]) &&  $this->nmgp_cmp_readonly["nationality"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_nationality']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_nationality'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_nationality']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_nationality'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_nationality']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_nationality'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_nationality']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_nationality'] = array(); 
    }

   $old_value_dateofbirth = $this->dateofbirth;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dateofbirth = $this->dateofbirth;

   $disability_val_str = "''";
   if (!empty($this->disability))
   {
       if (is_array($this->disability))
       {
           $Tmp_array = $this->disability;
       }
       else
       {
           $Tmp_array = explode(";", $this->disability);
       }
       $disability_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $disability_val_str)
          {
             $disability_val_str .= ", ";
          }
          $disability_val_str .= "'$Tmp_val_cmp'";
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_nationality'][] = $rs->fields[0];
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_nationality'][] = ''; 
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






<?php $sStyleHidden_nationality_dumb = ('' == $sStyleHidden_nationality) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_nationality_dumb" style="<?php echo $sStyleHidden_nationality_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_4"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_4"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_4" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">Disability</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['disability']))
   {
       $this->nm_new_label['disability'] = "Disability";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $disability = $this->disability;
   $sStyleHidden_disability = '';
   if (isset($this->nmgp_cmp_hidden['disability']) && $this->nmgp_cmp_hidden['disability'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['disability']);
       $sStyleHidden_disability = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_disability = 'display: none;';
   $sStyleReadInp_disability = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['disability']) && $this->nmgp_cmp_readonly['disability'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['disability']);
       $sStyleReadLab_disability = '';
       $sStyleReadInp_disability = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['disability']) && $this->nmgp_cmp_hidden['disability'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="disability" value="<?php echo $this->form_encode_input($this->disability) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->disability_1 = explode(";", trim($this->disability));
  } 
  else
  {
      if (empty($this->disability))
      {
          $this->disability_1 = array(); 
      } 
      else
      {
          $this->disability_1 = $this->disability; 
          $this->disability= ""; 
          foreach ($this->disability_1 as $cada_disability)
          {
             if (!empty($this->disability))
             {
                 $this->disability.= ";"; 
             } 
             $this->disability.= $cada_disability; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_disability_line" id="hidden_field_data_disability" style="<?php echo $sStyleHidden_disability; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_disability_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_disability_label"><span id="id_label_disability"><?php echo $this->nm_new_label['disability']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['php_cmp_required']['disability']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['php_cmp_required']['disability'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?><span class="scFormPopupBubble" style="display: inline-block"><span class="scFormPopupTrigger"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "return false;", "return false;", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span><table class="scFormPopup"><tbody><?php
if (isset($_SESSION['scriptcase']['reg_conf']['html_dir']) && $_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'") {
?>
<tr><td class="scFormPopupTopRight scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopLeft scFormPopupCorner"></td></tr><tr><td class="scFormPopupRight"></td><td class="scFormPopupContent">Please select all that apply</td><td class="scFormPopupLeft"></td></tr><tr><td class="scFormPopupBottomRight scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomLeft scFormPopupCorner"></td></tr><?php
} else {
?>
<tr><td class="scFormPopupTopLeft scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopRight scFormPopupCorner"></td></tr><tr><td class="scFormPopupLeft"></td><td class="scFormPopupContent">Please select all that apply</td><td class="scFormPopupRight"></td></tr><tr><td class="scFormPopupBottomLeft scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomRight scFormPopupCorner"></td></tr><?php
}
?>
</tbody></table></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["disability"]) &&  $this->nmgp_cmp_readonly["disability"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_disability']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_disability'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_disability']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_disability'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_disability']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_disability'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_disability']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_disability'] = array(); 
    }

   $old_value_dateofbirth = $this->dateofbirth;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dateofbirth = $this->dateofbirth;

   $nm_comando = "SELECT id, label  FROM disability where status=1 ORDER BY id";

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['Lookup_disability'][] = $rs->fields[0];
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
   $disability_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          foreach ($this->disability_1 as $Dados)
          {
              if ($Dados === $cadaselect[1])
              {
                  $disability_look .= $cadaselect[0] . "&nbsp;";
                  break;
              }
          }
          $x++; 
   }

?>
<input type="hidden" name="disability" value="<?php echo $this->form_encode_input($disability) . "\">" . $disability_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_disability();
   $x = 0 ; 
   $disability_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          foreach ($this->disability_1 as $Dados)
          {
              if ($Dados === $cadaselect[1])
              {
                  $disability_look .= $cadaselect[0] . "<br>";
                  break;
              }
          }
          $x++; 
   }
   $x = 0; 
   echo "<span id=\"id_read_on_disability\" class=\"css_disability_line\" style=\"" .  $sStyleReadLab_disability . "\">" . $this->form_encode_input($disability_look) . "</span><span id=\"id_read_off_disability\" class=\"css_read_off_disability css_disability_line\" style=\"" . $sStyleReadInp_disability . "\">";
   echo "<div id=\"idAjaxCheckbox_disability\" class=\"css_disability_line\" style=\"display: inline-block\">\r\n";
   $y = 0 ; 
   echo "<table cellspacing=0 cellpadding=0 border=0>\r\n";
   echo " <tr>\r\n";
   unset($cadacheck); 
   while (!empty($todo[$x])) 
   {
          $cadacheck = explode("?#?", $todo[$x]) ; 
          if ($y == 1)
          {
              echo " </tr>\r\n";
              echo " <tr>\r\n";
              $y = 0;
          }
          echo "  <td class=\"scFormDataFontOdd  css_disability_line\">\r\n";
          echo "      <div class=\"sc switch\">";
          $tempOptionId = "id-opt-disability-" . $x;
          echo "      <input type=checkbox id=\"" . $tempOptionId . "\" class=\"sc-ui-checkbox-disability sc-ui-checkbox-disability\" name=\"disability[]\" value=\"$cadacheck[1]\"" ; 
          foreach ($this->disability_1 as $Dados)
          {
              if ($Dados === $cadacheck[1])
              {
                  echo " checked" ; 
                  break;
              }
          }
          if (strtoupper($cadacheck[2]) == "S") 
          {
              if (empty($this->disability)) 
              {
                  echo " checked" ; 
              } 
          } 
          echo "  onClick=\"\" >" ; 
          echo "<span></span>";
          echo "<label for=\"" . $tempOptionId . "\">" . $cadacheck[0] . "</label>";
          echo "      </div>";
          $x++ ; 
          $y++ ; 
          echo "  </td>\r\n";
   } 
   echo " </tr>\r\n";
   echo "</table>";
   echo "</div>\r\n";
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_disability_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_disability_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['disbility_specify']))
    {
        $this->nm_new_label['disbility_specify'] = "Can we offer you any additional support at your audition?";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $disbility_specify = $this->disbility_specify;
   $sStyleHidden_disbility_specify = '';
   if (isset($this->nmgp_cmp_hidden['disbility_specify']) && $this->nmgp_cmp_hidden['disbility_specify'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['disbility_specify']);
       $sStyleHidden_disbility_specify = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_disbility_specify = 'display: none;';
   $sStyleReadInp_disbility_specify = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['disbility_specify']) && $this->nmgp_cmp_readonly['disbility_specify'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['disbility_specify']);
       $sStyleReadLab_disbility_specify = '';
       $sStyleReadInp_disbility_specify = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['disbility_specify']) && $this->nmgp_cmp_hidden['disbility_specify'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="disbility_specify" value="<?php echo $this->form_encode_input($disbility_specify) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_disbility_specify_line" id="hidden_field_data_disbility_specify" style="<?php echo $sStyleHidden_disbility_specify; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_disbility_specify_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_disbility_specify_label"><span id="id_label_disbility_specify"><?php echo $this->nm_new_label['disbility_specify']; ?></span><span class="scFormPopupBubble" style="display: inline-block"><span class="scFormPopupTrigger"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "return false;", "return false;", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span><table class="scFormPopup"><tbody><?php
if (isset($_SESSION['scriptcase']['reg_conf']['html_dir']) && $_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'") {
?>
<tr><td class="scFormPopupTopRight scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopLeft scFormPopupCorner"></td></tr><tr><td class="scFormPopupRight"></td><td class="scFormPopupContent">Maximum 140 Characters</td><td class="scFormPopupLeft"></td></tr><tr><td class="scFormPopupBottomRight scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomLeft scFormPopupCorner"></td></tr><?php
} else {
?>
<tr><td class="scFormPopupTopLeft scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopRight scFormPopupCorner"></td></tr><tr><td class="scFormPopupLeft"></td><td class="scFormPopupContent">Maximum 140 Characters</td><td class="scFormPopupRight"></td></tr><tr><td class="scFormPopupBottomLeft scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomRight scFormPopupCorner"></td></tr><?php
}
?>
</tbody></table></span></span><br>
<?php
$disbility_specify_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($disbility_specify));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["disbility_specify"]) &&  $this->nmgp_cmp_readonly["disbility_specify"] == "on") { 

 ?>
<input type="hidden" name="disbility_specify" value="<?php echo $this->form_encode_input($disbility_specify) . "\">" . $disbility_specify_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_disbility_specify" class="sc-ui-readonly-disbility_specify css_disbility_specify_line" style="<?php echo $sStyleReadLab_disbility_specify; ?>"><?php echo $this->form_encode_input($disbility_specify_val); ?></span><span id="id_read_off_disbility_specify" class="css_read_off_disbility_specify" style="white-space: nowrap;<?php echo $sStyleReadInp_disbility_specify; ?>">
 <textarea  class="sc-js-input scFormObjectOdd css_disbility_specify_obj" style="white-space: pre-wrap;" name="disbility_specify" id="id_sc_field_disbility_specify" rows="3" cols="50"
 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $disbility_specify; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_disbility_specify_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_disbility_specify_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['offeron_disability']))
    {
        $this->nm_new_label['offeron_disability'] = "<p>Please provide details of injury or illness<br/>that you may feel are important to your application.</p>";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $offeron_disability = $this->offeron_disability;
   $sStyleHidden_offeron_disability = '';
   if (isset($this->nmgp_cmp_hidden['offeron_disability']) && $this->nmgp_cmp_hidden['offeron_disability'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['offeron_disability']);
       $sStyleHidden_offeron_disability = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_offeron_disability = 'display: none;';
   $sStyleReadInp_offeron_disability = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['offeron_disability']) && $this->nmgp_cmp_readonly['offeron_disability'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['offeron_disability']);
       $sStyleReadLab_offeron_disability = '';
       $sStyleReadInp_offeron_disability = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['offeron_disability']) && $this->nmgp_cmp_hidden['offeron_disability'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="offeron_disability" value="<?php echo $this->form_encode_input($offeron_disability) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_offeron_disability_line" id="hidden_field_data_offeron_disability" style="<?php echo $sStyleHidden_offeron_disability; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_offeron_disability_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_offeron_disability_label"><span id="id_label_offeron_disability"><?php echo $this->nm_new_label['offeron_disability']; ?></span><span class="scFormPopupBubble" style="display: inline-block"><span class="scFormPopupTrigger"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "return false;", "return false;", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span><table class="scFormPopup"><tbody><?php
if (isset($_SESSION['scriptcase']['reg_conf']['html_dir']) && $_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'") {
?>
<tr><td class="scFormPopupTopRight scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopLeft scFormPopupCorner"></td></tr><tr><td class="scFormPopupRight"></td><td class="scFormPopupContent">Maximum 140 Characters</td><td class="scFormPopupLeft"></td></tr><tr><td class="scFormPopupBottomRight scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomLeft scFormPopupCorner"></td></tr><?php
} else {
?>
<tr><td class="scFormPopupTopLeft scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopRight scFormPopupCorner"></td></tr><tr><td class="scFormPopupLeft"></td><td class="scFormPopupContent">Maximum 140 Characters</td><td class="scFormPopupRight"></td></tr><tr><td class="scFormPopupBottomLeft scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomRight scFormPopupCorner"></td></tr><?php
}
?>
</tbody></table></span></span><br>
<?php
$offeron_disability_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($offeron_disability));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["offeron_disability"]) &&  $this->nmgp_cmp_readonly["offeron_disability"] == "on") { 

 ?>
<input type="hidden" name="offeron_disability" value="<?php echo $this->form_encode_input($offeron_disability) . "\">" . $offeron_disability_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_offeron_disability" class="sc-ui-readonly-offeron_disability css_offeron_disability_line" style="<?php echo $sStyleReadLab_offeron_disability; ?>"><?php echo $this->form_encode_input($offeron_disability_val); ?></span><span id="id_read_off_offeron_disability" class="css_read_off_offeron_disability" style="white-space: nowrap;<?php echo $sStyleReadInp_offeron_disability; ?>">
 <textarea  class="sc-js-input scFormObjectOdd css_offeron_disability_obj" style="white-space: pre-wrap;" name="offeron_disability" id="id_sc_field_offeron_disability" rows="3" cols="50"
 alt="{datatype: 'text', maxLength: 140, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $offeron_disability; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_offeron_disability_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_offeron_disability_text"></span></td></tr></table></td></tr></table> </TD>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-13", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-14", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-15", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-16", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_b", "", "Submit", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-17", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_b", "", "Save Changes", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-18", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['run_iframe'] != "R")
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_member_applicant_mob");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_member_applicant_mob");
 parent.scAjaxDetailHeight("form_member_applicant_mob", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_member_applicant_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_member_applicant_mob", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['sc_modal'])
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
		if ($("#sc_b_hlp_b").length && $("#sc_b_hlp_b").is(":visible")) {
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
		if ($("#sc_b_sai_b.sc-unique-btn-4").length && $("#sc_b_sai_b.sc-unique-btn-4").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_b.sc-unique-btn-5").length && $("#sc_b_sai_b.sc-unique-btn-5").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_b.sc-unique-btn-6").length && $("#sc_b_sai_b.sc-unique-btn-6").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-10").length && $("#sc_b_sai_t.sc-unique-btn-10").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-11").length && $("#sc_b_sai_t.sc-unique-btn-11").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-12").length && $("#sc_b_sai_t.sc-unique-btn-12").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_b.sc-unique-btn-13").length && $("#sc_b_sai_b.sc-unique-btn-13").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_b.sc-unique-btn-14").length && $("#sc_b_sai_b.sc-unique-btn-14").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_b.sc-unique-btn-15").length && $("#sc_b_sai_b.sc-unique-btn-15").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
	}
	function scBtnFn_sys_format_inc() {
		if ($("#sc_b_new_b.sc-unique-btn-7").length && $("#sc_b_new_b.sc-unique-btn-7").is(":visible")) {
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_b.sc-unique-btn-8").length && $("#sc_b_ins_b.sc-unique-btn-8").is(":visible")) {
			nm_atualiza ('incluir');
			 return;
		}
		if ($("#sc_b_new_b.sc-unique-btn-16").length && $("#sc_b_new_b.sc-unique-btn-16").is(":visible")) {
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_b.sc-unique-btn-17").length && $("#sc_b_ins_b.sc-unique-btn-17").is(":visible")) {
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_b.sc-unique-btn-9").length && $("#sc_b_upd_b.sc-unique-btn-9").is(":visible")) {
			nm_atualiza ('alterar');
			 return;
		}
		if ($("#sc_b_upd_b.sc-unique-btn-18").length && $("#sc_b_upd_b.sc-unique-btn-18").is(":visible")) {
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
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_member_applicant_mob']['buttonStatus'] = $this->nmgp_botoes;
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
