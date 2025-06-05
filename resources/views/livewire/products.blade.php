<div class="main-container">
    <div class="products">
        <h2>Tasks</h2>
        <div class="product-form p-4 drop-shadow-2xl">
            <p class="text-black-500 font-bold" style="margin-left: 10px;">{{ $action }} Add Tasks</p>
            <hr class="hr">
            <form wire:submit.prevent='saveProduct' class="form">
                <div class="form-group">
                    <div class="form-row">
                        <div class="form-field">
                            <label for="">User</label>
                            <select wire:model='supplierID' class="inputs">
                                <option value="" selected >Select User</option>
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
                            <label for="">Task</label>
                            <input type="text" wire:model='name' id="task" class="inputs" placeholder="Input Tasks">
                            @error('name')
                                <p style="font-size: 14px; color: red;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-field">
                            <label for="price">Date</label>
                            <input type="date" step="any" wire:model='price' class="inputs" placeholder="MM-DD-YY">
                            @error('price')
                                <p style="font-size: 14px; color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    

                    <div class="form-row">
                        <div class="form-field">
                            <label for="">Priority Levels</label>
                            <select wire:model='category' class="inputs">
                                <option value="">Priority Levels</option>
                                <option value="Low" style="font-size: 18px; color: rgb(55, 206, 55);">Low</option>
                                <option value="Medium" style="font-size: 18px; color: rgb(231, 140, 54);">Medium</option>
                                <option value="High" style="font-size: 18px; color: rgb(255, 0, 0);">High</option>
            
                            </select>
                            @error('category')
                                <p style="font-size: 14px; color: red;">{{ $message }}</p>
                            @enderror
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
                        <th class="left">Task No.</th>
                        <th>User</th>
                        <th>Date</th>
                        <th>Priorty Levels</th>
                        <th class="right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $item = 1; @endphp <!-- Initialize item counter -->

                @foreach ($products as $product)
                    <tr>
                        <td>{{ $item++ }}</td> <!-- Display Item No. -->
                        <td>{{ $product->supplier_name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->category }}</td>



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

    <style>
        *{
            background-color: rgb(214, 204, 204);
        }
    </style>
</div>