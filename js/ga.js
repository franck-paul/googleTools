/*global dotclear */
'use strict';

const ga_data = dotclear.getData('googletools_ga');
window.dataLayer = window.dataLayer || [];
dataLayer.push('js', new Date(), 'config', ga_data.uacct);
