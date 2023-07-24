<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_mahasiswa';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'nim';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nim', 'nama_mahasiswa', 'id_jurusan', 'id_prodi', 'id_lab', 'email', 'nomor_ponsel', 'status', 
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
    
     /**
     * Get the user that owns the phone.
     */
    public function dosen1()
    {
        return $this->belongsTo(Dosen::class, 'nidn_dosen1', 'nidn');
    }

    /**
     * Get the user that owns the phone.
     */
    public function dosen2()
    {
        return $this->belongsTo(Dosen::class, 'nidn_dosen2', 'nidn');
    }
     
}
