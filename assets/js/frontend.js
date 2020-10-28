/**
 * Plugin Template frontend js.
 *
 *  @package WordPress Plugin Template/JS
 */

jQuery(function ($) {
  const targets =
    "li.gfassist-text input,\
   li.gfassist-address input,\
   li.gfassist-name input,\
   li.gfassist-date input,\
   li.gfassist-website input,\
   li.gfassist-number input,\
   li.gfassist-phone input,\
   li.gfassist-password input,\
   li.gfassist-email input,\
   li.gfassist-textarea textarea";
  //
  // '.gfield input[type="text"],\
  // .gfield input[type="url"],\
  // .gfield input[type="tel"],\
  // .gfield input[type="number"],\
  // .gfield input[type="phone"],\
  // .gfield input[type="password"],\
  // .gfield input[type="email"],\
  // .gfield textarea';

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
