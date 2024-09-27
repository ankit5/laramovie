function getIframe(url) {
    return `<iframe src="${url}" scrolling="no" frameborder="0" allowfullscreen="" webkitallowfullscreen="" mozallowfullscreen=""></iframe>`;
	}

$(document).on("click", ".buttonLoadHost", function () {
    var id = $(this).attr("data-load-id");
    var tab = $(this).attr("data-load-tab");

    $(".buttonLoadHost").removeClass("active");
    $(this).addClass("active");
    var url = `https://play.123hdmovies2.xyz/?id=${id}&tab=${tab}&iframe=1`;
    //window.open(url, "_blank");
    //
    //document.location.href = url;
   // window.location.replace(url);  
    //var url = "getEmbed.php?id=" + id + "&sv=" + sv + "&embed=true";
    $("#autoembed").html(getIframe(url));
    $("#autoembed").addClass("active");
    $("#mainautoembed").addClass("hidden");
});

$(document).on("click", "#showMainButton", function () {
    var $menu = $("#mainautoembed");
    var $embed = $("#autoembed");
    if ($menu.hasClass("hidden")) {
        $menu.removeClass("hidden");
        $embed.removeClass("active");
    } else {
        $menu.addClass("hidden");
        $embed.addClass("active");
    }
});
jQuery(function() {
    jQuery(".ps-display").perfectScrollbar({ wheelPropagation: !1 });
    const a = document.querySelectorAll(".ps-display"),
        b = new ResizeObserver(() => {
            jQuery(".ps-display").perfectScrollbar("update"), console.log("dropdown opened");
        });
    a.forEach((a) => {
        b.observe(a);
    });
	//new LazyLoad();
});