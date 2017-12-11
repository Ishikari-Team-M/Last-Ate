<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;

class lastAteController extends Controller
{
    function fetchAll() {
        //モデルから食べ物を全件取得
        $allFoods = Food::all();

        header('Access-Control-Allow-Origin: *');
        header( 'Access-Control-Allow-Headers: Authorization, Content-Type' );

        return response()->json($allFoods);
    }

    function postFood(Request $request) {
        //postで送られてきた名前を取得
       $foodName = $request->foodName;
        //モデルから食べ物情報を取得
       $food = Food::where('name',$foodName)->first();
        //食べ物がDBにあるなら更新、ないなら作成
       if(isset($food)) {
            Food::where(['name' => $foodName])->update(['name' => $foodName]);
       } else {
            Food::create([
                'name' => $foodName
            ]);
       };
       //更新後の全件の名前のみを取得
       $allFoods = Food::select('name')->get();

       header('Access-Control-Allow-Origin: *');
       header( 'Access-Control-Allow-Headers: Authorization, Content-Type' );

       return response()->json($allFoods);
    }

    function fetchTime(Request $request) {
        $foodName = $request->foodName;

        $food = Food::where('name',$foodName)->first();
        if(isset($food)){
            //送られてきたデータの名前と最終更新日時を取得
            $food = Food::where('name',$foodName)->select('name','updated_at')->get();
        } else {
            $food = "一致するデータが見つかりません。";
        }

        header('Access-Control-Allow-Origin: *');
        header( 'Access-Control-Allow-Headers: Authorization, Content-Type' );

        return response()->json($food);
    }
}
