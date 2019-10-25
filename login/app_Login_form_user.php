<!DOCTYPE html>
<html lang="en">
	<head>
		<META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
		<title>Audition Management System</title>
		 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
 </SCRIPT>
        <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_sweetalert.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/sweetalert2.all.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/polyfill.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>

<script>
var scFocusFirstErrorField = true;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("app_Login_sajax_js.php");
?>
<script type="text/javascript">
var Nm_Proc_Atualiz = false;
</script>
<script type="text/javascript">
<?php

include_once('app_Login_jquery.php');

?>
</script>
<script type="text/javascript">
 $(function() {
  scJQElementsAdd('');
  scJQGeneralAdd();
 });

</script>
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
 include_once("app_Login_js0.php");
?>
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
<script type='text/javascript'>
bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
function scLigEditLookupCall()
{
<?php
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login']['sc_modal'])
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
   
		<link rel="stylesheet" href="../_lib/libraries/grp/Login/login/css/login.css">    
		<link rel="stylesheet" href="https://bootswatch.com/4/journal/bootstrap.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<div class="container">
			<div class="bs-docs-section">
				<div class="row">
					<div class="col-lg-12">
						<div class="page-header mt-3">

							<div class="jumbotron text-center ">
								<div class="row">
									<div class="col-2 img-right">
										<img src="http://resources.spaa.ae/images/logo.png" style="height:100px; width:auto;" class="img-fluid" />
									</div>
									<div class="col-10 text-left">
										<h2 id="typography"  class="text-primary">Sharjah Performing Arts Academy</h2>
										<h5 id="typography" class="text-primary">Application Management System</h5>
									</div>
								</div>


							</div>
						</div>
					</div>
				</div>

				<!-- Headings -->

				<div class="row">
					<div class="col-lg-7">
						<div class="bs-component">
							<h4 class="text-primary">New User</h4>                  
							<p class="mt-5 mb-5">If this is your first time here please click Register to create an account with us and submit your Audition Application. You can log in and update your information at any time. <a href="http://ams.spaa.ae/audition-guidelines/" targer="_blank">Audition guidelines</a></p>
							
							<p class="lead mt-5">
								<a class="btn btn-primary btn-lg mt-2" href="../applicant_upcomming_auditions/" role="button">Register</a>
							</p>
						</div>
					</div>
					<div class="col-lg-1">
					</div>
					<div class="col-lg-4">
						<div class="bs-component">
							<h4 class="text-primary">Registered User</h4>
							<form class="form half-size" action=""  name="F1" method="post" 
               action="./" 
               target="_self">
								<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($nmgp_url_saida); ?>">
<input type="hidden" name="bok" value="OK">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>">
<input type="hidden" name="script_case_session" value="<?php  echo $this->form_encode_input(session_id()); ?>">
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>">
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" />
								
								<div class="control">
									<label class="label" for="user_email">email</label>
									<input class="input  sc-js-input "  name="user_email" id="id_sc_field_user_email" value="<?php echo $this->form_encode_input($user_email) ?>"  alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"  type="text" placeholder="Email" name="user_email">
								</div>
								<div class="control">
									<label class="label" for="pswd">Password</label>
									<input class="input  sc-js-input "  name="pswd" id="id_sc_field_pswd" value="<?php echo $this->form_encode_input($pswd) ?>"  alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"  type="password" placeholder="Password" name="pswd">
								</div>
								<!--SC_REQUIRED_MSG-->
								<!--SC_CAPTCHA-->
								<div class="submit">
									<input class="btn btn-primary" type="submit" value="Sign In"  onclick="nm_atualiza('alterar');"  />
								</div>
							</form>
							<div>
								<a class="text-sm  text-primary mt-2 mb-2" href="/app_retrieve_pswd/">Forgotten Password?</a>
							</div>

						</div>

					</div> 
				</div>
			</div>
		

		<footer class="page-footer font-small blue pt-4 mt-5">

			<!-- Footer Links -->
			<div class="container-fluid text-center text-md-left">

				<!-- Grid row -->
				<div class="row">

					<!-- Grid column -->
					<div class="col-md-6 mt-md-0 mt-3">

						<!-- Content -->
						<h5 class="text-uppercase">SPAA</h5>
						<p>The Emirate of Sharjah is establishing the Sharjah Performing Arts Academy (SPAA) to address a growing demand in Sharjah and the region for formal quality education and professional training in the performing arts to enrich the cultural and artistic experiences of talented and inspiring students. It is envisaged that SPAA will be the leading conservatoire in the region, offering quality undergraduate and graduate degree programs in acting, musical theatre and production arts. <a href="https://www.spaa.ae/courses/" target="_blank"><strong>Courses</strong></a>

						</p>

					</div>
					<!-- Grid column -->

					<hr class="clearfix w-100 d-md-none pb-3">

					<!-- Grid column -->
					<div class="col-md-3 mb-md-0 mb-3">

						<!-- Links -->
						<h5 class="text-uppercase">SPAA Policies</h5>

						<ul class="list-unstyled">
							<li>
								<a href="https://ams.spaa.ae/terms-and-conditions" target="_blank">Terms and Conditions</a>
							</li>
							<li>
								<a href="http://ams.spaa.ae/audition-guidelines/" target="_blank">Audition Guidelines</a>
							</li>


						</ul>

					</div>
					<!-- Grid column -->

					<!-- Grid column -->
					<div class="col-md-3 mb-md-0 mb-3">

						<!-- Links -->
						<h5 class="text-uppercase">Powered By</h5>

						<ul class="list-unstyled">
							<li>
								<a href="http://www.considerthisuk.co.uk" target="_blank">Consider This UK</a>
							</li>
							<li>
								<a href="http://www.performthis.com" target="_blank">Audition Management System</a>
							</li>

						</ul>

					</div>
					<!-- Grid column -->

				</div>
				<!-- Grid row -->

			</div>
			<!-- Footer Links -->

			<!-- Copyright -->
			<div class="footer-copyright text-center py-3">© Copyright:
				<a href="https://www.spaa.ae" target="_blank">Sharjah Performing Arts Academy</a>
			</div>
			<!-- Copyright -->

		</footer>
		</div>
	</body>
</html>
