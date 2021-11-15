$(function() {
  $("#myTable").tablesorter();

  $('#favbtn').click(function(){
    var clickBtnValue = $(this).val();
    data =  {'action': clickBtnValue};
    $.post("ajax.php", data, function (response) {
        // Response div goes here.
        console.log("Resp: " + response);
    });
  });
});


