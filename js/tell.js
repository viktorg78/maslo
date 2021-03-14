function belofFunc(){
	$("#searchText").html('Обработка данных...');
	$("#searchText").css("color", "#a1a1a1");
}
function susesFunc(data){	
	if(data==true){
		$("#mytext").val("");
		$("#mytell").val("");
		$("#searchText").html("В ближайшее время с вами свяжутся.!");
		$("#searchText").css("color", "#b1c918");	
		$("#mytext").css({"border": "1px solid #b1c918"});
		$("#mytell").css({"border": "1px solid #b1c918"});
	}
	else{
		switch (data){
			case "er1":
				$("#mytext").css({"border": "1px solid red"});
				$("#mytell").css({"border": "1px solid red"});
				$("#searchText").html("Все поля обязательны к заполнению!");
				$("#searchText").css("color", "red");
				break;
			case "er2":
				$("#mytext").css({"border": "1px solid red"});
				$("#searchText").html("Вы забыли указать имя!");
				$("#searchText").css("color", "red");
				break;
			case "er3":
				$("#mytell").css({"border": "1px solid red"});
				$("#searchText").html("Вы не указали телефон");
				$("#searchText").css("color", "red");
				break;
			}
	}
}
$(document).ready(function(){
	$("#strsbmit").bind("click", function(){
		var mytext1=$("#mytext").val();
		var mytell1=$("#mytell").val();
		var sity1=$('input[name=sity]:checked').val()
		$.ajax({
			url:"tallk2.php",
			type: "POST",
			data: ({mytext:mytext1, mytell:mytell1, sity:sity1}),
			dataType: "html",
			beforeSend: belofFunc,
			success:susesFunc
		});
	});
});