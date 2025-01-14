<div class="p-2 md:p-6">
    <div class="mb-4 flex justify-end">
        <a href="/admin/work-order/create"
            class="px-4 py-2 bg-gray-700 text-white shadow-sm hover:bg-gray-500 transition-all duration-200 rounded">
            <i class="fas fa-plus mr-2"></i> Nueva órden de trabajo
        </a>
    </div>
    <div class="relative overflow-x-auto rounded-lg">
        <table class="w-full text-sm text-left text-gray-700 border border-gray-200">
            <thead class="bg-gray-700 text-white">
                <tr class="h-12">
                    <th scope="col" class="px-4 py-3 font-medium rounded-tl-lg">Orden de Trabajo</th>
                    <th scope="col" class="px-4 py-3 font-medium">Fecha</th>
                    <th scope="col" class="px-4 py-3 font-medium">Operarios</th>
                    <th scope="col" class="px-4 py-3 font-medium">Estatus</th>
                    <th scope="col" class="px-4 py-3 text-center font-medium w-32 rounded-tr-lg">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                <?php foreach ($work_orders as $index => $work_order) { ?>
                    <tr class="hover:bg-gray-50 transition-colors duration-300">
                        <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                            <button id="accordionButton<?php echo $index; ?>"
                                onclick="toggleAccordion(<?php echo $index; ?>)" aria-expanded="false"
                                class="text-gray-500 hover:text-gray-700 focus:outline-none mr-2">
                                <svg id="accordionIcon<?php echo $index; ?>" xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path id="accordionPath<?php echo $index; ?>" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                            <?php echo "OT-" . htmlspecialchars($work_order->contract()->getId()); ?>
                        </th>
                        <td class="px-4 py-3">
                            <?= date('d/m/Y', strtotime($work_order->date)); ?>
                        </td>
                        <td class="px-4 py-3">
                            <?php
                            $users = [];
                            foreach ($work_order->users() as $user) {
                                $users[] = $user->name . " " . $user->surname;
                            }
                            echo implode(', ', $users);
                            ?>
                        </td>
                        <td class="px-4 py-3">
                            <?php if ($work_order->status() == 0) { ?>
                                <span class="px-2 py-1 text-sm font-medium text-white bg-red-500 rounded-full">No
                                    iniciado</span>
                            <?php } elseif ($work_order->status() == 1) { ?>
                                <span class="px-2 py-1 text-sm font-medium text-white bg-orange-500 rounded-full">En
                                    progreso</span>
                            <?php } elseif ($work_order->status() == 2) { ?>
                                <span
                                    class="px-2 py-1 text-sm font-medium text-white bg-green-500 rounded-full">Completado</span>
                            <?php } ?>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <div class="flex justify-center space-x-3">
                                <a href="/admin/work-order/<?php echo htmlspecialchars($work_order->getId()); ?>/edit"
                                    class="p-2 text-gray-700 border border-transparent hover:text-gray-500 transition-all duration-200"
                                    title="Editar"
                                    aria-label="Editar orden de trabajo OT-<?php echo htmlspecialchars($work_order->contract()->getId()); ?>">
                                    <i class="fas fa-pencil"></i>
                                </a>
                                <a href="/admin/work-order/<?php echo htmlspecialchars($work_order->getId()); ?>/delete"
                                    onclick="return confirm('¿Está seguro de que desea eliminar esta orden de trabajo OT-<?php echo htmlspecialchars($work_order->contract()->getId()); ?>?');"
                                    class="p-2 text-gray-700 border border-transparent hover:text-red-500 transition-all duration-200"
                                    title="Eliminar"
                                    aria-label="Eliminar orden de trabajo OT-<?php echo htmlspecialchars($work_order->contract()->getId()); ?>">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr id="accordionContent<?php echo $index; ?>" class="hidden">
                        <td colspan="5" class="py-4 px-4">
                            <?php foreach ($work_order->blocks() as $block) { ?>
                                <div class="mb-6 border rounded-lg shadow-sm overflow-hidden">
                                    <table class="w-full text-sm text-left text-gray-700 bg-white divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-4 py-3 font-medium">Zonas</th>
                                                <th scope="col" class="px-4 py-3 font-medium">Tipo de Tareas</th>
                                                <th scope="col" class="px-4 py-3 font-medium">Notas</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="hover:bg-gray-100 transition-colors duration-300">
                                                <td class="px-4 py-3 w-1/3">
                                                    <ul>
                                                        <?php foreach ($block->zones() as $blockZones) { ?>
                                                            <li>• <?php echo htmlspecialchars($blockZones->name); ?></li>
                                                        <?php } ?>
                                                    </ul>
                                                </td>
                                                <td class="px-4 py-3 w-1/3">
                                                    <ul>
                                                        <?php foreach ($block->tasks() as $blockTask) { ?>
                                                            <li>• <?php echo htmlspecialchars($blockTask->task()->name); ?>
                                                                <?php echo htmlspecialchars(" " . $blockTask->elementType()->name); ?>
                                                                <?php if ($blockTask->treeType() != null) {
                                                                    echo ": " . htmlspecialchars($blockTask->treeType()->species);
                                                                } ?>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                </td>
                                                <td class="px-4 py-3 w-1/3">
                                                    <?php if ($block->notes !== null) {
                                                        echo htmlspecialchars($block->notes);
                                                    } ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>