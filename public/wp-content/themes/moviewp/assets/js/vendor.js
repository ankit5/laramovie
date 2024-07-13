jQuery(function() {
    jQuery(".ps-display").perfectScrollbar({ wheelPropagation: !1 });
    const a = document.querySelectorAll(".ps-display"),
        b = new ResizeObserver(() => {
            jQuery(".ps-display").perfectScrollbar("update"), console.log("dropdown opened");
        });
    a.forEach((a) => {
        b.observe(a);
    });
	new LazyLoad({
        elements_selector: "img.lazyfast",
        callback_error: function(element) {
            element.src = "data:image/webp;base64,UklGRhoAAABXRUJQVlA4TA4AAAAv20BSAAcQEf0PRET/Aw==";
            var h2 = document.createElement("h2");
            h2.classList.add("movie-title-new");
  h2.innerHTML = element.alt;
  element.after(h2);
        }
    });

});
document.addEventListener("DOMContentLoaded", function() {
    var lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));
    lazyImages.forEach(function(lazyImage) {
        
        if (lazyImage.querySelector('.error') !== null) {
        
        }
      });
    });

const isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
var appendNumber =1;
var scrollLoad = true;
$(window).scroll(function() {
    
    var scroll_height = (isMobile)?250:200;
   // console.log($(document).height())
     if (scrollLoad && $(window).scrollTop() >= $(document).height() - $(window).height() - 100) {
        scrollLoad = false;
        const urlParams = new URLSearchParams(window.location.search);
        const s = urlParams.get('s');
        var doc_url = document.URL.replace(/\/$/, "");
        url_post= doc_url+"/"+appendNumber;
        console.log(doc_url);
        var isRoot =/^(\/|\/index\.php|\/index\.aspx)$/i.test(location.pathname);
       if(isRoot || doc_url=='https://moviesflix.hair'){
        url_post= doc_url+"/front/"+appendNumber;
       }
    $('.loader2').show();

    $.ajax( {
        type: "GET",
        url: url_post,
        success: function( data ) {
            if(data==''){
                scrollLoad = false;
                $('.loader2').hide(); 
                return true;
            }
       // console.log(data[1].data);
       //var rawDoc= $(data[1].data).find('.items').html();
       var rawDoc = data[1].data;
       let doc = document.createElement('html');
       
       doc.innerHTML = data;
       let div1 = doc.querySelectorAll('.item');
       if(isRoot){
       // console.log(data);
        $(".loadmore").append(data);
       }else{
       div1.forEach(p => {
        $(".loadmore").append(p);
        $(p).css({
            opacity: 1,
            transform: 'scale(1)',
          });
       });
      }
       
       $('.loader2').hide(); 
       new LazyLoad({
        elements_selector: "img.lazyfast",
        callback_error: function(element) {
            element.src = "data:image/webp;base64,UklGRhoAAABXRUJQVlA4TA4AAAAv20BSAAcQEf0PRET/Aw==";
            var h2 = document.createElement("h2");
            h2.classList.add("movie-title-new");
  h2.innerHTML = element.alt;
  element.after(h2);

        }
    });
       document.addEventListener("DOMContentLoaded", function() {
        var lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));
        lazyImages.forEach(function(lazyImage) {
            if (lazyImage.querySelector('.error') !== null) {
            console.log("not fount");
            }
          });
        });
       // $('.loadmore').html(data[1].data);
       ++appendNumber;
       scrollLoad = true;
        }
      });

    }   
   


});

    