
/*Вывод Id породы, id курицы и содержание диеты*/
db.l.find({},{"_id": 1,"Breed._id": 1,"Breed.Diet.Content": 1})

/*Вывод Номер диеты и id Птицефабрики где номер_диеты = 2 или 3 и  Id_Птицефабрики" = 1*/
 db.l.find({$or: [{"Breed.Diet._id": 2},{"Breed.Diet._id": 3}],"Farm": 1},{"Breed.Diet._id": 1,"Farm._id": 1})

/*Вывод Номера диеты > 1 и содержания диеты*/
db.l.find({"Breed.Diet._id": {$gt : 1}},{"Breed.Diet._id": 1,"Breed.Diet.Content": 1})

/*Вывод номер диеты не равный 1 или 4, а так же содержание диеты*/
db.l.find({"Breed.Diet._id": {$ne : 1},"Breed.Diet._id": {$ne : 4}},{"Breed.Diet._id": 1,"Breed.Diet.Content": 1})