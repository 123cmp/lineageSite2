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
var r_id ;
$('.sales').click(function(){
    $('.alert').hide();
    r_id = $(this).attr('sid');
    $('.table-sales > tbody').empty();
    $.ajax({
        method: 'POST',
        data: {'r_id' : r_id},
        url: './services/gold.php/?action=get_sales',
        success: function(data){
            data = JSON.parse(data);
            $.each(data, function(i,v){
                var row = '<tr sale-id="'+v.id+'"><td>'+v.count.replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1 ')+'</td><td>'+v.value+'%</td><td><a class="btn btn-danger sale-del" sid="'+v.id+'">del</a></td></tr>';
                $('.table-sales > tbody').append(row);

            });
            bindDelete();

           
        }
    });
});
$('.add-sale').click(function(){
    var count = $('#sale-count').val();
    var value = $('#sale-val'). val();
    if(count == '' || value == ''){
        $('.alert').show();
    } else {
       $('.alert').hide();
       $.ajax({
            method: 'POST',
            data: {'count' : count,
                'value': value,
                'r_id': r_id,
            },
            url: './services/gold.php/?action=add_sale',
            success: function(id){
                var row = '<tr sale-id="'+id+'"><td>'+count.replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1 ')+'</td><td>'+value+'%</td><td><a class="btn btn-danger sale-del" sid="'+id+'">del</a></td></tr>';
                $('.table-sales > tbody').append(row);
                bindDelete();
                $('#sale-count').val('');
                $('#sale-val'). val('');
        }
       });
    }


})

function bindDelete(){

    $('.sale-del').click(function(){
        var s_id = $(this).attr('sid');
        $.ajax({
            method: 'POST',
            data: {'s_id' : s_id},
            url: './services/gold.php/?action=delete_sale', 
            success : function(){
                $('[sale-id='+s_id+']').remove();
            }
        })
    });
}

