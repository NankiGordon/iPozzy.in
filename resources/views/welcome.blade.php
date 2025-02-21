<x-guest-layout>
     @if($listings->count())
        <div class="container">
            <h2>Latest Listings</h2>
                <div class="row">
                     @foreach($listings as $listing)
                        <div class="col-md-4">
                             <div class="card mb-3">
                                 @php
                                     $images = $listing->images; // No need for json_decode()
                                 @endphp
                                 @if (!empty($images) && is_array($images))
                                    <img src="{{ asset('storage/images/' . $images[0]) }}" class="card-img-top" alt="Property Image">
                                @endif
                                <div class="card-body">
                                     <h5 class="card-title">{{ $listing->property_name }}</h5>
                                            <p class="card-text">{{ $listing->description }}</p>
                                                 <p><strong>Price:</strong> R{{ number_format($listing->price, 2) }}</p>
                                                  <p><strong>Location:</strong> {{ $listing->suburb }}, {{ $listing->city }}</p>
                                </div>
                            </div>
                        </div>
                     @endforeach
                </div>
         </div>
            @else
            <p>No listings available.</p>
            @endif
</x-guest-layout>
