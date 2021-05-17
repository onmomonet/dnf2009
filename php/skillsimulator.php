<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/skillsimulator.css" rel="stylesheet">
    <title>D&F Skill Simulator</title>
  </head>
  <body>
    <div style="margin-top:10px">
        <form class="form-inline" id="submit_form" method="GET" action="../php/submit.php">
          <input class="form-control" type="text" name="title" value="제목 입력" size="30" maxlength="60" />
          <span id="character_form"></span>
          <span id="job_form"></span>
          <span id="skill_form"></span>
          <input class="btn btn-default" id="form_submit" type='submit' value='Submit' />
        </form>
      </div>
      <div>
        <div id="select_character" class="btn-group" style="margin-top:10px;">
          <?php 
            include 'select_character.php';
          ?> 
        </div>
        <div id="select_job" class="btn-group"></div>
        <div id="skill_status" style="display:none; margin-top:5px; margin-bottom:5px;">
          남은 포인트 : <span id="prev_use_point">10000</span>  
        </div>
        <div style="display:block;">
          <table id="select_skill" ></table>
        </div>
      </div>
      <div class="layer">
        <div class="bg"></div>
        <div id="layer" class="pop-layer">
          <div class="pop-container">
            <div class="pop-conts">
              <!--content //-->
              <div id="skill_info">
                <div style="margin:5px">
                  <img src="../img/skill_frame.png">
                </div>
                <div style="margin:5px">
                  <ul style="padding-left:15px">
                    <li>이름 : <span id="skill_name"></span></li>
                    <li>현재 레벨 : <span id="current_level"></span></li>
                    <li>요구 포인트 : <span id="require_point"></span></li>
                    <li>남은 포인트 : <span id="use_point"></span></li>  
                    <li>설명 : <div id="skill_description"></div></li>
                    <div id="max_level" style="display:none;"></div>
                  </ul>
                </div>
              </div>
              <div id="skill_control_button" style="margin:5px">
                <button id="skill_plus" type="button" class="btn btn-danger">+</button>
                <button id="skill_minus" type="button" class="btn btn-primary">-</button>
                <button id="skill_master" type="button" class="btn btn-success">M</button>
                <button id="skill_clear" type="button" class="btn btn-default">C</button>
              </div>
              <div class="btn-r">
                <!-- <a href="#" id="pop_apply" class="cbtn">적용</a> -->
                <a href="#" id="pop_close" class="cbtn">닫기</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    <script type="../js/jquery_2.1.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/skillsimulator.js"></script>
  </body>
</html>
