$(document).ready(function () {
  updateTweets();
  updateFollowers();
  updateTimeline();

  function updateTweets() {
    $.ajax({
      type: "post",
      url: "countTweets.php",
      success: function (response) {
        $("#countTweets").text(response);
      },
    });
  }

  function updateFollowers() {
    $.ajax({
      type: "post",
      url: "countFollowers.php",
      success: function (response) {
        $("#countFollowers").text(response);
      },
    });
  }

  function updateTimeline() {
    $.ajax({
      url: "get_tweet.php",
      success: function (response) {
        $("#tweets").html(response);
      },
    });
  }

  $("#button_tweet").click(function (e) {
    var text_tweet = $("#text_tweet").val();
    if (thereIsText(text_tweet)) {
      $.ajax({
        type: "POST",
        url: "include_tweet.php",
        data: $("#form_tweet").serialize(),
        success: function () {
          cleanTweetTextField();
          updateTimeline();
          updateTweets();
        },
      });
    }
  });

  function thereIsText(t) {
    return t.length > 0;
  }

  function cleanTweetTextField() {
    $("#text_tweet").val("");
  }

  function populateFriends(input) {
    $.ajax({
      type: "POST",
      url: "search_friends.php",
      data: { input: input },
      success: function (response) {
        $(".friend-field").html(response);
        followButtonClickEvent();
        unfollowButtonClickEvent();
      },
    });
  }

  function followButtonClickEvent() {
    $(".btn-follow").click(function (e) {
      var id = $(this).data("id_user");
      addFriend(id);
      buttonToFollowing(id);
    });
  }

  function addFriend(id) {
    $.ajax({
      type: "post",
      url: "follow.php",
      data: { id: id },
      success: function () {
        updateFollowers();
      },
    });
  }

  function buttonToFollowing(id) {
    $("#follow_button_" + id).hide();
    $("#unfollow_button_" + id).show();
  }

  function incrementFriends(n) {
    //counta numero de amigos no bd e atualiza na tela
  }

  function unfollowButtonClickEvent() {
    $(".btn-unfollow").click(function (e) {
      var id = $(this).data("id_user");
      removeFriend(id);
      buttonToFollow(id);
    });
  }

  function removeFriend(id) {
    $.ajax({
      type: "post",
      url: "unfollow.php",
      data: { id: id },
      success: function () {
        updateFollowers();
      },
    });
  }

  function buttonToFollow(id) {
    $("#unfollow_button_" + id).hide();
    $("#follow_button_" + id).show();
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
