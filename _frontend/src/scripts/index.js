/**
 * Sprites are automatically generated using SVG files inside the `images/icons`
 * directory. Usage information can be found in the `sprites.js` file.
 *
 * If not using SVG sprites comment out the following lines.
 */
import 'svgxuse';
import './sprites';
import InfiniteScroll from './InfiniteScroll';

const reviewsContainer = document.querySelector('.reviews__container');

const reviews = new InfiniteScroll(reviewsContainer);

reviews.init();
