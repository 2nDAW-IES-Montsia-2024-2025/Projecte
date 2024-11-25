<div class="mb-4 flex justify-end">
    <a href="/contracts"
        class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg shadow focus:outline-none focus:ring focus:ring-green-500 flex items-center space-x-2">
        <!-- Heroicon for return/back (chevron-left) -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        <span>Return to Contracts</span>
    </a>
</div>

<div class="bg-white p-8 border border-gray-300 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Contract</h2>
    <form
        action="/contracts/<?php echo htmlspecialchars($contract->getId()); ?>/update"
        method="POST" class="space-y-6">

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
            <input type="text" id="name" name="name"
                value="<?php echo htmlspecialchars($contract->name); ?>"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Start Date -->
        <div>
            <label for="start_date" class="block text-sm font-medium text-gray-700 mb-1">Start Date</label>
            <input type="datetime-local" id="start_date" name="start_date"
                value="<?php echo htmlspecialchars($contract->start_date); ?>"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- End Date -->
        <div>
            <label for="end_date" class="block text-sm font-medium text-gray-700 mb-1">End Date</label>
            <input type="datetime-local" id="end_date" name="end_date"
                value="<?php echo htmlspecialchars($contract->end_date); ?>"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Invoice Proposed -->
        <div>
            <label for="invoice_proposed" class="block text-sm font-medium text-gray-700 mb-1">Invoice Proposed</label>
            <input type="number" step="0.01" id="invoice_proposed" name="invoice_proposed"
                value="<?php echo htmlspecialchars($contract->invoice_proposed); ?>"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Invoice Agreed -->
        <div>
            <label for="invoice_agreed" class="block text-sm font-medium text-gray-700 mb-1">Invoice Agreed</label>
            <input type="number" step="0.01" id="invoice_agreed" name="invoice_agreed"
                value="<?php echo htmlspecialchars( $contract->invoice_agreed); ?>"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Invoice Paid -->
        <div>
            <label for="invoice_paid" class="block text-sm font-medium text-gray-700 mb-1">Invoice Paid</label>
            <input type="number" step="0.01" id="invoice_paid" name="invoice_paid"
                value="<?php echo htmlspecialchars($contract->invoice_paid); ?>"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Submit Button -->
        <div class="flex items-center">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg focus:outline-none focus:ring focus:ring-blue-500">
                Update Contract
            </button>
        </div>
    </form>
</div>