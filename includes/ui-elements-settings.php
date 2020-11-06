<?php
/**
* Provide a admin area view for the plugin
*
* This file is used to markup the admin-facing aspects of the plugin.
*
* @link       https://thriveweb.com.au/the-lab/
* @since     1.0.3
*
* @package    Ui_elements
* @subpackage Ui_elements/includes
*/

function ui_elements_page() {
  ?>
  <div class="ui_elements-admin">
    <div class="wrap ui_elements-relative">
      <h1>UI Elements Options</h1>
      <div class="ui_elements-logo">
        <a target="_blank" rel="noreferrer" href="https://thriveweb.com.au">
          <img src="<?= esc_url( plugins_url( 'images/Thrive_logo.gif', __FILE__ ) ); ?>" alt="Thrive digital">
        </a>
      </div>
      <div class="ui_elements-section ui_elements-mainsplit" style="margin: 0 0 40px;">

        <div class="ui_elements-pod">
          <form method="post" action="options.php">
            <?php settings_fields( 'ui_elements-options-group' ); ?>
            <?php do_settings_sections( 'ui_elements-options-group' ); ?>

            <div class="ui_elements-flex-row">
              <div class="ui_elements-section-box">
                <h3>Form Colours</h3>
                <p class="ui_elements-flex">
                  <label for="primary">Label Colours</label>
                  <input type="text" name="primary" value="<?= (get_option( 'primary' ) ? get_option( 'primary' ) : '#000000' ); ?>" class="ui_elements-field" />
                </p>
                <p class="ui_elements-flex">
                  <label for="hightlight">Hightlight Colour</label>
                  <input type="text" name="hightlight" value="<?= (get_option( 'hightlight' ) ? get_option( 'hightlight' ) : '#28a9ff' ); ?>" class="ui_elements-field" />
                </p>
                <p class="ui_elements-flex">
                  <label for="midGrey">De-selected Grey</label>
                  <input type="text" name="midGrey" value="<?= (get_option( 'midGrey' ) ? get_option( 'midGrey' ) : '#898989' ); ?>" class="ui_elements-field" />
                </p>

              </div>
              <div class="ui_elements-section-box">
                <h3>Confirmation styles</h3>
                <p class="ui_elements-flex">
                  <label for="messageText">Message Text</label>
                  <input type="text" name="messageText" value="<?= (get_option( 'messageText' ) ? get_option( 'messageText' ) : '#000000' ); ?>" class="ui_elements-field" />
                </p>
                <p class="ui_elements-flex">
                  <label for="messageBackground">Message Background</label>
                  <input type="text" name="messageBackground" value="<?= (get_option( 'messageBackground' ) ? get_option( 'messageBackground' ) : '#e0e0e0' ); ?>" class="ui_elements-field" />
                </p>
                <p class="ui_elements-flex">
                  <label for="error">Error Color</label>
                  <input type="text" name="error" value="<?= (get_option( 'error' ) ? get_option( 'error' ) : '#ff3a3a' ); ?>" class="ui_elements-field" />
                </p>
              </div>

            </div>

            <div class="ui_elements-flex-row">
              <div class="ui_elements-section-box">
                <h3>Input styles</h3>
                <p class="ui_elements-flex">
                  <label for="borderRadius">Border Radius</label>
                  <input type="number" name="borderRadius" value="<?= (get_option( 'borderRadius' ) ? get_option( 'borderRadius' ) : 4); ?>" />
                </p>
                <p class="ui_elements-flex">
                  <label for="fontSize">Font Size</label>
                  <input type="number" name="fontSize" value="<?= (get_option( 'fontSize' ) ? get_option( 'fontSize' ) : 14); ?>" />
                </p>
                <p class="ui_elements-flex">
                  <label for="placeholder_colour">Placeholder Colour</label>
                  <input type="text" name="placeholder_colour" value="<?= (get_option( 'placeholder_colour' ) ? get_option( 'placeholder_colour' ) : '#000000' ); ?>" class="ui_elements-field" />
                </p>
              </div>
              <div class="ui_elements-section-box">
                <h3>Label positions</h3>
                <p class="ui_elements-flex">
                  <label for="label_top">Label Top Position</label>
                  <input type="number" name="label_top" value="<?= (get_option( 'label_top' ) ? get_option( 'label_top' ) : 15); ?>" />
                </p>
                <p class="ui_elements-flex">
                  <label for="label_left">Label Left position</label>
                  <input type="number" name="label_left" value="<?= (get_option( 'label_left' ) ? get_option( 'label_left' ) : 10); ?>" />
                </p>
                <p class="ui_elements-flex">
                  <label for="translateY">Translate Y - Top position after animation</label>
                  <input type="number" name="translateY" value="<?= (get_option( 'translateY' ) ? get_option( 'translateY' ) : 220); ?>" />
                </p>
              </div>
            </div>
            <?php submit_button(); ?>
          </form>
        </div>

        <div class="ui_elements-info-pod">
          <h3>Check out your forms!</h3>
          <p>You now have label animations and modern input styles for select, radio and checkbox input types.</p>
          <p><a id="ui_elements-show_demo" href="#sample">Show Demo</a></p>
          <div id="samples">
            <img src="<?= esc_url( plugins_url( 'images/text.gif', __FILE__ ) ); ?>" alt="text sample">
            <img src="<?= esc_url( plugins_url( 'images/checkbox.gif', __FILE__ ) ); ?>" alt="checkbox sample">
            <img src="<?= esc_url( plugins_url( 'images/radio.gif', __FILE__ ) ); ?>" alt="radio sample">
            <img src="<?= esc_url( plugins_url( 'images/select.gif', __FILE__ ) ); ?>" alt="select sample">
          </div>
        </div>

      </div>
    </div>
  </div>
  <?php
}
