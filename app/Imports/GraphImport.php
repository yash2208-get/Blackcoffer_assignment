<?php

namespace App\Imports;

use App\Models\graphDatabase;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class GraphImport implements ToModel ,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        $request = Carbon::createFromFormat('F, d Y H:i:s', $row['added']);
        $date = Carbon::parse($request);
        $added = $date->format('Y-m-d h:i:s');
        // dd($added);

        $req = Carbon::createFromFormat('F, d Y H:i:s', $row['published']);
        $date_published = Carbon::parse($req);
        $published = $date_published->format('Y-m-d');
        // dd($row['title']);

        $data_add = new graphDatabase;
        $data_add->intensity = $row['intensity'];
        $data_add->sector = $row['sector'];
        $data_add->topic = $row['topic'];
        $data_add->insight = $row['insight'];
        $data_add->swot = $row['swot'];
        $data_add->url = $row['url'];
        $data_add->region = $row['region'];
        $data_add->start_year = $row['start_year'];
        $data_add->end_year = $row['end_year'];
        $data_add->impact = $row['impact'];
        $data_add->added = $added;
        $data_add->published = $published;
        $data_add->city = $row['city'];
        $data_add->country = $row['country'];
        $data_add->relevance = $row['relevance'];
        $data_add->pestle = $row['pestle'];
        $data_add->source = $row['source'];
        $data_add->title = $row['title'];
        $data_add->likelihood = $row['likelihood'];
        $data_add->save();
    }
}
