import { TweenMax } from 'gsap';
import ScrollMagic from 'scrollmagic';
import 'imports-loader?define=>false!scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap';


const Clientes = () => {

  const $clients = document.querySelector('.clientes-list__inner');
  const $blocks = document.querySelectorAll('.clientes-list__client');
  const $bottom = document.querySelector('.clientes-bottom');
  const $bottomTag = document.querySelector('.clientes-bottom__tag').getElementsByTagName('span');
  const $colofon = document.querySelector('.clientes-bottom__colofon').getElementsByTagName('p');

  const $footer = document.querySelector('.clientes-footer');
  const $footerTag = document.querySelector('.clientes-footer__tag').getElementsByTagName('span');
  const $descarga = document.querySelector('.clientes-footer__descarga');
  const $marca = document.querySelector('.clientes-footer__marca').getElementsByTagName('h4');
  const $contacto = document.querySelector('.clientes-footer__contacto');

  const controllerBlocks = new ScrollMagic.Controller();

  const tweenBlocks = new TimelineLite({paused: true});
  tweenBlocks
  .staggerTo($blocks, 0.8, {y: 0, opacity: 1, ease: Expo.easeOut}, 0.2, "-= 0.4");

   new ScrollMagic.Scene({
    triggerElement: $clients,
    offset: -100,
    reverse: false
  })
  .setTween(tweenBlocks.play())
  .addTo(controllerBlocks);


  const tweenBottom = new TimelineLite({paused: true});
  tweenBottom
  .staggerTo($bottomTag, 0.5, {x: 0, ease:Expo.easeOut}, 0.1, "-= 0.25")
  .to($colofon, 0.8, {x: 0, ease: Expo.easeOut}, 0.2, "-=0.5");

   new ScrollMagic.Scene({
    triggerElement: $bottom,
    offset: 0,
    reverse: false
  })
  .setTween(tweenBottom.play())
  .addTo(controllerBlocks);

  const tweenFooter = new TimelineLite({paused: true});
  tweenFooter
  .staggerTo($footerTag, 0.5, {x: 0, ease:Expo.easeOut}, 0.1, "-= 0.25")
  .to($descarga, 0.8, {x: 0, ease: Expo.easeOut}, 0.2, "-=0.5")
  .to($marca, 0.8, {x: 0, ease: Expo.easeOut}, 0.2, "-=0.5")
  .to($contacto, 0.8, {x: 0, ease: Expo.easeOut}, 0.2, "-=0.5");

   new ScrollMagic.Scene({
    triggerElement: $footer,
    offset: 0,
    reverse: false
  })
  .setTween(tweenFooter.play())
  .addTo(controllerBlocks);


  // $blocks.forEach(block => {
  //   let tweenBlocks = TweenMax.to(block, 0.5, {y: 0, opacity: 1, ease:Expo.easeOut });

  //   new ScrollMagic.Scene({
  //     triggerElement: block,
  //     offset: -(window.innerHeight * 0.6)
  //   })
  //   .setTween(tweenBlocks)
  //   .addTo(controllerBlocks);
  // });

}

export default Clientes;
