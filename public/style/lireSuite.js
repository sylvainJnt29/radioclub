$('.masquer').hide();
$('.suite').on('click', function(){
    var truncated_text = $(this).siblings('.card-text').text();
    //console.log('prout');
    var full_text = $(this).siblings('.alternated_text').val();
    $(this).siblings('.alternated_text').val(truncated_text);
    $(this).siblings('.card-text').text(full_text);
    $(this).siblings('.masquer').show();
    $(this).hide();
});

$('.masquer').on('click', function(){
    var truncated_text = $(this).siblings('.alternated_text').val();
    var full_text = $(this).siblings('.card-text').text();
    $(this).siblings('.alternated_text').val(full_text);
    $(this).siblings('.card-text').text(truncated_text);
    $(this).siblings('.suite').show();
    $(this).hide();
})

