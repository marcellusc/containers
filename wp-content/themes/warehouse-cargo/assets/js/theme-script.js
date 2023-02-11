function warehouse_cargo_openNav() {
  jQuery(".sidenav").addClass('show');
}
function warehouse_cargo_closeNav() {
  jQuery(".sidenav").removeClass('show');
}

( function( window, document ) {
  function warehouse_cargo_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const warehouse_cargo_nav = document.querySelector( '.sidenav' );

      if ( ! warehouse_cargo_nav || ! warehouse_cargo_nav.classList.contains( 'show' ) ) {
        return;
      }

      const elements = [...warehouse_cargo_nav.querySelectorAll( 'input, a, button' )],
        warehouse_cargo_lastEl = elements[ elements.length - 1 ],
        warehouse_cargo_firstEl = elements[0],
        warehouse_cargo_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;

      if ( ! shiftKey && tabKey && warehouse_cargo_lastEl === warehouse_cargo_activeEl ) {
        e.preventDefault();
        warehouse_cargo_firstEl.focus();
      }

      if ( shiftKey && tabKey && warehouse_cargo_firstEl === warehouse_cargo_activeEl ) {
        e.preventDefault();
        warehouse_cargo_lastEl.focus();
      }
    } );
  }
  warehouse_cargo_keepFocusInMenu();
} )( window, document );

var btn = jQuery('#button');

jQuery(window).scroll(function() {
  if (jQuery(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  jQuery('html, body').animate({scrollTop:0}, '300');
});

jQuery(document).ready(function() {
  var owl = jQuery('#top-slider .owl-carousel');
    owl.owlCarousel({
      margin: 0,
      nav: false,
      autoplay:true,
      autoplayTimeout:3000,
      autoplayHoverPause:true,
      loop: true,
      dots:false,
      navText : ['<i class="fa fa-lg fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-lg fa-chevron-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 1
        },
        1024: {
          items: 1
      }
    }
  })
  window.addEventListener('load', (event) => {
  jQuery(".loading").delay(2000).fadeOut("slow");
});
})

jQuery(window).scroll(function() {
  var data_sticky = jQuery('.navigation_header').attr('data-sticky');

  if (data_sticky == "true") {
    if (jQuery(this).scrollTop() > 1){  
      jQuery('.navigation_header').addClass("stick_header");
    } else {
      jQuery('.navigation_header').removeClass("stick_header");
    }
  }
});