function layer_open(el, skill_name){

	var layer = $('#' + el);
	var bg = layer.prev().hasClass('bg');	//dimmed 레이어를 감지하기 위한 boolean 변수

	if(bg){
		$('.layer').fadeIn();	//'bg' 클래스가 존재하면 레이어가 나타나고 배경은 dimmed 된다. 
	}else{
		layer.fadeIn();
	}

	// 화면의 중앙에 레이어를 띄운다.		
	if (layer.outerHeight() < $(document).height() ) layer.css('margin-top', '-'+layer.outerHeight()/2+'px');
	else layer.css('top', '0px');
	if (layer.outerWidth() < $(document).width() ) layer.css('margin-left', '-'+layer.outerWidth()/2+'px');
	else layer.css('left', '0px');
	
	layer.find('#pop_close').click(function(e){
		if(bg){
			$('.layer').fadeOut(); //'bg' 클래스가 존재하면 레이어를 사라지게 한다. 
		}else{
			layer.fadeOut();
		}
		e.preventDefault();
	});

	$('.layer .bg').click(function(e){	//배경을 클릭하면 레이어를 사라지게 하는 이벤트 핸들러
		$('.layer').fadeOut();  
		e.preventDefault();
	});
}

function apply_value(skill_name) {
	$("#prev_use_point").text($("#use_point").text());
	$("#"+skill_name+" div div").text($("#current_level").text());

}

function get_xml(skill_name) {
	$.ajax({
	    type: "GET",
	    url: "../xml/skill_info.xml",
	    dataType: "xml",
	    success: function(xml) {
	    	$(xml).find('item').each(function () {
	    		var skill = $(this).find('dbname').text();
				if (skill == skill_name) {
					$("#skill_name").text($(this).find('skill').text());
					$("#current_level").text($("#"+skill_name+"_level").text());
				    $("#require_point").text($(this).find('require_point').text());
				    $("#use_point").text($("#prev_use_point").text());
				    $("#skill_description").text($(this).find('description').text());
				    $("#max_level").text($(this).find('max_level').text());
				}
	    	});
	    }
	});
}

function skill_control(button_feature, skill_name) {

	switch(button_feature) {
		case 'skill_plus' :
			var current_level = parseInt($("#"+skill_name+"_level").text());
			var max_level = parseInt($("#max_level").text());
			var require_point = parseInt($("#require_point").text());
			if (current_level < max_level) {
				var use_point = parseInt($("#use_point").text());
				current_level++;
				if (current_level == max_level) {
					use_point -= require_point;
					$("#current_level").text("Master");
					$("#"+skill_name+"_level").text("Master");
					$("#use_point").text(use_point);
					$("#prev_use_point").text(use_point);
				} else {
					use_point -= require_point;
					$("#current_level").text(current_level);
					$("#"+skill_name+"_level").text(current_level);
					$("#use_point").text(use_point);	
					$("#prev_use_point").text(use_point);
				};
			};
			break;
		case 'skill_minus' :
			var current_level = $("#"+skill_name+"_level").text();
			var max_level = parseInt($("#max_level").text());
			var require_point = parseInt($("#require_point").text());
			if (current_level > 0 || current_level == "Master") {
				if (current_level == "Master") {
					var use_point = parseInt($("#use_point").text());
					current_level = max_level - 1;
					use_point += require_point;
					$("#current_level").text(current_level);
					$("#"+skill_name+"_level").text(current_level);
					$("#use_point").text(use_point);
					$("#prev_use_point").text(use_point);
				} else {
					current_level = parseInt(current_level);
					var use_point = parseInt($("#use_point").text());
					current_level--;
					use_point += require_point;
					$("#current_level").text(current_level);
					$("#"+skill_name+"_level").text(current_level);
					$("#use_point").text(use_point);
					$("#prev_use_point").text(use_point);
				};
			};
			break;
		case 'skill_master' :
			var current_level = $("#"+skill_name+"_level").text();
			var max_level = parseInt($("#max_level").text());
			var require_point = parseInt($("#require_point").text());
			if (current_level != "Master") {
				current_level = parseInt(current_level);
				var up_count = max_level - current_level;
				var use_point = parseInt($("#use_point").text());
				use_point = use_point - (up_count*require_point);
				$("#current_level").text("Master");
				$("#"+skill_name+"_level").text("Master");
				$("#use_point").text(use_point);
				$("#prev_use_point").text(use_point);
			};
			break;
		case 'skill_clear' :
			var current_level = $("#"+skill_name+"_level").text();
			var max_level = parseInt($("#max_level").text());
			var require_point = parseInt($("#require_point").text());
			if (current_level > 0 || current_level == "Master") {
				var down_count;
				if (current_level == "Master") {
					down_count = max_level;
				} else {
					down_count = current_level;
				};
				var use_point = parseInt($("#use_point").text());
				use_point = use_point + (down_count*require_point);
				$("#current_level").text("0");
				$("#"+skill_name+"_level").text("0");
				$("#use_point").text(use_point);
				$("#prev_use_point").text(use_point);
			};
			break;
		default :
			alert("에러발생");
	}
}

$(document).ready(function() {
	var skill_name;

	$("#select_character button").click(function(event) {
		$("#select_job").load("../php/select_job.php?character_name="+this.id);
		$("#character_form").append('<input type="hidden" name="character_name" value="'+this.id+'" />');
	});

	$("#select_job").on('click', 'button', function(event) {
		$("#select_skill").load("../php/select_skill.php?job_name="+this.id);
		$("#skill_status").css("display", "block");
		$("#job_form").append('<input type="hidden" name="job_name" value="'+this.id+'" />');
	});

	$("#select_skill").on('click', 'button', function(event) {
		skill_name = this.id;
		get_xml(skill_name);
		layer_open('layer', skill_name);
	});

	$("#skill_control_button").on('click', 'button', function(event) {
		skill_control(this.id, skill_name);
	});

	$("#submit_form").submit(function(event) {
		$("#select_skill tbody tr td button").each(function(){
			var level = $(this).find('#'+this.id+'_level').text();
			$("#skill_form").append('<input type="hidden" name="skill_info[]" value="'+this.id+'|'+level+'" />');
		});

		return true;
	});

	$("#delete_page").on('click', 'button', function(event) {
		var page_index = $(this).val();
		$(this).load("../php/delete.php?index="+page_index);
		alert(page_index+" 삭제완료");
	});

});