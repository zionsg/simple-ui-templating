<?php
/**
 * Common server-side variables and functions
 *
 * Usage (include this PHP file to use the variables and functions):
 *     <?php include $_SERVER['DOCUMENT_ROOT'] . '/src/functions.php'; ?>
 *     <?php echo $user['name']; ?><br>
 *     <div data-render-id="<?php echo getRandomId('view'); ?>"></div>
 */

/**
 * Record for current logged in user
 *
 * This is a sample variable that can be accessed once this file is included.
 *
 * PHP variables start with $. The type is an array as the syntax for accessing
 * its properties are similar to JavaScript/Node.js, e.g. $user['name'], unlike
 * the $user->name if the type is an object.
 *
 * @var array
 */
$user = [
    'id' => 1,
    'name' => 'Foo Bar',
    'username' => 'foo.bar',
    'role_name' => 'Admin',
];

/**
 * Generate random identifier for use in HTML "id" or "data-render-id" attributes
 *
 * @example getRandomId('container') yields "container-1647659109905-983747".
 * @param string $prefix Prefix will be prepended to result with "-".
 * @return string
 */
function getRandomId($prefix = '')
{
    // Random identifier without prefix is fixed at 20 chars
    return ($prefix ? "{$prefix}-" : '') . round(microtime(true) * 1000) . '-' . rand(100000, 999999);
}
