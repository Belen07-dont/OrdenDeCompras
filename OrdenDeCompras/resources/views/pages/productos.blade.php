<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperMart - Product Showcase</title>
    <!-- Bootstrap CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
     <!-- Alternative: Use Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    <!-- Sticky Top Menu -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-store me-2"></i>SuperMart
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#snacks">Snacks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#beverages">Beverages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#frozen">Frozen Foods</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#dairy">Dairy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#bakery">Bakery</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <input class="form-control me-2 search-box" type="search" placeholder="Search products..." aria-label="Search">
                    <a href="#" class="btn btn-outline-light position-relative cart-icon">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="cart-count">3</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <!-- Snacks Aisle -->
        <section id="snacks" class="aisle-section">
            <div class="aisle-header">
                <h2 class="section-title">Snacks Aisle</h2>
                <p class="section-subtitle">Delicious snacks for every occasion</p>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card product-card">
                        <img src="https://images.unsplash.com/photo-1558961360-89f7cd8d5d5e?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Potato Chips">
                        <div class="card-body">
                            <h5 class="card-title">Potato Chips</h5>
                            <p class="card-text">Crispy and delicious potato chips with just the right amount of salt. Perfect for snacking.</p>
                            <div class="price">$2.99</div>
                            <button class="btn btn-add-cart"><i class="fas fa-cart-plus me-2"></i>Add to Cart</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card product-card">
                        <img src="https://images.unsplash.com/photo-1587234371382-1270c82fcc2e?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Chocolate Cookies">
                        <div class="card-body">
                            <h5 class="card-title">Chocolate Cookies</h5>
                            <p class="card-text">Soft and chewy cookies with rich chocolate chunks. A classic treat for any time of day.</p>
                            <div class="price">$3.49</div>
                            <button class="btn btn-add-cart"><i class="fas fa-cart-plus me-2"></i>Add to Cart</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card product-card">
                        <img src="https://images.unsplash.com/photo-1575089976121-8ed7b2a54265?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Trail Mix">
                        <div class="card-body">
                            <h5 class="card-title">Trail Mix</h5>
                            <p class="card-text">A healthy blend of nuts, dried fruits, and chocolate chips for energy on the go.</p>
                            <div class="price">$4.99</div>
                            <button class="btn btn-add-cart"><i class="fas fa-cart-plus me-2"></i>Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Beverages Aisle -->
        <section id="beverages" class="aisle-section">
            <div class="aisle-header">
                <h2 class="section-title">Beverages Aisle</h2>
                <p class="section-subtitle">Refreshments for every taste</p>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card product-card">
                        <img src="https://images.unsplash.com/photo-1554866585-cd94860890b7?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Sparkling Water">
                        <div class="card-body">
                            <h5 class="card-title">Sparkling Water</h5>
                            <p class="card-text">Refreshing sparkling water with natural lemon flavor. Zero calories and no sweeteners.</p>
                            <div class="price">$1.29</div>
                            <button class="btn btn-add-cart"><i class="fas fa-cart-plus me-2"></i>Add to Cart</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card product-card">
                        <img src="https://images.unsplash.com/photo-1595981267035-7b04ca84a82d?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Orange Juice">
                        <div class="card-body">
                            <h5 class="card-title">Fresh Orange Juice</h5>
                            <p class="card-text">100% pure squeezed orange juice with no added sugars. Packed with vitamin C.</p>
                            <div class="price">$3.99</div>
                            <button class="btn btn-add-cart"><i class="fas fa-cart-plus me-2"></i>Add to Cart</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card product-card">
                        <img src="https://images.unsplash.com/photo-1592887714077-1c2caa0a0797?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Iced Coffee">
                        <div class="card-body">
                            <h5 class="card-title">Iced Coffee</h5>
                            <p class="card-text">Ready-to-drink iced coffee with a smooth blend of coffee and cream. Perfect pick-me-up.</p>
                            <div class="price">$2.49</div>
                            <button class="btn btn-add-cart"><i class="fas fa-cart-plus me-2"></i>Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Frozen Foods Aisle -->
        <section id="frozen" class="aisle-section">
            <div class="aisle-header">
                <h2 class="section-title">Frozen Foods Aisle</h2>
                <p class="section-subtitle">Quick and convenient frozen meals</p>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card product-card">
                        <img src="https://images.unsplash.com/photo-1513104890138-7c749659a591?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Frozen Pizza">
                        <div class="card-body">
                            <h5 class="card-title">Frozen Pizza</h5>
                            <p class="card-text">Delicious pepperoni pizza with crispy crust, rich tomato sauce, and melted cheese.</p>
                            <div class="price">$6.99</div>
                            <button class="btn btn-add-cart"><i class="fas fa-cart-plus me-2"></i>Add to Cart</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card product-card">
                        <img src="https://images.unsplash.com/photo-1612528443702-f6741f70a049?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Ice Cream">
                        <div class="card-body">
                            <h5 class="card-title">Vanilla Ice Cream</h5>
                            <p class="card-text">Premium vanilla ice cream made with real vanilla beans. Creamy and indulgent.</p>
                            <div class="price">$4.49</div>
                            <button class="btn btn-add-cart"><i class="fas fa-cart-plus me-2"></i>Add to Cart</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card product-card">
                        <img src="https://images.unsplash.com/photo-1603064752734-4c48eff53d05?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Frozen Vegetables">
                        <div class="card-body">
                            <h5 class="card-title">Mixed Vegetables</h5>
                            <p class="card-text">A colorful blend of frozen vegetables including corn, carrots, peas, and green beans.</p>
                            <div class="price">$2.99</div>
                            <button class="btn btn-add-cart"><i class="fas fa-cart-plus me-2"></i>Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Dairy Aisle -->
        <section id="dairy" class="aisle-section">
            <div class="aisle-header">
                <h2 class="section-title">Dairy Aisle</h2>
                <p class="section-subtitle">Fresh dairy products</p>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card product-card">
                        <img src="https://images.unsplash.com/photo-1566772940193-9c3ae2938d78?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Milk">
                        <div class="card-body">
                            <h5 class="card-title">Organic Milk</h5>
                            <p class="card-text">Fresh organic milk from grass-fed cows. Rich in calcium and essential nutrients.</p>
                            <div class="price">$3.79</div>
                            <button class="btn btn-add-cart"><i class="fas fa-cart-plus me-2"></i>Add to Cart</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card product-card">
                        <img src="https://images.unsplash.com/photo-1603064752734-4c48eff53d05?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Frozen Vegetables">
                        <div class="card-body">
                            <h5 class="card-title">Mixed Vegetables</h5>
                            <p class="card-text">A colorful blend of frozen vegetables including corn, carrots, peas, and green beans.</p>
                            <div class="price">$2.99</div>
                            <button class="btn btn-add-cart"><i class="fas fa-cart-plus me-2"></i>Add to Cart</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card product-card">
                        <img src="https://images.unsplash.com/photo-1603064752734-4c48eff53d05?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Frozen Vegetables">
                        <div class="card-body">
                            <h5 class="card-title">Mixed Vegetables</h5>
                            <p class="card-text">A colorful blend of frozen vegetables including corn, carrots, peas, and green beans.</p>
                            <div class="price">$2.99</div>
                            <button class="btn btn-add-cart"><i class="fas fa-cart-plus me-2"></i>Add to Cart</button>
                        </div>
                    </div>
                </div>
















                <style>
        :root {
            --primary-color: #3a86ff;
            --secondary-color: #ffbe0b;
            --accent-color: #ff006e;
            --dark-color: #2d3047;
            --light-color: #f8f9fa;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            padding-top: 80px; /* Offset for fixed navbar */
        }
        
        .sticky-top {
            top: 0;
            z-index: 1020;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .navbar {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        }
        
        .navbar-brand {
            font-weight: 700;
            color: white !important;
            font-size: 1.5rem;
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.85) !important;
            font-weight: 500;
            padding: 0.5rem 1rem;
            transition: all 0.3s;
        }
        
        .nav-link:hover, .nav-link.active {
            color: white !important;
            background-color: rgba(255, 255, 255, 0.15);
            border-radius: 4px;
        }
        
        .aisle-header {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            border-left: 5px solid var(--primary-color);
        }
        
        .product-card {
            transition: transform 0.3s;
            margin-bottom: 25px;
            border: none;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            height: 100%;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
        }
        
        .product-card .card-img-top {
            height: 200px;
            object-fit: cover;
            background-color: #f8f9fa;
            padding: 20px;
        }
        
        .product-card .card-body {
            display: flex;
            flex-direction: column;
        }
        
        .product-card .card-title {
            color: var(--dark-color);
            font-weight: 600;
        }
        
        .product-card .price {
            color: var(--accent-color);
            font-weight: 700;
            font-size: 1.25rem;
            margin: 10px 0;
        }
        
        .btn-add-cart {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: 600;
            transition: all 0.3s;
            margin-top: auto;
        }
        
        .btn-add-cart:hover {
            background-color: var(--accent-color);
            transform: scale(1.05);
        }
        
        .aisle-section {
            padding: 40px 0;
            border-bottom: 1px solid #eee;
        }
        
        .cart-icon {
            position: relative;
        }
        
        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: var(--accent-color);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
        }
        
        .search-box {
            background-color: rgba(255, 255, 255, 0.2);
            border: none;
            border-radius: 20px;
            color: white;
            padding: 5px 15px;
        }
        
        .search-box::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
        
        .search-box:focus {
            background-color: rgba(255, 255, 255, 0.3);
            color: white;
            box-shadow: none;
        }
        
        .section-title {
            color: var(--dark-color);
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .section-subtitle {
            color: #6c757d;
            margin-bottom: 20px;
        }
    </style>