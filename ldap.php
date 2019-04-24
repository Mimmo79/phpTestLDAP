<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$ldap_dn = "uid=".$_POST["username"].",ou=scientists,dc=example,dc=com"; //DC=intranet,DC=comune,DC=forli,DC=fc,DC=it -- dc=example,dc=com
$ldap_password = $_POST["password"];

$ldap_con =   ldap_connect("ldap.forumsys.com", 389); //w2k12dcforl01.intranet.comune.forli.fc.it -- ldap.forumsys.com 
ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION,3);

//verifico la connessione al server
if ($ldap_con === FALSE) {
    die("<p> Couldn't connect to LDAP service </p>");
    } else {
        echo "<p> connessione avvenuta con successo </p>";
}




if(@ldap_bind($ldap_con, $ldap_dn, $ldap_password)){
    echo "Autenticato";
}else{
    echo "Credenziali non valide";
}
        




