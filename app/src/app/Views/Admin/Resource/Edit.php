<div class="mb-4 flex justify-end">
    <a href="/admin/resources"
        class="px-4 py-2 bg-gray-700 text-white shadow-sm hover:bg-gray-500 transition-all duration-200 rounded flex items-center space-x-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        <span>Volver a recursos</span>
    </a>
</div>

<div class="bg-white p-8 border border-gray-300 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Editar recurso</h2>

    <form id="resourceForm" action="/admin/resource/<?= htmlspecialchars($resource->getId()); ?>/update" method="POST"
        class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- Error Messages -->
        <div id="errorMessages"
            class="hidden col-span-1 md:col-span-2 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
        </div>

        <!-- Element Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
            <input type="text" id="name" name="name" placeholder="Introduce el nombre del recurso"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500"
                value="<?= htmlspecialchars($resource->name); ?>" required>
        </div>

        <!-- Category Dropdown -->
        <div>
            <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Categoría</label>
            <select id="category" name="type_resource_id"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
                <option value="" disabled selected>Seleccione una categoría</option>
                <?php foreach ($resource_types as $type_resource) { ?>
                    <option value="<?= htmlspecialchars($type_resource->getId()); ?>"
                        <?= $type_resource->getId() == $resource->type_resource_id ? 'selected' : ''; ?>>
                        <?= htmlspecialchars($type_resource->category); ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <!-- Resource Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
            <input type="text" id="description" name="description" placeholder="Introduce una descripción"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500"
                value="<?= htmlspecialchars($resource->description); ?>">
        </div>

        <!-- Submit Button -->
        <div class="col-span-1 md:col-span-2 flex justify-end">
            <button type="submit"
                class="px-4 py-2 bg-blue-500 text-white shadow-sm hover:bg-blue-600 transition-all duration-200 rounded">
                Actualizar recurso
            </button>
        </div>
    </form>
</div>