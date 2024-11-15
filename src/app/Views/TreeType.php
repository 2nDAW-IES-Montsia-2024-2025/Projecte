<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="px-4 py-2 border-b">ID</th>
                <th class="px-4 py-2 border-b">Family</th>
                <th class="px-4 py-2 border-b">Genus</th>
                <th class="px-4 py-2 border-b">Species</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tree_types as $tree_type): ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border-b"><?php echo $tree_type->getId(); ?></td>
                    <td class="px-4 py-2 border-b"><?php echo $tree_type->getFamily(); ?></td>
                    <td class="px-4 py-2 border-b"><?php echo $tree_type->getGenus(); ?></td>
                    <td class="px-4 py-2 border-b"><?php echo $tree_type->getSpecies(); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
