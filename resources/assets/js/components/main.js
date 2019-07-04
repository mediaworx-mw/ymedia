import { TweenMax } from 'gsap';
import 'imports-loader?define=>false!scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap';
import $ from 'jquery';

const Main = () => {

  if(document.body.contains(document.querySelector('.page-crumb'))){

    const $crumb = document.querySelector('.page-crumb');
    const tweenInit = new TimelineLite({paused: true});
    tweenInit
    .to($crumb, 1, {x: 0, ease:Expo.easeOut});

    tweenInit.play();

  }

//   window.addEventListener('mousemove', function(e) {
//     [1, .9, .8, .5, .1].forEach(function(i) {
//       var j = (1 - i) * 50;
//       var elem = document.createElement('div');
//       var size = '10px';
//       elem.style.position = 'fixed';
//       elem.style.top = e.pageY + 0 + 'px';
//       elem.style.left = e.pageX + 0 + 'px';
//       elem.style.width = size;
//       elem.style.height = size;
//       elem.style.background = '#cccccc';
//       elem.style.borderRadius = 0;
//       elem.style.zIndex = 500;
//       elem.style.pointerEvents = 'none';
//       document.body.appendChild(elem);
//       window.setTimeout(function() {
//         document.body.removeChild(elem);
//       }, Math.round(Math.random() * i * 500));
//     });
// }, false);

  $(function() {

    (function($) {
      let addPoint = function(pageX, pageY) {
        let point = $("<div>", {"class": 'cursor-trail', css: {left: pageX, top: pageY }}).appendTo('body');
        point.animate( { opacity: 1 }, 2000, () => point.remove() )
      };

      $.fn.cursorTrail = function() {
        return this.bind("mousemove", function(ev) {
          addPoint(ev.pageX, ev.pageY);
        });
      };
    }($));

    $("#trail").cursorTrail();

  });

}

export default Main;
