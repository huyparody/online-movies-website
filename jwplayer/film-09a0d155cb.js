!function e(t,o,n){function i(l,c){if(!o[l]){if(!t[l]){var s="function"==typeof require&&require;if(!c&&s)return s(l,!0);if(r)return r(l,!0);var a=new Error("Cannot find module '"+l+"'");throw a.code="MODULE_NOT_FOUND",a}var d=o[l]={exports:{}};t[l][0].call(d.exports,function(e){var o=t[l][1][e];return i(o?o:e)},d,d.exports,e,t,o,n)}return o[l].exports}for(var r="function"==typeof require&&require,l=0;l<n.length;l++)i(n[l]);return i}({1:[function(e,t,o){"use strict";Vue.filter("number",function(e){return e.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g,"$1,")}),Vue.filter("moment",function(){function e(){var t=Array.prototype.slice.call(arguments).map(function(e){return e.replace(/^("|')|("|')$/g,"")}),o=t.shift();switch(o){case"from":var i="now";"now"==t[0]&&t.shift(),moment(t[0]).isValid()&&(i=moment(t.shift()));var r=!1;if("true"==t[0]){t.shift();var r=!0}if("now"!=i){n=n.from(i,r);break}n=n.fromNow(r);break;default:var l=o;n=n.format(l)}t.length&&e.apply(e,t)}var t=Array.prototype.slice.call(arguments),o=t.shift(),n=moment(o);return n.isValid()?(e.apply(e,t),n):""}),new Vue({el:"body",data:{keyword:"",current_page:1,load_more:!0,list:[],toggle:{search:!1},slide:[]},ready:function(){this.createPlayer(),this.bodyOnscroll(),this.windowClick(),this.windowOnresize(),this.toggleSummaryDesc(),this.getPosEpisode(),this.posFooterOnPage();try{document.querySelector(".sidebar").style.maxHeight=window.innerHeight-60+"px"}catch(e){}},methods:{windowOnresize:function(){window.onresize=function(){var e=document.querySelector(".navbar"),t=document.querySelector(".navbar-container-search"),o=e.offsetHeight;window.innerWidth<640&&60>o&&(e.style.height="50px",t.style.display="none"),window.innerWidth>=640&&window.innerWidth<800&&(e.style.height="50px",t.style.display="block"),window.innerWidth>=800&&(e.style.height="60px",t.style.display="block")}},windowClick:function(){window.onclick=function(e){var t=document.getElementsByClassName("dropdown-menu");if(!e.target.matches(".list-init"))for(var o=0;o<t.length;o++){var n=t[o];n.classList.contains("active")&&n.classList.remove("active")}}},showDropdowMenu:function(e){for(var t=document.getElementById(e).classList.contains("active"),o=document.querySelectorAll(".dropdown-menu"),n=0;n<o.length;n++)o[n].classList.remove("active");t||document.getElementById(e).classList.add("active")},playerList:function(e){for(var t=document.getElementById(e).classList.contains("active-list"),o=document.querySelectorAll(".player-view-tab-list"),n=(document.querySelectorAll("#player-playlist"),document.querySelectorAll("#film-info"),"player-list"),i="player-information",r=0;r<o.length;r++)o[r].classList.remove("active-list");t?document.getElementById(e).classList.add("active-list"):e==n?(document.getElementById(e).classList.add("active-list"),document.getElementById("player-playlist").classList.add("show"),document.getElementById("film-info").classList.remove("show")):e==i&&(document.getElementById(e).classList.add("active-list"),document.getElementById("film-info").classList.add("show"),document.getElementById("player-playlist").classList.remove("show"))},addSearch:function(){var e=document.querySelector(".navbar"),t=document.querySelector(".navbar-container-search"),o=e.offsetHeight;window.innerWidth<640&&(50>=o?(e.style.height="100px",t.style.display="block"):(e.style.height="50px",t.style.display="none"))},createPlayer:function(){var e,t,o=[],n=[],i=document.querySelector(".player-view-video"),r=document.querySelector("#videoPlayer"),l=r.querySelectorAll("source");if(0==l.length)return i.innerHTML="",void(i.innerHTML='<p class="video-notify">Video không tồn tại. Vui lòng liên hệ quản trị viên.</p>');for(var c=0;c<l.length;c++)o[c]={src:l[c].getAttribute("src"),quality:l[c].getAttribute("quality"),type:"video/mp4"},l[c].getAttribute("default")&&(n[0]=o[c]);n.length||(n[0]=o[0]),isMobile.phone?(r.load(),r.play()):(e={next:null,autoplay:!0,nativeControlsForTouch:!1,sources:n},t=vgplayer("videoPlayer",e,function(){}).ready(function(){this.options_.sources=o}))},bodyOnclick:function(){document.body.onclick=function(e){for(var t={search:!0},o=e.target;o!=document.body;){if("search-navbar-2"==o.id||"search-navbar-1"==o.id){t.search=!1;break}if(!o.parentNode)break;o=o.parentNode}t.search&&document.querySelector(".search").classList.remove("active")}},bodyOnscroll:function(){var e=document.querySelector("#back-to-top");window.onscroll=function(){document.body.scrollTop>100?e.classList.add("show"):e.classList.remove("show")}},search:function(){var e=this.keyword.trim().replace(/\s{2,}/g," ");""!==e&&(window.location="/tim-kiem/"+e)},toggleSearchForm:function(){var e=document.querySelector(".search");e.classList.contains("active")?e.classList.remove("active"):e.classList.add("active")},toggleSidebar:function(){var e=document.querySelector(".sidebar");e.classList.contains("active")?(e.classList.remove("active"),document.body.style.overflow=""):(e.classList.add("active"),document.body.style.overflow="hidden")},changeQuality:function(e){for(var t,o=document.getElementById("videoPlayer"),n=document.getElementsByTagName("source"),i=document.querySelectorAll(".btn-init"),r=n.length-e,l=n[r-1].src,c=0;c<i.length;c++)i[c].classList.remove("btn-danger"),i[c].classList.remove("btn-black"),i[c].classList.add("btn-black");i[e].classList.remove("btn-black"),i[e].classList.add("btn-danger"),o.pause(),t=o.currentTime,o.setAttribute("src",l),o.load(),o.currentTime=t,o.play()},toggleSummaryDesc:function(e){var t,o=document.querySelector("#film-description"),n=document.querySelector("#all-description"),i=document.querySelector("#summary-description");if(t=o.childElementCount,t>1)for(var r=1;t>=r;r++)try{o.children[r].style.display="none"}catch(l){}if(o.innerHTML.length<460)i.style.display="none",n.style.display="none";else if("all"==e){o.style.display="initial",i.style.display="block",n.style.display="none";for(var r=1;t>=r;r++)try{o.children[r].style.display="inline-block"}catch(l){}}else if("summary"==e){o.style.display="-webkit-box",i.style.display="none",n.style.display="block";for(var r=1;t>=r;r++)try{o.children[r].style.display="none"}catch(l){}}},getPosEpisode:function(){var e=document.querySelector(".playlist-video-container"),t=e.children[0].querySelector(".active").value;console.log(t),setTimeout(function(){try{e.scrollTop=e.children[0].children[t].offsetTop-e.offsetTop}catch(o){}},500)},posFooterOnPage:function(){var e,t=document.querySelector(".content"),o=document.querySelector(".navbar-container").offsetHeight,n=document.querySelector(".footer-container").offsetHeight;e=window.innerHeight-o-n+1,t.style.minHeight=e+"px"}}}),$("#back-to-top").on("click",function(e){e.preventDefault(),$("html,body").animate({scrollTop:0},700)})},{}]},{},[1]);