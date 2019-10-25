<?php
class grid_admin_all_register_lookup
{
//  
   function lookup_sec_users_active(&$sec_users_active) 
   {
      $conteudo = "" ; 
      if ($sec_users_active == "Y")
      { 
          $conteudo = "Yes";
      } 
      if ($sec_users_active == "No")
      { 
          $conteudo = "N";
      } 
      if (!empty($conteudo)) 
      { 
          $sec_users_active = $conteudo; 
      } 
   }  
}
?>
