<?php
// +----------------------------------------------------------------------
// | 自定义配置
// +----------------------------------------------------------------------

$GLOBALS['g_env'] = new \think\Env();
if (is_file(ROOT_PATH . '.env')) {
    $GLOBALS['g_env']->load(ROOT_PATH . '.env');
}

//-分离的配置文件
function yaconf($name, $default = null)
{
//    // get from a custom file
//    $rtn = \Yaconf::get('hc_account.' . $name);
//    if(!is_null($rtn))
//    {
//        if(is_array($rtn))
//        {
//           $comOptions = \Yaconf::get('convention.' . $name);
//           if(!is_null($comOptions))
//            return $rtn + $comOptions;
//        }
//
//        return $rtn;
//    }
//
//    // get from a convention file
//    return \Yaconf::get('convention.' . $name);

    global $g_env;
    return $g_env->get($name, $default);
}

// +--------------------------------------------------------------------------
// |  文件路径
// +--------------------------------------------------------------------------
define('LICENSE_FILE', ini_get('yaconf.directory') . DIRECTORY_SEPARATOR . yaconf('license.file'));

//-临时文件
define('DIR_TEMPS', yaconf('storage.dir')  . 'temps' . DIRECTORY_SEPARATOR);
define('DIR_TEMPS_IMGS', DIR_TEMPS . 'imgs' . DIRECTORY_SEPARATOR); //-图片的base64编码生成的临时文件

//-图像文件
define('DIR_IMGS',  ROOT_PATH . 'uploads' . DIRECTORY_SEPARATOR);
define('DIR_IMGS_USERS', DIR_IMGS . 'tmp_avatar' . DIRECTORY_SEPARATOR); //-用户图像
define('DIR_IMGS_IMGS', DIR_IMGS . 'tmp_imgs' . DIRECTORY_SEPARATOR); //-普通图像
define('DIR_IMGS_QRCODEDS', DIR_IMGS . 'tmp_qrcodes' . DIRECTORY_SEPARATOR); //-二维码

// +--------------------------------------------------------------------------
// |  默认值
// +--------------------------------------------------------------------------
//-密码
define('DEF_USER_PWD', '123456');
define('CRYPT_SALT',   's+1sqAjCnCvNwBJbeZx43TpKiVyD8oT9YtI5kCoIT6ts'); //-加密盐

//-分页
define('DEF_PAGE',      1); //默认页码
define('DEF_OFFSET',    0); //默认起始位置
define('DEF_PAGE_SIZE', 16); //默认每页数量
define('DEF_PAGE_MAXSIZE', 100); //每页最大数量

//-排序值
define('DEF_SORT_NUM', 99);

//-二态数
define('YES', 1);
define('NO',  2);

define('BROWSE_IMG_WIDTH_MAX',              4096); //-图片==>可直接浏览的分辨率4K
define('BROWSE_IMG_FILESIZE_MAX',           5242880); //-图片==>可直接浏览的文件大小5M
define('BROWSE_IMG_THUMB_FILESIZE_MAX',     20971520); //-图片缩略图==>可生成的文件大小20M
define('BROWSE_IMG_THUMB_GIF_FILESIZE_MAX', 2097152); //-图片缩略图==>可生成的文件大小2M，超过2M-20为静态缩略图（GIF不转码）


// +--------------------------------------------------------------------------
// |  图像
// +--------------------------------------------------------------------------
//-缩略图尺寸
define('THUMBER_ORIGIN', 0); //原图
define('THUMBER_MINI_PHOTE', 30);
define('THUMBER_MINI', 48);
define('THUMBER_SMALL', 96);
define('THUMBER_MIDDLE', 200);

define('THUMBER_SET', THUMBER_ORIGIN . ',' . THUMBER_MINI . ',' . THUMBER_SMALL . ',' . THUMBER_MIDDLE);

//-图片返回类型
define('IMG_RTYPE_PIC', 1); //直接显示图片
define('IMG_RTYPE_URL', 2); //防盗链地址
define('IMG_RTYPE_BASE64', 3); //base64编码

define('IMG_RTYPE_SET', IMG_RTYPE_PIC . ',' . IMG_RTYPE_URL . ',' . IMG_RTYPE_BASE64);


// +--------------------------------------------------------------------------
// |  SMS
// +--------------------------------------------------------------------------
define('SMS_USER_REGIETER',    '01'); //用户注册验证码
define('SMS_FINDPWD_PHONE',    '02'); //找回密码
define('SMS_MODIFY_PHONE',     '03'); //修改手机号

//-临时文件配置
define('DIR_TEMP_CLEAR_DAYS', 7); //-清空 7 天前的临时文件

//-临时文件
define('CACHE_ONCE', 'once-clear-tmp-'); //临时文件清空


// +--------------------------------------------------------------------------
// |  缓存 - 控制层
// +--------------------------------------------------------------------------
define('CACHE_TIME_LONG', 7200); //缓存时间 - 2小时
define('CACHE_TIME_DAY', 86400); //缓存时间 - 24小时

//-用户
define('CACHE_USER_LOGIN_OS_INFO', 'userLoginOSInfo:'); //用户终端的登录信息
define('CACHE_USER_LIMIT', 'userLimit:'); //用户速率限制


// +--------------------------------------------------------------------------
// |  缓存 - 模型层
// +--------------------------------------------------------------------------
define('CACHE_WITHTRASHED', ':rm'); //缓存被删除的数据

//-缓存时间
define('CACHE_TIME_SQL', 600); //sql查询缓存时间 - 10分钟
define('CACHE_TIME_SQL_MINUTE', 60); //sql查询缓存时间 - 1分钟
define('CACHE_TIME_SQL_LONG', 7200); //缓存时间 - 2小时
define('CACHE_TIME_SQL_DAY', 86400); //缓存时间 - 24小时


// +--------------------------------------------------------------------------
// |  Session Id
// +--------------------------------------------------------------------------
//-verify
define('SESSIONID_VERIFY_REGISTER', 1);//注册
define('SESSIONID_VERIFY_MODIFY', 2);  //修改
define('SESSIONID_VERIFY_FINDPWD', 3); //找回密码
define('SESSIONID_VERIFY_SET', SESSIONID_VERIFY_REGISTER . ',' . SESSIONID_VERIFY_MODIFY . ',' . SESSIONID_VERIFY_FINDPWD);

//-请勿擅自改动!!!
define('OTHER_LOGIN', 'other_'); //第三方登录

//-用户身份识别 —— 请勿擅自改动!!!
define('SESSIONID_USER_TOKEN', 'utoken'); //识别码
define('COOKIEID_USER_TOKEN', 'hc_c_utoken');
define('SESSIONID_USER_NAME', 'name'); //用户名
define('SESSIONID_USER_IP', 'ip'); //ip


// +--------------------------------------------------------------------------
// |  产品注册，不能修改!!!
// +--------------------------------------------------------------------------
define('AUTH_PRODUCT_NAME',    'hc_common');
define('AUTH_PRODUCT_VERSION', '1.0.1');


// +--------------------------------------------------------------------------
// |  Tools
// +--------------------------------------------------------------------------
define('TOOL_FFMPEG', '/usr/local/ffmpeg/bin/');
define('TOOL_MP4BOX', '/usr/local/MP4Box/bin/');
define('TOOL_IMAGEMAGICK', '/usr/local/bin/');
define('TOOL_XPDF', '/usr/local/bin/');
define('TOOL_EXIFTOOL', '/usr/local/bin/');


// +--------------------------------------------------------------------------
// |  模型层常量定义
// +--------------------------------------------------------------------------
//===================================================== LogOp =====================================================
//操作类型
define('USERLOGOP_OP_TYPE_LOGIN', 1); //登录系统 - 特殊
define('LOGOP_OP_TYPE_ADD', 2); //添加记录
define('LOGOP_OP_TYPE_MODIFY', 3); //修改记录
define('LOGOP_OP_TYPE_REMOVE', 4); //移除记录

define('LOGOP_OP_TYPE_ARR', [USERLOGOP_OP_TYPE_LOGIN, LOGOP_OP_TYPE_ADD, LOGOP_OP_TYPE_MODIFY, LOGOP_OP_TYPE_REMOVE]);

//===================================================== File ===========================================================
//-缩略图后缀
define('FILE_CONVERT_THUMB', '_thumb_');
define('FILE_CONVERT_THUMB1', '_thumb');

define('FILE_SUFFIX_RAW', '_raw'); //原始文件
define('FILE_SUFFIX_RAW_EXT', '_ext'); //原始文件-带后缀

define('FILE_TYPE_RECORD',  0);//录像
define('FILE_TYPE_VIDEO',   1);//视频
define('FILE_TYPE_PICTURE', 2);//图片
define('FILE_TYPE_TEXT',    3);//文本
define('FILE_TYPE_AUDIO',   4);//音频
define('FILE_TYPE_OTHER',   5);//其他
define('FILE_TYPE_ARCHIVE', 1000);//集合

define('FILE_TYPE_SET', FILE_TYPE_VIDEO . ',' . FILE_TYPE_PICTURE . ',' . FILE_TYPE_TEXT . ',' . FILE_TYPE_AUDIO.
    ',' . FILE_TYPE_OTHER . ',' . FILE_TYPE_RECORD);

define('FILE_ARRAY_SOURCE_TYPE', [
    FILE_TYPE_RECORD,
    FILE_TYPE_VIDEO,
    FILE_TYPE_PICTURE,
    FILE_TYPE_TEXT,
    FILE_TYPE_AUDIO,
    FILE_TYPE_OTHER,
    FILE_TYPE_ARCHIVE,
]);