jQuery(function(a){function b(a){const b=["\u0430","\u0431","\u0432","\u0433","\u0434","\u0435","\u0451","\u0436","\u0437","\u0438","\u0439","\u043A","\u043B","\u043C","\u043D","\u043E","\u043F","\u0440","\u0441","\u0442","\u0443","\u0444","\u0445","\u0446","\u0447","\u0448","\u0449","\u044A","\u044B","\u044C","\u044D","\u044E","\u044F","\u0101","\u0105","\xE4","\xE1","\xE0","\xE2","\xE5","\u010D","\u0107","\u0113","\u0119","\u011B","\xE9","\xE8","\xEA","\xE6","\u0123","\u011F","\xF6","\xF3","\xF8","\u01FF","\xF4","\u0151","\u1E3F","\u0149","\u0144","\u1E55","\u0155","\u015F","\xFC","\xDF","\u0159","\u0142","\u0111","\xFE","\u0125","\u1E27","\u012B","\xEF","\xED","\xEE","\u0135","\u0137","\u0142","\u0146","\u0144","\u0148","\xF1","\u0159","\u0161","\u015B","\u0165","\u016F","\xFA","\xFB","\u1EE9","\xF9","\xFC","\u0171","\u016B","\xFD","\xFF","\u017E","\u017A","\u017C","\xE7","\u0454","\u0491","\xE3"],c=["a","b","v","g","d","e","e","zh","z","i","y","k","l","m","n","o","p","r","s","t","u","f","h","ts","ch","sh","shch","#","y","#","e","yu","ya","a","a","ae","a","a","a","a","c","c","e","e","e","e","e","e","e","g","g","oe","o","o","o","o","o","m","n","n","n","p","r","s","ue","ss","r","l","d","th","h","h","i","i","i","i","j","k","l","n","n","n","r","s","s","t","u","u","u","u","u","u","u","u","y","y","z","z","z","c","ye","g","a"];for(a=a.toLowerCase(),a=a.replace(/(<[a-z0-9\-]{1,15}[\s]*>)/gi,""),a=a.replace(/(<\/[a-z0-9\-]{1,15}[\s]*>)/gi,""),a=a.replace(/(<[a-z0-9\-]{1,15}[\s]*\/>)/gi,""),a=a.replace(/^\s+|\s+$/gm,""),i=0;i<b.length;++i)a=a.split(b[i]).join(c[i]);const d=[/(&nbsp;|&#160;|&#32;)/gi,/(&mdash;|&ndash;|&#8209;)/gi,/[(_|=|\\|\,|\.|!)]+/gi,/\s/gi];for(i=0;i<b.length;++i)a=a.replace(d[i],"-");return a=a.replace(/-{2,}/g,"-"),a=a.replace(/&[a-z]{2,7};/gi,""),a=a.replace(/&#[0-9]{1,6};/gi,""),a=a.replace(/&#x[0-9a-f]{1,6};/gi,""),a=a.replace(/[^a-z0-9\-]+/gmi,""),a=a.replace(/^\-+|\-+$/gm,""),a}function c(){document.getElementById("audio").play()}const d=MoviewpAPI.tmdbapi,e="https://api.themoviedb.org/3/movie/"+MoviewpAPI.movie+"/images?api_key="+d,f="https://api.themoviedb.org/3/movie/"+MoviewpAPI.movie+"?api_key="+d+"&append_to_response="+"credits"+"&language="+MoviewpAPI.language.slice(0,2)+"",g="https://api.themoviedb.org/3/movie/"+MoviewpAPI.movie+"/credits?api_key="+d;jQuery.getJSON(f,function(c){let d=c.tagline;const e=c.original_title;""===d&&(d=e),null===d&&(d=e),a(".tagline").append(d);const f=c.credits.cast,g=[];a.each(f.slice(0,3),function(a,c){const d=b(c.name);let e="https://image.tmdb.org/t/p/w92/"+c.profile_path;"https://image.tmdb.org/t/p/w92/null"===e&&(e=MoviewpAPI.noImg),g.push("<div class=\"person\"><div class=\"img\"><a aria-label=\""+c.name+"\" href=\""+MoviewpAPI.site+"/actors/"+d+"/\"><img src=\""+e+"\" alt=\"\"></a></div><div class=\"data\"><div class=\"name\"><a href=\""+MoviewpAPI.site+"/actors/"+d+"/\">"+c.name+"</a></div><div class=\"caracter\">"+c.character+"</div></div></div>")}),a(g.join("")).appendTo(".persons")}),jQuery.getJSON(g,function(c){const d=c.crew,e=[];a.each(d,function(a,c){if("Director"==c.job){const a=b(c.name);let d="https://image.tmdb.org/t/p/w92/"+c.profile_path;"https://image.tmdb.org/t/p/w92/null"===d&&(d=MoviewpAPI.noImg),e.push("<div class=\"person\"><div class=\"img\"><a aria-label=\""+c.name+"\" href=\""+MoviewpAPI.site+"/director/"+a+"/\"><img src=\""+d+"\" alt=\"\"></a></div><div class=\"data\"><div class=\"name\"><a href=\""+MoviewpAPI.site+"/director/"+a+"/\">"+c.name+"</a></div><div class=\"caracter\">"+MoviewpAPI.regista+"</div></div></div>")}}),a(e.join("")).slice(0,1).prependTo(".persons")}),jQuery.getJSON(e,function(b){const c=[];a.each(b.backdrops,function(b,d){a("#slideshow");const e=d.file_path;c.push("<div class='movie-background' style='background-image: url(https://image.tmdb.org/t/p/w1280"+e+");'></div>")}),a(c.join("")).appendTo("#slideshow"),a("#slideshow > div:gt(0)").hide(),setInterval(function(){a("#slideshow > div:first").fadeOut(3e3).next().fadeIn(3e3).end().appendTo("#slideshow")},6e3)}),a("#monetize > div").on("click",function(){window.location.href=MoviewpAPI.watch}),a("#content > div > div.movie-info > span > div > span.progress-value").on("click",function(){window.open("https://www.themoviedb.org/movie/"+MoviewpAPI.movie+"","_blank")}),a("#quality-button .switch input").on("click",function(){c()})});function switchVisible(){document.getElementById("videoplayer1")&&("none"==document.getElementById("videoplayer1").style.display?(document.getElementById("videoplayer1").style.display="block",document.getElementById("videoplayer2").style.display="none"):(document.getElementById("videoplayer1").style.display="none",document.getElementById("videoplayer2").style.display="block"))}var checkbox=jQuery("#quality-button .switch input");jQuery("#quality-switch").on("change",function(){console.log("changed");var a=jQuery(this).is("checked");a?(jQuery(".modal-content > iframe").attr("src",MoviewpAPI.videolinkhd),switchVisible()):(jQuery(".modal-content > iframe").attr("src",MoviewpAPI.videolink),switchVisible())}),jQuery("#videoplayer1").on("click",function(){jQuery(".modal-content > iframe").attr("src",MoviewpAPI.videolink)}),jQuery("#videoplayer2").on("click",function(){jQuery(".modal-content > iframe").attr("src",MoviewpAPI.videolinkhd)});function servers(a){var b=document.querySelectorAll(".active");[].forEach.call(b,function(a){a.classList.remove("active")}),a.target.className="active"}function downloads(a){var b=document.querySelectorAll(".active");[].forEach.call(b,function(a){a.classList.remove("active")}),a.target.className="active"}jQuery("#multi").on("click",function(){jQuery(".multi").toggle(),jQuery(".server").text(function(a,b){return"Hide"==b?""+MoviewpAPI.multiserver+"":"Hide"})}),jQuery("#multidownload").on("click",function(){jQuery(".multidownload").toggle(),jQuery(".downloads").text(function(a,b){return"Close"==b?"Multi Download":"Close"})}),jQuery(".similar").delay(500).fadeIn(500),new LazyLoad,a2a_config={onclick:1};