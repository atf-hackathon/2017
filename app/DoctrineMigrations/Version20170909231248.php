<?php

namespace App\DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170909231248 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE boxes (id INT AUTO_INCREMENT NOT NULL, size CHAR(1) NOT NULL, availability TINYINT(1) NOT NULL, availability_date DATETIME NOT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, part_number_key CHAR(9) NOT NULL, length INT NOT NULL, width INT NOT NULL, height INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_orders (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, box_id INT DEFAULT NULL, order_id VARCHAR(255) NOT NULL, order_status TINYINT(1) DEFAULT \'0\' NOT NULL, INDEX IDX_8753BC4A4584665A (product_id), INDEX IDX_8753BC4AD8177B3F (box_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product_orders ADD CONSTRAINT FK_8753BC4A4584665A FOREIGN KEY (product_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE product_orders ADD CONSTRAINT FK_8753BC4AD8177B3F FOREIGN KEY (box_id) REFERENCES boxes (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product_orders DROP FOREIGN KEY FK_8753BC4AD8177B3F');
        $this->addSql('ALTER TABLE product_orders DROP FOREIGN KEY FK_8753BC4A4584665A');
        $this->addSql('DROP TABLE boxes');
        $this->addSql('DROP TABLE products');
        $this->addSql('DROP TABLE product_orders');
    }
}
