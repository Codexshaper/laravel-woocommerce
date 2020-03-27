[![License](http://img.shields.io/:license-mit-blue.svg?style=flat-square)](http://badges.mit-license.org)
[![Build Status](https://travis-ci.org/Codexshaper/laravel-woocommerce.svg?branch=master)](https://travis-ci.org/Codexshaper/laravel-woocommerce)
[![StyleCI](https://github.styleci.io/repos/180436811/shield?branch=master)](https://github.styleci.io/repos/180436811)
[![Quality Score](https://img.shields.io/scrutinizer/g/Codexshaper/laravel-woocommerce.svg?style=flat-square)](https://scrutinizer-ci.com/g/Codexshaper/laravel-woocommerce)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/Codexshaper/laravel-woocommerce.svg?style=flat-square)](https://packagist.org/packages/Codexshaper/laravel-woocommerce)

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

// Create a product using create() method
$product = Product::create($data);

// Create a product using save() method
$categories = [
    [
        'id' => 1,
    ],
    [
        'id' => 3,
    ],
];

$images = [
    [
        'src' => 'http://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2013/06/T_2_front.jpg',
    ],
    [
        'src' => 'http://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2013/06/T_2_back.jpg',
    ],
];

$product                    = new Product;
$product->name              = 'Product Eloquent 2';
$product->type              = 'simple';
$product->regular_price     = '100';
$product->sale_price        = '50';
$product->description       = 'Product Description';
$product->short_description = 'Product Short Description';
$product->categories        = $categories;
$product->images            = $images;
$product->save();
```
#Update existing Product

```
$product_id = 40;
$data       = [
    'regular_price' => '50',
    'sale_price'    => '25', // 50% off
];

$product = Product::update($product_id, $data);
```

#Delete a Product

```
$product_id = 40;

$options = ['force' => true]; // Set force option true for delete permanently. Default value false

$product = Product::delete($product_id, $options);
```

# Example for Order

#Create Order

```
$data = [
    'payment_method'       => 'bacs',
    'payment_method_title' => 'Direct Bank Transfer',
    'set_paid'             => true,
    'billing'              => [
        'first_name' => 'John',
        'last_name'  => 'Doe',
        'address_1'  => '969 Market',
        'address_2'  => '',
        'city'       => 'San Francisco',
        'state'      => 'CA',
        'postcode'   => '94103',
        'country'    => 'US',
        'email'      => 'john.doe@example.com',
        'phone'      => '(555) 555-5555',
    ],
    'shipping'             => [
        'first_name' => 'John',
        'last_name'  => 'Doe',
        'address_1'  => '969 Market',
        'address_2'  => '',
        'city'       => 'San Francisco',
        'state'      => 'CA',
        'postcode'   => '94103',
        'country'    => 'US',
    ],
    'line_items'           => [
        [
            'product_id' => 40,
            'quantity'   => 2,
        ],
        [
            'product_id'   => 127,
            'variation_id' => 23,
            'quantity'     => 1,
        ],
    ],
];

$order = Order::create($data);
```

#Retrieve Order(s)

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

#Update Order

```
$order_id = 173;
$data     = [
    'status' => 'completed',
];

$order = Order::update($order_id, $data);
```

#Delete an order

```
$order_id = 173;
$options = ['force' => true]; // Set force option true for delete permanently. Default value false

$order = Order::delete($order_id, $options);
```

#Create a note for a specific order

```
$order_id = 172;
$data = [
    'note' => 'Add your note',
];
$createNote = Order::createNote($order_id, $data);
```

#Get a note for sepcific order

```
$order_id = 172;
$note_id  = 67;

$note = Order::note($order_id, $note_id);
```

#Get all notes for sepcific order

```
$order_id = 172;
$options = [];
$notes = Order::notes($order_id, $options);
```

#Delete a note for sepcific order

```
$order_id = 172;
$note_id  = 67;
$options = [];

$note = Order::deleteNote($order_id, $note_id, $options);
```

#Create a Refund for a specific order

```
$order_id = 172;
$data = [
    'amount' => '10'
];
$createNote = Order::createRefund($order_id, $data);
```

#Get Refund for sepcific order

```
$order_id = 172;
$refund_id  = 117;

$refund = Order::refund($order_id, $refund_id);
```

#Get all Refunds for sepcific order

```
$order_id = 172;
$options = [];
$refunds = Order::refunds($order_id, $options);
```

#Delete Refund for sepcific order

```
$order_id = 172;
$refund_id  = 67;
$options = [];

$refund = Order::deleteRefund($order_id, $refund_id, $options);
```

# Example for Customer

#Create Customer

```
$data = [
    'email'      => 'john.doe@example.com',
    'first_name' => 'John',
    'last_name'  => 'Doe',
    'username'   => 'john.doe',
    'billing'    => [
        'first_name' => 'John',
        'last_name'  => 'Doe',
        'company'    => '',
        'address_1'  => '969 Market',
        'address_2'  => '',
        'city'       => 'San Francisco',
        'state'      => 'CA',
        'postcode'   => '94103',
        'country'    => 'US',
        'email'      => 'john.doe@example.com',
        'phone'      => '(555) 555-5555',
    ],
    'shipping'   => [
        'first_name' => 'John',
        'last_name'  => 'Doe',
        'company'    => '',
        'address_1'  => '969 Market',
        'address_2'  => '',
        'city'       => 'San Francisco',
        'state'      => 'CA',
        'postcode'   => '94103',
        'country'    => 'US',
    ],
];
$customer = Customer::create($data);
```

#Retreive Customer(s)

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
#Update Customer

```
$customer_id = 2;
$data        = [
    'first_name' => 'James',
    'billing'    => [
        'first_name' => 'James',
    ],
    'shipping'   => [
        'first_name' => 'James',
    ],
];

$customer = Customer::update($customer_id, $data);
```

#Delete Customer

```
$customer_id = 2;
$options     = ['force' => true]; // Set force option true for delete permanently. Default value false

$customer = Customer::delete($customer_id, $options);
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
use WooCommerce // Same as use Codexshaper\WooCommerce\Facades\WooCommerce;
use Customer // Same as use Codexshaper\WooCommerce\Models\Customer;
use Order // Same as use Codexshaper\WooCommerce\Models\Order;
use Product // Same as Codexshaper\WooCommerce\Models\Product;
```
