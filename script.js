$(document).ready(function () {
  $("#btn_login").click(function () {
    if (usernameEmpty() || passwordEmpty()) return false; //don't let page reload
  });

  function usernameEmpty() {
    if ($("#campo_usuario").val() == "") {
      $("#campo_senha").css("border", "1px solid #ced4da");
      $("#campo_usuario").focus();
      $("#campo_usuario").css("border", "1px solid red");
      return true;
    }
  }
  function passwordEmpty() {
    if ($("#campo_senha").val() == "") {
      $("#campo_usuario").css("border", "1px solid #ced4da");
      $("#campo_senha").focus();
      $("#campo_senha").css("border", "1px solid red");
      return true;
    }
  }
});
