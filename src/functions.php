<?php
/**
 * Common server-side variables and functions
 *
 * Usage (include this PHP file to use the variables and functions):
 *     <?php include $_SERVER['DOCUMENT_ROOT'] . '/src/functions.php'; ?>
 *     <?= render('layout.php', ['body' => 'Hello World!']) ?>
 *     <!-- <?= $var ?> is a shortcut for <?php echo $var; ?> -->
 *     <!-- <?= test() ?> is a shortcut for <?php echo test(); ?> -->
 */

/**
 * All the view template files will include this file, hence need to check if
 * this variable exists when including other view template files.
 */
if (!isset($sharedTemplateVariables)) {
    /**
     * Shared template variables that are passed to all views
     *
     * Modify this as needed. To access in view template, just use the variable
     * name, e.g. `echo $user['name'];`.
     *
     * @var array
     */
    $sharedTemplateVariables = [
        /** @var bool Whether the query param `admin=1` is set in the url. */
        'isAdmin' => (1 === intval($_GET['admin'] ?? 0)) ? true : false,

        /** @var array Record for current logged in user. */
        'user' => [
            'id' => 1,
            'name' => 'elePHPant',
        ]
    ];

    extract($sharedTemplateVariables); // extract only the 1st time that this file is included
}

/**
 * All the view template files will include this file, hence need to check if
 * this function exists when including other view template files.
 */
if (!function_exists('render')) {
    /**
     * Render HTML from view template with specified template variables
     *
     * Do not modify this function.
     *
     * @param string viewPath Path to view template file, relative to root directory of web server.
     * @param array templateVariables Template variables to pass to view template.
     * @return void
     */
    function render($viewPath, $templateVariables = [])
    {
        // Import template variables as PHP variables so that they can be accessed directly by
        // their variable names in the view template, e.g. `echo $renderId;` instead of
        // `echo $vars['renderId'];`
        $resolvedTemplateVars = array_merge(
            $templateVariables ?? [],
            [
                /** @var string 20-char random identifier for HTML "data-render-id" attribute. */
                'renderId' => strval(round(microtime(true) * 1000) . '-' . rand(100000, 999999)),
            ]
        );
        extract($resolvedTemplateVars);

        // As https://www.php.net/manual/en/function.include.php indicates, the code in this
        // included file inherits the variable scope where include() is called, in this case inside
        // this function. Variables with the same name outside render() will not be affected, e.g.:
        //     $body = 'hello';
        //     render('view.php', ['body' => 'bye']); // "bye" is rendered
        //     echo $body; // "hello" is rendered
        include $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $viewPath;
    }
}
