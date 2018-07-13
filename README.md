# DH01-PhpMvc

### (`http://dh01-phpmvc.test`)

## 1. `public/index.php`
* Set up error reporting and handling
* Use `Core\Router.php` to `add()` route formats, creating regular expressions for matching routes
  ```php
  { 
    ["/^$/i"] => { ["controller"] => "Home" ["action"] => "index" }
    ["/^(?P<controller>[a-z-]+)\/(?P<action>[a-z-]+)$/i"] => { }
    ["/^(?P<controller>[a-z-]+)\/(?P<id>\d+)\/(?P<action>[a-z-]+)$/i"] => { }
    ["/^admin\/(?P<controller>[a-z-]+)\/(?P<action>[a-z-]+)$/i"] => { ["namespace"] => "Admin" }
  }
  ```
* For example: `"posts/index"` route results in the following parameters
  ```php
  {
    [0] => "posts/index" 
    ["controller"] => "posts"
    [1] => "posts" 
    ["action"] => "index" 
    [2] => "index"
  }
  ```
* Use `Core\Router.php` to `dispatch()` the appropriate `class/method`

## 2. `Core\Controller.php`
* Class methods are appended with `"Action"` to hide their visibility
* When the `"index"` method is called, it does not exist in the `Posts` controller but `"indexAction"` does
* The `__call()` function is used to append `"Action"` and run `call_user_func_array()`

## 3. `Views\Posts\index.html`
* Uses `Twig` templating engine
* Data comes from `App\Controllers\Posts.php` which uses `App\Models\Post.php`

## 4. `Core\Error.php`
* Converts all errors to exceptions by throwing `ErrorException`
* If `Config::SHOW_ERRORS` is `true` (i.e. development mode) show error message in browser
* If `Config::SHOW_ERRORS` is `false` (i.e. production mode) log error message to file
