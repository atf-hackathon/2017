// ==UserScript==
// @name         eBox
// @namespace    http://tampermonkey.net/
// @version      0.1
// @description  try to take over the world!
// @author       You
// @match        https://www.emag.ro/*
// @grant        none
// @require http://code.jquery.com/jquery-3.2.1.js
// ==/UserScript==

(function() {
    'use strict';

    console.log('Greasemonkey loaded!');

    var matches = window.location.href.match(/pd\/([^\/]+)/);
    if (!matches) return;
    var productCode = matches[1];
    console.log('Product code: ' + productCode);

    function checkDeliveryEstimatePanel() {
        console.log('Looking for panel...');
        var deliveryEstimatePanel = $('.delivery-estimate-panel');
        if (!deliveryEstimatePanel.find('.delivery-estimate-box').length) {
            setTimeout(checkDeliveryEstimatePanel, 300);
            return;
        }

        console.log('Ready!');

        deliveryEstimatePanel.append('<div class="delivery-estimate-border-btm"><div class="delivery-estimate-box pad-sep-xs"><i class="delivery-estimate-icon em em-open"></i><div><div>eBox instant</div><span class="text-success delivery-estimate-text-sm">livrare automata instantanee</span></div></div></div>');
    }

    setTimeout(checkDeliveryEstimatePanel, 2000);
})();