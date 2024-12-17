<div class="mb-4 flex justify-end">
    <a href="/admin/contract/create" class="btn-create">
        Nuevo contrato
    </a>
</div>

<div class="relative overflow-x-auto scrollbar-none shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <!-- <thead class="border-b text-gray-900 dark\:text-white uppercase"> -->
        <thead class="bg-neutral-700 text-white uppercase">
            <tr>
                <th scope="col" class="px-5 py-3">Nombre</th>
                <th scope="col" class="px-5 py-3">Fecha de inicio</th>
                <th scope="col" class="px-5 py-3">Fecha de fin</th>
                <th scope="col" class="px-5 py-3">Factura propuesta</th>
                <th scope="col" class="px-5 py-3">Factura aceptada</th>
                <th scope="col" class="px-5 py-3">Factura pagada</th>
                <th scope="col" class="px-5 py-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contracts as $index => $contract) {
                $isLast = $index === count($contracts) - 1;
                ?>
                <tr class="border-b <?= $isLast ? '' : 'hover:bg-gray-50'; ?>">
                    <th scope="row" class="px-5 py-4 font-medium text-gray-900 whitespace-nowrap dark\:text-white">
                        <?= $contract->name; ?>
                    </th>
                    <td class="px-5 py-4">
                        <?= date('d/m/Y', strtotime($contract->start_date)); ?>
                    </td>
                    <td class="px-5 py-4">
                        <?= date('d/m/Y', strtotime($contract->end_date)); ?>
                    </td>
                    <td class="px-5 py-4">
                        <?= $contract->invoice_proposed; ?> €
                    </td>
                    <td class="px-5 py-4">
                        <?= $contract->invoice_agreed; ?> €
                    </td>
                    <td class="px-5 py-4">
                        <?= $contract->invoice_paid; ?> €
                    </td>
                    <td class="flex items-center px-5 py-4 space-x-4">
                        <a href="/admin/contract/<?= htmlspecialchars($contract->getId()); ?>/edit"
                            class="text-lime-600 hover:scale-110" title="Editar">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </a>
                        <a href="/admin/contract/<?= htmlspecialchars($contract->getId()); ?>/delete"
                            onclick="return confirm('¿Desea eliminar el contrato <?= htmlspecialchars($contract->name); ?>?');"
                            class="text-red-600 hover:scale-110" title="Eliminar">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>