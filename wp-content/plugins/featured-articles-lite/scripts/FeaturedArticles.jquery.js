/**
 * @package Featured articles Lite - Wordpress plugin
 * @author CodeFlavors ( http://www.codeflavors.com )
 * @version 2.4
 */

/**
 *	Author: CodeFlavors ( http://www.codeflavors.com )
 *	Copyrigh (c) 2011 - author
 *	License: MIT(http://www.opensource.org/licenses/mit-license.php) and GPL (http://www.opensource.org/licenses/gpl-license.php)
 *	Package: Wordpress Featured Articles Lite plugin
 *	Version: 1.1
 *	jQuery version: 1.4.4
 *	Uses: DOMMouseScroll by Brandon Aaron (http://brandonaaron.net)
 */
(function(A){A.fn.FeaturedArticles=function(E){if(this.length>1){this.each(function(){A(this).FeaturedArticles(E)});return this}var S=get_wp_params(),N=A(this).attr("id"),P=S[N]?A.parseJSON(S[N].replace(/&quot;/g,'"')):{};
if(P.slideDuration){P.slideDuration=parseFloat(P.slideDuration)*1000}if(P.effectDuration){P.effectDuration=parseFloat(P.effectDuration)*1000}var E=A.extend({},P,E);
var G=this;
var R={slideDuration:5000,effectDuration:1000,fadeDist:null,fadePosition:null,stopSlideOnClick:false,autoSlide:false,mouseWheelNav:false,load:function(){},before:function(){},after:function(){},change:function(){},start:function(){},stop:function(){},articleSelector:".FA_article",individualNavSelector:".FA_navigation a",backSelector:".FA_back",nextSelector:".FA_next"};
var E=A.extend({},R,E);var L=this;
this.currentKey=0;
this.interval=false;
this.stopped=false;
this.paused=false;
var B=function(){L.slides=A(L).find(E.articleSelector);
var V=A();
var T=A("<img />",{src:"http://cdnsmall.codeflavors.com/r_ico/fa_lite_ico.png",style:"border:none;",alt:"Powered by FeaturedArticles for WordPress",width:"16",height:"16",load:function(){V.appendTo(A(L));A(this).appendTo(V)},error:function(){A(this).attr("src","http://www.codeflavors.com/r_ico/fa_lite_ico.png");
V.appendTo(A(L));
A(this).appendTo(V)}});
if(L.slides.length<2){return}I();
H();K();
var U=Q();
if(U.autoSlide){D();A(L).mouseenter(function(){C();L.paused=true});
A(L).mouseleave(function(){D();L.paused=false})}if(U.mouseWheelNav){A(L).mousewheel(function(X,Y){X.preventDefault();
if(Y>0){var W=L.currentKey-1<0?L.slides.length-1:L.currentKey-1}else{if(Y<0){var W=L.currentKey+1>L.slides.length-1?0:L.currentKey+1}}C();J(W,Y)})}E.load.call(L,U);return L};var Q=function(){return E};var F=function(){var T=L.currentKey+1>=L.slides.length?0:L.currentKey+1;J(T)};var C=function(){clearInterval(L.interval);L.interval=false;var T=Q();T.stop.call(L,{})};var D=function(){if(L.stopped){return}var U=Q();
if(L.interval){clearInterval(L.interval)}var T=function(){F(L)};L.interval=setInterval(T,U.slideDuration||3000);U.start.call(L,{})};var I=function(){var U={position:"absolute",top:0,left:0,"z-index":1};var T={"z-index":100};
if(E.effectDuration>0){U.opacity=0;T.opacity=1;T.filter=1}L.slides.css(U);A(L.slides[L.currentKey]).css(T)};var H=function(){L.navLinks=A(L).find(E.individualNavSelector);
if(L.navLinks.length<1){return}var T=Q();A.each(L.navLinks,function(U,V){var W=A(V).parent().find("span");
if(W.length>0){A(V).mouseenter(function(X){A(W).css({display:"block",top:-25,opacity:0}).animate({opacity:1,top:-20})}).mouseleave(function(X){W.css({display:"none",opacity:0,top:-25})})}A(V).mouseenter(function(X){X.preventDefault();
if(L.interval){C()}J(U);
if(!T.stopSlideOnClick&&T.autoSlide){if(!L.paused){D()}}else{if(T.stopSlideOnClick&&T.autoSlide){L.stopped=true}}});
if(U==L.currentKey){A(L.navLinks[U]).addClass("active")}})};
var K=function(){var V=A(L).find(E.backSelector),T=A(L).find(E.nextSelector),U=Q();
if(V.length>0){A(V).mouseenter(function(W){W.preventDefault();
M()})}if(T.length>0){A(T).mouseenter(function(W){W.preventDefault();O()})}};var O=function(){if(L.interval){C()}F();
if(!P.stopSlideOnClick&&P.autoSlide){if(!L.paused){D()}}else{if(P.stopSlideOnClick&&P.autoSlide){L.stopped=true}}};
var M=function(){var T=L.currentKey-1>=0?L.currentKey-1:L.slides.length-1;
if(L.interval){C()}J(T,1);
if(!P.stopSlideOnClick&&P.autoSlide){if(!L.paused){D()}}else{if(P.stopSlideOnClick&&P.autoSlide){L.stopped=true}}};var J=function(Z,b){if(Z==L.currentKey){return}if(Z<0||Z>=L.slides.length){return}var V=b||-1,T=Q(),c=T.fadePosition=="left"?"left":"top";var W={parent:A(L),currentElem:L.slides[L.currentKey],nextElem:L.slides[Z],direction:b,currentIndex:L.currentKey,nextIndex:Z};T.before.call(L,W);var Y={"z-index":10};var X={"z-index":100,display:"block"};var U={opacity:0};var a={opacity:1};switch(c){case"top":Y.top=0;X.top=-V*T.fadeDist;U.top=V*T.fadeDist;a.top=0;break;case"left":Y.left=0;X.left=-V*T.fadeDist;U.left=V*T.fadeDist;a.left=0;break}if(T.effectDuration>0){A(L.slides[L.currentKey]).stop().css(Y).animate(U,{queue:false,duration:T.effectDuration,complete:function(){A(this).css({"z-index":1,display:"none"})}});A(L.slides[Z]).stop().css(X).animate(a,{queue:false,duration:T.effectDuration,complete:function(){A(L.slides[Z]).css("filter","");T.after.call(L,W)}})}else{A(L.slides[L.currentKey]).css("z-index",10);A(L.slides[Z]).css("z-index",100);T.after.call(L,W)}if(L.navLinks.length>0){A(L.navLinks[L.currentKey]).removeClass("active");A(L.navLinks[Z]).addClass("active")}L.currentKey=Z;T.change.call(L,W)};this.next=function(){O()};this.prev=function(){M()};this.stop=function(){C()};this.start=function(){D()};this.settings=function(){return Q()};return B()}})(jQuery);var wp_params=false;function get_wp_params(){if(wp_params){return wp_params}var A=typeof(FA_Lite_params)!=="object"?{}:FA_Lite_params,B=typeof(FA_Lite_footer_params)!=="object"?{}:FA_Lite_footer_params;wp_params=jQuery.extend(A,B);return wp_params}(function(A){A(document).ready(function(){var D=get_wp_params(),B=D.loading_icon;A(".fa_preload_bg").each(function(H,E){var G=A(E).css("background-image").replace(/^url\(["']?/,"").replace(/["']?\)$/,""),J=A(E).css("background-position"),I=A(E).css("background-repeat");A(E).css({"background-image":"url("+B+")","background-position":"center center","background-repeat":"no-repeat"});var F=A("<img />",{src:G,alt:""});A(F).load(function(){A(E).css({"background-image":"url("+G+")","background-position":J,"background-repeat":I})})});var C=A("div.fa_preloader");A.each(C,function(G,I){var K=A(this).children(),H=K.length==0?A(this):A(K),J=H.html(),E=J.replace(/<!--|-->/g,"");H.empty();var F=A("<img />",{src:E,alt:""});A(F).load(function(){A(I).css({width:"auto",height:"auto",background:"none"});A(this).appendTo(H)})})})})(jQuery);
