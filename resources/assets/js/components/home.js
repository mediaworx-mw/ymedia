//import WebGLHome from '../webgl/webglhome';
import TweenMax from 'gsap';
import ScrollMagic from 'scrollmagic';
import scroll from '../utils/scroll';
import 'imports-loader?define=>false!scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap';

const Home = () => {

 // WebGLHome();

  const controllerHome = new ScrollMagic.Controller();

  const home1 = document.querySelector('.home1');
  const title1 = document.querySelector('.home1').querySelector('.tag__title');
  const text1 = document.querySelector('.home1').querySelector('.tag__text');
  const arrow1 = document.querySelector('.home1').querySelector('.tag__arrow');
  //const counter1 = document.querySelectorAll('.counter--1');

  const home2 = document.querySelector('.home2');
  const title2 = document.querySelector('.home2').querySelector('.tag__title');
  const text2 = document.querySelector('.home2').querySelector('.tag__text');
  const arrow2 = document.querySelector('.home2').querySelector('.tag__arrow');
  //const counter2 = document.querySelectorAll('.counter--2');

  const home3 = document.querySelector('.home3');
  const title3 = document.querySelector('.home3').querySelector('.tag__title');
  const text3 = document.querySelector('.home3').querySelector('.tag__text');
  const arrow3 = document.querySelector('.home3').querySelector('.tag__arrow');
  //const counter3 = document.querySelectorAll('.counter--3');

  const trigger2 = document.querySelector('.home2');
  const trigger3 = document.querySelector('.home3');

  // counter1.forEach(function(e) {
  //   e.addEventListener('click', () => {
  //     scroll(home1, 300, 'easeOutCubic');
  //   })
  // });

  // counter2.forEach(function(e) {
  //   e.addEventListener('click', () => {
  //     scroll(home2, 300, 'easeOutCubic');
  //   })
  // });

  // counter3.forEach(function(e) {
  //   e.addEventListener('click', () => {
  //     scroll(home3, 300, 'easeOutCubic');
  //   })
  // });

  const home1Tween = new TimelineLite({paused: true});
  home1Tween
  .to(title1, 1, {x: 0, ease: Power2.easeInOut, delay: 1})
  .to(text1, 1, {x: 0, ease: Power2.easeInOut}, '-=0.8')
  .to(arrow1, 1, {x: 0, ease: Power2.easeInOut}, '-=0.8')
  //.to(counter1, 1, {x: 0, ease: Power2.easeInOut}, '-=0.8');
  home1Tween.play();

  const home2Tween = new TimelineLite({paused: true});
  home2Tween
  .to(title2, 1, {x: 0, ease: Power2.easeInOut})
  .to(text2, 1, {x: 0, ease: Power2.easeInOut}, '-=0.8')
  .to(arrow2, 1, {x: 0, ease: Power2.easeInOut}, '-=0.8')
  //.to(counter2, 1, {x: 0, ease: Power2.easeInOut}, '-=0.8');


  const home3Tween = new TimelineLite({paused: true});
  home3Tween
  .to(title3, 1, {x: 0, ease: Power2.easeInOut})
  .to(text3, 1, {x: 0, ease: Power2.easeInOut}, '-=0.8')
  .to(arrow3, 1, {x: 0, ease: Power2.easeInOut}, '-=0.8')
  //.to(counter3, 1, {x: 0, ease: Power2.easeInOut}, '-=0.8');

  new ScrollMagic.Scene({
    triggerElement: trigger2,
    offset: 0,
    reverse: false
  })
  .setTween(home2Tween.play())
  .addTo(controllerHome);

  new ScrollMagic.Scene({
    triggerElement: trigger3,
    offset: 0,
    reverse: false
  })
  .setTween(home3Tween.play())
  .addTo(controllerHome);
}

export default Home;
