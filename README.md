# Bellan

![Packagist Version](https://img.shields.io/packagist/v/viktigpetterr/lunchtime)
![Packagist License](https://img.shields.io/packagist/l/viktigpetterr/lunchtime)
![GitHub Workflow Status](https://img.shields.io/github/workflow/status/viktigpetterr/lunchtime/PHP%20Composer)
[![codecov](https://codecov.io/gh/viktigpetterr/bellan/branch/main/graph/badge.svg?token=DPW9GSYHUK)](https://codecov.io/gh/viktigpetterr/bellan)

**Installation**
```sh
  $ git clone https://github.com/viktigpetterr/bellan.git
```
```sh
  $ cd bellan
```
```sh
  $ composer install
  ```
**How to add a restaurant**
 - Create a restaurant class that extends `Restaurant.php` in `src/restaurants`.
 - Implement the functions `parse()` and `__toString()`.
 - Create a test class that extends `RestaurantTest.php` in `tests/restaurants`.
 - Implement the test functions `testParse()` and `testToString()`. Add a static test file in `tests/static` if needed.

**Run tests**
```sh
$  composer test
```
