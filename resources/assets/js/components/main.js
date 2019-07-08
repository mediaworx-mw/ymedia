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

  // $(function() {
  //   (function($) {
  //     let addPoint = function(pageX, pageY) {
  //       let point = $("<div>", {"class": 'cursor-trail', css: {left: pageX, top: pageY }}).appendTo('body');
  //       point.animate( { opacity: 1 }, 2000, () => point.remove() )
  //     };
  //     $.fn.cursorTrail = function() {
  //       return this.bind("mousemove", function(ev) {
  //         addPoint(ev.pageX, ev.pageY);
  //       });
  //     };
  //   }($));
  //   $("#trail").cursorTrail();
  // });


  let dots = [];
  let mouse = {x: 0,y: 0};

  let Dot = function() {
    this.x = 0;
    this.y = 0;
    this.node = (function(){
      let n = document.createElement("div");
      n.className = "trail";
      document.body.appendChild(n);
      return n;
    }());
  };

  Dot.prototype.draw = function() {
    this.node.style.left = this.x + "px";
    this.node.style.top = this.y + "px";
  };

  for (let i = 0; i < 12; i++) {
    let d = new Dot();
    dots.push(d);
  }

  function draw() {
    let x = mouse.x;
    let y = mouse.y;

    dots.forEach(function(dot, index, dots) {
      let nextDot = dots[index + 1] || dots[0];
      dot.x = x;
      dot.y = y;
      dot.draw();
      x += (nextDot.x - dot.x) * .6;
      y += (nextDot.y - dot.y) * .6;
    });
  }

  addEventListener("mousemove", function(event) {
    mouse.x = event.pageX;
    mouse.y = event.pageY;
  });

  function animate() {
    draw();
    requestAnimationFrame(animate);
  }

  if (window.innerWidth >=780) {
    animate();
  }


}

export default Main;
