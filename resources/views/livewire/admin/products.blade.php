<div class="main-container">
    <div class="products">
        <h3>Products</h3>
        <div class="product-form p-4 drop-shadow-2xl">
            <p class="text-black-500 font-bold" style="margin-left: 10px;">{{ $action }} Add Products</p>
            <hr class="hr">
            <form wire:submit.prevent='saveProduct' class="form">
                <div class="form-group">
                    <div class="form-row">
                        <div class="form-field">
                            <label for="">Supplier*</label>
                            <select wire:model='supplierID'>
                                <option value="" selected>Select Supplier</option>
                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                @endforeach
                            </select>
                            @error('supplierID')
                                <p style="font-size: 14px; color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-field">
                            <label for="">Product Photo*</label>
                            <input type="file" wire:model='productImage'>
                            @error('productImage')
                                <p style="font-size: 14px; color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-field">
                            <label for="">Product Name*</label>
                            <input type="text" wire:model='name'>
                            @error('name')
                                <p style="font-size: 14px; color: red;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-field">
                            <label for="price">Price*</label>
                            <input type="number" step="any" wire:model='price'>
                            @error('price')
                                <p style="font-size: 14px; color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    

                    <div class="form-row">
                        <div class="form-field">
                            <label for="">Category*</label>
                            <select wire:model='category'>
                                <option value="">Select Category</option>
                                <option value="Nike">Nike</option>
                                <option value="Adidas">Adidas</option>
                                <option value="New Balance">New Balance</option>
            
                            </select>
                            @error('category')
                                <p style="font-size: 14px; color: red;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-field">
                            <label for="">Quantity*</label>
                            <input type="number" wire:model='quantity'>
                            @error('quantity')
                                <p style="font-size: 14px; color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-row product-save-btn">
                <button type="submit" class="save-btn">
                 <i class=""></i> Save
                 </button>
                <p class="cancel-btn" wire:click="resetVariables">
                <i class=""></i> Cancel
                   </p>
                   </div>

                @if($statusMessage)
                    <p class="message">{{ $statusMessage }}</p>
                @endif
            </form>
        </div>

        
        </div>

        <div class="product-view">
            <table>
                <thead>
                    <tr>
                        <th class="left">Item No.</th>
                        <th>Product Image</th>
                        <th>Supplier</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th class="right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $item = 1; @endphp <!-- Initialize item counter -->

                @foreach ($products as $product)
                    <tr>
                        <td>{{ $item++ }}</td> <!-- Display Item No. -->
                        <td>
                            <img src="{{ asset('uploads/product-images/' . $product->file_path) }}" alt="" style="width: 50px">
                        </td>
                        <td>{{ $product->supplier_name }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td class="button-group">
                            <button class="edit-btn" wire:click='toggleEditProduct({{ $product->id }})'>
                                <i class=""></i> Edit
                            </button>
                            <button class="delete-btn" wire:click="deleteProduct({{ $product->id }})">
                                <i class=""></i> Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>