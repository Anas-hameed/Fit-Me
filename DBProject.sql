drop table DietPlan;
drop table DailyLog;
drop table TargetCalories;
drop table FitnessPlan;
drop table Exercise;
drop table Member;
drop table WorkoutPlan;


CREATE TABLE WorkoutPlan
(
PlanID number(4) primary key, 
WorkoutTime number(4) NOT NULL CHECK(WorkoutTime > 0),
WorkoutDays number(4) NOT NULL CHECK(WorkoutDays > 0),
TargettedMuscleGroups varchar2(25) NOT NULL
);


CREATE TABLE Member
(
MemberID number(4) primary key,
PlanID number(4) CONSTRAINT mem_plan references WorkoutPlan(PlanID),
Name varchar2(25) NOT NULL, 
Gender varchar2(25) NOT NULL,
DateOfBirth date NOT NULL,
FitnessGoal varchar2(50) NOT NULL,
CurrentFitness varchar2(50) NOT NULL,
Weight number(4) NOT NULL CHECK(Weight > 0),
Height number(4) NOT NULL CHECK(Height > 0)
);


CREATE TABLE Exercise
(
ExerciseID number(4) primary key, 
PlanID number(4) CONSTRAINT plan_ex references WorkoutPlan(PlanID),
ExerciseName varchar2(25) NOT NULL,
ExerciseType varchar2(50),
EquipmentName varchar2(50),
FitnessGoal varchar2(25) NOT NULL
);


CREATE TABLE FitnessPlan
(
CalorieIntake number(4) NOT NULL CHECK(CalorieIntake > 0),
SuggestedFoods varchar2(100) NOT NULL,
NutritionalDetails varchar2(100) NOT NULL,
CurrentFitness varchar2(50) NOT NULL,
FitnessGoal varchar2(50) NOT NULL
);


CREATE TABLE TargetCalories
(
MemberID number(4) CONSTRAINT mem_tc references Member(MemberID) NOT NULL UNIQUE,
DailyTarget number(4) CHECK(DailyTarget > 0), 
WeeklyTarget number(4) CHECK(WeeklyTarget > 0), 
MonthlyTarget number(4) CHECK(MonthlyTarget > 0)
);


CREATE TABLE DailyLog
(
DateTime TIMESTAMP primary key, 
MemberID number(4) CONSTRAINT mem_dl references Member(MemberID),
ExercisesDone number(4) NOT NULL CHECK(ExercisesDone >= 0), 
CaloriesBurnt number(4) NOT NULL CHECK(CaloriesBurnt >= 0), 
NutritionalValues varchar2(100) NOT NULL
);


CREATE TABLE DietPlan
(
DietPlanID number(4) primary key,
CalorieIntake number(4) NOT NULL, 
SuggestedFoods varchar2(100) NOT NULL,
NutritionalDetails varchar2(100) NOT NULL,
Timeframe varchar2(25) NOT NULL
);


INSERT INTO FitnessPlan VALUES (250,'SeaFood','Fats/Carbohydrates/Vitamins','Bad','Get Fit');
INSERT INTO FitnessPlan VALUES (280,'Dairy/Chicken','Enzymes/Protiens/Vitamins','Bad','Muscle Gain');
INSERT INTO FitnessPlan VALUES (200,'Chicken','Protiens/Carbohydrates/Vitamins','Bad','Weight Lose');
INSERT INTO FitnessPlan VALUES (250,'SeaFood/Chicken/Meat','Protiens/Carbohydrates/Vitamins','Worst','Get Fit');
INSERT INTO FitnessPlan VALUES (250,'Fruit/Vegetables','Fats/Carbohydrates','Worst','Muscle Gain');
INSERT INTO FitnessPlan VALUES (150,'Fruit/Vegetables','Fats/Carbohydrates','Worst','Weight Lose');
INSERT INTO FitnessPlan VALUES (250,'Chicken/Meat','Carbohydrates/Vitamins','Good','Get Fit');
INSERT INTO FitnessPlan VALUES (290,'SeaFood/Chicken/Meat','Protiens/Carbohydrates/Vitamins','Good','Muscle Gain');
INSERT INTO FitnessPlan VALUES (150,'Fruit/Vegetables','Fats/Carbohydrates','Good','Weight Lose');


INSERT INTO WorkoutPlan VALUES (101,30,7,'Chest/Upperbody');
INSERT INTO WorkoutPlan VALUES (102,60,10,'Back/Shoulder');
INSERT INTO WorkoutPlan VALUES (103,45,15,'Leg/Thigh');
INSERT INTO WorkoutPlan VALUES (104,30,10,'Biceps/Triceps');


INSERT INTO Exercise VALUES (201,101,'Bench Press','Strength Exercises','Dumbbells','Muscle Gain');
INSERT INTO Exercise VALUES (202,101,'Push Ups','Strength Exercises',null,'Muscle Gain');
INSERT INTO Exercise VALUES (203,102,'Bench Press','Strength Exercises','Dumbbells','Muscle Gain');
INSERT INTO Exercise VALUES (204,102,'Push Press','Strength Exercises','Dumbbells','Muscle Gain');
INSERT INTO Exercise VALUES (205,103,'Squats','Strength Exercises',null,'Muscle Gain');
INSERT INTO Exercise VALUES (206,103,'Lunges','Flexibility Exercises',null,'Weight Lose');
INSERT INTO Exercise VALUES (207,103,'Jogging','Strength Exercises',null,'Weight Lose');
INSERT INTO Exercise VALUES (208,104,'Chin Ups','Flexibility Exercises',null,'Muscle Gain');
INSERT INTO Exercise VALUES (209,104,'Cable Curl','Flexibility Exercises','Cable Machine','Muscle Gain');
INSERT INTO Exercise VALUES (210,103,'Walking','Flexibility Exercises',null,'Get Fit');


INSERT INTO DietPlan VALUES (1001,250,'Fruit/Vegetables','Fats/Carbohydrates','Daily');
INSERT INTO DietPlan VALUES (1002,200,'Dairy/Vegetables','Fats/Carbohydrates/Protiens','Weekly');
INSERT INTO DietPlan VALUES (1003,300,'SeaFood','Fats/Carbohydrates/Vitamins','Monthly');
INSERT INTO DietPlan VALUES (1004,200,'SeaFood/Meat','Fats/Carbohydrates/Vitamins','Weekly');
INSERT INTO DietPlan VALUES (1005,230,'Dairy/Chicken','Enzymes/Protiens/Vitamins','Daily');
INSERT INTO DietPlan VALUES (1006,300,'SeaFood/Chicken/Meat','Protiens/Carbohydrates/Vitamins','Monthly');

drop sequence seq_member;
drop sequence seq_workout;

CREATE SEQUENCE seq_member MINVALUE 1 START WITH 1 INCREMENT BY 1 NOCACHE NOCYCLE;
CREATE SEQUENCE seq_workout MINVALUE 105 START WITH 105 INCREMENT BY 1 NOCACHE NOCYCLE;


DROP TRIGGER tbl_member;
DROP TRIGGER tbl_workoutplan;

CREATE OR REPLACE TRIGGER tbl_member
BEFORE INSERT
ON Member
FOR EACH ROW
BEGIN
:new.MemberID:=seq_member.nextval;
END;
/

CREATE OR REPLACE TRIGGER tbl_workoutplan
BEFORE INSERT
ON WorkoutPlan
FOR EACH ROW
BEGIN
:new.PlanID:=seq_workout.nextval;
END;
/
