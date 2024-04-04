<?php
/*
Plugin Name: Idena Connect
Description: Plugin for connecting to Idena.
Version: 0.93
Author: Blockside
*/

// Add the login button to the wp-login.php page
add_action('login_form', 'idena_connexion_button_login_page');
function idena_connexion_button_login_page() {
    $idena_login_url = 'https://app.idena.io/dna/signin';
    $callback_url = plugins_url('idena-auth-callback.php', __FILE__);
    $nonce_endpoint = 'http://212.132.116.195/startSession.sql'; // Put your nonce endpoint here
    $authentication_endpoint = 'http://212.132.116.195/authenticate.sql'; // Put your authentication endpoint here
    
    // Generate a unique identifier for the session
    $session_token = uniqid();

    $idena_login_url .= '?token=' . $session_token;
    $idena_login_url .= '&callback_url=' . $callback_url;
    $idena_login_url .= '&nonce_endpoint=' . $nonce_endpoint;
    $idena_login_url .= '&authentication_endpoint=' . $authentication_endpoint;

    ?>
    <p>
        <a href="<?php echo $idena_login_url; ?>" class="button button-primary">
            Connect with Idena
        </a>
    </p>
    <?php
}
?>
