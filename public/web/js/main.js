!(function ($) {
    "use strict";

    // Smooth scroll for the navigation menu and links with .scrollto classes
    var scrolltoOffset = $("#header").outerHeight() - 11;
    $(document).on(
        "click",
        ".nav-menu a, .mobile-nav a, .scrollto",
        function (e) {
            if (
                location.pathname.replace(/^\//, "") ==
                this.pathname.replace(/^\//, "") &&
                location.hostname == this.hostname
            ) {
                var target = $(this.hash);
                if (target.length) {
                    e.preventDefault();

                    var scrollto = target.offset().top - scrolltoOffset;
                    var scrolled = 12;

                    if ($(this).attr("href") == "#header") {
                        scrollto = 0;
                    }

                    $("html, body").animate(
                        {
                            scrollTop: scrollto,
                        },
                        1500,
                        "easeInOutExpo"
                    );

                    if ($(this).parents(".nav-menu, .mobile-nav").length) {
                        $(".nav-menu .active, .mobile-nav .active").removeClass("active");
                        $(this).closest("li").addClass("active");
                    }

                    if ($("body").hasClass("mobile-nav-active")) {
                        $("body").removeClass("mobile-nav-active");
                        $(".mobile-nav-toggle i").toggleClass(
                            "icofont-navigation-menu icofont-close"
                        );
                        $(".mobile-nav-overly").fadeOut();
                    }
                    return false;
                }
            }
        }
    );

    // Activate smooth scroll on page load with hash links in the url
    $(document).ready(function () {
        if (window.location.hash) {
            var initial_nav = window.location.hash;
            if ($(initial_nav).length) {
                var scrollto = $(initial_nav).offset().top - scrolltoOffset;
                $("html, body").animate(
                    {
                        scrollTop: scrollto,
                    },
                    1500,
                    "easeInOutExpo"
                );
            }
        }
    });

    // Mobile Navigation
    if ($(".nav-menu").length) {
        var $mobile_nav = $(".nav-menu").clone().prop({
            class: "mobile-nav d-lg-none",
        });
        $("body").append($mobile_nav);
        $("body").prepend(
            '<button type="button" class="mobile-nav-toggle d-lg-none"><i class="fas fa-bars"></i></button>'
        );
        $("body").append('<div class="mobile-nav-overly"></div>');

        $(document).on("click", ".mobile-nav-toggle", function (e) {
            $("body").toggleClass("mobile-nav-active");
            $(".mobile-nav-toggle i").toggleClass(
                "icofont-navigation-menu icofont-close"
            );
            $(".mobile-nav-overly").toggle();
        });

        $(document).on("click", ".mobile-nav .drop-down > a", function (e) {
            e.preventDefault();
            $(this).next().slideToggle(300);
            $(this).parent().toggleClass("active");
        });

        $(document).click(function (e) {
            var container = $(".mobile-nav, .mobile-nav-toggle");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                if ($("body").hasClass("mobile-nav-active")) {
                    $("body").removeClass("mobile-nav-active");
                    $(".mobile-nav-toggle i").toggleClass(
                        "icofont-navigation-menu icofont-close"
                    );
                    $(".mobile-nav-overly").fadeOut();
                }
            }
        });
    } else if ($(".mobile-nav, .mobile-nav-toggle").length) {
        $(".mobile-nav, .mobile-nav-toggle").hide();
    }

    // Navigation active state on scroll
    var nav_sections = $("section");
    var main_nav = $(".nav-menu, #mobile-nav");

    $(window).on("scroll", function () {
        var cur_pos = $(this).scrollTop() + 200;

        nav_sections.each(function () {
            var top = $(this).offset().top,
                bottom = top + $(this).outerHeight();

            if (cur_pos >= top && cur_pos <= bottom) {
                if (cur_pos <= bottom) {
                    main_nav.find("li").removeClass("active");
                }
                main_nav
                    .find('a[href="#' + $(this).attr("id") + '"]')
                    .parent("li")
                    .addClass("active");
            }
            if (cur_pos < 300) {
                $(".nav-menu ul:first li:first").addClass("active");
            }
        });
    });

    // Toggle .header-scrolled class to #header when page is scrolled
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $("#header").addClass("header-scrolled");
        } else {
            $("#header").removeClass("header-scrolled");
        }
    });

    if ($(window).scrollTop() > 100) {
        $("#header").addClass("header-scrolled");
    }

    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $(".back-to-top").fadeIn("slow");
        } else {
            $(".back-to-top").fadeOut("slow");
        }
    });

    $(".back-to-top").click(function () {
        $("html, body").animate(
            {
                scrollTop: 0,
            },
            1500,
            "easeInOutExpo"
        );
        return false;
    });

    $(".newletter-carousel").owlCarousel({
        // autoplay: true,
        dots: true,
        loop: true,
        margin: 10,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            900: {
                items: 2,
            },
        },
    });
    $("#confirmPassword .input-group-text").on("click", function (event) {
        event.preventDefault();
        if ($("#confirmPassword input").attr("type") == "text") {
            $("#confirmPassword input").attr("type", "password");
            $("#confirmPassword .input-group-text i").addClass("fa-eye-slash");
            $("#confirmPassword.input-group-text i").removeClass("fa-eye");
        } else if ($("#confirmPassword input").attr("type") == "password") {
            $("#confirmPassword input").attr("type", "text");
            $("#confirmPassword .input-group-text i").removeClass("fa-eye-slash");
            $("#confirmPassword .input-group-text i").addClass("fa-eye");
        }
    });
    $("#password .input-group-text").on("click", function (event) {
        event.preventDefault();
        if ($("#password input").attr("type") == "text") {
            $("#password input").attr("type", "password");
            $("#password .input-group-text i").addClass("fa-eye-slash");
            $("#password.input-group-text i").removeClass("fa-eye");
        } else if ($("#password input").attr("type") == "password") {
            $("#password input").attr("type", "text");
            $("#password .input-group-text i").removeClass("fa-eye-slash");
            $("#password .input-group-text i").addClass("fa-eye");
        }
    });
})(jQuery);


document.querySelector(".menu-icon").addEventListener("click", () => {
    document.querySelector("#mySidenav").classList.toggle("active");
    document.querySelector("#main").classList.toggle("active");
});


