# [Simple UI Templating](https://github.com/zionsg/simple-ui-templating)

This simple project was done up to aid web designers in using templates for UI mockup webpages.
Typically, for a website with 20 pages, the designer may come up with 20 static HTML webpage files,
one for each page. Common HTML code such as stylesheets in `<head>`, navigation and forms are copied
and pasted across all webpages, making updating onerous.

One way would be to use templates, i.e. put the common HTML code into separate files and import them
into each webpage. That way, if there are any changes to the common HTML code, only the template
file needs to be updated, instead of updating all the copied/pasted code across all the webpages.

This, however, requires the use of [PHP](https://en.wikipedia.org/wiki/PHP).

## Why PHP?
- HTML Imports were introduced around 2013/2014, and allowed developers to import HTML templates,
  e.g. `<link rel="import" href="/path/to/imports/stuff.html">`, but have been deprecated and
  [removed from Chrome](https://chromestatus.com/feature/5144752345317376) since 2020. Read about
  how HTML Imports worked in
  [HTML Imports - #include for the web](https://www.html5rocks.com/en/tutorials/webcomponents/imports/).
- ES6 Script Modules are supposed to replace HTML Imports with a
  [HTML Modules](https://github.com/WICG/webcomponents/blob/gh-pages/proposals/html-modules-explainer.md)
  extension, but it's still [not available](https://chromestatus.com/feature/4854408103854080)
  as of 2022.
- The only way to use templates is to use server-side code to combine templates, since there is no
  client-side support. This involves running a local web server on the computer to serve the files.
  A variety of programming languages can be used, but by far, PHP is the easiest for a
  non-developer, i.e. the web designer, to install and use.
    + PHP: Has an in-built webserver, i.e. `php -S localhost:8080`. Has in-built templating as it
      was designed for web development, e.g. `<div><?= time() ?></div>`.
    + Node.js: Need to install NPM package in order to run a web server,
      e.g. `npm install -g http-server`. Need to install NPM package for the templating engine,
      e.g. `mustache`.
    + Python: Has an in-built webserver, i.e. `python3 -m http.server`. Need to install templating
      engine, e.g. `pip install Jinja2`.

## Installing PHP
- Windows:
    + Go to https://windows.php.net/download/
    + Download the zip file for the latest x64 thread safe version,
      e.g. https://windows.php.net/downloads/releases/php-8.1.4-Win32-vs16-x64.zip
    + Unzip the downloaded file, e.g. to `C:\Users\Me\Downloads\php` folder.
    + There may be the need to install the x64 version of the Visual C++ Redistributable for
      Visual Studio first. The link is provided on the left panel, e.g. https://aka.ms/vs/16/release/VC_redist.x64.exe
    + Open the command prompt by pressing Win + R and typing "cmd", or right-clicking the Start Menu
      button and typing "cmd".
    + Go to the folder where PHP is downloaded to and type "php --version"
      to see if it works.
- macOS:
    + PHP is bundled with macOS since macOS X (10.0.0) prior to macOS Monterey (12.0.0).
    + To install it, go to https://www.php.net/manual/en/install.macosx.packages.php and follow
      the instructions here.
    + Open the terminal by pressing Cmd + Space and typing "terminal".
    + Type "php --version" to see if it works.
- Linux / UNIX:
    + The instructions here use Ubuntu as an example.
    + Go to https://ubuntu.com/server/docs/programming-php and follow the instructions there.
    + Open the terminal. If using Ubuntu Desktop, press Ctrl + Alt + T.
    + Type "php --version" to see if it works.

## Usage
- Download the zip file for this repository by clicking on the "Code" button.
- Unzip the contents, e.g. to `C:\Users\Me\Downloads\demo` folder.
- Open the terminal or command prompt, go to the folder (e.g. `cd C:\Users\Me\Download\demo`) and
  type `php -S localhost:8080`. This folder is the root directory of the web server.
- Open the browser and type `http://localhost:8080`. You should see the index page.
- Look at the `.php` files in the root of the folder, e.g. `index.php`, to see how it works.
  Each PHP file corresponds to a page or template. Add or modify as needed.
- To generate static HTML webpages to pass to clients (so that they can view it without having to
  run a local web server):
    + Go to the browser and type `http://localhost:8080/src/generate-html.php`.
    + A new folder will be created. Try double-clicking on the generated `index.html` to open it
      in the browser and see if the static assets such as CSS and images are correctly linked.
