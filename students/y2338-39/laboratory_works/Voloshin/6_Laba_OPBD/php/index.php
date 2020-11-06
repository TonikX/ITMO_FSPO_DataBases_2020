<?php
    $dbuser = 'v4lka004';
    $dbpass = 'gfhjkm004';
    $host = 'localhost';
    $dbname='bibl_final';
    $db = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

    $queryWorkers = "select bibliotekar.fio_bibl, bibliotekar.id_bibliotekar,
    biblioteka.adress_b, biblioteka.id_rad_hall from biblioteka join bibliotekar
    on bibliotekar.id_bibliotekar = biblioteka.id_bibl";
    $workers = $db->prepare($queryWorkers);
    $workers->execute();
    $workers = $workers->fetchAll(PDO::FETCH_ASSOC);
    

    $queryReadersPassport = "select * from reader";
    $readersPassport = $db->prepare($queryReadersPassport);
    $readersPassport->execute();
    $readersPassport = $readersPassport->fetchAll(PDO::FETCH_ASSOC);

    $queryLibraries = "select * from biblioteka";
    $libraries = $db->prepare($queryLibraries);
    $libraries->execute();
    $libraries = $libraries->fetchAll(PDO::FETCH_ASSOC);

    $queryTimetable = "select date_opening, date_closing,id_read_hall from reading_hall inner join biblioteka";
    $timetable = $db->prepare($queryTimetable);
    $timetable->execute();
    $timetable = $timetable->fetchAll(PDO::FETCH_ASSOC);

    $queryRegisteredReaders = "select count(reader.number_pasport) from reader join registration on
			reader.number_pasport = registration.number_pasport";
    $registeredReaders = $db->prepare($queryRegisteredReaders);
    $registeredReaders->execute();
    $registeredReaders = $registeredReaders->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Interface for my database</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <div class="container" style="width: 100%; display: flex; justify-content: center;">
            <a href="add.php?tab=books"><div class="btn btn-info" type="submit" name="books">About books</div></a>
            <a href="add.php?tab=readers"><div class="btn btn-info" type="submit" name="readers">About readers</div></a>
        </div>

        <p> Вывод информации о библиотеки и работниках, которые там работают: </p>

        <table class="table table-striped" frame="border">
            <thead>
                <tr>
                    <th> FIO librarian </th>
                    <th> ID librarian </th>
                    <th> address of Library </th>
                    <th> ID_read_hall </th>
                </tr>

                <?php 
                foreach ($workers as $worker): 
                    ?>
                    <tr>
                        <?php foreach ($worker as $workerData): ?>
                            <td>
                                <input type="text" class="form-control" value="<?= $workerData ?>">
                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </thead>
        </table>

        </br></br>

        <p>Вывод всех читателей библиотеки, у которых номер паспорта имеет меньше
            среднего количество цифр (для того чтобы узнать количество иностранных читателей): </p>

        <table class="table table-striped" frame="border">
            <thead>
                <tr>
                    <th> number ticket </th>
                    <th> name </th>
                    <th> address </th>
                    <th> number phone </th>
                    <th> date birthday </th>
                    <th> education </th>
                    <th> number passport</th>
                </tr>

                <?php foreach ($readersPassport as $reader): ?>
                    <tr>
                        <?php foreach ($reader as $readerData): ?>
                            <td>
                                <input type="text" class="form-control" value="<?= $readerData ?>">
                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </thead>
        </table>

        <br><br>

        <p>Вывод информации о библиотеке, который имеет в себе читальные залы: </p>

        <table class="table table-striped" frame="border">
            <thead>
                <tr>
                    <th> Address of library </th>
                    <th> date open </th>
                    <th> date close </th>
                    <th> ID_read_hall </th>
                    <th> ID_librarian </th>
                    <th> ID_library </th>
                </tr>

                <?php foreach ($libraries as $library): ?>
                    <tr>
                        <?php foreach ($library as $libraryData): ?>
                            <td>
                                <input type="text" class="form-control" value="<?= $libraryData ?>">
                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </thead>
        </table>

        <br><br>

        <p>Объединение атрибутов времени открытия и закрытия, ID читального зала
            библиотеки и читального зала : </p>

        <table class="table table-striped" frame="border">
            <thead>
                <tr>
                    <th>date opening</th>
                    <th>date closing</th>
                    <th>ID_read_hall</th>
                </tr>

                <?php foreach($timetable as $row): ?>
                    <tr>
                        <?php foreach($row as $data): ?>
                            <td>
                                <input type="text" class="form-control" value="<?= $data ?>">
                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </thead>
        </table>

        </br></br>

        <p>Вывод количества читателей, которые уже зарегистрированы в библиотеке: </p>

        <table class="table table-striped" frame="border">
            <thead>
                <tr>
                    <th> count of reader </th>
                </tr>

                <?php foreach ($registeredReaders as $reader): ?>
                    <tr>
                        <?php foreach ($reader as $data): ?>
                            <td>
                                <input type="text" class="form-control" value="<?= $data ?>">
                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </thead>
        </table>
    </body>
</html>