# Bellan
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](https://opensource.org/licenses/MIT)
![GitHub Workflow Status](https://github.com/viktigpetterr/bellan/actions/workflows/php.yml/badge.svg)
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
 - Create a restaurant class that extends `Restaurant.php` in `src/Restaurant`.
 - Implement the functions `parse()` and `__toString()`.
 - Create a test class that extends `RestaurantTest.php` in `tests/Restaurant`.
 - Implement the test functions `testParse()` and `testToString()`. Add a static test file in `tests/static` if needed.

**Run tests**
```sh
$  composer test
```
