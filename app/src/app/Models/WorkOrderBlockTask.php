<?php

namespace App\Models;

class WorkOrderBlockTask extends BaseModel
{
    public int $work_orders_block_id;

    public int $task_id;

    public ?int $tree_type_id;

    public int $status;

    protected static function getTableName(): string
    {
        return 'work_orders_blocks_tasks';
    }

    protected static function mapDataToModel($data): WorkOrderBlockTask
    {
        $work_order_block_task = new self();
        $work_order_block_task->id = $data['id'];
        $work_order_block_task->work_orders_block_id = $data['work_orders_block_id'];
        $work_order_block_task->task_id = $data['task_id'];
        $work_order_block_task->tree_type_id = $data['tree_type_id'];
        $work_order_block_task->status = $data['status'];

        return $work_order_block_task;
    }

    public function workOrderBlock(): WorkOrderBlock
    {
        return $this->belongsTo(WorkOrderBlock::class, 'work_orders_block_id');
    }

    public function treeType(): ?TreeType
    {
        return $this->belongsTo(TreeType::class, 'tree_type_id');
    }

    public function task(): TaskType
    {
        return $this->belongsTo(TaskType::class, 'task_id');
    }
}
