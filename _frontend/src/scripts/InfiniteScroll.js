class InfiniteScroll {
  constructor(container, options = {}) {
    this.container = container;
    this.speed = options.speed || 1;
    this.childLength = this.elements.length;
  }

  get elements() {
    return this.container.children;
  }

  get positions() {
    return this.isVertical
      ? Array.from(this.elements).map((el) => el.offsetTop + el.offsetHeight)
      : Array.from(this.elements).map((el) => el.offsetLeft + el.offsetWidth);
  }

  get anchor() {
    return this.elements.length > this.childLength
      ? this.elements[this.childLength]
      : this.elements[0];
  }

  // eslint-disable-next-line class-methods-use-this
  get isDesktop() {
    return matchMedia('(min-width: 1280px)').matches;
  }

  get isVertical() {
    return this.isDesktop;
  }

  scroll() {
    if (this.isVertical) {
      this.container.scrollTop += this.speed;
    } else {
      this.container.scrollLeft += this.speed;
    }
    requestAnimationFrame(this.scroll.bind(this));
  }

  cloneAll() {
    const firstN = Array.from(this.elements).slice(0, this.childLength);
    firstN.forEach((el) => this.container.appendChild(el.cloneNode(true)));
  }

  loop() {
    const firstN = Array.from(this.elements).slice(0, this.childLength);
    firstN.forEach((el) => this.container.removeChild(el));
    this.cloneAll();
  }

  checkScroll() {
    if (this.isVertical && this.container.scrollTop >= this.anchor.offsetTop) {
      this.loop();
      this.container.scrollTop = 0;
    }
    if (!this.isVertical && this.container.scrollLeft >= this.anchor.offsetLeft) {
      this.loop();
      this.container.scrollLeft = 0;
    }
  }

  init() {
    this.cloneAll();
    this.scroll();
    this.container.addEventListener('scroll', this.checkScroll.bind(this));
  }
}

export default InfiniteScroll;
