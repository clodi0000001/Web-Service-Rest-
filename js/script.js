function start(){
    $(document).ready(function(){
    $.ajax({
        type: "GET",
        url: "http://localhost/tpsit/Web-Service-Rest-/student.php?",
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
            alert("Successfully Removed Student!");
        }
      });
  }

function add(){
    var name = document.getElementById("name").value;;
    var surname = document.getElementById("surname").value;
    var sidi_code = document.getElementById("sidi_code").value;
    var sidi_tax = document.getElementById("sidi_tax").value;

    var postData ={
        "name": name,
        "surname": surname,
        "sidi_code": sidi_code,
        "tax_code": sidi_tax
    };
    jQuery.ajax ({
        url:  "http://localhost/tpsit/Web-Service-Rest-/student.php/?",
        type: "POST",
        data: JSON.stringify(postData),
        dataType: "json",
        contentType: "application/json",
        success: function(data,textStatus,jQxhr){
            alert("Successfully add Student!");
        }
      });
}


/*
    <-script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"-->   */
  