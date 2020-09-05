php -S localhost:8000

sudo apachectl start

mysql -u root -p

mysqldump -u root -p matrimony > matrimony_02Sep.sql


ALTER DATABASE matrimony CHARACTER SET utf8 COLLATE utf8_general_ci;

SELECT default_character_set_name FROM information_schema.SCHEMATA S WHERE schema_name = "matrimony";

// For tamil language
ALTER TABLE `tbl_raasi` CHANGE `raasi_name` `raasi_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL; 


*******************************************************************
// User's Tables
*******************************************************************
create table tbl_user ( 
	user_id bigint(20) NOT NULL PRIMARY KEY auto_increment, 
	profile_created_by varchar(255),
	full_name varchar(255),
	date_of_birth varchar(255),
	marital_status varchar(255),
	height int(5),
	weight int(5),
	physical_status varchar(255),
	religion bigint(20) NOT NULL,
	caste bigint(20) NOT NULL,
	sub_caste varchar(255),
	sub_caste_others varchar(255),
	mother_tongue bigint(20) NOT NULL,
	languages_known varchar(255),
	gothra varchar(255),
	star varchar(255),
	raasi varchar(255),
	is_chevvai_dosham varchar(255),
	chevvai_dosham varchar(255), 
	eating_habits varchar(255),
	smoking_habits varchar(255),
	drinking_habits varchar(255),
	about_me varchar(255),
	hobbies_interest varchar(255),
	fav_music varchar(255),
	fav_food varchar(255),
	sports varchar(255),
	last_login timestamp,
	created_at timestamp DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY (religion) REFERENCES tbl_religion(religion_id),
	FOREIGN KEY (caste) REFERENCES tbl_caste(caste_id),
	FOREIGN KEY (mother_tongue) REFERENCES tbl_mother_tongue(mother_tongue_id),
	FOREIGN KEY (caste) REFERENCES tbl_caste(caste_id)
);

create table tbl_user_login ( 
	user_id bigint(20) NOT NULL PRIMARY KEY, 
	email_id varchar(255) NOT NULL,
	password varchar(255) NOT NULL,
	FOREIGN KEY (user_id) REFERENCES tbl_user(user_id)
);

create table tbl_user_family (
	user_id bigint(20) NOT NULL PRIMARY KEY,
	parents_no varchar(255),
	family_value varchar(255),
	family_type varchar(255),
	family_status varchar(255),
	native_place varchar(255),
	father_occupation varchar(255),
	mother_occupation varchar(255),
	no_of_bro varchar(255),
	bro_married varchar(255),
	no_of_sis varchar(255),
	sis_married varchar(255),
	about_family varchar(255),		
	modified_at timestamp,
	FOREIGN KEY (user_id) REFERENCES tbl_user(user_id)
);

create table tbl_user_education (
	user_id bigint(20) NOT NULL PRIMARY KEY,
	education bigint(20),
	edu_collage varchar(255),
	edu_details varchar(255),
	employed_in bigint(20),
	occupation varchar(255),
	occu_details varchar(255),
	annual_income bigint(20),		
	modified_at timestamp,
	FOREIGN KEY (user_id) REFERENCES tbl_user(user_id),
	FOREIGN KEY (education) REFERENCES tbl_education(education_id),
	FOREIGN KEY (employed_in) REFERENCES tbl_employed_in(employed_in_id),
	FOREIGN KEY (annual_income) REFERENCES tbl_annual_income(annual_income_id)
);

create table tbl_user_partner (
	user_id bigint(20) NOT NULL PRIMARY KEY,
	p_marital_status varchar(255),
	p_age_range varchar(255),
	p_height_range varchar(255),
	p_physical_status varchar(255),
	p_mother_tongue varchar(255),
	p_sub_caste varchar(255),
	p_star varchar(255),
	p_is_chevvai_dosham varchar(255),
	p_chevvai_dosham varchar(255),
	p_edu varchar(255),
	p_employed_in varchar(255),
	p_occu varchar(255),
	p_citizen varchar(255),
	p_living_in varchar(255),
	p_food varchar(255),
	p_smoking varchar(255),
	p_drinking varchar(255),
	p_annual_income varchar(255),
	p_about_my_partner varchar(255),		
	modified_at timestamp,
	FOREIGN KEY (user_id) REFERENCES tbl_user(user_id)
);

*******************************************************************
END User Table
*******************************************************************



create table tbl_annual_income (annual_income_id bigint(20) NOT NULL PRIMARY KEY auto_increment, annual_income varchar(255), created_at timestamp )


alter table tbl_star add column raasi_id bigint(20) NOT NULL;

alter table tbl_annual_income add column annual_income varchar(255) NOT NULL;

alter table tbl_annual_income drop column annual_income_name;

ALTER table tbl_raasi CHANGE column raasi_name TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

3. Caste -> SubCaste add
