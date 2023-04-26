<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230426131734 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE datos (id INT UNSIGNED AUTO_INCREMENT NOT NULL, nombre VARCHAR(45) NOT NULL, apellidos VARCHAR(45) NOT NULL, num_empleado VARCHAR(45) NOT NULL, correo VARCHAR(45) NOT NULL, emocion VARCHAR(45) NOT NULL, color VARCHAR(45) NOT NULL, fecha DATE NOT NULL, hora DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE emoiones_usuario ADD hora DATE NOT NULL, CHANGE usuario_id usuario_id INT UNSIGNED DEFAULT NULL, CHANGE emociones_id emociones_id INT UNSIGNED DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE datos');
        $this->addSql('ALTER TABLE emoiones_usuario DROP hora, CHANGE emociones_id emociones_id INT UNSIGNED NOT NULL, CHANGE usuario_id usuario_id INT UNSIGNED NOT NULL');
    }
}
