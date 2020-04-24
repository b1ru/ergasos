$(document).ready(function () {
  var w = Math.round($('.col-3').width() - 20);
  $('.fb-post').attr('data-width', w);
  $('.rightside').css('overflow-x', 'scroll');
});
