
var leftClicked = false;
var rightClicked = false;
var menuPos;

$(document).on('ready', function(){

    var menu = $('.header-grid .row-fluid:nth-child(2)');
    menuPos = menu.position().top;

    menu.on('load', function(){

        menu.data('oPos', menu.position().top);
    });



    $(window).on('scroll', function(){

        var winPos = $(this).scrollTop();



        //var menuPos = menu.data('oPos');

        if (menuPos != undefined && winPos > menuPos)
        {
            /*
            if (menu.css('position') != 'fixed')
            {
                menu.css({'position': 'fixed', 'top': '0'});
            }
            */

            if (!menu.hasClass('static-menu'))
            {
                menu.addClass('static-menu');
            }
        } else
        {
            /*
            if (menu.css('position') != 'static')
            {
                menu.css({'position': 'static', 'top': 'auto'});
            }
            */

            if (menu.hasClass('static-menu'))
            {
                menu.removeClass('static-menu');
            }
        }




    });


    $('.pixel-search-wrapper').on('click', function(){

        var popup = $('.pixel-search-popup-wrapper');

        if (popup.css('display') == 'none')
        {
            popup.show();
        } else
        {
            popup.hide();
        }


    });


    $('.pixel-not-signed-in-popup-button').on('click', function(){

        var self = $(this);


        var popup = $('.pixel-bot-signed-in-popup-wrapper');

        if (popup.css('display') == 'none')
        {
            popup.show()
            self.css({
                'border-top-left-radius': '30px',
                'border-top-right-radius': '30px',
                'border-bottom-right-radius': 0,
                'border-bottom-left-radius': 0});
        } else
        {
            popup.hide()
            self.css({
                'border-top-left-radius': '30px',
                'border-top-right-radius': '30px',
                'border-bottom-right-radius': '30px',
                'border-bottom-left-radius': '30px'});
        }



    });


    $('#new-products-view-all-click').on('click', function(){

        var self = $(this);

        var newestWrapper = $('.pixel-newest-products');
        var newestList = $('.pixel-product-list-wrapper');
        var newestControls = $('.pixel-slider-new-product-selection-wrapper');
        var newestListItem = $('.ty-product-list');

        if (self.find('span').text() == 'View All')
        {
            self.find('span').text('Hide All');

            newestWrapper.addClass('view-all-newest-products');
            newestList.addClass('view-all-newest');
            //newestListItem.css('margin-right', '28px');
            $('.ty-product-list:nth-of-type(4n)').addClass('view-all-child');
            newestControls.hide();

        } else
        {
            self.find('span').text('View All');
            newestWrapper.removeClass('view-all-newest-products');
            newestList.removeClass('view-all-newest');
            $('.ty-product-list:nth-of-type(4n)').removeClass('view-all-child');
            //newestListItem.css('margin-right', '29px');
            newestControls.show();
        }




    });


    $('#pixel-new-product-slide-left').on('click', function(){

        var wrapper = $('.pixel-newest-products .pixel-product-list-wrapper');

        var fullWidth = 350 * 8;

        var currentMargin = wrapper.css('margin-left');
        currentMargin = parseFloat(currentMargin.replace('px', ''));

        if (currentMargin < 0 && !leftClicked)
        {
            rightClicked = true;
            leftClicked = true;
            wrapper.animate({'margin-left': currentMargin + (fullWidth / 2)}, 1000, function(){
                setNewProductCounter();
                leftClicked = false;
                rightClicked = false;
            });



        }


    });



    $('#pixel-new-product-slide-right').on('click', function(){

        var wrapper = $('.pixel-newest-products .pixel-product-list-wrapper');

        var fullWidth = 350 * 8;

        var currentMargin = wrapper.css('margin-left');
        currentMargin = parseFloat(currentMargin.replace('px', ''));

        if (currentMargin > -fullWidth && !rightClicked)
        {
            rightClicked = true;
            leftClicked = true;
            wrapper.animate({'margin-left': currentMargin - (fullWidth / 2)}, 1000, function(){
                setNewProductCounter();
                rightClicked = false;
                leftClicked = false;
            });



        }



    });

    function setNewProductCounter(){
        var margin = $('.pixel-newest-products .pixel-product-list-wrapper').css('margin-left');
        margin = parseFloat(margin.replace('px', ''));
        resetProductBarSelect();
        var positionOne = $('.pixel-slider-new-product-selection-wrapper .pixel-slider-counter-bar-one');
        var positionTwo = $('.pixel-slider-new-product-selection-wrapper .pixel-slider-counter-bar-two');
        var positionThree = $('.pixel-slider-new-product-selection-wrapper .pixel-slider-counter-bar-three');

        switch(margin)
        {
            case 0:
                positionOne.addClass('selected-counter');
                break;
            case -(350 * 4):
                positionTwo.addClass('selected-counter');
                break;
            case -(350 * 8):
                positionThree.addClass('selected-counter');
                break;
            default:
                alert('Something broke');

        }

    }

    function resetProductBarSelect(){

        var positionOne = $('.pixel-slider-new-product-selection-wrapper .pixel-slider-counter-bar-one');
        var positionTwo = $('.pixel-slider-new-product-selection-wrapper .pixel-slider-counter-bar-two');
        var positionThree = $('.pixel-slider-new-product-selection-wrapper .pixel-slider-counter-bar-three');

        if (positionOne.hasClass('selected-counter')) positionOne.removeClass('selected-counter');
        if (positionTwo.hasClass('selected-counter')) positionTwo.removeClass('selected-counter');
        if (positionThree.hasClass('selected-counter')) positionThree.removeClass('selected-counter');

    }


    $('#bestseller-view-all-click').on('click', function(){
        alert("Loads of Bestsellers");
    });

    $('#pixel-bestseller-slide-left').on('click', function(){
        alert('Less bestsellers')
    });

    $('#pixel-bestseller-slide-right').on('click', function(){
        alert('More bestsellers')
    });



});


