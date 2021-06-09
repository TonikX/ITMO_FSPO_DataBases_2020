
/*Вывести книгу выпущенную позже 2020-02-01, дату выпуска и ее название, где book_id больше одного.*/
db.Contract.find({"book.date" : {$gt : ISODate("2020-02-01T00:00:00Z")}, "book._id" : {$gt : 1}}, {"book._id" : 1, "book.date" : 1, "book.book_name" : 1})


/*Вывести книгу,ее название, тираж и имя редактора, где id_книги больше 1 или id_редактора равен 2"*/
db.Contract.find( {$or : [{"book._id" : {$gt : 1}},{ "editor._id" : 2}]}, {"book._id" : 1, "book.book_name" : 1, "book.number" : 1, "editor.ed_name" : 1})

/*Вывести id_книги и id_редактора, который работал с этой книгой"*/
db.Contract.find({},{"editor._id" : 1, "book._id" : 1})

/*Вывести id_книги и ее тираж, где  id_книги больше одного"*/
db.Contract.find({"book._id" : {$gt : 1}}, {"book._id" : 1, "book.number" : 1} )


