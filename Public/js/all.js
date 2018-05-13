/**
 * Created by KLiu09 on 2017/11/16.
 */

/* *	项目的js接口文件，这里包含了所有前端交互的js接口， * */
/** * * @type {Object} */

window.alert = function(name){
  var iframe = document.createElement("IFRAME");
  iframe.style.display="none";
  iframe.setAttribute("src", 'data:text/plain,');
  document.documentElement.appendChild(iframe);
  window.frames[0].window.alert(name);
  iframe.parentNode.removeChild(iframe);
 };
//重写alert 防止弹窗附带网址信息

var api = {
    url: '',
    ver: 1.0,
//  base: 'Public/api/api.php', //正式服务器
       base: '/Public/api/api.php', //测试服务器
    /** 1.初始化微信自定义分享
     *  * @url : setShare
     *  * @param
     *  *       url 当前访问的完整地址
     *  *
     *  * @return JSON
     *  *       {   "appId": "wx8c3bc9e96a982e4b",
     *  *            "timestamp": "1502437973462",
     *  *            "nonceStr": "66f9b441-d351-42c6-97a7-6537d359409e",
     *  *            "signature": "820cce31aa6feec4426b4524860c97ca595e6c7b"
     *  *        }
     *  *       {"flag":0,"msg":"IP\u672a\u6388\u6743\uff0c\u6765\u8bbfIP\u4e3a\uff1a[\"210.22.135.66\"]"}
     *  *       {"flag": 0,"errorCode": 111601 }
     *  */
    initShare: function (url) {
        console.log(url);
        var returnJson = {};
        $.ajax({
            'url': api.base + '?r=' + Math.random(),
            'type': 'post',
            'async': false,
            'data': {
                'action': 'initShare',
                'url': url
            },
            'dataType': 'json',
            'success': function (r) {
                returnJson = r;
            }
        });
        return returnJson;
    },
    /** 2.获取城市
     *  * @url : getCityOption
     *  * @param
     *  *       pid 省编号
     *  *
     *  * @return JSON
     *  *       "
     *              <option>请选择市</option>
     *              <option value="3392">北京市</option>
     *          "
     *  */

    getCityOption: function (pid) {
        var returnJson = {};
        $.ajax({
            'url': api.base + '?r=' + Math.random(),
            'type': 'post',
            'async': false,
            'data': {
                'action': 'city',
                'pid': pid
            },
            'dataType': 'json',
            'success': function (r) {
                returnJson = r;
            }
        });
        return returnJson;
    },
    /** 3.获取经销商店铺名
     *  * @url : getDealerOption
     *  * @param
     *  *       url 当前访问的完整地址
     *  *
     *  * @return JSON
     *  *       "
     *              <option>请选择经销商</option>
     *              <option value="1">北京鹏翰贸易有限公司</option>
     *              <option value="2">北京金泰凯迪汽车销售服务有限公司</option>
     *          "
     *  */
    getDealerOption: function (cid) {
        var returnJson = {};
        $.ajax({
            'url': api.base + '?r=' + Math.random(),
            'type': 'post',
            'async': false,
            'data': {
                'action': 'dealer',
                'cid': cid
            },
            'dataType': 'json',
            'success': function (r) {
                returnJson = r;
            }
        });
        return returnJson;
    },

    /** 4.提交预约信息
     *  * @url : getDealerOption
     *  * @param
     *  *       name            姓名
     *  *       phone_number    电话
     *  *       province        省份
     *  *       city            城市
     *  *       dealer_id       经销商
     *  *
     *  * @return JSONP
     *  *      ({"status":0})   信息提交失败
     *  *      ({"status":1})   信息提交成功
     *  */
    postTestDriveInfo: function (name,tel,car,province,city,shop) {
        console.log('姓名:' + name + '电话:' + tel +  '车型：' + car +'省份:' + province + '城市:' + city + '经销商:' + shop);
        var returnJson = {};
        //var p = $('#frm').serialize();
        var hostHTTP = (document.location.protocol=='https' || document.location.protocol=='https:')?'https':'http';

        //console.log("Host = " + document.location.protocol);

        $.ajax({
            url: hostHTTP+'://www.peugeot.com.cn/index.php?m=content&c=testdrive&a=app_testdrive5008H5&r=' + Math.random(),
            type: 'get',
            async: false,
            dataType: 'jsonp',
            // jsonp: 'callback', //默认callback
            // jsonpCallback: "success_callback", //这里为后台返回的动态函数
            data: {
                car_code: car,
                dealer_code: shop,
                name: name,
                phone_number: tel,
                // data_source_code: '2018bjautoshow',
                data_source_code: '2008mapping',
                add_province: province,
                add_city: city
            },
            complete: function (XMLHttpRequest, textStatus) {
                console.log('complete',textStatus);
            },
            success: function (data) {
                console.log('success',data);
                if (data.status == 1) {
                    alert('预约成功');
                    //$('#frm')[0].reset();
                    $(".p1-text1").val("");
                    $(".p1-text2").val("");
                    $(".sel-che").val('');
                    $(".sel-che1").val('');
                    $(".sel-che2").html("");
                    $(".sel-che2").append("<option>请选择城市</option>");
                    $(".sel-che3").html("");
                    $(".sel-che3").append("<option>请选择经销商</option>");
                    $(".form-sub").fadeOut();
                }
                else {
                    alert('预约失败');
                }
            },
            error: function (XHR, textStatus, errorThrown) {
                console.log('error',errorThrown)
            }
        });
        return returnJson;
    }

};


$(".sel-che1").on("change", function () {
    var province_val = $(this).val();
    console.log(province_val);
    if (province_val) {
        var provinceList = api.getCityOption(province_val);
        if (provinceList) {
            $(".sel-che2").empty();
            $(".sel-che2").append(provinceList);
        } else {
            $(".sel-che2").empty();
            $(".sel-che2").append('<option value="">请选择城市</option>');
        }
       
    }
});
$(".sel-che2").on("change", function () {
    var city_val = $(this).val();
    if (city_val) {
        var productList = api.getDealerOption(city_val);
        //console.log(productList);
        if (productList) {
            $(".sel-che3").empty();
            $(".sel-che3").append(productList);
        } else {
            $(".sel-che3").empty();
            $(".sel-che3").append('<option value="">请选择供应商</option>');
        }
        
    }
});
$(".submit-btn").on("click", function () {
	var name=$(".p1-text1").val();
	var tel=$(".p1-text2").val();
    // var sel=$(".sel-che").val();
	var sel="2008";            //车型
	var sel1=$(".sel-che1").val();
	var sel2=$(".sel-che2").val();
    var sel3=$(".sel-che3").val();
	if(!name){
		alert("请输入姓名");
	    return false;
	}
	if(!(/^1(3|4|5|7|8)\d{9}$/.test(tel))){ 
        alert("手机号码有误，请重填");  
        return false; 
    } 
    // if(!sel){
    // 	alert("请选择车型");
    // 	return false;
    // }
    if(!sel1){
    	alert("请选择省份！");
    	return false;
    }
    if(!sel2){
        alert("请选择城市！");
        return false;
    }
    if(!sel3){
        alert("请选择经销商！");
        return false;
    }
    api.postTestDriveInfo(name,tel,sel,sel1,sel2,sel3);
});