/**
 * Created by Visual Studio Code.
 * User: ZHENG CHENGLONG
 * Date: 2019-05-12
 * Time: 17: 20
 */

document.getElementById("submit1").onclick=function(){
    $.ajax({
        type: "POST",
        url: "../php/get-time.php" ,
        data: $('#form1').serialize(),
        success: function () {
         var result=document.getElementById('txtHint').innerHTML=data.msg;
        },
        error : function() {
         var result=document.getElementById('txtHint').innerHTML="error:"+data.msg;
        }
       });

/*  var request=new XMLHttpRequest();    
    request.open("POST","get-time.php");

    var data="facilityName="+document.getElementById("facilityName").value
     +"&date="+document.getElementById("date").value;

    request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    request.send(data);

    request.onreadystatechange=function(){
        if(request.readyState===4){
            if(request.status===200){
                var data=JSON.parse(request.responseText);
                if(data.success){
                    document.getElementById('txtHint').innerHTML=data.msg;
                }else{
                    document.getElementById('txtHint').innerHTML="error:"+data.msg;
                }
            }else{
                alert("error:"+request.status);
            }
        }
    }
*/
}