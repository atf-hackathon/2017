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
        console.log('Checking boxability...');

        var boxable = false;
        var boxableProductCodes = ['DY3MHDBBM','D3SBN2BBM','DLXM4KBBM','D1XVG7BBM','DSQD33BBM','DFXR03BBM','DRXVG7BBM','DPTK07BBM','DKJB4KBBM','DPDVF2BBM','DNDVF2BBM','DMSQKMBBM','DPL63MBBM','DX90QBBBM','DKQH5YBBM','DN0G1BBBM','D0HQXBBBM','DX5L07BBM','DP0TCBBBM','DPTL42BBM','DJFNS7BBM','D2WS8YBBM','DSY023BBM','DNJGZ3BBM','DY2JV2BBM','DTY0RBBBM','DNL6X2BBM','DLZGDDBBM','DJQT0MBBM','D0R5SBBBM'];
        for (var i in boxableProductCodes) {
            if (boxableProductCodes[i] == productCode) {
                boxable = true;
                break;
            }
        }
        if (boxable) {
            console.log('Boxable it is!');
            deliveryEstimatePanel.append(
                '<div class="delivery-estimate-border-btm">'+
                    '<div class="delivery-estimate-box pad-sep-xs">'+
                        '<i class="delivery-estimate-icon em em-open"></i>'+
                        '<div>'+
                            '<div>eBox instant</div><span class="text-success delivery-estimate-text-sm">livrare automata instantanee</span>'+
                        '</div>'+
                    '</div>'+
                '</div>'
            );
        } else {
            console.log('Not boxable at this time!');
        }
    }

    setTimeout(checkDeliveryEstimatePanel, 2000);
})();