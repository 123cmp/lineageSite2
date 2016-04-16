$(".status").change(function(){
        data = [];
        data.push($(this).children(":selected").val());
        data.push($(this).children(":selected").attr("id"));

        data = JSON.stringify(data);

    $.ajax({
        method: 'POST',
        data: {"data" : data},
        url: '../services/orders.php',
        success: function(data){
            data = JSON.stringify(data);
        }
    });
});

$('#server_group').hide();

$('#server_toggle').change(function(){
    if($(this).prop("checked")){
       $('#server_group').show(); 
    } else {
       $('#server_input').val('');
       $('#server_group').hide(); 
    }

});