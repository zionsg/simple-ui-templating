/**
 * Common client-side utility functions
 *
 * Usage:
 *     <script src="/public/js/utils.js"></script> <!-- should be loaded in <head> to be available to all views -->
 *     <script>
 *         let colors = utils.getRandomColors();
 *     </script>
 */

var utils = (typeof utils !== 'undefined') ? utils : (function () {
    /**
     * Self reference - all public properties/methods are stored here & returned as public interface
     *
     * @public
     * @type {object}
     */
    const self = {};

    /** @type {int} Load timestamp. This is an example of a private variable, utils.timestamp will return undefined. */
    let timestamp = Date.now();

    /**
     * Generate random pair of foreground and background colors with enough contrast
     *
     * @public
     * @link Adapted from https://stackoverflow.com/a/11868159
     * @returns {object} Format:
     *     {
     *        foreground_color: <hex color code, either black or white},
     *        background_color: <hex color code>
     *     }
     */
    self.getRandomColors = function () {
        let rgb = [];
        rgb[0] = Math.round(Math.random() * 255);
        rgb[1] = Math.round(Math.random() * 255);
        rgb[2] = Math.round(Math.random() * 255);

        // See http://www.w3.org/TR/AERT#color-contrast
        let brightness = Math.round((rgb[0] * 299) + (rgb[1] * 587) + (rgb[2] * 114)) / 1000;
        let foregroundColor = (brightness > 125) ? '#000000' : '#ffffff';

        let backgroundColor = '#';
        rgb.forEach((decimal) => {
            let hex = decimal.toString(16);
            backgroundColor += (hex.length !== 2) ? '0' + hex : hex;
        });

        return {
            foreground_color: foregroundColor,
            background_color: backgroundColor,
        };
    };

    // Return public interface of IIFE
    return self;
})();
