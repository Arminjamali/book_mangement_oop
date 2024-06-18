<?php

trait FileManager
{
    private function readFile($file_path)
    {
        if (!file_exists($file_path)) {
            return [];
        }
        $data = file_get_contents($file_path);
        return json_decode($data, true);
    }

    private function writeFile($file_path, $data)
    {
        $json_data = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents($file_path, $json_data);
    }
}


class Student
{
    use FileManager;

    private $file_path;

    public function __construct()
    {
        $this->file_path = __DIR__ . '/data/students.json';
    }

    public function add($name, $family, $code, $address)
    {
        $students = $this->readFile($this->file_path);
        $student = [
            'id' => end($students)['id'] + 1,
            'name' => $name,
            'family' => $family,
            'code' => $code,
            'address' => $address
        ];
        $students[] = $student;
        $this->writeFile($this->file_path, $students);
    }

    public function get($id)
    {
        $students = $this->readFile($this->file_path);
        foreach ($students as $student) {
            if ($student['id'] == $id) {
                return $student;
            }
        }
        return null;
    }

    public function get_all()
    {
        return $this->readFile($this->file_path);
    }

    public function delete($id)
    {
        $students = $this->readFile($this->file_path);
        foreach ($students as $key => $student) {
            if ($student['id'] == $id) {
                unset($students[$key]);
                $students = array_values($students); // Reindex array
                $this->writeFile($this->file_path, $students);
                return;
            }
        }
    }
}

class Book
{
    use FileManager;

    private $file_path;

    public function __construct()
    {
        $this->file_path = __DIR__ . '/data/books.json';
    }

    public function add($title, $author, $year, $stock)
    {
        $books = $this->readFile($this->file_path);
        $book = [
            'id' => end($books)['id'] + 1,
            'title' => $title,
            'author' => $author,
            'year' => $year,
            'stock' => $stock
        ];
        $books[] = $book;
        $this->writeFile($this->file_path, $books);
    }

    public function get($id)
    {
        $books = $this->readFile($this->file_path);
        foreach ($books as $book) {
            if ($book['id'] == $id) {
                return $book;
            }
        }
        return null;
    }

    public function get_all()
    {
        return $this->readFile($this->file_path);
    }

    public function delete($id)
    {
        $books = $this->readFile($this->file_path);
        foreach ($books as $key => $book) {
            if ($book['id'] == $id) {
                unset($books[$key]);
                $books = array_values($books); // Reindex array
                $this->writeFile($this->file_path, $books);
                return;
            }
        }
    }
}

class Request
{
    use FileManager;

    private $file_path;

    public function __construct()
    {
        $this->file_path = __DIR__ . '/data/requests.json';
    }

    public function add($student, $book)
    {
        $requests = $this->readFile($this->file_path);
        $request = [
            'id' => end($requests)['id'] + 1,
            'student' => $student,
            'book' => $book,
            'status' => 'pending'
        ];
        $requests[] = $request;
        $this->writeFile($this->file_path, $requests);
    }

    public function get_all()
    {
        return $this->readFile($this->file_path);
    }

    public function delete($id)
    {
        $requests = $this->readFile($this->file_path);
        foreach ($requests as $key => $request) {
            if ($request['id'] == $id) {
                unset($requests[$key]);
                $requests = array_values($requests); // Reindex array
                $this->writeFile($this->file_path, $requests);
                return;
            }
        }
    }

    public function update_status($id, $status)
    {
        $requests = $this->readFile($this->file_path);
        foreach ($requests as &$request) {
            if ($request['id'] == $id) {
                $request['status'] = $status;
                $this->writeFile($this->file_path, $requests);
                return;
            }
        }
    }
}
