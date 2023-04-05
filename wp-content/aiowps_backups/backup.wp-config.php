<?php // Modified for Arabic by Rasheed Bydousi

/** إعدادات برنامج ووردبريس المعرب **/

// ** إعدادات قاعدة البيانات - ينمكنك الحصول على هذه المعلومات من مستضيفك ** //
/** اسم قاعدة بيانات ووردبريس */
define('DB_NAME', 'alkelmaa_ela5ira');

/** اسم المستخدم لقاعدة البيانات */
define('DB_USER', 'alkelmaa_admin');

/** كلمة المرور لقاعدة البيانات */
define('DB_PASSWORD', 'hToi{e6X%x4G');

/** عنوان خادم قاعدة البيانات */
define('DB_HOST', 'localhost');

/** ترميز قاعدة البيانات */
define('DB_CHARSET', 'utf8');

/** مقارنات قاعدة الببيانات (Collation). 
* إذا كنت غير متأكّد أتركها فارغة */
define('DB_COLLATE', '');

/**#@+
 * مفاتيح الأمان.
 * استخدم الرابط التالي لتوليد المفتايح {@link https://api.wordpress.org/secret-key/1.1/salt/}
 * @منذ 2.6.0
 */
define('AUTH_KEY',         'Oy/p9(oH)El6T--brG,iqb#ONSXP+RMnmi)/KFa-r2gRMYE(9+9{7DtJ(]p|0iAg');
define('SECURE_AUTH_KEY',  'PzgOvNkD]3EhHj ?f46a])&8ZP1dj|b>xjhY]bT}rm(rfz3Lo~S6j7WFe@~ I&?d');
define('LOGGED_IN_KEY',    'i*1]W,%*f!2<pAKsucN.QvLY|q7?J@&8Rx$kOLbEMo>wQF.~V/y-{Me~3`+v_PnY');
define('NONCE_KEY',        ':E[b0V5XK1+?[HMCS6EzF{sltlHC3.U}sR|Z+ gQD(H`SL|iTbb|x+&:{i*z4&=T');
define('AUTH_SALT',        ')lwK<I;EA4:|0sK-_uCKgd;D,b8~Jzhzy|?DIg5roP%*5y5l5Bo%kH7e %rkl4/K');
define('SECURE_AUTH_SALT', 'Xi/IG2#0z-l7s`.eCjUU<k[HknnWH,U+{hd9v|d._o5F0&5PR!EOh+yi(*K+mXKg');
define('LOGGED_IN_SALT',   '}]s:XA:6FhCjEW<KrYp<1ctKTa94xVwV{w3<y{_2|HKp[mTV3ptTC-Z3J#CEiNF]');
define('NONCE_SALT',       ')QK{@[|+4$,d:%^uf+!~P|: |*k h1SX(c~F!4ql2|Xkr3hS-+l(97t`_.t9bnU{');


/**#@-*/

/**
 * بادئة الجداول في قاعدة البيانات.
 * تستطيع تركيب أكثر من مدونة على نفس قاعدة البيانات إذا أعطيت لكل قاعدة بادئة جداول مختلفة
 * استخدم فقط حروف, أرقام وخطوط سفلية!
 */
$table_prefix  = 'wp_';

/**
 * اللغة الافتراضية المستخدمة في هذه النسخة هي العربية
 * إذا أردت أن تكون لوحة التحكم في مدونتك بالانجليزية قم بحذف الحرفين أدناه وهي الحروف ar
 */
define('WPLANG', 'ar');

/**
 * للمطورين: نظام تشخيص الأخطاء
 * قم بتغيير flase إلى true لتمكين عرض الملاحظات أثناء التطوير
 */
define('WP_DEBUG', false);

/* هذا هو المطلوب! توقف عن التعديل. نتمنى لك التوفيق في موقعك! */

/** المسار المطلق لمجلد ووردبريس. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */


require( ABSPATH . 'wp-settings.php');