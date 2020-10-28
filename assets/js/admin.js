/**
 * Plugin Template admin js.
 *
 *  @package WordPress Plugin Template/JS
 */

jQuery(function ($) {
  $(document).ready(function () {
    // colour picker
    $(".gfassist-field").wpColorPicker();
    var sample = $("#samples");
    sample.hide();
    $("#gfassist-show_demo").on("click", function (e) {
      e.preventDefault();
      sample.slideToggle();
    });
  });
});
