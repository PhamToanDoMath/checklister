<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Task extends Model implements HasMedia
{
    use HasFactory, softDeletes, InteractsWithMedia;

    protected $fillable = [
        'checklist_id',
        'name',
        'description',
        'position',
        'task_id',
        'user_id',
        'completed_at',
        'added_my_day_at',
        'is_important',
        'due_date',
        'reminder_date'
    ];

    protected $dates = [
        'date',
        'reminder_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
