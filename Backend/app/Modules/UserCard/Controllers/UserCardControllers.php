<?php namespace App\Http\Controllers;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\UserCard;
use App\Models\Order;
use App\Models\User;
use App\Models\UserMember;
use App\Models\Membership;
use App\Models\WebActions;
use App\Models\UserRequest;
use App\Models\Variable;
use Illuminate\Http\Request;
use DataTables;
use App\Helper\JawalyHelper;
use App\Helper\MailHelper;

class UserCardControllers extends Controller {

    use \TraitsFunc;

    protected function validateObject($input){
        $rules = [
            'user_id' => 'required',
            'membership_id' => 'required',
        ];

        $message = [
            'user_id.required' => 'يرجي اختيار المستخدم',
            'membership_id.required' => "يرجي اختيار نوع العضوية",
        ];

        $validate = \Validator::make($input, $rules, $message);

        return $validate;
    }

    public function index(Request $request)
    {   
        if($request->ajax()){
            $data = UserCard::dataList();
            return Datatables::of($data['data'])->make(true);
        }
        $data['memberships'] = Membership::dataList(1)['data'];
        return view('UserCard.Views.index')->with('data', (object) $data);
    }

    public function delete($id) {
        $id = (int) $id;
        $menuObj = UserCard::getOne($id);
        Order::NotDeleted()->where('id',$menuObj->order_id)->update(['status'=>3]);
        WebActions::newType(3,'UserCard');
        return \Helper::globalDelete($menuObj);
    }

     public function newMember(){
        $input = \Request::all();
        $id = $input['id'];
        $deliver_no = $input['deliver_no'];
        $orderObj = Order::getOne($id);
            
        $start_date = now()->format('Y-m-d');
        $end_date = date("Y-m-d", strtotime(now()->format('Y-m-d'). " + 1 year"));
        $menuObj = UserCard::NotDeleted()->where('order_id',$id)->first();
        if(!$menuObj){
            $menuObj = new UserCard;
            $menuObj->code = UserCard::getNewCode();
        }
        $menuObj->order_id = $orderObj->id;
        $menuObj->membership_id = $orderObj->membership_id;
        $menuObj->deliver_no = $input['deliver_no'];
        $menuObj->start_date = $start_date;
        $menuObj->end_date = $end_date;
        $menuObj->status = 1;
        $menuObj->sort = UserCard::newSortIndex();
        $menuObj->created_at = DATE_TIME;
        $menuObj->created_by = USER_ID;
        $menuObj->save();

        $message = 'تم الموافقة علي طلبكم رقم '.$orderObj->order_no.'\r\n وتم انشاء العضوية بنجاح. عضوية رقم : '.$menuObj->code.'\r\n ورقم الشحنة هو :'.$input['deliver_no'];
        JawalyHelper::sendSMS($orderObj->phone,$message);
        $emailData = [
            'firstName' => $orderObj->name,
            'subject' => 'عضوية '.Variable::getVar('العنوان عربي'),
            'content' => str_replace('\r\n', '<br>', $message),
            'to' => $orderObj->email,
        ];
        MailHelper::prepareEmail($emailData);
        $orderObj->status = 6;
        $orderObj->updated_at = DATE_TIME;
        $orderObj->updated_by = USER_ID;
        $orderObj->save();
        return \TraitsFunc::SuccessResponse('تم انشاء العضوية بنجاح');
    }

    public function fastEdit() {
        $input = \Request::all();
        foreach ($input['data'] as $item) {
            $col = $item[1];
            $menuObj = UserCard::find($item[0]);
            $menuObj->$col = $item[2];
            $menuObj->updated_at = DATE_TIME;
            $menuObj->updated_by = USER_ID;
            $menuObj->save();

            if($col == 'status'){
                if($item[2] == 0){
                    Order::NotDeleted()->where('order_id',$menuObj->order_id)->update(['status',3]);
                }
            }
        }

        WebActions::newType(4,'UserCard');
        return \TraitsFunc::SuccessResponse('تم التعديل بنجاح');
    }

    public function charts() {
        $input = \Request::all();
        $now = date('Y-m-d');
        $start = $now;
        $end = $now;
        $date = null;
        if(isset($input['from']) && !empty($input['from']) && isset($input['to']) && !empty($input['to'])){
            $start = $input['from'].' 00:00:00';
            $end = $input['to'].' 23:59:59';
            $date = 1;
        }

        $addCount = WebActions::getByDate($date,$start,$end,1,'UserCard')['count'];
        $editCount = WebActions::getByDate($date,$start,$end,2,'UserCard')['count'];
        $deleteCount = WebActions::getByDate($date,$start,$end,3,'UserCard')['count'];
        $fastEditCount = WebActions::getByDate($date,$start,$end,4,'UserCard')['count'];

        $data['chartData1'] = $this->getChartData($start,$end,1,'UserCard');
        $data['chartData2'] = $this->getChartData($start,$end,2,'UserCard');
        $data['chartData3'] = $this->getChartData($start,$end,4,'UserCard');
        $data['chartData4'] = $this->getChartData($start,$end,3,'UserCard');
        $data['counts'] = [$addCount , $editCount , $deleteCount , $fastEditCount];
        $data['title'] = 'بطاقات الاعضاء';
        $data['miniTitle'] = 'بطاقات الاعضاء';
        $data['url'] = 'userCards';

        return view('TopMenu.Views.charts')->with('data',(object) $data);
    }

    public function getChartData($start=null,$end=null,$type,$moduleName){
        $input = \Request::all();
        
        if(isset($input['from']) && !empty($input['from']) && isset($input['to']) && !empty($input['to'])){
            $start = $input['from'];
            $end = $input['to'];
        }

        $datediff = strtotime($end) - strtotime($start);
        $daysCount = round($datediff / (60 * 60 * 24));
        $datesArray = [];
        $datesArray[0] = $start;

        if($daysCount > 2){
            for($i=0;$i<$daysCount;$i++){
                $datesArray[$i] = date('Y-m-d',strtotime($start.'+'.$i."day") );
            }
            $datesArray[$daysCount] = $end;  
        }else{
            for($i=1;$i<24;$i++){
                $datesArray[$i] = date('Y-m-d H:i:s',strtotime($start.'+'.$i." hour") );
            }
        }

        $chartData = [];
        $dataCount = count($datesArray);

        for($i=0;$i<$dataCount;$i++){
            if($dataCount == 1){
                $count = WebActions::where('type',$type)->where('module_name',$moduleName)->where('created_at','>=',$datesArray[0].' 00:00:00')->where('created_at','<=',$datesArray[0].' 23:59:59')->count();
            }else{
                if($i < count($datesArray)){
                    $count = WebActions::where('type',$type)->where('module_name',$moduleName)->where('created_at','>=',$datesArray[$i].' 00:00:00')->where('created_at','<=',$datesArray[$i].' 23:59:59')->count();
                }
            }
            $chartData[0][$i] = $datesArray[$i];
            $chartData[1][$i] = $count;
        }
        return $chartData;
    }


}
