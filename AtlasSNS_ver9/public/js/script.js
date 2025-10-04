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


  $('.modal_open').on('click', function (e) {
    // var text = $(this).attr('post');
    // var id = $(this).attr('post_id');
    // $('.modal_post').val(text);
    // $('.modal_id').val(id);
    e.preventDefault();
    $('.modal').toggleClass('open', 200);
    var text = $(this).attr('post');
    var id = $(this).attr('post_id');
    $('.modal_post').val(text);
    $('.modal_id').val(id);
  });

});
