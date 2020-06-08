Какой предмет будет в заданной группе в заданный день недели на заданном
уроке?
SELECT public."Subject".name
	FROM public."Lesson" inner join public."Subject" on (public."Lesson".subject_id = public."Subject".id) where group_id = 1 and teacher_id = 1 and lesson = 'I' and day = 'Monday';


Кто из преподавателей преподает в заданной группе?
SELECT public."Group".number, public."Teacher".name, public."Teacher".surname
	FROM public."TeachersGroups" 
	inner join public."Group" on (public."Group".id = public."TeachersGroups".group_id)
	inner join public."Teacher" on (public."Teacher".id = public."TeachersGroups".teacher_id)
	where public."Group".number = 'Y2121';


В каких группах преподает заданный предмет заданный преподаватель?
SELECT public."Group".number, public."Teacher".name, public."Teacher".surname, public."Subject".name
	FROM public."Teacher" 
	inner join public."TeachersGroups" on (public."Teacher".id = public."TeachersGroups".teacher_id)
	inner join public."Group" on (public."Group".id = public."TeachersGroups".group_id)
	inner join public."TeachersSubjects" on (public."Teacher".id = public."TeachersSubjects".teacher_id)
	inner join public."Subject" on (public."Subject".id = public."TeachersSubjects".subject_id)
	where public."Teacher".id = 2 and public."Subject".name = 'History';


Расписание на заданный день недели для указанной группы?
SELECT public."Teacher".name, public."Teacher".surname, public."Group".number, public."Subject".name, public."Lesson".lesson, public."Lesson".day
	FROM public."Lesson"
	inner join public."Teacher" on (public."Teacher".id = public."Lesson".teacher_id)
	inner join public."Subject" on (public."Subject".id = public."Lesson".subject_id)
	inner join public."Group" on ((public."Group".id = public."Lesson".group_id))
	where public."Group".number = 'Y2121' and public."Lesson".day = 'Monday';


Сколько студентов обучается на каждом курсе в указанном классе?
SELECT Count(*)
	from public."Group"
	inner join public."Student" on (public."Group".id = public."Student".group_id)
	where public."Group".number = 'Y2121'; 


Вывести средние оценки студентов и сгруппировать их по именам
SELECT public."Student".name, avg(public."Grade".grade) as Average
	FROM public."Grade"
	inner join public."Student" on (public."Student".id = public."Grade".student_id)
	group by public."Student".name;


Вывести кабинеты, за которыми не закреплен учитель
SELECT id, "number", teacher_id
	FROM public."Classroom"
	where public."Classroom".teacher_id is null;


Вывести учителей, за которыми не закреплены кабинеты
SELECT public."Teacher".name, public."Teacher".surname
	FROM public."Teacher"
	where 
	(select count(*) from public."Classroom" where public."Classroom".teacher_id = public."Teacher".id) = 0;


Вывести студентов и предметы, по которым у студентов незачет
SELECT public."Student".name, public."Student".surname, public."Subject".name, avg(public."Grade".grade) as AvgGrade
	FROM public."Grade"
	inner join public."Subject" on (public."Grade".subject_id = public."Subject".id)
	inner join public."Student" on (public."Grade".student_id = public."Student".id)
	group by public."Student".name, public."Student".surname, public."Subject".name 
	having avg(public."Grade".grade) <= 2.5;
 

Вывести студентов, у которых есть хотя бы один долг
select public."Student".name, public."Student".surname
	from public."Student"
	where 
		public."Student".id = any(
			select public."Grade".student_id
			from public."Grade" 
			group by public."Grade".student_id
			having avg(public."Grade".grade) < 2.5
		);


Вывести преподавателей, которые преподают больше, чем в 5 группах
select public."Teacher".name, public."Teacher".surname
	from public."Teacher"
	inner join public."TeachersGroups" on (public."TeachersGroups".teacher_id = public."Teacher".id)
	group by public."Teacher".name, public."Teacher".surname
	having count(
		public."TeachersGroups".teacher_id
	) > 5;


Вывести преподавателей, которые преподают один предмет
select public."Teacher".name, public."Teacher".surname
	from public."Teacher"
	inner join public."TeachersSubjects" on (public."TeachersSubjects".teacher_id = public."Teacher".id)
	group by public."Teacher".name, public."Teacher".surname
	having count(
		public."TeachersSubjects".teacher_id
	) = 1;


Вывести студентов, которые обучаются в группе Y2121
SELECT public."Group".number, public."Student".name, public."Student".surname
	from public."Group"
	inner join public."Student" on (public."Student".group_id = public."Group".id)
	where public."Group".number = 'Y2121';


Вывести расписание для группы Y2336 и сгруппировать по дням недели и паре
SELECT public."Group".number, public."Subject".name, public."Lesson".lesson, public."Lesson".day
	from public."Group"
	inner join public."Lesson" on (public."Lesson".group_id = public."Group".id)
	inner join public."Subject" on (public."Lesson".subject_id = public."Subject".id)
	where public."Group".number = 'Y2121'
	group by public."Lesson".day, public."Lesson".lesson, public."Group".number, public."Subject".name;


Вывести текущие средние оценки по каждому предмету студента Alex
SELECT public."Student".name, public."Student".surname, public."Subject".name, avg(public."Grade".grade)
	from public."Student"
	inner join public."Grade" on (public."Student".id = public."Grade".student_id)
	inner join public."Subject" on (public."Grade".subject_id = public."Subject".id)
	where public."Student".name = 'Alex'
	group by public."Student".name, public."Student".surname, public."Subject".name;


Вывести оценки, которые были поставлены за сегодня
SELECT public."Student".name, public."Student".surname, public."Subject".name, public."Grade".grade, public."Grade".date
	FROM public."Grade"
	inner join public."Student" on (public."Student".id = public."Grade".student_id)
	inner join public."Subject" on (public."Subject".id = public."Grade".subject_id)
	where public."Grade".date = current_date;