### [WordPress MVC Plugin Boilerplate](https://github.com/UVLabs/wordpress-plugin-boilerplate)

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

- Replace 'PREFIX' with a prefix for constants (loose match, case sensitive)

- Replace 'prefix_' with a lowercase version of the plugin name example `myplugin_` etc. USE UNDERSCORES for the sparation example `my_plugin_` (loose match, case sensitive)

- Replace 'prefix-' with a lowercase version of the plugin name example `myplugin-` etc. USE DASHES for the sparation example `my-plugin-` (exact match [whole word], case sensitive)

- Replace 'root' in file name for activator and deactivator classes located in `/includes` with a lowercase version of the plugin name, example `myplugin`. USE DASHES for the sparation example `my-plugin-`

- Replace 'prefix' in file name for your asset files located in `/assets` with a lowercase version of the plugin name, example `myplugin`. USE DASHES for the sparation example `my-plugin-`

- Open `dist.sh` in the `bin` folder and replace prefix.zip with the name for your dist file that will be created when you run `composer dist` example `myplugin.zip`

- Replace 'Root' with a shortname for plugin example `Myplugin`. This is used as your namespace prefix. (exact match, whole word)

You need to run `composer dumpautoload` after making this change to refresh autoload file with correct details.

- Replace 'plugin_author_name' with your name, (exact match [whole word])

- Replace 'plugin_author_url' with your website, (exact match [whole word])

- Replace 'plugin_author_email' with your email address (exact match [whole word])

- Replace `SL_DEV_DEBUGGING` with a constant of your choice. This constant should be defined as true in your local wp install's `wp-config.php` file where you work on the plugin. It is used to set the plugin's main debug constant as true and loads the unminified JS of the plugin while working in your local environment. 

### Note

If deploying plugin from github then remove the following lines from the `.gitignore` file:

<pre>
assets/admin/js/build/
assets/public/js/build/
</pre>

These are the build files for your JS and should be committed if you're deploying the plugin from github using a plugin like Git Updater.