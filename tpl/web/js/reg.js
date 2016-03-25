$(function(){

$("#getcode").click(function(){
	msg=get_code() ;
	console.log('msg:'+msg);
});

function get_code () {
	 $.ajax({
	 	type:"POST",
	 	url:"/getcode",
	 	async:"false",
	 	dataType:'text',
	 	success:function(dat){
	 		alert(dat);
	 	},
	 }).responseText;
}

})
