$(document).ready(function() {
    $('a[href="#"]').on('click', function (e) {
        e.preventDefault();
    });

// Slider:
    $("#content").slick({
        infinite: true,
        dots: false,
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        adaptiveHeight: true,
        autoplay: true,
        autoplaySpeed: 4000,
    });

// hover to "Shop Categories":
    $('.shop__categories').hover(function() {
        $('.hidden__menu').css('display', 'block');
        $('.hidden__menu').toggleClass('hiddenActive')
    }, function() {
        $('.hidden__menu').css('display', 'none');
        $('.hidden__menu').toggleClass('hiddenActive')
    });

    $('.dropdown__sub').hover(function() {
        $(this).css('display', 'block');
    }, function() {
        $(this).css('display', 'none');
    });


    if( $(window).width() > 991) {
        $('.dropdown__menu222').hover(function() {
            $(this).next().css('display', 'block');
        }, function() {
            $(this).next().css('display', 'none');
        });
    }

// Click burger menu:
    $('.burger__menu').click(function() {
        $('.hidden__menu').toggleClass('activeClass');
    });

    $('.dropdown__subBtn').click(function() {
        $(this).parent().next().toggleClass('showMenu');
        $(this).prev().toggleClass('changeColor');
        $(this).toggleClass('rotateArrow');
    });
    $('.vektor__down').click(function() {
        $(this).parent().next().toggleClass('showSub');
        $(this).prev().toggleClass('changeSubColor');
        $(this).toggleClass('rotateSubArrow');
    });

// Hover to "Sign in":
    $('.sign__in ').click(function() {
        $('.modalWindow').addClass('showModal');
        $('body').css('overflow', 'hidden');
    });
    $('.closeModal ').click(function() {
        $('.modalWindow').removeClass('showModal');
        $('body').css('overflow', 'auto');
    });

    $('.sign__up__window').click(function() {
        $('.sign__in__content').css('display', 'none');
        $('.registr__content').css('display', 'block');
    });

    $('.sign__in__window').click(function() {
        $('.registr__content').css('display', 'none');
        $('.sign__in__content').css('display', 'block');
    });

// Hover to blocks:
    $('.categories__block').hover(function() {
        $(this).find('.catgories__block__title').css('background', 'rgba(0, 0, 0, 0.5)');
    }, function() {
        $(this).find('.catgories__block__title').css('background', 'transparent');
    });
// Hover to Quote:
    $('#quote__btn').hover(function() {
        $('.korzina__container').addClass('korzina__modal__show');
    }, function() {
        $('.korzina__container').removeClass('korzina__modal__show');
    });

    $('.korzina').hover(function() {
        $('.korzina__container').addClass('korzina__modal__show');
    }, function() {
        $('.korzina__container').removeClass('korzina__modal__show');
    });

// Страница "About us", Testimonials slider:
    $(".testimonials").slick({
        infinite: true,
        dots: false,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        adaptiveHeight: true,
        // autoplay: true,
        autoplaySpeed: 4000,
        prevArrow: '<div class="testArrows__left"><svg viewBox="64 64 896 896" focusable="false" class="left__test" data-icon="left" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M724 218.3V141c0-6.7-7.7-10.4-12.9-6.3L260.3 486.8a31.86 31.86 0 0 0 0 50.3l450.8 352.1c5.3 4.1 12.9.4 12.9-6.3v-77.3c0-4.9-2.3-9.6-6.1-12.6l-360-281 360-281.1c3.8-3 6.1-7.7 6.1-12.6z"></path></svg></div>',
        nextArrow: '<div class="testArrows__right"><svg viewBox="64 64 896 896" focusable="false" class="right__test" data-icon="right" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M765.7 486.8L314.9 134.7A7.97 7.97 0 0 0 302 141v77.3c0 4.9 2.3 9.6 6.1 12.6l360 281.1-360 281.1c-3.9 3-6.1 7.7-6.1 12.6V883c0 6.7 7.7 10.4 12.9 6.3l450.8-352.1a31.96 31.96 0 0 0 0-50.4z"></path></svg></div>',
    });

// Страница "pay.html"
    $('.card__block').hover(function() {
        $(this).parent().css('border-bottom', '3px solid #ffa235');
    }, function() {
        $(this).parent().css('border-bottom', '3px solid transparent');
    });

// Страница "product.html"
    $('.info__txt1').click(function() {
        $('.info__txt').removeClass('activeInfo');
        $(this).addClass('activeInfo');
        $('.desc__content').removeClass('activeInfo');
        $('.desc__content1').addClass('activeInfo');
    });
    $('.info__txt2').click(function() {
        $('.info__txt').removeClass('activeInfo');
        $(this).addClass('activeInfo');
        $('.desc__content').removeClass('activeInfo');
        $('.desc__content2').addClass('activeInfo');
    });
    $('.info__txt3').click(function() {
        $('.info__txt').removeClass('activeInfo');
        $(this).addClass('activeInfo');
        $('.desc__content').removeClass('activeInfo');
        $('.desc__content3').addClass('activeInfo');
    });

// Страница Quote:
    $('.requestBtn').click(function() {
        $('.quoteModal').addClass('showModal');
    });
    $('.quoteModalBtn').click(function() {
        $('.quoteModal').removeClass('showModal');
    });
// Страница 'Catalog':
    $('.catalog__item').click(function() {
        $(this).next().slideToggle('slow', function() {
            $(this).next().toggleClass('active');
        });
        $(this).find('.line2').toggleClass('active');
    });
    $('.filterBtn').click(function() {
        $('.catalog__accordeon').toggleClass('activeAcc');
    });
});
