@extends('frontend.layouts.app')

@section('meta_title'){{ $detailedProduct->meta_title }}@stop

@section('meta_description'){{ $detailedProduct->meta_description }}@stop

@section('meta_keywords'){{ $detailedProduct->tags }}@stop

@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $detailedProduct->meta_title }}">
    <meta itemprop="description" content="{{ $detailedProduct->meta_description }}">
    <meta itemprop="image" content="{{ asset($detailedProduct->meta_img) }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="{{ $detailedProduct->meta_title }}">
    <meta name="twitter:description" content="{{ $detailedProduct->meta_description }}">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="{{ asset($detailedProduct->meta_img) }}">
    <meta name="twitter:data1" content="{{ single_price($detailedProduct->unit_price) }}">
    <meta name="twitter:label1" content="Price">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $detailedProduct->meta_title }}" />
    <meta property="og:type" content="product" />
    <meta property="og:url" content="{{ route('product', $detailedProduct->slug) }}" />
    <meta property="og:image" content="{{ asset($detailedProduct->meta_img) }}" />
    <meta property="og:description" content="{{ $detailedProduct->meta_description }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
    <meta property="og:price:amount" content="{{ single_price($detailedProduct->unit_price) }}" />
@endsection

@section('content')


<form id="option-choice-form">
      @csrf
<div class="section">
  <div class="container is-wide">
    <div class="col lg-5 md-12 md-margin-bottom-double sidebar_sticky">
    <style media="screen">

      section.product_details_leftside {
        display: flex;
      }

       section.product_details_leftside ul.left_side li.active {
        border: 2px solid #2874f0;
      }

        section.product_details_leftside ul.left_side {
          float: left;
        }

        section.product_details_leftside ul.left_side li {
          margin-bottom: 10px;
          list-style-type: none;
        }

        section.product_details_leftside ul.left_side li img {
          width: 70px;
          object-fit: contain;
          height: 70px;
        }

        section.product_details_leftside .big_img {
          width: 350px;
          height: 400px;
          object-fit: contain;
          float: left;
          margin-top: 20px;
          margin-left: 10px;
        }
    </style>


    <section class="product_details_leftside" id="navMenus">
    		<div class="left_side_slider">
    			<ul class="left_side" id="navMenus">
          @if(is_array(json_decode($detailedProduct->photos)) && count(json_decode($detailedProduct->photos)) > 1)
          @foreach (json_decode($detailedProduct->photos) as $key => $photo)
    				<li class=" @if($key == 0) active @endif">
    					<img src="{{asset($photo)}}" class="small_img" alt="">
    				</li>
          @endforeach
          @endif
    			</ul>
    		</div>
        @if(is_array(json_decode($detailedProduct->photos)) && count(json_decode($detailedProduct->photos)) > 1)
        @php
          $photo = json_decode($detailedProduct->photos);
        @endphp
            <div class="hover_zoom_effect">
              <img src="{{asset($photo[0])}}" class="big_img" alt="" id="big_image">
            </div>
        @endif
    	</section>

      <script>
    $("li").hover(
      function () {
        $(this).addClass('active');
      },
      function () {
        $(this).removeClass('active');
      }
      );
    </script>

    <script type="text/javascript">
    $("li").hover(
        function () {
            $("li").removeClass('active');
            $(this).addClass('active');
        }
    );
</script>

  <script type="text/javascript">
      /*http://zoomsl.sergeland.ru Sergey Zaragulov skype: deeserge icq: 287295769 sergeland@mail.ru*/

                (function ($, global) {
                "use strict";

                $.fn.imagezoomsl = function (options) {
                    options = options || {};
                    return this.each(function () { //return jQuery obj
                        if (!$(this).is("img")) return true;
                        var that = this;
                        setTimeout(function () {
                            $(new Image()).on('load', function () {
                                sergelandimagezoomer.init($(that), options);
                            }).attr('src', $(that).attr('src'));
                        }, 30);
                    });

                };

                var sergelandimagezoomer = {};
                $.extend(sergelandimagezoomer, {

                    dsetting: { //default settings

                        // загрузка big картинки
                        loadinggif: '', // картинка показываемая при загрузке big изображения
                        loadopacity: 0.1, // прозрачность фона перекрытия tmb картинки при загрузке	big изображения
                        loadbackground: '#878787', // цвет фона перекрытия tmb картинки при загрузке	 big изображения


                        // лупа (cursorshade)
                        cursorshade: true, // показать контейнер лупы
                        magnifycursor: 'crosshair', // вид курсора мыши над tmb в формате CSS
                        cursorshadecolor: '#fff', // цвет контейнера лупы в формате CSS
                        cursorshadeopacity: 0.3, // прозрачность контейнера лупы
                        cursorshadeborder: '1px solid black', // внешний бордюра контейнера лупы в формате CSS
                        zindex: '', // z-index контейнера лупы
                        stepzoom: 0.5, // шаг зуммирования при прокрутке колеса мыши
                        zoomrange: [2, 2], // диапазон зуммирования
                        zoomstart: 2, // стартовая установка зуммирования
                        disablewheel: true, // отключить прокрутку документа колесом мыши когда курсор над картинкой tmb в случае если не задан диапазон зуммирования


                        // подсказка (statusdiv)
                        showstatus: true, // показывать при наведении на tmb help контейнер
                        showstatustime: 2000, // время показа help контейнера
                        statusdivborder: '1px solid black',
                        statusdivbackground: '#C0C0C0',
                        statusdivpadding: '4px',
                        statusdivfont: 'bold 13px Arial',
                        statusdivopacity: 0.8,


                        // контейнер big картинки (magnifier)
                        magnifierpos: 'right', // сторона отображения контейнера left/right
                        magnifiersize: [0, 0], // размер контейнера
                        magnifiereffectanimate: 'showIn', // эффект появления/скрытия fadeIn/showIn/slideIn
                        innerzoom: false, // показать контейнер внутри tmb
                        innerzoommagnifier: false, // показать контейнер как лупу
                        descarea: false, // показать контейнер в произвольной области, область descarea должна иметь width и height
                        leftoffset: 15, // отступ слева от tmb картинки
                        rightoffset: 15, // отступ справа от tmb картинки
                        switchsides: true, // учитывать край экрана
                        magnifierborder: '1px solid black', // внешний бордюр


                        // контейнер текста снизу к картинке
                        textdnbackground: '#fff',
                        textdnpadding: '10px',
                        textdnfont: '13px/20px cursive',


                        // коэффициенты скорости анимации
                        scrollspeedanimate: 5 /*4*/ , // прокрутки big картинки
                        zoomspeedanimate: 7, // зуммирования (плавность)
                        loopspeedanimate: 2.5 /*2.45342*/ , // перемещения области лупы и big контейнера в режиме лупы
                        magnifierspeedanimate: 350, // показа big контейнера


                        // внешний вид
                        classmagnifier: "magnifier",
                        classcursorshade: "cursorshade",
                        classstatusdiv: "statusdiv",
                        classtextdn: "textdn",
                        classtracker: "tracker"

                    },

                    isie: (function () {
                        var nAgt = navigator.userAgent;
                        if (nAgt.indexOf("MSIE") != -1) return true;
                        else return false;
                    })(),

                    highestzindex: function ($img) {

                        var z = 0,
                            $els = $img.parents().add($img),
                            elz;
                        $els.each(function () {
                            elz = $(this).css('zIndex');
                            elz = isNaN(elz) ? 0 : +elz;
                            z = Math.max(z, elz);
                        });
                        return z;
                    },

                    getboundary: function (b, val, specs) {
                        if (b == "left") {
                            var rb = -specs.img.w * specs.newpower + specs.magnifier.w;
                            return (val > 0) ? 0 : (val < rb) ? rb : val;
                        } else {
                            var tb = -specs.img.h * specs.newpower + specs.magnifier.h;
                            return (val > 0) ? 0 : (val < tb) ? tb : val;
                        }
                    },

                    controlLoop: function ($tracker) {
                        var self = this,
                            specs = $tracker.data('specs');
                        if (!specs) return;

                        var coords = specs.$img.offsetsl(),
                            pageX = self.cld.pageX999 - coords.left,
                            pageY = self.cld.pageY999 - coords.top;

                        self.cld.destU += (self.cld.pageX999 - self.cld.destU) / 2.45342;
                        self.cld.destV += (self.cld.pageY999 - self.cld.destV) / 2.45342;

                        specs.$statusdiv.css({
                            left: self.cld.destU - 10,
                            top: self.cld.destV + 20
                        });

                        var csw = Math.round(specs.magnifier.w / specs.newpower),
                            csh = Math.round(specs.magnifier.h / specs.newpower);

                        self.cld.destK += (pageX - self.cld.destK) / specs.setting.loopspeedanimate;
                        self.cld.destL += (pageY - self.cld.destL) / specs.setting.loopspeedanimate;

                        specs.$cursorshade.css({
                            left: specs.img.w > csw ? Math.min(specs.img.w - csw, Math.max(0, self.cld.destK - csw / 2)) + coords.left - specs.cursorshade999.border999.left999 : coords.left - specs.cursorshade999.border999.left999,
                            top: specs.img.h > csh ? Math.min(specs.img.h - csh, Math.max(0, self.cld.destL - csh / 2)) + coords.top - specs.cursorshade999.border999.top999 : coords.top - specs.cursorshade999.border999.top999
                        });

                        if (specs.setting.innerzoommagnifier) {

                            self.cld.destM += (self.cld.pageX999 - self.cld.destM) / specs.setting.loopspeedanimate;
                            self.cld.destN += (self.cld.pageY999 - self.cld.destN) / specs.setting.loopspeedanimate;

                            specs.$magnifier.css({
                                left: self.cld.destM - Math.round(specs.magnifier.w / 2),
                                top: self.cld.destN - Math.round(specs.magnifier.h / 2)
                            });
                            specs.$textdn.css({
                                left: self.cld.destM - Math.round(specs.magnifier.w / 2),
                                top: self.cld.destN + specs.magnifier.h / 2
                            });
                        }

                        self.cld.currU += (pageX - self.cld.currU) / specs.setting.scrollspeedanimate;
                        self.cld.currV += (pageY - self.cld.currV) / specs.setting.scrollspeedanimate;

                        var newx = -self.cld.currU * specs.newpower + specs.magnifier.w / 2;
                        var newy = -self.cld.currV * specs.newpower + specs.magnifier.h / 2;

                        specs.$bigimage.css({
                            left: self.getboundary('left', newx, specs),
                            top: self.getboundary('top', newy, specs)
                        });
                        self.cld.controlTimer = setTimeout(function () {
                            self.controlLoop($tracker);
                        }, 30);

                    },

                    controlLoop2: function ($tracker) {

                        var self = this,
                            specs = $tracker.data('specs');
                        if (!specs) return;

                        specs.currM += (specs.newpower - specs.currM) / specs.setting.zoomspeedanimate;
                        specs.currM = Math.round(specs.currM * 1000) / 1000;

                        specs.$cursorshade.css({
                            width: specs.img.w > Math.round(specs.magnifier.w / specs.currM) ? Math.round(specs.magnifier.w / specs.currM) : specs.img.w,
                            height: specs.img.h > Math.round(specs.magnifier.h / specs.currM) ? Math.round(specs.magnifier.h / specs.currM) : specs.img.h
                        });
                        specs.$bigimage.css({
                            width: Math.round(specs.currM * specs.bigimage.w * (specs.img.w / specs.bigimage.w)),
                            height: Math.round(specs.currM * specs.bigimage.h * (specs.img.h / specs.bigimage.h))
                        });

                        self.cld.controlTimer2 = setTimeout(function () {
                            self.controlLoop2($tracker);
                        }, 30);

                    },

                    cld: {},

                    showimage: function ($tracker) {

                        var self = this,
                            specs = $tracker.data('specs'),
                            width = specs.setting.magnifiersize[0],
                            height = specs.setting.magnifiersize[1],
                            magcoords = {},
                            coords = specs.$img.offsetsl(),
                            func = function () {},
                            left1 = 0,
                            top1 = 0;

                        magcoords.left = coords.left + (specs.setting.magnifierpos === 'left' ? -specs.magnifier.w - specs.setting.leftoffset : specs.img.w + specs.setting.rightoffset);
                        if (specs.setting.switchsides && !specs.setting.innerzoom) {

                            if (specs.setting.magnifierpos !== 'left' && magcoords.left + specs.magnifier.w + specs.setting.leftoffset >= $(window).width() && coords.left - specs.magnifier.w >= specs.setting.leftoffset)
                                magcoords.left = coords.left - specs.magnifier.w - specs.setting.leftoffset;
                            else if (specs.setting.magnifierpos === 'left' && magcoords.left < 0)
                                magcoords.left = coords.left + specs.img.w + specs.setting.rightoffset;
                        }

                        left1 = magcoords.left;
                        top1 = coords.top;
                        specs.$magnifier.css({
                            visibility: "visible",
                            display: "none"
                        });

                        if (specs.setting.descarea) {
                            left1 = $(specs.setting.descarea).offsetsl().left;
                            top1 = $(specs.setting.descarea).offsetsl().top;
                        }
                        if (specs.setting.innerzoommagnifier) {
                            left1 = self.cld.pageX999 - Math.round(specs.magnifier.w / 2);
                            top1 = self.cld.pageY999 - Math.round(specs.magnifier.h / 2);
                        }

                        //*
                        func = function () {

                            specs.$textdn.stop(true, true).fadeIn(specs.setting.magnifierspeedanimate);
                            if (!specs.setting.innerzoommagnifier)
                                specs.$textdn.css({
                                    left: left1,
                                    top: top1 + height
                                });
                        } // */

                        if (specs.setting.innerzoom) {

                            left1 = coords.left;
                            top1 = coords.top;

                            func = function () {
                                specs.$img.css({
                                    visibility: "hidden"
                                });
                                specs.$textdn.css({
                                    left: left1,
                                    top: top1 + height
                                }).stop(true, true).fadeIn(specs.setting.magnifierspeedanimate);
                            };
                        }

                        switch (specs.setting.magnifiereffectanimate) {
                            case 'slideIn':
                                specs.$magnifier.css({
                                        left: left1,
                                        top: top1 - height / 3,
                                        width: width,
                                        height: height
                                    })
                                    .stop(true, true).show()
                                    .animate({
                                        top: top1
                                    }, specs.setting.magnifierspeedanimate, "easeOutBounceSL", func);
                                break;
                            case 'showIn':
                                specs.$magnifier.css({
                                        left: coords.left + Math.round(specs.img.w / 2),
                                        top: coords.top + Math.round(specs.img.h / 2),
                                        width: Math.round(specs.magnifier.w / 5),
                                        height: Math.round(specs.magnifier.h / 5)
                                    })
                                    .stop(true, true).show().css({
                                        opacity: "0.1"
                                    })
                                    .animate({
                                        left: left1,
                                        top: top1,
                                        opacity: "1",
                                        width: width,
                                        height: height

                                    }, specs.setting.magnifierspeedanimate, func);
                                break;
                            default:
                                specs.$magnifier.css({
                                        left: left1,
                                        top: top1,
                                        width: width,
                                        height: height
                                    })
                                    .stop(true, true)
                                    .fadeIn(specs.setting.magnifierspeedanimate, func);
                        }
                        if (specs.setting.showstatus && (specs.title999 || specs.help))
                            specs.$statusdiv.html(specs.title999 + '<div style="font-size:80%">' + specs.help + '</div>')
                            .stop(true, true)
                            .fadeIn().delay(specs.setting.showstatustime).fadeOut("slow");
                        else specs.$statusdiv.hide();
                    },

                    hideimage: function ($tracker) {

                        var self = this,
                            specs = $tracker.data('specs'),
                            coords = specs.$img.offsetsl();

                        switch (specs.setting.magnifiereffectanimate) {

                            case 'showIn':
                                specs.$magnifier.stop(true, true)
                                    .animate({
                                            left: coords.left + Math.round(specs.img.w / 2),
                                            top: coords.top + Math.round(specs.img.h / 2),
                                            opacity: "0.1",
                                            width: Math.round(specs.magnifier.w / 5),
                                            height: Math.round(specs.magnifier.h / 5)
                                        },
                                        specs.setting.magnifierspeedanimate,
                                        function () {
                                            specs.$magnifier.hide();
                                        });
                                break;

                            default:
                                specs.$magnifier.stop(true, true).fadeOut(specs.setting.magnifierspeedanimate);
                        }

                    },

                    /* Init function start.  */
                    init: function ($img, options, gallery) {

                        var setting = $.extend({}, this.dsetting, options),
                            basezindex = setting.zindex || this.highestzindex($img),
                            img = {
                                w: $img.width(),
                                h: $img.height()
                            },
                            cld = new cld(),
                            title = $img.attr("data-title") ? $img.attr("data-title") : '',
                            help = $img.attr("data-help") ? $img.attr("data-help") : '',
                            textdn = $img.attr("data-text-bottom") ? $img.attr("data-text-bottom") : '',
                            self = this,
                            newpower,
                            key,
                            $magnifier,
                            $cursorshade,
                            $statusdiv,
                            $tracker,
                            $textdn;

                        if (img.h === 0 || img.w === 0) {
                            $(new Image()).on('load', function () {
                                self.init($img, options);
                            }).attr("src", $img.attr("src"));
                            return;
                        }

                        $img.css({
                            visibility: "visible"
                        });
                        setting.largeimage = $img.attr("data-large") || $img.attr("src");

                        for (key in setting)
                            if (setting[key] === '') setting[key] = this.dsetting[key];

                        if (setting.zoomrange[0] < setting.zoomstart)
                            newpower = setting.zoomstart;
                        else newpower = setting.zoomrange[0];

                        if (setting.magnifiersize.toString() === '0,0' ||
                            setting.magnifiersize.toString() === '')
                            if (setting.innerzoommagnifier)
                                setting.magnifiersize = [img.w / 2, img.h / 2];
                            else setting.magnifiersize = [img.w, img.h];

                        if (setting.descarea && $(setting.descarea).length) {
                            if ($(setting.descarea).width() === 0 || $(setting.descarea).height() === 0)
                                setting.descarea = false;
                            else setting.magnifiersize = [$(setting.descarea).width(), $(setting.descarea).height()];
                        } else setting.descarea = false;

                        if (setting.innerzoom) {
                            setting.magnifiersize = [img.w, img.h];
                            if (!options.cursorshade)
                                setting.cursorshade = false;
                            if (!options.scrollspeedanimate)
                                setting.scrollspeedanimate = 10;
                        }

                        if (setting.innerzoommagnifier) {
                            if (!options.magnifycursor)
                                if (window.chrome || window.sidebar)
                                    setting.magnifycursor = "none";
                            setting.cursorshade = false;
                            setting.magnifiereffectanimate = "fadeIn";
                        }

                        function cld() {
                            this.pageX999 = 0;
                            this.pageY999 = 0;
                        }

                        function getspecs($bigimage) {

                            $tracker.data("specs", {

                                setting: setting,
                                title999: title,
                                help: help,

                                $img: $img,
                                $magnifier: $magnifier,
                                $bigimage: $bigimage,
                                $statusdiv: $statusdiv,
                                $cursorshade: $cursorshade,
                                $textdn: $textdn,

                                img: img,
                                bigimage: {
                                    w: $bigimage.width(),
                                    h: $bigimage.height()
                                },
                                magnifier: {
                                    w: $magnifier.width(),
                                    h: $magnifier.height()
                                },
                                cursorshade999: {
                                    w: $cursorshade.width(),
                                    h: $cursorshade.height(),
                                    border999: {
                                        left999: parseInt($cursorshade.css("border-left-width")) || 0,
                                        top999: parseInt($cursorshade.css("border-top-width")) || 0
                                    }
                                },

                                currM: newpower,
                                newpower: newpower
                            });

                        }

                        function isImageLoaded(img) {
                            if (!img.complete)
                                return false;
                            if (typeof img.naturalWidth !== "undefined" && img.naturalWidth === 0)
                                return false;
                            return true;
                        }

                        var toFix = ['wheel', 'mousewheel', 'DOMMouseScroll', 'MozMousePixelScroll'];
                        var toBind = 'onwheel' in document || document.documentMode >= 9 ? ['wheel'] : ['mousewheel', 'DomMouseScroll', 'MozMousePixelScroll'];
                        var lowestDelta, lowestDeltaXY;

                        if ($.event.fixHooks) {
                            for (var i = toFix.length; i;) {
                                $.event.fixHooks[toFix[--i]] = $.event.mouseHooks;
                            }
                        }

                        $.event.special.mousewheel = {
                            setup: function () {
                                if (this.addEventListener) {
                                    for (var i = toBind.length; i;) {
                                        this.addEventListener(toBind[--i], handler, false);
                                    }
                                } else {
                                    this.onmousewheel = handler;
                                }
                            },

                            teardown: function () {
                                if (this.removeEventListener) {
                                    for (var i = toBind.length; i;) {
                                        this.removeEventListener(toBind[--i], handler, false);
                                    }
                                } else {
                                    this.onmousewheel = null;
                                }
                            }
                        };

                        function handler(event) {
                            var orgEvent = event || window.event,
                                args = [].slice.call(arguments, 1),
                                delta = 0,
                                deltaX = 0,
                                deltaY = 0,
                                absDelta = 0,
                                absDeltaXY = 0,
                                fn;
                            event = $.event.fix(orgEvent);
                            event.type = "mousewheel";

                            // Old school scrollwheel delta
                            if (orgEvent.wheelDelta) {
                                delta = orgEvent.wheelDelta;
                            }
                            if (orgEvent.detail) {
                                delta = orgEvent.detail * -1;
                            }

                            // New school wheel delta (wheel event)
                            if (orgEvent.deltaY) {
                                deltaY = orgEvent.deltaY * -1;
                                delta = deltaY;
                            }
                            if (orgEvent.deltaX) {
                                deltaX = orgEvent.deltaX;
                                delta = deltaX * -1;
                            }

                            // Webkit
                            if (orgEvent.wheelDeltaY !== undefined) {
                                deltaY = orgEvent.wheelDeltaY;
                            }
                            if (orgEvent.wheelDeltaX !== undefined) {
                                deltaX = orgEvent.wheelDeltaX * -1;
                            }

                            // Look for lowest delta to normalize the delta values
                            absDelta = Math.abs(delta);
                            if (!lowestDelta || absDelta < lowestDelta) {
                                lowestDelta = absDelta;
                            }
                            absDeltaXY = Math.max(Math.abs(deltaY), Math.abs(deltaX));
                            if (!lowestDeltaXY || absDeltaXY < lowestDeltaXY) {
                                lowestDeltaXY = absDeltaXY;
                            }

                            // Get a whole value for the deltas
                            fn = delta > 0 ? "floor" : "ceil";
                            delta = Math[fn](delta / lowestDelta);
                            deltaX = Math[fn](deltaX / lowestDeltaXY);
                            deltaY = Math[fn](deltaY / lowestDeltaXY);

                            // Add event and delta to the front of the arguments
                            args.unshift(event, delta, deltaX, deltaY);

                            return ($.event.dispatch || $.event.handle).apply(this, args);
                        }

                        $.fn.offsetsl = function () {
                            var elem = this.get(0);

                            function getOffsetSum(elem) {
                                var top999 = 0,
                                    left999 = 0;
                                while (elem) {
                                    top999 = top999 + parseInt(elem.offsetTop);
                                    left999 = left999 + parseInt(elem.offsetLeft);
                                    elem = elem.offsetParent;
                                }
                                return {
                                    top: top999,
                                    left: left999
                                }
                            }
                            if (elem.getBoundingClientRect)
                                return this.offset();
                            else return getOffsetSum(elem)
                        }

                        $.easing.easeOutBounceSL = function (x, t, b, c, d) {
                            if ((t /= d) < (1 / 2.75)) {
                                return c * (7.5625 * t * t) + b;
                            } else if (t < (2 / 2.75)) {
                                return c * (7.5625 * (t -= (1.5 / 2.75)) * t + .75) + b;
                            } else if (t < (2.5 / 2.75)) {
                                return c * (7.5625 * (t -= (2.25 / 2.75)) * t + .9375) + b;
                            } else {
                                return c * (7.5625 * (t -= (2.625 / 2.75)) * t + .984375) + b;
                            }
                        }

                        $magnifier = $("<div />")
                            .attr({
                                "class": setting.classmagnifier
                            })
                            .css({
                                position: "absolute",
                                zIndex: basezindex,
                                width: setting.magnifiersize[0],
                                height: setting.magnifiersize[1],
                                left: -10000,
                                top: -10000,
                                visibility: "hidden",
                                overflow: "hidden"
                            })
                            .appendTo(document.body);

                        if (!options.classmagnifier)
                            $magnifier.css({
                                border: setting.magnifierborder
                            });

                        $cursorshade = $("<div />");
                        if (setting.cursorshade) {
                            $cursorshade.attr({
                                    "class": setting.classcursorshade
                                })
                                .css({
                                    zIndex: basezindex,
                                    display: "none",
                                    position: "absolute",
                                    width: Math.round(setting.magnifiersize[0] / setting.zoomstart),
                                    height: Math.round(setting.magnifiersize[1] / setting.zoomstart),
                                    top: 0,
                                    left: 0
                                })
                                .appendTo(document.body);

                            if (!options.classcursorshade)
                                $cursorshade.css({
                                    border: setting.cursorshadeborder,
                                    opacity: setting.cursorshadeopacity,
                                    backgroundColor: setting.cursorshadecolor
                                });
                        }

                        if (!setting.loadinggif)
                            setting.loadinggif = "data:image/gif;base64,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";

                        $statusdiv = $("<div />")
                            .attr({
                                "class": setting.classstatusdiv + " preloadevt"
                            })
                            .css({
                                position: "absolute",
                                display: "none",
                                zIndex: basezindex,
                                top: 0,
                                left: 0
                            })
                            .html('<img src="' + setting.loadinggif + '" />')
                            .appendTo(document.body);

                        $tracker = $("<div />")
                            .attr({
                                "class": setting.classtracker
                            })
                            .css({
                                zIndex: basezindex,
                                backgroundImage: self.isie ? "url(cannotbe)" : "none",
                                position: "absolute",
                                width: img.w,
                                height: img.h,
                                left: gallery ? $img.offsetsl().left : -10000,
                                top: gallery ? $img.offsetsl().top : -10000
                            }).appendTo(document.body);

                        $textdn = $("<div />");
                        if (textdn) {
                            $textdn.attr({
                                    "class": setting.classtextdn
                                })
                                .css({
                                    position: "absolute",
                                    zIndex: basezindex,
                                    left: 0,
                                    top: 0,
                                    display: "none"
                                })
                                .html(textdn)
                                .appendTo(document.body);
                            if (!options.classtextdn)
                                $textdn.css({
                                    border: setting.magnifierborder,
                                    background: setting.textdnbackground,
                                    padding: setting.textdnpadding,
                                    font: setting.textdnfont
                                });
                            $textdn.css({
                                width: setting.magnifiersize[0] - parseInt($textdn.css("padding-left")) - parseInt($textdn.css("padding-right"))
                            });
                        }
                        $tracker.data("largeimage", setting.largeimage);


                        // EVENTS
                        $(window).bind("resize", function () {
                            var o = $img.offsetsl();
                            if ($tracker.data("loadimgevt"))
                                $tracker.css({
                                    left: o.left,
                                    top: o.top
                                });
                            $statusdiv.filter(".preloadevt").css({
                                left: o.left + img.w / 2 - $statusdiv.width() / 2,
                                top: o.top + img.h / 2 - $statusdiv.height() / 2,
                                visibility: 'visible'
                            });
                        });
                        $(document).mousemove(function (e) {
                            self.cld.docX = e.pageX;
                            if (self.cld.pageX999 !== self.cld.docX) {
                                clearTimeout(self.cld.controlTimer);
                                clearTimeout(self.cld.controlTimer2);
                                $img.css({
                                    visibility: "visible"
                                });
                            }
                        });
                        $img.mouseover(function (e) {
                            var o = $img.offsetsl();
                            $tracker.css({
                                left: o.left,
                                top: o.top
                            }).show();
                        });
                        $tracker.mouseover(function (e) {

                            self.cld.pageX999 = e.pageX;
                            self.cld.pageY999 = e.pageY;

                            cld.pageX999 = e.pageX;
                            cld.pageY999 = e.pageY;

                            self.cld.docX = e.pageX;

                            var o = $img.offsetsl(),
                                pageX = self.cld.pageX999 - o.left,
                                pageY = self.cld.pageY999 - o.top;

                            self.cld.destK = pageX;
                            self.cld.destL = pageY;

                            self.cld.currU = pageX;
                            self.cld.currV = pageY;

                            self.cld.destM = self.cld.pageX999;
                            self.cld.destN = self.cld.pageY999;

                            self.cld.destU = self.cld.pageX999 - 10;
                            self.cld.destV = self.cld.pageY999 + 20;

                            $tracker.css({
                                cursor: setting.magnifycursor
                            });
                            setting.largeimage = $img.attr("data-large") || $img.attr("src");

                            $statusdiv.show();
                            clearTimeout(self.cld.controlTimer);
                            clearTimeout(self.cld.controlTimer2);

                            if (setting.largeimage !== $tracker.data('largeimage')) {

                                $(new Image()).on('load', function () {}).attr("src", setting.largeimage);

                                $($tracker).unbind();
                                $($statusdiv).remove();
                                $($cursorshade).remove();
                                $($magnifier).remove();
                                $($tracker).remove();
                                $($textdn).remove();

                                self.init($img, options, true);
                            }
                            if ($tracker.data("loadevt")) {
                                $cursorshade.fadeIn();
                                self.showimage($tracker);
                                self.controlLoop($tracker);
                                self.controlLoop2($tracker);
                            }

                        });
                        $tracker.mousemove(function (e) {
                            setting.largeimage = $img.attr("data-large") || $img.attr("src");
                            if (setting.largeimage !== $tracker.data("largeimage")) {

                                $(new Image()).on('load', function () {}).attr("src", setting.largeimage);

                                $($tracker).unbind();
                                $($statusdiv).remove();
                                $($cursorshade).remove();
                                $($magnifier).remove();
                                $($tracker).remove();
                                $($textdn).remove();

                                self.init($img, options, true);
                            }

                            self.cld.pageX999 = e.pageX;
                            self.cld.pageY999 = e.pageY;

                            cld.pageX999 = e.pageX;
                            cld.pageY999 = e.pageY;

                            self.cld.docX = e.pageX;
                        });
                        $tracker.mouseout(function (e) {
                            clearTimeout(self.cld.controlTimer);
                            clearTimeout(self.cld.controlTimer2);
                            $img.css({
                                visibility: "visible"
                            });
                            $textdn.hide();
                            $cursorshade.add($statusdiv.not(".preloadevt")).stop(true, true).hide();
                        });
                        $tracker.one("mouseover", function (e) {

                            var imgcoords = $img.offsetsl();
                            var $bigimage = $('<img src="' + setting.largeimage + '"/>').css({
                                position: "relative",
                                maxWidth: "none"
                            }).appendTo($magnifier);
                            if (!self.loaded999[setting.largeimage]) {
                                $tracker.css({
                                    opacity: setting.loadopacity,
                                    background: setting.loadbackground
                                });
                                $tracker.data("loadimgevt", true);
                                $statusdiv.css({
                                    left: imgcoords.left + img.w / 2 - $statusdiv.width() / 2,
                                    top: imgcoords.top + img.h / 2 - $statusdiv.height() / 2,
                                    visibility: 'visible'
                                });
                            }
                            $bigimage.bind("loadevt", function (event, e) {

                                if (e.type === "error") return;
                                $tracker.mouseout(function (e) { //image onmouseout
                                    self.hideimage($tracker);
                                    clearTimeout(self.cld.controlTimer);
                                    clearTimeout(self.cld.controlTimer2);
                                    $img.css({
                                        visibility: "visible"
                                    });
                                    $textdn.hide();
                                    $tracker.hide().css({
                                        left: -10000,
                                        top: -10000
                                    });
                                });
                                $tracker.mouseover(function (e) { //image onmouseover
                                    specs.currM = specs.newpower;
                                });
                                $tracker.data("loadimgevt", false);
                                $tracker.css({
                                    opacity: 0,
                                    cursor: setting.magnifycursor
                                });
                                $statusdiv.empty();
                                if (!options.classstatusdiv)
                                    $statusdiv.css({
                                        border: setting.statusdivborder,
                                        background: setting.statusdivbackground,
                                        padding: setting.statusdivpadding,
                                        font: setting.statusdivfont,
                                        opacity: setting.statusdivopacity
                                    });
                                $statusdiv.hide().removeClass("preloadevt");
                                self.loaded999[setting.largeimage] = true;
                                getspecs($bigimage);
                                if (cld.pageX999 == self.cld.docX) {
                                    $cursorshade.fadeIn();
                                    self.showimage($tracker);
                                    clearTimeout(self.cld.controlTimer);
                                    clearTimeout(self.cld.controlTimer2);
                                    self.controlLoop($tracker);
                                    self.controlLoop2($tracker);
                                }

                                var specs = $tracker.data("specs");
                                $bigimage.css({
                                    width: setting.zoomstart * specs.bigimage.w * (img.w / specs.bigimage.w),
                                    height: setting.zoomstart * specs.bigimage.h * (img.h / specs.bigimage.h)
                                });
                                $tracker.data("loadevt", true);

                                if (setting.zoomrange && setting.zoomrange[1] > setting.zoomrange[0]) { //if zoom range enabled
                                    $tracker.bind("mousewheel", function (e, delta) {
                                        var zoomdir = delta < 0 ? "out" : "in",
                                            power = specs.newpower,
                                            newpower = (zoomdir == "in") ? Math.min(power + setting.stepzoom, setting.zoomrange[1]) : Math.max(power - setting.stepzoom, setting.zoomrange[0]);

                                        specs.newpower = newpower;
                                        specs.delta = delta;
                                        e.preventDefault();
                                    });

                                } else if (setting.disablewheel) {
                                    $tracker.bind("mousewheel", function (e) {
                                        e.preventDefault();
                                    });
                                }

                            }); //end $bigimage onload */

                            if (isImageLoaded($bigimage.get(0)))
                                $bigimage.trigger("loadevt", {
                                    type: "load"
                                });
                            else $bigimage.bind("load error", function (e) {
                                $bigimage.trigger("loadevt", e)
                            });
                        });
                    },
                    loaded999: {}
                });
                })(jQuery, window);
      </script>
    	<script type="text/javascript">
    		$(document).ready(function(){
    			$(".small_img").hover(function(){
    				$(".big_img").attr('src' ,$(this).attr('src'));
    			});
    		});
    	</script>
    	<script type="text/javascript">
    		$(document).ready(function(){
    			$(".big_img").imagezoomsl({
    				zoomrange: [3 , 3]
    			});
    		});
    	</script>


  
      <input type="hidden" name="id" id="productid" value="{{ $detailedProduct->id }}">
          <div class="product_details_btn align-item-center ">
            <div class="products_btn">
              <a href="javascript:void(0)" onclick="addtocartbtn()" id="addtocart" class="add_cart btn_chek auto-width" style="background:#ff9f00 !important">add to cart</a>
            </div>
            <div class="products_btn">
              <a href="javascript:void(0)" class="buy_now btn_chek auto-width"  onclick="buyNow()" style="background:#fb641b !important">buy now</a>
            </div>
          </div>
    </div>
    <div class="col lg-7 md-12">
      <h1 class="size-h2">{{ __($detailedProduct->name) }}</h1>
      <div class="d-flex no-margin-bottom align-items-center">
        @if(home_base_price($detailedProduct->id) != home_discounted_base_price($detailedProduct->id))
            <div class="c-product__price size-h3 margin-right-small" id="chosen_price">{{ home_discounted_base_price($detailedProduct->id) }}</div>
            <div class="c-product__price size-h3 margin-right-small is-slashed" id="att">{{ home_base_price($detailedProduct->id) }}</div>
            <div class="c-product__price-wrapper">
                  <div class="c-product-thumb__discount_cart"> {{ TotaldiscountPercent($detailedProduct->id) }}% off </div>
            </div>
        @else
            <div class="c-product__price size-h3 margin-right-small" id="chosen_price">{{ home_discounted_base_price($detailedProduct->id) }}</div>
        @endif
      </div>
      @if(home_base_price($detailedProduct->id) != home_discounted_base_price($detailedProduct->id))
      <div class="container is-wide" style="margin: 0 auto;">
          <div class="col lg-12 md-12 sm-12" style="margin: 20px 0 !important; padding: 0 !important;">
            <div class="_1AtVbE">
                <div class="_3Z0lU8">
                  <div class="rd9nIL">Available offers</div>
                </div>
                <div class="XUp0WS">
                  <span class="_3j4Zjq d-flex">
                    <img src="http://rheycart.codealphainfotech.com/public/frontend/images/icons/tag-solid.svg">
                    <li class="_16eBzU">
                      <span class="u8dYXW">Special Price</span>
                      <span>Get extra  {{ TotaldiscountPercent($detailedProduct->id) }}% off (price inclusive of discount)</span>
                    </li>
                  </span>
                </div>
              </div>
          </div>
      </div>
      @endif
        <div class="container is-wide mt-50" style="margin: 0 !important;">
          <div class="col lg-6 md-6 sm-12" style="margin: 10px 0 !important; padding: 0 !important">

          <div class="_1NQxOU">
                  <div class="_1lE4Yy d-flex align-item-center">
                    <img src="http://rheycart.codealphainfotech.com/public/frontend/images/icons/map.svg">
                    <span class="_6eO2LF">Deliver to</span>
                  </div>
                      <div class="ibtBU6 _3t6eWY"><input placeholder="Enter delivery pincode" type="text" maxlength="6" autocomplete="off" class="cfnctZ" value="" id="pincode">
                        <span class="UgLoKg"><a href="javascript:void(0)" onclick="CheckPincode();"> Check  </a></span>
                      </div><br>
                      <span id="pinmessage">  </span>

                      <div class="_2VjdZj" style="display: none;">
                        <div class="_3gc7Vf" onclick="showDiv('welcomeDiv')">
                            <div class="_12cXX4" ><span>Ankleshwar - 393001</span><i class="fas fa-angle-down"></i></div>
                        </div>
                        <div class="_1klldK" id="welcomeDiv" style="display:none;">
                            <div class="_11JoM7 d-flex">
                                <div class="col col-3-12"><img src="https://static-assets-web.flixcart.com/www/linchpin/fk-cp-zion/img/address-loggedout_397db0.svg">
                                </div>
                                <div class="col col-9-12 _3jtobU">
                                    <div class="_2GG0-R">Log in to view saved addresses</div>
                                    <div class="CqGWxm">
                                      <a href=""> Log In </a>
                                    </div>
                                </div>
                            </div>
                            <div class="ibtBU6"><input placeholder="Enter delivery pincode" type="text" maxlength="6" autocomplete="off"
                                    class="cfnctZ" value=""><span class="UgLoKg jlIjY-">Check</span></div>
                        </div>
                        <div class="_3FS-KP"></div>
                    </div>
                  <div class="_2VjdZj" style="display: none;">
                    <div class="_3gc7Vf" onclick="showDiv('welcomeDiv-2')">
                      <div class="itIIUM _3Q_aSZ _2Qj_Pa">
                        <div class="_28zKjW"><span class="_1nazcq">Divyesh Prajapati,&nbsp;</span>
                          <span class="_3JbnzD">test city</span><i class="fas fa-angle-down"></i>
                        </div>
                      </div>
                  </div>
                  <div class="_1klldK answer_list"  id="welcomeDiv-2" style="display:none;">
                    <span class="Gsw5M9">Select from saved addresses:</span>
                    <div class="itIIUM _2Qj_Pa"><div class="_28zKjW">
                      <span class="_1nazcq">Divyesh Prajapati,&nbsp;</span>
                      <span class="_3JbnzD">test city</span>
                    </div>
                  </div>
                  <div class="ibtBU6">
                      <input placeholder="Enter delivery pincode" type="text" maxlength="6" autocomplete="off" class="cfnctZ" value="">
                      <span class="UgLoKg jlIjY-">Check</span>
                    </div>
                  </div>
                  <div class="_3FS-KP"></div>
                </div>
              </div>
          </div>

          <div class="col lg-6 md-6 sm-12" style="margin: 10px 0 !important;">
              <div class="container">
                <div class="col lg-2 md-2 sm-12" style="margin: 10px 0 !important; padding: 0 !important;">
                    <div class="opacity-50 my-2 d-flex align-items-center">Services</div>
                </div>
                <div class="col lg-10 md-10 sm-12" style="margin: 10px 0 !important;  padding: 0 !important;">
                    <div class="Delivery_ditals">
                      <div class="_2MJMLX"> <img src="http://rheycart.codealphainfotech.com/public/frontend/images/icons/sync-alt-solid.svg"> 14 Days Return Policy</div>
                      <div class="_2MJMLX"> <img src="http://rheycart.codealphainfotech.com/public/frontend/images/icons/rupee.svg" style="height: auto;"> Cash on Delivery available</div>
                    </div>
                </div>
              </div>
          </div>
        </div>

        <script type="text/javascript">
          function showDiv(Div) {
              var x = document.getElementById(Div);
              if(x.style.display=="none") {
                  x.style.display = "block";
              } else {
                  x.style.display = "none";
              }
          }
        </script>

    <div class="container is-wide" style="margin: 0 auto;display: block;">
        @if ($detailedProduct->choice_options != null)
          @foreach (json_decode($detailedProduct->choice_options) as $key => $choice)
            <div class="col lg-2 md-2 sm-12" style="margin: 10px 0 !important; padding: 0 !important;">
                <div class="opacity-50 my-2 d-flex align-items-center">{{ \App\Attribute::find($choice->attribute_id)->name }}:</div>
            </div>
            <div class="col lg-10 md-10 sm-12" style="margin: 10px 0 !important;  padding: 0 !important;">
              <div class="d-flex align-items-center">
                  <div class="wrapper-tooltip">
                      <div class="radioWrapper">
                            @foreach ($choice->values as $key => $value)
                                @php 
                                    $img = "uploads/No-image-available.png"; 
                                    if(($stock = $detailedProduct->stocks->where('product_id', $detailedProduct->id)->where('variant', $value)->first()) != null){
                                      $img = $stock->image_s;
                                      $price = $stock->price;
                                    }
                                @endphp 
                            <div class="radioToolbar">
                                <input name="attribute_id_{{ $choice->attribute_id }}"  type="radio"  @if($key == 0) checked @endif >
                                @if(\App\Attribute::find($choice->attribute_id)->name == 'Color')
                                <div class="_2C41yO _1pH70n _31hAvz @if($key == 0) active @endif" id="image_{{$key}}">
                                  <img src="{{ asset($img) }}" onclick="GetImage({{$key}}, '{{ asset($img) }}', '{{$price}}' )">
                                  <!-- <div class="tooltip" id="image_val_{{$key}}"></div> -->
                                </div>
                                @else 
                                  <label for="{{ $value }}" class="">{{ $value }}</label>
                                @endif
                            </div>
                            @endforeach
                        </div>
                  </div>
                </div>
              </div>
          @endforeach
        @endif

          <div style="margin: 20px 0 !important;">
            <div class="accordion js-accordion" data-id="accordion1">
              <button type="button" id="accordionOne" class="accordion__button js-accordion__button" aria-expanded="false" aria-controls="sectionOne">
                Product Details
              </button>
              <div id="sectionOne" class="accordion__body js-accordion__body" role="region" aria-labelledby="accordionOne">
                  <div style="padding: 20px 0;" class="text">
                    <div class="content" style="margin-top: 3px;" >
                        <div class="d-flex align-item-center">
                            <div class="opacity-50 my-2 w-200px">Categories</div>
                            <div>{{$detailedProduct->category->name ?? ""}}</div>
                        </div>
                    </div>
                    <div class="content" style="margin-top: 3px;" >
                        <div class="d-flex align-item-center">
                            <div class="opacity-50 my-2 w-200px">Occasion</div>
                            <div>{{$detailedProduct->occasion->name ?? "" }}</div>
                        </div>
                    </div>
                    <div class="content" style="margin-top: 3px;" >
                        <div class="d-flex align-item-center">
                            <div class="opacity-50 my-2 w-200px">Fabric</div>
                            <div>{{$detailedProduct->fabric->name ?? "" }}</div>
                        </div>
                    </div>
                    <div class="content" style="margin-top: 3px;" >
                        <div class="d-flex align-item-center">
                            <div class="opacity-50 my-2 w-200px">SKU</div>
                            <div>{{$detailedProduct->sku_code}}</div>
                        </div>
                    </div>
                    <div class="content" style="margin-top: 3px;" >
                        <div class="d-flex align-item-center">
                            <div class="opacity-50 my-2 w-200px"></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="content" style="margin-top: 3px;" >
                        <div class="d-flex align-item-center">
                            <div class="opacity-50 my-2 w-200px">Tags</div>
                              <div>{{$detailedProduct->tags}}</div>
                        </div>
                    </div>
                    <div class="content" style="margin-top: 3px;" >
                        <p>{!! $detailedProduct->description !!}</p>
                    </div>
                </div>
              </div>
            </div>
          </div>

      <div class="_1AtVbE col-12-12">
          <div class="col JOpGWq _33R3aa">
              <div class="_3HKIdy">
                  <div class="_2QKOHZ _33R3aa">Ratings &amp; Reviews</div>
              </div>
              <div class="texts mt-50">
                @foreach ($detailedProduct->reviews as $key => $review)
                  @if($review->user != null)
                  <div class="c-comment">
                    <div class="c-author"><img src="/public/frontend/images/user-icon.jpg" width="72" alt="" class="is-rounded margin-right">
                      <div>
                        <div class="flexh-align-center margin-bottom-xsmall xs-is-wrapping">
                          <div class="c-author__name">{{ $review->user->name }}</div>
                          <div class="c-badge">Verified Buyer</div>
                        </div>
                        <div class="text-xsmall low-text-contrast margin-bottom-xsmall">{{ $review->created_at }}</div>
                        <div class="c-product__rating">
                          @for ($i=0; $i < $review->rating; $i++)
                          <div class="fa is-filled"></div>
                          @endfor
                          @for ($i=0; $i < 5-$review->rating; $i++)
                          <div class="fa is-blank"></div>
                          @endfor
                        </div>
                      </div>
                    </div>
                    <p>{{ $review->comment }}</p>
                  </div>
                  @endif
                @endforeach
              <style>
                  .customer-review{border-bottom: 1px solid #0000001a;margin-bottom: 1rem;padding-bottom: 1rem;}
                  .customer-review .pic{width: 90px;height: 90px;border-radius: 50%;border: 1px solid #fbc9be;background-color: #fbc9be;overflow: hidden;}
                  .customer-review .customer-description p:first-child{margin-bottom: 0;}
                  .rating-wrapper {position: relative;display: inline-block;border: none;font-size: 14px;margin: 0 auto;left: 0;}
                  .rating-wrapper input {border: 0;width: 1px;height: 1px;overflow: hidden;position: absolute !important;clip: rect(1px 1px 1px 1px);clip: rect(1px, 1px, 1px, 1px);opacity: 0;}
                  .rating-wrapper label {position: relative;float: right;color: #C8C8C8;}
                  .rating-wrapper label:before {margin: 5px;content: "\f005";font-family: 'Fa solid 900';display: inline-block;font-size: 1.5em;color: #ccc;-webkit-user-select: none;-moz-user-select: none;user-select: none;}
                  .rating-wrapper input:checked ~ label:before {color: #FFC107;}
                  .rating-wrapper label:hover ~ label:before {color: #ffdb70;}
                  .rating-wrapper label:hover:before {color: #FFC107;}
              </style>
              @if(count($detailedProduct->reviews) <= 0)
                  <h5 class="text-center" style="margin-bottom: 40px;text-transform: uppercase;">
                      {{ __('There have been no reviews for this product yet.') }}
                  </h5>
              @endif
              @if(Auth::check())
                    @php
                        $commentable = false;
                    @endphp
                    @foreach ($detailedProduct->orderDetails as $key => $orderDetail)
                        @if($orderDetail->order != null && $orderDetail->order->user_id == Auth::user()->id && $orderDetail->delivery_status == 'pending' && \App\Review::where('user_id', Auth::user()->id)->where('product_id', $detailedProduct->id)->first() == null)
                            @php
                                $commentable = true;
                            @endphp
                        @endif
                  @endforeach
                  @if ($commentable)
                  <form role="form" action="{{ route('reviews.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $detailedProduct->id }}" />
                    <div class="col lg-6 md-12">
                      <h2 class="margin-bottom _2QKOHZ _33R3aa">Write Your Review</h2>
                      <div class="container container-nested is-wrapping">
                        <div class="col lg-6 md-12 no-margin-bottom" style=" margin: 0 !important; ">
                          <div class="form-group">
                              <input type="text" required="required" id="FullName" name="name" value="{{ Auth::user()->name }}">
                              <label for="FullName" class="control-label">Full Name <span class="required">*</span></label><i class="bar"></i>
                            </div>
                          </div>
                          <div class="col lg-6 md-12 no-margin-bottom" style=" margin: 0 !important; ">
                            <div class="form-group">
                              <input type="text" required="required" name="email" value="{{ Auth::user()->email }}">
                              <label for="input" class="control-label">Enter Email <span class="required">*</span></label><i class="bar"></i>
                            </div>
                          </div>
                        <div class="col lg-6 md-12 no-margin-bottom" style=" margin: 0 !important; ">
                          <div class="input-set-group">
                            <label class="fw-500" for="Email">Your Rating <span class="required">*</span></label>
                            <div class="rating-wrapper">
                              <input type="checkbox" id="st1" name="rating" value="5"  />
                              <label for="st1"></label>
                              <input type="checkbox" id="st2" name="rating" value="4" />
                              <label for="st2"></label>
                              <input type="checkbox" id="st3" name="rating" value="3" />
                              <label for="st3"></label>
                              <input type="checkbox" id="st4" name="rating" value="2" />
                              <label for="st4"></label>
                              <input type="checkbox" id="st5" name="rating" value="1" />
                              <label for="st5"></label>
                            </div>
                          </div>
                        </div>
                        <div class="col lg-12 md-12 no-margin-bottom" style=" margin: 0 !important; ">
                          <div class="form-group">
                            <textarea required="required" name="comment"></textarea>
                            <label for="textarea" class="control-label">Your Review <span class="required">*</span></label><i class="bar"></i>
                          </div>
                        </div>
                        <div class="col lg-12 md-12 no-margin-bottom" style=" margin: 0 !important; "> <button type="submit" class="inline-button auto-width">Submit your review</button> </div>
                      </div>
                    </div>
                  </form>
                  @endif
                @endif
              </div>
          </div>
      </div>

      <div class="flexh-align-center margin-bottom social-share-icons">
            <div class="margin-right-small">Share</div>
            <div> <a href="https://www.facebook.com/sharer/sharer.php?http://rheycart.codealphainfotech.com/product/Womens-Banarasi-Pure-Chiffon-Saree-With-Blouse-Piece10-N9rV6" target="_blank" class="c-share-btn w-inline-block">
              <div class="fa-brand is-body-text-color"></div>
              </a> <a href="https://twitter.com/intent/tweet?source=http://rheycart.codealphainfotech.com/product/Womens-Banarasi-Pure-Chiffon-Saree-With-Blouse-Piece10-N9rV6" target="_blank" class="c-share-btn w-inline-block">
              <div class="fa-brand is-body-text-color"></div> </a>
              <a href="http://pinterest.com/pin/create/button/?url=http://rheycart.codealphainfotech.com/product/Womens-Banarasi-Pure-Chiffon-Saree-With-Blouse-Piece10-N9rV6" target="_blank" class="c-share-btn w-inline-block">
              <div class="fa-brand is-body-text-color"></div>
              </a> </div>
          </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    function ViewReviews(){
         $('html, body').animate({
            scrollTop: $("#idViewReviews").offset().top - 150
        },1000);
  }
</script>


<section>

  <div class="section border-top-1px">
    <div class="" style="padding: 0 20px;">
      <div class="col lg-12" style="margin: 0 !important;">
        <h3>Related products</h3>
      </div>
    </div>
        <style media="screen">
          .slider {
            width: auto;
            margin: 15px 50px;
            }

            .slider .slick-prev:before,
            .slider .slick-next:before {
              color: #292e3e;
              font-weight: 900 !important;
              font-family: 'Font Awesome 5 Free' !important;
            }

            .slider .slick-prev:before , .slick-next:before {
              content: "" !important;
              background-image: url('../public/frontend/images/icons/slider-arrow.svg');
              position: absolute;
              width: 16px;
              height: 30px;
            }

             .slick-next:before {
              transform: rotate(180deg);
            }
        </style>

        <div class="slider">
            @foreach(App\Product::where('category_id', $detailedProduct->category_id)->take(10)->get() as $product)
            <div>
                  <div class="c-product-thumb">
                    <div class="c-product-thumb__top">
                      <a href="{{ route('product', $product->slug) }}" class="margin-bottom-small w-inline-block w--current">
                        <img class="product-img" src="{{ asset($product->thumbnail_img) }}" sizes="(max-width: 479px) 90vw, (max-width: 615px) 91vw, 560px" style="max-height: 300px;" alt="">
                      @if(isset($product->discount) && $product->discount != 0)
                          <div class="c-product-thumb__discount">
                              <div>{{TotaldiscountPercent($product->id)}}%</div>
                          </div>
                        @endif
                      </a>
                      <div class="text-xsmall weight-is-medium margin-bottom-small">
                        <a href="{{ route('products.category',$product->category->slug)}}">{{$product->category->name}}</a></div>
                      <div class="c-product__rating">
                      @php
                          $total = 0;
                          $total += $product->reviews->count();
                      @endphp
                      {{ renderStarRating($product->rating) }}
                      </div>
                      <a href="{{ route('product', $product->slug) }}" class="w-inline-block w--current">
                      <div class="c-product__title">{{$product->name}}</div>
                      </a> </div>
                    <div class="c-product__price-wrapper">
                      @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                          <div class="c-product__price margin-right-small">{{ home_discounted_base_price($product->id) }}</div>
                          <div class="c-product__price is-slashed">{{ home_base_price($product->id) }}</div>
                      @else
                          <div class="c-product__price margin-right-small">{{ home_discounted_base_price($product->id) }}</div>
                      @endif
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
        <script type="text/javascript">
            $(()=>{
              var createSlick = ()=>{
                let slider = $(".slider");

                slider.not('.slick-initialized').slick({
                  autoplay: false,
                  infinite: true,
                  dots: false,
                  slidesToShow: 5,
                  slidesToScroll: 5,
                  responsive: [
                    {
                      breakpoint: 1024,
                      settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        adaptiveHeight: true,
                      },
                    },
                    {
                      breakpoint: 600,
                      settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                      },
                    },
                  ],
                });
              }

              createSlick();

              $(window).on( 'resize orientationchange', createSlick );
              })
        </script>
  </div>
</section>


@include('frontend.partials.subscribe')
<div class="c-overlay">
  </div>

  <div id="popup1" class="modal-box modal">
      <div class="modal-body">
        <div class="close-icon js-modal-close"><i class="fa icon" style="font-size: 22px;"></i></div>
        <h2 class="text-uppercase">{{__('Ask a Question')}}</h2>
        <div class="p-3 login-register">
          <div class="login" style="padding:0 !important;">
          <form role="form" action="{{ route('questions.store') }}" method="POST">
            @csrf
              <fieldset>
                  <label class="text-align-left" for="Username">Name <span class="required">*</span></label>
                  <input type="text" name="name" placeholder="{{__('Enter your name')}}">
              </fieldset>
              @error('name')
                  <div style="color:red">{{ $message }}</div>
              @enderror
              <fieldset>
                  <label class="text-align-left" for="Username">Email <span class="required">*</span></label>
                  <input type="email" name="email" placeholder="{{__('Enter your email')}}">
                  <input type="hidden" name="product_id" value="{{$detailedProduct->id}}" />
              </fieldset>
              @error('email')
                  <div style="color:red">{{ $message }}</div>
              @enderror
              <fieldset>
                  <label class="text-align-left" for="Username">Phone <span class="required">*</span></label>
                  <input type="tel" name="phone" placeholder="{{__('Phone')}}">
              </fieldset>
              @error('phone')
                  <div style="color:red">{{ $message }}</div>
              @enderror
              <fieldset>
                  <label class="text-align-left" for="password">Write your question <span class="required">*</span></label>
                  <input type="text" name="question" placeholder="{{__('Enter your Question')}}">
              </fieldset>
              @error('question')
                  <div style="color:red">{{ $message }}</div>
              @enderror
              <button type="submit" class="inline-button">{{__('Submit')}}</button>
          </form>
          </div>
        </div>
        <div class="w-clearfix">&nbsp;</div>
      </div>
    </div>

</div>
</form>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
    		$('#share').share({
    			networks: ['facebook','twitter','linkedin'],
    			theme: 'square'
    		});
            getVariantPrice();

    	});

        function CopyToClipboard(containerid) {
            if (document.selection) {
                var range = document.body.createTextRange();
                range.moveToElementText(document.getElementById(containerid));
                range.select().createTextRange();
                document.execCommand("Copy");

            } else if (window.getSelection) {
                var range = document.createRange();
                document.getElementById(containerid).style.display = "block";
                range.selectNode(document.getElementById(containerid));
                window.getSelection().addRange(range);
                document.execCommand("Copy");
                document.getElementById(containerid).style.display = "none";

            }
            showFrontendAlert('success', 'Copied');
        }

        function show_chat_modal(){
            @if (Auth::check())
                $('#chat_modal').modal('show');
            @else
                $('#login_modal').modal('show');
            @endif
        }

      function addtocartbtn() {
        // var x = document.getElementById("snackbar");
        // x.className = "show";
        // setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        addToCart();
        setTimeout(function(){
          $('.c-overlay').hide();
          },  1000);
      }


      const tabLink = document.querySelectorAll(".tab-menu-link");
const tabContent = document.querySelectorAll(".tab-bar-content");

tabLink.forEach((el) => {
  el.addEventListener("click", activeTab);
});

function activeTab(el) {
  const btnTarget = el.currentTarget;
  const content = btnTarget.dataset.content;

  tabContent.forEach((el) => {
    el.classList.remove("active");
  });

  tabLink.forEach((el) => {
    el.classList.remove("active");
  });

  document.querySelector("#" + content).classList.add("active");
  btnTarget.classList.add("active");
}


function Quick(id){
    $('.c-overlay').html(null);
    $.post('{{ route('quick.view') }}',{_token:'{{ csrf_token() }}', id:id}, function(data){
      $(".c-overlay").html(data);
    });
}

function closetest() {
      $('.c-overlay').hide();
    }


    </script>

    <script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("product-slider-mySlides");
  var dots = document.getElementsByClassName("product-slider-demo");
  var captionText = document.getElementById("product-slider-caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" product-slider-active", "");
  }
  slides[slideIndex-1].style.display = "flex";
  dots[slideIndex-1].className += " product-slider-active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>

<style media="screen">
  .product_align_middle {
    align-items: center;
  }
  .product_align_middle div:first-child {
    margin-right: 10px;
}

.inline-button.auto-width, .auto-width {
  margin-bottom: 0 !important;
}

.footer-top-section.bg-gray {
    display: none;
}
</style>


<style media="screen">
    .wrapper-tooltip {
     text-transform: capitalize;
     color: #555;
     cursor: pointer;
     font-weight: 500;
     margin: 0 15px;
     font-size: 12px;
     position: relative;
     text-align: center;
     -webkit-transform: translateZ(0);
    /* webkit flicker fix */
     -webkit-font-smoothing: antialiased;
    /* webkit text rendering fix */
    }

    .wrapper-tooltip .tooltip {
     background: #212121;
     bottom: 100%;
     color: #fff;
     display: block;
     left: 0;
     margin-bottom: 15px;
     opacity: 0;
     padding: 5px;
     pointer-events: none;
     position: absolute;
     width: 100%;
     -webkit-transform: translateY(10px);
     -moz-transform: translateY(10px);
     -ms-transform: translateY(10px);
     -o-transform: translateY(10px);
     transform: translateY(10px);
     -webkit-transition: all 0.25s ease-out;
     -moz-transition: all 0.25s ease-out;
     -ms-transition: all 0.25s ease-out;
     -o-transition: all 0.25s ease-out;
     transition: all 0.25s ease-out;
     -webkit-box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.28);
     -moz-box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.28);
     -ms-box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.28);
     -o-box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.28);
     box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.28);
    }

    ._2C41yO._1pH70n._31hAvz.active {
        border: 1px solid #000;
    }

    ._2C41yO._1pH70n._31hAvz {
        width: 80px;
        padding: 5px 5px;
        height: 80px;
      }

    ._2C41yO._1pH70n._31hAvz img {
      object-fit: contain;
      height: 70px;
      object-position: center;
    }

    /* This bridges the gap so you can mouse into the tooltip without it disappearing */
    .wrapper-tooltip .tooltip:before {
     bottom: -20px;
     content: " ";
     display: block;
     height: 20px;
     left: 0;
     position: absolute;
     width: 100%;
    }
    /* CSS Triangles - see Trevor's post */
    .wrapper-tooltip .tooltip:after {
     border-left: solid transparent 10px;
     border-right: solid transparent 10px;
     border-top: solid #212121 10px;
     bottom: -10px;
     content: " ";
     height: 0;
     left: 50%;
     margin-left: -13px;
     position: absolute;
     width: 0;
    }
    .wrapper-tooltip:hover .tooltip {
     opacity: 1;
     pointer-events: auto;
     -webkit-transform: translateY(0px);
     -moz-transform: translateY(0px);
     -ms-transform: translateY(0px);
     -o-transform: translateY(0px);
     transform: translateY(0px);
    }
    /* IE can just show/hide with no transition */
    .lte8 .wrapper-tooltip .tooltip {
     display: none;
    }
    .lte8 .wrapper-tooltip:hover .tooltip {
     display: block;
    }
</style>

<style media="screen">

  .accordion__button {
    justify-content: space-between;
  }

  .accordion__button:after {
    content: '\f067';
    display: block;
    margin-left: 15px;
    font-family: 'Font Awesome 5 free';
    font-weight: bold;
    float: right;
    font-size: 20px;
    color: #000000;
  }
  .accordion__button.is-active:after {
   content: '\f068';
  }
  .accordion__button.is-active {
     background: #ffffff;
     color: #000000;
  }

  .accordion__button {
    padding: 15px 0 !important;
  }

  .accordion {
        box-shadow: 0 0 0 0 rgb(0 0 0 / 25%);
        border-top: 2px solid #f0f0f0;
        /* border-bottom: 2px solid #f0f0f0; */
    }

   .accordion__button:focus {
     background: #ffffff;
     outline: none;
     color: #000000;
  }

  .text.show-more .moreText {
    display: inline;
    }
    .text.show-more .dots {
    display: none;
    }

    .moreText {
      display: none;
    }

    a.read-more-btn {
        cursor: pointer;
        font-size: 16px;
        color: #2874f0;
        font-weight: 500;
        padding: 0;
        margin: 24px 0;
    }

    .text.show-more a.read-more-btn {
        display: none !important;
    }

</style>

<script type="text/javascript">
      'use strict'

      class Accordion {
      constructor(element, options = {}) {
        this.accordion = element
        this.buttons = null
        this.bodies = null
        this.options = {
          activeClassName: 'is-active',
          closeOthers: true,
          ...options,
        }

        this.handleKeydown = this.handleKeydown.bind(this)
        this.handleClick = this.handleClick.bind(this)
        this.handleTransitionend = this.handleTransitionend.bind(this)

        this.init()
      }

      init() {
        if (this.accordion.classList.contains('is-init-accordion')) {
          throw Error('Accordion is already initialized.')
        }

        this.buttons = [...this.accordion.querySelectorAll('.js-accordion__button')]
        this.bodies = [...this.accordion.querySelectorAll('.js-accordion__body')]

        // Handle active accordion item
        for (const button of this.buttons) {
          if (!button.classList.contains(this.options.activeClassName)) continue
          button.setAttribute('aria-expanded', 'true')
          const body = button.nextElementSibling
          body.style.display = 'block'
          body.style.maxHeight = 'none'
        }

        // Hide all bodies except the active
        for (const body of this.bodies) {
          if (body.previousElementSibling.classList.contains(this.options.activeClassName)) continue
          body.style.display = 'none'
          body.style.maxHeight = '0px'
        }

        this.addEvents()

        this.accordion.classList.add('is-init-accordion')
      }

      closeOthers(elException) {
        for (const button of this.buttons) {
          if (button === elException) continue
          button.classList.remove(this.options.activeClassName)
          button.setAttribute('aria-expanded', 'false')
          const body = button.nextElementSibling
          body.style.maxHeight = `${body.scrollHeight}px`
          setTimeout(() => void (body.style.maxHeight = '0px'), 0)
        }
      }

      handleKeydown(event) {
        const target = event.target
        const key = event.which.toString()

        if (target.classList.contains('js-accordion__button') && key.match(/35|36|38|40/)) {
          event.preventDefault()
        } else {
          return false
        }

        switch (key) {
          case '36':
            // "Home" key
            this.buttons[0].focus()
            break
          case '35':
            // "End" key
            this.buttons[this.buttons.length - 1].focus()
            break
          case '38':
            // "Up Arrow" key
            const prevIndex = this.buttons.indexOf(target) - 1
            if (this.buttons[prevIndex]) {
              this.buttons[prevIndex].focus()
            } else {
              this.buttons[this.buttons.length - 1].focus()
            }
            break
          case '40':
            // "Down Arrow" key
            const nextIndex = this.buttons.indexOf(target) + 1
            if (this.buttons[nextIndex]) {
              this.buttons[nextIndex].focus()
            } else {
              this.buttons[0].focus()
            }
            break
        }
      }

      handleClick(event) {
        const button = event.currentTarget
        const body = button.nextElementSibling

        if (this.options.closeOthers) {
          this.closeOthers(button)
        }

        // Set height to the active body
        if (body.style.maxHeight === 'none') {
          body.style.maxHeight = `${body.scrollHeight}px`
        }

        if (button.classList.contains(this.options.activeClassName)) {
          // Close accordion item
          button.classList.remove(this.options.activeClassName)
          button.setAttribute('aria-expanded', 'false')
          setTimeout(() => void (body.style.maxHeight = '0px'), 0)
        } else {
          // Open accordion item
          button.classList.add(this.options.activeClassName)
          button.setAttribute('aria-expanded', 'true')
          body.style.display = 'block'
          body.style.maxHeight = `${body.scrollHeight}px`
        }
      }

      handleTransitionend(event) {
        const body = event.currentTarget
        if (body.style.maxHeight !== '0px') {
          // Remove the height from the active body
          body.style.maxHeight = 'none'
        } else {
          // Hide the active body
          body.style.display = 'none'
        }
      }

      addEvents() {
        this.accordion.addEventListener('keydown', this.handleKeydown)
        for (const button of this.buttons) {
          button.addEventListener('click', this.handleClick)
        }
        for (const body of this.bodies) {
          body.addEventListener('transitionend', this.handleTransitionend)
        }
      }

      destroy() {
        this.accordion.removeEventListener('keydown', this.handleKeydown)
        for (const button of this.buttons) {
          button.removeEventListener('click', this.handleClick)
        }
        for (const body of this.bodies) {
          body.addEventListener('transitionend', this.handleTransitionend)
        }

        this.buttons = null
        this.bodies = null

        this.accordion.classList.remove('is-init-accordion')
      }
      }

      // ---

      window.addEventListener('DOMContentLoaded', () => {
        const accordionEls = [...document.querySelectorAll('.js-accordion')]
        for (const accordionEl of accordionEls) {
            new Accordion(accordionEl)
        }
      })

      function GetImage(id, url, price) {
          $("._31hAvz").removeClass("active");
          $("#image_"+id).addClass("active");
          $("#big_image").attr("src", url);
          $('#chosen_price').text('₹'+price);
      }

      function CheckPincode(params) {
        var pincode = $("#pincode").val();
        var productid= $("#productid").val();
        $("#pinmessage").text('');
        if(pincode == ""){
            $("#pinmessage").addClass('enterpincode');
            $("#pinmessage").text('Enter A Pincode');
        }else{
          $("#pinmessage").text('');
          $("#pinmessage").removeClass('enterpincode');

          $.post('{{ route('pincode.check') }}',{_token:'{{ csrf_token() }}', id:productid, pincode:pincode}, function(data){

                if(data.status == true){
                    $("#pinmessage").text('Product is availble for this pincode');
                }else{
                  $("#pinmessage").addClass('enterpincode');
                    $("#pinmessage").text('Product is not availble for this pincode');
                }

            });
        }

      }

</script>
<style>
.enterpincode{
  color:red;
}
.product_details_btn {
  display:flex;
}
.products_btn{
  width:50%;
}
</style>


@endsection
