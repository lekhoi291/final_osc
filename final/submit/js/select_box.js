// $(document).ready(function(){
//     $('.Domains').ready(function(){
//         $('select').change(function(){
//             $("select option:selected").each(function(){
//                 if($(this).attr("value")=="Diatoms"){
//                     $('.domains_types').hide();
//                     $('.Diatoms').css('display','inline-block');
//                 }
//                 if($(this).attr("value")=="Flagellates"){
//                     $('.domains_types').hide();
//                     $('.Flagellates').css('display','inline-block');
//                 }
//             });
//         }).change();
//     });
// });

$(document).ready(function() {
    $('.Domains select').change(function() {
      $('.domains_types')
        .hide()                            // Hide the <li> element
        .find('select option:first-child') // Get the nested select's first option
        .prop('selected', true);           // Select it
        
        $('.' + this.value).css('display', 'inline-block');
    }).change();
});