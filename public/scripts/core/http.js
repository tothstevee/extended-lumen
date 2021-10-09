import Loader from './loader.js';

const defaultOptions = {
	'url': '/',
	'method': 'get',
	'data': {},
	'headers': {},
	'loader': true
}

let HttpHelper = {
	send : (options) => {
		options = $.extend(defaultOptions,options);
		options.headers = $.extend(options.headers,{
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		});

		if(options.loader){
			Loader.start();
		}

		let data = {};

		if(options.method != "get"){
			data = new FormData();
			$.each(options.data,(key, value) => {
				data.append(key,value);
			});
		}

		return new Promise((resolve, reject) => {
			$.ajax({
				'headers': options.headers,
				'data': data,
				'method': options.method,
				'url': options.url,
				'cache': false,
				'enctype': 'multipart/form-data',
				'success' : (response) => {
					Loader.stop();
					resolve(response)
				},
				'error': (error) => {
					Loader.stop();
					reject(error)
				},
				'processData': false,
				'contentType': false
			})
		})
	}
}

export default HttpHelper