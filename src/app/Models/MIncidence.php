<?php

namespace App\Models;

class MIncidence extends BaseModel
{
    public int $element_id;
    public string $name;
    public ?string $description;
    public ?string $photo;

    protected static function getTableName(): string
    {
        return 'incidences';
    }

    public static function mapDataToModel($data): MIncidence
    {
        $incidence = new self();
        $incidence->id = $data['id'];
        $incidence->element_id = $data['element_id'];
        $incidence->name = $data['name'];
        $incidence->description = $data['description'];
        $incidence->photo = $data['photo'];
        $incidence->created_at = $data['created_at'];
        return $incidence;
    }

    // Fetch the element of the incidence
    public function element(): MElement
    {
        return $this->belongsTo(MElement::class, 'element_id');
    }
}
