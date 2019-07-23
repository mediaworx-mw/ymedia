import ScrollMagic from 'scrollmagic';
import toggleClass from '../utils/toggle';

const Footer = () => {
  const $footer = document.querySelector('.footer');
  const $footerCross = document.querySelector('.footer__cross-button');
  const $footerElementsTop = document.querySelector('.footer__top').getElementsByTagName('div');
  const $footerElementsBottom = document.querySelector('.footer__bottom').getElementsByTagName('div');
  const $footerWrapper = document.querySelector('.footer__wrapper');


  const footerTween = new TimelineLite({paused: true});
  footerTween
  .staggerTo($footerElementsTop, 0.5, {opacity: 1, ease: Power2.easeInOut, delay: 0.4}, 0.1, "-= 0.25")
  .staggerTo($footerElementsBottom, 0.5, {opacity: 1, ease: Power2.easeInOut}, 0.1, "-= 0.25")


  $footerCross.addEventListener('click', function() {
    toggleClass($footer, 'expanded');
    toggleClass($footerCross, 'open');
    footerTween.play();
  });

}

export default Footer;
