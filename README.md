# DH01-PhpMvc

### (`dh01-phpmvc.test`)

## 1. `public/index.php`
* Set up error reporting and handling
* Use `Core\Router.php` to `add()` route formats, creating regular expressions for matching routes
  ```php
  { 
    ["/^$/i"] => { ["controller"] => "Home" ["action"] => "index" }
    ["/^(?P[a-z-]+)\/(?P[a-z-]+)$/i"] => { }
    ["/^(?P[a-z-]+)\/(?P\d+)\/(?P[a-z-]+)$/i"] => { }
    ["/^admin\/(?P[a-z-]+)\/(?P[a-z-]+)$/i"] => { ["namespace"] => "Admin" }
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

