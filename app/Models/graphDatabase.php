<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class graphDatabase extends Model
{
    use HasFactory;
    protected $table = 'graph_databases';
    protected $primaryKey = 'graph_id';

    protected $fillable = [
        'citylng','intensity','sector','topic','insight','swot','url','region','start_year','end_year','impact','added','published','city','country','relevance','pestle','source','title','likelihood'
    ];
}