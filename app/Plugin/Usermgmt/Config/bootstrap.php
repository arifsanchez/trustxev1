<?php
/*

Cakephp 2.x User Management Premium Version (a product of Ekta Softwares)
Ekta Softwares is a division of Ektanjali Softwares Pvt Ltd
Website- http://EktaSoftwares.com
Plugin Demo- http://umpremium.ektasoftwares.com
Author- Chetan Varshney (The Director of Ektanjali Softwares Pvt Ltd)
Plugin Copyright No- 11498/2012-CO/L

UMPremium is a copyrighted work of authorship. Chetan Varshney retains ownership of the product and any copies of it, regardless of the form in which the copies may exist. This license is not a sale of the original product or any copies.

By installing and using UMPremium on your server, you agree to the following terms and conditions. Such agreement is either on your own behalf or on behalf of any corporate entity which employs you or which you represent ('Corporate Licensee'). In this Agreement, 'you' includes both the reader and any Corporate Licensee and Chetan Varshney.

The Product is licensed only to you. You may not rent, lease, sublicense, sell, assign, pledge, transfer or otherwise dispose of the Product in any form, on
a temporary or permanent basis, without the prior written consent of Chetan Varshney.

The Product source code may be altered (at your risk)

All Product copyright notices within the scripts must remain unchanged (and visible).

If any of the terms of this Agreement are violated, Chetan Varshney reserves the right to action against you.

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Product.

THE PRODUCT IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE PRODUCT OR THE USE OR OTHER DEALINGS IN THE PRODUCT.

*/

function UsermgmtInIt(&$controller) {
	App::import("Model", "Usermgmt.UserSetting");
	$usm = new UserSetting;
	$allSettings=$usm->getAllSettings();
	if(!defined("SITE_URL")) {
		define("SITE_URL", Router::url('/', true));
	}
	date_default_timezone_set((isset($allSettings['defaultTimeZone'])) ? $allSettings['defaultTimeZone']['value'] : 'America/New_York');
	if(!defined("SITE_NAME")) {
		define("SITE_NAME", ((isset($allSettings['siteName'])) ? $allSettings['siteName']['value'] : 'User Management Plugin'));
	}
	if(!defined("SITE_REGISTRATION")) {
		define("SITE_REGISTRATION", ((isset($allSettings['siteRegistration'])) ? $allSettings['siteRegistration']['value'] : 1));
	}
	if(!defined("ALLOW_DELETE_ACCOUNT")) {
		define("ALLOW_DELETE_ACCOUNT", ((isset($allSettings['allowDeleteAccount'])) ? $allSettings['allowDeleteAccount']['value'] : 0));
	}
	if(!defined("SEND_REGISTRATION_MAIL")) {
		define("SEND_REGISTRATION_MAIL", ((isset($allSettings['sendRegistrationMail'])) ? $allSettings['sendRegistrationMail']['value'] : 1));
	}
	if(!defined("SEND_PASSWORD_CHANGE_MAIL")) {
		define("SEND_PASSWORD_CHANGE_MAIL", ((isset($allSettings['sendPasswordChangeMail'])) ? $allSettings['sendPasswordChangeMail']['value'] : 1));
	}
	if(!defined("EMAIL_VERIFICATION")) {
		define("EMAIL_VERIFICATION", ((isset($allSettings['emailVerification'])) ? $allSettings['emailVerification']['value'] : 1));
	}
	if(!defined("EMAIL_FROM_ADDRESS")) {
		define("EMAIL_FROM_ADDRESS", ((isset($allSettings['emailFromAddress'])) ? $allSettings['emailFromAddress']['value'] : 'example@example.com'));
	}
	if(!defined("EMAIL_FROM_NAME")) {
		define("EMAIL_FROM_NAME", ((isset($allSettings['emailFromName'])) ? $allSettings['emailFromName']['value'] : 'User Management Plugin'));
	}
	if(!defined("ALLOW_CHANGE_USERNAME")) {
		define("ALLOW_CHANGE_USERNAME", ((isset($allSettings['allowChangeUsername'])) ? $allSettings['allowChangeUsername']['value'] : 0));
	}
	if(!defined("BANNED_USERNAMES")) {
		define("BANNED_USERNAMES", ((isset($allSettings['bannedUsernames'])) ? $allSettings['bannedUsernames']['value'] : ''));
	}
	if(!defined("USE_RECAPTCHA")) {
		define("USE_RECAPTCHA", ((isset($allSettings['useRecaptcha'])) ? $allSettings['useRecaptcha']['value'] : 1));
	}
	if(!defined("PRIVATE_KEY_FROM_RECAPTCHA")) {
		define("PRIVATE_KEY_FROM_RECAPTCHA", ((isset($allSettings['privateKeyFromRecaptcha'])) ? $allSettings['privateKeyFromRecaptcha']['value'] : ''));
	}
	if(!defined("PUBLIC_KEY_FROM_RECAPTCHA")) {
		define("PUBLIC_KEY_FROM_RECAPTCHA", ((isset($allSettings['publicKeyFromRecaptcha'])) ? $allSettings['publicKeyFromRecaptcha']['value'] : ''));
	}
	if(!defined("LOGIN_REDIRECT_URL")) {
		define("LOGIN_REDIRECT_URL", ((isset($allSettings['loginRedirectUrl'])) ? $allSettings['loginRedirectUrl']['value'] : '/login'));
	}
	if(!defined("LOGOUT_REDIRECT_URL")) {
		define("LOGOUT_REDIRECT_URL", ((isset($allSettings['logoutRedirectUrl'])) ? $allSettings['logoutRedirectUrl']['value'] : '/login'));
	}
	if(!defined("PERMISSIONS")) {
		define("PERMISSIONS", ((isset($allSettings['permissions'])) ? $allSettings['permissions']['value'] : 1));
	}
	if(!defined("ADMIN_PERMISSIONS")) {
		define("ADMIN_PERMISSIONS", ((isset($allSettings['adminPermissions'])) ? $allSettings['adminPermissions']['value'] : 0));
	}
	if(!defined("DEFAULT_GROUP_ID")) {
		define("DEFAULT_GROUP_ID", ((isset($allSettings['defaultGroupId'])) ? $allSettings['defaultGroupId']['value'] : 2));
	}
	if(!defined("ADMIN_GROUP_ID")) {
		define("ADMIN_GROUP_ID", ((isset($allSettings['adminGroupId'])) ? $allSettings['adminGroupId']['value'] : 1));
	}
	if(!defined("GUEST_GROUP_ID")) {
		define("GUEST_GROUP_ID", ((isset($allSettings['guestGroupId'])) ? $allSettings['guestGroupId']['value'] : 3));
	}
	if(!defined("USE_FB_LOGIN")) {
		define("USE_FB_LOGIN", ((isset($allSettings['useFacebookLogin'])) ? $allSettings['useFacebookLogin']['value'] : 0));
	}
	if(!defined("FB_APP_ID")) {
		define("FB_APP_ID", ((isset($allSettings['facebookAppId'])) ? $allSettings['facebookAppId']['value'] : ''));
	}
	if(!defined("FB_SECRET")) {
		define("FB_SECRET", ((isset($allSettings['facebookSecret'])) ? $allSettings['facebookSecret']['value'] : ''));
	}
	if(!defined("FB_SCOPE")) {
		define("FB_SCOPE", ((isset($allSettings['facebookScope'])) ? $allSettings['facebookScope']['value'] : ''));
	}
	if(!defined("USE_TWT_LOGIN")) {
		define("USE_TWT_LOGIN", ((isset($allSettings['useTwitterLogin'])) ? $allSettings['useTwitterLogin']['value'] : 0));
	}
	if(!defined("TWT_APP_ID")) {
		define("TWT_APP_ID", ((isset($allSettings['twitterConsumerKey'])) ? $allSettings['twitterConsumerKey']['value'] : ''));
	}
	if(!defined("TWT_SECRET")) {
		define("TWT_SECRET", ((isset($allSettings['twitterConsumerSecret'])) ? $allSettings['twitterConsumerSecret']['value'] : ''));
	}
	if(!defined("USE_GMAIL_LOGIN")) {
		define("USE_GMAIL_LOGIN", ((isset($allSettings['useGmailLogin'])) ? $allSettings['useGmailLogin']['value'] : 1));
	}
	if(!defined("USE_YAHOO_LOGIN")) {
		define("USE_YAHOO_LOGIN", ((isset($allSettings['useYahooLogin'])) ? $allSettings['useYahooLogin']['value'] : 1));
	}
	if(!defined("USE_LDN_LOGIN")) {
		define("USE_LDN_LOGIN", ((isset($allSettings['useLinkedinLogin'])) ? $allSettings['useLinkedinLogin']['value'] : 0));
	}
	if(!defined("LDN_API_KEY")) {
		define("LDN_API_KEY", ((isset($allSettings['linkedinApiKey'])) ? $allSettings['linkedinApiKey']['value'] : ''));
	}
	if(!defined("LDN_SECRET_KEY")) {
		define("LDN_SECRET_KEY", ((isset($allSettings['linkedinSecretKey'])) ? $allSettings['linkedinSecretKey']['value'] : ''));
	}
	if(!defined("USE_FS_LOGIN")) {
		define("USE_FS_LOGIN", ((isset($allSettings['useFoursquareLogin'])) ? $allSettings['useFoursquareLogin']['value'] : 0));
	}
	if(!defined("FS_CLIENT_ID")) {
		define("FS_CLIENT_ID", ((isset($allSettings['foursquareClientId'])) ? $allSettings['foursquareClientId']['value'] : ''));
	}
	if(!defined("FS_CLIENT_SECRET")) {
		define("FS_CLIENT_SECRET", ((isset($allSettings['foursquareClientSecret'])) ? $allSettings['foursquareClientSecret']['value'] : ''));
	}
	if(!defined("VIEW_ONLINE_USER_TIME")) {
		define("VIEW_ONLINE_USER_TIME", ((isset($allSettings['viewOnlineUserTime'])) ? $allSettings['viewOnlineUserTime']['value'] : 30));
	}
	if(!defined("USE_HTTPS")) {
		define("USE_HTTPS", ((isset($allSettings['useHttps'])) ? $allSettings['useHttps']['value'] : 0));
	}
	if(!defined("HTTPS_URLS")) {
		define("HTTPS_URLS", ((isset($allSettings['httpsUrls'])) ? $allSettings['httpsUrls']['value'] : ''));
	}
	if(!defined("IMG_DIR")) {
		define("IMG_DIR", ((isset($allSettings['imgDir'])) ? $allSettings['imgDir']['value'] : "umphotos"));
	}
	if(!defined("QRDN")) {
		define("QRDN", ((isset($allSettings['QRDN'])) ? $allSettings['QRDN']['value'] : "12345678"));
	}
	if(!defined("LOGIN_COOKIE_NAME")) {
		define("LOGIN_COOKIE_NAME", ((isset($allSettings['cookieName'])) ? $allSettings['cookieName']['value'] : "UMPremiumCookie"));
	}
	if(!defined("DEFAULT_IMAGE_PATH")) {
		define("DEFAULT_IMAGE_PATH", ROOT.DS."app".DS."Plugin".DS."Usermgmt".DS."webroot".DS."img".DS."default.jpg");/* setting path for default image */
	}
	if(!defined("DEFAULT_IMAGE_URL")) {
		define("DEFAULT_IMAGE_URL", SITE_URL."usermgmt/img/default.jpg");
	}
	if(!defined("ADMIN_EMAIL_ADDRESS")) {
		define("ADMIN_EMAIL_ADDRESS", ((isset($allSettings['adminEmailAddress'])) ? $allSettings['adminEmailAddress']['value'] : ''));
	}
	Cache::config('UserMgmt', array(
		'engine' => 'File',
		'duration'=> '+3 months',
		'path' => CACHE,
		'prefix' => 'UserMgmt_'
	));

}
function distanceOfTimeInWords($fromTime, $toTime=0) {
	if($toTime==0) {
		$toTime =time();
	}
	$distanceInSeconds = round(abs($toTime - $fromTime));
	$distanceInMinutes = round($distanceInSeconds / 60);
	if ($distanceInMinutes <= 1) {
		if ($distanceInSeconds < 1) {
			return $distanceInSeconds.' second ago';
		}
		else {
			return $distanceInSeconds.' seconds ago';
		}
	} else if ($distanceInMinutes < 60) {
		return $distanceInMinutes . ' minutes ago';
	} else if ($distanceInMinutes < 120) {
		$mins= $distanceInMinutes - 60;
		if($mins==0) {
			return '1 hour ago';
		} else if($mins==1) {
			return '1 hour 1 minute ago';
		} else {
			return '1 hour '.$mins. ' minutes ago';
		}
	} else if ($distanceInMinutes < 1440) {
		$hours= intval(($distanceInMinutes) / 60);
		$mins= $distanceInMinutes - ($hours * 60);
		if($mins==0) {
			return $hours.' hours ago';
		} else if($mins==1) {
			return $hours.' hours 1 minute ago';
		} else {
			return $hours.' hours '.$mins. ' minutes ago';
		}
	} else if ( $distanceInMinutes < 2880 ) {
		return '1 day ago';
	} else if ( $distanceInMinutes < 43200 ) {
		return round(floatval($distanceInMinutes) / 1440) . ' days ago';
	} else if ( $distanceInMinutes < 86400 ) {
		return '1 month ago';
	} else if ( $distanceInMinutes < 525600 ) {
		return round(floatval($distanceInMinutes) / 43200) . ' months ago';
	} else if ( $distanceInMinutes < 1051199 ) {
		return '1 year ago';
	}
	return round(floatval($distanceInMinutes) / 525600) . ' years ago';
}