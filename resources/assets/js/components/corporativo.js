import { TweenMax } from 'gsap';
import ScrollMagic from 'scrollmagic';
import 'imports-loader?define=>false!scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap';

const Corporativo = () => {
  const $members = document.querySelector('.members');
  const $member = document.querySelectorAll('.member');
  const $memberInner = document.querySelectorAll('.member__inner');
  const $close = document.querySelector('.member-modal__close')
  const $body = document.body;
  const $tag = document.querySelector('.corporativo-top__tag').getElementsByTagName('span');
  const $intro = document.querySelector('.corporativo-top__intro');


  const controllerMembers = new ScrollMagic.Controller();

  const tweenInit = new TimelineLite({paused: true});
  tweenInit
  .staggerTo($tag, 0.5, {x: 0, ease:Expo.easeOut, delay: 1}, 0.1, "-= 0.45")
  .to($intro, 1, {x: 0, ease:Expo.easeOut}, '-=0.4');

  tweenInit.play();

  const tweenMembers = new TimelineLite({paused: true});
  tweenMembers
  .staggerTo($member, 0.8, {y: 0, opacity: 1, ease: Expo.easeOut}, 0.2, "-= 0.4");

  new ScrollMagic.Scene({
    triggerElement: $members,
    offset: -300,
    reverse: false
  })
  .setTween(tweenMembers.play())
  .addTo(controllerMembers);

  $member.forEach(function(item){
    item.addEventListener('mouseover', function() {
      $member.forEach(function(item){
        item.classList.add('faded');
      });
      item.classList.remove('faded');
    });
  });

  $member.forEach(function(item){
    item.addEventListener('mouseleave', function() {
      $member.forEach(function(item){
        item.classList.remove('faded');
      });

    });
  });




  $memberInner.forEach(function(e) {
    const video = e.querySelector('.member__video').querySelector('.video');

    e.addEventListener('mouseover', function() {




      video.play();
      this.querySelector('.member__data-top').classList.add('over');
      this.querySelector('.member__data-bottom').classList.add('over');
    });

    e.addEventListener('mouseleave', function() {
      video.pause();
      video.currentTime = 0;
      this.querySelector('.member__data-top').classList.remove('over');
      this.querySelector('.member__data-bottom').classList.remove('over');
    });
  });


}

export default Corporativo;
