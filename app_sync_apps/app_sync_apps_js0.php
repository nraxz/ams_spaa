<form name="F2" method=post 
               action="./" 
               target="_self"> 
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="master_nav" value="off">
<input type="hidden" name="sc_ifr_height" value="">
<input type="hidden" name="nmgp_parms" value=""/>
<input type="hidden" name="nmgp_ordem" value=""/>
<input type="hidden" name="nmgp_clone" value=""/>
<input type="hidden" name="nmgp_arg_dyn_search" value=""/>
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
</form> 
<form name="F4" method="post" 
                  target="_self"> 
  <input type="hidden" name="nmgp_url_saida" value=""/>
  <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"/> 
  <input type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
</form> 
<form name="F5" method="post" 
                  action="./" 
                  target="_self"> 
  <input type="hidden" name="nmgp_opcao" value="<?php if ($this->nm_Start_new) {echo "ini";} else {echo "igual";}?>"/>
  <input type="hidden" name="nmgp_parms" value="<?php echo $this->form_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['app_sync_apps']['parms']); ?>"/>
  <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"/> 
  <input type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
</form> 
<form name="F6" method="post" 
                  action="./" 
                  target="_self"> 
  <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"/> 
  <input type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
</form> 
<form name="FCAP" action="" method="post" target="_blank"> 
  <input type="hidden" name="SC_lig_apl_orig" value="app_sync_apps"/>
  <input type="hidden" name="nmgp_parms" value=""> 
  <input type="hidden" name="nmgp_outra_jan" value="true"> 
  <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
  <input type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
</form> 
<div id="id_div_process" style="display: none; margin: 10px; whitespace: nowrap" class="scFormProcessFixed"><span class="scFormProcess"><img border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" />&nbsp;<?php echo $this->Ini->Nm_lang['lang_othr_prcs']; ?>...</span></div>
<div id="id_div_process_block" style="display: none; margin: 10px; whitespace: nowrap"><span class="scFormProcess"><img border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" />&nbsp;<?php echo $this->Ini->Nm_lang['lang_othr_prcs']; ?>...</span></div>
<div id="id_fatal_error" class="scFormLabelOdd" style="display: none; position: absolute"></div>
<script type="text/javascript"> 
 NM_tp_critica(1);
function nm_gp_submit(apl_lig, apl_saida, parms, opc, target, modal_h, modal_w, apl_name) 
{ 
   if (target == 'modal') 
   {
       par_modal = '?script_case_init=<?php echo $this->form_encode_input($this->Ini->sc_page) ?>&script_case_session=<?php echo $this->form_encode_input(session_id()) ?>&nmgp_outra_jan=true&nmgp_url_saida=modal';
       if (opc != null && opc != '') 
       {
           par_modal += '&nmgp_opcao=grid';
       }
       if (parms != null && parms != '') 
       {
           par_modal += '&nmgp_parms=' + parms;
       }
<?php
  if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_sync_apps']['where_detal']))
  {
?>  
       parent.tb_show('', apl_lig + par_modal + '&TB_iframe=true&modal=true&height=' + modal_h + '&width=' + modal_w, '');
<?php
  }
  else
  {
?>  
       tb_show('', apl_lig + par_modal + '&TB_iframe=true&modal=true&height=' + modal_h + '&width=' + modal_w, '');
<?php
  }
?>  
       return;
   }
   document.F3.target               = "_self"; 
   document.F3.action               = apl_lig  ;
   if (opc != null && opc != "") 
   {
       document.F3.nmgp_opcao.value = "grid" ;
   }
   else
   {
       document.F3.nmgp_opcao.value = "" ;
   }
   if (target != null && target == '_blank') 
   {
       document.F3.nmgp_outra_jan.value = "true" ;
       document.F3.target           = target; 
   }
   document.F3.nmgp_url_saida.value = apl_saida ;
   document.F3.nmgp_parms.value     = parms ;
   document.F3.submit() ;
} 

function sc_inline_form(seqRow, keyParams, width, height)
{
  var callParams = "", i, listParams = keyParams.split(",");
  for (i = 0; i < listParams.length; i++)
  {
    callParams += listParams[i] + "*scin" + $("#id_sc_field_" + listParams[i] + seqRow).val() + "*scout";
  }
  nm_gp_submit('<?php echo $this->Ini->link_app_sync_apps_inline ?>', '<?php echo $this->nm_location ?>', 'NM_btn_insert*scinN*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinN*scoutNM_btn_navega*scinN*scoutNMSC_modal*scinok*scoutsc_redir_atualiz*scinok*scoutsc_inline_call*scinY*scoutsc_seq_row*scin' + seqRow + '*scout' + callParams, '', 'modal', height, width);
}

function scInlineFormReceive(oResponse, iLine)
{
  var i;
  oResp = oResponse;
  if (oResp["fldList"])
  {
    for (i = 0; i < oResp["fldList"].length; i++)
    {
      oResp["fldList"][i].fldName += iLine;
    }
  }
  scAjaxSetFields(false);
  scAjaxSetVariables();
  scAjaxRedir();
}


function scInlineFormSend()
{
  return false;
}

function nm_move(x, y, z) 
{ 
    if (Nm_Proc_Atualiz)
    {
        return;
    }
    if (("inicio" == x || "retorna" == x) && "S" != Nav_permite_ret)
    {
        return;
    }
    if (("avanca" == x || "final" == x) && "S" != Nav_permite_ava)
    {
        return;
    }
    document.F2.nmgp_opcao.value = x; 
    document.F2.nmgp_ordem.value = y; 
    document.F2.nmgp_clone.value = "";
    if ("apl_detalhe" == x)
    {
        document.F2.nmgp_opcao.value = 'igual'; 
        document.F2.master_nav.value = 'on'; 
        if (z)
        {
            document.F2.sc_ifr_height.value = z;
        }
        document.F2.submit();
        return;
    }
    if ("clone" == x)
    {
        x = "novo";
        document.F2.nmgp_clone.value = "S";
        document.F2.nmgp_opcao.value = x; 
    }
    if ("novo" == x || "edit_novo" == x)
    {
<?php
       $NM_parm_ifr = ($NM_run_iframe == 1) ? "NM_run_iframe?#?1?@?" : "";
?>
        document.F2.nmgp_parms.value = "<?php echo $NM_parm_ifr ?>";
        document.F2.submit();
    }
    else
    {
        do_ajax_app_sync_apps_navigate_form();
    }
} 
var sc_mupload_ok = true;
var Nm_submit_ok = true; 
function nm_atualiza(x, y) 
{ 
<?php 
    if (isset($this->Refresh_aba_menu)) 
    {
?>
        parent.Tab_refresh['<?php echo $this->Refresh_aba_menu ?>'] = "S";
<?php 
    }
?>
    if (!sc_mupload_ok)
    {
        if (!confirm("<?php echo $this->Ini->Nm_lang['lang_errm_muok'] ?>"))
        {
            return;
        }
        sc_mupload_ok = true;
    }
    Nm_submit_ok = true; 
    if (Nm_Proc_Atualiz)
    {
        return;
    }
    if (!scAjaxDetailProc())
    {
        return;
    }
<?php
    $NM_parm_ifr = ($NM_run_iframe == 1) ? "NM_run_iframe?#?1?@?" : "";
?>
    document.F1.nmgp_parms.value = "<?php echo $NM_parm_ifr ?>";
    document.F1.target = "_self";
    if (x == "muda_form") 
    { 
       document.F1.nmgp_num_form.value = y; 
    } 
    document.F1.nmgp_opcao.value = x; 
    document.F1.submit(); 
    if (Nm_submit_ok)
    { 
        Nm_Proc_Atualiz = true;
    } 
} 

<?php
$NM_parm_ifr = ($NM_run_iframe == 1) ? "NM_run_iframe?#?1?@?" : "";
?>
function scForm_cancel() {
	return;
}
function scForm_submit(x, y) {
	if (!scForm_initSubmit(x, y)) { return; }
	scForm_checkMultiUpload(function() { scForm_general_prepare(x, y); }, scForm_cancel);
} // scForm_submit

function scForm_general_prepare(x, y) {
	sc_mupload_ok = true;
	if (false === scForm_onSubmit(x)) {
		return;
	}
	scForm_setFormValues(x, y);
	scForm_packMultiSelect_single();
	scForm_packSignature_single();
	scForm_submit_control(x);
} // scForm_general_prepare

function scForm_initSubmit(x, y) {
<?php
if (isset($this->Refresh_aba_menu)) {
?>
	parent.Tab_refresh["<?php echo $this->Refresh_aba_menu ?>"] = "S";
<?php
}
?>

	Nm_submit_ok = true;
	if (Nm_Proc_Atualiz) {
		return false;
	}
	if (!scAjaxDetailProc()) {
		return false;
	}

	return true;
} // scForm_initSubmit


function scForm_checkMultiUpload(callbackOk, callbackCancel) {
	if (!sc_mupload_ok) {
		scJs_confirm("<?php echo $this->Ini->Nm_lang['lang_errm_muok'] ?>", callbackOk, callbackCancel);
	}
	else {
		callbackOk();
	}
} // scForm_checkMultiUpload

function scForm_onSubmit(x) {
	return true;
} // scForm_onSubmit

function scForm_setFormValues(x, y) {
	document.F1.nmgp_parms.value = "<?php echo $NM_parm_ifr ?>";
	document.F1.target = "_self";
	if (x == "muda_form") {
		document.F1.nmgp_num_form.value = y;
	}
} // scForm_setFormValues

function scForm_packMultiSelect_single() {
} //scForm_packMultiSelect_single

function scForm_packMultiSelect_multi() {
	NM_count_mult = document.F1.sc_contr_vert.value;
} // scForm_packMultiSelect_multi

function scForm_packSignature_single() {
} // scForm_packSignature_single

function scForm_packSignature_multi() {
	NM_count_mult = document.F1.sc_contr_vert.value;
} // scForm_packSignature_multi

function scForm_confirmDelete(callbackOk, callbackCancel) {
	scJs_confirm("<?php echo html_entity_decode($this->Ini->Nm_lang['lang_errm_remv'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>", callbackOk, callbackCancel);
} // scForm_confirmDelete

function scForm_confirmInsert_single(callbackOk, callbackCancel) {
	callbackOk();
} // scForm_confirmInsert_single

function scForm_confirmUpdate_single(callbackOk, callbackCancel) {
	callbackOk();
} // scForm_confirmUpdate_single

function scForm_submit_control(x) {
	document.F1.nmgp_opcao.value = x;
	document.F1.submit();
	if (Nm_submit_ok) {
		Nm_Proc_Atualiz = true;
	}
} // scForm_submit_control

function scForm_submit_single(x) {
	if (x != "excluir")
	{
		document.F1.nmgp_opcao.value = x;
		if ("incluir" == x || "muda_form" == x || "recarga" == x || "recarga_mobile" == x) {
			Nm_Proc_Atualiz = true;
			document.F1.submit();
		}
		else {
			Nm_Proc_Atualiz = true;
			do_ajax_app_sync_apps_submit_form();
		}
	}
	if (Nm_submit_ok) {
		Nm_Proc_Atualiz = true;
	}
} // scForm_submit_single

function nm_saida_glo() 
{ 
   document.F4.target               = "_self"; 
   document.F4.action               = "app_sync_apps_fim.php";
   document.F4.submit(); 
} 
function nm_mostra_img(imagem, altura, largura)
{
    tb_show('', imagem, '');
}
function nm_recarga_form(nm_ult_ancora, nm_ult_page) 
{ 
    document.F1.target = "_self";
    document.F1.nmgp_parms.value = "";
    document.F1.nmgp_ancora.value= nm_ult_page; 
    document.F1.nmgp_ancora.value= nm_ult_page; 
    document.F1.nmgp_opcao.value= "recarga"; 
    document.F1.action += "#" +  nm_ult_ancora;
    document.F1.submit(); 
} 
function nm_link_url(Sc_url)
{
    if (Sc_url.substr(0, 7) != 'http://' && Sc_url.substr(0, 8) != 'https://')
    {
        Sc_url = 'http://' + Sc_url;
    }
    return Sc_url;
}
function sc_trim(str, chars) {
        return sc_ltrim(sc_rtrim(str, chars), chars);
}
function sc_ltrim(str, chars) {
        chars = chars || "\\s";
        return str.replace(new RegExp("^[" + chars + "]+", "g"), "");
}
function sc_rtrim(str, chars) {
        chars = chars || "\\s";
        return str.replace(new RegExp("[" + chars + "]+$", "g"), "");
}
var hasJsFormOnload = false;

function scCssFocus(oHtmlObj)
{
  if (navigator.userAgent && 0 < navigator.userAgent.indexOf("MSIE") && "select" == oHtmlObj.type.substr(0, 6))
    return;
  $(oHtmlObj).addClass('scFormObjectFocusOdd')
             .removeClass('scFormObjectOdd');
}

function scCssBlur(oHtmlObj)
{
  if (navigator.userAgent && 0 < navigator.userAgent.indexOf("MSIE") && "select" == oHtmlObj.type.substr(0, 6))
    return;
  $(oHtmlObj).addClass('scFormObjectOdd')
             .removeClass('scFormObjectFocusOdd');
}

 function nm_submit_cap(apl_dest, parms)
 {
    document.FCAP.action = apl_dest;
    document.FCAP.nmgp_parms.value = parms;
    window.open('','jan_cap','location=no,menubar=no,resizable,scrollbars,status=no,toolbar=no');
    document.FCAP.target = "jan_cap"; 
    document.FCAP.submit();
 }
</script> 
