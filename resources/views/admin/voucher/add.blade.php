<style>
    .products_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }
</style>

@include('admin.layout.header')

<div class="m-4 pt-20">
    <form action="{{ route('add_product') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="min-h-screen bg-gray-100 flex justify-center items-center">
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-2xl">
                <h2 class="text-2xl font-semibold text-gray-800 mb-8">Add Product</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                        <input type="text" name="name" id="name" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="Enter Name" required>
                    </div>
                    <div class="mb-4">
                        <label for="color" class="block text-sm font-medium text-gray-700 mb-1">Color</label>
                        <input type="text" name="color" id="color" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="Enter color" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                    <input type="number" name="price" id="price" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="Enter price" required>
                </div>
                <div class="mb-4">
                    <label for="discount" class="block text-sm font-medium text-gray-700 mb-1">Discount</label>
                    <input type="number" name="discount" id="discount" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="Enter discount amount" required>
                </div>
                <div class="mb-4">
                    <label for="sale" class="block text-sm font-medium text-gray-700 mb-1">Sale</label>
                    <input type="number" name="sale" id="sale" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="Enter sale" required>
                </div>
                <div class="mb-4">
                    <label for="quantity" class="block text-sm font-medium text-gray-700 mb-1">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="Enter quantity" required>
                </div>
                <div class="mb-4">
                    <label for="id_category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                    <select name="id_category" id="id_category" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="id_brand" class="block text-sm font-medium text-gray-700 mb-1">Brand</label>
                    <select name="id_brand" id="id_brand" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500">
                        @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-2xl">
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Product Image</label>
                    <input type="file" name="image" id="image" class="border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="short_description" class="block text-sm font-medium text-gray-700 mb-1">Short Description</label>
                    <textarea name="short_description" id="mytextarea" rows="2" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="Enter short description" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="long_description" class="block text-sm font-medium text-gray-700 mb-1">Long Description</label>
                    <textarea name="long_description" id="mytextarea" rows="4" class=" border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="Enter long description" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="featured" class="block text-sm font-medium text-gray-700 mb-1">Featured</label>
                    <select name="featured" id="featured" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" required>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">Slug</label>
                    <input type="text" name="slug" id="slug" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="Enter product slug" required>
                </div>

                <div class="mb-4">
                    <label for="product_code" class="block text-sm font-medium text-gray-700 mb-1">Product Code</label>
                    <input type="text" name="product_code" id="product_code" class=" border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="Enter product code" required>
                </div>
                <div class="flex justify-end mt-6">
                    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Add Product</button>
                </div>
            </div>
        </div>
    </form>
</div>

@include('admin.layout.fotter')