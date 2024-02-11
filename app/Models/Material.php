<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StudyYear;
use App\Models\Grade;

class Material extends Model
{
    use HasFactory;
    protected $fillable = [
        'materialName',
        'studyYearId',
        'gradeId'
    ];

    public function studyyear() {
        return $this->belongsTo(StudyYear::class);
    }
    public function grade() {
        return $this->belongsTo(Grade::class);
    }
}