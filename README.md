[![License](http://img.shields.io/:license-mit-blue.svg?style=flat-square)](http://badges.mit-license.org)
[![Build Status](https://travis-ci.org/Codexshaper/laravel-woocommerce.svg?branch=master)](https://travis-ci.org/Codexshaper/laravel-woocommerce)
[![StyleCI](https://github.styleci.io/repos/180436811/shield?branch=master)](https://github.styleci.io/repos/180436811)
[![Quality Score](https://img.shields.io/scrutinizer/g/Codexshaper/laravel-woocommerce.svg?style=flat-square)](https://scrutinizer-ci.com/g/Codexshaper/laravel-woocommerce)
[![Downloads](https://poser.pugx.org/Codexshaper/laravel-woocommerce/d/total.svg)](https://packagist.org/packages/Codexshaper/laravel-woocommerce)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/Codexshaper/laravel-woocommerce.svg?style=flat-square)](https://packagist.org/packages/Codexshaper/laravel-woocommerce)

# Description
WooCommerce Rest API for Laravel. You can Get, Create, Update and Delete your woocommerce product using this package easily.

[Documentation](https://codexshaper.github.io/docs/laravel-woocommerce/)

## Authors

* **Md Abu Ahsan Basir** - [github](https://github.com/maab16)

## License

- **[MIT license](http://opensource.org/licenses/mit-license.php)**
- Copyright 2020 © <a href="https://github.com/Codexshaper/laravel-woocommerce/blob/master/LICENSE" target="_blank">CodexShaper</a>.

# Eloquent Style for Product, Customer and Order

```
// Where passing multiple parameters
$products = Product::where('title','hello')->get();
OR
// You can call field with where clause
$products = Product::whereTitle('hello')->get();
// Fields name are more than one words or seperate by underscore (_). For example field name is `min_price`
$products = Product::whereMinPrice(5)->get();

// Where passing an array
$orders = Order::where(['status' => 'processing']);
$orders = Order::where(['status' => 'processing', 'orderby' => 'id', 'order' => 'asc'])->get();

// Set Options
$orders = Order::options(['status' => 'processing', 'orderby' => 'id', 'order' => 'asc'])->get();

// You can set options by passing an array when call `all` method
$orders = Order::all(['status' => 'processing', 'orderby' => 'id', 'order' => 'asc']);
```
#Product Options: https://woocommerce.github.io/woocommerce-rest-api-docs/#products

#Customer Options: https://woocommerce.github.io/woocommerce-rest-api-docs/#customers

#Order Options: https://woocommerce.github.io/woocommerce-rest-api-docs/#orders

# You can also use ```WooCommerce``` Facade

```
use Codexshaper\WooCommerce\Facades\WooCommerce;

public function products()
{
  return WooCommerce::all('products');
}

public function product( Request $request )
{
  $product = WooCommerce::find('products/'.$request->id);
}

public function orders()
{
  return WooCommerce::all('orders');
}

public function order( Request $request )
{
  $order = WooCommerce::all('orders/'.$request->id);
}

public function customers()
{
  return WooCommerce::all('customers');
}

public function customer( Request $request )
{
  $customer = WooCommerce::all('customers/'.$request->id);
}
```

# Use Facade Alias

```
use WooCommerce // Same as use Codexshaper\WooCommerce\Facades\WooCommerce;
use Customer // Same as use Codexshaper\WooCommerce\Models\Customer;
use Order // Same as use Codexshaper\WooCommerce\Models\Order;
use Product // Same as Codexshaper\WooCommerce\Models\Product;
```
