$(document).ready(function () {
    var designations = '<option value="0" disabled selected>Select</option>';
    $.ajax({
        url: 'http://localhost/WEEK5/designation.php',
        type: 'GET',
        /*   success: function (response, status){
             response = JSON.parse(response);  
              if (response.status){
                  for(var i = 0; i<response.data.length; i++){
                     designations += "<option value="+response.data[i]['id']+">"+response.data[i]['description']+"</option>";
                  }
                  $('#designation').html(designations);
                  return;
                  console.log(details);
              }
          } */
        success: function (response, status) {
            response = JSON.parse(response);
            console.log(response)
            if (response.status) {
                for (var i = 0; i < response.data.length; i++) {
                    designations += "<option value=" + response.data[i]['id'] + ">" + response.data[i]['description'] + "</option>";
                }
                $('#designation').html(designations);
                return;
                console.log(details);
            }
        }
    })
//salarycomponents
var salarycomponents = '<option value="0" disabled selected>Select</option>';
$.ajax({
    url: 'http://localhost/WEEK5/salary_component.php',
    type: 'GET',
    success: function (response, status) {
        response = JSON.parse(response);
        console.log(response)
        if (response.status) {
            for (var i = 0; i < response.data.length; i++) {
                salarycomponents += "<option value=" + response.data[i]['id'] + ">" + response.data[i]['description'] + "</option>";
            }
            $('#salarycomponent').html(salarycomponents);
            return;
            console.log(details);
        }
    }
})



})