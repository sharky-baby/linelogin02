<?php

namespace App\Models;

// 使うツールを取り込む
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Productという名前のツール（クラス）を作っているー
class Product extends Model
{
    // ダミーレコードを代入する機能を使うことを宣言
    use HasFactory;

    // 以下の情報（属性）を一度に保存したり変更したりできるように設定
    // $fillable を設定しないと、Laravelはセキュリティリスクを避けるために、この一括代入をブロックするー
    protected $fillable = [
        'product_name',
        'price',
        'stock',
        'company_id',
        'comment',
        'img_path',
    ];

    // Productモデルがsalesテーブルとリレーション関係を結ぶためのメソッド
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    // Productモデルがcompanysテーブルとリレーション関係を結ぶ為のメソッド
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}