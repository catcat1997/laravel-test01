<?php

namespace App\Models\home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class myModel extends Model
{
    use HasFactory;
 
    // 定義模型關聯的數據表 (一個模型只操作一張表) $table
    protected $table = 'member';

    // 定義主鍵 $primarykey
    protected $primaryKey = 'id';

    // Eloquent 假設主鍵是一個自增的整數值，這意味著默認情況下主鍵會自動轉換為 int 類型。
    // 如果您希望使用非遞增或非數字的主鍵則需要設置公共的 $incrementing 屬性設置為 false：
    // public $incrementing = false;

    // 如果你的主鍵不是一個整數，你需要將模型上受保護的 $keyType 屬性設置為 string：
    // protected $keyType = 'string';

    // 時間戳 
    // 默認情況下，Eloquent 預期你的數據表中存在 created_at 和 updated_at 兩個字段 。如果你不想讓 Eloquent
    // 自動管理這兩個列， 請將模型中的 $timestamps 屬性設置為 false：
    public $timestamps = false;

    // 批量賦值   在開始之前，你應該定義好模型上的哪些屬性是可以被批量賦值的。
    protected $fillable = ['id','name','age','email','avatar'];
    

}
