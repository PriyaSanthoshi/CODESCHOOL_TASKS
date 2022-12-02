$(document).ready(function(){
// $("#menus").click(function(){
// })
let menus = '<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>';
 $.ajax({
    url: 'http://localhost/WEEK5/get_menus.php',
    // datatype: 'json',
    type: 'GET',  
    success: function (data, status) {
        data = JSON.parse(data);
        if(!data.status) {

        }

        for(var i = 0; i<data.data.length; i++) {
            menus += "<a href='"+data.data[i]['slug']+".html'>"+data.data[i]['menu']+"</a>";
        }
        $('#mySidenav').html(menus);
        console.log(menus);
    }
 })
})