let Loader = {
	'active': undefined,
	'container': '.js-coreLoader',
	'start': () => {
		Loader.active = setTimeout(function(){
			if($(Loader.container)){
				$(Loader.container).show();
			}
        },2000); 
	},
	'stop': () => {
		if(Loader.active !== undefined){
			clearTimeout(Loader.active);
			Loader.active = undefined;
			if($(Loader.container)){
				$(Loader.container).hide();
			}
		}
	}
}

export default Loader