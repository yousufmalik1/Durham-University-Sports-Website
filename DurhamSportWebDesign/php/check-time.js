/**
 * Created by Visual Studio Code.
 * User: ZHENG CHENGLONG
 * Date: 2019-05-12
 * Time: 17: 20
 */
$(document).ready(function(){

    function refresh() {
        var facilityId = $('#facilityId').val();
        var date = $('#date').val();

        $.ajax({
            url: "get-time.php",
            type: 'POST',
            dataType: 'TEXT',
            data:{facilityId:facilityId,date:date},
            success: function (data) {
                $('#txtHint').html(data);
            }
        });
    }

    refresh();

    $("#facilityId").change(function(){
        refresh();
       
    });

    $("#date").change(function(){
        refresh();
    });

    $("#submit1").click(function(){

        var bookingtitle = $('#bookingtitle').val();
        var facilityId = $('#facilityId').val();
        var date = $('#date').val();
        var time = $('#time').val();
    
        $.ajax({
            url: "booking-confirm.php",
            type: 'POST',
            dataType: 'TEXT',
            data:{bookingtitle:bookingtitle,facilityId:facilityId,date:date,time:time},
            success: function (data) {
                if(data){
                    window.location.href= '../html/pages-confirm-mail.html';
                }else{
                    alert("Send email failure!");
                }
            }
        });
    });
});