/**
 * Load all SVG icons for sprite.svg
 *
 * Icon usage example:
 *
 * <svg width="18" height="18">
 *   <use xlink:href="/assets/images/icons.svg#icon-search"></use>
 * </svg>
 */
require.context('../images/icons/?sprite', false, /\.svg$/);
