$(document).ready(function(){
    $('.image_container').css('display', 'none');
    function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
      
        reader.onload = function(e) {
            $('.preview_image').css('background-image', 'url('+e.target.result +')');
            $('.preview_image').hide();
            $('.preview_image').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
        }
    }

    $("#file-input").change(function(){
        $('.image_container').css('display','block');
        $('.upload_wrapper').css('display', 'none');
        var filename = this.files[0].name;
        $('.image-name').text(filename);
        readURL(this);
    });

    $(".remove_image").click(function(){
        $(".preview_image").css('background-image', '');
        $(".image_container").css('display', 'none');
        $('.upload_wrapper').css('display','block').addClass('fade-in');
        $("#file-input").val(''); 
    });
});