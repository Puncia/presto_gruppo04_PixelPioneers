
var splide = new Splide( '.splide', {
    perPage : 3,
    cover   : true,
    height  : '10rem',
    lazyLoad: 'nearby',
    breakpoints: {
      height: '6rem',
    },
  } );
  
  splide.mount();