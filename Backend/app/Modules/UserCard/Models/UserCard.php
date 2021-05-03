<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCard extends Model{

    use \TraitsFunc;

    protected $table = 'user_cards';
    protected $primaryKey = 'id';
    public $timestamps = false;

    static function getOne($id){
        return self::NotDeleted()
            ->where('id', $id)
            ->first();
    }

    public function Creator(){
        return $this->hasOne('App\Models\User','id','created_by');
    }

    public function MemberShip(){
        return $this->hasOne('App\Models\Membership','id','membership_id');
    }

    public function Order(){
        return $this->hasOne('App\Models\Order','id','order_id');
    }

    static function dataList($status=null) {
        $input = \Request::all();

        $source = self::NotDeleted()->where(function ($query) use ($input,$status) {
                    if (isset($input['name_ar']) && !empty($input['name_ar'])) {
                        $query->where('name_ar', 'LIKE', '%' . $input['name_ar'] . '%');
                    } 
                    if (isset($input['name_en']) && !empty($input['name_en'])) {
                        $query->where('name_en', 'LIKE', '%' . $input['name_en'] . '%');
                    }
                    if (isset($input['membership_id']) && !empty($input['membership_id'])) {
                        $query->where('membership_id',  $input['membership_id']);
                    }  
                    if (isset($input['code']) && !empty($input['code'])) {
                        $query->where('code',  $input['code']);
                    }
                    if (isset($input['start_date']) && !empty($input['start_date'])) {
                        $query->where('start_date',  $input['start_date']);
                    }
                    if (isset($input['end_date']) && !empty($input['end_date'])) {
                        $query->where('end_date',  $input['end_date']);
                    } 
                    if (isset($input['id']) && !empty($input['id'])) {
                        $query->where('id',  $input['id']);
                    } 
                    if (isset($input['status']) && !empty($input['status'])) {
                        $query->where('status',  $input['status']);
                    } 
                    if($status != null){
                        $query->where('status',$status);
                    }
                })->orderBy('sort','ASC');

        return self::generateObj($source);
    }

    static function generateObj($source){
        $sourceArr = $source->get();

        $list = [];
        foreach($sourceArr as $key => $value) {
            $list[$key] = new \stdClass();
            $list[$key] = self::getData($value);
        }

        // $data['pagination'] = \Helper::GeneratePagination($sourceArr);
        $data['data'] = $list;

        return $data;
    }

    static function getData($source) {
        $data = new  \stdClass();
        $detailsObj = OrderDetails::getData($source->Order->Details);
        $data->id = $source->id;
        $data->order_id = $source->order_id;
        $data->deliver_no = $source->deliver_no != null ? $source->deliver_no : '';
        $data->card_name = $source->order_id != null ? $source->Order->card_name : '';
        $data->identity_no = $detailsObj != null ? $detailsObj->identity_no : '';
        $data->identity_end_date = $detailsObj != null ? $detailsObj->identity_end_date : '';
        $data->image = $detailsObj != null ? $detailsObj->image : '';
        $data->identity_image = $detailsObj != null ? $detailsObj->identity_image : '';
        $data->code = $source->code;
        $data->membership_id = $source->membership_id;
        $data->start_date = $source->start_date;
        $data->end_date = $source->end_date;
        $data->membership_name = $source->membership_id != null ? $source->Membership->title : '';
        $data->sort = $source->sort;
        $data->status = $source->status;
        $data->statusText = self::getStatus($source->status);
        $data->created_at = \Helper::formatDateForDisplay($source->created_at,true);
        return $data;
    }

    static function newSortIndex(){
        return self::count() + 1;
    }

    static function getStatus($status){
        $text = '';
        if($status == 0){
            $text =  'مسودة';
        }elseif ($status == 1) {
            $text = 'مفعلة';
        }elseif ($status == 2) {
            $text = 'لم يتم التصدير';
        }
        return $text;
    }

    static function getNewCode(){
        $code = '1000';
        $lastCode = self::orderBy('id','DESC')->first();
        if($lastCode != null){
            $code = $lastCode->code+ 1;
        }
        return $code;
    }

}
