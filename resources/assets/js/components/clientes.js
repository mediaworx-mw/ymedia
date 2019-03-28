import { TweenMax } from 'gsap';
import ScrollMagic from 'scrollmagic';
import 'imports-loader?define=>false!scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap';


const Clientes = () => {
  const $video = document.querySelector('.video-clientes');
  const $play = document.querySelector ('.clientes-top__play');
  const $blocks = document.querySelectorAll('.clientes-list__client');

  const controllerClients = new ScrollMagic.Controller();

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

  const triggerBlocks = document.querySelector('.clientes-list');
  const TweenBlocks = TweenMax.staggerTo($blocks, 0.5, {y:0, opacity:1, ease: Power2.easeInOut}, 0.1);

  new ScrollMagic.Scene({
    triggerElement: triggerBlocks,
    offset: 0,
    reverse: false
  })
  .setTween(TweenBlocks)
  .addTo(controllerClients);
}

export default Clientes;
