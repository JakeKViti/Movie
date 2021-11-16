$(function() {
  $("#myTable").tablesorter();

  $('#favbtn').click(function(){
    var movietitle = $(this).val();
    var releaseDate = this.dataset.value1;
    var genreId = this.dataset.value2;
    debugger
    data =  {
      'title': movietitle,
      'date': releaseDate,
      'genre': genreId
    };
    $.post("ajax.php", data, function (response) {
        // Response div goes here.
        console.log("Resp: " + response);
    });
  });
});


