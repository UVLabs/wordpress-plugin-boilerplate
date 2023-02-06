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

#### Search and replaces (ALL SEARCHES SHOULD BE CASE SENSITIVE):

- Replace 'my_plugin_name' with the Plugin name example Awesome WordPress Plugin (exact match [whole word])

- Replace 'my_plugin_shortname' with a short lowercase version of the plugin name example awesomewpplugin (exact match [whole word])

- Replace 'text-domain' with plugin text domain (exact match [whole word])

- Replace 'PREFIX' with a prefix for constants (loose match)

- Replace 'prefix_' with a lowercase version of the plugin name example `myplugin_` etc. USE UNDERSCORES for the sparation example `my_plugin_` (loose match)

- Replace 'prefix-' with a lowercase version of the plugin name example `myplugin-` etc. USE DASHES for the sparation example `my-plugin-` (exact match [whole word])

- Replace 'prefix' in file name for activator and deactivator classes located in `/includes` with a lowercase version of the plugin name, example `myplugin`. USE DASHES for the sparation example `my-plugin-`

- Replace 'prefix' in file name for your asset files located in `/assets` with a lowercase version of the plugin name, example `myplugin`. USE DASHES for the sparation example `my-plugin-`

- Replace prefix.zip with the name for your dist file that will be created when you run `composer dist` example `myplugin.zip`

- Replace 'Root' with a shortname for plugin example `Myplugin`. This is used as your namespace prefix. (You need to run `composer dumpautoload` after making this change to refresh autoload file with correct details.) (loose match)

- Replace 'plugin_author_name' with your name name, (exact match [whole word])

- Replace 'plugin_author_url' with your website, (exact match [whole word])

- Replace 'plugin_author_email' with your email address (exact match [whole word])
