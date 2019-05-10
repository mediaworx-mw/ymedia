import { TweenMax } from 'gsap';
import ScrollMagic from 'scrollmagic';
import 'imports-loader?define=>false!scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap';


const Contacto = () => {

  const controllerContact = new ScrollMagic.Controller();
  const $fields = document.querySelectorAll('.form-field--animated');
  const $maps = document.querySelectorAll('.contacto-maps__map');

  const animateFields = () => {
    const tl1 = new TimelineLite({paused: true});
    tl1
    .staggerTo($fields, 0.6, {y: 0, opacity: 1}, 0.2, "-=0.5")
    .staggerTo($maps, 0.6, {x: 0, opacity: 1}, 0.2, "-=1")
    tl1.play();
  }

  animateFields();
}

export default Contacto;
