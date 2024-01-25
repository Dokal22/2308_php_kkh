<?php
namespace App\Http\Utils;

use App\Models\User;
use Illuminate\Support\Str;

class EncrypUtil // php만 url암호화 업서
{
	// base64 url encode
	// @param string $str JSON
	// @return string base64_url_encode
	public static function base64UrlEncode(string $str)
	{
		return rtrim(strtr(base64_encode($str), '+/', '-_'), '='); // + 없애기/ 끝단 == 두개 빼기
	}

	// base64 url decode
	// @param string $str base64_url_decode
	// @return string JSON
	public static function base64UrlDecode(string $str)
	{
		return base64_decode(strtr($str, '-_', '+/'));
	}

	/**
	 * 암호화한 문자열 리턴
	 * @param string $alg 알고리즘 명
	 * @param string $str 암호화된 문자열
	 * @param int $saltLength 솔트 문자열 길이
	 * @return string 암호화된 문자열
	 */
	public static function hashWithSalt(string $alg, string $str, int $saltLength = 0)
	{
		$salt = EncrypUtil::getSalt($saltLength);

		return hash($alg, $str) . $salt;
	}

	/**
	 * 특정 길이 만큼의 랜덤한 문자열 리턴
	 * @param int $length 솔트 문자열 길이
	 * @return string 랜덤문자열(salt)
	 */
	public static function getSalt(int $length)
	{
		return Str::random($length);
	}

	/**
	 * 솔트 제거
	 * @param string $str 솔트있는 문자열
	 * @param int $saltlength 솔트 문자열 길이
	 * @return string 솔트 없는
	 */
	public static function subStrSalt(string $str, int $saltlength)
	{
		// 3번째 param에 음수면 오른쪽부터 자름
		return substr($str, 0, -1 * $saltlength);
	}
}