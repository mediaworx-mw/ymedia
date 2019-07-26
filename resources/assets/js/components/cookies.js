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

  function deleteAllCookies() {
    let cookies = document.cookie.split("; ");
    for (let c = 0; c < cookies.length; c++) {
      let d = window.location.hostname.split(".");
      while (d.length > 0) {
        let cookieBase = encodeURIComponent(cookies[c].split(";")[0].split("=")[0]) + '=; expires=Thu, 01-Jan-1970 00:00:01 GMT; domain=' + d.join('.') + ' ;path=';
        let p = location.pathname.split('/');
        document.cookie = cookieBase + '/';
        while (p.length > 0) {
          document.cookie = cookieBase + p.join('/');
            p.pop();
        };
        d.shift();
      }
    }
  }

  const delayCookies = () => {
    setTimeout(
      function() {
        $cookies.classList.add('visible');
    }, 1000);
  }

  if ($accept != null) {

    $accept.addEventListener('click', () => {
      $cookies.classList.remove('visible');
      let oneYear = new Date(new Date().setFullYear(new Date().getFullYear() + 1));
      set_cookie('accept_ymedia_cookies', true, oneYear);
    });

    $reject.addEventListener('click', () => {
      $cookies.classList.remove('visible');
      deleteAllCookies();
      set_cookie('reject_ymedia_cookies', true);

    });

  }

  // console.log('accept', document.cookie.indexOf('accept_ymedia_cookies') )
  // console.log('reject', document.cookie.indexOf('reject_ymedia_cookies') )

  if( document.cookie.indexOf('accept_ymedia_cookies') == -1  && document.cookie.indexOf('reject_ymedia_cookies') == -1 ) {
    delayCookies();
  }

}

export default Cookies;