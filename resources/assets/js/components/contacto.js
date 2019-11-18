import { TweenMax } from 'gsap';
import ScrollMagic from 'scrollmagic';
import 'imports-loader?define=>false!scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap';


const Contacto = () => {

  const controllerContact = new ScrollMagic.Controller();
  const $fields = document.querySelectorAll('.form-field--animated');
  const $maps = document.querySelectorAll('.contacto-maps__map');
  const $video = document.querySelector('.contacto-video__vid');
  const $name = document.querySelector('.nombre').querySelector('input');
  const $phone = document.querySelector('.telefono').querySelector('input');
  const $mail = document.querySelector('.email').querySelector('input');
  const $comments = document.querySelector('.comentarios').querySelector('textarea');
  const $submit = document.querySelector('.wpcf7-submit');

  $name.value = "";
  $phone.value = "";
  $mail.value = "";
  $comments.value = "";


  const animateFields = () => {
    const tl1 = new TimelineLite({paused: true});
    tl1
    .staggerTo($fields, 0.6, {y: 0, opacity: 1}, 0.2, "-=0.5")
    .staggerTo($maps, 0.6, {x: 0, opacity: 1}, 0.2, "-=1")
    tl1.play();
  }

  $video.pause();

  let flag1 = 0;
  let flag2 = 0;
  let flag3 = 0;
  let flag4 = 0;

  let stop = 1;


  $name.addEventListener('focus', function() {
    flag1 = 1;

  });
  $name.addEventListener('blur', function() {
    if ( $name.value !=='' ) {
      if (flag1 == 1) {
        $video.play();
      }
      //flag1 = 1;
      //$phone.disabled = false;
    }
  });

  $phone.addEventListener('blur', function() {
    if ( $phone.value !=='' ) {
      if (flag2 == 1) {
         $video.play();

      }
    }
  });

  $mail.addEventListener('blur', function() {
    if ( $mail.value !=='' ) {
      if (flag3 == 1 ) {
        $video.play();

      }
    }
  });



  const container = document.querySelector(".wpcf7-response-output");

  const mutationConfig = {
    attributes: true,
    childList: true,
    subtree: true,
    characterData: true,
    characterDataOldValue: true
  };

  var onMutate = function(mutationsList) {
    mutationsList.forEach(mutation => {

      if ( container.classList.contains('wpcf7-mail-sent-ok') ){


          $video.play();
          observer.disconnect();

      }
    });
  };

  var observer = new MutationObserver(onMutate);
  observer.observe(container, mutationConfig);

  $video.addEventListener('timeupdate', function(){
    if ( stop == 1 ) {
      if(this.currentTime >= 1.9) {
        this.pause();
        flag1 = 0;
        flag2 = 1;
        stop = 2;

      }
    }
    if ( stop == 2 ) {
      if(this.currentTime >= 3.4) {
        this.pause();
        flag2 = 0;
        flag3 = 1;
        stop = 3;
      }
    }
    if ( stop == 3 ) {
      if(this.currentTime >= 7) {
        this.pause();
        flag3 = 0;
        flag4 = 1;
        stop = 4;
      }
    }
    if ( stop == 4 ) {
      if(this.currentTime >= 12.5) {
        this.pause();
        flag4 = 0;
      }
    }
  });



  animateFields();
}

export default Contacto;
