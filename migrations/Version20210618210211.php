<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210618210211 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA requerimientos');
        $this->addSql('CREATE SEQUENCE requerimientos.requeriminetos_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE requerimientos.requeriminetos (id INT NOT NULL, fecha_registro TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, usuario_cliente VARCHAR(255) NOT NULL, modulo VARCHAR(255) NOT NULL, solicitud VARCHAR(255) NOT NULL, detalle TEXT NOT NULL, usuario_soporte VARCHAR(255) DEFAULT NULL, fecha_asignacion TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, fecha_cierre TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE requerimientos.requeriminetos_id_seq CASCADE');
        $this->addSql('DROP TABLE requerimientos.requeriminetos');
    }
}
