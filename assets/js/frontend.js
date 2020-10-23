/**
 * Plugin Template frontend js.
 *
 *  @package WordPress Plugin Template/JS
 */

jQuery(function ($) {
  $(window).load(function () {
    console.log("load");
    // checking form inputs for values
    const inputEl = document.querySelectorAll(
      '.gfield input[type="text"], .gfield input[type="url"], .gfield input[type="number"], .gfield input[type="phone"], .gfield input[type="password"], .gfield input[type="email"], .gfield textarea'
    );
    inputEl.forEach((inputEl) => {
      let inputValue = $(inputEl).val();
      if (inputValue == "") {
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
    $(
      '.gfield input[type="text"], .gfield input[type="url"], .gfield input[type="number"], .gfield input[type="phone"], .gfield input[type="password"], .gfield input[type="email"], .gfield textarea'
    ).focus(function () {
      $(this).parents(".gfield").addClass("focused");
    });
    $(
      '.gfield input[type="text"], .gfield input[type="url"], .gfield input[type="number"], .gfield input[type="phone"], .gfield input[type="password"], .gfield input[type="email"], .gfield textarea'
    ).blur(function () {
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
