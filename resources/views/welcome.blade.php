<x-guest-layout>
    <div class="container mt-5">
        <h1>Property Listings</h1>

        <div class="row">
            @foreach($listings as $listing)
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                @php
                                    $images = $listing->images;
                                @endphp

                                @if (!empty($images) && is_array($images))
                                    <img src="{{ asset('storage/' . $images[0]) }}" class="card-img-top" alt="Property Image">
                                @else
                                    <svg class="bd-placeholder-img card-img-top" width="100%" height="180"
                                        xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap"
                                        preserveAspectRatio="xMidYMid slice" focusable="false">
                                        <title>Placeholder</title>
                                        <rect width="100%" height="100%" fill="#868e96"></rect>
                                        <text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
                                    </svg>
                                @endif

                                <div class="card-body">
                                    <h5 class="card-title">{{ $listing->city }}</h5>
                                    <h6>R{{ number_format($listing->price, 2) }}</h6>
                                    <p class="card-text" id="cardText">{{ $listing->description }}</p>
                                    <button class="btn btn-outline-info btn-sm" id="showMoreBtn" onclick="toggleText()">Show
                                        More</button>
                                    <p><strong>Bedrooms:</strong> {{ $listing->bedrooms }}</p>
                                    <p><strong>Bathrooms:</strong> {{ $listing->bathrooms }}</p>
                                    <p><strong>Size:</strong> {{ $listing->size }} m²</p>
                                    <a href="#" class="btn btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>
            @endforeach
        </div>
    </div>
</x-guest-layout>
