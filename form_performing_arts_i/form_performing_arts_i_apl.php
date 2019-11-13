<?php
//
class form_performing_arts_i_apl
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
   var $training_examination;
   var $technical_skills;
   var $interest_hobbies;
   var $professional_goal;
   var $youtube;
   var $other_links;
   var $info;
   var $file_upload;
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
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['file_upload']))
          {
              $this->file_upload = $this->NM_ajax_info['param']['file_upload'];
          }
          if (isset($this->NM_ajax_info['param']['info']))
          {
              $this->info = $this->NM_ajax_info['param']['info'];
          }
          if (isset($this->NM_ajax_info['param']['interest_hobbies']))
          {
              $this->interest_hobbies = $this->NM_ajax_info['param']['interest_hobbies'];
          }
          if (isset($this->NM_ajax_info['param']['login']))
          {
              $this->login = $this->NM_ajax_info['param']['login'];
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
          if (isset($this->NM_ajax_info['param']['other_links']))
          {
              $this->other_links = $this->NM_ajax_info['param']['other_links'];
          }
          if (isset($this->NM_ajax_info['param']['professional_goal']))
          {
              $this->professional_goal = $this->NM_ajax_info['param']['professional_goal'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['technical_skills']))
          {
              $this->technical_skills = $this->NM_ajax_info['param']['technical_skills'];
          }
          if (isset($this->NM_ajax_info['param']['training_examination']))
          {
              $this->training_examination = $this->NM_ajax_info['param']['training_examination'];
          }
          if (isset($this->NM_ajax_info['param']['ul_info_file_upload']))
          {
              $this->ul_info_file_upload = $this->NM_ajax_info['param']['ul_info_file_upload'];
          }
          if (isset($this->NM_ajax_info['param']['youtube']))
          {
              $this->youtube = $this->NM_ajax_info['param']['youtube'];
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
      if (isset($this->usr_login) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($_POST["usr_login"]) && isset($this->usr_login)) 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($_GET["usr_login"]) && isset($this->usr_login)) 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_performing_arts_i']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_performing_arts_i']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_performing_arts_i']['embutida_parms']);
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
                 nm_limpa_str_form_performing_arts_i($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->usr_login)) 
          {
              $_SESSION['usr_login'] = $this->usr_login;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_performing_arts_i']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_performing_arts_i']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_performing_arts_i']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_performing_arts_i']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->usr_login)) 
          {
              $_SESSION['usr_login'] = $this->usr_login;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_performing_arts_i']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_performing_arts_i']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_performing_arts_i']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_performing_arts_i']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_performing_arts_i']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_performing_arts_i']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_performing_arts_i']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_performing_arts_i']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_performing_arts_i']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_performing_arts_i']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_performing_arts_i_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("en_us");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("en_us");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_performing_arts_i']['upload_field_info'] = array();

      $_SESSION['sc_session'][$script_case_init]['form_performing_arts_i']['upload_field_info']['file_upload'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_performing_arts_i',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'multi',
          'upload_allowed_type'  => '/\.(pdf|doc|docx)$/i',
          'upload_max_size'  => null,
          'upload_file_height' => '',
          'upload_file_width'  => '',
          'upload_file_aspect' => '',
          'upload_file_type'   => 'N0',
      );

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_performing_arts_i']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_performing_arts_i'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_performing_arts_i']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_performing_arts_i']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_performing_arts_i') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_performing_arts_i']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " pa_experience";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_performing_arts_i")
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
      $this->Ini->Str_btn_form = (isset($_SESSION['scriptcase']['str_button_all'])) ? $_SESSION['scriptcase']['str_button_all'] : "scriptcase9_SweetAmour";
      $_SESSION['scriptcase']['str_button_all'] = $this->Ini->Str_btn_form;
      include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
      $this->Db = $this->Ini->Db; 
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
      $this->Ini->Img_mupload_pending  = "" == trim($str_img_mupload_pending)  ? "" : $str_img_mupload_pending;
      $this->Ini->Img_mupload_finished = "" == trim($str_img_mupload_finished) ? "" : $str_img_mupload_finished;
      $this->Ini->Error_icon_span = "" == trim($str_error_icon_span) ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);
      $this->Ini->form_table_width     = isset($str_form_table_width) && '' != trim($str_form_table_width) ? $str_form_table_width : '';



      $_SESSION['scriptcase']['error_icon']['form_performing_arts_i']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_performing_arts_i'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_performing_arts_i']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_performing_arts_i']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_performing_arts_i']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_performing_arts_i']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_performing_arts_i']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_performing_arts_i']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['update'] = "on";
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['where_orig'] = " where login = '" . $_SESSION['usr_login'] . "'";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['where_pesq'] = " where login = '" . $_SESSION['usr_login'] . "'";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_performing_arts_i']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_performing_arts_i']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_performing_arts_i']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_performing_arts_i']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_performing_arts_i'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_performing_arts_i'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_performing_arts_i']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_performing_arts_i']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_performing_arts_i']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_performing_arts_i']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_performing_arts_i']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_performing_arts_i']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_performing_arts_i']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_performing_arts_i']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_performing_arts_i']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_performing_arts_i']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_performing_arts_i']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_performing_arts_i']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_performing_arts_i']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_performing_arts_i']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_performing_arts_i']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_performing_arts_i']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_performing_arts_i']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_performing_arts_i']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['form_performing_arts_i']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['dados_form'];
          if (!isset($this->login)){$this->login = $this->nmgp_dados_form['login'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_performing_arts_i", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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

      if (is_file($this->Ini->path_aplicacao . 'form_performing_arts_i_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_performing_arts_i_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_performing_arts_i/form_performing_arts_i_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_performing_arts_i_erro.class.php"); 
      }
      $this->Erro      = new form_performing_arts_i_erro();
      $this->Erro->Ini = $this->Ini;
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['opcao']))
         { 
             if ($this->login != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_performing_arts_i']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_performing_arts_i']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_performing_arts_i']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
      if (isset($this->training_examination)) { $this->nm_limpa_alfa($this->training_examination); }
      if (isset($this->technical_skills)) { $this->nm_limpa_alfa($this->technical_skills); }
      if (isset($this->interest_hobbies)) { $this->nm_limpa_alfa($this->interest_hobbies); }
      if (isset($this->professional_goal)) { $this->nm_limpa_alfa($this->professional_goal); }
      if (isset($this->youtube)) { $this->nm_limpa_alfa($this->youtube); }
      if (isset($this->other_links)) { $this->nm_limpa_alfa($this->other_links); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['Gera_log_access'])
      {
          $this->NM_gera_log_insert("Scriptcase", "access");
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['Gera_log_access'] = false;
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
         $this->info = "Applicants are required to submit a portfolio of work, demonstrating interest and experience in the Production Arts.<br/>This could take the form of a CV, photographs of work, sketches, commentaries on theatre seen etc. ";
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_training_examination' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'training_examination');
          }
          if ('validate_technical_skills' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'technical_skills');
          }
          if ('validate_interest_hobbies' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'interest_hobbies');
          }
          if ('validate_professional_goal' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'professional_goal');
          }
          if ('validate_youtube' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'youtube');
          }
          if ('validate_other_links' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'other_links');
          }
          if ('validate_file_upload' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'file_upload');
          }
          form_performing_arts_i_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_performing_arts_i_pack_ajax_response();
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
          $_SESSION['scriptcase']['form_performing_arts_i']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_performing_arts_i_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['recarga'] = $this->nmgp_opcao;
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
          form_performing_arts_i_pack_ajax_response();
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
          form_performing_arts_i_pack_ajax_response();
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
  function html_export_print($nm_arquivo_html, $nmgp_password)
  {
      $Html_password = "";
          $Arq_base  = $this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_html;
          $Parm_pass = ($Html_password != "") ? " -p" : "";
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_performing_arts_i.zip";
          $Arq_htm = $this->Ini->path_imag_temp . "/" . $Zip_name;
          $Arq_zip = $this->Ini->root . $Arq_htm;
          $Zip_f     = (FALSE !== strpos($Arq_zip, ' ')) ? " \"" . $Arq_zip . "\"" :  $Arq_zip;
          $Arq_input = (FALSE !== strpos($Arq_base, ' ')) ? " \"" . $Arq_base . "\"" :  $Arq_base;
           if (is_file($Arq_zip)) {
               unlink($Arq_zip);
           }
           $str_zip = "";
           if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
           {
               chdir($this->Ini->path_third . "/zip/windows");
               $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $Html_password . " " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
           {
                if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                {
                    chdir($this->Ini->path_third . "/zip/linux-i386/bin");
                }
                else
                {
                    chdir($this->Ini->path_third . "/zip/linux-amd64/bin");
                }
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
           {
               chdir($this->Ini->path_third . "/zip/mac/bin");
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
           }
           if (!empty($str_zip)) {
               exec($str_zip);
           }
           // ----- ZIP log
           $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'w');
           if ($fp)
           {
               @fwrite($fp, $str_zip . "\r\n\r\n");
               @fclose($fp);
           }
           foreach ($this->Ini->Img_export_zip as $cada_img_zip)
           {
               $str_zip      = "";
              $cada_img_zip = '"' . $cada_img_zip . '"';
               if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
               {
                   $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $Html_password . " " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
               }
               if (!empty($str_zip)) {
                   exec($str_zip);
               }
               // ----- ZIP log
               $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'a');
               if ($fp)
               {
                   @fwrite($fp, $str_zip . "\r\n\r\n");
                   @fclose($fp);
               }
           }
           if (is_file($Arq_zip)) {
               unlink($Arq_base);
           } 
          $path_doc_md5 = md5($Arq_htm);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " pa_experience") ?></TITLE>
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
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" /> 
  <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__logo.png">
</HEAD>
<BODY class="scExportPage">
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: top">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">PRINT</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
   <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo  $this->form_encode_input($Arq_htm) ?>" target="_self" style="display: none"> 
</form>
<form name="Fdown" method="get" action="form_performing_arts_i_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_performing_arts_i"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="./" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
<input type="hidden" name="nmgp_opcao" value="<?php echo $this->nmgp_opcao ?>"> 
</form> 
         </BODY>
         </HTML>
<?php
          exit;
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
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['SC_sep_date']))
       {
           $delim  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['SC_sep_date'];
           $delim1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['SC_sep_date1'];
       }
       $dt  = $delim . date('Y-m-d H:i:s') . $delim1;
       $usr = isset($_SESSION['usr_login']) ? $_SESSION['usr_login'] : "";
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_access))
       { 
           $dt  = $delim . date('Y-m-d H:i:s') . $delim1;
       } 
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_access))
       { 
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, `action`, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'form_performing_arts_i', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       elseif (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_sqlite))
       { 
           $comando = "INSERT INTO sc_log (id, inserted_date, username, application, creator, ip_user, action, description) VALUES (NULL, $dt, " . $this->Db->qstr($usr) . ", 'form_performing_arts_i', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       else
       { 
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, action, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'form_performing_arts_i', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
       $rlog = $this->Db->Execute($comando); 
       if ($rlog === false)  
       { 
           $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
           if ($this->NM_ajax_flag)
           {
               form_performing_arts_i_pack_ajax_response();
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
           case 'training_examination':
               return "Please give details on other training/examination experiences you have had other than schooling? ";
               break;
           case 'technical_skills':
               return "Please state any performance or production technical skills you have had?";
               break;
           case 'interest_hobbies':
               return "What are your interests/hobbies outside of theatre?  ";
               break;
           case 'professional_goal':
               return "Please tell us your professional goals";
               break;
           case 'info':
               return "info";
               break;
           case 'youtube':
               return "Youtube";
               break;
           case 'other_links':
               return "Other Links";
               break;
           case 'file_upload':
               return "Supporting Documents";
               break;
           case 'login':
               return "Login";
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
     $this->sc_force_zero = array();

     if ('' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_form_performing_arts_i']) || !is_array($this->NM_ajax_info['errList']['geral_form_performing_arts_i']))
              {
                  $this->NM_ajax_info['errList']['geral_form_performing_arts_i'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_performing_arts_i'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'training_examination' == $filtro)
        $this->ValidateField_training_examination($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'technical_skills' == $filtro)
        $this->ValidateField_technical_skills($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'interest_hobbies' == $filtro)
        $this->ValidateField_interest_hobbies($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'professional_goal' == $filtro)
        $this->ValidateField_professional_goal($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'youtube' == $filtro)
        $this->ValidateField_youtube($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'other_links' == $filtro)
        $this->ValidateField_other_links($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'file_upload' == $filtro)
        $this->ValidateField_file_upload($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_training_examination(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['php_cmp_required']['training_examination']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['php_cmp_required']['training_examination'] == "on")) 
      { 
          if ($this->training_examination == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Please give details on other training/examination experiences you have had other than schooling? " ; 
              if (!isset($Campos_Erros['training_examination']))
              {
                  $Campos_Erros['training_examination'] = array();
              }
              $Campos_Erros['training_examination'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['training_examination']) || !is_array($this->NM_ajax_info['errList']['training_examination']))
                  {
                      $this->NM_ajax_info['errList']['training_examination'] = array();
                  }
                  $this->NM_ajax_info['errList']['training_examination'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->training_examination) > 32767) 
          { 
              $hasError = true;
              $Campos_Crit .= "Please give details on other training/examination experiences you have had other than schooling?  " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['training_examination']))
              {
                  $Campos_Erros['training_examination'] = array();
              }
              $Campos_Erros['training_examination'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['training_examination']) || !is_array($this->NM_ajax_info['errList']['training_examination']))
              {
                  $this->NM_ajax_info['errList']['training_examination'] = array();
              }
              $this->NM_ajax_info['errList']['training_examination'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'training_examination';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_training_examination

    function ValidateField_technical_skills(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['php_cmp_required']['technical_skills']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['php_cmp_required']['technical_skills'] == "on")) 
      { 
          if ($this->technical_skills == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Please state any performance or production technical skills you have had?" ; 
              if (!isset($Campos_Erros['technical_skills']))
              {
                  $Campos_Erros['technical_skills'] = array();
              }
              $Campos_Erros['technical_skills'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['technical_skills']) || !is_array($this->NM_ajax_info['errList']['technical_skills']))
                  {
                      $this->NM_ajax_info['errList']['technical_skills'] = array();
                  }
                  $this->NM_ajax_info['errList']['technical_skills'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->technical_skills) > 32767) 
          { 
              $hasError = true;
              $Campos_Crit .= "Please state any performance or production technical skills you have had? " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['technical_skills']))
              {
                  $Campos_Erros['technical_skills'] = array();
              }
              $Campos_Erros['technical_skills'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['technical_skills']) || !is_array($this->NM_ajax_info['errList']['technical_skills']))
              {
                  $this->NM_ajax_info['errList']['technical_skills'] = array();
              }
              $this->NM_ajax_info['errList']['technical_skills'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'technical_skills';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_technical_skills

    function ValidateField_interest_hobbies(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['php_cmp_required']['interest_hobbies']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['php_cmp_required']['interest_hobbies'] == "on")) 
      { 
          if ($this->interest_hobbies == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "What are your interests/hobbies outside of theatre?  " ; 
              if (!isset($Campos_Erros['interest_hobbies']))
              {
                  $Campos_Erros['interest_hobbies'] = array();
              }
              $Campos_Erros['interest_hobbies'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['interest_hobbies']) || !is_array($this->NM_ajax_info['errList']['interest_hobbies']))
                  {
                      $this->NM_ajax_info['errList']['interest_hobbies'] = array();
                  }
                  $this->NM_ajax_info['errList']['interest_hobbies'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->interest_hobbies) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "What are your interests/hobbies outside of theatre?   " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['interest_hobbies']))
              {
                  $Campos_Erros['interest_hobbies'] = array();
              }
              $Campos_Erros['interest_hobbies'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['interest_hobbies']) || !is_array($this->NM_ajax_info['errList']['interest_hobbies']))
              {
                  $this->NM_ajax_info['errList']['interest_hobbies'] = array();
              }
              $this->NM_ajax_info['errList']['interest_hobbies'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'interest_hobbies';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_interest_hobbies

    function ValidateField_professional_goal(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['php_cmp_required']['professional_goal']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['php_cmp_required']['professional_goal'] == "on")) 
      { 
          if ($this->professional_goal == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Please tell us your professional goals" ; 
              if (!isset($Campos_Erros['professional_goal']))
              {
                  $Campos_Erros['professional_goal'] = array();
              }
              $Campos_Erros['professional_goal'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['professional_goal']) || !is_array($this->NM_ajax_info['errList']['professional_goal']))
                  {
                      $this->NM_ajax_info['errList']['professional_goal'] = array();
                  }
                  $this->NM_ajax_info['errList']['professional_goal'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->professional_goal) > 32767) 
          { 
              $hasError = true;
              $Campos_Crit .= "Please tell us your professional goals " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['professional_goal']))
              {
                  $Campos_Erros['professional_goal'] = array();
              }
              $Campos_Erros['professional_goal'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['professional_goal']) || !is_array($this->NM_ajax_info['errList']['professional_goal']))
              {
                  $this->NM_ajax_info['errList']['professional_goal'] = array();
              }
              $this->NM_ajax_info['errList']['professional_goal'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'professional_goal';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_professional_goal

    function ValidateField_youtube(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->youtube) > 200) 
          { 
              $hasError = true;
              $Campos_Crit .= "Youtube " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['youtube']))
              {
                  $Campos_Erros['youtube'] = array();
              }
              $Campos_Erros['youtube'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['youtube']) || !is_array($this->NM_ajax_info['errList']['youtube']))
              {
                  $this->NM_ajax_info['errList']['youtube'] = array();
              }
              $this->NM_ajax_info['errList']['youtube'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'youtube';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_youtube

    function ValidateField_other_links(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->other_links) > 32767) 
          { 
              $hasError = true;
              $Campos_Crit .= "Other Links " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['other_links']))
              {
                  $Campos_Erros['other_links'] = array();
              }
              $Campos_Erros['other_links'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['other_links']) || !is_array($this->NM_ajax_info['errList']['other_links']))
              {
                  $this->NM_ajax_info['errList']['other_links'] = array();
              }
              $this->NM_ajax_info['errList']['other_links'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'other_links';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_other_links

    function ValidateField_file_upload(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
        $bMU_addingFiles = false;
        $bMU_hasFiles    = false;
        if ($this->nmgp_opcao != "excluir")
        {
          if ('' != trim($this->ul_info_file_upload))
          {
              $aUlList = explode('@scl@', $this->ul_info_file_upload);
              foreach ($aUlList as $sUlItem)
              {
                  $aUlInfo = explode('@sci@', $sUlItem);
                  if ('add' == $aUlInfo[0] && !$teste_validade->ArqExtensao($aUlInfo[1], array('pdf', 'doc', 'docx')))
                  {
                      $hasError = true;
                      $Campos_Crit .= "Supporting Documents: " . $this->Ini->Nm_lang['lang_errm_file_invl']; 
                      if (!isset($Campos_Erros['file_upload']))
                      {
                          $Campos_Erros['file_upload'] = array();
                      }
                      $Campos_Erros['file_upload'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
                      if (!isset($this->NM_ajax_info['errList']['file_upload']) || !is_array($this->NM_ajax_info['errList']['file_upload']))
                      {
                          $this->NM_ajax_info['errList']['file_upload'] = array();
                      }
                      $this->NM_ajax_info['errList']['file_upload'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
                  }
                  if ('add' == $aUlInfo[0])
                  {
                      $bMU_addingFiles = true;
                  }
              }
          }
          $bMU_hasFiles = false;
          if ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "excluir")
          {
              $this->nm_tira_formatacao();
              $comando_multiul = "SELECT COUNT(*) AS countTest FROM upload_files WHERE login = '" . $this->login . "'";
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando_multiul;
              $rs_mu = $this->Db->Execute($comando_multiul);
              if ($rs_mu === false && !$rs_mu->EOF)
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, 'banco', $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg());
                  $this->NM_rollback_db();
                  if ($this->NM_ajax_flag)
                  {
                      form_performing_arts_i_pack_ajax_response();
                  }
                  exit;
              }
              $bMU_hasFiles = $rs_mu->fields[0] > 0;
              $rs_mu->Close();
          }
        }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'file_upload';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_file_upload

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
    $this->nmgp_dados_form['training_examination'] = $this->training_examination;
    $this->nmgp_dados_form['technical_skills'] = $this->technical_skills;
    $this->nmgp_dados_form['interest_hobbies'] = $this->interest_hobbies;
    $this->nmgp_dados_form['professional_goal'] = $this->professional_goal;
    $this->nmgp_dados_form['info'] = $this->info;
    $this->nmgp_dados_form['youtube'] = $this->youtube;
    $this->nmgp_dados_form['other_links'] = $this->other_links;
    $this->nmgp_dados_form['file_upload'] = $this->file_upload;
    $this->nmgp_dados_form['login'] = $this->login;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
   }
   function nm_tira_formatacao_login($Val_in)
   {
      return $Val_in;
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
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
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
          $this->ajax_return_values_training_examination();
          $this->ajax_return_values_technical_skills();
          $this->ajax_return_values_interest_hobbies();
          $this->ajax_return_values_professional_goal();
          $this->ajax_return_values_info();
          $this->ajax_return_values_youtube();
          $this->ajax_return_values_other_links();
          $this->ajax_return_values_file_upload();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['login']['keyVal'] = form_performing_arts_i_pack_protect_string($this->nmgp_dados_form['login']);
          }
   } // ajax_return_values

          //----- training_examination
   function ajax_return_values_training_examination($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("training_examination", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->training_examination);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['training_examination'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- technical_skills
   function ajax_return_values_technical_skills($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("technical_skills", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->technical_skills);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['technical_skills'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- interest_hobbies
   function ajax_return_values_interest_hobbies($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("interest_hobbies", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->interest_hobbies);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['interest_hobbies'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- professional_goal
   function ajax_return_values_professional_goal($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("professional_goal", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->professional_goal);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['professional_goal'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- info
   function ajax_return_values_info($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("info", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->info);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['info'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- youtube
   function ajax_return_values_youtube($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("youtube", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->youtube);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['youtube'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- other_links
   function ajax_return_values_other_links($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("other_links", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->other_links);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['other_links'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- file_upload
   function ajax_return_values_file_upload($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("file_upload", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->file_upload);
              $aLookup = array();
              $this->nm_tira_formatacao();
              $comando_multiul = "SELECT fileid, filename FROM upload_files WHERE login = '" . $this->login . "' ORDER BY fileid ASC";
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando_multiul;
              $this->nm_formatar_campos();
              $rs_mu = $this->Db->Execute($comando_multiul);
              if ($rs_mu === false && !$rs_mu->EOF)
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, 'banco', $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg());
                  $this->NM_rollback_db();
                  if ($this->NM_ajax_flag)
                  {
                      form_performing_arts_i_pack_ajax_response();
                  }
                  exit;
              }
              $muHtml      = '';
              $muHtmlArray = array();
              $muItemCount = 1;
              while (!$rs_mu->EOF)
              {
                  $muKey      = $rs_mu->fields[0];
                  $muData     = $rs_mu->fields[1];
                  $muLink     = '';
                  $muLabel    = '';
                  $muExtension = pathinfo($muData, PATHINFO_EXTENSION);
                  $muExtension = null == $muExtension ? '' : '.' . $muExtension;
                  $muFile      = 'sc_file_upload_' . md5(mt_rand(1, 1000) . microtime() . session_id());
                  $muFileTN    = $muFile . '_tn' . $muExtension;
                  $muFile      = $muFile . $muExtension;
                  if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['download_filenames']))
                  {
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['download_filenames'] = array();
                  }
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['download_filenames'][$muFile] = $muData;
                  $muSubDir = "/" . $this->nm_tira_formatacao_login($this->login);
                  $muDirOrig = $this->Ini->path_doc . $muSubDir . '/';
                  if (!@is_dir($muDirOrig))
                  {
                      @mkdir($muDirOrig);
                  }
                  @copy($muDirOrig . $muData, $this->Ini->root . $this->Ini->path_imag_temp . '/' . $muFile);
                  $muLink = "javascript:nm_mostra_doc('documento_db', '" . str_replace("'", "\'", substr($muFile, 3)) . "', 'form_performing_arts_i')";
                  $muLabel .= $muData;
                  $muHtmlItem  = '<span class="id_mu_item_file_upload">';
                  $muHtmlItem .= '<span class="id_mu_data_file_upload">';
                  if ('' != $muLink)
                  {
                      $muHtmlItem .= '<a href="' . $muLink . '" class="scFormLinkOdd">';
                  }
                  $muHtmlItem .= $muLabel;
                  if ('' != $muLink)
                  {
                      $muHtmlItem .= '</a>';
                  }
                  $muHtmlItem .= '</span>';
                  $muHtmlItem .= '<br />';
                  $muHtmlItem   .= '<span class="id_mu_all_chkbx_file_upload"><input type="checkbox" id="id_mu_chkbx_opt_file_upload_' . $muItemCount . '" class="id_mu_chkbx_file_upload" value="' . $muKey . '" /><label for="id_mu_chkbx_opt_file_upload_' . $muItemCount . '">' . $this->Ini->Nm_lang['lang_errm_mu_delfile'] . '</label></span>';
                  $muHtmlItem   .= '</span>';
                  $muHtmlArray[] = $muHtmlItem;
                  $rs_mu->MoveNext();
                  $muItemCount++;
              }
              $muHtml = implode('<br />', $muHtmlArray);
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['file_upload'] = array(
                       'row'    => '',
               'type'    => 'multi_upload',
               'valList' => array($sTmpValue),
               'mulHtml' => $muHtml,
              );
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['upload_dir'][$fieldName][] = $newName;
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
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['scriptcase']['form_performing_arts_i']['contr_erro'] = 'on';
if (!isset($this->sc_temp_usr_login)) {$this->sc_temp_usr_login = (isset($_SESSION['usr_login'])) ? $_SESSION['usr_login'] : "";}
 $this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "off";;
$this->login  = $this->sc_temp_usr_login;
if (isset($this->sc_temp_usr_login)) { $_SESSION['usr_login'] = $this->sc_temp_usr_login;}
$_SESSION['scriptcase']['form_performing_arts_i']['contr_erro'] = 'off'; 
      }
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//----------- 


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
      $NM_val_form['training_examination'] = $this->training_examination;
      $NM_val_form['technical_skills'] = $this->technical_skills;
      $NM_val_form['interest_hobbies'] = $this->interest_hobbies;
      $NM_val_form['professional_goal'] = $this->professional_goal;
      $NM_val_form['info'] = $this->info;
      $NM_val_form['youtube'] = $this->youtube;
      $NM_val_form['other_links'] = $this->other_links;
      $NM_val_form['file_upload'] = $this->file_upload;
      $NM_val_form['login'] = $this->login;
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
          $this->training_examination_before_qstr = $this->training_examination;
          $this->training_examination = substr($this->Db->qstr($this->training_examination), 1, -1); 
          if ($this->training_examination == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->training_examination = "null"; 
              $NM_val_null[] = "training_examination";
          } 
          $this->technical_skills_before_qstr = $this->technical_skills;
          $this->technical_skills = substr($this->Db->qstr($this->technical_skills), 1, -1); 
          if ($this->technical_skills == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->technical_skills = "null"; 
              $NM_val_null[] = "technical_skills";
          } 
          $this->interest_hobbies_before_qstr = $this->interest_hobbies;
          $this->interest_hobbies = substr($this->Db->qstr($this->interest_hobbies), 1, -1); 
          if ($this->interest_hobbies == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->interest_hobbies = "null"; 
              $NM_val_null[] = "interest_hobbies";
          } 
          $this->professional_goal_before_qstr = $this->professional_goal;
          $this->professional_goal = substr($this->Db->qstr($this->professional_goal), 1, -1); 
          if ($this->professional_goal == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->professional_goal = "null"; 
              $NM_val_null[] = "professional_goal";
          } 
          $this->youtube_before_qstr = $this->youtube;
          $this->youtube = substr($this->Db->qstr($this->youtube), 1, -1); 
          if ($this->youtube == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->youtube = "null"; 
              $NM_val_null[] = "youtube";
          } 
          $this->other_links_before_qstr = $this->other_links;
          $this->other_links = substr($this->Db->qstr($this->other_links), 1, -1); 
          if ($this->other_links == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->other_links = "null"; 
              $NM_val_null[] = "other_links";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['foreign_key'] as $sFKName => $sFKValue)
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
                 form_performing_arts_i_pack_ajax_response();
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
              $Cmd_Unique = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where (login = '" . $this->login . "') AND (login <> '$this->login')";
              $Cmd_Unique = str_replace("'null'", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace("#null#", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $Cmd_Unique) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $Cmd_Unique;
              $rsUni = $this->Db->Execute($Cmd_Unique);
              if (0 < $rsUni->fields[0])
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_ukey'] . " Login"); 
                  $this->nmgp_opcao = "nada"; 
                  $aUpdateOk[] = 'login';
              }
              $rsUni->Close();
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "training_examination = '$this->training_examination', technical_skills = '$this->technical_skills', interest_hobbies = '$this->interest_hobbies', professional_goal = '$this->professional_goal', youtube = '$this->youtube', other_links = '$this->other_links'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "training_examination = '$this->training_examination', technical_skills = '$this->technical_skills', interest_hobbies = '$this->interest_hobbies', professional_goal = '$this->professional_goal', youtube = '$this->youtube', other_links = '$this->other_links'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "training_examination = '$this->training_examination', technical_skills = '$this->technical_skills', interest_hobbies = '$this->interest_hobbies', professional_goal = '$this->professional_goal', youtube = '$this->youtube', other_links = '$this->other_links'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "training_examination = '$this->training_examination', technical_skills = '$this->technical_skills', interest_hobbies = '$this->interest_hobbies', professional_goal = '$this->professional_goal', youtube = '$this->youtube', other_links = '$this->other_links'"; 
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
                                  form_performing_arts_i_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   

                  $NM_cmp_auto = '__!SC_REMOVE!__';
                  $NM_seq_auto = '__!SC_REMOVE!__';
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                  { 
                      $NM_seq_auto = "NULL";
                      $NM_cmp_auto = "fileid";
                  } 
                  if (!function_exists('sc_filename_unprotect_chars'))
                  {
                      include_once 'form_performing_arts_i_doc_name.php';
                  }
                  $aUlInfo = explode('@scl@', sc_upload_unprotect_chars($this->ul_info_file_upload));
                  foreach ($aUlInfo as $sUlInfo)
                  {
                      $aMUDelKey   = array();
                      $aUlFileData = explode('@sci@', $sUlInfo);
                      if ('del' == $aUlFileData[0])
                      {
                          $aMUDelKey[] = $aUlFileData[1];
                      }
                      if (!empty($aMUDelKey))
                      {
                          $sMUDelete = "DELETE FROM upload_files WHERE fileid IN (" . implode(', ', $aMUDelKey) . ")";
                          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $sMUDelete;
                          $rs_mu = $this->Db->Execute($sMUDelete);
                          if ($rs_mu === false)
                          {
                              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg());
                              $this->NM_rollback_db();
                              if ($this->NM_ajax_flag)
                              {
                                  form_performing_arts_i_pack_ajax_response();
                              }
                              exit;
                          }
                          $rs_mu->Close();
                      }
                  }
                  foreach ($aUlInfo as $sUlInfo)
                  {
                      $aUlFileData = explode('@sci@', $sUlInfo);
                      if ('add' == $aUlFileData[0])
                      {
                          $aUlFileData[1] = sc_filename_unprotect_chars($aUlFileData[1]);
                          $sMUSubDir = "/" . $this->nm_tira_formatacao_login($this->login);
                          $sMUDirDest = $this->Ini->path_doc . $sMUSubDir . '/';
                          if (@is_dir($sMUDirDest))
                          {
                              $_test_file = $this->fetchUniqueUploadName($aUlFileData[1], $sMUDirDest, "file_upload");
                              if (trim($aUlFileData[1]) != $_test_file)
                              {
                                  $aUlFileData[1] = $_test_file;
                              }
                          }
                          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                          { 
                              $comando = "INSERT INTO upload_files (filename, login, uploaded) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", '" . $this->login . "', '" . date('Y-m-d H:i:s') . "')"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                          {
                              $comando = "INSERT INTO upload_files (" . $NM_cmp_auto . ", filename, login, uploaded) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", '" . $this->login . "', '" . date('Y-m-d H:i:s') . "')"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                          {
                              $comando = "INSERT INTO upload_files (" . $NM_cmp_auto . ", filename, login, uploaded) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", '" . $this->login . "', '" . date('Y-m-d H:i:s') . "')"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                          {
                              $comando = "INSERT INTO upload_files (" . $NM_cmp_auto . ", filename, login, uploaded) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", '" . $this->login . "', '" . date('Y-m-d H:i:s') . "')"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                          {
                              $comando = "INSERT INTO upload_files (filename, login, uploaded) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", '" . $this->login . "', '" . date('Y-m-d H:i:s') . "')"; 
                          }
                          else
                          {
                              $comando = "INSERT INTO upload_files (filename, login, uploaded) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", '" . $this->login . "', '" . date('Y-m-d H:i:s') . "')"; 
                          }
                          $comando = str_replace('__!SC_REMOVE!__,', '', $comando);
                          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando;
                          $rs_mu = $this->Db->Execute($comando);
                          if ($rs_mu === false && !$rs_mu->EOF)
                          {
                              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg());
                              $this->NM_rollback_db();
                              if ($this->NM_ajax_flag)
                              {
                                  form_performing_arts_i_pack_ajax_response();
                              }
                              exit;
                          }
                          $sMUSubDir = "/" . $this->nm_tira_formatacao_login($this->login);
                          $sMUDirDest = $this->Ini->path_doc . $sMUSubDir . '/';
                          if (!@is_dir($sMUDirDest))
                          {
                              nm_mkdir($sMUDirDest);
                          }
                          @copy($this->Ini->root . $this->Ini->path_imag_temp . '/' . $aUlFileData[2], $sMUDirDest . $aUlFileData[1]);
                      }
                  }
          $this->login = $this->login_before_qstr;
          $this->training_examination = $this->training_examination_before_qstr;
          $this->technical_skills = $this->technical_skills_before_qstr;
          $this->interest_hobbies = $this->interest_hobbies_before_qstr;
          $this->professional_goal = $this->professional_goal_before_qstr;
          $this->youtube = $this->youtube_before_qstr;
          $this->other_links = $this->other_links_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
              $this->NM_gera_log_new();
              $this->NM_gera_log_compress();

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['db_changed'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['training_examination'])) { $this->training_examination = $NM_val_form['training_examination']; }
              elseif (isset($this->training_examination)) { $this->nm_limpa_alfa($this->training_examination); }
              if     (isset($NM_val_form) && isset($NM_val_form['technical_skills'])) { $this->technical_skills = $NM_val_form['technical_skills']; }
              elseif (isset($this->technical_skills)) { $this->nm_limpa_alfa($this->technical_skills); }
              if     (isset($NM_val_form) && isset($NM_val_form['interest_hobbies'])) { $this->interest_hobbies = $NM_val_form['interest_hobbies']; }
              elseif (isset($this->interest_hobbies)) { $this->nm_limpa_alfa($this->interest_hobbies); }
              if     (isset($NM_val_form) && isset($NM_val_form['professional_goal'])) { $this->professional_goal = $NM_val_form['professional_goal']; }
              elseif (isset($this->professional_goal)) { $this->nm_limpa_alfa($this->professional_goal); }
              if     (isset($NM_val_form) && isset($NM_val_form['youtube'])) { $this->youtube = $NM_val_form['youtube']; }
              elseif (isset($this->youtube)) { $this->nm_limpa_alfa($this->youtube); }
              if     (isset($NM_val_form) && isset($NM_val_form['other_links'])) { $this->other_links = $NM_val_form['other_links']; }
              elseif (isset($this->other_links)) { $this->nm_limpa_alfa($this->other_links); }

              $this->nm_formatar_campos();

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('training_examination', 'technical_skills', 'interest_hobbies', 'professional_goal', 'info', 'youtube', 'other_links', 'file_upload'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['foreign_key'] as $sFKName => $sFKValue)
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
              $Cmd_Unique = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where login = '" . $this->login . "'";
              $Cmd_Unique = str_replace("'null'", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace("#null#", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $Cmd_Unique) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $Cmd_Unique;
              $rsUni = $this->Db->Execute($Cmd_Unique);
              if (0 < $rsUni->fields[0])
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_inst_uniq'] . " Login"); 
                  $this->nmgp_opcao = "nada"; 
                  $GLOBALS["erro_incl"] = 1; 
                  $aInsertOk[] = 'login';
              }
              $rsUni->Close();
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_performing_arts_i_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              $_test_file = $this->fetchUniqueUploadName($this->file_upload_scfile_name, $dir_file, "file_upload");
              if (trim($this->file_upload_scfile_name) != $_test_file)
              {
                  $this->file_upload_scfile_name = $_test_file;
                  $this->file_upload = $_test_file;
              }
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (login, training_examination, technical_skills, interest_hobbies, professional_goal, youtube, other_links) VALUES ('$this->login', '$this->training_examination', '$this->technical_skills', '$this->interest_hobbies', '$this->professional_goal', '$this->youtube', '$this->other_links')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "login, training_examination, technical_skills, interest_hobbies, professional_goal, youtube, other_links) VALUES (" . $NM_seq_auto . "'$this->login', '$this->training_examination', '$this->technical_skills', '$this->interest_hobbies', '$this->professional_goal', '$this->youtube', '$this->other_links')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "login, training_examination, technical_skills, interest_hobbies, professional_goal, youtube, other_links) VALUES (" . $NM_seq_auto . "'$this->login', '$this->training_examination', '$this->technical_skills', '$this->interest_hobbies', '$this->professional_goal', '$this->youtube', '$this->other_links')"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "login, training_examination, technical_skills, interest_hobbies, professional_goal, youtube, other_links) VALUES (" . $NM_seq_auto . "'$this->login', '$this->training_examination', '$this->technical_skills', '$this->interest_hobbies', '$this->professional_goal', '$this->youtube', '$this->other_links')"; 
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
                              form_performing_arts_i_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {

                  $NM_cmp_auto = '__!SC_REMOVE!__';
                  $NM_seq_auto = '__!SC_REMOVE!__';
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                  { 
                      $NM_seq_auto = "NULL";
                      $NM_cmp_auto = "fileid";
                  } 
                  if (!function_exists('sc_filename_unprotect_chars'))
                  {
                      include_once 'form_performing_arts_i_doc_name.php';
                  }
                  $aUlInfo = explode('@scl@', sc_upload_unprotect_chars($this->ul_info_file_upload));
                  foreach ($aUlInfo as $sUlInfo)
                  {
                      $aMUDelKey   = array();
                      $aUlFileData = explode('@sci@', $sUlInfo);
                      if ('del' == $aUlFileData[0])
                      {
                          $aMUDelKey[] = $aUlFileData[1];
                      }
                      if (!empty($aMUDelKey))
                      {
                          $sMUDelete = "DELETE FROM upload_files WHERE fileid IN (" . implode(', ', $aMUDelKey) . ")";
                          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $sMUDelete;
                          $rs_mu = $this->Db->Execute($sMUDelete);
                          if ($rs_mu === false)
                          {
                              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg());
                              $this->NM_rollback_db();
                              if ($this->NM_ajax_flag)
                              {
                                  form_performing_arts_i_pack_ajax_response();
                              }
                              exit;
                          }
                          $rs_mu->Close();
                      }
                  }
                  foreach ($aUlInfo as $sUlInfo)
                  {
                      $aUlFileData = explode('@sci@', $sUlInfo);
                      if ('add' == $aUlFileData[0])
                      {
                          $aUlFileData[1] = sc_filename_unprotect_chars($aUlFileData[1]);
                          $sMUSubDir = "/" . $this->nm_tira_formatacao_login($this->login);
                          $sMUDirDest = $this->Ini->path_doc . $sMUSubDir . '/';
                          if (@is_dir($sMUDirDest))
                          {
                              $_test_file = $this->fetchUniqueUploadName($aUlFileData[1], $sMUDirDest, "file_upload");
                              if (trim($aUlFileData[1]) != $_test_file)
                              {
                                  $aUlFileData[1] = $_test_file;
                              }
                          }
                          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                          { 
                              $comando = "INSERT INTO upload_files (filename, login, uploaded) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", '" . $this->login . "', '" . date('Y-m-d H:i:s') . "')"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                          {
                              $comando = "INSERT INTO upload_files (" . $NM_cmp_auto . ", filename, login, uploaded) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", '" . $this->login . "', '" . date('Y-m-d H:i:s') . "')"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                          {
                              $comando = "INSERT INTO upload_files (" . $NM_cmp_auto . ", filename, login, uploaded) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", '" . $this->login . "', '" . date('Y-m-d H:i:s') . "')"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                          {
                              $comando = "INSERT INTO upload_files (" . $NM_cmp_auto . ", filename, login, uploaded) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", '" . $this->login . "', '" . date('Y-m-d H:i:s') . "')"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                          {
                              $comando = "INSERT INTO upload_files (filename, login, uploaded) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", '" . $this->login . "', '" . date('Y-m-d H:i:s') . "')"; 
                          }
                          else
                          {
                              $comando = "INSERT INTO upload_files (filename, login, uploaded) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", '" . $this->login . "', '" . date('Y-m-d H:i:s') . "')"; 
                          }
                          $comando = str_replace('__!SC_REMOVE!__,', '', $comando);
                          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando;
                          $rs_mu = $this->Db->Execute($comando);
                          if ($rs_mu === false && !$rs_mu->EOF)
                          {
                              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg());
                              $this->NM_rollback_db();
                              if ($this->NM_ajax_flag)
                              {
                                  form_performing_arts_i_pack_ajax_response();
                              }
                              exit;
                          }
                          $sMUSubDir = "/" . $this->nm_tira_formatacao_login($this->login);
                          $sMUDirDest = $this->Ini->path_doc . $sMUSubDir . '/';
                          if (!@is_dir($sMUDirDest))
                          {
                              nm_mkdir($sMUDirDest);
                          }
                          @copy($this->Ini->root . $this->Ini->path_imag_temp . '/' . $aUlFileData[2], $sMUDirDest . $aUlFileData[1]);
                      }
                  }
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['total']);
              }

              $this->sc_evento = "insert"; 
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              $this->NM_gera_log_key("incluir");
              $this->NM_gera_log_new();
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['return_edit'] = "new";
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
              $sMUDelete = "DELETE FROM upload_files WHERE login = '" . $this->login . "'";
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $sMUDelete;
              $rs_mu = $this->Db->Execute($sMUDelete);
              if ($rs_mu === false)
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg());
                  $this->NM_rollback_db();
                  if ($this->NM_ajax_flag)
                  {
                      form_performing_arts_i_pack_ajax_response();
                  }
                  exit;
              }
              $rs_mu->Close();
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
                          form_performing_arts_i_pack_ajax_response();
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['total']);
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
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['parms'] = "login?#?$this->login?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->login = null === $this->login ? null : substr($this->Db->qstr($this->login), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['where_filter'] . ")";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT login, training_examination, technical_skills, interest_hobbies, professional_goal, youtube, other_links from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT login, training_examination, technical_skills, interest_hobbies, professional_goal, youtube, other_links from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = "login = '" . $_SESSION['usr_login'] . "'";
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (!empty($sc_where))
              {
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  {
                     $aWhere[] = "login = '$this->login'"; 
                  }  
                  else  
                  {
                     $aWhere[] = "login = '$this->login'"; 
                  }
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['reg_start']) ;  
              } 
          } 
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['empty_filter'] = true;
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
              $this->training_examination = $rs->fields[1] ; 
              $this->nmgp_dados_select['training_examination'] = $this->training_examination;
              $this->technical_skills = $rs->fields[2] ; 
              $this->nmgp_dados_select['technical_skills'] = $this->technical_skills;
              $this->interest_hobbies = $rs->fields[3] ; 
              $this->nmgp_dados_select['interest_hobbies'] = $this->interest_hobbies;
              $this->professional_goal = $rs->fields[4] ; 
              $this->nmgp_dados_select['professional_goal'] = $this->professional_goal;
              $this->youtube = $rs->fields[5] ; 
              $this->nmgp_dados_select['youtube'] = $this->youtube;
              $this->other_links = $rs->fields[6] ; 
              $this->nmgp_dados_select['other_links'] = $this->other_links;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['parms'] = "login?#?$this->login?@?";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['sub_dir'][0]  = "/" . $this->nm_tira_formatacao_login($this->login);
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['reg_start'] < $qt_geral_reg_form_performing_arts_i;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['opcao']   = '';
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
              $this->training_examination = "";  
              $this->nmgp_dados_form["training_examination"] = $this->training_examination;
              $this->technical_skills = "";  
              $this->nmgp_dados_form["technical_skills"] = $this->technical_skills;
              $this->interest_hobbies = "";  
              $this->nmgp_dados_form["interest_hobbies"] = $this->interest_hobbies;
              $this->professional_goal = "";  
              $this->nmgp_dados_form["professional_goal"] = $this->professional_goal;
              $this->youtube = "";  
              $this->nmgp_dados_form["youtube"] = $this->youtube;
              $this->other_links = "";  
              $this->nmgp_dados_form["other_links"] = $this->other_links;
              $this->nmgp_dados_form["info"] = $this->info;
              $this->file_upload = "";  
              $this->nmgp_dados_form["file_upload"] = $this->file_upload;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['foreign_key'] as $sFKName => $sFKValue)
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
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['dados_select']))
       {
           $nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['dados_select'];
           $this->SC_log_arr['fields']['training_examination']['0'] =  $nmgp_dados_select['training_examination'];
           $this->SC_log_arr['fields']['technical_skills']['0'] =  $nmgp_dados_select['technical_skills'];
           $this->SC_log_arr['fields']['interest_hobbies']['0'] =  $nmgp_dados_select['interest_hobbies'];
           $this->SC_log_arr['fields']['professional_goal']['0'] =  $nmgp_dados_select['professional_goal'];
           $this->SC_log_arr['fields']['youtube']['0'] =  $nmgp_dados_select['youtube'];
           $this->SC_log_arr['fields']['other_links']['0'] =  $nmgp_dados_select['other_links'];
       }
   }
// 
   function NM_gera_log_new() 
   {
       $this->SC_log_arr['fields']['training_examination']['1'] =  $this->training_examination;
       $this->SC_log_arr['fields']['technical_skills']['1'] =  $this->technical_skills;
       $this->SC_log_arr['fields']['interest_hobbies']['1'] =  $this->interest_hobbies;
       $this->SC_log_arr['fields']['professional_goal']['1'] =  $this->professional_goal;
       $this->SC_log_arr['fields']['youtube']['1'] =  $this->youtube;
       $this->SC_log_arr['fields']['other_links']['1'] =  $this->other_links;
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
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

// 
 function gera_icone($doc) 
 {
    $cam_icone = "";
    $path =  $this->Ini->root . $this->Ini->path_icones . "/";
    if (is_dir($path))
    {
        $nm_icones = nm_list_icon($path); 
        $nm_tipo = strtolower(substr($doc, strrpos($doc, ".") + 1));
        $nm_tipo = str_replace(array('docx', 'xlsx'), array('doc', 'xls'), $nm_tipo);
        if (isset($nm_icones[$nm_tipo]) && !empty($nm_icones[$nm_tipo]))
        {
            $cam_icone = $this->Ini->path_icones . "/" . $nm_icones[$nm_tipo];
        }
        else
        {
            $cam_icone = $this->Ini->path_icones . "/" . $nm_icones["default"];
        }
    }
    return $cam_icone;
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_performing_arts_i_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
     if (!$this->NM_ajax_flag && 'novo' != $this->nmgp_opcao)
     {
         if ('incluir' == $this->nmgp_opc_ant && 'nada' == $this->nmgp_opcao)
         {
         }
         else
         {
             $this->ajax_return_values_file_upload(true);
         }
     }
    include_once("form_performing_arts_i_form0.php");
        $this->hideFormPages();
 }

        function initFormPages() {
        } // initFormPages

        function hideFormPages() {
        } // hideFormPages

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['csrf_token'];
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

   function SC_fast_search($field, $arg_search, $data_search)
   {
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_performing_arts_i_pack_ajax_response();
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
          $this->SC_monta_condicao($comando, "login", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "training_examination", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "technical_skills", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "interest_hobbies", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "professional_goal", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "youtube", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "other_links", $arg_search, $data_search);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['where_filter_form'] . " and (login = '" . $_SESSION['usr_login'] . "') and (" . $comando . ")";
      }
      else
      {
          $sc_where = " where login = '" . $_SESSION['usr_login'] . "' and (" . $comando . ")";
      }
      $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_form_performing_arts_i = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['total'] = $qt_geral_reg_form_performing_arts_i;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_performing_arts_i_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_performing_arts_i_pack_ajax_response();
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
      
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['decimal_db'] == ".")
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
       $nmgp_saida_form = "form_performing_arts_i_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_performing_arts_i_fim.php";
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
       form_performing_arts_i_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_performing_arts_i']['masterValue']);
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
}
?>
