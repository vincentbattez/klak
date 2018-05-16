import 'jquery-pjax/jquery.pjax.js';

function submitPjax(form, container) {
  $(document).on('submit', 'form['+form+']', {push:false}, function(event) {
    $.pjax.submit(event, '['+container+']')
  })
}

function pjax(form, container, options) {
  $(document).pjax('['+form+'] a, a['+form+']', '['+container+']', {options});
}

export default () => {
  $.pjax.defaults.scrollTo = false;

  console.log('pjax start');
  /*—————  Main reset   ———————*/
  pjax(      'data-pjax-body', 'pjax-container-body');
  submitPjax('data-pjax-body', 'pjax-container-body');
  /*—————  Body reset   ———————*/
  pjax(      'data-pjax-main', 'pjax-container-main');
  submitPjax('data-pjax-main', 'pjax-container-main');
}
