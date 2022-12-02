$(document).ready(function(){    
})
function getEmployeeDetails(){
    $.ajax({
        url: 'http://localhost/WEEK5/get_employee_details.php',
        type: 'GET',
        data : {
            'designationId': $('#designation').val()
        },
        success: function (response, status){
           let output = JSON.parse(response);
           if(output.status){
            $('#employeedetails tbody').html('');
                  output.data.forEach((employeeDetails,i) => {
                    $('#employeedetails tbody').append('<tr>'+
                    '<td>'+(++i)+'</td>'+
                    '<td>'+employeeDetails.name+'</td>'+
                    '<td>'+employeeDetails.date_of_joining+'</td>'+
                    '<td>'+employeeDetails.date_of_birth+'</td>'+
                    '<td>'+employeeDetails.gender+'</td>'+
                    '<td>'+employeeDetails.phone+'</td>'+
                    '<td>'+employeeDetails.workingstatus+'</td>'+
                    '<td>'+employeeDetails.designation+'</td>'+
                    '<td>'+employeeDetails.location+'</td>'+
                    '<td><a href="#" class="btn btn-info btn-sm m-2" id="edit" onchange="getEmployeeDetails('+employeeDetails.id+')">Edit</a>'+
                    '<a href="#" class="btn btn-info btn-sm m-2" data-bs-toggle="modal" data-bs-target="#exampleModal" id="updatesalary" onchange="getEmployeeDetails('+employeeDetails.id+')">UpdateSalary</a>'+
                    '<a href="#" class="btn btn-danger btn-sm m-2" id="delete" onclick="deleteEmployee('+employeeDetails.id+')">Delete</a>'+
                    '</td></tr>');
                });

           } 
        }
    })
}

// DELETE ACTION
function deleteEmployee(employeeId){
    $.ajax({
        url: 'http://localhost/WEEK5/delete_employee.php',
        type: 'POST',
        data: {Id:employeeId},
        success: function (response, status){
            response = JSON.parse(response); 
        if(response.status){
            swal(response.message, "", "success");
             getEmployeeDetails();
            return;
        }
        swal(response.message, "", "error");
        console.log('fghbjnkm');
        }
})
}

