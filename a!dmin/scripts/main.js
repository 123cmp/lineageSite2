$(".status").change(function(){
        data = [];
        data.push($(this).children(":selected").val());
        data.push($(this).children(":selected").attr("id"));

        data = JSON.stringify(data);
        //console.log(data);

    $.ajax({
        method: 'POST',
        data: {"data" : data},
        url: '/services/orders.php',
        success: function(data){
            data = JSON.stringify(data);
            console.log(data);
        }
    });
    });
