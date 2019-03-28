//import WebGLHome from '../webgl/webglhome';
import TweenMax from 'gsap';
import ScrollMagic from 'scrollmagic';
import scroll from '../utils/scroll';
import 'imports-loader?define=>false!scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap';

const Home = () => {

 // WebGLHome();

  const controllerHome = new ScrollMagic.Controller();
  const home1 = document.querySelector('.home1');
  const home2 = document.querySelector('.home2');
  const home3 = document.querySelector('.home3');
  const tag1 = document.querySelector('.home1').querySelector('.tag');
  const tag2 = document.querySelector('.home2').querySelector('.tag');
  const tag3 = document.querySelector('.home3').querySelector('.tag');
  const counter1 = document.querySelectorAll('.counter__1');
  const counter2 = document.querySelectorAll('.counter__2');
  const counter3 = document.querySelectorAll('.counter__3');

  counter1.forEach(function(e) {
    e.addEventListener('click', () => {
      scroll(home1, 300, 'easeOutCubic');
    })
  });

  counter2.forEach(function(e) {
    e.addEventListener('click', () => {
      scroll(home2, 300, 'easeOutCubic');
    })
  });

  counter3.forEach(function(e) {
    e.addEventListener('click', () => {
      scroll(home3, 300, 'easeOutCubic');
    })
  });

  const tween1 = TweenMax.to(tag1, 1, {x: 0, ease: Power2.easeInOut});
  const tween2 = TweenMax.to(tag2, 1, {x: 0, ease: Power2.easeInOut});
  const tween3 = TweenMax.to(tag3, 1, {x: 0, ease: Power2.easeInOut});

  const trigger2 = document.querySelector('.home2');
  const trigger3 = document.querySelector('.home3');

  tween1.play();

  new ScrollMagic.Scene({
    triggerElement: trigger2,
    offset: 0,
    reverse: false
  })
  .setTween(tween2)
  .addTo(controllerHome);

  new ScrollMagic.Scene({
    triggerElement: trigger3,
    offset: 0,
    reverse: false
  })
  .setTween(tween3)
  .addTo(controllerHome);
}

export default Home;
