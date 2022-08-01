$(document).ready(function () {
  $("#btn_login").click(function () {
    if (usernameEmpty() || passwordEmpty()) {
      return false;
    } //don't let page reload if fields are empty
  });

  $("#entrar").click(function () {
    $("#campo_usuario").focus();
  });

  function usernameEmpty() {
    if ($("#campo_usuario").val() == "") {
      $("#campo_senha").css("border", "1px solid #ced4da");
      $("#campo_usuario").focus();
      $("#campo_usuario").css("border", "1px solid red");
      $(".attention").text("Please provide username!");
      return true;
    }
  }
  function passwordEmpty() {
    if ($("#campo_senha").val() == "") {
      $("#campo_usuario").css("border", "1px solid #ced4da");
      $("#campo_senha").focus();
      $("#campo_senha").css("border", "1px solid red");
      $(".attention").text("Please provide password!");
      return true;
    }
  }
});
