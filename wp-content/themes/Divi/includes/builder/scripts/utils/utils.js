/**
 * IMPORTANT: Keep external dependencies as low as possible since this utils might be
 * imported by various frontend scripts; need to keep frontend script size low
 */

// External dependencies
import $ from 'jquery';

// Internal dependencies
import { top_window } from '@core/admin/js/frame-helpers';

/**
 * Check current page's builder Type
 *
 * @since ??
 *
 * @param {string} builderType fe|vb|bfb|tb|lbb|lbp
 *
 * @return {bool}
 */
export const isBuilderType = builderType => builderType === window.et_builder_utils_params.builderType;

/**
 * Return condition value
 *
 * @since ??
 *
 * @param {string} conditionName
 *
 * @return {bool}
 */
export const is = conditionName => window.et_builder_utils_params.condition[conditionName];

/**
 * Is current page Frontend
 *
 * @since ??
 *
 * @type {bool}
 */
export const isFE = isBuilderType('fe');

/**
 * Is current page Visual Builder
 *
 * @since ??
 *
 * @type {bool}
 */
export const isVB = isBuilderType('vb');

/**
 * Is current page BFB / New Builder Experience
 *
 * @since ??
 *
 * @type {bool}
 */
export const isBFB = isBuilderType('bfb');

/**
 * Is current page Theme Builder
 *
 * @since ??
 *
 * @type {bool}
 */
export const isTB = isBuilderType('tb');

/**
 * Is current page Layout Block Builder
 *
 * @type {bool}
 */
export const isLBB = isBuilderType('lbb');

/**
 * Is current page uses Divi Theme
 *
 * @since ??
 *
 * @type {bool}
 */
export const isDiviTheme = is('diviTheme');

/**
 * Is current page uses Extra Theme
 *
 * @since ??
 *
 * @type {bool}
 */
export const isExtraTheme = is('extraTheme');

/**
 * Is current page Layout Block Preview
 *
 * @since ??
 *
 * @type {bool}
 */
export const isLBP = isBuilderType('lbp');

/**
 * Check if current window is block editor window (gutenberg editing page)
 *
 * @since ??
 *
 * @type {bool}
 */
export const isBlockEditor = $(top_window.document).find('.edit-post-layout__content').length > 0;

/**
 * Check if current window is builder window (VB, BFB, TB, LBB)
 *
 * @since ??
 *
 * @type {bool}
 */
export const isBuilder = ['vb', 'bfb', 'tb', 'lbb'].includes(window.et_builder_utils_params.builderType);

/**
 * Get offsets value of all sides
 *
 * @since ??
 *
 * @param {object} $selector jQuery selector instance
 * @param {number} height
 * @param {number} width
 *
 * @return {object}
 */
export const getOffsets = ($selector, width = 0, height = 0) => {
  // Return previously saved offset if sticky tab is active; retrieving actual offset contain risk
  // of incorrect offsets if sticky horizontal / vertical offset of relative position is modified.
  const isStickyTabActive = isBuilder && $selector.hasClass('et_pb_sticky') && 'fixed' !== $selector.css('position');

  if (isStickyTabActive) {
    return $selector.data('et-offsets');
  }

  // Get top & left offsets
  const offsets = $selector.offset();

  // If no offsets found, return empty object
  if ('undefined' === typeof offsets) {
    return {};
  }

  // FE sets the flag for sticky module which uses transform as classname on module wrapper while
  // VB, BFB, TB, and LB sets the flag on CSS output's <style> element because it can't modify
  // its parent. This compromises avoids the needs to extract transform rendering logic
  const hasTransform = isBuilder ?
    $selector.children('.et-fb-custom-css-output[data-sticky-has-transform="on"]').length > 0 :
    $selector.hasClass('et_pb_sticky--has-transform');

  let top  = 'undefined' === typeof offsets.top ? 0 : offsets.top;
  let left = 'undefined' === typeof offsets.left ? 0 : offsets.left;

  // If module is sticky module that uses transform, its offset calculation needs to be adjusted
  // because transform tends to modify the positioning of the module
  if (hasTransform) {
    // Calculate offset (relative to selector's parent) AFTER it is affected by transform
    // NOTE: Can't use jQuery's position() because it considers margin-left `auto` which causes issue
    // on row thus this manually calculate the difference between element and its parent's offset
    // @see https://github.com/jquery/jquery/blob/1.12-stable/src/offset.js#L149-L155
    const parentOffsets    = $selector.parent().offset();

    const transformedPosition = {
      top: offsets.top - parentOffsets.top,
      left: offsets.left - parentOffsets.left,
    };

    // Calculate offset (relative to selector's parent) BEFORE it is affected by transform
    const preTransformedPosition = {
      top: $selector[0].offsetTop,
      left: $selector[0].offsetLeft,
    }

    // Update offset's top value
    top = top + (preTransformedPosition.top - transformedPosition.top);
    offsets.top = top;

    // Update offset's left value
    left = left + (preTransformedPosition.left - transformedPosition.left);
    offsets.left = left;
  }

  // Manually calculate right & bottom offsets
  offsets.right  = left + width;
  offsets.bottom = top + height;

  // Save copy of the offset on element's .data() in case of scenario where retrieving actual
  // offset value will lead to incorrect offset value (eg. sticky tab active with position offset)
  $selector.data('et-offsets', offsets);

  return offsets;
}

/**
 * Increase EventEmitter's max listeners if lister count is about to surpass the max listeners limit
 * IMPORTANT: Need to be placed BEFORE `.on()`
 *
 * @since ??
 *
 * @param {EventEmitter} emitter
 * @param {string} EventName
 */
export const maybeIncreaseEmitterMaxListeners = (emitter, eventName) => {
  const currentCount = emitter.listenerCount(eventName);
  const maxListeners = emitter.getMaxListeners();

  if (currentCount === maxListeners) {
    emitter.setMaxListeners(maxListeners + 1);
  }
}

/**
 * Decrease EventEmitter's max listeners if listener count is less than max listener limit and above
 * 10 (default max listener limit). If listener count is less than 10, max listener limit will
 * remain at 10
 * IMPORTANT: Need to be placed AFTER `.removeListener()`
 *
 * @since ??
 *
 * @param {EventEmitter} emitter
 * @param {string} eventName
 */
export const maybeDecreaseEmitterMaxListeners = (emitter, eventName) => {
  const currentCount = emitter.listenerCount(eventName);
  const maxListeners = emitter.getMaxListeners();

  if (maxListeners > 10) {
    emitter.setMaxListeners(currentCount);
  }
}

/**
 * Expose frontend (FE) component via global object so it can be accessed and reused externally
 * Note: window.ET_Builder is for builder app's component; window.ET_FE is for frontend component
 *
 * @since ??
 *
 * @param {string} type
 * @param {string} name
 * @param {mixed} component
 */
export const registerFrontendComponent = (type, name, component) => {
  // Make sure that ET_FE is available
  if ('undefined' === typeof window.ET_FE) {
    window.ET_FE = {};
  }

  if ('object' !== typeof window.ET_FE[type]) {
    window.ET_FE[type] = {};
  }

  window.ET_FE[type][name] = component;
}
