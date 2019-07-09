AOS.init({
  duration: 800
});


$("html").easeScroll();



$(window).on("load", function () {
  var currentX = 0,
    currentY = 0,
    animationSpeed = 8,
    count = 0,
    windowW = $(this).width(),
    windowH = $(this).height(),
    hovered = false,
    pulsed = false,
    activeButton = 0,
    loaded = false;

  var x = 0,
    y = 0,
    dot = $(".dot"),
    path = dot.find("path");

  $(window).on("mousemove", function (e) {
    loaded = true;
    if (!hovered) {
      x = e.pageX;
      y = e.pageY;
    }
  });

  function move() {
    count++;
    if (!loaded) {
      x = windowW / 2 + Math.sin(count / 20) * (windowW / 4);
      y = windowH / 2;
    }
    var boxCenter = [
      dot.offset().left + dot.width() / 2,
      dot.offset().top + dot.height() / 2];


    var angle =
      Math.atan2(x - boxCenter[0], -(y - boxCenter[1])) * (180 / Math.PI);
    var speedX = Math.abs(x - currentX),
      speedY = Math.abs(y - currentY),
      speed = Math.sqrt(speedX * speedX + speedY * speedY) * -1;

    if (speed > -1) {
      speed = 0;
    }

    var scale = speed / 500 + 1;
    var tailPos = speed / 10 + 50;

    if (tailPos < 0) {
      tailPos = 0;
    } else if (tailPos > 40) {
      tailPos = 50;
    }

    if (scale < 0.2) {
      scale = 0.2;
    }

    currentX += (x - currentX) / animationSpeed;
    currentY += (y - currentY) / animationSpeed;

    if (hovered) {
      angle = 0;
      scale = 1;
      tailPos = 50;

      if (Math.abs(x - currentX) < 10 && Math.abs(y - currentY) < 10) {
        if (!pulsed) {
          activeButton.addClass('pulse');
          pulsed = true;
        }

      }
    }

    dot.css({
      transform:
        "translate(" + (
          currentX - 0) +
        "px, " + (
          currentY - 0) +
        "px) rotate(" +
        angle +
        "deg) scaleX(" +
        scale +
        ")"
    });


    path.attr({
      d:
        "M75,100 C88.8071187,100 100,88.8071187 100,75 C100,61.1928813 88.8071187,50 75,50 C61.1928813,50 50,61.1928813  " +
        tailPos +
        ",75 C50,88.8071187 61.1928813,100 75,100 Z"
    });


    window.requestAnimationFrame(move);
  }

  window.requestAnimationFrame(move);

  $(".button").on("mouseenter", function () {
    hovered = true;
    pulsed = false;
    activeButton = $(this);
    x = $(this).offset().left + $(this).width() / 2;
    y = $(this).offset().top + $(this).height() / 2;

    dot.addClass("button-hover");


    $(this).on("mouseleave", function () {
      hovered = false;
      dot.removeClass("button-hover");
      $(this).removeClass('pulse');
    });
  });
});


jQuery(document).ready(function ($) {
  $('.cd-btn').on('click', function (event) {
    event.preventDefault();
    $('.cd-panel').addClass('is-visible');
  });
  $('.cd-panel').on('click', function (event) {
    if ($(event.target).is('.cd-panel') || $(event.target).is('.cd-panel-close')) {
      $('.cd-panel').removeClass('is-visible');
      event.preventDefault();
    }
  });
});




$(document).ready(function () {
  $(".owl-demo").owlCarousel({
    margin: 20,
    nav: false,
    loop: false,
    autoplay: true,
    dots: true,
    rewind: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    navText: ["<i class='flaticon-left-arrow'></i>", "<i class='flaticon-right-arrow'></i>"],
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      1000: {
        items: 1
      }
    }
  })
})


$(function () {
  var offset = $("#sidebar").offset();
  var topPadding = 150;
  $(window).scroll(function () {
    if ($(window).scrollTop() > offset.top) {
      $("#sidebar").stop().animate({
        marginTop: $(window).scrollTop() - offset.top + topPadding
      });
    } else {
      $("#sidebar").stop().animate({
        marginTop: 0
      });
    };
  });
});


$('.btn-number').click(function (e) {
  e.preventDefault();
  fieldName = $(this).attr('data-field');
  type = $(this).attr('data-type');
  var input = $("input[name='" + fieldName + "']");
  var currentVal = parseInt(input.val());
  if (!isNaN(currentVal)) {
    if (type == 'minus') {

      if (currentVal > input.attr('min')) {
        input.val(currentVal - 1).change();
      }
      if (parseInt(input.val()) == input.attr('min')) {
        $(this).attr('disabled', true);
      }

    } else if (type == 'plus') {

      if (currentVal < input.attr('max')) {
        input.val(currentVal + 1).change();
      }
      if (parseInt(input.val()) == input.attr('max')) {
        $(this).attr('disabled', true);
      }

    }
  } else {
    input.val(0);
  }
});

$('.input-number').focusin(function () {
  $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function () {

  minValue = parseInt($(this).attr('min'));
  maxValue = parseInt($(this).attr('max'));
  valueCurrent = parseInt($(this).val());

  name = $(this).attr('name');
  if (valueCurrent >= minValue) {
    $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
  } else {
    alert('Sorry, the minimum value was reached');
    $(this).val($(this).data('oldValue'));
  }
  if (valueCurrent <= maxValue) {
    $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
  } else {
    alert('Sorry, the maximum value was reached');
    $(this).val($(this).data('oldValue'));
  }


});




$('.sel').each(function () {
  $(this).children('select').css('display', 'none');

  var $current = $(this);

  $(this).find('option').each(function (i) {
    if (i == 0) {
      $current.prepend($('<div>', {
        class: $current.attr('class').replace(/sel/g, 'sel__box')
      }));

      var placeholder = $(this).text();
      $current.prepend($('<span>', {
        class: $current.attr('class').replace(/sel/g, 'sel__placeholder'),
        text: placeholder,
        'data-placeholder': placeholder
      }));

      return;
    }

    $current.children('div').append($('<span>', {
      class: $current.attr('class').replace(/sel/g, 'sel__box__options'),
      text: $(this).text()
    }));
  });
});

$('.sel').click(function () {
  $(this).toggleClass('active');
});

$('.sel__box__options').click(function () {
  var txt = $(this).text();
  var index = $(this).index();

  $(this).siblings('.sel__box__options').removeClass('selected');
  $(this).addClass('selected');

  var $currentSel = $(this).closest('.sel');
  $currentSel.children('.sel__placeholder').text(txt);
  $currentSel.children('select').prop('selectedIndex', index + 1);
});



$.fn.responsiveTabs = function () {
  return this.each(function () {
    var el = $(this), tabs = el.find('dt'), content = el.find('dd'), placeholder = $('<div class="responsive-tabs-placeholder"></div>').insertAfter(el);
    tabs.on('click', function () {
      var tab = $(this);
      tabs.not(tab).removeClass('active');
      tab.addClass('active');
      placeholder.html(tab.next().html());
    });
    tabs.filter(':first').trigger('click');
  });
};
$('.responsive-tabs').responsiveTabs();

$(document).ready(function () {

  if (window.location.hash != "") {
    $(window.location.hash).click()
  }
  else { tabs.filter(':first').trigger('click'); }

});



$(window).load(function () {
  var userFeed = new Instafeed({
    get: 'user',
    userId: '235330573',
    clientId: '03f624bc12454fd5ac69518b4703860d',
    accessToken: '235330573.8f4c5bf.922eeabd72a341d899e5eb63b19cb683',
    resolution: 'low_resolution',
    template: '<a title="online marketing qatar" href="{{link}}" target="_blank" id="{{id}}"><img alt="web development, graphic design and branding" src="{{image}}" /></a>',
    sortBy: 'most-recent',
    limit: 6,
    links: false
  });
  userFeed.run();
});



$('.acrd').accord();

$('.accord-single').accord({
  openSingle: true,
});






