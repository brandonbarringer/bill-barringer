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
    return Array.from(this.elements).map((el) => el.offsetTop + el.offsetHeight);
  }

  get anchor() {
    return this.elements.length > this.childLength
      ? this.elements[this.childLength]
      : this.elements[0];
  }

  get offset() {
    return getComputedStyle(this.elements[0]).marginBottom;
  }

  scroll() {
    this.container.scrollTop += this.speed;
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
    if (this.container.scrollTop >= this.anchor.offsetTop) {
      this.loop();
      this.container.scrollTop = this.anchor.offsetTop + this.offset;
    }
  }

  init() {
    this.cloneAll();
    this.scroll();
    this.container.addEventListener('scroll', this.checkScroll.bind(this));
  }
}

export default InfiniteScroll;
