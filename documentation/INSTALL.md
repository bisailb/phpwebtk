Requirements:

phpwebtk requires PHP 5.0.0 or later.

Required Dependencies:

* Use the latest stable versions of ADOdb, Kses, Smarty and compile PHP
  with support for Libmcrypt and Libmhash. This will ensure that all
  classes can function properly. Otherwise, if you wish to remove
  dependencies, beware that this can break some of the code but you can
  always rework the code to suit your own specific needs.

Optional Dependencies:

* Use the latest version of CKeditor if you would like to use the
  WYSIWYG editor replacement for text area form fields. It works with
  any server-side software.

Quick Installation:

* Copy the entire "phpwebtk" directory to a directory that is in your
  server root. For example, Apache's ServerRoot might be /var/www.

* Edit the CLASS_PATH in the "constants.php" file as appropriate. If you
  change the location of the "configuration" directory, be sure to
  update the CONFIG_FILE and SCHEMA_FILE constants in the
  "constants.php" file as well.

* If you change the location of Smarty, be sure to update the SMARTY_DIR
  constant. Don't forget the classes are located in the "libs" directory
  under the "smarty" directory.

* If you change the location of ADOdb, Kses, or both, be sure to update
  the list of required dependencies with the absolute path for
  adodb.inc.php and/or the Kses OOP version (i.e. php5.class.kses.php).

* To disable the "Run SQL" link for the web-based user interface for
  performance monitoring that is provided with ADOdb, edit the
  ADODB_PERF_NO_SQL constant. It is a boolean value of 0 or 1.

* Read the comments in the "phpwebtk.xsd" file to learn about what
  parameters you can modify in the "phpwebtk.xml" file. The comments
  should help you quite easily understand what they could be used for.
  Additionally, consult the documentation in the "php.ini" file for
  more information about some of the PHP-specific options.

* Ensure that the "sessions" directory is in a proper location. I
  suggest that you modify the "phpwebtk.xml" file's "<savePath>" to
  specify an absolute path. I do not recommend /tmp because it is a
  world-readable directory. Finally, I recommend that your "<savePath>"
  be located outside your web server's document root to ensure that no
  one can view the contents of the session files.

* Make sure to include the "constants.php" file before any autoload
  functions (that is if you chose to use autoload) just like in the
  test scripts in the "testscripts" directory. If you want to use the
  test scripts, copy them to your web server's document root
  temporarily and delete them aftewards when you longer need them.
  Finally, you should run the createkeys.php test script at least once
  to generate unique crypt, hash and hmac keys for your instance.

Technical Note:

* If you do not have access to the php.ini file, you can change
  non-server settings (such as your include_path) with the ini_set()
  command. Example: ini_set("include_path",".:/usr/local/lib/php");