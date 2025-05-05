<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250505121945 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE employee (id INT AUTO_INCREMENT NOT NULL, employee_name VARCHAR(255) NOT NULL, employee_username VARCHAR(255) NOT NULL, employee_password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, product_name VARCHAR(255) NOT NULL, category VARCHAR(255) NOT NULL, supplier VARCHAR(255) NOT NULL, cost_price DOUBLE PRECISION NOT NULL, selling_price DOUBLE PRECISION NOT NULL, unit_stock INT NOT NULL, delivery_date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE sales (id INT AUTO_INCREMENT NOT NULL, total_ammount DOUBLE PRECISION NOT NULL, employee_name VARCHAR(255) NOT NULL, date_created DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE supplier (id INT AUTO_INCREMENT NOT NULL, supplier_name VARCHAR(255) NOT NULL, contact_person VARCHAR(255) NOT NULL, contact_number VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            DROP TABLE employee
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE product
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE sales
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE supplier
        SQL);
    }
}
