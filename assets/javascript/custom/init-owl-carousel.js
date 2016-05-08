jQuery(".local-photos").owlCarousel({
    loop:true,
    margin:0,
    nav:true,
    navText: ["", ""],
    items: 1,
    dots: false,
    smartSpeed: 800,
    autoplay:true,
    autoplayTimeout:5000,
    autoplaySpeed: 850,
    animateInClass: "fadeIn",
    animateOut: "fadeIn"
});

jQuery(".events-init").owlCarousel({
    loop:false,
    margin:30,
    nav:true,
    dots:false,
    navText: ["", ""],
    autoplay:false,
    autoplayTimeout:3000,
    autoplaySpeed: 850,
    responsive:{
        0:{
            items:1,
            nav:false,
        },
        640:{
            items:2,
            nav:true,
        },
        1000:{
            items:3,
            nav:true,
        }
    }
});

jQuery(".auction-init").owlCarousel({
    loop:false,
    margin:30,
    nav:true,
    dots:false,
    navText: ["", ""],
    autoplay:false,
    autoplayTimeout:3000,
    autoplaySpeed: 850,
    responsive:{
        0:{
            items:1,
            nav:false,
        },
        640:{
            items:2,
            nav:true,
        },
        1000:{
            items:4,
            nav:true,
        }
    }
});

function reflowEqualizer() {
    jQuery(document).foundation('equalizer','reflow');
}


jQuery(".initiatives").owlCarousel({
    loop:false,
    margin:30,
    nav:true,
    dots:false,
    navText: ["", ""],
    autoplay:false,
    autoplayTimeout:3000,
    autoplaySpeed: 850,
    responsive:{
        0:{
            items:1,
            nav:false,
        },
        640:{
            items:2,
            nav:true,
        },
        1000:{
            items:3,
            nav:true,
        }
    }
});

jQuery(".businesses").owlCarousel({
    loop:false,
    margin:30,
    nav:true,
    dots:false,
    navText: ["", ""],
    autoplay:false,
    autoplayTimeout:3000,
    autoplaySpeed: 850,
    responsive:{
        0:{
            items:1,
            nav:false,
        },
        640:{
            items:3,
            nav:true,
        },
        1000:{
            items:4,
            nav:true,
        }
    }
});


jQuery(function() {
    jQuery('.small-9 > .initiatives > .owl-nav').each(function() {
        jQuery(this).closest('.column').prepend(this);
    });
});