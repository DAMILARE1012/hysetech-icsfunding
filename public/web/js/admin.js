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
})(jQuery);

let arrow = document.querySelectorAll(".drops-down");
for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e) => {
        let arrowParent = e.target.closest("li");
        arrowParent.classList.toggle("showMenu");
    });
}

let listItems = document.querySelectorAll(".drop-down");

listItems.forEach((list) => {
    list.addEventListener("click", (e) => {
        let mainList = e.target.closest("li");
        mainList.classList.toggle("active");
    });
});

let sidebar = document.querySelector(".sidebar");
let main = document.querySelector("#main");

let sidebarBtn = document.querySelector(".menu-icon");
sidebarBtn.addEventListener("click", () => {
    sidebar.classList.toggle("menu-close");
    main.classList.toggle("active");
    main.classList.toggle("menu-close");
});

let accordians = document.querySelectorAll("#accordion .card-header");

accordians.forEach(acc => {
    // acc.classList.remove('showed')
    acc.addEventListener('click', (e) => {
        let header = e.target.closest('.card-header');
        header.classList.toggle('showed');
    })
    // console.log(acc);
})

