/*global dotclear, ga */
'use strict';

{
  let a = undefined;
  let m = undefined;
  const i = window;
  const s = document;
  const o = 'script';
  const g = '//www.google-analytics.com/analytics.js';
  const r = 'ga';
  i.GoogleAnalyticsObject = r;
  (i[r] =
    i[r] ||
    function () {
      (i[r].q = i[r].q || []).push(arguments);
    }),
    (i[r].l = 1 * new Date());
  (a = s.createElement(o)), (m = s.getElementsByTagName(o)[0]);
  a.async = 1;
  a.src = g;
  m.parentNode.insertBefore(a, m);
}

ga('create', dotclear.getData('googletools_ga'), 'auto');
ga('send', 'pageview');
