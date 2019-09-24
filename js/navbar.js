
// var scroll = $('body').scrollTop();
// console.log(scroll);
var elem = $("#navbar").offset().top;
 $(document).scroll(function(){
   var scroll = $('body').scrollTop(); 
   if (scroll > elem) {
    $('#navbar').css({position: 'fixed'},
                     {top: 0});
    $('.section-first').css('height', '4%');
    $('.title-nav').css('display', 'none');
    $('#nav').css('display', 'none');
    $('.imgName').addClass('col-sm-1');
    $('#onScroll').css('height', '22%');
   }else if(scroll < elem ){
    $('#navbar').css({position: 'relative'});
    $('.section-first').css('height', '22%');
    $('#nav').css('display', 'block');
    $('.imgName').removeClass('col-sm-1');
    $('.title-nav').css('display', 'block');
    $('#onScroll').css('height', '0%');
  }
});   


