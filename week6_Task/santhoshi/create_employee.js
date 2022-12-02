$(document).ready(function(){
    var workingStatus = '<option value="0" disabled selected>Select</option>';
    $.ajax({
        url: 'http://localhost/WEEK5/workingstatus.php',
        type: 'GET',
        success: function (response, status){
            response = JSON.parse(response);
            if (response.status){
                for(var i = 0; i<response.data.length; i++){
                    workingStatus += "<option value="+response.data[i]['id']+">"+response.data[i]['description']+"</option>";
                }
                $('#workingstatus').html(workingStatus);
                return;
            }
            // <option>Working</option>
            alert(response.message);
        }
    })

    var designations = '<option value="0" disabled selected>Select</option>';
    $.ajax({
        url: 'http://localhost/WEEK5/designation.php',
        type: 'GET',
        success: function (response, status){
           response = JSON.parse(response);  
            if (response.status){
                for(var i = 0; i<response.data.length; i++){
                   designations += "<option value="+response.data[i]['id']+">"+response.data[i]['description']+"</option>";
                }
                $('#designation').html(designations);
                return;
                console.log(details);
            }
        }
    })

    var location = '<option value="0" disabled selected>Select</option>';
    $.ajax({
        url: 'http://localhost/WEEK5/location.php',
        type: 'GET',
        success: function (response, status){
           response = JSON.parse(response);  
            if (response.status){
                for(var i = 0; i<response.data.length; i++){
                   location += "<option value="+response.data[i]['id']+">"+response.data[i]['district']+"</option>";
                }
                $('#location').html(location);
                return;
                console.log(details);
            }
        }
    })

$("#submitbutton").click(function(){
    var formData = {
        firstName: $("#first").val(),
        lastName: $("#last").val(),
        surname: $("#surname").val(),
        dateOfJoining: $("#joining").val(),
        dateOfBirth: $("#birth").val(),
        gender:$("#gender").val(),
        phone:$("#phonenumber").val(),
        workingStatus:$("#workingstatus").val(),
        designation:$("#designation").val(),
        location:$("#location").val(),
    }
    $.ajax({
        url: 'http://localhost/WEEK5/create_employee.php',
        datatype: 'json',
        type:'POST',
        data: formData,
        success: function (response, status, xmlHTTPReq) {
        response = JSON.parse(response);
        if(response.status) {
            swal(response.message, "", "success");
            resetFormData();
            return;
        }
        swal(response.message, "", "error");
        console.log(details);
        // $("#first").val(details.message.firstname);
        }
    })
}) 

})

function resetFormData(){
    $('.input-field').val('');
    $('.select-field').val('0');
}