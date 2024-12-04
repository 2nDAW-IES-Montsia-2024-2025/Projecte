<?php

namespace App\Models;

class Point extends BaseModel
{
    public $latitude;

    public $longitude;

    protected static function getTableName(): string
    {
        return 'points';
    }

    protected static function mapDataToModel($data): Point
    {
        $point = new self();
        $point->id = $data['id'];
        $point->latitude = $data['latitude'];
        $point->longitude = $data['longitude'];
        $point->created_at = $data['created_at'];

        return $point;
    }
}