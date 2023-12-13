const TEXTAREA = document.querySelector('#comment_input')
TEXTAREA.oninput = (event) => {
	const $target = event.target;
  $target.style.height = 0;
	$target.style.height = 1 + $target.scrollHeight + 'px';
};