import ScrollMagic from 'scrollmagic';
import toggleClass from '../utils/toggle';
import { TweenMax } from 'gsap';
import 'imports-loader?define=>false!scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap';

const Header = () => {
  const $body = document.body;
  const $header = document.querySelector('.header');
  const $pull = document.querySelector('.pull');
  const $nav = document.querySelector('.nav');
  const $navList = document.querySelector('.nav__list');
  const $navBottom = document.querySelector('.nav__bottom');
  const $headerLogo = document.querySelector('.header__logo');
  const $menuItem = document.querySelector('.nav__list').getElementsByTagName('li');

  const controllerHeader = new ScrollMagic.Controller();

  if(document.querySelector('.home') == null && document.querySelector('.canal') == null ) {
    let offsetHeader = 10;
    new ScrollMagic.Scene({ offset: offsetHeader })
    .on('enter', () => {
      $header.classList.add('header--small');
    })
    .on('leave', () => {
      $header.classList.remove('header--small');
    })
    .addTo(controllerHeader);

  }


  const openMenu = () => {
    document.querySelector('.nav').classList.add('open');
    const tl1 = new TimelineLite({paused: true});
    tl1
    .fromTo($nav, 0.5, {left: '-100%'}, {left: 0})
    .staggerFromTo($menuItem, 1, {x: -window.innerWidth}, {x: 0, ease: Expo.easeOut}, 0.1, "-= 0.45")
    .to($navBottom, 1, {x: 0, ease: Expo.easeOut}, "-= 0.95")
    tl1.play();
  }

  const closeMenu = () => {
    document.querySelector('.nav').classList.remove('open');
    const tl2 = new TimelineLite({paused: true});
    tl2
    .staggerTo($menuItem, 1, {x: window.innerWidth, ease: Expo.easeIn}, 0.1, "-= 0.45")
    .to($navBottom, 1, {x: '200vw', ease: Expo.easeIn}, "-= 0.95")
    .fromTo($nav, 0.5, {left: '0'}, {left: '100%', ease: Power2.easeOut}, "-=0.1"  )
    tl2.play();
  }

  const headerAnimation = () => {
    const headerTween = new TimelineLite({paused: true});
    headerTween
    .fromTo($headerLogo, 1, {marginLeft: '-1000px', opacity: 0}, {marginLeft: '0px', opacity: 1, ease: Power2.easeInOut})
    .fromTo($pull, 1, {marginRight: '-1000px', opacity: 0}, {marginRight: '0px', opacity: 1, ease: Power2.easeInOut}, '-=0.7');
    headerTween.play();
  }

  $pull.addEventListener('click', () => {
    const windowWidth = window.innerWidth;
    toggleClass($pull, 'open');
    toggleClass($headerLogo, 'logo-white');
    toggleClass($body, 'overflowHidden');
    $pull.classList.contains('open') ? openMenu() : closeMenu();
  });

  headerAnimation();

}

export default Header;
