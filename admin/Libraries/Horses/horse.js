function Add(){
  var horse = $('#addHorseForm').serializeArray();

  $.ajax({
    url: "../../Controllers/horsecontroller.php",
    method: 'post',
    data: {
      action: 'add',
      horse: horse
    },
    type: "application/json",
    success: function(response) {
        alert(response);
    },
    error: function(jqXHR, textStatus, errorThrown){
      alert("error");
    }
  });
}

function SelectHorse() {
  alert("selected");
}
