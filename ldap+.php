<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Created by Joe of ExchangeCore.com
 */

/**
A distinguished name (usually just shortened to “DN”) uniquely identifies an entry
For example, the DN “uid=john.doe,ou=People,dc=example,dc=com” has four RDNs:

uid=john.doe
ou=People
dc=example
dc=com
 
*/




if(isset($_POST['username']) && isset($_POST['password'])){

    $adServer = "ldap.forumsys.com"; //ldap://domaincontroller.mydomain.com
	
    $ldap = ldap_connect($adServer,389);
    $username = $_POST['username'];
    $password = $_POST['password'];

    //$ldaprdn = 'mydomain' . "\\" . $username;
    $ldaprdn = "uid=".$username.",dc=example,dc=com";
    

    ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

    $bind = @ldap_bind($ldap, $ldaprdn, $password);


    if ($bind) {
        $filter="(sAMAccountName=$username)";
        //$result = ldap_search($ldap,"dc=MYDOMAIN,dc=COM",$filter);
        $result = ldap_search($ldap,"dc=example,dc=com",$filter);
        ldap_sort($ldap,$result,"sn");
        $info = ldap_get_entries($ldap, $result);
        for ($i=0; $i<$info["count"]; $i++)
        {
            if($info['count'] > 1)
                break;
            echo "<p>You are accessing <strong> ". $info[$i]["sn"][0] .", " . $info[$i]["givenname"][0] ."</strong><br /> (" . $info[$i]["samaccountname"][0] .")</p>\n";
            echo '<pre>';
            var_dump($info);
            echo '</pre>';
            $userDn = $info[$i]["distinguishedname"][0]; 
        }
        @ldap_close($ldap);
    } else {
        $msg = "Invalid username / password";
        echo $msg;
    }

}else{
?>
    <form action="#" method="POST">
        <label for="username">Username: </label><input id="username" type="text" name="username" /> 
        <label for="password">Password: </label><input id="password" type="password" name="password" />        
        <input type="submit" name="submit" value="Submit" />
    </form>
<?php } ?> 

