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
    $("#friends").addClass("search-box");
    $("#friends").text("As you type, you will see your future friends here");
  });

  $("#find").focusout(function (e) {
    $("#find").removeClass("white");
    $("#friends").removeClass("search-box");
    $("#friends").text("");
  });

  $("#find").keyup(function (e) {
    var input = $(this).val();
    if (input != "") {
      $.ajax({
        type: "POST",
        url: "search.php",
        data: { input: input },
        success: function (response) {
          $("#friends").text(response);
        },
      });
    }
  });
});
