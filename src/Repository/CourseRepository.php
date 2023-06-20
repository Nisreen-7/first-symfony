<?php
namespace App\Repository;

use App\Entity\Course;

/**
 * @return Course[]| null;
 */
class CourseRepository
{
    // findAll / findbyid / persist/ update /delete
    public function findAll(): array
    {
        $list = [];
        $connection = Database::getConnection();
        $query = $connection->prepare("select * From course");
        $query->execute();
        foreach ($query->fetchAll() as $line) {
            $list[] = new Course($line['title'], $line['subject'], $line['content'], new \DateTime($line['published']), $line['id']);
        }
        return $list;
    }

    public function persist(Course $data)
    {


        $connection = Database::getConnection();
        $query = $connection->prepare("insert into course (id,title,subject,content,published)VALUES(:id,:title,:subject,:content,:published)");
        $query->bindValue(':id', $data->getId());
        $query->bindValue(':title', $data->getTitle());
        $query->bindValue(':subject', $data->getSubject());
        $query->bindValue(':content', $data->getContent());
        $query->bindValue(':published', $data->getPublished()->format('Y-m-d H:i:s'));

        $query->execute();
        //  pour prend id en la main 
        $data->setId($connection->lastInsertId());

    }

    public function delete(int $id): void
    {
        $connection = Database::getConnection();
        $query = $connection->prepare("delete from course  where id =:id");
        $query->bindValue(':id', $id);
        $query->execute();
    }

    public function findById(int $id): ?Course
    {
        $list = [];

        $connection = Database::getConnection();
        $query = $connection->prepare("select * from course  where id=:id");
        $query->bindValue(':id', $id);
        $query->execute();


        foreach ($query->fetchAll() as $line) {
            return new Course($line['title'], $line['subject'], $line['content'], new \DateTime($line['published']), $line['id']);
        }
        return null;
    }

    public function update(Course $data)
    {
        $connection = Database::getConnection();
        $query = $connection->prepare("update course set title=:title,subject=:subject,content=:content,published=:published 
        where id=:id");
        $query->bindValue(':id', $data->getId());
        $query->bindValue(':title', $data->getTitle());
        $query->bindValue(':subject', $data->getSubject());
        $query->bindValue(':content', $data->getContent());
        $query->bindValue(':published', $data->getPublished()->format('Y-m-d H:i:s'));

        $query->execute();

    }

    public function search(string $term): array
    {
        $list = [];
        $connection = Database::getConnection();
        $query = $connection->prepare("select * From course where CONCAT(title,content,subject) LIKE :term");
        $query->bindValue(':term', '%' . $term . '%');

        $query->execute();
        foreach ($query->fetchAll() as $line) {
            $list[] = new Course($line['title'], $line['subject'], $line['content'], new \DateTime($line['published']), $line['id']);
        }
        return $list;
    }
}