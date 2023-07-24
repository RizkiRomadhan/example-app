<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revisi extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'revisi';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'deksripsi', 'waktu', 'gambar',
    ];

    /**
     * Get the user that owns the phone.
     */
    public function dosen1()
    {
        return $this->belongsTo(Dosen::class, 'nidn_dosen_1', 'nidn');
    }

    /**
     * Get the user that owns the phone.
     */
    public function dosen2()
    {
        return $this->belongsTo(Dosen::class, 'nidn_dosen_2', 'nidn');
    }
}
