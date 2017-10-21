<?php
/**
 * Created by PhpStorm.
 * User: soft
 * Date: 9/26/2017
 * Time: 6:18 PM
 */

namespace App\Utils;


use App\Models\HashTag;
use Illuminate\Database\Eloquent\Model;

class JsonResult
{

    private $result;

    /**
     * JsonResult constructor.
     * @param null $message
     * @param null $data
     */
    public function __construct($message =null, $data=null)
    {
        $this->result = response(['success' => true, 'error' => false, 'message' => $message, 'data' => $data]);
    }

    public static function JSONSuccessResult($message=null, $data=null)
    {
        $result = ['success' => true, 'error' => false, 'message' => $message, 'data'=> $data];
        return response($result);
    }

    public static function JSONErrorResult($message=null, $data=null)
    {
        $result = ['success' => false, 'error' => true, 'message' => $message, 'data'=> $data];
        return response()->json($result);
    }

}