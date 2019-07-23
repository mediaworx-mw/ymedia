const Cookies = () => {
  const $cookies = document.querySelector('.cookies');
  const $accept = document.querySelector('.cookies__button--accept');
  const $reject = document.querySelector('.cookies__button--reject');

  function set_cookie(name, value, date) {
    document.cookie = name +'='+ value +'; Expires='+ date + '; Path=/;';
  }

  function delete_cookie(name) {
    document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
  }

  $cookies.classList.add('hidden');

  const delayCookies = () => {
    setTimeout(
      function() {
        $cookies.classList.remove('hidden');
    }, 3000);
  }

  $accept.addEventListener('click', () => {
    $cookies.classList.add('hidden');
    let oneYear = new Date(new Date().setFullYear(new Date().getFullYear() + 1));
    set_cookie('accept_ymedia_cookies', true, oneYear);
  });

  $reject.addEventListener('click', () => {
    $cookies.classList.add('hidden');
    set_cookie('reject_ymedia_cookies', true);

  });

  // console.log('accept', document.cookie.indexOf('accept_ymedia_cookies') )
  // console.log('reject', document.cookie.indexOf('reject_ymedia_cookies') )

  if( document.cookie.indexOf('accept_ymedia_cookies') == -1  && document.cookie.indexOf('reject_ymedia_cookies') == -1 ) {
    delayCookies();
  }

}

export default Cookies;