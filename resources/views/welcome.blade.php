<x-guest-layout>
    <div class="container mt-5">
        <h1>Property Listings</h1>
        @isset($listing)
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('storage/images/' . $listing->images[0]) }}" class="card-img-top" alt="Property Image">
                <div class="card-body">
                    <h5 class="card-title">{{ $listing->city }}</h5>
                    <h6>R{{ number_format($listing->price, 2) }}</h6>
                    <p class="card-text" id="cardText">{{ $listing->description }}</p>
                    <button class="btn btn-outline-info btn-sm" id="showMoreBtn" onclick="toggleText()">Show More</button>
                    <p><strong>Bedrooms:</strong> {{ $listing->bedrooms }}</p>
                    <p><strong>Bathrooms:</strong> {{ $listing->bathrooms }}</p>
                    <p><strong>Size:</strong> {{ $listing->size }} m²</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        @else
            <p>No listings available.</p>
        @endisset
    </div>
</x-guest-layout>
