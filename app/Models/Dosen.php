<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_dosen';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'nidn';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nidn', 'nama_dosen', 'jurusan', 'email', 'nomor_ponsel', 'status'
    ];

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Get the prodi associated with the jurusan.
     */
    public function prodi()
    {
        return $this->hasMany(Prodi::class, 'id_jurusan');
    }

    /**
     * Get the judul for the dosen.
     */
    public function judul()
    {
        return $this->hasMany(Judul::class);
    }
}
