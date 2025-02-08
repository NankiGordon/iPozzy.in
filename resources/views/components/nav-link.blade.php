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
            <li class="nav-item">
                @if(Auth::check()) <!-- Check if user is logged in -->
                    <a class="btn btn-success" data-bs-toggle="modal" href="#createListingModal">Create Listing</a>
                @else <!-- If user is not logged in -->
                    <a class="btn btn-success" href="{{ route('login') }}">Create Listing</a>
                @endif
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
                        <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#profileModal">
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

<!-- Modal for Create Listing -->
<div class="modal fade" id="createListingModal" tabindex="-1" aria-labelledby="createListingModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createListingModalLabel">Create Listing</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <!-- Property Name -->
                    <div class="mb-3">
                        <label for="propertyName" class="form-label">Property Name</label>
                        <input type="text" id="propertyName" class="form-control" placeholder="Enter property name">
                    </div>

                    <!-- Property Type -->
                    <div class="mb-3">
                        <label for="propertyType" class="form-label">Property Type</label>
                        <select id="propertyType" class="form-select">
                            <option selected disabled>Choose Property Type</option>
                            <option>Apartment</option>
                            <option>House</option>
                            <option>Townhouse</option>
                            <option>Commercial</option>
                            <option>Backroom</option>
                            <option>Shack</option>
                            <option>Room to Rent</option>
                            <option>Flatlet</option>
                            <option>Garden Cottage</option>
                            <option>Shared Accommodation</option>
                            <option>Other</option>
                        </select>
                    </div>

                    <!-- Description Field -->
                    <div class="mb-3">
                        <label for="propertyDescription" class="form-label">Property Description</label>
                        <textarea id="propertyDescription" class="form-control" rows="4"
                            placeholder="Provide a detailed description of the property..."></textarea>
                    </div>


                        <!-- Number of Bedrooms -->
                        <div class="mb-3">
                            <label for="bedrooms" class="form-label">Number of Bedrooms</label>
                            <input type="number" id="bedrooms" class="form-control" min="1" placeholder="Enter number of bedrooms" required>
                        </div>

                        <!-- Number of Bathrooms -->
                        <div class="mb-3">
                            <label for="numBathrooms" class="form-label">Number of Bathrooms</label>
                            <input type="number" id="numBathrooms" class="form-control" placeholder="Enter number of bathrooms" min="1">
                        </div>

                        <!-- size -->
                        <div class="mb-3">
                            <label for="size" class="form-label">Size in Square Meters</label>
                            <input type="number" id="size" class="form-control" placeholder="Enter size in m²" min="1" step="1" required>
                        </div>


                    <!-- Amenities Checkboxes -->
                    <div class="mb-3">
                        <label class="form-label">Amenities</label><br>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="wifi" value="wifi">
                            <label class="form-check-label" for="wifi">WiFi</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="parking" value="parking">
                            <label class="form-check-label" for="parking">Parking</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="pool" value="pool">
                            <label class="form-check-label" for="pool">Swimming Pool</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="security" value="security">
                            <label class="form-check-label" for="security">Security</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="petFriendly" value="petFriendly">
                            <label class="form-check-label" for="petFriendly">Pet Friendly</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="laundry" value="laundry">
                            <label class="form-check-label" for="laundry">Laundry Facilities</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="furnished" value="furnished">
                            <label class="form-check-label" for="furnished">Furnished</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="garden" value="garden">
                            <label class="form-check-label" for="garden">Garden</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="electricity" value="electricity">
                            <label class="form-check-label" for="electricity">Electricity Included</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="water" value="water">
                            <label class="form-check-label" for="water">Water Included</label>
                        </div>
                    </div>

                    <!-- Address Fields -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="address1" class="form-label">Address 1 <span class="text-danger">*</span></label>
                            <input type="text" id="address1" class="form-control" placeholder="Street Address" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="address2" class="form-label">Address 2</label>
                            <input type="text" id="address2" class="form-control" placeholder="Apartment, suite, etc.">
                        </div>
                    </div>

                    <!-- Suburb & City -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="suburb" class="form-label">Suburb <span class="text-danger">*</span></label>
                            <input type="text" id="suburb" class="form-control" placeholder="Enter suburb" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" id="city" class="form-control" placeholder="Enter city">
                        </div>
                    </div>

                    <!-- Province & Postal Code -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="province" class="form-label">Province <span class="text-danger">*</span></label>
                            <div class="dropdown">
                                <select id="province" class="form-select">
                                    <option selected disabled>Choose Province</option>
                                    <option>Eastern Cape</option>
                                    <option>Free State</option>
                                    <option>Gauteng</option>
                                    <option>KwaZulu-Natal</option>
                                    <option>Limpopo</option>
                                    <option>Mpumalanga</option>
                                    <option>Northern Cape</option>
                                    <option>North West</option>
                                    <option>Western Cape</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="postal" class="form-label">Postal Code <span class="text-danger">*</span></label>
                            <input type="text" id="postal" class="form-control" placeholder="Enter postal code" required>
                        </div>
                    </div>

                    <!-- Available Date -->
                    <div class="mb-3">
                        <label for="availableDate" class="form-label">Available Date</label>
                        <input type="date" id="availableDate" class="form-control">
                    </div>


                    <!-- Price -->
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" id="price" class="form-control" placeholder="Enter price">
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Create Listing</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- About Us Modal -->
<div class="modal fade" id="aboutModal" tabindex="-1" aria-labelledby="aboutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="aboutModalLabel">About Us</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <strong>About Us</strong>

                Welcome to <strong>iPozzy!</strong>

                iPozzy is a platform that makes it easy for property owners and tenants to connect. If you are looking
                for a place to
                stay or have a property to rent out, iPozzy helps you find the right match quickly.

                We make listing and searching for properties simple, so you don’t have to go through a long and
                complicated process.
                With just a few clicks, you can post a property or find a home that suits your needs.

                At iPozzy, we believe that finding a place to live should be easy and stress-free. That’s why we created
                this platform –
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
                            <p>iPozzy is a website that helps property owners and tenants connect. If you want to rent
                                out your place or
                                find a home, iPozzy makes it easy.</p>
                        </div>

                        <div class="mb-3">
                            <h6>2. How do I list my property on iPozzy?</h6>
                            <p>First, create an account and log in. Then, go to "Create Listing," fill in your property
                                details, upload
                                pictures, and set a rental price. Your listing will be live right away!</p>
                        </div>

                        <div class="mb-3">
                            <h6>3. Is iPozzy only for big property listings?</h6>
                            <p>No! iPozzy is for all kinds of property listings, including small rentals that might not
                                be found on big real
                                estate websites.</p>
                        </div>

                        <div class="mb-3">
                            <h6>4. Can I search for properties without an account?</h6>
                            <p>Yes! You can look at listings without an account. But if you want to contact a property
                                owner, you will need
                                to sign up.</p>
                        </div>

                        <div class="mb-3">
                            <h6>5. How do I contact a property owner?</h6>
                            <p>Once you find a property you like, click the "Contact" button on the listing page to send
                                a message to the
                                owner.</p>
                        </div>

                        <div class="mb-3">
                            <h6>6. Is iPozzy free to use?</h6>
                            <p>Yes! You can browse and contact owners for free. Property owners pay a small fee to list
                                their properties.
                            </p>
                        </div>

                        <div class="mb-3">
                            <h6>7. How do I delete my account or listing?</h6>
                            <p>Go to "Account Settings" and select "Delete Account" to remove your profile. If you're a
                                property owner, you
                                can delete a listing from your dashboard.</p>
                        </div>

                        <div class="mb-3">
                            <h6>8. Is my personal information safe on iPozzy?</h6>
                            <p>Yes! We keep your information secure and do not share it with anyone. You can read more
                                in our <a href="#">Privacy Policy</a>.</p>
                        </div>

                        <div class="mb-3">
                            <h6>9. Can I edit my listing after posting it?</h6>
                            <p>Yes! Just log in, go to your dashboard, and update your listing. Your changes will show
                                up right away.</p>
                        </div>

                        <div class="mb-3">
                            <h6>10. How can I change my subscription plan?</h6>
                            <p>If you're a property owner, go to the "Subscription" section in your account and pick a
                                new plan.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pricing Modal -->
<div class="modal fade" id="pricingModal" tabindex="-1" aria-labelledby="pricingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-body">
            <div class="container py-5">
                <div class="row">
                    <!-- Basic Plan -->
                    <div class="col-lg-3 col-sm-12 mb-4">
                        <div class="card shadow-sm border-primary d-flex flex-column" style="min-height: 400px;">
                            <div class="card-header bg-primary text-white text-center">
                                <h3>Basic Plan</h3>
                                <p>Perfect for first-time landlords</p>
                            </div>
                            <div class="card-body text-center flex-grow-1">
                                <h4 class="card-title text-success">R50</h4>
                                <p class="card-text">For 30 days</p>
                                <ul class="list-unstyled">
                                    <li><strong>Post Duration:</strong> 30 Days</li>
                                    <li><strong>Listing Position:</strong> Standard</li>
                                    <li><strong>Contact Details:</strong> Visible</li>
                                    <li><strong>Priority Support:</strong> No</li>
                                </ul>
                                <form action="#" method="POST">
                                    @csrf
                                    <input type="hidden" name="payment_plan" value="basic">
                                    <button type="submit" class="mt-3 btn btn-outline-primary">Choose Plan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Premium Plan -->
                    <div class="col-lg-3 col-sm-12 mb-4">
                        <div class="card shadow-sm border-warning d-flex flex-column" style="min-height: 400px;">
                            <div class="card-header bg-warning text-white text-center">
                                <h3>Premium Plan</h3>
                                <h4>(Recommended)</h4>
                                <p>For experienced landlords</p>
                            </div>
                            <div class="card-body text-center flex-grow-1">
                                <h4 class="card-title text-info">R100</h4>
                                <p class="card-text">For 60 days</p>
                                <ul class="list-unstyled">
                                    <li><strong>Post Duration:</strong> 60 Days</li>
                                    <li><strong>Listing Position:</strong> Featured</li>
                                    <li><strong>Contact Details:</strong> Visible</li>
                                    <li><strong>Priority Support:</strong> Yes</li>
                                </ul>
                                <form action="#" method="POST">
                                    @csrf
                                    <input type="hidden" name="payment_plan" value="premium">
                                    <button type="submit" class="mt-3 btn btn-outline-primary">Choose Plan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Elite Plan -->
                    <div class="col-lg-3 col-sm-12 mb-4">
                        <div class="card shadow-sm border-danger d-flex flex-column" style="min-height: 400px;">
                            <div class="card-header bg-danger text-white text-center">
                                <h3>Elite Plan</h3>
                                <p>For professional landlords</p>
                            </div>
                            <div class="card-body text-center flex-grow-1">
                                <h4 class="card-title text-danger">R200</h4>
                                <p class="card-text">For 90 days</p>
                                <ul class="list-unstyled">
                                    <li><strong>Post Duration:</strong> 90 Days</li>
                                    <li><strong>Listing Position:</strong> Top Position</li>
                                    <li><strong>Contact Details:</strong> Visible</li>
                                    <li><strong>Priority Support:</strong> Yes</li>
                                    <li><strong>Boosted Visibility:</strong> Yes</li>
                                </ul>
                                <form action="#" method="POST">
                                    @csrf
                                    <input type="hidden" name="payment_plan" value="elite">
                                    <button type="submit" class="mt-3 btn btn-outline-primary">Choose Plan</button>
                                </form>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">User Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <h4 class="card-title text-center mb-4">User Profile</h4>
                                <form>
                                    <!-- Phone Number -->
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone Number <span
                                                class="text-danger">*</span></label>
                                        <input type="tel" id="phone" class="form-control" placeholder="Enter phone number" required>
                                    </div>

                                    <!-- Address Fields -->
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="address1" class="form-label">Address 1 <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" id="address1" class="form-control" placeholder="Street Address"
                                                required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="address2" class="form-label">Address 2</label>
                                            <input type="text" id="address2" class="form-control"
                                                placeholder="Apartment, suite, etc.">
                                        </div>
                                    </div>

                                    <!-- Suburb & City -->
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="suburb" class="form-label">Suburb <span class="text-danger">*</span></label>
                                            <input type="text" id="suburb" class="form-control" placeholder="Enter suburb" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="city" class="form-label">City</label>
                                            <input type="text" id="city" class="form-control" placeholder="Enter city">
                                        </div>
                                    </div>

                                    <!-- Province & Postal Code -->
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="province" class="form-label">Province <span
                                                    class="text-danger">*</span></label>
                                            <div class="dropdown">
                                                <select id="province" class="form-select">
                                                    <option selected disabled>Choose Province</option>
                                                    <option>Eastern Cape</option>
                                                    <option>Free State</option>
                                                    <option>Gauteng</option>
                                                    <option>KwaZulu-Natal</option>
                                                    <option>Limpopo</option>
                                                    <option>Mpumalanga</option>
                                                    <option>Northern Cape</option>
                                                    <option>North West</option>
                                                    <option>Western Cape</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="postal" class="form-label">Postal Code <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" id="postal" class="form-control" placeholder="Enter postal code"
                                                required>
                                        </div>
                                    </div>

                                    <!-- Tenant / Landlord Radio Buttons -->
                                    <div class="mb-3">
                                        <label class="form-label d-block">User Type <span class="text-danger">*</span></label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="userType" id="tenant" value="tenant"
                                                required>
                                            <label class="form-check-label" for="tenant">Tenant</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="userType" id="landlord"
                                                value="landlord">
                                            <label class="form-check-label" for="landlord">Landlord</label>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-outline-primary w-100">Submit</button>
                                    </div>
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
