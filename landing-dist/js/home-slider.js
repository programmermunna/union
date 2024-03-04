(function($){
    $.fn.kslider = function(options) {
            var current = this;
            var setting = $.extend({
            slideDuration : 2000,
                forvPrevBtns : true,
                itemPosDots: true,
                height: 300,
                slideOutDuration: 100,
                autoPlay : true
            }, options );
            var activeItem = current.find(".kslider-item.active-item");
            var activeItemIndex = activeItem.index();
            
            this.find(".kslider").height(setting.height).append("<div class='kslider-controls'></div>");
        
            if(setting.forvPrevBtns){
            current.find('.kslider-controls').append("<div class='forv-prev-btns-container'> <a href='javascript:void(0)' class='forv-prev-btns prev-btn'><span style='color:#00ABFB !important;font-size:50px;'>&#8676;</span></a> <a href='javascript:void(0)' class='forv-prev-btns forv-btn'><span style='color:#00ABFB !important;font-size:50px;'>&#8677;</span></a></div>");
            current.find('.kslider-controls .prev-btn').click(function(){
                var activeItem = current.find(".kslider-item.active-item");
                var activeDot = current.find(".slider-dot.active-dot");
                
                if(activeItem.is(":first-child")){
                    activeItem.removeClass('active-item').addClass('slide-out');
                    activeDot.removeClass('active-dot').parents(".slider-dots-container").find(".slider-dot:last-child").addClass("active-dot");
                    setTimeout(function(){
                    activeItem.removeClass('slide-out').parents(".kslider").find('.kslider-item:last-child').addClass('active-item');
                    },300 );
                }else{
                    activeItem.removeClass('active-item').addClass('slide-out');
                    activeDot.removeClass('active-dot').prev().addClass("active-dot");
                    setTimeout(function(){
                    activeItem.removeClass('slide-out').prev().addClass('active-item');
                    },300);
                }
            });
            current.find('.kslider-controls .forv-btn').click(function(){
                var activeItem = current.find(".kslider-item.active-item");
                var activeDot = current.find(".slider-dot.active-dot");
                
                if(activeItem.is(":last-child")){
                    activeItem.removeClass('active-item').addClass('slide-out');
                    activeDot.removeClass('active-dot').parents(".slider-dots-container").find(".slider-dot:first-child").addClass("active-dot");
                    setTimeout(function(){
                    activeItem.removeClass('slide-out').parents(".kslider").find('.kslider-item:first-child').addClass('active-item');
                    },300 );
                }else{
                    activeItem.removeClass('active-item').addClass('slide-out');
                    activeDot.removeClass('active-dot').next().addClass("active-dot");
                    setTimeout(function(){
                    activeItem.removeClass('slide-out').next().addClass('active-item');
                    },300);
                }
                
            });
            }
        
            if(setting.itemPosDots){
            var itemLength = current.find(".kslider-item").length;
            var sliderDotHtml = '<div class="slider-dots-container">'
                    for(var i = 0 ; i < itemLength; i++){
                    if(i == activeItemIndex){
                        sliderDotHtml += '<span class="slider-dot active-dot"></span>';
                    }else{  
                        sliderDotHtml += '<span class="slider-dot"></span>';
                    }
                    }
                sliderDotHtml += '</div>'
            current.find('.kslider-controls').append(sliderDotHtml);
            }
            
        if(setting.autoPlay){
        setInterval(function(){
            var  currentEle = $(current);
            var activeEle = currentEle.find(".kslider-item.active-item");
            var activeDot = currentEle.find(".slider-dot.active-dot");
            if(activeEle.is(":last-child")){
                activeEle.removeClass('active-item').addClass('slide-out');
                activeDot.removeClass('active-dot').parents(".slider-dots-container").find(".slider-dot:first-child").addClass("active-dot");
                setTimeout(function(){
                activeEle.removeClass('slide-out').parents(".kslider").find('.kslider-item:first-child').addClass('active-item');
                },300 );
            }else{
                activeEle.removeClass('active-item').addClass('slide-out');
                activeDot.removeClass('active-dot').next().addClass("active-dot");
                setTimeout(function(){
                activeEle.removeClass('slide-out').next().addClass('active-item');
                },300);
            }
            },setting.slideDuration);
        }     
    };
    }(jQuery));


    $(document).ready(function(){
    $("#testSlider").kslider({
        slideDuration: 6000,
        forvPrevBtns: true,
        itemPosDots: true,
        autoPlay: true
    });

    });