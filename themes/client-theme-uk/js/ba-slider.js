jQuery(function($) {
  $('.ba-Slider').each(function() {
    var $slider = $(this);
    var $before = $slider.find('#before');
    var $after = $slider.find('#after');
    var $handle = $slider.find('.slider2');
    var dragging = false;

    function setSlider(percent) {
      percent = Math.max(0, Math.min(percent, 100));
      $before.css('width', percent + '%');
      $handle.css('left', percent + '%');
    }

    function getPercentFromX(x) {
      var offset = $slider.offset().left;
      var width = $slider.width();
      var pos = Math.max(0, Math.min(x - offset, width));
      return (pos / width) * 100;
    }

    // Initialize at 50%
    setSlider(50);

    function startDrag(e) {
      dragging = true;
      e.preventDefault();
    }

    function stopDrag() {
      dragging = false;
    }

    function onDrag(e) {
      if (!dragging) return;
      var pageX;
      if (e.type.startsWith('touch')) {
        pageX = e.originalEvent.touches[0].pageX;
      } else {
        pageX = e.pageX;
      }
      setSlider(getPercentFromX(pageX));
    }

    $handle.on('mousedown touchstart', startDrag);
    $(document).on('mousemove touchmove', onDrag);
    $(document).on('mouseup touchend', stopDrag);

    // Responsive: reset to 50% on resize
    $(window).on('resize orientationchange', function() {
      setSlider(50);
    });
  });
});