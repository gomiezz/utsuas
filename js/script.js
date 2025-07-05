// Initialize dropdowns with component options
function populateDropdowns() {
    console.log("[populateDropdowns] Start populating dropdowns");
    // const categories = ['processor', 'vga', 'ram', 'ssd', 'hdd', 'casing', 'motherboard'];
    
    categories.forEach(category => {
        console.log(`[populateDropdowns] Processing category: ${category}`);
        const select = document.getElementById(`${category}-select`);
        
        if (!select) {
            console.error(`[populateDropdowns] Select element not found for category: ${category}`);
            return;
        }

        const options = document.querySelectorAll(`.component-option[data-category="${category}"]`);
        console.log(`[populateDropdowns] Found ${options.length} options for ${category}`);

        options.forEach((option, index) => {
            console.log(`[populateDropdowns] Option ${index + 1}:`, {
                name: option.dataset.name,
                price: option.dataset.price,
                element: option
            });

            const opt = document.createElement('option');
            opt.value = option.dataset.name;
            opt.dataset.price = option.dataset.price;
            opt.textContent = `${option.dataset.name} - Rp ${Number(option.dataset.price).toLocaleString('id-ID')}`;
            select.appendChild(opt);
        });
    });
    console.log("[populateDropdowns] Finished populating dropdowns");
}

// Update total price and order button
function updateSummary() {
    console.log("[updateSummary] Starting summary update");
    // const categories = ['processor', 'vga', 'ram', 'ssd', 'hdd', 'casing', 'motherboard'];
    let totalPrice = 0;
    let selectedComponents = [];

    categories.forEach(category => {
        console.group(`[updateSummary] Processing category: ${category}`);
        const select = document.getElementById(`${category}-select`);
        
        if (!select) {
            console.error(`[updateSummary] Select element not found for category: ${category}`);
            console.groupEnd();
            return;
        }

        const selectedOption = select.options[select.selectedIndex];
        console.log("Selected option:", selectedOption);
        
        const price = parseInt(selectedOption.dataset.price) || 0;
        console.log("Parsed price:", price);
        
        totalPrice += price;
        console.log("Running total:", totalPrice);

        if (selectedOption.value) {
            selectedComponents.push(`${category.charAt(0).toUpperCase() + category.slice(1)}: ${selectedOption.value} (Rp ${Number(price).toLocaleString('id-ID')})`);
            console.log("Added to selected components:", selectedComponents[selectedComponents.length - 1]);
        }
        console.groupEnd();
    });

    // Debug total price calculation
    console.log("[updateSummary] Final total price:", totalPrice);
    document.getElementById('total-price').textContent = `Rp ${totalPrice.toLocaleString('id-ID')}`;

    // Debug order button
    const orderBtn = document.getElementById('order-btn');
    console.log("[updateSummary] Selected components count:", selectedComponents.length);
    
    if (selectedComponents.length > 0) {
        console.log("[updateSummary] Showing order button");
        orderBtn.style.display = 'block';
        const message = `Saya ingin memesan PC dengan komponen berikut:\n${selectedComponents.join('\n')}\nTotal: Rp ${totalPrice.toLocaleString('id-ID')}`;
        console.log("WhatsApp message:", message);
        orderBtn.href = `https://wa.me/6285955230855?text=${encodeURIComponent(message)}`;
    } else {
        console.log("[updateSummary] Hiding order button");
        orderBtn.style.display = 'none';
    }
    console.log("[updateSummary] Finished summary update");
}

// Add event listeners to dropdowns
function initializeDropdowns() {
    console.log("[initializeDropdowns] Initializing dropdown event listeners");
    // const categories = ['processor', 'vga', 'ram', 'ssd', 'hdd', 'casing', 'motherboard'];
    
    categories.forEach(category => {
        const select = document.getElementById(`${category}-select`);
        if (select) {
            console.log(`[initializeDropdowns] Adding listener to ${category}`);
            select.addEventListener('change', updateSummary);
        } else {
            console.error(`[initializeDropdowns] Select element not found for ${category}`);
        }
    });
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', () => {
    console.log("[DOMContentLoaded] Initializing PC builder");
    
    console.time("Initialization");
    try {
        populateDropdowns();
        initializeDropdowns();
        updateSummary();
    } catch (error) {
        console.error("Initialization error:", error);
    }
    console.timeEnd("Initialization");
    
    console.log("[DOMContentLoaded] Initialization complete");
});