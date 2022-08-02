$(document).ready(function () {
  $("#button_tweet").click(function (e) {
    var text_tweet = $("#text_tweet").val();
    if (thereIsText(text_tweet)) {
      $.ajax({
        type: "POST",
        url: "include_tweet.php",
        data: $("#form_tweet").serialize(),
        success: function () {
          atualizaTweet();
        },
      });
    }
  });

  function thereIsText(t) {
    return t.length > 0;
  }

  function atualizaTweet() {
    $.ajax({
      url: "get_tweet.php",
      success: function (response) {
        $("#tweets").html(response);
      },
    });
  }

  atualizaTweet();

  $("#find").focusin(function (e) {
    $("#find").addClass("white");
    $("#friends").addClass("hint");
    $(".fade-in-text").fadeIn();
    $(".fade-in-text").text(
      "As you type, you will see your future friends here"
    );
  });

  $("#find").focusout(function (e) {
    $(".fade-in-text").text("");
    $(".fade-in-text").fadeOut();
    $("#friends").removeClass("hint");
    $("#find").removeClass("white");
  });

  $("#find").keyup(function (e) {
    $("#friends").removeClass("hint");
    $("#friends").addClass("friends-field");
    var input = $(this).val();
    if (input != "") {
      $.ajax({
        type: "POST",
        url: "search_friends.php",
        data: { input: input },
        success: function (response) {
          $("#friends").text(response);
        },
      });
    } else {
      $(".fade-in-text").text(
        "As you type, you will see your future friends here"
      );
    }
  });
});
