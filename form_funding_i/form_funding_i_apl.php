<?php
//
class form_funding_i_apl
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
   var $are_you;
   var $apply_for_loan;
   var $loan_eligibility;
   var $maintenance_loan_eligibility;
   var $funding_support;
   var $t_eligibility;
   var $m_eligibility;
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
          if (isset($this->NM_ajax_info['param']['apply_for_loan']))
          {
              $this->apply_for_loan = $this->NM_ajax_info['param']['apply_for_loan'];
          }
          if (isset($this->NM_ajax_info['param']['are_you']))
          {
              $this->are_you = $this->NM_ajax_info['param']['are_you'];
          }
          if (isset($this->NM_ajax_info['param']['funding_support']))
          {
              $this->funding_support = $this->NM_ajax_info['param']['funding_support'];
          }
          if (isset($this->NM_ajax_info['param']['loan_eligibility']))
          {
              $this->loan_eligibility = $this->NM_ajax_info['param']['loan_eligibility'];
          }
          if (isset($this->NM_ajax_info['param']['login']))
          {
              $this->login = $this->NM_ajax_info['param']['login'];
          }
          if (isset($this->NM_ajax_info['param']['m_eligibility']))
          {
              $this->m_eligibility = $this->NM_ajax_info['param']['m_eligibility'];
          }
          if (isset($this->NM_ajax_info['param']['maintenance_loan_eligibility']))
          {
              $this->maintenance_loan_eligibility = $this->NM_ajax_info['param']['maintenance_loan_eligibility'];
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
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['t_eligibility']))
          {
              $this->t_eligibility = $this->NM_ajax_info['param']['t_eligibility'];
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
      if (isset($_SESSION['sc_session'][$script_case_init]['form_funding_i']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_funding_i']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_funding_i']['embutida_parms']);
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
                 nm_limpa_str_form_funding_i($cadapar[1]);
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
              $_SESSION['sc_session'][$script_case_init]['form_funding_i']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_funding_i']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_funding_i']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_funding_i']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->usr_login)) 
          {
              $_SESSION['usr_login'] = $this->usr_login;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_funding_i']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_funding_i']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_funding_i']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_funding_i']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_funding_i']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_funding_i']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_funding_i']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_funding_i']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_funding_i']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_funding_i']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_funding_i_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("en_us");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("en_us");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_funding_i']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_funding_i']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_funding_i'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_funding_i']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_funding_i']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_funding_i') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_funding_i']['label'] = "Funding Information";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_funding_i")
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
      $this->nm_new_label['loan_eligibility'] = 'Tuition Fee Loan Eligibility';
      $this->nm_new_label['maintenance_loan_eligibility'] = 'Maintenance Loan Eligibility';

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



      $_SESSION['scriptcase']['error_icon']['form_funding_i']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_funding_i'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_funding_i']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_funding_i']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_funding_i']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_funding_i']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_funding_i']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_funding_i']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['goto']      = 'on';
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['where_orig'] = " where login = '" . $_SESSION['usr_login'] . "'";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['where_pesq'] = " where login = '" . $_SESSION['usr_login'] . "'";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_funding_i']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_funding_i']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_funding_i']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funding_i']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_funding_i'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_funding_i'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_funding_i']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_funding_i']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_funding_i']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_funding_i']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_funding_i']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_funding_i']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_funding_i']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_funding_i']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_funding_i']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_funding_i']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_funding_i']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_funding_i']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_funding_i']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_funding_i']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_funding_i']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_funding_i']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_funding_i']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_funding_i']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['form_funding_i']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['dados_form'];
          if (!isset($this->login)){$this->login = $this->nmgp_dados_form['login'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_funding_i", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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

      if (is_file($this->Ini->path_aplicacao . 'form_funding_i_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_funding_i_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_funding_i/form_funding_i_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_funding_i_erro.class.php"); 
      }
      $this->Erro      = new form_funding_i_erro();
      $this->Erro->Ini = $this->Ini;
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['opcao']))
         { 
             if ($this->login != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_funding_i']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_funding_i']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_funding_i']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
      if (isset($this->are_you)) { $this->nm_limpa_alfa($this->are_you); }
      if (isset($this->apply_for_loan)) { $this->nm_limpa_alfa($this->apply_for_loan); }
      if (isset($this->loan_eligibility)) { $this->nm_limpa_alfa($this->loan_eligibility); }
      if (isset($this->maintenance_loan_eligibility)) { $this->nm_limpa_alfa($this->maintenance_loan_eligibility); }
      if (isset($this->funding_support)) { $this->nm_limpa_alfa($this->funding_support); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['dados_select'];
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['Gera_log_access'])
      {
          $this->NM_gera_log_insert("Scriptcase", "access");
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['Gera_log_access'] = false;
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
         $this->t_eligibility = "";
         $this->m_eligibility = "";
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_are_you' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'are_you');
          }
          if ('validate_apply_for_loan' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'apply_for_loan');
          }
          if ('validate_loan_eligibility' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'loan_eligibility');
          }
          if ('validate_maintenance_loan_eligibility' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'maintenance_loan_eligibility');
          }
          if ('validate_funding_support' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'funding_support');
          }
          form_funding_i_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          if ('event_apply_for_loan_onclick' == $this->NM_ajax_opcao)
          {
              $this->apply_for_loan_onClick();
          }
          if ('event_are_you_onclick' == $this->NM_ajax_opcao)
          {
              $this->are_you_onClick();
          }
          form_funding_i_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['inline_form_seq'] = $this->sc_seq_row;
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
              form_funding_i_pack_ajax_response();
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
          $_SESSION['scriptcase']['form_funding_i']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_funding_i_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['recarga'] = $this->nmgp_opcao;
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
          form_funding_i_pack_ajax_response();
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
          form_funding_i_pack_ajax_response();
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
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['SC_sep_date']))
       {
           $delim  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['SC_sep_date'];
           $delim1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['SC_sep_date1'];
       }
       $dt  = $delim . date('Y-m-d H:i:s') . $delim1;
       $usr = isset($_SESSION['usr_login']) ? $_SESSION['usr_login'] : "";
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_access))
       { 
           $dt  = $delim . date('Y-m-d H:i:s') . $delim1;
       } 
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_access))
       { 
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, `action`, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'form_funding_i', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       elseif (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_sqlite))
       { 
           $comando = "INSERT INTO sc_log (id, inserted_date, username, application, creator, ip_user, action, description) VALUES (NULL, $dt, " . $this->Db->qstr($usr) . ", 'form_funding_i', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       else
       { 
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, action, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'form_funding_i', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
       $rlog = $this->Db->Execute($comando); 
       if ($rlog === false)  
       { 
           $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
           if ($this->NM_ajax_flag)
           {
               form_funding_i_pack_ajax_response();
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
           case 'are_you':
               return "Are you ";
               break;
           case 'apply_for_loan':
               return "Will you apply for a Student Loan? <a href=\"http://www.londonstudiocentre.org/students/funding-scholarships\" target=\"_blank\">More information..</a>";
               break;
           case 't_eligibility':
               return "<hr>Tuition Fee Loan Eligibility";
               break;
           case 'loan_eligibility':
               return "Tuition Fee Loan Eligibility";
               break;
           case 'm_eligibility':
               return " Maintenance Loan Eligibility";
               break;
           case 'maintenance_loan_eligibility':
               return "Maintenance Loan Eligibility";
               break;
           case 'funding_support':
               return "How will you fund the course?";
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
      if ('' == $filtro || 'are_you' == $filtro)
        $this->ValidateField_are_you($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'apply_for_loan' == $filtro)
        $this->ValidateField_apply_for_loan($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'loan_eligibility' == $filtro)
        $this->ValidateField_loan_eligibility($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'maintenance_loan_eligibility' == $filtro)
        $this->ValidateField_maintenance_loan_eligibility($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'funding_support' == $filtro)
        $this->ValidateField_funding_support($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_are_you(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->are_you == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['php_cmp_required']['are_you']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['php_cmp_required']['are_you'] == "on")
        { 
          $hasError = true;
          $Campos_Falta[] = "Are you " ; 
          if (!isset($Campos_Erros['are_you']))
          {
              $Campos_Erros['are_you'] = array();
          }
          $Campos_Erros['are_you'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['are_you']) || !is_array($this->NM_ajax_info['errList']['are_you']))
                  {
                      $this->NM_ajax_info['errList']['are_you'] = array();
                  }
                  $this->NM_ajax_info['errList']['are_you'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
        } 
      } 
      if ($this->are_you != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['Lookup_are_you']) && !in_array($this->are_you, $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['Lookup_are_you']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['are_you']))
              {
                  $Campos_Erros['are_you'] = array();
              }
              $Campos_Erros['are_you'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['are_you']) || !is_array($this->NM_ajax_info['errList']['are_you']))
              {
                  $this->NM_ajax_info['errList']['are_you'] = array();
              }
              $this->NM_ajax_info['errList']['are_you'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'are_you';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_are_you

    function ValidateField_apply_for_loan(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->apply_for_loan == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['php_cmp_required']['apply_for_loan']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['php_cmp_required']['apply_for_loan'] == "on")
        { 
          $hasError = true;
          $Campos_Falta[] = "Will you apply for a Student Loan? <a href=\"http://www.londonstudiocentre.org/students/funding-scholarships\" target=\"_blank\">More information..</a>" ; 
          if (!isset($Campos_Erros['apply_for_loan']))
          {
              $Campos_Erros['apply_for_loan'] = array();
          }
          $Campos_Erros['apply_for_loan'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['apply_for_loan']) || !is_array($this->NM_ajax_info['errList']['apply_for_loan']))
                  {
                      $this->NM_ajax_info['errList']['apply_for_loan'] = array();
                  }
                  $this->NM_ajax_info['errList']['apply_for_loan'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
        } 
      } 
      if ($this->apply_for_loan != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['Lookup_apply_for_loan']) && !in_array($this->apply_for_loan, $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['Lookup_apply_for_loan']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['apply_for_loan']))
              {
                  $Campos_Erros['apply_for_loan'] = array();
              }
              $Campos_Erros['apply_for_loan'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['apply_for_loan']) || !is_array($this->NM_ajax_info['errList']['apply_for_loan']))
              {
                  $this->NM_ajax_info['errList']['apply_for_loan'] = array();
              }
              $this->NM_ajax_info['errList']['apply_for_loan'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'apply_for_loan';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_apply_for_loan

    function ValidateField_loan_eligibility(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->loan_eligibility == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['php_cmp_required']['loan_eligibility']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['php_cmp_required']['loan_eligibility'] == "on")
        { 
          $hasError = true;
          $Campos_Falta[] = "Tuition Fee Loan Eligibility" ; 
          if (!isset($Campos_Erros['loan_eligibility']))
          {
              $Campos_Erros['loan_eligibility'] = array();
          }
          $Campos_Erros['loan_eligibility'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['loan_eligibility']) || !is_array($this->NM_ajax_info['errList']['loan_eligibility']))
                  {
                      $this->NM_ajax_info['errList']['loan_eligibility'] = array();
                  }
                  $this->NM_ajax_info['errList']['loan_eligibility'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
        } 
      } 
      if ($this->loan_eligibility != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['Lookup_loan_eligibility']) && !in_array($this->loan_eligibility, $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['Lookup_loan_eligibility']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['loan_eligibility']))
              {
                  $Campos_Erros['loan_eligibility'] = array();
              }
              $Campos_Erros['loan_eligibility'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['loan_eligibility']) || !is_array($this->NM_ajax_info['errList']['loan_eligibility']))
              {
                  $this->NM_ajax_info['errList']['loan_eligibility'] = array();
              }
              $this->NM_ajax_info['errList']['loan_eligibility'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'loan_eligibility';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_loan_eligibility

    function ValidateField_maintenance_loan_eligibility(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->maintenance_loan_eligibility == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['php_cmp_required']['maintenance_loan_eligibility']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['php_cmp_required']['maintenance_loan_eligibility'] == "on")
        { 
          $hasError = true;
          $Campos_Falta[] = "Maintenance Loan Eligibility" ; 
          if (!isset($Campos_Erros['maintenance_loan_eligibility']))
          {
              $Campos_Erros['maintenance_loan_eligibility'] = array();
          }
          $Campos_Erros['maintenance_loan_eligibility'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['maintenance_loan_eligibility']) || !is_array($this->NM_ajax_info['errList']['maintenance_loan_eligibility']))
                  {
                      $this->NM_ajax_info['errList']['maintenance_loan_eligibility'] = array();
                  }
                  $this->NM_ajax_info['errList']['maintenance_loan_eligibility'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
        } 
      } 
      if ($this->maintenance_loan_eligibility != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['Lookup_maintenance_loan_eligibility']) && !in_array($this->maintenance_loan_eligibility, $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['Lookup_maintenance_loan_eligibility']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['maintenance_loan_eligibility']))
              {
                  $Campos_Erros['maintenance_loan_eligibility'] = array();
              }
              $Campos_Erros['maintenance_loan_eligibility'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['maintenance_loan_eligibility']) || !is_array($this->NM_ajax_info['errList']['maintenance_loan_eligibility']))
              {
                  $this->NM_ajax_info['errList']['maintenance_loan_eligibility'] = array();
              }
              $this->NM_ajax_info['errList']['maintenance_loan_eligibility'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'maintenance_loan_eligibility';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_maintenance_loan_eligibility

    function ValidateField_funding_support(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['php_cmp_required']['funding_support']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['php_cmp_required']['funding_support'] == "on")) 
      { 
          if ($this->funding_support == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "How will you fund the course?" ; 
              if (!isset($Campos_Erros['funding_support']))
              {
                  $Campos_Erros['funding_support'] = array();
              }
              $Campos_Erros['funding_support'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['funding_support']) || !is_array($this->NM_ajax_info['errList']['funding_support']))
                  {
                      $this->NM_ajax_info['errList']['funding_support'] = array();
                  }
                  $this->NM_ajax_info['errList']['funding_support'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->funding_support) > 120) 
          { 
              $hasError = true;
              $Campos_Crit .= "How will you fund the course? " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['funding_support']))
              {
                  $Campos_Erros['funding_support'] = array();
              }
              $Campos_Erros['funding_support'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['funding_support']) || !is_array($this->NM_ajax_info['errList']['funding_support']))
              {
                  $this->NM_ajax_info['errList']['funding_support'] = array();
              }
              $this->NM_ajax_info['errList']['funding_support'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'funding_support';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_funding_support

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
    $this->nmgp_dados_form['are_you'] = $this->are_you;
    $this->nmgp_dados_form['apply_for_loan'] = $this->apply_for_loan;
    $this->nmgp_dados_form['t_eligibility'] = $this->t_eligibility;
    $this->nmgp_dados_form['loan_eligibility'] = $this->loan_eligibility;
    $this->nmgp_dados_form['m_eligibility'] = $this->m_eligibility;
    $this->nmgp_dados_form['maintenance_loan_eligibility'] = $this->maintenance_loan_eligibility;
    $this->nmgp_dados_form['funding_support'] = $this->funding_support;
    $this->nmgp_dados_form['login'] = $this->login;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
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
          $this->ajax_return_values_are_you();
          $this->ajax_return_values_apply_for_loan();
          $this->ajax_return_values_t_eligibility();
          $this->ajax_return_values_loan_eligibility();
          $this->ajax_return_values_m_eligibility();
          $this->ajax_return_values_maintenance_loan_eligibility();
          $this->ajax_return_values_funding_support();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['login']['keyVal'] = form_funding_i_pack_protect_string($this->nmgp_dados_form['login']);
          }
   } // ajax_return_values

          //----- are_you
   function ajax_return_values_are_you($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("are_you", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->are_you);
              $aLookup = array();
              $this->_tmp_lookup_are_you = $this->are_you;

$aLookup[] = array(form_funding_i_pack_protect_string('a UK Student') => form_funding_i_pack_protect_string("a UK Student"));
$aLookup[] = array(form_funding_i_pack_protect_string('an EU Student') => form_funding_i_pack_protect_string("an EU Student"));
$aLookup[] = array(form_funding_i_pack_protect_string('an International Student') => form_funding_i_pack_protect_string("an International Student"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['Lookup_are_you'][] = 'a UK Student';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['Lookup_are_you'][] = 'an EU Student';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['Lookup_are_you'][] = 'an International Student';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['are_you']) && !empty($this->NM_ajax_info['select_html']['are_you']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['are_you'];
          }
          $this->NM_ajax_info['fldList']['are_you'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => true,
               'valList' => array($sTmpValue),
               'colNum'  => 3,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['are_you']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['are_you']['valList'][$i] = form_funding_i_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['are_you']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['are_you']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['are_you']['labList'] = $aLabel;
          }
   }

          //----- apply_for_loan
   function ajax_return_values_apply_for_loan($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("apply_for_loan", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->apply_for_loan);
              $aLookup = array();
              $this->_tmp_lookup_apply_for_loan = $this->apply_for_loan;

$aLookup[] = array(form_funding_i_pack_protect_string('Yes') => form_funding_i_pack_protect_string("Yes"));
$aLookup[] = array(form_funding_i_pack_protect_string('No') => form_funding_i_pack_protect_string("No"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['Lookup_apply_for_loan'][] = 'Yes';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['Lookup_apply_for_loan'][] = 'No';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['apply_for_loan']) && !empty($this->NM_ajax_info['select_html']['apply_for_loan']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['apply_for_loan'];
          }
          $this->NM_ajax_info['fldList']['apply_for_loan'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => true,
               'valList' => array($sTmpValue),
               'colNum'  => 2,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['apply_for_loan']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['apply_for_loan']['valList'][$i] = form_funding_i_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['apply_for_loan']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['apply_for_loan']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['apply_for_loan']['labList'] = $aLabel;
          }
   }

          //----- t_eligibility
   function ajax_return_values_t_eligibility($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("t_eligibility", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->t_eligibility);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['t_eligibility'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- loan_eligibility
   function ajax_return_values_loan_eligibility($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("loan_eligibility", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->loan_eligibility);
              $aLookup = array();
              $this->_tmp_lookup_loan_eligibility = $this->loan_eligibility;

$aLookup[] = array(form_funding_i_pack_protect_string('Yes') => form_funding_i_pack_protect_string("Yes"));
$aLookup[] = array(form_funding_i_pack_protect_string('No') => form_funding_i_pack_protect_string("No"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['Lookup_loan_eligibility'][] = 'Yes';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['Lookup_loan_eligibility'][] = 'No';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['loan_eligibility']) && !empty($this->NM_ajax_info['select_html']['loan_eligibility']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['loan_eligibility'];
          }
          $this->NM_ajax_info['fldList']['loan_eligibility'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => true,
               'valList' => array($sTmpValue),
               'colNum'  => 2,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['loan_eligibility']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['loan_eligibility']['valList'][$i] = form_funding_i_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['loan_eligibility']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['loan_eligibility']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['loan_eligibility']['labList'] = $aLabel;
          }
   }

          //----- m_eligibility
   function ajax_return_values_m_eligibility($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("m_eligibility", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->m_eligibility);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['m_eligibility'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- maintenance_loan_eligibility
   function ajax_return_values_maintenance_loan_eligibility($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("maintenance_loan_eligibility", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->maintenance_loan_eligibility);
              $aLookup = array();
              $this->_tmp_lookup_maintenance_loan_eligibility = $this->maintenance_loan_eligibility;

$aLookup[] = array(form_funding_i_pack_protect_string('Yes') => form_funding_i_pack_protect_string("Yes"));
$aLookup[] = array(form_funding_i_pack_protect_string('No') => form_funding_i_pack_protect_string("No"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['Lookup_maintenance_loan_eligibility'][] = 'Yes';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['Lookup_maintenance_loan_eligibility'][] = 'No';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['maintenance_loan_eligibility']) && !empty($this->NM_ajax_info['select_html']['maintenance_loan_eligibility']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['maintenance_loan_eligibility'];
          }
          $this->NM_ajax_info['fldList']['maintenance_loan_eligibility'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => true,
               'valList' => array($sTmpValue),
               'colNum'  => 2,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['maintenance_loan_eligibility']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['maintenance_loan_eligibility']['valList'][$i] = form_funding_i_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['maintenance_loan_eligibility']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['maintenance_loan_eligibility']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['maintenance_loan_eligibility']['labList'] = $aLabel;
          }
   }

          //----- funding_support
   function ajax_return_values_funding_support($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("funding_support", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->funding_support);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['funding_support'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['upload_dir'][$fieldName][] = $newName;
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
      $_SESSION['scriptcase']['form_funding_i']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_apply_for_loan = $this->apply_for_loan;
    $original_are_you = $this->are_you;
    $original_loan_eligibility = $this->loan_eligibility;
    $original_m_eligibility = $this->m_eligibility;
    $original_maintenance_loan_eligibility = $this->maintenance_loan_eligibility;
    $original_t_eligibility = $this->t_eligibility;
}
if (!isset($this->sc_temp_usr_login)) {$this->sc_temp_usr_login = (isset($_SESSION['usr_login'])) ? $_SESSION['usr_login'] : "";}
  $this->login  = $this->sc_temp_usr_login;
 $this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "off";;

$student = $this->are_you ;
$apply_loan = $this->apply_for_loan ;

switch ($student){
	case "a UK Student":
	 $this->nmgp_cmp_hidden["apply_for_loan"] = "on"; $this->NM_ajax_info['fieldDisplay']['apply_for_loan'] = 'on';
	 $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['php_cmp_required']['apply_for_loan'] = "on";
	 $sc_tmp_field_name = 'loan_eligibility';
$this->NM_ajax_info['fieldLabel'][$sc_tmp_field_name] = $this->nm_new_label[$sc_tmp_field_name] = "Please confirm you have been resident in the UK for 3 years prior to the start of the course?";
	 $sc_tmp_field_name = 'maintenance_loan_eligibility';
$this->NM_ajax_info['fieldLabel'][$sc_tmp_field_name] = $this->nm_new_label[$sc_tmp_field_name] = "Please confirm you have been resident in the UK for 3 years prior to the start of the course? <a href='http://www.sfengland.slc.co.uk/residency' target='_blank'>More information...</a>";
	
	 if($apply_loan == "Yes"){		
		 $this->nmgp_cmp_hidden["loan_eligibility"] = "on"; $this->NM_ajax_info['fieldDisplay']['loan_eligibility'] = 'on';		 
		 $this->nmgp_cmp_hidden["maintenance_loan_eligibility"] = "on"; $this->NM_ajax_info['fieldDisplay']['maintenance_loan_eligibility'] = 'on';	
		 $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['php_cmp_required']['loan_eligibility'] = "on";
		 $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['php_cmp_required']['maintenance_loan_eligibility'] = "on";
		 }
	else {
		 $this->nmgp_cmp_hidden["loan_eligibility"] = "off"; $this->NM_ajax_info['fieldDisplay']['loan_eligibility'] = 'off';
		 $this->nmgp_cmp_hidden["maintenance_loan_eligibility"] = "off"; $this->NM_ajax_info['fieldDisplay']['maintenance_loan_eligibility'] = 'off';	
		 $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['php_cmp_required']['loan_eligibility'] = "off";
		 $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['php_cmp_required']['maintenance_loan_eligibility'] = "off";	
		$this->nmgp_cmp_hidden["t_eligibility"] = "off"; $this->NM_ajax_info['fieldDisplay']['t_eligibility'] = 'off';
	 	$this->nmgp_cmp_hidden["m_eligibility"] = "off"; $this->NM_ajax_info['fieldDisplay']['m_eligibility'] = 'off';
		
	break;
		}
	
	break;
	
	case "an EU Student":
	 $this->nmgp_cmp_hidden["apply_for_loan"] = "on"; $this->NM_ajax_info['fieldDisplay']['apply_for_loan'] = 'on';
	 $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['php_cmp_required']['apply_for_loan'] = "on";
	$sc_tmp_field_name = 'loan_eligibility';
$this->NM_ajax_info['fieldLabel'][$sc_tmp_field_name] = $this->nm_new_label[$sc_tmp_field_name] = "Please confirm you have been resident in the UK or EU for 3 years prior to the start of the course?";
		$sc_tmp_field_name = 'maintenance_loan_eligibility';
$this->NM_ajax_info['fieldLabel'][$sc_tmp_field_name] = $this->nm_new_label[$sc_tmp_field_name] = "Please confirm you have been resident in the UK 5 years prior to the start of the course? <a href='http://www.sfengland.slc.co.uk/residency' target='_blank'>More information...</a>";
	 if($apply_loan == "Yes"){
		 $this->nmgp_cmp_hidden["loan_eligibility"] = "on"; $this->NM_ajax_info['fieldDisplay']['loan_eligibility'] = 'on';
		 $this->nmgp_cmp_hidden["maintenance_loan_eligibility"] = "on"; $this->NM_ajax_info['fieldDisplay']['maintenance_loan_eligibility'] = 'on';	
		 $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['php_cmp_required']['loan_eligibility'] = "on";
		 $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['php_cmp_required']['maintenance_loan_eligibility'] = "on";
		 }
	else {
		 $this->nmgp_cmp_hidden["loan_eligibility"] = "off"; $this->NM_ajax_info['fieldDisplay']['loan_eligibility'] = 'off';
		 $this->nmgp_cmp_hidden["maintenance_loan_eligibility"] = "off"; $this->NM_ajax_info['fieldDisplay']['maintenance_loan_eligibility'] = 'off';	
		 $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['php_cmp_required']['loan_eligibility'] = "off";
		 $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['php_cmp_required']['maintenance_loan_eligibility'] = "off";		
		$this->nmgp_cmp_hidden["t_eligibility"] = "off"; $this->NM_ajax_info['fieldDisplay']['t_eligibility'] = 'off';
	 	$this->nmgp_cmp_hidden["m_eligibility"] = "off"; $this->NM_ajax_info['fieldDisplay']['m_eligibility'] = 'off';
		}
		
	
	break;	
	
	
	default:
	 $this->nmgp_cmp_hidden["t_eligibility"] = "off"; $this->NM_ajax_info['fieldDisplay']['t_eligibility'] = 'off';
	 $this->nmgp_cmp_hidden["m_eligibility"] = "off"; $this->NM_ajax_info['fieldDisplay']['m_eligibility'] = 'off';
	 $this->nmgp_cmp_hidden["apply_for_loan"] = "off"; $this->NM_ajax_info['fieldDisplay']['apply_for_loan'] = 'off';
	 $this->nmgp_cmp_hidden["loan_eligibility"] = "off"; $this->NM_ajax_info['fieldDisplay']['loan_eligibility'] = 'off';
	 $this->nmgp_cmp_hidden["maintenance_loan_eligibility"] = "off"; $this->NM_ajax_info['fieldDisplay']['maintenance_loan_eligibility'] = 'off';
	
	$_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['php_cmp_required']['apply_for_loan'] = "off";
	$_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['php_cmp_required']['loan_eligibility'] = "off";
	$_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['php_cmp_required']['maintenance_loan_eligibility'] = "off";
	break;

	
}
if (isset($this->sc_temp_usr_login)) { $_SESSION['usr_login'] = $this->sc_temp_usr_login;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_apply_for_loan != $this->apply_for_loan || (isset($bFlagRead_apply_for_loan) && $bFlagRead_apply_for_loan)))
    {
        $this->ajax_return_values_apply_for_loan(true);
    }
    if (($original_are_you != $this->are_you || (isset($bFlagRead_are_you) && $bFlagRead_are_you)))
    {
        $this->ajax_return_values_are_you(true);
    }
    if (($original_loan_eligibility != $this->loan_eligibility || (isset($bFlagRead_loan_eligibility) && $bFlagRead_loan_eligibility)))
    {
        $this->ajax_return_values_loan_eligibility(true);
    }
    if (($original_m_eligibility != $this->m_eligibility || (isset($bFlagRead_m_eligibility) && $bFlagRead_m_eligibility)))
    {
        $this->ajax_return_values_m_eligibility(true);
    }
    if (($original_maintenance_loan_eligibility != $this->maintenance_loan_eligibility || (isset($bFlagRead_maintenance_loan_eligibility) && $bFlagRead_maintenance_loan_eligibility)))
    {
        $this->ajax_return_values_maintenance_loan_eligibility(true);
    }
    if (($original_t_eligibility != $this->t_eligibility || (isset($bFlagRead_t_eligibility) && $bFlagRead_t_eligibility)))
    {
        $this->ajax_return_values_t_eligibility(true);
    }
}
$_SESSION['scriptcase']['form_funding_i']['contr_erro'] = 'off'; 
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
      $NM_val_form['are_you'] = $this->are_you;
      $NM_val_form['apply_for_loan'] = $this->apply_for_loan;
      $NM_val_form['t_eligibility'] = $this->t_eligibility;
      $NM_val_form['loan_eligibility'] = $this->loan_eligibility;
      $NM_val_form['m_eligibility'] = $this->m_eligibility;
      $NM_val_form['maintenance_loan_eligibility'] = $this->maintenance_loan_eligibility;
      $NM_val_form['funding_support'] = $this->funding_support;
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
          $this->are_you_before_qstr = $this->are_you;
          $this->are_you = substr($this->Db->qstr($this->are_you), 1, -1); 
          if ($this->are_you == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->are_you = "null"; 
              $NM_val_null[] = "are_you";
          } 
          $this->apply_for_loan_before_qstr = $this->apply_for_loan;
          $this->apply_for_loan = substr($this->Db->qstr($this->apply_for_loan), 1, -1); 
          if ($this->apply_for_loan == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->apply_for_loan = "null"; 
              $NM_val_null[] = "apply_for_loan";
          } 
          $this->loan_eligibility_before_qstr = $this->loan_eligibility;
          $this->loan_eligibility = substr($this->Db->qstr($this->loan_eligibility), 1, -1); 
          if ($this->loan_eligibility == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->loan_eligibility = "null"; 
              $NM_val_null[] = "loan_eligibility";
          } 
          $this->maintenance_loan_eligibility_before_qstr = $this->maintenance_loan_eligibility;
          $this->maintenance_loan_eligibility = substr($this->Db->qstr($this->maintenance_loan_eligibility), 1, -1); 
          if ($this->maintenance_loan_eligibility == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->maintenance_loan_eligibility = "null"; 
              $NM_val_null[] = "maintenance_loan_eligibility";
          } 
          $this->funding_support_before_qstr = $this->funding_support;
          $this->funding_support = substr($this->Db->qstr($this->funding_support), 1, -1); 
          if ($this->funding_support == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->funding_support = "null"; 
              $NM_val_null[] = "funding_support";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['foreign_key'] as $sFKName => $sFKValue)
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
                 form_funding_i_pack_ajax_response();
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
                  $SC_fields_update[] = "are_you = '$this->are_you', apply_for_loan = '$this->apply_for_loan', loan_eligibility = '$this->loan_eligibility', maintenance_loan_eligibility = '$this->maintenance_loan_eligibility', funding_support = '$this->funding_support'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "are_you = '$this->are_you', apply_for_loan = '$this->apply_for_loan', loan_eligibility = '$this->loan_eligibility', maintenance_loan_eligibility = '$this->maintenance_loan_eligibility', funding_support = '$this->funding_support'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "are_you = '$this->are_you', apply_for_loan = '$this->apply_for_loan', loan_eligibility = '$this->loan_eligibility', maintenance_loan_eligibility = '$this->maintenance_loan_eligibility', funding_support = '$this->funding_support'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "are_you = '$this->are_you', apply_for_loan = '$this->apply_for_loan', loan_eligibility = '$this->loan_eligibility', maintenance_loan_eligibility = '$this->maintenance_loan_eligibility', funding_support = '$this->funding_support'"; 
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
                                  form_funding_i_pack_ajax_response();
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
          $this->are_you = $this->are_you_before_qstr;
          $this->apply_for_loan = $this->apply_for_loan_before_qstr;
          $this->loan_eligibility = $this->loan_eligibility_before_qstr;
          $this->maintenance_loan_eligibility = $this->maintenance_loan_eligibility_before_qstr;
          $this->funding_support = $this->funding_support_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
              $this->NM_gera_log_new();
              $this->NM_gera_log_compress();

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['db_changed'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['are_you'])) { $this->are_you = $NM_val_form['are_you']; }
              elseif (isset($this->are_you)) { $this->nm_limpa_alfa($this->are_you); }
              if     (isset($NM_val_form) && isset($NM_val_form['apply_for_loan'])) { $this->apply_for_loan = $NM_val_form['apply_for_loan']; }
              elseif (isset($this->apply_for_loan)) { $this->nm_limpa_alfa($this->apply_for_loan); }
              if     (isset($NM_val_form) && isset($NM_val_form['loan_eligibility'])) { $this->loan_eligibility = $NM_val_form['loan_eligibility']; }
              elseif (isset($this->loan_eligibility)) { $this->nm_limpa_alfa($this->loan_eligibility); }
              if     (isset($NM_val_form) && isset($NM_val_form['maintenance_loan_eligibility'])) { $this->maintenance_loan_eligibility = $NM_val_form['maintenance_loan_eligibility']; }
              elseif (isset($this->maintenance_loan_eligibility)) { $this->nm_limpa_alfa($this->maintenance_loan_eligibility); }
              if     (isset($NM_val_form) && isset($NM_val_form['funding_support'])) { $this->funding_support = $NM_val_form['funding_support']; }
              elseif (isset($this->funding_support)) { $this->nm_limpa_alfa($this->funding_support); }

              $this->nm_formatar_campos();

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('are_you', 'apply_for_loan', 't_eligibility', 'loan_eligibility', 'm_eligibility', 'maintenance_loan_eligibility', 'funding_support'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['foreign_key'] as $sFKName => $sFKValue)
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
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_funding_i_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (login, are_you, apply_for_loan, loan_eligibility, maintenance_loan_eligibility, funding_support) VALUES ('$this->login', '$this->are_you', '$this->apply_for_loan', '$this->loan_eligibility', '$this->maintenance_loan_eligibility', '$this->funding_support')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "login, are_you, apply_for_loan, loan_eligibility, maintenance_loan_eligibility, funding_support) VALUES (" . $NM_seq_auto . "'$this->login', '$this->are_you', '$this->apply_for_loan', '$this->loan_eligibility', '$this->maintenance_loan_eligibility', '$this->funding_support')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "login, are_you, apply_for_loan, loan_eligibility, maintenance_loan_eligibility, funding_support) VALUES (" . $NM_seq_auto . "'$this->login', '$this->are_you', '$this->apply_for_loan', '$this->loan_eligibility', '$this->maintenance_loan_eligibility', '$this->funding_support')"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "login, are_you, apply_for_loan, loan_eligibility, maintenance_loan_eligibility, funding_support) VALUES (" . $NM_seq_auto . "'$this->login', '$this->are_you', '$this->apply_for_loan', '$this->loan_eligibility', '$this->maintenance_loan_eligibility', '$this->funding_support')"; 
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
                              form_funding_i_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['total']);
              }

              $this->sc_evento = "insert"; 
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              $this->NM_gera_log_key("incluir");
              $this->NM_gera_log_new();
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['return_edit'] = "new";
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
                          form_funding_i_pack_ajax_response();
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['total']);
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['parms'] = "login?#?$this->login?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->login = substr($this->Db->qstr($this->login), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['where_filter'] . ")";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT login, are_you, apply_for_loan, loan_eligibility, maintenance_loan_eligibility, funding_support from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT login, are_you, apply_for_loan, loan_eligibility, maintenance_loan_eligibility, funding_support from " . $this->Ini->nm_tabela ; 
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['empty_filter'] = true;
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
              $this->are_you = $rs->fields[1] ; 
              $this->nmgp_dados_select['are_you'] = $this->are_you;
              $this->apply_for_loan = $rs->fields[2] ; 
              $this->nmgp_dados_select['apply_for_loan'] = $this->apply_for_loan;
              $this->loan_eligibility = $rs->fields[3] ; 
              $this->nmgp_dados_select['loan_eligibility'] = $this->loan_eligibility;
              $this->maintenance_loan_eligibility = $rs->fields[4] ; 
              $this->nmgp_dados_select['maintenance_loan_eligibility'] = $this->maintenance_loan_eligibility;
              $this->funding_support = $rs->fields[5] ; 
              $this->nmgp_dados_select['funding_support'] = $this->funding_support;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['parms'] = "login?#?$this->login?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['reg_start'] < $qt_geral_reg_form_funding_i;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['opcao']   = '';
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
              $this->are_you = "";  
              $this->nmgp_dados_form["are_you"] = $this->are_you;
              $this->apply_for_loan = "";  
              $this->nmgp_dados_form["apply_for_loan"] = $this->apply_for_loan;
              $this->loan_eligibility = "";  
              $this->nmgp_dados_form["loan_eligibility"] = $this->loan_eligibility;
              $this->maintenance_loan_eligibility = "";  
              $this->nmgp_dados_form["maintenance_loan_eligibility"] = $this->maintenance_loan_eligibility;
              $this->funding_support = "";  
              $this->nmgp_dados_form["funding_support"] = $this->funding_support;
              $this->nmgp_dados_form["t_eligibility"] = $this->t_eligibility;
              $this->nmgp_dados_form["m_eligibility"] = $this->m_eligibility;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['foreign_key'] as $sFKName => $sFKValue)
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
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['dados_select']))
       {
           $nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['dados_select'];
           $this->SC_log_arr['fields']['are_you']['0'] =  $nmgp_dados_select['are_you'];
           $this->SC_log_arr['fields']['apply_for_loan']['0'] =  $nmgp_dados_select['apply_for_loan'];
           $this->SC_log_arr['fields']['loan_eligibility']['0'] =  $nmgp_dados_select['loan_eligibility'];
           $this->SC_log_arr['fields']['maintenance_loan_eligibility']['0'] =  $nmgp_dados_select['maintenance_loan_eligibility'];
           $this->SC_log_arr['fields']['funding_support']['0'] =  $nmgp_dados_select['funding_support'];
       }
   }
// 
   function NM_gera_log_new() 
   {
       $this->SC_log_arr['fields']['are_you']['1'] =  $this->are_you;
       $this->SC_log_arr['fields']['apply_for_loan']['1'] =  $this->apply_for_loan;
       $this->SC_log_arr['fields']['loan_eligibility']['1'] =  $this->loan_eligibility;
       $this->SC_log_arr['fields']['maintenance_loan_eligibility']['1'] =  $this->maintenance_loan_eligibility;
       $this->SC_log_arr['fields']['funding_support']['1'] =  $this->funding_support;
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
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function apply_for_loan_onClick()
{
$_SESSION['scriptcase']['form_funding_i']['contr_erro'] = 'on';
  
$original_apply_for_loan = $this->apply_for_loan;
$original_t_eligibility = $this->t_eligibility;
$original_m_eligibility = $this->m_eligibility;
$original_loan_eligibility = $this->loan_eligibility;
$original_maintenance_loan_eligibility = $this->maintenance_loan_eligibility;

 $apply_loan = $this->apply_for_loan ;

switch ($apply_loan){
	case "Yes":
		$this->nmgp_cmp_hidden["t_eligibility"] = "on"; $this->NM_ajax_info['fieldDisplay']['t_eligibility'] = 'on';
	 	$this->nmgp_cmp_hidden["m_eligibility"] = "on"; $this->NM_ajax_info['fieldDisplay']['m_eligibility'] = 'on';
		$this->nmgp_cmp_hidden["loan_eligibility"] = "on"; $this->NM_ajax_info['fieldDisplay']['loan_eligibility'] = 'on';	    
		$this->nmgp_cmp_hidden["maintenance_loan_eligibility"] = "on"; $this->NM_ajax_info['fieldDisplay']['maintenance_loan_eligibility'] = 'on';	
	
		 $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['php_cmp_required']['loan_eligibility'] = "on";
		 $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['php_cmp_required']['maintenance_loan_eligibility'] = "on";
		break;
		
		case "No":
		$this->nmgp_cmp_hidden["t_eligibility"] = "off"; $this->NM_ajax_info['fieldDisplay']['t_eligibility'] = 'off';
	 	$this->nmgp_cmp_hidden["m_eligibility"] = "off"; $this->NM_ajax_info['fieldDisplay']['m_eligibility'] = 'off';
		 $this->nmgp_cmp_hidden["loan_eligibility"] = "off"; $this->NM_ajax_info['fieldDisplay']['loan_eligibility'] = 'off';
		 $this->nmgp_cmp_hidden["maintenance_loan_eligibility"] = "off"; $this->NM_ajax_info['fieldDisplay']['maintenance_loan_eligibility'] = 'off';	
	
		 $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['php_cmp_required']['loan_eligibility'] = "off";
		 $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['php_cmp_required']['maintenance_loan_eligibility'] = "off";		
		break;
	
	default:
		$this->nmgp_cmp_hidden["t_eligibility"] = "off"; $this->NM_ajax_info['fieldDisplay']['t_eligibility'] = 'off';
	 	$this->nmgp_cmp_hidden["m_eligibility"] = "off"; $this->NM_ajax_info['fieldDisplay']['m_eligibility'] = 'off';
		 $this->nmgp_cmp_hidden["loan_eligibility"] = "off"; $this->NM_ajax_info['fieldDisplay']['loan_eligibility'] = 'off';
		 $this->nmgp_cmp_hidden["maintenance_loan_eligibility"] = "off"; $this->NM_ajax_info['fieldDisplay']['maintenance_loan_eligibility'] = 'off';	
	
		 $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['php_cmp_required']['loan_eligibility'] = "off";
		 $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['php_cmp_required']['maintenance_loan_eligibility'] = "off";		
	break;
		

}
	



$modificado_apply_for_loan = $this->apply_for_loan;
$modificado_t_eligibility = $this->t_eligibility;
$modificado_m_eligibility = $this->m_eligibility;
$modificado_loan_eligibility = $this->loan_eligibility;
$modificado_maintenance_loan_eligibility = $this->maintenance_loan_eligibility;
$this->nm_formatar_campos('apply_for_loan', 't_eligibility', 'm_eligibility', 'loan_eligibility', 'maintenance_loan_eligibility');
if ($original_apply_for_loan !== $modificado_apply_for_loan || isset($this->nmgp_cmp_readonly['apply_for_loan']) || (isset($bFlagRead_apply_for_loan) && $bFlagRead_apply_for_loan))
{
    $this->ajax_return_values_apply_for_loan(true);
}
if ($original_t_eligibility !== $modificado_t_eligibility || isset($this->nmgp_cmp_readonly['t_eligibility']) || (isset($bFlagRead_t_eligibility) && $bFlagRead_t_eligibility))
{
    $this->ajax_return_values_t_eligibility(true);
}
if ($original_m_eligibility !== $modificado_m_eligibility || isset($this->nmgp_cmp_readonly['m_eligibility']) || (isset($bFlagRead_m_eligibility) && $bFlagRead_m_eligibility))
{
    $this->ajax_return_values_m_eligibility(true);
}
if ($original_loan_eligibility !== $modificado_loan_eligibility || isset($this->nmgp_cmp_readonly['loan_eligibility']) || (isset($bFlagRead_loan_eligibility) && $bFlagRead_loan_eligibility))
{
    $this->ajax_return_values_loan_eligibility(true);
}
if ($original_maintenance_loan_eligibility !== $modificado_maintenance_loan_eligibility || isset($this->nmgp_cmp_readonly['maintenance_loan_eligibility']) || (isset($bFlagRead_maintenance_loan_eligibility) && $bFlagRead_maintenance_loan_eligibility))
{
    $this->ajax_return_values_maintenance_loan_eligibility(true);
}
$this->NM_ajax_info['event_field'] = 'apply';
form_funding_i_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_funding_i']['contr_erro'] = 'off';
}
function are_you_onClick()
{
$_SESSION['scriptcase']['form_funding_i']['contr_erro'] = 'on';
  
$original_are_you = $this->are_you;
$original_apply_for_loan = $this->apply_for_loan;
$original_loan_eligibility = $this->loan_eligibility;
$original_maintenance_loan_eligibility = $this->maintenance_loan_eligibility;
$original_t_eligibility = $this->t_eligibility;
$original_m_eligibility = $this->m_eligibility;

$student = $this->are_you ;
$this->apply_for_loan  ="";


switch ($student){
	case "a UK Student":
	$this->apply_for_loan  ="No";
	$this->nmgp_cmp_hidden["apply_for_loan"] = "on"; $this->NM_ajax_info['fieldDisplay']['apply_for_loan'] = 'on';
	$_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['php_cmp_required']['apply_for_loan'] = "on";
	
	 $sc_tmp_field_name = 'loan_eligibility';
$this->NM_ajax_info['fieldLabel'][$sc_tmp_field_name] = $this->nm_new_label[$sc_tmp_field_name] = "Please confirm you been resident in the UK for 3 years prior to the start of the course?";
	 $sc_tmp_field_name = 'maintenance_loan_eligibility';
$this->NM_ajax_info['fieldLabel'][$sc_tmp_field_name] = $this->nm_new_label[$sc_tmp_field_name] = "Please confirm you been resident in the UK for 3 years prior to the start of the course? <a href='http://www.sfengland.slc.co.uk/residency' target='_blank'>More information...</a>";
	
	
	
	
	break;
	
	case "an EU Student":
	$this->apply_for_loan  ="No";
	$this->nmgp_cmp_hidden["apply_for_loan"] = "on"; $this->NM_ajax_info['fieldDisplay']['apply_for_loan'] = 'on';
	$_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['php_cmp_required']['apply_for_loan'] = "on";
	
	$sc_tmp_field_name = 'loan_eligibility';
$this->NM_ajax_info['fieldLabel'][$sc_tmp_field_name] = $this->nm_new_label[$sc_tmp_field_name] = "Please confirm you been resident in the UK or EU for 3 years prior to the start of the course?";
	$sc_tmp_field_name = 'maintenance_loan_eligibility';
$this->NM_ajax_info['fieldLabel'][$sc_tmp_field_name] = $this->nm_new_label[$sc_tmp_field_name] = "Please confirm you been resident in the UK 5 years prior to the start of the course? <a href='http://www.sfengland.slc.co.uk/residency' target='_blank'>More information...</a>";
	
	
	
	break;
	
	default:
	$this->apply_for_loan  ="No";
	 $this->nmgp_cmp_hidden["apply_for_loan"] = "off"; $this->NM_ajax_info['fieldDisplay']['apply_for_loan'] = 'off';
	 $this->nmgp_cmp_hidden["loan_eligibility"] = "off"; $this->NM_ajax_info['fieldDisplay']['loan_eligibility'] = 'off';
	 $this->nmgp_cmp_hidden["maintenance_loan_eligibility"] = "off"; $this->NM_ajax_info['fieldDisplay']['maintenance_loan_eligibility'] = 'off';
	 $this->nmgp_cmp_hidden["t_eligibility"] = "off"; $this->NM_ajax_info['fieldDisplay']['t_eligibility'] = 'off';
	 $this->nmgp_cmp_hidden["m_eligibility"] = "off"; $this->NM_ajax_info['fieldDisplay']['m_eligibility'] = 'off';
		
	
	$_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['php_cmp_required']['apply_for_loan'] = "off";
	$_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['php_cmp_required']['loan_eligibility'] = "off";
	$_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['php_cmp_required']['maintenance_loan_eligibility'] = "off";
		$this->apply_for_loan  = '';
		$this->loan_eligibility  = '';
		$this->maintenance_loan_eligibility  ='';
		$this->t_eligibility  ='';
		$this->m_eligibility  ='';
	
	
	break;

	
}




$modificado_are_you = $this->are_you;
$modificado_apply_for_loan = $this->apply_for_loan;
$modificado_loan_eligibility = $this->loan_eligibility;
$modificado_maintenance_loan_eligibility = $this->maintenance_loan_eligibility;
$modificado_t_eligibility = $this->t_eligibility;
$modificado_m_eligibility = $this->m_eligibility;
$this->nm_formatar_campos('are_you', 'apply_for_loan', 'loan_eligibility', 'maintenance_loan_eligibility', 't_eligibility', 'm_eligibility');
if ($original_are_you !== $modificado_are_you || isset($this->nmgp_cmp_readonly['are_you']) || (isset($bFlagRead_are_you) && $bFlagRead_are_you))
{
    $this->ajax_return_values_are_you(true);
}
if ($original_apply_for_loan !== $modificado_apply_for_loan || isset($this->nmgp_cmp_readonly['apply_for_loan']) || (isset($bFlagRead_apply_for_loan) && $bFlagRead_apply_for_loan))
{
    $this->ajax_return_values_apply_for_loan(true);
}
if ($original_loan_eligibility !== $modificado_loan_eligibility || isset($this->nmgp_cmp_readonly['loan_eligibility']) || (isset($bFlagRead_loan_eligibility) && $bFlagRead_loan_eligibility))
{
    $this->ajax_return_values_loan_eligibility(true);
}
if ($original_maintenance_loan_eligibility !== $modificado_maintenance_loan_eligibility || isset($this->nmgp_cmp_readonly['maintenance_loan_eligibility']) || (isset($bFlagRead_maintenance_loan_eligibility) && $bFlagRead_maintenance_loan_eligibility))
{
    $this->ajax_return_values_maintenance_loan_eligibility(true);
}
if ($original_t_eligibility !== $modificado_t_eligibility || isset($this->nmgp_cmp_readonly['t_eligibility']) || (isset($bFlagRead_t_eligibility) && $bFlagRead_t_eligibility))
{
    $this->ajax_return_values_t_eligibility(true);
}
if ($original_m_eligibility !== $modificado_m_eligibility || isset($this->nmgp_cmp_readonly['m_eligibility']) || (isset($bFlagRead_m_eligibility) && $bFlagRead_m_eligibility))
{
    $this->ajax_return_values_m_eligibility(true);
}
$this->NM_ajax_info['event_field'] = 'are';
form_funding_i_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_funding_i']['contr_erro'] = 'off';
}
function member_exist($check_table, $check_where ){
$_SESSION['scriptcase']['form_funding_i']['contr_erro'] = 'on';
  
	
	$check_sql = 'SELECT COUNT(login)'
   	. ' FROM '  . $check_table
   	. ' WHERE ' . $check_where;
	 
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
		if( $this->rs[0][0] > '0'){
			return $exist ='true';
			
			}

		else
		{
			return $exist ='false';
		}

	}
$_SESSION['scriptcase']['form_funding_i']['contr_erro'] = 'off';
}
function getName($login_name){
$_SESSION['scriptcase']['form_funding_i']['contr_erro'] = 'on';
  
	
	$sql_query = "SELECT name"
		. " FROM sec_users"
   		. " WHERE login = '". $login_name ."'";
	 
      $nm_select = $sql_query; 
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
				return $name =$this->rs[0][0];

		}
$_SESSION['scriptcase']['form_funding_i']['contr_erro'] = 'off';
}
function get_score_avg ($table_name, $applicant, $location_id, $examiner){
$_SESSION['scriptcase']['form_funding_i']['contr_erro'] = 'on';
  
	$check_sql = "SELECT score_avg"
   . " FROM ". $table_name
   . " WHERE applicant = '" . $applicant . "'"
   . " AND audition_location_id ='". $location_id . "'"
   . " AND examiner ='". $examiner . "'";

 
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
		 $avg_score = $this->rs[0][0];
		}
			
	else{
		
		 $avg_score = 'M';
			
		}
		
	return $avg_score;
$_SESSION['scriptcase']['form_funding_i']['contr_erro'] = 'off';
}
function get_sum_avg ($table_name, $applicant, $location_id){
$_SESSION['scriptcase']['form_funding_i']['contr_erro'] = 'on';
  
     $check_sqll = "SELECT AVG(score_avg)"
    . " FROM ". $table_name
    . " WHERE applicant = '" . $applicant . "'"
    . " AND audition_location_id ='". $location_id . "'";
    

  
      $nm_select = $check_sqll; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rss = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rss[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rss = false;
          $this->rss_erro = $this->Db->ErrorMsg();
      } 
;

     if (isset($this->rss[0][0]))     
         {
          $avg_sum = $this->rss[0][0];
         }
             
     else{
         
          $avg_sum = 'M';
             
         }
         
     return $avg_sum;
$_SESSION['scriptcase']['form_funding_i']['contr_erro'] = 'off';
}
function getAudition_locationStatus($venue_id){
$_SESSION['scriptcase']['form_funding_i']['contr_erro'] = 'on';
  

$check_sql = "SELECT status"
   . " FROM audition_location"
   . " WHERE id = '" . $venue_id . "'";
 
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
		   return $status = $this->rs[0][0];

		}
				else     
		{
				   return $status = $this->rs[0][0];
		}
$_SESSION['scriptcase']['form_funding_i']['contr_erro'] = 'off';
}
function getOutcomesDetail($outcomes_id){
$_SESSION['scriptcase']['form_funding_i']['contr_erro'] = 'on';
  

$check_sql = "SELECT title"
   . " FROM outcomes"
   . " WHERE id = '" . $outcomes_id . "'";
 
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
		   return $result = $this->rs[0][0];

		}
				else     
		{
				   return $result = $this->rs[0][0];
		}
$_SESSION['scriptcase']['form_funding_i']['contr_erro'] = 'off';
}
function getOutcomesDetail_smtt($outcomes_id){
$_SESSION['scriptcase']['form_funding_i']['contr_erro'] = 'on';
  

$check_sql = "SELECT outcomes"
   . " FROM smtt_outcomes"
   . " WHERE id = '" . $outcomes_id . "'";
 
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
		   return $result = $this->rs[0][0];

		}
				else     
		{
				   return $result = $this->rs[0][0];
		}
$_SESSION['scriptcase']['form_funding_i']['contr_erro'] = 'off';
}
function getDepositFee($type){
$_SESSION['scriptcase']['form_funding_i']['contr_erro'] = 'on';
  

$check_sql = "SELECT amount"
   . " FROM payment_fees"
   . " WHERE fee_type = '" . $type . "' AND in_use = '1'";
 
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
		   return $result = $this->rs[0][0];

		}
				else     
		{
				   return $result = $this->rs[0][0];
		}
$_SESSION['scriptcase']['form_funding_i']['contr_erro'] = 'off';
}
function checkOutcome_isOffer($outcomes_id){
$_SESSION['scriptcase']['form_funding_i']['contr_erro'] = 'on';
  

$check_sql = "SELECT is_offer"
   . " FROM outcomes"
   . " WHERE id = '" . $outcomes_id . "'";
 
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
		   return $result = $this->rs[0][0];

		}
				else     
		{
				   return $result = 'No';
		}
$_SESSION['scriptcase']['form_funding_i']['contr_erro'] = 'off';
}
function checkOutcome_isOffer_smtt($outcomes_id){
$_SESSION['scriptcase']['form_funding_i']['contr_erro'] = 'on';
  

$check_sql = "SELECT is_offer"
   . " FROM smtt_outcomes"
   . " WHERE id = '" . $outcomes_id . "'";
 
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
		   return $result = $this->rs[0][0];

		}
				else     
		{
				   return $result = 'No';
		}
$_SESSION['scriptcase']['form_funding_i']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_funding_i_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
    include_once("form_funding_i_form0.php");
        $this->hideFormPages();
 }

        function initFormPages() {
        } // initFormPages

        function hideFormPages() {
        } // hideFormPages

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input


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

   function Form_lookup_are_you()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "a UK Student?#?a UK Student?#?N?@?";
       $nmgp_def_dados .= "an EU Student?#?an EU Student?#?N?@?";
       $nmgp_def_dados .= "an International Student?#?an International Student?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_apply_for_loan()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Yes?#?Yes?#?N?@?";
       $nmgp_def_dados .= "No?#?No?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_loan_eligibility()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Yes?#?Yes?#?N?@?";
       $nmgp_def_dados .= "No?#?No?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_maintenance_loan_eligibility()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Yes?#?Yes?#?N?@?";
       $nmgp_def_dados .= "No?#?No?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function SC_fast_search($field, $arg_search, $data_search)
   {
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_funding_i_pack_ajax_response();
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
          $this->SC_monta_condicao($comando, "funding_support", $arg_search, $data_search);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['where_filter_form'] . " and (login = '" . $_SESSION['usr_login'] . "') and (" . $comando . ")";
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
      $qt_geral_reg_form_funding_i = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['total'] = $qt_geral_reg_form_funding_i;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_funding_i_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_funding_i_pack_ajax_response();
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
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['decimal_db'] == ".")
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
       $nmgp_saida_form = "form_funding_i_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_funding_i_fim.php";
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
       form_funding_i_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funding_i']['masterValue']);
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
