<div class="grid grid-cols-1 gap-6">
  <div class="form-control w-full">
    <label class="label"><span class="label-text">Name</span></label>
    <input type="text" name="name"
           value="{{ old('name', $product->name) }}"
           class="input input-bordered w-full" />
  </div>

  <div class="form-control w-full">
    <label class="label"><span class="label-text">Category</span></label>
    <input type="text" name="category"
           value="{{ old('category', $product->category) }}"
           class="input input-bordered w-full" />
  </div>

  <div class="form-control w-full">
    <label class="label"><span class="label-text">Description</span></label>
    <textarea name="description" rows="4"
              class="textarea textarea-bordered w-full">{{ old('description', $product->description) }}</textarea>
  </div>

  <div class="grid grid-cols-2 gap-6">
    <div class="form-control">
      <label class="label"><span class="label-text">Price</span></label>
      <input type="text" name="price"
             value="{{ old('price', $product->price) }}"
             class="input input-bordered w-full" />
    </div>
    <div class="form-control">
      <label class="label"><span class="label-text">Stock Qty</span></label>
      <input type="number" name="stock_quantity"
             value="{{ old('stock_quantity', $product->stock_quantity) }}"
             class="input input-bordered w-full" />
    </div>
  </div>

  <div class="form-control w-full">
    <label class="label"><span class="label-text">Image</span></label>
    <input type="file" name="image" class="file-input file-input-bordered w-full" />
    @if($product->image)
      <img src="{{ asset('storage/'.$product->image) }}"
           class="mt-4 rounded-lg shadow h-24 object-cover" />
    @endif
  </div>
</div>