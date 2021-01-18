$(document).ready(() => {
  $(".input_step_update").click((e) => {
    e.preventDefault();
    $(".lesson_steps").hide();
    console.log($(this).val());
  });
});
