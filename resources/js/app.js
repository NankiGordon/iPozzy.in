// Import Bootstrap (if you're using it)
import './bootstrap';

// Import Alpine.js (if you're using it)
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

// Custom JavaScript Function for Show More/Show Less
function toggleText() {
    const fullText = "Some quick example text to build on the card title and make up the bulk of the card's content.";
    const previewText = fullText.split(" ").slice(0, 5).join(" ") + "...";

    const cardText = document.getElementById("cardText");
    const showMoreBtn = document.getElementById("showMoreBtn");

    if (cardText.innerText === previewText) {
        cardText.innerText = fullText;
        showMoreBtn.innerText = "Show Less";
    } else {
        cardText.innerText = previewText;
        showMoreBtn.innerText = "Show More";
    }
}

// Expose the toggleText function globally if needed
window.toggleText = toggleText;
