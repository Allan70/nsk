<?php

    include 'connect.php';

    function All($table)
    {
        try {
            $connection = connect();
            $sql = sprintf(
                'select * from %s',
                $table
            );
            $sql = $connection->prepare($sql);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_CLASS);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function AllColumns($table, $parameters)
    {
        try {
            $connection = connect();
            $sql = sprintf(
                'select %s from %s',
                $table . "." . implode(',' . $table . ".", $parameters),
                $table
            );
            $sql = $connection->prepare($sql);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_CLASS);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    function Select($id, $table)
    {
        try {
            ##code here
            $connection = connect();
            $statement = sprintf(
                'select * from %s where id=%s',
                $table,
                $id
            );
            $statement = $connection->prepare($statement);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_CLASS);
        } catch (Exception $e) {
            ##handle exceptions here
            return $e->getMessage();
        }
    }

    function Find($table, $id)
    {
        $statement = sprintf('select * from %s where id="%s"', $table, $id);
        try {
            $connection = connect();
            ##code here
            $statement = $connection->prepare($statement);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            ##handle exceptions here
            return $e->getMessage();
        }
    }

    function findColumn($table, $parameters)
    {
        try {
            ##code here
            $sql = null;
            foreach ($parameters as $parameter => $value) {
                if ($sql == null) {
                    $sql = $parameter . "='" . $value . "'";
                } else {
                    $sql .=" and ". $parameter . "='" . $value . "'";
                }
            }
            $connection = connect();
            $statement = sprintf(
                'select * from %s where %s',
                $table,
                $sql
            );
            $statement = $connection->query($statement);
            return ['count' => $statement->rowCount(), 'result' => $statement->fetchAll(PDO::FETCH_CLASS)];
        } catch (Exception $e) {
            ##handle exceptions here
            return $e->getMessage();
        }
    }

    function First($table)
    {
        try {
            $statement = sprintf(
                'select * from %s',
                $table
            );
            return $statement;
        } catch (Exception $e) {

        }
    }

    function Last($table)
    {
        try {
            $statement = sprintf(
                'select * from %s',
                $table
            );
            return $statement;
        } catch (Exception $e) {

        }

    }

    function id()
    {

    }

    /*
     * update record
     * todo update record using id
     * todo update records using time created
     * todo update record using column name
     */

    function update()
    {
    }

    function updateColumn($table, $id, $data)
    {
        if (is_null($data)) {
            dd("No data provided");
        }
        try {
            $sql = null;
            foreach ($data as $datum => $value) {
                if ($sql == null) {
                    $sql = $datum . "='" . $value . "'";
                } else {
                    $sql .= $datum . "='" . $value . "'";
                }
            }
            $connection = connect();
            $statement = sprintf(
                'update %s set %s where id="%s"',
                $table,
                $sql,
                $id
            );
            $statement = $connection->prepare($statement);
            $statement->execute();
            return $statement->rowCount() ? true : false;
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }


    /*
     * delete record
     * todo delete record using id
     */

    function delete($table, $id)
    {
        try {
            ##code here
            $connection = connect();
            $statement = sprintf('delete from %s where id=%s',
                $table, $id
            );
            $statement = $connection->prepare($statement);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_CLASS);
        } catch (Exception $e) {
            ##handle exceptions here
            return $e->getMessage();
        }
    }


    /*
     *
     * todo insert record
     */

    function save($table, array $parameters)
    {
        if (is_null($parameters)) {
            dd("No data provided");
        }
        $sql = sprintf(
            'insert into %s (%s) value (%s)',
            $table,
            implode(',', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );
        //insert into (name) values (:name)

        try {
            $connection = connect();
            $statement = $connection->prepare($sql);
            return $statement->execute($parameters);
        } catch (PDOException $e) {
            dd($e->getMessage());
        }catch (Exception $exception){
            dd($exception);
        }
    }

    function idFromEmail($table, $email)
    {
        $sql = sprintf(
            'select * from %s where email="%s"',
            $table,
            $email
        );
        //insert into (name) values (:name)

        try {
            $connection = connect();
            $statement = $connection->prepare($sql);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_OBJ)->id;
        } catch (PDOException $e) {
            dd($e->getMessage());
        }
    }


    $data = [
        'admin' => 1,
        'username' => 'Abere',
        'email' => 'aabere700@gnmail.com',
        'password' => 'allan'
    ];