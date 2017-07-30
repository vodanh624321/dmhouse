//SPメニュー
( function ( $ ) {
  
  $('.numberup').click(function(){
    var pronum = parseInt($('#product-number').val());
    if (!pronum) {
      pronum = 0;
    }
    $('#product-number').val(pronum + 1);
    return false;
  });
  $('.numberdown').click(function(){
    var pronum = parseInt($('#product-number').val());
    if (!pronum) {
      pronum = 0;
    }
    if (pronum > 0) {
      $('#product-number').val(pronum - 1);
    }
    return false;
  });
  
  var topBtn = $('#page-top');   
  //スクロールしてトップ
  topBtn.click(function () {
    console.log($('#sb-site').offset());
    $('#sb-site').animate({
      scrollTop: 0
    }, 500);
    console.log($('html,body').offset());
    return false;
  }); 
  
  //ページ内スクロール
  $(function () {
    $('a.innerlink[href^="#"]').click(function(){
      var href= $(this).attr("href");
      var target = $(href === "#" || href === "" ? 'html' : href);
      var position = target.offset().top; //ヘッダの高さを調整する場合はここに追記する
      $("html, body").animate({scrollTop:position}, 550, "swing");

	    $.slidebars.close();

      return false;
    });
  });
  //コピーライトの年度を更新する
  $(document).ready(function(){
		var now = new Date();
		var year = now.getFullYear();
		jQuery("#nowyear").html( year );
  });
  
  var controller = new slidebars();
  controller.init();

  $( '#sp-menu' ).on( 'click', function ( event ) {
      event.preventDefault();
      event.stopPropagation();
      controller.open( 'sp-menu-body' );
      $('.sp-menu-cover').addClass('open');
  } );

  // Close any
  $( document ).on( 'click', '.js-close-any', function ( event ) {
      if ( controller.getActiveSlidebar() ) {
          $('.sp-menu-cover').removeClass('open');
          event.preventDefault();
          event.stopPropagation();
          controller.close();
      }
  } );

  // Close Slidebar links
  $( '[off-canvas] a' ).on( 'click', function ( event ) {
      event.preventDefault();
      event.stopPropagation();

      var url = $( this ).attr( 'href' ),
      target = $( this ).attr( 'target' ) ? $( this ).attr( 'target' ) : '_self';

      controller.close( function () {
          window.open( url, target );
      } );
  } );

  // Add close class to canvas container when Slidebar is opened
  $( controller.events ).on( 'opening', function ( event ) {
      $( '[canvas]' ).addClass( 'js-close-any' );
  } );

  // Add close class to canvas container when Slidebar is opened
  $( controller.events ).on( 'closing', function ( event ) {
      $( '[canvas]' ).removeClass( 'js-close-any' );
      $('.sp-menu-cover').removeClass('open');
  } );
}) (jQuery);
