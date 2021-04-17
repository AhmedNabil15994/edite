<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebActions extends Model{

    use \TraitsFunc;

    protected $table = 'web_actions';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function User(){
        return $this->belongsTo('App\Models\User','created_by');
    }

    static function getOne($id){
        return self::where('id', $id)
            ->first();
    }

    static function getByDate($date=null,$start=null,$end=null,$type=null,$module_name=null){
        $source = self::where(function($whereQuery) use ($date,$start,$end,$type,$module_name){
            if($date == null){
                $whereQuery->where('created_at','>=',now()->format('Y-m-d').' 00:00:00')->where('created_at','<=',now()->format('Y-m-d').' 23:59:59');
            }else{
                $whereQuery->where('created_at','>=',$start)->where('created_at','<=',$end);
            }
            if($type != null){
                $whereQuery->where('type',$type);
            }
            if($module_name != null){
                $whereQuery->where('module_name',$module_name);
            }
        })->orderBy('id','DESC');
        return self::generateObj($source);
    }

    static function dataList() {
        $input = \Request::all();

        $source = self::orderBy('id','ASC');

        return self::generateObj($source);
    }

    static function generateObj($source){
        $sourceArr = $source->get();
        $count = $source->count();

        $list = [];
        foreach($sourceArr as $key => $value) {
            $list[$key] = new \stdClass();
            $list[$key] = self::getData($value);
        }

        // $data['pagination'] = \Helper::GeneratePagination($sourceArr);
        $data['data'] = $list;
        $data['count'] = $count;

        return $data;
    }

    static function getData($source) {
        $types = self::getType($source->type);
        $data = new  \stdClass();
        $data->id = $source->id;
        $data->type = $source->type;
        $data->typeText = $types[0];
        $data->label = $types[1];
        $data->username = $source->created_by != 0 || $source->created_by != null ? $source->User->username: '';
        $data->module_name = $source->module_name;
        $data->module_page = self::getPageTitle($source->module_name);
        $data->created_at = \Helper::formatDateForDisplay($source->created_at,true);
        $data->created_at2 = \Carbon\Carbon::createFromTimeStamp(strtotime($source->created_at))->diffForHumans();
        return $data;
    }

    static function getPageTitle($name){
        $text = '';
        if($name == 'TopMenu'){
            $text = 'القوائم العلوية';
        }elseif($name == 'BottomMenu'){
            $text = 'القوائم السفلية';
        }elseif($name == 'SideMenu'){
            $text = 'القوائم الجانبية';
        }elseif($name == 'Target'){
            $text = 'الفئة المستهدفة';
        }elseif($name == 'Advantage'){
            $text = 'مميزاتنا';
        }elseif($name == 'Benefit'){
            $text = 'فوائدنا';
        }elseif($name == 'City'){
            $text = 'المدن';
        }elseif($name == 'Page'){
            $text = 'الصفحات';
        }elseif($name == 'Slider'){
            $text = 'الاسلايدر';
        }elseif($name == 'ContactUs'){
            $text = 'الاتصال بنا';
        }elseif($name == 'Variable'){
            $text = 'الاعدادات';
        }elseif($name == 'Group'){
            $text = 'مجموعات المشرفين';
        }elseif($name == 'User'){
            $text = 'المشرفين والاداريين';
        }elseif($name == 'Log'){
            $text = 'سجلات الدخول للنظام';
        }elseif($name == 'BlockedUser'){
            $text = 'الاغضاء المحظورة';
        }elseif($name == 'Order'){
            $text = 'طلبات خدمات الاعضاء';
        }elseif($name == 'OrderCategory'){
            $text = 'تصنيفات الخدمات';
        }elseif($name == 'UserCard'){
            $text = 'بطاقات الاعضاء';
        }elseif($name == 'UserRequest'){
            $text = 'طلبات البطاقة المطبوعة';
        }elseif($name == 'UserMember'){
            $text = 'اعضاء الشاب الريادي';
        }elseif($name == 'ProjectCategory'){
            $text = 'تصنيفات المشاريع';
        }elseif($name == 'Project'){
            $text = 'مشاريع الاعضاء';
        }elseif($name == 'BlogCategory'){
            $text = 'تصنيفات المدونة';
        }elseif($name == 'Blog'){
            $text = 'المدونة';
        }elseif($name == 'Membership'){
            $text = 'العضويات';
        }elseif($name == 'Feature'){
            $text = 'مميزات العضويات';
        }elseif($name == 'Coupon'){
            $text = 'كوبونات الخصم';
        }


        return $text;
    }

    static function getType($type){
        $text = '';
        $label = '';
        if($type == 1){
            $text = 'اضافة';
            $label = 'brand';
        }elseif($type == 2){
            $text = 'تعديل';
            $label = 'success';
        }elseif($type == 3){
            $text = 'حذف';
            $label = 'danger';
        }elseif($type == 4){
            $text = 'تعديل سريع';
            $label = 'primary';
        }
        return [$text,$label];
    }

    static function getCountByType($type){
        return self::where('type',$type)->count();
    }

    static function newType($type,$name,$user=null){
        $myObj = new self;
        $myObj->type = $type;
        $myObj->module_name = $name;
        $myObj->created_at = DATE_TIME;
        if($user != null){
            $myObj->created_by = $user;
        }else{
            $myObj->created_by = USER_ID;
        }
        $myObj->save();
    }

}
