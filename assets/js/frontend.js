/**
 * Plugin Template frontend js.
 *
 *  @package WordPress Plugin Template/JS
 */

jQuery(function ($) {
  const targets =
    "li.ui_elements-text input,\
   li.ui_elements-address input,\
   li.ui_elements-name input,\
   li.ui_elements-date input,\
   li.ui_elements-website input,\
   li.ui_elements-number input,\
   li.ui_elements-phone input,\
   li.ui_elements-password input,\
   li.ui_elements-email input,\
   li.ui_elements-textarea textarea";
  $(window).load(function () {
    console.log("load");
    // checking form inputs for values
    const inputEl = document.querySelectorAll(targets);
    inputEl.forEach((inputEl) => {
      let inputValue = $(inputEl).val();
      console.log(inputValue);
      if (inputValue === "") {
        $(inputEl).removeClass("filled");
        $(inputEl).parents(".gfield").removeClass("focused");
      } else {
        $(inputEl).addClass("filled");
        $(inputEl).parents(".gfield").addClass("focused");
      }
    });
  });
  $(document).ready(function () {
    console.log("ready");
    // gravity form label focus
    $(targets).focus(function () {
      $(this).parents(".gfield").addClass("focused");
    });
    $(targets).blur(function () {
      var inputValue = $(this).val();
      if (inputValue == "") {
        $(this).removeClass("filled");
        $(this).parents(".gfield").removeClass("focused");
      } else {
        $(this).addClass("filled");
      }
    });
  });
});
