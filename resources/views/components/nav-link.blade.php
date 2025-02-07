<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="https://ipozzy.in/">
            <img src="{{ asset('img/lolo.jpg') }}" alt="iPozzy Logo" height="80" class="rounded-circle">
            iPozzy
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left-aligned links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#aboutModal">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#faqModal">FAQ's</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#pricingModal">Pricing</a>
                </li>
            </ul>

            <!-- Right-aligned links for guest users -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @guest
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('register') }}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                @else
                    <li class="nav-item">
                        <button class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#profileModal">
                            {{ Auth::user()->name }}
                        </button>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link">Logout</button>
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<!-- Modals -->

<!-- About Us Modal -->
<div class="modal fade" id="aboutModal" tabindex="-1" aria-labelledby="aboutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="aboutModalLabel">About Us</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
          <strong>About Us</strong>

            Welcome to <strong>iPozzy!</strong>

            iPozzy is a platform that makes it easy for property owners and tenants to connect. If you are looking for a place to
            stay or have a property to rent out, iPozzy helps you find the right match quickly.

            We make listing and searching for properties simple, so you don’t have to go through a long and complicated process.
            With just a few clicks, you can post a property or find a home that suits your needs.

            At iPozzy, we believe that finding a place to live should be easy and stress-free. That’s why we created this platform –
            to help you connect with the right people in a fast and simple way.

            Join iPozzy today and make property renting easier than ever!
            </div>
        </div>
    </div>
</div>

<!-- FAQ Modal -->
<div class="modal fade" id="faqModal" tabindex="-1" aria-labelledby="faqModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="faqModalLabel">FAQ's</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Frequently Asked Questions (FAQs)</h5>

                        <div class="mb-3">
                            <h6>1. What is iPozzy?</h6>
                            <p>iPozzy is a website that helps property owners and tenants connect. If you want to rent out your place or
                                find a home, iPozzy makes it easy.</p>
                        </div>

                        <div class="mb-3">
                            <h6>2. How do I list my property on iPozzy?</h6>
                            <p>First, create an account and log in. Then, go to "Create Listing," fill in your property details, upload
                                pictures, and set a rental price. Your listing will be live right away!</p>
                        </div>

                        <div class="mb-3">
                            <h6>3. Is iPozzy only for big property listings?</h6>
                            <p>No! iPozzy is for all kinds of property listings, including small rentals that might not be found on big real
                                estate websites.</p>
                        </div>

                        <div class="mb-3">
                            <h6>4. Can I search for properties without an account?</h6>
                            <p>Yes! You can look at listings without an account. But if you want to contact a property owner, you will need
                                to sign up.</p>
                        </div>

                        <div class="mb-3">
                            <h6>5. How do I contact a property owner?</h6>
                            <p>Once you find a property you like, click the "Contact" button on the listing page to send a message to the
                                owner.</p>
                        </div>

                        <div class="mb-3">
                            <h6>6. Is iPozzy free to use?</h6>
                            <p>Yes! You can browse and contact owners for free. Property owners pay a small fee to list their properties.
                            </p>
                        </div>

                        <div class="mb-3">
                            <h6>7. How do I delete my account or listing?</h6>
                            <p>Go to "Account Settings" and select "Delete Account" to remove your profile. If you're a property owner, you
                                can delete a listing from your dashboard.</p>
                        </div>

                        <div class="mb-3">
                            <h6>8. Is my personal information safe on iPozzy?</h6>
                            <p>Yes! We keep your information secure and do not share it with anyone. You can read more in our <a
                                    href="#">Privacy Policy</a>.</p>
                        </div>

                        <div class="mb-3">
                            <h6>9. Can I edit my listing after posting it?</h6>
                            <p>Yes! Just log in, go to your dashboard, and update your listing. Your changes will show up right away.</p>
                        </div>

                        <div class="mb-3">
                            <h6>10. How can I change my subscription plan?</h6>
                            <p>If you're a property owner, go to the "Subscription" section in your account and pick a new plan.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pricing Modal -->
<div class="modal fade" id="pricingModal" tabindex="-1" aria-labelledby="pricingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pricingModalLabel">Pricing</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <div class="modal-body">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <!-- Basic Plan -->
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="card shadow-sm border-primary d-flex flex-column h-100">
                            <div class="card-header bg-primary text-white text-center">
                                <h3>Basic Plan</h3>
                                <p>Perfect for first-time landlords</p>
                            </div>
                            <div class="card-body text-center flex-grow-1 d-flex flex-column">
                                <h4 class="card-title text-success">R50</h4>
                                <p class="card-text">For 30 days</p>
                                <ul class="list-unstyled flex-grow-1">
                                    <li><strong>Post Duration:</strong> 30 Days</li>
                                    <li><strong>Listing Position:</strong> Standard</li>
                                    <li><strong>Contact Details:</strong> Visible</li>
                                    <li><strong>Priority Support:</strong> No</li>
                                </ul>
                                <form action="#" method="POST">
                                    @csrf
                                    <input type="hidden" name="payment_plan" value="basic">
                                    <button type="submit" class="mt-auto btn btn-outline-primary w-100">Choose Plan</button>
                                </form>
                            </div>
                        </div>
                    </div>
        
                    <!-- Premium Plan -->
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="card shadow-sm border-warning d-flex flex-column h-100">
                            <div class="card-header bg-warning text-white text-center">
                                <h3>Premium Plan</h3>
                                <h4>(Recommended)</h4>
                                <p>For experienced landlords</p>
                            </div>
                            <div class="card-body text-center flex-grow-1 d-flex flex-column">
                                <h4 class="card-title text-info">R100</h4>
                                <p class="card-text">For 60 days</p>
                                <ul class="list-unstyled flex-grow-1">
                                    <li><strong>Post Duration:</strong> 60 Days</li>
                                    <li><strong>Listing Position:</strong> Featured</li>
                                    <li><strong>Contact Details:</strong> Visible</li>
                                    <li><strong>Priority Support:</strong> Yes</li>
                                </ul>
                                <form action="#" method="POST">
                                    @csrf
                                    <input type="hidden" name="payment_plan" value="premium">
                                    <button type="submit" class="mt-auto btn btn-outline-primary w-100">Choose Plan</button>
                                </form>
                            </div>
                        </div>
                    </div>
        
                    <!-- Elite Plan -->
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="card shadow-sm border-danger d-flex flex-column h-100">
                            <div class="card-header bg-danger text-white text-center">
                                <h3>Elite Plan</h3>
                                <p>For professional landlords</p>
                            </div>
                            <div class="card-body text-center flex-grow-1 d-flex flex-column">
                                <h4 class="card-title text-danger">R200</h4>
                                <p class="card-text">For 90 days</p>
                                <ul class="list-unstyled flex-grow-1">
                                    <li><strong>Post Duration:</strong> 90 Days</li>
                                    <li><strong>Listing Position:</strong> Top Position</li>
                                    <li><strong>Contact Details:</strong> Visible</li>
                                    <li><strong>Priority Support:</strong> Yes</li>
                                    <li><strong>Boosted Visibility:</strong> Yes</li>
                                </ul>
                                <form action="#" method="POST">
                                    @csrf
                                    <input type="hidden" name="payment_plan" value="elite">
                                    <button type="submit" class="mt-auto btn btn-outline-primary w-100">Choose Plan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>
</div>

<!-- User Profile Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">User Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Content will go here -->
            </div>
        </div>
    </div>
</div>
