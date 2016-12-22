/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(function () {



    $("#plus_price_row_click").click(function () {

        hidden_html = $("#pricing_hidden_div").html();
        $(hidden_html).appendTo("#pricing_div");

    });





});