<?php
declare(strict_types=1);
namespace App\Http\Repository;

use App\Models\Movie;
use Illuminate\Http\Request;

use App\Http\Requests\CreateMovieRequest;
use App\Http\Requests\UpdateMovieRequest;

use App\Tool\SearchToolKit;
use DB;

class MovieRepository
{
    public function store(CreateMovieRequest $request)
    {
        Movie::create([
            'title'    => $request->title,
            'image_url' => $request->image_url,
            'published_year' => $request->published_year,
            'is_showing'     => $request->is_showing,
            'description'    => $request->description,
            'genre_id' => $request->genreId,
        ]);
    }

    public function update(UpdateMovieRequest $request){
        Movie::where('id','=',$request->id)
        ->update([
            'title'    => $request->title,
            'image_url' => $request->image_url,
            'published_year' => $request->published_year,
            'is_showing'     => $request->is_showing,
            'description'    => $request->description,
            'genre_id' => $request->genreId,
        ]);
    }

    public function destroy(Request $request)  {
        Movie::where('id', '=',$request->id)->delete();
    }

    public function isExists(Request $request)
    {
        return Movie::where('id','=',$request->id)->exists();
    }

    public function search(Request $request)
    {
        $searchToolKit = new searchToolKit();

        //型変換しとく
        $request->is_showing = (int) $request->is_showing;

        // %と_をエスケープ
        $escaped = $searchToolKit->sqlEscape($request->keyword);

        //and検索のために空白区切りでつくった配列を用意
        $wordListToSearch = $searchToolKit->preparationToAndSearch($escaped);

        // 基本クエリ
        $query = Movie::select('*');

        // キーワード追加
        foreach($wordListToSearch as $word){
            $query->where(function ($query) use ($word) {
                // タイトルか概要のどちらかなのでOr
                $query->where('title','like',"%$word%")
                ->orWhere('description','like',"%$word%");
            });
        }

        if ($request->is_showing === 2) {} // 絞らないから何もしなくて良い
        else if ($request->is_showing === 1) { $query->where('is_showing','=',1); }
        else if ($request->is_showing === 0) { $query->where('is_showing','=',0); }

        // 取得
        return $query->paginate(20);
    }

    public function getSpecifics(Request $request) {
        return Movie::select("*")
        ->where('id','=',$request->id)
        ->first();
    }

    // public function getTheData(Request $request) {
    //     return DB::table('movies')
    //     ->select('movies.*','genres.name as genre')
    //     ->leftJoin('genres','movies.genre','=','genres.id')
    //     ->where('movies.id','=',(int)$request->id)
    //     ->get();
    // }

}
