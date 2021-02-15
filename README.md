# Lunchtime

![Packagist Version](https://img.shields.io/packagist/v/viktigpetterr/lunchtime)
![Packagist License](https://img.shields.io/packagist/l/viktigpetterr/lunchtime)
![GitHub Workflow Status](https://img.shields.io/github/workflow/status/viktigpetterr/lunchtime/PHP%20Composer)

**Setup**
```sh
$ composer install
```

**How to add a restaurant**
 - Create restaurant class that extend `Restaurant.php` in `src/restaurants`.
 - Implement functions `parse()` and `__toString()`.
 - Create test class that extend `RestaurantTest.php` in `tests/restaurants`.
 - Implement test functions `testParse()` and `testToString()`. Add a static test file in `tests/static` if needed.

**Run tests**
```sh
$  composer test
```
