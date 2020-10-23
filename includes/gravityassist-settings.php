<?php

/**
* Provide a admin area view for the plugin
*
* This file is used to markup the admin-facing aspects of the plugin.
*
* @link       https://thriveweb.com.au/the-lab/
* @since      1.0.0
*
* @package    Gravityassist
* @subpackage Gravityassist/includes
*/

function GL_page() {
  ?>
  <div class="GL-admin">
    <div class="wrap">
      <h1>Gravity Lables</h1>
      <div class="GL-section" style="margin: 0 0 40px;">

        <div class="GL-pod">
          <form method="post" action="options.php">
            <?php settings_fields( 'gl-options-group' ); ?>
            <?php do_settings_sections( 'gl-options-group' ); ?>
            <p class="GL-flex">
              <label for="label_colour">Border Radius</label>
              <input type="number" name="borderRadius" value="<?= (get_option( 'borderRadius' ) ? get_option( 'borderRadius' ) : 10); ?>" />
            </p>
            <p class="GL-flex">
              <label for="label_colour">Font Size</label>
              <input type="number" name="fontSize" value="<?= (get_option( 'fontSize' ) ? get_option( 'fontSize' ) : 10); ?>" />
            </p>
            <p class="GL-flex">
              <label for="label_colour">Colour messageText</label>
              <input type="text" name="messageText" value="<?= get_option( 'messageText' ); ?>" class="GL-field" data-default-color="#000000" />
            </p>
            <p class="GL-flex">
              <label for="label_colour">Colour messageBackground</label>
              <input type="text" name="messageBackground" value="<?= get_option( 'messageBackground' ); ?>" class="GL-field" data-default-color="#000000" />
            </p>
            <p class="GL-flex">
              <label for="label_colour">Colour primary</label>
              <input type="text" name="primary" value="<?= get_option( 'primary' ); ?>" class="GL-field" data-default-color="#000000" />
            </p>
            <p class="GL-flex">
              <label for="label_colour">Colour hightlight</label>
              <input type="text" name="hightlight" value="<?= get_option( 'hightlight' ); ?>" class="GL-field" data-default-color="#000000" />
            </p>
            <p class="GL-flex">
              <label for="label_colour">Colour midGrey</label>
              <input type="text" name="midGrey" value="<?= get_option( 'midGrey' ); ?>" class="GL-field" data-default-color="#000000" />
            </p>
            <p class="GL-flex">
              <label for="label_colour">Colour error</label>
              <input type="text" name="error" value="<?= get_option( 'error' ); ?>" class="GL-field" data-default-color="#000000" />
            </p>
            <p class="GL-flex">
              <label for="label_colour">Colour inputBackground</label>
              <input type="text" name="inputBackground" value="<?= get_option( 'inputBackground' ); ?>" class="GL-field" data-default-color="#000000" />
            </p>

            <hr>

            <p class="GL-flex">
              <label for="label_colour">Label Top Position</label>
              <input type="number" name="label_top" value="<?= (get_option( 'label_top' ) ? get_option( 'label_top' ) : 10); ?>" />
            </p>
            <p class="GL-flex">
              <label for="label_colour">Label Left position</label>
              <input type="number" name="label_left" value="<?= (get_option( 'label_left' ) ? get_option( 'label_left' ) : 10); ?>" />
            </p>
            <p class="GL-flex">
              <label for="label_colour">Translate Y</label>
              <input type="number" name="translateY" value="<?= (get_option( 'translateY' ) ? get_option( 'translateY' ) : 200); ?>" />
            </p>
            <p class="GL-flex">
              <label for="label_colour">Placeholder Colour</label>
              <input type="text" name="placeholder_colour" value="<?= get_option( 'placeholder_colour' ); ?>" class="GL-field" data-default-color="#000000" />
            </p>
            <?php submit_button(); ?>
          </form>
        </div>

      </div>
    </div>
  </div>
  <?php
}
