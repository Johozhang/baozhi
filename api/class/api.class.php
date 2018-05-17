<?php
/**
 * Created by PhpStorm.
 * User: KLiu09
 * Date: 2017/11/16
 * Time: 10:33
 */

define('BSSE_URL','http://www.peugeot.com.cn/index.php?m=content&c=index');
define('API_PUBLIC_KEY',        '814886a264e057f7f80ddb22796ae0c2');
define('API_PRIVATE_KEY',       'f701b6ef459253d45a9a8064ea8049cf');
define('API_URL_TICKET',        'http://weixin.peugeot.ompchina.net/api/peugeotWeiXin/getSign.do');


class api{
    /*
     * 获取城市
     *
     * 参数
     *          pid
     * 返回值
     *          <option>请选择市</option>
     *          <option value="3392">北京市</option>
     * */
    public static function cityOption($pid)
    {
        $url=BSSE_URL.'&a=ajax_city&pid='.$pid;
        return file_get_contents($url);
    }
    /*
     * 获取经销商
     *
     * 参数
     *          cid
     * 返回值
     *          <option>请选择经销商</option>
     *          <option value="1">北京鹏翰贸易有限公司</option>
     *          <option value="2">北京金泰凯迪汽车销售服务有限公司</option>
     *          <option value="3">北京汇京柯曼汽车贸易发展有限公司</option>
     *          <option value="4">北京标龙京津汽车销售服务有限责任公司</option>
     *          <option value="5">北京嘉瑞雅汽车销售服务有限公司</option>
     *          <option value="6">北京博瑞祥致汽车销售服务有限公司</option>
     *          <option value="8">北京新双龙雅致汽车销售服务有限公司</option>
     *          <option value="417">北京汇京德通汽车销售服务有限责任公司</option>
     *          <option value="418">北京怡合瑞狮汽车销售服务有限公司</option>
     *          <option value="419">北京鑫万维瑞达汽车销售有限公司</option>
     *          <option value="594">北京元丰正通汽车销售服务有限公司</option>
     * */
    public static function dealerOption($cid)
    {
        $url=BSSE_URL.'&a=ajax_dealer&cid='.$cid;
        return file_get_contents($url);
    }

    /*
     * 自定义分享
     *
     * 参数
     *          url
     * 返回值
     *      {
     *        "response": {
     *            "head": {
     *                "public_key": null,
     *                "secret_key": null,
     *                "timestamp": "1479111695351",
     *                "return_code": "200",
     *                "return_msg": "ok"
     *             },
     *             "body": {
     *                 "timestamp": "1483789",
     *                  "signature": "d9e0d85272033e2df797134f2e51251cjoas",
     *                  "appId": "wxa92959vjasnvjkn",
     *                  "nonceStr": "d6461878-2381-4bfb-b7b8-ae8cajsnckjc"
     *             }
     *
     *          }
     *       }
     * */
    public static function setShare($url)
    {   if(!$url)
        {
            $data=array(
                'flag'=>0,
                'errCode'=>111601
            );
        }else{
            $timestamp = str_replace('.', '', (string) time());
            $param = array(
                'request' => array(
                    'head' => array(
                        'public_key' => API_PUBLIC_KEY,
                        'secret_key' => self::secret_key($timestamp),
                        'timestamp' => $timestamp
                    ),
                    'body' => array(
                        'url' => $url
                    )
                )
            );
            $response=self::curl_post_java(API_URL_TICKET,json_encode($param));
//            return ($response);
            $data = $response['response'];
            //$data->url = $url;

    }
        return $data;
    }
    /*
     * CURL 请求JAVA接口
     *
     * 参数
     *          url,data,time
     * 返回类型
     *              array
     *
     * */



    function curl_post_java($url, $data, $time=10)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, $time);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: '.strlen($data))); //对接 java
        if(stripos($url, 'https') === 0)
        {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        }
        $rs = curl_exec($ch);
        $en = curl_errno($ch);
        if($en){
            exit("ERROR curl_post() <br/>$url<br/>$en : ".curl_error($ch));
        }
        curl_close($ch);
//        return $rs;
        return json_decode($rs,true);
    }
    /*
     * CURL 请求JAVA接口
     *
     * 参数
     *          $timestamp
     * 返回值
     *          secret_key
     * */



    function secret_key($timestamp)
    {
        return strtoupper( md5( strtoupper( md5(API_PUBLIC_KEY.API_PRIVATE_KEY) ).$timestamp ) );
    }
}
