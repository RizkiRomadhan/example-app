<?php

namespace App\Models;

use Brick\Math\BigInteger;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Judul extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_judul';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'judul', 'nim', 'status', 'nidn_dosen_1', 'nidn_dosen_2',
    ];

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    // protected $keyType = 'BigInteger';

    /**
     * Get the prodi associated with the jurusan.
     */


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

    public function dosen()
    {
        return $this->belongsTo(Judul::class, 'nidn_dosen_1');
    }
}
