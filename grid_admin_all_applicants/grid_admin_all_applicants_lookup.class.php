<?php
class grid_admin_all_applicants_lookup
{
//  
   function lookup_venue_application_detail_venue_id(&$conteudo , $application_detail_venue_id) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $application_detail_venue_id; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($application_detail_venue_id) === "" || trim($application_detail_venue_id) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      $nm_comando = "select venue_name from venue where id = $application_detail_venue_id order by venue_name" ; 
      $conteudo = "" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          if (isset($rx->fields[0]))  
          { 
              $conteudo = trim($rx->fields[0]); 
          } 
          $save_conteudo1 = $conteudo ; 
          $rx->Close(); 
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
      if ($conteudo === "") 
      { 
          $conteudo = "&nbsp;";
          $save_conteudo1 = $conteudo ; 
      } 
   }  
//  
   function lookup_venue_application_detail_audition_id(&$conteudo , $application_detail_audition_id) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $application_detail_audition_id; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($application_detail_audition_id) === "" || trim($application_detail_audition_id) == "&nbsp;" || trim($application_detail_audition_id) === "" || trim($application_detail_audition_id) == "&nbsp;" || trim($application_detail_audition_id) === "" || trim($application_detail_audition_id) == "&nbsp;" || trim($application_detail_audition_id) === "" || trim($application_detail_audition_id) == "&nbsp;" || trim($application_detail_audition_id) === "" || trim($application_detail_audition_id) == "&nbsp;" || trim($application_detail_audition_id) === "" || trim($application_detail_audition_id) == "&nbsp;" || trim($application_detail_audition_id) === "" || trim($application_detail_audition_id) == "&nbsp;" || trim($application_detail_audition_id) === "" || trim($application_detail_audition_id) == "&nbsp;" || trim($application_detail_audition_id) === "" || trim($application_detail_audition_id) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT audition_title + ' on ' + str_replace (convert(char(10),audition_date,102), '.', '-') + ' ' + convert(char(8),audition_date,20)  FROM audition where id = $application_detail_audition_id order by audition_title, audition_date" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(audition_title,' on ', audition_date)  FROM audition where id = $application_detail_audition_id order by audition_title, audition_date" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT audition_title&' on '&audition_date  FROM audition where id = $application_detail_audition_id order by audition_title, audition_date" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT audition_title||' on '||audition_date  FROM audition where id = $application_detail_audition_id order by audition_title, audition_date" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT audition_title||' on '||audition_date  FROM audition where id = $application_detail_audition_id order by audition_title, audition_date" ; 
      } 
      $conteudo = "" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          if (isset($rx->fields[0]))  
          { 
              $conteudo = trim($rx->fields[0]); 
          } 
          $save_conteudo1 = $conteudo ; 
          $rx->Close(); 
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
      if ($conteudo === "") 
      { 
          $conteudo = "&nbsp;";
          $save_conteudo1 = $conteudo ; 
      } 
   }  
}
?>
