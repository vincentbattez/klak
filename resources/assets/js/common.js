import pjax from './lib/pjax';

/*------------------------------------*\
    $ IMPORTS
\*------------------------------------*/
export default {
  init() {
    console.log('Je suis dans toutes les pages');
    pjax();
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
