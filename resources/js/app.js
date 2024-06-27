import './bootstrap';
import 'bootstrap';
import './script.js';


var TxtRotate = function(el, toRotate, period) {
    this.toRotate = toRotate;
    this.el = el;
    this.loopNum = 0;
    this.period = parseInt(period, 10) || 2000;
    this.txt = '';
    this.tick();
    this.isDeleting = false;
  };
  
  TxtRotate.prototype.tick = function() {
    var i = this.loopNum % this.toRotate.length;
    var fullTxt = this.toRotate[i];
  
    if (this.isDeleting) {
      this.txt = fullTxt.substring(0, this.txt.length - 1);
    } else {
      this.txt = fullTxt.substring(0, this.txt.length + 1);
    }
  
    this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';
  
    var that = this;
    var delta = 300 - Math.random() * 100;
  
    if (this.isDeleting) { delta /= 2; }
  
    if (!this.isDeleting && this.txt === fullTxt) {
      delta = this.period;
      this.isDeleting = true;
    } else if (this.isDeleting && this.txt === '') {
      this.isDeleting = false;
      this.loopNum++;
      delta = 500;
    }
  
    setTimeout(function() {
      that.tick();
    }, delta);
  };
  
  window.onload = function() {
    var elements = document.getElementsByClassName('txt-rotate');
    for (var i=0; i<elements.length; i++) {
      var toRotate = elements[i].getAttribute('data-rotate');
      var period = elements[i].getAttribute('data-period');
      if (toRotate) {
        new TxtRotate(elements[i], JSON.parse(toRotate), period);
      }
    }

  
  };

 


  $(window).scroll(function(e){parallaxScroll();});
	function parallaxScroll(){
		var scrolled = $(window).scrollTop();
		$('.y1').css({'transform': 'translate3d(0,' + scrolled * -0.15 + 'px, 0)'});
		$('.y2').css({'transform': 'translate3d(0,' + scrolled * -0.25 + 'px, 0)'});
		$('.y3').css({'transform': 'translate3d(0,' + scrolled * -0.3 + 'px, 0)'});
		$('.y4').css({'transform': 'translate3d(0,' + scrolled * -0.4 + 'px, 0)'});
		$('.y5').css({'transform': 'translate3d(0,' + scrolled * -0.5 + 'px, 0)'});
		$('.y6').css({'transform': 'translate3d(0,' + scrolled * -0.6 + 'px, 0)'});
	};
