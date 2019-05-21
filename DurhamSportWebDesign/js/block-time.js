/**
 * Created by Visual Studio Code.
 * User: ZHENG CHENGLONG
 * Date: 2019-05-12
 * Time: 17: 20
 */
$(document).ready(function(){
    $("#submit2").click(function(e){
        var eventName = $('#eventName').val();
        var facilityId = $('#facilityId2').val();
        var datefrom = $('#datefrom').val();        
        var dateto = $('#dateto').val();
        var timefrom = $('#timefrom').val();        
        var timeto = $('#timeto').val();

        var dow= "";
        if($('#monday').is(":checked")){
            dow+="1";
        }
        if($('#tuesday').is(":checked")){
            dow+="2";
        }
        if($('#wednesday').is(":checked")){
            dow+="3";
        }
        if($('#thursday').is(":checked")){
            dow+="4";
        }
        if($('#friday').is(":checked")){
            dow+="5";
        }
            
        $.ajax({
            url: "block_booking-confirm.php",
            type: 'POST',
            dataType: 'TEXT',
            data:{eventName:eventName,facilityId:facilityId,datefrom:datefrom,dateto:dateto,timefrom:timefrom,timeto:timeto,dow:dow},
            success: function (data) {
                if(data){
                    alert("Add block_booking data successful!");
                }else{
                    alert("Add block_booking data failure!");
                }
            }
        });
    });
    
});