class MobileMenu {
    constructor() {
        this.DOM = {};
        this.DOM.btn = document.querySelector('.mobile-menu__btn');
        this.DOM.menu = document.querySelector('.mobile-menu');
        this.DOM.header = document.querySelector('.header');
        this.eventType = this._getEventType();
        this._addEvent();
    }

    _getEventType() {
        return window.ontouchstart ? 'touchstart' : 'click';
    }r

    _toggle() {
        this.DOM.header.classList.toggle('menu-open');
        this.DOM.menu.classList.toggle('menu-open');
    }

    _addEvent() {
        this.DOM.btn.addEventListener(this.eventType, this._toggle.bind(this));
        this.DOM.menu.addEventListener(this.eventType, this._toggle.bind(this));
    }
}

new MobileMenu();


'use strict';

{
  const target = document.querySelector('#CONTACT');
 

  function callback(entries) {
    console.log(entries[0]);

    if (!entries[0].isIntersecting) {
      return;
    }

    entries[0].target.classList.add('appear');

    // if (entries[0].isIntersecting) {
    //   entries[0].target.classList.add('appear');
    // } else {
    //   entries[0].target.classList.remove('appear');
    // }
  }

  const options = {
    threshold: 0.5,
  }

  const observer = new IntersectionObserver(callback, options);

  observer.observe(target);
}


{
    const target = document.querySelector('.about-section');
   
  
    function callback(entries) {
      console.log(entries[0]);
  
      if (!entries[0].isIntersecting) {
        return;
      }
  
      entries[0].target.classList.add('appear');
  
      // if (entries[0].isIntersecting) {
      //   entries[0].target.classList.add('appear');
      // } else {
      //   entries[0].target.classList.remove('appear');
      // }
    }
  
    const options = {
      threshold: 0.5,
    }
  
    const observer = new IntersectionObserver(callback, options);
  
    observer.observe(target);
  }
  

