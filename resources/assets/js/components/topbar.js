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
    const $calendarIcon = document.querySelector('.topbar__calendar-icon');
    const $calendarClear = document.querySelector('.topbar__calendar-clear');
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
    const dates = document.querySelector('.canal').getAttribute('data-dates');
    const enabled = dates.split(',');
    const $topbarm = document.querySelector('.topbarm');
    const $topbarmTitle = document.querySelector('.topbarm__tags-title');
    const $topbarmTags = document.querySelector('.topbarm__tags');
    const $topbarmTag = document.querySelectorAll('.topbarm__tag');
    const $topbarmTodas = document.querySelector('.topbarm__todas');
    const $topbarmToggle = document.querySelector('.topbarm__search-toggle');
    const $topbarmSearch = document.querySelector('.topbarm__search-wrapper');
    const $calendarmWrapper = document.querySelector('.topbarm__calendar');
    const $calendarm = document.querySelector('.calendarm');
    const $confirmar = document.querySelector('.topbarm__confirmar');
    const $confirmarSearch = document.querySelector('.topbarm__search-confirm');
    const $topbarmKeySumbit = document.querySelector('.topbarm__key-submit');
    const $topbarmKeyClear = document.querySelector('.topbarm__key-clear');
    const $topbarmKeyInput = document.querySelector('.topbarm__key-input');
    const $togglesKey = document.querySelector('.canal-toggles-key');
    const $togglesCal = document.querySelector('.canal-toggles-cal');

    //Topbar Desktop

    let firstTime = 1;
    let items;
    let totalCount;

    const controllerFeatured = new ScrollMagic.Controller();

    $merged.classList.add('selected');

    //Clear input on page load
    $input.value = "";
    $topbarmKeyInput.value = "";

    //let url = `${ymediaData.root_url}/wp-json/canal_ymedia/search?terms=`;

    if ( baseUrl.startsWith('localhost') ) {
      var url = 'http://localhost:8888/ymedia/wp-json/canal_ymedia/search?terms=';
    } else {
      var url = 'https://staging.ymedia.es/wp-json/canal_ymedia/search?terms=';
    }

    const expand = () => {
      document.querySelector('.canal-featured__list').classList.remove('hidden');
      document.querySelector('.canal-featured__bottom').classList.remove('visible');
    }

    const collapse = () =>  {
      document.querySelector('.canal-featured__list').classList.add('hidden');
      document.querySelector('.canal-featured__bottom').classList.add('visible');
    }

   let loadTimes = 0;

    const getAllPosts = (data, load, ourRequest) => {
      let article = '';

      if (data[0] != null) {
         items = data[0];
         totalCount = data[1];
      }

      items.forEach(function(item, index) {
        let title = items[index].title;
        let permalink = items[index].permalink;
        //let excerpt = items[index].excerpt.split(" ").splice(0, 20).join(" ");
        let excerpt = items[index].excerpt;
        let image = items[index].thumbnail;
        let date = items[index].date;
        let color = '';
        let termsList = items[index].termsList;
        let primary = items[index].primary;
        let term = '';
        let number = termsList.length;
        let nameIndex = number/2;

        for (let i = 0; i < nameIndex; i++) {
          let x = termsList[i].term_id;
          for (let j = 0; j < termsArray.length; j++) {
            let y = termsArray[j];
            if (y == x) {
              term = termsList[i].name;
              let colorIndex = i+(number/2);
              color = termsList[colorIndex][1];
              break;
            }
          }
        }

        article += `
          <a href="${permalink}" class="canal-article canal-article--regular">
            <div class="article-hero canal-article__hero">
              <?php $thumb = get_the_post_thumbnail_url(); ?>
              <figure style="background-image: url(${image})"></figure>
            </div>
            <div class="canal-article__info">
              <span style="background: ${color}" class="canal-article__category">${term}</span>
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


       //$placeholder.children.length ? $load.classList.add('visible') : $load.classList.remove('visible');
      $load.classList.add('visible')
      if (load) {

        loadTimes++;
        let elChild = document.createElement('div');
        let classesToAdd = [ 'canal-main__list', 'canal-main__list--extra'];
        elChild.classList.add(...classesToAdd);
        elChild.innerHTML = article;
        $placeholder.appendChild(elChild);
      } else {
        $placeholder.innerHTML = article;
      }

      if (totalCount/num <= (loadTimes + 2 ) ) {
        $load.classList.remove('visible');
      }

    }

    let num = 18;

    let termsArray = [];
    let array = termsArray;
    let posts = '&posts='+num;
    let offset = 0;
    let filterDate = 'nodate';
    let inputValue = 'a';
    let offsetIncrement = 0;

    const empty = () => {


      fetch('empty', false, 0, inputValue, filterDate);
    }

    $todas.addEventListener('click', function(){
      showAll();
      firstTime = 1;
      loadTimes = 0;
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

          if(data == null) {
            $placeholder.innerHTML= '<h1 class="no-results">Ups!! No hay noticias disponibles.</h1>';
            $load.classList.remove('visible');

          }

          if(data != null) {
            getAllPosts(data, load, ourRequest);
            animateArticles();
          }
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
        offsetIncrement = 0;
        loadTimes = 0;
        $placeholder.children.length ? $load.classList.add('visible') : $load.classList.remove('visible');
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


    //Load More
    $load.addEventListener('click', function(){
      if ( termsArray.length == 0) {
        empty();
      } else {
        offsetIncrement+= num;
        fetch(termsArray, true, offsetIncrement, inputValue, filterDate);
      }
    })


    let submit = () => {
      if ($input.value != '') {
        $placeholder.innerHTML= '';
        $load.classList.remove('visible');
        collapse();
        inputValue = $input.value;
        $clear.classList.add('visible');

        offset = 0;
        offsetIncrement = 0;
        loadTimes = 0;
        if (window.innerWidth > 600) {
          $placeholder.classList.add('canal-main__list--results');
        }

        if ( termsArray.length == 0) {
          empty();

        } else {
          fetch(termsArray, false, offset, inputValue, filterDate);
        }
      }
    }

    let clear = () => {
      $placeholder.innerHTML= '';
      $load.classList.remove('visible');
      $clear.classList.remove('visible');
      inputValue = 'a';
      $input.value = "";
      offset = 0;
      offsetIncrement = 0;
       loadTimes = 0;

      $placeholder.classList.remove('canal-main__list--results');

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
    });

    $clear.addEventListener('click', function(){
      clear();
    });

    $calendarIcon.addEventListener('click', () => {
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
      offsetIncrement = 0;
       loadTimes = 0;
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
      offsetIncrement = 0;
       loadTimes = 0;
      if ( termsArray.length == 0) {
        empty();
      } else {
        fetch(termsArray, false, offset, inputValue, filterDate);
      }
    }

    const showAll = () => {
      clear();
      $merged.classList.add('selected');
      $tabs.forEach(function(item, index) {
        termsArray[index] = item.getAttribute('data-termid');
        item.classList.remove('deselected');
      });
      fetch(termsArray, false, 0, inputValue, filterDate);
    }


    $featured.addEventListener('click', function(){
      expand();
    });

    const fp = flatpickr($calendar, {
      enableTime: false,
      enable: enabled,
      dateFormat: "Y-m-d",
      inline: true,
      "locale": Spanish,
      onChange: function(selectedDates, dateStr, instance){
        fetchDate(selectedDates, dateStr, instance);
      }
    });

    const fpm = flatpickr($calendarm, {
      enableTime: false,
      enable: enabled,
      dateFormat: "Y-m-d",
      inline: true,
      "locale": Spanish,
      onChange: function(selectedDates, dateStr, instance){
        fetchDateMobile(selectedDates, dateStr, instance);
      }
    });



    //Mobile Functions
    $topbarmTitle.addEventListener('click', function(){
      toggleClass($topbarmTags, 'expanded');

      $topbarmToggle.classList.remove('expanded');
      $topbarmSearch.classList.remove('visible');
      $calendarmWrapper.classList.remove('visible');
    });

    $topbarmToggle.addEventListener('click', function(){
      toggleClass($topbarmToggle, 'expanded');
      toggleClass($topbarmSearch, 'visible');
      toggleClass($calendarmWrapper, 'visible');

      $topbarmTags.classList.remove('expanded');
      //fpm.clear();
    });

    $topbarmTag.forEach(function(item) {
      item.addEventListener('click', () => {
        toggleClass(item, 'topbarm__tag--selected');

        let termId = item.getAttribute('data-termid');

        if (firstTime == 1 ) {
          termsArray = [];
          termsArray.push(termId);
          firstTime = 0;
           console.log('firttime', termsArray);

        } else if (item.classList.contains('topbarm__tag--selected')) {
          termsArray.push(termId);

          console.log('quitar', termsArray);
        } else {
          termsArray = termsArray.filter(e => e !== termId);
          console.log('poner', termsArray);
        }

        // if ( termsArray.length == 0) {
        //   empty();
        // } else {
        //   fetch(termsArray, false, 0, inputValue, filterDate);
        // }
      });

    });

    let clearm = () => {
      //$placeholder.innerHTML= '';
      $load.classList.remove('visible');
      $topbarmKeyClear.classList.remove('visible');
      inputValue = 'a';
      $topbarmKeyInput.value = "";
      offset = 0;
      offsetIncrement = 0;
      loadTimes = 0;
      filterDate = 'nodate';
      //$placeholder.classList.remove('canal-main__list--results');

      // if ( termsArray.length == 0) {
      //   empty();
      // } else {
      //   fetch(termsArray, false, offset, inputValue, filterDate);
      // }
    }

    let clearmKey = () => {
      //$placeholder.innerHTML= '';
      $load.classList.remove('visible');
      inputValue = 'a';
      $topbarmKeyInput.value = "";
      offset = 0;
      offsetIncrement = 0;
      loadTimes = 0;

      //$placeholder.classList.remove('canal-main__list--results');

      if ( termsArray.length == 0) {
        empty();
      } else {
        fetch(termsArray, false, offset, inputValue, filterDate);
      }
    }



    let clearmCal = () => {
      $placeholder.innerHTML= '';
      $load.classList.remove('visible');
      filterDate = 'nodate';
      offset = 0;
      offsetIncrement = 0;
      loadTimes = 0;
      if ( termsArray.length == 0) {
       empty();
      } else {
        fetch(termsArray, false, offset, inputValue, filterDate);
      }


      fp.destroy();

    }

    $topbarmTodas.addEventListener('click', () => {
      $topbarmTag.forEach(function(tag, index) {
        tag.classList.add('topbarm__tag--selected');
        termsArray[index] = tag.getAttribute('data-termid');
      });

      //firstTime = 1;
      loadTimes = 0;
    });

    $confirmar.addEventListener('click', () => {
      $topbarmToggle.classList.remove('expanded');
      $topbarmSearch.classList.remove('visible');
      $calendarmWrapper.classList.remove('visible');
      $topbarmTags.classList.remove('expanded');

      collapse();
      offset = 0;
      offsetIncrement = 0;
      loadTimes = 0;
      $placeholder.children.length ? $load.classList.add('visible') : $load.classList.remove('visible');
      let loaded = document.getElementsByClassName('canal-main__list--extra');
      while(loaded.length > 0){
        loaded[0].parentNode.removeChild(loaded[0]);
      }

      if ( termsArray.length == 0) {
        empty();
      } else {
        fetch(termsArray, false, 0, inputValue, filterDate);
      }




    });

    $confirmarSearch.addEventListener('click', () => {
      $placeholder.innerHTML= '';
      $topbarmToggle.classList.remove('expanded');
      $topbarmSearch.classList.remove('visible');
      $calendarmWrapper.classList.remove('visible');
      collapse();

      //placeholder.classList.remove('canal-main__list--results');

      inputValue = $topbarmKeyInput.value;
      //$topbarmKeyClear.classList.add('visible');

      if ( termsArray.length == 0) {
        empty();
      } else {
        fetch(termsArray, false, 0, inputValue, filterDate);
      }

      if(inputValue !=="") {
        $togglesKey.classList.add('show');
        $togglesKey.textContent = inputValue;
      }

      if(filterDate !=="nodate") {
        $togglesCal.classList.add('show');
        $togglesCal.textContent = filterDate;
      }

    });

    $togglesKey.addEventListener('click', function() {
      clearmKey();
      $togglesKey.classList.remove('show');
    });

    $togglesCal.addEventListener('click', function() {
      clearmCal();
      $togglesCal.classList.remove('show');
    })


    $topbarmKeySumbit.addEventListener('click', () => {
      if ($topbarmKeyInput.value != '') {
        $placeholder.innerHTML= '';
        $load.classList.remove('visible');
        //collapse();
        inputValue = $topbarmKeyInput.value;
        console.log(inputValue);
        //$topbarmKeyClear.classList.add('visible');

        offset = 0;
        offsetIncrement = 0;
        loadTimes = 0;
        if (window.innerWidth > 600) {
          $placeholder.classList.add('canal-main__list--results');
        }
        // if ( termsArray.length == 0) {
        //   empty();
        // } else {
        //   fetch(termsArray, false, offset, inputValue, filterDate);
        // }
      }
    });



    const fetchDateMobile = (selectedDates, dateStr, instance) => {
      //if ( !$calendarClear.classList.contains('visible')){
      const format = date => { return date > 9 ? ""+date : "0"+date }
      let date = selectedDates[0].getFullYear() + "-" + format(selectedDates[0].getMonth() + 1) + "-" + format(selectedDates[0].getDate());
      $calendarButton.textContent= date;
      //}

      filterDate = date;

      console.log(filterDate);

      offset = 0;
      offsetIncrement = 0;
      loadTimes = 0;
      // if ( termsArray.length == 0) {
      //   empty();
      // } else {
      //   fetch(termsArray, false, offset, inputValue, filterDate);
      // }
    }

    // $topbarmKeyClear.addEventListener('click', () => {
    //   clearm();
    // })


  }

  const animateArticles = () => {
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
