<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {
    protected $fillable = ['title', 'description', 'author_id', 'state_id', 'text_file_path'];

    public function author() {
        return $this->belongsTo(Author::class);
    }

    public function state() {
        return $this->belongsTo(State::class);
    }
}