### WordPress MVC Plugin Boilerplate

#### A WordPress plugin boilerplate made with PS4 autoloading and MVC design pattern in mind. 

Original boilerplate code was made with https://wppb.me/, but changes made to accommodate MVC design pattern and PSR4 autoloading. Some additional tools for WordPress, PHP and JS development were added.

There might be more replacements to be done to get all placeholder text changed but I've tried to list all of them below. Feel free to submit a pull request for any changes.


### Steps

#### Composer

Run `composer install`

#### NPM

Run `npm install`

#### Replacements:

- Add relevant info to package.json

#### Search and replaces (case sensitive):

- Replace 'our_plugin_name' with Plugin name
- Replace 'text-domain' with plugin text domain
- Replace 'PREFIX' with a prefix for constants
- Replace 'prefix' with a lowercase version of the plugin name example `myplugin` etc. USE UNDERSCORES for the sparation example `my_plugin`
- Replace 'prefix' in file name for activator and deactivator classes located in `/includes` with a lowercase version of the plugin name example wcdpue, prefix etc
- Replace 'Root' with a shortname for plugin example `Myplugin` etc (You need to run `composer dumpautoload` after making this change to refresh autoload file with correct details.)
- Replace 'plugin_author_name' with your name name,
- Replace 'plugin_author_url' with your website,
- Replace 'plugin_author_email' with your email address
