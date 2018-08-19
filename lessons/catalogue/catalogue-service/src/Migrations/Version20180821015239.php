<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180821015239 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $this->addSql("
            CREATE TABLE product (
              id INT AUTO_INCREMENT NOT NULL,
              name VARCHAR(255) NOT NULL,
              description VARCHAR(255),
              price INT,
              PRIMARY KEY (id),
              UNIQUE KEY (name)              
            );
        ");
        // this up() migration is auto-generated, please modify it to your needs

    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
