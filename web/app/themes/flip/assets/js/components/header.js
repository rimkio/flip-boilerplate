// Put any external JS or custom JS you wish for the theme here.

const fnheToggleMenu = function () {
    $('.main-header__hamberger').on('click', function (e) {
        e.stopPropagation();
        $('body').toggleClass('show-menu-mobile');
        $(this).toggleClass('show');
    });
}

const fnheSubMenuHandle = function () {
    $('.menu-item.dropdown').append('<span class="handle-sub"></span>')
    $('.menu-item.dropdown').on('click', '.handle-sub', function (e) {
        e.preventDefault();
        e.stopPropagation();
        let el = $(this).closest('.menu-item.dropdown');
        $(el).children('.sub-menu.dropdown-menu').slideToggle();
        $(el).children('.handle-sub').toggleClass('active');
    })
};

const fnheModalSearch = function () {
    $('body').on('click', '.main-header__cta-search', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $('body').addClass('search-active');
    });

    $('body').on('click', '.flip-search-modal, .flip-search-modal__close', function (e) {
        if (
            $(e.target).hasClass("flip-search-modal") ||
            $(e.target).hasClass("flip-search-modal__close")
        ) {
            $('body').removeClass('search-active');
        }
    })
};


// Document ready
$(() => {
    fnheSubMenuHandle();
    fnheToggleMenu();
    fnheModalSearch();
}) 
