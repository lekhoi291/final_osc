$(document).ready(function(){
    $('#form_upload').on('submit', function(event){
        event.preventDefault();
        var data_form = $(this).serialize();
        $.ajax({
            url: "php/check.php",
            method: "POST",  
            data: data_form,
            dataType: "JSON",
            success: function(data){
                if(data.error != ''){
                    $('#form_upload')[0].reset();
                    $('#file_message').html(data.file_error);
                    $('#name_message').html(data.error);
                    $('#description_message').html(data.description_error);
                    $('#price_message').html(data.price_error);
                    $('#color_message').html(data.color_error);
                    $('#catagory_message').html(data.catagory_error);
                    load_integer();
                }
            }
        })
    });

    load_integer();

    function load_integer(){
        $.ajax({
            url: 'function/select_integer.php',
            method: "GET",
            success:function(data){
                $('#display_integer').html(data);
            }
        });
    }

    $('#delete').click(function(){
        if(confirm("Are you sure you want to do this?")){
            var id = [];

            $(':checkbox:checked').each(function(i){
                id[i] = $(this).val();
            });

            if(id.length===0){
                alert("Please select at least one.")
            }
            else{
                $.ajax({
                    url: 'function/delete.php',
                    method: 'POST',
                    data: {id:id},
                    success:function(data){
                        load_integer();
                    }
                });
            }
        }
        else{
            return false;
        }
    });
});