<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220214154930 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, idstatus_id INT NOT NULL, total_amount DOUBLE PRECISION NOT NULL, INDEX IDX_F529939815ECA948 (idstatus_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_has_order_item (id INT AUTO_INCREMENT NOT NULL, idorder_id INT NOT NULL, idorder_item_id INT NOT NULL, iduser_order_item_id INT NOT NULL, INDEX IDX_DCD8362A274A2535 (idorder_id), INDEX IDX_DCD8362A9D8FECCE (idorder_item_id), INDEX IDX_DCD8362A370988B2 (iduser_order_item_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_item (id INT AUTO_INCREMENT NOT NULL, iduser_id INT NOT NULL, idproduct_id INT NOT NULL, quantity INT NOT NULL, INDEX IDX_52EA1F09786A81FB (iduser_id), INDEX IDX_52EA1F09882D7B60 (idproduct_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, image VARCHAR(255) NOT NULL, name VARCHAR(120) NOT NULL, price DOUBLE PRECISION NOT NULL, quantity_stock INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE staff (id INT AUTO_INCREMENT NOT NULL, idcategory_id INT NOT NULL, username VARCHAR(60) NOT NULL, password VARCHAR(50) NOT NULL, INDEX IDX_426EF392D487ED4D (idcategory_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, username VARCHAR(45) NOT NULL, password VARCHAR(35) NOT NULL, full_name VARCHAR(60) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F529939815ECA948 FOREIGN KEY (idstatus_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE order_has_order_item ADD CONSTRAINT FK_DCD8362A274A2535 FOREIGN KEY (idorder_id) REFERENCES `order` (id)');
        $this->addSql('ALTER TABLE order_has_order_item ADD CONSTRAINT FK_DCD8362A9D8FECCE FOREIGN KEY (idorder_item_id) REFERENCES order_item (id)');
        $this->addSql('ALTER TABLE order_has_order_item ADD CONSTRAINT FK_DCD8362A370988B2 FOREIGN KEY (iduser_order_item_id) REFERENCES order_item (id)');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F09786A81FB FOREIGN KEY (iduser_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F09882D7B60 FOREIGN KEY (idproduct_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE staff ADD CONSTRAINT FK_426EF392D487ED4D FOREIGN KEY (idcategory_id) REFERENCES category (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE staff DROP FOREIGN KEY FK_426EF392D487ED4D');
        $this->addSql('ALTER TABLE order_has_order_item DROP FOREIGN KEY FK_DCD8362A274A2535');
        $this->addSql('ALTER TABLE order_has_order_item DROP FOREIGN KEY FK_DCD8362A9D8FECCE');
        $this->addSql('ALTER TABLE order_has_order_item DROP FOREIGN KEY FK_DCD8362A370988B2');
        $this->addSql('ALTER TABLE order_item DROP FOREIGN KEY FK_52EA1F09882D7B60');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F529939815ECA948');
        $this->addSql('ALTER TABLE order_item DROP FOREIGN KEY FK_52EA1F09786A81FB');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE order_has_order_item');
        $this->addSql('DROP TABLE order_item');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE staff');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
