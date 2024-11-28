<div class="mb-4 flex justify-end">
    <a href="/tree-types"
        class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg shadow focus:outline-none focus:ring focus:ring-green-500 flex items-center space-x-2">
        <!-- Heroicon for return/back (chevron-left) -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        <span>Return to Tree Types</span>
    </a>
</div>

<div class="bg-white p-8 border border-gray-300 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Tree Type</h2>

    <!-- Contenidor per a mostrar errors agrupats -->
    <div id="errorMessages" class="hidden bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6"></div>

    <form action="/tree-types/<?php echo htmlspecialchars($tree_type->getId()); ?>/update" id="treeForm" method="POST" class="space-y-6">

        <!-- Family -->
        <div>
            <label for="family" class="block text-sm font-medium text-gray-700 mb-1">Tree Type Name</label>
            <input type="text" id="family" name="family"
                value="<?php echo htmlspecialchars($tree_type->family); ?>"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Genus -->
        <div>
            <label for="genus" class="block text-sm font-medium text-gray-700 mb-1">Genus</label>
            <input type="text" id="genus" name="genus"
                value="<?php echo htmlspecialchars($tree_type->genus); ?>"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Species -->
        <div>
            <label for="species" class="block text-sm font-medium text-gray-700 mb-1">Species</label>
            <input type="text" id="species" name="species"
                value="<?php echo htmlspecialchars($tree_type->species); ?>"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Submit Button -->
        <div class="flex items-center">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg focus:outline-none focus:ring focus:ring-blue-500">
                Update Tree Type
            </button>
        </div>
    </form>
</div>

            </button>
            <script src="/assets/js/app.js"></script>
            <script>
                document.getElementById('submitBtn').addEventListener('click', function(event) {
                    validateFormTreeType(event);
                });
            </script>
        </div>
    </form>
</div>
