<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BookModel extends Model
{
    public function find($author, $title) {
        return DB::table('books')
        ->whereRaw('LOWER(author) like ?', ['%'.strtolower($author).'%'])
        ->orWhereRaw('LOWER(title) like ?', ['%'.strtolower($title).'%'])
        ->get();
    }
}
