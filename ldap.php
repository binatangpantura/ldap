<?php $user = 'admin';
$password = 'Admin@11';
$host = '192.168.11.101';
$port = 389;
$basedn = 'dc=ci,dc=delima,dc=com';
$group = 'Users';
$ldaprdn = 'uid=admin,dc=ci,dc=delima,dc=com';

$ad = ldap_connect("ldap://$host", $port);
if ($ad) {
    echo "Connected" . "<br/>";
} else {
    echo ldap_error($ad) . "<br/>";
}
ldap_set_option($ad, LDAP_OPT_PROTOCOL_VERSION, 3);
ldap_set_option($ad, LDAP_OPT_REFERRALS, 0);

//  $ldapBind = ldap_bind($ad, "{$user}@{$domain}", $password); // 1.
//  $ldapBind = ldap_bind($ad, $user, $password); // 2.
//    $ldapBind = ldap_bind($ad, $ldaprdn, $password); // 3.
  $ldapBind = ldap_bind($ad, null, null); // 4.

if ($ldapBind) {
    echo "Binded" . "<br/>";
} else {
    echo ldap_error($ad) . "<br/>";
}
?>
