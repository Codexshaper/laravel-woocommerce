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

# Example for Product

#Retrieve Product(s)
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
#Create new Product
```
// For Simple Product
$data = [
    'name'              => 'Simple Product', // Product Name or Title
    'type'              => 'simple', // Product type simple|variable
    'regular_price'     => '100', // Regular Price
    'sale_price'        => '', // Price after offer
    'description'       => 'Product Description', // Product Long Description
    'short_description' => 'Product Short Description', // Product Short Description
    // Set Categories as an array
    'categories'        => [
        [
            'id' => 1,
        ],
        [
            'id' => 3,
        ],
    ],
    // Set thumnail images as an array
    'images'            => [
        [
            'src' => 'http://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2013/06/T_2_front.jpg',
        ],
        [
            'src' => 'http://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2013/06/T_2_back.jpg',
        ],
    ],
];

// For Variable Product
$data = [
            'name'               => 'Variable Product', // Product Name pr Title
            'type'               => 'variable', // Product Type simple|variable
            'description'        => 'Product Description', // Product Long Description
            'short_description'  => 'Product Summery', // Product Short Description
            // Product Categories
            'categories'         => [
                [
                    'id' => 9,
                ],
                [
                    'id' => 14,
                ],
            ],
            // Product images
            'images'             => [
                [
                    'src' => 'http://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2013/06/T_4_front.jpg',
                ],
                [
                    'src' => 'http://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2013/06/T_4_back.jpg',
                ],
                [
                    'src' => 'http://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2013/06/T_3_front.jpg',
                ],
                [
                    'src' => 'http://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2013/06/T_3_back.jpg',
                ],
            ],
            // Product Attributes
            'attributes'         => [
                [
                    'id'        => 6,
                    'position'  => 0,
                    'visible'   => false,
                    'variation' => true,
                    'options'   => [
                        'Black',
                        'Green',
                    ],
                ],
                [
                    'name'      => 'Size',
                    'position'  => 0,
                    'visible'   => true,
                    'variation' => true,
                    'options'   => [
                        'S',
                        'M',
                    ],
                ],
            ],
            // Set Default attributes
            'default_attributes' => [
                [
                    'id'     => 6,
                    'option' => 'Black',
                ],
                [
                    'name'   => 'Size',
                    'option' => 'S',
                ],
            ],
        ];


$product = Product::create($data);
```
#Update existing Product
```

```
#Example for Order

```
use Codexshaper\WooCommerce\Facades\Order;

public function orders()
{
  $orders = Order::all();
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
