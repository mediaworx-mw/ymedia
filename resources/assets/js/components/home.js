//import WebGLHome from '../webgl/webglhome';
import TweenMax from 'gsap';
import ScrollMagic from 'scrollmagic';
import 'imports-loader?define=>false!scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap';

const Home = () => {

 // WebGLHome();

  const home1 = document.querySelector('.home1');
  const title1 = document.querySelector('.home1').querySelector('.home-tag__title').getElementsByTagName('span');
  const text1 = document.querySelector('.home1').querySelector('.home-tag__text');
  const counter1 = document.querySelector('.counter--1');

  const home2 = document.querySelector('.home2');
  const title2 = document.querySelector('.home2').querySelector('.home-tag__title').getElementsByTagName('span');
  const text2 = document.querySelector('.home2').querySelector('.home-tag__text');
  const counter2 = document.querySelector('.counter--2');

  const home3 = document.querySelector('.home3');
  const title3 = document.querySelector('.home3').querySelector('.home-tag__title').getElementsByTagName('span');
  const text3 = document.querySelector('.home3').querySelector('.home-tag__text');
  const counter3 = document.querySelector('.counter--3');

  const trigger1 = document.querySelector('.home1');
  const trigger2 = document.querySelector('.home2');
  const trigger3 = document.querySelector('.home3');

  const counterLine1 = document.querySelectorAll('.counter__1');
  const counterLine2 = document.querySelectorAll('.counter__2');
  const counterLine3 = document.querySelectorAll('.counter__3');

  const controllerHome = new ScrollMagic.Controller();

  const $mouse = document.querySelector('.mouse');

  counterLine1.forEach(function(e) {
    e.addEventListener('click', () => {
      fullpage_api.moveTo(1);
    })
  });

  counterLine2.forEach(function(e) {
    e.addEventListener('click', () => {
      fullpage_api.moveTo(2);
      //document.querySelector('.mouse').classList.add('hidden');
    })
  });

  counterLine3.forEach(function(e) {
    e.addEventListener('click', () => {
      fullpage_api.moveTo(3);
      document.querySelector('.mouse').classList.add('hidden');
    })
  });

  const home1Tween = new TimelineLite({paused: true});

  home1Tween
  .staggerTo(title1, 0.5, {x: 0, ease:Expo.easeOut, delay: 1}, 0.1, "-= 0.45")
  .to(text1, 1, {x: 0, ease:Expo.easeOut}, '-=0.4')
  .to(counter1, 1, {x: 0, ease:Expo.easeOut}, '-=0.8');
  home1Tween.play();

  const home2Tween = new TimelineLite({paused: true});

  home2Tween
  .staggerTo(title2, 0.5, {x: 0, ease:Expo.easeOut}, 0.1, "-= 0.45")
  .to(text2, 1, {x: 0, ease:Expo.easeOut}, '-=0.4')
  .to(counter2, 1, {x: 0, ease:Expo.easeOut}, '-=0.8');

  const home3Tween = new TimelineLite({paused: true});
  home3Tween
  .staggerTo(title3, 0.5, {x: 0, ease:Expo.easeOut}, 0.1, "-= 0.45")
  .to(text3, 1, {x: 0, ease:Expo.easeOut}, '-=0.4')
  .to(counter3, 1, {x: 0, ease:Expo.easeOut}, '-=0.8');

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

new fullpage('#home', {
  onLeave: function(origin, destination, direction){
    const $header = document.querySelector('.header');
    const $nav = document.querySelector('.nav');
    if( origin.index == 0 && direction =='down' && !$nav.classList.contains('open') ){
      $header.classList.add('header--small');
    }
    if(origin.index == 1 && direction =='up'){
      $header.classList.remove('header--small');
    }
    if( origin.index == 1 && direction == 'down') {
      document.querySelector('.mouse').classList.add('hidden');
    }
  }
});

export default Home;
