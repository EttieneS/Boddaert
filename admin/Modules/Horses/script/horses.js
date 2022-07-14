function OpenAddEditModal() {
  $('#AddEditModal').modal('toggle');
}

function ShowCreateAddEditModal(){
  $('#AddEditModal').modal('show');
}

function CloseAddEditModal() {
  $('#AddEditModal').modal('hide');
}
function GetPositions(id) {
  $.ajax({
    url: "script/getpositions.php",
    method: "POST",
    dataType: 'json',
    data: {
      action: "getpositions"
    },
    success: function(data) {
      var position = [];
      var ocurrence = [];

      for(var i in data) {
        position.push(data[i].position + " Place");
        ocurrence.push(data[i].ocurrence);
      }

      var chartdata = {
        labels: position,
        datasets : [
          {
            label: 'Horse Performance',
            backgroundColor: 'rgba(200, 200, 200, 0.75)',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: ocurrence
          }
        ]
      };

      var ctx = $("#mycanvas");

      var barGraph = new Chart(ctx, {
        type: 'bar',
        data: chartdata,
        options: {
          responsive: false,
          scales: {
            yAxes: [{
                  ticks: {
                    stepSize: 1,
                    max: 30,
                    min: 0
                  }
            }],
          },
        }
      });
    },
    error: function(data) {
      console.log(data);
    }
  });
}
