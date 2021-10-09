import HttpHelper from './http.js';

$(() => {
	HttpHelper.send().then((response) => {
		console.log(response);
	}).catch((error) => {
		console.log(error);
	});
})