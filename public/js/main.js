$(window).load(function () {
    var $navbar = $('#navbar');

// Add "loaded" class when a section has been loaded
    $(window).scroll(function () {
        var scrollTop = $(window).scrollTop();
        $(".section").each(function () {
            var elementTop = $(this).offset().top - $('#header').outerHeight();
            if (scrollTop >= elementTop) {
                $(this).addClass('loaded');
            }
        });
    });

// One Page Navigation Setup
    $('#navigation').singlePageNav({
        offset: $navbar.outerHeight(),
        filter: ':not(.linkable)',
        speed: 750,
        currentClass: 'active'
    });

// Sticky Navbar Affix
    $navbar.affix({
        offset: {
            top: $('#topbar').outerHeight()
        }
    });

// Smooth Hash Link Scroll
    $('.smooth-scroll').click(function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {

            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                        scrollTop: target.offset().top - $navbar.outerHeight()
                    },
                    1000);
                console.log($navbar.outerHeight());
                return false;
            }
        }
    });
    var $navbarToggle = $(".navbar-toggle");

    $('.nav a').on('click', function () {
        if ($navbarToggle.css('display') != 'none') {
            $navbarToggle.click();
        }
    });


    var $container = $('.portfolio-isotope');

    $container.isotope({
        itemSelector: '.portfolio-item',
        resizable: true,
        resizesContainer: true
    });

// filter items when filter link is clicked
    $('#filters').find('a').click(function () {
        var selector = $(this).attr('data-filter');
        $container.isotope({filter: selector});
        return false;
    });
})
;

$('#formulario-contacto-simple').submit(function (e) {
    if ($("form")[0].checkValidity()) {
        e.preventDefault();
        var data = ($('#formulario-contacto-simple').serialize());

        $.ajax({
            url: 'contact',
            method: 'post',
            data: data + "&contacto-simple=button",
            dataType: "json",
            success: function (data) {
                console.log("Success: " + data);
                if (data.sendstatus == 1) {
                    console.log("EXITO!");
                    $('#formulario-contacto-simple').addClass('zoomOut animated');
                    $('#span-consulta').html("Gracias! <br/>Nos pondremos en contacto en breve");
                    $(".elegir-contacto").text("");
                }
                else {
                    console.log("Error ");
                }
            },
            error: function (data) {
                console.log("Error: " + data);
            }
        });
    }
});
var wowVar = new WOW({boxClass: 'wow', animateClass: 'animated', offset: 30, mobile: false, live: true});
wowVar.init();
