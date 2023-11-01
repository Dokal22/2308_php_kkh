/*
1. HTTP ( Hypertext Transfer Protocol) 란?
	어떻게 Hypertext를 주고 받을지 규약한 프로토콜로
	클라이언트가 서버에 데이터를 request(요청)을 하고,
	서버가 해당 request에 따라 response(응답)을 클라이언트에 보내주는 방식입니다.
	Hypertext는 웹사이트에서 이용되는 하이퍼 링크나 리소스, 문서, 이미지 등을 모두 포함합니다.

2. AJAX ( Asynchronous JavaScript And XML) 이란?
	웹페이지에서 비동기 방식으로 서버에게 데이터를 request하고,
	서버의 response를 받아 동적으로 웹페이지를 갱신하는 프로그래밍 방식입니다.
	즉, 웹 페이지 전체를 다시 로딩하지 않고도 일부분만을 갱신 할 수 있습니다.
	대표적으로 XMLHttpRequest 방식과 Fetch Api 방식이 있습니다.

3. JSON ( JavaScript Object Notation ) 이란?
	JavaSctipt의 Object에 큰 영감을 받아 만들어진 서버 간의 HTTP 통신을 위한 텍스트 데이터 포맷입니다.
	장점은 다음과 같습니다.
		- 데이터를 주고 받을 때 쓸 수 있는 가장 간단한 파일 포맷
		- 가벼운 텍스트를 기반
		- 가독성이 좋음
		- Key와 Value가 짝을 이루고 있음
		- 데이터를 서버와 주고 받을 때 직렬화(Serialization)[*1 참조]하기 위해 사용
		- 프로그래밍 언어나 플랫폼에 상관없이 사용 가능

	JSON.stringify( obj ) : Object를 JSON 포맷의 String으로 변환(Serializing)해주는 메소드
	JSON.parse( json ) : JSON 포맷의 String을 Object로 변환(Deserializing)해주는 메소드

// XML
<xml>
	<data>
		<id>56</id>
		<name>홍길동</name>
	</data>
</xml>

// json
{
	data: {
		id: 56
		,name: '홍길동'
	}
}

*/

const MY_URL = "https://picsum.photos/v2/list?page=2&limit=5";
// const INPUT = document.querySelector('#btn-api');
const BTN_API = document.querySelector('#btn-api');
const BTN_DEL = document.querySelector('#btn-del');
BTN_API.addEventListener('click', my_fetch);
BTN_DEL.addEventListener('click', del);

// function del() { // ****************선생님과 오류 탐색******************231031
// 	const OLD_IMG = document.querySelectorAll('#div-img > img');
// 	// const OLD_IMG = document.getElementsbyTagName('img'); // 1. OLD_IMG => {0~4, entries, keys, values, forEach, length, item} 프로토타입까지 가져옴
// 	for ( let item in OLD_IMG ) { // 2. for in으로 하면 entries, keys 등등을 지우려해서 오류.
// 								  // 3. for of로 하면 하나를 지울 때마다 순서가 당겨져서 절반정도만 삭제.
// 		OLD_IMG[item].remove();
// 	}
// 	// OLD_IMG2.remove();
// }

function del() {
	const OLD_IMG = document.querySelector('#div-img');
	OLD_IMG.replaceChildren(); // 배열(객체) 안 자식 삭제
}

// del 다른방법
// const OLD_IMG = document.querySelector('#div-img');
// OLD_IMG.innerHTML = ""; // 배열(객체) 안 자식 삭제

function my_fetch() {
	const INPUT_URL = document.querySelector('#input-url');

	fetch(INPUT_URL.value.trim()) // (url(get값?), post값?) / fetch => 받은 데이터를 컨트롤?
	.then( response => {
		//if
		// 오류처리는 response.json()을 반환할지 말지 분기
		return response.json();
	} ) // MY_URL을 response값으로 받고, json():배열로 만든 다음(원래 str?) then(data)로
	.then( data => makeImg(data) )
	.catch( error => console.log(error) )
}

// response {status} : 
	// 200번대 => 정상
	// 300번대 => 서버에서 오류
	// 400번대 => 통신에서 오류

function makeImg(data) {
	data.forEach( item => {
		const NEW_IMG = document.createElement('img');
		const DIV_IMG = document.querySelector('#div-img');
		NEW_IMG.setAttribute('src', item.download_url);
		NEW_IMG.style.width = '200px';
		NEW_IMG.style.height = '200px';
		DIV_IMG.appendChild(NEW_IMG);
	}) 
}

// fetch 두번째 아규먼트 셋팅 방법 *************이해못함**************
function infinityLoop() {
	let apiUrl = '1차프로젝트주소'
	let init = {
		method: 'POST' // 설정 안하면 default "GET"
		// headers: {
		// 	Access-Control-Allow-Origin
		// 	json이다~
		// 	xml이다 등등
		// }
		,body: {
			title: '머ㅕㅇ'
			,contents: '테스트'
			,em_id: '2'
		}
	};

	fetch(apiUrl, init)
	.then( indata => console.log(indata) )
	.catch( error => console.log(error) )
}

// fetch도 보내놓고 다른거 하다가 어 데이터 왔다 하는 애라 비동기?