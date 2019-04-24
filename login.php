<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Autenticazione con Active Directory</title>
        <style>
            body {text-align: center}
            from {margin: 0 auto; width: 500px;}
            input {padding: 10px; font-size:20;}
        </style>
            
    </head>
    <body>
        <h1>Autenticazione con Active Directory</h1>
        <form action="ldap+.php" method="post">
            <input type="text" name="username" /><br>
            <input type="text" name="password" /><br>
            <input type="submit" value="Login" /><br>          
        </form>
    </body>
</html>
