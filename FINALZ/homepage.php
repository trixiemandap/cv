<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the form data
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $street_address = $_POST['street_address'];
    $city = $_POST['city'];
    $payment_method = $_POST['payment_method'];

    // Validate and sanitize the data if needed

    // Connect to the database (replace with your database credentials)
    $conn = mysqli_connect('localhost', 'root', '', 'finals');

    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    }

    // Set the timezone to "Asia/Manila"
    date_default_timezone_set("Asia/Manila");

    // Get the current date and time in Philippine Time
    $order_date = date('Y-m-d H:i:s');

    // Insert data into the 'orders' table
    $sql = "INSERT INTO orders (product_name, price, customer_name, customer_email, street_address, city, payment_method, order_date) 
            VALUES ('$product_name', '$price', '$customer_name', '$customer_email', '$street_address', '$city', '$payment_method', '$order_date')";

    if ($conn->query($sql) === TRUE) {
        echo '<marquee>(ﾉ´ヮ`)ﾉ*: ･ﾟ  恵まれた一日を! ヽ(o＾▽＾o)ノ Order recorded successfully !!! ~ 
        私はヤブです! ╰(*´︶`*)╯♡   Thank you for ordering on Boss Liam Store	(ﾉ◕ヮ◕)ﾉ*:･ﾟ✧ 勇気を持って! :> |</marquee>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boss Liam | Home Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
             padding: 0;    
        }

        .banner {
	position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: -1;
        }

        .banner video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
        }

        /* Add your custom styles to mimic the Apple website */
        /* ... (You can add styles here to make it look like Apple's homepage) ... */

        /* Example styles to create a header that resembles Apple's website */
        .header {
            background-color: #000;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        .header h1 {
            font-size: 36px;
            font-weight: bold;
            margin: 0;
        }

        .header p {
            font-size: 20px;
            margin: 10px 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Add more styles for other sections of the homepage */

        /* Example styles for a product section */
        .product-section {
            padding: 40px 0;
            text-align: center;
        }

        .product-section h2 {
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .product-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 100.5); /* Change the last value (0.5) to adjust the transparency of the box shadow */
}

        .product-card img {
            max-width: 100%;
            height: auto;
            margin-bottom: 15px;
        }

        .product-card h3 {
            font-size: 24px;
            font-weight: bold;
        }

        .product-card p {
            font-size: 18px;
        }

        /* Add styles for other sections and components as needed */

        /* Example styles for the footer */
        .footer {
            background-color: #000;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        /* Shopping Cart Styles */
        .cart-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007bff;
            color: #fff;
            font-size: 24px;
            border-radius: 50%;
            padding: 10px;
            cursor: pointer;
            z-index: 999;
        }

        .cart-count {
            background-color: #fff;
            color: #007bff;
            font-size: 14px;
            border-radius: 50%;
            padding: 4px 8px;
            position: absolute;
            top: -8px;
            right: -8px;
        }

        .cart-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            justify-content: center;
            align-items: center;
            z-index: 999;
        }

        .cart-content {
            background-color: #fff;
            padding: 20px;
            max-width: 400px;
            max-height: 80vh;
            overflow-y: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .cart-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .cart-item img {
            max-width: 50px;
            margin-right: 10px;
        }

        .cart-item-details {
            flex: 1;
        }

        .cart-item-title {
            font-weight: bold;
        }

        .cart-item-price {
            color: #007bff;
        }

        .cart-item-remove {
            color: #ff0000;
            cursor: pointer;
        }
        .add-to-cart {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
}

.add-to-cart:hover {
    background-color: #0056b3;
}

/* Style for buttons inside the shopping cart */
.cart-content button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    margin-right: 10px;
}

.cart-content button:hover {
    background-color: #0056b3;
}
    </style>
</head>
<body>
<div class="banner">
		<video autoplay muted loop>
			<source src="img/qwe.mp4" type="video/mp4">
		</video>
		
	</div>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link" href="welcomepage.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">iPhone</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            More
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="register.php">Register</a></li>
            <li><a class="dropdown-item" href="login.php">Login</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="about.php">About</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
    </li>
      </ul>
      <form class="d-flex justify-content-end" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<div class="header">
    <div class="container">
        <img src="img/BLIS7.png" alt="Apple Logo" width="220" height="100">
        <h1>Welcome to Boss Liam's iPhone Store</h1>
        <p>Store. The best way to buy the products you love. Discover LIAMitless Innovation!</p>
    </div>
</div>

<div class="product-section">
    
    <div class="container">
        <h2>Featured Products</h2>

        <div class="row">
            <div class="col-md-4">
                <div class="product-card">
                    <img src="img/12.jpg" alt="iPhone12">
                    <h3>iPhone 12</h3>
                    <p>Plus Ultra.</p>
                    <button class="add-to-cart" name="product_name" data-product="iPhone 12">Add to Cart</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-card">
                    <img src="img/SE.jpg" alt="iPhoneSE">
                    <h3>iPhone SE</h3>
                    <p>Serious power. Serious value.</p>
                    <button class="add-to-cart" name="product_name" data-product="iPhone SE">Add to Cart</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-card">
                    <img src="img/13mini.jpg" alt="iPhone13mini">
                    <h3>iPhone 13 mini</h3>
                    <p>As amazing as ever.</p>
                    <button class="add-to-cart" name="product_name" data-product="iPhone 13 mini">Add to Cart</button>
                </div>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-4">
                <div class="product-card">
                    <img src="img/13.jpg" alt="iPhone13">
                    <h3>iPhone 13</h3>
                    <p>As amazing as ever.</p>
                    <button class="add-to-cart" name="product_name" data-product="iPhone 13">Add to Cart</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-card">
                    <img src="img/14.jpg" alt="iPhone14">
                    <h3>iPhone 14</h3>
                    <p>A total powerhouse.</p>
                    <button class="add-to-cart" name="product_name" data-product="iPhone 14">Add to Cart</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-card">
                    <img src="img/14pro.jpg" alt="iPhone14proi">
                    <h3>iPhone 14 Pro</h3>
                    <p>The ultimate iPhone.</p>
                    <button class="add-to-cart" name="product_name" data-product="iPhone 14 Pro">Add to Cart</button>
                </div>
            </div>
        </div>





    </div>
</div>
</div>
<div class="footer">
    <div class="container">
        <p>Contact us at support@applephonestore.com</p>
    </div>
</div>

<!-- Shopping Cart Button -->
<div class="cart-button" id="cartButton">
    <i class="fas fa-shopping-cart"></i>
    <div class="cart-count" id="cartCount">0</div>
</div>

<div class="cart-modal" id="cartModal">
        <div class="cart-content">
            <h2>Your Shopping Cart</h2>
            <div id="cartItems"></div>
            <button onclick="clearCart()">Clear Cart</button>
            <button onclick="closeCart()">Close</button>
            <button onclick="checkout()">Checkout</button>

            <!-- Add the form element here -->
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <!-- Form input fields -->
             

                <!-- Form submission button -->
                
            </form>
        </div>
    </div>

<!-- Address Popup -->
<div class="cart-modal" id="addressPopup" style="display: none;">
    <div class="cart-content">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <h2>Enter Your Address</h2>
        <input type="text" id="nameInput" name="customer_name" placeholder="Your Name">
        <input type="text" id="emailInput" name="customer_email" placeholder="Your Email">
        <input type="text" id="streetInput" name="street_address" placeholder="Street Address">
        <input type="text" id="cityInput" name="city" placeholder="City" placeholder="City">
        <br><br>

        <h2>Boss Liam's iPhones</h2>
  
        <form>

         <label for="product">Select a Product:</label>
         <select id="product" name="product_name">
              <option value="iPhone 12">iPhone 12</option>
              <option value="iPhone SE">iPhone SE</option>
              <option value="iPhone 13 mini">iPhone 13 mini</option>
              <option value="iPhone 13">iPhone 13</option>
              <option value="iPhone 14">iPhone 14</option>
              <option value="iPhone 14 Pro">iPhone 14 Pro</option>
         </select>
         
  <br>

        <br><br>
        
        <h2>How Many GB?</h2>
        <form>
        <br>
        <h6>ⓘ A GB (gigabyte) is a way of measuring how much data you have on an electronic device. 1GB is approximately 1,000MB (megabytes). </h6>
        <br>
        <h6><b><i>iPhone 12</b></i></h6>
            <label>
                <input type="radio" name="price" value="43490.00">
                64GB| ₱43,490.00
            </label>
            <br>
            <label>
                <input type="radio" name="price" value="46990.00">
                128GB| ₱46,990.00
            </label>
            <br>
            <label>
                <input type="radio" name="price" value="54490.00">
                256GB| ₱54,490.00
            </label>
            <br>

            <h6><b><i>iPhone SE</b></i></h6>
            <label>
                <input type="radio" name="price" value="32990.00">
                64GB| ₱32,990.00
            </label>
            <br>
            <label>
                <input type="radio" name="price" value="35990.00">
                128GB| ₱35,990.00
            </label>
            <br>
            <label>
                <input type="radio" name="price" value="42990.00">
                256GB| ₱42,990.00
            </label>
            <br>

            <h6><b><i>iPhone 13 mini</b></i></h6>
            <label>
                <input type="radio" name="price" value="44990.00">
                128GB| ₱44,990.00
            </label>
            <br>
            <label>
                <input type="radio" name="price" value="52490.00">
                256GB| ₱52,490.00
            </label>
            <br>

            <h6><b><i>iPhone 13</b></i></h6>
            <label>
                <input type="radio" name="price" value="47990.00">
                128GB| ₱47,990.00
            </label>
            <br>
            <label>
                <input type="radio" name="price" value="55490.00">
                256GB| ₱55,490.00
            </label>
            <br>

            <h6><b><i>iPhone 14</b></i></h6>
            <label>
                <input type="radio" name="price" value="55990.00">
                128GB| ₱55,990.00
            </label>
            <br>
            <label>
                <input type="radio" name="price" value="62990.00">
                256GB| ₱62,990.00
            </label>
            <br>
            <label>
                <input type="radio" name="price" value="77490.00">
                512GB| ₱77,490.00
            </label>
            <br>

            <h6><b><i>iPhone 14 Pro</b></i></h6>
            <label>
                <input type="radio" name="price" value="71990.00">
                128GB| ₱71,990.00
            </label>
            <br>
            <label>
                <input type="radio" name="price" value="78990.00">
                256GB| ₱78,990.00
            </label>
            <br>
            <label>
                <input type="radio" name="price" value="92990.00">
                512GB| ₱92,990.00
            </label>
            <br>
            <label>
                <input type="radio" name="price" value="106990.00">
                1TByte| ₱106,990.00

                <br><br>
                
                <h2>Payment Method</h2>
        <form>
            <label>
                <input type="radio" name="payment_method" value="creditCard">
                Credit Card
            </label>
            <br>
            <label>
                <input type="radio" name="payment_method" value="GCash">
                GCash
            </label>
            <br>
            <label>
                <input type="radio" name="payment_method" value="Maya">
                Maya
            </label>
            <br>
            <label>
                <input type="radio" name="payment_method" value="COD">
                Cash on Delivery
            </label>
        </form>
        <br><br>
                <button type="submit" name="submit">Submit Order</button>
            </form>
            </label>
        </form>
        
      
    </div>
</div>

<script>
    

function checkout() {
        if (cartItems.length === 0) {
            alert("Boss, your cart is empty!");
            return;
        }
        openAddressPopup();
    }

    function openAddressPopup() {
        const addressPopup = document.getElementById('addressPopup');
        addressPopup.style.display = 'flex';
    }

    function closeAddressPopup() {
        const addressPopup = document.getElementById('addressPopup');
        addressPopup.style.display = 'none';
    }

    function confirmAddress() {
    const nameInput = document.getElementById('nameInput').value;
    const streetInput = document.getElementById('streetInput').value;
    const cityInput = document.getElementById('cityInput').value;

    if (nameInput.trim() === '' || streetInput.trim() === '' || cityInput.trim() === '') {
        alert("Please enter a valid name and address!");
        return;
    }

    // You can now use the 'nameInput', 'streetInput', and 'cityInput' variables to process the user's information.
    // For example, you can send this data to the server for order processing.

    clearCart(); // Optional: Clear the cart after checkout.

    closeAddressPopup();
    closeCart();

    alert(`Thank you ${nameInput} for your order! Your items will be shipped to:\n\n${streetInput}, ${cityInput}\n
    Your transaction is successful, Please wait for the item to arrive!`);
}
    
    // Shopping Cart Functionality
    const cartButton = document.getElementById('cartButton');
    const cartModal = document.getElementById('cartModal');
    const cartItemsContainer = document.getElementById('cartItems');
    const cartCount = document.getElementById('cartCount');
    let cartItems = [];

    function addToCart(product) {
        cartItems.push(product);
        updateCart();
    }

    function removeCartItem(index) {
        cartItems.splice(index, 1);
        updateCart();
    }

    function updateCart() {
        cartCount.textContent = cartItems.length;
        cartItemsContainer.innerHTML = '';
        cartItems.forEach((item, index) => {
            const cartItem = document.createElement('div');
            cartItem.className = 'cart-item';
            cartItem.innerHTML = `
                <img src="${item.image}" alt="${item.title}">
                <div class="cart-item-details">
                    <div class="cart-item-title">${item.title}</div>
                    <div class="cart-item-price">$${item.price}</div>
                </div>
                <div class="cart-item-remove" onclick="removeCartItem(${index})">Remove</div>
            `;
            cartItemsContainer.appendChild(cartItem);
        });
    }

    function clearCart() {
        cartItems = [];
        updateCart();
    }

    function openCart() {
        cartModal.style.display = 'flex';
    }

    function closeCart() {
        cartModal.style.display = 'none';
    }

    cartButton.addEventListener('click', openCart);

    // Sample data for products (Replace this with actual data)
    const products = [
        { title: 'iPhone12', image: 'img/12.jpg', price: 783.15 },
        { title: 'iPhoneSE', image: 'img/SE.jpg', price: 594.07 },
        { title: 'iPhone13mini', image: 'img/13mini.jpg', price: 810.16 },
        { title: 'iPhone13', image: 'img/13.jpg', price: 864.19 },
        { title: 'iPhone14', image: 'img/14.jpg', price: 1008.25 },
        { title: 'iPhone14pro', image: 'img/14pro.jpg', price: 1296.37 }
    ];

    // Add event listeners to "Add to Cart" buttons
    const addToCartButtons = document.getElementsByClassName('add-to-cart');
    for (let i = 0; i < addToCartButtons.length; i++) {
        addToCartButtons[i].addEventListener('click', function () {
            addToCart(products[i]);
        });
    }
</script>

</body>
</html>
