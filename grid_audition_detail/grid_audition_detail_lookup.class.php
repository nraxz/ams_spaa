<?php
class grid_audition_detail_lookup
{
//  
   function lookup_venue_id(&$conteudo , $venue_id) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $venue_id; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($venue_id) === "" || trim($venue_id) == "&nbsp;" || trim($venue_id) === "" || trim($venue_id) == "&nbsp;" || trim($venue_id) === "" || trim($venue_id) == "&nbsp;" || trim($venue_id) === "" || trim($venue_id) == "&nbsp;" || trim($venue_id) === "" || trim($venue_id) == "&nbsp;" || trim($venue_id) === "" || trim($venue_id) == "&nbsp;" || trim($venue_id) === "" || trim($venue_id) == "&nbsp;" || trim($venue_id) === "" || trim($venue_id) == "&nbsp;" || trim($venue_id) === "" || trim($venue_id) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT venue_name + ', ' + address_1 + '<br> ' + county + '<br> ' + postcode  FROM venue where id = $venue_id order by venue_name, address_1, country, postcode" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(venue_name, ', ', address_1,'<br> ', county,'<br> ', postcode)  FROM venue where id = $venue_id order by venue_name, address_1, country, postcode" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT venue_name&', '&address_1&'<br> '&county&'<br> '&postcode  FROM venue where id = $venue_id order by venue_name, address_1, country, postcode" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT venue_name||', '||address_1||'<br> '||county||'<br> '||postcode  FROM venue where id = $venue_id order by venue_name, address_1, country, postcode" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT venue_name||', '||address_1||'<br> '||county||'<br> '||postcode  FROM venue where id = $venue_id order by venue_name, address_1, country, postcode" ; 
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
//  
   function lookup_audition_id(&$conteudo , $audition_id) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $audition_id; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($audition_id) === "" || trim($audition_id) == "&nbsp;" || trim($audition_id) === "" || trim($audition_id) == "&nbsp;" || trim($audition_id) === "" || trim($audition_id) == "&nbsp;" || trim($audition_id) === "" || trim($audition_id) == "&nbsp;" || trim($audition_id) === "" || trim($audition_id) == "&nbsp;" || trim($audition_id) === "" || trim($audition_id) == "&nbsp;" || trim($audition_id) === "" || trim($audition_id) == "&nbsp;" || trim($audition_id) === "" || trim($audition_id) == "&nbsp;" || trim($audition_id) === "" || trim($audition_id) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT audition_title + ' on ' + str_replace (convert(char(10),audition_date,102), '.', '-') + ' ' + convert(char(8),audition_date,20)  FROM audition where id = $audition_id order by audition_title, audition_date" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(audition_title, ' on ', audition_date)  FROM audition where id = $audition_id order by audition_title, audition_date" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT audition_title&' on '&audition_date  FROM audition where id = $audition_id order by audition_title, audition_date" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT audition_title||' on '||audition_date  FROM audition where id = $audition_id order by audition_title, audition_date" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT audition_title||' on '||audition_date  FROM audition where id = $audition_id order by audition_title, audition_date" ; 
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
//  
   function lookup_program(&$conteudo , $program) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $program; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      $verif_cmp_mult = explode(";", $conteudo);
      $conteudo = "";
      foreach ($verif_cmp_mult as $cada_ocorr)
      {
          if (!empty($conteudo))
          {
              $conteudo .= "','";
          }
          $conteudo .= $cada_ocorr;
      }
      $program = $conteudo;
      $nm_comando = "select name from programs where id  IN ('$program') order by name" ; 
      $conteudo = "" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF) 
          { 
                 if ($y != 0)
                 { 
                     $conteudo .= "<br>";
                 } 
                 $y++; 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        if ($x != 0)
                        { 
                            $conteudo .= " - ";
                        } 
                        $conteudo .= trim($rx->fields[$x]); 
                 }
                 $rx->MoveNext() ;
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
   function lookup_specialise_area(&$conteudo , $specialise_area) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $specialise_area; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      $verif_cmp_mult = explode(";", $conteudo);
      $conteudo = "";
      foreach ($verif_cmp_mult as $cada_ocorr)
      {
          if (!empty($conteudo))
          {
              $conteudo .= "','";
          }
          $conteudo .= $cada_ocorr;
      }
      $specialise_area = $conteudo;
      $nm_comando = "select name from specialist_pathway where id  IN ('$specialise_area') order by name" ; 
      $conteudo = "" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF) 
          { 
                 if ($y != 0)
                 { 
                     $conteudo .= "<br>";
                 } 
                 $y++; 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        if ($x != 0)
                        { 
                            $conteudo .= " - ";
                        } 
                        $conteudo .= trim($rx->fields[$x]); 
                 }
                 $rx->MoveNext() ;
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
