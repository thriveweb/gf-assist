/**
 * Plugin Template admin js.
 *
 *  @package WordPress Plugin Template/JS
 */

jQuery(function ($) {
  $(document).ready(function () {
    // colour picker
    $(".ui_elements-field").wpColorPicker();
    var sample = $("#samples");
    sample.hide();
    $("#ui_elements-show_demo").on("click", function (e) {
      e.preventDefault();
      sample.slideToggle();
    });
  });
});
