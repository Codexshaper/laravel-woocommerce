# Laravel Woocommerce
WooCommerce Rest API for Laravel. You can Get, Create, Update and Delete your woocommerce product using this package easily.

#Install

```
composer require codexshaper/laravel-woocommerce
```

#Publish config file

```
php artisan vendor:publish --tag=woocommerce
```

#Add API credentials in your ```.env``` file

```
WOOCOMMERCE_STORE_URL=YOUR_WEBSITE_URL
WOOCOMMERCE_CONSUMER_KEY=API_CONSUMER_KEY
WOOCOMMERCE_CONSUMER_SECRET=API_CONSUMER_SECRET
```
#Do you need any help to create your own API credentials? Read the officials Doc https://docs.woocommerce.com/document/woocommerce-rest-api/

#Example for Product

```
use Codexshaper\WooCommerce\Facades\Product;

public function products()
{
  return Product::all();
}

public function product( Request $request )
{
  $product = Product::find($request->id);
}
```

#Example for Order

```
use Codexshaper\WooCommerce\Facades\Order;

public function orders()
{
  $orders = Order::all();
  // Pass options as an array
  $orders = Order::all(['status' => 'processing']);
  // Call Custom query with WHERE clause
  $orders = Order::where(['status' => 'processing'])->get();
}

public function order( Request $request )
{
  $order = Order::find($request->id);
}
```

#Example for Customer

```
use Codexshaper\WooCommerce\Facades\Customer;

public function customers()
{
  return Customer::all();
}

public function customer( Request $request )
{
  $customer = Customer::find($request->id);
}

```

# Eloquent Style for Product, Customer and Order

```
// Where passing multiple parameters
$orders = Order::where('status', 'publishing')->get();
$orders = Order::where('total', '>=', 10)->get();

// Where passing an array
$orders = Order::where(['status' => 'processing']);
$orders = Order::where(['status' => 'processing', 'orderby' => 'id', 'order' => 'asc'])->get();

// Order with where
$orders = Order::where('total', '>=', 10)->orderBy('id', 'asc')->get();

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
use WooCommerce instead of Codexshaper\WooCommerce\Facades\WooCommerce;
use Customer instead of Codexshaper\WooCommerce\Facades\Customer;
use Order instead of Codexshaper\WooCommerce\Facades\Order;
use Product instead of Codexshaper\WooCommerce\Facades\Product;
```
