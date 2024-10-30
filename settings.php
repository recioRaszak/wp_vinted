<?php
// Register settings
function vinted_register_settings() {
    register_setting('vinted_options_group', 'vinted_user_id');
    register_setting('vinted_options_group', 'vinted_api_host');
    register_setting('vinted_options_group', 'vinted_country');
    register_setting('vinted_options_group', 'vinted_secret_key');
}
add_action('admin_init', 'vinted_register_settings');

// Create settings menu
function vinted_create_menu() {
    add_options_page('Vinted Settings', 'Vinted Settings', 'manage_options', 'vinted-settings', 'vinted_settings_page');
}
add_action('admin_menu', 'vinted_create_menu');

// Settings page HTML
function vinted_settings_page() {
    ?>
    <div class="wrap">
        <h1>Vinted Settings</h1>
        <form method="post" action="options.php">
            <?php settings_fields('vinted_options_group'); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">User ID (Integer num, easy to get from your profile URL)</th>
                    <td><input type="text" placeholder="987654..." name="vinted_user_id" value="<?php echo esc_attr(get_option('vinted_user_id')); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">API Host (Get a free API subscription from rapidapi.com and get it from here)</th>
                    <td><input type="text" placeholder="https://..." name="vinted_api_host" value="<?php echo esc_attr(get_option('vinted_api_host')); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Country (en, es, fr, pt...)</th>
                    <td><input type="text" placeholder="es" name="vinted_country" value="<?php echo esc_attr(get_option('vinted_country')); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Secret Key (Get a free API subscription from rapidapi.com and get it from here)</th>
                    <td><input type="text" placeholder="35fccc1c7emshb10d80184c8fd76p17e9eejsn2cb74a27b955" name="vinted_secret_key" value="<?php echo esc_attr(get_option('vinted_secret_key')); ?>" /></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
  