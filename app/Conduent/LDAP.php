<?php
namespace App\Conduent;

class LDAP
{
    public static function authenticate($username, $password, $domain, $connect)
    {
        if (env('APP_DEBUG')) {
            return true;
        }
        if (empty($username) or empty($password)) {
            return false;
        }

        $ldapconn = @ldap_connect($connect) or die("Could not connect to LDAP server.");
        $result = false;

        if ($ldapconn) {
            $ldapbind = @ldap_bind($ldapconn, $username.'@'.$domain, $password);
            if ($ldapbind) {
                $result = true;
            }
            @ldap_unbind($ldapconn);
        }
        return $result;
    }
}
