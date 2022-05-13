$(function () {
    $('.js-menu__item__link').each(function () {
        $(this).on('click', function () {
            $("+.submenu", this).slideToggle();
            return false;
        });
    });
});

$('.menu-btn').click(function () {
    $(this).toggleClass('is-open');
    $(this).siblings('.menu').toggleClass('is-open');
});
