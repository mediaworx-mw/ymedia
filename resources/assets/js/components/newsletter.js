//import WebGLNewsletter from '../webgl/webglhome';
import TweenMax from 'gsap';
import ScrollMagic from 'scrollmagic';
import 'imports-loader?define=>false!scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap';

const Newsletter = () => {

  new fullpage('#fullpageNews', {
    navigation: false,
    anchors:['section1', 'section2', 'section3', 'section4', 'section5', 'section6', 'section7'],
    afterLoad: function(anchorLink, index) {
      history.pushState(null, null, "form");
    }
    //lockAnchors: true
  // onLeave: function(origin, destination, direction){
  //   const $header = document.querySelector('.header');
  //   const $nav = document.querySelector('.nav');
  //   if( origin.index == 0 && direction =='down' && !$nav.classList.contains('open') ){
  //     $header.classList.add('header--small');
  //   }
  //   if(origin.index == 1 && direction =='up'){
  //     $header.classList.remove('header--small');
  //   }
  // }
  });

  fullpage_api.setAllowScrolling(false);
  fullpage_api.keyboardScrolling(false);


};


export default Newsletter;
