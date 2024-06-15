<style>
    .products_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }
</style>
@include('admin.layout.header')
<div class="bg-gray-100 font-sans antialiased col-span-10">
    <div class="min-h-screen bg-gray-100 flex justify-center items-center">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-2xl">
            <h2 class="text-2xl font-semibold text-gray-800 mb-8">Add New Product</h2>
            <form action="" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="id" class="block text-sm font-medium text-gray-700 mb-1">ID</label>
                    <input type="text" name="id" id="id" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="Enter product ID" required>
                </div>
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                    <input type="text" name="name" id="name" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="Enter product name" required>
                </div>
                <div class="mb-4">
                    <label for="color" class="block text-sm font-medium text-gray-700 mb-1">Color</label>
                    <input type="text" name="color" id="color" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="Enter product color" required>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                        <input type="number" name="price" id="price" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="Enter product price" required>
                    </div>
                    <div class="mb-4">
                        <label for="sale" class="block text-sm font-medium text-gray-700 mb-1">Sale</label>
                        <input type="number" name="sale" id="sale" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="Enter sale percentage" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="quantity" class="block text-sm font-medium text-gray-700 mb-1">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="Enter quantity" required>
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Product Image</label>
                    <input type="file" name="image" id="image" class="border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="short_description" class="block text-sm font-medium text-gray-700 mb-1">Short Description</label>
                    <textarea name="short_description" id="short_description" rows="2" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="Enter short description" required></textarea>
                </div>
                </form>
        </div>
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-2xl">
            <form action="" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="long_description" class="block text-sm font-medium text-gray-700 mb-1">Long Description</label>
                    <textarea name="long_description" id="long_description" rows="4" class=" border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="Enter long description" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="featured" class="block text-sm font-medium text-gray-700 mb-1">Featured</label>
                    <select name="featured" id="featured" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" required>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="active" class="block text-sm font-medium text-gray-700 mb-1">Active</label>
                    <select name="active" id="active" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" required>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">Slug</label>
                    <input type="text" name="slug" id="slug" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="Enter product slug" required>
                </div>
                <div class="mb-4">
                    <label for="discount" class="block text-sm font-medium text-gray-700 mb-1">Discount</label>
                    <input type="number" name="discount" id="discount" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="Enter discount amount" required>
                </div>
                <div class="mb-4">
                    <label for="product_code" class="block text-sm font-medium text-gray-700 mb-1">Product Code</label>
                    <input type="text" name="product_code" id="product_code" class=" border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="Enter product code" required>
                </div>
                <div class="flex justify-end mt-6">
                    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Add Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('admin.layout.fotter')