import { TweenMax } from 'gsap';
import ScrollMagic from 'scrollmagic';
import 'imports-loader?define=>false!scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap';

const Canal = () => {
  const $tabs = document.querySelectorAll('.topbar__tag')
  const $placeholder = document.querySelector('.canal-main');
  const baseUrl = location.host;

  if ( baseUrl.startsWith('localhost') ) {
     var url = 'http://localhost:8888/ymedia/wp-json/canal_ymedia/search?terms=';
  } else {
    var url = 'https://staging.ymedia.es/wp-json/canal_ymedia/search?terms=';
  }

  const getAllPosts = data => {
    let article = '';
    data.forEach(function(item, index) {
      let title = data[index].title;
      let permalink = data[index].permalink;
      let excerpt = data[index].excerpt;
      let term = data[index].term.name;
      let image = data[index].thumbnail;
      let date = data[index].date;
      let color = data[index].color;
      article += `
        <article class="canal-article canal-article--regular">
          <a href="${permalink}" class="article-hero canal-article__hero">
            <?php $thumb = get_the_post_thumbnail_url(); ?>
            <figure style="background-image: url(${image})"></figure>
          </a>
          <span style="background: ${color}" class="canal-single__category"> ${term}</span>
          <div class="canal-article__content">
            <h2 class="article-title canal-article__title">${title}</h2>
            <div class="article-meta canal-article__meta">
              <span class="article-date canal-article__date">${date}</span>
            </div>
            <div class="canal-article__excerpt article-excerpt">${excerpt}</div>
          </div>
        </article>
      `
    });
    $placeholder.innerHTML = article;
  }

  let initArray = [];
  $tabs.forEach(function(item, index) {
    initArray[index] = item.getAttribute('data-termid');
  });

  initArray = initArray.toString();



  let fetch = (termsArray) => {
    let ourRequest = new XMLHttpRequest();
    let local = url+termsArray;
    ourRequest.open('GET', local);

    ourRequest.onload = () => {

    if (ourRequest.status >= 200  && ourRequest.status < 400) {
      let data = JSON.parse(ourRequest.responseText);
      getAllPosts(data);
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


  fetch(initArray);

  let termsArray = [];
  let termsString = '';

  $tabs.forEach(function(item) {
    item.classList.add('deselected');
    item.addEventListener('click', function(){

      let termId = item.getAttribute('data-termid');

      if (item.classList.contains('deselected')) {
        item.classList.remove('deselected');
        termsArray.push(termId);
      } else {
        item.classList.add('deselected');
        termsArray = termsArray.filter(e => e !== termId);
      }

      termsString = termsArray.toString();

      if ( termsArray.length == 0) {
         fetch(initArray);
      } else {
         fetch(termsArray);
      }

    });
  });




  // const $articles = document.querySelectorAll('.canal-article');
  // const controllerArticles = new ScrollMagic.Controller();

  // $articles.forEach(article => {
  //   let tweenArticles = TweenMax.to(article, 0.7, {y: 0, opacity: 1, zIndex: 10 });

  //   new ScrollMagic.Scene({
  //     triggerElement: article,
  //     offset: -(window.innerHeight * 0.6)
  //   })
  //   .setTween(tweenArticles)
  //   .addTo(controllerArticles);
  // });



}

export default Canal;


