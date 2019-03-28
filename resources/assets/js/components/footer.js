import ScrollMagic from 'scrollmagic';
import toggleClass from '../utils/toggle';

const Footer = () => {
  const $footer = document.querySelector('.footer');
  const $footerCross = document.querySelector('.footer__cross-button');

  $footerCross.addEventListener('click', function() {
    toggleClass($footer, 'expanded');
    toggleClass($footerCross, 'open');
  });

  let controllerFooter = new ScrollMagic.Controller();
  let scrollHeight = document.body.scrollHeight;
  let offsetFooter = scrollHeight - (scrollHeight/3);

  new ScrollMagic.Scene({ offset: offsetFooter })
  .on('enter', () => {
    $footerCross.classList.add('visible');
  })
  .on('leave', () => {
    $footerCross.classList.remove('visible');
    $footer.classList.remove('expanded');
    $footerCross.classList.remove('open');
  })
  .addTo(controllerFooter);

}

export default Footer;
