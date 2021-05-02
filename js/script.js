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
                "<td>"+data[student].tax_Code+"</td>"+
                "<td><a href='#' onclick='update("+data[student].id+")'>Edit</a> | <a href='#' onclick='Remove("+data[student].id+")'>Remove</a></td>"+
                "</tr>";
            }

            $(response).appendTo($("#students"));

        }
    });
  });
}
function getOne(){
    var id = prompt("Inser id for reserch:", "");;
    $(document).ready(function(){
    $.ajax({
        type: "GET",
        url: "http://localhost/tpsit/Web-Service-Rest-/student.php/?id="+id,
        dataType: 'json',
        success: function(data) {           
            var response="";
            for(var student in data){
                response += "<tr>"+
                "<td>"+data[student].name+"</td>"+
                "<td>"+data[student].surname+"</td>"+
                "<td>"+data[student].sidi_Code+"</td>"+
                "<td>"+data[student].tax_Code+"</td>"+
                "<td><a href='#' onclick='update("+data[student].id+")'>Edit</a> | <a href='#' onclick='Remove("+data[student].id+")'>Remove</a></td>"+
                "</tr>";
            }

            $(response).appendTo($("#students"));

        }
    });
  });
}
function Remove(id){
    $.ajax({
        url: "http://localhost/tpsit/Web-Service-Rest-/detale.php/?id="+id,
          type: "DELETE",
          contentType: 'json',
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
        error: function (data) {
            alert(data.responseText);
        },
        success: function(data){
                if (data['status'] == true) {
                    alert("Successfully Added Studeny!");
                }
        }
      });
}
function update(ID){
    var _name = prompt("Please enter your name:", "");
    var _surname = prompt("Please enter your surname:", "");
    var _sidi_code= prompt("Please enter your sidi code:", "");
    var _tax_code = prompt("Please enter your tax code:", "");
    $.ajax(
    {
        type: "POST",
        url: 'http://localhost/tpsit/Web-Service-Rest-/student.php?id='+ID,
        dataType: 'json',
        data: {
            id: ID,
            name: _name,
            email: _surname,        
            password: _sidi_code,
            phone: _tax_code
        },
        error: function (result) {
            alert(result.responseText);
        },
        success: function (result) {
            if (result['status'] == true) {
                alert("Successfully Updated Student!");
            }
            else {
                alert(result['message']);
            }
        }
    });
}

/*
    <-script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"-->   */
    //onClick=Remove("+data[student].id+")
  //"<td><a href='update.php?id="+data[student].id+"'>Edit</a> | <a onClick=Remove("+data[student].id+")>Remove</a></td>"+