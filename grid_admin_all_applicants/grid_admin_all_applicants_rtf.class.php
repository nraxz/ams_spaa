<?php

class grid_admin_all_applicants_rtf
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $Texto_tag;
   var $Arquivo;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function __construct()
   {
      $this->nm_data   = new nm_data("en_us");
      $this->Texto_tag = "";
   }

   //---- 
   function monta_rtf()
   {
      $this->inicializa_vars();
      $this->gera_texto_tag();
      $this->grava_arquivo_rtf();
      if ($this->Ini->sc_export_ajax)
      {
          $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Rtf_f);
          $this->Arr_result['title_export'] = NM_charset_to_utf8($this->Tit_doc);
          $Temp = ob_get_clean();
          if ($Temp !== false && trim($Temp) != "")
          {
              $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($this->Arr_result);
          exit;
      }
      else
      {
          $this->progress_bar_end();
      }
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_admin_all_applicants_total.class.php"); 
      $this->Tot      = new grid_admin_all_applicants_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_admin_all_applicants']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_admin_all_applicants";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_admin_all_applicants.rtf";
   }
   //---- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini    = $this->Ini;
      $this->$modulo->Db     = $this->Db;
      $this->$modulo->Erro   = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
   }


   //----- 
   function gera_texto_tag()
   {
     global $nm_lang;
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['rtf_name']);
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_admin_all_applicants']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_admin_all_applicants']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_admin_all_applicants']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->audition_audition_date = $Busca_temp['audition_audition_date']; 
          $tmp_pos = strpos($this->audition_audition_date, "##@@");
          if ($tmp_pos !== false && !is_array($this->audition_audition_date))
          {
              $this->audition_audition_date = substr($this->audition_audition_date, 0, $tmp_pos);
          }
          $this->audition_audition_date_2 = $Busca_temp['audition_audition_date_input_2']; 
          $this->application_detail_venue_id = $Busca_temp['application_detail_venue_id']; 
          $tmp_pos = strpos($this->application_detail_venue_id, "##@@");
          if ($tmp_pos !== false && !is_array($this->application_detail_venue_id))
          {
              $this->application_detail_venue_id = substr($this->application_detail_venue_id, 0, $tmp_pos);
          }
          $this->audition_status = $Busca_temp['audition_status']; 
          $tmp_pos = strpos($this->audition_status, "##@@");
          if ($tmp_pos !== false && !is_array($this->audition_status))
          {
              $this->audition_status = substr($this->audition_status, 0, $tmp_pos);
          }
      } 
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['checklist'])) ? $this->New_label['checklist'] : "Check List"; 
          if ($Cada_col == "checklist" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['image_upload_image_headshot'])) ? $this->New_label['image_upload_image_headshot'] : "Image"; 
          if ($Cada_col == "image_upload_image_headshot" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['basic_information_firstname'])) ? $this->New_label['basic_information_firstname'] : "Firstname"; 
          if ($Cada_col == "basic_information_firstname" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['basic_information_lastname'])) ? $this->New_label['basic_information_lastname'] : "Lastname"; 
          if ($Cada_col == "basic_information_lastname" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['basic_information_dateofbirth'])) ? $this->New_label['basic_information_dateofbirth'] : "Dateofbirth"; 
          if ($Cada_col == "basic_information_dateofbirth" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['basic_information_gender'])) ? $this->New_label['basic_information_gender'] : "Gender"; 
          if ($Cada_col == "basic_information_gender" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sec_users_email'])) ? $this->New_label['sec_users_email'] : "Email"; 
          if ($Cada_col == "sec_users_email" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['application_detail_payment_status'])) ? $this->New_label['application_detail_payment_status'] : "Payment Status"; 
          if ($Cada_col == "application_detail_payment_status" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['view'])) ? $this->New_label['view'] : "View"; 
          if ($Cada_col == "view" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['application_detail_id'])) ? $this->New_label['application_detail_id'] : "Id"; 
          if ($Cada_col == "application_detail_id" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['application_detail_number'])) ? $this->New_label['application_detail_number'] : "Number"; 
          if ($Cada_col == "application_detail_number" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['application_detail_venue_id'])) ? $this->New_label['application_detail_venue_id'] : "Venue"; 
          if ($Cada_col == "application_detail_venue_id" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['application_detail_audition_id'])) ? $this->New_label['application_detail_audition_id'] : "Audition"; 
          if ($Cada_col == "application_detail_audition_id" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['application_detail_program'])) ? $this->New_label['application_detail_program'] : "Program"; 
          if ($Cada_col == "application_detail_program" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['audition_audition_date'])) ? $this->New_label['audition_audition_date'] : "Audition Date"; 
          if ($Cada_col == "audition_audition_date" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['audition_audition_title'])) ? $this->New_label['audition_audition_title'] : "Audition Title"; 
          if ($Cada_col == "audition_audition_title" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['basic_information_nationality'])) ? $this->New_label['basic_information_nationality'] : "Nationality"; 
          if ($Cada_col == "basic_information_nationality" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
      } 
      $this->Texto_tag .= "</tr>\r\n";
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT image_upload.image_headshot as image_upload_image_headshot, basic_information.firstname as basic_information_firstname, basic_information.lastname as basic_information_lastname, str_replace (convert(char(10),basic_information.dateofbirth,102), '.', '-') + ' ' + convert(char(8),basic_information.dateofbirth,20) as basic_information_dateofbirth, basic_information.gender as basic_information_gender, sec_users.email as sec_users_email, application_detail.payment_status as cmp_maior_30_1, application_detail.id as application_detail_id, application_detail.number as application_detail_number, application_detail.venue_id as application_detail_venue_id, application_detail.audition_id as application_detail_audition_id, application_detail.program as application_detail_program, str_replace (convert(char(10),audition.audition_date,102), '.', '-') + ' ' + convert(char(8),audition.audition_date,20) as audition_audition_date, audition.audition_title as audition_audition_title, basic_information.nationality as basic_information_nationality, application_detail.login as application_detail_login, sec_users.login as sec_users_login from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT image_upload.image_headshot as image_upload_image_headshot, basic_information.firstname as basic_information_firstname, basic_information.lastname as basic_information_lastname, basic_information.dateofbirth as basic_information_dateofbirth, basic_information.gender as basic_information_gender, sec_users.email as sec_users_email, application_detail.payment_status as cmp_maior_30_1, application_detail.id as application_detail_id, application_detail.number as application_detail_number, application_detail.venue_id as application_detail_venue_id, application_detail.audition_id as application_detail_audition_id, application_detail.program as application_detail_program, audition.audition_date as audition_audition_date, audition.audition_title as audition_audition_title, basic_information.nationality as basic_information_nationality, application_detail.login as application_detail_login, sec_users.login as sec_users_login from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT image_upload.image_headshot as image_upload_image_headshot, basic_information.firstname as basic_information_firstname, basic_information.lastname as basic_information_lastname, basic_information.dateofbirth as basic_information_dateofbirth, basic_information.gender as basic_information_gender, sec_users.email as sec_users_email, application_detail.payment_status as cmp_maior_30_1, application_detail.id as application_detail_id, application_detail.number as application_detail_number, application_detail.venue_id as application_detail_venue_id, application_detail.audition_id as application_detail_audition_id, application_detail.program as application_detail_program, audition.audition_date as audition_audition_date, audition.audition_title as audition_audition_title, basic_information.nationality as basic_information_nationality, application_detail.login as application_detail_login, sec_users.login as sec_users_login from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select_count;
      $rt = $this->Db->Execute($nmgp_select_count);
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->count_ger = $rt->fields[0];
      $rt->Close();
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->SC_seq_register = 0;
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         if (!$this->Ini->sc_export_ajax) {
             $Mens_bar = $this->Ini->Nm_lang['lang_othr_prcs'];
             if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
                 $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
             }
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->Texto_tag .= "<tr>\r\n";
         $this->image_upload_image_headshot = $rs->fields[0] ;  
         $this->basic_information_firstname = $rs->fields[1] ;  
         $this->basic_information_lastname = $rs->fields[2] ;  
         $this->basic_information_dateofbirth = $rs->fields[3] ;  
         $this->basic_information_gender = $rs->fields[4] ;  
         $this->sec_users_email = $rs->fields[5] ;  
         $this->application_detail_payment_status = $rs->fields[6] ;  
         $this->application_detail_id = $rs->fields[7] ;  
         $this->application_detail_id = (string)$this->application_detail_id;
         $this->application_detail_number = $rs->fields[8] ;  
         $this->application_detail_number = (string)$this->application_detail_number;
         $this->application_detail_venue_id = $rs->fields[9] ;  
         $this->application_detail_venue_id = (string)$this->application_detail_venue_id;
         $this->application_detail_audition_id = $rs->fields[10] ;  
         $this->application_detail_audition_id = (string)$this->application_detail_audition_id;
         $this->application_detail_program = $rs->fields[11] ;  
         $this->audition_audition_date = $rs->fields[12] ;  
         $this->audition_audition_title = $rs->fields[13] ;  
         $this->basic_information_nationality = $rs->fields[14] ;  
         $this->basic_information_nationality = (string)$this->basic_information_nationality;
         $this->application_detail_login = $rs->fields[15] ;  
         $this->sec_users_login = $rs->fields[16] ;  
         //----- lookup - basic_information_gender
         $this->look_basic_information_gender = $this->basic_information_gender; 
         $this->Lookup->lookup_basic_information_gender($this->look_basic_information_gender, $this->basic_information_gender) ; 
         $this->look_basic_information_gender = ($this->look_basic_information_gender == "&nbsp;") ? "" : $this->look_basic_information_gender; 
         //----- lookup - application_detail_program
         $this->look_application_detail_program = $this->application_detail_program; 
         $this->Lookup->lookup_application_detail_program($this->look_application_detail_program, $this->application_detail_program) ; 
         $this->look_application_detail_program = ($this->look_application_detail_program == "&nbsp;") ? "" : $this->look_application_detail_program; 
         //----- lookup - basic_information_nationality
         $this->look_basic_information_nationality = $this->basic_information_nationality; 
         $this->Lookup->lookup_basic_information_nationality($this->look_basic_information_nationality, $this->basic_information_nationality) ; 
         $this->look_basic_information_nationality = ($this->look_basic_information_nationality == "&nbsp;") ? "" : $this->look_basic_information_nationality; 
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->Texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->Texto_tag .= "</table>\r\n";
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- checklist
   function NM_export_checklist()
   {
         if (!NM_is_utf8($this->checklist))
         {
             $this->checklist = sc_convert_encoding($this->checklist, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->checklist = str_replace('<', '&lt;', $this->checklist);
         $this->checklist = str_replace('>', '&gt;', $this->checklist);
         $this->Texto_tag .= "<td>" . $this->checklist . "</td>\r\n";
   }
   //----- image_upload_image_headshot
   function NM_export_image_upload_image_headshot()
   {
         if (!NM_is_utf8($this->image_upload_image_headshot))
         {
             $this->image_upload_image_headshot = sc_convert_encoding($this->image_upload_image_headshot, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->image_upload_image_headshot = str_replace('<', '&lt;', $this->image_upload_image_headshot);
         $this->image_upload_image_headshot = str_replace('>', '&gt;', $this->image_upload_image_headshot);
         $this->Texto_tag .= "<td>" . $this->image_upload_image_headshot . "</td>\r\n";
   }
   //----- basic_information_firstname
   function NM_export_basic_information_firstname()
   {
         $this->basic_information_firstname = html_entity_decode($this->basic_information_firstname, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->basic_information_firstname = strip_tags($this->basic_information_firstname);
         if (!NM_is_utf8($this->basic_information_firstname))
         {
             $this->basic_information_firstname = sc_convert_encoding($this->basic_information_firstname, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->basic_information_firstname = str_replace('<', '&lt;', $this->basic_information_firstname);
         $this->basic_information_firstname = str_replace('>', '&gt;', $this->basic_information_firstname);
         $this->Texto_tag .= "<td>" . $this->basic_information_firstname . "</td>\r\n";
   }
   //----- basic_information_lastname
   function NM_export_basic_information_lastname()
   {
         $this->basic_information_lastname = html_entity_decode($this->basic_information_lastname, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->basic_information_lastname = strip_tags($this->basic_information_lastname);
         if (!NM_is_utf8($this->basic_information_lastname))
         {
             $this->basic_information_lastname = sc_convert_encoding($this->basic_information_lastname, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->basic_information_lastname = str_replace('<', '&lt;', $this->basic_information_lastname);
         $this->basic_information_lastname = str_replace('>', '&gt;', $this->basic_information_lastname);
         $this->Texto_tag .= "<td>" . $this->basic_information_lastname . "</td>\r\n";
   }
   //----- basic_information_dateofbirth
   function NM_export_basic_information_dateofbirth()
   {
         $conteudo_x =  $this->basic_information_dateofbirth;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->basic_information_dateofbirth, "YYYY-MM-DD  ");
             $this->basic_information_dateofbirth = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
         } 
         if (!NM_is_utf8($this->basic_information_dateofbirth))
         {
             $this->basic_information_dateofbirth = sc_convert_encoding($this->basic_information_dateofbirth, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->basic_information_dateofbirth = str_replace('<', '&lt;', $this->basic_information_dateofbirth);
         $this->basic_information_dateofbirth = str_replace('>', '&gt;', $this->basic_information_dateofbirth);
         $this->Texto_tag .= "<td>" . $this->basic_information_dateofbirth . "</td>\r\n";
   }
   //----- basic_information_gender
   function NM_export_basic_information_gender()
   {
         $this->look_basic_information_gender = html_entity_decode($this->look_basic_information_gender, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_basic_information_gender = strip_tags($this->look_basic_information_gender);
         if (!NM_is_utf8($this->look_basic_information_gender))
         {
             $this->look_basic_information_gender = sc_convert_encoding($this->look_basic_information_gender, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_basic_information_gender = str_replace('<', '&lt;', $this->look_basic_information_gender);
         $this->look_basic_information_gender = str_replace('>', '&gt;', $this->look_basic_information_gender);
         $this->Texto_tag .= "<td>" . $this->look_basic_information_gender . "</td>\r\n";
   }
   //----- sec_users_email
   function NM_export_sec_users_email()
   {
         $this->sec_users_email = html_entity_decode($this->sec_users_email, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sec_users_email = strip_tags($this->sec_users_email);
         if (!NM_is_utf8($this->sec_users_email))
         {
             $this->sec_users_email = sc_convert_encoding($this->sec_users_email, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sec_users_email = str_replace('<', '&lt;', $this->sec_users_email);
         $this->sec_users_email = str_replace('>', '&gt;', $this->sec_users_email);
         $this->Texto_tag .= "<td>" . $this->sec_users_email . "</td>\r\n";
   }
   //----- application_detail_payment_status
   function NM_export_application_detail_payment_status()
   {
         $this->application_detail_payment_status = html_entity_decode($this->application_detail_payment_status, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->application_detail_payment_status = strip_tags($this->application_detail_payment_status);
         if (!NM_is_utf8($this->application_detail_payment_status))
         {
             $this->application_detail_payment_status = sc_convert_encoding($this->application_detail_payment_status, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->application_detail_payment_status = str_replace('<', '&lt;', $this->application_detail_payment_status);
         $this->application_detail_payment_status = str_replace('>', '&gt;', $this->application_detail_payment_status);
         $this->Texto_tag .= "<td>" . $this->application_detail_payment_status . "</td>\r\n";
   }
   //----- view
   function NM_export_view()
   {
         if (!NM_is_utf8($this->view))
         {
             $this->view = sc_convert_encoding($this->view, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->view = str_replace('<', '&lt;', $this->view);
         $this->view = str_replace('>', '&gt;', $this->view);
         $this->Texto_tag .= "<td>" . $this->view . "</td>\r\n";
   }
   //----- application_detail_id
   function NM_export_application_detail_id()
   {
         nmgp_Form_Num_Val($this->application_detail_id, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->application_detail_id))
         {
             $this->application_detail_id = sc_convert_encoding($this->application_detail_id, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->application_detail_id = str_replace('<', '&lt;', $this->application_detail_id);
         $this->application_detail_id = str_replace('>', '&gt;', $this->application_detail_id);
         $this->Texto_tag .= "<td>" . $this->application_detail_id . "</td>\r\n";
   }
   //----- application_detail_number
   function NM_export_application_detail_number()
   {
         nmgp_Form_Num_Val($this->application_detail_number, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->application_detail_number))
         {
             $this->application_detail_number = sc_convert_encoding($this->application_detail_number, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->application_detail_number = str_replace('<', '&lt;', $this->application_detail_number);
         $this->application_detail_number = str_replace('>', '&gt;', $this->application_detail_number);
         $this->Texto_tag .= "<td>" . $this->application_detail_number . "</td>\r\n";
   }
   //----- application_detail_venue_id
   function NM_export_application_detail_venue_id()
   {
         nmgp_Form_Num_Val($this->application_detail_venue_id, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->application_detail_venue_id))
         {
             $this->application_detail_venue_id = sc_convert_encoding($this->application_detail_venue_id, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->application_detail_venue_id = str_replace('<', '&lt;', $this->application_detail_venue_id);
         $this->application_detail_venue_id = str_replace('>', '&gt;', $this->application_detail_venue_id);
         $this->Texto_tag .= "<td>" . $this->application_detail_venue_id . "</td>\r\n";
   }
   //----- application_detail_audition_id
   function NM_export_application_detail_audition_id()
   {
         nmgp_Form_Num_Val($this->application_detail_audition_id, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->application_detail_audition_id))
         {
             $this->application_detail_audition_id = sc_convert_encoding($this->application_detail_audition_id, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->application_detail_audition_id = str_replace('<', '&lt;', $this->application_detail_audition_id);
         $this->application_detail_audition_id = str_replace('>', '&gt;', $this->application_detail_audition_id);
         $this->Texto_tag .= "<td>" . $this->application_detail_audition_id . "</td>\r\n";
   }
   //----- application_detail_program
   function NM_export_application_detail_program()
   {
         $this->look_application_detail_program = html_entity_decode($this->look_application_detail_program, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_application_detail_program = strip_tags($this->look_application_detail_program);
         if (!NM_is_utf8($this->look_application_detail_program))
         {
             $this->look_application_detail_program = sc_convert_encoding($this->look_application_detail_program, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_application_detail_program = str_replace('<', '&lt;', $this->look_application_detail_program);
         $this->look_application_detail_program = str_replace('>', '&gt;', $this->look_application_detail_program);
         $this->Texto_tag .= "<td>" . $this->look_application_detail_program . "</td>\r\n";
   }
   //----- audition_audition_date
   function NM_export_audition_audition_date()
   {
         if (substr($this->audition_audition_date, 10, 1) == "-") 
         { 
             $this->audition_audition_date = substr($this->audition_audition_date, 0, 10) . " " . substr($this->audition_audition_date, 11);
         } 
         if (substr($this->audition_audition_date, 13, 1) == ".") 
         { 
            $this->audition_audition_date = substr($this->audition_audition_date, 0, 13) . ":" . substr($this->audition_audition_date, 14, 2) . ":" . substr($this->audition_audition_date, 17);
         } 
         $conteudo_x =  $this->audition_audition_date;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->audition_audition_date, "YYYY-MM-DD HH:II:SS  ");
             $this->audition_audition_date = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
         if (!NM_is_utf8($this->audition_audition_date))
         {
             $this->audition_audition_date = sc_convert_encoding($this->audition_audition_date, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->audition_audition_date = str_replace('<', '&lt;', $this->audition_audition_date);
         $this->audition_audition_date = str_replace('>', '&gt;', $this->audition_audition_date);
         $this->Texto_tag .= "<td>" . $this->audition_audition_date . "</td>\r\n";
   }
   //----- audition_audition_title
   function NM_export_audition_audition_title()
   {
         $this->audition_audition_title = html_entity_decode($this->audition_audition_title, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->audition_audition_title = strip_tags($this->audition_audition_title);
         if (!NM_is_utf8($this->audition_audition_title))
         {
             $this->audition_audition_title = sc_convert_encoding($this->audition_audition_title, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->audition_audition_title = str_replace('<', '&lt;', $this->audition_audition_title);
         $this->audition_audition_title = str_replace('>', '&gt;', $this->audition_audition_title);
         $this->Texto_tag .= "<td>" . $this->audition_audition_title . "</td>\r\n";
   }
   //----- basic_information_nationality
   function NM_export_basic_information_nationality()
   {
         nmgp_Form_Num_Val($this->look_basic_information_nationality, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_basic_information_nationality))
         {
             $this->look_basic_information_nationality = sc_convert_encoding($this->look_basic_information_nationality, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_basic_information_nationality = str_replace('<', '&lt;', $this->look_basic_information_nationality);
         $this->look_basic_information_nationality = str_replace('>', '&gt;', $this->look_basic_information_nationality);
         $this->Texto_tag .= "<td>" . $this->look_basic_information_nationality . "</td>\r\n";
   }

   //----- 
   function grava_arquivo_rtf()
   {
      global $nm_lang, $doc_wrap;
      $this->Rtf_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $rtf_f       = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      require_once($this->Ini->path_third      . "/rtf_new/document_generator/cl_xml2driver.php"); 
      $text_ok  =  "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n"; 
      $text_ok .=  "<DOC config_file=\"" . $this->Ini->path_third . "/rtf_new/doc_config.inc\" >\r\n"; 
      $text_ok .=  $this->Texto_tag; 
      $text_ok .=  "</DOC>\r\n"; 
      $xml = new nDOCGEN($text_ok,"RTF"); 
      fwrite($rtf_f, $xml->get_result_file());
      fclose($rtf_f);
   }

   function nm_conv_data_db($dt_in, $form_in, $form_out)
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
       nm_conv_form_data($dt_out, $form_in, $form_out);
       return $dt_out;
   }
   function progress_bar_end()
   {
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants'][$path_doc_md5][1] = $this->Tit_doc;
      $Mens_bar = $this->Ini->Nm_lang['lang_othr_file_msge'];
      if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
          $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
      }
      $this->pb->setProgressbarMessage($Mens_bar);
      $this->pb->setDownloadLink($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $this->pb->setDownloadMd5($path_doc_md5);
      $this->pb->completed();
   }
   //---- 
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_admin_all_applicants'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>All Application :: RTF</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
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
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <?php
 if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts))
 {
 ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->str_google_fonts ?>" />
 <?php
 }
 ?>
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">RTF</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_admin_all_applicants_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_admin_all_applicants"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="volta_grid"> 
</FORM> 
</BODY>
</HTML>
<?php
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
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
              if ($cont2 >= $tam_campo)
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
}

?>
