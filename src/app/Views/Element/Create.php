<div class="mb-4 flex justify-end">
    <a href="/elements"
        class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg shadow focus:outline-none focus:ring focus:ring-green-500 flex items-center space-x-2">
        <!-- Heroicon for return/back (chevron-left) -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        <span>Return to Elements</span>
    </a>
</div>

<div class="bg-white p-8 border border-gray-300 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Create Element</h2>
    <form action="/zone/store" method="POST" class="space-y-6">

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
            <input type="text" id="name" name="name"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500"
                   required>
        </div>
        <!-- Tree Type ID-->
        <div>
            <label for="treeType_id" class="block text-sm font-medium text-gray-700 mb-1">TreeType</label>
            <select id="treeType_id" name="treeType_id"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500"
                    required>
                <option value="" disabled selected>Select Tree Type</option>
                <option value="1">TreeType 1</option>
                <option value="2">TreeType 2</option>
                <option value="3">TreeType 3</option>
            </select>
        </div>
        
        <!-- Zone ID -->
        <div>
            <label for="zone_id" class="block text-sm font-medium text-gray-700 mb-1">Zone Id</label>
            <select id="zone_id" name="zone_id"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500"
                   required>
                <option value=""disabled selected>Select Zone</option>
                <option value="1">Point 1</option>
                <option value="2">Point 2</option>
                <option value="3">Point 3</option>
            </select>
        </div>

        <!-- Point ID -->
        <div>
            <label for="point_id" class="block text-sm font-medium text-gray-700 mb-1">Point</label>
            <select id="point_id" name="point_id"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500"
                    required>
                <option value="" disabled selected>Select Point</option>
                <option value="1">Point 1</option>
                <option value="2">Point 2</option>
                <option value="3">Point 3</option>
            </select>
        </div>

        <!-- Submit Button -->
        <div class="flex items-center">
            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg focus:outline-none focus:ring focus:ring-blue-500">
                Create Element
            </button>
        </div>
    </form>
</div>
