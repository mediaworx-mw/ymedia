//import WebGLNewsletter from '../webgl/webglhome';
import TweenMax from 'gsap';
import ScrollMagic from 'scrollmagic';
import 'imports-loader?define=>false!scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap';

const Newsletter = () => {

  const $bar = document.querySelector('.progress-bar__line');

  const $n1 = document.querySelector('.n1');
  const $n2 = document.querySelector('.n2');
  const $n3 = document.querySelector('.n3');
  const $n4 = document.querySelector('.n4');
  const $n5 = document.querySelector('.n5');
  const $n6 = document.querySelector('.n6');
  const $n7 = document.querySelector('.n7');

  const $section1 = document.querySelector('.section1')
  const $section2 = document.querySelector('.section2');
  const $section3 = document.querySelector('.section3');
  const $section4 = document.querySelector('.section4');
  const $section5 = document.querySelector('.section5');
  const $section6 = document.querySelector('.section6');
  const $section7 = document.querySelector('.section7');

  const $radios = document.querySelectorAll('input[type="radio"]');


  const $section2radios = $section2.querySelectorAll('input[type="radio"]');
  const $section3radios = $section3.querySelectorAll('input[type="radio"]');
  const $section4radios = $section4.querySelectorAll('input[type="radio"]');
  const $section5radios = $section5.querySelectorAll('input[type="radio"]');
  const $section6radios = $section6.querySelectorAll('input[type="radio"]');
  const $section7radios = $section7.querySelectorAll('input[type="radio"]');


  const $name = document.querySelector('.nombre').querySelector('input');
  const $mail = document.querySelector('.email').querySelector('input');

  $name.value = "";
  $mail.value = "";

  $radios.forEach((radio) => {
    radio.checked = false;

  });



  new fullpage('#fullpageNews', {navigation: false });

  fullpage_api.setAllowScrolling(false);
  //fullpage_api.keyboardScrolling(false);

  let validSection1 = false;
  let validName = false;
  let validEmail = false;

  $name.addEventListener('input', function() {
    if ( $name.value !=="" ) {
      if ( $name.value.length > 5){
        validName = true;
      }
    } else {
      $name.value = "";
      validName = false;
    }

    if (validEmail == true & validName == true) {
      $n1.classList.add('valid');
    } else {
      $n1.classList.remove('valid');
    }

  });

  function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
  }

  $mail.addEventListener('input', function() {
    if ( $mail.value !=="" ) {
      if ( validateEmail($mail.value) ) {
        validEmail = true;
      }
    } else {
      $mail.value = "";
      validEmail = false;
    }
    if (validEmail == true & validName == true) {
      $n1.classList.add('valid');
    } else {
      $n1.classList.remove('valid');
    }
  });

  $bar.style.width = 0;

  let bar = new TimelineMax();



  $n1.addEventListener('click', () => {
     if ($n1.classList.contains('valid') ) {
      fullpage_api.moveTo(2);
      bar.to($bar, 1, {width: '14.28%'});
    }
  })


  $section2radios.forEach((radio) => {
    radio.addEventListener('click', function() {
      $n2.classList.add('valid');

    });
  });

  $n2.addEventListener('click', () => {
     if ($n2.classList.contains('valid') ) {
      fullpage_api.moveTo(3);
      bar.to($bar, 1, {width: '28.5%'});
    }
  });



  $section3radios.forEach((radio) => {
    radio.addEventListener('click', function() {
      $n3.classList.add('valid');
    });
  });

  $n3.addEventListener('click', () => {
     if ($n3.classList.contains('valid') ) {
      fullpage_api.moveTo(4);
      bar.to($bar, 1, {width: '42.84%'});
    }
  });



  $section4radios.forEach((radio) => {
    radio.addEventListener('click', function() {
      $n4.classList.add('valid');
    });
  });

  $n4.addEventListener('click', () => {
     if ($n4.classList.contains('valid') ) {
      fullpage_api.moveTo(5);
      bar.to($bar, 1, {width: '59.2%'});
    }
  });



  $section5radios.forEach((radio) => {
    radio.addEventListener('click', function() {
      $n5.classList.add('valid');
    });
  });

  $n5.addEventListener('click', () => {
     if ($n5.classList.contains('valid') ) {
      fullpage_api.moveTo(6);
      bar.to($bar, 1, {width: '71.4%'});
    }
  });


  $section6radios.forEach((radio) => {
    radio.addEventListener('click', function() {
      $n6.classList.add('valid');
    });
  });

  $n6.addEventListener('click', () => {
     if ($n6.classList.contains('valid') ) {
      fullpage_api.moveTo(7);
      bar.to($bar, 1, {width: '85.68%'});
    }
  });


  $section7radios.forEach((radio) => {
    radio.addEventListener('click', function() {
      $n7.classList.add('valid');
      bar.to($bar, 1, {width: '100%'});
    });
  });

};


export default Newsletter;
