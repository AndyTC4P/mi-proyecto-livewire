<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CV extends Model
{
    use HasFactory;

    // Forzar el nombre correcto de la tabla si es necesario
    protected $table = 'cvs';  // Verifica que sea el nombre correcto

    protected $fillable = [
        'user_id',
        'nombre',
        'apellido',
        'titulo',
        'perfil',
        'imagen',
        'correo',
        'telefono',
        'direccion',
        'pais',
        'ciudad',
        'experiencia',
        'educacion',
        'habilidades',
        'idiomas',
        'publico',
    ];
    
    // Convertir experiencia y educación a array automáticamente
    protected $casts = [
        'experiencia' => 'array',
        'educacion' => 'array',
        'habilidades' => 'array',
        'idiomas' => 'array',
    ];
    
    /**
     * Relación: Un CV pertenece a un usuario
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


