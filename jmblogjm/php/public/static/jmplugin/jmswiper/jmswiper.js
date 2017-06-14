function modularAdaptation(obj){
	if(typeof exports === 'object' && !exports.nodeType){//es6 & node
		exports.obj=obj;
	}else if(typeof module === 'object' && module.exports){//es6 & node
		module.exports.obj=obj;
	}else if(typeof define === 'function' && define.amd === 'object'){//amd
		define(funciton(){
			return obj;
		});
	}else{//window || global
		this.obj=obj;
	}
}



;(function(){
	


	function jmswiper(){
		if(!(this instanceof jmswiper) return new jmswiper();//强制将构造函数作为对象来使用
	}

	//装载控件，兼容前后端，多种模块规范（AMD，CMD,Node）
	modularAdaptation(jmswiper);
})();