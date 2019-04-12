import Header from './components/header.js';
import Footer from './components/footer.js';
import Home from './components/home.js';
import Corporativo from './components/corporativo.js';
import Clientes from './components/clientes.js';
import Cliente from './components/cliente.js';
import Canal from './components/canal.js';
import Sidebar from './components/sidebar.js';
import match from './utils/match';

function detectCurrentPage() {
  const siteBody = document.querySelector('[data-site-body]');
  const { classList } = siteBody;

  match(classList)
    .on(x => x.contains('home'), () => Home())
    .on(x => x.contains('corporativo'), () => Corporativo())
    .on(x => x.contains('clientes'), () => Clientes())
    .on(x => x.contains('cliente'), () => Cliente())
    .on(x => x.contains('canal'), () => Canal())
}

function main() {
  Footer();
  Header();
  Sidebar();
}

function init() {
  main();
  detectCurrentPage();
}

init();
