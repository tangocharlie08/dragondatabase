<?php
function encrypt_password($password){
    return md5(config_item('salt').$password);
}
?>
