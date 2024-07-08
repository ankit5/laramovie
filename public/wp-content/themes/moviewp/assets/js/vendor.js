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
     if (scrollLoad && $(window).scrollTop() >= $(document).height() - $(window).height() - 50) {
        scrollLoad = false;

   
    $('.loader2').show();

    $.ajax( {
        type: "GET",
        url: "?ajax=1&page="+appendNumber,
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
       //console.log(data);
       doc.innerHTML = data;
       let div1 = doc.querySelectorAll('.item');
       div1.forEach(p => {
        $(".loadmore").append(p);
        $(p).css({
            opacity: 1,
            transform: 'scale(1)',
          });
       });
       
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

    