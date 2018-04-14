/*------------------------------------*\
    $ LIBRAIRIES
\*------------------------------------*/
import 'jquery';

/*------------------------------------*\
    $ LIBRAIRIES
\*------------------------------------*/
import Router from './util/Router';
import common from './common';
// PAGES
import dashboard from './pages/dashboard';

/*------------------------------------*\
    $ ROUTER
\*------------------------------------*/
const routes = new Router({
  // Commun
  common,
  // PAGES
  dashboard,
});
// Load Events
// eslint-disable-next-line rule
jQuery(document).ready(() => routes.loadEvents(console.log("ready!")));