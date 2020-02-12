<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/** Model for handeling database access to the books table.
 *  There is only one method, to get books depending on search criteria.
 *  If either author or title are empty all books will be listed.
 */

class BookModel extends Model
{
    public function getAll()
    {
        return DB::table('books')
            ->get();   
    }

    public function get($id)
    {
        return DB::table('books')
            ->where('id', $id)
            ->first();
    }

    public function find($author, $title)
    {
        return DB::table('books')
            ->whereRaw('LOWER(author) like ?', ['%'.strtolower($author).'%'])
            ->orWhereRaw('LOWER(title) like ?', ['%'.strtolower($title).'%'])
            ->get();
    }
}
