<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //parametri di connessione
        $ldap_dn        =   "cn=read-only-admin,dc=example,dc=com"; //cn=read-only-admin,dc=example,dc=com
        $ldap_password  =   "password"; //password
        $ldap_con       =   ldap_connect("ldap.forumsys.com"); //ldap.forumsys.com
        ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION,3);
        
        //verifica della connessione
        if(ldap_bind($ldap_con, $ldap_dn, $ldap_password)){
            echo "accesso eseguito correttamente";
            //creo un  per la ricerca es. uid=newton
            $filter     = "(uid=*)";
            $result     = ldap_search($ldap_con, "dc=example,dc=com", $filter) or exit("Non è possibile eseguire la ricerca");
            $entries    = ldap_get_entries($ldap_con, $result);
            
            print "<pre>";
            var_dump($entries);
            print "</pre>";
                    
        } else {
            echo "errore, accesso non eseguito";
        }
     
        
        
        ?>
    </body>
</html>
