import toggleClass from '../utils/toggle';
import flatpickr from "flatpickr";
import { Spanish } from "flatpickr/dist/l10n/es.js";

import { TweenMax } from 'gsap';
import ScrollMagic from 'scrollmagic';
import 'imports-loader?define=>false!scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap';

const Topbar = () => {

  if(document.body.contains(document.querySelector('.topbar'))){
    const $topbar = document.querySelector('.topbar');
    const $calendar = document.querySelector('.calendar');
    const $calendarWrapper = document.querySelector('.topbar__calendar-wrapper');
    const $calendarButton = document.querySelector('.topbar__calendar-button');
    const $calendarClear = document.querySelector('.topbar__calendar-clear');
    const $calendarIcon = document.querySelector('.topbar__calendar-icon');
    const $tabs = document.querySelectorAll('.topbar__tag');
    const $merged = document.querySelector('.topbar__merged');
    const $todas = document.querySelector('.topbar__todas');
    const $drop = document.querySelector('.topbar__drop');
    const $placeholder = document.querySelector('.canal-main__list');
    const $load = document.querySelector('.canal-main__load');
    const $input = document.querySelector('.topbar__key-input');
    const $submit = document.querySelector('.topbar__key-submit');
    const $clear = document.querySelector('.topbar__key-clear');
    const baseUrl = location.host;
    const $featured = document.querySelector('.canal-featured__bottom-title');
    const $main = document.querySelector('.canal-main');

     let firstTime = 1;


    const controllerFeatured = new ScrollMagic.Controller();

    $merged.classList.add('selected');

    //Clear input on page load
    $input.value = "";

    if ( baseUrl.startsWith('localhost') ) {
      var url = 'http://localhost:8888/ymedia/wp-json/canal_ymedia/search?terms=';
    } else {
      var url = 'https://staging.ymedia.es/wp-json/canal_ymedia/search?terms=';
    }

    const expand = () => {
      document.querySelector('.canal-featured__list').classList.remove('hidden');
      document.querySelector('.canal-featured__bottom').classList.remove('visible');
      firstTime = 1;

    }

    const collapse = () =>  {
      document.querySelector('.canal-featured__list').classList.add('hidden');
      document.querySelector('.canal-featured__bottom').classList.add('visible');
    }


    // new ScrollMagic.Scene({
    //   triggerElement: $placeholder,
    //   offset: -450,
    // })
    // .on('start', function () {
    //    collapse();
    // })
    // .addTo(controllerFeatured);




    const getAllPosts = (data, load) => {
      let article = '';
      data.forEach(function(item, index) {
        let title = data[index].title;
        let permalink = data[index].permalink;
        let excerpt = data[index].excerpt.split(" ").splice(0, 30).join(" ");
        let term = data[index].term.name;
        let image = data[index].thumbnail;
        let date = data[index].date;
        let color = data[index].color;
        article += `
          <a href="${permalink}" class="canal-article canal-article--regular">
            <div class="article-hero canal-article__hero">
              <?php $thumb = get_the_post_thumbnail_url(); ?>
              <figure style="background-image: url(${image})"></figure>
            </div>
            <div class="canal-article__info">
              <span style="background: ${color}" class="canal-article__category"> ${term}</span>
              <div class="canal-article__content">
                <h2 class="article-title canal-article__title">${title}</h2>
                <div class="article-meta canal-article__meta">
                  <span class="article-date canal-article__date">${date}</span>
                </div>
                <div class="canal-article__excerpt article-excerpt">${excerpt}</div>
              </div>
            </div>
          </a>
        `
      });

      if (load) {
        var elChild = document.createElement('div');
        let classesToAdd = [ 'canal-main__list', 'canal-main__list--extra'];
        elChild.classList.add(...classesToAdd);
        elChild.innerHTML = article;
        $placeholder.appendChild(elChild);
      } else {
        $placeholder.innerHTML = article;
      }
    }

    let num = 18;

    let termsArray = [];
    let array = termsArray;
    let posts = '&posts='+num;
    let offset = 0;
    let filterDate = 'nodate';
    let inputValue = 'a';
    let offsetIncrement = num;

    const empty = () => {
      fetch('empty', false, 0, inputValue, filterDate);
    }

    $todas.addEventListener('click', function(){
      showAll();
      firstTime == 1;
    });

    $tabs.forEach(function(item, index) {
      termsArray[index] = item.getAttribute('data-termid');
    });

    let fetch = (array, load, offset, inputValue, filterDate) => {

      let ourRequest = new XMLHttpRequest();
      offset = '&offset='+offset;
      let key = '&key='+inputValue;
      filterDate = '&date='+filterDate;
      let local = url+array+posts+offset+key+filterDate;
      ourRequest.open('GET', local);
      ourRequest.onload = () => {
        if (ourRequest.status >= 200  && ourRequest.status < 400) {
          let data = JSON.parse(ourRequest.responseText);
          getAllPosts(data, load);

          $placeholder.children.length ? $load.classList.add('visible') : $load.classList.remove('visible');
          animateArticles();


        }
        else {
          console.log('error');
        }
      }
      ourRequest.onerror = () => {
        console.log('connection error');
      };
      ourRequest.send();
    };

    //initial load
    fetch(termsArray, false, 0, inputValue, filterDate);



    //Search by Term
    $tabs.forEach(function(item) {
      item.addEventListener('click', function(){
        collapse();

        offset = 0;
        offsetIncrement = num+1;
        let loaded = document.getElementsByClassName('canal-main__list--extra');
        while(loaded.length > 0){
          loaded[0].parentNode.removeChild(loaded[0]);
        }

        let termId = item.getAttribute('data-termid');

        if (firstTime == 1 ) {
          $tabs.forEach(function(item) {
            item.classList.add('deselected');
          });

          item.classList.remove('deselected');
          $merged.classList.remove('selected');
          termsArray = [];
          termsArray.push(termId);
          firstTime = 0;

        } else if (item.classList.contains('deselected')) {
          item.classList.remove('deselected');
          termsArray.push(termId);
        } else {
          item.classList.add('deselected');
          termsArray = termsArray.filter(e => e !== termId);
        }

        if (item.classList.contains('topbar__audiencia')) {
          if ($drop.firstElementChild.classList.contains('deselected') && $drop.lastElementChild.classList.contains('deselected') ) {
            $merged.classList.remove('selected');
          } else {
            $merged.classList.add('selected');
          }
        }

        if ( termsArray.length == 0) {
          empty();
        } else {
          fetch(termsArray, false, 0, inputValue, filterDate);
        }
      });
    });

    //Load Posts
    $load.addEventListener('click', function(){
      if ( termsArray.length == 0) {
        empty();
      } else {
        fetch(termsArray, true, offsetIncrement, inputValue, filterDate);
        offsetIncrement+= num+1;
      }
    })


    let submit = () => {
      if ($input.value != '') {
        inputValue = $input.value;
        $clear.classList.add('visible');
        offset = 0;
        offsetIncrement = num+1;
        $placeholder.classList.add('canal-main__list--results');
        if ( termsArray.length == 0) {
          empty();
        } else {
          fetch(termsArray, false, offset, inputValue, filterDate);
        }
      }
    }

    let clear = () => {
      $clear.classList.remove('visible');
      inputValue = 'a';
      $input.value = "";
      offset = 0;
      $placeholder.classList.remove('canal-main__list--results');
      offsetIncrement = num+1;
      if ( termsArray.length == 0) {
        empty();
      } else {
        fetch(termsArray, false, offset, inputValue, filterDate);
      }
    }

    $input.addEventListener('keydown', function(e) {
      $clear.classList.remove('visible');
      if(e.keyCode == 13 ) {
        submit();
      }
      if(e.keyCode == 8 ) {
        if ($input.value == '') {
         clear();
        }
      }
    });


    $submit.addEventListener('click', function(){
      submit();
      collapse();
    });

    $clear.addEventListener('click', function(){
      clear();

    });

    $calendarButton.addEventListener('click', () => {
      toggleClass( $calendarWrapper, 'visible');
      fp.open();
      collapse();
    });

    $calendarClear.addEventListener('click', () => {
      $calendarClear.classList.remove('visible');
      $calendarWrapper.classList.remove('visible');
      $calendarButton.textContent= 'Fecha';
      filterDate = 'nodate';
      offset = 0;
      offsetIncrement = num+1;
      if ( termsArray.length == 0) {
       empty();
      } else {
        fetch(termsArray, false, offset, inputValue, filterDate);
      }
      fp.clear();
    });

    const fetchDate = (selectedDates, dateStr, instance) => {
      //if ( !$calendarClear.classList.contains('visible')){
      const format = date => { return date > 9 ? ""+date : "0"+date }
      let date = selectedDates[0].getFullYear() + "-" + format(selectedDates[0].getMonth() + 1) + "-" + format(selectedDates[0].getDate());
      $calendarButton.textContent= date;
      //}
      $calendarWrapper.classList.remove('visible');
      $calendarClear.classList.add('visible');

      filterDate = date;

      offset = 0;
      offsetIncrement = num+1;
      if ( termsArray.length == 0) {
        empty();
      } else {
        fetch(termsArray, false, offset, inputValue, filterDate);
      }
    }

    const showAll = () => {
      expand();
      clear();
      $merged.classList.add('selected');
      $tabs.forEach(function(item, index) {
        termsArray[index] = item.getAttribute('data-termid');
        item.classList.remove('deselected');
      });
      fetch(termsArray, false, 0, inputValue, filterDate);
    }


    $featured.addEventListener('click', function(){
      showAll();
    });

    const fp = flatpickr($calendar, {
      enableTime: false,
      dateFormat: "Y-m-d",
      inline: true,
      "locale": Spanish,
      onChange: function(selectedDates, dateStr, instance){
        fetchDate(selectedDates, dateStr, instance);
      }
    });
  }

  const animateArticles = () => {
    //alert('hello');
    const $articles = document.querySelectorAll('.canal-article');
    const controllerArticles = new ScrollMagic.Controller();

    $articles.forEach(article => {
      let tweenArticles = TweenMax.to(article, 0.7, {y: 0, opacity: 1, zIndex: 10 });

      new ScrollMagic.Scene({
        triggerElement: article,
        offset: -(window.innerHeight * 0.6)
      })
      .setTween(tweenArticles)
      .addTo(controllerArticles);
    });
  }



}

export default Topbar;
