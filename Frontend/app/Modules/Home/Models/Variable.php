<?php namespace App\Models;

use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;

class  Variable extends Model{

    use \TraitsFunc;

    protected $table = 'variables';
    protected $primaryKey = 'id';
    public $timestamps = false;

    static function getOne($id) {
        return self::NotDeleted()
            ->find($id);
    }

    static function variableList($type) {
        $input = \Request::all();

        $source = self::NotDeleted()->where('type',$type)->where(function ($query) use ($input) {
                if (isset($input['key']) && !empty($input['key'])) {
                    $query->where('var_key', 'LIKE', '%' . $input['key'] . '%');
                }
            });

        if (isset($input['value']) && !empty($input['value'])) {
            $source->where('var_value', 'LIKE', '%' . $input['value'] . '%');
        }

        if (isset($input['type']) && !empty($input['type'])) {
            $source->where('type', $input['type']);
        }

        return self::getObj($source);
    }

    static function getObj($source) {
        $sourceArr = $source->get();

        $list = [];
        foreach ($sourceArr as $key => $value) {
            $list[$key] = new \stdClass();
            $list[$key] = self::getData($value);
        }

        $data['data'] = $list;
        return $data;
    }

    static function getData($source) {
        $variableObj = new \stdClass();
        $variableObj->id = $source->id;
        $variableObj->key = $source->var_key;
        $variableObj->value = $source->var_value;
        $variableObj->var_type = $source->var_type;
        $variableObj->type = $source->type;
        $variableObj->created_at = $source->created_at;
        return $variableObj;
    }

    static function getVar($key) {
        $variableObj = self::where('var_key',$key)->first();
        return $variableObj != null ? $variableObj->var_value : '';
    }

}
