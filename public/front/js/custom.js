$('.search-reset').click(function(e) {
  
    $(':input:not([type=hidden])').val('');
    $('select').val('');
    $('.select2').val(null).trigger('change');
   
  });