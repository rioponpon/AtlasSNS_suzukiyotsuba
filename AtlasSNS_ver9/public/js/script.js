// $(function () { // if document is ready
//   alert('hello world')
// });
jQuery(function ($) {

  $('.js-accordion-title').on('click', function () {
    /*クリックでコンテンツを開閉*/
    $(this).next().slideToggle(300);
    // $(this).find('.ul');
    /*矢印の向きを変更*/
    $(this).toggleClass('open', 200);
    // }).next().hide();
  });


  $('.update-btn').on('click', function () {
    $('.modal').toggleClass('open', 200);
  });

});
