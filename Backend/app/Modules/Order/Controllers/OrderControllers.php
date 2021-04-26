<?php namespace App\Http\Controllers;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\Field;
use App\Models\City;
use App\Models\Membership;
use App\Models\Variable;
use App\Models\UserCard;
use App\Models\WebActions;
use App\Helper\JawalyHelper;
use App\Helper\MailHelper;
use Illuminate\Http\Request;
use DataTables;


class OrderControllers extends Controller {

    use \TraitsFunc;

    public function index(Request $request)
    {   
        if($request->ajax()){
            $data = Order::dataList();
            return Datatables::of($data['data'])->make(true);
        }
        $data['title'] = 'الطلبات';
        $data['name'] = 'order';
        $data['url'] = 'orders';
        $data['categories'] = [];
        $data['fields'] = Field::dataList(1)['data'];
        $data['cities'] = City::dataList(1)['data'];
        $data['memberships'] = Membership::dataList(1)['data'];
        return view('Order.Views.index')->with('data',(object) $data);
    }


    public function softDelete(Request $request) {
        $menuObj = Order::whereIn('id',$request->data)->update(['deleted_at'=>DATE_TIME,'deleted_by'=>USER_ID]);
        WebActions::newType(3,'Order');
        $data['status'] = \TraitsFunc::SuccessResponse("تم الحذف بنجاح");
        return response()->json($data);
    }

    public function changeStatus($status,Request $request) {
        $status = (int) $status;
        if(!in_array($status, [1,2,3,4,5,6,7])){
            $data['status'] = \TraitsFunc::ErrorMessage("يرجي مراجعة البيانات");
            return response()->json($data);
        }
        $menuObj = Order::whereIn('id',$request->data)->update(['status'=>$status,'updated_at'=>DATE_TIME,'updated_by'=>USER_ID]);
        WebActions::newType(2,'Order');
        $data['status'] = \TraitsFunc::SuccessResponse("تم التعديل بنجاح");
        return response()->json($data);
    }

    public function delete($id) {
        $id = (int) $id;
        $menuObj = Order::getOne($id);
        WebActions::newType(3,'Order');
        return \Helper::globalDelete($menuObj);
    }

    public function fastEdit() {
        $input = \Request::all();
        foreach ($input['data'] as $item) {
            $col = $item[1];
            $menuObj = Order::NotDeleted()->find($item[0]);
            if($col == 'status' && $item[2] == 2){
                $message = 'تم الموافقة علي طلبكم وهذا رابط استكمال التسجيل : '.config('app.FRONT_URL').'complete/'.encrypt($menuObj->id);
                JawalyHelper::sendSMS($menuObj->phone,$message);
            }
            $menuObj->$col = $item[2];
            $menuObj->updated_at = DATE_TIME;
            $menuObj->updated_by = USER_ID;
            $menuObj->save();
        }

        WebActions::newType(4,'Order');
        return \TraitsFunc::SuccessResponse('تم التعديل بنجاح');
    }

    public function status($id,$status)
    {
        $id = (int) $id;
        $status = (int) $status;

        $menuObj = Order::getOne($id);
        if($menuObj == null || !in_array($status, [2,3])) {
            return Redirect('404');
        }

        if($status == 2){
            $message = 'تم الموافقة علي طلبكم وهذا رابط استكمال التسجيل : '.config('app.FRONT_URL').'complete/'.encrypt($menuObj->id);
            JawalyHelper::sendSMS($menuObj->phone,$message);
        }

        $menuObj->status = $status;
        $menuObj->save();
        \Session::flash('success','تم التعديل بنجاح');
        return redirect()->back();
    }

    public function newMember(){
        $input = \Request::all();
        $id = $input['id'];
        $deliver_no = $input['deliver_no'];
        $orderObj = Order::getOne($id);
            
        $start_date = now()->format('Y-m-d');
        $end_date = date("Y-m-d", strtotime(now()->format('Y-m-d'). " + 1 year"));
        $menuObj = UserCard::NotDeleted()->where('deliver_no',$deliver_no)->where('order_id',$id)->first();
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

        $message = 'تم الموافقة علي طلبكم رقم '.$orderObj->order_no.'<br> وتم انشاء العضوية بنجاح. عضوية رقم : '.$menuObj->code.'<br> ورقم الشحنة هو :'.$input['deliver_no'];
        JawalyHelper::sendSMS($orderObj->phone,$message);
        $emailData = [
            'firstName' => $orderObj->name,
            'subject' => 'عضوية '.Variable::getVar('العنوان عربي'),
            'content' => $message,
            'to' => $orderObj->email,
        ];
        MailHelper::prepareEmail($emailData);
        $orderObj->status = 6;
        $orderObj->updated_at = DATE_TIME;
        $orderObj->updated_by = USER_ID;
        $orderObj->save();
        return \TraitsFunc::SuccessResponse('تم انشاء العضوية بنجاح');
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

        $addCount = WebActions::getByDate($date,$start,$end,1,'Order')['count'];
        $editCount = WebActions::getByDate($date,$start,$end,2,'Order')['count'];
        $deleteCount = WebActions::getByDate($date,$start,$end,3,'Order')['count'];
        $fastEditCount = WebActions::getByDate($date,$start,$end,4,'Order')['count'];

        $data['chartData1'] = $this->getChartData($start,$end,1,'Order');
        $data['chartData2'] = $this->getChartData($start,$end,2,'Order');
        $data['chartData3'] = $this->getChartData($start,$end,4,'Order');
        $data['chartData4'] = $this->getChartData($start,$end,3,'Order');
        $data['counts'] = [$addCount , $editCount , $deleteCount , $fastEditCount];
        $data['title'] = 'الطلبات';
        $data['miniTitle'] = 'الطلبات';
        $data['url'] = 'orders';

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
