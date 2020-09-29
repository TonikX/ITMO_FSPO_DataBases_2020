1)	Вывести информацию по сотрудникам зоопарка, имеющих стаж больше 2 лет.
db.animals.find({"ration.employee.exp" : {$gt : 2}}, {"ration.employee" : 1, _id : 0}).pretty()
 
2)	Вывести информацию по рептилиям, живущим в Москве.
db.animals.find({"kind_of_animal" : "lizard", "habitat.place" : "Moscow"}, {}).pretty()
 
3)	Вывести информацию по млекопитающим мужского пола
db.animals.find({"type" : "mammal", "gender" : "m"}, {}).pretty()
 
4)	Вывести информацию по животным, родившихся позже 2020 года
db.animals.find({"dofb" : {$gt : ISODate("2020-03-08T21:00:00Z")}}).pretty()

