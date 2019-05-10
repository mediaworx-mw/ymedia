import { TweenMax } from 'gsap';
import ScrollMagic from 'scrollmagic';
import 'imports-loader?define=>false!scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap';

const Cliente = () => {

  const $footer = document.querySelector('.cliente-footer');
  const $descarga = document.querySelector('.cliente-footer__descarga');
  const $marca = document.querySelector('.cliente-footer__marca').getElementsByTagName('h4');
  const $contacto = document.querySelector('.cliente-footer__contacto');

  const controllerBlocks = new ScrollMagic.Controller();




  if (document.querySelector('.cliente-top__video') !== null) {

    const $video = document.querySelector('.video-cliente');
    const $play = document.querySelector ('.cliente-top__play');

    window.onload = $video.removeAttribute('controls');

    const playVideo = () => {
      $video.play();
    }

    const pauseVideo = () => {
      $video.pause();
    }

    const resumeVideo = () => {
      $play.classList.remove('hidden');
    }

    $play.addEventListener('click', () => {
      $play.classList.add('hidden');
      playVideo();
    });

    $video.addEventListener('ended', resumeVideo, false);
  }

  const tweenFooter = new TimelineLite({paused: true});
  tweenFooter
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
}

export default Cliente;
