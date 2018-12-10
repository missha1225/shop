$(document).ready(function() {
    $('.goods-size-item').click(function() {
        $(this).toggleClass('goods-size-item-selected');
        $(this).siblings('.goods-size-item').removeClass('goods-size-item-selected');
    });
});