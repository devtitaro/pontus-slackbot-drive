
/**
 * Pontus Slackbot
 *
 * Details: This file is part of the pontus slackbot file
 * Author: titaro
 *
 */

 // If you don't know jquery abeg no touch this file o
$(document).ready(function() {
 $("#menu" ).click(function() {
    $("#show").slideToggle("slow");
  });

  $("#bar1" ).click(function() {
    $('#s-bar').slideDown("slow");
    $("#cus").slideUp("fast");
    $("#c-label").slideUp("fast");
    $("#mul").slideUp("fast");
    $("#m-label").slideUp("fast");
    $("#bar1").css("background-color", "#000");
    $("#bar2").css("background-color", "#008080");
    $("#bar3").css("background-color", "#008080");
  });

  $("#bar2" ).click(function() {
    $("#cus").slideDown("slow");
    $("#c-label").slideDown("slow");
    $('#s-bar').slideUp("fast");
    $("#mul").slideUp("fast");
    $("#m-label").slideUp("fast");
    $("#bar1").css("background-color", "#008080");
    $("#bar2").css("background-color", "#000");
    $("#bar3").css("background-color", "#008080");
  });

  $("#bar3" ).click(function() {
    $("#mul").slideDown("slow");
    $("#m-label").slideDown("slow");
    $('#s-bar').slideUp("fast");
    $('#cus').slideUp("fast");
    $('#c-label').slideUp("fast");
    $("#bar1").css("background-color", "#008080");
    $("#bar2").css("background-color", "#008080");
    $("#bar3").css("background-color", "#000");
  });

});
