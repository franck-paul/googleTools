/*global dotclear */
'use strict';

dotclear.ready(() => {
  const ga_data = dotclear.getData('googletools_ga');

  window.dataLayer = window.dataLayer || [];

  function gtag(...args) {
    dataLayer.push(args);
  }

  gtag('js', new Date());
  gtag('config', ga_data.uacct);
});
