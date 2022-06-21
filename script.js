$(document).ready(function () {
  $("#createUser").click(function (e) {
    $.ajax({
      type: "POST",
      url: "inscrevase.php",
      data: { id: "formNewUser" },

      success: function () {
        alert("User created successfully!");
        window.location.href = "index.php";
      },
      error: function (response) {
        alert("User not created, reason: " + response.responseText);
      },
    });
  });

  $("#btn_login").click(function (e) {
    $.ajax({
      type: "POST",
      url: "index.php",
      data: data,
      success: function (response) {
        alert("Login ok!!");
      },
      error: function (response) {
        alert("User not found!");
      },
    });
  });
});
