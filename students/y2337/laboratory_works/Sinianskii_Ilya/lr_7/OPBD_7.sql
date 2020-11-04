Вывести ФИО читателей, и дату рождения.
db.lib.find({},{"User.ФИО":1,"User.Дата_рождения":1,_id:0})

Вывести залы со вместимостью выше 60.
db.lib.find({"Reading_room.вместимость":{$gt:60}},{"Reading_room.Название":1,"Reading_room.вместимость":1,_id:0})

Вывести ФИО посетителей, бравших книги Стивена Кинга.
> db.lib.find({"Instance.book.Автор":"Стивин Кинг"},{_id:0,"User.ФИО":1, "Instance.book.Автор":1})

Вывести книги, изданные раньше 2020, но позже 2000.
db.lib.find({"Instance.book.Год_издания":{$gt:new Date('2000'),$lt:new Date('2020')}},{_id:0,"Instance.book.Автор":1,"Instance.book.Год_издания":1,"Instance.book.Название":1})
