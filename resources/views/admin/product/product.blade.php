<style>
    .products_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }
</style>
@include('admin.layout.header')
<div class="col-span-10 p-5">
    <div class="flex justify-between text-sm">
        <div class="flex text-gray-600">
            <div>
                <label for="dateInput">From</label>
                <input class="p-2 rounded-lg ml-2" type="date" id="dateInput">
            </div>
            <div class="ml-4">
                <label for="dateInput">To</label>
                <input class="p-2 rounded-lg ml-2" type="date" id="dateInput">
            </div>
            <div class="ml-6">
                <div>
                    <div class="relative rounded-md shadow-sm">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <span class="text-gray-500 sm:text-sm"><a href=""><ion-icon name="search-outline"></ion-icon></a></span>
                        </div>
                        <input type="text" name="price" id="price" class=" block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Search">
                    </div>
                </div>
            </div>
        </div>
        <div><a href="../../admin/product/add"><button class="bg-green-700 text-white p-2 rounded-lg text-xm flex justify-center"><ion-icon class="text-xl px-2" name="add-outline"></ion-icon> Add product</button></a></div>
    </div>
    <div class="flex my-6">
        <div class="px-4 border-b-2 border-yellow-500 py-1">
            <button class="flex">
                <span class="text-yellow-500">All</span>
                <div class="icon_count ml-1 bg-yellow-500">12</div>
            </button>
        </div>
        <div class="px-4  border-yellow-500 py-1">
            <button class="flex">
                <span>Active</span>
                <div class="icon_count ml-1">13</div>
            </button>
        </div>
        <div class="px-4  border-yellow-500 py-1">
            <button class="flex">
                <span>Draft</span>
                <div class="icon_count ml-1">03</div>
            </button>
        </div>
        <div class="px-4  border-yellow-500 py-1">
            <button class="flex">
                <span>Deleted</span>
                <div class="icon_count ml-1">12</div>
            </button>
        </div>
    </div>
    <div class="">
        <span>0 product selected</span>
        <button class="button_selected"><ion-icon class="mr-2 mb-1 text-purple-700 " name="bag-check-outline"></ion-icon>Out of Stock</button>
        <button class="button_selected"><ion-icon class="mr-2 mb-1 text-fuchsia-600 " name="cash-outline"></ion-icon>On Sale</button>
        <button class="button_selected"><ion-icon class="mr-2 mb-1 text-blue-400 " name="apps-outline"></ion-icon>Select All</button>
        <button class="button_selected"><ion-icon class="mr-2 mb-1 text-blue-700 " name="file-tray-full-outline"></ion-icon>Print QR</button>
        <button class="button_selected"><ion-icon class="mr-2 mb-1 text-sky-500 " name="exit-outline"></ion-icon>Export</button>
        <button class="button_selected"><ion-icon class="mr-2 mb-1 text-red-500 " name="trash-outline"></ion-icon>Delete</button>
    </div>
    <table class="table-auto w-full my-6 rounded-lg overflow-hidden">
        <thead>
            <tr class="text-left bg-gray-400">
                <th class="px-4 py-2"></th>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Product Info</th>
                <th class="px-4 py-2">Brand</th>
                <th class="px-4 py-2">Price</th>
                <th class="px-4 py-2">Stock</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Last Update</th>
                <th class="px-4 py-2">...</th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-gray-100">
                <td class="px-4 py-2"><input type="checkbox"></td>
                <td class="px-4 py-2">001</td>
                <td class="px-4 py-2 flex"> <img src="{{ asset('image/pc_demo.jpg') }}" width="50" alt="">
                    <div class=" pl-2">
                        <p>Product A</p>
                        <span>5.599.000 VND</span>
                    </div>
                </td>
                <td class="px-4 py-2">Brand X</td>
                <td class="px-4 py-2">$10.99</td>
                <td class="px-4 py-2">20</td>
                <td class="px-4 py-2">In Stock</td>
                <td class="px-4 py-2">2024-06-05</td>
                <td class="px-4 py-2">...</td>
            </tr>
            <tr class="bg-white">
                <td class="px-4 py-2"><input type="checkbox"></td>
                <td class="px-4 py-2">002</td>
                <td class="px-4 py-2 flex"> <img src="{{ asset('image/pc_demo.jpg') }}" width="50" alt="">
                    <div class=" pl-2">
                        <p>Product A</p>
                        <span>5.599.000 VND</span>
                    </div>
                </td>
                <td class="px-4 py-2">Brand Y</td>
                <td class="px-4 py-2">$15.49</td>
                <td class="px-4 py-2">15</td>
                <td class="px-4 py-2">Out of Stock</td>
                <td class="px-4 py-2">2024-06-04</td>
                <td class="px-4 py-2">...</td>
            </tr>
            <tr class="bg-gray-100">
                <td class="px-4 py-2"><input type="checkbox"></td>
                <td class="px-4 py-2">001</td>
                <td class="px-4 py-2 flex"> <img src="{{ asset('image/pc_demo.jpg') }}" width="50" alt="">
                    <div class=" pl-2">
                        <p>Product A</p>
                        <span>5.599.000 VND</span>
                    </div>
                </td>
                <td class="px-4 py-2">Brand X</td>
                <td class="px-4 py-2">$10.99</td>
                <td class="px-4 py-2">20</td>
                <td class="px-4 py-2">In Stock</td>
                <td class="px-4 py-2">2024-06-05</td>
                <td class="px-4 py-2">...</td>
            </tr>
            <tr class="bg-white">
                <td class="px-4 py-2"><input type="checkbox"></td>
                <td class="px-4 py-2">002</td>
                <td class="px-4 py-2 flex"> <img src="{{ asset('image/pc_demo.jpg') }}" width="50" alt="">
                    <div class=" pl-2">
                        <p>Product A</p>
                        <span>5.599.000 VND</span>
                    </div>
                </td>
                <td class="px-4 py-2">Brand Y</td>
                <td class="px-4 py-2">$15.49</td>
                <td class="px-4 py-2">15</td>
                <td class="px-4 py-2">Out of Stock</td>
                <td class="px-4 py-2">2024-06-04</td>
                <td class="px-4 py-2">...</td>
            </tr>
            <tr class="bg-gray-100">
                <td class="px-4 py-2"><input type="checkbox"></td>
                <td class="px-4 py-2">001</td>
                <td class="px-4 py-2 flex"> <img src="{{ asset('image/pc_demo.jpg') }}" width="50" alt="">
                    <div class=" pl-2">
                        <p>Product A</p>
                        <span>5.599.000 VND</span>
                    </div>
                </td>
                <td class="px-4 py-2">Brand X</td>
                <td class="px-4 py-2">$10.99</td>
                <td class="px-4 py-2">20</td>
                <td class="px-4 py-2">In Stock</td>
                <td class="px-4 py-2">2024-06-05</td>
                <td class="px-4 py-2">...</td>
            </tr>
            <tr class="bg-white">
                <td class="px-4 py-2"><input type="checkbox"></td>
                <td class="px-4 py-2">002</td>
                <td class="px-4 py-2 flex"> <img src="{{ asset('image/pc_demo.jpg') }}" width="50" alt="">
                    <div class=" pl-2">
                        <p>Product A</p>
                        <span>5.599.000 VND</span>
                    </div>
                </td>
                <td class="px-4 py-2">Brand Y</td>
                <td class="px-4 py-2">$15.49</td>
                <td class="px-4 py-2">15</td>
                <td class="px-4 py-2">Out of Stock</td>
                <td class="px-4 py-2">2024-06-04</td>
                <td class="px-4 py-2">...</td>
            </tr>
            <tr class="bg-gray-100">
                <td class="px-4 py-2"><input type="checkbox"></td>
                <td class="px-4 py-2">001</td>
                <td class="px-4 py-2 flex"> <img src="{{ asset('image/pc_demo.jpg') }}" width="50" alt="">
                    <div class=" pl-2">
                        <p>Product A</p>
                        <span>5.599.000 VND</span>
                    </div>
                </td>
                <td class="px-4 py-2">Brand X</td>
                <td class="px-4 py-2">$10.99</td>
                <td class="px-4 py-2">20</td>
                <td class="px-4 py-2">In Stock</td>
                <td class="px-4 py-2">2024-06-05</td>
                <td class="px-4 py-2">...</td>
            </tr>
            <tr class="bg-white">
                <td class="px-4 py-2"><input type="checkbox"></td>
                <td class="px-4 py-2">002</td>
                <td class="px-4 py-2 flex"> <img src="{{ asset('image/pc_demo.jpg') }}" width="50" alt="">
                    <div class=" pl-2">
                        <p>Product A</p>
                        <span>5.599.000 VND</span>
                    </div>
                </td>
                <td class="px-4 py-2">Brand Y</td>
                <td class="px-4 py-2">$15.49</td>
                <td class="px-4 py-2">15</td>
                <td class="px-4 py-2">Out of Stock</td>
                <td class="px-4 py-2">2024-06-04</td>
                <td class="px-4 py-2">...</td>
            </tr>
            <tr class="bg-gray-100">
                <td class="px-4 py-2"><input type="checkbox"></td>
                <td class="px-4 py-2">001</td>
                <td class="px-4 py-2 flex"> <img src="{{ asset('image/pc_demo.jpg') }}" width="50" alt="">
                    <div class=" pl-2">
                        <p>Product A</p>
                        <span>5.599.000 VND</span>
                    </div>
                </td>
                <td class="px-4 py-2">Brand X</td>
                <td class="px-4 py-2">$10.99</td>
                <td class="px-4 py-2">20</td>
                <td class="px-4 py-2">In Stock</td>
                <td class="px-4 py-2">2024-06-05</td>
                <td class="px-4 py-2">...</td>
            </tr>
            <tr class="bg-white">
                <td class="px-4 py-2"><input type="checkbox"></td>
                <td class="px-4 py-2">002</td>
                <td class="px-4 py-2 flex"> <img src="{{ asset('image/pc_demo.jpg') }}" width="50" alt="">
                    <div class=" pl-2">
                        <p>Product A</p>
                        <span>5.599.000 VND</span>
                    </div>
                </td>
                <td class="px-4 py-2">Brand Y</td>
                <td class="px-4 py-2">$15.49</td>
                <td class="px-4 py-2">15</td>
                <td class="px-4 py-2">Out of Stock</td>
                <td class="px-4 py-2">2024-06-04</td>
                <td class="px-4 py-2">...</td>
            </tr>
            <tr class="bg-gray-100">
                <td class="px-4 py-2"><input type="checkbox"></td>
                <td class="px-4 py-2">001</td>
                <td class="px-4 py-2 flex"> <img src="{{ asset('image/pc_demo.jpg') }}" width="50" alt="">
                    <div class=" pl-2">
                        <p>Product A</p>
                        <span>5.599.000 VND</span>
                    </div>
                </td>
                <td class="px-4 py-2">Brand X</td>
                <td class="px-4 py-2">$10.99</td>
                <td class="px-4 py-2">20</td>
                <td class="px-4 py-2">In Stock</td>
                <td class="px-4 py-2">2024-06-05</td>
                <td class="px-4 py-2">...</td>
            </tr>
        </tbody>
    </table>
    <div class="flex justify-end">
        <div>
            <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                <a href="#" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                    <span class="sr-only">Previous</span>
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                    </svg>
                </a>
                <!-- Current: "z-10 bg-indigo-600 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600", Default: "text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0" -->
                <a href="#" aria-current="page" class="relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">1</a>
                <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">2</a>
                <a href="#" class="relative hidden items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">3</a>
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 ring-1 ring-inset ring-gray-300 focus:outline-offset-0">...</span>
                <a href="#" class="relative hidden items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">8</a>
                <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">9</a>
                <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">10</a>
                <a href="#" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                    <span class="sr-only">Next</span>
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                    </svg>
                </a>
            </nav>
        </div>
    </div>
</div>
@include('admin.layout.fotter')