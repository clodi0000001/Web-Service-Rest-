function start(){
    $(document).ready(function(){
    $.ajax({
        type: "GET",
        url: "http://localhost/tpsit/Web-Service-Rest-/student.php/?id=2",
        dataType: 'json',
        success: function(data) {
            var response="";
            for(var student in data){
                response += "<tr>"+
                "<td>"+data[student].name+"</td>"+
                "<td>"+data[student].surname+"</td>"+
                "<td>"+data[student].sidi_Code+"</td>"+
                "<td>"+data[student].sidi_Tax+"</td>"+
                "<td><a href='update.php?id="+data[student].id+"'>Edit</a> | <a href='#' onClick=Remove('"+data[student].id+"')>Remove</a></td>"+
                "</tr>";
            }
            $(response).appendTo($("#students"));
        }
    });
  });
}
function Remove(id){
    $.ajax({
        url: "http://localhost/tpsit/Web-Service-Rest-/student.php/?"+id,
          type: "POST",
          contentType: 'String',
          success: function (data,textstatus,jQxhr){
            alert("Successfully Removed Employee!");
        }
      });
  }

/*
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "http://localhost/tpsit/Web-Service-Rest-/student.php", false);
    xhttp.send(null);
    var response= "";
    var data = JSON.parse(xhttp.responseText);
    for (var student = 0; student < data.length; student++) {
        response += "<tr>"+
        "<td>"+data[student].name+"</td>"+
        "<td>"+data[student].surname+"</td>"+
        "<td>"+data[student].sidi_Code+"</td>"+
        "<td>"+data[student].sidi_Tax+"</td>"+
        "<td><a href='update.php?id="+data[student].id+"'>Edit</a> | <a href='#' onClick=Remove('"+data[student].id+"')>Remove</a></td>"+
        "</tr>";
    }
    document.getElementById("students").innerHTML = response;
    <-script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"-->   */
  