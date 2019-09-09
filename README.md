# laravel-woocommerce
WooCommerce Rest API with Laravel

#Install

```
composer require codexshaper/woocommerce
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
# Do you need any help to create your own API credentials? Read the officials Doc https://docs.woocommerce.com/document/woocommerce-rest-api/

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
  return Order::all();
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
