$('.starBlock .note').click(function(){
   const recipeId = $(this).attr('data-recipeId');
   const note = $(this).attr('data-note');


   $.post('/recipe/setNote',{'recipeId' : recipeId, 'note':note}).done(function(html){
       location.reload();
   });
});