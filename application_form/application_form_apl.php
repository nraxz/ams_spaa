<?php
//
class application_form_apl
{
   var $has_where_params = false;
   var $NM_is_redirected = false;
   var $NM_non_ajax_info = false;
   var $formatado = false;
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'            => '',
                                'param'             => array(),
                                'autoComp'          => '',
                                'rsSize'            => '',
                                'msgDisplay'        => '',
                                'errList'           => array(),
                                'fldList'           => array(),
                                'varList'           => array(),
                                'focus'             => '',
                                'navStatus'         => array(),
                                'redir'             => array(),
                                'blockDisplay'      => array(),
                                'fieldDisplay'      => array(),
                                'fieldLabel'        => array(),
                                'readOnly'          => array(),
                                'btnVars'           => array(),
                                'ajaxAlert'         => array(),
                                'ajaxMessage'       => '',
                                'ajaxJavascript'    => array(),
                                'buttonDisplay'     => array(),
                                'buttonDisplayVert' => array(),
                                'calendarReload'    => false,
                                'quickSearchRes'    => false,
                                'displayMsg'        => false,
                                'displayMsgTxt'     => '',
                                'dyn_search'        => array(),
                                'empty_filter'      => '',
                                'event_field'       => '',
                                'fieldsWithErrors'  => array(),
                               );
   var $NM_ajax_force_values = false;
   var $Nav_permite_ava     = true;
   var $Nav_permite_ret     = true;
   var $Apl_com_erro        = false;
   var $app_is_initializing = false;
   var $Ini;
   var $Erro;
   var $Db;
   var $login;
   var $firstname;
   var $lastname;
   var $middlename;
   var $nationality;
   var $nationality_1;
   var $dateofbirth;
   var $dateofbirth_dia;
   var $dateofbirth_mes;
   var $dateofbirth_ano;
   var $gender;
   var $resident;
   var $status;
   var $submitted;
   var $submitted_hora;
   var $email;
   var $venue_id;
   var $venue_id_1;
   var $audition_id;
   var $audition_id_1;
   var $course_id;
   var $course_id_1;
   var $email1;
   var $password;
   var $confirm_password;
   var $accept_tnc;
   var $accept_tnc_1;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $nmgp_clone;
   var $nmgp_return_img = array();
   var $nmgp_dados_form = array();
   var $nmgp_dados_select = array();
   var $nm_location;
   var $nm_flag_iframe;
   var $nm_flag_saida_novo;
   var $nmgp_botoes = array();
   var $nmgp_url_saida;
   var $nmgp_form_show;
   var $nmgp_form_empty;
   var $nmgp_cmp_readonly = array();
   var $nmgp_cmp_hidden = array();
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = false;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = false;
   var $Grid_editavel  = false;
   var $url_webhelp = '';
   var $nm_todas_criticas;
   var $Campos_Mens_erro;
   var $nm_new_label = array();
   var $record_insert_ok = false;
   var $record_delete_ok = false;
//
//----- 
   function ini_controle()
   {
        global $nm_url_saida, $teste_validade, $script_case_init, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['accept_tnc']))
          {
              $this->accept_tnc = $this->NM_ajax_info['param']['accept_tnc'];
          }
          if (isset($this->NM_ajax_info['param']['audition_id']))
          {
              $this->audition_id = $this->NM_ajax_info['param']['audition_id'];
          }
          if (isset($this->NM_ajax_info['param']['confirm_password']))
          {
              $this->confirm_password = $this->NM_ajax_info['param']['confirm_password'];
          }
          if (isset($this->NM_ajax_info['param']['course_id']))
          {
              $this->course_id = $this->NM_ajax_info['param']['course_id'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['dateofbirth']))
          {
              $this->dateofbirth = $this->NM_ajax_info['param']['dateofbirth'];
          }
          if (isset($this->NM_ajax_info['param']['dateofbirth_ano']))
          {
              $this->dateofbirth_ano = $this->NM_ajax_info['param']['dateofbirth_ano'];
          }
          if (isset($this->NM_ajax_info['param']['dateofbirth_dia']))
          {
              $this->dateofbirth_dia = $this->NM_ajax_info['param']['dateofbirth_dia'];
          }
          if (isset($this->NM_ajax_info['param']['dateofbirth_mes']))
          {
              $this->dateofbirth_mes = $this->NM_ajax_info['param']['dateofbirth_mes'];
          }
          if (isset($this->NM_ajax_info['param']['email']))
          {
              $this->email = $this->NM_ajax_info['param']['email'];
          }
          if (isset($this->NM_ajax_info['param']['firstname']))
          {
              $this->firstname = $this->NM_ajax_info['param']['firstname'];
          }
          if (isset($this->NM_ajax_info['param']['gender']))
          {
              $this->gender = $this->NM_ajax_info['param']['gender'];
          }
          if (isset($this->NM_ajax_info['param']['lastname']))
          {
              $this->lastname = $this->NM_ajax_info['param']['lastname'];
          }
          if (isset($this->NM_ajax_info['param']['login']))
          {
              $this->login = $this->NM_ajax_info['param']['login'];
          }
          if (isset($this->NM_ajax_info['param']['nationality']))
          {
              $this->nationality = $this->NM_ajax_info['param']['nationality'];
          }
          if (isset($this->NM_ajax_info['param']['nm_form_submit']))
          {
              $this->nm_form_submit = $this->NM_ajax_info['param']['nm_form_submit'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ancora']))
          {
              $this->nmgp_ancora = $this->NM_ajax_info['param']['nmgp_ancora'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_dyn_search']))
          {
              $this->nmgp_arg_dyn_search = $this->NM_ajax_info['param']['nmgp_arg_dyn_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_num_form']))
          {
              $this->nmgp_num_form = $this->NM_ajax_info['param']['nmgp_num_form'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_opcao']))
          {
              $this->nmgp_opcao = $this->NM_ajax_info['param']['nmgp_opcao'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ordem']))
          {
              $this->nmgp_ordem = $this->NM_ajax_info['param']['nmgp_ordem'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_parms']))
          {
              $this->nmgp_parms = $this->NM_ajax_info['param']['nmgp_parms'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['password']))
          {
              $this->password = $this->NM_ajax_info['param']['password'];
          }
          if (isset($this->NM_ajax_info['param']['resident']))
          {
              $this->resident = $this->NM_ajax_info['param']['resident'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['venue_id']))
          {
              $this->venue_id = $this->NM_ajax_info['param']['venue_id'];
          }
          if (isset($this->nmgp_refresh_fields))
          {
              $this->nmgp_refresh_fields = explode('_#fld#_', $this->nmgp_refresh_fields);
              $this->nmgp_opcao          = 'recarga';
          }
          if (!isset($this->nmgp_refresh_row))
          {
              $this->nmgp_refresh_row = '';
          }
      }

      $this->sc_conv_var = array();
      if (!empty($_FILES))
      {
          foreach ($_FILES as $nmgp_campo => $nmgp_valores)
          {
               if (isset($this->sc_conv_var[$nmgp_campo]))
               {
                   $nmgp_campo = $this->sc_conv_var[$nmgp_campo];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_campo)]))
               {
                   $nmgp_campo = $this->sc_conv_var[strtolower($nmgp_campo)];
               }
               $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
               $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
               $this->$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
               $this->$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
               $this->$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
          }
      }
      $Sc_lig_md5 = false;
      if (!empty($_POST))
      {
          foreach ($_POST as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                      $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (!empty($_GET))
      {
          foreach ($_GET as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                       $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
      {
          $_SESSION['sc_session']['SC_parm_violation'] = true;
      }
      if (isset($nmgp_parms) && $nmgp_parms == "SC_null")
      {
          $nmgp_parms = "";
      }
      if (isset($this->vid) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['vid'] = $this->vid;
      }
      if (isset($this->auid) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['auid'] = $this->auid;
      }
      if (isset($_POST["vid"]) && isset($this->vid)) 
      {
          $_SESSION['vid'] = $this->vid;
      }
      if (isset($_POST["auid"]) && isset($this->auid)) 
      {
          $_SESSION['auid'] = $this->auid;
      }
      if (isset($_GET["vid"]) && isset($this->vid)) 
      {
          $_SESSION['vid'] = $this->vid;
      }
      if (isset($_GET["auid"]) && isset($this->auid)) 
      {
          $_SESSION['auid'] = $this->auid;
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['application_form']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['application_form']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['application_form']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $nmgp_parms = NM_decode_input($nmgp_parms);
          $nmgp_parms = str_replace("@aspass@", "'", $this->nmgp_parms);
          $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
          $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
          $todo  = explode("?@?", $todox);
          $ix = 0;
          while (!empty($todo[$ix]))
          {
             $cadapar = explode("?#?", $todo[$ix]);
             if (1 < sizeof($cadapar))
             {
                if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                {
                    $cadapar[0] = substr($cadapar[0], 11);
                    $cadapar[1] = $_SESSION[$cadapar[1]];
                }
                 if (isset($this->sc_conv_var[$cadapar[0]]))
                 {
                     $cadapar[0] = $this->sc_conv_var[$cadapar[0]];
                 }
                 elseif (isset($this->sc_conv_var[strtolower($cadapar[0])]))
                 {
                     $cadapar[0] = $this->sc_conv_var[strtolower($cadapar[0])];
                 }
                 nm_limpa_str_application_form($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->vid)) 
          {
              $_SESSION['vid'] = $this->vid;
          }
          if (isset($this->auid)) 
          {
              $_SESSION['auid'] = $this->auid;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['application_form']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['application_form']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['application_form']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['application_form']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->vid)) 
          {
              $_SESSION['vid'] = $this->vid;
          }
          if (isset($this->auid)) 
          {
              $_SESSION['auid'] = $this->auid;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['application_form']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['application_form']['parms']);
              $todo  = explode("?@?", $todox);
              $ix = 0;
              while (!empty($todo[$ix]))
              {
                 $cadapar = explode("?#?", $todo[$ix]);
                 if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                 {
                     $cadapar[0] = substr($cadapar[0], 11);
                     $cadapar[1] = $_SESSION[$cadapar[1]];
                 }
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
                 $ix++;
              }
          }
      } 

      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$script_case_init]['application_form']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['application_form']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['application_form']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['application_form']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['application_form']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['application_form']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['application_form']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['application_form']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new application_form_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("en_us");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['initialize'];
          $this->Db = $this->Ini->Db; 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['initialize']) && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['initialize'])
          {
              $_SESSION['scriptcase']['application_form']['contr_erro'] = 'on';
  if(isset($_GET['a']) && substr($_GET['a'],0,4) == 'new_')
{
	
     $nm_select ="UPDATE sec_users SET active = 'Y', activation_code ='' WHERE activation_code = ". $this->Db->qstr($_GET['a']); 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                application_form_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('app_Login') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
}
$_SESSION['scriptcase']['application_form']['contr_erro'] = 'off';
          }
          $this->Ini->init2();
      } 
      else 
      { 
         $this->nm_data = new nm_data("en_us");
      } 
      $_SESSION['sc_session'][$script_case_init]['application_form']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['application_form']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['application_form'];
          }
          elseif (isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']]))
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']] as $init => $resto)
              {
                  if ($this->Ini->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['application_form']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['application_form']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('application_form') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['application_form']['label'] = "Basic Information";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "application_form")
                  {
                      $achou = true;
                  }
                  elseif ($achou)
                  {
                      unset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu][$apl]);
                      $this->Change_Menu = true;
                  }
              }
          }
      }
      if (!function_exists("nmButtonOutput"))
      {
          include_once($this->Ini->path_lib_php . "nm_gp_config_btn.php");
      }
      include("../_lib/css/" . $this->Ini->str_schema_all . "_form.php");
      $this->Ini->Str_btn_form = (isset($_SESSION['scriptcase']['str_button_all'])) ? $_SESSION['scriptcase']['str_button_all'] : "scriptcase9_SweetHollyhock";
      $_SESSION['scriptcase']['str_button_all'] = $this->Ini->Str_btn_form;
      include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
      $this->Db = $this->Ini->Db; 
      $this->nm_new_label['accept_tnc'] = 'T&C';

      $this->Ini->str_google_fonts = isset($str_google_fonts)?$str_google_fonts:'';
      $this->Ini->Img_sep_form    = "/" . trim($str_toolbar_separator);
      $this->Ini->Color_bg_ajax   = "" == trim($str_ajax_bg)         ? "#000" : $str_ajax_bg;
      $this->Ini->Border_c_ajax   = "" == trim($str_ajax_border_c)   ? ""     : $str_ajax_border_c;
      $this->Ini->Border_s_ajax   = "" == trim($str_ajax_border_s)   ? ""     : $str_ajax_border_s;
      $this->Ini->Border_w_ajax   = "" == trim($str_ajax_border_w)   ? ""     : $str_ajax_border_w;
      $this->Ini->Block_img_exp   = "" == trim($str_block_exp)       ? ""     : $str_block_exp;
      $this->Ini->Block_img_col   = "" == trim($str_block_col)       ? ""     : $str_block_col;
      $this->Ini->Msg_ico_title   = "" == trim($str_msg_ico_title)   ? ""     : $str_msg_ico_title;
      $this->Ini->Msg_ico_body    = "" == trim($str_msg_ico_body)    ? ""     : $str_msg_ico_body;
      $this->Ini->Err_ico_title   = "" == trim($str_err_ico_title)   ? ""     : $str_err_ico_title;
      $this->Ini->Err_ico_body    = "" == trim($str_err_ico_body)    ? ""     : $str_err_ico_body;
      $this->Ini->Cal_ico_back    = "" == trim($str_cal_ico_back)    ? ""     : $str_cal_ico_back;
      $this->Ini->Cal_ico_for     = "" == trim($str_cal_ico_for)     ? ""     : $str_cal_ico_for;
      $this->Ini->Cal_ico_close   = "" == trim($str_cal_ico_close)   ? ""     : $str_cal_ico_close;
      $this->Ini->Tab_space       = "" == trim($str_tab_space)       ? ""     : $str_tab_space;
      $this->Ini->Bubble_tail     = "" == trim($str_bubble_tail)     ? ""     : $str_bubble_tail;
      $this->Ini->Label_sort_pos  = "" == trim($str_label_sort_pos)  ? ""     : $str_label_sort_pos;
      $this->Ini->Label_sort      = "" == trim($str_label_sort)      ? ""     : $str_label_sort;
      $this->Ini->Label_sort_asc  = "" == trim($str_label_sort_asc)  ? ""     : $str_label_sort_asc;
      $this->Ini->Label_sort_desc = "" == trim($str_label_sort_desc) ? ""     : $str_label_sort_desc;
      $this->Ini->Img_status_ok   = "" == trim($str_img_status_ok)   ? ""     : $str_img_status_ok;
      $this->Ini->Img_status_err  = "" == trim($str_img_status_err)  ? ""     : $str_img_status_err;
      $this->Ini->Css_status      = "scFormInputError";
      $this->Ini->Error_icon_span = "" == trim($str_error_icon_span) ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);
      $this->Ini->form_table_width     = isset($str_form_table_width) && '' != trim($str_form_table_width) ? $str_form_table_width : '';



      $_SESSION['scriptcase']['error_icon']['application_form']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['application_form'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['application_form']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['application_form']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['application_form']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['application_form']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['application_form']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['application_form']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['update'] = "off";
      $this->nmgp_botoes['delete'] = "off";
      $this->nmgp_botoes['first'] = "off";
      $this->nmgp_botoes['back'] = "off";
      $this->nmgp_botoes['forward'] = "off";
      $this->nmgp_botoes['last'] = "off";
      $this->nmgp_botoes['summary'] = "off";
      $this->nmgp_botoes['navpage'] = "off";
      $this->nmgp_botoes['goto'] = "off";
      $this->nmgp_botoes['qtline'] = "off";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['application_form']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['application_form']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['application_form']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['application_form']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['application_form'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['application_form'];

              $this->nmgp_botoes['update']     = $tmpDashboardButtons['form_update']    ? 'on' : 'off';
              $this->nmgp_botoes['new']        = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['insert']     = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['delete']     = $tmpDashboardButtons['form_delete']    ? 'on' : 'off';
              $this->nmgp_botoes['copy']       = $tmpDashboardButtons['form_copy']      ? 'on' : 'off';
              $this->nmgp_botoes['first']      = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['back']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['last']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['forward']    = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['navpage']    = $tmpDashboardButtons['form_navpage']   ? 'on' : 'off';
              $this->nmgp_botoes['goto']       = $tmpDashboardButtons['form_goto']      ? 'on' : 'off';
              $this->nmgp_botoes['qtline']     = $tmpDashboardButtons['form_lineqty']   ? 'on' : 'off';
              $this->nmgp_botoes['summary']    = $tmpDashboardButtons['form_summary']   ? 'on' : 'off';
              $this->nmgp_botoes['qsearch']    = $tmpDashboardButtons['form_qsearch']   ? 'on' : 'off';
              $this->nmgp_botoes['dynsearch']  = $tmpDashboardButtons['form_dynsearch'] ? 'on' : 'off';
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['application_form']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['application_form']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['application_form']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['application_form']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['application_form']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['application_form']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['application_form']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['application_form']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['application_form']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['application_form']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['application_form']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['application_form']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['application_form']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['application_form']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['application_form']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['application_form']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['application_form']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['application_form']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['application_form']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['dados_form'];
          if (!isset($this->login)){$this->login = $this->nmgp_dados_form['login'];} 
          if (!isset($this->middlename)){$this->middlename = $this->nmgp_dados_form['middlename'];} 
          if (!isset($this->status)){$this->status = $this->nmgp_dados_form['status'];} 
          if (!isset($this->submitted)){$this->submitted = $this->nmgp_dados_form['submitted'];} 
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['venue_id'] != "null"){$this->venue_id = $this->nmgp_dados_form['venue_id'];} 
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['audition_id'] != "null"){$this->audition_id = $this->nmgp_dados_form['audition_id'];} 
          if (!isset($this->email1)){$this->email1 = $this->nmgp_dados_form['email1'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("application_form", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                      $this->Ini->Nm_lang['lang_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_mnth_june'],
                                      $this->Ini->Nm_lang['lang_mnth_july'],
                                      $this->Ini->Nm_lang['lang_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                      $this->Ini->Nm_lang['lang_days_sund'],
                                      $this->Ini->Nm_lang['lang_days_mond'],
                                      $this->Ini->Nm_lang['lang_days_tued'],
                                      $this->Ini->Nm_lang['lang_days_wend'],
                                      $this->Ini->Nm_lang['lang_days_thud'],
                                      $this->Ini->Nm_lang['lang_days_frid'],
                                      $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                      $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                      $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                      $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                      $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                      $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                      $this->Ini->Nm_lang['lang_shrt_days_satd']);
      nm_gc($this->Ini->path_libs);
      $this->Ini->Gd_missing  = true;
      if(function_exists("getProdVersion"))
      {
         $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
         if(function_exists("gd_info"))
         {
            $this->Ini->Gd_missing = false;
         }
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 
      if (isset($_GET['nm_cal_display']))
      {
          if ($this->Embutida_proc)
          { 
              include_once($this->Ini->path_embutida . 'application_form/application_form_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'application_form_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'application_form_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'application_form_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('form:' == substr($str_link_webhelp, 0, 5))
                  {
                      $arr_link_parts = explode(':', $str_link_webhelp);
                      if ('' != $arr_link_parts[1] && is_file($this->Ini->root . $this->Ini->path_help . $arr_link_parts[1]))
                      {
                          $this->url_webhelp = $this->Ini->path_help . $arr_link_parts[1];
                      }
                  }
              }
          }
      }

      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }

      if ($this->Embutida_proc)
      { 
          require_once($this->Ini->path_embutida . 'application_form/application_form_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "application_form_erro.class.php"); 
      }
      $this->Erro      = new application_form_erro();
      $this->Erro->Ini = $this->Ini;
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['opcao']))
         { 
             if ($this->login != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['application_form']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['application_form']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['application_form']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
      if (isset($this->firstname)) { $this->nm_limpa_alfa($this->firstname); }
      if (isset($this->lastname)) { $this->nm_limpa_alfa($this->lastname); }
      if (isset($this->nationality)) { $this->nm_limpa_alfa($this->nationality); }
      if (isset($this->gender)) { $this->nm_limpa_alfa($this->gender); }
      if (isset($this->resident)) { $this->nm_limpa_alfa($this->resident); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- dateofbirth
      $this->field_config['dateofbirth']                 = array();
      $this->field_config['dateofbirth']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['dateofbirth']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['dateofbirth']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'dateofbirth');
      //-- status
      $this->field_config['status']               = array();
      $this->field_config['status']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['status']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['status']['symbol_dec'] = '';
      $this->field_config['status']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['status']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- submitted
      $this->field_config['submitted']                 = array();
      $this->field_config['submitted']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['submitted']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['submitted']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['submitted']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'submitted');
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Gera_log_access'])
      {
          $this->NM_gera_log_insert("Scriptcase", "access");
          $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Gera_log_access'] = false;
      }

      if ('' != $_SESSION['scriptcase']['change_regional_old'])
      {
          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_old'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $this->nm_tira_formatacao();

          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_new'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $guarda_formatado = $this->formatado;
          $this->nm_formatar_campos();
          $this->formatado = $guarda_formatado;

          $_SESSION['scriptcase']['change_regional_old'] = '';
          $_SESSION['scriptcase']['change_regional_new'] = '';
      }

      if ($nm_form_submit == 1 && ($this->nmgp_opcao == 'inicio' || $this->nmgp_opcao == 'igual'))
      {
          $this->nm_tira_formatacao();
      }
      if (!$this->NM_ajax_flag || 'alterar' != $this->nmgp_opcao || 'submit_form' != $this->NM_ajax_opcao)
      {
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_venue_id' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'venue_id');
          }
          if ('validate_audition_id' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'audition_id');
          }
          if ('validate_course_id' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'course_id');
          }
          if ('validate_firstname' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'firstname');
          }
          if ('validate_lastname' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'lastname');
          }
          if ('validate_nationality' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nationality');
          }
          if ('validate_dateofbirth' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dateofbirth');
          }
          if ('validate_gender' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'gender');
          }
          if ('validate_resident' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'resident');
          }
          if ('validate_email' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'email');
          }
          if ('validate_password' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'password');
          }
          if ('validate_confirm_password' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'confirm_password');
          }
          if ('validate_accept_tnc' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'accept_tnc');
          }
          application_form_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
      if (empty($this->dateofbirth)) 
      { 
          $s_date_info_pos  = strtolower(str_replace('aaaa', 'yyyy', $this->field_config['dateofbirth']['date_format']));
          $i_date_pos_day   = strpos($s_date_info_pos, 'dd');
          $i_date_pos_month = strpos($s_date_info_pos, 'mm');
          $i_date_pos_year  = strpos($s_date_info_pos, 'yyyy');
          $i_arr_date_pos   = array($i_date_pos_day => 'd', $i_date_pos_month => 'm', $i_date_pos_year => 'y');
          ksort($i_arr_date_pos);
          foreach ($i_arr_date_pos as $IX => $Part_date)
          {
              if ($Part_date == "d")
              {
                  $this->dateofbirth .= $this->dateofbirth_dia ; 
              }
              if ($Part_date == "m")
              {
                  $this->dateofbirth .= $this->dateofbirth_mes ; 
              }
              if ($Part_date == "y")
              {
                  $this->dateofbirth .= $this->dateofbirth_ano ; 
              }
          }
      } 
          if (is_array($this->accept_tnc))
          {
              $x = 0; 
              $this->accept_tnc_1 = $this->accept_tnc;
              $this->accept_tnc = ""; 
              if ($this->accept_tnc_1 != "") 
              { 
                  foreach ($this->accept_tnc_1 as $dados_accept_tnc_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->accept_tnc .= ";";
                      } 
                      $this->accept_tnc .= $dados_accept_tnc_1;
                      $x++ ; 
                  } 
              } 
          } 
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['dados_select']['venue_id']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->venue_id = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['dados_select']['venue_id'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['dados_select']['audition_id']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->audition_id = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['dados_select']['audition_id'];
          } 
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              application_form_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          if ($this->nmgp_opcao != "incluir")
          {
              $this->scFormFocusErrorName = '';
          }
          $_SESSION['scriptcase']['application_form']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  application_form_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, 4);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir" && $nm_apl_dependente == 1) 
              { 
                  $this->nm_flag_saida_novo = "S";; 
              }
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
      elseif (isset($nm_form_submit) && 1 == $nm_form_submit && $this->nmgp_opcao != "menu_link" && $this->nmgp_opcao != "recarga_mobile")
      {
      }
//
      if ($this->nmgp_opcao != "nada")
      {
          $this->nm_acessa_banco();
      }
      else
      {
           if ($this->nmgp_opc_ant == "incluir") 
           { 
               $this->nm_proc_onload(false);
           }
           else
           { 
              $this->nm_guardar_campos();
           }
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['recarga'] = $this->nmgp_opcao;
          if ($this->sc_evento == "update")
          {
              $this->NM_close_db(); 
              $this->nmgp_redireciona(2); 
          }
          if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
          {
              $this->NM_close_db(); 
              $this->nmgp_redireciona(2); 
          }
          if ($this->sc_evento == "delete")
          {
              $this->NM_close_db(); 
              $this->nmgp_redireciona(2); 
          }
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          application_form_pack_ajax_response();
          exit;
      }
      $this->nm_formatar_campos();
      if ($this->NM_ajax_flag)
      {
          $this->NM_ajax_info['result'] = 'OK';
          if ('alterar' == $this->NM_ajax_info['param']['nmgp_opcao'])
          {
              $this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmu']);
          }
          application_form_pack_ajax_response();
          exit;
      }
      $this->nm_gera_html();
      $this->NM_close_db(); 
      $this->nmgp_opcao = ""; 
      if ($this->Change_Menu)
      {
          $apl_menu  = $_SESSION['scriptcase']['menu_atual'];
          $Arr_rastro = array();
          if (isset($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
              {
                 $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "&script_case_session=" . session_id() . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
              }
              $ult_apl = count($Arr_rastro) - 1;
              unset($Arr_rastro[$ult_apl]);
              $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     parent.writeFastMenu(link_atual);
  </script>
<?php
          }
          else
          {
?>
  <script type="text/javascript">
     parent.clearFastMenu();
  </script>
<?php
          }
      }
   }
//
//--------------------------------------------------------------------------------------
   function NM_has_trans()
   {
       return !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access);
   }
//
//--------------------------------------------------------------------------------------
   function NM_commit_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->CommitTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
       if ($this->SC_log_atv)
       {
           $this->NM_gera_log_output();
       }
   }
//
//--------------------------------------------------------------------------------------
   function NM_rollback_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->RollbackTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_gera_log_insert($orig="Scriptcase", $evento="", $texto="")
   {
       $delim  = "'";
       $delim1 = "'";
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_access))
       { 
           $delim  = "#";
           $delim1 = "#";
       } 
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['SC_sep_date']))
       {
           $delim  = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['SC_sep_date'];
           $delim1 = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['SC_sep_date1'];
       }
       $dt  = $delim . date('Y-m-d H:i:s') . $delim1;
       $usr = isset($_SESSION['usr_login']) ? $_SESSION['usr_login'] : "";
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_access))
       { 
           $dt  = $delim . date('Y-m-d H:i:s') . $delim1;
       } 
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_access))
       { 
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, `action`, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'application_form', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       elseif (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_sqlite))
       { 
           $comando = "INSERT INTO sc_log (id, inserted_date, username, application, creator, ip_user, action, description) VALUES (NULL, $dt, " . $this->Db->qstr($usr) . ", 'application_form', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       else
       { 
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, action, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'application_form', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
       $rlog = $this->Db->Execute($comando); 
       if ($rlog === false)  
       { 
           $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
           if ($this->NM_ajax_flag)
           {
               application_form_pack_ajax_response();
               exit; 
           }
       }
   }
//
//--------------------------------------------------------------------------------------
   function NM_close_db()
   {
       if ($this->Db && !$this->Embutida_proc)
       { 
           $this->Db->Close(); 
       } 
   }
//
//--------------------------------------------------------------------------------------
   function Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, $mode = 3) 
   {
       switch ($mode)
       {
           case 1:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 2:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta, true);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 3:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;

           case 4:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros_SweetAlert($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;
       }
   }

   function Formata_Campos_Falta($Campos_Falta, $table = false) 
   {
       $Campos_Falta = array_unique($Campos_Falta);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_reqd'] . ' ' . implode('; ', $Campos_Falta);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Falta);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Falta as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_reqd'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Crit($Campos_Crit, $table = false) 
   {
       $Campos_Crit = array_unique($Campos_Crit);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . implode('; ', $Campos_Crit);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Crit);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Crit as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_flds'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros($Campos_Erros) 
   {
       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= '<tr>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Recupera_Nome_Campo($campo) . ':</td>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', array_unique($erros)) . '</td>';
           $sError .= '</tr>';
       }

       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros_SweetAlert($Campos_Erros) 
   {
       $sError  = '';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= $this->Recupera_Nome_Campo($campo) . ': ' . implode('<br />', array_unique($erros)) . '<br />';
       }

       return $sError;
   }

   function Recupera_Nome_Campo($campo) 
   {
       switch($campo)
       {
           case 'venue_id':
               return "Audition Venue";
               break;
           case 'audition_id':
               return "Audition Date";
               break;
           case 'course_id':
               return "Application for";
               break;
           case 'firstname':
               return "First name";
               break;
           case 'lastname':
               return "Last name";
               break;
           case 'nationality':
               return "Nationality (listed by country)";
               break;
           case 'dateofbirth':
               return "Date of birth";
               break;
           case 'gender':
               return "Gender";
               break;
           case 'resident':
               return "Are you a resident of UAE?";
               break;
           case 'email':
               return "Email";
               break;
           case 'password':
               return "Password";
               break;
           case 'confirm_password':
               return "Confirm Password";
               break;
           case 'accept_tnc':
               return "T&C";
               break;
           case 'login':
               return "Login";
               break;
           case 'middlename':
               return "Middle name(s)";
               break;
           case 'status':
               return "Status";
               break;
           case 'submitted':
               return "Submitted";
               break;
           case 'email1':
               return "Email";
               break;
       }

       return $campo;
   }

   function dateDefaultFormat()
   {
       if (isset($this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']))
       {
           $sDate = str_replace('yyyy', 'Y', $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']);
           $sDate = str_replace('mm',   'm', $sDate);
           $sDate = str_replace('dd',   'd', $sDate);
           return substr(chunk_split($sDate, 1, $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_sep']), 0, -1);
       }
       elseif ('en_us' == $this->Ini->str_lang)
       {
           return 'm/d/Y';
       }
       else
       {
           return 'd/m/Y';
       }
   } // dateDefaultFormat

//
//--------------------------------------------------------------------------------------
   function Valida_campos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser, $teste_validade;
//---------------------------------------------------------
     $this->scFormFocusErrorName = '';
     $this->sc_force_zero = array();

     if ('' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_application_form']) || !is_array($this->NM_ajax_info['errList']['geral_application_form']))
              {
                  $this->NM_ajax_info['errList']['geral_application_form'] = array();
              }
              $this->NM_ajax_info['errList']['geral_application_form'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'venue_id' == $filtro)
        $this->ValidateField_venue_id($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "venue_id";

      if ('' == $filtro || 'audition_id' == $filtro)
        $this->ValidateField_audition_id($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "audition_id";

      if ('' == $filtro || 'course_id' == $filtro)
        $this->ValidateField_course_id($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "course_id";

      if ('' == $filtro || 'firstname' == $filtro)
        $this->ValidateField_firstname($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "firstname";

      if ('' == $filtro || 'lastname' == $filtro)
        $this->ValidateField_lastname($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "lastname";

      if ('' == $filtro || 'nationality' == $filtro)
        $this->ValidateField_nationality($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "nationality";

      if ('' == $filtro || 'dateofbirth' == $filtro)
        $this->ValidateField_dateofbirth($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "dateofbirth";

      if ('' == $filtro || 'gender' == $filtro)
        $this->ValidateField_gender($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "gender";

      if ('' == $filtro || 'resident' == $filtro)
        $this->ValidateField_resident($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "resident";

      if ('' == $filtro || 'email' == $filtro)
        $this->ValidateField_email($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "email";

      if ('' == $filtro || 'password' == $filtro)
        $this->ValidateField_password($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "password";

      if ('' == $filtro || 'confirm_password' == $filtro)
        $this->ValidateField_confirm_password($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "confirm_password";

      if ('' == $filtro || 'accept_tnc' == $filtro)
        $this->ValidateField_accept_tnc($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "accept_tnc";

//-- converter datas   
          $this->nm_converte_datas();
//---

      if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
      {
      $_SESSION['scriptcase']['application_form']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_confirm_password = $this->confirm_password;
    $original_email = $this->email;
    $original_password = $this->password;
}
  $error_message = 'Password fields do not match.'; 

if ($this->password  !== $this->confirm_password )
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_application_form' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = $this->emailExists($this->email );   
$error_message = 'Sorry, we found your email has been registered with us.'; 

if ($error_test > 0)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_application_form' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
	 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('app_login') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_confirm_password != $this->confirm_password || (isset($bFlagRead_confirm_password) && $bFlagRead_confirm_password)))
    {
        $this->ajax_return_values_confirm_password(true);
    }
    if (($original_email != $this->email || (isset($bFlagRead_email) && $bFlagRead_email)))
    {
        $this->ajax_return_values_email(true);
    }
    if (($original_password != $this->password || (isset($bFlagRead_password) && $bFlagRead_password)))
    {
        $this->ajax_return_values_password(true);
    }
}
$_SESSION['scriptcase']['application_form']['contr_erro'] = 'off'; 
      }
      if (!empty($Campos_Crit) || !empty($Campos_Falta) || !empty($this->Campos_Mens_erro))
      {
          if (!empty($this->sc_force_zero))
          {
              foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
              {
                  eval('$this->' . $sc_force_zero_field . ' = "";');
                  unset($this->sc_force_zero[$i_force_zero]);
              }
          }
      }
   }

    function ValidateField_venue_id(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if ($this->nmgp_opcao == "incluir")
   {
      if ($this->venue_id == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['php_cmp_required']['venue_id']) || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['php_cmp_required']['venue_id'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "Audition Venue" ; 
          if (!isset($Campos_Erros['venue_id']))
          {
              $Campos_Erros['venue_id'] = array();
          }
          $Campos_Erros['venue_id'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['venue_id']) || !is_array($this->NM_ajax_info['errList']['venue_id']))
          {
              $this->NM_ajax_info['errList']['venue_id'] = array();
          }
          $this->NM_ajax_info['errList']['venue_id'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->venue_id) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_venue_id']) && !in_array($this->venue_id, $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_venue_id']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['venue_id']))
              {
                  $Campos_Erros['venue_id'] = array();
              }
              $Campos_Erros['venue_id'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['venue_id']) || !is_array($this->NM_ajax_info['errList']['venue_id']))
              {
                  $this->NM_ajax_info['errList']['venue_id'] = array();
              }
              $this->NM_ajax_info['errList']['venue_id'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
   }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'venue_id';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_venue_id

    function ValidateField_audition_id(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if ($this->nmgp_opcao == "incluir")
   {
      if ($this->audition_id == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['php_cmp_required']['audition_id']) || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['php_cmp_required']['audition_id'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "Audition Date" ; 
          if (!isset($Campos_Erros['audition_id']))
          {
              $Campos_Erros['audition_id'] = array();
          }
          $Campos_Erros['audition_id'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['audition_id']) || !is_array($this->NM_ajax_info['errList']['audition_id']))
          {
              $this->NM_ajax_info['errList']['audition_id'] = array();
          }
          $this->NM_ajax_info['errList']['audition_id'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->audition_id) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_audition_id']) && !in_array($this->audition_id, $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_audition_id']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['audition_id']))
              {
                  $Campos_Erros['audition_id'] = array();
              }
              $Campos_Erros['audition_id'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['audition_id']) || !is_array($this->NM_ajax_info['errList']['audition_id']))
              {
                  $this->NM_ajax_info['errList']['audition_id'] = array();
              }
              $this->NM_ajax_info['errList']['audition_id'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
   }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'audition_id';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_audition_id

    function ValidateField_course_id(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if ($this->nmgp_opcao == "incluir")
   {
      if ($this->course_id == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['php_cmp_required']['course_id']) || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['php_cmp_required']['course_id'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "Application for" ; 
          if (!isset($Campos_Erros['course_id']))
          {
              $Campos_Erros['course_id'] = array();
          }
          $Campos_Erros['course_id'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['course_id']) || !is_array($this->NM_ajax_info['errList']['course_id']))
          {
              $this->NM_ajax_info['errList']['course_id'] = array();
          }
          $this->NM_ajax_info['errList']['course_id'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->course_id) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_course_id']) && !in_array($this->course_id, $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_course_id']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['course_id']))
              {
                  $Campos_Erros['course_id'] = array();
              }
              $Campos_Erros['course_id'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['course_id']) || !is_array($this->NM_ajax_info['errList']['course_id']))
              {
                  $this->NM_ajax_info['errList']['course_id'] = array();
              }
              $this->NM_ajax_info['errList']['course_id'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
   }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'course_id';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_course_id

    function ValidateField_firstname(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['php_cmp_required']['firstname']) || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['php_cmp_required']['firstname'] == "on")) 
      { 
          if ($this->firstname == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "First name" ; 
              if (!isset($Campos_Erros['firstname']))
              {
                  $Campos_Erros['firstname'] = array();
              }
              $Campos_Erros['firstname'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['firstname']) || !is_array($this->NM_ajax_info['errList']['firstname']))
                  {
                      $this->NM_ajax_info['errList']['firstname'] = array();
                  }
                  $this->NM_ajax_info['errList']['firstname'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->firstname) > 100) 
          { 
              $hasError = true;
              $Campos_Crit .= "First name " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['firstname']))
              {
                  $Campos_Erros['firstname'] = array();
              }
              $Campos_Erros['firstname'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['firstname']) || !is_array($this->NM_ajax_info['errList']['firstname']))
              {
                  $this->NM_ajax_info['errList']['firstname'] = array();
              }
              $this->NM_ajax_info['errList']['firstname'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'firstname';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_firstname

    function ValidateField_lastname(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['php_cmp_required']['lastname']) || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['php_cmp_required']['lastname'] == "on")) 
      { 
          if ($this->lastname == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Last name" ; 
              if (!isset($Campos_Erros['lastname']))
              {
                  $Campos_Erros['lastname'] = array();
              }
              $Campos_Erros['lastname'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['lastname']) || !is_array($this->NM_ajax_info['errList']['lastname']))
                  {
                      $this->NM_ajax_info['errList']['lastname'] = array();
                  }
                  $this->NM_ajax_info['errList']['lastname'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->lastname) > 100) 
          { 
              $hasError = true;
              $Campos_Crit .= "Last name " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['lastname']))
              {
                  $Campos_Erros['lastname'] = array();
              }
              $Campos_Erros['lastname'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['lastname']) || !is_array($this->NM_ajax_info['errList']['lastname']))
              {
                  $this->NM_ajax_info['errList']['lastname'] = array();
              }
              $this->NM_ajax_info['errList']['lastname'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'lastname';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_lastname

    function ValidateField_nationality(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nationality == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['php_cmp_required']['nationality']) || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['php_cmp_required']['nationality'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "Nationality (listed by country)" ; 
          if (!isset($Campos_Erros['nationality']))
          {
              $Campos_Erros['nationality'] = array();
          }
          $Campos_Erros['nationality'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['nationality']) || !is_array($this->NM_ajax_info['errList']['nationality']))
          {
              $this->NM_ajax_info['errList']['nationality'] = array();
          }
          $this->NM_ajax_info['errList']['nationality'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->nationality) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_nationality']) && !in_array($this->nationality, $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_nationality']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['nationality']))
              {
                  $Campos_Erros['nationality'] = array();
              }
              $Campos_Erros['nationality'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['nationality']) || !is_array($this->NM_ajax_info['errList']['nationality']))
              {
                  $this->NM_ajax_info['errList']['nationality'] = array();
              }
              $this->NM_ajax_info['errList']['nationality'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nationality';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nationality

    function ValidateField_dateofbirth(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (empty($this->dateofbirth)) 
      { 
         $s_date_info_pos  = strtolower(str_replace('aaaa', 'yyyy', $this->field_config['dateofbirth']['date_format']));
         $i_date_pos_day   = strpos($s_date_info_pos, 'dd');
         $i_date_pos_month = strpos($s_date_info_pos, 'mm');
         $i_date_pos_year  = strpos($s_date_info_pos, 'yyyy');
         $i_arr_date_pos   = array($i_date_pos_day => 'd', $i_date_pos_month => 'm', $i_date_pos_year => 'y');
         ksort($i_arr_date_pos);
         foreach ($i_arr_date_pos as $IX => $Part_date)
         {
             if ($Part_date == "d")
             {
                 $this->dateofbirth .= $this->dateofbirth_dia ; 
             }
             if ($Part_date == "m")
             {
                 $this->dateofbirth .= $this->dateofbirth_mes ; 
             }
             if ($Part_date == "y")
             {
                 $this->dateofbirth .= $this->dateofbirth_ano ; 
             }
         }
      } 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['dateofbirth']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['dateofbirth']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['dateofbirth']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['dateofbirth']['date_sep']) ; 
          if (trim($this->dateofbirth) != "")  
          { 
              if ($teste_validade->Data($this->dateofbirth, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Date of birth; " ; 
                  if (!isset($Campos_Erros['dateofbirth']))
                  {
                      $Campos_Erros['dateofbirth'] = array();
                  }
                  $Campos_Erros['dateofbirth'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['dateofbirth']) || !is_array($this->NM_ajax_info['errList']['dateofbirth']))
                  {
                      $this->NM_ajax_info['errList']['dateofbirth'] = array();
                  }
                  $this->NM_ajax_info['errList']['dateofbirth'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['php_cmp_required']['dateofbirth']) || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['php_cmp_required']['dateofbirth'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Date of birth" ; 
              if (!isset($Campos_Erros['dateofbirth']))
              {
                  $Campos_Erros['dateofbirth'] = array();
              }
              $Campos_Erros['dateofbirth'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['dateofbirth']) || !is_array($this->NM_ajax_info['errList']['dateofbirth']))
                  {
                      $this->NM_ajax_info['errList']['dateofbirth'] = array();
                  }
                  $this->NM_ajax_info['errList']['dateofbirth'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
          $this->field_config['dateofbirth']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'dateofbirth';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_dateofbirth

    function ValidateField_gender(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->gender == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['php_cmp_required']['gender']) || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['php_cmp_required']['gender'] == "on")
        { 
          $hasError = true;
          $Campos_Falta[] = "Gender" ; 
          if (!isset($Campos_Erros['gender']))
          {
              $Campos_Erros['gender'] = array();
          }
          $Campos_Erros['gender'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['gender']) || !is_array($this->NM_ajax_info['errList']['gender']))
                  {
                      $this->NM_ajax_info['errList']['gender'] = array();
                  }
                  $this->NM_ajax_info['errList']['gender'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
        } 
      } 
      if ($this->gender != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_gender']) && !in_array($this->gender, $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_gender']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['gender']))
              {
                  $Campos_Erros['gender'] = array();
              }
              $Campos_Erros['gender'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['gender']) || !is_array($this->NM_ajax_info['errList']['gender']))
              {
                  $this->NM_ajax_info['errList']['gender'] = array();
              }
              $this->NM_ajax_info['errList']['gender'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'gender';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_gender

    function ValidateField_resident(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->resident == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['php_cmp_required']['resident']) || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['php_cmp_required']['resident'] == "on")
        { 
          $hasError = true;
          $Campos_Falta[] = "Are you a resident of UAE?" ; 
          if (!isset($Campos_Erros['resident']))
          {
              $Campos_Erros['resident'] = array();
          }
          $Campos_Erros['resident'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['resident']) || !is_array($this->NM_ajax_info['errList']['resident']))
                  {
                      $this->NM_ajax_info['errList']['resident'] = array();
                  }
                  $this->NM_ajax_info['errList']['resident'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
        } 
      } 
      if ($this->resident != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_resident']) && !in_array($this->resident, $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_resident']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['resident']))
              {
                  $Campos_Erros['resident'] = array();
              }
              $Campos_Erros['resident'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['resident']) || !is_array($this->NM_ajax_info['errList']['resident']))
              {
                  $this->NM_ajax_info['errList']['resident'] = array();
              }
              $this->NM_ajax_info['errList']['resident'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'resident';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_resident

    function ValidateField_email(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (($this->nmgp_opcao == "incluir" || 'validate_email' == $this->NM_ajax_opcao) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['php_cmp_required']['email']) || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['php_cmp_required']['email'] == "on"))
      { 
          if ($this->email == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Email" ; 
              if (!isset($Campos_Erros['email']))
              {
                  $Campos_Erros['email'] = array();
              }
              $Campos_Erros['email'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['email']) || !is_array($this->NM_ajax_info['errList']['email']))
                  {
                      $this->NM_ajax_info['errList']['email'] = array();
                  }
                  $this->NM_ajax_info['errList']['email'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->email) > 60) 
          { 
              $hasError = true;
              $Campos_Crit .= "Email " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['email']))
              {
                  $Campos_Erros['email'] = array();
              }
              $Campos_Erros['email'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['email']) || !is_array($this->NM_ajax_info['errList']['email']))
              {
                  $this->NM_ajax_info['errList']['email'] = array();
              }
              $this->NM_ajax_info['errList']['email'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'email';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_email

    function ValidateField_password(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (($this->nmgp_opcao == "incluir" || 'validate_password' == $this->NM_ajax_opcao) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['php_cmp_required']['password']) || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['php_cmp_required']['password'] == "on"))
      { 
          if ($this->password == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Password" ; 
              if (!isset($Campos_Erros['password']))
              {
                  $Campos_Erros['password'] = array();
              }
              $Campos_Erros['password'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['password']) || !is_array($this->NM_ajax_info['errList']['password']))
                  {
                      $this->NM_ajax_info['errList']['password'] = array();
                  }
                  $this->NM_ajax_info['errList']['password'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->password) > 32) 
          { 
              $hasError = true;
              $Campos_Crit .= "Password " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['password']))
              {
                  $Campos_Erros['password'] = array();
              }
              $Campos_Erros['password'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['password']) || !is_array($this->NM_ajax_info['errList']['password']))
              {
                  $this->NM_ajax_info['errList']['password'] = array();
              }
              $this->NM_ajax_info['errList']['password'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'password';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_password

    function ValidateField_confirm_password(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (($this->nmgp_opcao == "incluir" || 'validate_confirm_password' == $this->NM_ajax_opcao) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['php_cmp_required']['confirm_password']) || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['php_cmp_required']['confirm_password'] == "on"))
      { 
          if ($this->confirm_password == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Confirm Password" ; 
              if (!isset($Campos_Erros['confirm_password']))
              {
                  $Campos_Erros['confirm_password'] = array();
              }
              $Campos_Erros['confirm_password'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['confirm_password']) || !is_array($this->NM_ajax_info['errList']['confirm_password']))
                  {
                      $this->NM_ajax_info['errList']['confirm_password'] = array();
                  }
                  $this->NM_ajax_info['errList']['confirm_password'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->confirm_password) > 32) 
          { 
              $hasError = true;
              $Campos_Crit .= "Confirm Password " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['confirm_password']))
              {
                  $Campos_Erros['confirm_password'] = array();
              }
              $Campos_Erros['confirm_password'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['confirm_password']) || !is_array($this->NM_ajax_info['errList']['confirm_password']))
              {
                  $this->NM_ajax_info['errList']['confirm_password'] = array();
              }
              $this->NM_ajax_info['errList']['confirm_password'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'confirm_password';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_confirm_password

    function ValidateField_accept_tnc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if ($this->nmgp_opcao == "incluir")
   {
      if ($this->accept_tnc == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['php_cmp_required']['accept_tnc']) || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['php_cmp_required']['accept_tnc'] == "on")
        { 
          $hasError = true;
          $Campos_Falta[] = "T&C" ; 
          if (!isset($Campos_Erros['accept_tnc']))
          {
              $Campos_Erros['accept_tnc'] = array();
          }
          $Campos_Erros['accept_tnc'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['accept_tnc']) || !is_array($this->NM_ajax_info['errList']['accept_tnc']))
                  {
                      $this->NM_ajax_info['errList']['accept_tnc'] = array();
                  }
                  $this->NM_ajax_info['errList']['accept_tnc'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
        } 
      } 
      else 
      { 
          if (is_array($this->accept_tnc))
          {
              $x = 0; 
              $this->accept_tnc_1 = array(); 
              foreach ($this->accept_tnc as $ind => $dados_accept_tnc_1 ) 
              {
                  if ($dados_accept_tnc_1 != "") 
                  {
                      $this->accept_tnc_1[] = $dados_accept_tnc_1;
                  } 
              } 
              $this->accept_tnc = ""; 
              foreach ($this->accept_tnc_1 as $dados_accept_tnc_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->accept_tnc .= ";";
                   } 
                   $this->accept_tnc .= $dados_accept_tnc_1;
                   $x++ ; 
              } 
          } 
      } 
   }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'accept_tnc';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_accept_tnc

    function removeDuplicateDttmError($aErrDate, &$aErrTime)
    {
        if (empty($aErrDate) || empty($aErrTime))
        {
            return;
        }

        foreach ($aErrDate as $sErrDate)
        {
            foreach ($aErrTime as $iErrTime => $sErrTime)
            {
                if ($sErrDate == $sErrTime)
                {
                    unset($aErrTime[$iErrTime]);
                }
            }
        }
    } // removeDuplicateDttmError

   function nm_guardar_campos()
   {
    global
           $sc_seq_vert;
    $this->nmgp_dados_form['venue_id'] = $this->venue_id;
    $this->nmgp_dados_form['audition_id'] = $this->audition_id;
    $this->nmgp_dados_form['course_id'] = $this->course_id;
    $this->nmgp_dados_form['firstname'] = $this->firstname;
    $this->nmgp_dados_form['lastname'] = $this->lastname;
    $this->nmgp_dados_form['nationality'] = $this->nationality;
    $this->nmgp_dados_form['dateofbirth'] = (strlen(trim($this->dateofbirth)) > 19) ? str_replace(".", ":", $this->dateofbirth) : trim($this->dateofbirth);
    $this->nmgp_dados_form['gender'] = $this->gender;
    $this->nmgp_dados_form['resident'] = $this->resident;
    $this->nmgp_dados_form['email'] = $this->email;
    $this->nmgp_dados_form['password'] = $this->password;
    $this->nmgp_dados_form['confirm_password'] = $this->confirm_password;
    $this->nmgp_dados_form['accept_tnc'] = $this->accept_tnc;
    $this->nmgp_dados_form['login'] = $this->login;
    $this->nmgp_dados_form['middlename'] = $this->middlename;
    $this->nmgp_dados_form['status'] = $this->status;
    $this->nmgp_dados_form['submitted'] = $this->submitted;
    $this->nmgp_dados_form['email1'] = $this->email1;
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['status'] = $this->status;
      nm_limpa_numero($this->status, $this->field_config['status']['symbol_grp']) ; 
      $this->Before_unformat['submitted'] = $this->submitted;
      nm_limpa_data($this->submitted, $this->field_config['submitted']['date_sep']) ; 
      nm_limpa_hora($this->submitted_hora, $this->field_config['submitted']['time_sep']) ; 
   }
   function sc_add_currency(&$value, $symbol, $pos)
   {
       if ('' == $value)
       {
           return;
       }
       $value = (1 == $pos || 3 == $pos) ? $symbol . ' ' . $value : $value . ' ' . $symbol;
   }
   function sc_remove_currency(&$value, $symbol_dec, $symbol_tho, $symbol_mon)
   {
       $value = preg_replace('~&#x0*([0-9a-f]+);~i', '', $value);
       $sNew  = str_replace($symbol_mon, '', $value);
       if ($sNew != $value)
       {
           $value = str_replace(' ', '', $sNew);
           return;
       }
       $aTest = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', $symbol_dec, $symbol_tho);
       $sNew  = '';
       for ($i = 0; $i < strlen($value); $i++)
       {
           if ($this->sc_test_currency_char($value[$i], $aTest))
           {
               $sNew .= $value[$i];
           }
       }
       $value = $sNew;
   }
   function sc_test_currency_char($char, $test)
   {
       $found = false;
       foreach ($test as $test_char)
       {
           if ($char === $test_char)
           {
               $found = true;
           }
       }
       return $found;
   }
   function nm_clear_val($Nome_Campo)
   {
      if ($Nome_Campo == "status")
      {
          nm_limpa_numero($this->status, $this->field_config['status']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
      if ((!empty($this->dateofbirth) && 'null' != $this->dateofbirth) || (!empty($format_fields) && isset($format_fields['dateofbirth'])))
      {
          nm_volta_data($this->dateofbirth, $this->field_config['dateofbirth']['date_format']) ; 
      }
      elseif ('null' == $this->dateofbirth || '' == $this->dateofbirth)
      {
          $this->dateofbirth = '';
      }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $new_campo = '';
          $a_mask_ord  = array();
          $i_mask_size = -1;

          foreach (explode(';', $nm_mask) as $str_mask)
          {
              $a_mask_ord[ $this->nm_conta_mask_chars($str_mask) ] = $str_mask;
          }
          ksort($a_mask_ord);

          foreach ($a_mask_ord as $i_size => $s_mask)
          {
              if (-1 == $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
              elseif (strlen($nm_campo) >= $i_size && strlen($nm_campo) > $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
          }
          $nm_mask = $a_mask_ord[$i_mask_size];

          for ($i = 0; $i < strlen($nm_mask); $i++)
          {
              $test_mask = substr($nm_mask, $i, 1);
              
              if ('9' == $test_mask || 'a' == $test_mask || '*' == $test_mask)
              {
                  $new_campo .= substr($nm_campo, 0, 1);
                  $nm_campo   = substr($nm_campo, 1);
              }
              else
              {
                  $new_campo .= $test_mask;
              }
          }

                  $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont1 < $cont2 && $tam_campo <= $cont2 && $tam_campo > $cont1)
              {
                  $trab_mask = $ver_duas[1];
              }
              elseif ($cont1 > $cont2 && $tam_campo <= $cont2)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $trab_saida;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $trab_saida;
   } 
   function nm_conta_mask_chars($sMask)
   {
       $iLength = 0;

       for ($i = 0; $i < strlen($sMask); $i++)
       {
           if (in_array($sMask[$i], array('9', 'a', '*')))
           {
               $iLength++;
           }
       }

       return $iLength;
   }
   function nm_tira_mask(&$nm_campo, $nm_mask, $nm_chars = '')
   { 
      $mask_dados = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $tam_mask   = strlen($nm_mask);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $raw_campo = $this->sc_clear_mask($nm_campo, $nm_chars);
          $raw_mask  = $this->sc_clear_mask($nm_mask, $nm_chars);
          $new_campo = '';

          $test_mask = substr($raw_mask, 0, 1);
          $raw_mask  = substr($raw_mask, 1);

          while ('' != $raw_campo)
          {
              $test_val  = substr($raw_campo, 0, 1);
              $raw_campo = substr($raw_campo, 1);
              $ord       = ord($test_val);
              $found     = false;

              switch ($test_mask)
              {
                  case '9':
                      if (48 <= $ord && 57 >= $ord)
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case 'a':
                      if ((65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case '*':
                      if ((48 <= $ord && 57 >= $ord) || (65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;
              }

              if ($found)
              {
                  $test_mask = substr($raw_mask, 0, 1);
                  $raw_mask  = substr($raw_mask, 1);
              }
          }

          $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          for ($x=0; $x < strlen($mask_dados); $x++)
          {
              if (is_numeric(substr($mask_dados, $x, 1)))
              {
                  $trab_saida .= substr($mask_dados, $x, 1);
              }
          }
          $nm_campo = $trab_saida;
          return;
      }
      if ($tam_mask > $tam_campo)
      {
         $mask_desfaz = "";
         for ($mask_ind = 0; $tam_mask > $tam_campo; $mask_ind++)
         {
              $mask_char = substr($trab_mask, $mask_ind, 1);
              if ($mask_char == "z")
              {
                  $tam_mask--;
              }
              else
              {
                  $mask_desfaz .= $mask_char;
              }
              if ($mask_ind == $tam_campo)
              {
                  $tam_mask = $tam_campo;
              }
         }
         $trab_mask = $mask_desfaz . substr($trab_mask, $mask_ind);
      }
      $mask_saida = "";
      for ($mask_ind = strlen($trab_mask); $mask_ind > 0; $mask_ind--)
      {
          $mask_char = substr($trab_mask, $mask_ind - 1, 1);
          if ($mask_char == "x" || $mask_char == "z")
          {
              if ($tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
              }
          }
          else
          {
              if ($mask_char != substr($mask_dados, $tam_campo - 1, 1) && $tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
                  $mask_ind--;
              }
          }
          $tam_campo--;
      }
      if ($tam_campo > 0)
      {
         $mask_saida = substr($mask_dados, 0, $tam_campo) . $mask_saida;
      }
      $nm_campo = $mask_saida;
   }

   function sc_clear_mask($value, $chars)
   {
       $new = '';

       for ($i = 0; $i < strlen($value); $i++)
       {
           if (false === strpos($chars, $value[$i]))
           {
               $new .= $value[$i];
           }
       }

       return $new;
   }
//
   function nm_limpa_alfa(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               $x = 0;
               foreach ($str as $cada_str)
               {
                   $str[$x] = stripslashes($str[$x]);
                   $x++;
               }
           }
           else
           {
               $str = stripslashes($str);
           }
       }
   }
//
//-- 
   function nm_converte_datas($use_null = true, $bForce = false)
   {
      $guarda_format_hora = $this->field_config['dateofbirth']['date_format'];
      if ($this->dateofbirth != "")  
      { 
          nm_conv_data($this->dateofbirth, $this->field_config['dateofbirth']['date_format']) ; 
          $this->dateofbirth_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->dateofbirth_hora = substr($this->dateofbirth_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->dateofbirth_hora = substr($this->dateofbirth_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->dateofbirth_hora = substr($this->dateofbirth_hora, 0, -4);
          }
      } 
      if ($this->dateofbirth == "" && $use_null)  
      { 
          $this->dateofbirth = "null" ; 
      } 
      $this->field_config['dateofbirth']['date_format'] = $guarda_format_hora;
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out, $replaces = array())
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT")
       {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT")
       {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       nm_conv_form_data($dt_out, $form_in, $form_out, $replaces);
       return $dt_out;
   }

   function returnWhere($aCond, $sOp = 'AND')
   {
       $aWhere = array();
       foreach ($aCond as $sCond)
       {
           $this->handleWhereCond($sCond);
           if ('' != $sCond)
           {
               $aWhere[] = $sCond;
           }
       }
       if (empty($aWhere))
       {
           return '';
       }
       else
       {
           return ' WHERE (' . implode(') ' . $sOp . ' (', $aWhere) . ')';
       }
   } // returnWhere

   function handleWhereCond(&$sCond)
   {
       $sCond = trim($sCond);
       if ('where' == strtolower(substr($sCond, 0, 5)))
       {
           $sCond = trim(substr($sCond, 5));
       }
   } // handleWhereCond

   function ajax_return_values()
   {
          $this->ajax_return_values_venue_id();
          $this->ajax_return_values_audition_id();
          $this->ajax_return_values_course_id();
          $this->ajax_return_values_firstname();
          $this->ajax_return_values_lastname();
          $this->ajax_return_values_nationality();
          $this->ajax_return_values_dateofbirth();
          $this->ajax_return_values_gender();
          $this->ajax_return_values_resident();
          $this->ajax_return_values_email();
          $this->ajax_return_values_password();
          $this->ajax_return_values_confirm_password();
          $this->ajax_return_values_accept_tnc();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['login']['keyVal'] = application_form_pack_protect_string($this->nmgp_dados_form['login']);
          }
   } // ajax_return_values

          //----- venue_id
   function ajax_return_values_venue_id($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("venue_id", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->venue_id);
              $aLookup = array();
              $this->_tmp_lookup_venue_id = $this->venue_id;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_venue_id']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_venue_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_venue_id']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_venue_id'] = array(); 
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
              $aLookup[] = array(application_form_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', application_form_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_venue_id'][] = $rs->fields[0];
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
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"venue_id\"";
          if (isset($this->NM_ajax_info['select_html']['venue_id']) && !empty($this->NM_ajax_info['select_html']['venue_id']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['venue_id'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->venue_id == $sValue)
                  {
                      $this->_tmp_lookup_venue_id = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['venue_id'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['venue_id']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['venue_id']['valList'][$i] = application_form_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['venue_id']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['venue_id']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['venue_id']['labList'] = $aLabel;
          }
   }

          //----- audition_id
   function ajax_return_values_audition_id($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("audition_id", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->audition_id);
              $aLookup = array();
              $this->_tmp_lookup_audition_id = $this->audition_id;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_audition_id']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_audition_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_audition_id']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_audition_id'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

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
              $aLookup[] = array(application_form_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', application_form_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_audition_id'][] = $rs->fields[0];
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
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"audition_id\"";
          if (isset($this->NM_ajax_info['select_html']['audition_id']) && !empty($this->NM_ajax_info['select_html']['audition_id']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['audition_id'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->audition_id == $sValue)
                  {
                      $this->_tmp_lookup_audition_id = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['audition_id'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['audition_id']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['audition_id']['valList'][$i] = application_form_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['audition_id']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['audition_id']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['audition_id']['labList'] = $aLabel;
          }
   }

          //----- course_id
   function ajax_return_values_course_id($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("course_id", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->course_id);
              $aLookup = array();
              $this->_tmp_lookup_course_id = $this->course_id;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_course_id']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_course_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_course_id']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_course_id'] = array(); 
}
$aLookup[] = array(application_form_pack_protect_string('') => application_form_pack_protect_string(' '));
$_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_course_id'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

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
              $aLookup[] = array(application_form_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', application_form_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_course_id'][] = $rs->fields[0];
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
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"course_id\"";
          if (isset($this->NM_ajax_info['select_html']['course_id']) && !empty($this->NM_ajax_info['select_html']['course_id']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['course_id'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->course_id == $sValue)
                  {
                      $this->_tmp_lookup_course_id = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['course_id'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['course_id']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['course_id']['valList'][$i] = application_form_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['course_id']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['course_id']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['course_id']['labList'] = $aLabel;
          }
   }

          //----- firstname
   function ajax_return_values_firstname($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("firstname", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->firstname);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['firstname'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- lastname
   function ajax_return_values_lastname($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("lastname", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->lastname);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['lastname'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- nationality
   function ajax_return_values_nationality($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nationality", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nationality);
              $aLookup = array();
              $this->_tmp_lookup_nationality = $this->nationality;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_nationality']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_nationality'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_nationality']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_nationality'] = array(); 
}
$aLookup[] = array(application_form_pack_protect_string('') => application_form_pack_protect_string(' '));
$_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_nationality'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

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
              $aLookup[] = array(application_form_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', application_form_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_nationality'][] = $rs->fields[0];
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
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"nationality\"";
          if (isset($this->NM_ajax_info['select_html']['nationality']) && !empty($this->NM_ajax_info['select_html']['nationality']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['nationality'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->nationality == $sValue)
                  {
                      $this->_tmp_lookup_nationality = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['nationality'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['nationality']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['nationality']['valList'][$i] = application_form_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['nationality']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['nationality']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['nationality']['labList'] = $aLabel;
          }
   }

          //----- dateofbirth
   function ajax_return_values_dateofbirth($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dateofbirth", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->dateofbirth);
              $aLookup = array();
          $old_dateofbirth = $this->dateofbirth;
          nmgp_Form_Datas($this->dateofbirth, $this->field_config['dateofbirth']['date_format'], $this->field_config['dateofbirth']['date_sep']);

          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['dateofbirth'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );

          $this->dateofbirth = $old_dateofbirth;

          $s_date_info_pos  = strtolower(str_replace('aaaa', 'yyyy', $this->field_config['dateofbirth']['date_format']));
          $i_date_pos_day   = strpos($s_date_info_pos, 'dd');
          $i_date_pos_month = strpos($s_date_info_pos, 'mm');
          $i_date_pos_year  = strpos($s_date_info_pos, 'yyyy');
          $old_dateofbirth = $this->dateofbirth;
          nmgp_Form_Datas($this->dateofbirth, $this->field_config['dateofbirth']['date_format'], $this->field_config['dateofbirth']['date_sep']);

          $this->dateofbirth_dia = substr($this->dateofbirth, $i_date_pos_day, 2);
          $this->NM_ajax_info['fldList']['dateofbirth_dia'] = array(
               'type'    => 'text',
               'valList' => array($this->dateofbirth_dia),
               );
          $this->dateofbirth_mes = substr($this->dateofbirth, $i_date_pos_month, 2);
          $this->NM_ajax_info['fldList']['dateofbirth_mes'] = array(
               'type'    => 'text',
               'valList' => array($this->dateofbirth_mes),
               );
          $this->dateofbirth_ano = substr($this->dateofbirth, $i_date_pos_year, 4);
          $this->NM_ajax_info['fldList']['dateofbirth_ano'] = array(
               'type'    => 'text',
               'valList' => array($this->dateofbirth_ano),
               );

          $this->dateofbirth = $old_dateofbirth;
          }
   }

          //----- gender
   function ajax_return_values_gender($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("gender", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->gender);
              $aLookup = array();
              $this->_tmp_lookup_gender = $this->gender;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_gender']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_gender'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_gender']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_gender'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

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
              $aLookup[] = array(application_form_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', application_form_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_gender'][] = $rs->fields[0];
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
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['gender']) && !empty($this->NM_ajax_info['select_html']['gender']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['gender'];
          }
          $this->NM_ajax_info['fldList']['gender'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => true,
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
               'colNum'  => 1,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['gender']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['gender']['valList'][$i] = application_form_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['gender']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['gender']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['gender']['labList'] = $aLabel;
          }
   }

          //----- resident
   function ajax_return_values_resident($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("resident", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->resident);
              $aLookup = array();
              $this->_tmp_lookup_resident = $this->resident;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_resident']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_resident'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_resident']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_resident'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

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
              $aLookup[] = array(application_form_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', application_form_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_resident'][] = $rs->fields[0];
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
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['resident']) && !empty($this->NM_ajax_info['select_html']['resident']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['resident'];
          }
          $this->NM_ajax_info['fldList']['resident'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => true,
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
               'colNum'  => 1,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['resident']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['resident']['valList'][$i] = application_form_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['resident']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['resident']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['resident']['labList'] = $aLabel;
          }
   }

          //----- email
   function ajax_return_values_email($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("email", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->email);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['email'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- password
   function ajax_return_values_password($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("password", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->password);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['password'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array(''),
              );
          }
   }

          //----- confirm_password
   function ajax_return_values_confirm_password($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("confirm_password", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->confirm_password);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['confirm_password'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array(''),
              );
          }
   }

          //----- accept_tnc
   function ajax_return_values_accept_tnc($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("accept_tnc", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->accept_tnc);
              $aLookup = array();
              $this->_tmp_lookup_accept_tnc = $this->accept_tnc;

$aLookup[] = array(application_form_pack_protect_string('Yes') => application_form_pack_protect_string("I agree"));
$_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_accept_tnc'][] = 'Yes';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['accept_tnc']) && !empty($this->NM_ajax_info['select_html']['accept_tnc']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['accept_tnc'];
          }
          $this->NM_ajax_info['fldList']['accept_tnc'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-accept_tnc',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['accept_tnc']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['accept_tnc']['valList'][$i] = application_form_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['accept_tnc']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['accept_tnc']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['accept_tnc']['labList'] = $aLabel;
          }
   }

    function fetchUniqueUploadName($originalName, $uploadDir, $fieldName)
    {
        $originalName = trim($originalName);
        if ('' == $originalName)
        {
            return $originalName;
        }
        if (!@is_dir($uploadDir))
        {
            return $originalName;
        }
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['upload_dir'][$fieldName][] = $newName;
            return $newName;
        }
    } // fetchUniqueUploadName

    function fetchFileNextName($uniqueName, $uniqueList)
    {
        $aPathinfo     = pathinfo($uniqueName);
        $fileExtension = $aPathinfo['extension'];
        $fileName      = $aPathinfo['filename'];
        $foundName     = false;
        $nameIt        = 1;
        if ('' != $fileExtension)
        {
            $fileExtension = '.' . $fileExtension;
        }
        while (!$foundName)
        {
            $testName = $fileName . '(' . $nameIt . ')' . $fileExtension;
            if (in_array($testName, $uniqueList))
            {
                $nameIt++;
            }
            else
            {
                $foundName = true;
                return $testName;
            }
        }
    } // fetchFileNextName

   function ajax_add_parameters()
   {
   } // ajax_add_parameters
  function nm_proc_onload($bFormat = true)
  {
      if ($this->sc_evento == "novo" || $this->sc_evento == "incluir" || ($this->nmgp_opcao == "nada" && isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['opc_ant']) && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['opc_ant'] == "novo") || (isset($GLOBALS['erro_incl']) && 1 == $GLOBALS['erro_incl']))
      {
      }
      else
      {
          if (!isset($this->nmgp_cmp_hidden["email"]))
          {
              $this->nmgp_cmp_hidden["email"] = "off"; $this->NM_ajax_info['fieldDisplay']['email'] = 'off';
          }
          if (!isset($this->nmgp_cmp_hidden["venue_id"]))
          {
              $this->nmgp_cmp_hidden["venue_id"] = "off"; $this->NM_ajax_info['fieldDisplay']['venue_id'] = 'off';
          }
          if (!isset($this->nmgp_cmp_hidden["audition_id"]))
          {
              $this->nmgp_cmp_hidden["audition_id"] = "off"; $this->NM_ajax_info['fieldDisplay']['audition_id'] = 'off';
          }
          if (!isset($this->nmgp_cmp_hidden["course_id"]))
          {
              $this->nmgp_cmp_hidden["course_id"] = "off"; $this->NM_ajax_info['fieldDisplay']['course_id'] = 'off';
          }
          if (!isset($this->nmgp_cmp_hidden["password"]))
          {
              $this->nmgp_cmp_hidden["password"] = "off"; $this->NM_ajax_info['fieldDisplay']['password'] = 'off';
          }
          if (!isset($this->nmgp_cmp_hidden["confirm_password"]))
          {
              $this->nmgp_cmp_hidden["confirm_password"] = "off"; $this->NM_ajax_info['fieldDisplay']['confirm_password'] = 'off';
          }
          if (!isset($this->nmgp_cmp_hidden["accept_tnc"]))
          {
              $this->nmgp_cmp_hidden["accept_tnc"] = "off"; $this->NM_ajax_info['fieldDisplay']['accept_tnc'] = 'off';
          }
      }
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['scriptcase']['application_form']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_audition_id = $this->audition_id;
    $original_venue_id = $this->venue_id;
}
if (!isset($this->sc_temp_auid)) {$this->sc_temp_auid = (isset($_SESSION['auid'])) ? $_SESSION['auid'] : "";}
if (!isset($this->sc_temp_vid)) {$this->sc_temp_vid = (isset($_SESSION['vid'])) ? $_SESSION['vid'] : "";}
  $this->venue_id  = $this->sc_temp_vid;
$this->audition_id  = $this->sc_temp_auid;
$sc_tmp_field_name = 'accept_tnc';
$this->NM_ajax_info['fieldLabel'][$sc_tmp_field_name] = $this->nm_new_label[$sc_tmp_field_name] = 'By choosing to complete your application, you are confirming that you the applicant:  <ul><li>meet the SPAA <a href="#">Entry Requirements</a></li> <li>have read and agree to the SPAA <a href="#">Terms &amp; Conditions</a></li></ul> Prior to proceeding, please ensure that you have also read the SPAA <a href="#">Audition Guidelines</a>.<p></p>';
if (isset($this->sc_temp_vid)) { $_SESSION['vid'] = $this->sc_temp_vid;}
if (isset($this->sc_temp_auid)) { $_SESSION['auid'] = $this->sc_temp_auid;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_audition_id != $this->audition_id || (isset($bFlagRead_audition_id) && $bFlagRead_audition_id)))
    {
        $this->ajax_return_values_audition_id(true);
    }
    if (($original_venue_id != $this->venue_id || (isset($bFlagRead_venue_id) && $bFlagRead_venue_id)))
    {
        $this->ajax_return_values_venue_id(true);
    }
}
$_SESSION['scriptcase']['application_form']['contr_erro'] = 'off'; 
      }
      if (empty($this->submitted))
      {
          $this->submitted_hora = $this->submitted;
      }
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//----------- 

   function controle_navegacao()
   {
      global $sc_where;

          if (false && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['total']))
          {
               $sc_where_pos = " WHERE ((login < '" . substr($this->Db->qstr($this->login), 1, -1) . "'))";
               if ('' != $sc_where)
               {
                   if ('where ' == strtolower(substr(trim($sc_where), 0, 6)))
                   {
                       $sc_where = substr(trim($sc_where), 6);
                   }
                   if ('and ' == strtolower(substr(trim($sc_where), 0, 4)))
                   {
                       $sc_where = substr(trim($sc_where), 4);
                   }
                   $sc_where_pos .= ' AND (' . $sc_where . ')';
                   $sc_where = ' WHERE ' . $sc_where;
               }
               $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where;
               $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
               $rsc = $this->Db->Execute($nmgp_sel_count); 
               if ($rsc === false && !$rsc->EOF)  
               { 
                   $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                   exit; 
               }  
               $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['total'] = $rsc->fields[0];
               $rsc->Close(); 
               $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where_pos;
               $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
               $rsc = $this->Db->Execute($nmgp_sel_count); 
               if ($rsc === false && !$rsc->EOF)  
               { 
                   $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                   exit; 
               }  
               $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['inicio'] = $rsc->fields[0];
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['inicio'] < 0)
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['inicio'] = 0;
               }
               $rsc->Close(); 
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['qt_reg_grid'] = 1;
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['inicio']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['inicio'] = 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['final']  = 0;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['opcao'] = $this->NM_ajax_info['param']['nmgp_opcao'];
          if (in_array($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['opcao'], array('incluir', 'alterar', 'excluir')))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['opcao'] = '';
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['opcao'] == 'inicio')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['inicio'] = 0;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['opcao'] == 'retorna')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['inicio'] = 0 ;
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['opcao'] == 'avanca' && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['total']) || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['total'] > $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['final']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['final'];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['opcao'] == 'final')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['total'] - $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['inicio'] = 0;
              }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['final'] = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['inicio'] + $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['qt_reg_grid'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['final'];
          $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['opcao'] = '';

   }

   function temRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       if ($rsc === false && !$rsc->EOF)
       {
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
           exit; 
       }
       $iTotal = $rsc->fields[0];
       $rsc->Close();
       return 0 < $iTotal;
   } // temRegistros

   function deletaRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'DELETE FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       $bResult = $rsc;
       $rsc->Close();
       return $bResult == true;
   } // deletaRegistros

   function nm_acessa_banco() 
   { 
      global  $nm_form_submit, $teste_validade, $sc_where;
 
      $NM_val_null = array();
      $NM_val_form = array();
      $this->sc_erro_insert = "";
      $this->sc_erro_update = "";
      $this->sc_erro_delete = "";
      $this->SC_log_atv = false;
      if ("alterar" == $this->nmgp_opcao || "excluir" == $this->nmgp_opcao)
      {
          $this->NM_gera_log_key($this->nmgp_opcao);
      }
      if ("alterar" == $this->nmgp_opcao || "excluir" == $this->nmgp_opcao)
      {
          $this->NM_gera_log_old();
      }
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
    if ("incluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['application_form']['contr_erro'] = 'on';
  $this->login  = $this->randomString(16);

$_SESSION['scriptcase']['application_form']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
          $this->Campos_Mens_erro = ""; 
          $this->nmgp_opc_ant = $this->nmgp_opcao ; 
          if ($this->nmgp_opcao == "incluir") 
          { 
              $GLOBALS["erro_incl"] = 1; 
          }
          else
          { 
              $this->sc_evento = ""; 
          }
          if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "excluir") 
          {
              $this->nmgp_opcao = "nada"; 
          } 
          $this->NM_rollback_db(); 
          $this->Campos_Mens_erro = ""; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $salva_opcao = $this->nmgp_opcao; 
      if ($this->sc_evento != "novo" && $this->sc_evento != "incluir") 
      { 
          $this->sc_evento = ""; 
      } 
      if (!in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) && !$this->Ini->sc_tem_trans_banco && in_array($this->nmgp_opcao, array('excluir', 'incluir', 'alterar')))
      { 
          $this->Ini->sc_tem_trans_banco = $this->Db->BeginTrans(); 
      } 
      $NM_val_form['venue_id'] = $this->venue_id;
      $NM_val_form['audition_id'] = $this->audition_id;
      $NM_val_form['course_id'] = $this->course_id;
      $NM_val_form['firstname'] = $this->firstname;
      $NM_val_form['lastname'] = $this->lastname;
      $NM_val_form['nationality'] = $this->nationality;
      $NM_val_form['dateofbirth'] = $this->dateofbirth;
      $NM_val_form['gender'] = $this->gender;
      $NM_val_form['resident'] = $this->resident;
      $NM_val_form['email'] = $this->email;
      $NM_val_form['password'] = $this->password;
      $NM_val_form['confirm_password'] = $this->confirm_password;
      $NM_val_form['accept_tnc'] = $this->accept_tnc;
      $NM_val_form['login'] = $this->login;
      $NM_val_form['middlename'] = $this->middlename;
      $NM_val_form['status'] = $this->status;
      $NM_val_form['submitted'] = $this->submitted;
      $NM_val_form['email1'] = $this->email1;
      if ($this->nationality === "")  
      { 
          $this->nationality = 0;
          $this->sc_force_zero[] = 'nationality';
      } 
      if ($this->resident === "")  
      { 
          $this->resident = 0;
          $this->sc_force_zero[] = 'resident';
      } 
      if ($this->status === "")  
      { 
          $this->status = 0;
          $this->sc_force_zero[] = 'status';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      }
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_ibase, $this->Ini->nm_bases_mysql);
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->login_before_qstr = $this->login;
          $this->login = substr($this->Db->qstr($this->login), 1, -1); 
          if ($this->login == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->login = "null"; 
              $NM_val_null[] = "login";
          } 
          $this->firstname_before_qstr = $this->firstname;
          $this->firstname = substr($this->Db->qstr($this->firstname), 1, -1); 
          if ($this->firstname == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->firstname = "null"; 
              $NM_val_null[] = "firstname";
          } 
          $this->lastname_before_qstr = $this->lastname;
          $this->lastname = substr($this->Db->qstr($this->lastname), 1, -1); 
          if ($this->lastname == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->lastname = "null"; 
              $NM_val_null[] = "lastname";
          } 
          $this->middlename_before_qstr = $this->middlename;
          $this->middlename = substr($this->Db->qstr($this->middlename), 1, -1); 
          if ($this->middlename == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->middlename = "null"; 
              $NM_val_null[] = "middlename";
          } 
          if ($this->dateofbirth == "")  
          { 
              $this->dateofbirth = "null"; 
              $NM_val_null[] = "dateofbirth";
          } 
          $this->gender_before_qstr = $this->gender;
          $this->gender = substr($this->Db->qstr($this->gender), 1, -1); 
          if ($this->gender == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->gender = "null"; 
              $NM_val_null[] = "gender";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->submitted == "")  
              { 
                  $this->submitted = "null"; 
                  $NM_val_null[] = "submitted";
              } 
          }
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where login = '$this->login' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where login = '$this->login' "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where login = '$this->login' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where login = '$this->login' "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 application_form_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $bUpdateOk = false;
              $this->sc_evento = 'update';
          } 
          $aUpdateOk = array();
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "firstname = '$this->firstname', lastname = '$this->lastname', nationality = $this->nationality, dateofbirth = #$this->dateofbirth#, gender = '$this->gender', resident = $this->resident"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "firstname = '$this->firstname', lastname = '$this->lastname', nationality = $this->nationality, dateofbirth = " . $this->Ini->date_delim . $this->dateofbirth . $this->Ini->date_delim1 . ", gender = '$this->gender', resident = $this->resident"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "firstname = '$this->firstname', lastname = '$this->lastname', nationality = $this->nationality, dateofbirth = " . $this->Ini->date_delim . $this->dateofbirth . $this->Ini->date_delim1 . ", gender = '$this->gender', resident = $this->resident"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "firstname = '$this->firstname', lastname = '$this->lastname', nationality = $this->nationality, dateofbirth = " . $this->Ini->date_delim . $this->dateofbirth . $this->Ini->date_delim1 . ", gender = '$this->gender', resident = $this->resident"; 
              } 
              if (isset($NM_val_form['middlename']) && $NM_val_form['middlename'] != $this->nmgp_dados_select['middlename']) 
              { 
                  $SC_fields_update[] = "middlename = '$this->middlename'"; 
              } 
              if (isset($NM_val_form['status']) && $NM_val_form['status'] != $this->nmgp_dados_select['status']) 
              { 
                  $SC_fields_update[] = "status = $this->status"; 
              } 
              if (isset($NM_val_form['submitted']) && $NM_val_form['submitted'] != $this->nmgp_dados_select['submitted']) 
              { 
                  $SC_fields_update[] = "submitted = '$this->submitted'"; 
              } 
              $aDoNotUpdate = array();
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE login = '$this->login' ";  
              }  
              else  
              {
                  $comando .= " WHERE login = '$this->login' ";  
              }  
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              $useUpdateProcedure = false;
              if (!empty($SC_fields_update) || $useUpdateProcedure)
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
                  $rs = $this->Db->Execute($comando);  
                  if ($rs === false) 
                  { 
                      if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                      {
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $this->Db->ErrorMsg(), true); 
                          if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                          { 
                              $this->sc_erro_update = $this->Db->ErrorMsg();  
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  application_form_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
          $this->login = $this->login_before_qstr;
          $this->firstname = $this->firstname_before_qstr;
          $this->lastname = $this->lastname_before_qstr;
          $this->middlename = $this->middlename_before_qstr;
          $this->gender = $this->gender_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
              $this->NM_gera_log_new();
              $this->NM_gera_log_compress();

              $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['db_changed'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['firstname'])) { $this->firstname = $NM_val_form['firstname']; }
              elseif (isset($this->firstname)) { $this->nm_limpa_alfa($this->firstname); }
              if     (isset($NM_val_form) && isset($NM_val_form['lastname'])) { $this->lastname = $NM_val_form['lastname']; }
              elseif (isset($this->lastname)) { $this->nm_limpa_alfa($this->lastname); }
              if     (isset($NM_val_form) && isset($NM_val_form['nationality'])) { $this->nationality = $NM_val_form['nationality']; }
              elseif (isset($this->nationality)) { $this->nm_limpa_alfa($this->nationality); }
              if     (isset($NM_val_form) && isset($NM_val_form['gender'])) { $this->gender = $NM_val_form['gender']; }
              elseif (isset($this->gender)) { $this->nm_limpa_alfa($this->gender); }
              if     (isset($NM_val_form) && isset($NM_val_form['resident'])) { $this->resident = $NM_val_form['resident']; }
              elseif (isset($this->resident)) { $this->nm_limpa_alfa($this->resident); }

              $this->nm_formatar_campos();

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('venue_id', 'audition_id', 'course_id', 'firstname', 'lastname', 'nationality', 'dateofbirth', 'gender', 'resident', 'email', 'password', 'confirm_password', 'accept_tnc'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
              $this->nm_converte_datas();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          $bInsertOk = true;
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where login = '$this->login' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where login = '$this->login' "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where login = '$this->login' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where login = '$this->login' "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 0) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_pkey']); 
              $this->nmgp_opcao = "nada"; 
              $GLOBALS["erro_incl"] = 1; 
              $bInsertOk = false;
              $this->sc_evento = 'insert';
          } 
          $rs1->Close(); 
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      application_form_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->submitted != "")
                  { 
                       $compl_insert     .= ", submitted";
                       $compl_insert_val .= ", '$this->submitted'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (login, firstname, lastname, middlename, nationality, dateofbirth, gender, resident, status $compl_insert) VALUES ('$this->login', '$this->firstname', '$this->lastname', '$this->middlename', $this->nationality, #$this->dateofbirth#, '$this->gender', $this->resident, $this->status $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->submitted != "")
                  { 
                       $compl_insert     .= ", submitted";
                       $compl_insert_val .= ", '$this->submitted'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "login, firstname, lastname, middlename, nationality, dateofbirth, gender, resident, status $compl_insert) VALUES (" . $NM_seq_auto . "'$this->login', '$this->firstname', '$this->lastname', '$this->middlename', $this->nationality, " . $this->Ini->date_delim . $this->dateofbirth . $this->Ini->date_delim1 . ", '$this->gender', $this->resident, $this->status $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->submitted != "")
                  { 
                       $compl_insert     .= ", submitted";
                       $compl_insert_val .= ", '$this->submitted'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "login, firstname, lastname, middlename, nationality, dateofbirth, gender, resident, status $compl_insert) VALUES (" . $NM_seq_auto . "'$this->login', '$this->firstname', '$this->lastname', '$this->middlename', $this->nationality, " . $this->Ini->date_delim . $this->dateofbirth . $this->Ini->date_delim1 . ", '$this->gender', $this->resident, $this->status $compl_insert_val)"; 
              }
              else
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->submitted != "")
                  { 
                       $compl_insert     .= ", submitted";
                       $compl_insert_val .= ", '$this->submitted'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "login, firstname, lastname, middlename, nationality, dateofbirth, gender, resident, status $compl_insert) VALUES (" . $NM_seq_auto . "'$this->login', '$this->firstname', '$this->lastname', '$this->middlename', $this->nationality, " . $this->Ini->date_delim . $this->dateofbirth . $this->Ini->date_delim1 . ", '$this->gender', $this->resident, $this->status $compl_insert_val)"; 
              }
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
              $rs = $this->Db->Execute($comando); 
              if ($rs === false)  
              { 
                  if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                  {
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg(), true); 
                      if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                      { 
                          $this->sc_erro_insert = $this->Db->ErrorMsg();  
                          $this->nmgp_opcao     = 'refresh_insert';
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              application_form_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['total']);
              }

              $this->sc_evento = "insert"; 
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              $this->NM_gera_log_key("incluir");
              $this->NM_gera_log_new();
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->login = substr($this->Db->qstr($this->login), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where login = '$this->login'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where login = '$this->login' "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where login = '$this->login'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where login = '$this->login' "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_dele_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where login = '$this->login' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where login = '$this->login' "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where login = '$this->login' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where login = '$this->login' "); 
              }  
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          application_form_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              if (empty($this->sc_erro_delete)) {
                  $this->record_delete_ok = true;
              }
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;

              $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['total']);
              }

              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
          }

          }
          else
          {
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "igual"; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sMsgErro); 
          }

      }  
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      if (!empty($NM_val_null))
      {
          foreach ($NM_val_null as $i_val_null => $sc_val_null_field)
          {
              eval('$this->' . $sc_val_null_field . ' = "";');
          }
      }
    if ("insert" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        if ($this->SC_log_atv)
        {
            $this->NM_gera_log_output();
        }
        $_SESSION['scriptcase']['application_form']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_audition_id = $this->audition_id;
    $original_course_id = $this->course_id;
    $original_email = $this->email;
    $original_firstname = $this->firstname;
    $original_lastname = $this->lastname;
    $original_password = $this->password;
    $original_venue_id = $this->venue_id;
}
  $sid = $this->login ;
$salt = 'Iamsalt';
$pswd = $this->password ;
$this->firstname = $this->firstname ;
$this->lastname = $this->lastname ;
$this->email = $this->email ;
$this->password = md5(md5($salt).md5($pswd));
$venue = $this->venue_id ;
$audition = $this->audition_id ;
$program = $this->course_id ;

$this->createuser($sid, $this->firstname, $this->lastname, $this->email, $this->password);
$this->creategroup($sid);
$this->createapplication($sid, $venue, $audition, $program);

$this->send_mail_to_new_user();

if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}


 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('email_verify_account') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_audition_id != $this->audition_id || (isset($bFlagRead_audition_id) && $bFlagRead_audition_id)))
    {
        $this->ajax_return_values_audition_id(true);
    }
    if (($original_course_id != $this->course_id || (isset($bFlagRead_course_id) && $bFlagRead_course_id)))
    {
        $this->ajax_return_values_course_id(true);
    }
    if (($original_email != $this->email || (isset($bFlagRead_email) && $bFlagRead_email)))
    {
        $this->ajax_return_values_email(true);
    }
    if (($original_firstname != $this->firstname || (isset($bFlagRead_firstname) && $bFlagRead_firstname)))
    {
        $this->ajax_return_values_firstname(true);
    }
    if (($original_lastname != $this->lastname || (isset($bFlagRead_lastname) && $bFlagRead_lastname)))
    {
        $this->ajax_return_values_lastname(true);
    }
    if (($original_password != $this->password || (isset($bFlagRead_password) && $bFlagRead_password)))
    {
        $this->ajax_return_values_password(true);
    }
    if (($original_venue_id != $this->venue_id || (isset($bFlagRead_venue_id) && $bFlagRead_venue_id)))
    {
        $this->ajax_return_values_venue_id(true);
    }
}
$_SESSION['scriptcase']['application_form']['contr_erro'] = 'off'; 
    }
    if ("update" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        $_SESSION['scriptcase']['application_form']['contr_erro'] = 'on';
  

$_SESSION['scriptcase']['application_form']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
          $this->Campos_Mens_erro = ""; 
          $this->nmgp_opc_ant = $salva_opcao ; 
          if ($salva_opcao == "incluir") 
          { 
              $GLOBALS["erro_incl"] = 1; 
          }
          if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "excluir") 
          {
              $this->nmgp_opcao = "nada"; 
          } 
          $this->sc_evento = ""; 
          $this->NM_rollback_db(); 
          return; 
      }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['parms'] = "login?#?$this->login?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->login = substr($this->Db->qstr($this->login), 1, -1); 
      } 
      if ($this->nmgp_opcao != "nada") 
      {
          $this->nmgp_opcao = "novo"; 
      }
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['where_filter'] . ")";
          }
      }
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "inicio")
      { 
          $this->nmgp_opcao = "igual"; 
      } 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT login, firstname, lastname, middlename, nationality, str_replace (convert(char(10),dateofbirth,102), '.', '-') + ' ' + convert(char(8),dateofbirth,20), gender, resident, status, submitted from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT login, firstname, lastname, middlename, nationality, dateofbirth, gender, resident, status, submitted from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "login = '$this->login'"; 
              }  
              else  
              {
                  $aWhere[] = "login = '$this->login'"; 
              }  
              if (!empty($sc_where_filter))  
              {
                  $teste_select = $nmgp_select . $this->returnWhere($aWhere);
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $teste_select; 
                  $rs = $this->Db->Execute($teste_select); 
                  if ($rs->EOF)
                  {
                     $aWhere = array($sc_where_filter);
                  }  
                  $rs->Close(); 
              }  
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "login";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['select'] = ""; 
              } 
          } 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rs = $this->Db->Execute($nmgp_select) ; 
          if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs->EOF) 
          { 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['empty_filter'] = true;
                  return; 
              }
              if ($this->nmgp_botoes['insert'] != "on")
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
              }
              $this->nmgp_opcao = "novo"; 
              $this->nm_flag_saida_novo = "S"; 
              $rs->Close(); 
              if ($this->aba_iframe)
              {
                  $this->NM_ajax_info['buttonDisplay']['exit'] = $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd_extr']); 
              $this->nmgp_opcao = "novo"; 
          }  
          if ($this->nmgp_opcao != "novo") 
          { 
              $this->login = $rs->fields[0] ; 
              $this->nmgp_dados_select['login'] = $this->login;
              $this->firstname = $rs->fields[1] ; 
              $this->nmgp_dados_select['firstname'] = $this->firstname;
              $this->lastname = $rs->fields[2] ; 
              $this->nmgp_dados_select['lastname'] = $this->lastname;
              $this->middlename = $rs->fields[3] ; 
              $this->nmgp_dados_select['middlename'] = $this->middlename;
              $this->nationality = $rs->fields[4] ; 
              $this->nmgp_dados_select['nationality'] = $this->nationality;
              $this->dateofbirth = $rs->fields[5] ; 
              $this->nmgp_dados_select['dateofbirth'] = $this->dateofbirth;
              $this->gender = $rs->fields[6] ; 
              $this->nmgp_dados_select['gender'] = $this->gender;
              $this->resident = $rs->fields[7] ; 
              $this->nmgp_dados_select['resident'] = $this->resident;
              $this->status = $rs->fields[8] ; 
              $this->nmgp_dados_select['status'] = $this->status;
              $this->submitted = $rs->fields[9] ; 
              if (substr($this->submitted, 10, 1) == "-") 
              { 
                 $this->submitted = substr($this->submitted, 0, 10) . " " . substr($this->submitted, 11);
              } 
              if (substr($this->submitted, 13, 1) == ".") 
              { 
                 $this->submitted = substr($this->submitted, 0, 13) . ":" . substr($this->submitted, 14, 2) . ":" . substr($this->submitted, 17);
              } 
              $this->nmgp_dados_select['submitted'] = $this->submitted;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nationality = (string)$this->nationality; 
              $this->resident = (string)$this->resident; 
              $this->status = (string)$this->status; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['parms'] = "login?#?$this->login?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->controle_navegacao();
          }
      } 
      if ($this->nmgp_opcao == "novo" || $this->nmgp_opcao == "refresh_insert") 
      { 
          $this->sc_evento_old = $this->sc_evento;
          $this->sc_evento = "novo";
          if ('refresh_insert' == $this->nmgp_opcao)
          {
              $this->nmgp_opcao = 'novo';
          }
          else
          {
              $this->nm_formatar_campos();
              $this->login = "";  
              $this->nmgp_dados_form["login"] = $this->login;
              $this->firstname = "";  
              $this->nmgp_dados_form["firstname"] = $this->firstname;
              $this->lastname = "";  
              $this->nmgp_dados_form["lastname"] = $this->lastname;
              $this->middlename = "";  
              $this->nmgp_dados_form["middlename"] = $this->middlename;
              $this->nationality = "";  
              $this->nmgp_dados_form["nationality"] = $this->nationality;
              $this->dateofbirth = "";  
              $this->dateofbirth_hora = "" ;  
              $this->nmgp_dados_form["dateofbirth"] = $this->dateofbirth;
              $this->gender = "";  
              $this->nmgp_dados_form["gender"] = $this->gender;
              $this->resident = "";  
              $this->nmgp_dados_form["resident"] = $this->resident;
              $this->status = "";  
              $this->nmgp_dados_form["status"] = $this->status;
              $this->submitted = "";  
              $this->submitted_hora = "" ;  
              $this->nmgp_dados_form["submitted"] = $this->submitted;
              $this->email = "";  
              $this->nmgp_dados_form["email"] = $this->email;
              $this->venue_id = "";  
              $this->nmgp_dados_form["venue_id"] = $this->venue_id;
              $this->audition_id = "";  
              $this->nmgp_dados_form["audition_id"] = $this->audition_id;
              $this->course_id = "";  
              $this->nmgp_dados_form["course_id"] = $this->course_id;
              $this->email1 = "";  
              $this->nmgp_dados_form["email1"] = $this->email1;
              $this->password = "";  
              $this->nmgp_dados_form["password"] = $this->password;
              $this->confirm_password = "";  
              $this->nmgp_dados_form["confirm_password"] = $this->confirm_password;
              $this->accept_tnc = "";  
              $this->nmgp_dados_form["accept_tnc"] = $this->accept_tnc;
              $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
      }  
//
//
//-- 
      if ($this->nmgp_opcao != "novo") 
      {
      }
      if (!isset($this->nmgp_refresh_fields)) 
      { 
          $this->nm_proc_onload();
      }
  }
// 
   function NM_gera_log_key($evt) 
   {
       $this->SC_log_arr = array();
       $this->SC_log_atv = true;
       if ($evt == "incluir")
       {
           $this->SC_log_evt = "insert";
       }
       if ($evt == "alterar")
       {
           $this->SC_log_evt = "update";
       }
       if ($evt == "excluir")
       {
           $this->SC_log_evt = "delete";
       }
       $this->SC_log_arr['keys']['login'] =  $this->login;
   }
// 
   function NM_gera_log_old() 
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['dados_select']))
       {
           $nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['dados_select'];
           $this->SC_log_arr['fields']['firstname']['0'] =  $nmgp_dados_select['firstname'];
           $this->SC_log_arr['fields']['lastname']['0'] =  $nmgp_dados_select['lastname'];
           $this->SC_log_arr['fields']['middlename']['0'] =  $nmgp_dados_select['middlename'];
           $this->SC_log_arr['fields']['nationality']['0'] =  $nmgp_dados_select['nationality'];
           $this->SC_log_arr['fields']['dateofbirth']['0'] =  $nmgp_dados_select['dateofbirth'];
           $this->SC_log_arr['fields']['gender']['0'] =  $nmgp_dados_select['gender'];
           $this->SC_log_arr['fields']['resident']['0'] =  $nmgp_dados_select['resident'];
           $this->SC_log_arr['fields']['status']['0'] =  $nmgp_dados_select['status'];
           $this->SC_log_arr['fields']['submitted']['0'] =  $nmgp_dados_select['submitted'];
       }
   }
// 
   function NM_gera_log_new() 
   {
       $this->SC_log_arr['fields']['firstname']['1'] =  $this->firstname;
       $this->SC_log_arr['fields']['lastname']['1'] =  $this->lastname;
       $this->SC_log_arr['fields']['middlename']['1'] =  $this->middlename;
       $this->SC_log_arr['fields']['nationality']['1'] =  $this->nationality;
       $this->SC_log_arr['fields']['dateofbirth']['1'] =  $this->dateofbirth;
       $this->SC_log_arr['fields']['gender']['1'] =  $this->gender;
       $this->SC_log_arr['fields']['resident']['1'] =  $this->resident;
       $this->SC_log_arr['fields']['status']['1'] =  $this->status;
       $this->SC_log_arr['fields']['submitted']['1'] =  $this->submitted;
   }
// 
   function NM_gera_log_compress() 
   {
       foreach ($this->SC_log_arr['fields'] as $fild => $data_f)
       {
           if ($data_f[0] == $data_f[1] || ($data_f[0] == "" && $data_f[1] == "null"))
           {
               unset($this->SC_log_arr['fields'][$fild]);
           }
       }
   }
// 
   function NM_gera_log_output() 
   {
       $Log_output = "";
       $prim_delim = "";
       foreach ($this->SC_log_arr as $type => $dats)
       {
           if ($type == "keys")
           {
               $Log_output .= "--> keys <-- ";
               foreach ($dats as $key => $data)
               {
                   $Log_output .=  $prim_delim . $key . " : " . $data;
                   $prim_delim  = "||";
               }
           }
           if ($type == "fields")
           {
               $Log_output .= $prim_delim . "--> fields <-- ";
               $prim_delim = "";
               if (empty($dats) && $this->SC_log_evt == "update")
               {
                   return;
               }
               foreach ($dats as $key => $data)
               {
                   foreach ($data as $tp => $val)
                   {
                      $tpok = ($tp == 0) ? " (old) " : " (new) ";
                      $Log_output .= $prim_delim . $key . $tpok . " : " . $val;
                      $prim_delim  = "||";
                   }
               }
           }
       }
       $this->NM_gera_log_insert("Scriptcase", $this->SC_log_evt, $Log_output);
   }
        function initializeRecordState() {
                $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function act_code()
{
$_SESSION['scriptcase']['application_form']['contr_erro'] = 'on';
  
$chars = 'abcdefghijklmnopqrstuvxywz';
$chars .= 'ABCDEFGHIJKLMNOPQRSTUVXYWZ';
$chars .= '0123456789!@$*.,;:';
$max = strlen($chars)-1;
$act_code = "new_";
for($i=0; $i < 28; $i++)
{
	$act_code .= $chars{mt_rand(0, $max)};
}

return $act_code;

$_SESSION['scriptcase']['application_form']['contr_erro'] = 'off';
}
function createapplication($login, $venue, $audition, $program)
{
$_SESSION['scriptcase']['application_form']['contr_erro'] = 'on';
  
$insert_table  = 'application_detail';      
$insert_fields = array(   
     'login' => "'$this->login'",
     'venue_id' => "'$venue'",
	 'audition_id' => "'$audition'",
     'program' => "'$program'",	
	 'payment_status' => "'Pending'",
     'free_audition' => "'No'",
	 'note' => "''",
     'register' => "'No'",
	 'stage' => "'0'",
 ); 

$insert_sql = 'INSERT INTO ' . $insert_table
    . ' ('   . implode(', ', array_keys($insert_fields))   . ')'
    . ' VALUES ('    . implode(', ', array_values($insert_fields)) . ')';


     $nm_select = $insert_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                application_form_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
$_SESSION['scriptcase']['application_form']['contr_erro'] = 'off';
}
function creategroup($login)
{
$_SESSION['scriptcase']['application_form']['contr_erro'] = 'on';
  
$insert_table  = 'sec_users_groups';      
$insert_fields = array(   
     'login' => "'$this->login'",
     'group_id' => "'2'",
	
 );

$insert_sql = 'INSERT INTO ' . $insert_table
    . ' ('   . implode(', ', array_keys($insert_fields))   . ')'
    . ' VALUES ('    . implode(', ', array_values($insert_fields)) . ')';



     $nm_select = $insert_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                application_form_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
$_SESSION['scriptcase']['application_form']['contr_erro'] = 'off';
}
function createuser($sid, $firstname, $lastname, $email, $password)
{
$_SESSION['scriptcase']['application_form']['contr_erro'] = 'on';
  
$insert_table  = 'sec_users';      
$insert_fields = array(   
     'login' => "'$sid'",
     'pswd' => "'$this->password'",
	'firstname' => "'$this->firstname'",
     'lastname' => "'$this->lastname'",
	'email' => "'$this->email'",
     'active' => "'N'",
	 'activation_code' => "'$act_code'",
	 'priv_admin' => "''",
 );


$insert_sql = 'INSERT INTO ' . $insert_table
    . ' ('   . implode(', ', array_keys($insert_fields))   . ')'
    . ' VALUES ('    . implode(', ', array_values($insert_fields)) . ')';



     $nm_select = $insert_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                application_form_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
$_SESSION['scriptcase']['application_form']['contr_erro'] = 'off';
}
function emailExists($email)
{
$_SESSION['scriptcase']['application_form']['contr_erro'] = 'on';
  
$check_sql = "SELECT count(login)"
   . " FROM sec_users"
   . " WHERE email = '" . $this->email . "'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[0][0]))     
{
   return $counter = $this->rs[0][0];
    
}
		else     
{
	return $counter = 0;
}
$_SESSION['scriptcase']['application_form']['contr_erro'] = 'off';
}
function send_mail_to_new_user()
{
$_SESSION['scriptcase']['application_form']['contr_erro'] = 'on';
  
$smtp = 'smtp';
$smtp_user = 'smtp_user';
$smtp_password = 'smtp_password';
$smtp_email = 'smtp_email';
$format = 'format';
$port = 'port';
$security = 'security';
$act_code = $this->act_code();
$update_sql = 'UPDATE sec_users'
    . ' SET activation_code = ' . $this->Db->qstr($act_code)
    . ' WHERE login = '. $this->Db->qstr($this->login );

     $nm_select = $update_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                application_form_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;

$message = "Dear ".$this->firstname .' '.$this->lastname .", <p>Thank you for registering with Sharjah Performning Arts Academy. Please follow the link below to activate your account. </p>";
$link = " <a href='http://". $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME']. "?a=" . $act_code ."'> http://".$_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME']. "?a=" . $act_code ." </a><br/><br/>";
$email_footer = "
<p>Kind regards,<br/>
 <span style='font-size: small; font-family: arial,helvetica,sans-serif;'><span style='font-size: Medium;'>Sharjah Performning Arts Academy</span></p>
<table border='0'>
    <tbody>
    <tr>
        <td><img title='LSC' src='https://www.spaa.ae/wp-content/uploads/2019/02/Untitled.png' alt='LSC logo' width='150px' height='60px' /></td>
        <td>
           
           Next to Sharjah Transport Authority</span><br /><span style='font-size: small; font-family: arial,helvetica,sans-serif;'>- Sharjah - United Arab Emirates</span><br /><span style='font-size: small; font-family: arial,helvetica,sans-serif;'>Sharjah</span></p>
            <p><br /><span style='font-size: small; font-family: arial,helvetica,sans-serif;'><em>Tel:</em> +971 6 577 0979</span><br /><span style='font-size: small; font-family: arial,helvetica,sans-serif;'><em>Enquiries:</em> application@spaa.ae</span><br /><span style='font-size: small; font-family: arial,helvetica,sans-serif;'><em>Website:</em>Website: www.spaa.ae</span></p>
        </td>
    </tr>
    </tbody>
</table>";

$mail_smtp_server 	= $this->get_smtp($smtp);       
$mail_smtp_user 	= $this->get_smtp($smtp_user);                   
$mail_smtp_pass 	= $this->get_smtp($smtp_password);	
$mail_from 			= $this->get_smtp($smtp_email); 
$mail_format      	= $this->get_smtp($format);
$mail_port 		  	= $this->get_smtp($port);
$mail_security 	  	= $this->get_smtp($security);           
$mail_to          = $this->email ;         

$mail_message     = $message . $link . $email_footer; 

$mail_subject     =  $this->Ini->Nm_lang['lang_subject_mail_new_user'] ;
                 
    include_once($this->Ini->path_third . "/swift/swift_required.php");
    $sc_mail_port     = "$mail_port";
    $sc_mail_tp_port  = "$mail_security";
    $sc_mail_tp_mens  = "$mail_format";
    $sc_mail_tp_copy  = "";
    $this->sc_mail_count = 0;
    $this->sc_mail_erro  = "";
    $this->sc_mail_ok    = true;
    if ($sc_mail_tp_port == "S" || $sc_mail_tp_port == "Y")
    {
        $sc_mail_port = (!empty($sc_mail_port)) ? $sc_mail_port : 465;
        $Con_Mail = Swift_SmtpTransport::newInstance($mail_smtp_server, $sc_mail_port, 'ssl');
    }
    elseif ($sc_mail_tp_port == "T")
    {
        $sc_mail_port = !empty($sc_mail_port) ? $sc_mail_port : 587;
        $Con_Mail = Swift_SmtpTransport::newInstance($mail_smtp_server, $sc_mail_port, 'tls');
    }
    else
    {
        $sc_mail_port = (!empty($sc_mail_port)) ? $sc_mail_port : 25;
        $Con_Mail = Swift_SmtpTransport::newInstance($mail_smtp_server, $sc_mail_port);
    }
    $Con_Mail->setUsername($mail_smtp_user);
    $Con_Mail->setpassword($mail_smtp_pass);
    $Send_Mail = Swift_Mailer::newInstance($Con_Mail);
    if ($sc_mail_tp_mens == "H")
    {
        $Mens_Mail = Swift_Message::newInstance($mail_subject);
        $Mens_Mail->setBody(SC_Mail_Image($mail_message, $Mens_Mail))->setContentType("text/html");
    }
    else
    {
        $Mens_Mail = Swift_Message::newInstance($mail_subject)->setBody($mail_message);
    }
    if (!empty($_SESSION['scriptcase']['charset']))
    {
        $Mens_Mail->setCharset($_SESSION['scriptcase']['charset']);
    }
    $Temp_mail = $mail_to;
    if (!is_array($Temp_mail))
    {
        $Temp_mail = explode(";", $mail_to);
    }
    foreach ($Temp_mail as $NM_dest)
    {
        if (!empty($NM_dest))
        {
            $Arr_addr = SC_Mail_Address($NM_dest);
            $Mens_Mail->addTo($Arr_addr[0], $Arr_addr[1]);
        }
    }
    $Arr_addr = SC_Mail_Address($mail_from);
    $Err_mail = array();
    $this->sc_mail_count = $Send_Mail->send($Mens_Mail->setFrom($Arr_addr[0], $Arr_addr[1]), $Err_mail);
    if (!empty($Err_mail))
    {
        $this->sc_mail_erro = $Err_mail;
        $this->sc_mail_ok   = false;
    }
;
if ($this->sc_mail_ok )
{
	$this->nm_mens_alert[] = "Activation code is sent to your email. <br/>Please also check in your junk mails folder if the message doesn't appeared in email folder.<br/>Thank you"; $this->nm_params_alert[] = array(); if ($this->NM_ajax_flag) { $this->sc_ajax_alert("Activation code is sent to your email. <br/>Please also check in your junk mails folder if the message doesn't appeared in email folder.<br/>Thank you"); }}
else
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->sc_mail_erro ;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_application_form' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $this->sc_mail_erro ;
 }
;
}


$this->NM_gera_log_insert("User", "Send active code",  $this->Ini->Nm_lang['lang_sended_active_code'] );
$_SESSION['scriptcase']['application_form']['contr_erro'] = 'off';
}
function randomString($length)
	{
$_SESSION['scriptcase']['application_form']['contr_erro'] = 'on';
  
		$keys = array_merge(range(0,9), range('A', 'Z'));

		$key = "";
			for($i=0; $i < $length; $i++) {
				$key .= $keys[mt_rand(0, count($keys) - 1)];
			}
		return $key;

	
$_SESSION['scriptcase']['application_form']['contr_erro'] = 'off';
}
function suid($length)
	{
$_SESSION['scriptcase']['application_form']['contr_erro'] = 'on';
  
		$keys = array_merge(range(0,9), range('A', 'Z'));

		$key = "";
			for($i=0; $i < $length; $i++) {
				$key .= $keys[mt_rand(0, count($keys) - 1)];
			}
		$uid = uniqid();
		$suid = strtoupper($uid.$key);
		return $suid;

	
$_SESSION['scriptcase']['application_form']['contr_erro'] = 'off';
}
function get_smtp($field){
$_SESSION['scriptcase']['application_form']['contr_erro'] = 'on';
  
	$check_sql = "SELECT ". $field
   . " FROM email_setup "
   . " WHERE active = 'Yes'";
   
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

		if (isset($this->rs[0][0]))     
		{
			return $field_r = $this->rs[0][0];
		}
		else     
		{
					return $field_r = '';

		}
$_SESSION['scriptcase']['application_form']['contr_erro'] = 'off';
}
function get_name($user_name)
{
$_SESSION['scriptcase']['application_form']['contr_erro'] = 'on';
  
	$check_sql = "SELECT firstname"
		. " FROM sec_users"
		. " WHERE login = '" . $user_name . "'";
	 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

	if (isset($this->rs[0][0]))     
	{
		return $field_r = $this->rs[0][0];
	}
	else     
	{
		return $field_r = $user_name;

	}
$_SESSION['scriptcase']['application_form']['contr_erro'] = 'off';
}
function get_surname($user_name)
{
$_SESSION['scriptcase']['application_form']['contr_erro'] = 'on';
  
	$check_sql = "SELECT lastname"
		. " FROM sec_users"
		. " WHERE login = '" . $user_name . "'";
	 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

	if (isset($this->rs[0][0]))     
	{
		return $field_r = $this->rs[0][0];
	}
	else     
	{
		return $field_r = $user_name;

	}
$_SESSION['scriptcase']['application_form']['contr_erro'] = 'off';
}
function get_email($user_name)
{
$_SESSION['scriptcase']['application_form']['contr_erro'] = 'on';
  
	$check_sql = "SELECT email"
		. " FROM sec_users"
		. " WHERE login = '" . $user_name . "'";
	 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

	if (isset($this->rs[0][0]))     
	{
		return $field_r = $this->rs[0][0];
	}
	else     
	{
		return $field_r = 'sadsa';

	}
$_SESSION['scriptcase']['application_form']['contr_erro'] = 'off';
}
//
 function nm_gera_html()
 {
    global
           $nm_url_saida, $nmgp_url_saida, $nm_saida_global, $nm_apl_dependente, $glo_subst, $sc_check_excl, $sc_check_incl, $nmgp_num_form, $NM_run_iframe;
     if ($this->Embutida_proc)
     {
         return;
     }
     if ($this->nmgp_form_show == 'off')
     {
         exit;
     }
      if (isset($NM_run_iframe) && $NM_run_iframe == 1)
      {
          $this->nmgp_botoes['exit'] = "off";
      }
     $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['opc_ant'] = $this->nmgp_opcao;
     }
     else
     {
         $this->nmgp_opcao = $this->nmgp_opc_ant;
     }
     if (!empty($this->Campos_Mens_erro)) 
     {
         $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
         $this->Campos_Mens_erro = "";
     }
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              application_form_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
    include_once("application_form_form0.php");
        $this->hideFormPages();
 }

        function initFormPages() {
        } // initFormPages

        function hideFormPages() {
        } // hideFormPages

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input

   function jqueryCalendarDtFormat($sFormat, $sSep)
   {
       $sFormat = chunk_split(str_replace('yyyy', 'yy', $sFormat), 2, $sSep);

       if ($sSep == substr($sFormat, -1))
       {
           $sFormat = substr($sFormat, 0, -1);
       }

       return $sFormat;
   } // jqueryCalendarDtFormat

   function jqueryCalendarTimeStart($sFormat)
   {
       $aDateParts = explode(';', $sFormat);

       if (2 == sizeof($aDateParts))
       {
           $sTime = $aDateParts[1];
       }
       else
       {
           $sTime = 'hh:mm:ss';
       }

       return str_replace(array('h', 'm', 'i', 's'), array('0', '0', '0', '0'), $sTime);
   } // jqueryCalendarTimeStart

   function jqueryCalendarWeekInit($sDay)
   {
       switch ($sDay) {
           case 'MO': return 1; break;
           case 'TU': return 2; break;
           case 'WE': return 3; break;
           case 'TH': return 4; break;
           case 'FR': return 5; break;
           case 'SA': return 6; break;
           default  : return 7; break;
       }
   } // jqueryCalendarWeekInit

   function jqueryIconFile($sModule)
   {
       $sImage = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && 'image' == $this->arr_buttons['bcalendario']['type'] && 'only_fontawesomeicon' != $this->arr_buttons['bcalendario']['display'])
           {
               $sImage = $this->arr_buttons['bcalendario']['image'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && 'image' == $this->arr_buttons['bcalculadora']['type'] && 'only_fontawesomeicon' != $this->arr_buttons['bcalculadora']['display'])
           {
               $sImage = $this->arr_buttons['bcalculadora']['image'];
           }
       }

       return '' == $sImage ? '' : $this->Ini->path_icones . '/' . $sImage;
   } // jqueryIconFile

   function jqueryFAFile($sModule)
   {
       $sFA = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && ('image' == $this->arr_buttons['bcalendario']['type'] || 'button' == $this->arr_buttons['bcalendario']['type']) && 'only_fontawesomeicon' == $this->arr_buttons['bcalendario']['display'])
           {
               $sFA = $this->arr_buttons['bcalendario']['fontawesomeicon'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && ('image' == $this->arr_buttons['bcalculadora']['type'] || 'button' == $this->arr_buttons['bcalculadora']['type']) && 'only_fontawesomeicon' == $this->arr_buttons['bcalculadora']['display'])
           {
               $sFA = $this->arr_buttons['bcalculadora']['fontawesomeicon'];
           }
       }

       return '' == $sFA ? '' : "<span class='scButton_fontawesome " . $sFA . "'></span>";
   } // jqueryFAFile

   function jqueryButtonText($sModule)
   {
       $sClass = '';
       $sText  = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && ('image' == $this->arr_buttons['bcalendario']['type'] || 'button' == $this->arr_buttons['bcalendario']['type']))
           {
               if ('only_text' == $this->arr_buttons['bcalendario']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   $sText  = $this->arr_buttons['bcalendario']['value'];
               }
               elseif ('text_fontawesomeicon' == $this->arr_buttons['bcalendario']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   if ('text_right' == $this->arr_buttons['bcalendario']['display_position'])
                   {
                       $sText = "<i class='icon_fa " . $this->arr_buttons['bcalendario']['fontawesomeicon'] . "'></i> " . $this->arr_buttons['bcalendario']['value'];
                   }
                   else
                   {
                       $sText = $this->arr_buttons['bcalendario']['value'] . " <i class='icon_fa " . $this->arr_buttons['bcalendario']['fontawesomeicon'] . "'></i>";
                   }
               }
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && ('image' == $this->arr_buttons['bcalculadora']['type'] || 'button' == $this->arr_buttons['bcalculadora']['type']))
           {
               if ('only_text' == $this->arr_buttons['bcalculadora']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   $sText  = $this->arr_buttons['bcalculadora']['value'];
               }
               elseif ('text_fontawesomeicon' == $this->arr_buttons['bcalculadora']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   if ('text_right' == $this->arr_buttons['bcalendario']['display_position'])
                   {
                       $sText = "<i class='icon_fa " . $this->arr_buttons['bcalculadora']['fontawesomeicon'] . "'></i> " . $this->arr_buttons['bcalculadora']['value'];
                   }
                   else
                   {
                       $sText = $this->arr_buttons['bcalculadora']['value'] . " <i class='icon_fa " . $this->arr_buttons['bcalculadora']['fontawesomeicon'] . "'></i> ";
                   }
               }
           }
       }

       return '' == $sText ? array('', '') : array($sText, $sClass);
   } // jqueryButtonText


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['csrf_token'];
    }

    function scCsrfGenerateToken()
    {
        $aSources = array(
            'abcdefghijklmnopqrstuvwxyz',
            'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            '1234567890',
            '!@$*()-_[]{},.;:'
        );

        $sRandom = '';

        $aSourcesSizes = array();
        $iSourceSize   = sizeof($aSources) - 1;
        for ($i = 0; $i <= $iSourceSize; $i++)
        {
            $aSourcesSizes[$i] = strlen($aSources[$i]) - 1;
        }

        for ($i = 0; $i < 64; $i++)
        {
            $iSource = $this->scCsrfRandom(0, $iSourceSize);
            $sRandom .= substr($aSources[$iSource], $this->scCsrfRandom(0, $aSourcesSizes[$iSource]), 1);
        }

        return $sRandom;
    }

    function scCsrfRandom($iMin, $iMax)
    {
        return mt_rand($iMin, $iMax);
    }

        function addUrlParam($url, $param, $value) {
                $urlParts  = explode('?', $url);
                $urlParams = isset($urlParts[1]) ? explode('&', $urlParts[1]) : array();
                $objParams = array();
                foreach ($urlParams as $paramInfo) {
                        $paramParts = explode('=', $paramInfo);
                        $objParams[ $paramParts[0] ] = isset($paramParts[1]) ? $paramParts[1] : '';
                }
                $objParams[$param] = $value;
                $urlParams = array();
                foreach ($objParams as $paramName => $paramValue) {
                        $urlParams[] = $paramName . '=' . $paramValue;
                }
                return $urlParts[0] . '?' . implode('&', $urlParams);
        }
 function allowedCharsCharset($charlist)
 {
     if ($_SESSION['scriptcase']['charset'] != 'UTF-8')
     {
         $charlist = NM_conv_charset($charlist, $_SESSION['scriptcase']['charset'], 'UTF-8');
     }
     return str_replace("'", "\'", $charlist);
 }

 function new_date_format($type, $field)
 {
     $new_date_format_out = '';

     if ('DT' == $type)
     {
         $date_format  = $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = $this->field_config[$field]['date_display'];
         $time_format  = '';
         $time_sep     = '';
         $time_display = '';
     }
     elseif ('DH' == $type)
     {
         $date_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , 0, strpos($this->field_config[$field]['date_format'] , ';')) : $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], 0, strpos($this->field_config[$field]['date_display'], ';')) : $this->field_config[$field]['date_display'];
         $time_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , strpos($this->field_config[$field]['date_format'] , ';') + 1) : '';
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], strpos($this->field_config[$field]['date_display'], ';') + 1) : '';
     }
     elseif ('HH' == $type)
     {
         $date_format  = '';
         $date_sep     = '';
         $date_display = '';
         $time_format  = $this->field_config[$field]['date_format'];
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = $this->field_config[$field]['date_display'];
     }

     if ('DT' == $type || 'DH' == $type)
     {
         $date_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_format); $i++)
         {
             $char = strtolower(substr($date_format, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $date_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $date_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $disp_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_display); $i++)
         {
             $char = strtolower(substr($date_display, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $disp_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $disp_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $date_final = array();
         foreach ($date_array as $date_part)
         {
             if (in_array($date_part, $disp_array))
             {
                 $date_final[] = $date_part;
             }
         }

         $date_format = implode($date_sep, $date_final);
     }
     if ('HH' == $type || 'DH' == $type)
     {
         $time_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_format); $i++)
         {
             $char = strtolower(substr($time_format, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $time_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $time_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $disp_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_display); $i++)
         {
             $char = strtolower(substr($time_display, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $disp_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $disp_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $time_final = array();
         foreach ($time_array as $time_part)
         {
             if (in_array($time_part, $disp_array))
             {
                 $time_final[] = $time_part;
             }
         }

         $time_format = implode($time_sep, $time_final);
     }

     if ('DT' == $type)
     {
         $old_date_format = $date_format;
     }
     elseif ('DH' == $type)
     {
         $old_date_format = $date_format . ';' . $time_format;
     }
     elseif ('HH' == $type)
     {
         $old_date_format = $time_format;
     }

     for ($i = 0; $i < strlen($old_date_format); $i++)
     {
         $char = substr($old_date_format, $i, 1);
         if ('/' == $char)
         {
             $new_date_format_out .= $date_sep;
         }
         elseif (':' == $char)
         {
             $new_date_format_out .= $time_sep;
         }
         else
         {
             $new_date_format_out .= $char;
         }
     }

     $this->field_config[$field]['date_format'] = $new_date_format_out;
     if ('DH' == $type)
     {
         $new_date_format_out                                  = explode(';', $new_date_format_out);
         $this->field_config[$field]['date_format_js']        = $new_date_format_out[0];
         $this->field_config[$field . '_hora']['date_format'] = $new_date_format_out[1];
         $this->field_config[$field . '_hora']['time_sep']    = $this->field_config[$field]['time_sep'];
     }
 } // new_date_format

   function Form_lookup_venue_id()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_venue_id']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_venue_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_venue_id']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_venue_id'] = array(); 
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_venue_id']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_venue_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_venue_id']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_venue_id'] = array(); 
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_venue_id'][] = $rs->fields[0];
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
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_audition_id()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_audition_id']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_audition_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_audition_id']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_audition_id'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_audition_id']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_audition_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_audition_id']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_audition_id'] = array(); 
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_audition_id'][] = $rs->fields[0];
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
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_course_id()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_course_id']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_course_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_course_id']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_course_id'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_course_id']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_course_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_course_id']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_course_id'] = array(); 
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_course_id'][] = $rs->fields[0];
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
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_nationality()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_nationality']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_nationality'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_nationality']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_nationality'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_nationality']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_nationality'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_nationality']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_nationality'] = array(); 
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_nationality'][] = $rs->fields[0];
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
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_gender()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_gender']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_gender'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_gender']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_gender'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_gender']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_gender'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_gender']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_gender'] = array(); 
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_gender'][] = $rs->fields[0];
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
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_resident()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_resident']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_resident'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_resident']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_resident'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_resident']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_resident'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_resident']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_resident'] = array(); 
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['Lookup_resident'][] = $rs->fields[0];
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
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_accept_tnc()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "I agree?#?Yes?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function SC_fast_search($field, $arg_search, $data_search)
   {
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              application_form_pack_ajax_response();
              exit;
          }
          return;
      }
      $comando = "";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($data_search))
      {
          $data_search = NM_conv_charset($data_search, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $sv_data = $data_search;
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "firstname", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "lastname", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "middlename", $arg_search, $data_search);
      }
      {
          $this->SC_monta_condicao($comando, "dateofbirth", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_nationality($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "nationality", $arg_search, $data_lookup);
          }
      }
      {
          $this->SC_monta_condicao($comando, "submitted", $arg_search, $data_search);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['where_filter_form'] . " and (" . $comando . ")";
      }
      else
      {
         $sc_where = " where " . $comando;
      }
      $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_application_form = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['total'] = $qt_geral_reg_application_form;
      $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          application_form_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          application_form_pack_ajax_response();
          exit;
      }
   }
   function SC_monta_condicao(&$comando, $nome, $condicao, $campo, $tp_campo="")
   {
      $nm_aspas   = "'";
      $nm_aspas1  = "'";
      $nm_numeric = array();
      $Nm_datas   = array();
      $nm_esp_postgres = array();
      $campo_join = strtolower(str_replace(".", "_", $nome));
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $nm_numeric[] = "nationality";$nm_numeric[] = "resident";$nm_numeric[] = "status";$nm_numeric[] = "";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['decimal_db'] == ".")
         {
             $nm_aspas  = "";
             $nm_aspas1 = "";
         }
         if (is_array($campo))
         {
             foreach ($campo as $Ind => $Cmp)
             {
                if (!is_numeric($Cmp))
                {
                    return;
                }
                if ($Cmp == "")
                {
                    $campo[$Ind] = 0;
                }
             }
         }
         else
         {
             if (!is_numeric($campo))
             {
                 return;
             }
             if ($campo == "")
             {
                $campo = 0;
             }
         }
      }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_esp_postgres) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS VARCHAR)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
      $Nm_datas['dateofbirth'] = "date";$Nm_datas['submitted'] = "timestamp";
         if (isset($Nm_datas[$campo_join]))
         {
             for ($x = 0; $x < strlen($campo); $x++)
             {
                 $tst = substr($campo, $x, 1);
                 if (!is_numeric($tst) && ($tst != "-" && $tst != ":" && $tst != " "))
                 {
                     return;
                 }
             }
         }
          if (isset($Nm_datas[$campo_join]))
          {
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
             $nm_aspas  = "#";
             $nm_aspas1 = "#";
          }
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['SC_sep_date1'];
              }
          }
      if (isset($Nm_datas[$campo_join]) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP" || strtoupper($condicao) == "DF"))
      {
          if (strtoupper($condicao) == "DF")
          {
              $condicao = "NP";
          }
          if (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD')";
          }
          elseif ($Nm_datas[$campo_join] == "time" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'hh24:mi:ss')";
          }
      }
         $comando .= (!empty($comando) ? " or " : "");
         if (is_array($campo))
         {
             $prep = "";
             foreach ($campo as $Ind => $Cmp)
             {
                 $prep .= (!empty($prep)) ? "," : "";
                 $Cmp   = substr($this->Db->qstr($Cmp), 1, -1);
                 $prep .= $nm_aspas . $Cmp . $nm_aspas1;
             }
             $prep .= (empty($prep)) ? $nm_aspas . $nm_aspas1 : "";
             $comando .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $prep . ")";
             return;
         }
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         switch (strtoupper($condicao))
         {
            case "EQ":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "II":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " like '" . $campo . "%'";
            break;
            case "QP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." like '%" . $campo . "%'";
            break;
            case "NP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." not like '%" . $campo . "%'";
            break;
            case "DF":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "GT":     // 
               $comando        .= " $nome > " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "GE":     // 
               $comando        .= " $nome >= " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "LT":     // 
               $comando        .= " $nome < " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "LE":     // 
               $comando        .= " $nome <= " . $nm_aspas . $campo . $nm_aspas1;
            break;
         }
   }
   function SC_lookup_nationality($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT country_name, id FROM countries WHERE (country_name LIKE '%$campo%')" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "LIKE '$campo%'", $nm_comando);
       }
       if ($condicao == "df" || $condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "NOT LIKE '%$campo%'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "> '$campo'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", ">= '$campo'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "< '$campo'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "<= '$campo'", $nm_comando);
       }
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           $campo = $campo_orig;
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
   }
function nmgp_redireciona($tipo=0)
{
   global $nm_apl_dependente;
   if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['scriptcase']['sc_tp_saida'] != "D" && $nm_apl_dependente != 1) 
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['nm_sc_retorno'];
   }
   else
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page];
   }
   if ($tipo == 2)
   {
       $nmgp_saida_form = "application_form_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['nm_run_menu'] = 2;
       $nmgp_saida_form = "application_form_fim.php";
   }
   $diretorio = explode("/", $nmgp_saida_form);
   $cont = count($diretorio);
   $apl = $diretorio[$cont - 1];
   $apl = str_replace(".php", "", $apl);
   $pos = strpos($apl, "?");
   if ($pos !== false)
   {
       $apl = substr($apl, 0, $pos);
   }
   if ($tipo != 1 && $tipo != 2)
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page][$apl]['where_orig']);
   }
   if ($this->NM_ajax_flag)
   {
       $sTarget = '_self';
       $this->NM_ajax_info['redir']['metodo']              = 'post';
       $this->NM_ajax_info['redir']['action']              = $nmgp_saida_form;
       $this->NM_ajax_info['redir']['target']              = $sTarget;
       $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       $this->NM_ajax_info['redir']['script_case_session'] = session_id();
       if (0 == $tipo)
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida'] = $this->nm_location;
       }
       application_form_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

   if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
   {
?>
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
   }

?>
    <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
    <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
    <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
    <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
    <META http-equiv="Pragma" content="no-cache"/>
    <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__logo.png">
   </HEAD>
   <BODY>
   <FORM name="form_ok" method="POST" action="<?php echo $this->form_encode_input($nmgp_saida_form); ?>" target="_self">
<?php
   if ($tipo == 0)
   {
?>
     <INPUT type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($this->nm_location); ?>"> 
<?php
   }
?>
     <INPUT type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
     <INPUT type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
   </FORM>
   <SCRIPT type="text/javascript">
      bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
      function scLigEditLookupCall()
      {
<?php
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['masterValue']);
?>
}
<?php
    }
}
?>
      document.form_ok.submit();
   </SCRIPT>
   </BODY>
   </HTML>
<?php
  exit;
}
function nmgp_redireciona_form($nm_apl_dest, $nm_apl_retorno, $nm_apl_parms, $nm_target="", $opc="", $alt_modal=430, $larg_modal=630)
{
   if (isset($this->NM_is_redirected) && $this->NM_is_redirected)
   {
       return;
   }
   if (is_array($nm_apl_parms))
   {
       $tmp_parms = "";
       foreach ($nm_apl_parms as $par => $val)
       {
           $par = trim($par);
           $val = trim($val);
           $tmp_parms .= str_replace(".", "_", $par) . "?#?";
           if (substr($val, 0, 1) == "$")
           {
               $tmp_parms .= $$val;
           }
           elseif (substr($val, 0, 1) == "{")
           {
               $val        = substr($val, 1, -1);
               $tmp_parms .= $this->$val;
           }
           elseif (substr($val, 0, 1) == "[")
           {
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['application_form'][substr($val, 1, -1)];
           }
           else
           {
               $tmp_parms .= $val;
           }
           $tmp_parms .= "?@?";
       }
       $nm_apl_parms = $tmp_parms;
   }
   if (empty($opc))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['application_form']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           application_form_pack_ajax_response();
           exit;
       }
       echo "<SCRIPT language=\"javascript\">";
       if (strtolower($nm_target) == "_blank")
       {
           echo "window.open ('" . $nm_apl_dest . "');";
           echo "</SCRIPT>";
           return;
       }
       else
       {
           echo "window.location='" . $nm_apl_dest . "';";
           echo "</SCRIPT>";
           $this->NM_close_db();
           exit;
       }
   }
   $dir = explode("/", $nm_apl_dest);
   if (count($dir) == 1)
   {
       $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
       $nm_apl_dest = $this->Ini->path_link . SC_dir_app_name($nm_apl_dest) . "/" . $nm_apl_dest . ".php";
   }
   if ($this->NM_ajax_flag)
   {
       $nm_apl_parms = str_replace("?#?", "*scin", NM_charset_to_utf8($nm_apl_parms));
       $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
       $this->NM_ajax_info['redir']['metodo']     = 'post';
       $this->NM_ajax_info['redir']['action']     = $nm_apl_dest;
       $this->NM_ajax_info['redir']['nmgp_parms'] = $nm_apl_parms;
       $this->NM_ajax_info['redir']['target']     = $nm_target_form;
       $this->NM_ajax_info['redir']['h_modal']    = $alt_modal;
       $this->NM_ajax_info['redir']['w_modal']    = $larg_modal;
       if ($nm_target_form == "_blank")
       {
           $this->NM_ajax_info['redir']['nmgp_outra_jan'] = 'true';
       }
       else
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida']      = $nm_apl_retorno;
           $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
           $this->NM_ajax_info['redir']['script_case_session'] = session_id();
       }
       application_form_pack_ajax_response();
       exit;
   }
   if ($nm_target == "modal")
   {
       if (!empty($nm_apl_parms))
       {
           $nm_apl_parms = str_replace("?#?", "*scin", $nm_apl_parms);
           $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
           $nm_apl_parms = "nmgp_parms=" . $nm_apl_parms . "&";
       }
       $par_modal = "?script_case_init=" . $this->Ini->sc_page . "&script_case_session=" . session_id() . "&nmgp_outra_jan=true&nmgp_url_saida=modal&NMSC_modal=ok&";
       $this->redir_modal = "$(function() { tb_show('', '" . $nm_apl_dest . $par_modal . $nm_apl_parms . "TB_iframe=true&modal=true&height=" . $alt_modal . "&width=" . $larg_modal . "', '') })";
       $this->NM_is_redirected = true;
       return;
   }
   if ($nm_target == "_blank")
   {
?>
<form name="Fredir" method="post" target="_blank" action="<?php echo $nm_apl_dest; ?>">
  <input type="hidden" name="nmgp_parms" value="<?php echo $this->form_encode_input($nm_apl_parms); ?>"/>
</form>
<script type="text/javascript">
setTimeout(function() { document.Fredir.submit(); }, 250);
</script>
<?php
    return;
   }
?>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

   if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
   {
?>
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
   }

?>
    <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
    <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
    <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
    <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
    <META http-equiv="Pragma" content="no-cache"/>
    <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__logo.png">
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
   </HEAD>
   <BODY>
<?php
   }
?>
<form name="Fredir" method="post" 
                  target="_self"> 
  <input type="hidden" name="nmgp_parms" value="<?php echo $this->form_encode_input($nm_apl_parms); ?>"/>
<?php
   if ($nm_target_form == "_blank")
   {
?>
  <input type="hidden" name="nmgp_outra_jan" value="true"/> 
<?php
   }
   else
   {
?>
  <input type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($nm_apl_retorno) ?>">
  <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"/> 
  <input type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
<?php
   }
?>
</form> 
   <SCRIPT type="text/javascript">
<?php
   if ($nm_target_form == "modal")
   {
?>
       $(document).ready(function(){
           tb_show('', '<?php echo $nm_apl_dest ?>?script_case_init=<?php echo $this->Ini->sc_page; ?>&script_case_session=<?php echo session_id() ?> &nmgp_url_saida=modal&nmgp_parms=<?php echo $this->form_encode_input($nm_apl_parms); ?>&nmgp_outra_jan=true&TB_iframe=true&height=<?php echo $alt_modal; ?>&width=<?php echo $larg_modal; ?>&modal=true', '');
       });
<?php
   }
   else
   {
?>
    $(function() {
       document.Fredir.target = "<?php echo $nm_target_form ?>"; 
       document.Fredir.action = "<?php echo $nm_apl_dest ?>";
       document.Fredir.submit();
    });
<?php
   }
?>
   </SCRIPT>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
?>
   </BODY>
   </HTML>
<?php
   }
?>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
       $this->NM_close_db();
       exit;
   }
}
    function sc_ajax_alert($sMessage, $params = array())
    {
        if ($this->NM_ajax_flag)
        {
            $this->NM_ajax_info['ajaxAlert']['message'] = NM_charset_to_utf8($sMessage);
            $this->NM_ajax_info['ajaxAlert']['params']  = $this->sc_ajax_alert_params($params);
        }
    } // sc_ajax_alert

    function sc_ajax_alert_params($params)
    {
        $paramList = array();
        foreach ($params as $paramName => $paramValue)
        {
            if (in_array($paramName, array('title', 'timer', 'confirmButtonText', 'confirmButtonFA', 'confirmButtonFAPos', 'cancelButtonText', 'cancelButtonFA', 'cancelButtonFAPos', 'footer', 'width', 'padding', 'position')))
            {
                $paramList[$paramName] = NM_charset_to_utf8($paramValue);
            }
            elseif (in_array($paramName, array('showConfirmButton', 'showCancelButton', 'toast')) && in_array($paramValue, array(true, false)))
            {
                $paramList[$paramName] = NM_charset_to_utf8($paramValue);
            }
            elseif ('position' == $paramName && in_array($paramValue, array('top', 'top-start', 'top-end', 'center', 'center-start', 'center-end', 'bottom', 'bottom-start', 'bottom-end')))
            {
                $paramList[$paramName] = NM_charset_to_utf8($paramValue);
            }
            elseif ('type' == $paramName && in_array($paramValue, array('warning', 'error', 'success', 'info', 'question')))
            {
                $paramList[$paramName] = NM_charset_to_utf8($paramValue);
            }
            elseif ('background' == $paramName)
            {
                $paramList[$paramName] = $this->sc_ajax_alert_image(NM_charset_to_utf8($paramValue));
            }
        }
        return $paramList;
    } // sc_ajax_alert_params

    function sc_ajax_alert_image($background)
    {
        $image_param = $background;
        preg_match_all('/url\(([\s])?(["|\'])?(.*?)(["|\'])?([\s])?\)/i', $background, $matches, PREG_PATTERN_ORDER);
        if (isset($matches[3])) {
            foreach ($matches[3] as $match) {
                if ('http:' != substr($match, 0, 5) && 'https:' != substr($match, 0, 6) && '/' != substr($match, 0, 1)) {
                    $image_param = str_replace($match, "{$this->Ini->path_img_global}/{$match}", $image_param);
                }
            }
        }
        return $image_param;
    } // sc_ajax_alert_image
}
?>
