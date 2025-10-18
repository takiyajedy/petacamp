<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampSite extends Model
{
    use HasFactory;

    protected $table = 'camp_sites';

    /**
     * 🧩 Field yang boleh diisi melalui form
     */
    protected $fillable = [
        'name',
        'description',
        'state',
        'address',
        'latitude',
        'longitude',
        'image',
        'has_toilet',
        'has_river',
        'has_electricity',
        'has_bbq',
        'is_approved',
        'user_id',
    ];

    /**
     * 🌿 Field boolean untuk kemudahan
     */
    protected $casts = [
        'has_toilet' => 'boolean',
        'has_river' => 'boolean',
        'has_electricity' => 'boolean',
        'has_bbq' => 'boolean',
        'is_approved' => 'boolean',
    ];

    /**
     * 👤 Setiap campsite dimiliki oleh seorang user (pencadang)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 🖼️ Dapatkan URL penuh gambar jika ada
     */
    public function getImageUrlAttribute()
    {
        if ($this->image && str_starts_with($this->image, 'http')) {
            return $this->image;
        }
        return $this->image ? asset('storage/' . $this->image) : asset('images/default_camp.jpg');
    }

    /**
     * 📍 Dapatkan koordinat dalam bentuk array (optional helper)
     */
    public function getCoordinatesAttribute()
    {
        return [
            'lat' => $this->latitude,
            'lng' => $this->longitude,
        ];
    }
}
