<?php
/**
 * Registration Form
 */
function choma_registration_form()
{
    // only show the registration form to non-logged-in members
    if (!is_user_logged_in()) {
        // check if registration is enabled
        $registration_enabled = get_option('users_can_register');

        // if enabled
        if ($registration_enabled) {
            $output = choma_registration_fields();
        } else {
            $output = __('User registration is not enabled');
        }
        return $output;
    }
}
add_shortcode('register_form', 'choma_registration_form');

// registration form fields
function choma_registration_fields()
{
    ob_start(); ?>
    <h3 class="choma_header"><?php _e('Register New Account'); ?></h3>

    <?php
    // show any error messages after form submission
    choma_register_messages(); ?>

    <form id="choma_registration_form" class="choma_form" action="" method="POST">
        <p>
            <label for="choma_user_Login"><?php _e('Username'); ?></label>
            <input name="choma_user_login" id="choma_user_login" class="choma_user_login" type="text" />
        </p>
        <p>
            <label for="choma_user_email"><?php _e('Email'); ?></label>
            <input name="choma_user_email" id="choma_user_email" class="choma_user_email" type="email" />
        </p>
        <p>
            <label for="choma_user_first"><?php _e('First Name'); ?></label>
            <input name="choma_user_first" id="choma_user_first" type="text" class="choma_user_first" />
        </p>
        <p>
            <label for="choma_user_last"><?php _e('Last Name'); ?></label>
            <input name="choma_user_last" id="choma_user_last" type="text" class="choma_user_last" />
        </p>
        <p>
            <label for="password"><?php _e('Password'); ?></label>
            <input name="choma_user_pass" id="password" class="password" type="password" />
        </p>
        <p>
            <label for="password_again"><?php _e('Password Again'); ?></label>
            <input name="choma_user_pass_confirm" id="password_again" class="password_again" type="password" />
        </p>
        <p>
            <input type="hidden" name="choma_user" value="<?php echo wp_create_nonce('choma-user'); ?>" />
            <input type="submit" value="<?php _e('Register Your Account'); ?>" />
        </p>
    </form>
    <?php
    return ob_get_clean();
}

// register a new user
function choma_add_new_user()
{
    if (isset($_POST["choma_user_login"]) && wp_verify_nonce($_POST['choma_user'], 'choma-user')) {
        $user_login        = $_POST["choma_user_login"];
        $user_email        = $_POST["choma_user_email"];
        $user_first         = $_POST["choma_user_first"];
        $user_last         = $_POST["choma_user_last"];
        $user_pass        = $_POST["choma_user_pass"];
        $pass_confirm     = $_POST["choma_user_pass_confirm"];

        // this is required for username checks
        require_once(ABSPATH . WPINC . '/registration.php');

        if (username_exists($user_login)) {
            // Username already registered
            choma_errors()->add('username_unavailable', __('Username already taken'));
        }
        if (!validate_username($user_login)) {
            // invalid username
            choma_errors()->add('username_invalid', __('Invalid username'));
        }
        if ($user_login == '') {
            // empty username
            choma_errors()->add('username_empty', __('Please enter a username'));
        }
        if (!is_email($user_email)) {
            //invalid email
            choma_errors()->add('email_invalid', __('Invalid email'));
        }
        if (email_exists($user_email)) {
            //Email address already registered
            choma_errors()->add('email_used', __('Email already registered'));
        }
        if ($user_pass == '') {
            // passwords do not match
            choma_errors()->add('password_empty', __('Please enter a password'));
        }
        if ($user_pass != $pass_confirm) {
            // passwords do not match
            choma_errors()->add('password_mismatch', __('Passwords do not match'));
        }

        $errors = choma_errors()->get_error_messages();

        // if no errors then cretate user
        if (empty($errors)) {

            $new_user_id = wp_insert_user(
                [
                    'user_login'        => $user_login,
                    'user_pass'             => $user_pass,
                    'user_email'        => $user_email,
                    'first_name'        => $user_first,
                    'last_name'            => $user_last,
                    'user_registered'    => date('Y-m-d H:i:s'),
                    'role'                => 'subscriber'
                ]
            );
            if ($new_user_id) {
                // send an email to the admin
                wp_new_user_notification($new_user_id);

                // log the new user in
                wp_setcookie($user_login, $user_pass, true);
                wp_set_current_user($new_user_id, $user_login);
                do_action('wp_login', $user_login);

                // send the newly created user to the home page after logging them in
                wp_redirect(home_url());
                exit;
            }
        }
    }
}
add_action('init', 'choma_add_new_user');

// used for tracking error messages
function choma_errors()
{
    static $wp_error; // global variable handle
    return $wp_error ?? ($wp_error = new WP_Error(null, null, null));
}

// displays error messages from form submissions
function choma_register_messages()
{
    if ($codes = choma_errors()->get_error_codes()) {
        echo '<div class="choma_errors">';
        // Loop error codes and display errors
        foreach ($codes as $code) {
            $message = choma_errors()->get_error_message($code);
            echo '<span class="error"><strong>' . __('Error') . '</strong>: ' . $message . '</span><br/>';
        }
        echo '</div>';
    }
}
