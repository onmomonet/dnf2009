skillsimulator
==============

DnF Skill Simulator


-- DROP DATABASE skillsimulator;
CREATE DATABASE skillsimulator;
USE skillsimulator;

CREATE TABLE `df_character` (
    `index` int NOT NULL AUTO_INCREMENT ,
    `character_name`  varchar(30) NOT NULL,
	`character_name_ko` varchar(30) NOT NULL,
    PRIMARY KEY (`index`)
);

CREATE TABLE `df_job` (
    `index` int NOT NULL AUTO_INCREMENT ,
    `job_name`  varchar(30) NOT NULL,
	`job_name_ko` varchar(30) NOT NULL,
	`df_character_index` int NOT NULL,
    PRIMARY KEY (`index`),
	FOREIGN KEY (`df_character_index`) REFERENCES `df_character` (`index`)
);

CREATE TABLE `df_skill` (
    `index` int NOT NULL AUTO_INCREMENT ,
    `skill_name`  varchar(30) NOT NULL,
	`require_point` int NOT NULL,
	`max_level` int NOT NULL,
    PRIMARY KEY (`index`)
);

CREATE TABLE `df_skill_info` (
	`index` int NOT NULL AUTO_INCREMENT ,
    `job_index`  int NOT NULL,
	`skill_index` int NOT NULL,
	 PRIMARY KEY (`index`)
);

CREATE TABLE `df_user` (
    `index` int NOT NULL AUTO_INCREMENT ,
    `user_id`  varchar(30) NOT NULL,
	`user_password` varchar(30) NOT NULL,
    PRIMARY KEY (`index`)
);

CREATE TABLE `df_user_character` (
	`index` int NOT NULL AUTO_INCREMENT ,
	`title` varchar(60) NOT NULL,
    `character_name`  varchar(30) NOT NULL,
	`job_name` varchar(30) NOT NULL,
	`df_user_index` int NOT NULL,
	PRIMARY KEY (`index`),
	UNIQUE(`title`),
	FOREIGN KEY (`df_user_index`) REFERENCES `df_user` (`index`)
);

CREATE TABLE `df_user_skill` (
	`index` int NOT NULL AUTO_INCREMENT ,
    `skill_name`  varchar(30) NULL,
	`skill_level` int NOT NULL,
	`df_user_character_index` int NOT NULL,
	PRIMARY KEY (`index`),
	FOREIGN KEY (`df_user_character_index`) REFERENCES `df_user_character` (`index`)
);

INSERT INTO `df_character` (`character_name`, `character_name_ko`) VALUES ('ghost_knight_male', '귀검사(남)');
INSERT INTO `df_character` (`character_name`, `character_name_ko`) VALUES ('ghost_knight_female', '귀검사(여)');
INSERT INTO `df_character` (`character_name`, `character_name_ko`) VALUES ('fighter', '격투가');
INSERT INTO `df_character` (`character_name`, `character_name_ko`) VALUES ('gunner', '거너');
INSERT INTO `df_character` (`character_name`, `character_name_ko`) VALUES ('mage_male', '마법사(남)');
INSERT INTO `df_character` (`character_name`, `character_name_ko`) VALUES ('mage_female', '마법사(여)');
INSERT INTO `df_character` (`character_name`, `character_name_ko`) VALUES ('priest', '프리스트');
INSERT INTO `df_character` (`character_name`, `character_name_ko`) VALUES ('thief', '도적');
INSERT INTO `df_character` (`character_name`, `character_name_ko`) VALUES ('knight', '나이트');
INSERT INTO `df_character` (`character_name`, `character_name_ko`) VALUES ('darkknight', '다크나이트');
INSERT INTO `df_character` (`character_name`, `character_name_ko`) VALUES ('creator', '크리에이터');

INSERT INTO `df_job` (`job_name`, `df_character_index`, `job_name_ko`) VALUES ('weaponmaster', 1, '웨폰마스터');
INSERT INTO `df_job` (`job_name`, `df_character_index`, `job_name_ko`) VALUES ('soulbringer', 1, '소울브링어');
INSERT INTO `df_job` (`job_name`, `df_character_index`, `job_name_ko`) VALUES ('berserker', 1, '버서커');
INSERT INTO `df_job` (`job_name`, `df_character_index`, `job_name_ko`) VALUES ('asura', 1, '마수라');
INSERT INTO `df_job` (`job_name`, `df_character_index`, `job_name_ko`) VALUES ('swordmaster', 2, '소드마스터');
INSERT INTO `df_job` (`job_name`, `df_character_index`, `job_name_ko`) VALUES ('demonslayer', 2, '데몬슬레이어');
INSERT INTO `df_job` (`job_name`, `df_character_index`, `job_name_ko`) VALUES ('vegabond', 2, '베가본드');
INSERT INTO `df_job` (`job_name`, `df_character_index`, `job_name_ko`) VALUES ('darktemplar', 2, '다크템플러');
INSERT INTO `df_job` (`job_name`, `df_character_index`, `job_name_ko`) VALUES ('nenmaster', 3, '넨마스터');
INSERT INTO `df_job` (`job_name`, `df_character_index`, `job_name_ko`) VALUES ('striker', 3, '스트라이커');
INSERT INTO `df_job` (`job_name`, `df_character_index`, `job_name_ko`) VALUES ('streetfighter', 3, '스트리트파이터');
INSERT INTO `df_job` (`job_name`, `df_character_index`, `job_name_ko`) VALUES ('grappler', 3, '그래플러');
INSERT INTO `df_job` (`job_name`, `df_character_index`, `job_name_ko`) VALUES ('ranger', 4, '레인저');
INSERT INTO `df_job` (`job_name`, `df_character_index`, `job_name_ko`) VALUES ('launcher', 4, '런쳐');
INSERT INTO `df_job` (`job_name`, `df_character_index`, `job_name_ko`) VALUES ('mechanic', 4, '메카닉');
INSERT INTO `df_job` (`job_name`, `df_character_index`, `job_name_ko`) VALUES ('spitfire', 4, '스핏파이어');
INSERT INTO `df_job` (`job_name`, `df_character_index`, `job_name_ko`) VALUES ('elementalbomber', 5, '엘리멘탈바머');
INSERT INTO `df_job` (`job_name`, `df_character_index`, `job_name_ko`) VALUES ('glacialmaster', 5, '빙결사');
INSERT INTO `df_job` (`job_name`, `df_character_index`, `job_name_ko`) VALUES ('elementalmaster', 6, '엘리멘탈마스터');
INSERT INTO `df_job` (`job_name`, `df_character_index`, `job_name_ko`) VALUES ('summoner', 6, '소환사');
INSERT INTO `df_job` (`job_name`, `df_character_index`, `job_name_ko`) VALUES ('witch', 6, '마도학자');
INSERT INTO `df_job` (`job_name`, `df_character_index`, `job_name_ko`) VALUES ('battlemage', 6, '배틀메이지');
INSERT INTO `df_job` (`job_name`, `df_character_index`, `job_name_ko`) VALUES ('crusader', 7, '크루세이더');
INSERT INTO `df_job` (`job_name`, `df_character_index`, `job_name_ko`) VALUES ('infighter', 7, '인파이터');
INSERT INTO `df_job` (`job_name`, `df_character_index`, `job_name_ko`) VALUES ('exorcist', 7, '퇴마사');
INSERT INTO `df_job` (`job_name`, `df_character_index`, `job_name_ko`) VALUES ('avenger', 7, '어벤저');
INSERT INTO `df_job` (`job_name`, `df_character_index`, `job_name_ko`) VALUES ('rogue', 8, '로그');
INSERT INTO `df_job` (`job_name`, `df_character_index`, `job_name_ko`) VALUES ('necromencer', 8, '사령술사');
INSERT INTO `df_job` (`job_name`, `df_character_index`, `job_name_ko`) VALUES ('kunoichi', 8, '쿠노이치');
INSERT INTO `df_job` (`job_name`, `df_character_index`, `job_name_ko`) VALUES ('elvenknight', 9, '엘븐나이트');
INSERT INTO `df_job` (`job_name`, `df_character_index`, `job_name_ko`) VALUES ('chaos', 9, '카오스');
INSERT INTO `df_job` (`job_name`, `df_character_index`, `job_name_ko`) VALUES ('darkknight', 10, '다크나이트');
INSERT INTO `df_job` (`job_name`, `df_character_index`, `job_name_ko`) VALUES ('creator', 11, '크리에이터');

-- 공용스킬
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('백스텝', 1, 30);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('퀵스탠딩', 1, 10);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('기본기숙련', 80, 0);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('도약', 10, 20);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('물리크리티컬히트', 10, 20);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('마법크리티컬히트', 10, 20);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('물리백어택', 10, 20);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('마법백어택', 10, 20);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('고대의기억', 10, 25);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('불굴의의지', 10, 25);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('투척마스터리', 10, 25);

-- 스트라이커 스킬
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('스트라이커의경갑마스터리', 1, 0);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('무즈어퍼', 10, 20);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('해머킥', 30, 15);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('로킥', 30, 15);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('분신', 30, 20);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('수플렉스', 30, 15);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('금강쇄', 30, 20);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('헬터스켈터', 30, 15);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('철금강', 30, 15);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('크라우치', 30, 50);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('공중밟기', 30, 20);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('호신연격', 30, 15);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('권투글러브사용가능', 30, 10);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('붕권', 30, 25);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('강권', 30, 20);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('넨탄', 30, 15);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('슈퍼아머', 30, 20);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('호포', 30, 50);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('본크러셔', 30, 25);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('철산고', 30, 25);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('머슬시프트', 30, 15);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('급소지정', 30, 15);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('질풍각', 30, 15);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('원인치펀치', 30, 40);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('라이징너클', 30, 40);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('라이트닝댄스', 30, 50);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('비트드라이브', 30, 60);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('사상최강의로킥', 1, 0);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('스탬피드', 30, 45);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('파쇄권', 30, 60);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('리미트브레이크', 30, 80);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('호격권', 30, 80);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('라이징어퍼', 30, 70);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('체인디스트럭션', 30, 100);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('필살패황권', 30, 500);

-- 소드마스터 스킬
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('소드마스터의경갑마스터리', 1, 0);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('승천검', 10, 20);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('암흑참', 30, 15);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('냉정함', 1, 0);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('혈십자검', 30, 15);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('사륜검', 30, 15);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('태산압정', 30, 15);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('검박', 30, 20);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('사영검', 30, 15);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('회전격', 30, 15);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('처단', 30, 15);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('납도', 1, 0);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('속성의소검마스터리', 30, 25);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('쾌속의도마스터리', 30, 25);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('속성변환', 30, 25);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('견고의대검마스터리', 30, 25);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('파쇄의둔기마스터리', 30, 25);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('발검술', 30, 25);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('연환격', 30, 15);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('반격', 30, 20);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('쾌속검', 30, 20);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('방검술', 30, 20);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('승천', 30, 25);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('신검합일', 30, 30);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('환검', 30, 30);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('비연참', 30, 30);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('마검발현', 30, 30);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('반월', 30, 40);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('섬광', 30, 40);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('폭명기검', 30, 50);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('악즉참', 30, 60);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('극귀검술_시공섬', 1, 0);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('참격혼', 30, 45);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('용오름', 30, 60);
INSERT INTO `df_skill` (`skill_name`, `max_level`, `require_point`) VALUES('참마검', 30, 70);


use skillsimulator;

-- 공통 스킬_인포
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (99, 1);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (99, 2);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (99, 3);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (99, 4);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (99, 5);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (99, 6);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (99, 7);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (99, 8);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (99, 9);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (99, 10);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (99, 11);

-- 스트라이커 스킬_인
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (10, 12);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (10, 13);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (10, 14);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (10, 15);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (10, 16);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (10, 17);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (10, 18);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (10, 19);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (10, 20);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (10, 21);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (10, 22);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (10, 23);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (10, 24);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (10, 25);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (10, 26);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (10, 27);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (10, 28);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (10, 29);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (10, 30);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (10, 31);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (10, 32);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (10, 33);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (10, 34);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (10, 35);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (10, 36);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (10, 37);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (10, 38);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (10, 39);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (10, 40);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (10, 41);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (10, 42);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (10, 43);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (10, 44);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (10, 45);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (10, 46);

-- 소드마스터 스킬_인포
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (5, 47);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (5, 48);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (5, 49);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (5, 50);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (5, 51);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (5, 52);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (5, 53);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (5, 54);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (5, 55);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (5, 56);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (5, 57);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (5, 58);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (5, 59);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (5, 60);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (5, 61);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (5, 62);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (5, 63);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (5, 64);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (5, 65);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (5, 66);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (5, 67);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (5, 68);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (5, 69);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (5, 70);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (5, 71);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (5, 72);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (5, 73);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (5, 74);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (5, 75);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (5, 76);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (5, 77);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (5, 78);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (5, 79);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (5, 80);
INSERT INTO `df_skill_info` (`job_index`, `skill_index`) VALUES (5, 81);


-- 유저 추가
INSERT INTO `df_user` (`user_id`, `user_password`) VALUES ('test', '111111');
