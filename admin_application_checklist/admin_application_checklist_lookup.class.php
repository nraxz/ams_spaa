<?php
class admin_application_checklist_lookup
{
//  
   function lookup_active(&$active) 
   {
      $conteudo = "" ; 
      if ($active == "Y")
      { 
          $conteudo = "Active";
      } 
      if ($active == "N")
      { 
          $conteudo = "De-activated";
      } 
      if (!empty($conteudo)) 
      { 
          $active = $conteudo; 
      } 
   }  
}
?>
