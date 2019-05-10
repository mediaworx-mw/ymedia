import { TweenMax } from 'gsap';
import 'imports-loader?define=>false!scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap';

const Main = () => {

  if(document.body.contains(document.querySelector('.page-crumb'))){

    const $crumb = document.querySelector('.page-crumb');
    const tweenInit = new TimelineLite({paused: true});
    tweenInit
    .to($crumb, 1, {x: 0, ease:Expo.easeOut});

    tweenInit.play();

  }

}

export default Main;
