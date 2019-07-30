import Header from './components/header.js';
import Footer from './components/footer.js';
import Main from './components/main.js';
import Home from './components/home.js';
import Corporativo from './components/corporativo.js';
import Contacto from './components/contacto.js';
import Newsletter from './components/newsletter.js';
import Clientes from './components/clientes.js';
import Cliente from './components/cliente.js';
import Casos from './components/casos.js';
import Caso from './components/caso.js';
import Canal from './components/canal.js';
import Sidebar from './components/sidebar.js';
import Topbar from './components/topbar.js';
import Cookies from './components/cookies.js';
import Feedly from './components/feedly.js';

import match from './utils/match';

function detectCurrentPage() {
  const siteBody = document.querySelector('[data-site-body]');
  const { classList } = siteBody;

  match(classList)
    .on(x => x.contains('home'), () => Home())
    .on(x => x.contains('corporativo'), () => Corporativo())
    .on(x => x.contains('contacto'), () => Contacto())
    .on(x => x.contains('clientes'), () => Clientes())
    .on(x => x.contains('cliente'), () => Cliente())
    .on(x => x.contains('casos'), () => Clientes())
    .on(x => x.contains('caso'), () => Cliente())
    .on(x => x.contains('canal'), () => Canal())
    .on(x => x.contains('newsletter'), () => Newsletter())
    .on(x => x.contains('feedly'), () => Feedly())

}

function main() {
  Footer();
  Header();
  Sidebar();
  Topbar();
  Main();
  Cookies();
}

function init() {
  main();
  detectCurrentPage();
}



init();
