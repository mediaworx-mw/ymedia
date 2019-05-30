import { TweenMax } from 'gsap';
import ScrollMagic from 'scrollmagic';
import 'imports-loader?define=>false!scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap';

const Cliente = () => {

  const $footer = document.querySelector('.cliente-footer__marca');
  const $marca = document.querySelector('.cliente-footer__marca').getElementsByTagName('h4');
  const $contacto = document.querySelector('.cliente-footer__contacto');
  const $videos = document.querySelector('.cliente-top__videos');
  const $images = document.querySelector('.cliente-top__images');
  const $thumbsVideos = document.querySelectorAll('.cliente-top__layer');
  const $thumbsImages = document.querySelectorAll('.cliente-top__thumb--image');

  const $thumbsLayerVideo = document.querySelectorAll('.cliente-top__layer');
  const controllerBlocks = new ScrollMagic.Controller();



  if ($thumbsVideos.length != 0) {
    $thumbsVideos.forEach(function(layer) {
      layer.addEventListener('click', () => {
        let url = layer.parentElement.children[0].src;
       $videos.children[0].src = url;

      })
    });
  }

  if ($thumbsImages != 0) {
    $thumbsImages.forEach(function(image) {
      image.addEventListener('click', () => {
        let url = image.getAttribute('data-url');
        $images.style.backgroundImage = "url('"+url+"')";

      })
    });
  }



  const tweenFooter = new TimelineLite({paused: true});
  tweenFooter
  .to($marca, 0.8, {x: 0, ease: Expo.easeOut}, 0.2)
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
