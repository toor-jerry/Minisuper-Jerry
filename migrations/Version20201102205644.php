<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201102205644 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE almacen (id INT AUTO_INCREMENT NOT NULL, codigo VARCHAR(255) NOT NULL, descripcion VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE producto ADD almacen_id INT NOT NULL, ADD codigo VARCHAR(80) NOT NULL');
        $this->addSql('ALTER TABLE producto ADD CONSTRAINT FK_A7BB06159C9C9E68 FOREIGN KEY (almacen_id) REFERENCES almacen (id)');
        $this->addSql('CREATE INDEX IDX_A7BB06159C9C9E68 ON producto (almacen_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE producto DROP FOREIGN KEY FK_A7BB06159C9C9E68');
        $this->addSql('DROP TABLE almacen');
        $this->addSql('DROP INDEX IDX_A7BB06159C9C9E68 ON producto');
        $this->addSql('ALTER TABLE producto DROP almacen_id, DROP codigo');
    }
}
