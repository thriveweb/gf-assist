<?php
/**
* Provide a admin area view for the plugin
*
* This file is used to markup the admin-facing aspects of the plugin.
*
* @link       https://thriveweb.com.au/the-lab/
* @since      1.0.0
*
* @package    GFassist
* @subpackage GFassist/includes
*/

function gfassist_page() {
  ?>
  <div class="gfassist-admin">
    <div class="wrap gfassist-relative">
      <h1>Assist For Gravity Froms - Options</h1>
      <div class="gfassist-logo">
        <a target="_blank" rel="noreferrer" href="https://thriveweb.com.au">
          <img src="<?= plugins_url() . '/gf-assist/assets/images/Thrive_logo.gif'; ?>" alt="Thrive digital">
        </a>
      </div>
      <div class="gfassist-section gfassist-mainsplit" style="margin: 0 0 40px;">

        <div class="gfassist-pod">
          <form method="post" action="options.php">
            <?php settings_fields( 'gfassist-options-group' ); ?>
            <?php do_settings_sections( 'gfassist-options-group' ); ?>

            <div class="gfassist-flex-row">
              <div class="gfassist-section-box">
                <h3>Form Colours</h3>
                <p class="gfassist-flex">
                  <label for="primary">Label Colours</label>
                  <input type="text" name="primary" value="<?= get_option( 'primary' ); ?>" class="gfassist-field" data-default-color="#000000" />
                </p>
                <p class="gfassist-flex">
                  <label for="hightlight">Hightlight Colour</label>
                  <input type="text" name="hightlight" value="<?= get_option( 'hightlight' ); ?>" class="gfassist-field" data-default-color="#000000" />
                </p>
                <p class="gfassist-flex">
                  <label for="midGrey">De-selected Grey</label>
                  <input type="text" name="midGrey" value="<?= get_option( 'midGrey' ); ?>" class="gfassist-field" data-default-color="#000000" />
                </p>

              </div>
              <div class="gfassist-section-box">
                <h3>Confirmation styles</h3>
                <p class="gfassist-flex">
                  <label for="messageText">Message Text</label>
                  <input type="text" name="messageText" value="<?= get_option( 'messageText' ); ?>" class="gfassist-field" data-default-color="#000000" />
                </p>
                <p class="gfassist-flex">
                  <label for="messageBackground">Message Background</label>
                  <input type="text" name="messageBackground" value="<?= get_option( 'messageBackground' ); ?>" class="gfassist-field" data-default-color="#000000" />
                </p>
                <p class="gfassist-flex">
                  <label for="error">Error Color</label>
                  <input type="text" name="error" value="<?= get_option( 'error' ); ?>" class="gfassist-field" data-default-color="#000000" />
                </p>
              </div>

            </div>

            <div class="gfassist-flex-row">
              <div class="gfassist-section-box">
                <h3>Input styles</h3>
                <p class="gfassist-flex">
                  <label for="borderRadius">Border Radius</label>
                  <input type="number" name="borderRadius" value="<?= (get_option( 'borderRadius' ) ? get_option( 'borderRadius' ) : 4); ?>" />
                </p>
                <p class="gfassist-flex">
                  <label for="fontSize">Font Size</label>
                  <input type="number" name="fontSize" value="<?= (get_option( 'fontSize' ) ? get_option( 'fontSize' ) : 13); ?>" />
                </p>
                <p class="gfassist-flex">
                  <label for="placeholder_colour">Placeholder Colour</label>
                  <input type="text" name="placeholder_colour" value="<?= get_option( 'placeholder_colour' ); ?>" class="gfassist-field" data-default-color="#000000" />
                </p>
              </div>
              <div class="gfassist-section-box">
                <h3>Label positions</h3>
                <p class="gfassist-flex">
                  <label for="label_top">Label Top Position</label>
                  <input type="number" name="label_top" value="<?= (get_option( 'label_top' ) ? get_option( 'label_top' ) : 10); ?>" />
                </p>
                <p class="gfassist-flex">
                  <label for="label_left">Label Left position</label>
                  <input type="number" name="label_left" value="<?= (get_option( 'label_left' ) ? get_option( 'label_left' ) : 10); ?>" />
                </p>
                <p class="gfassist-flex">
                  <label for="translateY">Translate Y - Top position after animation</label>
                  <input type="number" name="translateY" value="<?= (get_option( 'translateY' ) ? get_option( 'translateY' ) : 200); ?>" />
                </p>
              </div>
            </div>
            <?php submit_button(); ?>
          </form>
        </div>

        <div class="gfassist-info-pod">
          <h3>Check out your forms!</h3>
          <p>You now have label animations and modern input styles for select, radio and checkbox input types.</p>
          <p>If you have any issues leave them on <a target="_blank" rel="noreferrer" href="https://github.com/thriveweb/gfassist">Github</a></p>
        </div>

      </div>

    </div>
  </div>
  <?php
}
