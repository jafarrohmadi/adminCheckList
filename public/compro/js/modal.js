function modalclasstrim(target){
    var this_class = target.attr('class');
    var arr = this_class.split(' ');
    var arr = arr[0].split('open');
    return arr[0];
}

function props_show(target){
    $(target).css('display','block');
    $('body','html').css('overflow', 'hidden');
}

$(document).on('click', '.modalclose', function(){
    $(this).closest('.modal-body').css('display','none');
    $('body','html').css('overflow', 'auto');          
});