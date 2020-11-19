<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plugin extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'author',
        'version',
        'status',
        'last_added'
    ];

    public function validatePlugin($newPlugin)
    {
        $existPlugin = false;
        $plugins = $this->all();
        foreach($plugins as $plugin) {
            if($newPlugin != $plugin)  continue;
            else {$existPlugin = true; break;} 
        }

        return $existPlugin;
    }
}
