$(document).ready(function () {
  atualizaTweet();

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

  function populateFriends(input) {
    $.ajax({
      type: "POST",
      url: "search_friends.php",
      data: { input: input },
      success: function (response) {
        $(".friend-field").html(response);
        followButton();
        unfollowButton();
      },
    });
  }

  function followButton() {
    $(".follow").click(function (e) {
      var id = $(this).attr("id");
      addFriend(id);
    });
  }

  function unfollowButton() {
    $(".following").click(function (e) {
      var id = $(this).attr("id");
      removeFriend(id);
    });
  }

  function addFriend(id) {
    $.ajax({
      type: "post",
      url: "follow.php",
      data: { id: id },
      success: function () {
        buttonToFollowing(id);
        incrementFriends(1);
      },
    });
  }

  function buttonToFollowing(id) {
    var id = "#" + id;
    $(id).removeClass("btn-primary follow");
    $(id).addClass("btn-secondary following");
    $(id).text("Following");
  }

  function incrementFriends(n) {
    //counta numero de amigos no bd e atualiza na tela
  }

  function removeFriend(id) {
    $(".following").click(function (e) {
      $.ajax({
        type: "post",
        url: "unfollow.php",
        data: { id: id },
        success: function () {
          buttonTofollow(id);
          incrementFriends(-1);
        },
      });
    });
  }

  function buttonTofollow(id) {
    var id = "#" + id;
    $(id).removeClass("btn-secondary following");
    $(id).addClass("btn-primary follow");
    $(id).text("Follow");
  }

  function cleanFields() {
    $("#newSearchField").removeClass("hint");
    $("#newSearchField").removeClass("friend-field");
    $("#find").removeClass("white");
    $("#newSearchField").html("");
  }

  function createArea(typeArea) {
    $("#newSearchField").addClass(typeArea);
    $("#newSearchField").fadeIn();
    $("#find").addClass("white");
  }

  function showHintText() {
    createArea("hint");
    setTimeout(() => {
      $("#newSearchField").text(
        "As you type, your future friends you show up here"
      );
    }, 150);
  }

  function switchAreas() {
    $("#newSearchField").removeClass("hint");
    $("#newSearchField").addClass("friend-field");
  }

  $("#find").focusin(function () {
    var input = $(this).val();
    if (input == "") {
      showHintText();
    } else {
      createArea("friend-field");
      populateFriends(input);
    }
  });

  $("#find").focusout(function () {
    var input = $(this).val();
    if (input == "") {
      cleanFields();
    }
  });

  $("#find").keyup(function () {
    var input = $(this).val();
    if (input != "") {
      switchAreas(); //switch from hint to friends-area
      populateFriends(input);
    } else {
      cleanFields();
    }
  });
});
