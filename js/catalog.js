 var collection_id = $('.catalog-main').data('collection-id');
 console.log(collection_id)

 $('#select-category').change(function() {
     $(this).val();

     var category_id = $(this).val();
     console.log(collection_id)
 });

 Headers('Location: product.php?')