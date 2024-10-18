<x-admin>
    @push('scripts')
       <script>// Function to calculate total price for each card
        function calculateTotalPrice(card) {
            const priceInput = card.querySelector('.price-input');
            const quantityInput = card.querySelector('.quantity-input');
            const price = parseFloat(priceInput.value) || 0;
            const quantity = parseFloat(quantityInput.value) || 0;
            return price * quantity;
        }
        
        // Function to calculate grand total across all cards
        function calculateGrandTotal() {
            const productCards = document.querySelectorAll('.product-card');
            let grandTotal = 0;
            
            productCards.forEach(card => {
                grandTotal += calculateTotalPrice(card);
            });
        
            // Update the grand total field
            document.querySelector('.grand-total').value = grandTotal.toFixed(2);
        }
        
        // Add event listeners to input fields to calculate total on change
        document.addEventListener('input', function (e) {
            if (e.target.classList.contains('price-input') || e.target.classList.contains('quantity-input')) {
                calculateGrandTotal();
            }
        });
        
        // Add a new product card
        document.getElementById('addCard').addEventListener('click', function () {
            const productCards = document.getElementById('product-cards');
            const originalCard = productCards.querySelector('.product-card');
            const newCard = originalCard.cloneNode(true);
        
            // Get current count of cards
            const cardCount = productCards.getElementsByClassName('product-card').length;
        
            // Update input names to reflect new product index
            newCard.querySelectorAll('input, textarea, select').forEach(input => {
                const newName = input.name.replace(/\d+/, cardCount); // Increment the index
                input.name = newName;
                input.value = ''; // Clear the input values
            });
        
            productCards.appendChild(newCard);
        
            // Recalculate the grand total whenever a new card is added
            calculateGrandTotal();
        });
        
        // Remove last product card
        document.getElementById('removeCard').addEventListener('click', function () {
            const productCards = document.getElementById('product-cards');
            const cards = productCards.getElementsByClassName('product-card');
        
            if (cards.length > 1) {
                productCards.removeChild(cards[cards.length - 1]);
                calculateGrandTotal(); // Recalculate after removing a card
            }
        });
        </script>
    @endpush
    <x-slot name="title">Point Of Sell</x-slot>

    <form class="row" action="{{ route('agent.add.cart') }}" method="POST">
        @csrf

        <div class="col-md-8">
            <div id="product-cards">
                <div class="card product-card">
                    <div class="card-body">
                        <h5 class="card-title">Sale Products</h5>
                        <p class="card-title-desc">Enter all the data</p>
    
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="brandName" placeholder="Enter Brand Name" name="products[0][brand_name]" required>
                                    <label for="brandName">Brand Name</label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="productName" placeholder="Enter Product Name" name="products[0][product_name]" required>
                                    <label for="productName">Product Name</label>
                                </div>
                            </div>
                        </div>
    
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control price-input" placeholder="Enter Price" min="0" name="products[0][price]" required>
                                    <label for="price">Price</label>
                                </div>
                            </div>
    
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <select class="form-control" name="products[0][unit]" required>
                                        <option value="" selected>Select Unit</option>
                                        <option value="KG">KG</option>
                                        <option value="unit">Unit</option>
                                        <option value="littre">Littre</option>
                                    </select>
                                </div>
                            </div>
    
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control quantity-input" placeholder="Enter Quantity" min="0" name="products[0][quantity]" required>
                                    <label for="quantity">Quantity</label>
                                </div>
                            </div>
                        </div>
    
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="3" name="products[0][description]" required></textarea>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Add and Remove buttons -->
            <div class="text-end my-3">
                <a id="removeCard" class="btn btn-danger"><i class="bx bx-trash"></i></a>
                <a id="addCard" class="btn btn-success"><i class="bx bx-plus"></i></a>
            </div>
        </div>
    
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Date & Submit</h5>
                    <p class="card-title-desc">Enter all the data</p>
    
                    <div class="col-md-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control grand-total" id="grandTotal" placeholder="Grand Total" name="total_price" readonly>
                            <label for="grandTotal">Grand Total</label>
                        </div>
                    </div>
    
                    <div class="row align-items-end gap-3">
                        <div class="col-md-6">
                            <label class="form-label">Sale Date</label>
                            <input type="date" class="form-control" id="saleDate" name="dates">
                        </div>
                        <div class="col-md-5 text-end">
                            <button type="submit" class="btn btn-primary w-md">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var today = new Date().toISOString().split('T')[0];
            document.getElementById("saleDate").value = today;
        });
    </script>
</x-admin>
