function MobileSideBar__toggle() {
    var $btn = $('.btn-toggle-mobile-side-bar');
    var $mobileSideBar = $('.mobile-side-bar');
    var $mobileSideBarBg = $('.mobile-side-bar-bg');

    if ( $btn.hasClass('active') ) {
        $btn.removeClass('active');
        $mobileSideBar.removeClass('active');
        $mobileSideBarBg.removeClass('active');
    }
    else {
        $btn.addClass('active');
        $mobileSideBar.addClass('active');
        $mobileSideBarBg.addClass('active');
    }
}

function MobileSideBar__init() {
    $('.btn-toggle-mobile-side-bar, .mobile-side-bar-bg').click(MobileSideBar__toggle);

    $('.mobile-side-bar .menu-box-1 > ul > li').click(function() {
        if ( $(this).hasClass('active') ) {
            $(this).removeClass('active');
        }
        else {
            $(this).addClass('active');
        }
    });
}

$(function() {
    MobileSideBar__init();
});